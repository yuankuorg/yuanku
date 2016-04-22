<?php
//	ini_set( 'display_errors', 'On' );
//	error_reporting(E_ALL);
	require_once $_SERVER["DOCUMENT_ROOT"]."/yuanku/libs/smarty/Smarty.class.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/yuanku/include/common.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/yuanku/libs/wechat.class.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/yuanku/libs/jssdk.php";
	spl_autoload_register("__autoload");
	
	//网站路由初始化
	CenterControl::init();