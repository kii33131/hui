<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	 layout('Layout/loay');
        $Free=D('Free');
        $freed = $Free->find(1);
        $this->assign('freed',$freed);
        $remen = D('Remen')->select();

       $this->assign('remen',$remen);

      // var_dump($remen);

       $model = D('Category');
       $lost = $model->where(array('pid'=>0))->select();
       $this->assign('fenlei',$lost);

       $new = I('get.new');
       $shu = I('get.shu');
       $money = I('get.money');
    
      $category_id = I('get.goods_id');
      $_SESSION['category'] =$category_id;

      $arrcate = explode(',',$_SESSION['category']);

      $arrcateg_id=array_unique($arrcate);

      //print_r($arrcateg_id);
      array_pop($arrcateg_id); 
       //var_dump()
     // print_r($arrcateg_id);	
      $ysd=implode(',',$arrcateg_id);
     // print_r($ysd);
      $erp = explode(',', $ysd);
      //var_dump($erp);

       $picle=deletepidone($erp);

       $plle = deletepidone($picle);

       $this->assign('category_id',$arrcateg_id);


       if($category_id){

     	//var_dump()plle);

     	sort($plle);

     	$this->assign('cateidsse',implode(',',$plle));

     	 $luu=implode(',',$plle);
     	
     	//$map['category_id'] = 

     	$map['category_id'] = array('like',"%$luu%");

     	//./var_dump($luu);exit;
     	$model = D('Goods');
          $count = $model->where($map)->count();
          $Page = new \Think\Page($count,32);
          
          $Page ->setConfig('header','个商品');
          $Page ->setConfig('prev','上一页');
          $Page ->setConfig('next','下一页');
          $Page ->setConfig('end','最后一页'); 
          $Page ->setConfig("<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%"); 
     	  $show = $Page->show();
     	  //$lost = $model->where($map)->count();
     	  $lost = $model->where($map)->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();

          	


       }else{
          $Free=D('Free');
          $freed = $Free->find(1);
          $this->assign('freed',$freed);

            $remen = D('Remen')->select();

          $this->assign('remen',$remen);
          $model = D('Goods');
          $count = $model->count();
          $Page = new \Think\Page($count,32);
          
          $Page ->setConfig('header','个商品');
          $Page ->setConfig('prev','上一页');
          $Page ->setConfig('next','下一页');
          $Page ->setConfig('end','最后一页'); 
          $Page ->setConfig("<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%"); 
          $show = $Page->show();
          $new = I('get.new');
          $shu = I('get.shu');
          $money = I('get.money');
          $teijia = I('get.teijia');
          if($teijia!=null){
            $map['teijia'] = array('EQ',1);
          }
          $yisou = I('get.yisou');
          if($yisou!=null){

            $map['sale'] =array('EGT',1);
          }
          $map['stock'] = array('gt',0);



          if($new==1){

             $lost = $model->where($map)->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
          }

          if($money==1){

             $lost = $model->where($map)->order('money DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
          }


         if($shu==1){

             $lost = $model->where($map)->order('shu DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
          }



          if($new==null && $money==null && $shu==null){
               $lost = $model->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();

          }
   
           


       }
       $this->assign('lost',$lost);
           $this->assign('page',$show);
           $this->display('store');


    }


    //搜索商品页面
    public function getgoods(){
      layout('Layout/loay');

          $remen = D('Remen')->select();
          $this->assign('remen',$remen);
          $model = D('Category');
          $lost = $model->where(array('pid'=>0))->select();
          $this->assign('fenlei',$lost);
          $Free=D('Free');
          $freed = $Free->find(1);
          $this->assign('freed',$freed);
          $name = I('get.name');
          $map['name'] = array('like',"%$name%");
          $model = D('Goods');
          $count = $model->where($map)->count();
          $Page = new \Think\Page($count,32);
          $show = $Page->show();
          $lost = $model->where($map)->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
          $this->assign('lost',$lost);
          $this->assign('page',$show);
          $this->display('store');

    }



    /*关键字索索*/


       public function getgoodjs(){
      layout('Layout/loay');

          $remen = D('Remen')->select();
          $this->assign('remen',$remen);
          $model = D('Category');
          $lost = $model->where(array('pid'=>0))->select();
          $this->assign('fenlei',$lost);
          $Free=D('Free');
          $freed = $Free->find(1);
          $this->assign('freed',$freed);
          //$name = I('get.name');
          $name =mb_convert_encoding(I('get.name'), 'UTF-8','GB2312,UTF-8');

          $arr = explode(',',$name);
          if(count($arr)>1){


         $model = D('Goocate'); 
        $kap['category_id'] =  array('in',$name);

        $ids = $model->field('goods_id')->where($kap)->select();

         //echo $model->getlastsql();
        $kk =array();
        foreach($ids as $val){
            $kk[]=$val['goods_id'];

        }
        $i = implode(',',$kk);

           $map['id'] = array('in',$i);
        $map['stock'] = array('gt',0);

        $n = $arr['0'];

       $map['name'] = array('like',"%$n%");
        $model = D('Goods');
        $count=$model->where($map)->count();
          $Page = new \Think\Page($count,32);
          $show = $Page->show();
          
         $lost = $model->where($map)->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();

        	//echo $model->getlastsql();


          }else{

          $_SESSION['kk'] = $name;

          //var_dump($_SESSION['kk']);
          $map['name'] = array('like',"%$name%");
          $model = D('Goods');
          $count = $model->where($map)->count();
          $Page = new \Think\Page($count,32);
          $show = $Page->show();
          $lost = $model->where($map)->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();


          }

          $this->assign('lost',$lost);
          $this->assign('page',$show);
          $this->display('store');

    }




   //详细商品

    public function xgoods(){

      layout('Layout/loay');

      $Free=D('Free');
      $freed = $Free->find(1);
      $this->assign('freed',$freed);
        $remen = D('Remen')->select();

       $this->assign('remen',$remen);

      $goodsid = I('get.id');
      $images=GetImage($goodsid);

      $this->assign('images',$images);

      $Pinlun = D('Comment');
      $count = $Pinlun->where(array('status'=>1,'goods_id'=>$goodsid))->count();
      $Page = new \Think\Page($count,3);
      $Page -> setConfig('prev','上一页'); //这个是更改“上一页”的样式
      $Page -> setConfig('next','下一页');//这个是更改“下一页”的样式
      
      $show = $Page->show();
      $pinlu = $Pinlun->where(array('status'=>1,'goods_id'=>$goodsid))->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
    
      $this->assign('pinlu',$pinlu);
      $this->assign('page',$show);
      $model = D('Category');
       $lost = $model->where(array('pid'=>0))->select();
      $model = D('Goods');
      $id = I('get.id');
      $this->assign('fenlei',$lost);
      $list = $model->find($id);
      //显示商品实拍
      $Simages = D('Simages');
      $llls = $Simages->where(array('goods_id'=>$id))->select();
      $this->assign('llls',$llls);

      //显示前台藏品
      $Goods =  D('Goods');
      $cang = $Goods->order('shu DESC')->limit(10)->select();

      $Cate = D('Category');
      $category_id = $Cate->field('id')->where(array('title'=>'黄杨洪玉雕'))->select();
      
      $cateids = $Cate->field('id')->where(array('pid'=>$category_id[0]['id']))->select();
      //$goodsid

      $kkids = array();
      foreach($cateids as $mm){
        $kkids[] = $mm['id'];



      }

      $chid = implode(',', $kkids);
      $Goodcate  = D('Goocate');
      $map['category_id'] = array('in',$chid);
      $goodss_id = $Goodcate->field('goods_id')->where($map)->select();

        $ggids = array();
      foreach($goodss_id as $mm){
        $ggids[] = $mm['goods_id'];

      }
      $gchid = implode(',', $ggids);
      $mop['id'] = array('in',$gchid);
      $mama = $Goods->where($mop)->limit(5)->select();
      $ccang = $Goods->limit(5)->select();
      $cateiids = $Goodcate->where(array('goods_id'=>$goodsid))->select();

        $ggiids = array();
      foreach($cateiids as $mm){
        $ggiids[] = $mm['category_id'];

      }

     $kld=count($ggiids);
     $llkk=$ggiids[rand(0,$kld-1)];
     $gids = $Goodcate->field('goods_id')->where(array('category_id'=>$llkk))->select();

      $ggods = array();
      foreach($gids as $mm){
        $ggods[] = $mm['goods_id'];

      }
      $gchiiid = implode(',', $ggids);
      $mip['id'] = array('in',$gchid);
      $mame = $Goods->where($mip)->limit(5)->select();
      $canjjg = $Goods->order('money ASC')->limit(5)->select();
      $this->assign('canjjg',$canjjg);
      $this->assign('mame',$mame);
      $this->assign('mama',$mama);
      $this->assign('cxincang',$ccang);
      $this->assign('xincang',$cang);
      $this->assign('list',$list);
       if($list['comment']==null){
         $this->display('xiangqi1');



       }else{
         $this->display('xiangqi');
        
       }
     


    }




    //添加评论
    public function pinlun(){
      if(!isset($_SESSION['Home']['name'])){

       // $this->redirect('Login/login');

        echo '您还没有登录';

      }else{
        $verify = new \Think\Verify(); 
        $code = I('post.code');
        $date['goods_id'] = I('post.goodsid');
        $date['content'] = I('post.content');
        $date['user_id'] = $_SESSION['Home']['id'];
         
        $date['created'] =time();
       
        if(!$verify->check($code, $id)){
             echo '验证码错误';exit;
          }

        $model = D('Comment'); 
        
        $ids = $model->add($date);

        if($ids){


          echo '评论成功等待管理审核';
        }else{

          echo '评论失败';
        }

      }


    }

   /*点击增加点击量*/

   public function shu(){
    $goods_id = I('post.goodsid');
    
    $model = M();
    $prefix = C('DB_PREFIX');

    $ra = $model->execute("UPDATE {$prefix}goods SET shu=shu+1 WHERE id={$goods_id}");
    if($ra){

      echo '1';
    }else{
      //echo $model->getlastsql();
       echo '2';
    }


   }


   /*和田玉*/


   public function hetian(){
       layout('Layout/loay');
       $model = D('Category');
       $lost = $model->where(array('pid'=>0))->select();
       $this->assign('fenlei',$lost);
         $remen = D('Remen')->select();

       $this->assign('remen',$remen);

       $cateids = $model->where(array('title'=>'和田玉','pid'=>0))->field('id')->select();
      
       $ids = $model->where(array('pid'=>$cateids[0]['id']))->field('id')->select();
      
       $cateid = array();//装所有的分类id


      foreach($ids as $mm){
         $cateid [] = $mm['id'];

      }

      $cid = implode(',', $cateid);
      $mop['category_id'] = array('in',$cid);
      $Goodcate  = D('Goocate');
      $goodss_id = $Goodcate->field('goods_id')->where($mop)->select();

       $ggids = array();
      foreach($goodss_id as $mm){
        $ggids[] = $mm['goods_id'];

      }

      $gid = implode(',', $ggids);
      $mip['id'] = array('in',$gid);
        $Goods = D('Goods');

        $count=$model->where($mip)->count();
        $Page = new \Think\Page($count,32);
        $Page ->setConfig('header','个商品');
        $Page ->setConfig('prev','上一页');
        $Page ->setConfig('next','下一页');
        $Page ->setConfig('end','最后一页');
        $Page ->setConfig('theme',"<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%"); 
        $show = $Page->show();
        $list = $Goods->where($mip)->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $Comment = D('Comment');

        $commentlist = $Comment->where(array('status'=>1))->order('created DESC')->limit(10)->select();

        $this->assign('commentlist',$commentlist);

        $model = D('Jiimages');

        $lioste = $model->select();
        $this->assign('lioste',$lioste);


        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display('hetian');

   }


   /*南红*/

      public function nanhong(){
       layout('Layout/loay');
       $model = D('Category');
       $lost = $model->where(array('pid'=>0))->select();
       $this->assign('fenlei',$lost);
         $remen = D('Remen')->select();

       $this->assign('remen',$remen);

       $cateids = $model->where(array('title'=>'南红','pid'=>0))->field('id')->select();
      
       $ids = $model->where(array('pid'=>$cateids[0]['id']))->field('id')->select();
      
       $cateid = array();//装所有的分类id


      foreach($ids as $mm){
         $cateid [] = $mm['id'];

      }

      $cid = implode(',', $cateid);
      $mop['category_id'] = array('in',$cid);
      $Goodcate  = D('Goocate');
      $goodss_id = $Goodcate->field('goods_id')->where($mop)->select();

       $ggids = array();
      foreach($goodss_id as $mm){
        $ggids[] = $mm['goods_id'];

      }

      $gid = implode(',', $ggids);
      $mip['id'] = array('in',$gid);
      $Goods = D('Goods');

        $count=$model->where($mip)->count();
        $Page = new \Think\Page($count,32);
        $Page ->setConfig('header','个商品');
        $Page ->setConfig('prev','上一页');
        $Page ->setConfig('next','下一页');
        $Page ->setConfig('end','最后一页');
        $Page ->setConfig('theme',"<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%"); 
        $show = $Page->show();
        $list = $Goods->where($mip)->order('created DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);


       $this->display('nanhong');

   }


   /*最新资讯*/

   public function news(){
     layout('Layout/loay');

      $model = D('Category');
       $lost = $model->where(array('pid'=>0))->select();

       $this->assign('fenlei',$lost);
         $remen = D('Remen')->select();

       $this->assign('remen',$remen);


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

   /*详细新闻*/

      public function xianxi(){

       layout('Layout/loay');

       $model = D('Category');
       $lost = $model->where(array('pid'=>0))->select();
       $this->assign('fenlei',$lost);

            $id =I('get.id');
            $model = D('New');
            $count = $model->count();
            $Page = new \Think\Page($count,4);
            $Page ->setConfig('header','关注');
            $Page ->setConfig('prev','上一页');
            $Page ->setConfig('next','下一页');
            $Page ->setConfig('end','最后一页');
            $Page ->setConfig('theme',"<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%"); 
            $show = $Page->show();
            $lost = $model->order('created ASC')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('lost',$lost);
            $this->assign('page',$show);
            $list = $model->find($id);
            $this->assign('list',$list);
            $this->display('news_Detail');
           


    }

    /*详细公益事业*/



    public function gggs(){

       layout('Layout/loay');

       $model = D('Category');
       $lost = $model->where(array('pid'=>0))->select();
       $this->assign('fenlei',$lost);

        $id =I('get.id');
        $model = D('Gongyi');
        //$count = $model->count();
       // $Page = new \Think\Page($count,4);
        //$show = $Page->show();
       // $lost = $model->where(array('status'=>0))->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
       
            $count = $model->count();
            $Page = new \Think\Page($count,4);
            $Page ->setConfig('header','关注');
            $Page ->setConfig('prev','上一页');
            $Page ->setConfig('next','下一页');
            $Page ->setConfig('end','最后一页');
            $Page ->setConfig('theme',"<span>共%TOTAL_ROW% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页</span> %UP_PAGE% %FIRST% %LINK_PAGE% %DOWN_PAGE% %END%"); 
            $show = $Page->show();
            $lost = $model->order('created ASC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('lost',$lost);
        $this->assign('page',$show);
        //$this->assign('$');


      $list = $model->find($id);
      $this->assign('list',$list);
     // $this->display('news_Detail');
       

      $this->display('gggs');
    }

    /*联系我们*/

     public function cont(){
        layout('Layout/loay');

        $model = D('Category');
       $lost = $model->where(array('pid'=>0))->select();
       $this->assign('fenlei',$lost);


      $this->display('touch');

    }

    /*博润堂*/

    


    
     public function qyjj(){
        layout('Layout/loay');

        $model = D('Category');
       $lost = $model->where(array('pid'=>0))->select();
       $this->assign('fenlei',$lost);


      $this->display('qyjj');

    }

    public function jiangxiang(){

      layout(false); // 临时关闭当前模板的布局功能

      $this->display('123');
    }


}