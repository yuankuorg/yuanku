<?php /* Smarty version Smarty-3.1.12, created on 2016-01-28 09:21:26
         compiled from "E:\wamp\www\yuanku\view\study\cxtresume.html" */ ?>
<?php /*%%SmartyHeaderCode:2872156a8887645f255-58019580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cad9de417c533bb9759844d22290df6f8a54cf1b' => 
    array (
      0 => 'E:\\wamp\\www\\yuanku\\view\\study\\cxtresume.html',
      1 => 1453972784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2872156a8887645f255-58019580',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a888764a0718_80718775',
  'variables' => 
  array (
    'resume' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a888764a0718_80718775')) {function content_56a888764a0718_80718775($_smarty_tpl) {?><!--添加我的简历-->
<div class="page">
	<script type="text/javascript">
		$(function(){
			$(".cxtresume input").each(function(){
				$(this).attr("readonly","readonly");
			});
			$(".cxtresume textarea").each(function(){
				$(this).attr("readonly","readonly");
			});
			$(".cxtresume .weui_cells_title span").tap(function(){
				if( $(this).attr("data") == "1" ){
					$(".cxtresume input").each(function(){
						$(this).removeAttr("readonly");
					});
					$(".cxtresume textarea").each(function(){
						$(this).removeAttr("readonly");
					});
					$(this).html("保存");
					$(this).css("background-color","green");
					$(this).attr("data","2");
				}else{
					if( check() ){
						var data = {"vid":$("#resvid").val(),"name":$("#rename").val(),"sex":$("#resex").val(),"heighedu":$("#reheighedu").val(),
							"workexp":$("#reworkexp").val(),"city":$("#recity").val(),"mobile":$("#remobile").val(),
							"email":$("#reemail").val()," targetjob":$("#retargetjob").val(),"companyname":$("#recompanyname").val(),
							"position":$("#yourposition").val(),"entrytime":$("#entrytime").val(),"leavetime":$("#leavetime").val(),
							"workcontent":$("#workcontent").val(),"schoolname":$("#sname").val(),"specialty":$("#specialty").val(),
							"graduation":$("#gra").val(),"projectname":$("#projectname").val(),"responsibility":$("#responsibility").val(),
							"starttime":$("#statime").val(),"endtime":$("#entime").val(),"projectinfo":$("#projectinfo").val(),
							"skill":$("#skill").val(),"myselfinfo":$("#myselfinfo").val()};	
						$.ajax({
							type:"post",
							url:"cxt-doaddresume.html",
							data: data,
							success: function( text ){
								if( text == false){
									alert("添加失败");
								}else{
									$(".cxtresume .weui_cells_title span").html("修改");
									$(".cxtresume .weui_cells_title span").css("background-color","red");
									$(".cxtresume .weui_cells_title span").attr("data","1");
									$(".cxtresume input").each(function(){
										$(this).attr("readonly","readonly");
									});
									$(".cxtresume textarea").each(function(){
										$(this).attr("readonly","readonly");
									});
														
								}
							},
							async:true
						});
					}else{
						alert("请检查，数据不能为空");
					}
				}
			});
			function check(){
				var flag = true;
				$("input").not($("#resvid")).each(function(){
					if( $(this).val() == "" || $(this).val().length == 0 ){
						flag = false;
						return;
					}
				});
				$("textarea").each(function(){
					if( $(this).val() == "" || $(this).val().length == 0 ){
						flag = false;
						return;
					}
				});
				return flag;
			}
		});
	</script>
	<div class="bd">
		<div class="weui_cells_title">个人信息<span data="1">修改</span></div>
        <div class="weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>姓名</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="rename" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['name'];?>
<?php }?>"/>
                    <input type="hidden" name="resvid" id="resvid" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['vid'];?>
<?php }?>" />
                </div>
            </div>
        </div>
        <div class="weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>性别</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="resex" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['sex'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>最高学历</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="reheighedu" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['heighedu'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>工作年限</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="reworkexp" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['workexp'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>所在城市</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="recity" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['city'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>联系电话</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="remobile" type="tel" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['mobile'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>联系邮箱</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="reemail" type="email" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>期望工作</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="retargetjob" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['targetjob'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells_title">工作经历</div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>公司名称</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="recompanyname" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['companyname'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>你的职位</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="yourposition" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['position'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>入职时间</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="entrytime" type="date" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['entrytime'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>离职时间</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="leavetime" type="date" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['leavetime'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>工作内容</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="workcontent" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['workcontent'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells_title">教育经历</div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>学校名称</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="sname" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['schoolname'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>所学专业</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="specialty" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['specialty'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>毕业年份</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="gra" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['graduation'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells_title">项目经历</div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>项目名称</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="projectname" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['projectname'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>你的职责</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="responsibility" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['responsibility'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>项目开始时间</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="statime" type="date" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['starttime'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label>项目结束时间</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" id="entime" type="date" value="<?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['endtime'];?>
<?php }?>"/>
                </div>
            </div>
        </div>
        <div class="weui_cells_title">项目描述</div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <textarea name="" id="projectinfo" rows="" cols=""><?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['projectinfo'];?>
<?php }?></textarea>
            </div>
        </div>
        <div class="weui_cells_title">技能评价</div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
            	<textarea name="" id="skill" rows="" cols=""><?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['skill'];?>
<?php }?></textarea>
            </div>
        </div>
        <div class="weui_cells_title">自我描述</div>
        <div class="weui_cells weui_cells">
            <div class="weui_cell">
                <textarea name="" id="myselfinfo" rows="" cols=""><?php if (isset($_smarty_tpl->tpl_vars['resume']->value)){?><?php echo $_smarty_tpl->tpl_vars['resume']->value['myselfinfo'];?>
<?php }?></textarea>
            </div>
        </div>
	</div>
	<div class="weui_cell_ft" style="height: 10px;"></div>
</div><?php }} ?>