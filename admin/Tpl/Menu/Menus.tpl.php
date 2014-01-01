<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title></title>
<link href="<?php echo CSS_PATH_ADMIN;?>admin_style.css" rel="stylesheet">
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
<script src="<?php echo JS_PATH_ADMIN?>dialog.js" type="text/javascript"></script>
<script src="<?php echo JS_PATH_ADMIN?>ajaxForm.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	var $all=$('span');
	$('tr.parent').click(function(){   // 获取所谓的父行
			$(this)
				.toggleClass("selected")   // 添加/删除高亮
				.siblings('.child_'+this.id).toggle();  // 隐藏/显示所谓的子行
	}).click();
	$all.click(function(){
		if($all.is('#'+this.id)){
             $("#"+this.id)
             .toggleClass("J_start_icon away_icon");

			}else{

              $("$"+this.id)
              .removeclass("J_start_icon away_icon")
              .addclasss("J_start_icon start_icon");

				}
	})
           
});
</script>
</head>
<body>
<div class="wrap">
<!--===================任务列表====================-->
<form class="J_ajaxForm" data-role="list" action="admin.php?m=Menu&a=sort" method="post">
	<div class="h_a">基本设置</div>
	<div class="table_full">
		<!--<table width="100%">
			<colgroup><col class="th">
			<col width="400">
			<col>
			</colgroup><tbody><tr>
				<th>任务中心</th>
				<td>
					<ul class="switch_list cc">
						<li><label><input name="isOpen" value="1" checked="checked" type="radio"><span>开启</span></label></li>
						<li><label><input name="isOpen" value="0" type="radio"><span>关闭</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
		</tbody></table>
	--></div>
	<div class="mb10"><a href="admin.php?m=Menu&a=addmenu" class="btn"><span class="add"></span>添加新菜单</a></div>
	<div class="table_list">
		<table class="J_check_wrap" width="100%">
			<colgroup>
				<col width="50">
				<col width="50">
				<col width="120">
				<col width="50">
				<col width="80">
				<col width="80">
				<col width="60">
				<col width="60">
				<col width="250">
			</colgroup>
			<thead>
				<tr>
				<td>&nbsp;</td>
					<td>排序</td>
					<td>菜单名称</td>
					<td><label>启用(是：<font color='green' size='3'>√</font> 否：<font color='red' size='4'>×</font>)</label></td>
					<td>M</td>
					<td>A</td>
					<td>级数</td>
					<td>父级</td>
					<td>操作</td>
				</tr>
			</thead>
						<tbody>
						<?php foreach($menus as $key =>$value){
						    if($value['menu_pid'] != 0){
						     $value['menu_name'] = '<span class="plus_icon"></span>'.$value['menu_name'];   
						        
						    }
						    
						 ?>
						<tr <?php if($value['menu_pid'] == 0){?> class="parent" id="row_<?php echo $value['menu_id'];?>" <?php } else{?>class="child_row_<?php echo $value['menu_pid']?>"<?php }?>>
				<td><?php if($value['menu_pid'] == 0&&$value['child']==0){?><span  class="zero_icon mr10">&nbsp;</span><?php }elseif($value['menu_pid'] == 0&& $value['child']==1){?><span class="J_start_icon start_icon" id="show_<?php echo $key;?>" data-id="1"></span><?php }?></td>
				<td><input type="nember" class="input length_0" name="orderid[<?php echo $value['menu_id']?>]" value="<?php echo $value['menu_sort']?>" /></td>			
				
				<td><?php  echo $value['menu_name']?></td>
				<td><a href="admin.php?m=Menu&a=editsort&menuid=<?php echo $value['menu_id']?>"><?php if($value['menu_state'] == 1){?> <font color='green' size='3'>√</font> <?php }else{?><font color='red' size='5'>×</font> <?php } ?></a></td>
			    <td><?php echo $value['menu_m']?></td>
				<td><?php echo $value['menu_a']?></td>
				<td><?php echo $value['menu_rank']?></td>
				<td><?php echo $value['menu_pid']?></td>
				<td><?php if($value['menu_pid'] == 0){?><a href="admin.php?m=Menu&a=towlevel&pid=<?php echo $value['menu_id']?>&pname=<?php echo $value['menu_name']?>">[添加二级菜单]</a><?php }?><a href="admin.php?m=Menu&a=editmenu&menuid=<?php echo $value['menu_id']?>" class="mr5">[编辑]</a>
				<a class="J_ajax_del" href="admin.php?m=Menu&a=deletemenu" data-pdata="{'menuid':'<?php echo $value['menu_id']?>'}">[删除]</a></td>
			</tr>
			            <?php }?>
					</tbody></table>
		<div class="p10"></div>
	</div>
		<div class="">
		<div class="btn_wrap_pd">
			<button class="btn btn_submit" type="submit">排序</button>
		</div>
	</div>
	</form>
</div>
<script src="<?php echo JS_PATH_ADMIN;?>common.js"></script>

</body></html>