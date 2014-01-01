<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title></title>
<link href="<?php echo CSS_PATH_ADMIN?>admin_style.css" rel="stylesheet" />
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
</head>
<body>
<form class="J_ajaxForm" data-role="list" action="admin.php?m=Actormess&a=close" method="post">
<div class="wrap">
	<div id="home_toptip"></div>
		<h2 class="h_a">用户信息</h2>
		<div class="table_full J_check_wrap">
		<table width="100%">
			<colgroup><col class="th">
			<col width="400">
			<col>
			</colgroup>
            <tbody id="tbody">	
			<tr>
				<th><label><span>用户名:</span></label></th>
				<td>
					<ul data-name="13" class="three_list cc J_ul_check">
									                	
								<li><label><span>真实姓名:</span></label></li>
																	</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th><label><span>真实姓名:</span></label></th>
				<td>
					<ul data-name="13" class="three_list cc J_ul_check">
									                	
								<li><label><span>真实姓名:</span></label></li>
																	</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th><label><span>类型:</span></label></th>
				<td>
					<ul data-name="13" class="three_list cc J_ul_check">
									                	
								<li><label><span>个人图像:</span></label></li>
																	</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th><label><span>个人照片</span></label></th>
				<td>
					<ul data-name="13" class="three_list cc J_ul_check">
									                	
								<li><label><span>演员简历审核</span></label></li>
																	</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th><label><span>简历审核</span></label></th>
				<td>
					<ul data-name="13" class="three_list cc J_ul_check">
									                	
								<li><label><span>演员简历审核</span></label></li>
																	</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			</tbody>
			</table>
			</div>

</div>
<button id="J_forum_search" class="btn btn_submit J_ajax_submit_btn"  type="submit" >关闭</button></td>
<p style="height:1000px;"></p>
</form>
</body>
</html>
<script src="<?php echo JS_PATH_ADMIN;?>common.js"></script>
<script>
Wind.use(GV.JS_ROOT +'task_manage.js');
</script>