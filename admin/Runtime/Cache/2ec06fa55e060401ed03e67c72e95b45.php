<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title></title>
<link href="<?php echo CSS_PATH_ADMIN?>admin_style.css" rel="stylesheet" />
<script src="<?php echo JS_PATH_ADMIN?>wind.js"></script>
<script src="<?php echo JS_PATH_ADMIN?>jquery.js"></script>
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
</head>
<body>
<div class="wrap">
	
	<form class="J_ajaxForm" data-role="list" action="http://localhost/phpwind/admin.php?m=bbs&c=setforum&a=dorun" method="post">
	<div class="mb10">
		<a href="#" id="J_start_all" class="mr5">操作说明</a>
		<span>简历审核管理</span>
	</div>
	<div class="table_list">
		<table width="100%" id="J_table_list" style="table-layout:fixed;">
			<tbody>
			<tr id="J_forum_tr_1">
				<td width="49%">剧组：笑傲江湖</td>
				<td width="51%">&nbsp;</td>
			</tr>
			<tr>
				<td>角色：令狐冲</td>
				<td>角色：东方不败</td>
			</tr>
			<tr>
				<td>候选人员：</td>
				<td>候选人员：</td>
			</tr>
			<tr>
				<td height="135"><table width="350" border="0">
				  <tr>
				    <td width="70" height="90"><img src="#" height="90" width="70"></td>
				    <td width="70" height="90"><img src="#" height="90" width="70"></td>
				    <td width="70" height="90"><img src="#" height="90" width="70"></td>
				    <td width="70" height="90"><img src="#" height="90" width="70"></td>
                    <td width="70" height="90"><img src="#" height="90" width="70"></td>
				    <td width="70" height="90"><img src="#" height="90" width="70"></td>
			      </tr>
				  <tr>
				    <td height="41"><span>黄晓明</span>&nbsp;<span style="color:#F00"><a href="__APP__/Examine/yes">[通过]</a><a href="__APP__/Examine/no">[驳回]</a></span></td>
				    <td>赵前安&nbsp;[通过][驳回]</td>
				    <td>刘德华&nbsp;[通过][驳回]</td>
				    <td>成龙&nbsp;[通过][驳回]</td>
                    <td>赵前安&nbsp;[通过][驳回]</td>
				    <td>刘德华&nbsp;[通过][驳回]</td>
			      </tr>
			    </table></td>
                <td height="135"><table width="350" border="0">
				  <tr>
				    <td width="70" height="90"><img src="#" height="90" width="70"></td>
				    <td width="70" height="90"><img src="#" height="90" width="70"></td>
				    <td width="70" height="90"><img src="#" height="90" width="70"></td>
				    <td width="70" height="90"><img src="#" height="90" width="70"></td>
			      </tr>
				  <tr>
				    <td height="41">黄晓明&nbsp;[通过][驳回]</td>
				    <td>赵前安&nbsp;[通过][驳回]</td>
				    <td>刘德华&nbsp;[通过][驳回]</td>
				    <td>成龙&nbsp;[通过][驳回]</td>
			      </tr>
			    </table></td>
			</tr>
            	
			</tbody>
			</table>
	</div>
	
	
</div>
<script src="<?php echo JS_PATH_ADMIN?>common.js"></script>

</body>
</html>