<?php
class TeamAction extends Action {
	
	/**
	 * 加载剧组列表方法
	 * Enter description here ...
	 */
	public function index(){
		$team = M('team');
		$party = M('Party');
    	$teamtype = M('team_type');
    	$res = $team->select();
    	foreach($res as $key=>$value){
    		$path = $value['j_image'];
    		$imag = unserialize($path);		//获取此用户的图片储存地址
    		$imapath = explode('|', $imag);
    		$imagepath = $imapath[1];
    		$p_id = $value['p_id'];				//获取此用户的用户名id
    		$typeid = $value['type'];				//获取此用户的类型id
    		$partname = $party->field('p_name')->where(array('p_id'=>$p_id))->find();
    		$typename = $teamtype->field('t_name')->where(array('t_id'=>$typeid))->find();
    		//组合进数组中
    		$res[$key]['p_name'] = $partname['p_name'];
    		$res[$key]['p_id'] = $p_id;
    		$res[$key]['t_id'] = $value['t_id'];
    		$res[$key]['t_name'] = $typename['t_name'];
    		$res[$key]['imagepath'] = $imagepath;
    	}
		$this->assign('res',$res);
		$this->display('team');
	}
	
	/**
	 * 加载剧组信息修改方法和查看详细信息方法
	 */
	public function seemore(){
		$tid = $_GET['tid'];
		$team = M('team');
		$teamres = $team->where(array('t_id'=>$tid))->select();
		p($teamres);
	}
	//修改剧组信息
	public function rebuilt(){
		echo $tid = $_GET['tid'];
	}
	
	/**
	 * 加载剧组信息删除方法
	 */
	
	public function del(){
		p($_GET);
	}
}