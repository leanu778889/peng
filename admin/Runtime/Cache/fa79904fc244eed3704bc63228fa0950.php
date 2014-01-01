<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title></title>
<link href="<?php echo CSS_PATH_ADMIN;?>admin_style.css" rel="stylesheet" />
<link href="<?php echo CSS_PATH_ADMIN;?>sss.css" rel="stylesheet" />
<script> 
//全局变量，是Global Variables不是Gay Video喔
var GV = {
	JS_ROOT : "<?php echo JS_PATH_ADMIN ;?>",//js目录
	JS_VERSION : "",//js版本号
	TOKEN : '',	//token ajax全局
	REGION_CONFIG : {},
	SCHOOL_CONFIG : {},
	URL : {
		LOGIN : '',//后台登录地址
		IMAGE_RES: '<?php echo IMAGES_PATH_ADMIN;?>' //图片目录
	}
};
</script>
<script src="<?php echo JS_PATH_ADMIN;?>wind.js"></script>
<script src="<?php echo JS_PATH_ADMIN;?>jquery.js"></script>
 
</head>
<body>
<div class="wrap">	
	<div class="nav">
		<ul class="cc">
			<li  class="current">
			<a href="">用户设置</a></li>	
		</ul>
	</div>
	<div class="mb10">
			<a  class="btn" href="admin.php?m=User&a=useradd">
			<span class="add"></span>添加用户</a>
	</div>
	<div class="table_list">
		<table width="100%">
			<colgroup>
				<col width="150">
				<col width="280">
				<col width="280">	
			</colgroup>
			<thead>
				<tr>
					<td>用户ID</td>
					<td>用户名称</td>
					<td>用户组</td>
					<td>操作</td>
				</tr>
			</thead>
			<?php if(!empty($am)){foreach ($am as $key=>$value){?>
				<tr>
					<td><?php echo $value[user_id];?></td>
					<td><?php echo $value[user_name];?></td>
					<td><?php echo $value['usgp_id'];?></td>
				
					<?php if($value[user_name]=='admin'){ ?> 
					<td><a>[重置密码]</a>
					    <a>[删除]</a></td>
					<?php }else{ ?>
					<td><a data-msg="确定要重置此密码吗？" href="admin.php?m=User&a=resetpwd" 
						data-pdata="{'id': '<?php echo $value[user_id]; ?>'}" class="J_ajax_del">[重置密码]</a>
					    <a href="admin.php?m=User&a=usersdel" class="J_ajax_del"
					    data-pdata="{'id': '<?php echo $value[user_id]; ?>'}">
					[删除]</a></td>
					<?php } ?>
				</tr>
			<?php }} ?>
		</table>
	
    </div>
</div>	
</div>
<script src="<?php echo JS_PATH_ADMIN;?>common.js"></script>
</body>
</html>