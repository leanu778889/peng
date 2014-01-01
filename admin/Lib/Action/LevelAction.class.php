<?php
class LevelAction extends Action{
	public function level(){
		$actor = M('actor');
    	$party = M('Party');
    	$type = M('type');
    	$res = $actor->where(array('star' => ''))->select();
    	foreach($res as $key=>$value){
    		$path = $value['image_self'];
    		$imag = unserialize($path);		//获取此用户的图片储存地址
    		$imapath = explode(',', $imag);
    		$imapath = explode('|', $imapath[0]);
    		$imagepath = $imapath[1];
    		$p_id = $value['p_id'];				//获取此用户的用户名id
    		$t_id = $value['t_id'];				//获取此用户的类型id
    		$partname = $party->field('p_name')->where(array('p_id'=>$p_id))->find();
    		$typename = $type->field('t_name')->where(array('t_id'=>$t_id))->find();
    		$res[$key]['p_name'] = $partname['p_name'];
    		$res[$key]['a_id'] = $value['a_id'];
    		$res[$key]['t_name'] = $typename['t_name'];
    		$res[$key]['imagepath'] = $imagepath;
    	}
    	$this->assign('res',$res);
		$this->display('level');
	}
	
	//增加演员星级方法
	public function reb(){
		$actor = M('actor');
		$value = explode('_',$_GET['val']);
		$star = $value[0];
		$aid = $value[1];
		$a = $actor->where(array('a_id'=>$aid))->save(array('star'=>$star));
		if($a){
			echo '1';
		}else{
			echo '0';
		}	
	}
	
}