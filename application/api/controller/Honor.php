<?php
namespace app\api\controller;

use think\Db;
use think\Controller;

class Honor extends Base{
    //新闻
    public function get_honor(){
        $honor_list = Db::table('jk_honor')->select();
        return json_encode($honor_list);
    }

}