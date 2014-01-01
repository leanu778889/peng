<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<!-- Mobile Devices Support @begin -->
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta content="no-cache" http-equiv="pragma">
<meta content="0" http-equiv="expires">
<meta content="telephone=no, address=no" name="format-detection">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<!-- Mobile Devices Support @end -->
<title>无标题文档</title>
<script type="text/javascript" src="__APP__/Public/js/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#btn2").click(function(){
    $("#hide").prepend("<dl>"+
                "<dt>"+"<font color='#ff0000'>*</font>演出招募类型："+"</dt>"+
                "<dd>"+"<input type='text' style=' width:42%' name='show_zm_type[]'/>"+"</dd>"+
        		"</dl>"+
				"<dl>"+
                "<dt>"+"<font color='#ff0000'>*</font>联系电话："+"</dt>"+
                "<dd>"+"<input type='text' name='tel'/>"+"</dd>"+
        		"</dl>"+
				"<dl>"+
                "<dt>"+"活动要求："+"</dt>"+
                "<dd>"+"<input type='text' />"+"</dd>"+
        		"</dl>"+
				"<dl>"+
                "<dt>"+"<font color='#ff0000'>*</font>主办方："+"</dt>"+
                "<dd>"+"<input type='text' />"+"</dd>"+
        		"</dl>"+
				"<dl>"+
                "<dt>"+"承办方："+"</dt>"+
                "<dd>"+"<input type='text' />"+"</dd>"+
        		"</dl>"+
				"<dl>"+
                "<dt>"+"<font color='#ff0000'>*</font>预计演出地点："+"</dt>"+
                "<dd>"+"<input type='text' />"+"</dd>"+
        		"</dl>"+
				"<dl>"+
                "<dt>"+"<font color='#ff0000'>*</font>活动演出主题："+"</dt>"+
                "<dd>"+"<input type='text' />"+"</dd>"+
        		"</dl>"+
				"<dl>"+
                "<dt>"+"<font color='#ff0000'>*</font>预计演出时间："+"</dt>"+
                "<dd>"+"<input type='text' />"+"</dd>"+
        		"</dl>"
				
			);
  });
  
});
</script>
<link href="__APP__/Public/css/style111(2).css" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="bodyer"> 
	<div class="top">
    	<img src="__APP__/Public/images/logo.png">
        <ul>
        	
            <li>注册</li>
            <li>|</li>
            <li>登录</li>
        </ul>
    </div>
	<div class="login_top">
    	<span>活动演出注册信息</span>
    </div>
    <form name="form1" method="post" action="__APP__/Register/addactivities"  enctype="multipart/form-data">
	<div class="login_btm">
    <div style=" height:20px;"></div>
    		<dl>
                <dt><font color="#FF0000";>*</font>用户名：</dt>
                <dd><input type="text" name="username" /></dd>
        	</dl>
            <dl>
                <dt><font color="#FF0000";>*</font>密码：</dt>
                <dd><input type="text"  name="password"/></dd>
            </dl>
            <dl>
                <dt><font color="#FF0000";>*</font>确认密码：</dt>
                <dd><input type='text' name="repassword"/></dd>
            </dl>
            <dl>
                <dt><font color="#FF0000";>*</font>演出招募类型：</dt>
                <dd><input type="text" style=" width:42%" name="show_zm_type[]"/>
                </dd>
            </dl>
            <dl>
                <dt><font color="#FF0000";>*</font>联系电话：</dt>
                <dd><input type='text' name="tel[]"/></dd>
            </dl>
            <dl>
                <dt>活动要求：</dt>
                <dd><input type="text" name="need[]"/></dd>
        	</dl>
            <dl>
                <dt><font color="#FF0000";>*</font>主办方：</dt>
                <dd><input type="text" name="host[]"/></dd>
        	</dl>
            <dl>
                <dt>承办方：</dt>
                <dd><input type="text" name="undertake[]"/></dd>
            </dl>
            <dl>
                <dt><font color="#FF0000";>*</font>预计演出地点：</dt>
                <dd><input type='text' name="showplace[]"/> </dd>
            </dl>
            <dl>
                <dt><font color="#FF0000";>*</font>活动演出主题：</dt>
                <dd><input type="text" name="thum[]"/></dd>
        	</dl>
            <dl>
                <dt><font color="#FF0000";>*</font>预计演出时间：</dt>
                <dd><input type="text" name="spendtime[]"/>
                <input type="button" value="添加" style="width:50px; background-image:url(__APP__/Public/images/bt_bj.png);color:#FFF; margin-left:10px;box-shadow:0 0 0 #FFF inset;" id="btn2"/></dd>
            </dl>
           	<div id="hide"></div>
            <div>
            
        </div>      
 		<input type="submit" class="login_btn" value="提交"/>
        <div style="height:30px;"></div>
    </div>
    </form>
</div>
</body>
</html>