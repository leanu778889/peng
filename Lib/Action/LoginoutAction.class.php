<?php
class LoginoutAction extends Action {
    public function index(){
		//注销
	        cookie(null); // 清空当前设定前缀的所有cookie值
	    	session('p_id',null);
	    	Session('partname',null);
	    	$this->success('注销成功', 'index.html');
	    }
    }