<?php
	/**
	 * 悬赏控制器
	 */
	class OfferControl extends Control {
		//去数据库取出任务并且显示页面   全部任务
		public function offer(){
			$oper = new OfferOper();
			$data = $oper->getTask(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$mydata = $oper->getMyTask(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$smarty = $this->smarty();			
			$smarty ->assign("row",$data);
			$smarty ->assign("mydata",$mydata["data"]);
			$smarty ->assign("count",$mydata["count"]);
			$smarty->display("study/offer.html");
		}
		//点击查找后部分刷新
		public function searchMes(){
			$oper = new OfferOper();
			$data = $oper->searchMes(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$smarty = $this->smarty();	
			$smarty ->assign("row",$data);
			$smarty->display("study/offerSeach.html");
		}
		
		//所有任务分页
		function moreOffer() {
			$smarty = $this->smarty();
			$oper = new OfferOper();
			$data = $oper->getTask(($this->curpage-1)*$this->pagecount,$this->pagecount);//任务加载更多
			$smarty->assign("row",$data);
			$smarty->display("study/offerSeach.html");
		}
		//我的任务分页
		function myTask() {
			$smarty = $this->smarty();
			$oper = new OfferOper();
			$mydata = $oper->getMyTask(($this->curpage-1)*$this->pagecount,$this->pagecount);//我的任务加载更多
			$smarty->assign("row",$mydata["data"]);
			$smarty->display("study/moreoffmytask.html");
		}
		//我的任务详情页显示
		public function offermine(){
			$oper = new OfferOper();
			$detail = $oper->showOffer();		
			$smarty = $this->smarty();	
			$smarty ->assign("detail",$detail["mydata"]);
			$smarty ->assign("alldata",$detail["alldata"]);
			$smarty ->assign("count",$detail["count"]);
			$smarty->display("study/offermine.html");
		}
		//增加任务页显示
		public function offeradd(){
			$oper = new OfferOper();
			$exchange = $oper->seachExchange();			
			$smarty = $this->smarty();
			$smarty ->assign("exchange",$exchange);
			$smarty->display("study/offeradd.html");
		}
		
		//点击加载更多时调用的函数
		public function getmoreOffer(){
			$oper = new OfferOper();
			$data = $oper->getTask(($this->curpage-1)*$this->pagecount,$this->pagecount);
			if( !$data ){
				echo "false";
			}else{
				echo json_encode($data);	
			}
		}
		
		//将发布的任务写进数据库
		public function addoffer(){
			$oper = new OfferOper();
			if($oper->addoffer()){
				echo "true";
			} else{
				echo "false";
			}
		}
		//将回复的任务写进数据库
		public function taskRec(){
			$oper = new OfferOper();
			if($oper->taskRec()){
				echo "true";
			} else{
				echo "false";
			}
		}
		
		//采纳时，将当前的任务状态改变，将回复的状态也改变，最后再改变积分
		public function adopted(){
			$oper = new OfferOper();
			if($oper->adopted()){
				echo "true";
			} else{
				echo "false";
			}
		}
	}