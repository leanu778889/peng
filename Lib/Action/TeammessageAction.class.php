<?php 
/**
 *TestAction.class.php 
 * @author                 wangyanteng
 * @copyright            (C)2013
 * @license                http://www.longtengjiazu.com
 * @lastmodify           2013-11-9
 */
class TeammessageAction extends Action {
    public function index(){
        $this->display('teammessage');
    }
    public function addteam(){
    	
    }

    public function teleplay(){
    	$team = M('team');
		$teamtype = M('team_type');
		$typename = $teamtype->where(array('ty_id'=>2))->find();
    	$res = $team->where(array('ty_id'=>2))->select();
		foreach ($res as $key=>$value){
			//剧组的剧照获取（目前不用）
			/*$image = $value['j_image'];
			$imag = unserialize($image);
			$img = explode(',',$imag);
			$im = explode('|', $img[0]);
			$path = $im[1];
			$res[$key]['path'] = $path;*/
			$res[$key]['j_play_intro'] = msubstr($value['j_play_intro'],0,30);
		}
		//p($res);
    	$this->assign('typename',$typename['t_name']);
		$this->assign('res',$res);
    	$this->display('teamlist');
    }
    public function movie(){
    	$team = M('team');
    	$teamtype = M('team_type');
		$typename = $teamtype->where(array('ty_id'=>1))->find();
    	$res = $team->where(array('ty_id'=>1))->select();
    	foreach ($res as $key=>$value){
    		$res[$key]['j_play_intro'] = msubstr($value['j_play_intro'],0,30);
    	}
    	$this->assign('typename',$typename['t_name']);
		$this->assign('res',$res);
    	$this->display('teamlist');
    }
    
    public function tv(){
    	$team = M('team');
    	$teamtype = M('team_type');
		$typename = $teamtype->where(array('ty_id'=>3))->find();
    	$res = $team->where(array('ty_id'=>3))->select();
    	foreach ($res as $key=>$value){
    		$res[$key]['j_play_intro'] = msubstr($value['j_play_intro'],0,30);
    	}
    	$this->assign('typename',$typename['t_name']);
		$this->assign('res',$res);
    	$this->display('teamlist');
    }
    
    public function activities(){
    	$team = M('team');
    	$teamtype = M('team_type');
		$typename = $teamtype->where(array('ty_id'=>4))->find();
    	$res = $team->where(array('ty_id'=>4))->select();
    	$this->assign('typename',$typename['t_name']);
		$this->assign('res',$res);
    	$this->display('teamlist');
    }
    
    public function show(){
    	//取得上级页面传过来id
    	$t_id = $_GET[_URL_][2];
    	$team = M('team');
    	$res = $team->where(array('t_id'=>$t_id))->find();
    	//$ro_id = $res['ro_id'];			//获得剧本角色表id
    	$team_role = M('team_role');
    	$ro_mess = $team_role->field('t_id,ro_id,ro_name,ro_introduce')->where(array('t_id'=>$t_id))->select();
    	foreach ($ro_mess as $key=>$value){
    		$ro_id.=$value['ro_id'].'_';
    	}
    	$this->assign('t_id',$t_id);
    	$this->assign('ro_mess',$ro_mess);
    	$this->assign('ro_id',$ro_id);
    	$this->assign('res',$res);
    	$this->display('teamshow');
    }
}