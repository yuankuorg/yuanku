<?php /* Smarty version Smarty-3.1.12, created on 2016-01-31 05:22:42
         compiled from "D:\Program Files\apatch\wamp\www\yuanku\view\study\uigs.html" */ ?>
<?php /*%%SmartyHeaderCode:276156ad9a22403f97-34089721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e43d759cb507f8317fe5fe038819ae4f960c4a6' => 
    array (
      0 => 'D:\\Program Files\\apatch\\wamp\\www\\yuanku\\view\\study\\uigs.html',
      1 => 1454216096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '276156ad9a22403f97-34089721',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'projectdata' => 0,
    'chaptercount' => 0,
    'i' => 0,
    'statedata' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56ad9a22550995_32419468',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ad9a22550995_32419468')) {function content_56ad9a22550995_32419468($_smarty_tpl) {?><div class="page">
	<script type="text/javascript">
		var items = <?php if (isset($_SESSION['vip'])){?><?php echo $_SESSION['vip']['items'];?>
<?php }else{ ?>-1<?php }?>;
		
		$(function() {
			$(".uigs .js_grid").tap(function() {
				var score = $(this).data("score");
				var addscore = $(this).data("addscore");
				var cid = $(this).data("cid");
				var project = $(this).data("project");
				var data = {"cid":cid,"project ":project,"score":score};
				if( items == 6 ) { //如果为名企精英，直接跳转页面,不用扣分
					pageManager.go($(this).data("id"),data);
					return;
				}
				
				var falg = false;
				var t = $(this);
				$.ajax({
					type:"post",
					url :"chuang-isdelexchange.html",
					data: data,
					success : function( text ){ 
						//积分扣除成功
						if ( text == "true" ) {
							pageManager.go(t.data("id"),data);
						}  else{
							falg = true;
						}
					},
					async:false
				});
				
				if( falg ) {
					$("#dialogConfirm").dialog("关卡信息", "需要先扣取"+ score +"积分，通过后获取"+ addscore +"积分，是否继续？");
					$("#dialogConfirm .mes_right").unbind().tap(function(){
						$("#dialogConfirm").hide();
						$.ajax({
							type:"post",
							url :"chuang-deductExchange.html",
							data: data,
							dataType : "json",
							success : function( obj ){ 
								//积分扣除成功
								if (obj.code == 1) {
									pageManager.go(t.data("id"),data);
									return;
								}
								//积分不足的情况
								if (obj.code == 2) {
									$(".page").css("display","block");
									$(".weui_msg").find("i").removeClass("weui_icon_success").addClass("weui_icon_info");
									$(".page").find(".weui_msg_title").html("积分不足");
									$(".page").find(".weui_msg_desc").html("请通过接任务或者签到获取！");
									return;
								}
								//操作失败的情况
								if (obj.code == 3) {
									$(".page").css("display","block");
									$(".weui_msg").find("i").removeClass("weui_icon_success").addClass("weui_icon_warn");
									$(".page").find(".weui_msg_title").html("操作失败");
									$(".page").find(".weui_msg_desc").html("请稍后重试");
									return;
								}
							},
							async:true
						});
					});
				}
			});
		});
	</script>

	<img src="<?php echo $_smarty_tpl->tpl_vars['projectdata']->value['poster'];?>
" style="width: 100%;" />
	<article class="weui_article">
		<section>
			<section>
				<h2>简介</h2>
				<p style="padding: 0px;">
					<?php echo $_smarty_tpl->tpl_vars['projectdata']->value['brief'];?>

				</p>
			</section>
		</section>
	</article>
	<?php if ($_SESSION['vip']['items']==7||$_SESSION['vip']['items']==6){?>
		<div class="weui_grids">
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['chaptercount']->value)+1 - (1) : 1-(count($_smarty_tpl->tpl_vars['chaptercount']->value))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
				<a href="javascript:;" class="weui_grid js_grid pass" data-cid="<?php echo $_smarty_tpl->tpl_vars['chaptercount']->value[$_smarty_tpl->tpl_vars['i']->value-1]['cid'];?>
" data-project="<?php echo $_smarty_tpl->tpl_vars['chaptercount']->value[$_smarty_tpl->tpl_vars['i']->value-1]['project'];?>
" data-score="<?php echo $_smarty_tpl->tpl_vars['chaptercount']->value[$_smarty_tpl->tpl_vars['i']->value-1]['score'];?>
" data-addscore="<?php echo $_smarty_tpl->tpl_vars['chaptercount']->value[$_smarty_tpl->tpl_vars['i']->value-1]['addscore'];?>
" data-id="chuangps">
					<div class="weui_grid_icon">
						<img src="/yuanku/img/study/num_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
.png" alt="">
					</div>
					<p class="weui_grid_label">
						<!--<?php echo $_smarty_tpl->tpl_vars['statedata']->value[3]['state'];?>
-->
					</p>
				</a>
			<?php }} ?>
		</div>
	<?php }else{ ?>
		<article class="weui_article">
			<section>
				<h2 style="text-align: center;font-size: 18px;color: red;">抱歉！</h2>
				<p style="font-size: 16px;color: red;">
					关卡是为助学成才和名企精英专门设置，你的身份不符合，不能查看关卡信息！
				</p>
			</section>
		</article>
	<?php }?>

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
	</div>
	<div class="page" style="display: none;">
	<div class="weui_msg">
			<div class="weui_icon_area"><i class="weui_icon_success weui_icon_msg" ></i></div>
				<div class="weui_text_area">
					<h2 class="weui_msg_title"></h2>
					<p class="weui_msg_desc"></p>
				</div>
				<div class="weui_opr_area">
					<p class="weui_btn_area">
						<a href="javascript:;" class="weui_btn weui_btn_primary js_grid" id="chaungback">返回关卡页</a>
						<a href="javascript:;" class="weui_btn weui_btn_default js_grid" id="homeback">返回首页</a>
					</p>
				</div>
		    </div>
</div><?php }} ?>