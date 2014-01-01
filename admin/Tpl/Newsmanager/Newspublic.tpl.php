<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title></title>
<link href="<?php echo CSS_PATH_ADMIN;?>admin_style.css" rel="stylesheet" />
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
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH_ADMIN?>jscal2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH_ADMIN?>border-radius.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH_ADMIN?>win2k.css"/>
<script type="text/javascript" src="<?php echo JS_PATH_ADMIN?>calendar.js"></script>
<script src="<?php echo JS_PATH_ADMIN?>ajaxForm.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo JS_PATH_ADMIN?>en.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH_ADMIN?>ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH_ADMIN?>ueditor/ueditor.all.js"></script>
<script type="text/javascript">
$(function(){
	 UE.getEditor('J_textarea');
})

</script>
</head>
<body>
<div class="wrap">
	<div class="nav">
		<div class="return"><a href="index.php?m=Annouce&c=Annouce&a=maninit" class="btn">返回上一级</a></div>
	</div>
<!--==============================添加公告================================-->
	<form id="J_announce_form" class="J_ajaxForm" data-role="list"  action="<?php if(empty($result)){ echo '?m=Newsmanager&a=addmessage'; }else{ echo '?m=Newsmanager&a=reb';}?>" method="post">
	<div class="h_a"><?php if($result){ echo '修改公告';}else{ echo '添加公告';}?></div>
	<div class="table_full">
	<input type="hidden" name="perf[a_id]" value="<?php echo $result['a_id'];?>"  />
		<table width="100%">
			<colgroup>
				<col class="th">
				<col width="500">
			</colgroup>
			<tr>
				<th>发布时间</th>
				<td><span class="must_red">*</span><input value="<?php if(empty($result)){echo date("Y-m-d H:i:s",time());}else{ echo date("Y-m-d H:i:s",$result['time']);}?>" name="perf[starttime]"  id="start_uploadtime" type="text" class="input length_3 J_date mr20"><span class="mr20">
					<script type="text/javascript">
        			Calendar.setup({
        			weekNumbers: true,
        		    inputField : "start_uploadtime",
        		    trigger    : "start_uploadtime",
        		    dateFormat: "%Y-%m-%d %H:%M:%S",
        		    showTime: false,
        		    minuteStep: 1,
        		    onSelect   : function() {this.hide();}
        			});
          		  </script>
					
				</td>
				<td></td>
			</tr>
			   
			
		<tr>
				<th>发布人</th>
				<td><span class="must_red">*</span><input name="perf[author]" value="<?php if($result){ echo $result['author'];}?>" type="text" id="author" class="input length_3" placeholder="发布人姓名"></td>
				<td></td>
			</tr>
			
			<tr>
				<th>公告标题</th>
				<td><span class="must_red">*</span><input name="perf[title]" value="<?php if($result){ echo $result['title'];}?>" type="text" id="title" class="input length_6" placeholder="公告标题"></td>
				<td></td>
			</tr>
			<tbody id="J_announce_content" class="J_radio_tbody">
				<tr>
					<th>公告内容</th>
					<td colspan="2"><span class="must_red">*</span><textarea id="content" name="perf[content]"  style="width:700px;height:300px;"><?php if($result){ echo $result['content'];}?></textarea></td>
				</tr>
			</tbody>
			
		</table>
	</div>
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<button class="btn btn_submit J_ajax_submit_btn" id="J_announce_sub" type="submit">提交</button>
		</div>
	</div>
	</div>
	<script src="<?php echo JS_PATH_ADMIN;?>common.js"></script>
<script>
Wind.js('<?php echo JS_PATH_ADMIN;?>announceSub.js');
</script>
</body>
</html>
