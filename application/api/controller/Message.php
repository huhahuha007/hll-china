<?php
namespace app\api\controller;

use think\Db;
use think\Controller;

class Message extends Base{
    //新闻
    public function get_message(){
        $message = input('post.');
        //$message = ['name'=>,'phone'=>,'message'=>];
        $result = Db::table('jk_message')->insert($message);
        if($result){
            $suc='成功';
        }else{
            $suc='失败';
        }
        return $suc;
    }

}