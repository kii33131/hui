<?php
namespace Admin\Controller;
use Think\Controller;
class NewController extends AdminController {
	//分类列表
      public function index(){
       layout('Layout/lay');

       $model =D('New');
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

      public function view(){
        layout('Layout/lay');
        $id = I('get.id');
        $model= D('New');
        $list =$model->find($id);
        if(IS_POST){

          $id = I('post.id');
        $filename['name']=I('post.name');
     
        $filename['modified']=time();

        $filename['content']=$_POST['content'];//I('post.content');
      
        $model = D('New');
        $ids = $model->where(array('id'=>$id))->save( $filename);
        if($ids){
          $this->success('修改成功');


        }else{


          $this->error('修改失败');
        }
        }


        $this->assign('list',$list);
        $this->display('view');
      }



       public function delete(){

        $id = I('get.id');
        $model =D('New');

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
        $filename['name']=I('post.name');
        $filename['created']=time();
        $filename['modified']=time();
        //content
        $filename['content']=$_POST['content'];//I('post.content');
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 5145728 ;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Uploads/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息
        $this->error($upload->getError());
        }else{// 上传成功

      $filename['filename']= $info['photo']['savepath'].$info['photo']['savename'];

      imagezoom('Uploads/'.$filename['filename'], 'Uploads/'.$info['photo']['savepath'].'newss'.$info['photo']['savename'], 126, 107, '#FFFFFF');
      
   
       $model = D('New');

       $ids = $model->add($filename);
       if($ids){
         $this->success('新闻添加成功');

       }else{
         $this->error('新闻添加失败');
       }
  
        }


       }

       


    	

        $this->display('addcategory');
    }



   
   
}