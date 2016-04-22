<?php
	abstract class Control { //抽象类,未完成的类,不能够直接使用new关键创建新对象 .一般来这种类都是用来放置一些子类的共用方法
		protected $curpage = 1;    //默认显示第一页
		protected $pagecount = 8;  //每页多少条记录
		protected $page = 1;

		protected $options = array(
			'token'=>'yuankuorg', 												//填写你设定的key
		 	'encodingaeskey'=>'8N8VO8e3Yo2kkf5peSPHtd8Lk45ezXOJbc5PirGCPVl', 	//填写加密用的EncodingAESKey
		 	'appid'=>'wx40aa7803fb01afb3', 										//填写高级调用功能的appid
		 	'appsecret'=>'182713010712dc0e9f33ab4117f00aad', 					//填写高级调用功能的密钥
			'debug'=>true,
			'logcallback'=>'logdebug',											//日志文件
			'access_token_filePath'=> 'wechatCache/'							//设置access_token的缓存路径就可以开启access_token缓存
		);

		public function __construct(){			
			if (!empty($_POST["curpage"])) {		
				$this->curpage = $_POST["curpage"];
			}
		}
		
		public function setPage($count,$a=0){
			if($count == 0){
				$this->page = "0";
			}else{
				if($a){
					$this->page = ceil($count/4);
				}else{
					$this->page = ceil($count/$this->pagecount);
				}
			}
		}
		
		protected function smarty() {
			$smarty = new Smarty();
			$smarty->template_dir = $_SERVER["DOCUMENT_ROOT"]."/yuanku/view/";
			$smarty->compile_dir  = $_SERVER["DOCUMENT_ROOT"]."/yuanku/view_c/";
			$smarty->config_dir   = $_SERVER["DOCUMENT_ROOT"]."/yuanku/config/";
			$smarty->cache_dir    = $_SERVER["DOCUMENT_ROOT"]."/yuanku/cache/";
			$smarty->left_delimiter  = "<{";
			$smarty->right_delimiter = "}>";
			
			$smarty->assign("curpage",$this->curpage);
			$smarty->assign("page",$this->page);
			
			return $smarty;
		}
		
		//创建微信接口对象
		protected function wechat(){
			$weobj = new Wechat( $this->options );					//创建实体类
			return $weobj;
		}
		//获取js签名
		protected function getSign() {
			$jssdk = new JSSDK( $this->options["appid"], $this->options["appsecret"]);
			$signPackage = $jssdk->GetSignPackage();
			return $signPackage;
		}
	}
?>