<?php $conf = C('LOGIN_ADMIN_RULE');?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>网站后台管理</title>
		<meta name="robots" content="noindex,nofollow">
		<link href="<?php echo CSS_PATH_ADMIN;?>admin_login.css" rel="stylesheet" />
        
        
        <!--[if lt IE 9]>
        <script>
        document.createElement('header');
        document.createElement('nav');
        document.createElement('section');
        document.createElement('article');
        document.createElement('aside');
        document.createElement('footer');
        document.createElement('hgroup');

        </script>
        <![endif]-->
		<script type="text/javascript">
			if (window.parent !== window.self) {
					document.write = '';
					window.parent.location.href = window.self.location.href;
					setTimeout(function () {
							document.body.innerHTML = '';
					}, 0);
			}
		</script>
	</head>
<body>
	<div class="wrap">
		<h1><a href="#">后台管理中心</a></h1>
		<form method="post" name="login" action="" autoComplete="off">
			<div class="login">
				<ul>
					<li>
						<input class="input" id="J_admin_name" required name="login[username]" type="text" placeholder="帐号名" title="帐号名" />
					</li>
					<li>
						<input class="input" id="admin_pwd" type="password" required name="login[password]" placeholder="密码" title="密码" />
					</li>
					
				  	
				  	<?php if($conf['CODE_ON']==1){?>	
					<li>
						<input class="input" type="text" name="login[verify]" style="width:130px;" placeholder="请输入验证码" /><span class="tips_loading"><img style="width:95px; height:26px;" title="看不清？单击此处刷新" onclick="this.src+='&rand='+Math.random();"  src="admin.php?m=Login&a=verify"></span>
					</li>
					<?php }?>
				</ul>
				<button type="submit" name="submit" class="btn">登录</button>
			</div>
		</form>
	</div>



<script src="<?php echo BACK_JS;?>jquery.js"></script>
<script src="<?php echo BACK_JS;?>common.js"></script>
<script>
(function(){
	document.getElementById('J_admin_name').focus();

	getVerifyTemp({wrap : $('#J_verify_code')});

	

		wrap.off('click').on('click', '#J_verify_update_a', function(e){
			//换一个
			e.preventDefault();

			if(wrap.find('.tips_loading').length) {
				//防多次点击
				return false;
			}

			var clone = wrap.clone();
			wrap.html('<span class="tips_loading">验证码loading</span>');
			getVerifyTemp({
				wrap : wrap,
				clone : clone
			});

			if(afterClick) {
				afterClick();
			}
		}).on('click', '#J_verify_update_img', function(e){
			//点击图片
			$('#J_verify_update_a').click();
		});
	}
})();
</script>
</body>
</html>
