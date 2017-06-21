<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>铁路车辆检修互动实训系统</title>
<link href="__PUBLIC__/dwz/themes/css/login.css" rel="stylesheet" type="text/css" />
<script src="__PUBLIC__/dwz/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script language="JavaScript">
<!--
function fleshVerify(){ 
	var timenow = new Date().getTime();
	$('#verifyImg').attr("src", '__URL__/verify/'+timenow);
}
//-->
</script>
	<style type="text/css">
		.loginForm label{ color:#375c6f;}
	</style>
</head>
<body>
<div id="login">
	<div id="login_header">
		<h1 class="login_logo">
			<a href="__APP__"><img src="__PUBLIC__/dwz/themes/default/images/login_logo.png" /></a>
		</h1>
		<div class="login_headerContent">
			<div class="navList">
				
			</div>
			<h2 class="login_title"><img src="__PUBLIC__/dwz/themes/default/images/login_title.png" /></h2>
		</div>
	</div>
	<div id="login_content">
		<div class="loginForm">
			<form method="post" action="__URL__/ajaxCheckAdminLogin" id="loginFrm">
				<p>
					<label>帐　号：</label>
					<input type="text" name="account" size="20" class="login_input" />
				</p>
				<p>
					<label>密　码：</label>
					<input type="password" name="password" size="20" class="login_input" />
				</p>
				<p>
					<label>验证码：</label>
					<input class="code" name="verify" type="text" size="5" />
					<span><img id="verifyImg" SRC="__URL__/verify/" onClick="fleshVerify()" border="0" alt="点击刷新验证码" style="cursor:pointer" align="absmiddle"></span>
				</p>
				<div class="login_bar">
					<input class="sub" id="loginBtn" type="button" value=" " />
				</div>
			</form>
		</div>
		<div class="login_banner"><img src="__PUBLIC__/dwz/themes/default/images/login_banner4.png" /></div>
	</div>
	<div id="login_footer">
		Copyright &copy;  武汉风河信息科技有限公司 Inc. All Rights Reserved.
	</div>
</div>
</body>
</html>
<script>
$(function(){
	$("#loginBtn").click(function(){
		var account = $("input[name='account']").val();
	    var password = $("input[name='password']").val();
	    var code = $("input[name='verify']").val();
	    if(account == ""){
	    	alert("请输入用户名");
	    	return false;
	    }else if(password == ""){
	    	alert("请输入密码");
	    	return false;
	    }else if(code == ""){
	    	alert('请输入验证码');
	    	return false;
	    }else{
	    	var param = $("#loginFrm").serialize();
	    	var url = $("#loginFrm").attr('action');
	    	$.post(url, param, function(data){
	    		if(data.status == 1){
	    			window.location = '<?php echo U("Index/AdminDisplay"); ?>';
	    		}else{
	    			alert(data.data);
	    			window.location.reload(); 
	    		}
	    	}, 'json')
	    }
	   
	})
	
})
</script>