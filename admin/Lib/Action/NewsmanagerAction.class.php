<?php
class NewsmanagerAction extends Action{
	public function index(){
		$this->display('Newspublic');
	}
	
	public function newsmanager(){
		$announ = M(announ);
		$res = $announ->select();
		$this->assign('res',$res);
		$this->display('Newsmanager');
	}
	
	//增加公告信息
	public function addmessage(){
		$announ = M('announ');
		$arr['time'] =  strtotime($_POST['perf']['starttime']) ;
		$arr['author'] = $_POST['perf']['author'];
		$arr['title'] = $_POST['perf']['title'];
		$arr['content'] = $_POST['perf']['content'];
		$arr['pub_ip'] = get_client_ip();
		$res = $announ->add($arr);
		if($res){
			//echo '录入成功';
			skip_ajax('添加成功！','admin.php?m=Newsmanager&a=newsmanager',1);
		}else{
			//echo '录入失败';
			skip_ajax('添加失败！','admin.php?m=Newsmanager&a=index',2);
		}
	}
	
	//修改公告信息
	public function rebuilt(){
		$announ = M('announ');
		$a_id = $_GET['a_id'];
		$result = $announ->where(array('a_id'=>$a_id))->find();
		$this->assign('result',$result);
		$this->display('Newspublic');		
	}
	
	//提交数据修改
	public function reb(){
		$announ=M('announ');
		$a_id = $_POST['perf']['a_id'];
		$arr['time'] =  strtotime($_POST['perf']['starttime']);
		$arr['title'] = $_POST['perf']['title'];
		$arr['author'] = $_POST['perf']['author'];
		$arr['content'] = $_POST['perf']['content']; 
		//p($_POST); 
		$res  = $announ->where(array('a_id'=>$a_id))->save($arr);
		if($res){
			echo '修改成功';
		}else{
			echo '失败';
		}
	}
	
	//删除公告消息
	public function del(){
		$announ = M('announ');
		$aid = $_POST['aid'];
		$res = $announ->where(array('a_id'=>$aid))->delete();
		if($res){
			skip_ajax('删除成功！','admin.php?m=Newsmanager&a=newsmanager',2);
		}else{
			skip_ajax('删除失败！','admin.php?m=Newsmanager&a=newsmanager',2);
		}
	}
}