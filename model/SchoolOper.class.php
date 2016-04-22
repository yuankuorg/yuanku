<?php
/**
 * 学校统计
 */
	public function schoolstate(){
		$conn = DBUtil::getConn();
		$sql = "select v.id,v.name,v.img,v.exchange,v.school from vip v,status u where 
				v.school = (select school from vip v where v.openid = ? ) and v.items <> 8 
				and v.items <> 9 and v.items <> 10 and u.isdel = 0 and v.status = u.id and 
				u.isdel = 0 and v.isdel = 0 order by exchange desc";
		$pre = $conn->prepare($sql);
		$pre->execute( array($_SESSION["vip"]["openid"]) );
		return $pre->fetchAll();
	}

 
/**
 * 其他院校
 */
	
	