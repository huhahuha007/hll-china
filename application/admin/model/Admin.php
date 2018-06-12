<?php
namespace app\admin\model;

use think\Model;
use think\Db;

class Admin extends Model{
	protected $admin = 'jk_admin';
	//检查管理员的用户名及密码
	public function check_login($adminuser,$adminpass){
		$result = Db::table($this->admin)->where(['adminuser' =>$adminuser ,'adminpass'=>$adminpass])->find();
		return $result;
	}
	//实现时间的转换
    public function getTime($val){
	    return date('Y/m/d', $val);
    }
    //md5加密
    public function setPassWord($val){
        return md5($val);

    }
}