<?php

class IndexAction extends Action {


    /*meiboqiye*/
    public function index(){


    	 layout('Layout/loay');

       $model  =D("Hangyenew");

       $list = $model->order('created DESC')->where(array('status'=>1))->limit(6)->select();

       $this->assign('list',$list);


       $model = D("Lmages");

       $lost = $model->limit(6)->select();
       $this->assign('lost',$lost);


       $model = D('Block');

       $list = $model->select();

       foreach($list as $val){


       }

       $this->assign('content',$val['content']);


        $model = D('Free');

        $title =  $model->select();

        foreach($title as $val){


       }

       $this->assign('title',$val['title']);

      


       //var_dump($val['content']);

      $this->display('index');
    }


    public function aboutus(){
       layout('Layout/loay');

         $model = D('Block');

       $list = $model->select();

       foreach($list as $val){


       }

       $this->assign('content',$val['content']);
      // var_dump($val['content']);

      $this->display('about_us');
    }


    public function tieem(){
       layout('Layout/loay');
       $model =D('New');
       $list = $model->select();

       $this->assign('list',$list);

        foreach($list as $val){


       }


       $model =D('Shouji');

       $shouji = $model->order('created DESC')->where(array('status'=>1))->limit(5)->select();


        $this->assign('shouji', $shouji);


       $this->assign('content',$val['content']);


      $this->display('tieem');
    }


     public function touzi(){
       layout('Layout/loay');


        $model = D("Baodao");

        $list = $model->select();

       foreach($list as $val){


       }

       $this->assign('content',$val['content']);

           $model = D("Lmages");

       $lost = $model->select();
       $this->assign('lost',$lost);





      $this->display('touzi');
    }




     public function news(){
       layout('Layout/loay');
       $model  =D("Hangyenew");


      import('ORG.Util.Page');// 导入分页类
      $count      = $model->count();// 查询满足要求的总记录数
      $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
      $show       = $Page->show();// 分页显示输出
    
      $lost = $model->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
      $this->assign('list',$lost);// 赋值数据集
      $this->assign('page',$show);// 赋值分页输出





      $this->display('news');
    }



     public function hezuo(){
       layout('Layout/loay');



      $this->display('hezuo');
    }

     public function lianxi(){
       layout('Layout/loay');

       $model = D('Gongyis');

       $list = $model->select();

        $list = $model->select();

       foreach($list as $val){


       }

       $this->assign('content',$val['content']);





      $this->display('lianxi');
    }


     public function newsss(){
       layout('Layout/loay');

       $id = I('get.id');

      $model  =D("Hangyenew");

      $list = $model->find($id);
      $this->assign('list',$list);



      $this->display('newsss');
    }


    /*资本认1*/
      public function news1s(){
       layout('Layout/loay');

      $id = I('get.id');
      $model = D('Shouji');

      $list = $model->find($id);

      $this->assign('list',$list);



      $this->display('news1s');
    }


      public function news2s(){
       layout('Layout/loay');

      


      $this->display('news2s');
    }



      public function tieems(){
       layout('Layout/loay');
       $id = I('get.id');
       $list = D('New')->find($id);
       $this->assign('list',$list);
      


      $this->display('tieems');
    }


     public function news4s(){
       layout('Layout/loay');

      


      $this->display('news4s');
    }


     public function news5s(){
       layout('Layout/loay');

      


      $this->display('news5s');
    }



    public function ajaxgethahah(){


      $id = I('post.id');



      $model= D('New');

      $list = $model->find($id);

      echo $list['content'];
    }

  }