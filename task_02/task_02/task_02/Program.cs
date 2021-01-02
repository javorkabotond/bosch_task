using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using MySql.Data.MySqlClient;

namespace task_02
{
	class Program
	{
		static void Main(string[] args)
		{
			Console.WriteLine("Made by Javorka Botond");
			Console.WriteLine("--------------");
			FileIO fileIO = new FileIO();
			List<int> userIds = searchKey(randomNumber(), fileIO.readFileLineByLine());
			var dbConnection = DBConnection.Instance();
			dbConnection.selectDataFromDb(userIds);

		}
		public static List<int> randomNumber()
		{
			List<int> listNumbers = new List<int>();
			int number;
			Random random = new Random();
			for (int i = 0; i < 10; i++)
			{
				do
				{
					number = random.Next(1, 50);
				} while (listNumbers.Contains(number));
				listNumbers.Add(number);
			}
			return listNumbers;
		}
		public static List<int> searchKey(List<int> randomNumbers, List<KeyValuePair<int, int>> pairs ) {
			var valueList = new List<int>();
			foreach (var number in randomNumbers) {
				foreach (var pair in pairs) {
					
					if (pair.Key == number && pair.Value >= 0) {
						valueList.Add(pair.Value);
					}
				}
			}
			return valueList;
		}
	}
}
