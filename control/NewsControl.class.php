<?php
class NewsControl extends Control {
	//进入资讯管理页面		
	public function NewsMana(){
		checkLogin();
		$oper = new NewsOper();
		$re = $oper->searchNews(($this->curpage-1)*$this->pagecount,$this->pagecount);
		$this->setPage($re["count"]);
		
		$smarty = $this->smarty();
		$smarty->assign("data",$re["data"]);
		$smarty->display("admin/NewsMana.html");
	}
	
	//进入资讯添加页面页面
	public function NewsAdd(){
		checkLogin();
		$smarty = $this->smarty();
		if(!empty($_POST["n_id"])){
//				进入的是资讯修改页面
			$oper = new NewsOper();
			$data = $oper->getNewsById();
			$data=$data[0];
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
		}
		$smarty->display("admin/NewsAdd.html");
	}
	
	//添加资讯页面的新增按钮
	function doaddNews() {
		$obj = new NewsOper();
		if( $obj->addNews() ){
			echo "true";
		}else{
			echo "false";
		}
	}	
	
	//资讯修改页面的更新按钮
	function doupdateNews(){
		$oper=new NewsOper();
		
		$arr = array();
		if($oper->updateNews()){//修改成功
			$arr["code"] = 1;
			$arr["message"] = "修改资讯成功！";
		}else{//修改失败
			$arr["code"] = 0;
			$arr["message"] = "修改资讯失败！";
		}
		echo json_encode($arr);			
	}
	
	//进行删除
	function delNews(){
		$oper=new NewsOper();
		if( $oper->delNews() ){
             //"删除成功";
			//删除成功需要刷新页面
			$this->NewsMana();
		}else{
			echo "false";
		}		
	}
	
	//进行批量删除
	function batchDel(){
		$oper=new NewsOper();
		if( $oper->batchDelNews() ){
             //"删除成功";
			//删除成功需要刷新页面
			$this->NewsMana();
		}else{
			echo "false";
		}		
	}

}
?>