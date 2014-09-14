<?php
namespace Admin\Controller;
use Think\Controller;
class ZhensController extends AdminController {


     //搜索商品页面
    public function getgoods(){
      layout('Layout/lay');
      //$model= D('Goods');
      $bianhao = I('get.name');

      $map['bianhao'] = array('like',"%$bianhao%");
      $model = D('Zhens');
      $count = $model->where($map)->count();
      $Page = new \Think\Page($count,20);
      $Page ->setConfig('header','个订单');
      $Page ->setConfig('prev','上一页');
      $Page ->setConfig('next','下一页');
      $Page ->setConfig('end','最后一页');
      $Page ->setConfig('theme',"<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%"); 
      $show = $Page->show();
      $lost = $model->where($map)->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
      $this->assign('list',$lost);
      $this->assign('page',$show);

      $this->display('index');

    }



	//分类列表
    public function index(){
    	 layout('Layout/lay');
       $model= D('Zhens');

       $count = $model->count();
       $Page = new \Think\Page($count,25);
       
        $Page ->setConfig('header','个订单');
        $Page ->setConfig('prev','上一页');
        $Page ->setConfig('next','下一页');
        $Page ->setConfig('end','最后一页');
        $Page ->setConfig('theme',"<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%");

       $show = $Page->show();
       $list = $model->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
       
       //var_dump($list);
       $this->assign('list',$list);
       $this->assign('page',$show);

        $this->display('index');
    }

    //证书

    public function add(){
    	 layout('Layout/lay');
      if($_POST){
      $model = D('Zhens');
      $date['name'] = I('post.name');
      $date['bianhao']= I('post.bianhao');
      $date['cailiao'] = I('post.cailiao');
      $date['chicun'] = I('post.chicun');
      $date['weight'] = I('post.weight');
      $date['created'] = time();
      $date['modified'] =time();
      $date['time'] =I('post.time');


      $ids = $model->add($date);
      if($ids){

        $this->success('添加成功请继续');

      }else{

         $this->error('添加失败');
      }





      }


      $this->display('addgoods');
    }



    //查看商品信息

    public function view(){
       layout('Layout/lay');
       $Goods = D('Zhens');
       $id = I('get.id');
       //var_dump($id);
       $list = $Goods->find($id);
       $this->assign('goods',$list);


       $this->display('views');


    }

    //商品图片上传
    public function upload(){

      $id= I('get.id');
      $upload = new \Think\Upload();
      $upload->maxSize = 850000;
      $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
      $upload->rootPath = './Uploads/'; 
    
     // $upload->savePath  ='./Uploads/'; 
       $info   =   $upload->upload();
      if(!$info) {
      
       echo '图片上传失败';
      }else{

          
          //zimages
        $filename['filename']= $info['Filedata']['savepath'].$info['Filedata']['savename'];
        $filename['zhes_id'] = $id;
      // my_image_resize('Uploads/'.$filename['filename'],'Uploads/'.$info['Filedata']['savepath'].'99_'.$info['Filedata']['savename'],99,100);
     
    
       $im=imagecreatefromjpeg('Uploads/'.$filename['filename']);
       $maxwidth = 350;
       $maxheight =230;
       $filetype= '';
       $name = 'Uploads/'.$info['Filedata']['savepath'].'wai'.$info['Filedata']['savename'];

     resizeImage($im,$maxwidth,$maxheight,$name,$filetype); 
       $maxwidth = 544;
       $maxheight =444;
       $filetype= '';
       $name = 'Uploads/'.$info['Filedata']['savepath'].'nei'.$info['Filedata']['savename'];
      resizeImage($im,$maxwidth,$maxheight,$name,$filetype); 

      
      /*
      $picname =  $name = 'Uploads/'.$info['Filedata']['savepath'].$info['Filedata']['savename'];
      getiimage($picname,$maxx=350,$maxy=300,$pre="X_");
      */

        $Image = D('Zimages');

        $ids = $Image->add($filename);
        if($ids){
          echo '图片上传成功';

        }else{
          echo '上传失败请检查图片';

        }
       
      }
      
    }


        //修改证书
    public function edit(){
      layout('Layout/lay');
       $Goods = D('Zhens');
       $id = I('get.id');
       //var_dump($id);
       $list = $Goods->find($id);

       $this->assign('goods',$list);

      if($_POST){

      $date['name'] = I('post.name');
       $date['id'] = I('post.id');
      $date['bianhao']= I('post.bianhao');
      $date['cailiao'] = I('post.cailiao');
     
      $date['chicun'] = I('post.chicun');
      $date['weight'] = I('post.weight');
     
      $date['modified'] =time();
      $date['time'] =I('post.time');

      $ids = $Goods->save($date);
      if($ids){

      $this->success('修改成功');

      }else{

         $this->error('修改失败');
      }



      }




       $this->display('edit');



    }



  
    //删除商品

    public function delete(){
      $id = I('get.id');
     $model = D('Images');
     $list = $model->field('filename')->where(array('goods_id'=>$id))->select();
     foreach($list as $arr){
        //$kk = substr($arr['filename'],11,27);
        unlink('Uploads/'.$arr['filename']);
     }
  
     $ids = $model->where(array('goods_id'=>$id))->delete();
     $modell = D('Goocate');

     $iid = $modell->where(array('goods_id'=>$id))->delete();

     $modelll = D('Goods');
     $iiids = $modelll->where(array('id'=>$id))->delete();

     if($iiids){
        $this->success('删除成功');

     }else{
      $this->error('删除失败');

     }
   
      

    }

   
   
}