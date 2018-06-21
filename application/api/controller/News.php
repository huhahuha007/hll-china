<?php
namespace app\api\controller;

use think\Db;
use think\Controller;

class News extends Base{
    //公司简介
	public function get_news(){
		$news_list = Db::table('jk_news')->where(array('news_id'=>18,'is_show'=>1))->select();

		return json_encode($news_list);
		
	}
	//新闻中心
	public function get_news2(){
		$news_list = Db::table('jk_news')->where(array('news_id'=>19,'is_show'=>1))->select();

		return json_encode($news_list);

	}
	//客服中心
	public function get_news3(){
		$news_list = Db::table('jk_news')->where(array('news_id'=>20,'is_show'=>1))->select();

		return json_encode($news_list);
	}
}