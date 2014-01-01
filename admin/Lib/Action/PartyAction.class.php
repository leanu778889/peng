<?php
class PartyAction extends Action {
	public function party(){
		$type = M('type');
		$typename = $type->select();
		$this->assign('typename',$typename);
		$this->display('Party');
	}
	
	//增加所有用户方法
	public function addparty(){
		$party = M('party');
		$arr['p_name'] = $_POST['info']['name'];
		$arr['p_password'] = $_POST['info']['pwd'];
		$repwd = $_POST['info']['repwd'];
		if($arr['p_password']!=$repwd){
			skip_ajax('两次密码不一致！','',2);exit();
		}else{
			$arr['type'] = $_POST['info']['type'];
			$result = $party->add($arr);
			if($result){
				skip_ajax('录入成功！','admin.php?m=Party&a=party',1);
			}else{
				skip_ajax('录入失败！','admin.php?m=Party&a=party',2);
			}
		}
	}
	
	//添加演员具体信息页面
	public function addactmess(){
		$actor = M('actor');
		if($_POST){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Public/uploads/';// 设置附件上传目录
			if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
				foreach ($info as $key=>$value){
					$filename.=$value['name'].'|'.$value['savename'].',';
				}
				$photo = rtrim($filename,',');
			}
			//获得了上传文件的名了，，再加上各种信息
			//获取视频地址组合成数组
			$arr['image_self'] = $photo;
			$vediopath = $_POST['video'];
			foreach ($vediopath as $k=>$val){
				$arr['video'].=$val.',';
				
			}
			$arr['truename'] = $_POST['info']['truename'];
			$arr['sex'] = $_POST['info']['sex'];
			$arr['birth'] = strtotime($_POST['info']['age']);
			$arr['t_id'] = $_POST['info']['type'];
			$arr['native'] = $_POST['info']['native'];
			$arr['work_place'] = $_POST['info']['work_place'];
			$arr['live_place'] = $_POST['info']['live_place'];
			$arr['high'] = $_POST['info']['high'];
			$arr['special'] = $_POST['info']['special'];
			$arr['weight'] = $_POST['info']['weight'];
			$arr['hobby'] = $_POST['info']['hobby'];
			$arr['truetel'] = $_POST['info']['truetel'];
			$arr['email'] = $_POST['info']['email'];
			$arr['g_school'] = $_POST['info']['g_school'];
			$arr['job'] = $_POST['info']['job'];
			$arr['show_experience'] = $_POST['info']['show_experience'];
			$arr['representative'] = $_POST['info']['representative'];
			$arr['other_works'] = $_POST['info']['other_works'];
			$arr['description'] = $_POST['info']['description'];
			$arr['reword'] = $_POST['info']['reword'];
			//p($arr);
			$res = $actor->add($arr);
			if($res){
				skip_ajax('录入成功！','admin.php?m=Actormess&a=actormess',1);
			}else{
				skip_ajax('录入失败！','admin.php?m=Party&a=addactmess',2);
			}
		}else{
			//将party用户表中没有对应用户的id值查出来--（先从actor表中查询出已经有数据的id值,然后从party用户表中查询出没有数据的id）
			$actor = M('actor');
			$party = M('party');
			$pid = $actor->field('p_id')->select();
			foreach ($pid as $k=>$val){
				$valpid.=$val['p_id'].',';
			}
			$valpid = rtrim($valpid,',');
			$otherpid = $party->field('p_id')->where("`p_id`not in(".$valpid.") and `type`=1")->select();
			$type = M('type');
			$typename = $type->select();
			$this->assign('otherpid',$otherpid);
			$this->assign('typename',$typename);
			$this->display('addactmess');
		}
	}
	
	//添加剧组具体信息页面
	public function addteammess(){
		if($_POST){
			//p($_POST);
			$team = M('team');
			$arr['p_id'] = '';
			$arr['j_name'] = $_POST['info']['j_name'];
			$arr['direct'] = $_POST['info']['direct'];
			$arr['j_time'] = strtotime($_POST['info']['j_time']);
			$arr['company'] = $_POST['info']['company'];
			$arr['j_address'] = $_POST['info']['j_address'];
			$arr['ty_id'] = $_POST['info']['ty_id'];
			$arr['j_message'] = $_POST['info']['j_message'];
			$arr['j_introduction'] = $_POST['info']['j_introduction'];
			$arr['j_tel'] = $_POST['info']['j_tel'];
			$arr['j_state'] = $_POST['info']['j_state'];
			$arr['j_checkname'] = $_POST['info']['j_checkname'];
			$arr['writer'] = $_POST['info']['writer'];
			$res =$team->add($arr);
			if($res){
				//剧组信息录入后获取id录入进角色中
				$team_role = M('team_role');
				$tid = $team->field('t_id')->where(array('j_name'=>$arr['j_name'],'direct'=>$arr['direct'],'ty_id'=>$arr['ty_id']))->find();
				$rolearr['t_id'] = $tid['t_id'];
				$rolearr['ro_name'] = $_POST['ro_name'];
				$rolearr['ro_introduce'] = $_POST['ro_introduce'];
				$team_role->add($rolearr);
				skip_ajax('录入成功！','admin.php?m=Party&a=party',1);
			}else{
				skip_ajax('录入失败！','admin.php?m=Party&a=party',2);
			}
		}else{
			$teamtype = M('team_type');
			$tetype = $teamtype->select();
			$this->assign('tetype',$tetype);
			$this->display('addteammess');
		}
	}
}