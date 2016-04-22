<?php 
	class WechatGroupMsgControl extends Control {
		//展示群发消息页面
		function groupMsg(){
			checkLogin();
			$smarty = $this->smarty();
			$smarty->display("wechat/groupMsg.html");
		}
		
		//显示资讯选择页面
		function chooseNews(){
			checkLogin();
			$oper = new NewsOper();
			$re = $oper->searchNews(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($re["count"]);
			
			$smarty = $this->smarty();
			$smarty->assign("data",$re["data"]);
			$smarty->display("wechat/chooseNews.html");
		}
		
		
		//显示图文新增页面
		function articleAdd(){
			checkLogin();
			$smarty = $this->smarty();
			$smarty->display("wechat/articleAdd.html");
		}
		

		//上传图片素材到微信服务器
		function uploadImage($imgUrl){
			checkLogin();
			$weObj=$this->wechat();
			$weObj->checkAuth();
			
			$filepath = $_SERVER["DOCUMENT_ROOT"] . $imgUrl;
			
			//返回值为array("url"=>...)
			$res=$weObj->uploadImg(array("madio"=>"@".$filepath));
			return $res;
		}
		
		
		//上传媒体素材到微信服务器
		function uploadMedia($imgUrl){
			checkLogin();
			$weObj=$this->wechat();
			$weObj->checkAuth();
			
			$filepath = $_SERVER["DOCUMENT_ROOT"] . "" . $imgUrl;
			//返回值为array("media_id"=>...,"url"=>...)			
			$res=$weObj->uploadForeverMedia(array("media"=>"@".$filepath),"image");
			return $res;
		}
		
		//上传图文素材到微信服务器
		function uploadArticle(){
			checkLogin();
			$weObj=$this->wechat();
			$weObj->checkAuth();
			
			//上传数据的格式需要的数组
			$articles=array();
			$oneArticle=array();
			$data=array();
			
			
			if(!isset($_POST['n_id'])){
				echo '获取不到资讯id';
				exit;
			}
			//先从数据库提取资讯内容
			$nidArr=$_POST['n_id'];
			$weOperObj=new WechatOper();
			
			foreach($nidArr as $nid){
				$newArr= $weOperObj->getNewsById($nid);
				
				$mediaArr=$this->uploadMedia($newArr[0]['n_img']);
				$thumbMid=$mediaArr['media_id'];
				if(!$thumbMid){
					//出错就删除缓存
					$weObj->removeCache();
					echo '上传图片封面出错，可能永久素材数量达到上限，也可能缓存有错，已清除缓存，请再试';exit;
				}
				$oneArticle['thumb_media_id']=$thumbMid;
				$oneArticle['author']=$newArr[0]['code'];
				$oneArticle['title']=$newArr[0]['n_title'];
				$oneArticle['content_source_url']='http://'.$_SERVER["SERVER_NAME"].'/yuanku/mobile-third-'.$newArr[0]['n_id'].'.html';
				$oneArticle['digest']='源酷资讯';
				$oneArticle['show_cover_pic']='0';
				
				//把图片上传到微信服务器再替换到内容里
				preg_match_all('/<img.*?src="(.*?)".*?>/is',$newArr[0]['n_content'],$imgArr);
				//print_r($imgArr);
				$theContent=$newArr[0]['n_content'];
				foreach($imgArr[1] as $theImg){
					$theImgArr=$this->uploadImage($theImg);
					if(!$theImgArr){
						echo '上传内容图片出错，可能图片格式不正确，要求jpg或png';exit;
					}
					$theContent=str_replace($theImg,$theImgArr['url'],$theContent);
				}
				$oneArticle['content']=$theContent;
				
				$articles[]=$oneArticle;
			}
			
			$data['articles']=$articles;
			
			$res=$weObj->uploadForeverArticles($data);
			if(!$res){
				echo '上传图文错误，可能永久素材数量达到限制';exit;
			}
			
			return $res['media_id'];
			
		}
		
		//群发图文消息接口，默认发送所有用户
		function sendGroupMsg(){
			checkLogin();
			$weObj=$this->wechat();
			$weObj->checkAuth();
			$mediaId=$this->uploadArticle();
			$data=array();
			$data['filter']=array('is_to_all'=>true);
			$data['msgtype']='mpnews';
			$data['mpnews']=array('media_id'=>$mediaId);
			
			$res=$weObj->sendGroupMassMessage($data);
			if(!$res){
				echo '群发图文消息失败，可能每日一次发送数量限制';exit;
			}else{
				echo '群发图文消息成功';exit;
			}
		}
		
		//根据openid发送图文到指定用户，预览发送效果
		function previewGroupMsg(){
			checkLogin();
			$weObj=$this->wechat();
			$weObj->checkAuth();
			$mediaId=$this->uploadArticle();
			$data=array();
			//$data['touser']='oimtxuO8tIx1qgMkSYM8QeNitvmk';
			$data['touser']=$_POST['preOpenid'];
			$data['msgtype']='mpnews';
			$data['mpnews']=array('media_id'=>$mediaId);
			
			$res=$weObj->previewMassMessage($data);
			if(!$res){
				echo '预览群发失败';exit;
			}else{
				echo '预览发送图文消息成功';exit;
			}
		}
		
		
	}
