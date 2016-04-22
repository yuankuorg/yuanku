<?php
	class VipControl extends Control {
		//删除会员
		public function vipDel(){
			$oper = new VipOper;
			$data = $oper->vipDel();
			$smarty = $this->smarty();
			if($data){
				echo true;
			}else{
				echo false;
			}
		}
		//会员编辑
		public function vipCompile(){
			$oper = new VipOper;
			$data = $oper->getVipId();
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("admin/vipDetails.html");
		}
		
		//搜索,show出学员openid
		public function ShowOpenId(){
			$oper = new VipOper();
			$data=$oper->ShowOpenId(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($data["count"]);
			
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("admin/ShowOpenId.html");
		}
		//进入添加会员
		public function vipDetails(){
			$oper = new VipOper;
			$data = $oper->getVipId();
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("admin/vipDetails.html");
		}
		//获取项目和状态
		public function getIS(){
			$oper = new VipOper;
			$data = $oper->getIS();
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("admin/vipDetails.html");
		}
		//增加会员
		public function addVip(){
			$oper = new VipOper;
			if( $_POST["item"] == 8 && !$oper->checkSchoolTeacher() ) {
				echo "false";
				exit();
			}
			
			if( $oper->addVip() ){
				echo "true";
			}else{
				echo "false";
			}
		}
		
		//批量删除会员
		public function delSomeVip(){
			$oper = new VipOper;
			$data = $oper->delSomeVip();
			if($data){
				echo true;
			}else{
				echo false;
			}
		}
		//修改会员
		public function alterVip(){
			$oper = new VipOper;
			if($_POST["item"] == 8 && !$oper->checkSchoolTeacher() ) {
				echo "false";
				exit();
			}
			
			if($oper->alterVip()){
				echo "true";
			}else{
				echo "false";
			}
		}
		//搜索会员
		public function vipSeek(){
			$oper = new VipOper;
			$re = $oper->vipSeek(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($re["count"]);
			$smarty = $this->smarty();
			$smarty->assign("data",$re);
			$smarty->display("admin/vipMana.html");
		}
		//modal删除状态
		public function statusDel(){
			$oper = new VipOper;
			$data = $oper->statusDel();
			if($data){
				echo true;
			}else{
				echo false;
			}
		}
		//modal删除项目
		public function itemsDel(){
			$oper = new VipOper;
			$data = $oper->itemsDel();
			if($data){
				echo true;
			}else{
				echo false;
			}
		}
		//modal项目增加
		public function itemsAdd(){
			$oper = new VipOper;
			$data = $oper->itemsAdd();
			if($data){
				echo true;
			}else{
				echo false;
			}
		}
		//modal状态增加
		public function statusAdd(){
			$oper = new VipOper;
			$data = $oper->statusAdd();
			if($data){
				echo true;
			}else{
				echo false;
			}
		}
		//状态项目-弹窗
		public function modalVip(){
			$oper = new VipOper;
			$data = $oper->getModalVip();
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("admin/modalVip.html");
		}
		//获取状态修改记录-弹窗
		public function logstatus(){
			$oper = new VipOper;
			$data = $oper->getVipLogstatus(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($data["count"]);
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("admin/modalVipLogstatus.html");
		}
		//搜索状态修改记录-弹窗
		public function seeklogStatus(){
			$oper = new VipOper;
			$data = $oper->seeklogStatus(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($data["count"]);
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("admin/modalVipLogstatus.html");
		}
		//学校管理弹窗
		public function schoolManage() {
			$oper = new VipOper();
			$re = $oper->getAllSchool(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($re["count"]);
			$smarty = $this->smarty();
			$smarty->assign("data",$re);
			$smarty->display("admin/schoolManage.html");
		}
		public function schoolPop() {
			$oper = new VipOper();
			$re = $oper->getAllSchool(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($re["count"]);
			$smarty = $this->smarty();
			$smarty->assign("data",$re);
			$smarty->display("admin/schoolpop.html");
		}
		//增加学校
		public function addSchool() {
			$oper = new VipOper();
			if( $oper->addSchool() ) {
				$this->schoolManage();
			} else {
				echo "false";
			}
		}
		//删除学校
		public function delSchool() {
			$oper = new VipOper();
			if( $oper->delSchool() ) {
				$this->schoolManage();
			} else {
				echo "false";
			}
		}
		//判断学校导师的唯一性
		public function checkSchoolTeacher() {
			$oper = new VipOper();
			if( $oper->checkSchoolTeacher() ) {
				echo "true";
			} else {
				echo "false";
			}
		}
	}
?>