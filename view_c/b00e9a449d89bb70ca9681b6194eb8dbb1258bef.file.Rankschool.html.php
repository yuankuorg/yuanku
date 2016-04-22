<?php /* Smarty version Smarty-3.1.12, created on 2016-01-28 09:22:24
         compiled from "E:\wamp\www\yuanku\view\study\Rankschool.html" */ ?>
<?php /*%%SmartyHeaderCode:423756a87d39000168-98190909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b00e9a449d89bb70ca9681b6194eb8dbb1258bef' => 
    array (
      0 => 'E:\\wamp\\www\\yuanku\\view\\study\\Rankschool.html',
      1 => 1453972272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '423756a87d39000168-98190909',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a87d390374e3_00512868',
  'variables' => 
  array (
    'school' => 0,
    's' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a87d390374e3_00512868')) {function content_56a87d390374e3_00512868($_smarty_tpl) {?><div class="page">
	<script type="text/javascript">
		$(function(){
			$(".Rankschool .js_grid").tap(function(){
				pageManager.go($(this).data("id"));
			});
		});
		
		$("#schoolmore").tap(function(){
			var j = 1;
			j++;
			$.ajax({ 
				type:"post",
				url:"Rank-getmoreschool.html",
				data:{"curpage":j},
				dataType:"json",
				success:function( json ){
					if( json != false){
						for(var dyn in json){
							var temp = json[dyn];
							var str = '<div class="weui_cells"><div class="weui_cell"><div class="weui_cell_hd"><img src="'+ temp.logo +'"  style="height: 50px; width: 50px;"></div><div class="weui_cell_bd weui_cell_primary"><p>'+ temp.sname +'</p><p>人数:'+ temp.schoolren +'/学校积分:'+ temp.spoint +'分</p></div><div class="weui_cell_ft"><span>'+ temp.schooltotal +'分</span></div></div></div>'; 
							$("#school_fu").append(str);
						}
					}
				},
				async:true
			});
		});
	</script>
	<div class="weui_cells">
		<img src="/yuanku/img/study/3.jpg" style="width: 100%; height: 150px;" />
	</div>	
	<div class="bd" id="school_fu">
        <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['school']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
$_smarty_tpl->tpl_vars['s']->_loop = true;
?>
	        <div class="weui_cells">
			    <div class="weui_cell">
			    	<div class="weui_cell_hd">
			        	<img src="<?php echo $_smarty_tpl->tpl_vars['s']->value['logo'];?>
"  style="height: 50px; width: 50px;">
			    	</div>
				    <div class="weui_cell_bd weui_cell_primary">
				    	<p><?php echo $_smarty_tpl->tpl_vars['s']->value['sname'];?>
</p>
				    	<p>人数:<?php echo $_smarty_tpl->tpl_vars['s']->value['schoolren'];?>
/学校积分:<?php echo $_smarty_tpl->tpl_vars['s']->value['spoint'];?>
分</p>
			    	</div>
			    	<div class="weui_cell_ft">
			    		<span><?php echo $_smarty_tpl->tpl_vars['s']->value['schooltotal'];?>
分</span>
			    	</div>	
			    </div>
			</div>   
		<?php } ?>  
	</div>
	<div class="bd">
		<a href="javascript:void(0);" class="weui_btn weui_btn_plain_default" id="schoolmore" style="font-size: 14px;">加载更多</a>
	</div>
</div><?php }} ?>