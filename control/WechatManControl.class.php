<?php
	class WechatManControl extends Control {
		//清空抽奖人名单	
		public function delwechatname(){
			$obj = new WechatOper();
			if( $obj->delwechat() ){
				echo "true";
			}else{
				echo "false";
			}
		} 
		
		//删除已中奖人
		public function delname(){
			$obj = new WechatOper();
			if( $obj->deluname() ){
				echo "true";
			}else{
				echo "false";
			}
		}	
			
		//获取抽奖人列表
		public function getnames(){
			$obj = new WechatOper();
			echo json_encode($obj->getname());
		}
		//获取并显示抽奖人列表或者进入小游戏界面
		public function getThePeople(){
			checkLogin();
			$oper = new WechatOper();
			$re = $oper->getpeople(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($re["count"]);
			$smarty = $this->smarty();
			$smarty->assign("data",$re);
			$smarty->display("wechat/game.html");
		}
		
		//添加游戏关键字
		public function addTheKey(){
			$obj = new WechatOper();
			$data = $obj->doaddkey();
			if( $data ){
				echo "true";
			}else{
				echo "false";
				
			}
		}	
		
		
		//进入修改关键字回复信息
		public function replyRuleChange(){
			checkLogin();
			$obj = new WechatOper();
			$re = $obj->getReplyRule();
			$smarty = $this->smarty();
			$smarty->assign("data",$re);
			$smarty->display("wechat/replyRuleChange.html");
		}	
			
		//批量删除关键字回复信息	
		public function delsomekeys(){
			$obj = new WechatOper();
			if( $obj->delsomekey() ){
				echo "true";
			}else{
				echo "false";
			}
		}	
			
		//点击删除关键字回复信息
		public function delonekey(){
			$obj = new WechatOper();
			if( $obj->delakey() ){
				echo "true";
			}else{
				echo "false";
			}
		}
		
		//保存编辑回复信息页面	
		public function saveText(){
			checkLogin();
			$oper = new WechatOper();
			$flag = $oper->updateinfo();
			if( $flag == true ){
				$this->autoReply();
			}else{
				echo "false";
			}
		}
			
		//添加关键字回复信息
		public function addkeyinfo(){
			$obj = new WechatOper();
			$data = $obj->doaddkeyinfo();
			if( $data ){
				echo "true";
			}else{
				echo "false";
				
			}
		}
		//验证关键字
		public function checkkey(){
			$obj = new WechatOper();
			if( $obj->checkkey()){
				echo "false";
			}else{
				echo "true";
			}
		}
		
		
		//进入自动回复信息管理界面
		public function autoReply(){
			checkLogin();
			$oper = new WechatOper();
			$re = $oper->getinfo(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($re["count"]);
			$smarty = $this->smarty();
			$smarty->assign("data",$re);
			$smarty->display("wechat/autoReply.html");
			
		}
		//进入添加关键字回复信息界面
		public function replyRuleAdd(){
			checkLogin();
			$smarty = $this->smarty();
			$smarty->display("wechat/replyRuleAdd.html");
		}
		//进入编辑被关注或非关键字回复信息页面
		public function autoReplyChange(){
			checkLogin();
			$oper = new WechatOper();
			$re = $oper->getnokeyinfo();
			$smarty = $this->smarty();
			$smarty->assign("data",$re);
			$smarty->display("wechat/autoReplyChange.html");
		}
	}