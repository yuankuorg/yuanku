<?php
	class EmpModel {
		public function getEmp() {
			
		}
		
		public function login(){
			$conn = DBUtil::getConn();
	
			$sql = "select id,code,pwd,isadmin from (select * from admin where isdel = 0 )a where code = ? and pwd = ? ";
			$pre = $conn->prepare($sql);
			$pre->execute(array($_POST["code"],md5($_POST["password"])));
			$row = $pre->fetchAll();
			if($row){
				return $row[0];
			}else{
				return false;
			}	
		}
	}
