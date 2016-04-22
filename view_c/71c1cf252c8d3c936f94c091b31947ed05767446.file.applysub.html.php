<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 01:21:53
         compiled from "G:\wamp\www\yuanku\view\study\applysub.html" */ ?>
<?php /*%%SmartyHeaderCode:1336756a4e947d56ba1-19208227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71c1cf252c8d3c936f94c091b31947ed05767446' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\study\\applysub.html',
      1 => 1453684899,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1336756a4e947d56ba1-19208227',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a4e947d80945_43192038',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a4e947d80945_43192038')) {function content_56a4e947d80945_43192038($_smarty_tpl) {?><div class="page">
	<script type="text/javascript">
		$(function() {
			$(".applysub .js_grid").tap(function() {
				pageManager.go($(this).data("id"));
			});
		})
	</script>
	<div class="weui_msg">
		<div class="weui_icon_area"><i class="weui_icon_success weui_icon_msg"></i></div>
		<div class="weui_text_area">
			<h2 class="weui_msg_title">申请成功</h2>
			<p class="weui_msg_desc">扣除积分：30</p>
		</div>
		<div class="weui_opr_area">
			<p class="weui_btn_area">
				<a href="javascript:;" class="weui_btn weui_btn_primary js_grid" data-id = "uigs">返回关卡页</a>
				<a href="javascript:;" class="weui_btn weui_btn_default js_grid" data-id = "home">返回首页</a>
			</p>
		</div>
	</div>
</div><?php }} ?>