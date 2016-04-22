<?php
	header('Content-type: text/html;charset=utf-8');
	session_start();
	
	function checkLogin(){
		if(empty($_SESSION["admin"])){			
			header("Location:/yuanku/view/admin/login.html");
			exit();
		}else{
			return true;
		}
		//函数需要返回值
	}
	
	//自动加载类函数
	function __autoload($class_name) {
		$modelPath = $_SERVER["DOCUMENT_ROOT"]."/yuanku/model/{$class_name}.class.php";
		$controlPath = $_SERVER["DOCUMENT_ROOT"]."/yuanku/control/{$class_name}.class.php";
		
		if( file_exists($modelPath) ) {
			require_once $modelPath;
		} else if( file_exists($controlPath) ){
			require_once $controlPath;
		} else {
			echo $class_name;exit();
			header("HTTP/1.0 404 Not Found");
			exit();
		}
	}
	
	//微信的数据日志
	function logdebug($text){
		file_put_contents('log.txt',$text."\n",FILE_APPEND);		
	}