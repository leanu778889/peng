<?php
class ActmessageAction extends Action {
	public function index(){
		//演员类型查询
		$type = M('type');
		$typemess = $type->select();
		//预先查询出信息显示
		$actor = M('actor');
		import('ORG.Util.Page');		//导入分页类
		$mapcount = $actor->count();	//查询满足记录的总记录数
		$page = new Page($mapcount,2);	// 实例化分页类 传入总记录数和每页显示的记录数
		$res = $actor->limit($page->limit)->select();
		foreach ($res as $key=>$value){
			$image = $value['image_self'];
			$imag = unserialize($image);
			$img = explode(',',$imag);
			$im = explode('|', $img[0]);
			$path = $im[1];
			$res[$key]['path'] = $path;
		}
		//p($res);
		$this->assign('typemess',$typemess);
		$this->assign('res',$res);
		$this->display('actmessage');
	}

	

	/**
	 * 显示演员的具体的信息方法
	 * Enter description here ...
	 */
	public function actshow(){
		if(!session('p_id')){
			$this->success('请登陆', '__APP__/login.html');exit();
		}
			$actor = M('actor');
			$party = M('party');
			//获得列表中传过来的id
			$a_id = $_GET[_URL_][2] ;
			$res = $actor->where(array('a_id'=>$a_id))->select();
			$p_id = session('p_id');//获得当前用户的p_id
			$type = $party->field('type')->where(array('p_id'=>$p_id))->find();//通过p_id获得当前登陆进来用户的类型
			$typename = $type['type'];
			$arr = $res[0];
			foreach ($res as $key=>$value){
				$image = $value['image_self'];
				$imag = unserialize($image);
				$img = explode(',',$imag);
				foreach($img as $im=>$impath){
					$ar_img[$im] = explode('|', $impath);
					$array_image[$im] = $ar_img[$im][1];				//获取此用户的多张图片储存路径
				}
				$im = explode('|', $img[0]);
				$arr['path'] = $im[1];			//获得图片储存地址
				$arr['a_id'] = $a_id;
				$arr['p_id'] = $value['p_id'];
				$arr['truename'] = $value['truename'];	//获取演员姓名
				$arr['show_experience'] = $value['show_experience'];	//获取演员演艺经历
				$arr['representative'] = $value['representative'];		//演员代表作信息
			}
			$leng = count($array_image);
			$this->assign('leng',$leng);
			$this->assign('array_image',$array_image);
			$this->assign('typename',$typename);
			$this->assign('arr',$arr);
			$this->display('detail');		
	}
	
	//查询条件查询方法
	function search(){
		$sex = $_POST['val'];
		$ty = explode('_', $sex);
		if($ty[1]==''){
			$where = array('sex'=>$ty[0]);
		}else{
			$where = array('t_id'=>$ty[1],'sex'=>$ty[0]);
		}
		$actor = M('actor');
		$res = $actor->field('a_id,truename,image_self')->where($where)->select();
		foreach ($res as $key=>$value){
			$image = $value['image_self'];
			$imag = unserialize($image);
			$img = explode(',',$imag);
			$im = explode('|', $img[0]);
			$path = $im[1];
			$res[$key]['path'] = $path;
		}
		echo json_encode($res);
	}
	

	/**
	 * 加载消息发送方法
	 */
	public function sendmessage(){
		$message = M('message');
		$arr['me_get_id'] = $_POST['p_id'];
		$arr['me_post_id'] = session('p_id');
		$arr['me_content'] = $_POST['content'];
		$arr['me_title'] = $_POST['title'];
		$arr['me_time'] = $_SERVER['REQUEST_TIME'];
		$res = $message->add($arr);
		if($res){
			echo '1';
		}else{
			echo '2';	
		}
	}
}