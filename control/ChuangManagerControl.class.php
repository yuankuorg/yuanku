<?php
class ChuangManagerControl extends Control {
	public function initChapter() {
		checkLogin();
		$cg = new ChuangOper();
		$re = $cg -> searchProject(($this -> curpage - 1) * $this -> pagecount, $this -> pagecount);
		$this -> setPage($re["count"]);
		$smarty = $this -> smarty();
		$smarty -> assign("data", $re["data"]);
		$cv = $cg -> getProjectClass();
		$smarty -> assign("cg", $cv);
		$smarty -> display("study/uiManager.html");
	}

	//项目增加函数
	public function Projectadd() {
		checkLogin();
		$smarty = $this -> smarty();
		$oper = new ChuangOper();
		if (!empty($_POST["pid"])) {
			//			进入的是闯关类型修改页面
			$data = $oper -> getProjectById();
			$smarty = $this -> smarty();
			$smarty -> assign("data", $data);
		}
		$smarty -> display("study/Projectadd.html");
	}

	//闯关类型增加的页面
	function doaddProjec() {
		$obj = new ChuangOper();
		if ($obj -> doaddProject()) {
			echo "true";
		} else {
			echo "false";
		}
	}

	//  删除闯关类型
	public function delProject() {
		$obj = new ChuangOper();
		if ($obj -> delProject()) {
			echo "true";
		} else {
			echo "false";
		}
	}

	//修改项目表
	public function updateProject() {
		$oper = new ChuangOper();

		$arr = array();
		if ($oper -> updateProject()) {//修改成功
			$arr["code"] = 1;
			$arr["message"] = "修改项目成功！";
		} else {//修改失败
			$arr["code"] = 0;
			$arr["message"] = "修改项目失败或没有进行修改！";
		}
		echo json_encode($arr);
	}

	/**
	 * 下面是科目评论的函数
	 */
	//显示关卡设置
	public function ChapterDiscuss() {
		checkLogin();
		$smarty = $this -> smarty();
		$smarty -> display("study/chapterDiscuss.html");
	}
	
	//项目增加函数
	public function discussAdd() {
		checkLogin();
		$smarty = $this -> smarty();
		$smarty -> display("study/discussAdd.html");
	}
	
	/**
	 * 下面是关卡设置的函数
	 */
	//显示关卡设置
	public function showChapter() {
		checkLogin();
		$oper = new ChuangOper();
		$class = $oper -> getProjectClass();
		$re = $oper -> searchChapter(($this -> curpage - 1) * $this -> pagecount, $this -> pagecount);
		$this -> setPage($re["count"]);
		$smarty = $this -> smarty();
		$smarty -> assign("data", $re["data"]);
		$smarty -> assign("class", $class);
		$smarty -> display("study/chuangChapter.html");
	}

	//项目增加函数
	public function Chapteradd() {
		checkLogin();
		$oper = new ChuangOper();
		$smarty = $this -> smarty();
		$oper = new ChuangOper();
		if (!empty($_POST["cid"])) {
			//			进入的是闯关类型修改页面
			$data = $oper -> getChapterById();
			$smarty -> assign("data", $data);
		}
		$cp = $oper -> getProjectClass();
		$smarty -> assign("cp", $cp);
		$smarty -> display("study/Chapteradd.html");
	}

	//增加关卡的函数
	function doaddChapter() {
		$obj = new ChuangOper();
		if ($obj -> doaddChapter()) {
			echo "true";
		} else {
			echo "false";
		}
	}

	//修改关卡的函数
	public function updateChapter() {
		$oper = new ChuangOper();

		$arr = array();
		if ($oper -> updateChapter()) {//修改成功
			$arr["code"] = 1;
			$arr["message"] = "修改关卡成功！";
		} else {//修改失败
			$arr["code"] = 0;
			$arr["message"] = "修改关卡失败或没有进行修改！";
		}
		echo json_encode($arr);
	}

	//  删除关卡
	public function delChapter() {
		$obj = new ChuangOper();
		if ($obj -> delChapter()) {
			echo "true";
		} else {
			echo "false";
		}
	}
	
	/**
	 * 下面是会员闯关情况的函数
	 */
	//显示会员闯关情况
	public function showChuangvip() {
		checkLogin();
		$oper = new ChuangOper();
		$class = $oper -> getProjectClass();
		$re = $oper -> searchChuangvip(($this -> curpage - 1) * $this -> pagecount, $this -> pagecount);
		$this -> setPage($re["count"]);
		
		$smarty = $this -> smarty();
		$smarty -> assign("data", $re["data"]);
		$smarty -> assign("class",$class);
		$smarty -> display("study/chuangvip.html");
	}

	//点击通关后改变通关状态
	public function passChapter() {
		$oper = new ChuangOper();
		if ($oper -> passChapter()) {
			$this -> showChuangvip();
		} else {
			echo "false";
		}
	}

	//点击不及格后改变通关状态
	public function nopassChapter() {
		$oper = new ChuangOper();
		if ($oper -> nopassChapter()) {
			$this -> showChuangvip();
		} else {
			echo "false";
		}
	}

}
