<?php /* Smarty version Smarty-3.1.12, created on 2016-01-27 08:18:12
         compiled from "E:\wamp\www\yuanku\view\study\register.html" */ ?>
<?php /*%%SmartyHeaderCode:1286656a87d44111b84-43273205%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36680d44a41cda372aa8222ac04ae5ce001ec745' => 
    array (
      0 => 'E:\\wamp\\www\\yuanku\\view\\study\\register.html',
      1 => 1453882633,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1286656a87d44111b84-43273205',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a87d441516d7_37812814',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a87d441516d7_37812814')) {function content_56a87d441516d7_37812814($_smarty_tpl) {?><div class="page">
<script type="text/javascript">
$(function(){
	$("#showTooltips").click(function(){
		//手机号码不能为空
		var reg = /^[1][3,5,8,9][0-9]{9}$/;
		var name = /^.?$/
		if ( !reg.test($("input[name=mobile]").val() )){
			$("#error").html("请填写正确的手机号码！");
			return;
		}
		if(name.test($("input[name=name]").val() )){
			$("#error").html("请填写姓名！");
			return;
		}
		
		//验证手机号码是否重复
		var flag = false;
		$.ajax({
			type:"post",
			url:"/yuanku/mobile-checkMobile.html",
			data :{"mobile":$("input[name=mobile]").val()},
			success:function(text){
				if(text == "false"){
					$("#error").html("手机号码已被占用!");
				}else{
					flag = true;
				}
			},
			async:false
		});
		
		if( flag ) {
			$.ajax({
				type:"post",
				url:"/yuanku/mobile-joinVip.html",
				data:{"name":$("input[name=name]").val(),"mobile":$("input[name=mobile]").val(),"proj":$(".proj").val()},
				success:function(text){
					if(text == false){
						$("#error").html("提交注册失败,请与管理员联系!");
					}else{
						pageManager.go("registok");
					}
				},
				async:true
			});
		}
	});
	$("input").focus(function(){
		$("#error").html("")
	})
})
</script>
<div class="hd" style="padding: 1em 0;">
	<h3 class="page_title" style="font-size: 24px;">会员注册</h3>
</div>
<div id="error" style="text-align: center;color: red;"></div>
<div class="bd">
	<div class="weui_cells_title">手机号</div>
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label" style="color: red;">*</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="tel" name="mobile" placeholder="请输入手机号"/>
            </div>
        </div>
    </div>
    <div class="weui_cells_title">姓名</div>
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label" style="color: red;">*</label>
            	
            </div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="tel" name="name" placeholder="请输入姓名"/>
            </div>
        </div>
    </div>
    <div class="weui_cells_title">选择项目</div>
    <div class="weui_cells">
        <div class="weui_cell weui_cell_select">
            <div class="weui_cell_bd weui_cell_primary">
                <select class="weui_select proj" name="select1">
                    <option value="7">助学成才</option>
                    <option value="6">名企精英</option>
                </select>
            </div>
        </div>
    </div>
    <div class="weui_btn_area">
        <a class="weui_btn weui_btn_primary" href="javascript:" id="showTooltips">确定</a>
    </div>
</div>
</div><?php }} ?>