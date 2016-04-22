<?php
	require_once $_SERVER["DOCUMENT_ROOT"]."/yuanku/libs/wechat.class.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/yuanku/include/common.php";
	
	$options = array(
		'token'=>'yuankuorg', 												//填写你设定的key
	 	'encodingaeskey'=>'8N8VO8e3Yo2kkf5peSPHtd8Lk45ezXOJbc5PirGCPVl', 	//填写加密用的EncodingAESKey
	 	'appid'=>'wx40aa7803fb01afb3', 										//填写高级调用功能的appid
	 	'appsecret'=>'182713010712dc0e9f33ab4117f00aad', 					//填写高级调用功能的密钥
		'debug'=>false,
		'logcallback'=>'logdebug',											//日志文件
		'access_token_filePath'=> 'wechatCache/'							//设置access_token的缓存路径就可以开启access_token缓存
	);
	//创建实体类
	$weobj = new Wechat( $options );					
	$weobj->valid();									//验证连接，被动接口处于加密模式时必须调用
	//获取微信用户的OpenId
	$openID = $weobj->getRev()->getRevFrom();			
	/*
	 * 获取用户的全部信息
	 */
	$userinfo = $weobj->getUserInfo( $openID );			
	$username = urldecode($userinfo["nickname"]);		//微信名
	$sex = urldecode($userinfo["sex"]);					//性别
	$headimg = urldecode($userinfo["headimgurl"]);		//头像
	$remark = urldecode($userinfo["remark"]);				//备注
	$groupid = urldecode($userinfo["groupid"]);				//组别
	$po = new WechatUserOper();

	//获取消息事件类型
	$evenType=$weobj->getRev()->getRevEvent() ;
	if($evenType['event']== 'subscribe' ){
		//当被关注时自动回复
		$replyObj=new WechatReplyControl();
		$replyObj -> careReply($weobj);
		$res = $po->setAllUsers($openID, $username, $sex, $headimg, $remark, $groupid);		//将关注的用户的信息存入数据库中
	}elseif($evenType['event'] == 'unsubscribe'){
		//被取消关注了
		$po->setIsdel($openID);
	}else{
		//其他消息事件类型自动回复
		$replyObj=new WechatReplyControl();
		$replyObj -> keyReply($weobj);
	}