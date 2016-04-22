<?php
	class RankControl extends Control {
	/**
	 * 积分排行的控制器
	 */	
		function gopoint() {
			$p = new RankOper();
			$point = $p->getpoint(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$smarty = $this->smarty();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
			$smarty->assign("point",$point);
			$smarty->display("study/Rankpoint.html");
		}

		
	/**
	 * 获取更多，积分
	 */
	 	function getmorepoint(){
	 		$p = new RankOper();
			$point = $p->getpoint(($this->curpage-1)*$this->pagecount,$this->pagecount);
			if( !$point ){
				echo "false";
			}else{
				echo json_encode($point);	
			}
	 	}
	
	/**
	 * 能力排行的控制器	
	 */
		function gopower() {
			$p = new RankOper();
			$power = $p->getpower(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$smarty = $this->smarty();
			$smarty->assign("power",$power);
			$smarty->display("study/Rankpower.html");
		}
		
	/**
	 * 获取更多，能力
	 */
	 	function getmorepower(){
	 		$p = new RankOper();
			$power = $p->getpower(($this->curpage-1)*$this->pagecount,$this->pagecount);
			if( !$power ){
				echo "false";
			}else{
				echo json_encode($power);	
			}
	 	}
		
	/**
	 * 学校排行的控制器	
	 */	
		function goschool() {
			$p = new RankOper();
			$school = $p->getschool(($this->curpage-1)*$this->pagecount,$this->pagecount);
			$smarty = $this->smarty();
			$smarty->assign("school",$school);
			$smarty->display("study/Rankschool.html");
		}
		
	/**
	 * 获取更多，学校
	 */
	 	function getmoreschool(){
	 		$p = new RankOper();
			$school = $p->getschool(($this->curpage-1)*$this->pagecount,$this->pagecount);
			if( !$school ){
				echo "false";
			}else{
				echo json_encode($school);	
			}
	 	}
	}