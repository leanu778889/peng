<?php if (!defined('THINK_PATH')) exit();?> <!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title></title>
<link href="<?php echo CSS_PATH_ADMIN;?>admin_style.css" rel="stylesheet" />
<link href="<?php echo CSS_PATH_ADMIN;?>sss.css" rel="stylesheet" />
<script> 
//全局变量，是Global Variables不是Gay Video喔
var GV = {
	JS_ROOT : "<?php echo JS_PATH_ADMIN ;?>",//js目录
	JS_VERSION : "",//js版本号
	TOKEN : '',	//token ajax全局
	REGION_CONFIG : {},
	SCHOOL_CONFIG : {},
	URL : {
		LOGIN : '',//后台登录地址
		IMAGE_RES: '<?php echo IMAGES_PATH_ADMIN;?>' //图片目录
	}
};
</script>
<script src="<?php echo JS_PATH_ADMIN;?>wind.js"></script>
<script src="<?php echo JS_PATH_ADMIN;?>jquery.js"></script>
<script src="<?php echo JS_PATH_ADMIN;?>formvalidator.js"></script>
<script src="<?php echo JS_PATH_ADMIN;?>formvalidatorregex.js"></script>
 <script type="text/javascript">

$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#users_pwd").formValidator({onshow:"请输入密码",onfocus:"请输入数字和字符"}).regexValidator({regexp:"username",datatype:"enum",onerror:"请输入数字和字符"}).inputValidator({min:6,max:20,onerror:"密码应在6-20位之间"});

	$("#users_pwds").formValidator({onshow:"请输入二次密码",onfocus:"请输入数字和字符"}).regexValidator({regexp:"username",datatype:"enum",onerror:"请输入数字和字符"}).inputValidator({min:6,max:20,onerror:"密码应在6-20位之间"});

	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$('#users_name').formValidator({onshow:"请输入用户名称",onfocus:"请输入6—20个字符的用户名称",oncorrect:"输入正确!"}).inputValidator({min:6,max:20,onerror:"用户名不能为空且用户名长度应在6-20之间"}).ajaxValidator(
	{type:"get",url:"admin.php?m=User&a=check_name",data:"",datatype:"html",cached:false,async:'true',success : function(data) {			

		if( data == 1 )
			{
			$('#hh').val(1);
			    return true;
			}
			else
			{
			     return false;
			}
		},
	error: function(){alert("服务器没有返回数据，可能服务器忙，请重试");},
	onerror : "该用户名已存在",
	onwait : "正进行合法性校验..."
	});
});


</script>
</head>
<body>
<div class="wrap">
	<div class="nav">
		
	</div>
<!--==============================添加用户================================-->
	<form   class="J_ajaxForm" id="J_announce_form" action="admin.php?m=User&a=useradd" method="post" id="myform">
	<input type="hidden" id="hh" name="hh" value=""> 
	<div class="h_a">添加用户</div>
	<div class="table_full">
		<table width="100%">
			<colgroup>
				<col class="th">
				<col width="800">
				<col width="200">
			</colgroup>
			<tr>
				<th>用户名称</th>
				<td><input name="info[name]" type="text" class="input length_4" id="users_name"></td>
				<td></td>
			</tr>
			<tr>
				<th>密码</th>
				<td><input name="info[pwd]" type="text" class="input length_4" id="users_pwd"></td>
				<td></td>
			</tr>
			<tr>
				<th>二次密码</th>
				<td><input name="info[pwds]" type="text" class="input length_4" id="users_pwds"></td>
				<td></td>
			</tr>
			<tfoot>
				<tr>
					<th>用户组</th>
					<td>
						<select name="info[usgpname]" class="select_4" id="usgp">
							<option value='' selected>选择用户组</option>
							<?php if(!empty($data)){foreach ($data as $key => $value){if($value[usgp_id]!=1){?>
							<option value="<?php echo $value[usgp_id]; ?>"> <?php echo $value[usgp_name];?></option>
							<?php }} }?>
						</select>
					</td>
				</tr>
			</tfoot>
			<tr>
				<th>联系方式</th>
				<td><input name="info[tel]" type="text" class="input length_4" id="users_tel"></td>
				<td></td>
			</tr>
			<tr>
				<th>邮箱</th>
				<td><input name="info[email]" type="text" class="input length_4" id="users_email"></td>
				<td></td>
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
	<script src="<?php echo JS_PATH_ADMIN ;?>common.js"></script>
<script> 
function xialamenu(obj){
	var id=$(obj).val();		
	$.get('?m=Index&c=Users&a=xila','id='+id,function(data){
		if(data==null){
            return false;
			}
		var _html='<option>---请选择---</option>';	
		var _len=data.length;		
		for (var i=0;i<_len;i++){
			var xilaitem=data[i];
			_html+='<option value='+xilaitem.usgp_id+'>'+xilaitem.usgp_name+'</option>';
		}
		$('#usgp').html(_html);		
	},'json');
}
Wind.js(GV.JS_ROOT + 'announceSub.js?');
</script>
</body>

</html>