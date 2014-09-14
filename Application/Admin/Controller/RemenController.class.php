<?php
namespace Admin\Controller;
use Think\Controller;
class RemenController extends AdminController {
	//分类列表
      public function index(){
       layout('Layout/lay');

       $model =D('Remen');
       $count = $model->count();
       $Page = new \Think\Page($count,20);
       $Page ->setConfig('header','个订单');
        $Page ->setConfig('prev','上一页');
        $Page ->setConfig('next','下一页');
        $Page ->setConfig('end','最后一页');
        $Page ->setConfig('theme',"<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%");
       $show = $Page->show();

       $list = $model->limit($Page->firstRow.','.$Page->listRows)->select();
    
     
       $this->assign('list',$list);


         
        $this->assign('page',$show);
       $this->display('index');  


    }

  


       public function delete(){

        $id = I('get.id');
        $model =D('Remen');

          $list = $model->find($id);
        
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
        
      
        $filename['title'] = I('post.title');


   
       $model = D('Remen');

       $ids = $model->add($filename);
       if($ids){
         $this->success('精品添加成功');

       }else{
         $this->error('精品添加失败');
       }
  
        




       }

       


    	

        $this->display('addcategory');
    }





   
   
}