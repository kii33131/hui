<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends AdminController {
    //搜索分类方法
    public function cateans(){
      layout('Layout/lay');
      $title = I('get.title');
      $map['title'] = array('like',"%$title%");
      $model = D('Category');
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

      $this->display('cate');

    }


	//分类列表
    public function index(){
    	 layout('Layout/lay');
      	$model = D('Category');
      	$pid = I('get.pid');
		    $count = $model->where(array('pid'=>$pid))->count();
		    $Page = new \Think\Page($count,20);
        $Page ->setConfig('header','个订单');
        $Page ->setConfig('prev','上一页');
        $Page ->setConfig('next','下一页');
        $Page ->setConfig('end','最后一页');
        $Page ->setConfig('theme',"<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%");
		    $show = $Page->show();
		    $list = $model->where(array('pid'=>$pid))->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
      	 
      	$this->assign('list',$list);
      	$this->assign('page',$show);
        $this->display('cate');
    }

    //添加分类

     public function add(){
    	 layout('Layout/lay');

    	 if(IS_GET){
    	 	$pid = I('get.pid');
    	 	$this->assign('pid',$pid);

    	 }elseif(IS_POST){
    	 	$date['pid'] = I('post.pid');
    	 	$date['title'] = I('post.title');
    	 	$date['modified'] = time();
    	 	$date['created'] = time();
    	 	$model = D('Category');

    	 	if (!$model->create($date)){
		
    	 	$this->error($model->getError());	

			}else{
				$ids=$model->add($date);

				if($ids){
				 $this->success('添加分类成功');

				}else{
					 $this->error('添加分类失败');

				}
			
			
			}



    	 }

        $this->display('addcategory');
    }
    //删除分类
   public function delete(){
   	$id = I('get.id');
   //var_dump($id);

   	$model = D('Category');
   	$list = $model->where(array('pid'=>$id))->select();
   	if($list){
   		$this->error('该分类下面有子类先去删除子类吧');

   	}else{

   		$ids = $model->where(array('id'=>$id))->delete();
   		if($ids){

   			$this->success('删除分类成功');
	
   		}else{
   			$this->error('删除分类失败');

   		}

   	}


   }

  //编辑分类

   public function edit(){
   		layout('Layout/lay');
   		$id = I('get.id');
   		$model = D('Category');
   		if(IS_GET){
   			$list = $model->find($id);
   			$this->assign('list',$list);

   		}elseif(IS_POST){

   			$id = I('get.id');
   			$date['title'] = I('post.title');
   			$date['modified'] = time();
   			$date['status'] = I('post.status');
   			if(!$model->create($date)){

   				$this->error($model->getError());

   			}else{

   				//修改
   				$list = $model->where(array('id'=>$id))->save($date);
   				if($list){
   					$this->success('修改分类成功');

   				}else{
   					$this->error('修改分类失败');

   				}
   			}


   		}

   		$this->display('edit');


   }

//一件商品有属于多个标签
   
}