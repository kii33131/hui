<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends AdminController {
    public function index(){
    	 layout('Layout/lay');

    	 $model = D('Free');
    	 $list  = $model->find(1);
    	 $this->assign('list' ,$list);
    	 if(IS_POST){
    	 	$date['title'] = I('post.title');
    	 	$date['status'] = I('post.status');
    	 	//$date['created'] = time();
    	 	$date['modified'] = time();
    	 	$model = D('Free');

    	 	$ids = $model->where(array('id'=>1))->save($date);	
    	 	if($ids){

    	 		$this->success('修改成功');
    	 	}else{

    	 		$this->error('修改失败哦');
    	 	}
    	 }	
      
        $this->display('adduser');


    }

   
}