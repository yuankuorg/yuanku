<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 09:34:04
         compiled from "G:\wamp\www\yuanku\view\admin\comment.html" */ ?>
<?php /*%%SmartyHeaderCode:915656a5ec0c37b715-13982175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3cd29d848f7c8166293c5a21a71adba2ae2c61e3' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\admin\\comment.html',
      1 => 1453536461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '915656a5ec0c37b715-13982175',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    're' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a5ec0c4edfe5_96317926',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a5ec0c4edfe5_96317926')) {function content_56a5ec0c4edfe5_96317926($_smarty_tpl) {?><script type="text/javascript">
	$(function(){
		all();
		btnreset();
		//点击搜索
		$(".panel-body .search").click(function(){			
			$.ajax({
				type: "post",
				url: "/yuanku/comment-comment.html",
				data:{
					"n_id":$("#n_id").val(),
					"cname":$("#cname").val(),
					"minaddtime":$("#minaddtime").val(),
					"maxaddtime":$("#maxaddtime").val()					
					},
				success: function(text) {
					$(".main").html(text);
					btnreset();
				},
				async: true
			});			
		});
		//点击回复，每行评论的最右边的铅笔图案
		$(".reply").click(function(){
			var cid = $(this).attr("data-id");
			var rid = $(this).attr("data-rid");
			$.ajax({
				type:"post",
				url:"/yuanku/comment-commentReply.html",
				data:{"cid":cid,"rid":rid},
				success: function(text) {
					$(".main").fadeOut(function(){
						$(this).html(text);
						$(this).fadeIn();
					});
				},				
				async:true
			});			
		});
		//点击删除，每行评论的最右边的垃圾箱图案，每次只能删一条
		$(".del").click(function(){
			var cid = $(this).attr("data-id");
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
						url:"/yuanku/comment-delcomment.html",
						data:{"cid":cid},
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
								redriect("/yuanku/adminIndex-comment.html");
							}						
						}
					});
				}else{
					$('#delModal').modal("hide");
				}
			});
		});
		//点击选中多个评论复选框，再点击评论表左下角的垃圾箱，批量删除
		$(".batchdel").click(function(){
			//把选中的评论id塞进数组
			var ids = [];
			$("input[name=delcomment]:checked").each(function(){
				ids.push($(this).val());
			});
			if(ids.length==0){
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
							url:"/yuanku/comment-batchdelComment.html",
							data:{"ids":ids},
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
									redriect("/yuanku/adminIndex-comment.html");
								}						
							}
						});
					}else{
						$('#delModal').modal("hide");
					}
				});
			}
		});
	});
	
	function btnreset(){
		//搜索栏重置
		$(".panel-body .reset").click(function(){
			$(".panel-body input").each(function(){
				$(this).val("");
			});
		});		
	}
</script>
<div class="panel panel-primary margin-base">
	<div class="panel-heading">
		<h3 class="panel-title">评论</h3>
	</div>

	<div class="panel-body">
		<form role="form" class="form-inline">
			<div class="form-group">
				<label for="n_id" class="sr-only">文章ID:</label>
				<input type="text" id="n_id" class="form-control" placeholder="搜索文章ID"
					value="<?php if (!empty($_POST['n_id'])){?><?php echo $_POST['n_id'];?>
<?php }?>" />
			</div>			
			<div class="form-group">
				<label for="name" class="sr-only">微信号:</label>
				<input type="text" id="cname" class="form-control" placeholder="搜索用户名"
					value="<?php if (!empty($_POST['cname'])){?><?php echo $_POST['cname'];?>
<?php }?>" />
			</div>
			<div class="form-group">
				<label for="time" class="sr-only">时间:</label>
				<input type="text" id="minaddtime" class="form-control" placeholder="最小时间"
					onclick="WdatePicker({dateFmt:'yyyy-MM-dd',skin:'whyGreen' })" 
					value="<?php if (!empty($_POST['minaddtime'])){?><?php echo $_POST['minaddtime'];?>
<?php }?>"/>
					-
				<input type="text" id="maxaddtime" class="form-control" placeholder="最大时间"
					onclick="WdatePicker({dateFmt:'yyyy-MM-dd',skin:'whyGreen' })"
					value="<?php if (!empty($_POST['maxaddtime'])){?><?php echo $_POST['maxaddtime'];?>
<?php }?>"/>
			</div>
			<button type="button" class="btn btn-primary search">
				<span class="glyphicon glyphicon-search"></span>
				搜索
			</button>
			<button type="button" class="btn btn-info reset">
				<span class="glyphicon glyphicon-refresh"></span>
				重置
			</button>
		</form>	
		<div class="line-base"></div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th width="3%"><input type="checkbox" id="all"/></th>					
					<th width="8%">文章ID</th>
					<th width="8%">微信号</th>
					<th>评论</th>
					<th width="15%">时间</th>
					<th width="20%">回复</th>
					<th width="8%">管理员</th>
					<th width="10%">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['re']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>				
					<tr>
						<td>
							<input type="checkbox" name="delcomment" value="<?php echo $_smarty_tpl->tpl_vars['comment']->value['cid'];?>
"/>
						</td>
						<td><span><?php echo $_smarty_tpl->tpl_vars['comment']->value['n_id'];?>
</span></td>
						<td><?php echo $_smarty_tpl->tpl_vars['comment']->value['cname'];?>
</td>
						<td class="box"><?php echo $_smarty_tpl->tpl_vars['comment']->value['ctext'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['comment']->value['ctime'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['comment']->value['rtext'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['comment']->value['code'];?>
</td>
						<td>
							<span class="glyphicon glyphicon-pencil mouse reply" data-id="<?php echo $_smarty_tpl->tpl_vars['comment']->value['cid'];?>
" data-rid="<?php echo $_smarty_tpl->tpl_vars['comment']->value['rid'];?>
"></span>
							<span class="glyphicon glyphicon-trash mouse del" data-id="<?php echo $_smarty_tpl->tpl_vars['comment']->value['cid'];?>
"></span>
						</td>					
					</tr>
				<?php } ?>
			</tbody>
			<td><span class="glyphicon glyphicon-trash mouse batchdel"></span></td>
		</table>
	</div>			
	
	<div class="panel-footer">
		<?php echo $_smarty_tpl->getSubTemplate ("admin/pages.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('url'=>"/yuanku/adminIndex-comment.html"), 0);?>

	</div>
</div><?php }} ?>