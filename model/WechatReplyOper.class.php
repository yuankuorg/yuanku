<?php
	class WechatReplyOper{
		//根据tcid获取话题分类名
		public function getTcNameByCtId($tc_id){
			$conn = DBUtil::getConn();			
			$sql="select tc_name from topicclass where isdel=0 and tc_id=?";
			$arrs = array();
			$arrs[]=$tc_id;
			$pre = $conn->prepare($sql);
			$pre->execute($arrs);
			$row = $pre->fetch();
			return $row[0];
		}
		
		
		//根据openid找用户
		//判断用户的权限
		//如果是名企精英，直接返回true
		//然后判断有没有项目，返回false
		//用户有项目并且是助学，查tcid是否存在
		public function getRidByCtId($weobj,$tc_id){
			$openID = $weobj->getRev()->getRevFrom();
			if(!$this->checkMingqi($openID)){
				if(!$this->checkTcId($openID, $tc_id)){
					return false;
				}
			}
			$ranid = uniqid();
			$conn = DBUtil::getConn();
			$sql="insert into usertype values(default,?,?)";
			$arrs = array();
			$arrs[]="{$ranid}";
			$arrs[]=$tc_id;
			$pre = $conn->prepare($sql);
			$res=$pre->execute($arrs);
			if($res){
				return $ranid;
			}else{
				return false;
			}
		}
		
		//检查openid对应的tc_id
		public function checkTcId($openID,$tc_id){
			$conn = DBUtil::getConn();			
			$sql="select * from vip v, topicclass t where v.openid=? and v.items=t.items and t.tc_id=? and v.isdel=0 and t.isdel=0";
			$arrs = array();
			$arrs[]=$openID;
			$arrs[]=$tc_id;
			$pre = $conn->prepare($sql);
			$pre->execute($arrs);
			$row = $pre->fetch();
			if($row[0]){
				return true;
			}else{
				return false;
			}
		}
		
		//检查是否名企精英，确定权限
		public function checkMingqi($openID){
			$conn = DBUtil::getConn();
			$sql="select * from vip v, items i where v.openid=? and v.items=i.id and i.name='名企精英' and v.isdel=0 and i.isdel=0";
			$arrs = array();
			$arrs[]=$openID;
			$pre = $conn->prepare($sql);
			$pre->execute($arrs);
			$row = $pre->fetch();
			if($row[0]){
				return true;
			}else{
				return false;
			}
		}
		
		//获取游戏关键字的参与用户
		public function checkGamePeo($openID){
			$conn = DBUtil::getConn();
			$sql="select * from wechat_gamepeo where openid=? ";
			$pre = $conn->prepare($sql);
			$arrs = array();
			$arrs[]="{$openID}";
			$pre->execute($arrs);
			$row = $pre->fetch();
			$rows = $row[0];
			return $rows;
		}
		
		//回复游戏关键字的人加入游戏数据库的游戏玩家表
		public function addGamePeo($weobj){
			$openID = $weobj->getRev()->getRevFrom();
			if($this->checkGamePeo($openID)){
				return false;
			}	
			$userinfo = $weobj->getUserInfo( $openID );
			$username = urldecode($userinfo["nickname"]);		//微信名
			$headimg = urldecode($userinfo["headimgurl"]);		//头像
			
			$conn = DBUtil::getConn();
			$sql="insert into wechat_gamepeo values(default,?,?,?,now(),1)";
			$pre = $conn->prepare($sql);
			$arrs = array();
			$arrs[]="{$openID}";
			$arrs[]="{$username}";
			$arrs[]="{$headimg }";
			$pre->execute($arrs);
		}
		
		//检索游戏关键字
		public function checkGameKey($thekey){
			$conn = DBUtil::getConn();
			$sql = "select content from wechat_reply where thekey = ? and type=3 and isdel=0";
			$pre = $conn->prepare($sql);
			$arr = array();
			$arr[]="{$thekey}";
			$pre->execute($arr);
			$res = $pre->fetch();
			$theContent=$res[0];
			return $theContent;
		}
		
		//检索关键字
		public function checkKeyReply($thekey){
			$conn = DBUtil::getConn();
			$sql = "select content from wechat_reply where thekey = ? and type=2 and isdel=0";
			$pre = $conn->prepare($sql);
			$arr = array();
			$arr[]="{$thekey}";
			$pre->execute($arr);
			$res = $pre->fetch();
			$theContent=$res[0];
			return $theContent;
		}
		
		//检索关注回复消息
		public function checkCareReply(){
			$conn = DBUtil::getConn();
			$sql = "select content from wechat_reply where type=0 and isdel=0";
			$pre = $conn->prepare($sql);
			$pre->execute();
			$res = $pre->fetch();
			$theContent=$res[0];
			return $theContent;			
		}
		
		//检索非关键字回复消息
		public function checkNokeyReply(){
			$conn = DBUtil::getConn();
			$sql = "select content from wechat_reply where type=1 and isdel=0";
			$pre = $conn->prepare($sql);
			$pre->execute();
			$res = $pre->fetch();
			$theContent=$res[0];
			return $theContent;			
		}
		
		
	}