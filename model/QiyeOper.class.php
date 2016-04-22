<?php
	class QiyeOper{
		//增加招聘信息到数据库
		public function addZhaopin(){
			$conn = DBUtil::getConn();
			$sql = "insert into study_employment values(default,?,?,?,?,?,?,now(),?,?,?,?)";
			$state = $conn->prepare($sql);
			
			return $state->execute(array($_POST["company"],$_POST["position"],$_POST["address"],$_POST["experience"],
			              $_POST["degree"],$_POST["pay"],$_POST["responsible"],$_POST["requires"],$_POST["contacts"],$_SESSION["vip"]["id"]));
		}
        //提出数据库中信息 (学生端查看招聘信息)
        public function getZhaopin($start,$count){
        	$conn = DBUtil::getConn();
			$sql = "select v.img,v.name,sem.zid,sem.position,sem.company,sem.address,sem.experience,sem.degree,sem.datetime,sem.pay from study_employment sem,vip v where v.items = 10 and v.id = sem.vid ";
			
			$arr = array();
			if( !empty($_POST["company"]) || !empty($_POST["position"])){
				$sql = $sql." and (sem.company regexp ? or sem.position regexp ?)";
				$arr[] = $_POST["company"];
				$arr[] = $_POST["position"];
			}
			$link = $sql." order by sem.datetime desc limit {$start},{$count}";
			$state = $conn->prepare($link);
			$state ->execute($arr);	
			return $state->fetchAll();
        }
		//提出数据库中信息 (企业端查看招聘信息)
        public function getmyZhaopin($start,$count){
        	$conn = DBUtil::getConn();
			$sql = "select v.img,v.name,sem.zid,sem.position,sem.pay,sem.datetime,sem.company from study_employment sem,vip v where v.items = 10 and v.id = sem.vid order by sem.datetime desc limit {$start},{$count}";
			$state = $conn->prepare($sql);
			$state ->execute();	
			return $state->fetchAll();
        }
		//招聘详情页
        public function getZhaopinMain(){
        	$conn = DBUtil::getConn();
			$sql = "select * from study_employment where zid = ?";
			$state = $conn->prepare($sql);
			$state ->execute( array($_POST["zid"]) );
			return $state->fetch();	
        }
//      //修改功能
		public function getZhaopinByid(){
        	$conn = DBUtil::getConn();
			$sql = "select * from study_employment where zid = ?";
			$state = $conn->prepare( $sql );
			$state ->execute( array($_POST["zid"]) );
			return $state->fetch();
		}
		//修改
		public function updateZhaopin(){
			$conn = DBUtil::getConn();
			$sql = "update study_employment set company = ?,position = ?,address = ?,experience = ?,pay = ?,degree = ?,datetime = now(),responsible = ?,requires = ?,contacts = ? where zid = ?";
			$state = $conn->prepare($sql);
			return $state ->execute(array($_POST["company"],$_POST["position"],$_POST["address"],
			$_POST["experience"],$_POST["pay"],$_POST["degree"],$_POST["responsible"],$_POST["requires"],$_POST["contacts"],$_POST["zid"]));
		}
        //删除
		public function deleZhaopin(){
			 $link = DBUtil::getConn();
			 $sql = "delete from study_employment where zid = ?";
			 $state = $link->prepare($sql);
			 return $state->execute(array($_POST["zid"]) );
		}
		//后台查看招聘信息，搜索并分页
		public function getManaZhaopin($curpos,$pagecount){
        	$conn = DBUtil::getConn();
			$sql = "select * from study_employment where 1=1";
			
			$arrs = array();
			if( !empty($_POST["company"]) ){
				$sql =$sql." and company regexp ?";
				$arrs[]=$_POST["company"];
			}
			if( !empty($_POST["position"]) ){
				$sql =$sql." and position regexp ?";
				$arrs[]=$_POST["position"];
			}
			if( !empty($_POST["minaddtime"]) && !empty($_POST["maxaddtime"]) ) {				
				$sql =$sql. " and datetime between ? and ? ";				
				$arrs[]=$_POST["minaddtime"];
				$arrs[]=$_POST["maxaddtime"];
			} else if( empty($_POST["minaddtime"]) && !empty($_POST["maxaddtime"]) ) {
				$sql =$sql. " and datetime <= ? ";			
				$arrs[]=$_POST["maxaddtime"];
			} else if( !empty($_POST["minaddtime"]) && empty($_POST["maxaddtime"]) ) {
				$sql =$sql. " and datetime >= ? ";				
				$arrs[]=$_POST["minaddtime"];
			}
//			//获取输出的信息数量
			$countsql = "select count(*) from ({$sql}) as c ";	
	
			$pre = $conn->prepare($sql);
			$pre->execute($arrs);
			$count = $pre->rowCount();
			
			if(empty($count)){
				$count = 1;
			}
			
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
        //搜索简历页
        public function getResume($start,$count){
        	$conn = DBUtil::getConn();
			$sql = "select sr.*,v.img from study_resume sr,vip v where v.id = sr.vid";
			
			$arr = array();
			if(!empty($_POST["name"]) ){
				$sql = $sql." and sr.name regexp ? ";
				$arr[] = $_POST["name"];
			}
			
			$sql = $sql . " order by rid desc limit {$start},{$count}";
			$state = $conn->prepare($sql);
			$state->execute($arr);
			return $state->fetchAll();
        }
		//简历详情页
		public function getResumeMain(){
			$conn = DBUtil::getConn();
			$sql = "select * from study_resume where rid = ?";
			$state = $conn->prepare($sql);
			$state->execute(array($_POST["rid"]));
			return $state->fetch();
		}
		
		//增加数据到应聘表
		public function addEntstore(){
			$conn = DBUtil::getConn();
			//先判断当前用户是否用简历
			$sql = "select count(*) from study_resume where vid = ?";
			$state = $conn->prepare($sql);
			$state->execute(array($_SESSION["vip"]["id"]));
			$arr = $state->fetch();
			if( $arr[0] == 0 ) {
				return 1; //用户没有创建简历
			}
			
			$sql = "select count(*) from study_entstore where vid = ? and zid = ?";
			$state = $conn->prepare($sql);
			$state->execute( array($_SESSION["vip"]["id"],$_POST["zid"] ) );
			$arr = $state->fetch();
			if( $arr[0] == 1 ) {
				return 2;//用户已投简历
			}
			
			$sql = "insert into study_entstore values(default,?,?,now())";
			$state = $conn->prepare($sql);
			$flag = $state->execute( array($_SESSION["vip"]["id"],$_POST["zid"] ) );
			if( $flag ) {
				return 4;//投送成功
			} else {
				return 3;//投送失败
			}
		}
		//查看收到的简历
		public function checkResume($start,$count){
			$conn = DBUtil::getConn();
			$sql = "Select v.img,sr.*,sen.addtime from study_employment sem,study_resume sr,vip v,study_entstore sen where sem.zid=sen.zid and sr.vid = v.id and sen.vid=sr.vid and sen.zid=? order by sen.addtime desc limit {$start},{$count}";
			$state = $conn->prepare($sql);
			$state->execute(array($_POST["zid"]));
			return $state->fetchAll();
		}
	}