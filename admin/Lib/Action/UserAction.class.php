<?php 
/**
 *UserAction.class.php 后台管理员管理
 * @author                 wangyanteng
 * @copyright            (C)2013
 * @license                http://www.longtengjiazu.com
 * @lastmodify           2013-11-16
 */
class UserAction extends Action {
    //用户列表
    public function index(){
        $user = M('users');
        $am = $user->where('usgp_id!=1')->select();
        $user_g = M('users_group');
        foreach($am as $key=>$value){
            $am[$key]['usgp_id'] = $user_g->where(array('usgp_id'=>$value['usgp_id']))
                                          ->field('usgp_name')->find();
             $am[$key]['usgp_id'] =  $am[$key]['usgp_id']['usgp_name'] ;                            
        }
        $this->assign('am',$am);
        $this->display('User');
    }
    
    //添加用户
    public function useradd(){
        if(!empty($_POST)){
            $user = M('users');
    			$info=$_POST['info'];
    			$pwd=$info['pwd'];
    			$pwds=$info['pwds'];
    			if(strlen($info['name']) >= 6 && strlen($info['name']) <= 20){
    				if(ereg("^[0-9a-zA-Z]{3,}$",$info['pwd'])){
    					if(ereg("^[0-9a-zA-Z]{3,}$",$info['pwds'])){
    						if($_POST['hh']==1){
    							if($pwd == $pwds){
    								$infos=array(
    									'user_name' => $info['name'],
    									'user_password' => encrypt($info['pwd']),
    									'usgp_id' => $info['usgpname'],
    									'user_tel' => $info['tel'],
    									'user_email' => $info['email'],
    								);
    								if($user->add($infos)){
    									skip_ajax('添加成功！','admin.php?m=User&a=index',1);
    								}else {
    									skip_ajax('添加失败！','admin.php?m=User&a=index',2);
    								}
    							}else{
    								skip_ajax('两次输入的密码不相同！','',2);
    							}
    						}else{
    							skip_ajax('此用户已存在','',2);	
    						}
    					}else{
    						skip_ajax('密码必须是数字和字符！','',2);
    					}						
    				}else{
    					skip_ajax('密码必须是数字和字符！','',2);
    				}													
    			}else{
    				skip_ajax('用户名应在6-20之间！','',2);
    			}										
		}else{
    		$user_g = M('users_group');
    	    //获得下拉菜单中的用户组值
		    $data = $user_g->field('usgp_id,usgp_name')->select();
	    	$this->assign('data',$data);
		    $this->display('Useradd');
		}
        
    }
	//重置密码
	public function resetpwd(){
	    $user = M('users');
		//获得到重置密码传过来的id值
		$id=$_POST['id'];
		$rs='123456';
		//将$rs加密赋值给$data
		$data = array('user_password' => encrypt($rs));
		//修改users表中的密码值 
		$cz = $user->where(array('user_id'=>$id))->save($data);
		if($cz){
			skip_ajax('重置密码成功','',2);
		}else{
			skip_ajax('重置密码失败','',2);
		}	
	}
	//删除用户
	public function usersdel(){
	    $user = M('users');
		//获得到重置密码传过来的id值
		$id=$_POST['id'];
	    if($user->where(array('user_id'=>$id))->delete()){
				skip_ajax('删除成功！','admin.php?m=User&a=index',1);
			}else{
				skip_ajax('删除失败！','admin.php?m=User&a=index',2);
			}
	
	}
    
    //验证用户名
    public function check_name(){
        $user = M('users');
        $username = $_GET['users_name'];
		if(empty($username)){
			echo 0;
		}else{
			$am = $user->where(array('user_name'=>$username))->select();
			if ($am){
				echo 0;
			}else {
				echo 1;
			}
		}
    }
    //用户组列表
    public function  grouplist(){
        $user_g = M('users_group');
        $uegp = $user_g->select();
        $this->assign('uegp',$uegp); 
        $this->display('Usergroup');
    }
    
    //添加用户组
    public function usgpadd(){
        $user_g = M('users_group');
        //获得newdate中的值
    	$date = $_POST['newdate']; 
    	//利用循环将$date中的值输出来  	
        foreach($date as $key=>$value){
        	//如果$value['name']中的值为空，那么就要提示状态不能为空
            if(empty($value['name'])){
                skip_ajax('名称不能为空！','admin.php?m=User&a=grouplist',2);
                exit;
            }
            //将$value['name']，$value['type']的值赋值，形成查询语句的条件
            //判断是否存在状态名称个状态类型相同的数据
            $count = $user_g->where(array('usgp_name'=>$value['name']))->select();
            //如果为空，就可以添加记录
            if(empty($count)){
                $data = array (
                   'usgp_name'     => $value['name'],
                   'usgp_describe' => $value['desc'],
                   'usgp_state'    => $value['type'],
               );
              $updat = $user_g->add($data);
              if($updat){
              	  skip_ajax('添加成功','admin.php?m=User&a=grouplist',1);;
              }else{
            	  skip_ajax('添加失败','admin.php?m=User&a=grouplist',2);
              }
            }else{
                skip_ajax('已有此名称的用户组啦','admin.php?m=User&a=grouplist',2);
            }
        }    	
    
    }
	//删除用户组
    public function usgpdele(){
        $user = M('users');
        $user_g = M('users_group');
    	//获得id值
    	$id   = $_POST['id'];
    	$userck = $user->where(array('usgp_id'=>$id))->select();
    	//如果三个表中都没有记录才可以删除用户组，否则此用户组将不能被删除
    	if(empty($userck)){
    		if($user_g->where(array('usgp_id'=>$id))->delete()){
				skip_ajax('删除成功！','admin.php?m=User&a=grouplist',1);
			}else{
				skip_ajax('删除失败！','admin.php?m=User&a=grouplist',2);
			}
    	}else{
    		skip_ajax('删除失败，请先删除此用户组的用户','admin.php?m=User&a=grouplist',2);
    	}		
    }
	//修改用户组
    public function usgpedit(){
        $user_g = M('users_group');
    	//通过js将row的值传递过来
        $id = $_POST['row'];
        //将$id的值用'—'分隔开
        $id = explode('-', $id);
        //为$show定义初值为0
        $show = 0;
        //如果$id中‘—’后的值是1的话，那么就赋值给usgp_name，然后查询
        if($id[1] == 1){
            if($user_g->where(array('usgp_id'=>$id[0]))->save(array('usgp_name'=>$_POST['val']))){
                //查询成功的话，$show的值变为1
                $show = 1;
            }
        //如果$id中‘—’后的值是2的话，那么就赋值给usgp_describe，然后查询
        }elseif($id[1] == 2){
            if($user_g->where(array('usgp_id'=>$id[0]))->save(array('usgp_describe'=>$_POST['val']))){
                //$this->cache->deletecache('Sateas');
                //查询成功的话，$show的值变为1
                $show = 1;            
            }
         //如果$id中‘—’后的值是3的话，那么就赋值给usgp_state，然后查询
        }elseif($id[1] == 3){
            if($user_g->where(array('usgp_id'=>$id[0]))->save(array('usgp_state'=>$_POST['val']))){
                //$this->cache->deletecache('Sateas');
                //查询成功的话，$show的值变为1
                $show = 1;            
            }
        }
        //输出$show的值，如果是1，那么修改成功，如果是0，那么修改失败。
        echo $show;
    }
}