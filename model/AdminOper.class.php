<?php
	class AdminOper{
		
		public function add(){
				//增管理员
				$conn = DBUtil::getConn();
				$sql="insert into admin values(default,?,?,?,?,0,0)";
				$pre = $conn->prepare($sql);
				$pre->execute(array($_POST['code'],$_POST['name'],md5($_POST['pwd']),$_POST['moblile']));
				$count = $pre->rowCount();
				if( $count==1){
					return true;
				}else{
					return false;
				}
			}
			//查管理员
			public function select($curpos,$pagecount){
				$conn = DBUtil::getConn();
				$sql="select * from admin where isdel=0 and isadmin=0";
				$ar=array();
				if( !empty($_POST["code"]) ){
					$sql=$sql." and code like ?";
					$ar[]="%{$_POST['code']}%";
				}
				if( !empty($_POST["name"]) ){
					$sql=$sql." and name like ?";
					$ar[]="%{$_POST['name']}%";
				}
				$countsql = "select count(*) from ({$sql}) as c";	
				$stmt = $conn->prepare($countsql);
				$stmt->execute($ar);
				$row = $stmt->fetch();
					$count = $row[0];
				if(empty($count)){
					$count = 1;
				}
				$sql = $sql." limit {$curpos},{$pagecount}";
				$stmt = $conn->prepare($sql);
				$stmt->execute($ar);	
				if(!$stmt){
					print_r($conn->errorInfo());
					exit();
				}
				$arr = array();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					$arr[]=$row;
				}
				$re = array("data"=>$arr,"count"=>$count);
				return $re;
			}
			public function getadmin(){
				$conn = DBUtil::getConn();
				$sql="select * from admin where id=?";
				$pre = $conn->prepare($sql);
				$pre->execute(array($_POST['id']));
				
				$data = $pre->fetchAll();
				return $data;
			}
			//改管理员
			public function upadmin(){
				$conn = DBUtil::getConn();
				$sql="update admin set code = ?,name = ?,pwd = ?,moblile = ?where id=?";
				$pre = $conn->prepare($sql);
				$pre->execute(array($_POST['code'],$_POST['name'],md5($_POST['pwd']),$_POST['moblile'],$_POST['id']));
				$count = $pre->rowCount();
				if( $count==1){
					return true;
				}else{
					return false;
				}
			}
			//改超级管理员
			public function mobaladmin(){
				$conn = DBUtil::getConn();
				$sql="update admin set code=?,pwd=? where id=?";
				$pre = $conn->prepare($sql);
				$pre->execute(array($_POST['code'],md5($_POST['pwd']),$_POST['id']));
				$count = $pre->rowCount();
				if( $count==1){
					return true;
				}else{
					return false;
				}
			}
			//修改管理员时比较密码是否正确
			public function pwdcheck(){
				$conn = DBUtil::getConn();
				$sql='select pwd from admin where id=?';
				$pre=$conn->prepare($sql);
				$pre->execute(array($_POST['id']));
				$data=$pre->fetch();
				return $data[0];
			}
			public function pwdadmin(){
				$conn = DBUtil::getConn();
				$sql="update admin set pwd=? where id=?";
				$pre = $conn->prepare($sql);
				$pre->execute(array(md5($_POST['newpwd']),$_POST['id']));
				$count = $pre->rowCount();
				if( $count==1){
					return true;
				}else{
					return false;
				}
			}
			//删管理员
			public function deladmin(){
				$conn = DBUtil::getConn();
				$sql="update admin set isdel=1 where id=?";
				
				$pre = $conn->prepare($sql);
				$pre->execute(array($_POST['id']));
				$count = $pre->rowCount();
				if( $count==1){
					return true;
				}else{
					return false;
				}
			}
			//查超级管理员
			public function seladmin(){
				$conn = DBUtil::getConn();
				$sql="select * from admin where isdel=0 and isadmin=1";
				$res = $conn->prepare($sql);
				$res->execute(array());
				$arr = $res->fetchAll();
				return $arr;
			}
			//查话题放在首页与分页
			public function seltopic($curpos,$pagecount){
				$conn = DBUtil::getConn();
				$sql="select * from topic where isdel = 0 order by addtime desc";
				$countsql = "select count(*) from ({$sql}) as c ";	
				$stmt = $conn->prepare($countsql);
				$stmt->execute();
				while ($row = $stmt->fetch()) {
					$count = $row[0];
				}
				if(empty($count)){
					$count = 1;
				}
				$sql = $sql." limit {$curpos},{$pagecount}";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				
				if(!$stmt){
					print_r($conn->errorInfo());
					exit();
				}
				$arr = array();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					$arr[]=$row;
			}
			$re = array("data"=>$arr,"count"=>$count);
			return $re;
			}
			//查资讯放在首页与分页
			public function selnews($curpos,$pagecount){
				$conn = DBUtil::getConn();
				$sql="select * from news where isdel = 0 order by addtime desc";
				$countsql = "select count(*) from ({$sql}) as c ";	
				$stmt = $conn->prepare($countsql);
				$stmt->execute();
				while ($row = $stmt->fetch()) {
					$count = $row[0];
				}
				if(empty($count)){
					$count = 1;
				}		
				$sql = $sql." limit {$curpos},{$pagecount}";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				
				if(!$stmt){
					print_r($conn->errorInfo());
					exit();
				}
				$arr = array();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					$arr[]=$row;
				}
				$ree = array("data"=>$arr,"count"=>$count);
				return $ree;
			}
			
			//查询会员统计信息
			public function selvip(){
				$conn = DBUtil::getConn();
				//新会员
				$sql = "select (select count(*) from vip where status = 1 and isdel = 0) as a,
						(select count(*) from vip where status = 1 and to_days(joindate) = to_days(now()) and isdel = 0) as b,
						(select count(*) from vip where status = 1 and isdel = 0 and date_sub(now(),interval 7 day) <= date(joindate)) as c,
						(select count(*) from vip where status = 1 and isdel = 0 and year(joindate) = year(now()) and month(joindate) = month(now()) ) as d";
				$pre = $conn->prepare($sql);
				$pre->execute();
				$new = $pre->fetch();
				
				//助学成才
				$sql = "select (select count(*) from vip where items = 7 and isdel = 0) as a,
						(select count(*) from vip where items = 7 and to_days(joindate) = to_days(now()) and isdel = 0) as b,
						(select count(*) from vip where items = 7 and isdel = 0 and date_sub(now(),interval 7 day) <= date(joindate)) as c,
						(select count(*) from vip where items = 7 and isdel = 0 and year(joindate) = year(now()) and month(joindate) = month(now()) ) as d";
				$pre = $conn->prepare($sql);
				$pre->execute();
				$zhuxue = $pre->fetch();
				
				//名企精英
				$sql = "select (select count(*) from vip where items = 6 and isdel = 0) as a,
						(select count(*) from vip where items = 6 and to_days(joindate) = to_days(now()) and isdel = 0) as b,
						(select count(*) from vip where items = 6 and isdel = 0 and date_sub(now(),interval 7 day) <= date(joindate)) as c,
						(select count(*) from vip where items = 6 and isdel = 0 and year(joindate) = year(now()) and month(joindate) = month(now()) ) as d";
				$pre = $conn->prepare($sql);
				$pre->execute();
				$mingqi = $pre->fetch();
				
				//学校导师
				$sql = "select (select count(*) from vip where items = 8 and isdel = 0) as a,
						(select count(*) from vip where items = 8 and to_days(joindate) = to_days(now()) and isdel = 0) as b,
						(select count(*) from vip where items = 8 and isdel = 0 and date_sub(now(),interval 7 day) <= date(joindate)) as c,
						(select count(*) from vip where items = 8 and isdel = 0 and year(joindate) = year(now()) and month(joindate) = month(now()) ) as d";
				$pre = $conn->prepare($sql);
				$pre->execute();
				$school = $pre->fetch();
				
				//合作企业
				$sql = "select (select count(*) from vip where items = 10 and isdel = 0) as a,
						(select count(*) from vip where items = 10 and to_days(joindate) = to_days(now()) and isdel = 0) as b,
						(select count(*) from vip where items = 10 and isdel = 0 and date_sub(now(),interval 7 day) <= date(joindate)) as c,
						(select count(*) from vip where items = 10 and isdel = 0 and year(joindate) = year(now()) and month(joindate) = month(now()) ) as d";
				$pre = $conn->prepare($sql);
				$pre->execute();
				$company = $pre->fetch();
				
				return array("new"=>$new,"zhuxue"=>$zhuxue,"minqi"=>$mingqi,"school"=>$school,"company"=>$company);
			}
			public function newsindex(){
				$conn = DBUtil::getConn();
				//最新资讯(话题类别)
				$sql="select n.* from topicclass tc,topic t,news n,topics_news tn where t.tc_id = tc.tc_id and n.n_id = tn.n_id and tn.t_id = t.t_id and n.isdel=0 and tc.items=0 order by n.addtime desc limit 0,5";
				$pre = $conn->prepare($sql);
				$pre->execute(array());
				$ree = $pre->fetchAll();
				//项目展示(话题类别)
				$sql1="select n.* from topicclass tc,topic t,news n,topics_news tn where t.tc_id = tc.tc_id and n.n_id = tn.n_id and tn.t_id = t.t_id and n.isdel=0 and tc.tc_id = 3 order by n.addtime desc limit 0,3";
				$pre1 = $conn->prepare($sql1);
				$pre1->execute(array());
				$ree1= $pre1->fetchAll();
				//源酷简介(资讯)
				$sql2="select n_id from news where n_title='源酷简介' and isdel=0";
				$pre2 = $conn->prepare($sql2);
				$pre2->execute(array());
				$ree2= $pre2->fetchAll();
				//源酷文化(资讯)
				$sql3="select n_id from news where n_title='源酷文化' and isdel=0";
				$pre3= $conn->prepare($sql3);
				$pre3->execute(array());
				$ree3= $pre3->fetchAll();
				//最新招聘(话题类别)
				$sql4="select n.* from topicclass tc,topic t,news n,topics_news tn where t.tc_id = tc.tc_id and n.n_id = tn.n_id and tn.t_id = t.t_id and n.isdel=0 and tc.tc_id = 5 order by n.addtime desc limit 0,9";
				$pre4= $conn->prepare($sql4);
				$pre4->execute(array());
				$ree4= $pre4->fetchAll();
				
				$data=array("data"=>$ree,"data1"=>$ree1,"data2"=>$ree2,"data3"=>$ree3,"data4"=>$ree4);
				return $data;
			}
	}
?>