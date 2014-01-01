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
<title>捧捧捧捧主页</title>
<script type="text/javascript" src="__APP__/Public/js/jquery.min.js"></script>
<link href="__APP__/Public/css/style111(2).css" rel="stylesheet" type="text/css" />
<script type="text/javascript">// <![CDATA[
var t = n = 0, count;
$(document).ready(function(){
count=$("#banner_list a").length;
$("#banner_list a:not(:first-child)").hide();
$("#banner_info").html($("#banner_list a:first-child").find("img").attr('alt'));
$("#banner_info").click(function(){window.open($("#banner_list a:first-child").attr('href'), "_blank")});
$("#banner li").click(function() {
var i = $(this).text() - 1;//获取Li元素内的值，即1，2，3，4
n = i;
if (i >= count) return;
$("#banner_info").html($("#banner_list a").eq(i).find("img").attr('alt'));
$("#banner_info").unbind().click(function(){window.open($("#banner_list a").eq(i).attr('href'), "_blank")})
$("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
$(this).css({"background":"",'color':'#ff0000'}).siblings().css({"background":"",'color':'#fff'});
});
t = setInterval("showAuto()", 4000);
$("#banner").hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 4000);});
})

function showAuto()
{
n = n >=(count - 1) ? 0 : ++n;
$("#banner li").eq(n).trigger('click');
}
// ]]></script>
</head>

<body>
<div class="bodyer">
	<div class="top">
    	<img src="__APP__/Public/images/logo.png">
        <ul>

            <a href="__APP__/Register/register.html"><li>注册</li></a>
            <li>|</li>
            <a href="__APP__/login.html"><li>登录</li></a>
        </ul>
    </div>

    <div class="banner" >
		  <div id="banner">
            <div id="banner_bg"></div>
            <!--标题背景-->
            <div id="banner_info"></div>
            <!--标题-->

            <ul>
            <li>01</li>
            <li>02</li>
            <li>03</li>
            <li>04</li>
            </ul>
            <div id="banner_list">
            <a href="###" target="_blank"><img src="__APP__/Public/images/banner.png" width="320" height="163" alt="" /></a>
            <a href="###" target="_blank"><img src="__APP__/Public/images/banner.png" width="320" height="163" alt="" /></a>
            <a href="###" target="_blank"><img src="__APP__/Public/images/banner.png" width="320" height="163" alt="" /></a>
            <a href="###" target="_blank"><img src="__APP__/Public/images/banner.png" width="320" height="163" alt="" /></a>
            </div>
          </div>
	</div>

    <div class="list">
    	<ul>
        	<li>
            	<dl>
                	<dt><img src="__APP__/Public/images/laba.png" height="5" width="6"></dt>
                    <dd>苏有朋称相亲是侮辱 将赴印度修行10天</dd>
                </dl>
            </li>
            <li>
            	<dl>
                	<dt><img src="__APP__/Public/images/laba.png" height="5" width="6"></dt>
                    <dd>苏有朋称相亲是侮辱 将赴印度修行10天</dd>
                </dl>
            </li>
            <li>
            	<dl>
                	<dt><img src="__APP__/Public/images/laba.png" height="5" width="6"></dt>
                    <dd>苏有朋称相亲是侮辱 将赴印度修行10天</dd>
                </dl>
            </li>
            <li>
            	<dl>
                	<dt><img src="__APP__/Public/images/laba.png" height="5" width="6"></dt>
                    <dd>苏有朋称相亲是侮辱 将赴印度修行10天</dd>
                </dl>
            </li>
            <li>
            	<dl>
                	<dt><img src="__APP__/Public/images/laba.png" height="5" width="6"></dt>
                    <dd>苏有朋称相亲是侮辱 将赴印度修行10天</dd>
                </dl>
            </li>
            <li>
            	<dl>
                	<dt><img src="__APP__/Public/images/laba.png"></dt>
                    <dd>苏有朋称相亲是侮辱 将赴印度修行10天</dd>
                </dl>
            </li>

        </ul>
    </div>
    <div class="appbtn">
    	<div class="APPleft">
        	<div class="top_j"><h3><a href="__APP__/teammessage.html">剧组信息</a></h3></div>
            <div class="btm"><h3><a href="__APP__/actmessage/index.html">演员信息</a></h3></div>
        </div>
        <div class="APPright"><h3>行业新闻</h3></div>
    </div>
    <div class="bner">
    	<dl>
        	<dt>推荐信息</dt>
            <dd></dd>
        </dl>
    </div>
    <div class="appbtn_w">
    	<div class="buttons_1">
        	<h3>会员专享</h3>
        </div>
        <div class="buttons_2">
        	<h3>地方指南针</h3>
        </div>
    </div>
    <div class="Prefecture">
    	<div class="fecture_1">横店专区</div>
        <div class="fecture_2">地方专区</div>
        <div class="fecture_2">地方专区</div>
        <div class="fecture_2">地方专区</div>
    </div>
    <div class="peng_body">
    	<div class="left">
        	<div class="left_top"><h3>Peng编剧</h3></div>
            <div class="left_btm"><h3>Peng利</h3></div>
        </div>
        <div class="right">
        	<div class="right_top"><h3>Peng导演</h3></div>
            <div class="right_btm"><h3>Peng Boss</h3></div>
        </div>
    </div>

    <div class="appbtn_btm">
    	<h3>强强联盟</h3>
    </div>

</div>

</body>
</html>