<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends AdminController {


     //搜索商品页面
    public function getgoods(){
      layout('Layout/lay');
      //$model= D('Goods');
      $name = I('get.name');

      $map['name'] = array('like',"%$name%");
      $model = D('Goods');
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
       $model= D('Goods');

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

    //添加商品

    public function add(){
    	 layout('Layout/lay');
       $model = D('Category');
       $list = $model->where(array('pid'=>0))->select();
       //var_dump($list);
       $this->assign('list',$list);

       if(IS_POST){
        //选中的标签集合
        $modell = D('Goods');
        $ids = $_POST['goods_id'];

        //var_dump($ids);exit;

        $date['name'] = I('post.name');
        $date['money'] =I('post.money');
        $date['smoney'] =I('post.smoney');
        $date['created'] =time();
        $date['modified'] = time();
        $date['teijia']  =I('post.teijia');
        $date['comment'] = $_POST['content'];
        $date['place'] = I('post.place');
        $date['stock'] = I('post.stock');
        $date['splace'] = I('post.splace');
        $date['hei']  =I('post.hei');
        if(I('post.bianhao')){ 

        $date['bianhao'] =I('post.bianhao');

        }else{
          $date['bianhao']='无';

        }
        //这里是个随机的函数随机商品编号
        //var_dump($date['bianhao']);exit;
        $date['weight'] = I('post.weight');

        $date['pise'] = I('post.pise');
        $date['ticai'] = I('post.ticai');
        $date['color'] = I('post.color');
        $date['bigger'] = I('post.bigger');

        if($modell->create()){
            $idd = $modell->add($date);
           
        }else{

          $this->error($modell->getError());

        }
        $data['goods_id']=$idd;
        $ids=array_flip($ids);
        if($idd){
          foreach($ids as $key=>$val){
            $data['category_id'] = $key;
           $ll= D('goocate')->add($data);

          } 

          if($ll){

            $this->success('添加商品成功');
          }

         }

       }
     
       $this->assign('array',$arr);

        $this->display('addgoods');
    }

    //修改商品
    public function edit(){
      layout('Layout/lay');

       $model = D('Category');
       $list = $model->where(array('pid'=>0))->select();
       //var_dump($list);
       $this->assign('list',$list);
       $Goods = D('Goods');
       $id = I('get.id');
       //var_dump($id);
       $list = $Goods->find($id);
       $this->assign('goods',$list);
       if(IS_POST){
        $date['modified']=time();
        $date['money'] = I('post.money');
        $date['stock'] = I('post.stock');
        $date['name'] = I('post.name');
        $date['status'] = I('post.status');
        $id = I('post.id');
        if($Goods->create()){

          $kk=$Goods->where(array('id'=>$id))->save($date);


        }else{

           $this->error($Goods->getError());

        }
        
        if($kk){
          $this->success('修改成功');

        }

       } 


       $this->display('edit');

    }

    //查看商品信息

    public function view(){
       layout('Layout/lay');
       $Goods = D('Goods');
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
        imagezoom('Uploads/'.$filename['filename'], 'Uploads/'.$info['Filedata']['savepath'].'haha'.$info['Filedata']['savename'], 800, 600, '#FFFFFF');
        imagezoom('Uploads/'.$filename['filename'], 'Uploads/'.$info['Filedata']['savepath'].'tuijian'.$info['Filedata']['savename'], 452, 452, '#FFFFFF');

      /*
       $im=imagecreatefromjpeg('Uploads/'.$filename['filename']);
       $maxwidth = 350;
       $maxheight =230;
       $filetype= '';
       $name = 'Uploads/'.$info['Filedata']['savepath'].'wai'.$info['Filedata']['savename'];

     resizeImage($im,$maxwidth,$maxheight,$name,$filetype); */

     /*
       $maxwidth = 544;
       $maxheight =444;
       $filetype= '';
       $name = 'Uploads/'.$info['Filedata']['savepath'].'nei'.$info['Filedata']['savename'];
      resizeImage($im,$maxwidth,$maxheight,$name,$filetype);  */

      
   

        $Image = D('Images');

        $ids = $Image->add($filename);
        if($ids){
          echo '图片上传成功';

        }else{
          echo '上传失败请检查图片';

        }
       
      }
      
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