<html>
<head>
<title></title>
<link href="<?php echo CSS_PATH_ADMIN; ?>admin_style.css" rel="stylesheet" />

<style type="text/css">
#msg_win{border:1px solid #E5E3E3;background:#FFFFFF;width:300px;position:absolute;right:2;margin:0px;display:none;overflow:hidden;z-index:99;}
#msg_win .icos{position:absolute;top:2px;*top:0px;right:2px;z-index:9;}
.icos a{float:left;color:#A3A3A3;margin:1px;text-align:center;text-decoration:none;font-family:webdings;}
.icos a:hover{color:#fff;}
#msg_title{background:#446D91;border-bottom:1px solid #E5E3E3;border-top:1px solid #FFF;border-left:1px solid #FFF;color:#000;height:25px;line-height:25px;text-indent:5px;}
#msg_content{margin:10px;width:400px;height:auto;overflow:hidden; padding-bottom:20px;}
#msg_content a{ color:#26567E; text-decoration:none;}
#msg_content a:hover{color:#22527A; text-decoration:underline;}
.gap{ margin-left:20px; width:260px;}
.gap font{ font-size:16px; color:#666;}
.title{ font-size:18px; margin-left:10px; color:#666;}
</style>

</head>
<body>
<div class="wrap">
	<div id="home_toptip"></div>
	<?php if($_SESSION['usgp_id'] == 1){?>
	<h2 class="h_a">系统信息</h2>
	<div class="home_info">
		<ul>
		<?php foreach($sysinfo as $key=>$value){?>
			<li>
				<em><?php echo $key?></em>
				<span><?php echo $value;?></span>
			</li>
		<?php }?> 
			
		</ul>
	</div>
	<?php }?>
	<h2 class="h_a">系统公告</h2>
	<div class="home_info" id="home_devteam">
		<ul>
			<?php if(empty($gonggao)){?>
			<li><font color="red">暂时没有公告</font></li>
			<?php }else{foreach($gonggao as $gk => $gv){?>
			<li><a href="?m=annouce&c=annouce&a=testinit&id=<? echo $gv['annouce_id']?>"><?php echo $gv['annouce_title']?></a></li>
			<?php }}?>
		</ul>
	</div>
</div>



<p style="height:1000px;"></p>
<?php if(!empty($data)){ 
		foreach($data as $key=>$value){
		?>
<div id="msg_win" style="display:block;top:490px;visibility:visible;opacity:1;">
	<div class="icos"><a id="msg_min" title="最小化" href="javascript:void 0">-</a><a id="msg_close" title="关闭" href="javascript:void 0">×</a></div>
	<div id="msg_title">您有未读邮件~</div>
	<div id="msg_content">
	
	<tr><a href="?m=Email&c=Email&a=Emailcon&id=<?php echo $value['e_id'] ?>" onclick="state(<?php echo $value['e_id'] ?>);">
		<?php echo '<img src="./Statics/Backstage/images/m_10.png">';?><font class="title"><?php echo $value['e_sendman'] ?>【<?php echo str_cut($value['e_emailtitle'], 16); ?>】</font></tr>
	<tr><div class="gap"><font><?php echo str_cut($value['e_emailcontent'],42); ?></font></a></div></tr>
	
	</div>
</div>
<?php } } ?>
</body>
</html>
<script src="<?php echo JS_PATH_ADMIN; ?>jquery.js"></script>