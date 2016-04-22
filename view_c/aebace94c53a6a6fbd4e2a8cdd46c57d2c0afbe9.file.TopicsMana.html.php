<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 09:33:53
         compiled from "G:\wamp\www\yuanku\view\admin\TopicsMana.html" */ ?>
<?php /*%%SmartyHeaderCode:1199156a5ec0115cb73-59767370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aebace94c53a6a6fbd4e2a8cdd46c57d2c0afbe9' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\admin\\TopicsMana.html',
      1 => 1453536461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1199156a5ec0115cb73-59767370',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tc' => 0,
    'topicclass' => 0,
    'data' => 0,
    'topic' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a5ec01336769_55825903',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a5ec01336769_55825903')) {function content_56a5ec01336769_55825903($_smarty_tpl) {?><script type="text/javascript">
	$(function(){		
		//点击新增按钮进入新增话题页面
		$("#TopicsAdd").click(function(){	
			redriect($(this).attr("url"));
		});
		
		//点击修改图标进入修改话题页面
		$(".details").click(function(){
			var url=$(this).attr("url");
			var data=new Array();
			data={"t_id":$(this).attr("data-id")};
			redriect(url,data);
		});		

		//点击搜索按钮
		$("#search").click(function(){
			var tc_id=$("select option:checked").attr("data-tcid");
			$.ajax({
				type:"post",
				url:"/yuanku/topics-TopicsMana.html",
				data:{"tc_id":tc_id,"t_title":$("#t_title").val(),"code":$("#code").val(),
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
		
		//点击搜索后让下拉框的选中值为之前的
		var selectid = $("select").attr("select-id");
		$("select option").each(function(){
			if($(this).attr("data-tcid")==selectid){
				$(this).attr("selected","selected");
			}
		});		
		
		//点击重置按钮,先清空输入框的值，再刷新页面
		$("#reset").click(function(){
			$(".panel-body input").each(function(){
				$(this).val("");
			});

			$.ajax({
				type:"post",
				url:"/yuanku/topics-TopicsMana.html",
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
			var t_id=$(this).attr("data-id");
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
						url:"/yuanku/topics-delTopic.html",
						data:{"t_id":t_id},
						success: function(text){
							text.trim(text);
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
								redriect("/yuanku/topics-TopicsMana.html");
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
			var tids = "";
			$(".table tbody input[type=checkbox]:checked").each(function(){
				tids += $(this).val()+",";
			});
			tids=tids.substr(0,tids.length-1);
			if(tids==''){
				$('#myModal').modal({
					backdrop : true,
					keyboard : true,
					show     : true,
					remote	 : '/yuanku/admin-chooseOne.html'
				});
				return;
			}
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
						url:"/yuanku/topics-batchDel.html",
						data:{"tids":tids},
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
								redriect("/yuanku/topics-TopicsMana.html");
							}						
						}
					});
				}else{
					$('#delModal').modal("hide");
				}
			});
		});		
		//点击checkbox全选
		all();
		

	});	
</script>
<div class="panel panel-primary margin-base">
	<div class="panel-heading">
		<h3 class="panel-title"><label>话题管理</label></h3>		
	</div>
  	<div class="panel-body">
		<form class="form-inline" style="margin-bottom: 10px;">
			<select class="form-control" placeholder="搜索话题类别" 
				select-id="<?php if (!empty($_POST['tc_id'])){?><?php echo $_POST['tc_id'];?>
<?php }?>">
					<option>搜索话题类别</option>
					<?php  $_smarty_tpl->tpl_vars['topicclass'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['topicclass']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tc']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['topicclass']->key => $_smarty_tpl->tpl_vars['topicclass']->value){
$_smarty_tpl->tpl_vars['topicclass']->_loop = true;
?>
						<option data-tcid="<?php echo $_smarty_tpl->tpl_vars['topicclass']->value['tc_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['topicclass']->value['tc_name'];?>
</option>
					<?php } ?>
			</select>
		    <input type="text" class="form-control" id="t_title" placeholder="搜索话题标题"
		    	value="<?php if (!empty($_POST['t_title'])){?><?php echo $_POST['t_title'];?>
<?php }?>">
		    <input type="text" class="form-control" id="code" placeholder="搜索添加人"
		    	value="<?php if (!empty($_POST['code'])){?><?php echo $_POST['code'];?>
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
			<button type="button" class="btn btn-info btn-sm paddingLR" id="search">
				<span class="glyphicon glyphicon-search" aria-hidden="true"></span> 搜索
			</button>
			<button type="button" class="btn btn-info btn-sm paddingLR" id="reset">
				<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> 重置
			</button>
			<button id="TopicsAdd" url="/yuanku/topics-TopicsAdd.html" type="button" class="btn btn-danger btn-sm paddingLR">
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
						<input type="checkbox" id="all" />
					</th>
					<th width="7%">话题ID</th>
					<th width="20%">话题标题</th>
					<th width="20%">话题描述</th>
					<th width="10%">话题类别</th>
					<th width="10%">话题封面</th>
					<th width="10%">添加人</th>
					<th width="10%">上传时间</th>
					<th width="10%">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['topic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['topic']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['topic']->key => $_smarty_tpl->tpl_vars['topic']->value){
$_smarty_tpl->tpl_vars['topic']->_loop = true;
?>
					<tr>
						<td>
							<input type="checkbox" name="" id="" value="<?php echo $_smarty_tpl->tpl_vars['topic']->value['t_id'];?>
" />
						</td>
						<td><?php echo $_smarty_tpl->tpl_vars['topic']->value['t_id'];?>
</td>
						<td class="box"><?php echo $_smarty_tpl->tpl_vars['topic']->value['t_title'];?>
</td>
						<td class="box"><?php echo $_smarty_tpl->tpl_vars['topic']->value['t_description'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['topic']->value['tc_name'];?>
</td>
						<td>
							<img src="<?php echo $_smarty_tpl->tpl_vars['topic']->value['t_img'];?>
" width="50px" height="50px"/>
						</td>
							
						<td><?php echo $_smarty_tpl->tpl_vars['topic']->value['code'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['topic']->value['addtime'];?>
</td>
						<td>
							<span class="details glyphicon glyphicon-pencil mouse" 
								url="/yuanku/topics-topicsAdd.html"
								data-id="<?php echo $_smarty_tpl->tpl_vars['topic']->value['t_id'];?>
"></span>
							<span class="glyphicon glyphicon-trash mouse delnews" data-id="<?php echo $_smarty_tpl->tpl_vars['topic']->value['t_id'];?>
"></span>
						</td>
					</tr>					
				<?php } ?>
			</tbody>
			<td><span class="glyphicon glyphicon-trash mouse batchdel"></span></td>
		</table>				 		
  	</div>
  	
  	<!--底部分页-->
	<div class="panel-footer">
		<?php echo $_smarty_tpl->getSubTemplate ("admin/pages.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('url'=>"/yuanku/topics-TopicsMana.html"), 0);?>

	</div>  	
</div><?php }} ?>