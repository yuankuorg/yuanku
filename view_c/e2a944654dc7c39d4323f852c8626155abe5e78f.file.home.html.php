<?php /* Smarty version Smarty-3.1.12, created on 2016-01-31 05:22:40
         compiled from "D:\Program Files\apatch\wamp\www\yuanku\view\study\home.html" */ ?>
<?php /*%%SmartyHeaderCode:2734456ad9a20c3a6b6-09243392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2a944654dc7c39d4323f852c8626155abe5e78f' => 
    array (
      0 => 'D:\\Program Files\\apatch\\wamp\\www\\yuanku\\view\\study\\home.html',
      1 => 1454216102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2734456ad9a20c3a6b6-09243392',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sign' => 0,
    'Car' => 0,
    'c' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56ad9a20e57db0_06258073',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ad9a20e57db0_06258073')) {function content_56ad9a20e57db0_06258073($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="/yuanku/css/weui.css"/>
		<link rel="stylesheet" type="text/css" href="/yuanku/css/yuanku.css"/>
		<link rel="stylesheet" href="/yuanku/css/stylelunbo.css">
		<script src="/yuanku/js/zepto.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/yuanku/js/zepto.touchSlider.min.js"></script>
		<script src="/yuanku/js/yuanku.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<script type="text/javascript">
			 wx.config({
			    debug: false,
			    appId: '<?php echo $_smarty_tpl->tpl_vars['sign']->value['appId'];?>
',
			    timestamp: <?php echo $_smarty_tpl->tpl_vars['sign']->value['timestamp'];?>
,
			    nonceStr: '<?php echo $_smarty_tpl->tpl_vars['sign']->value['nonceStr'];?>
',
			    signature: '<?php echo $_smarty_tpl->tpl_vars['sign']->value['signature'];?>
',
			    jsApiList: [
			    	'onMenuShareTimeline',
			    	'onMenuShareAppMessage',
			    	'onMenuShareQQ',
			    	'onMenuShareWeibo',
			    	'onMenuShareQZone',
			    	'hideAllNonBaseMenuItem',
			    	'showMenuItems'
			    ]
			  });
			  wx.ready(function () {
			  	wx.hideAllNonBaseMenuItem()
			  	
			  	wx.showMenuItems({
				    menuList: ['menuItem:share:appMessage','menuItem:share:timeline','menuItem:share:qq','menuItem:share:weiboApp','menuItem:share:QZone'] // 要显示的菜单项，所有menu项见附录3
				});
			  	//朋友圈
			  	wx.onMenuShareTimeline({
				    title: '源酷创意-助学成才',
				    link: 'http://122005.vhost12.cloudvhost.net/yuanku/study-index.html',
				    imgUrl: 'https://mmbiz.qlogo.cn/mmbiz/MENL6KlNVqq8MGGQ9bwCDCOfq9zdJJibp5DhCJeRaASS67eibCaYg5tQqpOJibcscUibEiasfEg3sn7hTxDJZsqoKNw/0?wx_fmt=png'
				});
				//分享朋友
				wx.onMenuShareAppMessage({
				    title: '源酷创意-助学成才', // 分享标题
				    desc: '我的源酷创意，您的无限助力', // 分享描述
				    link: 'http://122005.vhost12.cloudvhost.net/yuanku/study-index.html', // 分享链接
				    imgUrl: 'https://mmbiz.qlogo.cn/mmbiz/MENL6KlNVqq8MGGQ9bwCDCOfq9zdJJibp5DhCJeRaASS67eibCaYg5tQqpOJibcscUibEiasfEg3sn7hTxDJZsqoKNw/0?wx_fmt=png'
				});
				//分享QQ
				wx.onMenuShareQQ({
				    title: '源酷创意-助学成才', // 分享标题
				    desc: '我的源酷创意，您的无限助力', // 分享描述
				    link: 'http://122005.vhost12.cloudvhost.net/yuanku/study-index.html', // 分享链接
				    imgUrl: 'https://mmbiz.qlogo.cn/mmbiz/MENL6KlNVqq8MGGQ9bwCDCOfq9zdJJibp5DhCJeRaASS67eibCaYg5tQqpOJibcscUibEiasfEg3sn7hTxDJZsqoKNw/0?wx_fmt=png'
				});
				//微博
				wx.onMenuShareWeibo({
				    title: '源酷创意-助学成才', // 分享标题
				    desc: '我的源酷创意，您的无限助力', // 分享描述
				    link: 'http://122005.vhost12.cloudvhost.net/yuanku/study-index.html', // 分享链接
				    imgUrl: 'https://mmbiz.qlogo.cn/mmbiz/MENL6KlNVqq8MGGQ9bwCDCOfq9zdJJibp5DhCJeRaASS67eibCaYg5tQqpOJibcscUibEiasfEg3sn7hTxDJZsqoKNw/0?wx_fmt=png'
				});
				//QQ空间
				wx.onMenuShareQZone({
				    title: '源酷创意-助学成才', // 分享标题
				    desc: '我的源酷创意，您的无限助力', // 分享描述
				    link: 'http://122005.vhost12.cloudvhost.net/yuanku/study-index.html', // 分享链接
				    imgUrl: 'https://mmbiz.qlogo.cn/mmbiz/MENL6KlNVqq8MGGQ9bwCDCOfq9zdJJibp5DhCJeRaASS67eibCaYg5tQqpOJibcscUibEiasfEg3sn7hTxDJZsqoKNw/0?wx_fmt=png'
				});
				$('#loadingToast').hide();
			  });
		</script>		
		
		<script type="text/javascript">
    		$(function(){
    			$('#loadingToast').loadingShow();
    			$("#qiandao").tap(function(){
    				$.ajax({
    					type:"post",
    					url:"study-sign.html",
    					dataType:"json",
    					success:function(obj){
    						if(obj.code==2){
		    					$(".qiandao").css("display","block");
		    					$(".qiandao .qtitle").html("<h3>你已经签过了</h3><p>共签到<span> "+obj.count +" </span>天</p>");
		    				}else{
		    					$(".qiandao").css("display","block");
		    					$(".qiandao .qtitle").html("<p>签到<span> "+obj.count +" </span>天</p><p>积分+<span> 1 </span></p>");
//		    					$("#qiandao p").html("已签");
		    				}
    					},
//  					error:function(){
//  						alert("error");
//  					},
    					async:true
    				});
    			});
    			
    			$(".qiandao").tap(function(){
    				$(".qiandao").css("display","none");
    			});
    		})
		</script>
	</head>
	<body>
		<div class="container js_container"></div>
		<script type="text/html" id="tpl_home">
    	<div class="page">
			<div id="slider-box">
				<ul id="slider">
					<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Car']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['c']->value['caurl']!=''){?>
							<li><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['c']->value['caurl'];?>
" alt="" style="height: 100%;"/></a></li>
						<?php }?>
					<?php } ?>
				</ul>
			</div>
			
			<div class="weui_grids">
			 	<a href="javascript:;" class="weui_grid js_grid" <?php if (isset($_SESSION['vip'])){?>id="qiandao"<?php }else{ ?>data-id="nologin"<?php }?>  >
			   		<div class="weui_grid_icon">
			        	<img src="/yuanku/img/study/040.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">签到</p>
			  	</a>
			  	<a href="javascript:;" class="weui_grid js_grid" data-id="cxtdynamic">
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/9-7.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">动态</p>
			  	</a>
			  	<a href="javascript:;" class="weui_grid js_grid" <?php if (isset($_SESSION['vip'])){?>data-id="cxtalumnus"<?php }else{ ?>data-id="nologin"<?php }?>>
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/7-2.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">校友</p>
			  	</a>
			</div>
			
			<div class="weui_grids">
				<div class="weui_cells">
				 	<div class="weui_cell">
				    	<div class="weui_cell_bd weui_cell_primary">
				      		<p>助学服务</p>
				    	</div>
				  	</div>
				</div>
			   	<a href="javascript:;" class="weui_grid chuang" <?php if (isset($_SESSION['pid'])){?>data-pid="<?php echo $_SESSION['pid'];?>
"<?php }?> <?php if (isset($_SESSION['vip'])){?>data-id="gs"<?php }else{ ?>data-id="nologin"<?php }?>>
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/3-3.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">闯关</p>
			  	</a>
			 	<a href="javascript:;" class="weui_grid js_grid" <?php if (isset($_SESSION['vip'])){?>data-id="offer"<?php }else{ ?>data-id="nologin"<?php }?>>
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/127.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">悬赏</p>
			  	</a>
			  	<a href="javascript:;" class="weui_grid js_grid" <?php if (isset($_SESSION['vip'])){?>data-id="jifen"<?php }else{ ?>data-id="nologin"<?php }?>>
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/8-8.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">积分</p>
			  	</a>
			   	<a href="javascript:;" class="weui_grid js_grid" data-id="Rankpoint">
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/2-1.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">积分排行</p>
			  	</a>
			  	<a href="javascript:;" class="weui_grid js_grid" data-id="Rankpower">
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/2-2.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">能力排行</p>
			  	</a>
			  	<a href="javascript:;" class="weui_grid js_grid" data-id="Rankschool">
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/2-3.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">学校排行</p>
			  	</a>
			  	<a href="javascript:;" class="weui_grid js_grid" <?php if (isset($_SESSION['vip'])){?>data-id="cxtresume"<?php }else{ ?>data-id="nologin"<?php }?>>
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/111.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">简历</p>
			  	</a>
			  	<a href="javascript:;" class="weui_grid js_grid" <?php if (isset($_SESSION['vip'])){?>data-id="searchZhaopin"<?php }else{ ?>data-id="nologin"<?php }?>>
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/110.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">招聘</p>
			  	</a>
			</div>
			
			<!--企业会员进入才能看-->
			<?php if (isset($_SESSION['vip'])&&$_SESSION['vip']['items']==10){?>
			<div class="weui_grids">
				<div class="weui_cells">
				 	<div class="weui_cell">
				    	<div class="weui_cell_bd weui_cell_primary">
				      		<p>企业服务</p>
				    	</div>
				  	</div>
				</div>
				<a href="javascript:;" class="weui_grid js_grid" data-id="zhaopin">
				    <div class="weui_grid_icon">
				     	 <img src="/yuanku/img/study/141.png" alt="">
				    </div>
				    <p class="weui_grid_label">企业招聘</p>
				</a>
				<a href="javascript:;" class="weui_grid js_grid" data-id="searchResume">
				    <div class="weui_grid_icon">
				     	 <img src="/yuanku/img/study/2-6.png" alt="">
				    </div>
				    <p class="weui_grid_label">简历搜索</p>
				</a>
			</div>
			<?php }?>
				
			<?php if (isset($_SESSION['vip'])&&$_SESSION['vip']['items']==8){?>
			<div class="weui_grids">
				<div class="weui_cells">
				 	<div class="weui_cell">
				    	<div class="weui_cell_bd weui_cell_primary">
				      		<p>学校服务</p>
				    	</div>
				  	</div>
				</div>
				<a href="javascript:;" class="weui_grid js_grid" data-id="school">
				    <div class="weui_grid_icon">
				     	 <img src="/yuanku/img/study/088.png" alt="">
				    </div>
				    <p class="weui_grid_label">学校统计</p>
				</a>
			</div>
			<?php }?>
    	</div>
    	</script>
		<div id="goback" style="width: 3em;height: 3em; border-radius: 1.5em;border: none;font-size: 18px; position: fixed;top: 80%;right: 5%;">
			<img src="/yuanku/img/study/goback.png"/>
		</div>
		<!-- loading toast -->
	    <div id="loadingToast" class="weui_loading_toast" style="display:none;">
	        <div class="weui_mask_transparent"></div>
	        <div class="weui_toast">
	            <div class="weui_loading">
	                <div class="weui_loading_leaf weui_loading_leaf_0"></div>
	                <div class="weui_loading_leaf weui_loading_leaf_1"></div>
	                <div class="weui_loading_leaf weui_loading_leaf_2"></div>
	                <div class="weui_loading_leaf weui_loading_leaf_3"></div>
	                <div class="weui_loading_leaf weui_loading_leaf_4"></div>
	                <div class="weui_loading_leaf weui_loading_leaf_5"></div>
	                <div class="weui_loading_leaf weui_loading_leaf_6"></div>
	                <div class="weui_loading_leaf weui_loading_leaf_7"></div>
	                <div class="weui_loading_leaf weui_loading_leaf_8"></div>
	                <div class="weui_loading_leaf weui_loading_leaf_9"></div>
	                <div class="weui_loading_leaf weui_loading_leaf_10"></div>
	                <div class="weui_loading_leaf weui_loading_leaf_11"></div>
	            </div>
	            <p class="weui_toast_content">数据加载中</p>
	        </div>
	    </div>
	    
	    <!--BEGIN dialog2-->
	    <div class="weui_dialog_alert" id="dialog" style="display: none;">
	        <div class="weui_mask"></div>
	        <div class="weui_dialog">
	            <div class="weui_dialog_hd"><strong class="weui_dialog_title"></strong></div>
	            <div class="weui_dialog_bd"></div>
	            <div class="weui_dialog_ft">
	                <a href="javascript:;" class="weui_btn_dialog primary">确定</a>
	            </div>
	        </div>
	    </div>
	    
	    <div class="weui_dialog_alert" id="dialogConfirm" style="display: none;">
			<div class="weui_mask"></div>
			<div class="weui_dialog">
				<div class="weui_dialog_hd"><strong class="weui_dialog_title"></strong></div>
				<div class="weui_dialog_bd"></div>
				<div class="weui_dialog_ft">
					<a href="javascript:;" class="weui_btn_dialog default " style="border-right: 1px solid #eee;">取消</a>
					<a href="javascript:;" class="weui_btn_dialog primary mes_right">确定</a>
				</div>
			</div>
		</div>
	    <!--END dia	log2-->
		<script type="text/html" id="tpl_nologin">
	    	<div class="page">
		    <div class="weui_msg">
		        <div class="weui_icon_area"><i class="weui_icon_msg weui_icon_warn"></i></div>
		        <div class="weui_text_area">
		            <h2 class="weui_msg_title">信息提示</h2>
		            <p class="weui_msg_desc">你还不是源酷创意助学成才、名企精英项目的会员！</p>
		        </div>
		        <div class="weui_opr_area">
		            <p class="weui_btn_area">
		                <a href="javascript:void(0);" id="regist" class="weui_btn weui_btn_primary">注册</a>
		                <a href="javascript:void(0);" id="nologinback" class="weui_btn weui_btn_default">返回</a>
		            </p>
		        </div>
		    </div>
	    	</div>
	    </script>
	    <script type="text/html" id="tpl_registok">
	    <div class="page">
		    <div class="weui_msg">
		        <div class="weui_icon_area"><i class="weui_icon_msg weui_icon_success"></i></div>
		        <div class="weui_text_area">
		            <h2 class="weui_msg_title">注册成功</h2>
		            <p class="weui_msg_desc">源酷助学成才、名企精英项目采取会员制。您的注册申请已提交,稍后会有工作人员电话联系进行下一步认证！</p>
		        </div>
		        <div class="weui_opr_area">
		            <p class="weui_btn_area">
		                <a href="javascript:void(0);" id="registok" class="weui_btn weui_btn_primary">确定</a>
		            </p>
		        </div>
		    </div>
		</div>
		</script>
	    <!--签到页面-->
	    <div class="qiandao">
	    	<div class="qiandao01">
	    	<div class="jinbi">
	    		<div class="j1"></div>
	    		<div class="j2"></div>
	    		<div class="j3"></div>
	    		<div class="j4"></div>
	    		<div class="j5"></div>
	    	</div>
	    		<div class="imgbox">
	    			<img class="img1" src="/yuanku/img/study/qiandao.png"/>
	    		</div>
	    		<div class="qtitle"></div>
	    	</div>
	    </div>
	</body>
</html><?php }} ?>