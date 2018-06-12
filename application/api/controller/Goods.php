<?php
namespace app\api\controller;

use think\Db;
use think\Controller;

class Goods extends Base{
    //获取商品
	public function get_goods(){
		$goods_list = Db::table('jk_goods')->alias('g')->field('*')->where('is_sale=1')->select();

		return json_encode($goods_list);
		
	}
	//获取商品的详情页
	public function goods_info(){
		$goods_id = input('get.');
		$goods_info = Db::table('jk_goods_gallerys')->where('goods_id',$goods_id['goods_id'])->select();
		return json_encode($goods_info);
		
	}
	//获取产品分类
	public function get_category(){
		$category_list = Db::table('jk_goods_category')->select();
		return json_encode($category_list);
	}
}