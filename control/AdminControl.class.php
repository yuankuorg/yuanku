<?php
	class AdminControl extends Control{
		
		public function updateInfo(){
			$smarty=$this->smarty();
			$smarty->display("admin/updateInfo.html");
		}
		//模态窗显示操作失败的页面
		public function showflase(){
			$smarty=$this->smarty();
			$smarty->display("admin/modalFalse.html");
		}
		//模态窗显示没有什么操作的页面
		public function chooseOne(){
			$smarty=$this->smarty();
			$smarty->display("admin/Choose.html");
		}
		//管理员新增
		function add(){
			$obj=new AdminOper();	
			if( $obj->add() ){
				echo "true";
			}else{
				echo "false";
			}	
		}
		//
    	function modaladmin(){
    		$obj=new AdminOper();
			$data=$obj->getadmin();
			$smarty=$this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("admin/modaladmin.html");
    	}
		//管理员查询与分页
		public function adminIstrator(){
			$obj=new AdminOper();
			$re =$obj->select(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($re["count"]);
			
			$dat =$obj->seladmin();
			$smarty = $this->smarty();
			$smarty->assign("re",$re["data"]);
			$smarty->assign("dat",$dat);
			$smarty->display("admin/adminIstrator.html");	
		}
		//修改管理员
		function upadmin(){
			$oper=new AdminOper();
			$arr = array();
			if($oper->upadmin()){//修改成功
				$arr["code"] = 1;
			}else{//修改失败
				$arr["code"] = 0;
			}
			echo json_encode($arr);	
		}
		//修改超级管理员
		function moadmin(){
			$oper=new AdminOper();		
			$arr = array();
			if($oper->mobaladmin()){//修改成功
				$arr["code"] = 1;
			}else{//修改失败
				$arr["code"] = 0;
			}
			echo json_encode($arr);	
		}
		//管理员修改密码
		function pwdadmin(){
			$oper=new AdminOper();
			$oldpwd=$oper->pwdcheck();
			$arr = array();
			if($oldpwd!=md5($_POST['pwd'])){
				$arr['code']=0;
			}else{
				if($oper->pwdadmin()){//修改成功
					$arr["code"] = 1;
				}else{//修改失败
					$arr["code"] = 0;
				}
			}
			echo json_encode($arr);	
		}
		//管理员删除
		function deladmin(){
			$oper=new AdminOper();
			if( $oper->deladmin() ){
             //"删除成功";
			//删除成功需要刷新页面
			$this->adminIstrator();
			}else{
				echo "false";
			}		
		}
	}
?>