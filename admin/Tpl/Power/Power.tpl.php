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
<script src="<?php echo JS_PATH_ADMIN;?>wind.js"></script>
<script src="<?php echo JS_PATH_ADMIN;?>jquery.js"></script>
</head>
<body>
<div class="wrap">
	<div class="h_a">选择用户组</div>
	<div class="search_type cc mb10">
		<form name='form1' action="admin.php?m=Power&a=group" method="post">
		<label>用户组：</label>
			<select name="group[usgp_id]" class="select_2">
			
				<option value="">请选择用户组</option>
				<?php if(!empty($group)){foreach($group as $keyg=>$valueg){ if($valueg['usgp_id'] != 1){?>
				<option <?php if(!empty($usgp_id)&& $usgp_id ==$valueg['usgp_id']){echo 'selected="selected"';}?> value="<?php echo $valueg['usgp_id'];?>" ><?php echo $valueg['usgp_name'];?></option>
				
				<?php }}}?>
			</select>
		<button type="submit" class="btn">确定选择</button>
</form>
	</div>
	
	<div class="h_a">修改权限</div>
	<form class="J_ajaxForm" action="admin.php?m=Power&a=powewr_ajax" method="post">
	<div class="table_full J_check_wrap">
		<table width="100%">
			<colgroup><col class="th">
			<col width="400">
			<col>
			</colgroup>
            <tbody id="tbody">
			<?php if(!empty($data_p)){foreach($data_p as $key=>$value){
			    
			    ?>
				
				<tr>
				<th><label><input id="J_role_<?php echo $value['menu_id'];?>" class="J_check_all" data-direction="y" data-checklist="J_check_<?php echo $value['menu_id']; ?>" type="checkbox"><span><?php echo $value['menu_name'];?></span></label></th>
				<td>
					<ul data-name="<?php echo $value['menu_id'];?>" class="three_list cc J_ul_check">
						<?php 
						 $men = M('menus');
							 $data_c = $men->where(array('menu_pid'=>$value['menu_id']))->select();
    	                     if(!empty($data_c)){
    	                         foreach($data_c as $k => $v){
			                ?>
			                	
								<li><label><input name="customs[<?php echo $value['menu_id'];?>][<?php echo $k;?>]" data-yid="J_check_<?php echo $value['menu_id']; ?>" <?php if(isset($muid)&& in_array($v['menu_id'], $muid)){echo 'checked="checked"';}?> class="J_check" value="<?php echo $v['menu_id'];?>" type="checkbox"><span><?php echo $v['menu_name'];?></span></label></li>
						<?php }}?>
											</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
            <?php  }}?>		
			</tbody>
          </table>
	</div>
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<button class="J_ajax_submit_btn btn btn_submit" type="submit">提交</button>
		</div>
	</div>
	<input name="usgp_id" value="<?php echo $usgp_id ;?>" type="hidden"></form>
</div>
<script src="<?php echo JS_PATH_ADMIN;?>common.js"></script>
<script>
var ROLE_AUTH_CONFIG = []; //当前角色的已有权限集合
Wind.js(GV.JS_ROOT+ 'role_manage.js');
</script>


</body></html>