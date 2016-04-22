<?php
	 class JifenVipOper extends Oper{
		//获取商品信息
		public function getcommodity( $start,$count ){
			$conn = DBUtil::getConn();
			$sql = "select * from study_commodity where yorn = 0 order by addtime desc limit {$start},{$count}";
			$pre = $conn->prepare($sql);
			$pre->execute();
			return $pre->fetchAll();			
		}
		
		//获取当前用户信息
		public function getChengeTotal() {
			$conn = DBUtil::getConn();
			$sql = "select * from vip where id=?";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_SESSION["vip"]["id"]));
			return $pre->fetch();			
		}
		
		public function goIngExchange(){
			$conn = DBUtil::getConn();
			$conn->beginTransaction();
			$result = array();
			try {
				$exchange = $_POST["exchange"];
				$vid = $_SESSION["vip"]["id"];
				$ret = $this->changeExchange($conn,Oper::$DYNTYPE["exchange"], "兑换商品，扣除". $exchange ."积分", $vid, -$exchange);
				if($ret == false) {
					$conn->rollBack();
					$result["code"] = 1; // 积分不足
					return $result;
				} else {
					$sql = "insert into study_exchange values(default,?,?,now())";
					$pre = $conn->prepare($sql);
					$pre->execute(array( $_SESSION["vip"]["id"],$_POST["pid"]) );
					$result["code"] = 0; //兑换成功
					$conn->commit();
					return $result;
				}
			} catch (Exception $e) {
				$conn->rollBack();
				$result["code"] = 2;//操作失败
				return $result;
			}
		}
		
		//用于查询已兑换的商品
		public function getChengeData( $start,$count ) {
			$conn = DBUtil::getConn();
			$sql = "select se.extime,sc.* from study_exchange se,study_commodity sc where se.pid = sc.pid and se.vid = ? order by se.extime desc limit {$start},{$count}";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_SESSION["vip"]["id"]));
			return $data = $pre->fetchAll();
		}
		
		
	}
