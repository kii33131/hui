<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    

    public function index(){
       layout('Layout/loay');
       if($_SESSION['Home']['name']==null){

          //$this->error('你还没有登录呢');

         $this->redirect('Login/index');
       }
       $uid = $_SESSION['Home']['id'];


       $model = D('Didan');
       $count = $model->where(array('uid'=>$uid))->count();
       $Page = new \Think\Page($count,8);
       $Page ->setConfig('header','个订单');
       $Page ->setConfig('prev','上一页');
       $Page ->setConfig('next','下一页');
       $Page ->setConfig('end','最后一页');
       $Page ->setConfig('theme',"<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%"); 
       $show = $Page->show();
       $list = $model->where(array('uid'=>$uid))->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
      // $list = $model->where(array('uid'=>$uid))->select();

       $this->assign('list',$list);
       $this->assign('page',$show);

       //var_dump($list);

       

       $this->display('index');

    }


    public function edit(){
       layout('Layout/loay');
       $model = D('Dizi');
       $list  = $model->where(array('uid'=>$_SESSION['Home']['id']))->select();
        $this->assign('list',$list[0]);

        //var_dump($list);exit;

        if(IS_POST){

           $model = D('Dizi');
           $list  = $model->where(array('uid'=>$_SESSION['Home']['id']))->select();

          $date['omit']=I('post.omit');
          $date['city']=I('post.city');
          $date['sanjak']=I('post.sanjak');
          $date['phone']=I('post.phone');
          $date['tel']=I('post.tel');
          $date['landmark']=I('post.landmark');
          $date['email']=I('post.email');
          $date['bianma']=I('post.bianma');
          $date['ztime']=I('post.ztime');
          $date['created']=time();
          $date['modified']=time();
          $date['dizhi']=I('post.dizhi');
          $date['name']=I('post.name');
          $date['uid'] = $_SESSION['Home']['id'];


           if($list==null){
            $model=D('Dizi');
           // $ids = $model->add($date);
            if($model->create()){

               $ids=$model->add($date);
               if($ids){

                $this->success('编辑信息成功');
               }else{

                $this->error('编辑信息失败');
               }
            }else{

               $this->error($model->getError());
            }


           }else{


          $date['omit']=I('post.omit');
          $date['city']=I('post.city');
          $date['sanjak']=I('post.sanjak');
          $date['phone']=I('post.phone');
          $date['tel']=I('post.tel');
          $date['landmark']=I('post.landmark');
          $date['email']=I('post.email');
          $date['bianma']=I('post.bianma');
          $date['ztime']=I('post.ztime');
          $date['created']=time();
          $date['modified']=time();
          $date['dizhi']=I('post.dizhi');
          $date['name']=I('post.name');

           $model=D('Dizi');
           $ids = $model->where(array('uid'=>$_SESSION['Home']['id']))->save($date);
           if($ids){

              $this->success('编辑信息成功');
           }else{
              $this->error('编辑信息失败');

           }

           

           }

         // if($list==null)

          /*
          $date['name'] = I('post.name');
          $date['email'] = I('post.email');
          $date['phone'] = I('post.phone');
          $date['dizhi'] = I('post.dizhi');
          $id = I('post.id');
          $date['modified'] = time();

          $model = D('Dizi');

          $iid = $model->where(array('id'=>$id))->save($date);
          if($iid){

            $this->error('修改成功');
          }else{

            $this->error('修改失败');
          }

          */

        }



       $this->display('edit');
    }


    /*

       

    */



     public function vip(){
       layout('Layout/loay');
              if(IS_POST){

        $password = md5(I('post.password'));
        $date['password']= md5(I('post.newpassword')); 
        $model = D(Vip);

        $list = $model->find( $_SESSION['Home']['id']);

        if($list['password']!=$password){

          $this->error('原始密码错误');
        }else{
          $ips = $model->where(array('id'=>$_SESSION['Home']['id']))->save($date);

          if($ips){
              unset($_SESSION['Home']['id']);
              unset($_SESSION['Home']['name']);  
              $this->redirect('Login/index');
          }else{

            $this->error('密码修改失败');
          }


        }


       }
       $this->display('vip');

      // $this->display('vip');

    }

    /*用户删除订单*/
    public function delete(){
      $didan_id = I('get.id');
      $model =D('Qd');
      $ids = $model->where(array('didan_id'=>$didan_id))->delete();

      if($ids){
        $model = D('Didan');
        $idf = $model->delete($didan_id);
        if($idf){

          $this->success('删除订单成功');
        }else{

           $this->error('删除订单失败');
        }

      }



    }
    /*会员修改密码*/
    //用户申请退款
    public function tui(){
      $id = I('get.id');
      $model = D('Didan');
      $date['spay']=3;

      $ids = $model->where(array('id'=>$id))->save($date);
      if($ids){

        $this->success('申请退款成功等待管理员联系');
      }else{

        $this->success('申请退款失败');
      }

    } 


   //帮助流程

   public function zhuceil(){
       layout('Layout/loay');

         $model = D('Help');
      $list  = $model->where(array('status'=>12))->select();
     // var_dump($list);
      $this->assign('list',$list[0]['content']);


       $this->display('zhucei');

   } 

    //购物流程
     public function shopl(){
       layout('Layout/loay');

         $model = D('Help');
      $list  = $model->where(array('status'=>11))->select();
     // var_dump($list);
      $this->assign('list',$list[0]['content']);


       $this->display('shopl');

   } 


   //zhifuf

   public function zhifuf(){
       layout('Layout/loay');
         $model = D('Help');
      $list  = $model->where(array('status'=>10))->select();
     // var_dump($list);
      $this->assign('list',$list[0]['content']);


       $this->display('zhifufangshi');

   } 


   //wangszhuan
     public function wangszhuan(){
       layout('Layout/loay');
         $model = D('Help');
      $list  = $model->where(array('status'=>9))->select();
     // var_dump($list);
      $this->assign('list',$list[0]['content']);


       $this->display('ll');

   } 


    public function prrrr(){
       layout('Layout/loay');
         $model = D('Help');
      $list  = $model->where(array('status'=>8))->select();
     // var_dump($list);
      $this->assign('list',$list[0]['content']);


       $this->display('peisong');

   } 

   //退货

    public function tuihuol(){
       layout('Layout/loay');

         $model = D('Help');
      $list  = $model->where(array('status'=>7))->select();
     // var_dump($list);
      $this->assign('list',$list[0]['content']);


       $this->display('tuihuo');

   } 

   //售后保障


   public function shouhou(){
       layout('Layout/loay');

           $model = D('Help');
      $list  = $model->where(array('status'=>6))->select();
     // var_dump($list);
      $this->assign('list',$list[0]['content']);

       $this->display('shouhoub');



   } 


      public function bais(){
       layout('Layout/loay');
         $model = D('Help');
      $list  = $model->where(array('status'=>5))->select();
     // var_dump($list);
      $this->assign('list',$list[0]['content']);

       $this->display('mianfei');

   } 


     public function pinz(){
       layout('Layout/loay');

         $model = D('Help');
      $list  = $model->where(array('status'=>4))->select();
     // var_dump($list);
      $this->assign('list',$list[0]['content']);

       $this->display('pinz');

   } 


   //jieshao

     public function jieshao(){
       layout('Layout/loay');

        $model = D('Help');
      $list  = $model->where(array('status'=>2))->select();
     // var_dump($list);
      $this->assign('list',$list[0]['content']);

       $this->display('jieshao');

   } 

   //licheng

    public function licheng(){
      layout('Layout/loay');

      $model = D('Help');
      $list  = $model->where(array('status'=>1))->select();
     // var_dump($list);
      $this->assign('list',$list[0]['content']);

       $this->display('licheng');

   } 

   //zhanting

     public function zhanting(){
       layout('Layout/loay');

        $model = D('Help');
      $list  = $model->where(array('status'=>13))->select();
     // var_dump($list);
      $this->assign('list',$list[0]['content']);

       $this->display('zhanting');

   } 


   //法律顾问

   public function falv(){
     layout('Layout/loay');

       $model = D('Help');
      $list  = $model->where(array('status'=>3))->select();
     // var_dump($list);
      $this->assign('list',$list[0]['content']);

    $this->display('falv');
    // echo 'dsds';
    
   }


      /*用户通知已经收到货啦修改到交易完成*/

    public function ajaxedit(){


      $didan_id = I('post.id');
      //echo $didan_id;exit;

      $model = D('Didan');
      $date['status']=2;
      $date['modified'] = time();
      $ids =$model->where(array('id'=>$didan_id))->save($date);
     

      

      if($ids){

          $prefix = C('DB_PREFIX');
          $m = M();
          $m->startTrans();
          $Qd = D('Qd');
       
          //$didan_id = I('post.id');
          $qindan  =  $Qd->where(array('didan_id'=>$didan_id))->select();

          foreach($qindan as $qida ){

            $ra = $m->execute("UPDATE {$prefix}goods SET stock=stock-{$qida['num']},sale=sale+{$qida['num']} WHERE id={$qida['goods_id']}");
          }

          //echo $Qd->getlastsql();

          //执行
          if($ra){
            $m->commit();
            //$this->success('修改成功');
            echo '已经通知到商家谢谢购买';
          }else{
            $m->rollback();
           echo '通知失败请电话联系商家';
          }



      } 

    }









}