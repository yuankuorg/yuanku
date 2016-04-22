<?php
	/**
	 * 积分的控制器
	 */
	class JifenControl extends Control{
		private $data;
		function __construct(){
			parent:: __construct();
			$this->data = new JifenVipOper();
		}
		
		function Lxrjifen(){
			$commoditydata = $this->data->getcommodity(0,$this->pagecount); //商品信息
			$getvipchenge = $this->data->getChengeTotal();//用户信息
			$getChengeData = $this->data->getChengeData(0,$this->pagecount);//已兑换的信息
			
			$smarty = $this->smarty();
			$smarty->assign("commoditydata",$commoditydata);
			$smarty->assign("getvipchenge",$getvipchenge);
			$smarty->assign("getChengeData",$getChengeData);
			$smarty->display("study/jifen.html");
		}
		
		//积分兑换
		function addchange(){
			$ret = $this->data->goIngExchange();
			echo json_encode($ret);
		}
		
		//商品分页
		function commodityPage() {
			$smarty = $this->smarty();
			$commoditydata = $this->data->getcommodity(($this->curpage-1)*$this->pagecount,$this->pagecount); //商品信息
			$smarty->assign("commoditydata",$commoditydata);
			$smarty->display("study/commodityPage.html");
		}
		
		//我的兑换分页
		function chengePage() {
			$smarty = $this->smarty();
			$getChengeData = $this->data->getChengeData(($this->curpage-1)*$this->pagecount,$this->pagecount); //商品信息
			$smarty->assign("getChengeData",$getChengeData);
			$smarty->display("study/chengePage.html");
		}
	}