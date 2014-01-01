
 <!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title></title>
<link href="<?php echo CSS_PATH_ADMIN?>admin_style.css" rel="stylesheet" />
<link href="<?php echo CSS_PATH_ADMIN?>sss.css" rel="stylesheet" />
<script>
//全局变量，是Global Variables不是Gay Video喔
var GV = {
	JS_ROOT : "<?php echo JS_PATH_ADMIN;?>",																									//js目录
	JS_VERSION : "",																										//js版本号
	TOKEN : '',	//token ajax全局
	REGION_CONFIG : {},
	SCHOOL_CONFIG : {},
	URL : {
		LOGIN : '',																													//后台登录地址
		IMAGE_RES: '<?php echo IMAGES_PATH_ADMIN;?>'																									//图片目录
			
	}
};
</script>
<script src="<?php echo JS_PATH_ADMIN?>wind.js"></script>
<script src="<?php echo JS_PATH_ADMIN?>jquery.js"></script>
<script src="<?php echo JS_PATH_ADMIN?>formvalidator.js"></script>
<script src="<?php echo JS_PATH_ADMIN?>formvalidatorregex.js"></script>
 <script type="text/javascript">

$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#users_pwd").formValidator({onshow:"请输入密码",onfocus:"请输入数字和字符"}).regexValidator({regexp:"username",datatype:"enum",onerror:"请输入数字和字符"}).inputValidator({min:6,max:20,onerror:"密码应在6-20位之间"});
	$("#users_pwds").formValidator({onshow:"请输入二次密码",onfocus:"请输入数字和字符"}).regexValidator({regexp:"username",datatype:"enum",onerror:"请输入数字和字符"}).inputValidator({min:6,max:20,onerror:"密码应在6-20位之间"});

});


</script>
</head>
<body>
<div class="wrap">
	<div class="nav">
		
	</div>
<!--==============================添加用户================================-->
	<form class="J_ajaxForm" data-role="list" id="J_announce_form" action="admin.php?m=Party&a=addparty" method="post" id="myform">
	<div class="mb10">
		<a href="#" id="J_start_all" class="mr5">操作说明</a>
		<span>添加用户的信息</span>
	</div>
	<div class="h_a">添加普通用户</div>
	<div class="table_full">
		<table width="100%">
			<colgroup>
				<col class="th">
				<col width="800">
				<col width="200">
			</colgroup>
			<tr>
				<th>用户名</th>
				<td><input name="info[name]" type="text" class="input length_4" id="users_name"></td>
				<td></td>
			</tr>
			<tr>
				<th>密码</th>
				<td><input name="info[pwd]" type="text" class="input length_4" id="users_pwd"></td>
				<td></td>
			</tr>
			<tr>
				<th>二次密码</th>
				<td><input name="info[repwd]" type="text" class="input length_4" id="users_pwds"></td>
				<td></td>
			</tr>
			<tr>
				<th>用户类型</th>
				<td>
	      		<select name="info[type]">
	      			<option value='1'>演员</option>
	      			<option value='1'>剧组</option>
	      		</select>
			<br>
			</volist></td>
				<td></td>
			</tr>
			
		</table>
	</div>
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<button class="btn btn_submit J_ajax_submit_btn" id="J_announce_sub" type="submit">提交</button>
		</div>
	</div>
		</form>
	</div>

</body>
<script src="<?php echo JS_PATH_ADMIN;?>common.js"></script>
</html>