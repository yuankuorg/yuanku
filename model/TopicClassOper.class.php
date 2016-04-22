<?php
class TopicClassOper{
	//执行增加话题类别的代码
	public function addTopicClass(){
		$conn = DBUtil::getConn();
		$sql="insert into topicclass values(default,?,?,now(),0,?)";		
		$pre = $conn->prepare($sql);
		$arrs = array();
		$arrs[]="{$_POST["tc_name"]}";
		$arrs[]="{$_POST["tc_description"]}";
		$arrs[]="{$_POST["items"]}";
		$pre->execute($arrs);
		$count = $pre->rowCount();
		if( $count==1){
			return true;
		}else{
			return false;
		}
	}

	//用于在话题类别管理页面获得数据库中有效的话题类别信息
	public function searchTopicClass($curpos,$pagecount){
		$conn = DBUtil::getConn();
		$sql = "select * from topicclass where isdel=0";
		
		$arrs = array();
		if( !empty($_POST["tc_name"]) ){
			$sql=$sql." and tc_name like ?";
			$arrs[]="%{$_POST["tc_name"]}%";
		}
		if( !empty($_POST["tc_description"]) ){
			$sql=$sql." and tc_description like ?";
			$arrs[]="%{$_POST["tc_description"]}%";
		}
			
		//添加日期 starttime endtime
		if( !empty($_POST["starttime"]) && !empty($_POST["endtime"]) ){
			$sql=$sql." and addtime between ? and ?";
			$arrs[]="{$_POST["starttime"]}";
			$arrs[]="{$_POST["endtime"]}";
		}else if( !empty($_POST["starttime"]) && empty($_POST["endtime"] )){
			$sql=$sql." and addtime>=?";
			$arrs[]="{$_POST["starttime"]}";
		}else if( empty($_POST["starttime"]) && !empty($_POST["endtime"] )){
			$sql=$sql." and addtime<=?";
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
	
	//用于进入修改话题类别页面根据ID获得该条话题类别的全部信息	
	public function getTopicClassById(){
		$conn = DBUtil::getConn();
		$sql = "select * from topicclass where tc_id=?";
		$pre = $conn->prepare($sql);
		$arrs = array();
		$arrs[]="{$_POST["tc_id"]}";
		$pre->execute($arrs);
				
		$arr = array();
		while($row = $pre->fetch(PDO::FETCH_ASSOC)){
			$arr[]=$row;
		}
		return $arr;
	}
	
	
	
	//用于执行更新话题类别
	public function updateTopicClass(){
		$conn = DBUtil::getConn();
		$sql = "update topicclass set tc_name=?,tc_description=?,items = ? where tc_id=?";
		$pre = $conn->prepare($sql);
		$arrs = array();
		$arrs[]="{$_POST["tc_name"]}";
		$arrs[]="{$_POST["tc_description"]}";
		$arrs[]="{$_POST["items"]}";
		$arrs[]="{$_POST["tc_id"]}";
		$pre->execute($arrs);
		$count = $pre->rowCount();
		
		if( $count==1){
			return true;
		}else{
			return false;
		}
	}
	
	//用于删除话题类别
	public function delTopicClass(){
		$conn = DBUtil::getConn();
		$sql="update topicclass set isdel=1 where tc_id=?";
		$pre = $conn->prepare($sql);
		$arrs = array();
		$arrs[]="{$_POST["tc_id"]}";
		$pre->execute($arrs);
		$count = $pre->rowCount();		
		
		if( $count==1){
			return true;
		}else{
			return false;
		}
	}
	
	//用于批量删除资讯,这里暂时用？的会有问题，只能删除第一条记录
	public function batchDelTopicClass(){
		$conn = DBUtil::getConn();
		$sql="update topicclass set isdel=1 where tc_id in ({$_POST["tcids"]})";
		$count = $conn->exec($sql);
		if( $count>1){
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
	
}
?>