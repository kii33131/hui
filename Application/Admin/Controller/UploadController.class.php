<?php
namespace Admin\Controller;
use Think\Controller;
class UploadController extends Controller {


	    //商品图片上传
    public function upload(){

      $id= I('get.id');
      $upload = new \Think\Upload();
      $upload->maxSize = 8850000;
      $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
      $upload->rootPath = './Uploads/'; 
    
     // $upload->savePath  ='./Uploads/'; 
       $info   =   $upload->upload();
      if(!$info) {
      
       echo '图片上传失败';
      }else{

          

        $filename['filename']= $info['Filedata']['savepath'].$info['Filedata']['savename'];
        $filename['goods_id'] = $id;

        imagezoom('Uploads/'.$filename['filename'], 'Uploads/'.$info['Filedata']['savepath'].'wai'.$info['Filedata']['savename'], 230, 230, '#FFFFFF');

        imagezoom('Uploads/'.$filename['filename'], 'Uploads/'.$info['Filedata']['savepath'].'nei'.$info['Filedata']['savename'], 441, 441, '#FFFFFF');
        imagezoom('Uploads/'.$filename['filename'], 'Uploads/'.$info['Filedata']['savepath'].'cao'.$info['Filedata']['savename'], 338, 338, '#FFFFFF');
        imagezoom('Uploads/'.$filename['filename'], 'Uploads/'.$info['Filedata']['savepath'].'haha'.$info['Filedata']['savename'], 690, 690, '#FFFFFF');
        imagezoom('Uploads/'.$filename['filename'], 'Uploads/'.$info['Filedata']['savepath'].'tuijian'.$info['Filedata']['savename'], 452, 452, '#FFFFFF');


        $Image = D('Images');

        $ids = $Image->add($filename);
        if($ids){
          echo 'Uploads/'.$info['Filedata']['savepath'].'wai'.$info['Filedata']['savename'];

        }else{
          echo '0';

        }
       
      }
      
    }
  



        //商品图片上传
    public function uploads(){

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


}