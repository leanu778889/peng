<?php if (!defined('THINK_PATH')) exit();?>
 <!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title></title>
<link href="<?php echo CSS_PATH_ADMIN?>admin_style.css" rel="stylesheet" />
<link href="<?php echo CSS_PATH_ADMIN?>sss.css" rel="stylesheet" />
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
<script src="<?php echo JS_PATH_ADMIN?>formvalidator.js"></script>
<script src="<?php echo JS_PATH_ADMIN?>formvalidatorregex.js"></script>

<script type="text/javascript">
$(function(){
	$('#adddd').click(function(){
		var addput ="<input type='file'  name='photo[]'>";
		$('#selfimg').append(addput);
	})
	$('#addaddress').click(function(){
		var addput ="<input type='text' name='place_one'>";
		$('#url').append(addput);	
	})
	$('#addmajor').click(function(){
		var addput ="<br>角色:<td><input name='info[ro_name]' type='text' class='input length_2'>&nbsp;&nbsp;&nbsp;&nbsp;特点及要求<textarea class='input length_4' name='ro_introduce'></textarea>";
		$('#major').append(addput);
	})
})
</script>
</head>
<body>
<div class="wrap">
	<div class="nav">
		
	</div>
<!--==============================添加用户================================-->
	<form data-role="list"  action="admin.php?m=Party&a=addteammess" method="post" id="myform">
	<div class="mb10">
		<a href="#" id="J_start_all" class="mr5">操作说明</a>
		<span>添加用户的详细信息</span>
	</div>
	<div class="h_a">添加演员具体信息</div>
	<div class="table_full">
		<table width="100%">
			<colgroup>
				<col class="th">
				<col width="800">
				<col width="200">
			</colgroup>
			<tr>
				<th>剧组名：</th>
				<td><input name="info[j_name]" type="text" class="input length_4" id="j_name"></td>
				<td></td>
			</tr>
			<tr>
				<th>导演:</th>
				<td><input name="info[direct]" type="text" class="input length_4" id="direct"></td>
				<td></td>
			</tr>
			<tr>
				<th>建组时间:</th>
				<td><link rel="stylesheet" type="text/css" href="<?php echo JS_PATH_ADMIN?>calendar/jscal2.css"/>
			<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH_ADMIN?>calendar/border-radius.css"/>
			<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH_ADMIN?>calendar/win2k.css"/>
			<script type="text/javascript" src="<?php echo JS_PATH_ADMIN?>calendar/calendar.js"></script>
			<script type="text/javascript" src="<?php echo JS_PATH_ADMIN?>calendar/lang/en.js"></script><input type="text" name="info[j_time]" id="start_time" value="" size="10" class="input length_3" readonly>&nbsp;<script type="text/javascript">
			Calendar.setup({
			weekNumbers: false,
		    inputField : "start_time",
		    trigger    : "start_time",
		    dateFormat: "%Y-%m-%d",
		    showTime: false,
		    minuteStep: 1,
		    onSelect   : function() {this.hide();}
			});
        </script></td>
				<td></td>
			</tr>
			
			<tr>
				<th>公司名称:</th>
				<td><input name="info[company]" type="text" class="input length_4"></td>
				<td></td>
			</tr>
			<tr>
				<th>京审电视剧号:</th>
				<td><input name="info[j_checkname]" type="text" class="input length_4"></td>
				<td></td>
			</tr>
			<tr>
				<th>拍摄地点</th>
				<td><input name="info[j_address]" type="text" class="input length_4"></td>
				<td></td>
			</tr>
			<tr>
				<th>剧组类型:</th>
				<td><select name="info[ty_id]">
				<?php foreach($tetype as $ke=>$val){?>
				<option value="<?php echo $val['ty_id']?>"><?php echo $val['t_name']?></option>
				<?php }?>
				</select>
				</td>
				<td></td>
			</tr>
			<tr>
				<th>剧本简介:</th>
				<td><textarea class="input length_4" name="info[j_message]"></textarea>
				<td></td>
			</tr>
			<tr>
				<th>剧组简介</th>
				<td><textarea class="input length_4" name="info[j_introduction]"></textarea></td>
				<td></td>
			</tr>
			<tr id="major">
				<th>角色:</th>
				<td><input name="ro_name" type="text" class="input length_2">&nbsp;&nbsp;&nbsp;&nbsp;特点及要求<textarea class="input length_4" name="ro_introduce"></textarea></td>
				<td><button class="btn btn_submit J_ajax_submit_btn" id="addmajor" type="button">添加角色</button></td><br>
			</tr>
			 <tr>
			    <th>联系电话:</th>
			    <td><input type="text" name="info[j_tel]" class="input length_2"></td>
		    </tr>
		     <tr>
			    <th>状态:</th>
			    <td><input type="text" name="info[j_state]" class="input length_2"></td>
		    </tr>
		    <tr>
				<th>编剧:</th>
				<td><input name="info[writer]" type="text" class="input length_4" id="writer"></td>
				<td></td>
			</tr>
		     <tr>
			    <th>导演:</th>
			    <td><input type="text" name="info[direct]" class="input length_2"></td>
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
<script src="<?php echo JS_PATH_ADMIN;?>common.js"></script>
</html>