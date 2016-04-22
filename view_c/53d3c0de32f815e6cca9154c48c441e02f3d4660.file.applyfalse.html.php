<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 07:24:39
         compiled from "G:\wamp\www\yuanku\view\study\applyfalse.html" */ ?>
<?php /*%%SmartyHeaderCode:2499156a5cc14a72741-11985928%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53d3c0de32f815e6cca9154c48c441e02f3d4660' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\study\\applyfalse.html',
      1 => 1453706671,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2499156a5cc14a72741-11985928',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a5cc14a9cf31_38110491',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a5cc14a9cf31_38110491')) {function content_56a5cc14a9cf31_38110491($_smarty_tpl) {?><div class="page">
	<script type="text/javascript">
		$(function() {
			$(".applyfalse .js_grid").tap(function() {
				pageManager.go($(this).data("id"));
			});
		})
	</script>
	<div class="weui_msg">
		<div class="weui_icon_area"><i class="weui_icon_safe weui_icon_safe_warn"></i></div>
		<div class="weui_text_area">
			<h2 class="weui_msg_title">申请失败</h2>
			<p class="weui_msg_desc">您的积分不够</p>
		</div>
		<div class="weui_opr_area">
			<p class="weui_btn_area">
				<a href="javascript:;" class="weui_btn weui_btn_primary js_grid" data-id = "uigs">返回关卡页</a>
				<a href="javascript:;" class="weui_btn weui_btn_default js_grid" data-id = "offer">获取积分</a>
			</p>
		</div>
	</div>
</div>
<?php }} ?>