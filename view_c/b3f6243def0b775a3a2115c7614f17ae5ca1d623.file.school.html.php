<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 07:00:59
         compiled from "G:\wamp\www\yuanku\view\study\school.html" */ ?>
<?php /*%%SmartyHeaderCode:1018556a5c82b4d7297-82876924%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3f6243def0b775a3a2115c7614f17ae5ca1d623' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\study\\school.html',
      1 => 1453692560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1018556a5c82b4d7297-82876924',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a5c82b556e87_01371326',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a5c82b556e87_01371326')) {function content_56a5c82b556e87_01371326($_smarty_tpl) {?><div class="page">
	<script type="text/javascript">
		$(function(){
			$(".school .js_grid").tap(function(){
				pageManager.go($(this).data("id"));	
			});	
			$("#weui_fu_boder_one").tap(function(){
				$("#otherschool").css("display","none");
			});
			$("#weui_fu_boder").tap(function(){
				$("#otherschool").css("display","block");
				$("#weui_fu_boder").css("border-bottom","3px solid #039702");
				$("#weui_fu_boder").css("color","#039702");
				$("#schoolcount").css("border-bottom","none");
				$("#weui_fu_boder_one").css("border-bottom","none");
				$("#weui_fu_boder_one").css("color","black");
			});
			$("#weui_fu_boder_one").tap(function(){
				$("#schoolcount").css("display","block");
				$("#weui_fu_boder_one").css("border-bottom","3px solid #039702");
				$("#weui_fu_boder_one").css("color","#039702");
				$("#otherschool").css("border-bottom","none");
				$("#weui_fu_boder").css("border-bottom","none");
				$("#weui_fu_boder").css("color","black");
			});
			$("#weui_fu_boder").tap(function(){
				$("#schoolcount").css("display","none");
			})
		});
	</script>
	
	<div class="weui_fu_herad" id="weui_fu_boder_one" style="color:#039702 ;">学校统计</div>
	<div class="weui_fu_herad" id="weui_fu_boder">其他院校</div>
	
	<div id="schoolcount" style="margin-top: 30px;">
		<div class="bd">
			<div class="weui_cells">
				<img src="/yuanku/img/study/3.jpg" style="width: 100%;height: 150px;" />
			</div>	
	        <div class="weui_cells">
			    <div class="weui_cell"	>
			    	<div class="weui_cell_hd">
			        	<img src="/yuanku/img/study/xiaobiao.png"  style="height: 40px; width: 40px;">
			    	</div>&nbsp;&nbsp;&nbsp;
				    <div class="weui_cell_bd weui_cell_primary">
				    	<p><span style="font-weight: 700; ">小龙</span><span class="fontday_fu">01月23号</span></p>
				    	<p style="font-size: 12px;color: gray;">积分:500分&nbsp;/&nbsp;&nbsp;<span>闯关:15</span></p>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
	
	<div id="otherschool" style="display: none;margin-top: 30px;">
		<div class="bd">
			<div class="weui_cells">
				<img src="/yuanku/img/study/3.jpg" style="width: 100%; height: 150px;"/>
			</div>	
	        <div class="weui_cells">
			    <div class="weui_cell"	>
			    	<div class="weui_cell_hd">
			        	<img src="/yuanku/img/study/xiaobiao.png"  style="height: 40px; width: 40px;">
			    	</div>&nbsp;&nbsp;&nbsp;
				    <div class="weui_cell_bd weui_cell_primary">
				    	<p><span style="font-weight: 700; ">广州大学</span><span class="fontday_fu">01月23号</span></p>
				    	<p style="font-size: 12px;color: gray;">积分:500分&nbsp;/&nbsp;&nbsp;人数:<span>1000</span></p>
			    	</div>
			    </div>
			</div>
			<div class="weui_cells">
			    <div class="weui_cell"	>
			    	<div class="weui_cell_hd">
			        	<img src="/yuanku/img/study/xiaobiao.png"  style="height: 40px; width: 40px;">
			    	</div>&nbsp;&nbsp;&nbsp;
				    <div class="weui_cell_bd weui_cell_primary">
				    	<p><span style="font-weight: 700; ">广州大学</span><span class="fontday_fu">01月23号</span></p>
				    	<p style="font-size: 12px;color: gray;">积分:500分&nbsp;/&nbsp;&nbsp;人数:<span>1000</span></p>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
	
</div>

<?php }} ?>