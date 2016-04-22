<?php /* Smarty version Smarty-3.1.12, created on 2016-01-29 01:19:10
         compiled from "E:\wamp\www\yuanku\view\study\gs.html" */ ?>
<?php /*%%SmartyHeaderCode:2252756a31ee25f2f07-81373866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '669b86d9bb3050004e7d99d400d08ff02cf99675' => 
    array (
      0 => 'E:\\wamp\\www\\yuanku\\view\\study\\gs.html',
      1 => 1453978944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2252756a31ee25f2f07-81373866',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a31ee2627f16_14612654',
  'variables' => 
  array (
    'projectdata' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a31ee2627f16_14612654')) {function content_56a31ee2627f16_14612654($_smarty_tpl) {?><div class="page">
	<script type="text/javascript">
		$(function() {
			$(".gs .js_grid").tap(function() {
				var pid = {
					"pid": $(this).data("pid")
				};
				 pageManager.go($(this).data("id"), pid);
			});
		});
	</script>
	<div class="bd">
		<ul>
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['projectdata']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['projectdata']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
				<li>
					<a href="javascript:;" data-id="uigs" data-pid="<?php echo $_smarty_tpl->tpl_vars['projectdata']->value[$_smarty_tpl->tpl_vars['i']->value]['pid'];?>
" class="js_grid"><img src="<?php echo $_smarty_tpl->tpl_vars['projectdata']->value[$_smarty_tpl->tpl_vars['i']->value]['poster'];?>
"/></a>
				</li>
				<?php }} ?>
		</ul>
	</div>
</div><?php }} ?>