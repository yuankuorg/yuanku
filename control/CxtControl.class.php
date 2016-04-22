<?php
	/**
	 * 简历、动态、校友控制器
	 */
	class CxtControl extends Control {
		//进入校友子页
		function goalumnus() {
			$alumnus = new DynamicOper();
			$data = $alumnus->getalumnus(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("study/cxtalumnus.html");
		}
		//点击加载更多校友信息
		function getmorealumnus(){
			$obj = new DynamicOper();
			$alumnus = $obj->getalumnus(($this->curpage-1)*$this->pagecount,$this->pagecount);
			if( !$alumnus ){
				echo "false";
			}else{
				echo json_encode($alumnus);	
			}
		}
		//进入动态子页
		function godynamic(){
			$obj = new DynamicOper();
			$mydynamic = $obj->getmydynamic(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$alldynamic = $obj->getalldynamic(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$smarty = $this->smarty();
			$smarty->assign("mydynamic",$mydynamic);
			$smarty->assign("alldynamic",$alldynamic);
			$smarty->display("study/cxtdynamic.html");
		}
		//点击加载更多我的动态信息
		function getmoremydynamic(){
			$obj = new DynamicOper();
			$mydynamic = $obj->getmydynamic(($this->curpage-1)*$this->pagecount,$this->pagecount);
			if( !$mydynamic ){
				echo "false";
			}else{
				echo json_encode($mydynamic);	
			}
		}
		
		//点击加载更多全部动态信息
		function getmorealldynamic(){
			$obj = new DynamicOper();
			$alldynamic = $obj->getalldynamic(($this->curpage-1)*$this->pagecount,$this->pagecount);
			if( !$alldynamic ){
				echo "false";
			}else{
				echo json_encode($alldynamic);	
			}
		}
		
		//进入简历子页
		function goresume(){
			$obj = new DynamicOper();
			$resume = $obj->getresume();
			$smarty = $this->smarty();
			if($resume != false){
				$smarty->assign("resume",$resume);
			}
			$smarty->display("study/cxtresume.html");
		}
		//保存简历事件
		function doaddresume(){
			$obj = new DynamicOper();
			if( $obj->saveresume() ){
				echo "true";
			}else{
				echo "false";
			}
		}
	}