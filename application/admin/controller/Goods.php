<?php
namespace app\admin\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use \think\uploads;

class Goods extends Base{
	public function index(){

	}
	//产品列表
	public function goods_list(){
		//商品列表
		$goods_list = Db::table('jk_goods')->paginate(8);
		$this->assign('goods_list',$goods_list);
		return $this->fetch();
	}
	//添加产品
	public function add_goods(){
        $jk_goods_category = Db::table('jk_goods_category')->select();//获取分类
        $this->assign('jk_goods_category',$jk_goods_category);
		return $this->fetch();
	}
	//保存商品
	public function save_goods(){
		$data = input('post.');
		//图片文件
    	$file = request()->file('img1');
    	if($file){
    	  // 移动到框架应用根目录/public/uploads/ 目录下
    	 	$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads' .DS. 'goods');
    	 	if($info){// 成功上传后 获取上传信息9.            // 输出 jpg10.           
    	       	//echo $info->getExtension(); 
    	       // 输出 42a79759f284b767dfcb2a0197904287.jpg12.           
    	        //echo $info->getFilename();
    	        $fileName = $info->getSaveName();//存入变量
    	        $data['goods_img'] = $fileName;
    	     }else{
    	         // 上传失败获取错误信息
    	          //echo $file->getError();
    	            }
    	    }
    	$data['add_time'] = time();//时间    
    	$result = Db::table('jk_goods')->insert($data);//保存数据
    	$goods_id = Db::table('jk_goods')->getLastInsID(); 
    	$files = request()->file('img');
    	foreach ($files as $value) {
    		
    		// 移动到框架应用根目录/public/uploads/ 目录下
    	 	$info = $value->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'goods');
    		# 遍历加入数据库
    		if($info){
    		$add = ['goods_id'=>$goods_id,'goods_gallerys'=>$info->getSaveName()];
    		Db::table('jk_goods_gallerys')->insert($add);
    	    }
    	}
    	if($result){
    		$this->success('添加成功!','admin/goods/goods_list');
    	}
    	 
	}
	//产品分类列表
	public function goods_category(){
		$category_list = Db::table('jk_goods_category')->paginate(8);
		$this->assign('category_list',$category_list);
		return $this->fetch();
	}
	//新增产品分类页面
	public function add_category(){
		$category_list = Db::table('jk_goods_category')->select();
		$this->assign('category_list',$category_list);
		return $this->fetch();
	}
	//保存产品分类
	public function save_category(){
		$data = input('post.');
		$result = Db::table('jk_goods_category')->insert($data);
		if($result){
			$this->success('添加成功!','admin/goods/goods_category');
		}

	}
	//上传产品图片
	public function upload_img(){
		$data = $_FILES['img'];
		file_put_contents("./tt.txt", json_encode($data));
		return json_encode(['code'=>1,'msg'=>'成功','data'=>['src'=>json_encode($data)]]);
	}
	//删除产品分类
	public function delete_category(){
		$data = input();
		$is_true = Db::table('jk_goods_category')->where('parent_id',$data['type_id'])->find();//查找该分类下的子类
		$is_goods = Db::table('jk_goods')->where('goods_category',$data['type_id'])->find();
		if($is_true){
			$this->error('该分类下有子分类不能删除!');
		}elseif ($is_goods) {
			$this->error('该分类下有商品不能删除!');
		}else{
			$result = Db::table('jk_goods_category')->where('type_id',$data['type_id'])->delete();
			if($result){
				$this->success('删除产品分类成功!');	
			}
			
		}

	}
	//编辑产品分类
	public function edit_category(){
		$data = input();
		$category_info = Db::table('jk_goods_category')->where('type_id',$data['type_id'])->find();
        $this->assign('category_info',$category_info);
        return $this->fetch();
		

		
	}
	//保存编辑的分类
	public function save_edit_category(){
		$data = input('post.');
		$result = Db::table('jk_goods_category')->where('type_id',$data['type_id'])->update($data);
		if($result){
			$this->success('更新成功!','goods/goods_category');
		}
	}
	//删除商品
	public function delete_goods(){
		$data = input();
		if($data){
			$img = Db::table('jk_goods')->where('goods_id',$data['goods_id'])->find();
			$img_gallerys = Db::table('jk_goods_gallerys')->where('goods_id',$data['goods_id'])->select();
			$result1 = Db::table('jk_goods')->where('goods_id',$data['goods_id'])->delete();
			$result2 = Db::table('jk_goods_gallerys')->where('goods_id',$data['goods_id'])->delete();
			$del_img = @unlink(ROOT_PATH . 'public'.DS.'uploads'.DS.'goods'.DS.$img['goods_img']);
			//遍历删除详情图片
			foreach ($img_gallerys as $key => $value) {
				$del_img = unlink(ROOT_PATH . 'public'.DS.'uploads'.DS.'goods'.DS.$value['goods_gallerys']);
			}

		}
		if($result1 || $result2){
			$this->success('删除成功!');
		}
	}
	//编辑商品
	public function edit_goods(){
		$data = input();
		$jk_goods_category = Db::table('jk_goods_category')->select();//获取分类
		$goods_info = Db::table('jk_goods')->where('goods_id',$data['goods_id'])->find();
		$goods_gallerys = Db::table('jk_goods_gallerys')->where('goods_id',$data['goods_id'])->select();
		$this->assign('goods_gallerys',$goods_gallerys);
		$this->assign('goods_info',$goods_info);
        $this->assign('jk_goods_category',$jk_goods_category);
		return $this->fetch();
	}
	//保存编辑的商品
	public function save_edit_goods(){
		$data = input();
		$file = request()->file('img1');
		$goods_info = Db::table('jk_goods')->where('goods_id',$data['goods_id'])->find();
		//如果有更改展示图
		if($file){
			//删除以前的图片
			@unlink(ROOT_PATH . 'public'.DS.'uploads'.DS.'goods'.DS.$goods_info['goods_img']);
			// 移动到框架应用根目录/public/uploads/ 目录下
    	 	$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'goods');
    		$data['goods_img'] = $info->getSaveName();
		}
		$files = request()->file('img');
		if($files){
			$gallerys = Db::table('jk_goods_gallerys')->where('goods_id',$data['goods_id'])->select();
			//遍历删除
			foreach ($gallerys as $key => $value) {
				@unlink(ROOT_PATH . 'public'.DS.'uploads'.DS.'goods'.DS.$value['goods_gallerys']);
			}
			//删除数据库数据
			Db::table('jk_goods_gallerys')->where('goods_id',$data['goods_id'])->delete();
			foreach ($files as $value) {
    		
    		// 移动到框架应用根目录/public/uploads/ 目录下
    	 	$info = $value->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'goods');
    		# 遍历加入数据库
    		if($info){
    		$add = ['goods_id'=>$data['goods_id'],'goods_gallerys'=>$info->getSaveName()];
    		Db::table('jk_goods_gallerys')->insert($add);
    	    }
    	}


		}
		$result = Db::table('jk_goods')->where('goods_id',$data['goods_id'])->update($data);
		if($result){
			$this->success("编辑成功!",'admin/goods/goods_list');
		}


	}
	//是否热卖
	public function is_hot(){
		$info = input('post.');
    	if($info['is_hot']==1){
    		$result = Db::table('jk_goods')->where('goods_id',$info['id'])->update(['is_hot'=>0]);
    	}elseif ($info['is_hot']==0) {
    		$result = Db::table('jk_goods')->where('goods_id',$info['id'])->update(['is_hot'=>1]);
    	}
    	if($result){
    		return ['status'=>1,'msg'=>'设置成功!'];
    	}else{
    		return ['status'=>0,'msg'=>'设置失败!'];
    	}
	}
	//是否最新
	public function is_new(){
		$info = input('post.');
    	if($info['is_new']==1){
    		$result = Db::table('jk_goods')->where('goods_id',$info['id'])->update(['is_new'=>0]);
    	}elseif ($info['is_new']==0) {
    		$result = Db::table('jk_goods')->where('goods_id',$info['id'])->update(['is_new'=>1]);
    	}
    	if($result){
    		return ['status'=>1,'msg'=>'设置成功!'];
    	}else{
    		return ['status'=>0,'msg'=>'设置失败!'];
    	}
	}
	//是否推荐
	public function is_elite(){
		$info = input('post.');
    	if($info['is_elite']==1){
    		$result = Db::table('jk_goods')->where('goods_id',$info['id'])->update(['is_elite'=>0]);
    	}elseif ($info['is_elite']==0) {
    		$result = Db::table('jk_goods')->where('goods_id',$info['id'])->update(['is_elite'=>1]);
    	}
    	if($result){
    		return ['status'=>1,'msg'=>'设置成功!'];
    	}else{
    		return ['status'=>0,'msg'=>'设置失败!'];
    	}
	}
	//上下架
	public function is_sale(){
		$info = input('post.');
    	if($info['is_sale']==1){
    		$result = Db::table('jk_goods')->where('goods_id',$info['id'])->update(['is_sale'=>0]);
    	}elseif ($info['is_sale']==0) {
    		$result = Db::table('jk_goods')->where('goods_id',$info['id'])->update(['is_sale'=>1]);
    	}
    	if($result){
    		return ['status'=>1,'msg'=>'设置成功!'];
    	}else{
    		return ['status'=>0,'msg'=>'设置失败!'];
    	}
	}
}