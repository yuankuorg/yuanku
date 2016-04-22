<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 08:56:04
         compiled from "G:\wamp\www\yuanku\view\admin\vipMana.html" */ ?>
<?php /*%%SmartyHeaderCode:2878556a5e32441dfd8-56423984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9bcdd167fe3a9adacd4ce1c27ba6e1ce1519fd18' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\admin\\vipMana.html',
      1 => 1453711969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2878556a5e32441dfd8-56423984',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'status' => 0,
    'items' => 0,
    'vip' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a5e3246df672_78501317',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a5e3246df672_78501317')) {function content_56a5e3246df672_78501317($_smarty_tpl) {?><script type="text/javascript">
	$(function(){
		$("#add").click(function(){
			redriect($(this).attr("url"));
		});
		$("#f5").click(function(){
			redriect($(this).attr("url"));
		});
		//编辑
		$(".compile").click(function(){
			$.ajax({
				type:"post",
				url:"/yuanku/vip-vipCompile.html",
				data:{"vid":$(this).attr("vip_id")},
				success:function(text){
					$(".main").fadeOut(function(){
						$(this).html(text);
						$(this).fadeIn();
						$(".header h3 label").html("会员详情");
						$(".sub").html("修改");
					});
				},
				async:true
			});
		});
		//删除
		$(".del").click(function(){
			var thisVip=$(this);
			var name=$(this).parents('tr').find("input[name=vname]").attr('data');
			var status=$(this).parents('tr').find("input[name=sname]").attr('data');
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
						url:"/yuanku/vip-vipDel.html",
						data:{"vid":thisVip.attr("vip_id")},
						success: function(text){
							$("#modalok").attr("data-sub","false");
							if(text==false){
								$('#myModal').modal({
									backdrop : true,
									keyboard : true,
									show     : true,
									remote	 : '/yuanku/admin-showflase.html'
								});
							}else{
								redriect("/yuanku/adminindex-vipMana.html");
							}						
						}
					});
				}else{
					$('#delModal').modal("hide");
				}
			});
		});
		//搜索
		$("#seek").click(function(){
			var status = $("#status").find("option:selected").attr("value");
			var items = $("#items").find("option:selected").attr("value");
			var date_start = $("input[name=date_start]").val();
			var date_end = $("input[name=date_end]").val();
			$.ajax({
				type:"post",
				url:"/yuanku/vip-vipSeek.html",
				data:{"mobile":$("input[name=seek_mobile]").val(),"name":$("input[name=seek_name]").val(),"status":status,"date_start":date_start,"date_end":date_end},
				success:function(text){
					$(".main").html(text);
				},
				async:true
			});
		})
		//批量删除
		$("#delSome").click(function(){
			//获取批量删除行数据
			var delarr = new Array();
			$("table tbody tr").each(function(){
				if($(this).find("input[name=delVip]:checked").length != 0){
					var delobj = {};
					$(this).find("td").each(function(){
						if($(this).attr("name") == "vname" || $(this).attr("name") =="sname"){
							var name = $(this).attr("name");
							var val = $(this).attr("data");
							if(val!=''){
								delobj[name]=val;
								return delobj
							}
						}
					})
				}
				delarr.push(delobj);
			});
			var ids = [];
			$("input[name=delVip]:checked").each(function(){
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
							url:"/yuanku/vip-delSomeVip.html",
							data:{"ids":ids,"delarr":delarr},//
							success: function(text){
								
								if(text==false){
									$("#modalok").attr("data-sub","false");
									$('#myModal').modal({
										backdrop : true,
										keyboard : true,
										show     : true,
										remote	 : '/yuanku/admin-showflase.html'
									});
								}else{
									$("#modalok").attr("data-sub","false");
									redriect("/yuanku/adminindex-vipMana.html");
								}						
							}
						});
					}else{
						$('#delModal').modal("hide");
					}
				});
			}
			
		});
		//状态下拉框搜索后选中
		<?php if (!empty($_POST['status'])){?>
			$("#status").find("option").each(function(){
				var num = $(this).attr("value");
				if(num == <?php echo $_POST['status'];?>
){
					$(this).attr("selected","true");
				}
			})
		<?php }?>
	});
</script>
<div class="panel panel-primary margin-base " id="vipMana">
	<div class="panel-heading">
    	<h3 class="panel-title"><label>学员管理</label>
    		<span class="pull-right mouse mouse" href="/yuanku/vip-logstatus.html" data-toggle="modal" data-target="#myModal">
    			<span class="glyphicon glyphicon-eye-open " aria-hidden="true"></span>
				<span>状态修改记录</span>
			</span>
    		<span class="pull-right mouse mouse" href="/yuanku/vip-modalVip.html" data-toggle="modal" data-target="#myModal">
    			<span class="glyphicon glyphicon glyphicon-cog " aria-hidden="true"></span>
				<span>状态/项目</span>
			</span>
    	</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4">
					<form class="form-group">
						<div class="col-lg-6">
							<input name="seek_mobile" type="text" class="form-control" placeholder="手机号" value="<?php if (!empty($_POST['mobile'])){?><?php echo $_POST['mobile'];?>
<?php }?>">
						</div>
						<div class="col-lg-6">
							<input name="seek_name" type="text" class="form-control" placeholder="姓名" value="<?php if (!empty($_POST['name'])){?><?php echo $_POST['name'];?>
<?php }?>">
						</div>
					</form>
				</div>
				<div class="col-lg-8">
					<form class="form-inline">
						<select id="status" class="form-control">
							<option value="0">状态选择</option>
							<?php  $_smarty_tpl->tpl_vars['status'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['status']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['status']->key => $_smarty_tpl->tpl_vars['status']->value){
$_smarty_tpl->tpl_vars['status']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['status']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['status']->value['name'];?>
</option>
							<?php } ?>
						</select>
						<select id="items" class="form-control">
							<option value="0">项目选择</option>
							<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</option>
							<?php } ?>
						</select>
							
						<input name="date_start" type="date" class="form-control" placeholder="kaishi" value="<?php if (!empty($_POST['date_start'])){?><?php echo $_POST['date_start'];?>
<?php }?>" >
						---
						<input name="date_end" type="date" class="form-control" placeholder="jieshu" value="<?php if (!empty($_POST['date_end'])){?><?php echo $_POST['date_end'];?>
<?php }?>">
						<div class="form-group">
							<button id="seek" type="button" class="btn btn-primary btn-ms paddingLR"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> 搜索</button>
							<button id="add" url="/yuanku/vip-vipDetails.html" type="button" class="btn btn-info btn-ms paddingLR"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 添加</button>
							<button id="f5" url="/yuanku/adminIndex-vipMana.html" type="button" class="btn btn-warning btn-ms paddingLR"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> 重置</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		
		<div class="line-base"></div>
	</div>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<td>选择</td>
				<td>手机</td>
				<td>微信</td>
				<td>姓名</td>
				<td>会员角色</td>
				<td>状态</span></td>
				<td>性别</td>
				<td>户籍</td>
				<td>报名日期</td>
				<td>最后一次修改</td>
				<td>操作</td>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['vip'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vip']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vip']->key => $_smarty_tpl->tpl_vars['vip']->value){
$_smarty_tpl->tpl_vars['vip']->_loop = true;
?>
				<tr>
					<td><input type="checkbox" name="delVip" id="" value="<?php echo $_smarty_tpl->tpl_vars['vip']->value['id'];?>
" /></td>
					<td><?php echo $_smarty_tpl->tpl_vars['vip']->value['mobile'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['vip']->value['weixin'];?>
</td>
					<td name="vname" data = "<?php echo $_smarty_tpl->tpl_vars['vip']->value['vname'];?>
"><?php echo $_smarty_tpl->tpl_vars['vip']->value['vname'];?>
</td>
					<input type="hidden" name="vname" data = "<?php echo $_smarty_tpl->tpl_vars['vip']->value['vname'];?>
"/>
					<td><?php echo $_smarty_tpl->tpl_vars['vip']->value['iname'];?>
</td>
					<td name="sname" data = "<?php echo $_smarty_tpl->tpl_vars['vip']->value['statusid'];?>
"><?php echo $_smarty_tpl->tpl_vars['vip']->value['sname'];?>
</td>
					<input type="hidden" name="sname" data = "<?php echo $_smarty_tpl->tpl_vars['vip']->value['statusid'];?>
"/>
					<td><?php echo $_smarty_tpl->tpl_vars['vip']->value['sex'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['vip']->value['domicile'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['vip']->value['joinDate'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['vip']->value['alterDate'];?>
</td>
					<td>
						<span class="compile glyphicon glyphicon-pencil mouse" vip_id="<?php echo $_smarty_tpl->tpl_vars['vip']->value['id'];?>
" ></span>
						<span class="del glyphicon glyphicon-trash mouse"  vip_id="<?php echo $_smarty_tpl->tpl_vars['vip']->value['id'];?>
"></span>
					</td>
				</tr>
			<?php } ?>
		</tbody>
		<td><span id="delSome" class="glyphicon glyphicon-trash mouse"></span></td>
	</table>
	<div class="panel-footer">
		<?php echo $_smarty_tpl->getSubTemplate ("admin/pages.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('url'=>"/yuanku/vip-vipSeek.html"), 0);?>

	</div>
</div><?php }} ?>