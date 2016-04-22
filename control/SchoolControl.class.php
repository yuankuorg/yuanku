<?php
	/**
	 * 学校统计的控制器
	 */
	class SchoolControl extends Control{
		function schools(){
			$smarty = $this->smarty();
			$smarty->display("study/school.html");
		}
	}
