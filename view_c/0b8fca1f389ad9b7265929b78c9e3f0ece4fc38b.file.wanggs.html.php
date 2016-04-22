<?php /* Smarty version Smarty-3.1.12, created on 2016-01-24 15:14:43
         compiled from "G:\wamp\www\yuanku\view\study\wanggs.html" */ ?>
<?php /*%%SmartyHeaderCode:1821756a33519236999-94090539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b8fca1f389ad9b7265929b78c9e3f0ece4fc38b' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\study\\wanggs.html',
      1 => 1453646578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1821756a33519236999-94090539',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a33519263724_72801635',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a33519263724_72801635')) {function content_56a33519263724_72801635($_smarty_tpl) {?><div class="page">
	<script type="text/javascript">
		$(function() {
			$(".wanggs .js_grid").tap(function() {
				if ($(this).is(".yisuo")) {
					$("#tshwjs").dialog("提示", "未解锁!");
				} else {
					var data = {
						"gid": $(this).data("gid")
					};
					pageManager.go($(this).data("id"), data);
				}
			});
		});
	</script>

	<img src="/yuanku/img/study/t1.jpg" style="width: 100%;" />
	<article class="weui_article">
		<section>
			<section>
				<h2>简介</h2>
				<p>
					本次网站游戏闯关共有9关，难度由浅入深，每通关一关就会获得大量积分并解锁下一关。本游戏重点测试闯关者对建站的理解，已经框架和数据库的应用程度 ，望君通过不段的闯关能提升自己对建站的掌握以及对设计的理解，不断的完善自己，日后成为一名优秀的网站开发程序员
				</p>
			</section>
		</section>
	</article>
	<div class="weui_grids">
		<a href="javascript:;" class="weui_grid js_grid" data-gid="1" data-id="chuangweb">
			<div class="weui_grid_icon">
				<img src="/yuanku/img/study/num_1.png" alt="">
			</div>
			<p class="weui_grid_label">
				已通关
			</p>
		</a>
		<a href="javascript:;" class="weui_grid js_grid" data-gid="2" data-id="chuangweb">
			<div class="weui_grid_icon">
				<img src="/yuanku/img/study/num_2.png" alt="">
			</div>
			<p class="weui_grid_label">
				正在闯关
			</p>
		</a>
		<a href="javascript:;" class="weui_grid js_grid yisuo" data-id="#">
			<div class="weui_grid_icon">
				<img src="/yuanku/img/study/quer.png" alt="">
			</div>
			<p class="weui_grid_label">
				未解锁
			</p>
		</a>
		<a href="javascript:;" class="weui_grid js_grid yisuo" data-id="#">
			<div class="weui_grid_icon">
				<img src="/yuanku/img/study/quer.png" alt="">
			</div>
			<p class="weui_grid_label">
				未解锁
			</p>
		</a>
		<a href="javascript:;" class="weui_grid js_grid yisuo" data-id="#">
			<div class="weui_grid_icon">
				<img src="/yuanku/img/study/quer.png" alt="">
			</div>
			<p class="weui_grid_label">
				未解锁
			</p>
		</a>
		<a href="javascript:;" class="weui_grid js_grid yisuo" data-id="#">
			<div class="weui_grid_icon">
				<img src="/yuanku/img/study/quer.png" alt="">
			</div>
			<p class="weui_grid_label">
				未解锁
			</p>
		</a>
		<a href="javascript:;" class="weui_grid js_grid yisuo" data-id="#">
			<div class="weui_grid_icon">
				<img src="/yuanku/img/study/quer.png" alt="">
			</div>
			<p class="weui_grid_label">
				未解锁
			</p>
		</a>
		<a href="javascript:;" class="weui_grid js_grid yisuo" data-id="#">
			<div class="weui_grid_icon">
				<img src="/yuanku/img/study/quer.png" alt="">
			</div>
			<p class="weui_grid_label">
				未解锁
			</p>
		</a>
		<a href="javascript:;" class="weui_grid js_grid yisuo" data-id="#">
			<div class="weui_grid_icon">
				<img src="/yuanku/img/study/quer.png" alt="">
			</div>
			<p class="weui_grid_label">
				未解锁
			</p>
		</a>
	</div>
</div>
<!--提示未解锁-->
<div class="weui_dialog_alert" id="tshwjs" style="display: none;">
	<div class="weui_mask"></div>
	<div class="weui_dialog">
		<div class="weui_dialog_hd"><strong class="weui_dialog_title"></strong></div>
		<div class="weui_dialog_bd"></div>
		<div class="weui_dialog_ft">
			<a href="javascript:;" class="weui_btn_dialog primary">确定</a>
		</div>
	</div>
</div><?php }} ?>