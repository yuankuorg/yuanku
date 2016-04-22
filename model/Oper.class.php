<?php
	abstract class Oper {
		public static $DYNTYPE = array("init"=>1,"sign"=>2,"chuang"=>3,"task"=>4,"exchange"=>5,"school"=>6);
		public static $CHANGESTATE = array("init"=>1,"shengqi"=>2,"faild"=>3,"sucess"=>4);
		/**
		 * 修改积分
		 * $vid 会员编号
		 * $dtype 动态的编号
		 * $content 动态的内容
		 * $score 积份变化如果是减分，要传负数
		 * //返回值 
		*/
		public function changeExchange( $conn,$dtype,$content,$vid,$score ) {
			if( $score < 0 ) { //如果是减积分操作，先判断积分是否足够
				$sql = "select count(*) from vip where exchange < ? and id = ?";
				$pre = $conn->prepare($sql);
				$pre->execute(array( abs($score),$vid ));
				$arr = $pre->fetch();
				if( $arr[0] ) {
					return false;
				}
			}
			
			//增加动态
			$sql = "insert into study_dynamic values(default,?,?,now(),?,?)";
			$pre = $conn->prepare($sql);
			$pre->execute(array($dtype,$content,$vid,$score));
			
			//修改积分
			$sql = "update vip set exchange = exchange + ? where id = ?";
			$pre = $conn->prepare($sql);
			$pre->execute(array( $score,$vid ));
			
			//找会员
			$sql = "select * from vip where id = ?";
			$pre = $conn->prepare($sql);
			$pre->execute(array($vid));
			$vip = $pre->fetch();
			
			//根据会员找到学校导师
			$sql = "select * from vip where school = ? and items = 8";
			$pre = $conn->prepare($sql);
			$pre->execute(array($vip["school"]));
			$teacher = $pre->fetch();
			
			if( !empty($teacher) ) {
				if( $dtype == Oper::$DYNTYPE["init"] ) {
					//增加动态
					$sql = "insert into study_dynamic values(default,?,?,now(),?,5)";
					$pre = $conn->prepare($sql);
					$content = $vip["name"] . "于" . $vip["joinDate"] . "加入助学成才,学校累积5分。";
					$pre->execute( array(Oper::$DYNTYPE["school"],$content,$teacher["id"]) );
					
					//修改积分
					$sql = "update vip set exchange = exchange + 5 where id = ?";
					$pre = $conn->prepare($sql);
					$pre->execute(array( $teacher["id"] ));
				} else if( ($dtype == Oper::$DYNTYPE["chuang"] || $dtype == Oper::$DYNTYPE["task"]) && $score > 0 ) {
					//增加动态
					$sql = "insert into study_dynamic values(default,?,?,now(),?,1)";
					$pre = $conn->prepare($sql);
					$content = $content . ",学校累积1分。";
					$pre->execute( array(Oper::$DYNTYPE["school"],$content,$teacher["id"]) );
					
					//修改积分
					$sql = "update vip set exchange = exchange + 1 where id = ?";
					$pre = $conn->prepare($sql);
					$pre->execute(array( $teacher["id"] ));
				}
			}

			return true;
		}
	}