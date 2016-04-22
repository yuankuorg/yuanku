<?php
	class RankOper extends Oper{
//		获取积分排名
		public function getpoint($start,$count){
			$conn = DBUtil::getConn();
			$sql = "select img,exchange,name,schoolname from vip where isdel = 0 and items <> 8 and items <> 9 and items <> 10 order by exchange desc limit {$start},{$count}";
			$pre = $conn->prepare($sql);
			$pre->execute();
			return $pre->fetchAll();
		}
		
//		获取能力排名		
//		创建能力总积分视图totalpoint
//		闯关数量（1:50分)
//		解决问题的数量（1:50分）
		public function getpower($start,$count){
			$conn = DBUtil::getConn();	
			$sql = "select name,img,exchange,chuang,taskrec,sign,schoolname,
					(exchange + chuang*50 + taskrec*50 + sign) as total from totalpoint order by total desc limit {$start},{$count}";
			$pre = $conn->prepare($sql);
			$pre->execute();
			return $pre->fetchALL();
		}
		
//		获取学校总积分排名				
//		学校总积分视图schoolpoint
//		学校人数（1:20分）
		public function getschool($start,$count){
			$conn = DBUtil::getConn();
			$sql  = "select sid,sname,logo,ifnull(schoolren,0) as schoolren,ifnull(spoint,0) as spoint,
					(ifnull(schoolren * 20,0) + ifnull(spoint,0)) as schooltotal from schoolpoint order by schooltotal desc limit {$start},{$count}";
			$pre = $conn->prepare($sql);
			$pre->execute();
			return $pre->fetchALL();
		}
	}
