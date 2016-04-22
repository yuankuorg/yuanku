<?php
	class ImagesOper{
		public function addcarousel(){
			$conn = DBUtil::getConn();
			
			$sql = "truncate table study_carousel";
			$pre = $conn->prepare($sql);
			$pre->execute();
			
			$imgs = $_POST["imgs"];
			for( $i = 0;$i < count($imgs);$i++ ) {
				$sql = "insert into study_carousel values(default,?,?)";
				$pre = $conn->prepare($sql);
				$back = $pre->execute(array($imgs[$i]["info"],$imgs[$i]["imgurl"]));
			}
			return $back;
		}
	}
