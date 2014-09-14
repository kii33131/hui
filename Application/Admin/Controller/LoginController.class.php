<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.9lu.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Lewis
// +----------------------------------------------------------------------
// | 后台公共控制器 
// +----------------------------------------------------------------------
 
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

    /**
     * 后台控制器初始化
     */

    public function index(){
    	layout(false); // 临时关闭当前模板的布局功能

    	if(IS_POST){
    	$verify = new \Think\Verify(); 
    	$code = I('post.code');

	    	if(!$verify->check($code, $id)){
	            $this->error('验证码错误请重试');
	        }
	    
	      $name = I('post.name');
	      $password = md5(I('post.password')); 
	      $model = D('Admin');
	      $list = $model->where(array('name'=>$name))->select();

	      if($list){

	      	if($password!=$list[0]['password']){

	      		$this->error('账号或密码错误请重试');
	      	}

	      	$_SESSION['admin']['name'] = $list[0]['name'];

	      	$this->redirect('Vip/index');


	      }else{

	      	$this->error('账号或密码错误请重试');

	      }



    
        }

    	
    	$this->display('sign-in');
    }


    //退出后台登陆

    public function delete(){
    	unset($_SESSION['admin']['name']);

    	$this->redirect('Login/index');


    }

       
}
