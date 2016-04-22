<?php
//这是操作
class MobileSecondpageOper{
	//随机码
	public function docheckstatus(){
		$conn = DBUtil::getConn();
		$sql="select tc_id from usertype where ranid = ?";
		$pre = $conn->prepare($sql);
		$pre->execute(array($_GET["r_id"]));
		
		$arr = $pre->fetch();
		if( isset($arr["tc_id"]) ){
			$sql = "delete from usertype where ranid = ?";
			$pre = $conn->prepare($sql);
	    	$res = $pre->execute( array($_GET["r_id"]) );
			
			return $arr["tc_id"];
		}else{
			return false;
		}
	}
	
	//通过tc_id获取items
	public function checkItems(){
		$conn = DBUtil::getConn();
		$sql="select items from topicclass where tc_id = ?";
		$pre = $conn->prepare($sql);
		$pre->execute(array($_GET["tc_id"]));
		
		$arr  = $pre->fetch();
		$items = $arr["items"];
		
		if( $items == 0 ) {
			return true;
		} else {
			return false;
		}
	}
	
//	//查询是否是会员
//	public function huiyuan(){
//			$conn = DBUtil::getConn();
//			$sql="select * from wechat_user where openId=?";
//			$pre = $conn->prepare($sql);
//			$pre->execute(array($_POST['openId']));
//			
//			$data = $pre->fetchAll();
//			if($data){
//				return $data[0];
//			}else{
//				return false;
//			}
//		}
	
	public function GetShixiTopic(){		
		$conn = DBUtil::getConn();
		$sql="select t_id from topic t,topicclass tc where t.isdel=0 and tc_name='我要实习' and t.tc_id=tc.tc_id";		
		$arrs = array();
		$pre = $conn->prepare($sql);
		$pre->execute($arrs);
		$arr = array();
		while($row = $pre->fetch(PDO::FETCH_ASSOC)){
			$arr[]=$row;
		}
		
		$dataset=array();
		foreach ($arr as $topicid) {
			$topicid=(int)$topicid['t_id'];
			$sql = "select t_id,t_title,t_description,t_img,
			 tc.tc_id,tc_name
			from topic t,topicclass tc 
			where t_id=? and t.tc_id=tc.tc_id";
			$pre = $conn->prepare($sql);
			$arrs = array();
			$arrs[]=$topicid;
			$pre->execute($arrs);
			$topic = array();
			while($row = $pre->fetch(PDO::FETCH_ASSOC)){
				$topic[]=$row;
			}
			$sql2 = "select n.n_id, n_title,n_img,n_content 
			from topics_news tn,news n
			where tn.t_id=? and tn.n_id=n.n_id";
			$pre = $conn->prepare($sql2);
			$arrs2 = array();
			$arrs2[]=$topicid;
			$pre->execute($arrs2);
			
			$news=$pre->fetchAll();
			$data=array("news"=>$news,"topic"=>$topic);
			$dataset[]=$data;
		}
		return $dataset;
	}
	
	public function GetPDTopic( $start,$end ){		
		$conn = DBUtil::getConn();
		$sql="select t_id from topic t where t.isdel = 0 and tc_id = ? order by t.addtime desc limit {$start},{$end}";
		$pre = $conn->prepare($sql);//预处理sql语句，可以解决sql被注入攻击的问题
		$pre->execute(array($_POST["tc_id"]));//执行sql语句
		
		$arr = $pre->fetchAll();//取得结果集中的所有行
		
		$dataset=array();
		foreach ($arr as $topicid) {
			$topicid=(int)$topicid['t_id'];
			$sql = "select t_id,t_title,t_description,t_img,
			 tc.tc_id,tc_name
			from topic t,topicclass tc 
			where t_id=? and t.tc_id=tc.tc_id";
			
			$pre = $conn->prepare($sql);
			$arrs = array();
			$arrs[]=$topicid;
			$pre->execute($arrs);
			$topic = $pre->fetchAll();
			
			$sql2 = "select n.n_id, n_title,n_img,n_content,code,addtime
			from topics_news tn,news n
			where tn.t_id=? and tn.n_id=n.n_id";
			
			$pre = $conn->prepare($sql2);
			$arrs2 = array();
			$arrs2[]=$topicid;
			$pre->execute($arrs2);
	
			$news = $pre->fetchAll();
			$dataset[] = array("news"=>$news,"topic"=>$topic);
		}
		return $dataset;
	}
	
	
	public function getTopicById($arr){
		$conn = DBUtil::getConn();
		$dataset=array();
		foreach ($arr as $topicid) {
			$sql = "select t_id,t_title,t_description,t_img,
			 tc.tc_id,tc_name
			from topic t,topicclass tc 
			where t_id=? and t.tc_id=tc.tc_id";
			$pre = $conn->prepare($sql);
			$arrs = array();
			$arrs[]="{(int)$topicid}";
			$pre->execute($arrs);
			$arr = array();
			while($row = $pre->fetch(PDO::FETCH_ASSOC)){
				$arr[]=$row;
			}
			$sql2 = "select n.n_id, n_title,n_img,n_content 
			from topics_news tn,news n
			where tn.t_id=? and tn.n_id=n.n_id";
			$pre = $conn->prepare($sql2);
			$arrs2 = array();
			$arrs2[]="{(int)$topicid}";
			$pre->execute($arrs2);
					
			$news = array();
			while($row = $pre->fetch(PDO::FETCH_ASSOC)){
				$news[]=$row;
			}
			$data=array("news"=>$news,"topic"=>$arr);    		
		}
		$dataset[]=$data;
		return $dataset;
	}
	
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
	
}
?>