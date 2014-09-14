<?php
namespace Admin\Controller;
use Think\Controller;
class DidanController extends AdminController {
	//分类列表
    public function index(){
    	 layout('Layout/lay');
       $model= D('Didan');
       $count = $model->count();
       $Page = new \Think\Page($count,1);
       $show = $Page->show();
       $list = $model->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
       
       //var_dump($list);
       $this->assign('list',$list);
       $this->assign('page',$show);

        $this->display('index');
    }

    //查看订单详情


    public function view(){
      layout('Layout/lay');
      $model = D('Didan');

      $id=I('get.id');
    
      $list = $model->find($id);

      $Dizi = D('Dizi');

      $lost = $Dizi->where(array('uid'=>$list['uid']))->select();
      $this->assign('lost',$lost);

      $qidan = D('Qd');
      $ltst =$qidan->where(array('didan_id'=>$id))->select();
      $num =0;
      foreach($ltst as $mb){
        $num += $mb['num']*$mb['money'];


      } 

      $this->assign('num',$num);


      $this->assign('ltst',$ltst);
     
      $this->assign('list',$list);

      $this->display('views');


    }

    //修改订单状态

    public function edit(){
      layout('Layout/lay');
      $id = I('get.id');
      $model = D('Didan');

      $list  = $model->find($id);
      $this->assign('list',$list);
      if(IS_POST){
        $date['modified']=time();
        $date['status'] = I('post.status');
        $id = I('post.id');
        $model =D('Didan');
        $ids = $model->where(array('id'=>$id))->save($date);
        if($ids){

          $this->success('修改成功');
        }


      }
     

      $this->display('edit');


    }



   
   
}