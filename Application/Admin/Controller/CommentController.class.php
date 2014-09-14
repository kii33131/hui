<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends AdminController {
	//分类列表
    public function index(){
    	 layout('Layout/lay');
      	$model = D('Comment');
      
		    $count = $model->count();
		    $Page = new \Think\Page($count,25);
		    $show = $Page->show();
		    $list = $model->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
      	$this->assign('list',$list);
      	$this->assign('page',$show);
        $this->display('index');
    }

    /*管理员对会员评论进行编辑*/

    public function edit(){
        layout('Layout/lay');
        $id = I('get.id');

        $model = D('Comment');
        $list =$model->find($id);

        if(IS_POST){
          $id = I('post.id');
          $date['modified'] = time();
          $date['status']   = I('post.status');
          $model = D('Comment');
          $list = $model->where(array('id'=>$id))->save($date);
          if($list){

            $this->success('修改成功');
          }else{

            $this->error('修改失败');
          }


 
        }


        $this->assign('list',$list);

        $this->display('edit');   

    }

    /*删除品论*/

    public function delete(){

      $id = I('get.id');

      $model = D('Comment');

      $ids  = $model->delete($id);

      if($ids){
         $this->success('删除成功');

      }else{


        $this->error('删除失败');
      }
    }



   
   
}