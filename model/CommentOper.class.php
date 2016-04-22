<?php
	class CommentOper{
		//获取所有评论及回复
		public function getallComment($curpos,$pagecount){
			$conn=DBUtil::getConn();
			//获取所有评论及回复的第一条
			$sql = "select c.cid,c.n_id,c.cname,c.ctext,c.ctime,rid,r.rtext,r.code from comment c left join (select * from reply where isdel = 0 group by cid)r on (c.cid = r.cid) where c.isdel = 0";
			
			$arrs = array();
			//搜索，按照文章ID，微信号，最小时间，最大时间
			if( !empty($_POST["n_id"])){
				$sql=$sql." and c.n_id like ? ";
				$arrs[]="%{$_POST["n_id"]}%";
			}			
			
			if( !empty($_POST["cname"])){
				$sql=$sql." and c.cname like ? ";
				$arrs[]="%{$_POST["cname"]}%";
			}
			
			if( !empty($_POST["minaddtime"]) && !empty($_POST["maxaddtime"]) ) {				
				$sql =$sql. " and c.ctime between ? and ? ";				
				$arrs[]="{$_POST["minaddtime"]}";
				$arrs[]="{$_POST["maxaddtime"]}";
			} else if( empty($_POST["minaddtime"]) && !empty($_POST["maxaddtime"]) ) {
				$sql =$sql. " and c.ctime <= ? ";			
				$arrs[]="{$_POST["maxaddtime"]}";
			} else if( !empty($_POST["minaddtime"]) && empty($_POST["maxaddtime"]) ) {
				$sql =$sql. " and c.ctime >= ? ";				
				$arrs[]="{$_POST["minaddtime"]}";
			}
			//获取输出的评论的数量
			$countsql = "select count(*) from ({$sql}) as c ";	

			$stmt = $conn->prepare($sql);
			$stmt->execute($arrs);
			$count = $stmt->rowCount();
			
			//没有评论的话，数量为0，就设置数量为1，那么页数为1
			if(empty($count)){
				$count = 1;
			}
			
			$sql = $sql." order by c.cid desc limit {$curpos},{$pagecount}";
			$stmt = $conn->prepare($sql);
			$stmt->execute($arrs);
			//查询错误
			if(!$stmt){
				print_r($conn->errorInfo());
				exit();
			}

			$arr = array();
			//将结果集遍历放在数组
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$arr[]=$row;
			}
			//二维数组
			$re = array("data"=>$arr,"count"=>$count);
			return $re;
		}
		//进入回复页，上半部分是要回复的评论，下半部分是回复部分
		public function commentReply(){
			$conn=DBUtil::getConn();
			//获取评论，文章ID n_id,微信号 cname,评论内容 ctext,评论时间 ctime
			$sql = "select * from comment where cid = ? ";
			$stmt = $conn->prepare($sql);
			$stmt->execute(array($_POST["cid"]));
			$comm = $stmt->fetchAll();
			if(!$comm){
				return false;
			}
			
			//获取评论的回复
			$sql = "select * from reply where isdel = 0 and cid = ? ";			
			$stmt = $conn->prepare($sql);
			$stmt->execute(array($_POST["cid"]));
			
			$rep = array();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$rep[]=$row;
			}	
			
			$data = array("comm" => $comm,"rep" => $rep);
			return $data;
		}
		//添加回复，回复只有新增，没有修改
		public function docommentReply(){
			$conn=DBUtil::getConn();
			
			$conn->beginTransaction();//开始事务
			//新增，插入 ，按照reply表rid,cid,code,rtext,rtime时间为提交的now(),0
			foreach ($_POST["reply"] as $val) {
				$sql = "insert into reply values(default,?,?,?,now(),0)";				
				
				$stmt = $conn->prepare($sql);
				$stmt->execute(array($_POST["cid"],$val["code"],$val["rtext"]));
				
				if (!$stmt){
					$conn->rollBack();//执行中有错误，或取消，可以回滚，则在开始事务后的操作会被全部取消
					echo "\nPDO::errorInfo():\n";
					print_r($stmt->errorInfo());//输出错误信息
					return false;
				}
			}
			
			$conn->commit();
			return true;
			
		}
		//删除已有的回复，假删，仍存在数据库，isdel = 0/1 存在/已删除
		public function delreply(){
			$conn=DBUtil::getConn();
			$sql = "update reply set isdel = 1 where rid=? ";
			
			$stmt = $conn->prepare($sql);
			$stmt->execute(array($_POST["rid"]));
			
			//一条条删除，不是批量删除，影响的行数为1
			if($stmt->rowCount() == 1){
				return true;
			}else{
				return false;
			}			
		}
		//删除评论，假删，仍存在数据库，isdel = 0/1 存在/已删除
		public function delcomment(){
			$conn=DBUtil::getConn();
			$sql = "update comment set isdel = 1 where cid=? ";
			
			$stmt = $conn->prepare($sql);
			$stmt->execute(array($_POST["cid"]));

			//一条条删除，不是批量删除，影响的行数为1	
			if($stmt->rowCount() == 1){
				return true;
			}else{
				return false;
			}
		}
		//批量删除，多条评论同时删除
		public function batchdelComment(){
			$conn = DBUtil::getConn();
			$in = implode(',', $_POST["ids"]);
			$sql = "update comment set isdel = 1 where cid in ($in) ";	
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			
			if($stmt){
				return true;
			}else{
				return false;
			}				
		}
	}
?>