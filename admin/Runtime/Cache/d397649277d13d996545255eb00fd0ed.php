<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title></title>
<link href="<?php echo CSS_PATH_ADMIN?>admin_style.css" rel="stylesheet">
<link href="<?php echo CSS_PATH_ADMIN?>sss.css" rel="stylesheet">
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
<script src="<?php echo JS_PATH_ADMIN?>datePicker.js" type="text/javascript"></script>
<script src="<?php echo JS_PATH_ADMIN?>uploadPreview.js" type="text/javascript"></script>
<script src="<?php echo JS_PATH_ADMIN?>tabs.js" type="text/javascript"></script>
<script src="<?php echo JS_PATH_ADMIN?>task_manage.js" type="text/javascript"></script>
<script src="<?php echo JS_PATH_ADMIN?>formvalidator.js"></script>
<script src="<?php echo JS_PATH_ADMIN?>formvalidatorregex.js"></script>
<script type="text/javascript">

$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#J_task_name_input").formValidator({onshow:"请输入菜单名称",onfocus:"菜单"}).inputValidator({min:1,max:20,onerror:"请填写菜单名称"}).ajaxValidator({
	    type : "get",
		url : "",
		data :"m=Menu&a=chknewmenu",
		datatype : "html",
		async:'false',
		success : function(data){	
            if( data == 1 ) {
                return true;
			} else {
                return false;
			}
		},
		buttons: $("#dosumit"),
		onerror : "菜单不能为空或菜单已存在",
		onwait : "请稍候..." 
	});
	
	$("#M").formValidator({onshow:"请输入模块",onfocus:"模块（字母或下划线）"}).inputValidator({min:1,max:20,onerror:"请填写模块"}).inputValidator({min:1,max:20,onerror:"不能为空或只能是字母和下划线"}).regexValidator({regexp:"letter_s",datatype:"enum",onerror:"请填写正确"});
	$("#A").formValidator({onshow:"请输入方法",onfocus:"方法（字母或下划线）"}).inputValidator({min:1,max:20,onerror:"请填写方法"}).inputValidator({min:1,max:20,onerror:"不能为空或只能是字母和下划线"}).regexValidator({regexp:"letter_s",datatype:"enum",onerror:"请填写正确"});
	$("#sort").formValidator({onshow:"请输入方法",onfocus:"排行"}).inputValidator({min:0,max:20,onerror:"请填写数字"}).inputValidator({min:1,max:20,onerror:"不能为空或只能是数字"}).regexValidator({regexp:"num1",datatype:"enum",onerror:"只能是数字"});
    

});

</script>
<body>
<div class="wrap">
	<div class="nav">
		<div class="return"><a href="admin.php?m=Menu&a=index">返回上一级</a></div>
	</div>
		<form class="J_ajaxForm" data-role="list" action="admin.php?m=Menu&a=addmenu" method="post" id="myform">
	<div class="h_a">添加任务</div>
		<div class="table_full">
			<table width="100%">
				<colgroup><col class="th">
				<col width="600">
				<col>
				</colgroup>
				<tbody class="" id="J_task_main">
					<tr>
						<th>菜单名称</th>
						<td>
							<span class="must_red">*</span>
							<input id="J_task_name_input" name="title" class="input length_5 input_hd" value="" type="text">
						</td>
						
					</tr>
					<tr>
						<th>父菜单</th>
						<td>
							<select class="select_5" name="p_menu">
							    <option value="" selected="selected">--请选择菜单--</option>
							    <?php foreach ($menu_p as $key =>$value){?>
							    <option value="<?php echo $value['menu_id']?>"><?php echo $value['menu_name']?></option>	
							    <?php }?>				
							</select>
						</td>
						
					</tr>
					<tr>
						<th>M</th>
						<td>
							<input id="M" name="M" class="input length_5 input_hd" type="text">
						</td>
						
					</tr>
					<tr>
						<th>A</th>
						<td>
							<input id="A" name="A" class="input length_5 input_hd" type="text">
						</td>
						
					</tr>
					
					<tr>
						<th>是否启用</th>
						<td>
							<ul class="single_list cc">
								<li><label><input name="is_auto" value="1" type="radio">启用</label></li>
								<li><label><input name="is_auto" value="0" checked="checked" type="radio">不启用</label></li>
							</ul>
						</td>
						
					</tr>
					<tr>
						<th>排序</th>
						<td>
							<input id="sort" name="sort" class="input length_5 input_hd" type="text" value="0">
						</td>
						
					</tr>
				</tbody>
			</table>
		</div>
		<div class="btn_wrap">
			<div class="btn_wrap_pd">
				<button class="btn btn_submit J_ajax_submit_btn" id="dosumit" type="submit">提交</button>
				<input id="J_checked_all" name="isAll" value="0" type="hidden">
			</div>
		</div>
	<input name="csrf_token" value="" type="hidden">
	</form>
</div>
<script src="<?php echo JS_PATH_ADMIN;?>common.js"></script>
<script>
Wind.use(GV.JS_ROOT +'task_manage.js');
</script>
<div id="calroot" style="display: none; position: absolute;"><div id="calhead"><a id="calprev"></a><div id="caltitle"><select id="calmonth"></select><select id="calyear"></select></div><a id="calnext"></a></div><div id="calbody"><div id="caldays"><span>日</span><span>一</span><span>二</span><span>三</span><span>四</span><span>五</span><span>六</span></div><div id="calweeks"></div><div class="caltime"><button type="button" class="btn btn_submit fr" name="submit">确定</button><input id="calHour" class="input" min="0" max="23" size="2" value="0" type="number"><span>点</span><input id="calMin" class="input" size="2" min="1" max="59" value="0" type="number"><span>分</span></div></div></div></body></html>