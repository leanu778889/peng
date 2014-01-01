<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>用户信息管理--演员信息管理</title>
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
<link href="<?php echo CSS_PATH_ADMIN?>admin_style.css" rel="stylesheet" />
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
	<form class="J_ajaxForm" data-role="list" action="" method="post">
	<div class="mb10">
		<a href="#" id="J_start_all" class="mr5">操作说明</a>
		<span>请谨慎操作用户的信息，若删除则无法还原</span>
	</div>
	<div class="table_list">
		<table width="100%" id="J_table_list" style="table-layout:fixed;">
			<colgroup>
				<col width="90">
				
				
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
			<tr id="J_forum_tr_1">
				<td><?php echo $value['p_name']?></td>
				<td><?php echo $value['truename']?></td>
				<td><?php echo $value['star']?></td>
				<td><img src="Public/uploads/<?php echo $value['imagepath']?>" height="35" width="50"></td>
				<td><?php echo $value['t_name']?></td>
				<td><a href="?m=Actormess&a=seemore&a_id=<?php echo $value['a_id']?>" class="mr10 J_dialog" role="button">[查看]&nbsp;&nbsp;</a><a href="?m=Actormess&a=rebuilt&aid=<?php echo $value['a_id']?>">[修改]&nbsp;&nbsp;</a><a class="J_ajax_del" href="?m=Actormess&a=del" data-pdata="{'pid':'<?php echo $value['p_id']?>'}">[删除]</a></td>
			</tr>
			<?php }?>
			</tbody>
			</table>
	</div>
	
	
</div>
<script src="<?php echo JS_PATH_ADMIN?>common.js"></script>
<script>


	//搜索框聚焦
	search_input.focus(function(){
		var $this = $(this);
		
		//搜索框粘帖
		this.onpaste = function(){
		
			//清楚重复的延时操作
			if(search_input.ptimer) {
				clearTimeout(search_input.ptimer);
			}
			
			//粘帖半秒后提交查询
			search_input.ptimer = setTimeout(function(){
				search_suggestion($('#J_search_input').val());
			}, 500)

		}
		
		//通过浏览器（ff8.0）“后退”到本页面时，可能搜索内容为空，但是有隐藏的匹配项
		if(!$this.val()) {
			return false;
		}
		
		//已经匹配搜索，搜索框重新聚焦时显示匹配，避免重复ajax
		if(suggestion_list.children().length) {
			suggestion_list.fadeIn('fast');
		}
		
	});
	
	
	
	//搜索输入
	search_input.keyup(function(e){
		var $this = $(this);
		
		//键盘上下选择搜索建议
		if(suggestion_list.children().length & (e.keyCode === 38 || e.keyCode === 40)) {
		
			var li_current = suggestion_list.find('li.current'); //当前选中项，上下键未修改状态
			/*var f_or_l = (e.keyCode === 40 ? 'first' : 'last'),
				p_or_n = (e.keyCode === 40 ? $.next : 'prev');*/
			//
			if(e.keyCode === 38) {
				//键盘_向上
				
				if(!li_current.length) {
					//没有有选中项时
					suggestion_list.find('li:last').addClass('current');
				}else{
					//有选中项时
					li_current.removeClass('current').prev().addClass('current');
				}
				
				
				
			}else if(e.keyCode === 40) {
				//键盘_向下
				
				if(!li_current.length) {
					//没有有选中项时
					suggestion_list.find('li:first').addClass('current');
				}else{
					//有选中项时
					li_current.removeClass('current').next().addClass('current');
				}
				
			}
			
			if(suggestion_list.find('li.current').length) {
					search_input.val(suggestion_list.find('li.current').text());
			}else{
				search_input.val(input_val);
			}
				
			return false;
			
			
		}
		
		
		if($this.val() === input_val) {
			return false; //搜索值未改变则不做查询
		}
		
		//停止输入半秒后开始查询
		if(search_input.timer) {
			clearTimeout(search_input.timer);
		}
		search_input.timer = setTimeout(function(){
			search_suggestion($this.val());
		}, 500);
		
	});
	
	
	//点击搜索建议列表，进入版块编辑
	search_input.keypress(function(e) {
	
		//可点击条件：有匹配搜索列表&列表里有被选中的项&按回车(enter)键
		if(suggestion_list.children() && suggestion_list.find('li.current').length && e.keyCode === 13) {
			e.preventDefault();
			search_input.blur(); //ff(8.0)从编辑页返回时，搜索栏会聚焦
			window.location.href = suggestion_list.find('li.current > a').attr('href'); //进入版块编辑
		}
		
	});
	
	//搜索框失焦，隐藏匹配列表
	search_input.blur(function() {
		suggestion_list.fadeOut('fast');
	});
	

	
	
	//点击“搜索”按钮，高亮匹配的tr行
	Wind.use('ajaxForm',function() {
	
		$('#J_forum_search_form').ajaxForm({
			dataType	: 'json',
			success : function(data) {
				if(data.state === 'success') {
					//取消已有的高亮
					$('#J_table_list tr.high_light').removeClass('high_light');
					
					//循环匹配的高亮
					$.each(data.data, function(i, o) {
						$('#J_forum_tr_' + o.fid).addClass('high_light');
					});

					//定位第一个
					$(document).scrollTop($('tr.high_light:first').offset().top);
					
				}
			}
		});
		
	});
	
	
	//搜索匹配列表hover状态背景色
	suggestion_list.on('mouseenter', 'li', function(){
		$(this).addClass('current');
	}).on('mouseleave', 'li', function(){
		$(this).removeClass('current');
	});
	
	
});
</script>
</body>
</html>