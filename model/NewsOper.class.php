<?php
//这是操作数据库custom的类
class NewsOper{	
	//执行增加资讯的代码
	public function addNews(){
		$conn = DBUtil::getConn();
		$sql="insert into news values(default,?,?,?,now(),?,0)";
		$pre = $conn->prepare($sql);
		$arrs = array();
		$arrs[]="{$_POST["n_title"]}";
		$arrs[]="{$_POST["n_img"]}";
		$arrs[]="{$_SESSION["admin"]["code"]}";
		$arrs[]="{$_POST["n_content"]}";
		$pre->execute($arrs);
		$count = $pre->rowCount();
		if( $count==1){
			return true;
		}else{
			return false;
		}
	}
	
	//用于在资讯管理页面获得数据库中有效的资讯信息
	public function searchNews($curpos,$pagecount){
		$conn = DBUtil::getConn();
		$sql = "select * from news where isdel=0";
		
		$arrs = array();
		if( !empty($_POST["n_title"]) ){
			$sql=$sql." and n_title like ?";
			$arrs[]="%{$_POST["n_title"]}%";
		}
		if( !empty($_POST["code"]) ){
			$sql=$sql." and code like ?";
			$arrs[]="%{$_POST["code"]}%";
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
	
	//用于进入修改资讯页面根据ID获得该条资讯的全部信息
	public function getNewsById(){
		$conn = DBUtil::getConn();
		$sql = "select * from news where n_id=?";
		$pre = $conn->prepare($sql);
		$arrs = array();
		$arrs[]="{$_POST["n_id"]}";
		$pre->execute($arrs);
				
		$arr = array();
		while($row = $pre->fetch(PDO::FETCH_ASSOC)){
			$arr[]=$row;
		}
		return $arr;
	}
	
	//用于执行更新资讯
	public function updateNews(){
		$conn = DBUtil::getConn();
		$sql = "update news set n_title=?,n_content=?,n_img=?,addtime=now() where n_id=?";
		
		$pre = $conn->prepare($sql);
		$arrs = array();
		$arrs[]="{$_POST["n_title"]}";
		$arrs[]="{$_POST["n_content"]}";
		$arrs[]="{$_POST["n_img"]}";
		$arrs[]="{$_POST["n_id"]}";
		$pre->execute($arrs);
		$count = $pre->rowCount();
		
		if( $count==1){
			return true;
		}else{
			return false;
		}
	}
	
	//用于删除资讯
	public function delNews(){
		$conn = DBUtil::getConn();
		$sql="update news set isdel=1 where n_id=?";
		$pre = $conn->prepare($sql);
		$arrs = array();
		$arrs[]="{$_POST["n_id"]}";
		$pre->execute($arrs);
		$count = $pre->rowCount();
		
		
		if( $count==1){
			return true;
		}else{
			return false;
		}
	}
	
	//用于批量删除资讯,这里暂时用？的会有问题，只能删除第一条记录
	public function batchDelNews(){
		$conn = DBUtil::getConn();
		$sql="update news set isdel=1 where n_id in ({$_POST["nids"]})";
		$count = $conn->exec($sql);
	//$count是影响的行数
		if( $count>1){
			return true;
		}else{
			return false;
		}			
	}
			
}
?>