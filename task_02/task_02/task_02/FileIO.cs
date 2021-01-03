using System;
using System.Collections.Generic;
using System.IO;
using System.Text;

namespace task_02
{
    class FileIO
    {
		public List<KeyValuePair<int, int>> readFileLineByLine()
		{
			string line;
			var myList = new List<KeyValuePair<int, int>>();
			System.IO.StreamReader file = new System.IO.StreamReader(@"");// Az olvasott fajl utvonala 
			file.ReadLine();
			while ((line = file.ReadLine()) != null)
			{
				string[] lineArray = line.Split('|');
				int t;
				if (Int32.TryParse(lineArray[1], out t))
				{
					myList.Add(new KeyValuePair<int, int>(int.Parse(lineArray[0]), int.Parse(lineArray[1])));
				}

			}
			file.Close();
			return myList;
		}

		public void writeFile(string line)
		{						
			string fileName = @""; //Letrehozott fajl utvonala 
			if (!File.Exists(fileName))
			{
				using (StreamWriter sw = File.CreateText(fileName))
				{
					sw.WriteLine("tulajdonos \t marka \t tipus");
					sw.WriteLine(line);
					sw.Close();
				}
			}
			else
			{
				StreamWriter sw = new StreamWriter(fileName, true, Encoding.UTF8);
				sw.WriteLine(line);
				sw.Close();
			}

		}
	}
}
