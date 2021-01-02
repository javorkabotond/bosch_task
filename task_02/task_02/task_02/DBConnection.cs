using System;
using System.Collections.Generic;
using System.Text;
using MySql.Data;
using MySql.Data.MySqlClient;


namespace task_02
{
	class DBConnection
	{
		FileIO fileIO = new FileIO();
		private DBConnection()
		{
		}

		public string Server { get; set; }
		public string DatabaseName { get; set; }
		public string UserName { get; set; }
		public string Password { get; set; }
		public MySqlConnection Connection { get; set; }

		private static DBConnection instance = null;
		public static DBConnection Instance()
		{
			if (instance == null)
				instance = new DBConnection();
			return instance;
		}
		public bool IsConnect()
		{
			if (Connection == null)
			{
				if (String.IsNullOrEmpty(DatabaseName))
					return false;
				string connstring = string.Format("Server={0}; database={1}; UID={2}; password={3}", Server, DatabaseName, UserName, Password);
				Connection = new MySqlConnection(connstring);
				Connection.Open();
			}

			return true;
		}


		public void Close()
		{
			Connection.Close();
		}

		public void selectDataFromDb(List<int> userIds)
		{
			var dbConnection = DBConnection.Instance();
			dbConnection.Server = "localhost";
			dbConnection.DatabaseName = "cs_beugro";
			dbConnection.UserName = "";
			dbConnection.Password = "";
			if (dbConnection.IsConnect())
			{
				foreach (var id in userIds)
				{
					string query = "select name, brand, model from user_car inner join user on user_car.user = user.id inner join car on user_car.car = car.id where user.id = " + id;

					var cmd = new MySqlCommand(query, dbConnection.Connection);
					var reader = cmd.ExecuteReader();
					while (reader.Read())
					{
						string name = reader.GetString(0);
						string brand = reader.GetString(1);
						string model = reader.GetString(2);
						Console.WriteLine(name + "\t" + brand + "\t" + model);
						fileIO.writeFile(name + "\t" + brand + "\t" + model);
					}
					reader.Close();
				}
				dbConnection.Close();
			}
		}
	}
}
