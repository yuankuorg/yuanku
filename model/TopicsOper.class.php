<?php
//这是操作数据库custom的类
class TopicsOper{
	//执行增加话题的代码,这里既要向topic表insert，又要向topics_news表insert
	public function addTopics(){
		$conn = DBUtil::getConn();
		try {
			$conn->beginTransaction();
			$sql="insert into topic values(
			default,
			'{$_POST["t_title"]}',
			'{$_POST["t_description"]}',
			'{$_POST["tc_id"]}',
			'{$_POST["t_img"]}',
			'{$_POST["p_nid"]}',
			'{$_SESSION["admin"]["code"]}',
			now(),0)";
			$count = $conn->exec($sql);
			$t_id=$conn->lastInsertId();
			$arr = $_POST["topics_newsnums"];
			foreach ($arr as $item) {
				$sql2="insert into topics_news values(
				default,
				$t_id,
				{$item['n_id']})";
				$conn->exec($sql2);
			}
			
			if($conn->commit()){
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			if ($conn->isTransactionActive())  // this function does NOT exist
		    $conn->rollBack();
		}
	}	
	
	//用于执行话题修改
	public function updateTopic(){
		$conn = DBUtil::getConn();
		try{
			$conn->beginTransaction();
			
			$sql = "update topic set t_title=?,t_description=?,tc_id=?,t_img=?,p_nid=? where t_id = ?";
			$pre = $conn->prepare($sql);
			$arrs = array();
			$arrs[]="{$_POST["tc_name"]}";
			$arrs[]="{$_POST["tc_description"]}";
			$arrs[]="{$_POST["tc_id"]}";
			$arrs[]="{$_POST["imgurl"]}";
			$arrs[]="{$_POST["p_nid"]}";
			$arrs[]="{$_POST["t_id"]}";
			$pre->execute($arrs);
			$count = $pre->rowCount();
			
			foreach( $_POST["topics_newsnums"] as $nums ) {
				if(empty($nums["tn_id"])){
					$sql = "insert into topics_news values(default,?,?)";
					$pre = $conn->prepare($sql);
					$pre->execute(array($_POST['t_id'],$nums['n_id']));
				}
			}
			
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
	
	//用于在话题管理页面获得数据库中有效的话题类别信息
	public function searchTopic($curpos,$pagecount){
		$conn = DBUtil::getConn();
		$sql="select t_id,t_title,t_description,t_img,t.tc_id,t.addtime,t.code,tc_name
		from topic t,topicclass tc
		where t.tc_id=tc.tc_id 
		and t.isdel=0";
		$arrs = array();
		//按照话题类别搜索
		if( !empty($_POST["tc_id"]) ){
			$sql=$sql." and t.tc_id = ?";
			$arrs[]="{$_POST["tc_id"]}";
		}
		if( !empty($_POST["t_title"]) ){
			$sql=$sql." and t_title like ?";
			$arrs[]="%{$_POST["t_title"]}%";
		}
		if( !empty($_POST["code"]) ){
			$sql=$sql." and code like ?";
			$arrs[]="%{$_POST["code"]}%";
		}
		
		//添加日期 starttime endtime
		if( !empty($_POST["starttime"]) && !empty($_POST["endtime"]) ){
			$sql=$sql." and t.addtime between ? and ?";
			$arrs[]="{$_POST["starttime"]}";
			$arrs[]="{$_POST["endtime"]}";
		}else if( !empty($_POST["starttime"]) && empty($_POST["endtime"] )){
			$sql=$sql." and t.addtime>=?";
			$arrs[]="{$_POST["starttime"]}";
		}else if( empty($_POST["starttime"]) && !empty($_POST["endtime"] )){
			$sql=$sql." and t.addtime<=?";
			$arrs[]="{$_POST["endtime"]}";
		}

		$countsql = "select count(*) from ({$sql}) as c ";	

		$pre = $conn->prepare($sql);
		$pre->execute($arrs);
		$count = $pre->rowCount();
		
		if(empty($count)){
			$count = 1;
		}
		
		$sql = $sql." order by addtime desc";
		$sql = $sql." limit {$curpos},{$pagecount}";
		$pre = $conn->prepare($sql);
		$pre->execute($arrs);
		
		if(!$pre){
			print_r($conn->errorInfo());
			exit();
		}

		$arr = array();
		while($row = $pre->fetch(PDO::FETCH_ASSOC)){
			$arr[]=$row;
		}		
					
		$re = array("data"=>$arr,"count"=>$count);
		return $re;		
	}
	
	//用于进入修改话题页面根据ID获得该条话题的全部信息,
	//这里不仅要查topic表，还要查topics_news关系表与news表
	public function getTopicById(){
		$conn = DBUtil::getConn();
		$sql = "select t_id,t_title,t_description,t_img,p_nid,
		 tc.tc_id,tc_name
		from topic t,topicclass tc 
		where t_id=? and t.tc_id=tc.tc_id";
		
		$pre = $conn->prepare($sql);
		$arrs = array();
		$arrs[]="{$_POST["t_id"]}";
		$pre->execute($arrs);
				
		$arr = array();
		while($row = $pre->fetch(PDO::FETCH_ASSOC)){
			$arr[]=$row;
		}
		$sql2 = "select tn.tn_id,n.n_id, n_title,n_img,n_content 
		from topics_news tn,news n
		where tn.t_id=? and tn.n_id=n.n_id";
		
		$pre = $conn->prepare($sql2);
		$arrs2 = array();
		$arrs2[]="{$_POST["t_id"]}";
		$pre->execute($arrs2);
				
		$news = array();
		while($row = $pre->fetch(PDO::FETCH_ASSOC)){
			$news[]=$row;
		}

		$data=array("news"=>$news,"topic"=>$arr);
		return $data;
	}
	
	
	//用于删除话题
	public function delTopic(){
		$conn = DBUtil::getConn();
		$sql="update topic set isdel=1 where t_id=?";
		$pre = $conn->prepare($sql);
		$arrs = array();
		$arrs[]="{$_POST["t_id"]}";
		$pre->execute($arrs);
		$count = $pre->rowCount();		
		
		if( $count==1){
			return true;
		}else{
			return false;
		}
	}
	
	//用于批量删除资讯,这里暂时用？的会有问题，只能删除第一条记录
	public function batchDelTopic(){
		$conn = DBUtil::getConn();
		$sql="update topic set isdel=1 where t_id in ({$_POST["tids"]})";
		$count = $conn->exec($sql);
		if( $count>=1){
			return true;
		}else{
			return false;
		}			
	}
	
//用于获得话题类别的下拉框	
	public function getAllTopicClass(){
		$conn = DBUtil::getConn();
		$sql = "select tc_id,tc_name from topicclass where isdel=0";	
		$pre = $conn->prepare($sql);
		$pre->execute(array());
		$arr = $pre->fetchAll();
		return $arr;	
	}
	//删除话题中的资讯
	public function delTopics_News(){
		$conn = DBUtil::getConn();
		$sql="delete from topics_news where n_id=? and t_id = ? ";
		$pre = $conn->prepare($sql);
		$pre->execute(array($_POST["n_id"],$_POST["t_id"]));
		$count = $conn->exec($sql);
		if( $count == 1){
			return true;
		}else{
			return false;
		}	
	}
}
?>