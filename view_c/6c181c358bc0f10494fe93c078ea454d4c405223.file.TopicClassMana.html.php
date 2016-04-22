<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 12:12:47
         compiled from "G:\wamp\www\yuanku\view\admin\TopicClassMana.html" */ ?>
<?php /*%%SmartyHeaderCode:2081056a6113fae8ec2-90762280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c181c358bc0f10494fe93c078ea454d4c405223' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\admin\\TopicClassMana.html',
      1 => 1453536461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2081056a6113fae8ec2-90762280',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'topicclass' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a6113fc5c421_77414064',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a6113fc5c421_77414064')) {function content_56a6113fc5c421_77414064($_smarty_tpl) {?><script type="text/javascript">
	$(function(){
		//点击新增按钮进入新增话题类别页面
		$("#TopicClassAdd").click(function(){	
			redriect($(this).attr("url"));
		});
		
		//点击修改图标进入修改话题类别页面
		$(".details").click(function(){
			var url=$(this).attr("url");
			var data=new Array();
			data={"tc_id":$(this).attr("data-id")};
			redriect(url,data);
		});
		
		//点击搜索按钮
		$("#search").click(function(){
			$.ajax({
				type:"post",
				url:"/yuanku/topicClass-TopicClassMana.html",
				data:{"tc_name":$("#tc_name").val(),"tc_description":$("#tc_description").val(),
				"starttime":$("#starttime").val(),"endtime":$("#endtime").val()},
				success:function( text ){
					$(".main").fadeOut(function(){
						$(this).html(text);
						$(this).fadeIn();	
					});						
				},
				async:true
			});
		});
	
		//点击重置按钮,先清空输入框的值，再刷新页面
		$("#reset").click(function(){
			$(".panel-body input").each(function(){
				$(this).val("");
			});

			$.ajax({
				type:"post",
				url:"/yuanku/topicClass-TopicClassMana.html",
				success:function( text ){
					$(".main").fadeOut(function(){
						$(this).html(text);
						$(this).fadeIn();	
					});						
				},
				async:true
			});
		});
		
		//点击删除按钮的图标
		$(".delnews").click(function(){
			var tc_id=$(this).attr("data-id");
			$('#delModal').modal({
				backdrop : true,
				keyboard : true,
				show     : true
			});	
			$('#delModal').unbind().on('hidden.bs.modal',function(){
				var re = $("#modalok").attr("data-sub");
				if(re=='true'){
					$.ajax({
						type:"post",
						url:"/yuanku/topicClass-delTopicClass.html",
						data:{"tc_id":tc_id},
						success: function(text){
							text.trim();
							if(text=='false'){
								$("#modalok").attr("data-sub","false");
								$('#myModal').modal({
									backdrop : true,
									keyboard : true,
									show     : true,
									remote	 : '/yuanku/admin-showflase.html'
								});
							}else{
								$("#modalok").attr("data-sub","false");
								redriect("/yuanku/topicClass-TopicClassMana.html");
							}						
						}
					});
				}else{
					$('#delModal').modal("hide");
				}
			});

		});
		
		//点击批量删除按钮
		$(".batchdel").click(function(){
			var tcids = "";
			$(".table tbody input[type=checkbox]:checked").each(function(){
				tcids += $(this).val()+",";
			});
			tcids=tcids.substr(0,tcids.length-1);
			if(tcids==''){
				$('#myModal').modal({
					backdrop : true,
					keyboard : true,
					show     : true,
					remote	 : '/yuanku/admin-chooseOne.html'
				});
				return;
			}else{
				$('#delModal').modal({
					backdrop : true,
					keyboard : true,
					show     : true
				});	
				$('#delModal').unbind().on('hidden.bs.modal',function(){
					var re = $("#modalok").attr("data-sub");
					if(re=='true'){
						$.ajax({
							type:"post",
							url:"/yuanku/topicClass-batchDel.html",
							data:{"tcids":tcids},
							success: function(text){
								text.trim();
								if(text=='false'){
									$("#modalok").attr("data-sub","false");
									$('#myModal').modal({
										backdrop : true,
										keyboard : true,
										show     : true,
										remote	 : '/yuanku/admin-showflase.html'
									});
								}else{
									$("#modalok").attr("data-sub","false");
									redriect("/yuanku/topicClass-TopicClassMana.html");
								}						
							}
						});
					}else{
						$('#delModal').modal("hide");
					}
				});
			}
		});	
		
		all();
	});
</script>
<div class="panel panel-primary margin-base">
	<div class="panel-heading">		
		<h3 class="panel-title"><label>话题类别管理</label></h3>				
	</div>
  	<div class="panel-body">
		<form class="form-inline" style="margin-bottom: 10px;">
		    <input type="text" class="form-control" id="tc_name" placeholder="搜索话题类别名称"
		    	value="<?php if (!empty($_POST['tc_name'])){?><?php echo $_POST['tc_name'];?>
<?php }?>">
		    <input type="text" class="form-control" id="tc_description" placeholder="搜索话题类别描述"
		    	value="<?php if (!empty($_POST['tc_description'])){?><?php echo $_POST['tc_description'];?>
<?php }?>">	    		
		    <input type="text" id="starttime" class="form-control" placeholder="最小时间"
			onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',skin:'whyGreen' })" readonly="readonly"
			value="<?php if (!empty($_POST['starttime'])){?><?php echo $_POST['starttime'];?>
<?php }?>"/>
			-
			<input type="text" id="endtime" class="form-control" placeholder="最大时间"
			onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',skin:'whyGreen' })" readonly="readonly"
			value="<?php if (!empty($_POST['endtime'])){?><?php echo $_POST['endtime'];?>
<?php }?>"/>		
			<button type="button" class="btn btn-info" id="search">
				<span class="glyphicon glyphicon-search" aria-hidden="true"></span> 搜索
			</button>
			<button type="button" class="btn btn-info" id="reset">
				<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> 重置
			</button>
			<button id="TopicClassAdd" type="button" class="btn btn-danger" url="/yuanku/topicClass-TopicClassAdd.html">
				<span class="glyphicon glyphicon-plus" aria-hidden="true" ></span> 新增
			</button>
		</form>	
		<div class="line-base"></div>
  	</div>
  	<div class="table-responsive">
  		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th width="3%">
						<input type="checkbox" id="all"/>
					</th>
					<th width="10%">话题类别ID</th>
					<th width="15%">话题类别名称</th>
					<th width="35%">话题类别描述</th>
					<th width="20%">添加时间</th>
					<th width="20%">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['topicclass'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['topicclass']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['topicclass']->key => $_smarty_tpl->tpl_vars['topicclass']->value){
$_smarty_tpl->tpl_vars['topicclass']->_loop = true;
?>
					<tr>
						<td>
							<input type="checkbox" name="" id="" value="<?php echo $_smarty_tpl->tpl_vars['topicclass']->value['tc_id'];?>
" />
						</td>
						<td><?php echo $_smarty_tpl->tpl_vars['topicclass']->value['tc_id'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['topicclass']->value['tc_name'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['topicclass']->value['tc_description'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['topicclass']->value['addtime'];?>
</td>
						<td>
							<span class="details glyphicon glyphicon-pencil mouse" 
								url="/yuanku/topicClass-TopicClassAdd.html"
								data-id="<?php echo $_smarty_tpl->tpl_vars['topicclass']->value['tc_id'];?>
"></span>
							<span class="glyphicon glyphicon-trash mouse delnews" data-id="<?php echo $_smarty_tpl->tpl_vars['topicclass']->value['tc_id'];?>
"></span>
						</td>
					</tr>
				<?php } ?>
			</tbody>
			<td><span class="glyphicon glyphicon-trash mouse batchdel"></span></td>
  		</table>
  	</div>
  	
	<div class="panel-footer">
		<?php echo $_smarty_tpl->getSubTemplate ("admin/pages.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('url'=>"/yuanku/topicClass-TopicClassMana.html"), 0);?>

	</div>  	
</div><?php }} ?>