<?php
namespace app\admin\controller;

use think\Controller;
use \think\Db;
use \think\Request;
use \think\Uploads;

class News extends Base{
    //后台首页
    public function index(){
    	
        return $this->fetch();
    }
    //文章列表
    public function  news_list(){
    	$list = Db::name('news')->paginate(6);
    	// 把分页数据赋值给模板变量list
    	$this->assign('list', $list);
    	// 渲染模板输出6.return $this->fetch();
        return $this->fetch();
    }
    //增加文章
    public function add_news(){
        $jk_news_category = Db::table('jk_news_category')->select();//获取分类
        $this->assign('jk_news_category',$jk_news_category);
        return $this->fetch();
    }
    //添加文章或编辑文章
    public function edit_news(){
    	$info = input();
    	$list = Db::table('jk_news')->where('news_id',$info['news_id'])->find();

        $im = Db::table('jk_news')->where('news_id',$info['news_id'])->value('img');
    	//处理图片数据
    	$img = json_decode($list['img']);
    	 //print_r($im);
    	$this->assign('img',$img);
    	$this->assign('list',$list);
        $this->assign('im',$im);
    	return $this->fetch();
    }
    public function save_news(){
    	$data = input('post.');

            //图片文件
            $files = request()->file('img');
        foreach($files as $file) {
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'news');
            if ($info) {// 成功上传后 获取上传信息9.            // 输出 jpg10.
                //echo $info->getExtension();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg12.
                //echo $info->getFilename();
                $fileName = $info->getSaveName();//存入变
                file_put_contents("../wwww.txt", $fileName);
                $data['img'] = $fileName;
            } else {
                // 上传失败获取错误信息
                //echo $file->getError();
            }

        }

    	 //保存数据
    	            $data['add_time'] = time();
    	 			$result = Db::table('jk_news')->insert($data);

    	      
    	 if($result){
    	 	$this->success('新增成功', 'news/news_list');
    	 }else{
    	 	$this->error('添加失败','news/news_list');
    	 }
    	 
    	
    }
    //保存编辑文章
    public function save_edit_news(){
        $data = input('post.');
        //图片文件
        $file = request()->file('img');
        if($file){     // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'news');
            if($info){// 成功上传后 获取上传信息9.            // 输出 jpg10.           
                //echo $info->getExtension(); 
               // 输出 42a79759f284b767dfcb2a0197904287.jpg12.           
                //echo $info->getFilename();
                $arr = $info->getSaveName();//存入变量
                $data['img'] = $arr;
             }else{
                 // 上传失败获取错误信息
                  //echo $file->getError();
                    }    
        }
         
         
         //保存数据
                    $data['add_time'] = time();
                    $result = Db::table('jk_news')->where('news_id',$data['news_id'])->update($data);

              
         if($result){
            $this->success('编辑成功', 'news/news_list');
         }else{
            $this->error('编辑失败','news/news_list');
         }
    } 
    //删除文章
    public function delete_news(){
        $news_id = input();
        $img_json = Db::table('jk_news')->field('img')->where('news_id',$news_id['news_id'])->find();//图片
        $img_arr = json_decode($img_json['img']);
        if(count($img_arr)>0){
            foreach ($img_arr as $key => $value) {
                //遍历删除图片
                @$del_img = unlink(ROOT_PATH . 'public'.DS.'uploads'.DS.'news'.DS.$value);

            }
         }
        $del_news = Db::table('jk_news')->where('news_id',$news_id['news_id'])->delete();
        if($del_news){
            $this->success('删除文章成功!','news/news_list');
        }

    }
    //设置是否推荐
    public function is_elite(){
    	$info = input('post.');
    	if($info['is_elite']==1){
    		$result = Db::table('jk_news')->where('news_id',$info['id'])->update(['is_elite'=>0]);
    	}elseif ($info['is_elite']==0) {
    		$result = Db::table('jk_news')->where('news_id',$info['id'])->update(['is_elite'=>1]);
    	}
    	if($result){
    		return ['status'=>1,'msg'=>'设置成功!'];
    	}else{
    		return ['status'=>0,'msg'=>'设置失败!'];
    	}
    }
     //设置是否显示
    public function is_show(){
    	$info = input('post.');
    	if($info['is_show']==1){
    		$result = Db::table('jk_news')->where('news_id',$info['id'])->update(['is_show'=>0]);
    	}elseif ($info['is_show']==0) {
    		$result = Db::table('jk_news')->where('news_id',$info['id'])->update(['is_show'=>1]);
    	}
    	if($result){
    		return ['status'=>1,'msg'=>'设置成功!'];
    	}else{
    		return ['status'=>0,'msg'=>'设置失败!'];
    	}
    }
    //更改密码
    public function update_pwd(){
        $data = Db::table('jk_admin')->find();
        $this->assign('data',$data);
        return $this->fetch();
    }
    //文章分类列表
    public function news_category(){
        $category_list = Db::table('jk_news_category')->paginate(8);
        $this->assign('category_list',$category_list);
        return $this->fetch();
    }
    //新增文章分类页面
    public function add_category(){
        $category_list = Db::table('jk_news_category')->select();
        $this->assign('category_list',$category_list);
        return $this->fetch();
    }
    //保存文章分类
    public function save_category(){
        $data = input('post.');
        $result = Db::table('jk_news_category')->insert($data);
        if($result){
            $this->success('添加成功!','admin/news/news_category');
        }

    }
    //编辑文章分类
    public function edit_category(){
        $data = input();
        $category_info = Db::table('jk_news_category')->where('type_id',$data['type_id'])->find();
        $this->assign('category_info',$category_info);
        return $this->fetch();



    }
    //保存编辑的分类
    public function save_edit_category(){
        $data = input('post.');
        $result = Db::table('jk_news_category')->where('type_id',$data['type_id'])->update($data);
        if($result){
            $this->success('更新成功!','news/news_category');
        }
    }
    //删除文章分类
    public function delete_category(){
        $data = input();
        $is_true = Db::table('jk_news_category')->where('parent_id',$data['type_id'])->find();//查找该分类下的子类
        $is_goods = Db::table('jk_goods')->where('goods_category',$data['type_id'])->find();
        if($is_true){
            $this->error('该分类下有子分类不能删除!');
        }elseif ($is_goods) {
            $this->error('该分类下有商品不能删除!');
        }else{
            $result = Db::table('jk_news_category')->where('type_id',$data['type_id'])->delete();
            if($result){
                $this->success('删除产品分类成功!');
            }

        }

    }
}