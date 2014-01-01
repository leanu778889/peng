
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
	$('#video').click(function(){
		var addput = "<input type='text' name='video[]'>";
		$('#vid').append(addput);
	})
})
</script>
</head>
<body>
<div class="wrap">
	<div class="nav">
		
	</div>
<!--==============================添加用户================================-->
	<form data-role="list"  enctype="multipart/form-data"  action="admin.php?m=Party&a=addactmess" method="post" id="myform">
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
				<th>用户表id：</th>
				<td><select>
				<?php if($otherpid){ foreach ($otherpid as $ke=>$val){?>
					<option><?php echo $val['p_id']?></option>
				<?php } }?>
				</select></td>
				<td></td>
			</tr>
			<tr>
				<th>姓名：</th>
				<td><input name="info[truename]" type="text" class="input length_4" id="users_name"></td>
				<td></td>
			</tr>
			<tr>
				<th>性别</th>
				<td><input type="radio" checked="checked" name="info[sex]" value='1'/>男
<input type="radio"  name="info[sex]" value='2'/>女</td>
				<td></td>
			</tr>
			<tr>
				<th>出生年月</th>
				<td><link rel="stylesheet" type="text/css" href="<?php echo JS_PATH_ADMIN?>calendar/jscal2.css"/>
			<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH_ADMIN?>calendar/border-radius.css"/>
			<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH_ADMIN?>calendar/win2k.css"/>
			<script type="text/javascript" src="<?php echo JS_PATH_ADMIN?>calendar/calendar.js"></script>
			<script type="text/javascript" src="<?php echo JS_PATH_ADMIN?>calendar/lang/en.js"></script><input type="text" name="info[age]" id="start_time" value="" size="10" class="input length_3" readonly>&nbsp;<script type="text/javascript">
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
				<th>用户类型</th>
				<td><?php foreach ($typename as $key=>$value){?>
	        <input type="checkbox" name="info[type]" value="<?php echo $value['t_id']?>" id="type_<?php echo $value['t_id']?>"><?php echo $value['t_name']?>
	        <br><?php }?>
			</td>
				<td></td>
			</tr>
			<tr>
				<th>籍贯</th>
				<td><input name="info[native]" type="text" class="input length_4"></td>
				<td></td>
			</tr>
			<tr>
				<th>目前工作地点</th>
				<td><input name="info[work_place]" type="text" class="input length_4"></td>
				<td></td>
			</tr>
			<tr>
				<th>目前居住地点</th>
				<td><input name="info[live_place]" type="text" class="input length_4"></td>
				<td></td>
			</tr>
			<tr>
				<th>身高</th>
				<td><input name="info[high]" type="text" class="input length_4"></td>
				<td></td>
			</tr>
			<tr>
				<th>特长</th>
				<td><input name="info[special]" type="text" class="input length_4"></td>
				<td></td>
			</tr>
			<tr>
				<th>体重</th>
				<td><input name="info[weight]" type="text" class="input length_4"></td>
				<td></td>
			</tr>
			<tr>
				<th>爱好</th>
				<td><input name="info[hobby]" type="text" class="input length_4"></td>
				<td></td>
			</tr>
			<tr>
				<th>联系电话</th>
				<td><input name="info[truetel]" type="text" class="input length_4"></td>
				<td></td>
			</tr>
			<tr>
				<th>邮箱</th>
				<td><input name="info[email]" type="text" class="input length_4"></td>
				<td></td>
			</tr>
			 <tr>
			    <th>毕业院校：</th>
			    <td><input type="text" name="info[g_school]"></td>
		    </tr>
			  <tr>
			    <th>职业：</th>
			    <td><input type="text" name="info[job]"></td>
		    </tr>
			  <tr>
			    <th>演艺经历：</th>
			    <td><textarea id="textarea" class="input length_4" name="info[show_experience]"></textarea></td>
		    </tr>
			  <tr>
			    <th>代表作：</th>
			    <td><input type="text" name="info[representative]"></td>
		    </tr>
			  <tr>
			    <th>其它作品：</th>
			    <td><input type="text" name="info[other_works]"></td>
		    </tr>
			  <tr>
			    <th>个人照片：</th>
			    <td id="selfimg">
			    	<input type="file"  name="photo[]" />
		        	<input type="button" value="增加" id="adddd" />
		        </td>
		    </tr>
			  <tr>
			    <th>曾获奖项：</th>
		        <td><textarea id="description" name="info[reword]"></textarea></td>
		       </tr>
		       <tr>
			    <th>视频链接地址：</th>
		          <td id="vid"><input type="text" name="video[]">
		          <input type="button" value="添加" id="video" /></td>
		    </tr>
		      <tr>
		        <th>个人说明:</th>
		        <td><textarea id="textarea" name="info[description]"></textarea></td>
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