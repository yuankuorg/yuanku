<?php /* Smarty version Smarty-3.1.12, created on 2016-01-29 01:19:12
         compiled from "E:\wamp\www\yuanku\view\study\uigs.html" */ ?>
<?php /*%%SmartyHeaderCode:1729056a3271e8a7e98-36033279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c75ffd9c34ff2641079295bff3c26204c49fe5af' => 
    array (
      0 => 'E:\\wamp\\www\\yuanku\\view\\study\\uigs.html',
      1 => 1453978944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1729056a3271e8a7e98-36033279',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a3271e9262b7_05597727',
  'variables' => 
  array (
    'projectdata' => 0,
    'chaptercount' => 0,
    'i' => 0,
    'statedata' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a3271e9262b7_05597727')) {function content_56a3271e9262b7_05597727($_smarty_tpl) {?><div class="page">
	<script type="text/javascript">
		$(function() {
			var state = null;
			$(".uigs .js_grid").tap(function() {
				if ($(this).is(".yisuo")) {
					$("#tshwjs").dialog("提示", "未解锁!");
				} else {
					var data = {
						"cid": $(this).data("cid")
						
					};
					pageManager.go($(this).data("id"), data);
				}
			});
		});
	</script>

	<img src="<?php echo $_smarty_tpl->tpl_vars['projectdata']->value[0]['poster'];?>
" style="width: 100%;" />
	<article class="weui_article">
		<section>
			<section>
				<h2>简介</h2>
				<p style="padding: 0px;">
					<?php echo $_smarty_tpl->tpl_vars['projectdata']->value[0]['brief'];?>

				</p>
			</section>
		</section>
	</article>
	<div class="weui_grids">
		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['chaptercount']->value)+1 - (1) : 1-(count($_smarty_tpl->tpl_vars['chaptercount']->value))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
		<a href="javascript:;" class="weui_grid js_grid pass" data-cid="<?php echo $_smarty_tpl->tpl_vars['chaptercount']->value[$_smarty_tpl->tpl_vars['i']->value-1]['cid'];?>
"  data-id="chuangps">
			<div class="weui_grid_icon">
				<img src="/yuanku/img/study/num_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
.png" alt="">
			</div>
			<p class="weui_grid_label">
				<!--<?php echo $_smarty_tpl->tpl_vars['statedata']->value[3]['state'];?>
-->
			</p>
		</a>
		<?php }} ?>
	</div>
</div>
<!--提示未解锁-->
<div class="weui_dialog_alert" id="tshwjs" style="display: none;">
	<div class="weui_mask"></div>
	<div class="weui_dialog">
		<div class="weui_dialog_hd"><strong class="weui_dialog_title"></strong></div>
		<div class="weui_dialog_bd"></div>
		<div class="weui_dialog_ft">
			<a href="javascript:;" class="weui_btn_dialog primary">确定</a>
		</div>
	</div>
</div>
<div class="weui_dialog_alert" id="dialog" style="display: block;">
	        <div class="weui_mask"></div>
	        <div class="weui_dialog">
	            <div class="weui_dialog_hd"><strong class="weui_dialog_title">关卡信息</strong></div>
	            <div class="weui_dialog_bd"></div>
	            <div class="button_sp_area ">
	            	 <a href="javascript:;" class="weui_btn weui_btn_primary" style="border-radius: 0;">确认</a>
        			<a href="javascript:;" class="weui_btn weui_btn_default " style="margin: 0; border-radius: 0">取消</a>
       			 </div>

	        </div>
	    </div><?php }} ?>