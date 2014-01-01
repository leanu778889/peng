<?php
/**
 * 前台配置文件
 */
defined('THINK_PATH') or exit();
return array(
	'APP_STATUS'            => 'debug',     //应用调试模式状态
	'URL_MODEL'             => '2',         //URL模式
	'URL_CASE_INSENSITIVE'  => true,        // 默认false 表示URL区分大小写 true则表示不区分大小写
	'DEFAULT_V_LAYER'		=>'Tpl2',
	'URL_HTML_SUFFIX'       => 'html',      //伪静态
    'SESSION_AUTO_START'    => true,        //是否开启session
	'DEFAULT_CHARSET'=> 'utf-8',			//调整编码
	'LOAD_EXT_FILE'         => 'Global',//加载函数库
	'DEFAULT_MODULE'     => 'Index', //默认模块
	'TMPL_PARSE_STRING'     => array(
        'CSS_PATH'	=> './Public/css/',
        'JS_PATH'	=> './Public/js/',
        'IMAGES_PATH'	=> './Public/images/',
    ),//后台样式路径
/*   'URL_ROUTER_ON'   => true, //开启路由
	'URL_ROUTE_RULES' => array( //定义路由规则
	    'addmes/:id'  => 'Register/addmes',
    	'login' => 'Login/login',
    	//'index' => 'Index/index',
    	'register'	=>	'Register/register',
	),*/


    /* 数据库设置 */
    'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'filmhr',     // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => '123456',      // 密码
    'DB_PORT'               => '3306',      // 端口
    'DB_PREFIX'             => 'act_',      // 数据库表前缀
);
?>