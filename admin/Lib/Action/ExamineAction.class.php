<?php
class ExamineAction extends Action {

	//演员上传图片审核处理
	public function imgexam(){
		$actor = M('actor');
		$actmess = $actor->field('a_id,p_id,truename,image_self')->where(array('pass'=>'0'))->select();
		foreach ($actmess as $key=>$value){
			$image = $value['image_self'];
			$imag = unserialize($image);
			$img = explode(',',$imag);
			//p($img);
			foreach ($img as $mm=>$val){
				$imgname = explode('|', $val);
				$actmess[$key][imglist][$mm] =$imgname[1];
			}				
		}
		$this->assign('actmess',$actmess);
		$this->display('imgexam');
	}
	
	//不通过的图片删除方法
	public function imgdel(){
		//p($_GET);
		$actor = M('actor');
		$aid = $_GET['a_id'];
		$path = $_GET['path'];
		$imgself = $actor->field('image_self')->where(array('a_id'=>$aid))->find();
		$imag = unserialize($imgself['image_self']);
		$img = explode(',', $imag);
		$arrimg = array();
		foreach ($img as $ke=>$val){
			$imgpath = explode('|', $val);
			$arrimg[$imgpath[1]] = $img[$ke];
		}
		unset($arrimg[$path]);
		$image_self = serialize(implode(',', $arrimg));
		p($image_self);
		$res = $actor->where(array('a_id'=>$aid))->save(array('image_self'=>$image_self));
		echo $actor->getLastSql();
		if($res){
			if(!empty($path)){
				$filepath = './Public/uploads/'.$path;
				//echo $filepath;
				unlink($filepath);
			}
			
		}
	}
	//演员视频路径审核处理
	public function vedioexam(){
		$actor = M('actor');
		$actmess = $actor->field('a_id,p_id,truename,video')->select();
		foreach ($actmess as $key=>$value){
			$vedio = $value['video'];
			$vediopath = explode(',', $vedio);
			$actmess[$key][vediopath] = $vediopath[0];
		}
		$this->assign('actmess',$actmess);
		$this->display('vedioexam');
	}
	//视频地址审核方法
	public function rebuilt(){
		$aid = $_GET['a_id'];
		$actor = M('actor');
		$val=array(
			'pass'=>'1',
		);
		$actor->where(array('a_id'=>$aid))->save($val);
	}
}