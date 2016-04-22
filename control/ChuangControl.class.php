<?php
	/**
	 * 闯关控制器
	 */
	class ChuangControl extends Control {
		private $data ;
		function __construct(){
			parent:: __construct();
			$this->data = new ChuangvipOper();
		}
		
		//跳转到三张图片
		function gogs(){
			$projectdata = $this->data->getproject();	
			$smarty = $this->smarty();
			$smarty->assign("projectdata",$projectdata);
			$smarty->display("study/gs.html");
		}
		
		//根据id搜索并且显示到第二个页面
		function gouigs(){
			$projectdata = $this->data->getProjectByID();
			$chaptercount = $this->data->seachChapter();								
			$smarty = $this->smarty();
			$smarty->assign("chaptercount",$chaptercount);
			$smarty->assign("projectdata",$projectdata);
			$smarty->display("study/uigs.html");
		}
		
		//根据id搜索并且显示到第三个页面
		function gochuangps() {
			//当前会员当前关卡的状态
			$cstate = $this->data->seachChuangstate();
			//当前关卡的内容
			$data = $this->data->getchapter();
			//当前会员的状态变化
			$change= $this->data->seachChuang();
			
			$smarty = $this->smarty();
			if( $cstate ) {
				$smarty->assign("cstate",$cstate);
			}
			if( $change ) {
				$smarty->assign("change",$change);
			}
			$smarty->assign("chapterdata",$data);
			$smarty->display("study/chuangps.html");
		}
		
		/**
		 * 由初始化状态改变了已申请状态
		 */
		function changeState() {
			if( $this->data->changeState(Oper::$CHANGESTATE["shengqi"],"用户提交通关申请") ) {
				echo "true";
			} else {
				echo "false";
			}
		}
		
		//增加会员的闯关状态
		function deductExchange(){
			$ret = array();
			$deductexchange = $this->data->deductExchange();
			if($deductexchange == 0){
				$ret["code"] = 1; //扣除成功
			}
			if($deductexchange == 1){
				$ret["code"] = 2;// 积分不足
			}
			if($deductexchange == 2){
				$ret["code"] = 3;//  操作失败
			}
			
			echo json_encode($ret);
		}
		
		//判断是否扣除积分
		public function isdelExchange(){
			if( $this->data->seachChuangstate() ){
				echo "true";
			} else{
				echo "false";
			}
		}
	}