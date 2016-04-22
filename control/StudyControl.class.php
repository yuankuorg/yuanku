<?php
	/**
	 * 助学成才的首页控制器
	 */
	class StudyControl extends Control {
		public function index() {
			$v = new VipOper();
			if( isset($_GET["openid"]) ) {
				$vip = $v->getVipByID();
				if( $vip ) {
					$_SESSION["vip"] = $vip;
				}
				
//				$pid = $v->getPidByID();
//				if( !empty($pid) ) {
//					$_SESSION["pid"] = $pid[0];
//				}
			}
			$cars = new CarouselOper();
			$Car = $cars->getCarousel();		//获取轮播图
			
			
			$smarty = $this->smarty();
			$smarty -> assign("Car",$Car);
			$smarty -> assign("sign",$this->getSign());
			$smarty -> display("study/home.html");
		}
		
		/*注册*/
		public function register(){
			$smarty = $this->smarty();
			$smarty->display("study/register.html");
		}
		
		/*签到*/
		public function sign(){
			$look = array();
			$sign = new VipOper();
			$signs = $sign->makesign();
			$select = $sign->selectsign();
			
			if($signs){
				$look["code"] = 1;
			}else{
				$look["code"] = 2;
			}
			$look["count"] = $select[0];
			$arr = array("code"=>$look["code"],"count"=>$look["count"]);
			echo json_encode($arr);
			
		}
	}