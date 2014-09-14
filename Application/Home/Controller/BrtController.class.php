<?php
namespace Home\Controller;
use Think\Controller;
class BrtController extends Controller {
    public function index(){
       layout('Layout/newlayout');
      

      $this->display('index');

    }


     public function zxns(){
       layout('Layout/newlayout');
      

      $this->display('zxns');

    }


      public function ddss(){
       layout('Layout/newlayout');
      

      $this->display('yjry');

    }


    public function news(){

      layout('Layout/newlayout');

        $zhuan  =  I('get.zhuan');
        if($zhuan==1){

          $names = '企业新闻';
        }  

        if($zhuan==2){
          $names = '藏品推荐';

        }

        if($zhuan==null){
          $names = '最新资讯';

        }

        if($zhuan==3){
          $names = '媒体关注';

        }



        $Goods = D('Goods');
        $count = $Goods->count();
        $Page = new \Think\Page($count,1);
        $show = $Page->show();
        $kk = $Goods->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('kk',$kk);

        $model = D('New');
        $count = $model->count();
        $Page = new \Think\Page($count,4);
        $show = $Page->show();
        $list = $model->where(array('status'=>0))->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
       
        $modehl = D('Gongyi');
        $count = $modehl->count();
        $Page = new \Think\Page($count,4);
        $show = $Page->show();
        $lisit = $modehl->where(array('status'=>0))->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('lisit',$lisit);
       
        $this->assign('names',$names);  
        $this->assign('list',$list);
        $this->assign('page',$show);
        

        $this->display('news');

    }

    public function spxs(){
      layout('Layout/newlayout');

      $wo = I('get.wo');
      if($wo==1){

        $val = 'vcastr_file=images/123456.flv&LogoText=www.boruntang.com&BufferTime=3&IsAutoPlay=1';

        $flash = 'vcastr_file=images/123456.flv&LogoText=www.boruntang.com&IsAutoPlay=1';
      }


      if($wo==2){
        $val = 'vcastr_file=images/123654.flv&LogoText=www.boruntang.com&BufferTime=3&IsAutoPlay=1';

        $flash = 'vcastr_file=images/123654.flv&LogoText=www.boruntang.com&IsAutoPlay=1';

      }


      $this->assign('val',$val);
      $this->assign('flash',$flash);

      $this->display('spxs');
    }

    //广告详情


    public function xianxi(){
      layout('Layout/newlayout');

      $id = I('get.id');
      if($id){
        $model = D('New');
         $list = $model->find($id);
        $this->assign('list',$list);



      }else{
        $model = D('New');
        $kk  = $model->select();

        foreach($kk as $val){


        }

        $this->assign('vall',$val);

      }



           //$id =I('get.id');
          //  $model = D('New');


            $count = $model->count();
            $Page = new \Think\Page($count,4);
            $Page ->setConfig('header','关注');
            $Page ->setConfig('prev','上一页');
            $Page ->setConfig('next','下一页');
            $Page ->setConfig('end','最后一页');
            $Page ->setConfig("<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%"); 
            $show = $Page->show();
            $lost = $model->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
       
        $this->assign('lost',$lost);
        $this->assign('page',$show);
        //$this->assign('$');


     
     // $this->assign('list',$list);
      $this->display('news_Detail');
      //var_dump($list);


    }


    //企业简介

    public function qyjj(){
       layout('Layout/newlayout');

       $this->display('qyjj');


    }


    //业绩荣誉

     public function yjry(){
       layout('Layout/newlayout');

       $this->display('fyjry');


    }

    //精品赏析

    //pro1
    public function qpsx(){
       layout('Layout/newlayout');

  

              
              /*
              $Goods = D('Goods');
              $gooodsid = $Goods->field('id')->where(array('hei'=>1))->select();

                 $arraygoodids = array();
                foreach($gooodsid as $val){

                  $arraygoodids[]=$val['id'];
                }
                  $gchid = implode(',', $arraygoodids);
                $mop['goods_id'] = array('in',$gchid);



              $list  =  $model->where($mop)->select();
       
      
          $Category = D('Category');
          $category_id = $Category->field('id')->where(array('title'=>'和田玉'))->select();
      
          if($category_id[0]['id']){

            $category_ids = $Category->field('id')->where(array('pid'=>$category_id[0]['id']))->select();
         
            $arraycateids = array();
            foreach($category_ids as $val){

              $arraycateids[]=$val['id'];
            }

              $gchid = implode(',', $arraycateids);

              $mop['category_id'] = array('in',$gchid);

              $Goocate = D('Goocate');


              $goodsids = $Goocate->field('goods_id')->where($mop)->select();




            $goodss_ids = array();
            foreach($goodsids as $val){

              $Goods = D('Goods');
              $kk = $Goods->find($val['goods_id']);
              if($kk['hei']==1){

                $goodss_ids[]=$val['goods_id'];
              }


            }

             $gchiid = implode(',', $goodss_ids);

            // var_dump($gchiid);exit;

             $mip['goods_id'] = array('in',$gchiid);

             $Images = D('Images');
             $lost =  $Images->field('filename')->where($mip)->select();
             //echo $Images->getlastsql();


             //var_dump($imagess);



          }




          $Category = D('Category');
          $category_id = $Category->field('id')->where(array('title'=>'南红'))->select();

          //var_dump($category_id);
      
          if($category_id[0]['id']){

            $category_ids = $Category->field('id')->where(array('pid'=>$category_id[0]['id']))->select();
         
            $arraycateids = array();
            foreach($category_ids as $val){

              $arraycateids[]=$val['id'];
            }

              $gchid = implode(',', $arraycateids);
              //var_dump($gchid);
              

              $mzp['category_id'] = array('in',$gchid);

              $Goocate = D('Goocate');


              $goodsids = $Goocate->field('goods_id')->where($mzp)->select();


             // var_dump($goodsids);



            $goodss_ids = array();
            foreach($goodsids as $val){

              $Goods = D('Goods');
              $kk = $Goods->find($val['goods_id']);
              if($kk['hei']==1){

                $goodss_ids[]=$val['goods_id'];
              }


            }

             $gchiid = implode(',', $goodss_ids);

            // var_dump($gchiid);exit;

             $mlp['goods_id'] = array('in',$gchiid);

             $Images = D('Images');
             $hai =  $Images->field('filename')->where($mlp)->select();

             
             //echo $Images->getlastsql();


             //var_dump($imagess);



          }  */

       $model = D('Jimages');  
       $list = $model->select();

        $lost = $model->where(array('status'=>1))->select();
        $hai = $model->where(array('status'=>2))->select();


        //var_dump($lost);

       //$this->assign()

       $this->assign('hai',$hai);
      
       $this->assign('lost',$lost);

       //var_dump($hai);
       $this->assign('list',$list);
       $this->display('pro1');


    }

    /*公益事业*/

    public function gggs(){

       layout('Layout/newlayout');

            //$id =I('get.id');

          
           

            $id = I('get.id');
      if($id){
        $model = D('Gongyi');
          $list = $model->find($id);
           $this->assign('list',$list);


      }else{
        $model = D('Gongyi');
        $kk  = $model->select();

        foreach($kk as $val){


        }

        $this->assign('vall',$val);

      }



       
       
            $count = $model->count();
            $Page = new \Think\Page($count,4);
            $Page ->setConfig('header','关注');
            $Page ->setConfig('prev','上一页');
            $Page ->setConfig('next','下一页');
            $Page ->setConfig('end','最后一页');
            $Page ->setConfig("<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%"); 
            $show = $Page->show();
            $lost = $model->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('lost',$lost);
        $this->assign('page',$show);
        //$this->assign('$');


      $list = $model->find($id);
      $this->assign('list',$list);
     // $this->display('news_Detail');
       

      $this->display('gggs');
    }



    /*媒体关注*/

    public function mass(){
      layout('Layout/newlayout');


      $id = I('get.id');
      if($id){
        $model = D('Mass');
        $lyst  = $model->find($id);
        $this->assign('vall',$lyst);



      }else{
        $model = D('Mass');
        $kk  = $model->select();

        foreach($kk as $val){


        }

        $this->assign('vall',$val);

      }

      $model = D('Mass');
      $count = $model->count();
      $Page = new \Think\Page($count,6);
      $Page ->setConfig('header','关注');
      $Page ->setConfig('prev','上一页');
      $Page ->setConfig('next','下一页');
      $Page ->setConfig('end','最后一页');
      $Page ->setConfig("<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%"); 
      $show = $Page->show();
      $lost = $model->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
      $this->assign('page',$show);

      $this->assign('list',$lost);
      
      $this->display('mass');

    }


    public function jiangxiang(){

      layout(false); // 临时关闭当前模板的布局功能

      $this->display('123');
    }

}