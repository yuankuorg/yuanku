<?php /* Smarty version Smarty-3.1.12, created on 2016-01-25 06:43:17
         compiled from "G:\wamp\www\yuanku\view\admin\login.html" */ ?>
<?php /*%%SmartyHeaderCode:1772056a5c405ca3f51-34009116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '047d041d2b32688d3ffed8ef401da07e5ce45886' => 
    array (
      0 => 'G:\\wamp\\www\\yuanku\\view\\admin\\login.html',
      1 => 1453536462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1772056a5c405ca3f51-34009116',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56a5c405ee4174_42721979',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a5c405ee4174_42721979')) {function content_56a5c405ee4174_42721979($_smarty_tpl) {?>﻿<html>
    <head>
        <title>源酷登陆</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="/yuanku/css/res/screen.css" media="screen, projection" >
        <link rel="stylesheet" type="text/css" href="/yuanku/css/res/base.css">
        <link rel="stylesheet" type="text/css" href="/yuanku/css/res/login.css">
        <script type="text/javascript" src="/yuanku/js/jquery-1.10.2.min.js"  charset="UTF-8"></script>
        <script type="text/javascript">
        	//判断账户，密码，验证码
        	function checkFiled(obj){
        		if (obj.attr("name") == "code") {
        			if (obj.val() == "" || obj.val().length == 0) {
        				obj.css("background","rgba(255,0,0,0.1)");
        				obj.parent().next().html("账户不能为空！");
        				return false;
        			}
        		}else if (obj.attr("name") == "password") {
        			if (obj.val() == "" || obj.val().length == 0) {
        				obj.css("background","rgba(255,0,0,0.1)");
        				obj.parent().next().html("密码不能为空！");
        				return false;
        			}	
        		}else if (obj.attr("name") == "vcode") {
                    if (obj.val() == "" || obj.val().length == 0) {
                        obj.css("background","rgba(255,0,0,0.1)");
                        obj.parent().parent().next().html("验证码不能为空！");
                        return false;
                    }                       
                }       		
        		return true;
        	}
        	//替换错误样式
        	function clearcss(obj){
                if (obj.attr("name") == "vcode") {
                    obj.css("background","#FFFFFF");
                    obj.parent().parent().next().html("");                    
                } else{
                    obj.css("background","#FFFFFF");
                    obj.parent().next().html("");
                }
        	}
        	//提交数据
        	function check(){   
 	  			var flag = true;
				$("#form-login input").each(function(){
					if (checkFiled($(this)) == false) {
						flag = false;
						return false;
					}
				});
				
				if(flag){
        			$.ajax({
						type : "POST",
						url  : "/yuanku/adminIndex-login.html",
						data : {"code":$("#code").val(),"password":$("#password").val(),"remember_me":$("#chk11:checked").val()? 1:0,"vcode":$("input[name = vcode]").val()},//$("#code")取#code,不能是code.
						dataType:"json",
						success : function( json ) {
							if( json.num == 0 || json.num == 2) {
                                $("#login-error").html(json.message);
                                $(".vcode").attr("src","/yuanku/include/code.php?"+Math.random());
								
							} else if (json.num == 1) {
                                window.location = "/yuanku/adminIndex-index.html";
                            }
						}
					});						
				} 
            }  
            //从cookie获得账户，密码的有效信息
            function getCookie(name){
            	var cookie = document.cookie;
            	if (cookie.indexOf(name) != -1) {
            		var start = cookie.indexOf(name) + name.length + 1; 
            		var end = cookie.indexOf(";",start) != -1 ? cookie.indexOf(";",start) : cookie.length; 
            		return decodeURIComponent(cookie.substring(start,end));
            	}else{
            		return false;
            	}
            }
            
            $(function(){	            	
                $("#form-login input").each(function(){
                    if ($(this).attr("type") == "button") {
                    	$(this).click(function(){
                      		check();	                      		
                    	});

                    }else if ($(this).attr("type") == "text" || $(this).attr("type") == "password") {
                        $(this).blur(function(){
                            checkFiled($(this));
                        });
                        $(this).focus(function(){
                            clearcss($(this));
                        });
                    }
                });
                						                
                var code = getCookie("code");
                var pwd = getCookie("password");
                if(code){	                  	
                  	$("#code").val(code);
                  	$("#password").val(pwd);
                    $("#chk11").attr("checked","checked");
                }
                
                //验证码点击刷新
                $(".vcode").click(function(){
                	$(this).attr("src","/yuanku/include/code.php");
                });
            });	            	
        </script>
    </head>
    <body class="login-alone">
        <div class="logina-logo"></div>
        <div class="logina-main main clearfix">
            <div class="tab-con">
                <form id="form-login" method="post" action="login.php">               	
                    <div id='login-error' class="error-tip"></div>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <th>账号</th>
                                <td width="245">
                                    <input id="code" type="text" name="code" placeholder="请输入账号" 
                                    autocomplete="off" >
                                </td><td  class="error-tip">                                	
                                </td>
                            </tr>
                            <tr>
                                <th>密码</th>
                                <td width="245">
                                    <input id="password" type="password" name="password" placeholder="请输入密码" 
                                    autocomplete="off" >
                                </td><td  class="error-tip">
                                </td>
                            </tr>
                            <tr id="tr-vcode" >
                                <th>验证码</th>
                                <td width="245">
                                    <div class="valid">
                                        <input type="text" name="vcode">
                                        <img class="vcode" src="/yuanku/include/code.php" width="85" height="35" title="点击刷新">
                                    </div>
                                </td><td class="error-tip">
                                </td>
                            </tr>
                            <tr class="find">
                                <th></th>
                                <td>
                                    <div>
                                        <label class="checkbox" for="chk11">
                                        <input style="height: auto;" id="chk11" type="checkbox" name="remember_me"  >
                                       	记住我</label>
                                        <a href="passport/forget-pwd">忘记密码？</a>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td width="245"><input id="btn" class="confirm" type="button" value="登  录" ></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
             </div>
                             
        </div>
        <div class="bg-bubbles">
			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>          	
        </div>
    </body>
</html><?php }} ?>