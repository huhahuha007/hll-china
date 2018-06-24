<?php
namespace app\api\controller;

use think\Db;
use think\Controller;

class News extends Base{
    //新闻
	public function get_news(){
		$news_list = Db::table('jk_news')->where(array('is_show'=>1))->select();
		return json_encode($news_list);
	}
    //获取产品分类
    public function get_category(){
        $category_list = Db::table('jk_news_category')->select();
        return json_encode($category_list);
    }
}