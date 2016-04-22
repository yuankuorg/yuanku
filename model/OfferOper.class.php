<?php
	class OfferOper extends Oper{
		/**
		 * 查询任务表显示出来
		 * 状态0为待解决
		 * 状态1为已解决
		 */
		public function getTask($start,$count){
			$conn = DBUtil::getConn();
			$sql = "select st.*,v.name,v.img from vip v,study_task st where v.id = st.vid order by st.releasetime desc limit {$start},{$count}";
			$pre = $conn->prepare($sql);
			$pre->execute();
			return $pre->fetchall();
		}
		
		//点击搜索后模糊查找
		public function searchMes($start,$count){
			$conn = DBUtil::getConn();
			$arr = array();
			$sql = "select st.*,v.name,v.img from vip v,study_task st where v.id = st.vid and st.title regexp ? order by st.releasetime desc limit {$start},{$count}";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_POST["title"]));
			return $pre->fetchall();
		}
		
		//根据id将会员发布的任务显示出来
		public function getMyTask($start,$count){
			$conn = DBUtil::getConn();
			$sql = "select * from study_task where vid = ? order by releasetime desc limit {$start},{$count}";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_SESSION["vip"]["id"]));
			$data = $pre->fetchall();
			
			//查找我发布过任务的数量
			$sql1 = "select count(*) from study_task where vid = ?";
			$pre = $conn->prepare($sql1);
			$pre->execute(array($_SESSION["vip"]["id"]));
			$row = $pre->fetch();
			$count = $row[0];
			return array("data"=>$data,"count"=>$count);
		}
		
		//将发布的任务增加进数据库 并且扣除积分
		public function addoffer(){
			$conn = DBUtil::getConn();
			try{
				$conn->beginTransaction();
				$sql = "insert into study_task values(default,?,now(),?,?,0,?)";
				$pre = $conn->prepare($sql);
			    $pre->execute(array($_SESSION["vip"]["id"],$_POST["content"],$_POST["rewardpoints"],$_POST["title"]));
				
				//减分
				$exchange = -$_POST["rewardpoints"];
				$content = $_SESSION["vip"]["name"] . "发布悬赏任务<" . $_POST["title"]. ">,扣除" . abs($exchange)."积分"; 
				$this->changeExchange($conn, Oper::$DYNTYPE["task"], $content ,$_SESSION["vip"]["id"] ,$exchange);
				
				$conn->commit();
				return true;
			} catch(Exception $e){
				$conn->rollBack();
		 		echo $e->getMessage();
				return false;
		 	}
		}
		
		//将任务详情显示出来
		public function showOffer(){
			//显示的时候把所有的都查询了
			$conn = DBUtil::getConn();
			$sql = "select st.*,v.img,v.name from study_task st,vip v where st.taskid = ? and st.vid = v.id";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_POST["taskid"]));
			$mydata = $pre->fetch();
			
			//将所有的评论度按时间排序显示出来
			$sql = "select sc.*,v.img,v.name from study_taskrec sc,vip v where sc.vid = v.id and sc.taskid = ? order by datetime desc";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_POST["taskid"]));
			$alldata = $pre->fetchall();
			
			//统计有多少条评论
			$sql2 = "select count(*) from study_task st ,study_taskrec sc where sc.taskid = st.taskid and st.taskid = ?";
			$pre = $conn->prepare($sql2);
			$pre->execute(array($_POST["taskid"]));
			$count = $pre->fetch(PDO::FETCH_ASSOC);
			return array("mydata"=>$mydata,"alldata"=>$alldata,"count"=>$count["count(*)"]);
		}

		//找到发布悬赏人剩余的积分
		public function seachExchange(){
			$conn = DBUtil::getConn();
			$sql = "select exchange from vip where id = ? ";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_SESSION["vip"]["id"]));
			$row = $pre -> fetch();
			return $row[0];

		}
		/**
		 * 将恢复的任务写进数据库
		 * 0表示未采纳
		 * 1表示采纳
		 * 采纳的时候任务才解决
		 */
		 public function taskRec(){
			$conn = DBUtil::getConn();
			$sql = "insert into study_taskrec values(default,?,?,?,now(),0)";
			$pre = $conn->prepare($sql);
			return $pre->execute(array($_SESSION["vip"]["id"],$_POST["taskid"],$_POST["reply"]));
		}
		 
		 //采纳时操作数据库，改变任务的状态，改变任务回复的状态，最后再改变积分
		 public function adopted(){
		 	$conn = DBUtil::getConn();
		 	try{
		 		$conn->beginTransaction();
		 		//更改任务的状态
		 		$sql = "update study_task set state = 1 where taskid = ?";
				$pre = $conn->prepare($sql);
			    $task = $pre->execute(array($_POST["taskid"]));
				
				//更改回复任务的采纳状态
				$sql = "update  study_taskrec set adopted = 1 where taskid = ? and vid = ? and trid = ?";
				$pre = $conn->prepare($sql);
			    $taskrec = $pre->execute(array($_POST["taskid"],$_POST["vid"],$_POST["trid"]));
				
				//找到任务发布者，找到悬赏的积分
				$sql = "select st.*,v.name from study_task st ,vip v where st.taskid = ? and st.vid = v.id";
				$pre = $conn->prepare($sql);
				$pre->execute(array( $_POST["taskid"] ));
				$taskVip = $pre->fetch();
				
				//找到被采纳的会员
				$sql = "select * from vip where id = ?";
				$pre = $conn->prepare($sql);
				$pre->execute(array( $_POST["vid"] ));
				$vip = $pre->fetch();
				if( !$task && !$taskrec && ! $taskVip) {
					$conn->rollBack();
					return false;
				}
				
				//加分
				$content = $vip["name"] . "成功解决了" . $taskVip["name"] . "发布的任务，获得" . $taskVip["rewardpoints"]."积分"; 
				$this->changeExchange($conn, Oper::$DYNTYPE["task"], $content , $vip["id"], $taskVip["rewardpoints"]);
				
				$conn->commit();
				return true;
				
		 	} catch(Exception $e){
		 		$conn->rollBack();
		 		echo $e->getMessage();
				return false;
		 	}
		 }
}