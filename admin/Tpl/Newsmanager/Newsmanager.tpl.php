<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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
<div class="wrap">
	
	<form class="J_ajaxForm" data-role="list" action="" method="post">
	<div class="mb10">
		<a href="#" id="J_start_all" class="mr5">操作说明</a>
		<span>管理公告信息</span>
	</div>
	<div class="table_list">
		<table width="100%" id="J_table_list" style="table-layout:fixed;">
			<colgroup>
				<col width="180">
				<col width="190">
				<col width="220">
				<col width="220">
			</colgroup>
			<thead>
				<tr>
					<td>公告标题</td>
					<td>发布时间</td>
					<td>发布人</td>
					<td>操作</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($res as $key=>$value){?>
			<tr id="J_forum_tr_1">
				<td><?php echo $value['title']?></td>
				<td><?php echo date("Y-m-d H:i:s",$value['time'])?></td>
				<td><?php echo $value['author']?></td>
				<td><a href="admin.php?m=Newsmanager&a=rebuilt&a_id=<?php echo $value['a_id']?>" target="_blank" class="mr5">[修改]</a><a class="J_ajax_del" href="admin.php?m=Newsmanager&a=del" data-pdata="{'aid':'<?php echo $value['a_id']?>'}">[删除]</a></td>
			</tr>
			<?php }?>
			</tbody>
			</table>
	</div>
	
	
</div>
<script src="<?php echo JS_PATH_ADMIN?>common.js"></script>
<script>
Wind.js('<?php echo JS_PATH_ADMIN;?>announceSub.js');
</script>
</body>
</html>