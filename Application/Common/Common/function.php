<?php

/**
 * 获得商品二级分类
 * 
 */
function getCategoryB($id){
   $data = D('Category')->field('id,title')->where(array('pid'=>$id))->select();

	   foreach($data as $da){
      
       $opt .='<span>'.'<label>'.'<input type="checkbox" name="goods_id[]" value="'.$da['id'].'" class="input-xlarge" >'.'<span class="'.$da['id'].'">'.$da['title'].'</span>'.'</label>'.'</span>';

   }   

   return $opt;

}

//前台标签便利

function getCategoryc($id){
   $data = D('Category')->field('id,title')->where(array('pid'=>$id))->select();
    
	   foreach($data as $da){
      //.','.$_SESSION['category'].
	  //".U('index',array('goods_id'=>$da['id']))." 	
     $opt .= "<a   href='".U('index',array('goods_id'=>$da['id'].','.$_SESSION['category']))."' class='jji".$da['id']." bbiu' onclick='unk(".$da['id'].")' >".$da['title']."</a>";

   }   

   return $opt;


}

//找到商品的第一张图片

function getonepicture($goods_id){
	$date = D('Images')->field('filename')->where(array('goods_id'=>$goods_id))->select();

	foreach($date as $kk){


	}

	return $kk['filename'];


  // $arr = explode('/', $kk['filename']);

  // print_r($arr);
    //$arr[2] ='/haha';
    
   // return $arr[0].$arr[2].$arr[1];

}


//找到该商品的所有图片



function getallpicture($goods_id){
  $date = D('Images')->field('filename')->where(array('goods_id'=>$goods_id))->select();

  return $date;

}


/*证书显示情况*/

function xianss($bianhao){
  $date = D('Goods')->where(array('bianhao'=>$bianhao))->select();
  if($date){

    echo '前台显示';
  }else{
    echo '仅后台显示';

  }

}

function getalllpicture($goods_id){
  $date = D('Zimages')->field('filename')->where(array('zhes_id'=>$goods_id))->select();

  return $date;

}

/*找到用户*/
function getallemail($user_id){
  $date = D('Vip')->field('email')->find($user_id);

  return $date['email'];

}

/*找到商品*/

function getallg($goods_id){
  $date = D('Goods')->field('name')->find($goods_id);

  return $date['name'];

}





//添加商品时上传一个随机的8位的编码

function getbianma( $length = 8 ) {  
    // 密码字符集，可任意添加你需要的字符  
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';  
    $bianma = '';  
    for ( $i = 0; $i < $length; $i++ )  
    {  
        // 这里提供两种字符获取方式  
        // 第一种是使用 substr 截取$chars中的任意一位字符；  
        // 第二种是取字符数组 $chars 的任意元素  
        // $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);  
        $bianma .= $chars[ mt_rand(0, strlen($chars) - 1) ];  
    }  
    return $bianma;  
}  


//生成一个11位的订单号

function getbianmi( $length = 11 ) {  
    // 密码字符集，可任意添加你需要的字符  
    $dingdanhao = date("Y-m-dH-i-s");
    $dingdanhao = str_replace("-","",$dingdanhao);
    $dingdanhao .= rand(1000,2000);

    return $dingdanhao;

   }

   //判断订单状态

   function zhuangtai($status){

    if($status==0){

      return '正常';
    }

    if($status==1){

      return '发货';
    }


    if($status==2){

      return '交易完成';
    }

   }

   //返回付款方式

   function fukuan($pay){
    if($pay==1){

        echo '货到付款';
    }

    if($pay==0){

      echo '未确定等待确定';
    }

    if($pay==2){

      echo '支付宝';
    }

    if($pay==3){

      echo '网银支付';
    }



   }



//在线交易订单支付处理函数
//函数功能：根据支付接口传回的数据判断该订单是否已经支付成功；
//返回值：如果订单已经成功支付，返回true，否则返回false；
function checkorderstatus($ordid){
    $Ord=M('Orderlist');
    $ordstatus=$Ord->where('ordid='.$ordid)->getField('ordstatus');
    if($ordstatus==1){
        return true;
    }else{
        return false;    
    }
}
//处理订单函数
//更新订单状态，写入订单支付后返回的数据
function orderhandle($parameter){
    $ordid=$parameter['out_trade_no'];
    $data['payment_trade_no']      =$parameter['trade_no'];
    $data['payment_trade_status']  =$parameter['trade_status'];
    $data['payment_notify_id']     =$parameter['notify_id'];
    $data['payment_notify_time']   =$parameter['notify_time'];
    $data['payment_buyer_email']   =$parameter['buyer_email'];
    $data['ordstatus']             =1;
    $Ord=M('Orderlist');
    $Ord->where('ordid='.$ordid)->save($data);
} 

//判断会员现在的状态

function yuij($status){

  if($status==1){

    echo '禁用';
  }

  if($status==0){

    echo '正常';
  }
}



//图片裁剪函数  


function my_image_resize($src_file, $dst_file , $new_width , $new_height) {
  if($new_width <1 || $new_height <1) {
  echo "params width or height error !";
  exit();
  }
  if(!file_exists($src_file)) {
  echo $src_file . " is not exists !";
  exit();
  }
// 图像类型
  $type=exif_imagetype($src_file);
  $support_type=array(IMAGETYPE_JPEG , IMAGETYPE_PNG , IMAGETYPE_GIF);
  if(!in_array($type, $support_type,true)) {
  echo "this type of image does not support! only support jpg , gif or png";
  exit();
  }
//Load image
  switch($type) {
    case IMAGETYPE_JPEG :
    $src_img=imagecreatefromjpeg($src_file);
    break;
    case IMAGETYPE_PNG :
    $src_img=imagecreatefrompng($src_file);
    break;
    case IMAGETYPE_GIF :
    $src_img=imagecreatefromgif($src_file);
    break;
    default:
    echo "Load image error!";
    exit();
  }
  $w=imagesx($src_img);
  $h=imagesy($src_img);
  $ratio_w=1.0 * $new_width / $w;
  $ratio_h=1.0 * $new_height / $h;
  $ratio=1.0;
// 生成的图像的高宽比原来的都小，或都大 ，原则是 取大比例放大，取大比例缩小（缩小的比例就比较小了）
  if( ($ratio_w < 1 && $ratio_h < 1) || ($ratio_w > 1 && $ratio_h > 1)) {
    if($ratio_w < $ratio_h) {
    $ratio = $ratio_h ; // 情况一，宽度的比例比高度方向的小，按照高度的比例标准来裁剪或放大
    }else {
     $ratio = $ratio_w ;
    }
  // 定义一个中间的临时图像，该图像的宽高比 正好满足目标要求
    $inter_w=(int)($new_width / $ratio);
    $inter_h=(int) ($new_height / $ratio);
    $inter_img=imagecreatetruecolor($inter_w , $inter_h);
    imagecopy($inter_img, $src_img, 0,0,0,0,$inter_w,$inter_h);
    // 生成一个以最大边长度为大小的是目标图像$ratio比例的临时图像
    // 定义一个新的图像
    $new_img=imagecreatetruecolor($new_width,$new_height);
    imagecopyresampled($new_img,$inter_img,0,0,0,0,$new_width,$new_height,$inter_w,$inter_h);
    switch($type) {
    case IMAGETYPE_JPEG :
    imagejpeg($new_img, $dst_file,100); // 存储图像
    break;
    case IMAGETYPE_PNG :
    imagepng($new_img,$dst_file,100);
    break;
    case IMAGETYPE_GIF :
    imagegif($new_img,$dst_file,100);
    break;
    default:
    break;
    }
  } // end if 1



else{
  $ratio=$ratio_h>$ratio_w? $ratio_h : $ratio_w; //取比例大的那个值
  // 定义一个中间的大图像，该图像的高或宽和目标图像相等，然后对原图放大
  $inter_w=(int)($w * $ratio);
  $inter_h=(int) ($h * $ratio);
  $inter_img=imagecreatetruecolor($inter_w , $inter_h);
  //将原图缩放比例后裁剪
  imagecopyresampled($inter_img,$src_img,0,0,0,0,$inter_w,$inter_h,$w,$h);
  // 定义一个新的图像
  $new_img=imagecreatetruecolor($new_width,$new_height);
  imagecopy($new_img, $inter_img, 0,0,0,0,$new_width,$new_height);
  switch($type) {
  case IMAGETYPE_JPEG :
  imagejpeg($new_img, $dst_file,100); // 存储图像
  break;
  case IMAGETYPE_PNG :
  imagepng($new_img,$dst_file,100);
  break;
  case IMAGETYPE_GIF :
  imagegif($new_img,$dst_file,100);
  break;
  default:
  break;
  }
}// if3
}// end




/*找到是那个会员评论的*/

  function getname($uid){
    $model = D('Vip');
    $email = $model->field('email')->find($uid);
    echo $email['email'];

  }


 /*品论状态*/
 
 function getz($status){

    if($status==0){

       echo '未发表';
    }

     if($status==1){

       echo '已发表';
    }
 } 

//得到商品所有的图片
 function GetImage($goods_id){
    $model = D('Images');

    $list = $model->where(array('goods_id'=>$goods_id))->select();

    return  $list;



 }

//拼接正确商品图片的url

 function reurl($url){
    //
    $arr = explode('/', $url);
    $arr[2] ='/wai';
    
    return $arr[0].$arr[2].$arr[1];

 }

function reurr($url){
    //
    $arr = explode('/', $url);
    $arr[2] ='/nei';
    
    return $arr[0].$arr[2].$arr[1];

 }

 /*848*/


 function reurar($url){
  
    $arr = explode('/', $url);
    $arr[2] ='/848';
    
    return $arr[0].$arr[2].$arr[1];

 }



function reurrrr($url){
    //
    $arr = explode('/', $url);
    $arr[2] ='/cao';
    
    return $arr[0].$arr[2].$arr[1];

 }


 function dadada($url){
    //
    $arr = explode('/', $url);
    $arr[2] ='/haha';
    
    return $arr[0].$arr[2].$arr[1];

 }


//tuijian


 function tuijian($url){
    //
    $arr = explode('/', $url);
    $arr[2] ='/tuijian';
    
    return $arr[0].$arr[2].$arr[1];

 }

 //1000

  function spai($url){
    //
    $arr = explode('/', $url);
    $arr[2] ='/1000';
    
    return $arr[0].$arr[2].$arr[1];

 }

 //newss


  function newss($url){
    //
    $arr = explode('/', $url);
    $arr[2] ='/newss';
    
    return $arr[0].$arr[2].$arr[1];

 }

 //vvc


  function vvc($url){
    //
    $arr = explode('/', $url);
    $arr[2] ='/vvc';
    
    return $arr[0].$arr[2].$arr[1];

 }


//获取商品实拍图片


 function getspicture($goods_id){


  $model = D('Simages');
  $list = $model->where(array('goods_id'=>$goods_id))->select();

  return $list[0]['filename'];
 }



//meidi

   function meidi($url){
    //
    $arr = explode('/', $url);
    $arr[2] ='/meidi';
    
    return $arr[0].$arr[2].$arr[1];

 }



 //mass

  function mass($url){
    //
    $arr = explode('/', $url);
    $arr[2] ='/mass';
    
    return $arr[0].$arr[2].$arr[1];

 }




  function zhan($status){

    if($status==0){

      echo '正常';
    }

    if($status==1){

      echo '不显示';
    }
  }


  /*返回该订单的总价*/

  function remoney($didan_id){
    $model =D('Qd');

    $list  = $model->where(array('didan_id'=>$didan_id))->select();


    $num = 0;
    foreach($list as $val){
      $num+=$val['num']*$val['money'];


    }


    return $num;


  }


  /*支付订单状态*/


  function wozifu($status,$spay){

    if($status==0){

        echo '正常';
    }

    if($status==0 && $spay==1){

      echo '等待发货';
    }



     if($status==1){

        echo '已发货';
    }



     if($status==2){

        echo '交易完成';
    }

  }

  /*格式化价格*/


  function moneymeb($money){

    $arraat =explode(".",$money);

    return $arraat[0];

  }

 /*返回一个公益ids*/
  function moneeb($money){
    $model = D('Gongyi');

    $list = $model->field('id')->where(array('status'=>0))->select();

    foreach($list as $val){



    }

    return $list['id'];

  }




/*图片缩放等比例*/

function resizeImage($im,$maxwidth,$maxheight,$name,$filetype)
{
    $pic_width = imagesx($im);
    $pic_height = imagesy($im);

    if(($maxwidth && $pic_width > $maxwidth) || ($maxheight && $pic_height > $maxheight))
    {
        if($maxwidth && $pic_width>$maxwidth)
        {
            $widthratio = $maxwidth/$pic_width;
            $resizewidth_tag = true;
        }

        if($maxheight && $pic_height>$maxheight)
        {
            $heightratio = $maxheight/$pic_height;
            $resizeheight_tag = true;
        }

        if($resizewidth_tag && $resizeheight_tag)
        {
            if($widthratio>$heightratio)
                $ratio = $widthratio;
            else
                $ratio = $heightratio;
        }

        if($resizewidth_tag && !$resizeheight_tag)
            $ratio = $widthratio;
        if($resizeheight_tag && !$resizewidth_tag)
            $ratio = $heightratio;

        $newwidth = $pic_width * $ratio;
        $newheight = $pic_height * $ratio;

        if(function_exists("imagecopyresampled"))
        {
            $newim = imagecreatetruecolor($newwidth,$newheight);
           imagecopyresampled($newim,$im,0,0,0,0,$newwidth,$newheight,$pic_width,$pic_height);
        }
        else
        {
            $newim = imagecreate($newwidth,$newheight);
           imagecopyresized($newim,$im,0,0,0,0,$newwidth,$newheight,$pic_width,$pic_height);
        }

        $name = $name.$filetype;
        imagejpeg($newim,$name);
        imagedestroy($newim);
    }
    else
    {
        $name = $name.$filetype;
        imagejpeg($im,$name);
    }           
}


/*缩略图*/

Function Img($Image,$Dw,$Dh,$Type=1){
   IF(!File_Exists($Image)){
    Return False;
   }
   #如果需要生成缩略图,则将原图拷贝一下重新给$Image赋值
   IF($Type!=1){
    Copy($Image,Str_Replace(".","_x.",$Image));
    $Image=Str_Replace(".","_x.",$Image);
   }

   #取得文件的类型,根据不同的类型建立不同的对象
   $ImgInfo=GetImageSize($Image);
   Switch($ImgInfo[2]){
   Case 1:
    $Img = @ImageCreateFromGIF($Image);
   Break;
   Case 2:
    $Img = @ImageCreateFromJPEG($Image);
   Break;
   Case 3:
    $Img = @ImageCreateFromPNG($Image);
   Break;
   }

   #如果对象没有创建成功,则说明非图片文件
   IF(Empty($Img)){
    #如果是生成缩略图的时候出错,则需要删掉已经复制的文件
    IF($Type!=1){Unlink($Image);}
    Return False;
   }

   #如果是执行调整尺寸操作则
   IF($Type==1){
    $w=ImagesX($Img);
    $h=ImagesY($Img);
    $width = $w;
    $height = $h;
    IF($width>$Dw){
     $Par=$Dw/$width;
     $width=$Dw;
     $height=$height*$Par;
     IF($height>$Dh){
      $Par=$Dh/$height;
      $height=$Dh;
      $width=$width*$Par;
     }
    }ElseIF($height>$Dh){
     $Par=$Dh/$height;
     $height=$Dh;
     $width=$width*$Par;
     IF($width>$Dw){
      $Par=$Dw/$width;
      $width=$Dw;
      $height=$height*$Par;
     }
    }Else{
     $width=$width;
     $height=$height;
    }
    $nImg = ImageCreateTrueColor($width,$height);     #新建一个真彩色画布
    ImageCopyReSampled($nImg,$Img,0,0,0,0,$width,$height,$w,$h);#重采样拷贝部分图像并调整大小
    ImageJpeg ($nImg,$Image);          #以JPEG格式将图像输出到浏览器或文件
    Return True;
   #如果是执行生成缩略图操作则
   }Else{
    $w=ImagesX($Img);
    $h=ImagesY($Img);
    $width = $w;
    $height = $h;

    $nImg = ImageCreateTrueColor($Dw,$Dh);
    IF($h/$w>$Dh/$Dw){ #高比较大
     $width=$Dw;
     $height=$h*$Dw/$w;
     $IntNH=$height-$Dh;
     ImageCopyReSampled($nImg, $Img, 0, -$IntNH/1.8, 0, 0, $Dw, $height, $w, $h);
    }Else{     #宽比较大
     $height=$Dh;
     $width=$w*$Dh/$h;
     $IntNW=$width-$Dw;
     ImageCopyReSampled($nImg, $Img, -$IntNW/1.8, 0, 0, 0, $width, $Dh, $w, $h);
    }
    ImageJpeg ($nImg,$Image);
    Return True;
   }
}




/*图片缩放*/

function getiimage($picname,$maxx=200,$maxy=200,$pre="X_"){
  $info = GetImageSize($picname);//获取图片基本信息
  $w = $info[0];
  $h = $info[1];
 // echo '<pre>';
 // var_dump($info[2]);exit;
  //获取图片$info[2]类行
  switch($info[2]){

    case 1://gif
    $im = ImageCreateFromGIF($picname);
    break;

    case 2://gif
    $im = imagecreatefromjpeg($picname);
    break;

    case 3://gif
    $im = imagecreatefrompng($picname);
    break;

    default:
    die("图片类项错误");

  }

  //计算缩放比例

  if(($maxx/$w)>($maxy/$h)){

    $b = $maxy/$h;
  }else{
    $b = $maxx/$w;

  }

  //计算出缩放的尺寸

  $nw = floor($w*$b);
  $nh   = floor($h*$b);

  //创建一个新的图片资源

  $nim = imagecreatetruecolor($nw, $nh);
  //执行等比例缩放
    imagecopyresampled($nim, $im, 0, 0, 0, 0, $nw, $nh, $w, $h);

    //售出图像
  $picinfo = pathinfo($picname);
  $newpicname = $picinfo['dirname'].'/'.$pre.$picinfo['basename'];
  switch($info[2]){

    case 1:
    imagegif($nim,$newpicname);
    break;

      case 2:
    imagejpeg($nim,$newpicname);
    break;


      case 3:
    imagepng($nim,$newpicname);
    break;


  }



  //释放
  imagedestroy($im);

  imagedestroy($nim);

  return $newpicname;


}


/*他妈的图片处理2*/

function imagezoom( $srcimage, $dstimage,  $dst_width, $dst_height, $backgroundcolor ) {
        
        // 中文件名乱码
        if (PHP_OS == 'WINNT') {
                $srcimage = iconv('UTF-8', 'GBK', $srcimage);
                $dstimage = iconv('UTF-8', 'GBK', $dstimage);
        }
    
    $dstimg = imagecreatetruecolor( $dst_width, $dst_height );
    $color = imagecolorallocate($dstimg, hexdec(substr($backgroundcolor, 1, 2)), hexdec(substr($backgroundcolor, 3, 2)),hexdec(substr($backgroundcolor, 5, 2)));
    imagefill($dstimg, 0, 0, $color);
    
    if ( !$arr=getimagesize($srcimage) ) {
                echo "要生成缩略图的文件不存在";
                exit;
        }
        
    $src_width = $arr[0];
    $src_height = $arr[1];
    $srcimg = null;
    $method = getcreatemethod( $srcimage );
    if ( $method ) {
        eval( '$srcimg = ' . $method . ';' );
    }
    
    $dst_x = 0;
    $dst_y = 0;
    $dst_w = $dst_width;
    $dst_h = $dst_height;
    if ( ($dst_width / $dst_height - $src_width / $src_height) > 0 ) {
        $dst_w = $src_width * ( $dst_height / $src_height );
        $dst_x = ( $dst_width - $dst_w ) / 2;
    } elseif ( ($dst_width / $dst_height - $src_width / $src_height) < 0 ) {
        $dst_h = $src_height * ( $dst_width / $src_width );
        $dst_y = ( $dst_height - $dst_h ) / 2;
    }

    imagecopyresampled($dstimg, $srcimg, $dst_x
        , $dst_y, 0, 0, $dst_w, $dst_h, $src_width, $src_height);
    
    // 保存格式
    $arr = array(
        'jpg' => 'imagejpeg'
        , 'jpeg' => 'imagejpeg'
        , 'png' => 'imagepng'
        , 'gif' => 'imagegif'
        , 'bmp' => 'imagebmp'
    );
    @$suffix = strtolower( array_pop(explode('.', $dstimage )));
    if (!in_array($suffix, array_keys($arr)) ) {
        echo "保存的文件名错误";
        exit;
    } else {
        eval( $arr[$suffix] . '($dstimg, "'.$dstimage.'");' );
    }
    
    imagejpeg($dstimg, $dstimage);
    
    imagedestroy($dstimg);
    imagedestroy($srcimg);
    
}

 function getcreatemethod( $file ) {
         $arr = array(
                 '474946' => "imagecreatefromgif('$file')"
                 , 'FFD8FF' => "imagecreatefromjpeg('$file')"
                 , '424D' => "imagecreatefrombmp('$file')"
                 , '89504E' => "imagecreatefrompng('$file')"
         );
         $fd = fopen( $file, "rb" );
        $data = fread( $fd, 3 );
          
         $data = str2hex( $data );
          
         if ( array_key_exists( $data, $arr ) ) {
                 return $arr[$data];
         } elseif ( array_key_exists( substr($data, 0, 4), $arr ) ) {
                 return $arr[substr($data, 0, 4)];
         } else {
                 return false;
         }
 }
  
 function str2hex( $str ) {
         $ret = "";
          
         for( $i = 0; $i < strlen( $str ) ; $i++ ) {
                 $ret .= ord($str[$i]) >= 16 ? strval( dechex( ord($str[$i]) ) )
                         : '0'. strval( dechex( ord($str[$i]) ) );
         }
          
         return strtoupper( $ret );
 }
  
 // BMP 创建函数  php本身无
 function imagecreatefrombmp($filename)
 {
    if (! $f1 = fopen($filename,"rb")) return FALSE;
  
    $FILE = unpack("vfile_type/Vfile_size/Vreserved/Vbitmap_offset", fread($f1,14));
    if ($FILE['file_type'] != 19778) return FALSE;
  
    $BMP = unpack('Vheader_size/Vwidth/Vheight/vplanes/vbits_per_pixel'.
                  '/Vcompression/Vsize_bitmap/Vhoriz_resolution'.
                  '/Vvert_resolution/Vcolors_used/Vcolors_important', fread($f1,40));
    $BMP['colors'] = pow(2,$BMP['bits_per_pixel']);
    if ($BMP['size_bitmap'] == 0) $BMP['size_bitmap'] = $FILE['file_size'] - $FILE['bitmap_offset'];
    $BMP['bytes_per_pixel'] = $BMP['bits_per_pixel']/8;
    $BMP['bytes_per_pixel2'] = ceil($BMP['bytes_per_pixel']);
    $BMP['decal'] = ($BMP['width']*$BMP['bytes_per_pixel']/4);
    $BMP['decal'] -= floor($BMP['width']*$BMP['bytes_per_pixel']/4);
    $BMP['decal'] = 4-(4*$BMP['decal']);
    if ($BMP['decal'] == 4) $BMP['decal'] = 0;
     
    $PALETTE = array();
    if ($BMP['colors'] < 16777216)
    {
     $PALETTE = unpack('V'.$BMP['colors'], fread($f1,$BMP['colors']*4));
    }
     
    $IMG = fread($f1,$BMP['size_bitmap']);
    $VIDE = chr(0);
  
    $res = imagecreatetruecolor($BMP['width'],$BMP['height']);
    $P = 0;
    $Y = $BMP['height']-1;
    while ($Y >= 0)
    {
         $X=0;
         while ($X < $BMP['width'])
         {
          if ($BMP['bits_per_pixel'] == 24)
             $COLOR = unpack("V",substr($IMG,$P,3).$VIDE);
          elseif ($BMP['bits_per_pixel'] == 16)
          { 
             $COLOR = unpack("n",substr($IMG,$P,2));
             $COLOR[1] = $PALETTE[$COLOR[1]+1];
          }
          elseif ($BMP['bits_per_pixel'] == 8)
          { 
             $COLOR = unpack("n",$VIDE.substr($IMG,$P,1));
             $COLOR[1] = $PALETTE[$COLOR[1]+1];
          }
          elseif ($BMP['bits_per_pixel'] == 4)
         {
             $COLOR = unpack("n",$VIDE.substr($IMG,floor($P),1));
             if (($P*2)%2 == 0) $COLOR[1] = ($COLOR[1] >> 4) ; else $COLOR[1] = ($COLOR[1] & 0x0F);
             $COLOR[1] = $PALETTE[$COLOR[1]+1];
          }
          elseif ($BMP['bits_per_pixel'] == 1)
          {
             $COLOR = unpack("n",$VIDE.substr($IMG,floor($P),1));
             if     (($P*8)%8 == 0) $COLOR[1] =  $COLOR[1]        >>7;
             elseif (($P*8)%8 == 1) $COLOR[1] = ($COLOR[1] & 0x40)>>6;
             elseif (($P*8)%8 == 2) $COLOR[1] = ($COLOR[1] & 0x20)>>5;
             elseif (($P*8)%8 == 3) $COLOR[1] = ($COLOR[1] & 0x10)>>4;
             elseif (($P*8)%8 == 4) $COLOR[1] = ($COLOR[1] & 0x8)>>3;
             elseif (($P*8)%8 == 5) $COLOR[1] = ($COLOR[1] & 0x4)>>2;
             elseif (($P*8)%8 == 6) $COLOR[1] = ($COLOR[1] & 0x2)>>1;
            elseif (($P*8)%8 == 7) $COLOR[1] = ($COLOR[1] & 0x1);
             $COLOR[1] = $PALETTE[$COLOR[1]+1];
         }
         else
             return FALSE;
          imagesetpixel($res,$X,$Y,$COLOR[1]);
          $X++;
          $P += $BMP['bytes_per_pixel'];
         }
         $Y--;
         $P+=$BMP['decal'];
    }
    fclose($f1);
  
 return $res;
 }
 // BMP 保存函数，php本身无
 function imagebmp ($im, $fn = false)
 {
     if (!$im) return false;
              
     if ($fn === false) $fn = 'php://output';
     $f = fopen ($fn, "w");
     if (!$f) return false;
              
     $biWidth = imagesx ($im);
     $biHeight = imagesy ($im);
    $biBPLine = $biWidth * 3;
     $biStride = ($biBPLine + 3) & ~3;
    $biSizeImage = $biStride * $biHeight;
     $bfOffBits = 54;
    $bfSize = $bfOffBits + $biSizeImage;
              
     fwrite ($f, 'BM', 2);
     fwrite ($f, pack ('VvvV', $bfSize, 0, 0, $bfOffBits));
             
     fwrite ($f, pack ('VVVvvVVVVVV', 40, $biWidth, $biHeight, 1, 24, 0, $biSizeImage, 0, 0, 0, 0));
              
     $numpad = $biStride - $biBPLine;
     for ($y = $biHeight - 1; $y >= 0; --$y)
    {
         for ($x = 0; $x < $biWidth; ++$x)
         {
            $col = imagecolorat ($im, $x, $y);
             fwrite ($f, pack ('V', $col), 3);
         }
       for ($i = 0; $i < $numpad; ++$i)
             fwrite ($f, pack ('C', 0));
     }
     fclose ($f);
     return true;
 }



 /*mokuai*/

 function getmodel($status){
  if($status==1){


    echo '博润堂历程';
  }

    if($status==2){


    echo '博润堂介绍 ';
  }

    if($status==3){


    echo '法律顾问 ';
  }

    if($status==4){


    echo '品质保证 ';
  }

    if($status==5){


    echo '免费服务及赠送 ';
  }

    if($status==6){


    echo '售后服务保证 ';
  }

    if($status==7){


    echo '退换货流程 ';
  }

    if($status==8){


    echo '配送流程 ';
  }

    if($status==9){


    echo '网上转账 ';
  }

    if($status==10){


    echo '支付方式 ';
  }

    if($status==11){


    echo '购物流程';
  }

    if($status==12){


    echo '账号注册';
  }



    if($status==13){


    echo '博润堂展厅';
  }



 }



 /*删除数组里面的重复值*/


 function formatArray($array)
{
sort($array);
$tem = ”;
$temarray = array();
$j = 0;
for($i=0;$i<count($array);$i++)
{
if($array[$i]!=$tem)
{
$temarray[$j] = $array[$i];
$j++;
}
$tem = $array[$i];
}
return $temarray;
}


/*冒泡法*/
/*删除同一个爹的大儿子*/

function deletepidone($array){
  if(count($array)>1){

    //$arrer=array();
    //print_r($array);
    for($i=0;$i<=count($array);$i++){
  
      for($j=$i+1;$j<=count($array);$j++){
           
           $ll=wocaoya($array[$i],$array[$j]);
          
           if($ll){

            

            array_splice($array,$j,1);


           } 

         //  echo $array[$j-1].'i';

      }

      //echo $i.'p';
    }


   //var_dump()  
  return $array;
  }else{

    return $array;
  }
}


/*比较两个类是否属于同一个爹*/

function wocaoya($cate1,$cate2){

  $model =D('Category');

  $aa = $model->find($cate1);

  $bb = $model->find($cate2);

  //dump($aa['pid']).','.dump($bb['pid']);

  if($aa['pid']==$bb['pid']){

    return ture;
  }else{

    return false;
  }

} 



