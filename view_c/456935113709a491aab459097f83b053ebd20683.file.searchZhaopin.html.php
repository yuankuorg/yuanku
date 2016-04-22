<?php /* Smarty version Smarty-3.1.12, created on 2016-01-27 08:18:07
         compiled from "E:\wamp\www\yuanku\view\study\searchZhaopin.html" */ ?>
<?php /*%%SmartyHeaderCode:947456a7209f844e13-08716327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '456935113709a491aab459097f83b053ebd20683' => 
    array (
      0 => 'E:\\wamp\\www\\yuanku\\view\\study\\searchZhaopin.html',
      1 => 1453882633,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '947456a7209f844e13-08716327',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a7209f8efde0_47231636',
  'variables' => 
  array (
    'data' => 0,
    'info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a7209f8efde0_47231636')) {function content_56a7209f8efde0_47231636($_smarty_tpl) {?><!--
	作者：dovshui@163.com
	时间：2016-01-23
	描述：搜索招聘信息
-->
<div class="page">
	<script type="text/javascript">
		$(function(){
			$(".searchZhaopin .js_grid").tap(function() {
				var zid ={"zid": $(this).attr("data")};
				pageManager.go($(this).data("id"),zid);
		    });
		});
	</script>
	
	<img src="/yuanku/img/study/img_05.jpg" style="margin-bottom: 5px;"/>
	<div class="weui_cells">
		<div class="weui_cell weui_vcode" style="padding: 0px 5px;">
	        <div class="weui_cell_bd weui_cell_primary">
	            <input class="weui_input" type="text" placeholder="请输入" />
	        </div>
	        <div>
	            <a href="javascript:;"><img src="/yuanku/img/study/search.png" style="height: 30px;"/></a>
	        </div>
	    </div>
    </div>
	<div class="bd">
		<div class="weui_cells weui_cells_access">
			<?php  $_smarty_tpl->tpl_vars['info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['info']->key => $_smarty_tpl->tpl_vars['info']->value){
$_smarty_tpl->tpl_vars['info']->_loop = true;
?>
				<div class="weui_cells">
				<a class="weui_cell js_grid" href="javascript:;" data="<?php echo $_smarty_tpl->tpl_vars['info']->value['zid'];?>
" data-id="checkZhaopinMain">
				    <div class="weui_cell_hd">
				        <img src="/yuanku/img/study/tx_2.gif" alt="icon" style="height:56px;">
				    </div>
				    <div class="weui_cell_bd weui_cell_primary">
				        <p><?php echo $_smarty_tpl->tpl_vars['info']->value['position'];?>
</p>
				        <p class="ft_list1"><?php echo $_smarty_tpl->tpl_vars['info']->value['company'];?>
</p>
				    	<p class="ft_list2"><span><?php echo $_smarty_tpl->tpl_vars['info']->value['address'];?>
</span><span><?php echo $_smarty_tpl->tpl_vars['info']->value['experience'];?>
</span><span><?php echo $_smarty_tpl->tpl_vars['info']->value['degree'];?>
</span></p>
				    </div>
				    <div>
				        <p class="ft_list3"><?php echo $_smarty_tpl->tpl_vars['info']->value['datetime'];?>
</p>
			    		<p class="ft_list4"><?php echo $_smarty_tpl->tpl_vars['info']->value['pay'];?>
</p>
				    </div>
				</a>
			    </div>										
			<?php } ?>
		</div> 
	</div>
</div><?php }} ?>