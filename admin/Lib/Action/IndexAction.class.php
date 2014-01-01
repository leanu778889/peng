<?php
/**
 * 后台入口
 * Enter description here ...
 * @author wangteng
 *
 */
class IndexAction extends Action {
    public function index(){
      //检测登陆
        if(!session('name')){
            $this->error('你还没有登陆！','admin.php?m=Login&a=login');
            exit;
        }
      //判断用户类型
       $ug = M('users_group');  
       $ustype = $ug->field('usgp_name')->where(array('usgp_id'=>session('usgp_id')))->find();
       $ustype = $ustype['usgp_name'];
       $this->assign('ustype',$ustype);
       //加载一级导航菜单
       $menu_id = $this->check_power();
        //查询一级菜单导航
       $menus = M('menus');
       $where = "`menu_pid`=0 AND `menu_rank`=1 AND `menu_state`=1 {$menu_id}";
       $firstmenu = $menus->field('menu_id,menu_name')
                          ->where($where)
                          ->order('menu_sort')
                          ->select();
    // echo $menus->getLastSql();
       $firstmenu = json_encode($firstmenu); 
       $this->assign('firstmenu',$firstmenu);
        //加载模板
       $this->display('Index');
    }
    public function ajax_menu(){
        $id = $_GET['pid'];
        $menus = M('menus');
        $menu_id = $this->check_power();
        $where = "`menu_pid`=$id AND `menu_rank`=2 AND `menu_state`=1 {$menu_id}";
        $leftmenu = $menus->where($where)
                          ->order('menu_sort')
                          ->select();

        echo json_encode($leftmenu); 
    }
 //检测查菜单权限
    public function check_power(){
        $poe = M('menus_power');
    //检测菜单权限
        if(session('usgp_id') == 1){
    		$menu_id = '';
    	}else{
    	    //检测组权限
    		/*$access = $this->db->select('menus_power',"id=0 and usgp_id=".$_SESSION['usgp_id'],'menu_id');
    		$access = $poe->field('menu_id')*/
    		//检测用户权限
    		//得到登陆的id
    		$loginuser = $poe->field('menu_id')->where(array('usgp_id'=>session('usgp_id')))->select();
    		if(!empty($loginuser)){
    		    foreach($loginuser as $ke=>$val){
    		        $loginu .= $val['menu_id'].',';
    		    }
    		    $loginu = rtrim($loginu,',');
    		}
    			/*if(!empty($access)){
    		    foreach($access as $key=>$value){
        			$acces .= $value['menu_id'].',';
        		}
        		$loginu = isset($loginu) ? ','.$loginu : '';
        		$acces = rtrim($acces,',');
        		$acces = $acces.$loginu;
    		}*/
    		
    		
    		if(empty($loginu)){
    		    
    			$menu_id = "AND `menu_id`=''";
    		}else{
    			$menu_id = "AND  `menu_id` in($loginu)";
    		}
    		
	    }
	    return $menu_id;
    
    
    }
    /**
     * 后台欢迎界面
     */
    public function welcome(){
         //系统信息
        if (function_exists('gd_info')) {
            $gd = gd_info();
            $gd = $gd['GD Version'];
        } else {
            $gd = "不支持";
        }
        $sysinfo = array(
            '操作系统'     => PHP_OS,
            '主机名IP端口' => $_SERVER['SERVER_NAME'] . ' (' . $_SERVER['SERVER_ADDR'] . ':' . $_SERVER['SERVER_PORT'] . ')',
            '运行环境'     => $_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式'  => php_sapi_name(),
            '程序目录'     => dirname(__FILE__).DIRECTORY_SEPARATOR,
            'MYSQL版本'    => function_exists("mysql_close") ? mysql_get_client_info() : '不支持',
            'GD库版本'	   => $gd,
            '上传附件限制'  => ini_get('upload_max_filesize'),
            '执行时间限制'  => ini_get('max_execution_time') . "秒",
            '剩余空间'	   => round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M',
            '服务器时间'    => date("Y年n月j日 H:i:s"),
            '框架版本'	   => THINK_VERSION,
        	
        ); 
        $this->assign('sysinfo',$sysinfo);
       //加载模板
       $this->display('Welcome');
    }
}