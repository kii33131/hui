<?php
namespace Home\Controller;
use Think\Controller;
class ShopController extends Controller {
    public function index(){
       layout('Layout/loay');
       $id = I('get.id');
     
       $model = D('Goods');
       $list = $model->find($id);
     
       $list['num'] = 1;

       $ids = I('get.ids');
       $num = I('get.num');

       //购物车加减数量
       if($ids){
            
        $_SESSION['shoplist'][$ids]['num']+=$num;
        
        if($_SESSION['shoplist'][$ids]['num']<1){

            $_SESSION['shoplist'][$ids]['num']=1;    

        } 

       //这里要判断购买的物品不能超过库存
     
        $Goodss = D('Goods');
        $fuck = $Goodss->find($ids);
        if($_SESSION['shoplist'][$ids]['num']>$fuck['stock']){
           $_SESSION['shoplist'][$ids]['num']=$fuck['stock'];

        }  

  
       $num=0;
       $num1=0;
       if(!empty($_SESSION['shoplist'])){
        foreach($_SESSION['shoplist'] as $arr){
            $num +=$arr['num']*$arr['money'];
            $num1 +=$arr['num']*$arr['smoney'];
        }
        $cha =$num1-$num;
       }

      $this->assign('num',$num);
      $this->assign('num1',$num1);
      $this->assign('cha',$cha);
      $this->assign('cookies',$_SESSION['shoplist']);
      $this->display('shop');

       }else{

         if(isset($_SESSION['shoplist'][$list['id']])){
            $_SESSION['shoplist'][$list['id']]['num']++;



       }else{

        $_SESSION['shoplist'][$list['id']]=$list;

       }

       //echo '<pre>';
      // print_r($_SESSION['shoplist']);
        $num=0;
       $num1=0;
       if(!empty($_SESSION['shoplist'])){
        foreach($_SESSION['shoplist'] as $arr){
            $num +=$arr['num']*$arr['money'];
            $num1 +=$arr['num']*$arr['smoney'];
        }
        $cha =$num1-$num;
       }



       $this->assign('num',$num);
      $this->assign('num1',$num1);
      $this->assign('cha',$cha);
      $this->assign('cookies',$_SESSION['shoplist']);
        $this->display('shop');

       }

        //$this->display('shop');

       
    }


    //去购物车
    public function gowu(){
        layout('Layout/loay');

     if($_SESSION['shoplist']==null){

        //$this->error('你还没有选商品啊','/index.php/Home/index/index');
       $this->redirect('Index/index');
     }   
     if($_SESSION['shoplist']){

        $num=0;
       $num1=0;
       if(!empty($_SESSION['shoplist'])){
        foreach($_SESSION['shoplist'] as $arr){
            $num +=$arr['num']*$arr['money'];
            $num1 +=$arr['num']*$arr['smoney'];
        }
        $cha =$num1-$num;
       }



      $this->assign('num',$num);
      $this->assign('num1',$num1);
      $this->assign('cha',$cha);
      $this->assign('cookies',$_SESSION['shoplist']);
        

        }
         $this->display('shop');

    }

    //删除购物车

    public function shanchu(){
        $id = I('get.id');
     
      

       unset($_SESSION['shoplist'][$id]);
        //unset($_SESSION['name'])
     
        
        $this->success('删除成功','/index.php/Home/Shop/gowu');

    }

   //去结算

    public function jiesuan(){
  
        if($_SESSION['Home']['id']==null){

            $this->error('您还没有登录哦','/index.php/Home/Login/index');

        }

        if($_SESSION['shoplist']==null){

            $this->error('你的购物车是空的','/index.php/Home/Index/xgoods');
        }else{
            //填写收货信息
            
                $model =D('Dizi');
                $list = $model->where(array('uid'=>$_SESSION['Home']['id']))->select();
                if($list){
                    layout('Layout/new2layout'); 

                    if($_SESSION['shoplist']){

                    $num=0;
                   $num1=0;
                   if(!empty($_SESSION['shoplist'])){
                    foreach($_SESSION['shoplist'] as $arr){
                        $num +=$arr['num']*$arr['money'];
                        $num1 +=$arr['num']*$arr['smoney'];
                    }

                    $cha =$num1-$num;

                   }



                  $this->assign('num',$num);
                  $this->assign('num1',$num1);
                  $this->assign('cha',$cha);
                  $this->assign('cookies',$_SESSION['shoplist']);
                    

                    }


                    $this->assign('list',$list);
                    

                    $this->display('cat');

                }else{


                    layout('Layout/new2layout'); 

                    if(IS_POST){

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
                        $model=D('Dizi');

                        if($model->create()){

                            $ids=$model->add($date);
                            if($ids){
                                //重点

                layout('Layout/new2layout'); 

                if($_SESSION['shoplist']){

                    $num=0;
                   $num1=0;
                   if(!empty($_SESSION['shoplist'])){
                    foreach($_SESSION['shoplist'] as $arr){
                        $num +=$arr['num']*$arr['money'];
                        $num1 +=$arr['num']*$arr['smoney'];
                    }

                    $cha =$num1-$num;

                   }



                  $this->assign('num',$num);
                  $this->assign('num1',$num1);
                  $this->assign('cha',$cha);
                  $this->assign('cookies',$_SESSION['shoplist']);

                    }


                    $this->assign('list',$list);

                    $this->display('cat');

                    exit;


                            }else{
                            $this->error('添加失败请继续');

                            }       

                        }else{

                        $this->error($model->getError());

                        }

                    }

                $this->display('dizi');

            }

          
        }

    }


    //生成订单

    public function dindan(){

        $data['danhao']=getbianmi();//
       // var_dump($date['danhao']);exit;
        //$data['pay'] = I('post.pay');
        $data['fuyan'] = I('post.fuyan');
        $data['uid'] = $_SESSION['Home']['id'];
        $data['created'] = time();
        $data['modified'] = time();
        $model = D('Didan');
        $date['created'] = time();
        $date['modified'] = time();
        $didan = $model->add($data);
        $qindan =D('Qd');
        if($didan){
           foreach($_SESSION['shoplist'] as $arr){
            $date['didan_id']=$didan;
            $date['goods_id']= $arr['id'];
            $date['name'] =$arr['name'];
            $date['money'] =$arr['money'];
            $date['smoney'] =$arr['smoney'];
            $date['num'] =$arr['num'];
            $qindan->add($date);

           }

           unset($_SESSION['shoplist']);
            $this->redirect('Shop/pay', array('cate_id'=>$didan));     
            
        }else{

            //wocao
        }


 

    }


    public function pay(){
        layout('Layout/new2layout');

        $dindan_id = I('get.cate_id'); 
        $model = D('Didan');
        $list  = $model->find($dindan_id);

     
        $Qd = D('Qd');

        $lost = $Qd->where(array('didan_id'=>$dindan_id))->select();
       // echo '<pre>';
       //print_r($lost);exit;
        $num =0;
        foreach($lost as $pp){

            $num+=$pp['num']*$pp['money'];

        }

        //var_dump($num);

        //var_dump($list);
        $this->assign('list',$list);
         $this->assign('num',$num);
        $this->display('xia');


    }



    //
    public function editpay(){
        $id = I('post.id');
        $Didan = D('Didan');

        $date['pay']=I('post.pay');
        echo $date['pay'];
        $date['modified']=time();

        $ida=$Didan->where(array('id'=>$id))->save($date);
        if($ida){

            echo '1';
        }else{

            echo '2';
        }


    }


   
}