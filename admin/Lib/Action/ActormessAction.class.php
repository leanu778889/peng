<?php
class ActormessAction extends Action {
    public function actormess(){
    	$actor = M('actor');
    	$party = M('Party');
    	$type = M('type');
    	$res = $actor->select();
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
    		$res[$key]['t_name'] = $typename['t_name'];
    		$res[$key]['imagepath'] = $imagepath;
    	}
    	$this->assign('res',$res);
    	$this->display('actormess');
    }
    /**
     * 修改信息方法
     */
    public function rebuilt(){
    	$type = M('type');
    	$actor = M('actor');
    	$typename = $type->select();
    	$aid = $_GET['aid'];
    	$actmess = $actor->where(array('a_id'=>$aid))->find();
    	$arr['a_id'] = $actmess['a_id'];
    	$arr['truename'] = $actmess['truename'];
    	$arr['t_id'] = $actmess['t_id'];
    	$arr['star'] = $actmess['star'];
    	p($arr);
    	$this->assign('arr',$arr);
    	$this->assign('typename',$typename);
    	$this->display('rebuilt');
    }
    /**
     * 删除方法，(uploads中图片一起删掉)
     * 删掉用户表中的数据和删掉演员表中的数据
     * 谨慎操作
     * Enter description here ...
     */
    public function del(){ 
    	$p_id = $_POST[pid];
    	//获取这个角色的照片储存地址
    	$actor = M('actor');
    	$party = M('party');
    	$res = $actor->where(array('p_id'=>$p_id))->find();
    	if($res){
	    	$imag = unserialize($res['image_self']);
	    	$imag = explode(',', $imag);
	    	foreach ($imag as $key=>$value){
		    	$imagepath = explode('|', $value);
		    	$path = $imagepath[1];
		    	$filepath = './Public/uploads/'.$path;
		    	$unlink = unlink($filepath);		//删除图片
	    	}
	    	//删除演员用户表中的数据
	    	$delres = $act_del = $actor->where(array('p_id'=>$p_id))->delete();
	    	if($delres){	//删除所有用户表中的数据
	    		$der = $par_del = $party->where(array('p_id'=>$p_id))->delete();
	    		if($der){
	    			skip_ajax('删除成功！','admin.php?m=Actormess&a=actormess',2);
	    		}
	    	}	    	
    	} 	
    }
    
    /**
     * 查看用户的具体的信息(星级评定也调用此方法)
     */
    public function seemore(){
    	$actor = M('actor');
    	$type = M('type');
    	$a_id = $_GET['a_id'];
    	$actmess = $actor->where(array('a_id'=>$a_id))->find();
    	$typename = $type->where(array('t_id'=>$actmess['t_id']))->find();
    	$actmess['typename'] = $typename['t_name'];
    	$this->assign('actmess',$actmess);
    	$this->display('seemore');
    	
    }
    //关闭页面
    public function close(){
    	skip_ajax('正在跳转，请稍后...','admin.php?m=Actormess&a=actormess',1);
    }
}
?>