<?php /* Smarty version Smarty-3.1.12, created on 2016-01-28 09:22:30
         compiled from "E:\wamp\www\yuanku\view\study\Rankpower.html" */ ?>
<?php /*%%SmartyHeaderCode:746056a87d364fee84-81163932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2abebcd32b488bed2097eb91fd9c82ca62b2e127' => 
    array (
      0 => 'E:\\wamp\\www\\yuanku\\view\\study\\Rankpower.html',
      1 => 1453972272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '746056a87d364fee84-81163932',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a87d365872f2_20836241',
  'variables' => 
  array (
    'power' => 0,
    'w' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a87d365872f2_20836241')) {function content_56a87d365872f2_20836241($_smarty_tpl) {?><div class="page">
	<script type="text/javascript">
		$(function(){
			$(".Rankpower .js_grid").tap(function(){
				pageManager.go($(this).data("id"));
			});
		});
		
		$("#powermore").tap(function(){
			var j = 1;
			j++;
			$.ajax({
				type:"post",
				url:"Rank-getmorepower.html",
				data:{"curpage":j},
				dataType:"json",
				success:function( json ){
					if( json != false){
						for(var dyn in json){
							var temp = json[dyn];
							var str = '<div class="weui_cells"><div class="weui_cell"><div class="weui_cell_hd"><img src="'+ temp.img +'"  style="height: 50px; width: 50px;"></div><div class="weui_cell_bd weui_cell_primary"><p>'+ temp.name +'</p><p>积分:'+ temp.exchange +'分/闯关:'+ temp.chuang +'/解决问题:'+ temp.taskrec +'个/签到:'+ temp.sign +'次</p></div><div class="weui_cell_ft"><span>'+ temp.total +'分</span></div></div></div>';
							$("#power_fu").append(str);
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
	<div class="bd" id="power_fu">
        <?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['w']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['power']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value){
$_smarty_tpl->tpl_vars['w']->_loop = true;
?>
	        <div class="weui_cells">
			    <div class="weui_cell">
			    	<div class="weui_cell_hd">
			        	<img src="<?php echo $_smarty_tpl->tpl_vars['w']->value['img'];?>
"  style="height: 50px; width: 50px;">
			    	</div>
				    <div class="weui_cell_bd weui_cell_primary">
				    	<p><?php echo $_smarty_tpl->tpl_vars['w']->value['name'];?>
</p>
				    	<p>积分:<?php echo $_smarty_tpl->tpl_vars['w']->value['exchange'];?>
分/闯关:<?php echo $_smarty_tpl->tpl_vars['w']->value['chuang'];?>
/解决问题:<?php echo $_smarty_tpl->tpl_vars['w']->value['taskrec'];?>
个/签到:<?php echo $_smarty_tpl->tpl_vars['w']->value['sign'];?>
次</p>
			    	</div>
			    	<div class="weui_cell_ft">
			    		<span><?php echo $_smarty_tpl->tpl_vars['w']->value['total'];?>
分</span>
			    	</div>	
			    </div>
			</div>   
		<?php } ?>
	</div>
	<div class="bd">
		    <a href="javascript:void(0);" class="weui_btn weui_btn_plain_default" id="powermore" style="font-size: 14px;">加载更多</a>
	</div>
</div><?php }} ?>