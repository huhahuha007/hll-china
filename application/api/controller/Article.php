<?php
namespace app\api\controller;

use think\Db;
use think\Controller;

class Article extends Base{
    //
    public function get_article(){
        $news_list = Db::table('jk_article')->where(array('is_show'=>1))->select();
        return json_encode($news_list);
    }
    //获取产品分类
    public function get_category(){
        $category_list = Db::table('jk_article_category')->select();
        return json_encode($category_list);
    }
}