<?php
namespace app\admin\controller;
use app\admin\model\Jk_banner;
use think\Request;
use think\Controller;
use \think\Db;
use app\admin\model\Banner as BannerModel;
class Banner extends Base{
    //后台首页
    public function index(){
        return $this->fetch();
    }
    public function  banner_list(){
        $bannerlist = Db::name('banner')->paginate(10);
        // 把分页数据赋值给模板变量list
        $page = $bannerlist->render();
        $this->assign('bannerlist', $bannerlist);
        // 渲染模板输出6.return $this->fetch();
        return $this->fetch();

    }
    //渲染添加界面
    public function add_banner()
    {
        //渲染添加模板
        return $this->view->fetch('add_banner');
    }
    public function banner_add()
    {
        //渲染添加模板
        return $this->view->fetch('banner_add');
    }
    //编辑
    public function banner_edit(){
        //获取数据
        $info = input();
        //查询结果
        $list = Db::table('jk_banner')->where('banner_id',$info['banner_id'])->find();
        //处理图片数据

        $this->assign('list',$list);

        return $this->fetch();
    }
    public function save_banner(){
        //从提交表单中获取数据
        $data = input('post.');
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('img');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'banner');
        if($info){
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            // 成功上传后 返回上传信息
            $path= $info->getSaveName();
        }else{

        }


        //保存数据
        $result=Db::table('jk_banner')->insert(['banner_title'=>$data['title'],'banner_img'=>$path,'banner_url'=>$data['url'],'create_time'=>time()]);
        //设置返回数据的初始值
        $status = 0;
        $message = '添加失败,请检查';
        //检测更新结果,将结果返回给grade_edit模板中的ajax提交回调处理
        if ($result) {
            $status = 1;
            $message = '恭喜, 添加成功~~';
            $this->success('添加成功','banner/banner_list');

        //自动转为json格式返回
        // return json(array('status'=>$status, 'message'=>$message));

        }
    }
    //删除广告
    public function delete_banner(){
        $banner_id = input();
        $img_arr = Db::table('jk_banner')->field('banner_img')->where('banner_id',$banner_id['banner_id'])->find();//图片
        
        
        if($img_arr){
                //删除图片
            
                @$del_img = unlink(ROOT_PATH . 'public'.DS.'uploads'.DS.'banner'.DS.$img_arr['banner_img']);
            
        }
        $del_banner = Db::table('jk_banner')->where('banner_id',$banner_id['banner_id'])->delete();
        if($del_banner){
            $this->success('删除广告成功!','banner/banner_list');
        }

    }
    public function update()
    {
        //1.获取所有提交过来的数据，包括文件
        $data = $this ->request -> param(true);
        //2.对于文件单独操作打包成一个文件对象
        $file = $this -> request -> file('banner_img');
        //3.文件验证与上传

        //@@@@@@@@有BUG
        $info = $file -> move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'banner');



        if (is_null($info)){
            $this->error($file->getError());
        }
        //4.执行更新操作
        $res = BannerModel::update([
            'banner_img'=> $info -> getSaveName(),
            'banner_title' => $data['banner_title'],
            'banner_url' => $data['banner_url']
        ],['banner_id'=> $data['banner_id']]);

        //5.检测更新
        if (is_null($res)) {
            $this -> error('更新失败~~');
        }
        //6.更新成功
        $this->success('更新成功~~','banner/banner_list');
    }
    //设置是否显示
    public function is_show(){
        $info = input('post.');
        if($info['is_show']==1){
            $result = Db::table('jk_banner')->where('banner_id',$info['id'])->update(['is_show'=>0]);
        }elseif ($info['is_show']==0) {
            $result = Db::table('jk_banner')->where('banner_id',$info['id'])->update(['is_show'=>1]);
        }
        if($result){
            return ['status'=>1,'msg'=>'设置成功!'];
        }else{
            return ['status'=>0,'msg'=>'设置失败!'];
        }
    }

}