<?php
/**
 * 前台首页控制器
 * @author                 wangyanteng
 * @copyright            (C)2013
 * @license                http://www.longtengjiazu.com
 * @lastmodify           2013-11-9
 */
class IndexAction extends Action {
    public function index(){
    	$announ = M('announ');
    	$res = $announ->select();
      	$this->assign('res',$res);
      	$this->display('index');
    }
}