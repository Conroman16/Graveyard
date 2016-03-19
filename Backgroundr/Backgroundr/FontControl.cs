using System.Collections.Generic;
using System.Linq;

namespace Backgroundr
{
	public enum Font
	{
		Arial,
		Consolas,
		Exo,
		OpenSans,
		SegoeUI,
		SourceSansPro
	}

	public static class FontControl
	{
		public static List<string> FontNames
		{
			get
			{
				List<string> names = new List<string>();
				foreach (var font in fontsDict)
				{
					names.Add(font.Value);
				}
				return names;
			}
		}
		public static string GetFontName(Font font)
		{
			return fontsDict[font];
		}
		public static Font GetFontType(string name)
		{
			return fontsDict.Where(i => i.Value == name).First().Key;
		}

		private static Dictionary<Font, string> fontsDict = new Dictionary<Font, string>()
		{
			{ Font.Arial, Font.Arial.ToString() },
			{ Font.Consolas, Font.Consolas.ToString() },
			{ Font.Exo, Font.Exo.ToString() },
			{ Font.OpenSans, "Open Sans" },
			{ Font.SegoeUI, "Segoe UI" },
			{ Font.SourceSansPro, "Source Sans Pro" }
		};
	}
}
