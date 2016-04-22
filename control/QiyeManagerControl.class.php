<?php
	class QiyeManagerControl extends Control{
		//后台显示数据 
		public function companyManager(){
			$qiyeOper = new QiyeOper();
			$re = $qiyeOper->getManaZhaopin(($this->curpage-1)*$this->pagecount,$this->pagecount );
            $this->setPage($re["count"]);
			$smarty = $this->smarty();
			$smarty->assign("data",$re["data"]);
			$smarty->display("study/qiyeManager.html");
		}
		//删除数据
		public function delZhaopin(){
			$qiyeOper = new QiyeOper();
				if( $qiyeOper->deleZhaopin()){
					echo "true";
				}else{
					echo "false";
			}
		}
		//进入修改页面
		public function altZhaopin(){
			$qiyeOper = new QiyeOper();
			$smarty = $this->smarty();
			if(!empty($_POST["zid"])){
				$data = $qiyeOper->getZhaopinByid();
				$smarty->assign("data",$data);
			}
				$smarty->display("study/ManaAlterZhaopin.html");
		}
		//修改
		function updZhaopin(){
			$qiyeOper = new QiyeOper();
			
			$arr = array();
			if($qiyeOper->updateZhaopin()){//修改成功
				$arr["code"] = 1;
				$arr["message"] = "修改成功！";
			}else{//修改失败
				$arr["code"] = 0;
				$arr["message"] = "修改失败";
			}
			echo json_encode($arr);		
		}
	}
