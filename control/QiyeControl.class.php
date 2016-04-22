<?php
	/*
	 * 企业控制器
	 */
	class QiyeControl extends Control{
		//企业主页
		function gozhaopin() {
			$qiyeOper = new QiyeOper();
			$data = $qiyeOper->getmyZhaopin(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("study/zhaopin.html");
		}
		//企业主页加载更多
		function getmoreZhaopin(){
			$qiyeOper = new QiyeOper();
			$data = $qiyeOper->getmyZhaopin(($this->curpage-1)*$this->pagecount,$this->pagecount);
			
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("study/moreZhaopin.html");
		}
		//搜索简历页
		function gosearchResume() {
			$qiyeOper = new QiyeOper();
			$data = $qiyeOper->getResume(($this->curpage-1)*$this->pagecount,$this->pagecount);
			
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("study/searchResume.html");
		}
		//搜索简历页加载更多
		function getmoreResume(){
			$qiyeOper = new QiyeOper();
			$data = $qiyeOper->getResume(($this->curpage-1)*$this->pagecount,$this->pagecount);
			
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("study/moresearchResume.html");
		}
		//招聘搜索页
		function gosearchZhaopin() {
			$qiyeOper = new QiyeOper();
			$data = $qiyeOper->getZhaopin(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("study/searchZhaopin.html");
		}
		//招聘搜索页加载更多
		function getmoreSeaZhaopin(){
	 		$qiyeOper = new QiyeOper();
			$data = $qiyeOper->getZhaopin(($this->curpage-1)*$this->pagecount,$this->pagecount);
			
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("study/moreSeaZhaopin.html");
	 	}
		//企业查看发布的招聘详情
		function gocheckMyZhaopin() {
			$qiyeOper = new QiyeOper();
			$data = $qiyeOper->getZhaopinMain();
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("study/checkMyZhaopin.html");
		}
		//增加招聘信息
	    function goAddZhaopin(){
	    	$qiyeOper = new QiyeOper();
		 	if( $qiyeOper->addZhaopin() ){
		 		$this->gozhaopin();
		 	}else{
		 		echo "false";
		 	}
		 }
		//简历详情
		function gocheckResume() {
			$qiyeOper = new QiyeOper();
			$data = $qiyeOper->getResumeMain();
			$smarty = $this->smarty();
			$smarty ->assign("data",$data);
			$smarty->display("study/checkResume.html");
		}
		//学生端查看招聘详情
		function gocheckZhaopinMain() {
			$qiyeOper = new QiyeOper();
			$data = $qiyeOper->getZhaopinMain();

			$smarty = $this->smarty();
			$smarty -> assign("data",$data);
			$smarty->display("study/checkZhaopinMain.html");
		}
		//修改招聘信息
		function goalterZhaopin() {
			$qiyeOper = new QiyeOper();
			$data = $qiyeOper->getZhaopinByid();
			$smarty = $this->smarty();//把封装的类中的smarty传给smarty
			$smarty->assign("data",$data);
			$smarty->display("study/alterZhaopin.html");
		}	 
 		 //修改
		 function upZhaopin(){
		 	$qiyeOper = new QiyeOper();
		 	if( $qiyeOper->updateZhaopin() ){
		 		$this->gozhaopin();
		 	}else{
		 		echo "false";
		 	}
		 }
        //删除
		 function delZhaopin(){
		 	$qiyeOper = new QiyeOper();
		 	if( $qiyeOper->deleZhaopin() ){
				$this->gozhaopin();
		 	}else{
		 		echo "false";
		 	}
		 }
		//增加数据到招聘表
		function addEnts(){
			$qiyeOper = new QiyeOper();
			$res = $qiyeOper->addEntstore();
			if( $res == 1 ) {
				echo '{"code":1,"mes":"您还没有创建简历!"}';
			} else if( $res == 2 ) {
				echo '{"code":2,"mes":"您已投递过本简历!"}';
			} else if( $res == 3 ) {
				echo '{"code":3,"mes":"系统繁忙，请稍后重试!"}';
			} else {
				echo '{"code":4,"mes":"投递成功!"}';
			}
		}
		//查看收到的简历
		function checkRes(){
			$qiyeOper = new QiyeOper();
			$data = $qiyeOper->checkResume(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$smarty = $this->smarty();
			$smarty -> assign("data",$data);
			$smarty->display("study/entstore.html");
		}
		//查看简历加载更多
		function getmorecheckRes(){
			$qiyeOper = new QiyeOper();
			$data = $qiyeOper->checkResume(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$smarty = $this->smarty();
			$smarty -> assign("data",$data);
			$smarty->display("study/moreentstore.html");
		}
	}