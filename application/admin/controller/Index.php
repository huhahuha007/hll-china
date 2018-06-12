<?php
namespace app\admin\controller;

use think\Controller;
use \think\Db;
use think\Session;
use app\admin\model\Admin;


class Index extends Controller{
	//后台登入页面
	public function index(){
		$this->redirect('admin/index');
	}
	
}