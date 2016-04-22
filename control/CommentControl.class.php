<?php
	class CommentControl extends Control {
		//获得所有评论和回复
		public function comment(){
			$oper = new CommentOper();
			
			$re = $oper->getallComment(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$this->setPage($re["count"]);
			
			$smarty = $this->smarty();
			$smarty->assign("re",$re["data"]);
			$smarty->display("admin/comment.html");	
		}	
		//回复页
		public function commentReply(){
			$oper = new CommentOper();
			$re = $oper->commentReply();
			
			$smarty = $this->smarty();
			$smarty->assign("re",$re);
			$smarty->display("admin/commentReply.html");
		}
		//添加回复，成功，刷新回复页
		public function docommentReply(){
			$oper = new CommentOper();
			$data = $oper->docommentReply();
			
			$smarty = $this->smarty();
			if($data){
				$this->commentReply();
			}else{
				echo "false";
			}
		}	
		//删除回复
		public function delreply(){
			$oper = new CommentOper();
			$data = $oper->delreply();
			
			if($data){
				echo "true";
			}else{
				echo "false";
			}					
		}
		//删除评论	
		public function delcomment(){
			$oper = new CommentOper();
			$data = $oper->delcomment();
			//刷新评论页
			if($data){
				$this->comment();
			}else{
				echo "false";
			}					
		}		
		//批量删除评论
		public function batchdelComment(){
			$co = new CommentOper();
			$re = $co->batchdelComment();
			//刷新评论页
			if($re){
				$this->comment();
			}else{
				echo "false";
			}
		}	
	}