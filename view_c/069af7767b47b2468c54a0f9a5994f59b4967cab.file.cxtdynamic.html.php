<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 06:59:31
         compiled from "G:\wamp\www\yuanku\view\study\cxtdynamic.html" */ ?>
<?php /*%%SmartyHeaderCode:1094456a5c7d3285ef5-78542532%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '069af7767b47b2468c54a0f9a5994f59b4967cab' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\study\\cxtdynamic.html',
      1 => 1453704630,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1094456a5c7d3285ef5-78542532',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a5c7d32b2d89_19199283',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a5c7d32b2d89_19199283')) {function content_56a5c7d32b2d89_19199283($_smarty_tpl) {?><!--我的动态-->
<div class="page">
	<script type="text/javascript">
		$(function(){
			$("#cxt_border").click(function(){
				$("#cxt_border_act").css("border-bottom","none");
				$(this).css("border-bottom","3px solid #039702");
				$("#cxtall").css("display","block");
				$("#cxtmy").css("display","none");
			});
			$("#cxt_border_act").click(function(){
				$("#cxt_border").css("border-bottom","none");
				$(this).css("border-bottom","3px solid #039702");
				$("#cxtmy").css("display","block");
				$("#cxtall").css("display","none");
			});
		});
	</script>
	<div class="dongtai" id="cxt_border_act" data-id="mydynamic">我的动态</div>
	<div class="dongtai" id="cxt_border" data-id="alldynamic">全部动态</div>
    <!--我的动态-->
    <div id="cxtmy">
		<div class="bd" style="margin-top: 30px;">
		    <div class="weui_cells">
	            <div class="weui_cell">
	                <div class="weui_cell_bd weui_cell_primary">
	                    <p>2016年1月20日你签到获得5积分</p>
	                </div>
	            </div>
	            <div class="weui_cell">
	                <div class="weui_cell_bd weui_cell_primary">
	                    <p>2016年1月19日你完成了仙人的悬赏任务获得30积分</p>
	                </div>
	            </div>
	            <div class="weui_cell">
	                <div class="weui_cell_bd weui_cell_primary">
	                    <p>2016年1月19日你发布悬赏任务失去了20积分</p>
	                </div>
	            </div>
	            <div class="weui_cell">
	                <div class="weui_cell_bd weui_cell_primary">
	                    <p>2016年1月18日你完成了第4关闯关任务获得了15积分</p>
	                </div>
	            </div>
	            <div class="weui_cell">
	                <div class="weui_cell_bd weui_cell_primary">
	                    <p>2016年1月18日你用50积分兑换了《css》课程</p>
	                </div>
	            </div>
	        </div>
		</div>
	</div>
	<!--全部动态-->
	<div id="cxtall">
		<div class="bd" style="margin-top: 30px;">	
		    <div class="weui_cells">
	            <div class="weui_cell">
	                <div class="weui_cell_bd weui_cell_primary">
	                    <p>2016年1月20日你签到获得5积分</p>
	                </div>
	            </div>
	            <div class="weui_cell">
	                <div class="weui_cell_bd weui_cell_primary">
	                    <p>2016年1月19日你完成了仙人的悬赏任务获得30积分</p>
	                </div>
	            </div>
	        </div>
		</div>
	</div>
</div><?php }} ?>