<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 07:17:39
         compiled from "G:\wamp\www\yuanku\view\study\chuangweb.html" */ ?>
<?php /*%%SmartyHeaderCode:3140656a3351a4753f2-29021203%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3969419ddd3d85b709db1b371143d363dea24f5a' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\study\\chuangweb.html',
      1 => 1453706250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3140656a3351a4753f2-29021203',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a3351a4b0d33_93504752',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a3351a4b0d33_93504752')) {function content_56a3351a4b0d33_93504752($_smarty_tpl) {?>	
<div class="page">
	<script type="text/javascript">
		$(function(){
			$(".chuangweb .js_grid").tap(function(){
				pageManager.go($(this).data("id"));
			})
		})
	</script>
	<div class="weui_cells">
		<div class="weui_cell">
			<div class="weui_cell_bd weui_cell_primary">
				<p class="vidioname">第<?php echo $_POST['gid'];?>
关：贪吃蛇小游戏制作</p>
				<p class="degree">难度系数：<img src="/yuanku/img/study/star.gif" class="starfill" /><img src="/yuanku/img/study/star.gif" /><img src="/yuanku/img/study/star.gif" /><img src="/yuanku/img/study/star.gif" /><img src="/yuanku/img/study/star.gif" /><img src="/yuanku/img/study/star.gif"
					/></p>
			</div>
		</div>
		<div class="weui_cell">
			<div class="weui_cell_bd weui_cell_primary">
				<p>贪吃蛇制作视频</p>
				<p class="uploader">上传者：兴哥</p>
			</div>
			<div class="weui_cell_ft">
				<p class="uploadTime">上传时间：2016-1-1</p>
			</div>
		</div>
		<div class="weui_cell weui_pad">
			<video width="100%" controls="controls">
				<source src="myvideo.mp4" type="video/mp4"></source>
				<source src="myvideo.ogv" type="video/ogg"></source>
				<source src="myvideo.webm" type="video/webm"></source>
				<object width="" height="" type="application/x-shockwave-flash" data="myvideo.swf">
					<param name="movie" value="myvideo.swf" />
					<param name="flashvars" value="autostart=true&amp;file=myvideo.swf" />
				</object>
				当前浏览器不支持 video直接播放，点击这里下载视频： <a href="myvideo.webm">下载视频</a>
			</video>
		</div>
		<div class="weui_cell">
			<div class="weui_cell_bd weui_cell_primary">
				<p class="rule_title">闯关规则：</p>
				<p class="rule">请仔细观看视频，并按视频里面的要求完成任务，将完成的任务发送至周老师的邮箱888@qq.com后，再点击下方的提交按钮确认已上传。 已确认上传的同学可以进入下一关，但要在本关通过后才能点击下一关的提交按钮。</p>
			</div>
		</div>
	</div>
	<div class="button_sp_area area_mar">
		<a href="javascript:;" class="weui_btn weui_btn_primary js_grid" data-id = "applyfalse">申请通关</a>
	</div>
</div><?php }} ?>