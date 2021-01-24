#------------------------------------------
#--- Author: Pradeep Singh
#--- Date: 20th January 2017
#--- Version: 1.0
#--- Python Ver: 2.7
#--- Details At: https://iotbytes.wordpress.com/store-mqtt-data-from-sensors-into-sql-database/
#------------------------------------------


import json
import sqlite3

# SQLite DB Name
DB_Name =  "/var/www/html/IoT.db"

#===============================================================
# Database Manager Class

class DatabaseManager():
	def __init__(self):
		self.conn = sqlite3.connect(DB_Name)
		self.conn.execute('pragma foreign_keys = on')
		self.conn.commit()
		self.cur = self.conn.cursor()
		
	def query(self, sql_query, args=()):
		self.cur.execute(sql_query, args)
		self.conn.commit()
		return

	def __del__(self):
		self.cur.close()
		self.conn.close()

#===============================================================
# Создаем таблицу топика, если ее нет и добавляем туда сообщение

def sensor_Data_Handler(Topic, Message):
	Topic = Topic.replace('/', '__')
	dbObj = DatabaseManager()
	dbObj.query("CREATE TABLE IF NOT EXISTS " + Topic + " (ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, MESSAGE TEXT, DATE_INSERT TIMESTAMP DEFAULT CURRENT_TIMESTAMP)")
	dbObj.query("INSERT INTO " + Topic + "  (MESSAGE) VALUES (?)", [Message])

	# Удаляем старые записи
	dbObj.query("DELETE FROM " + Topic + " WHERE DATE_INSERT < datetime('NOW','-1 DAY')")

#===============================================================
