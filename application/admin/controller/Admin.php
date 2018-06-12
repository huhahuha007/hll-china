<?php
namespace app\admin\controller;

use think\Controller;
use \think\Db;
use app\admin\model\Admin as AdminModle;
use think\Request;
use think\Session;

class Admin extends Base{
    //后台首页
    public function index(){
        $admin = Session::get('admin');
        $this->assign('admin',$admin);
        return $this->fetch();
    }
    public function  welcome(){

        return $this->fetch();
    }
    public function admin(){

    }
    //显示管理员首页
    public function admin_list(){
        //读取管理员jk_admin表的信息
        $admin=AdminModle::get(['adminuser'=>'admin']);

        $this->view->assign('admin',$admin);
        return $this->fetch();
    }
    //编辑
    public function admin_edit(){
        //读取管理员jk_admin表的信息
        $admin=Db::table('jk_admin')->find();

        $this->view->assign('admin',$admin);
        return $this->fetch('admin_edit');
    }
    //更新，修改密码
    public function  update(Request $request){
        if($request->isAjax(true)){
            $data=$request->param();
            $map=['adminid'=>$data['adminid']];
            $data['adminuser'] = $data['adminuser'];
            $data['adminpass']=md5($data['adminpass']);
            $res=AdminModle::update($data,$map);

            $status=1;
            $message='更新成功';

            if(is_null($res)){
               $status=0;
               $message='更新失败';
            }
        }else{
            return ['status'=>0,'message'=>'更新失败'];
        }
        return ['status'=>$status,'message'=>$message];
   }
   //联系电话
   public function phone(){
        $config = Db::table('jk_config')->where('id',1)->field('phone,id,telephone')->find();
        $this->assign('config',$config);
        return $this->fetch();
   }
   //更新联系方式
   public function update_phone(){
        $data = input('post.');
        $result = Db::table('jk_config')->where('id',1)->update($data);
        if(1){
            echo json_encode(array('status' =>1 ,'message'=>'更新成功' ));
        }
   }
   //清理缓存
   public function del_cache( $dirName=RUNTIME_PATH ){
        //$dirName =RUNTIME_PATH ;//runtime目录
        if($handle = opendir($dirName)){
            while ($item = readdir( $handle )) {
                # 去..及.
                if($item != '.' && $item != '..'){
                    if(is_dir($dirName.$item)){
                        //是目录
                        // print_r($dirName.$item);
                         $this->del_cache($dirName.$item.DS);
                    }else{

                        $result = unlink($dirName.$item);
                    }
                }

            }
        }
       echo "<h2>清理缓存成功!<h2>";
        
   }
   //小程序配置
   public function app_config(){
        $config = Db::table('jk_config')->where('id',1)->field('appid,appsecret')->find();
        $this->assign('config',$config);
        return $this->fetch();
   }
   //更新小程序配置
   public function update_appConfig(){
        $data = input('post.');
        $result = Db::table('jk_config')->where('id',1)->update($data);
        if($result){
            echo json_encode(array('status' =>1 ,'message'=>'更新成功' ));
        }else {
            # code...
            echo json_encode(array('status' =>0 ,'message'=>'更新失败' ));
        }
   }

}