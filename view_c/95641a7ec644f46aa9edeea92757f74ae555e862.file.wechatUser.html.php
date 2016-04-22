<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 09:00:42
         compiled from "G:\wamp\www\yuanku\view\wechat\wechatUser.html" */ ?>
<?php /*%%SmartyHeaderCode:3234256a5e43a91fe73-10233657%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95641a7ec644f46aa9edeea92757f74ae555e862' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\wechat\\wechatUser.html',
      1 => 1453536462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3234256a5e43a91fe73-10233657',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'res' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a5e43aaa2e19_13675417',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a5e43aaa2e19_13675417')) {function content_56a5e43aaa2e19_13675417($_smarty_tpl) {?><script type="text/javascript">
	$(function(){
		//搜索
		$("#search").click(function(){
			$.ajax({
				type:"post",
				url: "/yuanku/wechatUser-wechatUser.html",
				data:{ "wenum" : $("#wenum").val() , "remarknum" : $("#remarknum").val() , "sexs" : $("#sexs").val() },
				success:function(text){
					$(".main").fadeOut(function(){
						$(this).html(text);
						$(this).fadeIn();	
					});	
				},
				async:true
			});
		});
		
		//清除
		$("#clear").click(function(){
			redriect( $(this).attr("url") );
		});
	});
</script>
<div class="panel panel-primary margin-base" id="table">
	<div class="panel-heading" id="panel-heading"><h3 class="panel-title manuser"><label>用户管理</label></h3></div>
	<div class="panel-body">
		<p>
			<form class="form-inline">
				<div class="form-group">
				  	<label for="exampleInputName2"></label>
				    <input type="text" class="form-control" id="wenum" placeholder="微信名" value="<?php if (!empty($_POST['wenum'])){?><?php echo $_POST['wenum'];?>
<?php }?>">
				</div>
				<div class="form-group">
				  	<label for="exampleInputName3"></label>
				    <input type="text" class="form-control" id="remarknum" placeholder="备注名" value="<?php if (!empty($_POST['remarknum'])){?><?php echo $_POST['remarknum'];?>
<?php }?>">
				</div>
				<div class="form-group">
				  	<label for="exampleInputName3"></label>
				    <input type="text" class="form-control" id="sexs" placeholder="性别" value="<?php if (!empty($_POST['sexs'])){?><?php echo $_POST['sexs'];?>
<?php }?>">
				</div>
				<button type="button" class="btn btn-primary" id="search">
					<span class="glyphicon glyphicon-search"></span>搜索
				</button>
				<button type="button" class="btn btn-warning" id="clear" url="/yuanku/wechatUser-wechatUser.html">
					<span class="glyphicon glyphicon-refresh"></span>重置
				</button>
				<button id="add" url="/yuanku/vip-vipDetails.html" type="button" class="btn btn-info btn-ms paddingLR">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加
				</button>
	 		</form>
		</p>
		<div class="line-base"></div>
		<table class="table table-striped table-hover" style="border: 1px solid #ccc; border-right: none; font-size: 16px;">
			<thead>
				<tr>
					<th><label>编号</label></th>
					<th><label>头像</label></th>
					<th><label>昵称</label></th>
					<th><label>性别</label></th>
					<th><label>备注</label></th>
					<th><label>操作</label></th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['res']->value['uid'];?>
</td>
						<td><img src="<?php echo $_smarty_tpl->tpl_vars['res']->value['headimg'];?>
" alt="加载失败" class="img-rounded" width="50"></td>
						<td><?php echo $_smarty_tpl->tpl_vars['res']->value['uname'];?>
</td>
						<td><?php if ($_smarty_tpl->tpl_vars['res']->value['sex']==1){?>男<?php }else{ ?>女<?php }?></td>
						<td name="remark"><?php echo $_smarty_tpl->tpl_vars['res']->value['remark'];?>
</td>
						<td>
							<button class="btn btn-default charge" data-openid = "<?php echo $_smarty_tpl->tpl_vars['res']->value['openId'];?>
">
								更新
							</button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		
		<div class="panel-footer" style="border: none;">
			<?php echo $_smarty_tpl->getSubTemplate ("admin/pages.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('url'=>"/yuanku/wechatUser-wechatUser.html"), 0);?>

		</div>
	</div>
</div><?php }} ?>