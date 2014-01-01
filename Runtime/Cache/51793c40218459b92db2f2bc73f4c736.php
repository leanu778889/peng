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
<link href="__APP__/Public/css/style111(2).css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__APP__/Public/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$(".nn").click(function(){
    $(".list_n").slideToggle("slow");
	
  });
  $(".vv").click(function(){
    $(".list_v").slideToggle("slow");
  });
});

</script>
<script type="text/javascript">
$(function(){
		$(".nn").click(function(){
			$(".nn").find("span").removeClass("ttag");
			$(this).addClass("ttag");
		});
		$(".vv").click(function(){
			$(".vv").find("span").removeClass("ttag");
			$(this).addClass("ttag");
		});
	});
</script>
</head>

<body>
<div class="bodyer">
	<div class="top">
    	<img src="__APP__/Public/images/logo.png" height="60">
        <ul>
        	<li>还没有***账号？</li>
            <li>注册</li>
            <li>|</li>
            <li>登录</li>
        </ul>
    </div>
    <div class="top_list">请选择类型注册或登录</div>
	<div class="nan nn">
    	<label>注册类型</label><span class="tag ttag"></span>
    </div>
    <div class="yy_list list_n">
    	<ul>
        	<a href="__APP__/Register/addteam"><li>电视剧电影注册</li></a>
            <a href="__APP__/Register/addmes"><li>演员注册</li></a>
            <a href="__APP__/Register/addcolumn"><li>电视栏目注册</li></a>
            <a href="__APP__/Register/addactivities"><li>活动演出注册</li></a>
            <a href="__APP__/Register/addbiggame"><li>大赛注册</li></a>
            <a href="__APP__/Register/addadvert"><li>广告代言注册</li></a>
            <a href="__APP__/Register/addmodern"><li>话剧注册</li></a>
            <a href="__APP__/Register/addboss"><li>BOSS注册</li></a>
            <a href="__APP__/Register/adddirector"><li>导演注册</li></a>
            <a href="__APP__/Register/addwriter"><li>编剧注册</li></a>
            <a href="__APP__/Register/addadvertiser"><li>广告植入注册</li></a>
        </ul>
    </div>
    <a href="login.html" style=" color:#333;">
    <div class="nv">
    	<label>登录类型</label><span class="ttag"></span>
    </div>
    </a>
   
</div>

</body>
</html>