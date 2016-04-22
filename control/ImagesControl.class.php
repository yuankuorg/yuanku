<?php
	/*
	 * 图片管理器
	 * */
	class ImagesControl extends Control{
		/*轮播图*/
		public function carousel(){
			$smarty = $this->smarty();
			$smarty -> display("admin/carousel.html");
		}
		
		public function incarousel(){            
			$img = new ImagesOper();
			$imgs = $img->addcarousel();
			if($imgs){
				echo  "true";
			}else{
				echo  "false";
			}
		}
	}