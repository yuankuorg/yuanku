<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 06:59:43
         compiled from "G:\wamp\www\yuanku\view\study\chuangping.html" */ ?>
<?php /*%%SmartyHeaderCode:1308856a4e2e3215b34-02431648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33cb7924424bd31dfe66cc324cf070dc0830457e' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\study\\chuangping.html',
      1 => 1453648670,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1308856a4e2e3215b34-02431648',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a4e2e3571095_14420804',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a4e2e3571095_14420804')) {function content_56a4e2e3571095_14420804($_smarty_tpl) {?>	
<div class="page">
	<script type="text/javascript">
		$(function(){
			$(".chuangping .js_grid").tap(function(){
				pageManager.go($(this).data("id"));
			})
		})
	</script>
	<div class="weui_cells">
		<div class="weui_cell">
			<div class="weui_cell_bd weui_cell_primary">
				<p class="vidioname">第<?php echo $_POST['gid'];?>
关：素描分层</p>
				<p class="degree">难度系数：<img src="/yuanku/img/study/star.gif" class="starfill" /><img src="/yuanku/img/study/star.gif" /><img src="/yuanku/img/study/star.gif" /><img src="/yuanku/img/study/star.gif" /><img src="/yuanku/img/study/star.gif" /><img src="/yuanku/img/study/star.gif"
					/></p>
			</div>
		</div>
		<div class="weui_cell">
			<div class="weui_cell_bd weui_cell_primary">
				<p>素描分层视频</p>
				<p class="uploader">上传者：肖经理</p>
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
		<a href="javascript:;" class="weui_btn weui_btn_primary js_grid" data-id = "applysub">申请通关</a>
	</div>
</div><?php }} ?>