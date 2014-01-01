<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
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
	<div class="h_a">搜索</div>
	<div class="table_full">
		<form id="J_forum_search_form" method="post" action="http://localhost/phpwind/admin.php?m=bbs&c=setforum&a=searchforum">
			<table width="100%">
				<tr>
					<td>
						<div class="fl">
							<div id="J_search_suggestion" class="forum_search_pop" style="display:none;margin-top:25px;"></div>
						</div>
						<input id="J_search_input" class="input length_3 mr10" name="keyword" autoComplete="off" type="text"><button id="J_forum_search" class="btn btn_submit" type="submit">搜索</button></td>
				</tr>
			</table>
		<input type="hidden" name="csrf_token" value="64d602577a8be593"/></form>
	</div>
	<form class="J_ajaxForm" data-role="list" action="http://localhost/phpwind/admin.php?m=bbs&c=setforum&a=dorun" method="post">
	<div class="mb10">
		<a href="#" id="J_start_all" class="mr5">操作说明</a>
		<span>请谨慎评定用户的星级</span>
	</div>
	<div class="table_list">
		<table width="100%" id="J_table_list" style="table-layout:fixed;">
			<colgroup>
				<col width="110">
				<col width="120">
				<col width="300">
				<col width="130">
			</colgroup>
			<thead>
				<tr>
					<td>用户名</td>
					<td><span class="mr5">用户真实姓名</td>
					<td>用户等级</td>
					<td>用户图像</td>
					<td>演员类型</td>
					<td>操作</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($res as $key=>$value){?>
			<tr id="J_forum_tr_<?php echo $value['a_id'];?>">
				<td><?php echo $value['p_name']?></td>
				<td><?php echo $value['truename']?></td>
				<td><input type="radio" name="level" class="xingji" id="<?php echo $value['a_id']?>" value='1'>1
					<input type="radio" name="level" class="xingji" id="<?php echo $value['a_id']?>" value='2'>2
					<input type="radio" name="level" class="xingji" id="<?php echo $value['a_id']?>" value='3'>3
					<input type="radio" name="level" class="xingji" id="<?php echo $value['a_id']?>" value='4'>4
					<input type="radio" name="level" class="xingji" id="<?php echo $value['a_id']?>" value='5'>5
					<input type="radio" name="level" class="xingji" id="<?php echo $value['a_id']?>" value='6'>6
					<input type="radio" name="level" class="xingji" id="<?php echo $value['a_id']?>" value='7'>7
				</td>
				<td><img src="Public/uploads/<?php echo $value['imagepath']?>" height="35" width="50"></td>
				<td><?php echo $value['t_name']?></td>
				<td><a href="admin.php?m=Actormess&a=seemore&aid=<?php echo $value['a_id']?>">[查看详细信息]</a></td>
			</tr>
			<?php }?>
			</tbody>
			</table>
	</div>
	
	
</div>
<script src="<?php echo JS_PATH_ADMIN?>common.js"></script>
<script type="text/javascript">
	$(function(){
		$('.xingji').click(function(){
			var aid=this.id;
			var val=$(this).val()+'_'+this.id;
			$.get('admin.php?m=Level&a=reb','val='+val,function(data){
				if(data=='1'){
					//alert(aid);
					$('#J_forum_tr_'+aid).fadeOut(1000);
				}else{
					alert('录入失败');
				}
			});
		});
	})
</script>
</body>
</html>