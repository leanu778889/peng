<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title></title>
<link href="./admin/Public/Css/admin_style.css" rel="stylesheet">
<link href="./admin/Public/Css/sss.css" rel="stylesheet">
<script>
//全局变量，是Global Variables不是Gay Video喔
var GV = {
	JS_ROOT : "./admin/Public/Js/",																									//js目录
	JS_VERSION : "",																										//js版本号
	TOKEN : '',	//token ajax全局
	REGION_CONFIG : {},
	SCHOOL_CONFIG : {},
	URL : {
		LOGIN : '',																													//后台登录地址
		IMAGE_RES: './admin/Public/Images/'																									//图片目录
			
	}
};

</script>

<script src="./admin/Public/Js/wind.js"></script>

<script src="./admin/Public/Js/jquery.js"></script>
<script src="./admin/Public/Js/dialog.js" type="text/javascript"></script>
<script src="./admin/Public/Js/ajaxForm.js" type="text/javascript"></script>
<script src="./admin/Public/Js/datePicker.js" type="text/javascript"></script>
<script src="./admin/Public/Js/uploadPreview.js" type="text/javascript"></script>
<script src="./admin/Public/Js/tabs.js" type="text/javascript"></script>
<script src="./admin/Public/Js/task_manage.js" type="text/javascript"></script>
<script src="./admin/Public/Js/formvalidator.js"></script>
<script src="./admin/Public/Js/formvalidatorregex.js"></script>
<body>
<div class="wrap">
	<div class="nav">
		<div class="return"><a href="admin.php?m=Menu&a=index">返回上一级</a></div>
	</div>
		<form class="J_ajaxForm" id="myform" data-role="list" action="admin.php?m=Menu&a=editmenu&menuid=2" method="post">
	<div class="h_a">修改信息</div>
		<div class="table_full">
			<table width="100%">
				<colgroup><col class="th">
				<col width="600">
				<col>
				</colgroup>
				<tbody class="" id="J_task_main">
					<tr>
						<th>姓名：</th>
						<td>
							<span class="must_red">*</span>
							<input id="J_task_name_input" name="title" class="input length_6 input_hd" value="<?php echo $arr['truename']?>" type="text">
						</td>
						
					</tr>
					<tr>
						<th>类别</th>
						<td>
							<span class="must_red">*</span>
							<?php if(is_array($typename)): $i = 0; $__LIST__ = $typename;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><label>
						        <input type="checkbox" name="type[]" value="<?php echo ($sub["t_id"]); ?>" id="type_<?php echo ($sub["t_id"]); ?>">
						        <?php echo ($sub["t_name"]); ?></label>
							<br><?php endforeach; endif; else: echo "" ;endif; ?>
						</td>
					</tr>
					<tr>
						<th>星级更改</th>
						<td>
							<input type="radio" name="level" class="xingji" id="<?php echo $value['a_id']?>" value='1'>1
							<input type="radio" name="level" class="xingji" id="<?php echo $value['a_id']?>" value='2'>2
							<input type="radio" name="level" class="xingji" id="<?php echo $value['a_id']?>" value='3'>3
							<input type="radio" name="level" class="xingji" id="<?php echo $value['a_id']?>" value='4'>4
							<input type="radio" name="level" class="xingji" id="<?php echo $value['a_id']?>" value='5'>5
							<input type="radio" name="level" class="xingji" id="<?php echo $value['a_id']?>" value='6'>6
							<input type="radio" name="level" class="xingji" id="<?php echo $value['a_id']?>" value='7'>7
						</td>
						
					</tr>

				</tbody>
			</table>
		</div>
		<div class="btn_wrap">
			<div class="btn_wrap_pd">
				<button class="btn btn_submit J_ajax_submit_btn" id="dosumit" type="submit">提交</button>
			</div>
		</div>

	</form>
</div>
<script src="./admin/Public/Js/common.js"></script>
<script>
Wind.use(GV.JS_ROOT +'task_manage.js');
</script>
<div id="calroot" style="display: none; position: absolute;"><div id="calhead"><a id="calprev"></a><div id="caltitle"><select id="calmonth"></select><select id="calyear"></select></div><a id="calnext"></a></div><div id="calbody"><div id="caldays"><span>日</span><span>一</span><span>二</span><span>三</span><span>四</span><span>五</span><span>六</span></div><div id="calweeks"></div><div class="caltime"><button type="button" class="btn btn_submit fr" name="submit">确定</button><input id="calHour" class="input" min="0" max="23" size="2" value="0" type="number"><span>点</span><input id="calMin" class="input" size="2" min="1" max="59" value="0" type="number"><span>分</span></div></div></div></body></html>