<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>捧后台管理中心--用户视频审核</title>
<link href="<?php echo CSS_PATH_ADMIN?>admin_style.css" rel="stylesheet" />
<script>
//全局变量，是Global Variables不是Gay Video喔

</script>
<script src="<?php echo JS_PATH_ADMIN?>wind.js"></script>
<script src="<?php echo JS_PATH_ADMIN?>jquery.js"></script>

</head>
<body>
<div class="wrap">
	
	<form class="J_ajaxForm" data-role="list" action="" method="post">
	<div class="mb10">
		<a href="#" id="J_start_all" class="mr5">操作说明</a>
		<span>审核用户图像</span>
	</div>
	<div class="table_list">
		<table width="100%" id="J_table_list" style="table-layout:fixed;">
			<colgroup>
				<col width="180">
			</colgroup>
			<thead>
				<tr>
					<td>用户名</td>
					<td>视频地址</td>
					<td>操作</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($actmess as $key=>$value){?>
			<tr id="J_forum_tr_1">
				<td><?php echo $value['truename']?></td>
				<td><a href="<?php echo $value['vediopath']?>"><?php echo $value['vediopath']?></a><br><a href="?m=Examine&a=noo">【删除】</td>
				<td><a href="?m=Examine&a=rebuilt&a_id=<?php echo $value['a_id']?>" class="mr5">【通过】</a></td>
			</tr>
			<?php }?>
			</tbody>
			</table>
	</div>
	
	
</div>
<script src="<?php echo JS_PATH_ADMIN?>common.js"></script>

</body>
</html>