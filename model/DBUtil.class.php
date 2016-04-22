<?php
	class DBUtil {  //单例模式
		private static $conn;
		private static $db;
		
		public static function getConn() {
			if( !self::$conn ) {
				//连接数据库
				self::$conn = new PDO('mysql:host=113.10.170.33;dbname=yuanku', "yuanku_f", "qw3356222");
				//选择数据库
				self::$conn->exec("set names utf8");

				self::$db = new DBUtil();
			}
			
			return self::$conn;
		}
		
		private function __construct() {
			
		} 
		
		private function __clone() {
			
		}
		
		public function __destruct() {
			self::$conn = null;
		}
	}