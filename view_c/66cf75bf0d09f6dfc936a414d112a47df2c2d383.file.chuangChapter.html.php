<?php /* Smarty version Smarty-3.1.12, created on 2016-01-31 07:35:44
         compiled from "D:\Program Files\apatch\wamp\www\yuanku\view\study\chuangChapter.html" */ ?>
<?php /*%%SmartyHeaderCode:1041756adb8481019e4-76539877%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66cf75bf0d09f6dfc936a414d112a47df2c2d383' => 
    array (
      0 => 'D:\\Program Files\\apatch\\wamp\\www\\yuanku\\view\\study\\chuangChapter.html',
      1 => 1454225739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1041756adb8481019e4-76539877',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56adb84823dcf4_87528618',
  'variables' => 
  array (
    'class' => 0,
    'projectclass' => 0,
    'data' => 0,
    'ch' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56adb84823dcf4_87528618')) {function content_56adb84823dcf4_87528618($_smarty_tpl) {?><script type="text/javascript">
	$(function(){		
		//点击新增按钮进入新增话题页面
		$("#Chapteradd").click(function(){	
			redriect($(this).attr("url"));
		});
		
		//点击修改图标进入修改话题页面
		$(".details").click(function(){
			var url=$(this).attr("url");
			var data=new Array();
			data={"cid":$(this).attr("data-id")};
			redriect(url,data);
		});		

		//点击搜索按钮
		$("#search").click(function(){
			var pname = $("select option:checked").attr("data-pname");
			$.ajax({
				type:"post",
				url:"/yuanku/chuangManager-showChapter.html",
				data:{
					"pname": pname,
					"title"  : $("#title").val()
				},
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
			if($(this).attr("data-pname")==selectid){
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
				url:"/yuanku/chuangManager-showChapter.html",
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
			var cid=$(this).attr("data-id");
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
						url:"/yuanku/chuangManager-delChapter.html",
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
								redriect("/yuanku/chuangManager-showChapter.html");
							}						
						}
					});
				}else{
					$('#delModal').modal("hide");
				}
			});
		});
		

	});	
</script>
<div class="panel panel-primary margin-base">
	<div class="panel-heading">
		<h3 class="panel-title"><label>闯关管理</label></h3>		
	</div>
  	<div class="panel-body">
		<form class="form-inline" style="margin-bottom: 10px;">
			<select class="form-control" placeholder="搜索项目名称" 
				select-id="<?php if (!empty($_POST['project'])){?><?php echo $_POST['project'];?>
<?php }?>">
					<option>搜索项目名称</option>
					<?php  $_smarty_tpl->tpl_vars['projectclass'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['projectclass']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['class']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['projectclass']->key => $_smarty_tpl->tpl_vars['projectclass']->value){
$_smarty_tpl->tpl_vars['projectclass']->_loop = true;
?>
						<option data-pname="<?php echo $_smarty_tpl->tpl_vars['projectclass']->value['pname'];?>
"><?php echo $_smarty_tpl->tpl_vars['projectclass']->value['pname'];?>
</option>
					<?php } ?>
			</select>
		    <input type="text" class="form-control" id="title" placeholder="搜索关卡标题"
		    	value="<?php if (!empty($_POST['title'])){?><?php echo $_POST['title'];?>
<?php }?>">
			<button type="button" class="btn btn-info btn-sm paddingLR" id="search">
				<span class="glyphicon glyphicon-search" aria-hidden="true"></span> 搜索
			</button>
			<button type="button" class="btn btn-info btn-sm paddingLR" id="reset">
				<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> 重置
			</button>
			<button id="Chapteradd" url="/yuanku/chuangManager-Chapteradd.html" type="button" class="btn btn-danger btn-sm paddingLR">
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
					<th width="8%">项目名称</th>
					<th width="27%">关卡标题</th>
					<th width="5%">难度系数</th>
					<th width="5%">需要分值</th>
					<th width="5%">获得分值</th>
					<th width="10%">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['ch'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ch']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ch']->key => $_smarty_tpl->tpl_vars['ch']->value){
$_smarty_tpl->tpl_vars['ch']->_loop = true;
?>
					<tr>
					<td><input type="checkbox" name="" id="" value="<?php echo $_smarty_tpl->tpl_vars['ch']->value['cid'];?>
"/></td>
					<td><?php echo $_smarty_tpl->tpl_vars['ch']->value['pname'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['ch']->value['title'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['ch']->value['difficult'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['ch']->value['score'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['ch']->value['addscore'];?>
</td>
					<td>
						<span class="details glyphicon glyphicon-pencil mouse" 
								url="chuangManager-Chapteradd.html"
								data-id="<?php echo $_smarty_tpl->tpl_vars['ch']->value['cid'];?>
"></span>
							<span class="glyphicon glyphicon-trash mouse delnews" data-id="<?php echo $_smarty_tpl->tpl_vars['ch']->value['cid'];?>
"></span>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>				 		
  	</div>
  	
  	<!--底部分页-->
	<div class="panel-footer" style="background: white;">
		<?php echo $_smarty_tpl->getSubTemplate ("admin/pages.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('url'=>"/yuanku/chuangManager-showChapter.html"), 0);?>

	</div>  	
</div>
<?php }} ?>