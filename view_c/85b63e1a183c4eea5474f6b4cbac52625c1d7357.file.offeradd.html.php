<?php /* Smarty version Smarty-3.1.12, created on 2016-01-29 01:18:25
         compiled from "E:\wamp\www\yuanku\view\study\offeradd.html" */ ?>
<?php /*%%SmartyHeaderCode:777656a9be9844fce4-57847888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85b63e1a183c4eea5474f6b4cbac52625c1d7357' => 
    array (
      0 => 'E:\\wamp\\www\\yuanku\\view\\study\\offeradd.html',
      1 => 1454030297,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '777656a9be9844fce4-57847888',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a9be9848b559_06161116',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a9be9848b559_06161116')) {function content_56a9be9848b559_06161116($_smarty_tpl) {?><div class="page">
	<script type="text/javascript">
		$(function() {
			//页面跳转
			$(" .offeradd .js_grid").tap(function() {
				pageManager.go($(this).data("id"));
			});
			//头栏切换
			$(" .offeradd #weui_lgs_boder").tap(function() {
				$("#weui_lgs_boder").css("border-bottom", "3px solid #039702");
				$("#weui_lgs_boder_one").css("border-bottom", "none");
				$("#wei").css("display", "none");
				$("#yi").css("display", "block");
			});
			$(" .offeradd #weui_lgs_boder_one").tap(function() {
				$("#weui_lgs_boder").css("border-bottom", "none");
				$("#weui_lgs_boder_one").css("border-bottom", "3px solid #039702");
				$("#wei").css("display", "block");
				$("#yi").css("display", "none");
			});
		});
	</script>
	<div class="weui_lxr_herad" id="weui_lgs_boder">已解决的任务</div>
	<div class="weui_lxr_herad" id="weui_lgs_boder_one">待解决的任务</div>
	<div id="yi">
		<div class="weui_cells_title">我的任务</div>
		<div class="weui_cells ">
			<a class="weui_cell" href="javascript:;">
				<div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII="
					alt="" style="width:20px;margin-right:5px;display:block"></div>
				<div class="weui_cell_bd weui_cell_primary">
					<p style="margin: 0px; padding: 0px; font-size: 6px;">昵称</p>
					<p style="margin: 0px; padding: 0px; font-size: 6px;">2016-1-1</p>
				</div>
			</a>
			<div class="weui_cell_bd weui_cell_primary">
				<textarea class="weui_textarea" type="text" readonly="readonly" rows="3">这是发布过的问题1</textarea>
				<div class="weui_textarea_counter">
					<!--<span>0</span>/200--></div>
			</div>
			<div class="weui_cell">

				<div class="weui_cell_ft">
					<a><img src="/yuanku/img/study/078.png" />133</a>
				</div>
				<div class="weui_cell_ft">
					<a><img src="/yuanku/img/study/257.png" />111</a>
				</div>
			</div>
		</div>
		<div class="weui_cells js_grid" data-id="offermine">
			<a class="weui_cell" href="javascript:;">
				<div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII="
					alt="" style="width:20px;margin-right:5px;display:block"></div>
				<div class="weui_cell_bd weui_cell_primary">
					<p style="margin: 0px; padding: 0px; font-size: 6px;">昵称</p>
					<p style="margin: 0px; padding: 0px; font-size: 6px;">2016-1-1</p>
				</div>
			</a>
			<div class="weui_cell_bd weui_cell_primary">
				<textarea class="weui_textarea" type="text" readonly="readonly" rows="3">这是发布过的问题2</textarea>
				<div class="weui_textarea_counter">
					<!--<span>0</span>/200--></div>
			</div>
			<div class="weui_cell">
				<div class="weui_cell_ft">
					<a><img src="/yuanku/img/study/078.png" />166</a>
				</div>
				<div class="weui_cell_ft">
					<a><img src="/yuanku/img/study/257.png" />177</a>
				</div>
			</div>
		</div>
		<div class="weui_cells">
			<a class="weui_cell" href="javascript:;">
				<div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII="
					alt="" style="width:20px;margin-right:5px;display:block"></div>
				<div class="weui_cell_bd weui_cell_primary">
					<p style="margin: 0px; padding: 0px; font-size: 6px;">昵称</p>
					<p style="margin: 0px; padding: 0px; font-size: 6px;">2016-1-1</p>
				</div>
			</a>
			<div class="weui_cells">
				<div class="weui_cell_bd weui_cell_primary">
					<textarea class="weui_textarea" type="text" readonly="readonly" rows="3">这是发布过的问题3</textarea>
					<div class="weui_textarea_counter">
						<!--<span>0</span>/200--></div>
				</div>
			</div>
			<div class="weui_cell">
				<div class="weui_cell_ft">
					<a><img src="/yuanku/img/study/078.png" />199</a>
				</div>
				<div class="weui_cell_ft">
					<a><img src="/yuanku/img/study/257.png" />188</a>
				</div>
			</div>
		</div>
	</div>
	<div id="wei" style="display: none;">
		暂无任务
	</div>
</div><?php }} ?>