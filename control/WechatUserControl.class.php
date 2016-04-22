<?php
	//微信用户控制器
	class WechatUserControl extends Control {
		
		/*
		 * 初始化微信用户管理信息
		 */
		public function initUsers(){
			$obj = new WechatUserOper();
			$tableresult = $obj->trunsAllTables();			//删除所有的表格
			
			$wechat = $this->wechat();
			$wechat->checkAuth();							//获取缓存上的票据
			$userlist = $wechat->getUserList();				//批量获取关注用户列表
			$openid = $userlist["data"]["openid"];			//获取所有关注用户的openid
			$userinfos = array();
			foreach( $openid as $id ){
//				if( $obj->getOneUsers($id) == false ) {
					$userinfos[] = $wechat->getUserInfo( $id );	
//				}
			}
			$inforesult = $obj->initUser($userinfos);	//从数据库中获取 分组及用户的全部信息
			
			if( $inforesult ){
				$this->wechatUser();
			} else {
				echo 'false';
				$wechat->removeCache();
			}
		}
		
		/**
		 * 重新刷新会员的图象
		 */
		public function reflush() {
			checkLogin();
			$obj=new WechatUserOper();
			//找出所有的openid
			$arr = $obj->getAllOpenID();
			
			//微信中找到所有的图像
			$wechat = $this->wechat();
			$wechat->checkAuth();
			
			foreach( $arr as $vip ) {
				//通过openid找到对应的图像
				$userinfo = $wechat->getUserInfo( $vip["openid"] );			
				$username = urldecode($userinfo["nickname"]);		//微信名
				$headimg = urldecode($userinfo["headimgurl"]);		//头像
				
				$obj->updateOpenID($vip["openid"],$headimg,$username);
			}
		}
		
		/*
		 * 显示所有的微信用户
		 */
		public function wechatUser(){
			checkLogin();
			$obj=new WechatUserOper();
			$data = $obj->getAllUsers( ($this->curpage-1)*$this->pagecount,$this->pagecount );			//得到用户的全部信息
			$this->setPage($data["count"]);
			$smarty = $this->smarty();
			$smarty->assign("data",$data["data"]);
			$smarty->display("wechat/wechatUser.html");
		}
	
		public function addUser() {
			checkLogin();
			
			$wechat = $this->wechat();
			$userinfo = $wechat->getUserInfo( $_POST["openid"] );			
			$username = urldecode($userinfo["nickname"]);		//微信名
			$sex = urldecode($userinfo["sex"]);					//性别
			$headimg = urldecode($userinfo["headimgurl"]);		//头像
			$remark = urldecode($userinfo["remark"]);			//备注
			$groupid = urldecode($userinfo["groupid"]);			//组别
			
			$po=new WechatUserOper();
			$res = $po->setAllUsers($_POST["openid"], $username, $sex, $headimg, $remark, $groupid);//将关注的用户的信息存入数据库中
			if( $res ) {
				echo "true";
			} else {
				echo "false";
				$wechat->removeCache();
			}
		}
	}