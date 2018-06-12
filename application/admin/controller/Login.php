<?php
namespace app\admin\controller;

use think\Controller;
use \think\Db;
use think\Session;
use app\admin\model\Admin;


class Login extends Controller{
	//后台登入页面
	public function index(){
		return $this->fetch('login/login');
	}
	/**检验管理员用户名和密码是否正确
	*正确后设置session值
	*
	**/
	public function check_login(){
		$postData = $this->request->post();
		$admin = new Admin();
		$result = $admin->check_login($postData['adminuser'],md5($postData['adminpass']));
        if($result){
        	Session::set('admin',$postData['adminuser']);
        	$this->success('登入成功!', 'Admin/index');
        	return 1;
        }else{
        	return 0;
        }
	}
	//安全退出
	public function sign_out(){
		$result = Session::delete('admin');
		
		$this->redirect('Admin/login/index');
		
	}
}