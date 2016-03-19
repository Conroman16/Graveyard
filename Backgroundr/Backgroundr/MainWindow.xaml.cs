using Microsoft.Win32;
using System;
using System.IO;
using System.Windows;
using System.Windows.Controls;

namespace Backgroundr
{
	/// <summary>
	/// Interaction logic for MainWindow.xaml
	/// </summary>
	public partial class MainWindow : Window, IDisposable
	{
		// Properties
		public Wallpaper wallpaper { get; set; }
		private Thickness dotBaseMargin { get; set; }

		// Constructor
		public MainWindow()
		{
			InitializeComponent();
			init();
		}
		protected void init()
		{
			rtxtOutput.Focusable = false;
			imgPreview.Focusable = false;
			bindFonts();
			sldPosX.Minimum = 0;
			sldPosY.Minimum = 0;
			sldFontSize.Minimum = 10;
			sldFontSize.Maximum = 250;
			dotBaseMargin = elpDot.Margin;
		}

		// Public methods
		public void Dispose()
		{
			wallpaper.Dispose();
		}
		public void bindFonts()
		{
			foreach (var name in FontControl.FontNames)
			{
				drpFonts.Items.Add(name);
			}
			drpFonts.SelectedIndex = 0;
		}
		public void writeOutputLine(string line)
		{
			rtxtOutput.AppendText(line + Environment.NewLine);
		}

		// Private methods
		private Font getFont()
		{
			Font font = FontControl.GetFontType(drpFonts.SelectedValue.ToString());
			return font;
		}
		private void getPoint()
		{
			wallpaper.Point = new System.Drawing.Point((int)Math.Round(sldPosX.Value), (int)Math.Round(sldPosY.Value));
		}
		private void updateUI(bool toggleImgPanel = false)
		{
			if (toggleImgPanel)
				toggleImagePanel();
			getPoint();
			elpDot.Visibility = Visibility.Visible;
			wallpaper.Font = getFont();
			wallpaper.WriteText();
			imgPreview.Source = wallpaper.Source;
			sldPosX.Maximum = wallpaper.Width;
			sldPosY.Maximum = wallpaper.Height;
			updateSliderTxts();
		}
		private void updateSliderTxts()
		{
			updateTxtPosX();
			updateTxtPosY();
			updateTxtFontSize();
		}
		private void updateTxtPosX()
		{
			txtPosX.Text = ((int)Math.Round(sldPosX.Value)).ToString();
		}
		private void updateTxtPosY()
		{
			txtPosY.Text = ((int)Math.Round(sldPosY.Value)).ToString();
		}
		private void updateTxtFontSize()
		{
			txtFontSize.Text = ((int)Math.Round(sldFontSize.Value)).ToString();
		}
		private void toggleImagePanel()
		{
			int openHeight = 609;
			int closedHeight = 299;
			if (Height == closedHeight)
				Height = openHeight;
			else if (Height == openHeight)
				Height = closedHeight;
		}
		private void moveDotX(double x)
		{
			//double scale = imgPreview.Width / sldPosX.Maximum;
			double scale = imgPreview.Width / wallpaper.Width;  // I have no idea why this works here and not below
			double fixedX = (x * scale) + dotBaseMargin.Left;
			var currMarg = elpDot.Margin;
			currMarg.Left = fixedX;
			elpDot.Margin = currMarg;
		}
		private void moveDotY(double y)
		{
			double scale = imgPreview.Height / sldPosY.Maximum;  // I have no idea why this works here and not above
																 //double scale = imgPreview.Width / wallpaper.Height;
			double fixedY = (y * scale) + dotBaseMargin.Top;
			var currMarg = elpDot.Margin;
			currMarg.Top = fixedY;
			elpDot.Margin = currMarg;
		}

		// Event handlers
		private void btnSet_Click(object sender, RoutedEventArgs e)
		{
			updateUI();
			wallpaper.Set();
			writeOutputLine("Wallpaper set!");
		}
		private void btnOpenFIle_Click(object sender, RoutedEventArgs e)
		{
			OpenFileDialog ofd = new OpenFileDialog();
			if (ofd.ShowDialog() == true)
				txtImagePath.Text = ofd.FileName;
		}
		private void btnUpdateView_Click(object sender, RoutedEventArgs e)
		{
			updateUI();
		}
		private void btnImportImage_Click(object sender, RoutedEventArgs e)
		{
			if (wallpaper != null)
				wallpaper.Dispose();

			if (File.Exists(txtImagePath.Text))
			{
				wallpaper = new Wallpaper(txtImagePath.Text);
				updateUI(true);
			}
		}
		private void txtImagePath_TextChanged(object sender, TextChangedEventArgs e)
		{

		}
		private void sldPosX_ValueChanged(object sender, RoutedPropertyChangedEventArgs<double> e)
		{
			moveDotX(sldPosX.Value);
			updateTxtPosX();
		}
		private void sldPosY_ValueChanged(object sender, RoutedPropertyChangedEventArgs<double> e)
		{
			moveDotY(sldPosY.Value);
			updateTxtPosY();
		}
		private void sldFontSize_ValueChanged(object sender, RoutedPropertyChangedEventArgs<double> e)
		{
			if (wallpaper != null)
			{
				wallpaper.FontSize = (int)Math.Round(sldFontSize.Value);
				updateTxtFontSize();
			}
		}
	}
}
