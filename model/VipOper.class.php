<?php
	class VipOper extends Oper{
		//
		public function getVipByID() {
			$conn = DBUtil::getConn();
			$sql = "select * from vip where openid = ? and isdel = 0";
			
			$pre = $conn->prepare($sql);
			$pre->execute(array($_GET["openid"]));
			return $pre->fetch();
		}
		//根据vid找pid
		public function getPidByID() {
			$conn = DBUtil::getConn();
			$sql = "select sc.pid from vip v ,study_chuang sc where v.openid = ? and v.id = sc.vid and isdel = 0 order by vcid desc limit 0,1";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_GET["openid"]));
			return $pre->fetch();
		}
		
		public function checkSchoolTeacher() {
			$conn = DBUtil::getConn();
			$sql = "select count(*) from vip where school = ? and items = 8 and isdel = 0";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_POST["school"]));
			$arr = $pre->fetch();
			if( $arr[0] ) {
				return false;
			} else {
				return true;
			}
		}
		
		/**
		 * 检测手机号码是否重复
		 */
		public function checkMobile() {
			$conn = DBUtil::getConn();
			$sql = "select count(*) from vip where mobile = ? and isdel = 0";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_POST["mobile"]));
			$arr = $pre->fetch();
			if( $arr[0] ) {
				return false; //如果存在返回false
			} else {
				return true; //如果不存在，返回true
			}
		}
		
		//获取用户openId
		public function ShowOpenId($curpos,$pagecount){
			$conn=DBUtil::getConn();
			$sql="select openId,headimg,uname from wechat_user where isdel = 0";
			
			$arr = array();
			if(!empty($_POST["uname"])){
				$sql = $sql. " and uname like ? ";
				$arr[] = "%{$_POST['uname']}%";
			}
			
			$sql .= " order by uid ";
			//查询页码
			$countsql="select count(*) from ({$sql}) as wechat";
			$pre = $conn->prepare($countsql);			
			$pre->execute($arr);
			$row=$pre->fetch();
			$count=$row[0];
			if(empty($count)){
				$count = 1;
			}
			
			$sql = $sql." limit {$curpos},{$pagecount}";
			$pre=$conn->prepare($sql);
			$pre->execute($arr);
			$arr=$pre->fetchAll();

			$data=array('data'=>$arr,"count"=>$count);
			
			return $data;
		}
		
		//获取会员管理页面
		public function getVip($start,$vipPagecount){
			$conn=DBUtil::getConn();
			//获取会员
			$sql = "select v.id,v.schoolname,v.mobile,v.weixin,v.name as vname,v.status as statusid,v.items,v.sex,v.domicile,v.joinDate,v.exchange,i.name as iname,s.name as sname from (vip v left join items i on v.items = i.id) left join status s on v.status = s.id where v.isdel = 0 order by v.id desc ";
			//查询页码
			$countsql = "select count(*) from ({$sql}) as c ";
			$pre = $conn->prepare($countsql);
			$pre->execute(array());
			$row = $pre->fetch();
			$count = $row[0];
			if(empty($count)){
				$count = 1;
			}
			$sql = $sql."limit {$start},{$vipPagecount}";
			$pre = $conn->prepare($sql);
			$pre->execute(array());
			$arr = $pre->fetchAll();
			//获取状态
			$sql = "select * from status where isdel = 0 ";
			$pre = $conn->prepare($sql);
			$pre->execute(array());
			$status = $pre->fetchAll();
			
			$sql = "select * from items where isdel = 0 ";
			$pre = $conn->prepare($sql);
			$pre->execute(array());
			$items = $pre->fetchAll();
			
			$re = array("data"=>$arr,"count"=>$count,"status"=>$status,"items"=>$items);
			return $re;
		}
		
		//获取要编辑的会员
		public function getVipId(){
			$conn=DBUtil::getConn();
			//获取会员
			if(!empty($_POST["vid"])){
				$sql = "select * from vip v where v.id = ?";
				$pre = $conn->prepare($sql);
				$pre->execute(array($_POST['vid']));
				$varr = $pre->fetch();
			}
			
			//获取项目
			$sql = "select * from items where isdel = 0 ";
			$pre = $conn->prepare($sql);
			$pre->execute(array());
			$iarr = $pre->fetchAll();
			//获取状态
			$sql = "select * from status where isdel = 0 ";
			$pre = $conn->prepare($sql);
			$pre->execute(array());
			$sarr = $pre->fetchAll();
			if(!empty($_POST["vid"])){
				$arr = array("data"=>$varr,"items"=>$iarr,"status"=>$sarr);
			}else{
				$arr = array("items"=>$iarr,"status"=>$sarr);
			}
			return $arr;
		}
		
		//获取项目和状态
		public function getIS(){
			$conn=DBUtil::getConn();
			$sql = "select * from items where isdel = 0 ";
			$pre = $conn->prepare($sql);
			$pre->execute(array());
			$iarr = $pre->fetchAll();
			$sql = "select * from status where isdel = 0 ";
			$pre = $conn->prepare($sql);
			$pre->execute(array());
			$sarr = $pre->fetchAll();
			$arr = array("items"=>$iarr,"status"=>$sarr);
			return $arr;
		}
		
		//添加会员
		public function addvip(){
			$conn=DBUtil::getConn();
			$conn->beginTransaction();
			try {
				//添加会员记录
				$sql = "insert into vip values(default,?,?,?,?,?,?,?,now(),?,now(),'管理员添加',0,?,?,?,0,?)";
				$pre = $conn->prepare($sql);
				$pre->execute(array($_POST['mobile'],$_POST['weixin'],$_POST['name'],$_POST['item'],$_POST['status'],$_POST['sex'],$_POST['domicile'],$_POST['school'],$_POST['remark'],$_POST['img'],$_POST["openid"],$_POST["schoolname"]));
				
				if( $_POST['item'] == 7 && !empty($_POST["openid"]) ) {
					$vid = $conn->lastInsertId();
					$this->changeExchange($conn,Oper::$DYNTYPE["init"], "加入助学成才，初始化积分500", $vid, 500);
				}
				
				//记录状态,登记状态记录表
				$sqlLog = "insert into logStatus values(default,?,null,?,now(),?)";
				$preLog = $conn->prepare($sqlLog);
				$preLog->execute(array($_SESSION["admin"]['code'],$_POST['status'],$_POST['name']));
				
				$conn->commit();
				return true;
			} catch (Exception $e) {
				$conn->rollBack();
				echo $e->getMessage();
				return false;
			}
		}
		//删除会员
		public function vipDel(){
			$conn=DBUtil::getConn();
			//删除会员
			$sql = "update vip set isdel = 1 where id = ? ";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_POST['vid']));
			$count = $pre->rowCount();
			//登记状态删除记录
			$sqlLog = "insert into logStatus values(default,?,?,null,now(),?)";
			$preLog = $conn->prepare($sqlLog);
			$countLog=$preLog->execute(array($_SESSION["admin"]["code"],$_POST["status"],$_POST["name"]));
			$countLog = $preLog->rowCount();
			if( $count == 1 and $countLog == 1){
				return true;
			}else{
				return false;
			}
		}
		//批量删除会员
		public function delSomeVip(){
			$conn=DBUtil::getConn();
			$conn->beginTransaction();
			foreach ($_POST["delarr"] as $val) {
				if(!isset($val['sname'])||!isset($val['vname'])){
					continue;
				}
				$sql = "insert into logStatus values(default,?,?,null,now(),?)";								
				$stmt = $conn->prepare($sql);
				$stmt->execute(array($_SESSION["admin"]["code"],$val["sname"],$val["vname"]));
				
				if (!$stmt){
					$conn->rollBack();
					echo "\nPDO::errorInfo():\n";
					print_r($stmt->errorInfo());
					return false;
				}
			}
			$conn->commit();
			
			$in = implode(',', $_POST["ids"]);
			$sql = "update vip set isdel = 1 where id in ( $in ) ";
			$pre = $conn->prepare($sql);
			$pre->execute();
			
			if($pre){
				return true;
			}else{
				return false;
			}
		}
		//修改会员
		public function alterVip(){
			$conn=DBUtil::getConn();
			try {
				$conn->beginTransaction();
				
				//修改会员资料
				$sql = "update vip set mobile = ?, weixin = ?,name = ?, items = ? ,status = ?, sex = ?,domicile = ?,school = ?,remark = ?,img = ?,alterDate = now(),openid = ?,schoolname = ? where id = ?";
				$pre = $conn->prepare($sql);
				$count=$pre->execute(array($_POST['mobile'],$_POST['weixin'],$_POST['name'],$_POST['item'],$_POST['status'],$_POST['sex'],$_POST['domicile'],$_POST['school'],$_POST['remark'],$_POST['img'],$_POST["openid"],$_POST["schoolname"],$_POST['vid']));
				
				//如果状态修改进行记录
				if($_POST['oldStatus'] != $_POST['status']){
					$sqlLog = "insert into logStatus values(default,?,?,?,now(),?)";
					$preLog = $conn->prepare($sqlLog);
					$arr = array($_SESSION["admin"]['code'],$_POST['oldStatus'],$_POST['status'],$_POST['name']);
					$preLog->execute($arr);
				}
				
				//如果积分为空，并选择了助学成才，而且微信绑订成功，则修改积分为500
				if( $_POST["exchange"] == 0 && $_POST["item"] == 7 && !empty($_POST["openid"]) ) {
					$this->changeExchange($conn,Oper::$DYNTYPE["init"], "加入助学成才，初始化积分500", $_POST["vid"], 500);
				}
				
				//如果积分为空，并选择了助学试用，而且微信绑订成功，则修改积分为50
				if( $_POST["exchange"] == 0 && $_POST["item"] == 11 && !empty($_POST["openid"]) ) {
					$this->changeExchange($conn,Oper::$DYNTYPE["init"], "加入助学成才，初始化积分50", $_POST["vid"], 50);
				}
				$conn->commit();
				return true;
			} catch(Exception $e) {
				$conn->rollBack();
				return false;
			}
		}
		//搜索会员
		public function vipSeek($start,$vipPagecount){
			$conn=DBUtil::getConn();
			$sql = "select v.id,v.schoolname,v.exchange,v.mobile,v.weixin,v.status as statusid,v.name as vname,v.items,v.sex,v.domicile,v.joinDate,v.alterDate,i.name as iname,s.name as sname from (vip v left join items i on v.items = i.id) left join status s on v.status = s.id where v.isdel = 0 ";
			
			$arr = array();
			if(!empty($_POST["mobile"])){
				$sql = $sql. " and mobile like ? ";
				$arr[] = "%{$_POST['mobile']}%";
			}
			if(!empty($_POST["name"])){
				$sql = $sql. " and v.name like ? ";
				$arr[] = "%{$_POST['name']}%";
			}
			if(!empty($_POST["status"])){
				$sql = $sql. " and v.status like ? ";
				$arr[] = "%{$_POST['status']}%";
			}
			if(!empty($_POST["items"])){
				$sql = $sql. " and v.items like ? ";
				$arr[] = "%{$_POST['items']}%";
			}
			if(!empty($_POST["date_start"]) && !empty($_POST["date_end"])){
				$sql = $sql. " and joinDate between ? and ? ";
				$arr[] = "{$_POST['date_start']}";
				$arr[] = "{$_POST["date_end"]}";
			}
			if(!empty($_POST["date_start"]) && empty($_POST["date_end"])){
				$sql = $sql. " and joinDate >= ? ";
				$arr[] = "{$_POST['date_start']}";
			}
			if(!empty($_POST["date_end"]) && empty($_POST["date_start"])){
				$sql = $sql. " and joinDate <= ? ";
				$arr[] = "{$_POST["date_end"]}";
			}
			$sql .= " order by v.id desc ";
			//查询页码
			$countsql = " select count(*) from ({$sql}) as c ";
			$pre = $conn->prepare($countsql);
			$pre->execute($arr);
			$row = $pre->fetch();
			$count = $row[0];
			if(empty($count)){
				$count = 1;
			}
			$sql = $sql." limit {$start},{$vipPagecount}";
			$pre = $conn->prepare($sql);
			$pre->execute($arr);
			$arr = $pre->fetchAll();
			//获取状态(下拉按钮)
			$sql = " select * from status where isdel = 0 ";
			$pre = $conn->prepare($sql);
			$pre->execute(array());
			$status = $pre->fetchAll();
			
			$sql = "select * from items where isdel = 0 ";
			$pre = $conn->prepare($sql);
			$pre->execute(array());
			$items = $pre->fetchAll();
			
			$arr = array("data"=>$arr,"count"=>$count,"status"=>$status,"items"=>$items);
			return $arr;
		}
		//modal获取状态项目
		public function getModalVip(){
			$conn=DBUtil::getConn();
			$ssql = "select id as sid,name as sname from status where isdel = 0 ";
			$spre = $conn->prepare($ssql);
			$spre->execute(array());
			$sarr = $spre->fetchAll();
			$isql = "select id as iid,name as iname from items where isdel = 0 ";
			$ipre = $conn->prepare($isql);
			$ipre->execute(array());
			$iarr = $ipre->fetchAll();
			$data = array("status"=>$sarr,"items"=>$iarr);
			return $data;
		}
		//modal状态删除
		public function statusDel(){
			$conn=DBUtil::getConn();
			$sql = "update status set isdel = 1 where id = ?";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_POST['sid']));
			$count = $pre->rowCount();
			if( $count == 1 ){
				return true;
			}else{
				return false;
			}
		}
		//modal项目删除
		public function itemsDel(){
			$conn=DBUtil::getConn();
			$sql = "update items set isdel = 1 where id = ?";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_POST['iid']));
			$count = $pre->rowCount();
			if( $count == 1 ){
				return true;
			}else{
				return false;
			}
		}
		//modal项目增加
		public function itemsAdd(){
			$conn=DBUtil::getConn();
			$sql = "insert into items values(default,?,0) ";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_POST['item']));
			$count = $pre->rowCount();
			if( $count == 1 ){
				return true;
			}else{
				return false;
			}
		}
		//modal状态增加
		public function statusAdd(){
			$conn=DBUtil::getConn();
			$sql = "insert into status values(default,?,0) ";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_POST['status']));
			$count = $pre->rowCount();
			if( $count == 1 ){
				return true;
			}else{
				return false;
			}
		}
		//获得会员修改记录
		public function getVipLogstatus($start,$vipPagecount){
			$conn=DBUtil::getConn();
			//获取状态修改记录
			$sql = "select l.id,.l.vipname,sold.name as oldname,snew.name as newname,l.alterDate,l.admin from (logStatus l left join status sold on l.oldStatus = sold.id)left join status snew on l.newStatus = snew.id ";
			
			//查询页码
			$countsql = "select count(*) from ({$sql}) as c ";
			$pre = $conn->prepare($countsql);
			$pre->execute(array());
			$row = $pre->fetch();
			$count = $row[0];
			if(empty($count)){
				$count = 1;
			}
			$sql = $sql." order by l.alterDate desc limit {$start},{$vipPagecount}";
			$pre = $conn->prepare($sql);
			$pre->execute(array());
			$arr = $pre->fetchAll();
			$data = array("log"=>$arr,"count"=>$count);
			return $data;
		}
		//搜索获得会员修改记录
		public function seeklogStatus($start,$vipPagecount){
			$conn=DBUtil::getConn();
			//获取搜索结果
			$sql = "select l.id,l.vipname,sold.name as oldname,snew.name as newname,l.alterDate,l.admin from (logStatus l left join status sold on l.oldStatus = sold.id)left join status snew on l.newStatus = snew.id where 1 = 1" ;
			$arr = array();
			if(!empty($_POST["vipname"])){
				$sql = $sql. " and l.vipname like ? ";
				$arr[] = "{$_POST['vipname']}";
			}
			if(!empty($_POST["admin"])){
				$sql = $sql. " and l.admin like ? ";
				$arr[] = "{$_POST['admin']}";
			}
			$sql .= " order by l.alterDate desc ";
			//查询页码
			$countsql = " select count(*) from ({$sql}) as c ";
			$pre = $conn->prepare($countsql);
			$pre->execute($arr);
			$row = $pre->fetch();
			$count = $row[0];
			if(empty($count)){
				$count = 1;
			}
			$sql = $sql." limit {$start},{$vipPagecount}";
			$pre = $conn->prepare($sql);
			$pre->execute($arr);
			$arr = $pre->fetchAll();
			$arr = array("log"=>$arr,"count"=>$count);
			return $arr;
		}
		//会员报名提交(手机端)
		public function mobileJoinVip(){
			$conn=DBUtil::getConn();
			//添加数据
			$sql="insert into vip values(default,?,null,?,?,1,null,null,now(),null,now(),'手机注册',0,null,null,null,0,null)";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_POST["mobile"],$_POST["name"],$_POST["proj"]));
			$count = $pre->rowCount();
			
			//记录状态,登记状态记录表
			$sqlLog = "insert into logStatus values(default,?,null,?,now(),?)";
			$preLog = $conn->prepare($sqlLog);
			$countLog=$preLog->execute(array($_SESSION["admin"]['code'],1,$_POST['name']));
			$countLog = $preLog->rowCount();
			if( $count == 1 and $countLog == 1){
				return true;
			}else{
				return false;
			}
		}
		//学校数据查询
		public function getAllSchool($start,$vipPagecount) {
			$conn=DBUtil::getConn();
			//获取会员
			$sql = "select * from school where isdel = 0 ";
			
			$para = array();
			if( !empty($_POST["sname"]) ) {
				$sql .= " and sname regexp ?";
				$para[] = $_POST["sname"];
			}
			
			$sql .= " order by sid desc";
			//查询页码
			$countsql = "select count(*) from ({$sql}) as c ";
			$pre = $conn->prepare($countsql);
			$pre->execute($para);
			$row = $pre->fetch();
			$count = $row[0];
			if(empty($count)){
				$count = 1;
			}
			$sql = $sql." limit {$start},{$vipPagecount}";
			$pre = $conn->prepare($sql);
			$pre->execute($para);
			$arr = $pre->fetchAll();
			
			$re = array("data"=>$arr,"count"=>$count);
			return $re;
		}
		
		/**
		 * 学校名称不能重复
		 */
		public function addSchool() {
			//先判断学校名称是否重复
			$conn=DBUtil::getConn();
			
			$sql = "select count(*) from school where isdel = 0 and sname = ?";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_POST["sname"]));
			$arr = $pre->fetch();
			
			if( $arr[0] ) {
				return false;
			}
			
			$sql = "insert into school values(default,?,?,0)";
			$pre = $conn->prepare($sql);
			$re = $pre->execute(array($_POST["sname"],$_POST["logo"]));
			if( $re ) {
				return true;
			} else {
				return false;
			}
		}
		
		/**
		 * 删除学校
		 */
		public function delSchool() {
			//先判断学校名称是否重复
			$conn=DBUtil::getConn();
			
			$sql = "update school set isdel = 1 where sid = ?";
			$pre = $conn->prepare($sql);
			$re = $pre->execute(array($_POST["sid"]));
			return $re; 
		}
		 
		/*
		 * 签到
		 * */
		 public function makesign(){
		 	$conn=DBUtil::getConn();
			$sql = "select count(*) from study_sign where vid = ? and to_days(datetime) = to_days(now())";
			$pre = $conn->prepare($sql);
			$pre -> execute(array($_SESSION["vip"]["id"]));
			$arr = $pre->fetch();
			if( $arr[0] ){
				return false;
			}else{
				try {
					$conn->beginTransaction();
					/*签到SQL*/
					$sql = "insert into study_sign values(default,?,now())";
					$pre = $conn->prepare($sql);
					$sign = $pre -> execute(array($_SESSION["vip"]["id"]));
					
					/*判断是否周日，是就查询在之前7天内是否共签到7次*/
					if(Date("w")==0){
						$sql = "select count(*) from study_sign where vid = ? and to_days(datetime) between to_days(now())-7 and to_days(now())";
						$pre = $conn->prepare($sql);
						$pre -> execute(array($_SESSION["vip"]["id"]));
						$arr = $pre->fetch();
						if($arr[0] == 7){
							$this->changeExchange($conn,Oper::$DYNTYPE["sign"], "全勤之星，获得积分5分", $_SESSION["vip"]["id"], 5);
						}else{
							$this->changeExchange($conn,Oper::$DYNTYPE["sign"], "签到，获得积分1分", $_SESSION["vip"]["id"], 1);
						}
					}else{
						$this->changeExchange($conn,Oper::$DYNTYPE["sign"], "签到，获得积分1分", $_SESSION["vip"]["id"], 1);
					}
					
					$conn->commit();
					return true;
				} catch(Exception $e) {
					$conn->rollBack();
					return false;
				}
			}
		}
		public function selectsign(){
			/*查询签到总次数*/
			$conn=DBUtil::getConn();
			$sql = "select count(*) from study_sign where vid = ?";
			$pre = $conn->prepare($sql);
			$pre -> execute(array($_SESSION["vip"]["id"]));
			$arr = $pre->fetch();
			return $arr;
		}
	}