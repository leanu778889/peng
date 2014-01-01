<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title></title>
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
				<col width="190">
				<col width="220">
				<col width="220">
			</colgroup>
			<thead>
				<tr>
					<td>用户名</td>
					<td>用户图像</td>
					<td>操作</td>
				</tr>
			</thead>
			<tbody>
			<?php if($actmess){?>
			<?php foreach ($actmess as $key=>$value){?>
			<tr id="J_forum_tr_1">
				<td><?php echo $value['truename']?></td>
				<td><?php foreach ($value['imglist'] as $mm=>$val){?><img src="Public/uploads/<?php echo $val?>" height="50" width="55"><a href="admin.php?m=Examine&a=imgdel&path=<?php echo $val;?>&a_id=<?php echo $value['a_id']?>">【删除】<?php }?></td>
				<td><a href="?m=Examine&a=rebuilt&a_id=<?php echo $value['a_id']?>" class="mr5">【通过】</a></td>
			</tr>
			<?php }}?>
			</tbody>
			</table>
	</div>
	
	
</div>
<script src="<?php echo JS_PATH_ADMIN?>common.js"></script>

</body>
</html>