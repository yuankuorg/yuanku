<?php /* Smarty version Smarty-3.1.12, created on 2016-01-28 10:55:39
         compiled from "E:\wamp\www\yuanku\view\study\jifen.html" */ ?>
<?php /*%%SmartyHeaderCode:630756a87e4ccb2b93-96608019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b986effb1d4be4c086cebb67128ee24883080d8' => 
    array (
      0 => 'E:\\wamp\\www\\yuanku\\view\\study\\jifen.html',
      1 => 1453972272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '630756a87e4ccb2b93-96608019',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a87e4cce8d36_35092056',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a87e4cce8d36_35092056')) {function content_56a87e4cce8d36_35092056($_smarty_tpl) {?><div class="page">
<script type="text/javascript">
	$(function(){
		$("#weui_lxr_boder").tap(function () {
			$("#weui_lxr_boder_one").css("border-bottom","none");
		});
		$("#weui_lxr_boder_one").tap(function () {
			$(this).css("border-bottom","3px solid #039702");
			$("#weui_lxr_content").css("display","none")
			$("#weui_lxr_title").css("display","block")
		});
		$("#weui_lxr_boder").tap(function () {
			$(this).css("border-bottom","3px solid #039702");
			$("#weui_lxr_content").css("display","block")
			$("#weui_lxr_title").css("display","none")
		});
		$("#weui_lxr_boder_one").tap(function () {
			$("#weui_lxr_boder").css("border-bottom","none");
		});
	});
</script>
	<div class="weui_cells" id="weui_lxr_body">		    
		<div class="weui_cell">
		    <div class="weui_cell_bd weui_cell_primary" id="weui_lxr_content_one">
		       <img style="float: left;" src="/yuanku/img/study/lxr_name.gif" />
		       <div class="weui_lxr_text_title">
                	何静<br />
                	剩余积分:500
                </div>
		    </div>
		</div>
	</div>
	
	
	<div class="weui_lxr_herad" id="weui_lxr_boder">积分兑换</div>
	<div class="weui_lxr_herad" id="weui_lxr_boder_one">我的兑换</div>
	
	
	
	
	
	<article class="weui_article" id="weui_lxr_title">
   		<div class="weui_cell_bd weui_cell_primary">
            <div class="weui_lxr_text">
            	
            </div>
        </div>
    </article>
    
    
    
    
    <div class="weui_cells weui_cells_access" id="weui_lxr_content">
        <a class="weui_cell" href="javascript:;">
            <div class="weui_cell_bd weui_cell_primary">
                <img src="/yuanku/img/study/jifen_lxr_duihuan.gif"/>
                <div class="weui_lxr_text">
                	<span class="weui_lxr_span">兑换一次免费培训的机会</span><br />
                	<span>800积分</span><br />
                	<div class="weui_lxr_div_one" style="width: 80%; font-size: 12px;" >参加丰富多彩的实训,增加项目经验,提高职业素养!</div>
                	
        			<!--<span class="weui_lxr_span_one">参加丰富多彩的实训,增加项目经验,</span><br />
        			<span class="weui_lxr_span_one">提高职业素养!</span>-->
                </div>
            </div>
            <div class="weui_cell_ft">
            	兑换
            </div>
        </a>
        <a class="weui_cell" href="javascript:;">
            <div class="weui_cell_bd weui_cell_primary">
                <img src="/yuanku/img/study/jifen_lxr_duihuan_one.gif"/>
                <div class="weui_lxr_text">
                	<span class="weui_lxr_span">兑换海量的学习资料</span><br />
                	<span>800积分</span><br />
                	<div class="weui_lxr_div_one" style="width: 80%; font-size: 12px;" >获得需求的学习资料,提高职业能力,开阔视野!</div>
                </div>
            </div>
            <div class="weui_cell_ft">
            	兑换
            </div>
        </a>
        <a class="weui_cell" href="javascript:;">
            <div class="weui_cell_bd weui_cell_primary">
                <img src="/yuanku/img/study/jifen_lxr_duihuan_tow.gif"/>
                <div class="weui_lxr_text">
                	<span class="weui_lxr_span"> 兑换一次推荐就业的机会</span><br />
                	<span>800积分</span><br />
        			<div class="weui_lxr_div_one" style="width: 80%; font-size: 12px;" >推荐就业,机不可失,失不再来!</div>
                </div>
            </div>
            <div class="weui_cell_ft">
            	兑换
            </div>
        </a>
</div>
</div><?php }} ?>