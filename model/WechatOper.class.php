<?php
	class WechatOper{
		//清空抽奖人名单	
		public function delwechat(){
			$conn = DBUtil::getConn();
			$sql="truncate table wechat_gamepeo";
			$arr = array();
			$pre = $conn->prepare($sql);
			return $pre->execute($arr);
		}	
			
		//删除已中奖人
		public function deluname(){
			$conn = DBUtil::getConn();
			$sql="update wechat_gamepeo set isdel = 1 where uname = ?";
			$arr = array();
			$arr[] = "{$_POST["uname"]}";
			$pre = $conn->prepare($sql);
			return $pre->execute($arr);
		}
		
		//点击刷新时获取抽奖人名单	
		public function getpeople($curpos,$pagecount){
			$conn = DBUtil::getConn();
			$sql="update wechat_gamepeo set isdel = 0 ";
			$pre = $conn->prepare($sql);
			$pre->execute();
			$sql ="select * from wechat_gamepeo where isdel = 0";
			$countsql = "select count(*) from ({$sql}) as c";
			$pre = $conn->prepare($countsql);
			$pre->execute();
			$row = $pre->fetch();
			$count = $row[0];
			if(empty($count)){
				$count = 1;
			}
			$sql = $sql." limit {$curpos},{$pagecount}";
			$pre = $conn->prepare($sql);
			$pre->execute();
			$arrs = $pre->fetchAll();
			
			$sql = "select * from wechat_reply where type = 3";
			$pre = $conn->prepare($sql);
			$pre->execute();
			$thekey = $pre->fetchAll();					
			$re = array("data"=>$arrs,"count"=>$count,"reply"=>$thekey);
			return $re;	
		}
		
		//点击开始获取抽奖人列表
		public function getname(){
			$conn = DBUtil::getConn();
			$sql = "select uname from wechat_gamepeo where isdel = 0";
			$pre = $conn->prepare($sql);
			$arrs = array();
			$pre->execute($arrs);
			
			return $pre->fetchAll();
		}
		
		//添加游戏关键字
		public function doaddkey(){
			$conn = DBUtil::getConn();
			$conn->beginTransaction();
			try{
				$sql = "update wechat_reply set thekey = ? where type = 3";
				$pre = $conn->prepare($sql);
				$arr1 = array();
				$arr1[]="{$_POST["thekey"]}";
				$pre->execute($arr1);
				$sql = "update wechat_reply set content = ? where type = 3";
				$pre = $conn->prepare($sql);
				$arr2 = array();
				$arr2[]="{$_POST["content"]}";
				$pre->execute($arr2);
				$conn->commit();
				return true;
			}catch(Exception $e) {
				$conn->rollBack();
				return false;
			}	
		}
		
		
		
		
		//根据ID获得该条资讯的全部信息
		public function getNewsById($nid){
			$conn = DBUtil::getConn();
			$sql = "select * from news where n_id=?";
			$pre = $conn->prepare($sql);
			$arrs = array();
			$arrs[]=$nid;
			$pre->execute($arrs);
					
			$arr = array();
			while($row = $pre->fetch(PDO::FETCH_ASSOC)){
				$arr[]=$row;
			}
			return $arr;
		}
		
		//获取原关键字回复信息
		public function getReplyRule(){
			$conn = DBUtil::getConn();
			$sql="select * from wechat_reply where rid = ?";
			$arr = array();
			$arr[] = "{$_POST["rid"]}";
			$pre = $conn->prepare($sql);
			$pre->execute($arr);
			$arr = $pre->fetchAll();
			return Array("data"=>$arr);
		}
			
		//删除多个关键字回复信息	
		public function delsomekey(){
			$conn = DBUtil::getConn();
			
			$arr=explode(",",$_POST["rids"]);
			$ridNum=count($arr);
			$ridOne='?';
			for($i=0;$i<$ridNum-1;$i++){
				$ridOne=$ridOne.',?';
			}
			$sql="update wechat_reply set isdel = 1 where rid in ({$ridOne})";
			$pre = $conn->prepare($sql);
			return $pre->execute($arr);
		}	
			
		//删除一个关键字回复信息
		public function delakey(){
			$conn = DBUtil::getConn();
			$sql="update wechat_reply set isdel = 1 where rid = ?";
			$arr = array();
			$arr[] = "{$_POST["rid"]}";
			$pre = $conn->prepare($sql);
			return $pre->execute($arr);
		}
		
		//获取所有自动回复信息
		public function getinfo($curpos,$pagecount){
			$conn = DBUtil::getConn();
			$sql="select * from wechat_reply where type = 2 and isdel = 0";
			$arrs = array();
			if( !empty($_POST["thekey"]) ) {
				$sql .= " and thekey like ?";
				$arrs[] = "%{$_POST["thekey"]}%";
			}
			
			if( !empty($_POST["aid"]) ) {
				$sql .= " and aid like ?";
				$arrs[] = "%{$_POST["aid"]}%";
			}
			$countsql = "select count(*) from ({$sql}) as c";
			$pre = $conn->prepare($countsql);
			$pre->execute($arrs);
			$row = $pre->fetch();
			$count = $row[0];
			if(empty($count)){
				$count = 1;
			}
			$sql = $sql." limit {$curpos},{$pagecount}";
			$pre = $conn->prepare($sql);
			$pre->execute($arrs);
			$arrs = $pre->fetchAll();
			//获取被关注回复信息
			$sql="select * from wechat_reply where type = 0";
			$arr1 = array();
			$pre = $conn->prepare($sql);
			$pre->execute($arr1);
			$arr1 = $pre->fetchAll();
			//获取非关键字回复信息
			$sql="select * from wechat_reply where type = 1";
			$arr2 = array();
			$pre = $conn->prepare($sql);
			$pre->execute($arr2);
			$arr2 = $pre->fetchAll();
								
			$re = array("data"=>$arrs,"data1"=>$arr1,"data2"=>$arr2,"count"=>$count);
			return $re;	
			
		} 
		//获取被关注或非关键字回复信息
		public function getnokeyinfo(){
			$conn = DBUtil::getConn();
			$sql = "select * from wechat_reply where rid = ?";
			$pre = $conn->prepare($sql);
			$arr = array();
			$arr[]="{$_POST["rid"]}";
			$pre->execute($arr);
			$arr = $pre->fetchAll();
			//$re = array("data"=>$arr);
			return Array("data"=>$arr);
			//return $re;
		}
		
		//编辑回复信息
		public function updateinfo(){
			$conn = DBUtil::getConn();
			$conn->beginTransaction();
			try{
				$sql = "update wechat_reply set content = ? where rid = ?";
				$pre = $conn->prepare($sql);
				$arr = array();
				$arr[]="{$_POST["content"]}";
				$arr[]="{$_POST["rid"]}";
				$pre->execute($arr);
				$conn->commit();
				return true;
			}catch(Exception $e) {
				$conn->rollBack();
				return false;
			}	
			
		}
		//添加关键字回复信息
		public function doaddkeyinfo(){
			$conn = DBUtil::getConn();
			$sql="insert into wechat_reply values(default,2,?,?,?,0)";
			$pre = $conn->prepare($sql);
			$arrs = array();
			$arrs[]="{$_POST["keyword"]}";
			$arrs[]="{$_POST["content"]}";
			$arrs[]="{$_SESSION["admin"]["code"]}";
			$pre->execute($arrs);
			$count = $pre->rowCount();
			if( $count==1){
				return true;
			}else{
				return false;
			}
		}
		
		//验证关键字
		public function checkkey(){
			$conn = DBUtil::getConn();
			$sql="select count(*) from wechat_reply where thekey = ? and isdel=0";
			$pre = $conn->prepare($sql);
			$arrs = array();
			$arrs[]="{$_POST["keyword"]}";
			$pre->execute($arrs);
			$row = $pre->fetch();
			$rows = $row[0];
			return $rows;
		}	
	}