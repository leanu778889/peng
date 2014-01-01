<?php 
/**
 *MenuAction.class.php 菜单管理
 * @author                 wangyanteng
 * @copyright            (C)2013
 * @license                http://www.longtengjiazu.com
 * @lastmodify           2013-11-11
 */
class MenuAction extends Action {
    public function index(){
      //检测登陆
        if(!session('name')){
            $this->error('你还没有登陆！','admin.php?m=Login&a=login');
            exit;
        }
        //得到菜单
    //查出顶级栏目
    	$men = M('menus');
    	$data_p = $men->order('menu_sort')->where('menu_pid=0')->select();
    	$menus  = array();
    	//循环查出各顶级菜单下的子id依次放入$menus数组中
    	if(!empty($data_p)){
    	    foreach($data_p as $key => $value){
    	         $data_c = $men->where('menu_pid='.$value['menu_id'])->select();
    	         if(!empty($data_c)){
    	         	 $value['child']=1;
    	         	 $menus[] = $value;
    	             foreach($data_c as $k => $v){
    	             	
    	                 $menus[] = $v;
    	             }
    	         }else{
    	             $value['child']=0;
    	             $menus[] = $value;
    	         
    	         }
    	    }
    	}
    	$this->assign('menus',$menus);
        //加载模板
        $this->display('Menus');
    }
    
    
    
  //删除菜单（不能删除含有子菜单的菜单）
    public function deletemenu(){
        
    	$menuid  = $_POST['menuid'];
    	$men = M('menus');
    	$isco = $men->where('menu_pid='.$menuid)->select();
    	if(empty($isco)){
    	    $delmenu = $men->where(array('menu_id'=>$menuid))->delete();
    	   if($delmenu){
    	   	 skip_ajax('','',1);
    	   }else{
    	     skip_ajax('删除失败!','',2);
    	   }
    	}else{
    	  skip_ajax('对不起，有下级菜单，不能删除!','',2);
    	}
    }
    //添加二级菜单
    public function towlevel(){
        if(!empty($_POST)){
         //验证菜单是几级菜单
            $menuall=$_POST;
            $men = M('menus');
    	    if(empty($menuall['p_menu'])){
    	        $menuall['rank'] = 1;
    	        $menuall['pid']  = 0;
    	    }else{
    	        $menuall['rank'] = 2;
    	        $menuall['pid']  = $menuall['p_menu'];
    	    
    	    }
        	$data=array(
        	    'menu_name' => $menuall['title'],
    	        'menu_m'    => $menuall['M'],
      	        'menu_a'    => $menuall['A'],
    	        'menu_rank' => $menuall['rank'],
    	        'menu_pid'  => $menuall['pid'],
    	        'menu_state'=> $menuall['is_auto'],
    	        'menu_sort' => $menuall['sort'],
        	);
        	$result = $men->add($data);
        	if($result){
        	    skip_ajax('添加成功','admin.php?m=Menu&a=index',1); 
    	    }else{
    	        skip_ajax('添加失败','admin.php?m=Menu&a=index',2); 
    	   }
        }else{
        	$pid   = $_GET['pid'];
       	    $pname = $_GET['pname']; 
       	    $men = M('menus');
	        $menu_p = $men->where('menu_pid=0')->select();
	        $this->assign('pid',$pid);
	        $this->assign('menu_p',$menu_p);
	        $this->display('Towlevel');   
        }
        
    }
    //添加菜单
    public function Addmenu(){
        
    	//form表单提交
    	if($_POST){
    	    $men = M('menus');
    	    $menuall = $_POST;
    	    //验证菜单是几级菜单
    	    if(empty($menuall['p_menu'])){
    	        $menuall['rank'] = 1;
    	        $menuall['pid']  = 0;
    	    }else{
    	        $menuall['rank'] = 2;
    	        $menuall['pid']  = $menuall['p_menu'];
    	    
    	    }
    	    $data=array(
    	        'menu_name' => $menuall['title'],
    	        'menu_m'    => $menuall['M'],
    	        'menu_a'    => $menuall['A'],
    	        'menu_rank' => $menuall['rank'],
    	        'menu_pid'  => $menuall['pid'],
    	        'menu_state'=> $menuall['is_auto'],
    	        'menu_sort' => $menuall['sort'],
    	    );
      	    $result = $men->add($data);
        	if($result){
        	    skip_ajax('添加成功','admin.php?m=Menu&a=index',1); 
    	    }else{
    	        skip_ajax('添加失败','admin.php?m=Menu&a=index',2); 
    	   }
    	}else{
	    		//顶级菜单调用
	    	 $men = M('menus');
	         $menu_p = $men->where('menu_pid=0')->select();
	         $this->assign('menu_p',$menu_p);
	         $this->display('Addmenu');
    	}
    
    }
    //修改菜单
    public function editmenu(){
    	//表单提交
    	if($_POST){	
    		$men = M('menus');
    		$menuid=$_GET['menuid'];
       	    $menuall = $_POST;
    	    //验证菜单是几级菜单
    	    if(empty($menuall['p_menu'])){
    	        $menuall['rank'] = 1;
    	        $menuall['pid']  = 0;
    	    }else{
    	        $menuall['rank'] = 2;
    	        $menuall['pid']  = $menuall['p_menu'];
    	    
    	    }
    	    $data=array(
    	        'menu_name' => $menuall['title'],
    	        'menu_m'    => $menuall['M'],
    	        'menu_a'    => $menuall['A'],
    	        'menu_rank' => $menuall['rank'],
    	        'menu_pid'  => $menuall['pid'],
    	        'menu_state'=> $menuall['is_auto'],
    	        'menu_sort' => $menuall['sort'],
    	    );
    	   $result = $men->where(array('menu_id'=>$menuid))->save($data);
    	/*   echo $men->getLastSql();
    	   exit;*/
    	    if($result){
    	        skip_ajax('修改成功','admin.php?m=Menu&a=index',1);
    	    }else{
    	        skip_ajax('修改失败','admin.php?m=Menu&a=index',2);
    	    }
    	}else{
    		 $men = M('menus');
    		 //查出顶级级菜单
	    	  $menu_p = $men->where('menu_pid=0')->select();
	    	 
	    	//接受id查出数据
	    	$menuid   = $_GET['menuid'];
	    	$menu_one = $men->where('menu_id='.$menuid)->select();
	    	//选择出不含二级菜单的顶级菜单和二级菜单
	    	//选择出二级菜单
	    	$cmenu = $men->where(array('menu_rank'=>2,'menu_id'=>$menuid))
	    				 ->select();
	    	//顶级菜单
	    	$omenu = $men->where(array('menu_rank'=>1,'menu_id'=>$menuid))
	    				 ->select();
	    	$nmenu = $men->where('menu_pid='.$menuid)->select();
	    	if(empty($nmenu)&&!empty($omenu)){    //不含二级菜单的顶级菜单
	    	    $menu_one[0]['type'] = 3;   
	    	}elseif(!empty($cmenu)){              //二级菜单
	    	    $menu_one[0]['type'] = 2;   
	    	}else{
	    	    $menu_one[0]['type'] = 1;         //含有二级菜单的顶级菜单
	    	}	
	    	$this->assign('menu_p',$menu_p);
	    	$this->assign('menu_one',$menu_one);
	        $this->display('Editmenu'); 
    	}
    	
    
    
    }
    //排序
    public function sort(){
        //介绍form表单
        $men = M('menus');
        $order=$_POST['orderid'];  
        foreach($order as $key=>$value){
            //$a = $this->db->update('menus',$data,'menu_id='.$key);
            $a = $men->where('menu_id='.$key)
            		 ->save(array('menu_sort'=>$value,));
            if(!$a){
                $this->error('排序失败','admin.php?m=Menu&a=index');
            }  
        }
        $this->success('排序成功','admin.php?m=Menu&a=index');
    
    }
    //检验菜单名称（不包含自己）是否存在
    public function checkmenu(){
        $name   = $_GET['J_task_name_input'];
        $menuid = $_GET['menuid'];
        //$result = $this->db->select('menus','menu_name='."'$name'".' and menu_id!='.$menuid);
        $men = M('menus');
        $result = $men->where('menu_name='."'$name'".' and menu_id!='.$menuid)
                      ->select();
                 
        if(empty($result)&&!empty($name)){
            echo 1;
        }else{
            echo 0;
        }
    
    }
    public function chknewmenu(){
        $name   = $_GET['J_task_name_input'];
        $men = M('menus');
        $result = $men->where(array('menu_name'=>$name))
                      ->select();
              if(empty($result)&&!empty($name)){
            echo 1;
        }else{
            echo 0;
        }
    
    }
    //修改状态
    public function editsort(){
    	$menuid = $_GET['menuid'];
    	$men = M('menus');
    	$state = $men->field('menu_state')
    				 ->where('menu_id='.$menuid)
    				 ->find();
    	if($state['menu_state'] == 1){
    		$sta = 0;
    	}else{
    		$sta = 1;
    	}
    	$rl = $men->where('menu_id='.$menuid)
    			  ->save(array('menu_state'=>$sta));
    	if($rl){
    		$this->success('操作成功','admin.php?m=Menu&a=index');
    	}else{
    		$this->error('操作失败','admin.php?m=Menu&a=index');
    	}
    }
}