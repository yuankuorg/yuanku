<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 08:55:56
         compiled from "G:\wamp\www\yuanku\view\admin\updatepwd.html" */ ?>
<?php /*%%SmartyHeaderCode:1589656a5e31c5ca4c6-50554351%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ecffd825b3ca397db7172e8214ac27d620ecee3' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\admin\\updatepwd.html',
      1 => 1453536461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1589656a5e31c5ca4c6-50554351',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a5e31c700b16_60758721',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a5e31c700b16_60758721')) {function content_56a5e31c700b16_60758721($_smarty_tpl) {?><script type="text/javascript">
	//修改管理员密码
	$(function(){
		$("#button button").click(function(){
			var id=$("input[name=data-id]").val();
			var newpwd=$("#newpwd").val();
			var newpwded=$("#newpwded").val();
			if(newpwd!=newpwded){
				$('#myModal').modal({
					backdrop : true,
					keyboard : true,
					show     : true,
					remote	 : '/yuanku/admin-updateInfo.html'
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
							url:"/yuanku/admin-pwdadmin.html",
							data:{"id":id,"pwd":$("input[name=pwd]").val(),"newpwd":newpwd,"newpwded":newpwded},
							dataType:"json",
							success: function(obj){
								if(obj.code==1){
									$("#modalok").attr("data-sub","false");
									window.location="/yuanku/view/admin/login.html";
								}else if(obj.code==0){
									$('#myModal').modal({
										backdrop : true,
										keyboard : true,
										show     : true,
										remote	 : '/yuanku/admin-showflase.html'
									});
									$("#modalok").attr("data-sub","false");
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
</script>
<div class="panel panel-primary margin-base">
  <div class="panel-heading">修改密码</div>
  <form class="form-horizontal margin-base" role="form">
   	<div class="form-group">
   			<input type="hidden" name="data-id" id="data-id" value="<?php echo $_SESSION['admin']['id'];?>
" />
      	<label for="firstname" class="col-sm-2 control-label">账号:</label>
      	<div class="col-sm-3" style="margin-top:7px; padding-left:27px;">
      		<?php echo $_SESSION['admin']['code'];?>

      	</div>
   	</div>
   	<div class="form-group">
      	<label for="lastname" class="col-sm-2 control-label">旧密码:</label>
      	<div class="col-sm-3">
         	<input type="text" class="form-control" id="lastname" name="pwd" 
            placeholder="" value="">
      	</div>
   	</div>
   	<div class="form-group">
      	<label for="lastname" class="col-sm-2 control-label">新密码:</label>
      	<div class="col-sm-3">
         	<input type="text" class="form-control" id="newpwd" name="newpwd" 
            placeholder="" value="">
      	</div>
   	</div>
   	<div class="form-group">
      	<label for="lastname" class="col-sm-2 control-label">确认密码:</label>
      	<div class="col-sm-3">
         	<input type="text" class="form-control" id="newpwded" name="newpwded" 
            placeholder="" value="">
      	</div>
   	</div>
   	<div class="form-group">
      	<div class="col-sm-offset-2 col-sm-10" id="button">
         	<button type="button" class="btn btn-default">修改</button>
      	</div>
   	</div>
</form>
</div>
<?php }} ?>