<?php
/*
 * 轮播图
 * */
	class CarouselOper {
		public function getCarousel(){
			$conn = DBUtil::getConn();
			$sql="select * from study_carousel";
			$pre = $conn->prepare($sql);
			$pre->execute();
			
			$data = $pre->fetchAll();
			return $data;
		}
	}