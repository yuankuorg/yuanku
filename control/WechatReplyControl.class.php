<?php
	class WechatReplyControl extends Control {
		//关键字回复
		function keyReply($weObj){
			$weObj->checkAuth();
			$type = $weObj->getRev()->getRevType();
			if( $type == Wechat::MSGTYPE_TEXT || $type ==  Wechat::MSGTYPE_VOICE) {
				$thekey = $weObj->getRev()->getRevContent();
				$checkObj=new WechatReplyOper();
				
				//助学成才
				if( $thekey == "助学成才" ) {
					$openid = $weObj->getRev()->getRevFrom();
					$theUrl='http://'.$_SERVER["SERVER_NAME"].'/yuanku/index.php?oper=study-index&openid='.$openid;
					$newdata = array(
					   	"0"=>array(
					   		'Title'=>"助学成才",
					   		'Description'=>'点击进入服务页面',
					   		'Url'=>$theUrl
					   	)
				   	);
					$weObj->news($newdata)->reply();
					return;
				}
				
				//微信抽奖
				$theContent=$checkObj->checkGameKey($thekey);
				if($theContent){
					$checkObj->addGamePeo($weObj);
					$weObj->text("{$theContent}")->reply();
					return;
				}
				
				//自动回复
				$theContent=$checkObj->checkKeyReply($thekey);
				if($theContent){
					$weObj->text("{$theContent}")->reply();
				}else{
					$theContent=$checkObj-> checkNokeyReply();
					$weObj->text("{$theContent}")->reply();
				}
				return;				
			}
			
			$evenType=$weObj->getRev()->getRevEvent() ;
			if($evenType['event']== 'CLICK' ){
				$openid = $weObj->getRev()->getRevFrom();
				$theUrl='http://'.$_SERVER["SERVER_NAME"].'/yuanku/index.php?oper=study-index&openid='.$openid;
				$newdata = array(
				   	"0"=>array(
				   		'Title'=>"助学成才",
				   		'Description'=>'点击进入服务页面',
				   		'Url'=>$theUrl
				   	)
			   	);
				$weObj->news($newdata)->reply();
				return;
//				$keyArr=explode('=',$evenType['key']);
//				if($keyArr[0]=='tc_id'&&isset($keyArr[1])){
//					$checkObj=new WechatReplyOper();
//					$ranid = $checkObj->getRidByCtId($weObj,$keyArr[1]);
//					if($ranid){
//						$tc_name=$checkObj->getTcNameByCtId($keyArr[1]);
//						
//						$theUrl='http://'.$_SERVER["SERVER_NAME"].'/yuanku/mobile-checkstatus-'.$ranid.'.html';
//						$newdata = array(
//						   	"0"=>array(
//						   		'Title'=>$tc_name,
//						   		'Description'=>'点击进入服务页面',
//						   		'Url'=>$theUrl
//						   	)
//					   	);
//						$weObj->news($newdata)->reply();
//					}else{
//						$theUrl='http://'.$_SERVER["SERVER_NAME"].'/yuanku/mobile-enterJoinVip.html';
//						$newdata = array(
//						   	"0"=>array(
//						   		'Title'=>'亲爱的用户，您的权限不足',
//						   		'Description'=>'点击注册为会员，参加对应的项目',
//						   		'Url'=>$theUrl
//						   	)
//					   	);
//						$weObj->news($newdata)->reply();
//					}
//				}
			}
		}
		//关注时回复
		function careReply($weObj){
			$weObj->checkAuth();
			$checkObj=new WechatReplyOper();
			$theContent=$checkObj->checkCareReply();
			$weObj->text("{$theContent}")->reply();
		}
	}