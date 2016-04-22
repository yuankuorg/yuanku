<?php
	class JifenOper extends Oper{
		//获取商品兑换人列表
		public function getAllexchange() {
			$conn = DBUtil::getConn();
			$sql = "select * from study_exchange se,study_commodity sc,vip v where se.pid = ? and se.pid = sc.pid and se.vid = v.id";
			$pre = $conn->prepare($sql);
			$pre->execute( array($_POST["pid"]) );
			return $data = $pre->fetchAll();
		}
		
		//后台获取数据库的商品信息
		public function Showchange () {
			$conn = DBUtil::getConn();
			$sql = "select * from study_commodity sc";
			$pre = $conn->prepare($sql);
			$pre->execute();
			return $data = $pre->fetchAll();
		}
		//用于增加
		public function Doaddchange(){
			$conn = DBUtil::getConn();
			$sql = "insert into study_commodity values(default,?,?,?,now(),?,?,?)";
			$pre = $conn->prepare($sql);
			return $pre->execute(array($_POST["commoname"],$_POST["exchange"],$_POST["imgurl"],$_POST["yorn"],$_POST["people"],$_POST["description"]));
		}
		//用于删除
		public function delchange(){
			$conn = DBUtil::getConn();
			$sql="delete from study_commodity where pid = ?";
			$pre = $conn->prepare($sql);
			return $pre = $pre->execute(array($_POST["pid"]));
		}
		//用于获取Pid
		public function getchangeById(){
			$conn = DBUtil::getConn();
			$sql = "select * from study_commodity where pid = ?";
			$pre = $conn->prepare($sql);
			$arrs = array();
			$arrs[]="{$_POST["pid"]}";
			$pre->execute($arrs);
			$data = $pre->fetch();	
			return $data;
		}
		
//		用于修改商品
		public function updatechange(){
			$conn = DBUtil::getConn();
			try{
				$conn->beginTransaction();
				
				$sql = "update study_commodity set commoname=?,exchange=?,pricture=?,yorn=?,people=?,description=? where pid = ?";
				$pre = $conn->prepare($sql);
				$arrs = array();
				$arrs[]="{$_POST["commoname"]}";
				$arrs[]="{$_POST["exchange"]}";
				$arrs[]="{$_POST["imgurl"]}";
				$arrs[]="{$_POST["yorn"]}";
				$arrs[]=$_SESSION["admin"]["name"];
				$arrs[]="{$_POST["description"]}";
				$arrs[]="{$_POST["pid"]}";
				$pre->execute($arrs);
				$count = $pre->rowCount();
				
				if($conn->commit()){
					return true;
				}else{
					return false;
				}
			}catch(Exception $e) {
				if ($conn->isTransactionActive())  // this function does NOT exist
			    $conn->rollBack();
			}
		}
	}