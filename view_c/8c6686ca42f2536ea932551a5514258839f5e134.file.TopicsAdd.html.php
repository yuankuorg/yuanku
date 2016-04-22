<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 10:38:11
         compiled from "G:\wamp\www\yuanku\view\admin\TopicsAdd.html" */ ?>
<?php /*%%SmartyHeaderCode:1810156a5fb13338b73-07996804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c6686ca42f2536ea932551a5514258839f5e134' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\admin\\TopicsAdd.html',
      1 => 1453536462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1810156a5fb13338b73-07996804',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'tc' => 0,
    'topicclass' => 0,
    'foo' => 0,
    'newslist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a5fb13628eb2_07870287',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a5fb13628eb2_07870287')) {function content_56a5fb13628eb2_07870287($_smarty_tpl) {?><script type="text/javascript">
	function getSelectedNews(){
		var arr = new Array();
		$("#selectedNews tbody tr").each(function(){			
			var obj = {};
			obj["n_id"] = $(this).find("td[name=n_id]").html();//资讯id
			obj["n_title"] = $(this).find("td[name=n_title]").html();//资讯标题
			obj["n_img"] = $(this).find("td[name=n_img] img").attr("src");//资讯封面
			if( obj.n_id) {
				arr.push(obj);
			}
		});
		
		return arr;
	}
	var editor;
	$(function(){
		var selectid = $("select").attr("select-id");
		$("select option").each(function(){
			if($(this).attr("data-tcid")==selectid){
				$(this).attr("selected","selected");
			}
		});
		
		//创建KindEditor
		editor = KindEditor.create('#newscontent', {
			allowFileManager : true,
			filterMode: false
		});
		
		//点击选择图片的按钮
		$('#fileup').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					imageUrl : $('#imgurl').val(),
					clickFn : function(url, title, width, height, border, align) {
						$('#imgurl').val(url);
						editor.hideDialog();
						$("#img").attr({ src: url, alt: "Test Image" });
					}
				});
			});
		});

		
	//	点击新增按钮或是更新按钮
		$("#submit button").click(function(){
			var flag=true;//这里有好几层循环，要几个return
	//		先验证，再提交
			$(".panel-body input[type=text]").each(function(){
				console.log($(this));
				if($(this).attr("name")=="t_title"){
					var t_title=$(this).val();
					if(t_title.length==0 || t_title.length>50){
						$(this).parent().next().html("话题标题不能为空或超过50字符！");
						flag=false;
						return false;
					}
				}else if($(this).attr("name")=="t_description"){
					var t_description=$(this).val();
					if(t_description.length==0 || t_description.length>100){
						$(this).parent().next().html("话题描述不能为空或超过100字符！");
						flag=false;
						return false;
					}
				}			
			});	
			
			if( !flag ){
				return;
			}
			
			var t_img=$("#imgurl").val();
			if(t_img=="" || t_img.length==0){
				alert("话题封面不能为空！");
				return false;
			}
			
			var t_id=$("input[name=data-id]").val();
			var tc_id=$("option:checked").attr("data-tcid");
			
			var p_nid=$("#selectedNews tbody input[type=radio]:checked").val();
			if( !p_nid ) {
				alert("必须要有首要资讯!");
				return false;
			}
			
			//话题中的资讯修改 josn获取
			var topics_newsnums=new Array();
			$("#selectedNews tbody tr").each(function(){
				if( $(this).find("td[name=n_id]").html() ) {
					var obj = {};
					obj["tn_id"]=$(this).find("input[name=tn_id]").attr("value");
					obj["n_id"]=$(this).find("td[name=n_id]").html();
					topics_newsnums.push(obj);
				}
			});
			
			if( t_id ){//修改
				$.ajax({
					type:"post",
					url:"/yuanku/topics-updateTopic.html",
					data:{"t_id":t_id,"tc_id":tc_id,"tc_name":$("input[name=t_title]").val(),
							"tc_description":$("input[name=t_description]").val(),
							"p_nid":p_nid,"topics_newsnums":topics_newsnums,
							"imgurl":$("#imgurl").val()},
					dataType:"json",
					success:function( obj ){
						if(obj.code==1){//修改成功
							alert(obj.message);			
							redriect("/yuanku/topics-TopicsMana.html");
						}else if(obj.code==0){//修改失败
							alert(obj.message);						
						}
					},
					async:true
				});
			}else{//新增
				$.ajax({
					type:"post",
					url:"/yuanku/topics-doaddTopics.html",
					data:{"t_title":$("input[name=t_title]").val(),
					"t_description":$("input[name=t_description]").val(),
					"tc_id":$("option:checked").attr("data-tcid"),
					"t_img":t_img,
					"topics_newsnums":topics_newsnums,
					"p_nid":p_nid},
					success:function( text ){
						if(text=="true"){
							alert("话题增加成功！");
						}else if(text=="false"){
							alert("话题增加失败！");
						}
						redriect("/yuanku/topics-TopicsMana.html");
					},
					async:true
				});	
			}
		});	
		
		//用于清除提示
		$("#topicclassAdd input[type=text]").focus(function(){
			$(this).parent().next().html("");
		});
		//删除话题中的资讯
		$("#selectedNews tbody tr").each(function(){
			var t_id=$("input[name=data-id]").val();
			var t = $(this);
			
			$(this).find(".del").click(function(){
				if( t_id) {
					var n_id = t.find("td[name=n_id]").html();
					$.ajax({
						type:"post",
						url:"/yuanku/topics-delTopics_News.html",
						data:{"t_id":t_id,"n_id":n_id},
						success:function(text){
							if(text){
								alert("删除成功");
							}else{
								alert("删除失败")
							}
						},
						async:true
					});
				}
				
				t.find("input[name=tn_id]").val("");
				t.find("td[name=n_id]").html("");
				t.find("td[name=n_title]").html("");
				t.find("td[name=n_img] img").attr("src","");
				t.find("input[name=isprimary]").val("").attr("checked",false);
			});
		})
	});	
</script>
<div class="panel panel-primary margin-base">
	<div class="panel-heading">
		<h3 class="panel-title"><label>话题添加</label></h3>		
    </div>
 	<div class="panel-body">
 		<div class="row">
 			<div class="col-lg-8">
				<form class="form-horizontal">
					<div class="form-group">
					    <label for="t_title" class="col-lg-2 control-label">话题名称</label>
					    <div class="col-lg-5">
					    	<input type="hidden" name="data-id" id="data-id" value="<?php if (!empty($_smarty_tpl->tpl_vars['data']->value)){?><?php echo $_smarty_tpl->tpl_vars['data']->value['t_id'];?>
<?php }?>" />
					        <input type="text" class="form-control" id="t_title" name="t_title" 
					        	placeholder="话题名称" 
					        	value="<?php if (!empty($_smarty_tpl->tpl_vars['data']->value)){?><?php echo $_smarty_tpl->tpl_vars['data']->value['t_title'];?>
<?php }?>">
					    </div><div class="col-lg-5"></div>
					</div>
				    <div class="form-group">
				    	<label for="t_description" class="col-lg-2 control-label">话题描述</label>
				    	<div class="col-lg-5">
				      		<input type="text" class="form-control" id="t_description" 
				      			name="t_description" placeholder="话题描述"
				      			value="<?php if (!empty($_smarty_tpl->tpl_vars['data']->value)){?><?php echo $_smarty_tpl->tpl_vars['data']->value['t_description'];?>
<?php }?>">
				    	</div><div class="col-lg-5"></div>
				  	</div>
				  	<div class="form-group">
				    	<label for="topicstype" class="col-lg-2 control-label">话题类别</label>
					    <div class="col-lg-5">
				    		<select class="form-control" select-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['tc_id'];?>
">
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
					    </div>
				  	</div>
					<div class="form-group">
					    <label for="t_img" class="col-lg-2 control-label">话题封面</label>
					    <div class="col-lg-6">
					      <input type="button" id="fileup" value="选择图片" />
					      <input type="text" id="imgurl" placeholder="选择图片" readonly="readonly"
					      	value="<?php if (!empty($_smarty_tpl->tpl_vars['data']->value)){?><?php echo $_smarty_tpl->tpl_vars['data']->value['t_img'];?>
<?php }?>"/>
					    </div>
					</div>
				  	<div class="form-group">
				    	<label for="topicsnews" class="col-lg-2 control-label">话题中的资讯</label>
				    	<div class="col-lg-5">
					    	<div class="col-lg-5">
					      		<button type="button" class="btn btn-default" id="selectNews"
					      			href="/yuanku/topics-newslistModal.html"
					      			data-toggle="modal" data-target="#myModal">选择资讯</button>
					    	</div>
				    	</div>
				  	</div>
				  	<div class="form-group">
				  		<label for="selectnews" class="col-lg-2 control-label">选择的资讯</label>			  		
				  		<div class="table-responsive">
				  			<table class="table table-striped table-bordered table-hover"
				  				id="selectedNews">
				  				<thead>
				  					<th>资讯id</th>
				  					<th>资讯标题</th>
				  					<th>资讯封面</th>
				  					<th>isprimary</th>
				  					<th>删除</th>
				  				</thead>
				  				<tbody>
				  					<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 3+1 - (0) : 0-(3)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 0, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
				  						<?php if (empty($_smarty_tpl->tpl_vars['newslist']->value[$_smarty_tpl->tpl_vars['foo']->value])){?>
					  						<tr>
					  							<input type="hidden" name="tn_id" id="" value="" />
						  						<td name="n_id" id="n_id"></td>
						  						<td name="n_title" id="n_title"></td>
						  						<td name="n_img"><img src="" width="30px" height="30px"/></td>
						  						<td><input type="radio" name="isprimary" value="" <?php if ($_smarty_tpl->tpl_vars['foo']->value==0){?>checked<?php }?> /></td>
						  						<td><span class="del glyphicon glyphicon-trash mouse"></span></td>
					  						</tr>
				  						<?php }else{ ?>
				  							<tr>
					  							<input type="hidden" name="tn_id" id="" value="<?php echo $_smarty_tpl->tpl_vars['newslist']->value[$_smarty_tpl->tpl_vars['foo']->value]['tn_id'];?>
" />
						  						<td name="n_id" id="n_id"><?php echo $_smarty_tpl->tpl_vars['newslist']->value[$_smarty_tpl->tpl_vars['foo']->value]['n_id'];?>
</td>
						  						<td name="n_title" id="n_title"><?php echo $_smarty_tpl->tpl_vars['newslist']->value[$_smarty_tpl->tpl_vars['foo']->value]['n_title'];?>
</td>
						  						<td name="n_img"><img src="<?php echo $_smarty_tpl->tpl_vars['newslist']->value[$_smarty_tpl->tpl_vars['foo']->value]['n_img'];?>
" width="30px" height="30px"/></td>
						  						<td><input type="radio" name="isprimary" <?php if ($_smarty_tpl->tpl_vars['newslist']->value[$_smarty_tpl->tpl_vars['foo']->value]['n_id']==$_smarty_tpl->tpl_vars['data']->value["p_nid"]){?>checked<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['newslist']->value[$_smarty_tpl->tpl_vars['foo']->value]['n_id'];?>
"/></td>
						  						<td><span class="del glyphicon glyphicon-trash mouse"></span></td>
					  						</tr>
				  						<?php }?>
				  					<?php }} ?>
				  				</tbody>
				  			</table>
				  		</div>
				  	</div>
				  	<div class="form-group">
				    	<div class="col-sm-offset-2 col-sm-10" id="submit">
				      		<button type="button" class="btn btn-primary col-lg-2">
								<?php if (empty($_smarty_tpl->tpl_vars['data']->value)){?>
									新增
								<?php }else{ ?>
									更新
								<?php }?>
				      		</button>
				    	</div>
				  	</div>				  	
					<div class="form-group" style="display: none;">
					    <label for="newscontent" class="col-lg-2 control-label">资讯内容</label>
					    <div class="col-lg-5">
					    	<textarea style="width:680px;height:400px;visibility:hidden;" id="newscontent" name="newscontent">
					    		<?php if (!empty($_smarty_tpl->tpl_vars['data']->value)){?><?php echo $_smarty_tpl->tpl_vars['data']->value['n_content'];?>
<?php }?>
					    	</textarea>
					    </div>
					</div>
				</form> 		 				
 			</div>
 			<div class="col-lg-4">
 				<!--<img src="/yuanku/img/touxiang.jpg" id="img" width=/>-->
 				<img src="<?php if (!empty($_smarty_tpl->tpl_vars['data']->value)){?><?php echo $_smarty_tpl->tpl_vars['data']->value['t_img'];?>
<?php }?>" 
 					height="200px" width="200px" id="img"/>
 			</div>
 		</div>
 	</div>
</div><?php }} ?>