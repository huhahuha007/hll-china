<?php
namespace app\api\controller;

use think\Db;
use think\Controller;

class Article extends Base{
    //公司简介
	public function get_article(){
		$article_list = Db::table('jk_article')->where(array('article_id'=>18,'is_show'=>1))->select();

		return json_encode($article_list);
		
	}
	//新闻中心
	public function get_article2(){
		$article_list = Db::table('jk_article')->where(array('article_id'=>19,'is_show'=>1))->select();

		return json_encode($article_list);

	}
	//客服中心
	public function get_article3(){
		$article_list = Db::table('jk_article')->where(array('article_id'=>20,'is_show'=>1))->select();

		return json_encode($article_list);
	}
}