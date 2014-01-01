<?php 
/**
 *PowerAction.class.php 
 * @author                 wangyanteng
 * @copyright            (C)2013
 * @license                http://www.longtengjiazu.com
 * @lastmodify           2013-11-17
 */
class PowerAction extends Action{
    public function index(){
        $user_g = M('users_group');
        //得到用户组信息
    	$group = $user_g->field('usgp_id,usgp_name')->where(array('usgp_state'=>1))->select();
    	$this->assign('group',$group);
        $this->display('Power');
    }
    //ajax用户组的 显示
    public function group(){
        $poe = M('menus_power');
        //得到传过来的用户组id
        $usgp_id = $_POST['group'];
        $usgp_id = $usgp_id['usgp_id'];
        $this->assign('usgp_id',$usgp_id);
        //得到用户组具有的权限
        $usg = $poe->where(array('usgp_id'=>$usgp_id))->select();
      
        if(!empty($usg)){
            foreach($usg as $key=>$value){
                $muid .= $value['menu_id'].',';
            }
            $muid = rtrim($muid,',');
            $muid = explode(',',$muid);
        }
        $this->assign('muid',$muid);
         $men = M('menus');
         //查出顶级栏目
    	 $data_p = $men->where(array('menu_pid'=>0))->select();
    	 //得到用户组信息 
    	$this->assign('data_p',$data_p);
    	$user_g = M('users_group');
        //得到用户组信息
    	$group = $user_g->field('usgp_id,usgp_name')->where(array('usgp_state'=>1))->select();
    	$this->assign('group',$group);
    	$this->display('Power');
    }
    
  //ajax权限提交
    public function powewr_ajax(){
        $poe = M('menus_power');
        //定义判断变量
        $ok = false;
        $data = $_POST;
         
       //判断是否选择了用户（组）
       if($_POST['usgp_id'] == ''){
           skip_ajax('请选择用户（组）','',2);
           exit();
       }
       //得到用户组原来的权限
       $oldids = $poe->field('menu_id')->where(array('usgp_id'=>$_POST['usgp_id']))->select();
       if(!empty($oldids)){
           foreach($oldids as $keyold=>$valueold){
               $oldid .= $valueold['menu_id'].',';
           }
           $oldid = rtrim($oldid,',');
       }
       //在组成数组
       $oldid = isset($oldid) ? explode(',',$oldid) : '';
     //得到新加权限菜单id
        if(!empty($data['customs'])){
            foreach($data['customs'] as $key=>$value){
                foreach($value as $k=>$v){
                        //得到新获得权限的菜单id
                        $newid .= $v.',';
                }
                //连接上父级的id
                $newid .= $key.',';
            }
            //去除最右边的，
            $newid = rtrim($newid,',');
        }
         $men = M('menus');
         //获得所有的菜单id
         $allid = $men->field('menu_id')->where(array('menu_state'=>1))->select();
         if(!empty($allid)){
          
             foreach($allid as $keyall=>$valueall){
                 $allids .= $valueall['menu_id'].',';
             }
             $allids = ','.$allids;

         }
         //要新加的

        $alls = explode(',',$newid);
        if(!empty($alls)){
        //追加权限
            foreach($alls as $addkey=>$addv){
                //判断又来是否有此权限，没有就追加
                if(!in_array($addv,$oldid)){
                     $add = $poe->add(array('id'=>0,'usgp_id'=>$_POST['usgp_id'],'menu_id'=>$addv));
                     if($add){
                        $ok = true;
                     }else{
                        $ok = false;
                     }
                }
            }
           
        }
        $all = ltrim($allids,',');
        $all = rtrim($all,',');
        $newid = isset($newid) ? explode(',',$newid) : $alls;
        
        //获得要删除权限的菜单id
        foreach($newid as $keydel=>$valuedel){
           $allids = ereg_replace(",$valuedel,",',',$allids);
        }
        $delids = ltrim($allids,',');
        $delids = rtrim($delids,',');
        //转换为数组
        $delids = explode(',',$delids);
        //删除多余的权限
        if(!empty($delids)){
            foreach($delids as $delk=>$delv){
                if(in_array($delv,$oldid)){
                    $del = $poe->where(array('usgp_id'=>$_POST['usgp_id'],'menu_id'=>$delv))->delete();
                    if($del){
                        $ok = true;
                    }else{
                        $ok = false;
                    }
                }
            }

        }
      
       
       
        //ajax判定返回
        if($ok){
            skip_ajax('更改成功','',1);
        }else{
            skip_ajax('修改失败','',2);
        } 
    }
}