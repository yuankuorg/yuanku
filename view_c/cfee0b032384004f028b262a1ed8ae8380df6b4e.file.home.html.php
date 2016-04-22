<?php /* Smarty version Smarty-3.1.12, created on 2016-01-31 07:16:51
         compiled from "D:\Program Files\apatch\wamp\www\yuanku\view\admin\home.html" */ ?>
<?php /*%%SmartyHeaderCode:849956adb4e3e7ebe4-04710912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfee0b032384004f028b262a1ed8ae8380df6b4e' => 
    array (
      0 => 'D:\\Program Files\\apatch\\wamp\\www\\yuanku\\view\\admin\\home.html',
      1 => 1453861622,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '849956adb4e3e7ebe4-04710912',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'da' => 0,
    're' => 0,
    'res' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56adb4e41f9451_49309835',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56adb4e41f9451_49309835')) {function content_56adb4e41f9451_49309835($_smarty_tpl) {?><script type="text/javascript">
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
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['new']['a'];?>
(人)</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['new']['b'];?>
(人)</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['new']['c'];?>
(人)</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['new']['d'];?>
(人)</td>
		      	</tr>
		      	<tr>
		         	<td>助学成才</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['zhuxue']['a'];?>
(人)</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['zhuxue']['b'];?>
(人)</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['zhuxue']['c'];?>
(人)</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['zhuxue']['d'];?>
(人)</td>
		     	</tr>
		     	<tr>
		         	<td>名企精英</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['minqi']['a'];?>
(人)</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['minqi']['b'];?>
(人)</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['minqi']['c'];?>
(人)</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['minqi']['d'];?>
(人)</td>
		      	</tr>
		      	<tr>
		         	<td>学校导师</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['school']['a'];?>
(人)</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['school']['b'];?>
(人)</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['school']['c'];?>
(人)</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['school']['d'];?>
(人)</td>
		      	</tr>
		      	<tr>
		         	<td>合作企业</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['company']['a'];?>
(人)</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['company']['b'];?>
(人)</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['company']['c'];?>
(人)</td>
		         	<td><?php echo $_smarty_tpl->tpl_vars['da']->value['company']['d'];?>
(人)</td>
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