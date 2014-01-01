
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
		<title></title>
		<link href="<?php echo CSS_PATH_ADMIN;?>admin_layout.css" rel="stylesheet">
		<style>
			.fullScreen .content th{display:none;width:0;}
			.fullScreen .head,.fullScreen .tab{height:0;display:none;}
			.fullScreen #default{*left:0;*top:-90px;}
			.fullScreen div.options{top:0;}
		</style>
		<script>
			if (window.top !== window.self) {
			    document.write = '';
			    window.top.location.href = window.self.location.href;
			    setTimeout(function () {
			        document.body.innerHTML = '';
			    }, 0);
			}

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
			<noscript>&lt;h1 class="noscript"&gt;您已禁用脚本，这样会导致页面不可用，请启用脚本后刷新页面&lt;/h1&gt;</noscript>
			<table width="100%" height="100%" style="table-layout:fixed;">
				<tbody><tr class="head">
					<th><a href="#" class="logo">管理中心</a></th>
					<td>
					<div class="nav">
						<!-- 菜单异步获取，采用json格式，由js处理菜单展示结构 -->
						<ul id="J_B_main_block">
						
						</ul>
					</div>
					<div class="login_info">
						<span class="mr10"><?php echo $ustype; ?>：<?php echo session('name');?></span><a href="admin.php?m=Login&a=Logout" class="mr10">[注销]</a>
					</div></td>
				</tr>
				<tr class="tab">
					<th>
					<div class="search">
						<input size="15" placeholder="功能搜索" id="J_search_keyword" type="text">
						<button type="button" name="keyword" id="J_search" value="" data-url="?m=Index&a=Search
						">搜索</button>
					</div></th>
					<td>
					<div id="B_tabA" class="tabA">
						<a href="" tabindex="-1" class="tabA_pre" id="J_prev" title="上一页">上一页</a>
						<a href="" tabindex="-1" class="tabA_next" id="J_next" title="下一页">下一页</a>
						<div style="margin:0 25px;min-height:1px;">
							<div style="position:relative;height:30px;width:100%;overflow:hidden;">
								<ul id="B_history" style="white-space:nowrap;position:absolute;left:0;top:0;">
									<li class="current" data-id="default" tabindex="0"><span><a>后台首页</a></span></li>
								</ul>
							</div>
						</div>
					</div></td>
				</tr>
				<tr class="content">
					<th style="overflow:hidden;">
						<div id="B_menunav">
							<div class="menubar">
								<dl id="B_menubar"></dl>
							</div>
							<div id="menu_next" class="menuNext" style="display: none;">
								<a href="" class="pre" title="顶部超出，点击向下滚动">向下滚动</a>
								<a href="" class="next" title="高度超出，点击向上滚动">向上滚动</a>
							</div>
						</div>
					</th>
					<td id="B_frame">
						<div id="breadCrumb" style="display:none;">
							首页<em>&gt;</em>功能<em>&gt;</em>功能
						</div>
						<div class="options">
							<a href="" class="refresh" id="J_refresh" title="刷新">刷新</a>
							<a href="" id="J_fullScreen" class="full_screen" title="全屏">全屏</a>
						</div>
						<div class="loading" id="loading" style="display: none;">加载中...</div>
						<iframe id="iframe_default" src="admin.php?m=Index&a=welcome" style="height: 100%; width: 100%;" data-id="default" frameborder="0" scrolling="auto"></iframe>
					</td>
				</tr>
			</tbody></table>
		</div>

<script>
//iframe 加载事件
var iframe_default = document.getElementById('iframe_default');
$(iframe_default.contentWindow.document).ready(function() {
	$('#loading').hide();
	$(iframe_default).show();
});

var USUALL = [], /*常用的功能模块*/
	TEMP = [],
	SUALL = USUALL.concat('-', [ {
	name : '最近操作',
	disabled : true
} ], TEMP),
	SUBMENU_CONFIG =<?php echo $firstmenu;?>,/*主菜单区*/
	imgpath = '',
	times = 0,
	getdescurl = '',
	searchurl = '',
	token = "";
//一级菜单展示
$(function(){
	var html = [];
	//console.log(SUBMENU_CONFIG);
	$.each(SUBMENU_CONFIG,function(i,o) {
		html.push('<li><a href="" title="'+ o.menu_name +'" data-id="'+ o.menu_id +'">'+ o.menu_name +'</a></li>');
	});
	$('#J_B_main_block').html(html.join(''));

	//后台位在第一个导航
	$('#J_B_main_block li:first > a').click();
});

function checkMenuNext() {
	var B_menunav = $('#B_menunav');
	var menu_next = $('#menu_next');
	if(B_menunav.offset().top + B_menunav.height() >= $(window).height() || B_menunav.offset().top < B_menunav.parent().offset().top) {
		menu_next.show();
	}else {
		menu_next.hide();
	}
}

$(window).on('resize',function() {
	setTimeout(function() {
		checkMenuNext();
	},100);
});

//上一页下一页的点击
(function(){
	var menu_next = $('#menu_next');
	var B_menunav = $('#B_menunav');
	menu_next.on('click','a',function(e) {
		e.preventDefault();
		if(e.target.className === 'pre') {
			if(B_menunav.offset().top < B_menunav.parent().offset().top) {
				B_menunav.animate({'marginTop':'+=28px'},100);
			}
		}else if(e.target.className === 'next'){
			if(B_menunav.offset().top + B_menunav.height() >= $(window).height()) {
				B_menunav.animate({'marginTop':'-=28px'},100);
			}
		}
	});
})();
//一级导航点击
$('#J_B_main_block').on('click','a',function(e) {
	e.preventDefault();
	e.stopPropagation();
	$(this).parent().addClass('current').siblings().removeClass('current');
	var data_id = $(this).attr('data-id');

	show_left_menu(data_id);
	

	//检查是否应该出现上一页、下一页
	checkMenuNext();
	
	//显示左侧菜单
	function show_left_menu(id){
		
		$.get('admin.php?m=Index&a=ajax_menu','pid='+id,function(data){
			var _len=data.length;
			
			var html='';
			for(var i=0;i<_len;i++){
				html+="<dt><a href='admin.php?m="+data[i].menu_m+"&a="+data[i].menu_a+"' data-id='"+data[i].menu_id+"'>"+data[i].menu_name+"</a></dt>";
			}
			
			$('#B_menubar').html(html);
		},'json')
		
		
	};
	
});

//左边菜单点击
$('#B_menubar').on('click','a',function(e) {
	e.preventDefault();
	e.stopPropagation();
	
	
	var $this = $(this), _dt = $this.parent(), _dd = _dt.next('dd');
	
	//当前菜单状态
	_dt.addClass('current').siblings('dt.current').removeClass('current');
	
	//子菜单显示&隐藏
	if(_dd.length){
		_dt.toggleClass('current');
		_dd.toggle();
		//检查上下分页
		checkMenuNext();
		return false;
	};
	
	$('#loading').show().focus();//显示loading
	$('#B_history li').removeClass('current');
	var data_id = $(this).attr('data-id'),li = $('#B_history li[data-id='+ data_id +']');
	var href = this.href;


	iframeJudge({
		elem : $this,
		href : href,
		id : data_id
	});
	
});


/*
 * 搜索
*/
var search_keyword = $('#J_search_keyword'),
	search = $('#J_search');
search.on('click', function(e){
	e.preventDefault();
	var $this = $(this),
		search_val = $.trim(search_keyword.val());
	if(search_val) {
		iframeJudge({
			elem : $this,
			href : $this.data('url') + '&keyword=' + search_val,
			id : 'search'
		});
	}
});
//回车搜索
search_keyword.on('keydown', function(e){
	if(e.keyCode == 13) {
		search.click();
	}
});


//判断显示或创建iframe
function iframeJudge(options){
	var elem = options.elem,
		href = options.href,
		id = options.id,
		li = $('#B_history li[data-id='+ id +']');

	if(li.length > 0) {
		//如果是已经存在的iframe，则显示并让选项卡高亮,并不显示loading
		var iframe = $('#iframe_'+ id);
		$('#loading').hide();
		li.addClass('current');
		if( iframe[0].contentWindow && iframe[0].contentWindow.location.href !== href ) {
			iframe[0].contentWindow.location.href = href;
		}
		$('#B_frame iframe').hide();
		$('#iframe_'+ id).show();
		
	} else {
		//创建一个并加以标识
		var	iframeAttr = {
			src			: href,
			id			: 'iframe_' + id,
			frameborder	: '0',
			scrolling	: 'auto',
			height		: '100%',
			width		: '100%'
		};
		var iframe = $('<iframe/>').prop(iframeAttr).appendTo('#B_frame');

		$(iframe[0].contentWindow.document).ready(function() {
			$('#B_frame iframe').hide();
			$('#loading').hide();
			var li = $('<li tabindex="0"><span><a>'+ elem.html() +'</a><a class="del" title="关闭此页">关闭</a></span></li>').attr('data-id',id).addClass('current');
				li.siblings().removeClass('current');
			li.appendTo('#B_history');

			//$(this).show().unbind('load');
		});
		
		
	}

	
}

//顶部点击一个tab页
$('#B_history').on('click focus','li',function(e) {
	e.preventDefault();
	e.stopPropagation();
	var data_id = $(this).data('id');
	$(this).addClass('current').siblings('li').removeClass('current');
	$('#iframe_'+ data_id).show().siblings('iframe').hide();//隐藏其它iframe
});

//顶部关闭一个tab页
$('#B_history').on('click','a.del',function(e) {
	e.stopPropagation();
	e.preventDefault();
	var li = $(this).parent().parent(),
		prev_li = li.prev('li'),
		data_id = li.attr('data-id');
	li.hide(60,function() {
		$(this).remove();//移除选项卡
		$('#iframe_'+ data_id).remove();//移除iframe页面
		var current_li = $('#B_history li.current');
		//找到关闭后当前应该显示的选项卡
		current_li = current_li.length ? current_li : prev_li;
		current_li.addClass('current');
		cur_data_id = current_li.attr('data-id');
		$('#iframe_'+ cur_data_id).show();
	});
});

//刷新
$('#J_refresh').click(function(e) {
	e.preventDefault();
	e.stopPropagation();
	var id = $('#B_history .current').attr('data-id'),iframe = $('#iframe_'+ id);
	if(iframe[0].contentWindow) {
		//common.js
		reloadPage(iframe[0].contentWindow);
	}
});

//全屏/非全屏
$('#J_fullScreen').toggle(function(e) {
	e.preventDefault();
	e.stopPropagation();
	$(document.body).addClass('fullScreen');
},function(){
	$(document.body).removeClass('fullScreen');
});

//下一个选项卡
$('#J_next').click(function(e) {
	e.preventDefault();
	e.stopPropagation();
	var ul = $('#B_history'),
		current = ul.find('.current'),
		li = current.next('li');
	
});

//上一个选项卡
$('#J_prev').click(function(e) {
	e.preventDefault();
	e.stopPropagation();
	var ul = $('#B_history'),
		current = ul.find('.current'),
		li = current.prev('li');

});



(function(){
	//iframe内触发菜单

	var par_menu_main = $('#J_B_main_block'),
		par_menu_side = $('#B_menubar')
	//查询导航数据
	window.eachSubmenu = function (data, id, par, level, href){
		for(i in data) {
			if(level == 2) {
				if(i == par) {
					//一级
					setMenuMain(par_menu_main.find('a[data-id='+ par +']'));
					eachSubmenu(data[par]['items'], id, par, level, href);
					break;
				}else if(i == id){
					//二级
					setMenuSide(data, id, par, level, href);
				}

			}else if(level == 3) {
				if(i == par) {
					//匹配父导航
					var root = data[i]['parent'];
					setMenuMain(par_menu_main.find('a[data-id='+ data[i]['parent'] +']'));
					setMenuSide(SUBMENU_CONFIG[root]['items'], id, par, level, href);
					break;
				}else{
					//父导航不匹配
					var items = data[i]['items'];
					if(items) {
						eachSubmenu(items, id, par, level, href)
					}

				}
			}
			
			
		}
	};

	//设置顶部导航
	function setMenuMain(elem){
		elem.parent().addClass('current').siblings().removeClass('current');
	};

	//设置左侧导航
	function setMenuSide(data, id, par, level, href){

		var arr  = [],			//左侧一级导航数据
			child_arr = [];		//左侧二级导航数据

		//循环数据
		$.each(data, function(i, o){
			var cls = (o.id == id ? 'current' : '');
			
			//添加一级数据
			arr.push('<dt class="'+ cls +'"><a href="'+ o.url +'" data-id="'+ o.id +'">'+ o.name +'</a></dt>');

			if(level == 3 && i == par){
				//进入二级导航
				$.each(o['items'], function(i, o){
					child_arr.push('<li><a href="'+ o.url +'" data-id="'+ o.id +'">'+ o.name +'</a></li>');
				});

				var style = (o.id == par ? '' : 'display:none;');

				//并入一级
				arr.push('<dd style="'+ style +'"><ul>'+child_arr.join('')+'</ul></dd>');
			}
			
		});

		//show_left_menu(data_list['items']);
		par_menu_side.html(arr.join('')).attr('data-id', par);

		////检查是否应该出现上一页、下一页
		checkMenuNext();

		var side_item = $('#B_menubar').find('a[data-id='+ id +']');

		//点击导航展开iframe
		iframeJudge({
			elem : side_item,
			href : href,
			id : id
		});
		
	};
})();
</script>
<script src="<?php echo JS_PATH_ADMIN;?>common.js"></script>	

</body></html>