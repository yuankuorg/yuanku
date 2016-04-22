<?php /* Smarty version Smarty-3.1.12, created on 2016-01-28 09:23:20
         compiled from "E:\wamp\www\yuanku\view\study\Rankpoint.html" */ ?>
<?php /*%%SmartyHeaderCode:1272756a87d3275d595-41528549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9140ee471dd90f8a22c64b029eecc8414dc9cb68' => 
    array (
      0 => 'E:\\wamp\\www\\yuanku\\view\\study\\Rankpoint.html',
      1 => 1453972272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1272756a87d3275d595-41528549',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a87d32813b15_21828935',
  'variables' => 
  array (
    'point' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a87d32813b15_21828935')) {function content_56a87d32813b15_21828935($_smarty_tpl) {?><div class="page">
	<script type="text/javascript">
		$(function(){
			$(".Rankpoint .js_grid").tap(function(){
				pageManager.go($(this).data("id"));
			})
		})
		
		$("#pointmore").tap(function(){
			var j = 1;
			j++;
			$.ajax({
				type:"post",
				url:"Rank-getmorepoint.html",
				dataType:"json",
				data:{"curpage":j},
				success:function( json ){
					if( json != false){
						for(var dyn in json ){
							var temp = json[dyn];
							var str = '<div class="weui_cells"><div class="weui_cell"><div class="weui_cell_hd"><img src="'+ temp.img +'"  style="height: 50px; width: 50px;"></div><div class="weui_cell_bd weui_cell_primary"><p>'+ temp.name +'</p><p>积分:'+ temp.exchange +'分</p></div><div class="weui_cell_ft"><span></span></div></div></div>';
							$("#point_fu").append(str);
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
	<div class="bd" id="point_fu">
		<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['point']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
        <div class="weui_cells">
		    <div class="weui_cell">
		    	<div class="weui_cell_hd">
		        	<img src="<?php echo $_smarty_tpl->tpl_vars['p']->value['img'];?>
"  style="height: 50px; width: 50px;">
		    	</div>
			    <div class="weui_cell_bd weui_cell_primary">
			    	<p><?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
</p>
			    	<p>积分:<?php echo $_smarty_tpl->tpl_vars['p']->value['exchange'];?>
分</p>
		    	</div>
		    	<div class="weui_cell_ft">
		    		<span></span>
		    	</div>	
		    </div>
		</div>   
		<?php } ?>
	</div>
	<div class="bd">
		    <a href="javascript:void(0);" class="weui_btn weui_btn_plain_default" id="pointmore" 
		    style="font-size: 14px;">加载更多</a>
	</div>
</div><?php }} ?>