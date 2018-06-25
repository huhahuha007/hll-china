<?php
namespace app\admin\controller;

use think\Controller;
use \think\Db;
use \think\Request;
use \think\Uploads;

class Honor extends Base{
    //订单列表
    public function honor_list(){
        $honor_list = Db::table('jk_honor')->paginate(10);
        $this->assign('honor_list',$honor_list);
        return $this->fetch();
    }
    //增加文章
    public function add_honor(){

        return $this->fetch();
    }
    public function save_honor(){
        $data = input('post.');

        //图片文件
        $file = request()->file('img');

        if($file){
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads' .DS. 'honor');
            if($info){// 成功上传后 获取上传信息9.            // 输出 jpg10.
                //echo $info->getExtension();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg12.
                //echo $info->getFilename();
                $fileName = $info->getSaveName();//存入变量
                $data['img'] = $fileName;
            }else{
                // 上传失败获取错误信息
                //echo $file->getError();
            }
        }


        //保存数据
        $result = Db::table('jk_honor')->insert($data);


        if($result){
            $this->success('新增成功', 'honor/honor_list');
        }else{
            $this->error('添加失败','honor/honor_list');
        }


    }
    //添加文章或编辑文章
    public function edit_honor(){
        $info = input();
        $list = Db::table('jk_honor')->where('id',$info['honor_id'])->find();
        //处理图片数据
        $img = json_decode($list['img']);
        // print_r($img);
        $this->assign('img',$img);
        $this->assign('list',$list);
        return $this->fetch();
    }
    //保存编辑文章
    public function save_edit_honor(){
        $data = input('post.');
        //图片文件
        $files = request()->file('img');
        print_r($files);
        if($files){     // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $files->move(ROOT_PATH . 'public' . DS . 'uploads/honor');
            if($info){// 成功上传后 获取上传信息9.            // 输出 jpg10.
                //echo $info->getExtension();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg12.
                //echo $info->getFilename();
                //存入变量
                $fileName = $info->getSaveName();
                $data['img'] = $fileName;
            }else{
                // 上传失败获取错误信息
                //echo $file->getError();
            }
        }


        //保存数据
        $result = Db::table('jk_honor')->where('id',$data['id'])->update($data);


        if($result){
            $this->success('编辑成功', 'honor/honor_list');
        }else{
            $this->error('编辑失败','honor/honor_list');
        }
    }
    //删除文章
    public function delete_honor(){
        $news_id = input();
        $img_json = Db::table('jk_honor')->field('img')->where('id',$news_id['honor_id'])->find();//图片
        $img_arr = $img_json['img'];
        if(count($img_arr)>0){

                //遍历删除图片
                @$del_img = unlink(ROOT_PATH . 'public'.DS.'uploads'.DS.'honor'.DS.$img_arr);


        }
        $del_news = Db::table('jk_honor')->where('id',$news_id['honor_id'])->delete();
        if($del_news){
            $this->success('删除文章成功!','honor/honor_list');
        }

    }
}
