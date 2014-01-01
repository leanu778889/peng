<?php
class TeamselfAction extends Action {
	//加载个人信息模板页
	public function teamself(){
		$this->display('teamselflist');	
	}
	//加载审核演员简历是否通过
	public function shenhe(){
		$pid = session('p_id');
		$team = M('team');
		$examine = M('examine');
		$actor = M('actor');
		$tmess = $team->field('j_name,t_id')->where(array('p_id'=>$pid))->find();
		//获得当前剧组的角色表的id
		$tid = $tmess['t_id'];
		//从角色表中查询到当前剧组中所有的角色
		$team_role = M('team_role');
		$rolemess = $team_role->where(array('t_id'=>$tid))->select();
		foreach ($rolemess as $key=>$value){
			$ro_id = $value['ro_id'];
			$userid = $examine->field('p_id')->where(array('ro_id'=>$ro_id,'isthrouth'=>1))->select();
			if($userid){
				foreach ($userid as $ke=>$val){
					$userid['p_id'][$ke] = $val['p_id'];
				}
			}
			$result = array_unique ($userid['p_id']);
		//获得用户id
			$party = '';
			foreach($result as $k=>$v){
			// 通过用户id查询到投递简历的演员的信息
				$party[] = $actor->where(array('p_id'=>$v))->find();
				//$party[$k]['image_self'] = $party[$k]['image_self'];	
				foreach ($party as $bb=>$aa){
					$image = $aa['image_self'];
					$imag = unserialize($image);
					$img = explode(',',$imag);
					$im = explode('|', $img[0]);
					$path = $im[1];
					$party[$k]['path'] = $path;
				}
			}
			$all[$key] = $party; 
		}
		//p($all);
		//将剧组名传过去
		$this->assign('j_name',$tmess['j_name']);
		$this->assign('all',$all);
		$this->display('shenhe');
	}
	//投递简历
    public function index(){
		if(session('p_id')){
			$actor = M('actor');
			$examine = M('examine');
			$obj = explode('_',$_POST['obj']);
			$arr['ro_id'] = $obj[1];
			$arr['t_id'] = $obj[0];
			$arr['ex_time'] = $_SERVER['REQUEST_TIME'];
			$arr['p_id'] = session('p_id');			
			$arr['ro_examine'].=','.session('p_id');
			$count = $actor->field('count')->where(array('p_id'=>$arr['p_id']))->find();
			if($count['count']>0){
				$res  = $examine->add($arr);
				if($res){	
						//加个判断是否
					$save['count'] = $count['count']-1;
					$sav = $actor->where(array('p_id'=>$arr['p_id']))->save($save);			//提交简历后次数减一
					echo 1;
				}else{
					echo 2;
				}
			}else{
				//echo "<script>alert('亲，您的简历投递次数已用完，请与客服联系')</script>";
			}
			
		}
	}
	//检测24小时内不可再投递简历
	public function test(){
		$examine = M('examine');
		$p_id =  session('p_id');
		$ro_id = rtrim($_POST['ro_id'],'_');
		$roid = explode('_', $ro_id);
		foreach ($roid as $ke=>$val){
			$res = $examine->field('ex_time')->where(array('p_id'=>$p_id,'ro_id'=>$val['roid']))->select();
			foreach($res as $key=>$value){
				$timearr[]=$value['ex_time'];
			};
			$time = time()-max($timearr)-86400;		//判断最后的一次投递简历的时间(一天时间为86400s)
			if($time<0){
				$zuhe[] = $_POST['t_id'].'_'.$val;
			}
		}
		echo json_encode($zuhe);
	}
	
	//加载显示简历的列表页
	public function messshow(){
		$message = M('message');
		$me_get_id = 2;
		$res = $message->field('me_post_id')->where(array('me_get_id'=>$me_get_id))->select();
		foreach($res as $key=>$value){
			$poid[] = $value['me_post_id'];
		}
		echo json_encode($poid);
		//echo $res['me_post_id'];
	}
	
	public function castDetail(){
		$this->display('castDetail');
	}
}
?>
