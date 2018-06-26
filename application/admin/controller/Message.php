<?php
namespace app\admin\controller;

use think\Controller;
use \think\Db;
use \think\Request;
use \think\Uploads;

class Message extends Base{
    //订单列表
    public function message_list(){
        $message_list = Db::table('jk_message')->paginate(12);
        $this->assign('message_list',$message_list);
        return $this->fetch();
    }

}