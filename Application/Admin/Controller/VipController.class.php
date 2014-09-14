<?php
namespace Admin\Controller;
use Think\Controller;
class VipController extends AdminController {
	//分类列表
    public function index(){
    	 layout('Layout/lay');
      	$model = D('Vip');
    
		    $count = $model->count();
		   // $Page = new \Think\Page($count,25);
        $Page = new \Think\Page($count,20);
        $Page ->setConfig('header','个订单');
        $Page ->setConfig('prev','上一页');
        $Page ->setConfig('next','下一页');
        $Page ->setConfig('end','最后一页');
        $Page ->setConfig('theme',"<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%");
		    $show = $Page->show();
		    $list = $model->where(array('status'=>0))->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
      	 
      	$this->assign('list',$list);
      	$this->assign('page',$show);
        $this->display('index');
    }



    //删除不听话的会员
   public function delete(){
   	$id = I('get.id');
   //var_dump($id);
    $model = D('Vip');

    $ids = $model->delete($id);

    if($ids){

      $this->success('删除成功');
    }else{

      $this->error('删除失败');
    }





   }

 

   
}