<?php /* Smarty version Smarty-3.1.12, created on 2016-01-31 07:16:52
         compiled from "D:\Program Files\apatch\wamp\www\yuanku\view\admin\pages.html" */ ?>
<?php /*%%SmartyHeaderCode:2379256adb4e420aa67-30365452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e32627e896406805755f4425ee84067dd1ec7f6' => 
    array (
      0 => 'D:\\Program Files\\apatch\\wamp\\www\\yuanku\\view\\admin\\pages.html',
      1 => 1453861622,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2379256adb4e420aa67-30365452',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'hot' => 0,
    'curpage' => 0,
    'page' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56adb4e4485ed1_80878277',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56adb4e4485ed1_80878277')) {function content_56adb4e4485ed1_80878277($_smarty_tpl) {?><script type="text/javascript">
	$(function(){				
		$(".pages a").click(function(){
			var obj = <?php echo json_encode($_POST);?>
;
			
			if (obj.length == 0){
				obj = {};
			}
			obj["curpage"]=$(this).attr("page");
			$.ajax({
				type:"post",
				url:"<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
",
				data:obj,
				success:function(text){
					<?php if (isset($_smarty_tpl->tpl_vars['hot']->value)){?>
						$(".HotAndNew").fadeOut(function(){
							$(this).empty().html(text);
							$(this).fadeIn();
						});
					<?php }else{ ?>
						$(".main").fadeOut(function(){
							$(this).empty().html(text);
							$(this).fadeIn();
						});
					<?php }?>
				},
				async:true
			});
		});
	});
</script>
	<div class="pages">
		<nav class="text-center">
			<ul class="pagination margin-top-0px">
		    	<li>
			    	<a href="javascript:void(0);" aria-label="Previous" page="1">
			        	<span aria-hidden="true">&laquo;</span>
			    	</a>
			    </li>
			    <li><a href="javascript:void(0);" page = "<?php if ($_smarty_tpl->tpl_vars['curpage']->value<=1){?>1<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['curpage']->value-1;?>
<?php }?>">上一页</a></li>
				<?php if ($_smarty_tpl->tpl_vars['curpage']->value<=5){?>
					<?php if ($_smarty_tpl->tpl_vars['page']->value>=10){?>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
							<?php if ($_smarty_tpl->tpl_vars['i']->value==$_smarty_tpl->tpl_vars['curpage']->value){?>
								<li class="active"><a href="javascript:void(0);" page="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>	
							<?php }else{ ?>
								<li><a href="javascript:void(0);" page="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>	
							<?php }?>			
						<?php }} ?>
					<?php }else{ ?>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['page']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['page']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
							<?php if ($_smarty_tpl->tpl_vars['i']->value==$_smarty_tpl->tpl_vars['curpage']->value){?>
								<li class="active"><a href="javascript:void(0);" page="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>	
							<?php }else{ ?>
								<li><a href="javascript:void(0);" page="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>	
							<?php }?>			
						<?php }} ?>
					<?php }?>
				<?php }elseif($_smarty_tpl->tpl_vars['curpage']->value>=$_smarty_tpl->tpl_vars['page']->value-10){?>
					<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['page']->value+1 - ($_smarty_tpl->tpl_vars['page']->value-10) : $_smarty_tpl->tpl_vars['page']->value-10-($_smarty_tpl->tpl_vars['page']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['page']->value-10, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
						<?php if ($_smarty_tpl->tpl_vars['i']->value==$_smarty_tpl->tpl_vars['curpage']->value){?>
							<li class="active"><a href="javascript:void(0);" page="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>	
						<?php }else{ ?>
							<li><a href="javascript:void(0);" page="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>	
						<?php }?>			
					<?php }} ?>
				<?php }else{ ?>
					<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['curpage']->value+5+1 - ($_smarty_tpl->tpl_vars['curpage']->value-5) : $_smarty_tpl->tpl_vars['curpage']->value-5-($_smarty_tpl->tpl_vars['curpage']->value+5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['curpage']->value-5, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
						<?php if ($_smarty_tpl->tpl_vars['i']->value==$_smarty_tpl->tpl_vars['curpage']->value){?>
							<li class="active"><a href="javascript:void(0);" page="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>	
						<?php }else{ ?>
							<li><a href="javascript:void(0);" page="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>	
						<?php }?>			
					<?php }} ?>
				<?php }?>
			    <li><a href="javascript:void(0);" page="<?php if ($_smarty_tpl->tpl_vars['curpage']->value>=$_smarty_tpl->tpl_vars['page']->value){?><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['curpage']->value+1;?>
<?php }?>">下一页</a></li>
			    <li>
			    	<a href="javascript:void(0);" aria-label="Next" page="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
			        	<span aria-hidden="true">&raquo;</span>
		    		</a>
		    	</li>
			</ul>
		</nav>
	</div><?php }} ?>