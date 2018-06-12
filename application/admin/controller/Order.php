<?php
namespace app\admin\controller;

use think\Db;
use think\Controller;
use think\Cookie;

//订单类
class Order extends Base{
	//订单列表
	public function order_list(){
		$order_list = Db::table('jk_order')->paginate(10);
		$this->assign('order_list',$order_list);
		return $this->fetch();
	}
	public function add_order(){
		return $this->fetch();
	}
	//弹框
	public function get_goods(){
		$goods = Db::table('jk_goods')->field('goods_id,shop_price,goods_stock,goods_desc,goods_name,goods_sn,goods_img')->paginate(8);
		$this->assign('goods',$goods);
		return $this->fetch();
	}
	//保存商品id
	public function save_goods_id(){
		$data = input('post.');
		foreach($data['num'] as $k=>$v){
		    if($v==""){
		       unset($data['num'][$k]);
    		}
		}
		$data['num'] = array_merge($data['num']);
		$goods_id=[];
		foreach ($data['goods_id'] as $k=>$v){
		    $goods_id[$k]['goods_id']=$v;
		}
		$num = [];
		foreach ($data['num'] as $k=>$v){
		    $num[$k]['num']=$v;
		}
		 $d=[];
		foreach ($data['goods_id'] as $k=>$v){
		    $d[$k]['goods_id']=$goods_id[$k]['goods_id'];
		    $d[$k]['num']=$num[$k]['num'];
		}
		//保存数据
		$result= Cookie::set('goods_id',json_encode($d),3600);
		if($result){
			return json_encode(array('status'=>1,'message'=>'选择成功!'));
		}else{
			return json_encode(array('status'=>0,'message'=>'选择失败!'));
		}
	}
	//保存订单
	public function save_order(){
		$data = input('post.');
		$data['goods_id'] = Cookie::get('goods_id');
		$price = 0;
		//计算订单价格
		foreach (json_decode($data['goods_id'],true) as $key => $value) {
			$goods_id[] = Db::table('jk_goods')->where('goods_id',$value['goods_id'])->field('shop_price')->find();
            $price += intval($goods_id[$key]['shop_price']*$value['num']);
		}
		$data['price'] = $price;
		$data['create_time'] = time();
		$data['order_code'] = time().rand(0,999);
		$result = Db::table('jk_order')->insert($data);
		if($result){
			return $this->success('添加成功!','order/order_list');
		}
	}
	//删除订单
	public function delete_order(){
		$data = input();
		$result = Db::table('jk_order')->where('order_id',$data['order_id'])->delete();
		if($result){
			$this->success('删除订单成功',"order/order_list");
		}
	}
	//编辑订单
	public function edit_order(){
		$data = input();
		$order = Db::table('jk_order')->where('order_id',$data['order_id'])->find();
		$this->assign('order',$order);
		return $this->fetch();
	}
	//ajax提交
	public function  ajax_post(){
		$data = input();
		$result = Cookie::set('order_id',$data['order_id'],3600);
		echo 1;

	}
	//查看订单中的商品
	public function  show_goods(){
		$order_id = Cookie::get('order_id');
		$goods = Db::table('jk_order')->where('order_id',$order_id)->find();
		
		
		$info = [];
		foreach (json_decode($goods['goods_id'],true) as $k => $v) {
			# code...
			$info[] = Db::table('jk_goods')->where('goods_id',$v['goods_id'])->find();
		}

		$this->assign('info',$info);
		return $this->fetch();
	}
	//是否支付
	public function is_pay(){
		$info = input('post.');
    	if($info['is_pay']==1){
    		$result = Db::table('jk_order')->where('order_id',$info['id'])->update(['status'=>0]);
    	}elseif ($info['is_pay']==0) {
    		$result = Db::table('jk_order')->where('order_id',$info['id'])->update(['status'=>1]);
    	}
    	if($result){
    		return ['status'=>1,'msg'=>'设置成功!'];
    	}else{
    		return ['status'=>0,'msg'=>'设置失败!'];
    	}
	}
}
