<?php /* Smarty version Smarty-3.1.12, created on 2016-01-28 09:22:50
         compiled from "E:\wamp\www\yuanku\view\study\chuangps.html" */ ?>
<?php /*%%SmartyHeaderCode:1992256a2f72fbda223-58101454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60479dd0005343519c5d99cc38fc63ebcb54da9d' => 
    array (
      0 => 'E:\\wamp\\www\\yuanku\\view\\study\\chuangps.html',
      1 => 1453972272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1992256a2f72fbda223-58101454',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a2f72ff1ccc8_69407129',
  'variables' => 
  array (
    'chapterdata' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a2f72ff1ccc8_69407129')) {function content_56a2f72ff1ccc8_69407129($_smarty_tpl) {?><div class="page">
	<script type="text/javascript">
		$(function() {
			$(".chuangps .js_grid").tap(function() {
				pageManager.go($(this).data("id"));
			});
		});
	</script>
		
	<div class="weui_cells">
		<div class="weui_cell">
			<div class="weui_cell_bd weui_cell_primary">
				<p class="vidioname">第<?php echo $_POST['gid'];?>
关：<?php echo $_smarty_tpl->tpl_vars['chapterdata']->value[$_POST['gid']-1]['title'];?>
</p>
				<p class="degree">难度系数：<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['chapterdata']->value[$_POST['gid']-1]['difficult']-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['chapterdata']->value[$_POST['gid']-1]['difficult']-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?><img src="/yuanku/img/study/star.gif" class="starfill" /><?php }} ?></p>
			</div>
		</div>

		<div class="weui_cell weui_pad">			
			<iframe class="video_iframe" style="position:relative; z-index:1;" height="375" width="100%" frameborder="0" src="https://v.qq.com/iframe/preview.html?vid=j01826v39cl&amp;width=500&amp;height=375&amp;auto=0" allowfullscreen=""></iframe>			
		</div>
		<div class="weui_cell">
			<div class="weui_cell_bd weui_cell_primary">
				<p class="rule_title">闯关说明：</p>
				<p class="rule"><?php echo $_smarty_tpl->tpl_vars['chapterdata']->value[$_POST['gid']-1]['expound'];?>
</p>
			</div>
		</div>
	</div>
	
	<div class="button_sp_area area_mar">
		<a href="javascript:;" class="weui_btn weui_btn_primary js_grid" data-id="applysub">申请通关</a>
	</div>
</div>
<?php }} ?>