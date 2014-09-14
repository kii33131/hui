<?php
namespace Admin\Controller;
use Think\Controller;
class JiimagesController extends AdminController {
	//分类列表
      public function index(){
       layout('Layout/lay');

       $model =D('Jiimages');
       $count = $model->count();
       $Page = new \Think\Page($count,20);
       $Page ->setConfig('header','个订单');
        $Page ->setConfig('prev','上一页');
        $Page ->setConfig('next','下一页');
        $Page ->setConfig('end','最后一页');
        $Page ->setConfig('theme',"<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%");
       $show = $Page->show();

       $list = $model->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
    
     
       $this->assign('list',$list);


         
        $this->assign('page',$show);
       $this->display('index');  


    }

      public function view(){
        layout('Layout/lay');
        $id = I('get.id');

        $model= D('New');
        $list =$model->find($id);
        $this->assign('list',$list);
        $this->display('view');
      }



       public function delete(){

        $id = I('get.id');
        $model =D('Jiimages');

          $list = $model->find($id);
          unlink('Uploads/'.$list['filename']);
          unlink('Uploads/'.reurar($list['filename']));

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
        
        $filename['created']=time();
        $filename['modified']=time();
        $filename['status'] = 1;

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

      imagezoom('Uploads/'.$filename['filename'], 'Uploads/'.$info['photo']['savepath'].'848'.$info['photo']['savename'], 200, 153, '#FFFFFF');
      
   
       $model = D('Jiimages');

       $ids = $model->add($filename);
       if($ids){
         $this->success('精品添加成功');

       }else{
         $this->error('精品添加失败');
       }
  
        }


       }

       


    	

        $this->display('addcategory');
    }



   
   
}