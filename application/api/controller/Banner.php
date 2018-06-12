<?php
namespace app\api\controller;

use think\Db;
use think\Controller;

class Banner extends Base{
    //获取轮播图
	public function get_banner(){
		$banner_list = Db::table('jk_banner')->where('is_show',1)->field('banner_img,banner_url')->select();

		return json_encode($banner_list);
		
	}
}