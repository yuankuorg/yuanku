<?php
	class CenterControl {
		public static function init() {
			if( !empty($_REQUEST["oper"]) ) {
				$oper = $_REQUEST["oper"];
			} else {
				$oper = "adminIndex-signin";
			}
		
			$arr = explode("-", $oper);
			
			if( count($arr) != 2 ) {
				header("HTTP/1.0 404 Not Found");
				exit();
			}
			$classname = ucfirst($arr[0]."Control");
			
			//引入文件并创建对象
			$obj = new $classname();
			
			//判读方法是否存在
			if( !method_exists($obj, $arr[1]) ) {
				header("HTTP/1.0 404 Not Found");
				exit();
			}
			
			//调用方法
			$obj->$arr[1]();
		}	
	}