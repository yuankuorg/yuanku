<?php
	class MobileControl extends Control {
		public function checkstatus() {
			$oper = new MobileSecondpageOper();
			$tc_id = $oper->docheckstatus();
			
			$smarty = $this->smarty();
			if( $tc_id == false ) {
				$smarty->display('mobile/random.html');
			} else {
				$_GET["tc_id"] = $tc_id;
				$smarty->display('mobile/second.html');
			}
		}
		
		public function second(){
			$oper = new MobileSecondpageOper();
			
			$smarty = $this->smarty();
			if( $oper->checkItems() ) {
				$smarty->display('mobile/second.html');
			} else {
				$smarty->display('mobile/random.html');
			}
		}
		
		public function index() {
			/**
			 * 缓存5分钟
			 */
			$smarty = $this->smarty();
			$smarty->caching = Smarty::CACHING_LIFETIME_CURRENT;
			$smarty->cache_lifetime = 300;
			$smarty->compile_check = true;
			
			if( !$smarty->isCached('mobile/index.html') ) {
				$oper = new AdminOper();
				$data = $oper->newsindex();
				
				$smarty->assign("data",$data);
			}
			$smarty->display("mobile/index.html");
		}
		
		//二级页面，点击加载更多实现无刷新加载页面
		public function getSecondContent() {
			$pagecount = 5;//每页显示2条数据
			$curpage = 1;//当前是第几页
			if( isset($_POST["curpage"]) ) {//如果$_POST["currentpage"]存在
				$curpage = $_POST["curpage"];
			}
			
			$oper = new MobileSecondpageOper();
			$dataset = $oper->GetPDTopic(($curpage-1)*$pagecount,$pagecount);//两个参数，第几页开始和每页显示的数据
		
			$smarty = $this->smarty();
			$smarty->assign("dataset",$dataset);
			$smarty->display("mobile/second_content.html");
		}
		
		//进入会员报名页面
		public function enterJoinVip(){
			$smarty = $this->smarty();
			$smarty->display("mobile/joinVip.html");
		}

		
		//会员报名提交(手机端)
		public function joinVip(){
			$oper = new VipOper;
			$data = $oper->mobileJoinVip();
			if($data){
				$smarty = $this->smarty();
				$smarty->display("mobile/true.html");
			}else{
				echo "false";
			}
		}
		
		/**
		 * 检测手机号码是否重复
		 */
		public function checkMobile() {
			$oper = new VipOper();
			$data = $oper->checkMobile();
			if($data){
				echo "true";
			}else{
				echo "false";
			}
		}
		
		//三级页面，资讯页面
		public function third(){
			$to = new ThirdOper();
			$re = $to->getNewsContent();			
			
			$smarty = $this->smarty();
			$smarty->assign("re",$re);		
			$smarty->display("mobile/third.html");
		}
		//发送用户评论
		public function sendComment(){
			$to = new ThirdOper();
			$re = $to->sendComment();
												
			if($re){
				$this->finishComment();
			}else{
				echo "false";
			}
		}
		
		public function finishComment(){
			$to = new ThirdOper();
			$re = $to->finishComment();
			
			$smarty = $this->smarty();
			$smarty->assign("re",$re);		
			$smarty->display("mobile/comment.html");			
		}
		//进入制作团队页面
		public function ourTeam(){
			$smarty = $this->smarty();
			$smarty->display("mobile/ourTeam.html");
		}
		
//		//查询是否是新会员
//		function modaladmin(){
//  		$obj=new MobileSecondpageOper();
//			$data=$obj->huiyuan();
//			$smarty=$this->smarty();
//			$smarty->assign("data",$data);
//			$smarty->display("mobile/index.html");
//  	}
	}