<?php
/**
 * Global.php 全局函数
 * @author 				wangyanteng
 * @copyright			(C)2013
 * @license				http://www.longtengjiazu.com
 * @lastmodify			2013-9-2
 */

/**
 * 加密整理数据
 * @param $str 要加密字段
 * @param 40字符
 * */
function encrypt($str){
    //使用sha1生成个40位的数值
    $str=sha1($str);
    //把字符串分成数组
    $str=str_split($str);
    //循环处理
    foreach($str as $key=>$value){
        //正则匹配是数字还是字母
        if(@ereg("[0-9]{1}",$value)){
            //是数字的取得e的指数幂并截取第一个字符
            $str[$key]=substr(exp($value),0,1);
        }else{
            //是字母的进行MD5加密并取第一个字符
            $str[$key]=substr(md5($value),0,1);
        } 
    }
    //再组装成字符串
    $str=implode('',$str);
    //返回组装好的字符串
    return $str;
}
/**
 * 打印输出函数
 * 只是为了方便编程
 * @param $arr
 * @param $n(是否带数据类型1带[默认]，2不带)
 */
function p($arr,$n = 2){
    //判断是否是数组
    if(is_array($arr)){
        echo '<pre>';
         if($n == 1){
             //是数组var_dump一下
              var_dump($arr);
         }elseif($n == 2){
              print_r($arr);
         }
        echo '</pre>';
    }else{
        //不是数组输出元字符
        echo $arr;
    }
    
} 
/**
 * ajax页面提醒并跳转
 * @param $msg 弹出框内容
 * @param $url 跳转的url(默认为空，为空时不跳转)
 * @param $type 信息类型（默认为 1：成功，2：失败）
 * */
function skip_ajax($msg, $url = '', $type=  '1'){
    if($type == 1){
        $type = 'success';
    }elseif($type == 2){
        $type = 'fail';
    }
    $arr = array(
         'state'   => $type,
         'message' => $msg,
         'referer' => $url,
    );
    echo json_encode($arr);
    
}








