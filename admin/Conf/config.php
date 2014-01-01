<?php
/**
 * 后台配置文件
 */
return array(
    'APP_STATUS'            => 'debug', //应用调试模式状态
	'URL_MODEL'        	    => '0', //URL模式
	'URL_CASE_INSENSITIVE'  => true,        // 默认false 表示URL区分大小写 true则表示不区分大小写
    'SESSION_AUTO_START'    => true, //是否开启session
    'SESSION_TABLE'			=> 'session', //session表
    'LOAD_EXT_FILE'         => 'Global',//加载函数库
    'TMPL_TEMPLATE_SUFFIX'  => '.tpl.php',//视图格式
    'TMPL_PARSE_STRING'     => array(
        'CSS_PATH_ADMIN'	=> './admin/Public/Css/',
        'JS_PATH_ADMIN'		=> './admin/Public/Js/',
        'IMAGES_PATH_ADMIN'	=> './admin/Public/Images/',
		'UEDITOR'			=> './Public/ueditor/'
    ),//后台样式路径
    /*登陆规则*/
    'LOGIN_ADMIN_RULE'      => array(
        'CODE_ON'			=> '1',//是否开启验证码-1开启，0不开启
        'LOGIN_LOG_ON'      => '1',//登陆日志
    ),

    /* 数据库设置 */
    'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => '127.0.0.1', // 服务器地址
    'DB_NAME'               => 'filmhr',     // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => '123465',      // 密码
    'DB_PORT'               => '3306',      // 端口
    'DB_PREFIX'             => 'act_',      // 数据库表前缀

);
?>