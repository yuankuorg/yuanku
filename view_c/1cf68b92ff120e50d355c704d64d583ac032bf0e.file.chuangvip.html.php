<?php /* Smarty version Smarty-3.1.12, created on 2016-01-31 07:25:44
         compiled from "D:\Program Files\apatch\wamp\www\yuanku\view\study\chuangvip.html" */ ?>
<?php /*%%SmartyHeaderCode:612456adb6f86ba009-94294156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cf68b92ff120e50d355c704d64d583ac032bf0e' => 
    array (
      0 => 'D:\\Program Files\\apatch\\wamp\\www\\yuanku\\view\\study\\chuangvip.html',
      1 => 1454225138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '612456adb6f86ba009-94294156',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'projectclass' => 0,
    'cv' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56adb6f88bc927_03606869',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56adb6f88bc927_03606869')) {function content_56adb6f88bc927_03606869($_smarty_tpl) {?><script type="text/javascript">
	$(function() {
		//点击搜索按钮
		$("#search").click(function() {
			var state = $("select option:checked").attr("data-cvid");
			var pname = $("select option:checked").attr("data-pname");
			$.ajax({
				type: "post",
				url: "/yuanku/chuangManager-showChuangvip.html",
				data: {
					"pname": pname,
					"state": state,
					"title": $("#title").val(),
					"name": $("#name").val()
				},
				success: function(text) {
					$(".main").fadeOut(function() {
						$(this).html(text);
						$(this).fadeIn();
					});
				},
				async: true
			});
		});
		
		//点击搜索后让下拉框的选中值为之前的
		var selectid = $("select").attr("select-id");
		$("select option").each(function() {
			if ($(this).attr("data-cvid") == selectid) {
				$(this).attr("selected", "selected");
			}
			if ($(this).attr("data-pname") == selectid) {
				$(this).attr("selected", "selected");
			}
		});
		
		//点击重置按钮,先清空输入框的值，再刷新页面
		$("#reset").click(function() {
			$(".panel-body input").each(function() {
				$(this).val("");
			});
			$.ajax({
				type: "post",
				url: "/yuanku/chuangManager-showChuangvip.html",
				success: function(text) {
					$(".main").fadeOut(function() {
						$(this).html(text);
						$(this).fadeIn();
					});
				},
				async: true
			});
		});
		
		//点击通关按钮，通关状态显示通关成功
		$("#pass").click(function() {
			var vid = $(this).attr("data-id");
			var cid = $(this).attr("data-cid");
			$.ajax({
				type: "post",
				url: "/yuanku/ChuangManager-passChapter.html",
				data: {
					"vid": vid,
					"cid": cid
				},
				success: function(text) {
					if (text == "false") {
						alert("操作失败！");
					} else {
						$(".main").fadeOut(function() {
							$(this).html(text);
							$(this).fadeIn();
						});
					}
				},
				async: true
			});
		});
		//点击失败按钮，通关状态显示通关失败
		$("#nopass").click(function() {
			console.log("abc");
			var vid = $(this).attr("data-id");
			var cid = $(this).attr("data-cid");
			$.ajax({
				type: "post",
				url: "/yuanku/chuangManager-nopassChapter.html",
				data: {
					"vid": vid,
					"cid": cid
				},
				success: function(text) {
					if (text == "false") {
						alert("操作失败！");
					} else {
						$(".main").fadeOut(function() {
							$(this).html(text);
							$(this).fadeIn();
						});
					}
				},
				async: true
			});
		});
	});
</script>
<div class="panel panel-primary margin-base">
	<div class="panel-heading">
		<h3 class="panel-title"><label>会员闯关状态管理</label></h3>
	</div>
	<div class="panel-body">
		<div class="form-inline" style="margin-bottom: 10px;">
			<select class="form-control" placeholder="搜索闯关科目" select-id="<?php if (!empty($_POST['pname'])){?><?php echo $_POST['panme'];?>
<?php }?>">
				<option>搜索闯关科目</option>
				<?php  $_smarty_tpl->tpl_vars['projectclass'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['projectclass']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['projectclass']->key => $_smarty_tpl->tpl_vars['projectclass']->value){
$_smarty_tpl->tpl_vars['projectclass']->_loop = true;
?>
					<option data-pname="<?php echo $_smarty_tpl->tpl_vars['projectclass']->value['pname'];?>
">
						<?php echo $_smarty_tpl->tpl_vars['projectclass']->value['pname'];?>

					</option>
				<?php } ?>
			</select>
			<select class="form-control" placeholder="搜索闯关状态" select-id="<?php if (!empty($_POST['state'])){?><?php echo $_POST['state'];?>
<?php }?>">
				<option>搜索闯关状态</option>
			</select>
			<input type="text" class="form-control" id="name" placeholder="搜索会员姓名" value="<?php if (!empty($_POST['name'])){?><?php echo $_POST['name'];?>
<?php }?>">
			<input type="text" class="form-control" id="title" placeholder="搜索关卡标题" value="<?php if (!empty($_POST['title'])){?><?php echo $_POST['title'];?>
<?php }?>">
			<button type="button" class="btn btn-info btn-sm paddingLR" id="search">
				<span class="glyphicon glyphicon-search" aria-hidden="true"></span> 搜索
			</button>
			<button type="button" class="btn btn-info btn-sm paddingLR" id="reset">
				<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> 重置
			</button>
		</div>
		<div class="line-base"></div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th width="3%">
						<input type="checkbox" id="all" />
					</th>
					<th width="15%">会员姓名</th>
					<th width="10%">项目名称</th>
					<th width="17%">正在通关的标题</th>
					<th width="10%">通关状态</th>
					<th width="10%">总积分</th>
					<th width="15%">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['cv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cv']->key => $_smarty_tpl->tpl_vars['cv']->value){
$_smarty_tpl->tpl_vars['cv']->_loop = true;
?>
					<tr>
						<td>
							<input type="checkbox" name="" id="" value="" />
						</td>
						<td>
							<?php echo $_smarty_tpl->tpl_vars['cv']->value['name'];?>

						</td>
						<td>
							<?php echo $_smarty_tpl->tpl_vars['cv']->value['pname'];?>

						</td>
						<td>
							<?php echo $_smarty_tpl->tpl_vars['cv']->value['title'];?>

						</td>
						<td>
							<?php if ($_smarty_tpl->tpl_vars['cv']->value['sid']==1){?>
								正在闯关
							<?php }elseif($_smarty_tpl->tpl_vars['cv']->value['sid']==2){?>
								申请通关
							<?php }elseif($_smarty_tpl->tpl_vars['cv']->value['sid']==3){?>
								闯关失败
							<?php }elseif($_smarty_tpl->tpl_vars['cv']->value['sid']==4){?>
								闯关成功
							<?php }?>
						</td>
						<td>
							<?php echo $_smarty_tpl->tpl_vars['cv']->value['exchange'];?>

						</td>
						<td>
							<?php if ($_smarty_tpl->tpl_vars['cv']->value['sid']==2||$_smarty_tpl->tpl_vars['cv']->value['sid']==3){?></abbr>
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-info btn-sm paddingLR" id="pass" data-id="<?php echo $_smarty_tpl->tpl_vars['cv']->value['vid'];?>
" data-cid="<?php echo $_smarty_tpl->tpl_vars['cv']->value['cid'];?>
">
									 通过
								</button>
							</div>
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-info btn-sm paddingLR" id="nopass" data-id="<?php echo $_smarty_tpl->tpl_vars['cv']->value['vid'];?>
" data-cid="<?php echo $_smarty_tpl->tpl_vars['cv']->value['cid'];?>
">
									失败
								</button>
							</div>
							<?php }?>
						</td>
					</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>

	<!--底部分页-->
	<div class="panel-footer" style="background: white;">
		<?php echo $_smarty_tpl->getSubTemplate ("admin/pages.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('url'=>"/yuanku/chuangManager-showChuangvip.html"), 0);?>

	</div>
</div><?php }} ?>