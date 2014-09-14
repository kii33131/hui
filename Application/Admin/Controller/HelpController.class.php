<?php
namespace Admin\Controller;
use Think\Controller;
class HelpController extends AdminController {
	//分类列表
      public function index(){
       layout('Layout/lay');

       $model =D('Help');
       $count = $model->count();
       $Page = new \Think\Page($count,20);
       $Page ->setConfig('header','个订单');
        $Page ->setConfig('prev','上一页');
        $Page ->setConfig('next','下一页');
        $Page ->setConfig('end','最后一页');
        $Page ->setConfig('theme',"<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%");
       $show = $Page->show();

        $list = $model->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
      // $list = $model->select();
     
       $this->assign('list',$list);
         
        $this->assign('page',$show);
       $this->display('index');  


    }

      public function edit(){
        layout('Layout/lay');
        $id = I('get.id');
        $model= D('Help');
        $list =$model->find($id);
        $this->assign('list',$list);
        if(IS_POST){
          $id = I('post.id');
          $date['content'] = $_POST['content'];
          $model = D('Help');
          $ids = $model->where(array('id'=>$id))->save($date);
          if($ids){

            $this->success('修改成功');
          }else{

            $this->error('修改失败');
          }

        }


        $this->display('edithelp');
      }



       public function delete(){

        $id = I('get.id');
        $model =D('Help');

        $ids = $model->delete($id);

        if($ids){

             $this->success('删除成功');
        }else{

            $this->success('删除失败');

        }
      }
   





    //添加分类

     public function add(){
    	 layout('Layout/lay');

      if(IS_POST){
        $date['status'] = I('post.status');
        $date['content']  = $_POST['content'];
        $date['created']  = time();
        $date['modified']  = time();
        $model = D('Help');
        $ids = $model->add($date);
        if($ids){

          $this->success('添加成功请继续');
        }else{

          $this->error('添加失败');
        }


      }

        $this->display('addhelp');
    }



   
   
}