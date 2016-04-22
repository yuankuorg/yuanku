<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 08:53:49
         compiled from "G:\wamp\www\yuanku\view\study\home.html" */ ?>
<?php /*%%SmartyHeaderCode:682256a5c581b0f4b4-33267152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9dc12e7056310a10a4445765fd9aa61aaccbe2b' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\study\\home.html',
      1 => 1453711969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '682256a5c581b0f4b4-33267152',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a5c581ba6fe4_44644707',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a5c581ba6fe4_44644707')) {function content_56a5c581ba6fe4_44644707($_smarty_tpl) {?><!DOCTYPE html>
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
		<script type="text/javascript">
    		$(function(){
    			$("#qiandao").tap(function(){
    					$("#dialog").dialog("","<p>签到<span>1</span>天</p><p>积分+<span>1</span></p>");
    					$("#qiandao p").html("已签");
    			});
    		});
		</script>
	</head>
	<style type="text/css">
		body{
			font-family: "幼圆";
		}
		.weui_cells{
			margin-top: 0px;
		}
	</style>
	<body>
		<div class="container js_container"></div>
		
		<script type="text/html" id="tpl_home">
    	
    		
    	<div class="page">
    		<!--slider-->
			<div id="slider-box">
				<ul id="slider">
					<li><img src="/yuanku/img/study/1.jpg" alt="" /></li>
					<li><img src="/yuanku/img/study/2.jpg" alt="" /></li>
					<li><img src="/yuanku/img/study/3.jpg" alt="" /></li>
				</ul>
			</div>
    		<!--<div style="clear: both;"></div>-->
			<!--九宫格-->
			<div class="weui_grids">
			 	<a href="javascript:;" class="weui_grid js_grid" data-id="qiandao" id="qiandao">
			   		<div class="weui_grid_icon">
			        	<img src="/yuanku/img/study/040.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">
			     	 签到
			    	</p>
			  	</a>
			  	<a href="javascript:;" class="weui_grid js_grid" data-id="cxtdynamic">
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/9-7.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">
			      	动态
			    	</p>
			  	</a>
			  	<a href="javascript:;" class="weui_grid js_grid" data-id="cxtalumnus">
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/7-2.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">
			      	校友
			    	</p>
			  	</a>
			</div>
			  	<div class="weui_grids">
			  	<!--小标题-->
				<div class="weui_cells">
				 	<div class="weui_cell">
				    	<div class="weui_cell_bd weui_cell_primary">
				      		<p>助学服务</p>
				    	</div>
				  	</div>
				</div>
				<!--九宫格-->
			   	<a href="javascript:;" class="weui_grid js_grid" data-id="gs">
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/3-3.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">
			      	闯关
			    	</p>
			  	</a>
			 	<a href="javascript:;" class="weui_grid js_grid" data-id="offer">
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/127.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">
			     	 悬赏
			    	</p>
			  	</a>
			  	<a href="javascript:;" class="weui_grid js_grid" data-id="jifen">
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/8-8.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">
			      	积分
			    	</p>
			  	</a>
			   	<a href="javascript:;" class="weui_grid js_grid" data-id="Rankpoint">
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/2-1.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">
			      	积分排行
			    	</p>
			  	</a>
			  	<a href="javascript:;" class="weui_grid js_grid" data-id="Rankpower">
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/2-2.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">
			      	能力排行
			    	</p>
			  	</a>
			  	<a href="javascript:;" class="weui_grid js_grid" data-id="Rankschool">
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/2-3.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">
			      	学校排行
			    	</p>
			  	</a>
			  	<a href="javascript:;" class="weui_grid js_grid" data-id="cxtresume">
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/111.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">
			      	简历
			    	</p>
			  	</a>
			  	<a href="javascript:;" class="weui_grid js_grid" data-id="searchZhaopin">
			    	<div class="weui_grid_icon">
			      		<img src="/yuanku/img/study/110.png" alt="">
			    	</div>
			    	<p class="weui_grid_label">
			      	招聘
			    	</p>
			  	</a>
				</div>
			<div class="weui_grids">
				<!--小标题-->
				<div class="weui_cells">
				 	<div class="weui_cell">
				    	<div class="weui_cell_bd weui_cell_primary">
				      		<p>企业服务</p>
				    	</div>
				  	</div>
				</div>
				<!--九宫格-->
				<a href="javascript:;" class="weui_grid js_grid" data-id="zhaopin">
				    <div class="weui_grid_icon">
				     	 <img src="/yuanku/img/study/141.png" alt="">
				    </div>
				    <p class="weui_grid_label">
				      企业招聘
				    </p>
				</a>
				<a href="javascript:;" class="weui_grid js_grid" data-id="searchResume">
				    <div class="weui_grid_icon">
				     	 <img src="/yuanku/img/study/2-6.png" alt="">
				    </div>
				    <p class="weui_grid_label">
				      简历搜索
				    </p>
				</a>
			</div>
			<div class="weui_grids">
				<!--小标题-->
				<div class="weui_cells">
				 	<div class="weui_cell">
				    	<div class="weui_cell_bd weui_cell_primary">
				      		<p>学校服务</p>
				    	</div>
				  	</div>
				</div>
				<!--九宫格-->
				<a href="javascript:;" class="weui_grid js_grid" data-id="school">
				    <div class="weui_grid_icon">
				     	 <img src="/yuanku/img/study/088.png" alt="">
				    </div>
				    <p class="weui_grid_label">
				      学校统计
				    </p>
				</a>
			</div>
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
	    <!--END dia	log2-->
	</body>
</html>
<?php }} ?>