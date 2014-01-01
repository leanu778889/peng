<?php
class RegisterAction extends Action {
	public function register(){
		$this->display('register_list');
	}

	//检测同户名是否已注册
	public function testname(){
		$party = M('party');
		$where = array(
			'p_name' => trim($_GET['name']),
		);
		$uArr = $party->where($where)->select();
		if($uArr){
			echo 1;
		}else{
			echo 0;
		}
	}
	/**
	 * 演员详细信息注册方法
	 * Enter description here ...
	 */
	public function addmes(){
		$actor = M('actor');
		$party = M('party');
		if($_POST){
			$pty['p_name'] = $_POST['username'];
			$pty['p_password'] = encrypt($_POST['password']);
			$pty['type'] = 2;
			$end = $party->add($pty);
			if($end){
				//查询出成员表中的这个用户的id号
				$pid = $party->field('p_id')->where(array('p_name'=>$pty['p_name'],'p_password'=>$pty['p_password']))->find();
				import('ORG.Net.UploadFile');
				$upload = new UploadFile();// 实例化上传类
				$upload->maxSize  = 3145728 ;// 设置附件上传大小
				$upload->saveRule = setname;
				$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->savePath =  './Public/uploads/';// 设置附件上传目录
				if(!$upload->upload()) {		// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
				}else{// 上传成功 获取上传文件信息
					$info =  $upload->getUploadFileInfo();
					$arr['self_photo'] = $info[0]['savename'];		//获取的第一个为个人图像
					foreach ($info as $key=>$value){
						$filename.=$value['name'].'|'.$value['savename'].',';
					}
					$photo = rtrim($filename,',');
				}
				$arr['image_self'] = $photo;
				//获取上传文件名
				$arr['p_id'] = $pid['p_id'];
				$arr['truename'] = $_POST['truename'];
				$arr['stagename'] = $_POST['stagename'];
				$arr['t_id'] = $_POST['type'];
				$arr['sex'] = $_POST['sex'];
				$arr['birth'] = strtotime($_POST['birth']);
				$arr['image_self'] = serialize($photo);
				$arr['live_place'] = $_POST['live_place'];
				$arr['age_id'] = $_POST['age_id'];
				$arr['t_id'] = $_POST['type'];
				$arr['native'] = $_POST['native'];
				$arr['high'] = $_POST['high'];
				$arr['weight'] = $_POST['weight'];
				$arr['special'] = $_POST['special'];
				$arr['hobby'] = $_POST['hobby'];
				$arr['email'] = $_POST['email'];
				$arr['tel'] = $_POST['tel'];
				foreach ($_POST['g_school'] as $sc=>$school){
					$arr['g_school'].=$school.',';
				}				//毕业院校组合成字符串
				$arr['q_company'] = $_POST['qytype'];
				//$arr['job'] = $_POST['job'];
				foreach ($_POST['video'] as $ve=>$vedio){
					$arr['video'].=$vedio.',';
				}				//视频地址组合成字符串
				foreach ($_POST['reword'] as $re=>$reword){
					$arr['reword'].=$reword.',';
				}
				$arr['saywords'] = $_POST['saywords'];
				$arr['description'] = $_POST['description'];
				$res = $actor->add($arr);
				//echo $actor->getLastSql();
				//注册成功之后跳转至主页
				if($res){
					$this->redirect('Index/index','', 2, '页面跳转中...');
				}
				//echo $actor->getLastSql();
			}else{
				echo '<script>alert("注册失败，请联系管理员")</script>';
			}
		}else{
			$type = M('type');
			$agegroup = M('age_group');
			$agename = $agegroup->select();
			$typename = $type->field('t_id,t_name')->select();
			$this->assign('agename',$agename);
			$this->assign('typename',$typename);
			$this->assign('p_id',$_GET[_URL_][2]);
			$this->display('addmes');
		}
	}
	/**
	 * 剧组注册详细信息方法
	 */
	public function addteam(){
		$team = M('team');
		$team_role = M('team_role');
		$party = M('party');
		if($_POST){
			$pty['p_name'] = $_POST['username'];
			$pty['p_password'] = encrypt($_POST['password']);
			$pty['type'] = 1;
			$end = $party->add($pty);
			if($end){
				$pid = $party->field('p_id')->where(array('p_name'=>$pty['p_name'],'p_password'=>$pty['p_password']))->find();
				$arr['p_id'] = $pid['p_id'];
				$arr['j_play_name'] = $_POST['j_play_name'];
				$arr['ty_id'] = $_POST['type'];
				$arr['j_tel'] = $_POST['j_tel'];
				$arr['j_background'] = $_POST['j_background'];
				$arr['direct'] = $_POST['direct'];
				$arr['j_count'] = $_POST['j_count'];
				$arr['writer'] = $_POST['writer'];
				$arr['truename'] = $_POST['truename'];
				$arr['j_job'] = $_POST['j_job'];
				$arr['j_jzaddress'] = $_POST['j_jzaddress'];
				$arr['j_starttime'] = strtotime($_POST['j_starttime']);
				$arr['j_spendtime'] = $_POST['j_spendtime'];
				$arr['j_endtime'] = strtotime($_POST['j_endtime']);
				$arr['j_checkname'] = $_POST['checkname'];
				$arr['j_address'] = $_POST['j_address'];
				$arr['j_message'] = $_POST['j_message'];
				$arr['company'] = $_POST['company'];
				$res = $team->add($arr);
				 echo $team->getLastSql();
				if($res){
					//添加演员角色
					$tid = $team->field('t_id')->where(array('p_id'=>$arr['p_id']))->find();
					$roarr['t_id'] = $tid['t_id'];
					$roarr['ro_name'] = $_POST['name'];
					$roarr['ro_sex'] = $_POST['sex'];
					$roarr['ro_neednumber'] = $_POST['neednumber'];
					$roarr['ro_needcount'] = $_POST['needcount'];
					$roarr['ro_age'] = $_POST['age'];
					$roarr['ro_high'] = $_POST['high'];
					$roarr['ro_special'] = $_POST['special'];
					$roarr['ro_introduce'] = $_POST['introduce'];
					$roarr['ro_need'] = $_POST['need'];
					$team_role->add($roarr);
					$this->redirect('Index/index','', 2, '录入成功，页面跳转中...');
				}
			}
			//echo $team->getLastSql();
		}else{
			$teamtype = M('team_type');
			$typename = $teamtype->field('ty_id,t_name')->select();
			$this->assign('typename',$typename);
			$this->display('addteam');
		}
	}
	/**
	 * 编剧注册详细信息方法
	 */
	public function addwriter(){
		if($_POST){
			//p($_POST);
			$writer = M('writer');
			$party = M('party');
			$pty['p_name'] = $_POST['username'];
			$pty['p_password'] = encrypt($_POST['password']);
			$pty['type'] = 5;
			$end = $party->add($pty);
			if($end){
				//查询出成员表中的这个用户的id号
				$pid = $party->field('p_id')->where(array('p_name'=>$pty['p_name'],'p_password'=>$pty['p_password']))->find();
				$arr['p_id'] = $pid['p_id'];
				$arr['w_name'] = $_POST['name'];
				$arr['w_sex'] = $_POST['sex'];
				$arr['w_tel'] = $_POST['tel'];
				$arr['w_j_type'] = $_POST['j_type'];
				$arr['w_j_introduction'] = $_POST['j_introduction'];
				$arr['w_gg_type'] = $_POST['gg_type'];
				$resw = $writer->add($arr);
				if($resw){
					$this->redirect('Index/index','', 2, '录入成功，页面跳转中...');
				}
			}
		}else{
			$this->display('addwriter');
		}
	}
	/**
	 * BOSS注册详细信息方法
	 */
	public function addboss(){
		if($_POST){
			$boss = M('boss');
			$party = M('party');
			$pty['p_name'] = $_POST['username'];
			$pty['p_password'] = encrypt($_POST['password']);
			$pty['type'] = 5;
			$end = $party->add($pty);
			if($end){
				//查询出成员表中的这个用户的id号
				$pid = $party->field('p_id')->where(array('p_name'=>$pty['p_name'],'p_password'=>$pty['p_password']))->find();
				$arr['p_id'] = $pid['p_id'];
				for($i=0;$i<count($_POST['type']);$i++){
					$arr['p_id'] = $pid['p_id'];
					$arr['b_type'] = $_POST['type'][$i];
					$arr['b_tel'] = $_POST['tel'][$i];
					$arr['b_rz_introduction'] = $_POST['rz_introduction'][$i];
					$arr['b_tz_introduction'] = $_POST['tz_introduction'][$i];
					$bores = $boss->add($arr);
				}
				if($bores){
					$this->redirect('Index/index','', 2, '录入成功，页面跳转中...');
				}
			}
		}else{
			$this->display('addboss');
		}
	}
	/**
	 * 电视栏目信息注册方法
	 */
	public function addcolumn(){
		if($_POST){
			//p($_POST);exit();
			$party = M('party');
			$column = M('column');
			$pty['p_name'] = $_POST['username'];
			$pty['p_password'] = encrypt($_POST['password']);
			$pty['type'] = 7;
			$end = $party->add($pty);
			if($end){
				//查询出成员表中的这个用户的id号
				$pid = $party->field('p_id')->where(array('p_name'=>$pty['p_name'],'p_password'=>$pty['p_password']))->find();
				$arr['p_id'] = $pid['p_id'];
				$arr['c_name'] = $_POST['name'];
				$arr['c_job'] = $_POST['job'];
				$arr['c_calumnname'] = $_POST['calumnname'];
				$arr['c_lzplace'] = $_POST['lzplace'];
				$arr['c_introduction'] = $_POST['introduction'];
				$arr['c_showtime'] = $_POST['showtime'];
				$arr['c_pingtai'] = $_POST['pingtai'];
				$arr['c_lzplace'] = $_POST['lzplace'];
				$arr['c_zmtype'] = $_POST['zmtype'];
				$arr['c_msplace'] = $_POST['msplace'];
				$arr['c_pingtai'] = $_POST['pingtai'];
				$arr['c_mstime'] = strtotime($_POST['mstime']);
				$arr['c_jb_need'] = $_POST['job_need'];
				$arr['c_sex'] = $_POST['sex'];
				$arr['c_gg_type'] = $_POST['gg_type'];
				$cores = $column->add($arr);
				if($cores){
					$this->redirect('Index/index','', 2, '录入成功，页面跳转中...');
				}
			}
		}else{
			$this->display('addcolumn');
		}
	}
	/**
	 * 大赛信息注册方法
	 */
	public function addbiggame(){
		if($_POST){
			//p($_POST);exit();
			$biggame = M('biggame');
			$party = M('party');
			$pty['p_name'] = $_POST['username'];
			$pty['p_password'] = encrypt($_POST['password']);
			$pty['type'] = 8;
			$end = $party->add($pty);
			if($end){
				//查询出成员表中的这个用户的id号
				$pid = $party->field('p_id')->where(array('p_name'=>$pty['p_name'],'p_password'=>$pty['p_password']))->find();
				for($i=0;$i<count($_POST['type']);$i++){
					$arr['p_id'] = $pid['p_id'];
					$arr['g_type'] = $_POST['type'][$i];
					$arr['g_need'] = $_POST['need'][$i];
					$arr['g_host'] = $_POST['host'][$i];
					$arr['g_organizer'] = $_POST['organizer'][$i];
					$arr['g_entertime'] = $_POST['entertime'][$i];
					$arr['g_endtime'] = $_POST['endtime'][$i];
					$arr['g_bmplace'] = $_POST['bmplace'][$i];
					$arr['g_place'] = $_POST['place'][$i];
					$arr['g_reward_introduce'] = $_POST['reward_introduce'][$i];
					$arr['g_reward_money'] = $_POST['reward_money'][$i];
					$arr['g_ggtype'] = $_POST['ggtype'][$i];
					$bigres = $biggame->add($arr);
					if($bigres){
						$this->redirect('Index/index','', 2, '录入成功，页面跳转中...');
					}
				}
			}
		}else{
			$this->display('addbiggame');
		}
	}
	/**
	 * 导演信息注册方法
	 */
	public function adddirector(){
		if($_POST){
			//p($_POST);exit();
			$director = M('director');
			$directormess = M('directormess');
			$party = M('party');
			$pty['p_name'] = $_POST['username'];
			$pty['p_password'] = encrypt($_POST['password']);
			$pty['type'] = 9;		//导演的类型id
			$end = $party->add($pty);
			if($end){
				//查询出成员表中的这个用户的id号
				$pid = $party->field('p_id')->where(array('p_name'=>$pty['p_name'],'p_password'=>$pty['p_password']))->find();
				$arr['p_id'] = $pid['p_id'];
				$arr['d_name'] = $_POST['name'];
				$arr['d_work_config'] = $_POST['work_config'];
				$dirres = $director->add($arr);
				if($dirres){		//将数据录入导演表中后查出该条数据的id号，作为字段值插入导演信息附属表中
					$did = $director->field('d_id')->where(array('d_name'=>$arr['d_name'],'d_work_config'=>$arr['d_work_config'],'p_id'=>$arr['p_id']))->find();
					for($i=0;$i<count($_POST['works']);$i++){
						$diarr['d_id'] = $did['d_id'];
						$diarr['dm_works'] = $_POST['works'][$i];
						$diarr['dm_time'] = strtotime($_POST['time'][$i]);
						$diarr['dm_jname'] = $_POST['j_name'][$i];
						$diarr['dm_mainrole'] = $_POST['mainrole'][$i];
						$diarr['dm_clother'] = $_POST['clother'][$i];
						$diarr['dm_dresser'] = $_POST['dresser'][$i];
						$diarr['dm_items'] = $_POST['items'][$i];
						$diarr['dm_cameraman'] = $_POST['cameraman'][$i];
						$diarr['dm_sound_engineer'] = $_POST['sound_engineer'][$i];
						$diarr['dm_arts'] = $_POST['arts'][$i];
						$diarr['dm_lighting_engineer'] = $_POST['lighting_engineer'][$i];
						$diarr['dm_cameraman'] = $_POST['cameraman'][$i];
						$diares = $directormess->add($diarr);
						if($diares){
							$this->redirect('Index/index','', 2, '录入成功，页面跳转中...');
						}
					}
				}
			}
		}else{
			$this->display('adddirector');
		}
	}
	/**
	 * 广告信息注册方法
	 */
	public function addadvert(){
		if($_POST){
			//p($_POST);exit();
			$advert = M('advert');
			$party = M('party');
			$pty['p_name'] = $_POST['username'];
			$pty['p_password'] = encrypt($_POST['password']);
			$pty['type'] = 10;		//广告信息的类型id
			$end = $party->add($pty);
			if($end){
				//查询出成员表中的这个用户的id号
				$pid = $party->field('p_id')->where(array('p_name'=>$pty['p_name'],'p_password'=>$pty['p_password']))->find();
				for($i=0;$i<count($_POST['name']);$i++){
					$arr['p_id'] = $pid['p_id'];
					$arr['ad_name'] = $_POST['name'][$i];
					$arr['ad_advert_product'] = $_POST['advert_product'][$i];
					$arr['ad_tel'] = $_POST['tel'][$i];
					$arr['ad_type'] = $_POST['type'][$i];
					$arr['ad_zm_number'] = $_POST['zm_number'][$i];
					$arr['ad_sex'] = $_POST['sex'][$i];
					$arr['ad_age'] = $_POST['age'][$i];
					$arr['ad_high'] = $_POST['high'][$i];
					$arr['ad_weight'] = $_POST['weight'][$i];
					$arr['ad_sanwei'] = $_POST['sanwei'][$i];
					$arr['ad-zm_need'] = $_POST['zm_need'][$i];
					$arr['ad_ps_address'] = $_POST['ps_address'][$i];
					$arr['ad_sanwei'] = $_POST['sanwei'][$i];
					$arr['ad_endtime'] = $_POST['endtime'][$i];
					$arr['ad_zm_address'] = $_POST['zm_address'][$i];
					$arr['ad_time_long'] = $_POST['time_long'][$i];
					$advres = $advert->add($arr);
					if($advres){
						$this->redirect('Index/index','', 2, '录入成功，页面跳转中...');
					}
				}
			}
		}else{
			$this->display('addadvert');
		}
	}
	/**
	 * 广告商注册信息方法
	 */
	public function addadvertiser(){
		if($_POST){
			//p($_POST);exit();
			$advertiser = M('advertiser');
			$party = M('party');
			$pty['p_name'] = $_POST['username'];
			$pty['p_password'] = encrypt($_POST['password']);
			$pty['type'] = 11;		//导演的类型id
			$end = $party->add($pty);
			if($end){
				//查询出成员表中的这个用户的id号
				$pid = $party->field('p_id')->where(array('p_name'=>$pty['p_name'],'p_password'=>$pty['p_password']))->find();
				for($i=0;$i<count($_POST['name']);$i++){
					$arr['p_id'] = $pid['p_id'];
					$arr['as_name'] = $_POST['name'][$i];
					$arr['as_tel'] = $_POST['tel'][$i];
					$arr['as_position'] = $_POST['position'][$i];
					$arr['as_brand'] = $_POST['brand'][$i];
					$advres = $advertiser->add($arr);
					if($advres){
						$this->redirect('Index/index','', 2, '录入成功，页面跳转中...');
					}
				}
			}
		}else{
			$this->display('addadvertiser');
		}
	}
	/**
	 * 话剧注册信息方法
	 */
	public function addmodern(){
		if($_POST){
			//p($_POST);exit();
			$modern = M('modern');
			$party = M('party');
			$pty['p_name'] = $_POST['username'];
			$pty['p_password'] = encrypt($_POST['password']);
			$pty['type'] = 12;		//话剧的类型id
			$end = $party->add($pty);
			if($end){
				//查询出成员表中的这个用户的id号
				$pid = $party->field('p_id')->where(array('p_name'=>$pty['p_name'],'p_password'=>$pty['p_password']))->find();
				$arr['p_id'] = $pid['p_id'];
				$arr['mo_name'] = $_POST['truename'];
				$arr['mo_job'] = $_POST['job'];
				$arr['mo_jz_place'] = $_POST['jz_place'];
				$arr['mo_company'] = $_POST['company'];
				$arr['mo_tel'] = $_POST['tel'];
				$arr['mo_j_name'] = $_POST['j_name'];
				$arr['mo_pl_place'] = $_POST['pl_place'];
				$arr['mo_show_place'] = $_POST['show_place'];
				$arr['mo_show_count'] = $_POST['show_count'];
				$arr['mo_jb_introduct'] = $_POST['jb_introduct'];
				$arr['mo_spend_time'] = $_POST['spend_time'];
				$arr['mo_gg_type'] = $_POST['gg_type'];
				$mores = $modern->add($arr);
				if($mores){
					$modern_role = M('modern_role');
					$moid = $modern->field('mo_id')->where(array('p_id'=>$arr['p_id'],'mo_name'=>$arr['mo_name'],'mo_job'=>$arr['mo_job'],'mo_jz_place'=>$arr['mo_jz_place']))->find();
					for($i=0;$i<count($_POST['name']);$i++){
						$moroarr['mo_id'] = $moid['mo_id'];
						$moroarr['mo_ro_sex'] = $_POST['sex'][$i];
						$moroarr['mo_ro_name'] = $_POST['name'][$i];
						$moroarr['mo_ro_age'] = $_POST['age'][$i];
						$moroarr['mo_ro_high'] = $_POST['high'][$i];
						$moroarr['mo_ro_tezheng'] = $_POST['tezheng'][$i];
						$moroarr['mo_ro_xiaozhuan'] = $_POST['xiaozhuan'][$i];
						$moroarr['mo_ro_need'] = $_POST['need'][$i];
						$morores = $modern_role->add($moroarr);			//添加数据到话剧的角色表中
						if($morores){
							$this->redirect('Index/index','', 2, '录入成功，页面跳转中...');
						}
					}
				}
			}
		}else{
			$this->display('addmodern');
		}
	}
	/**
	 * 活动演出注册方法
	 */
	public function addactivities(){
		if($_POST){
			//p($_POST);exit();
			$modern = M('modern');
			$party = M('party');
			$pty['p_name'] = $_POST['username'];
			$pty['p_password'] = encrypt($_POST['password']);
			$pty['type'] = 12;		//话剧的类型id
			$end = $party->add($pty);
			if($end){
				//查询出成员表中的这个用户的id号
				$pid = $party->field('p_id')->where(array('p_name'=>$pty['p_name'],'p_password'=>$pty['p_password']))->find();
				$arr['p_id'] = $pid['p_id'];
			}
		}else{
			$this->display('addactivities');
		}
	}





	//演员和剧组信息添加放在一个页中
	public function details(){
		$type = M('type');
		$agegroup = M('age_group');
		$agename = $agegroup->select();
		$typename = $type->field('t_id,t_name')->select();
		$this->assign('agename',$agename);
		$this->assign('typename',$typename);
		$this->display('details');
	}

}