<?php
	class WechatCusMenuControl extends Control {
		//提交自定义菜单数据到微信服务器
		public function setCusMenu(){
			checkLogin();
			$weObj=$this->wechat();
			$weObj->checkAuth();
			$newmenu['button'] = $_POST['button'];
			$res = $weObj->createMenu($newmenu);
			if($res){
				echo 'true';exit;
			}else{
				echo 'false';
				$weObj->removeCache();
				exit;
			}				
		}
		
		//从微信服务器获取自定义菜单内容
		public function getCusMenu(){
			checkLogin();
			$weObj=$this->wechat();
			$weObj->checkAuth();
			$data=$weObj->getMenu();
		}
		
		//删除微信服务器上的自定义菜单
		public function delCusMenu(){
			checkLogin();
			$weObj=$this->wechat();
			$weObj->checkAuth();
			$res = $weObj->deleteMenu();
			if($res){
				echo 'true';
			}else{
				echo 'false';
			}
		}

		//获取自定义菜单内容，展示页面		
		public function cusMenuMan(){
			checkLogin();
			$weObj=$this->wechat();
			$weObj->checkAuth();
			$data=$weObj->getMenu();
			if(!$data){
				$weObj->removeCache();
				echo '出错，已清除缓存，请再刷新页面';
			}
			$smarty=$this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("wechat/cusMenuMan.html");
		}
		
				
	}	