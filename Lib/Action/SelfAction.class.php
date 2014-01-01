<?php
class SelfAction extends Action{
	public function index(){
		$this->display('detail');
	}
	
	public function message(){
		$message = M('message');
		$where=array(
			'me_state' =>1,
			'me_get_id' => session('p_id'),
		);
		$res = $message->where($where)->limit(3)->select();
		foreach ($res as $ke=>$val){
			if(empty($val)){
				break;
			} 
			$title = msubstr($val['me_title'],0,5);
			$obj .=  '<dd><a href="messhow/'.$val['me_id'].'" target="_blank">'.$title.'</a></dd>'; 
		}
		echo $obj;
	}
	
	/**
	 * 提示消息后点击消息显示
	 * Enter description here ...
	 */
	public function messhow(){
		$this->display('messshow');
		$message = M('message');
		$res = $message->where(array('me_id' =>$_GET[_URL_][2]))->select();
		//p($res);
		$data['me_state'] = 2;
		$result = $message->where(array('me_id' =>$_GET[_URL_][2]))->data($data)->save();
	}
}
