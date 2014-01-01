<?php
class LoginAction extends Action {
    public function index(){
    	$party = M('party');
		 if($_POST){
			$res = $party->where(array('p_name' => $_POST['username'],'p_password' => encrypt($_POST['password']),'type' => $_POST['type']
			))->select();
				if(!empty($res)){
					session('p_id',$res[0]['p_id']);
					session('type',$res[0]['type']);
					session('partname',$res[0]['p_name']);  //设置session存储用户名
					if($type == 1){				//类型为1及为演员登陆
						$this->success('登陆成功', 'index.html');
					}else{							//类型为2及为剧组登陆
						$this->success('登陆成功', 'index.html');
					}
				}else{
					$this->error('用户名或密码错误');exit();
				}
	    }else{
	    	$party_type=M('party_type');
		    $ptypes = $party_type->select();
		    $this->assign('ptypes',$ptypes);
	   		$this->display('login');
	    }
    }
}