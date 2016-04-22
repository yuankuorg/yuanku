<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 06:58:50
         compiled from "G:\wamp\www\yuanku\view\study\zhaopin.html" */ ?>
<?php /*%%SmartyHeaderCode:739956a5c7aa7bc1d7-97248296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfd137df7fb70f04a118b98680d2f3fff37ddfb8' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\study\\zhaopin.html',
      1 => 1453692560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '739956a5c7aa7bc1d7-97248296',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a5c7aa86c173_10897072',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a5c7aa86c173_10897072')) {function content_56a5c7aa86c173_10897072($_smarty_tpl) {?><div class="page">
	<script type="text/javascript">
		$(function(){
			$(".zhaopin #zgh_weui_border").tap(function(){
				$("#zgh_weui_border").css("border-bottom","3px solid #039702");
				$("#zgh_weui_border_act").css("border-bottom","none");
				$("#my").css("display","none");
				$("#add").css("display","block");
			});
			$(".zhaopin #zgh_weui_border_act").tap(function(){
				$("#zgh_weui_border").css("border-bottom","none");
				$("#zgh_weui_border_act").css("border-bottom","3px solid #039702");
				$("#my").css("display","block");
				$("#add").css("display","none");
			});
			$(function(){
			$(".zhaopin .js_grid").tap(function(){
				pageManager.go($(this).data("id"));
			})
		});
		});

	</script>
	<div>
		<div class="zgh_weui_herad" id="zgh_weui_border_act" data-id="myzhaopin">我的招聘</div>
		<div class="zgh_weui_herad" id="zgh_weui_border" data-id="addzhaopin">发布招聘</div>
	</div>
<!--
作者：dovshui@163.com
时间：2016-01-22
描述：我的招聘
-->
	<div id="my">
		<div class="hd height">
		    <img src="/yuanku/img/study/img_05.jpg"/>
		</div>
		<div class="bd">
			<div class="weui_cells weui_cells_access">
				<a class="weui_cell js_grid" href="javascript:;" data-id="checkMyZhaopin">
				    <div class="weui_cell_hd">
				        <img src="/yuanku/img/study/tx_3.gif" alt="icon" style="height:56px;">
				    </div>
				    <div class="weui_cell_bd weui_cell_primary">
				        <p>php工程师</p>
				        <p class="ft_list1">宝源聚</p>
				    </div>
				    <div>
				        <p class="ft_list3">01月23日</p>
						<p class="ft_list4">4k-5k</p>
				    </div>
				</a>
				<a class="weui_cell js_grid" href="javascript:;" data-id="checkMyZhaopin">
				    <div class="weui_cell_hd">
				        <img src="/yuanku/img/study/tx_3.gif" alt="icon" style="height:56px;">
				    </div>
				    <div class="weui_cell_bd weui_cell_primary">
				        <p>php工程师</p>
				        <p class="ft_list1">宝源聚</p>
				    </div>
				    <div>
				        <p class="ft_list3">01月23日</p>
						<p class="ft_list4">4k-5k</p>
				    </div>
				</a>
				<a class="weui_cell js_grid" href="javascript:;" data-id="checkMyZhaopin">
				    <div class="weui_cell_hd">
				        <img src="/yuanku/img/study/tx_3.gif" alt="icon" style="height:56px;">
				    </div>
				    <div class="weui_cell_bd weui_cell_primary">
				        <p>php工程师</p>
				        <p class="ft_list1">宝源聚</p>
				    </div>
				    <div>
				        <p class="ft_list3">01月23日</p>
				        <p class="ft_list4">4k-5k</p>
				    </div>
				</a>
				<a class="weui_cell js_grid" href="javascript:;" data-id="checkMyZhaopin">
				    <div class="weui_cell_hd">
				        <img src="/yuanku/img/study/tx_3.gif" alt="icon" style="height:56px;">
				    </div>
				    <div class="weui_cell_bd weui_cell_primary">
				        <p>php工程师</p>
				        <p class="ft_list1">宝源聚</p>
				    </div>
				    <div>
				        <p class="ft_list3">01月23日</p>
				        <p class="ft_list4">4k-5k</p>
				    </div>
				</a>
				<a class="weui_cell js_grid" href="javascript:;" data-id="checkMyZhaopin">
				    <div class="weui_cell_hd">
				        <img src="/yuanku/img/study/tx_3.gif" alt="icon" style="height:56px;">
				    </div>
				    <div class="weui_cell_bd weui_cell_primary">
				        <p>php工程师</p>
				        <p class="ft_list1">网易</p>
				    	<!--<p class="ft_list2"><span>广州</span><span>不限</span><span>大专</span></p>-->
				    </div>
				    <div>
				        <p class="ft_list3">01月23日</p>
			    		<p class="ft_list4">4k-5k</p>
				    </div>
				</a>
				<a class="weui_cell js_grid" href="javascript:;" data-id="checkMyZhaopin">
				    <div class="weui_cell_hd">
				        <img src="/yuanku/img/study/tx_3.gif" alt="icon" style="height:56px;">
				    </div>
				    <div class="weui_cell_bd weui_cell_primary">
				        <p>php工程师</p>
				        <p class="ft_list1">宝源聚</p>
				    </div>
				    <div>
				        <p class="ft_list3">01月23日</p>
				        <p class="ft_list4">4k-5k</p>
					<!--	<p class="ft_list4">4k-5k</p>-->
				    </div>
				</a>
			</div> 
		</div>
	</div>
<!--
作者：dovshui@163.com
时间：2016-01-22
描述：发布招聘
-->
	<div id="add" style="display:none;">
		<div class="hd"></div>
		<div class="bd">
			<div class="weui_cells weui_cells_form">
				<div class="weui_cells">
					<div class="weui_cell">
						<div class="weui_cell_hd">
							<label class="weui_label">公司名称</label>
						</div>
						<div class="weui_cell_bd weui_cell_primary">
							<input class="weui_input" type="text" placeholder=""/>
						</div>
					</div>
                </div>
				<div class="weui_cells">
					<div class="weui_cell">
						<div class="weui_cell_hd">
							<label class="weui_label">职位名称</label>
						</div>
						<div class="weui_cell_bd weui_cell_primary">
							<input class="weui_input" type="text" placeholder=""/>
						</div>
					</div>
                </div>
                <div class="weui_cells">
					<div class="weui_cell weui_cell_select">
						<div class="weui_cell_hd">
							<label class="weui_label weui_xzk">工作经验</label>
						</div>
						<div class="weui_cell_bd weui_cell_primary">
							<select  class="weui_select">
								<option value="0"></option>
								<option value="1">0~1年</option>						
								<option value="2">1~2年</option>
							</select>
						</div>
					</div>
                </div>
                <div class="weui_cells">
					<div class="weui_cell weui_cell_select" >
						<div class="weui_cell_hd">
							<label class="weui_label weui_xzk">学历要求</label>
						</div>
						<div class="weui_cell_bd weui_cell_primary">
							<select  class="weui_select">
								<option value="0"></option>
								<option value="1">高中</option>						
								<option value="2">大专</option>
								<option value="3">本科</option>
							</select>
						</div>
					</div>
                </div>
       			<div class="weui_cells">
					<div class="weui_cell weui_cell_select">
						<div class="weui_cell_hd">
							<label class="weui_label weui_xzk">薪资待遇</label>
						</div>
						<div class="weui_cell_bd weui_cell_primary">
							<select  class="weui_select">
								<option value="0"></option>
								<option value="1">3000以下</option>						
								<option value="2">3000-4000</option>
								<option value="3">4001-5000</option>
								<option value="4">5001以上</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="weui_cells">
					<div class="weui_cell">
						<div class="weui_cell_hd">
							<label class="weui_label">工作地址</label>
						</div>
						<div class="weui_cell_bd weui_cell_primary">
							<input class="weui_input" type="text" placeholder=""/>
						</div>
					</div>
                </div>
			<div class="weui_cells_title">岗位职责</div>
			<div class="weui_cells weui_cells_form">
				<div class="weui_cell">
					<div class="weui_cell_bd weui_cell_primary">
						<textarea class="weui_textarea" placeholder="" rows="3"></textarea>
						<div class="weui_textarea_counter"><span>0</span>/400</div>
					</div>
				</div>
			</div>
			<div class="weui_cells_title">任职要求</div>
			<div class="weui_cells weui_cells_form">
				<div class="weui_cell">
					<div class="weui_cell_bd weui_cell_primary">
						<textarea class="weui_textarea" placeholder="" rows="3"></textarea>
						<div class="weui_textarea_counter"><span>0</span>/400</div>
					</div>
				</div>
			</div>
			
			<div class="weui_cells_title">联系方式</div>
			<div class="weui_cells weui_cells_form">
				<div class="weui_cell">
					<div class="weui_cell_bd weui_cell_primary">
						<textarea class="weui_textarea" placeholder="" rows="1"></textarea>
						<div class="weui_textarea_counter"><span>0</span>/100</div>
					</div>
				</div>
			</div>

		</div>
		<div>
			<a href="javascript:;" class="weui_btn weui_btn_primary">提交</a>
		</div>
	</div>

</div><?php }} ?>