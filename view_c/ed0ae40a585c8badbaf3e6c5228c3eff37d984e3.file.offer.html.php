<?php /* Smarty version Smarty-3.1.12, created on 2016-01-29 01:35:59
         compiled from "E:\wamp\www\yuanku\view\study\offer.html" */ ?>
<?php /*%%SmartyHeaderCode:2243256a87f101de9e4-53051277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed0ae40a585c8badbaf3e6c5228c3eff37d984e3' => 
    array (
      0 => 'E:\\wamp\\www\\yuanku\\view\\study\\offer.html',
      1 => 1454031354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2243256a87f101de9e4-53051277',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a87f1021a016_41242177',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a87f1021a016_41242177')) {function content_56a87f1021a016_41242177($_smarty_tpl) {?><div class="page">
	<script type="text/javascript">
		$(function() {
			//头栏切换
			$( " .offer #weui_gs_boder").tap(function() {
				$("#weui_gs_boder").css("border-bottom", "3px solid #039702");
				$("#weui_gs_boder_one").css("border-bottom", "none");
				$("#fa").css("display", "none");
				$("#xun").css("display", "block");
			});
			$(" .offer #weui_gs_boder_one").tap(function() {
				$("#weui_gs_boder").css("border-bottom", "none");
				$("#weui_gs_boder_one").css("border-bottom", "3px solid #039702");
				$("#fa").css("display", "block");
				$("#xun").css("display", "none");
			});
			//页面跳转
			$(".offer .js_grid").tap(function() {
				var data ={"oid": $(this).attr("data")};
				pageManager.go($(this).data("id"), data);
			});
		});
	</script>
	<div class="weui_lxr_herad" id="weui_gs_boder_one" >发布任务</div>
	<div class="weui_lxr_herad" id="weui_gs_boder" >寻找任务</div>
	<div id="fa">
		<!--发布任务-->
		<div class="weui_cells_title">发布</div>
		<div class="weui_cells">
			<div class="weui_cell weui_cell_select weui_select_before">
				<div class="weui_cell_hd">
					<select class="weui_select" name="select2">
						<option value="1">求助</option>
						<option value="2">分享</option>
						<option value="4">提问</option>
					</select>
				</div>
				<div class="weui_cell_bd weui_cell_primary">
					<input class="weui_input" type="text" placeholder="请输入标题" />
				</div>
			</div>
		</div>
		<div class="weui_cells weui_cells_form">
			<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary">
					<textarea id="offerquestion_fjz" class="weui_textarea" placeholder="写下你想问的问题" rows="3"></textarea>
					<div class="weui_textarea_counter"><span>0</span>/300</div>
				</div>
			</div>
		</div>
		<!--悬赏金额	-->
		<div class="weui_cells">
			<div class="weui_cell">
				<div class="weui_cell_hd">
					悬赏金额：
				</div>
				<div class="weui_cell_bd weui_cell_primary">
					<select class="form-control " >
						<option>5分</option>
						<option>10分</option>
						<option>15分</option>
						<option>20分</option>
					</select>
				</div>
			</div>
		</div>
		<!-- 我发布的悬赏-->
		<div class="weui_cells weui_cells_access js_grid" data-id="offeradd">
            <a class="weui_cell" href="javascript:;" >
                <div class="weui_cell_bd weui_cell_primary">
                    <p>我的任务</p>
                </div>
                <div class="weui_cell_ft">
                </div>
            </a>
        </div>
		<div class="bd spacing">
			<a href="javascript:;" id="offeradd_fjz" class="weui_btn weui_btn_primary">提交</a>
		</div>
	</div>
	<!--
		头栏内容分割线
	-->
	<div id="xun" style="display:none;">
		<div class="weui_cell weui_vcode">
			<div class="weui_cell_hd"></div>
			<div class="weui_cell_bd weui_cell_primary">
				<input class="weui_input" type="text" placeholder="搜索任务" />
			</div>
			<div class="weui_cell_ft">
				<i class="weui_icon_search" ></i>
			</div>
		</div>
		<div class="weui_cells weui_cells_access">
			<a class="weui_cell js_grid" href="javascript:;" data-id = "offermine">
				<div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII="
					alt="" style="width:20px;margin-right:5px;display:block"></div>
				<div class="weui_cell_bd weui_cell_primary">
					<p>第一个问题</p>
				</div>
				<div class="weui_cell_ft">查看</div>
			</a>
			<a class="weui_cell" href="javascript:;">
				<div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII="
					alt="" style="width:20px;margin-right:5px;display:block"></div>
				<div class="weui_cell_bd weui_cell_primary">
					<p>第二个问题</p>
				</div>
				<div class="weui_cell_ft">查看</div>
			</a>
			<a class="weui_cell" href="javascript:;">
				<div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII="
					alt="" style="width:20px;margin-right:5px;display:block"></div>
				<div class="weui_cell_bd weui_cell_primary">
					<p>第三个问题</p>
				</div>
				<div class="weui_cell_ft">查看</div>
			</a>
			<a class="weui_cell" href="javascript:;">
				<div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII="
					alt="" style="width:20px;margin-right:5px;display:block"></div>
				<div class="weui_cell_bd weui_cell_primary">
					<p>第四个问题</p>
				</div>
				<div class="weui_cell_ft">查看</div>
			</a>
			<a class="weui_cell" href="javascript:;">
				<div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII="
					alt="" style="width:20px;margin-right:5px;display:block"></div>
				<div class="weui_cell_bd weui_cell_primary">
					<p>第五个问题</p>
				</div>
				<div class="weui_cell_ft">查看</div>
			</a>
			<a class="weui_cell" href="javascript:;">
				<div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII="
					alt="" style="width:20px;margin-right:5px;display:block"></div>
				<div class="weui_cell_bd weui_cell_primary">
					<p>第六个问题</p>
				</div>
				<div class="weui_cell_ft">查看</div>
			</a>
		</div>
	</div>
</div><?php }} ?>