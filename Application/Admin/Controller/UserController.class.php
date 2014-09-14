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
 
class UserController extends AdminController {

    /**
     * 后台控制器初始化
     */
   

   public function view(){
   	layout('Layout/lay');

   	$model=D('Admin');
   	$list = $model->select();

   	$this->assign('list',$list);

   	$this->display('addcategory');


   }



   public function edit(){
   	layout('Layout/lay');

   	$model=D('Admin');
   	$list = $model->select();

   	$this->assign('list',$list);
   	if(IS_POST){
   		$model=D('Admin');
   		$date['name'] =I('post.name');
   		$date['phone'] =I('post.phone');
   		$date['password'] =md5(I('post.password'));
   		$date['modified'] = time();
   		$id = I('post.id');
   		$ids = $model->where(array('id'=>$id))->save($date);
   		if($ids){

   			unset($_SESSION['admin']['name']);
   			$this->success('修改成功');


   		}else{
   			$this->error('修改失败');


   		}

   	}

   	$this->display('edit');


   }



}
