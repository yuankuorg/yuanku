<?php
	class WechatUserOper {
		//找到所有会员的openid
		public function getAllOpenID() {
			$conn = DBUtil::getConn();
			
			$sql = "SELECT openid FROM vip WHERE openid IS NOT NULL AND isdel = 0 and openid != '0'";
			$pre = $conn->prepare($sql);
			$pre->execute();
			$data = $pre->fetchAll();
			return $data;
		}
		
		public function updateOpenID($openid,$img,$weixin) {
			$conn = DBUtil::getConn();
			$sql = "update vip set img = ?,weixin = ? WHERE openid = ?";
			$pre = $conn->prepare($sql);
			$pre->execute(array($img,$weixin,$openid));
		}
		
		//初始化，重塑所有的微信用户表wechat_group和wechat_user
		public function trunsAllTables(){
			$conn = DBUtil::getConn();
			
			$sql = "truncate table wechat_user";
			$pre = $conn->prepare( $sql );
			return $pre;
		}
		
		//初始化，将获取到的全部信息存入数据库中
		public function initUser( $userinfos ){
			$conn = DBUtil::getConn();
			foreach( $userinfos as $user ){
				$sql = 'update wechat_user set headimg = ?,uname = ? where openId = ?';
				$pre = $conn->prepare($sql);
				$result = $pre->execute( array($user["headimgurl"],$user["nickname"],$user["openid"]) );
				if( !$result ){
					return false;
				}
			}
			return true;
		}
		
		//获取全部用户,参数为 当前页面的第一条数据位置，显示条数
		public function getAllUsers( $start,$weuserPagecount ){
			$conn = DBUtil::getConn();
			$sql = "select u.uid,u.openId,u.headimg,u.uname,u.gid,u.sex,u.remark,u.blacklist,u.isdel,g.gname from wechat_user u, wechat_group g where u.gid = g.gid and u.isdel = 0 order by u.uid desc";
			$ar=array();
			if( !empty( $_POST["gnames"] ) ){
				$sql=$sql." and g.gname = ?";
				$ar[]= "{$_POST['gnames']}"; 
			}
			if( !empty( $_POST["wenum"] ) ){
				$sql=$sql." and u.uname like ?";
				$ar[]= "%{$_POST['wenum']}%"; ;
			}
			if( !empty( $_POST["remarknum"] ) ){
				$sql=$sql." and u.remark like ?";
				$ar[]= "%{$_POST['remarknum']}%"; 
			}
			if( !empty( $_POST["sexs"] ) ){
				if( $_POST["sexs"] == "男" ){
					$sql=$sql." and u.sex = ?";
					$ar[]= 1; 
				}else if( $_POST["sexs"] == "女" ){
					$sql=$sql." and u.sex = ?";
					$ar[]= 0; 
				}
			}
			//查询页码
			$countsql = " select count(*) from ({$sql}) as c ";
			$pre = $conn->prepare($countsql);
			$pre->execute($ar);
			$row = $pre->fetch();
			$count = $row[0];
			if(empty($count)){
				$count = 1;
			}
			$sql = $sql." limit {$start},{$weuserPagecount}";
			$pre = $conn->prepare($sql);
			$pre->execute($ar);
			$ar = $pre->fetchAll();
			$ar = array("data"=>$ar,"count"=>$count);
			return $ar;
		}
		
		//将微信用户存储到数据库
		public function setAllUsers( $openID,$username,$sex,$headimg,$remark = '',$groupid ){
			
			echo $username;
			echo $headimg;
			echo $openID;
			$conn = DBUtil::getConn();
			if( $this->getOneUsers($openID) ){
				$sql = "update wechat_user set isdel = 0,headimg = ?,uname = ? where openId = ?";
				$pre = $conn->prepare($sql);
				$rs = $pre->execute( array($headimg,$username,$openID) );
				if( $rs ){
					return true;
				}else{
					return false;
				}
			} else {
				$sql="insert into wechat_user values(default,?,?,?,?,?,?,0,0)";
				$pre = $conn->prepare( $sql );
				$pre->execute( array( $openID,$headimg,$username,$sex,$groupid,$remark ) );
				$count = $pre->rowCount();	//返回被影响的行数
				if( $count != 0){
					return true;
				}else{
					return false;
				}
			}
		}
		
		//获取单个用户,用于判断该用户是否存在
		public function getOneUsers( $openID ){
			$conn = DBUtil::getConn();
			$sql = "select * from wechat_user where openId = ?";
			$pre = $conn->prepare( $sql );
			$pre->execute( array( $openID ) );
			$res = $pre->fetch( PDO::FETCH_ASSOC );
			
			if( $res ){
				return true;
			} else {
				return false;
			}
		}
		
		//取消订阅时
		public function setIsdel( $openId ){
			$conn = DBUtil::getConn();
			$sql = "update wechat_user set isdel = 1 where openId = ?";
			$pre = $conn->prepare($sql);
			$pre->execute( array($openId) );
			$count = $pre->rowCount();
			if( $count != 0){
				return true;
			}else{
				return false;
			}
		}
	}
?>