<?php
	class ChuangvipOper extends Oper{		
		//获取闯关科目的所有数据
		public function getproject(){
			$conn = DBUtil::getConn();
			$sql = "select * from study_project";
			$pre = $conn->prepare($sql);
			$pre->execute($arr);
			return $pre->fetchAll(PDO::FETCH_ASSOC);		
		}
		
		//根据ID获取科目
		public function getProjectByID(){
			$conn = DBUtil::getConn();
			$sql = "select * from study_project where pid = ?";
			$pre = $conn->prepare($sql);
			
			$pre->execute(array($_POST["pid"]));
			return $pre->fetch(PDO::FETCH_ASSOC);		
		}
		
		//通过pid找到查询关卡
		public function seachChapter(){
			$conn = DBUtil::getConn();
			$sql = "select * from study_chapter sc,study_project sp where sc.project = sp.pid and sp.pid = ?";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_POST["pid"]));
			return  $pre->fetchAll();			
		}
		
		//获取关卡资料
		public function getchapter(){
			$conn = DBUtil::getConn();
			
			$sql1 = "select * from study_chapter where cid = ?";
			$pre = $conn->prepare($sql1);
			$pre->execute(array($_POST["cid"]));
			$chapter = $pre->fetch();
			
			return $chapter;
		}
		
		//点击后需要扣除积分
		public function deductExchange(){
			$conn = DBUtil::getConn();
			$conn->beginTransaction();
			$sign = array();
			$score = -$_POST["score"];
			$vid   = $_SESSION["vip"]["id"];
			try {
				if($this->changeExchange($conn,Oper::$DYNTYPE["chuang"], "开始闯关，扣除".abs($score)."积分", $vid, $score)){
					$sql2 = "insert into study_chuang values(default,?,?,?,?)";
					$pre = $conn->prepare($sql2);
					$pre->execute(array($_SESSION["vip"]["id"],$_POST["cid"],Oper::$CHANGESTATE["init"],$_POST["project"]));
					$sql1 = "insert into study_chuangstate values(default,?,now(),?,0,1,'开始闯关')";
					$pre = $conn->prepare($sql1);
					$pre->execute(array($_POST["cid"],$_SESSION["vip"]["id"]));
					
				 	$conn->commit();
					return $sign["code"] = 0;
				}else{
				 	$conn->rollBack();
					$sign["code"] = 1;
					return $sign;
				}
			} catch (Exception $e) {
				$conn->rollBack();
				$sign["code"]= 2;
				echo $e->getMessage();
				return $sign;
			}
		}
		
		//状态改变
		public function changeState( $sid, $content ){
			$conn = DBUtil::getConn();
			
			$conn->beginTransaction();
			try{
				$sql2 = "update study_chuang set sid = ? where vid = ? and cid = ?";
				$pre = $conn->prepare($sql2);
				$pre->execute( array($sid,$_SESSION["vip"]["id"],$_POST["cid"]) );
				
				$sql1 = "insert into study_chuangstate values(default,?,now(),?,0,?,?)";
				$pre = $conn->prepare($sql1);
				$pre->execute(array( $_POST["cid"],$_SESSION["vip"]["id"],$sid,$content ));
				
				$conn->commit();
				return true;
			} catch(Exception $e) {
				$conn->rollBack();
				return false;
			}
		}
		
		/**
		 * 获取当会员对于关卡的状态
		 * 如果已有数据，返回true
		 * 如果没有数据，返回false
		 */
		public function seachChuangstate(){
			$conn = DBUtil::getConn();
			$sql = "select sid from study_chuang where vid = ? and cid = ?";
			$pre = $conn->prepare($sql);
			$pre->execute(array( $_SESSION["vip"]["id"],$_POST["cid"] ));
			$res = $pre->fetch();
			
			if( !empty($res) ) {
				return $res;
			} else {
				return false;
			}
		}
		
		/**
		 * 查询出状态的变化在第三个页面初始化时显示出来
		 * 
		 */
		public function seachChuang(){
			$conn = DBUtil::getConn();
			$sql = "select expl,time from study_chuangstate where vid = ? and cid = ?";
			$pre = $conn->prepare($sql);
			$pre->execute(array( $_SESSION["vip"]["id"],$_POST["cid"] ));
			$res = $pre->fetchall();
			
			if( !empty($res) ) {
				return $res;
			} else {
				return false;
			}
		}
	}