<?php
	class ThirdOper{
		//点赞增加
		public function addZanNum(){
			$conn=DBUtil::getConn();
			$sql='update news set zan=? where n_id=?';
			$pre=$conn->prepare($sql);
			$pre->execute(array($_POST['zan'],$_POST['id']));
		}
		//isdel = 0/1   存在/删除
		public function getNewsContent(){
			$conn=DBUtil::getConn();
			//获取资讯标题内容
			$sql = "select n_id,n_title,n_content,addtime from news where isdel = 0 and n_id = ?";
			$stmt = $conn->prepare($sql);
			$stmt->execute(array($_GET["n_id"]));
			$news = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$sql = "select c.cid,c.n_id,c.cname,c.ctext,c.ctime,rid,r.rtext,r.code,r.rtime from comment c left join (select * from reply where isdel = 0 group by cid)r on (c.cid = r.cid) where c.isdel = 0 and c.n_id = ? order by c.ctime desc limit 0,20";
			$stmt = $conn->prepare($sql);
			$stmt->execute(array($_GET["n_id"]));
						
			$comm = array();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$comm[]=$row;
			}
			
			$data = array("news" => $news,"comm" => $comm);
			return $data;
		}
		//提交评论后
		public function finishComment(){
			$conn=DBUtil::getConn();
			//资讯id
			$news = array();
			$news["n_id"] = $_POST["n_id"];

			$sql = "select c.cid,c.n_id,c.cname,c.ctext,c.ctime,rid,r.rtext,r.code,r.rtime from comment c left join (select * from reply where isdel = 0 group by cid)r on (c.cid = r.cid) where c.isdel = 0 and c.n_id = ? order by c.ctime desc limit 0,20";
			$stmt = $conn->prepare($sql);
			$stmt->execute(array($_POST["n_id"]));
						
			$comm = array();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$comm[]=$row;
			}
			
			$data = array("news" => $news,"comm" => $comm);
			return $data;
		}
		
		//添加用户发表的评论
		public function sendComment(){		
			$conn=DBUtil::getConn();
			//comment表 :cid,n_id,cname,ctext,ctime,isdel
			$sql = "insert into comment values(default,?,?,?,now(),0)";
			
			$stmt = $conn->prepare($sql);
			$stmt->execute(array($_POST["n_id"],$_POST["cname"],$_POST["ctext"]));			
			
			if(!$stmt){
				print_r($conn->errorInfo());
				exit();
			}else{
				return true;
			}	
		}
	}