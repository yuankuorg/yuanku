<?php

class ChuangOper extends Oper {

	public function getProjectById() {
		$conn = DBUtil::getConn();
		$sql = "select * from study_project where pid = ?";
		$pre = $conn -> prepare($sql);
		$arrs = array();
		$arrs[] = "{$_POST["pid"]}";
		$pre -> execute($arrs);
		$data = $pre -> fetch();
		return $data;
	}

	public function doaddProject() {
		$conn = DBUtil::getConn();
		$sql = "insert into study_project values(default,?,?,?)";
		$pre = $conn -> prepare($sql);
		return $pre -> execute(array($_POST["pname"], $_POST["imgurl"], $_POST["brief"]));
	}

	//用于获得闯关类别的下拉框
	public function getProjectClass() {
		$conn = DBUtil::getConn();
		$sql = "select pname,pid from study_project";
		$pre = $conn -> prepare($sql);
		$pre -> execute();
		$arr = $pre -> fetchAll();
		return $arr;
	}

	//用于删除话题
	public function delProject() {
		$conn = DBUtil::getConn();
		$sql = "delete from study_project where pid = ?";
		$pre = $conn -> prepare($sql);
		return $pre = $pre -> execute(array($_POST["pid"]));
	}

	//搜索函数并且分页
	public function searchProject($curpos, $pagecount) {
		$conn = DBUtil::getConn();
		$sql = "select * from study_project ";
		$arrs = array();
		//按照话题类别搜索
		if (!empty($_POST["pname"])) {
			$sql = $sql . " where pname = ?";
			$arrs[] = "{$_POST["pname"]}";
		}
		$countsql = "select count(*) from ({$sql}) as c ";

		$pre = $conn -> prepare($sql);
		$pre -> execute($arrs);
		$count = $pre -> rowCount();

		if (empty($count)) {
			$count = 1;
		}

		$sql = $sql . " limit {$curpos},{$pagecount}";
		$pre = $conn -> prepare($sql);
		$pre -> execute($arrs);

		if (!$pre) {
			print_r($conn -> errorInfo());
			exit();
		}

		$arr = array();
		while ($row = $pre -> fetch(PDO::FETCH_ASSOC)) {
			$arr[] = $row;
		}

		$re = array("data" => $arr, "count" => $count);
		return $re;
	}

	//用于项目修改
	public function updateProject() {
		$conn = DBUtil::getConn();
		try {
			$conn -> beginTransaction();

			$sql = "update study_project set pname=?,poster=?,brief=? where pid = ?";
			$pre = $conn -> prepare($sql);
			$arrs = array();
			$arrs[] = "{$_POST["pname"]}";
			$arrs[] = "{$_POST["poster"]}";
			$arrs[] = "{$_POST["brief"]}";
			$arrs[] = "{$_POST["pid"]}";
			$pre -> execute($arrs);
			$count = $pre -> rowCount();

			if ($conn -> commit()) {
				return true;
			} else {
				return false;
			}
			//按照话题类别搜索
			if (!empty($_POST["pid"])) {
				$sql .= " where pid = ?";
				$arrs[] = "{$_POST["pid"]}";
			}
		} catch(Exception $e) {
			if ($conn -> isTransactionActive())// this function does NOT exist
				$conn -> rollBack();
		}
	}

	/**
	 * 下面是关卡设置的函数
	 */
	//搜索关卡函数并且分页
	public function searchChapter($curpos, $pagecount) {
		$conn = DBUtil::getConn();
		$sql = "select sc.*,sp.pname from  study_chapter sc,study_project sp where sc.project = sp.pid";
		$arrs = array();
		//按照传输的数据类别搜索
		if (!empty($_POST["pname"])) {
			$sql = $sql . " and sp.pname = ?";
			$arrs[] = "{$_POST["pname"]}";
		}
		if (!empty($_POST["title"])) {
			$sql = $sql . " and sc.title like ?";
			$arrs[] = "%{$_POST["title"]}%";
		}
		$countsql = "select count(*) from ({$sql}) as c ";

		$pre = $conn -> prepare($sql);
		$pre -> execute($arrs);
		$count = $pre -> rowCount();

		if (empty($count)) {
			$count = 1;
		}

		$sql = $sql . " order by cid desc limit {$curpos},{$pagecount}";
		$pre = $conn -> prepare($sql);
		$pre -> execute($arrs);

		if (!$pre) {
			print_r($conn -> errorInfo());
			exit();
		}

		$arr = array();
		while ($row = $pre -> fetch(PDO::FETCH_ASSOC)) {
			$arr[] = $row;
		}

		$re = array("data" => $arr, "count" => $count);
		return $re;
	}

	//增加关卡调用数据库的函数
	public function doaddChapter() {
		$conn = DBUtil::getConn();
		$sql = "insert into study_chapter values(default,?,?,?,?,?,?,?,?)";
		$pre = $conn -> prepare($sql);
		return $pre -> execute(array($_POST["title"], $_POST["project"], $_POST["difficult"], $_POST["video"], $_POST["material"], $_POST["expound"], $_POST["score"], $_POST["addscore"]));
	}

	//修改关卡根据cid获取当前点击的数据
	public function getChapterById() {
		$conn = DBUtil::getConn();
		$sql = "select sc.*,sp.* from study_chapter sc,study_project sp where sc.project = sp.pid and cid = ?";
		$pre = $conn -> prepare($sql);
		$arrs = array();
		$arrs[] = "{$_POST["cid"]}";
		$pre -> execute($arrs);
		$data = $pre -> fetch();
		return $data;
	}

	//更改关卡表的数据库操作
	public function updateChapter() {
		$conn = DBUtil::getConn();
		try {
			$conn -> beginTransaction();

			$sql = "update study_chapter set title=?,project=?,difficult=? ,video=? ,material=? ,expound=? ,score=?, addscore=? where cid = ?";
			$pre = $conn -> prepare($sql);
			$arrs = array();
			$arrs[] = "{$_POST["title"]}";
			$arrs[] = "{$_POST["project"]}";
			$arrs[] = "{$_POST["difficult"]}";
			$arrs[] = "{$_POST["video"]}";
			$arrs[] = "{$_POST["material"]}";
			$arrs[] = "{$_POST["expound"]}";
			$arrs[] = "{$_POST["score"]}";
			$arrs[] = "{$_POST["addscore"]}";
			$arrs[] = "{$_POST["cid"]}";
			$pre -> execute($arrs);
			$count = $pre -> rowCount();

			if ($conn -> commit()) {
				return true;
			} else {
				return false;
			}
		} catch(Exception $e) {
			if ($conn -> isTransactionActive())// this function does NOT exist
				$conn -> rollBack();
		}
	}

	//删除关卡的数据库操作
	public function delChapter() {
		$conn = DBUtil::getConn();
		$sql = "delete from study_chapter where cid = ?";
		$pre = $conn -> prepare($sql);
		return  $pre -> execute(array($_POST["cid"]));
	}

	/**
	 * 会员闯关情况的操作
	 */

	//显示闯关会员动态并且增加搜索和分页功能
	public function searchChuangvip($curpos, $pagecount) {
		$conn = DBUtil::getConn();
		$sql = "select v.name,v.exchange,sp.pname,sc.title,sch.sid,sch.vid,sch.cid from study_chuang sch,vip v,study_project sp,study_chapter sc where sch.vid = v.id and sch.pid = sp.pid and sc.cid = sch.cid";
		$arrs = array();
		//按照话题类别搜索
		if (!empty($_POST["pid"]) && $_POST["pid"] != -1) {
			$sql = $sql . " and sp.pid = ?";
			$arrs[] = "{$_POST["pid"]}";
		}
		if (!empty($_POST["state"]) && $_POST["state"] != -1) {
			$sql = $sql . " and sch.sid = ?";
			$arrs[] = "{$_POST["state"]}";
		}
		if (!empty($_POST["title"])) {
			$sql = $sql . " and sc.title like ?";
			$arrs[] = "%{$_POST["title"]}%";
		}
		if (!empty($_POST["name"])) {
			$sql = $sql . " and v.name like ?";
			$arrs[] = "%{$_POST["name"]}%";
		}
	
		$countsql = "select count(*) from ({$sql}) as c ";

		$pre = $conn -> prepare($sql);
		$pre -> execute($arrs);
		$count = $pre -> rowCount();

		if (empty($count)) {
			$count = 1;
		}

		$sql = $sql . " order by vcid desc limit {$curpos},{$pagecount}";
		$pre = $conn -> prepare($sql);
		$pre -> execute($arrs);

		if (!$pre) {
			print_r($conn -> errorInfo());
			exit();
		}

		$arr = array();
		while ($row = $pre -> fetch(PDO::FETCH_ASSOC)) {
			$arr[] = $row;
		}

		$re = array("data" => $arr, "count" => $count);
		return $re;
	}
	
	/**
	 * 点击通关按钮后修改通关状态及加分
	 */
	public function passChapter() {
		$conn = DBUtil::getConn();
		$conn->beginTransaction();
		try {
			//改变通关状态
			$sql = "update study_chuang sch set sch.sid = 4 where sch.vid = ? and sch.cid = ?";
			$pre = $conn -> prepare($sql);
			$pre -> execute(array($_POST["vid"],$_POST["cid"]));
			
			//修改关卡状态表
			$sql1 = "insert into study_chuangstate values(default,?,now(),?,0,4,?)";
			$pre = $conn->prepare($sql1);
			$pre->execute(array( $_POST["cid"],$_POST["vid"],"通关成功!"));
			
			//获取该关卡分值
			$sql = "select addscore,title from study_chapter where cid= ?";
			$pre = $conn -> prepare($sql);
			$pre -> execute(array( $_POST["cid"] ));
			$fenzhi = $pre -> fetch();
			
			//找到闯关通过的会员
			$sql = "select * from vip where id = ?";
			$pre = $conn->prepare($sql);
			$pre->execute(array( $_POST["vid"] ));
			$vip = $pre->fetch();
			
			if( !$fenzhi && !$vip ) {
				$conn->rollBack();
				return false;
			}
			//加分
			$content = $vip["name"] . "成功通过《" . $fenzhi["title"] . "》关卡，获得积分" . $fenzhi["addscore"]; 
			$this->changeExchange($conn, Oper::$DYNTYPE["chuang"], $content , $vip["id"], $fenzhi["addscore"]);
			
			$conn->commit();
			return true;
		} catch(Exception $e) {
			$conn->rollBack();
			return false;
		}
	}

	//点击不及格按钮后修改通关状态
	public function nopassChapter() {
		$conn = DBUtil::getConn();
		$conn->beginTransaction();
		
		try {
			//改变通关状态
			$sql = "update study_chuang sch set sch.sid = 3 where sch.vid = ? and sch.cid = ?";
			$pre = $conn -> prepare($sql);
			$pre -> execute(array($_POST["vid"],$_POST["cid"]));
			
			//修改关卡状态表
			$sql1 = "insert into study_chuangstate values(default,?,now(),?,0,3,?)";
			$pre = $conn->prepare($sql1);
			$pre->execute(array( $_POST["cid"],$_SESSION["vid"],"作品不通过，通关失败!"));
			
			$conn->commit();
			return true;
		}catch(Exception $e) {
			$conn->rollBack();
			return false;
		}
	}

}
