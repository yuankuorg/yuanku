<?php
	class AdminIndexControl extends Control {
		//后台
		public function index(){
			checkLogin();
			$smarty = $this->smarty();
			$smarty->display("admin/index.html");
			echo "<script type='text/javascript'>$(function(){
					$.ajax({
					type:'post',
					url:'/yuanku/adminIndex-home.html',
					success:function(text){
						$('.main').html(text);
					},
					async:true
				});
			});</script>";
		}
		//放数据在首页
		public function home(){
			checkLogin();
			$oper = new AdminOper();
			$da = $oper->selvip();	
			$re = $oper->seltopic(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($re["count"]);
			$smarty = $this->smarty();
			$smarty->assign("da",$da);	
			$smarty->assign("re",$re["data"]);
			$smarty->display("admin/home.html");
		}
		//展示最热资讯函数
		public function BestHotPage(){
			checkLogin();
			$oper = new AdminOper();
			$re = $oper->seltopic(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($re["count"]);
			$smarty = $this->smarty();	
			$smarty->assign("re",$re["data"]);
			$smarty->display("admin/BestHotPage.html");	
		}
		//展示最新资讯函数
		public function BestNewsPage(){
			checkLogin();
			$oper = new AdminOper();
			$ree = $oper->selnews(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($ree["count"]);	
			$smarty = $this->smarty();	
			$smarty->assign("ree",$ree["data"]);
			$smarty->display("admin/BestNewsPage.html");	
		}
		//会员管理
		public function vipMana(){
			checkLogin();
			$oper = new VipOper();
			$re = $oper->getVip(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($re["count"]);
			$smarty = $this->smarty();
			$smarty->assign("data",$re);
			$smarty->display("admin/vipMana.html");
		}
		public function TopicsMana(){
			$smarty = $this->smarty();
			$smarty->display("admin/TopicsMana.html");
		}
		public function TopicsClassMana(){
			$smarty = $this->smarty();
			$smarty->display("admin/TopicsClassMana.html");
		}
		public function NewsMana(){
			$oper = new NewsOper();
			$data = $oper->searchNews();
			$smarty = $this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("admin/NewsMana.html");
		}
		//评论管理
		public function comment(){
			checkLogin();
			$oper = new CommentOper();
			
			$re = $oper->getallComment(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($re["count"]);
			
			$smarty = $this->smarty();
			$smarty->assign("re",$re["data"]);
			$smarty->display("admin/comment.html");	
		}
		public function addadmins(){
			$smarty = $this->smarty();
			$smarty->display("admin/addadmin.html");
		}
		//查管理员
		public function addadmin(){
			$obj=new AdminOper();
			$data=$obj->getadmin();
			$smarty=$this->smarty();
			$smarty->assign("data",$data);
			$smarty->display("admin/addadmin.html");
		}
		//跳到修改密码页面
		public function updatepwd(){
			$smarty = $this->smarty();
			$smarty->display("admin/updatepwd.html");
		}
		//登录页
		public function signin(){
			$smarty = $this->smarty();
			$smarty->display("admin/login.html");
		}		
		//登录判断
		public function login(){
			$arr = array();
			//提交的验证码和已提交的验证码是否相同
			if ($_POST["vcode"] != $_SESSION["vcode"]) {
				$arr["num"] = 0;
				$arr["message"] = "验证码错误！";
		
				echo json_encode($arr);
				exit();
			}
			
			$co = new EmpModel();
			$admin = $co->login();
			if ($admin) {
				if($_POST["remember_me"] == 1){
					//不设置时间就是临时的cookie，浏览器关闭就消失
					setcookie("code",$_POST["code"],time()+24*60*60);
					setcookie("password",$_POST["password"],time()+24*60*60);
				}else{
					setcookie("code","",time()-3600);
					setcookie("password","",time()-3600);			
				}
				
				$_SESSION["admin"] = $admin;
				$arr["num"] = 1;
			}else{
				$arr["num"] = 2;
				$arr["message"] = "账户或密码错误，请重新填写!";		
			}
			
			echo json_encode($arr);
			exit();		
		}		
	}