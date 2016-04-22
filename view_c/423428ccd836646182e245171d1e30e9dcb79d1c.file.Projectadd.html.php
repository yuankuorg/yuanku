<?php /* Smarty version Smarty-3.1.12, created on 2016-01-31 07:17:02
         compiled from "D:\Program Files\apatch\wamp\www\yuanku\view\study\Projectadd.html" */ ?>
<?php /*%%SmartyHeaderCode:1894556adb4ee174c88-59212707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '423428ccd836646182e245171d1e30e9dcb79d1c' => 
    array (
      0 => 'D:\\Program Files\\apatch\\wamp\\www\\yuanku\\view\\study\\Projectadd.html',
      1 => 1453875918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1894556adb4ee174c88-59212707',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56adb4ee3f5734_17767519',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56adb4ee3f5734_17767519')) {function content_56adb4ee3f5734_17767519($_smarty_tpl) {?><script type="text/javascript">
	var editor; //图片的上传
	$(function() {
		editor = KindEditor.editor({
			allowFileManager: true,
			filterMode: false
		});
		$('#fileup').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					imageUrl: $('#imgurl').val(),
					clickFn: function(url, title, width, height, border, align) {
						$('#imgurl').val(url);
						editor.hideDialog();
						$("#img").attr({
							src: url,
							alt: "Poster"
						});
					}
				});
			});
		});
		//返回按钮
		$("#goback").click(function() {
				redriect($(this).attr("url"));
			})
			//	点击新增按钮或是更新按钮
		var pid = $("input[name=data-id]").val();
		$("#submit button").click(function() {
			if (pid) {
				//修改页面的跳转
				$.ajax({
					type:"post",
					url:"/yuanku/chuangManager-updateProject.html",
					data:{
						"pid":$("#data-id").val(),
						"pname":$("#pname").val(),
						"brief":$("#brief").val(),
						"poster":$("#imgurl").val()
					},
					dataType:"json",
					success:function( obj ){
						if(obj.code==1){//修改成功
							alert(obj.message);			
							redriect("/yuanku/chuangManager-initChapter.html");
						}else if(obj.code==0){//修改失败
							alert(obj.message);						
						}
					},
					async:true
				});
			} else {
				//增加跳转
				$.ajax({
					type: "post",
					url: "/yuanku/chuangManager-doaddProjec.html",
					data: {
						"pname": $("#pname").val(),
						"brief": $("#brief").val(),
						"imgurl": $("#imgurl").val()
					},
					success: function(text) {
						if (text == "true") {
							alert("项目增加成功！");
						} else if (text == "false") {
							alert("项目增加失败！");
						}
						redriect("/yuanku/chuangManager-initChapter.html");
					},
					async: true
				});
			}
		});
	})
</script>
<div class="panel panel-primary margin-base">
	<div class="panel-heading">
		<h3 class="panel-title"><label>项目添加</label>
			<span id="goback" url="/yuanku/chuangManager-initChapter.html" class="pull-right glyphicon glyphicon-circle-arrow-left" aria-hidden="true"style="cursor: pointer;"></span>
		</h3>

	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-6">
				<form class="form-horizontal">
					<div class="form-group">
						<label for="pname" class="col-lg-3 control-label">项目名称</label>
						<div class="col-lg-8">
							<input type="hidden" name="data-id" id="data-id" value="<?php if (!empty($_smarty_tpl->tpl_vars['data']->value)){?><?php echo $_smarty_tpl->tpl_vars['data']->value['pid'];?>
<?php }?>" />
							<input type="text" class="form-control" id="pname" name="pname" placeholder="项目名称" value="<?php if (!empty($_smarty_tpl->tpl_vars['data']->value)){?><?php echo $_smarty_tpl->tpl_vars['data']->value['pname'];?>
<?php }?>">
						</div>
						<div class="col-lg-5"></div>
					</div>
					<div class="form-group">
						<label for="brief" class="col-lg-3 control-label">项目简介</label>
						<div class="col-lg-8">
							<textarea name="" rows="8" cols="5" id="brief" class="form-control" value=""><?php if (!empty($_smarty_tpl->tpl_vars['data']->value)){?><?php echo $_smarty_tpl->tpl_vars['data']->value['brief'];?>
<?php }?></textarea>
						</div>
						<div class="col-lg-5"></div>
					</div>

					<div class="form-group">
						<label for="fileup" class="col-lg-3 control-label">项目海报</label>
						<div class="col-lg-8">
							<input type="button" id="fileup" value="选择图片" />
							<input type="text" id="imgurl" placeholder="选择图片" readonly="readonly" value="<?php if (!empty($_smarty_tpl->tpl_vars['data']->value)){?><?php echo $_smarty_tpl->tpl_vars['data']->value['poster'];?>
<?php }?>" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-5 col-sm-10" id="submit">
							<button type="button" class="btn btn-primary col-lg-2">
								<?php if (empty($_smarty_tpl->tpl_vars['data']->value)){?>
									新增
									<?php }else{ ?>
										更新
										<?php }?>
							</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-6">
				<!--<img src="/yuanku/img/touxiang.jpg" id="img" width=/>-->
				<img src="<?php if (!empty($_smarty_tpl->tpl_vars['data']->value)){?><?php echo $_smarty_tpl->tpl_vars['data']->value['poster'];?>
<?php }?>" height="210px" width="430px" id="img" />
			</div>
		</div>
	</div>
</div><?php }} ?>