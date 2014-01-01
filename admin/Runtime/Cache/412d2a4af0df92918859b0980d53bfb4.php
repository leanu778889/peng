<?php if (!defined('THINK_PATH')) exit();?>
 <!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title></title>
<link href="./admin/Public/Css/admin_style.css" rel="stylesheet" />
<link href="./admin/Public/Css/sss.css" rel="stylesheet" />
<script> 
//全局变量，是Global Variables不是Gay Video喔
var GV = {
	JS_ROOT : "./admin/Public/Js/",//js目录
	JS_VERSION : "",//js版本号
	TOKEN : '',	//token ajax全局
	REGION_CONFIG : {},
	SCHOOL_CONFIG : {},
	URL : {
		LOGIN : '',//后台登录地址
		IMAGE_RES: './admin/Public/Images/' //图片目录
	}
};
</script>
<script src="./admin/Public/Js/wind.js"></script>
<script src="./admin/Public/Js/jquery.js"></script>
<script src="./admin/Public/Js/formvalidator.js"></script>
<script src="./admin/Public/Js/formvalidatorregex.js"></script>
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
	<form   class="J_ajaxForm" id="J_announce_form" action="admin.php?m=Party&a=addparty" method="post" id="myform">
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
				<td><input name="info[pwds]" type="text" class="input length_4" id="users_pwds"></td>
				<td></td>
			</tr>
			<tr>
				<th>用户类型</th>
				<td><?php if(is_array($typename)): $i = 0; $__LIST__ = $typename;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><label>
	        <input type="checkbox" name="type[]" value="<?php echo ($sub["t_id"]); ?>" id="type_<?php echo ($sub["t_id"]); ?>">
	        <?php echo ($sub["t_name"]); ?></label>
			<br><?php endforeach; endif; else: echo "" ;endif; ?></td>
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

</html>