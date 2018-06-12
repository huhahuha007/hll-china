<?php
namespace app\api\controller;

use think\Db;
use think\Controller;

class Config extends Base{
    //获取电话
	public function get_phone(){
		$get_phone = Db::table('jk_config')->where('id',1)->field('phone,telephone')->find();

		return json_encode($get_phone);
		
	}
	//获取appid 和 appsecret
	public function get_secret(){
		$secret = Db::table('jk_config')->where('id',1)->field('appid,appsecret')->find();
		return json_encode($secret);
	}

	
}