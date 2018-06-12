<?php
namespace app\admin\controller;

use think\Controller;
use \think\Db;
use \think\Request;
use \think\Uploads;

class Article extends Base{
    //后台首页
    public function index(){
    	
        return $this->fetch();
    }
    //文章列表
    public function  article_list(){
    	$list = Db::name('article')->paginate(6);
    	// 把分页数据赋值给模板变量list
    	$this->assign('list', $list);
    	// 渲染模板输出6.return $this->fetch();
        return $this->fetch();
    }
    //增加文章
    public function add_article(Request $request){
    	
    	return $this->fetch();

    }
    //添加文章或编辑文章
    public function edit_article(){
    	$info = input();
    	$list = Db::table('jk_article')->where('article_id',$info['article_id'])->find();
    	//处理图片数据
    	$img = json_decode($list['img']);
    	// print_r($img);
    	$this->assign('img',$img);
    	$this->assign('list',$list);
    	return $this->fetch();
    }
    public function save_article(){
    	$data = input('post.');
    	//图片文件
    	$files = request()->file('img');
    	foreach($files as $file){     // 移动到框架应用根目录/public/uploads/ 目录下
    	 	$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'. DS . 'article');
    	 	if($info){// 成功上传后 获取上传信息9.            // 输出 jpg10.           
    	       	//echo $info->getExtension(); 
    	       // 输出 42a79759f284b767dfcb2a0197904287.jpg12.           
    	        //echo $info->getFilename();
    	        $arr[] = $info->getSaveName();//存入变量
    	        $data['img'] = json_encode($arr);
    	     }else{
    	         // 上传失败获取错误信息
    	          //echo $file->getError();
    	            }    
    	        }
    	 
    	 
    	 //保存数据
    	            $data['add_time'] = time();
    	 			$result = Db::table('jk_article')->insert($data);

    	      
    	 if($result){
    	 	$this->success('新增成功', 'article/article_list');
    	 }else{
    	 	$this->error('添加失败','article/article_list');
    	 }
    	 
    	
    }
    //保存编辑文章
    public function save_edit_article(){
        $data = input('post.');
        //图片文件
        $files = request()->file('img');
        foreach($files as $file){     // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/article');
            if($info){// 成功上传后 获取上传信息9.            // 输出 jpg10.           
                //echo $info->getExtension(); 
               // 输出 42a79759f284b767dfcb2a0197904287.jpg12.           
                //echo $info->getFilename();
                $arr[] = $info->getSaveName();//存入变量
                $data['img'] = json_encode($arr);
             }else{
                 // 上传失败获取错误信息
                  //echo $file->getError();
                    }    
                }
         
         
         //保存数据
                    $data['add_time'] = time();
                    $result = Db::table('jk_article')->where('article_id',$data['article_id'])->update($data);

              
         if($result){
            $this->success('编辑成功', 'article/article_list');
         }else{
            $this->error('编辑失败','article/article_list');
         }
    } 
    //删除文章
    public function delete_article(){
        $article_id = input();
        $img_json = Db::table('jk_article')->field('img')->where('article_id',$article_id['article_id'])->find();//图片
        $img_arr = json_decode($img_json['img']);
        if(count($img_arr)>0){
            foreach ($img_arr as $key => $value) {
                //遍历删除图片
                @$del_img = unlink(ROOT_PATH . 'public'.DS.'uploads'.DS.'article'.DS.$value);

            }
         }
        $del_article = Db::table('jk_article')->where('article_id',$article_id['article_id'])->delete();
        if($del_article){
            $this->success('删除文章成功!','article/article_list');
        }

    }
    //设置是否推荐
    public function is_elite(){
    	$info = input('post.');
    	if($info['is_elite']==1){
    		$result = Db::table('jk_article')->where('article_id',$info['id'])->update(['is_elite'=>0]);
    	}elseif ($info['is_elite']==0) {
    		$result = Db::table('jk_article')->where('article_id',$info['id'])->update(['is_elite'=>1]);
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
    		$result = Db::table('jk_article')->where('article_id',$info['id'])->update(['is_show'=>0]);
    	}elseif ($info['is_show']==0) {
    		$result = Db::table('jk_article')->where('article_id',$info['id'])->update(['is_show'=>1]);
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
}