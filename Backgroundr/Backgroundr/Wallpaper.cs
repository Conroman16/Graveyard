using Microsoft.Win32;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Drawing;
using System.Drawing.Imaging;
using System.IO;
using System.Linq;
using System.Management;
using System.Net.NetworkInformation;
using System.Runtime.InteropServices;
using System.Text;
using System.Windows.Media.Imaging;

namespace Backgroundr
{
	public class Wallpaper : IDisposable
	{
		// Properties
		public string ImagePath { get; set; }
		public string SavePath { get; set; }
		public BitmapSource Source { get; set; }
		public BackgroundInfo Info { get; set; }
		public Font Font { get; set; }
		public Brush Brush { get; set; }
		public Point Point { get; set; }
		public int FontSize { get; set; }
		public int Height
		{
			get
			{
				return Source.PixelHeight;
			}
		}
		public int Width
		{
			get
			{
				return Source.PixelWidth;
			}
		}
		private Image _Image { get; set; }
		private string tempPath { get; set; }
		private List<string> tmpImgs { get; set; }

		// Constructors
		#region Constructors
		public Wallpaper(string imagePath, Brush brush, string savePath, Font font = Font.Consolas)
		{
			init(imagePath, brush, savePath, font, new Point(0, 0));
		}
		public Wallpaper(string imagePath, Font font = Font.Consolas)
		{
			string path = Environment.GetFolderPath(Environment.SpecialFolder.ApplicationData) + @"\Backgroundr\" + Guid.NewGuid().ToString() + ".png";
			init(imagePath, Brushes.White, path, font, new Point(0, 0));
		}
		protected void init(string imagePath, Brush brush, string savePath, Font font, Point point, int fontSize = 10)
		{
			Info = new BackgroundInfo();
			ImagePath = imagePath;
			Source = new BitmapImage(new Uri(ImagePath));
			SavePath = savePath;
			Font = font;
			FontSize = fontSize;
			Brush = brush;
			Point = point;
			ensurePaths();
		}
		#endregion

		// Public methods
		#region Public Methods
		public void WriteText()
		{
			openImage();
			drawText();
			tempPath = Path.GetTempFileName();
			writeTemp();
			Source = new BitmapImage(new Uri(tempPath));
		}
		public void Set()
		{
			if (string.IsNullOrWhiteSpace(tempPath))
				WriteText();

			writeOut();
			Setter.Set(SavePath, Setter.Position.Fill);
		}
		public void Dispose()
		{
			_Image.Dispose();
			if (tmpImgs != null)
			{
				foreach (var tmpImg in tmpImgs)
				{
					File.Delete(tmpImg);
				}
			}
		}
		#endregion

		// Provate methods
		#region Private Methods
		private void ensurePaths()
		{
			string dir = Path.GetDirectoryName(SavePath);
			if (!Directory.Exists(dir))
				Directory.CreateDirectory(dir);
		}
		private void openImage()
		{
			if (File.Exists(ImagePath))
			{
				_Image = Image.FromFile(ImagePath);
			}
			else
			{
				throw new Exception("Image does not exist!");
			}
		}
		private void drawText()
		{
			using (Graphics graphic = Graphics.FromImage(_Image))
			{
				using (System.Drawing.Font f = new System.Drawing.Font(FontControl.GetFontName(Font), FontSize))
				{
					StringBuilder sb = new StringBuilder();
					sb.AppendFormat("{0}: {1}", "FQDN", Info.FQDN);
					sb.Append(Environment.NewLine);
					sb.AppendFormat("{0}: {1}", "OS", Info.OperatingSystem.FullName);

					graphic.DrawString(sb.ToString(), f, Brush, Point);
				}
			}
		}
		private void writeOut()
		{
			_Image.Save(SavePath, ImageFormat.Png);
			_Image.Dispose();
		}
		private void writeTemp()
		{
			_Image.Save(tempPath);
			if (tmpImgs == null)
				tmpImgs = new List<string>();
			tmpImgs.Add(tempPath);
		}
		#endregion

		// Classes
		#region Classes
		public class BackgroundInfo
		{
			public OS OperatingSystem { get; set; }

			public string MachineName
			{
				get
				{
					return Environment.MachineName;
				}
			}
			public string DomainName
			{
				get
				{
					return Environment.UserDomainName;
				}
			}
			public string DnsSuffix
			{
				get
				{
					return IPGlobalProperties.GetIPGlobalProperties().DomainName;
				}
			}
			public string FQDN
			{
				get
				{
					return (MachineName + '.' + DnsSuffix).ToLower();
				}
			}

			public string ToJson(Formatting format = Formatting.None)
			{
				return JsonConvert.SerializeObject(this, format);
			}

			public BackgroundInfo()
			{
				OperatingSystem = new OS();
			}

			public class OS
			{
				public string FullName
				{
					get
					{
						return ToString();
					}
				}

				public string Name
				{
					get
					{
						var name = (from x in new ManagementObjectSearcher("SELECT * FROM Win32_OperatingSystem").Get().OfType<ManagementObject>()
									select x.GetPropertyValue("Caption")).FirstOrDefault();
						return name != null ? name.ToString() : "Unknown";
					}
				}
				public string BitDepth
				{
					get
					{
						if (Environment.Is64BitOperatingSystem)
							return "x64";
						else
						{
							return "x86";
						}
					}
				}
				public override string ToString()
				{
					return Name + ' ' + BitDepth;
				}
			}
		}
		public sealed class Setter
		{
			const int SPI_SETDESKWALLPAPER = 20;
			const int SPIF_UPDATEINIFILE = 0x01;
			const int SPIF_SENDWININICHANGE = 0x02;

			[DllImport("user32.dll", CharSet = CharSet.Auto)]
			static extern int SystemParametersInfo(int uAction, int uParam, string lpvParam, int fuWinIni);

			public enum Position
			{
				Tiled,
				Centered,
				Stretched,
				Fill
			}

			public static void Set(string imagePath, Position style)
			{
				RegistryKey key = Registry.CurrentUser.OpenSubKey(@"Control Panel\Desktop", true);
				if (style == Position.Stretched)
				{
					key.SetValue("WallpaperStyle", "2");
					key.SetValue("TileWallpaper", "0");
				}

				if (style == Position.Centered)
				{
					key.SetValue("WallpaperStyle", "1");
					key.SetValue("TileWallpaper", "0");
				}

				if (style == Position.Tiled)
				{
					key.SetValue("WallpaperStyle", "1");
					key.SetValue("TileWallpaper", "1");
				}

				if (style == Position.Fill)
				{
					key.SetValue("WallpaperStyle", "10");
					key.SetValue("TileWallpaper", "0");
				}

				SystemParametersInfo(SPI_SETDESKWALLPAPER,
					0,
					imagePath,
					SPIF_UPDATEINIFILE | SPIF_SENDWININICHANGE);
			}
		}
		#endregion
	}
}