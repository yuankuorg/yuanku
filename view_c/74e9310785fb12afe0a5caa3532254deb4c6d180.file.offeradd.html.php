<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 06:40:53
         compiled from "D:\wamp\www\yuanku\view\study\offeradd.html" */ ?>
<?php /*%%SmartyHeaderCode:3148656a34af2e4dcd2-52960218%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74e9310785fb12afe0a5caa3532254deb4c6d180' => 
    array (
      0 => 'D:\\wamp\\www\\yuanku\\view\\study\\offeradd.html',
      1 => 1453704042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3148656a34af2e4dcd2-52960218',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a34af2e77fd2_57209462',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a34af2e77fd2_57209462')) {function content_56a34af2e77fd2_57209462($_smarty_tpl) {?><style type="text/css">
	 .title_fjz>h2{ 
		text-align: center; 
		margin: 0px;
		 padding: 0px; 
		background-color: dodgerblue;
		 color: white;
		 }
</style>
<div class="page">
	<div class="bd">
		<div class="weui_cells weui_cells_access title_fjz">
			<h2>添加悬赏</h2>
		</div>
	</div>
	<!--悬赏问题-->
	<div class="weui_cells_title"><h3 style="color: blue;">悬赏问题:</h3></div>
        <div class="weui_cells weui_cells_form">
            <div class="weui_cell">
                <div class="weui_cell_bd weui_cell_primary">
                    <textarea class="weui_textarea" placeholder="写下你想问的问题" rows="3"></textarea>
                    <div class="weui_textarea_counter"><span>0</span>/200</div>
                </div>
            </div>
    	</div>
    	
    <!--悬赏金额	-->
	    <div class="weui_cells" style="color: blue;">
            <div class="weui_cell" style="margin-left:5em;">
                <div class="weui_cell_hd">
                	<h4>悬赏金额:</h4>
                </div>
                <div class="weui_cell_bd weui_cell_primary">
                    <p>
                    	&nbsp;
                    	<input type="text" style="width: 2em;"/>
                    </p>
                </div>
            </div>
	    </div>
	   <!-- 我发布的悬赏-->
	    <div class="weui_cells weui_cells_access" style="color: blue;">
            <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <h4>我发布过的悬赏</h4>
                </div>
                <div class="weui_cell_ft">
                </div>
            </a>
       </div>
        <div class="bd spacing" style="width: 40%;margin:0px auto;margin-top: 1em;">
        	<a href="javascript:;" class="weui_btn weui_btn_primary" style="background-color: blue;">提交</a>       
    	</div>
</div>	<?php }} ?>