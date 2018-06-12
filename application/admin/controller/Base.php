<?php
namespace app\admin\controller;

use \think\Controller;
use \think\Session;
use \think\Db;

/**
*后台基类
*/
class Base extends Controller{
	/*
	*检查用户是否登入
	*输入正确密码及用户名后创建session
	*@author:柚子
	*/
	public function _initialize(){
		//检查是否登录
        
        if(!Session::has('admin')) {
            
             return $this->redirect('admin/Login/index');
        }
	}
}