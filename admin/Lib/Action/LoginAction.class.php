<?php 
/**
 *LoginAction.class.php 
 * @author                 wangyanteng
 * @copyright            (C)2013
 * @license                http://www.longtengjiazu.com
 * @lastmodify           2013-11-10
 */
class LoginAction extends Action {
    public function login(){
      if($_POST){
      	$conf  = C('LOGIN_ADMIN_RULE');		//	获取配置文件中信息
      	$login = $_POST['login'];
      	if($conf['CODE_ON'] == 1){			//如果验证码已开启
	      	if($login['verify'] == ''){	
	      		$this->error('请输入验证码');exit();
	      	}
	      	if($_SESSION['verify'] != md5($login['verify'])) {		//判断验证码
			   $this->error('验证码错误！');exit();
			}
      	}
      	$user=M('users');
      	
		$where = array(
			'user_name' => $login['username'],
			'user_password' => encrypt($login['password']),
		);
		
		// 把查询条件传入查询方法
		$res = $user->field('usgp_id,user_name')->where($where)->select();
		//p($res);exit();
		//echo $user->getLastSql();
		if($res){
			$usgp_id = $res[0]['usgp_id'];
			$usergroup=M('users_group');
			$usgp_state = $usergroup->field('usgp_state')->where(array('usgp_state'=>1,'usgp_id'=>$usgp_id))->find();

			if($usgp_state['usgp_state'] == 1){
				
				$login_log = $conf['LOGIN_LOG_ON'];
				if($login_log == 1){
					$arr['lnlg_username'] = $res[0]['user_name'];
					$arr['lnlg_time']     = $_SERVER['REQUEST_TIME'];
					$arr['lnlg_ip']       = $_SERVER['SERVER_ADDR'];
					$arr['usgp_id']       = $usgp_id;
					$login_log = M('login_log');
					$login_log->add($arr);
				}
					session('name',$res[0]['user_name']);  //设置session存储用户名
					session('usgp_id',$usgp_id);			//存储用户组ID
					$this->success('登陆成功', 'admin.php?m=Index&a=index');
			}else{
				$this->error('登陆失败,用户被禁用');
			}
		}else{
			$this->error('登陆失败,用户名或密码错误');
		}
      }else{	
      	$this->display('Login'); 
      }
    }
	/**
	 * 加载验证码
	 * Enter description here ...
	 */
    Public function verify(){
	    import('ORG.Util.Image');
	    Image::buildImageVerify();
	}
    
    //注销
    public function logout(){
        cookie(null); // 清空当前设定前缀的所有cookie值
    	session('name',null);
    	Session('usgp_id',null);
    	$this->success('注销成功', 'admin.php?m=Login&a=login');
    }
}