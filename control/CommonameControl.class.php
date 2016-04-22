<?php
	class commonameControl extends Control{
		//后台商品管理页面
		public function choice(){
			checkLogin();
			$ch = new JifenOper();
			$data = $ch->Showchange();
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("study/lxrcommoname.html");
		}
		
		public function Modifycommo () {
			$smarty = $this->smarty();
			$smarty->display("study/lxrcommmodify.html");
		}
		
		function Doaddchange() {
			$obj = new JifenOper();
			if( $obj->Doaddchange()){
				echo "true";
			}else{
				echo "false";
			}
		}
		
		public function delchange(){
			$obj = new JifenOper();
			if( $obj->delchange()){
				echo "true";
			}else{
				echo "false";
			}
		}
		
		public function changeadd(){
			checkLogin();
			$smarty = $this->smarty();
			$oper = new JifenOper();
			if(!empty($_POST["pid"])){
				$data = $oper->getchangeById();
				$smarty->assign("data",$data);
			}
				$smarty->display("study/lxrcommmodify.html");
		}
		
		
		function updatechange(){
			$oper = new JifenOper();
			
			$arr = array();
			if($oper->updatechange()){//修改成功
				$arr["code"] = 1;
				$arr["message"] = "修改项目成功！";
			}else{//修改失败
				$arr["code"] = 0;
				$arr["message"] = "修改项目失败或没有进行修改！";
			}
			echo json_encode($arr);		
		}
		
		//进入兑换管理页面
		function gift(){
			checkLogin();
			$ch = new JifenOper();
			$data = $ch->getAllexchange();
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("study/lxrgift.html");
		}
	}