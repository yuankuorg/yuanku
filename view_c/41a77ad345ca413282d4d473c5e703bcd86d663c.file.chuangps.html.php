<?php /* Smarty version Smarty-3.1.12, created on 2016-01-31 05:54:15
         compiled from "D:\Program Files\apatch\wamp\www\yuanku\view\study\chuangps.html" */ ?>
<?php /*%%SmartyHeaderCode:148656ad9a2389a0e9-23931614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41a77ad345ca413282d4d473c5e703bcd86d663c' => 
    array (
      0 => 'D:\\Program Files\\apatch\\wamp\\www\\yuanku\\view\\study\\chuangps.html',
      1 => 1454219650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148656ad9a2389a0e9-23931614',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56ad9a239adce2_50293182',
  'variables' => 
  array (
    'chapterdata' => 0,
    'cstate' => 0,
    'change' => 0,
    'ch' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ad9a239adce2_50293182')) {function content_56ad9a239adce2_50293182($_smarty_tpl) {?><div class="page">
	<script type="text/javascript">
		$(function() {
			$(".chuangps .js_grid").tap(function(){
				var cid = $(this).attr("data-cid");
				var t = $(this);
				$.ajax({
					type:"post",
					url :"chuang-changeState.html",
					data:{ cid : cid },
					success : function( text ){ 
						//申请成功
						if ( text == "true") {
							$("#dialog").dialog("提示","提交申请成功");
							t.hide();
						} else {//操作失败的情况
							$("#dialog").dialog("提示","提交申请失败,请稍后重试!");
						}
					},
					async:true
				});
			});
		});
	</script>
	<div class="weui_cells">
		<div class="weui_cell">
			<div class="weui_cell_bd weui_cell_primary">
				<h4 class="vidioname"><?php echo $_smarty_tpl->tpl_vars['chapterdata']->value['title'];?>
</h4>
				<p class="degree">难度系数：<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['chapterdata']->value['difficult']-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['chapterdata']->value['difficult']-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?><img src="/yuanku/img/study/star.gif" class="starfill" /><?php }} ?></p>
			</div>
		</div>
	
		<div class="weui_cell weui_pad">			
			<iframe class="video_iframe" style="position:relative; z-index:1;" width="100%" frameborder="0" src="<?php echo $_smarty_tpl->tpl_vars['chapterdata']->value['video'];?>
" allowfullscreen=""></iframe>			
		</div>
		<div class="weui_cell">
			<div class="weui_cell_bd weui_cell_primary">
				<p class="rule_title">闯关说明：</p>
				<p class="rule"><?php echo $_smarty_tpl->tpl_vars['chapterdata']->value['expound'];?>
</p>
			</div>
		</div>
		<div class="weui_cell"style="display: <?php if (!empty($_smarty_tpl->tpl_vars['chapterdata']->value['material'])){?>block<?php }else{ ?>none<?php }?>;">
			<div class="weui_cell_bd weui_cell_primary">
				<p class="rule_title">材料下载地址</p>
				<p class="rule"><?php echo $_smarty_tpl->tpl_vars['chapterdata']->value['material'];?>
</p>
			</div>
		</div>
	</div>
	<div class="button_sp_area area_mar " <?php if ($_SESSION['vip']['items']==6||$_smarty_tpl->tpl_vars['cstate']->value['sid']==4||$_smarty_tpl->tpl_vars['cstate']->value['sid']==2){?> style="display:none" <?php }?> >
	<a href="javascript:;" id="apply"  class="weui_btn weui_btn_primary js_grid " data-id="applysub" data-cid="<?php echo $_smarty_tpl->tpl_vars['chapterdata']->value['cid'];?>
" data-project="<?php echo $_smarty_tpl->tpl_vars['chapterdata']->value['project'];?>
" data-score="<?php echo $_smarty_tpl->tpl_vars['chapterdata']->value['score'];?>
" >申请通关</a>
	</div>
	<?php if (isset($_smarty_tpl->tpl_vars['change']->value)){?>
		<?php  $_smarty_tpl->tpl_vars['ch'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ch']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['change']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ch']->key => $_smarty_tpl->tpl_vars['ch']->value){
$_smarty_tpl->tpl_vars['ch']->_loop = true;
?>
		<div class="weui_cell">
			<div class="weui_cell_bd weui_cell_primary" style="padding-left: 20px;">
				<h4>你于 <?php echo $_smarty_tpl->tpl_vars['ch']->value['time'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['ch']->value['expl'];?>
</h4>
			</div>
		</div>
		<?php } ?>
	<?php }?><?php }} ?>