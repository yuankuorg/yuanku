<?php
class TopicClassControl extends Control {
	//进入话题类别管理页面		
	public function TopicClassMana(){
		checkLogin();
		$oper = new TopicClassOper();
		$re = $oper->searchTopicClass(($this->curpage-1)*$this->pagecount,$this->pagecount);
		$this->setPage($re["count"]);
		
		$smarty = $this->smarty();
		$smarty->assign("data",$re["data"]);
		$smarty->display("admin/TopicClassMana.html");
	}
	
	//进入话题类别添加页面
	public function TopicClassAdd(){
		checkLogin();
		$smarty = $this->smarty();
		
		if(!empty($_POST["tc_id"])){
//			进入的是话题类别修改页面
			$oper = new TopicClassOper();
			$data = $oper->getTopicClassById();
			$data = $data[0];
			
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
		}	
		//获取项目
		$oper = new VipOper();
		$items = $oper->getModalVip();
		$smarty->assign("itemdata",$items);
		
		$smarty->display("admin/TopicClassAdd.html");
	}
	
	//添加话题类别页面的新增按钮
	function doaddTopicClass() { //增加商品页面的提交按钮
		$obj = new TopicClassOper();
		if( $obj->addTopicClass() ){
			echo "true";
		}else{
			echo "false";
		}
	}	
	
	//资讯修改页面的更新按钮
	function doupdateTopicClass(){
		$oper=new TopicClassOper();
		
		$arr = array();
		if($oper->updateTopicClass()){//修改成功
			$arr["code"] = 1;
			$arr["message"] = "修改资讯成功！";
		}else{//修改失败
			$arr["code"] = 0;
			$arr["message"] = "修改资讯失败或没有进行修改！";
		}
		echo json_encode($arr);			
	}	
	
	//进行删除
	function delTopicClass(){
		$oper=new TopicClassOper();
		if( $oper->delTopicClass() ){
             //"删除成功";
			//删除成功需要刷新页面
			$this->TopicClassMana();
		}else{
			echo "false";
		}		
	}

	//进行批量删除
	function batchDel(){
		$oper=new TopicClassOper();
		if( $oper->batchDelTopicClass() ){
             //"删除成功";
			//删除成功需要刷新页面
			$this->TopicClassMana();
		}else{
			echo "false";
		}		
	}
}
?>