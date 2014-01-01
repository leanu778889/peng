/**
 *
 *	Plugin: Jquery.webox
 *	Developer: Blank
 *	Version: 1.0 Beta
 *	Update: 2012.07.08
 *
**/
$.extend({
	webox:function(option){
		var _x,_y,m,allscreen=false;
		if(!option){
			alert('options can\'t be empty');
			return;
		};
		if(!option['html']&&!option['iframe']){
			alert('html attribute and iframe attribute can\'t be both empty');
			return;
		};
		option['parent']='webox';
		option['locked']='locked';
		$(document).ready(function(e){
			$('.webox').remove();
			$('.background').remove();
			var width=option['width']?option['width']:400;
			var height=option['height']?option['height']:240;
                        var normal_height = option['title']?height-35:height;
                        var scroll_show = option['title']? 'yes' : 'no';
                        var default_title = option['title']? '<h1 id="locked" onselectstart="return false;">'+option['title']+'<a class="span" href="javascript:void(0);"></a></h1>' : '';
			$('body').append(
                                '<div id="new_background" class="background" style="display:none;"><iframe  style="position:absolute;width:100%;height:100%;background-color:#000;opacity:0.5;filter:alpha(opacity=50);border-style:none;"></iframe></div><div id="new_webox" class="webox" style="width:'+width+'px;height:'+height+'px;display:none;"><div id="inside" style="height:'+height+'px;">\n\
    '+default_title+(option['iframe']?'<iframe class="w_iframe" src="'+option['iframe']+'" frameborder="0" width="100%" scrolling="'+scroll_show+'" style="border:none;overflow-x:hidden;height:'+normal_height+'px;"></iframe>':option['html']?option['html']:'')+'</div></div>');
			if(navigator.userAgent.indexOf('MSIE 7')>0||navigator.userAgent.indexOf('MSIE 8')>0){
				$('.webox').css({'filter':'progid:DXImageTransform.Microsoft.gradient(startColorstr=#55000000,endColorstr=#55000000)'});
			}if(option['bgvisibel']){
				//兼容IE6 start==============
				//alert(document.body.scrollHeight);
				$('.background').css({height:document.body.scrollHeight});
				//end========================
				$('.background').fadeTo('slow',0.3);
			};
			$('.webox').css({display:'block'});
			
			$('#'+option['locked']+' .span').click(function(){
				$('.webox').css({display:'none'});
				$('.background').css({display:'none'});
				//把内容填充回去
				if(option['htmlid']){
					$("#"+option['htmlid']).append(option['html']);
				}
			});

			var marginLeft=parseInt(width/2);
			var marginTop=parseInt(height/2);
			var winWidth=parseInt($(window).width()/2);
			var winHeight=parseInt($(window).height()/2.2);
			var left=winWidth-marginLeft;
			var top=winHeight-marginTop;
			if(navigator.userAgent.indexOf('MSIE 6')>0){
				//alert(document.documentElement.scrollTop);
				top = document.documentElement.scrollTop+top;
			}
			$('.webox').css({left:left,top:top});
			$('#'+option['locked']).mousedown(function(e){
				if(e.which){
					m=true;
					_x=e.pageX-parseInt($('.webox').css('left'));
					_y=e.pageY-parseInt($('.webox').css('top'));
				}
				}).dblclick(function(){
					/*
					if(allscreen){
						$('.webox').css({height:height,width:width});
						$('#inside').height(height);
						$('.w_iframe').height(height-30);
						$('.webox').css({left:left,top:top});
						allscreen = false;
					}else{
						allscreen=true;
						var screenHeight = $(window).height();
						var screenWidth = $(window).width();$
						('.webox').css({'width':screenWidth-18,'height':screenHeight-18,'top':'0px','left':'0px'});
						$('#inside').height(screenHeight-20);
						$('.w_iframe').height(screenHeight-50);
					}
					*/
				});
			}).mousemove(function(e){
				if(m && !allscreen){
					var x=e.pageX-_x;
					var y=e.pageY-_y;
					$('.webox').css({left:x});
					$('.webox').css({top:y});
				}
			}).mouseup(function(){
				m=false;
			});
			$(window).resize(function(){
				if(allscreen){
					var screenHeight = $(window).height();
					var screenWidth = $(window).width();
					$('.webox').css({'width':screenWidth-18,'height':screenHeight-18,'top':'0px','left':'0px'});
					$('#inside').height(screenHeight-20);
					$('.w_iframe').height(screenHeight-50);
				}
			});
			
			/* 新增加,3秒后关闭 20130528 */
			if(option['closed']){
				$('.span').remove();	//全掉关闭按钮
				//3秒后执行动画效果
				setTimeout(function(){
					//关闭弹窗
					$('.webox').animate({
						opacity: 'toggle'
					}, 1000);
					//关闭背景层
					$('.background').animate({
						opacity: 'toggle'
					}, 1000);
				},2000)
				
			}
			/* 结束 20130528 */
	}
});