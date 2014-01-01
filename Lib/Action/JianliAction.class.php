<?php
class JianliAction extends Action {
    public function index(){
		//获得简历列表页中传过来的发送简历的人的id
    	$p_id = $_GET[_URL_][2];
		$actor = M('actor');
		$actor->where(array('p_id'=>$p_id))->select();
		//p($actor);
		$this->display('jianli');
	}
}
?>
