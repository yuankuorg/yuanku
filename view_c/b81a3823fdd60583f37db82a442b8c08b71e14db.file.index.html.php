<?php /* Smarty version Smarty-3.1.12, created on 2016-01-31 07:16:51
         compiled from "D:\Program Files\apatch\wamp\www\yuanku\view\admin\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1472356adb4e36b3718-89888770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b81a3823fdd60583f37db82a442b8c08b71e14db' => 
    array (
      0 => 'D:\\Program Files\\apatch\\wamp\\www\\yuanku\\view\\admin\\index.html',
      1 => 1454220212,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1472356adb4e36b3718-89888770',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56adb4e3734948_75207833',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56adb4e3734948_75207833')) {function content_56adb4e3734948_75207833($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-CH">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" type="text/css" href="/yuanku/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="/yuanku/css/bootstrap-theme.css"/>
		<link rel="stylesheet" type="text/css" href="/yuanku/kindedit/themes/default/default.css"/>
		<link rel="stylesheet" type="text/css" href="/yuanku/js/My97DatePicker/skin/WdatePicker.css"/>
		<link rel="stylesheet" type="text/css" href="/yuanku/css/common.css"/>
		
		<script src="/yuanku/js/jquery-1.10.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/yuanku/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
		<script src="/yuanku/js/common.js" type="text/javascript" charset="utf-8"></script>
		<script src="/yuanku/js/model.js" type="text/javascript" charset="utf-8"></script>
		<script src="/yuanku/kindedit/kindeditor-min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/yuanku/kindedit/lang/zh_CN.js" type="text/javascript" charset="utf-8"></script>
		<script src="/yuanku/js/My97DatePicker/WdatePicker.js" type="text/javascript" charset="utf-8"></script>
		
		<title>源酷</title>
		<script type="text/javascript">
			$(function(){
				$("#menu ul a").click(function(){
					redriect($(this).attr("url"));
				});
				
				$("#modalok").click(function(){
					$(this).attr("data-sub","true");
					$('#delModal').modal('hide');
				});
				$("#modalback").click(function(){
					$("#modalok").attr("data-sub","false");
					$('#delModal').modal("hide");
				});
			});
		</script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				 <div class="col-lg-12" id="logo"></div>
			</div>
			<div class="row-fluid">
				<div id="menu" class="col-lg-2 col-xs-6 col-sm-4 col-md-2">
					<ul class="nav nav-pills nav-stacked">
					  <li><a href="javascript:void(0)" url="/yuanku/adminIndex-home.html">
					  	<span class="glyphicon glyphicon-home col-lg-3 pull-left"></span>首页</a></li>
					  <li><a href="javascript:void(0)" url="/yuanku/adminIndex-vipMana.html">
					  	<span class="glyphicon glyphicon-gift col-lg-3 pull-left"></span>学员管理</a></li>
					  	
					  	
					  	<li><a href="javascript:void(0)" data-target="#TopicClass"  data-toggle="collapse">
					  	<span class="glyphicon glyphicon-plus col-lg-3 pull-left"></span>消息管理</a></li>
					  	<div id="TopicClass" class="collapse menuChild" >
					  		<ul class="nav nav-pills nav-stacked ">
						  		<li><a href="javascript:void(0)" url="/yuanku/adminIndex-comment.html">
						  			<span class="glyphicon glyphicon-comment col-lg-3 pull-left"></span>评论管理</a>
						  		</li>
						  		<li><a href="javascript:void(0)" url="/yuanku/topics-TopicsMana.html">
						  			<span class="glyphicon glyphicon-folder-open col-lg-3 pull-left"></span>话题管理</a>
						  		</li>
						  		<li><a href="javascript:void(0)" url="/yuanku/topicClass-TopicClassMana.html">
						  			<span class="glyphicon glyphicon-list col-lg-3 pull-left"></span>话题类别管理</a>
						  		</li>
								 <li><a href="javascript:void(0)" url="/yuanku/news-NewsMana.html">
								 	 <span class="glyphicon glyphicon-file col-lg-3 pull-left"></span>资讯管理</a>
								 </li>
					  		</ul>
					  	</div>
					<!--微信菜单管理，折叠菜单-->
					  <li><a href="javascript:void(0)" data-target="#wechatmenu"  data-toggle="collapse">
					  	<span class="glyphicon glyphicon-plus col-lg-3 pull-left"></span>微信平台</a></li>
					  <div id="wechatmenu" class="collapse menuChild" >
					  	<ul class="nav nav-pills nav-stacked ">
					  		<li><a href="javascript:void(0)" url="/yuanku/wechatUser-wechatUser.html">
						  		<span class="glyphicon glyphicon-user col-lg-3 pull-left"></span>会员管理</a>
						  	</li>
						  	<li><a href="javascript:void(0)" url="/yuanku/wechatMan-autoReply.html">	
						  		<span class="glyphicon glyphicon-phone col-lg-3 pull-left"></span>自动回复</a>
						  	</li>
						  	<li><a href="javascript:void(0)" url="/yuanku/wechatGroupMsg-groupMsg.html">
						  		<span class="glyphicon glyphicon-send col-lg-3 pull-left"></span>群发消息</a>
						  	</li>
						  	<li><a href="javascript:void(0)" url="/yuanku/wechatCusMenu-cusMenuMan.html">
						  		<span class="glyphicon glyphicon-list col-lg-3 pull-left"></span>自定义菜单</a>
						  	</li>
						  	<li><a href="javascript:void(0)" url="/yuanku/wechatMan-getThePeople.html">
						  		<span class="glyphicon glyphicon-gift col-lg-3 pull-left"></span>抽奖游戏</a>
						  	</li>
					  	</ul>
					  </div>
					  <!--闯关管理，折叠菜单-->
					 <li><a href="javascript:void(0)" data-target="#zhuxue"  data-toggle="collapse">
					  	<span class="glyphicon glyphicon-plus col-lg-3 pull-left"></span>助学成才</a></li>
					  	<div id="zhuxue" class="collapse menuChild" >
					  		<ul class="nav nav-pills nav-stacked ">
						  		<li><a href="javascript:void(0)" url="/yuanku/chuangManager-initChapter.html">
						  			<span class="glyphicon glyphicon-align-left col-lg-3 pull-left"></span>科目管理</a>
						  		</li>
						  		<li><a href="javascript:void(0)" url="/yuanku/chuangManager-showChapter.html">
						  			<span class="glyphicon glyphicon-phone col-lg-3 pull-left"></span>关卡设置</a>
						  		</li>
						  		<li><a href="javascript:void(0)" url="/yuanku/chuangManager-showChuangvip.html">
						  			<span class="glyphicon glyphicon-phone col-lg-3 pull-left"></span>闯关动态</a>
						  		</li>
						  		<li><a href="javascript:void(0)" url="/yuanku/QiyeManager-companyManager.html">
						  			<span class="glyphicon glyphicon-folder-open col-lg-3 pull-left"></span>招聘管理</a>
						  		</li>
						  		<li><a href="javascript:void(0)" url="/yuanku/commoname-choice.html">
						  			<span class="glyphicon glyphicon glyphicon-gift col-lg-3 pull-left"></span>商品管理</a>
						  		</li>
						  		<li><a href="javascript:void(0)" url="/yuanku/commoname-gift.html">
						  			<span class="glyphicon glyphicon glyphicon-envelope col-lg-3 pull-left"></span>兑换管理</a>
						  		</li>
						  		<li><a href="javascript:void(0)" url="/yuanku/Images-carousel.html">
						  			<span class="glyphicon glyphicon-picture col-lg-3 pull-left"></span>轮播管理</a>
						  		</li>
					  		</ul>
					  	</div>		
					  
					  	<?php if ($_SESSION['admin']['isadmin']==0){?>
					  	<li><a href="javascript:void(0)" url="/yuanku/adminIndex-updatepwd.html">
					  	<span class="glyphicon glyphicon-lock col-lg-3 pull-left"></span>修改密码</a></li>
					  	<?php }else{ ?>
					  	<li><a href="javascript:void(0)" url="/yuanku/admin-adminIstrator.html">
					  	<span class="glyphicon glyphicon-user col-lg-3 pull-left"></span>管理员管理</a></li>
					  	<?php }?>
					</ul>
				</div>
				<div class="main col-lg-10 col-xs-6 col-sm-8 col-md-10">
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<div class="modal-header">
		            <h5 class="modal-title" id="myModalLabel" style="text-align: center;">
		              	信息提醒！
		            </h5>
		         </div>
		         <div class="modal-body">
		            	<h4 style="text-align: center;">确认执行此操作？</h4>
		         </div>
		         <div class="modal-footer">
		         	<button type="button" id="modalok" class="btn btn-primary">确认</button>
		            <button type="button" id="modalback" class="btn btn-default">取消</button>
		         </div>
		    </div>
		  </div>
		</div>
		<!--
        	时间：2015-10-15
        	描述：mymodel
        -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				</div>
			</div>
		</div>
		
	<!--
		通用模态窗，调用bootstrap模态窗，js代码封装到Model.js，使用名为BsModal的json对象调用
	-->
	<div class="modal fade" id="BsModal" tabindex="-1" role="dialog" 
	   aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
	      <div class="modal-content">
	         <div class="modal-header">
	            <button type="button" class="close" 
	               data-dismiss="modal" aria-hidden="true">
	                  &times;
	            </button>
	            <h4 class="modal-title" id="">标题</h4>
	         </div>
	         <div class="modal-body">内容</div>
	         <div class="modal-footer">
	            <button type="button" class="btn btn-default model-close" data-dismiss="modal">关闭</button>
	            <button type="button" class="btn btn-primary model-yes">提交更改</button>
	         </div>
	      </div>
		</div>
	</div>
	
</html><?php }} ?>