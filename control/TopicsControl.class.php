<?php
class TopicsControl extends Control {
	//进入话题管理页面
	public function TopicsMana(){
		checkLogin();
		$oper = new TopicsOper();
		$re = $oper->searchTopic(($this->curpage-1)*$this->pagecount,$this->pagecount);
		$this->setPage($re["count"]);
		
		$smarty = $this->smarty();
		$smarty->assign("data",$re["data"]);		
		
		//tc中放的值用于放在话题类别的下拉框中
		$oper = new TopicClassOper();
		$data = $oper->getAllTopicClass();
		$smarty->assign("tc",$data);
		$smarty->display("admin/TopicsMana.html");
	}
	
	//话题修改页面的更新按钮
	function updateTopic(){
		$oper = new TopicsOper();
		
		$arr = array();
		if($oper->updateTopic()){//修改成功
			$arr["code"] = 1;
			$arr["message"] = "修改话题成功！";
		}else{//修改失败
			$arr["code"] = 0;
			$arr["message"] = "修改话题失败或没有进行修改！";
		}
		echo json_encode($arr);		
	}
	
	//进入话题添加页面
	public function TopicsAdd(){
		checkLogin();
		$smarty = $this->smarty();
		
		if(!empty($_POST["t_id"])){
//			进入的是话题修改页面
			$oper = new TopicsOper();
			$data = $oper->getTopicById();
			$smarty = $this->smarty();
			$smarty->assign("data",$data["topic"][0]);
			$smarty->assign("newslist",$data["news"]);
		}
		
		$oper = new TopicClassOper();
		$data = $oper->getAllTopicClass();
		$smarty->assign("tc",$data);
		$smarty->display("admin/TopicsAdd.html");
	}

	//添加话题页面的新增按钮
	function doaddTopics() {
		$obj = new TopicsOper();
		if( $obj->addTopics() ){
			echo "true";
		}else{
			echo "false";
		}
	}
	
	//进行删除话题
	function delTopic(){
		$oper=new TopicsOper();
		if( $oper->delTopic() ){
             //"删除成功";
			//删除成功需要刷新页面
			$this->TopicsMana();
		}else{
			echo "false";
		}		
	}

	//进行批量删除
	function batchDel(){
		$oper=new TopicsOper();
		$data=$oper->batchDelTopic();
		if($data){
	         //"删除成功";
			//删除成功需要刷新页面
			$this->TopicsMana();
		}else{
			echo "false";
		}		
	}

	//话题新增页面的弹窗-资讯列表
	function newslistModal(){
		$oper = new NewsOper();
		$this->pagecount=4;
		$re = $oper->searchNews(($this->curpage-1)*$this->pagecount,$this->pagecount);
		$this->setPage($re["count"],1);
		$smarty = $this->smarty();
		$smarty->assign("data",$re["data"]);
		
		//tc中放的值用于放在话题类别的下拉框中
		$oper = new TopicClassOper();
		$data = $oper->getAllTopicClass();
		$smarty->assign("tc",$data);
		$smarty->display("admin/modalNewsList.html");			
	}
	//删除话题中的资讯
	function delTopics_News(){
		$oper = new TopicsOper();
		if( $oper->delTopics_News() ){
             //"删除成功";
			echo "true";
		}else{
			echo "false";
		}		
	}
}
?>