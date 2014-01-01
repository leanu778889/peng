<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title></title>
<script>
//全局变量，是Global Variables不是Gay Video喔
var GV = {
	JS_ROOT : "<?php echo JS_PATH_ADMIN ;?>",																									//js目录
	JS_VERSION : "",																										//js版本号
	TOKEN : '',	//token ajax全局
	REGION_CONFIG : {},
	SCHOOL_CONFIG : {},
	URL : {
		LOGIN : '',																													//后台登录地址
		IMAGE_RES: '<?php echo IMAGES_PATH_ADMIN;?>',																										//图片目录
	
	}
};
</script>
<link href="<?php echo CSS_PATH_ADMIN ?>sss.css" rel="stylesheet" type="text/css">
<link href="<?php echo CSS_PATH_ADMIN ?>admin_style.css" rel="stylesheet" type="text/css">
<script src="<?php echo JS_PATH_ADMIN ?>wind.js"></script>
<script src="<?php echo JS_PATH_ADMIN ?>jquery.js"></script>
<script src="<?php echo JS_PATH_ADMIN ?>dialog.js" type="text/javascript"></script>

</head>
<body>
<div class="wrap J_check_wrap">
	<div class="nav">
		<ul class="cc">
		<li class="current"><a href="#">用户组设置</a></li>
		</ul>
	</div>
	<form class="J_ajaxForm"   data-role="list" action="admin.php?m=User&a=usgpadd" method="post">
	<div class="table_list">
		<table width="100%" id="J_table_list">
			<colgroup>
				<col width="45">
				<col width="50">
				<col width="100">
				<col width="265">
			</colgroup>
			<thead>
				<tr>					
					<td>用户组名称</td>					
					<td>用户组描述</td>
					<td>状态类型</td>					
					<td>操作</td>
				</tr>
			</thead>
			<tbody>
			<?php if($uegp == null){ }else{ foreach ($uegp as $key=>$value){ if($value['usgp_id']==1){ ?>
            	<tr>				
                    <td><input  class="input length_2" name="<?php echo $value['usgp_id'].'-1' ?>" value="<?php echo $value['usgp_name'] ?>" type="text" disabled></td>                    
                    <td><input class="input length_4" name="<?php echo $value['usgp_id'].'-2' ?>" value="<?php echo $value['usgp_describe'] ?>" type="text" disabled></td>
                    <td>
                        <label><input type="radio" name="<?php echo $value['usgp_id'].'-3' ?>" value="1" <?php if($value['usgp_state'] == 1){echo 'checked="checked"';} ?> id="RadioGroup1_0" disabled/>启用</label>
                        <label><input type="radio" name="<?php echo $value['usgp_id'].'-3' ?>" value="0" <?php if($value['usgp_state'] == 0){echo 'checked="checked"';} ?> id="RadioGroup1_1" disabled/>不启用</label>
                        <br>
                   	</td>                 
                    <td><a class="del"  >[删除]</a>
					</td>
				</tr><?php }else{ ?>
				<tr >
                    <td><input  class="input length_2" name="<?php echo $value['usgp_id'].'-1' ?>" value="<?php echo $value['usgp_name'] ?>" type="text"></td>                    
                    <td><input class="input length_4" name="<?php echo $value['usgp_id'].'-2' ?>" value="<?php echo $value['usgp_describe'] ?>" type="text"></td>
                    <td>
                        <label><input type="radio" name="<?php echo $value['usgp_id'].'-3' ?>" value="1" <?php if($value['usgp_state'] == 1){echo 'checked="checked"';} ?> id="RadioGroup1_0" />启用</label>
                        <label><input type="radio" name="<?php echo $value['usgp_id'].'-3' ?>" value="0" <?php if($value['usgp_state'] == 0){echo 'checked="checked"';} ?> id="RadioGroup1_1" />不启用</label>
                        <br>
                   	</td>                 
                    <td><a class="J_ajax_del" data-msg="确定要删除此用户组吗？" href="admin.php?m=User&a=usgpdele&<?php echo $value['usgp_id']; ?>" data-pdata="{'id': '<?php echo $value['usgp_id'] ?>'}">[删除]</a>
					</td>
				</tr>
			<?php } } }?>
			</tbody></table>
		<table width="100%">
		<tbody><tr class="ct"><td colspan="5" style="padding-left:10px;"><a data-type="nav_1" data-html="tbody" href="" id="J_add_root" class="link_add">添加用户组</a></td></tr>
		</tbody></table>	
	</div>
	<div class="">
		<div class="btn_wrap_pd">
			<button class="btn btn_submit J_ajax_submit_btn" type="submit">提交</button>
		</div>
	</div>
	
	</form>
</div>
<script type="text/javascript">
$(document).ready(function(){
	var input=$('input');
	for(var i=0;i<input.length;i++)
		$('input:eq('+i+')').change(function(){
				$.post('admin.php?m=User&a=usgpedit','row='+this.name+'&val='+this.value,function(date){
					if(!date){alert('修改失败！')}
					})
			})
	$('.btn_submit').click(function(){
		var num = $('.newtr');
		if(num.length <= 0){
			return false;
		}
	});
})

</script>

<script>

var root_tr_html = '<tr class="newtr"><td><input class="input length_2" name="newdate[root_][name]" value="" type="text"></td><td><input class="input length_4" name="newdate[root_][desc]" value="" type="text"></td><td><label><input type="radio" name="newdate[root_][type]" value="1"  id="RadioGroup1_0" />启用</label><label><input type="radio" name="newdate[root_][type]" value="0" checked="checked" id="RadioGroup1_1" />不启用</label><br></td><td><a href="" class="mr5 J_newRow_del">[删除]</a></td></tr>';

Wind.js('<?php echo JS_PATH_ADMIN ?>forumTree_table.js');
</script>
<script src="<?php echo JS_PATH_ADMIN ?>common.js"></script>

</body></html>