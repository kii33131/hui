<?php
namespace Admin\Controller;
use Think\Controller;
class DidanController extends AdminController {


       //搜索商品页面
    public function dindans(){
      layout('Layout/lay');
      $danhao = I('get.danhao');
      $map['danhao'] = array('like',"%$danhao%");
      $model = D('Didan');
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
       $model= D('Didan');
       $count = $model->count();
       $Page = new \Think\Page($count,20);
       $Page ->setConfig('header','个订单');
        $Page ->setConfig('prev','上一页');
        $Page ->setConfig('next','下一页');
        $Page ->setConfig('end','最后一页');
        $Page ->setConfig('theme',"<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%");
       $show = $Page->show();
       $list = $model->order('created desc')->limit($Page->firstRow.','.$Page->listRows)->select();

       //echo $model->getlastsql();exit;

       
       //var_dump($list);
       $this->assign('list',$list);
       $this->assign('page',$show);

        $this->display('index');
    }

    //查看订单详情


    public function view(){
      layout('Layout/lay');
      $model = D('Didan');

      $id=I('get.id');
    
      $list = $model->find($id);

      $Dizi = D('Dizi');

      $lost = $Dizi->where(array('uid'=>$list['uid']))->select();
      $this->assign('lost',$lost);

      $qidan = D('Qd');
      $ltst =$qidan->where(array('didan_id'=>$id))->select();
      $num =0;
      foreach($ltst as $mb){
        $num += $mb['num']*$mb['money'];


      } 

      $this->assign('num',$num);


      $this->assign('ltst',$ltst);
     
      $this->assign('list',$list);

      $this->display('views');


    }



    

    //修改订单状态

    public function edit(){
      layout('Layout/lay');
      $id = I('get.id');
      $model = D('Didan');

      $list  = $model->find($id);
      $this->assign('list',$list);
      if(IS_POST){
        $date['modified']=time();
        $date['status'] = I('post.status');
        $id = I('post.id');
        $date['spay'] = I('post.spay');
     // var_dump($date['spay']);exit;

        if($date['spay']==''){
            $date['spay']=1;
        }
        $date['compay']  = I('post.compay');
        $date['kdan'] = I('post.kdan');
        $model =D('Didan');
        $prefix = C('DB_PREFIX');

        if($date['status']==2){
		      $prefix = C('DB_PREFIX');
		      $m = M();
		      $m->startTrans();
		      $Qd = D('Qd');
		      $ids = $model->where(array('id'=>$id))->save($date);

		      $qindan  =  $Qd->where(array('didan_id'=>$id))->select();

		      foreach($qindan as $qida ){

		        $ra = $m->execute("UPDATE {$prefix}goods SET stock=stock-{$qida['num']},sale=sale+{$qida['num']} WHERE id={$qida['goods_id']}");
		      }

		      //执行
		      if($ra &&  $ids  ){
		        $m->commit();
		        $this->success('修改成功');
		      }else{
		        $m->rollback();
		        $this->error('修改状态失败');
		      }

        }else{

        	 $ids = $model->where(array('id'=>$id))->save($date);

          // echo $model->getlastsql();exit;

        	 if($ids){

           $this->success('修改成功');
              } 

        } 
    

      }
     
      $this->display('edit');

    }


    /*ajax 查询订单数量*/

public function ajaxgetdidan(){
  $tr = I('post.tr');
  //echo $tr;

  $model = D('Didan');
  $count = $model->count();
$aa = $count - $tr;
  echo $aa;




}



   
   
}