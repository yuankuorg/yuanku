<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 08:52:23
         compiled from "G:\wamp\www\yuanku\view\admin\home.html" */ ?>
<?php /*%%SmartyHeaderCode:3059756a5e24713d8c4-34008208%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '041e527d48b82d74526efc0bd7cf126cfab95363' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\admin\\home.html',
      1 => 1453536461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3059756a5e24713d8c4-34008208',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'da' => 0,
    'res' => 0,
    're' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a5e24774a1a5_24246703',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a5e24774a1a5_24246703')) {function content_56a5e24774a1a5_24246703($_smarty_tpl) {?><script type="text/javascript">
	function forwords(url,data){
		$.ajax({
			type:"post",
			url:url,
			data:data,
			dataType:'text',
			success:function(text){
				$('.HotAndNew').fadeOut(function(){ 
					$(this).html(text).fadeIn();
				});
			},
			async:true
		});
	}
   $(function(){
   	//话题和资讯切换
   		$('#panel-heading button').click(function(){ 
    		$("#table > table").hide().eq($('#panel-heading button').index(this)).show();
    		forwords($(this).attr("url"),"");
    	});
    });
</script>
<div class="panel panel-primary margin-base">
  	<!-- Default panel contents -->
  	<div class="panel-heading"><h3 class="panel-title"><label>报名信息</label></h3></div>
  	<!-- Table -->
	  	<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th width="20%">状态</th>
					<th width="20%">报名总数</th>
					<th width="20%">日报名数</th>
					<th width="20%">周报名数</th>
					<th width="20%">月报名数</th>
				</tr>
			</thead>
			<tbody>
				<tr>
		         	<td>新会员</td>
		         	<td><?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['da']->value['data9']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['res']->value['i'];?>
<?php } ?>(人)</td>
		         	<td><?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['da']->value['data8']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['res']->value['c'];?>
<?php } ?>(人)</td>
		         	<td><?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['da']->value['data10']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['res']->value['z'];?>
<?php } ?>(人)</td>
		         	<td><?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['da']->value['data11']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['res']->value['y'];?>
<?php } ?>(人)</td>
		      	</tr>
		      	<tr>
		         	<td>实训</td>
		         	<td><?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['da']->value['data1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['res']->value['i'];?>
<?php } ?>(人)</td>
		         	<td><?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['da']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['res']->value['c'];?>
<?php } ?>(人)</td>
		         	<td><?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['da']->value['data2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['res']->value['z'];?>
<?php } ?>(人)</td>
		         	<td><?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['da']->value['data3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['res']->value['y'];?>
<?php } ?>(人)</td>
		     	</tr>
		     	<tr>
		         	<td>实习</td>
		         	<td><?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['da']->value['data5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['res']->value['i'];?>
<?php } ?>(人)</td>
		         	<td><?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['da']->value['data4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['res']->value['c'];?>
<?php } ?>(人)</td>
		         	<td><?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['da']->value['data6']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['res']->value['z'];?>
<?php } ?>(人)</td>
		         	<td><?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['da']->value['data7']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['res']->value['y'];?>
<?php } ?>(人)</td>
		      	</tr>
		 	</tbody>
	  	</table>
		<div class="panel-footer">
	 	</div>
	</div>
	<div class="panel panel-primary" id="table">
	  	<div class="panel-heading" id="panel-heading">
	  		<div class="btn-group">
			  <button type="button" class="btn btn-primary hot" url="/yuanku/adminIndex-BestHotPage.html">源酷最热话题</button>
			  <button type="button" class="btn btn-primary new" url="/yuanku/adminIndex-BestNewsPage.html">源酷最新资讯</button>
			</div>
	  	</div>
	  		<div class="HotAndNew">
		 	 	<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th width="30%">话题标题</th>
						<th width="30%">话题描述</th>
						<th width="20%">添加人</th>
						<th width="20%">添加时间</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['re']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?>
			      	<tr>
			         	<td><?php echo $_smarty_tpl->tpl_vars['res']->value['t_title'];?>
</td>
			         	<td><?php echo $_smarty_tpl->tpl_vars['res']->value['t_description'];?>
</td>
			         	<td><?php echo $_smarty_tpl->tpl_vars['res']->value['code'];?>
</td>
			         	<td><?php echo $_smarty_tpl->tpl_vars['res']->value['addtime'];?>
</td>
			     	</tr>
			     	<?php } ?>
			 	</tbody>
		  	</table>
		  	<div class="panel-footer">
		  		<?php echo $_smarty_tpl->getSubTemplate ("admin/pages.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('url'=>"/yuanku/adminIndex-home.html"), 0);?>

			</div>
		</div>
	</div>
<?php }} ?>