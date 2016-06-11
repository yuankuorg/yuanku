<?php 
class DynamicOper{
	//获取校友信息
	public function getalumnus($start,$count){
		$conn = DBUtil::getConn();
		$sql="select v.id,v.name,v.img,v.exchange,(select count(*) from study_chuang c
		where c.vid=v.id and c.sid=4) as count,(select (t.exchange + t.chuang*50 + t.taskrec*50 + t.sign) from totalpoint t where t.id = v.id) as total,( select pname from study_project where
		pid = (select pid from study_chuang c1 where c1.vid = v.id order by c1.vcid
		desc limit 0,1)) as state from vip v where v.school=(select school from vip
		where openid=? and isdel = 0) and openid !=? and isdel=0 limit {$start},{$count}";
		$pre = $conn->prepare($sql);
		$pre->execute( array($_SESSION["vip"]["openid"],$_SESSION["vip"]["openid"]) );
		return $pre->fetchAll();
	}
	//获取我的动态信息
	public function getmydynamic($start,$count){
		$conn = DBUtil::getConn();
		$sql = "select sd.dcontent,v.img,sd.time from study_dynamic sd, vip v where
		v.openid = ? and sd.vid = v.id order by sd.time desc limit {$start},{$count}";
		$pre = $conn->prepare($sql);
		$pre->execute( array($_SESSION["vip"]["openid"]) );
		return $pre->fetchAll();	
	}
	//获取全部动态信息
	public function getalldynamic($start,$count){
		$conn = DBUtil::getConn();
		$sql = "select sd.dcontent,sd.time,v.name,v.img from study_dynamic sd,vip v
				where sd.vid = v.id order by sd.time desc limit {$start},{$count}";
		$pre = $conn->prepare($sql);
		$pre->execute();
		return $pre->fetchAll();
	}
	//获取我的简历信息
	public function getresume(){
		$conn = DBUtil::getConn();
		$sql = "select * from study_resume where vid = ?";
		$pre = $conn->prepare($sql);
		$pre->execute( array($_SESSION["vip"]["id"]) );
		return $pre->fetch();
	}
	//创建或者添加我的简历
	public function saveresume(){
		$conn = DBUtil::getConn();
		if( $_POST["vid"] == "" ){
			$sql = "insert into study_resume values(default,?,?,?,?,?,?,?,?,?,?,
					?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$pre = $conn->prepare($sql);
			return $pre->execute( array($_SESSION["vip"]["id"],$_POST["name"],
			$_POST["sex"],$_POST["heighedu"],$_POST["workexp"],$_POST["city"],$_POST["mobile"],
			$_POST["email"],$_POST["targetjob"],$_POST["companyname"],$_POST["position"],
			$_POST["entrytime"],$_POST["leavetime"],$_POST["workcontent"],$_POST["schoolname"],
			$_POST["specialty"],$_POST["graduation"],$_POST["projectname"],$_POST["responsibility"],
			$_POST["starttime"],$_POST["endtime"],$_POST["projectinfo"],$_POST["skill"],
			$_POST["myselfinfo"]) );
		}else{
			$sql = "update study_resume set name = ?,sex = ?,heighedu = ?,workexp = ?,city = ?,
			mobile = ?,email = ?,targetjob = ?,companyname = ?,position = ?,entrytime = ?,leavetime = ?,
			workcontent = ?,schoolname = ?,specialty =?,graduation = ?,projectname = ?,
			responsibility = ?,starttime = ?,endtime = ?,projectinfo = ?,skill =?,myselfinfo = ?
			where vid = ?";
			$pre = $conn->prepare($sql);
			return $pre->execute( array($_POST["name"],$_POST["sex"],$_POST["heighedu"],
			$_POST["workexp"],$_POST["city"],$_POST["mobile"],$_POST["email"],
			$_POST["targetjob"],$_POST["companyname"],$_POST["position"],$_POST["entrytime"],
			$_POST["leavetime"],$_POST["workcontent"],$_POST["schoolname"],$_POST["specialty"],
			$_POST["graduation"],$_POST["projectname"],$_POST["responsibility"],$_POST["starttime"],
			$_POST["endtime"],$_POST["projectinfo"],$_POST["skill"],$_POST["myselfinfo"],$_POST["vid"]) );
		}
	}
}