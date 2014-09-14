<?php

  namespace Admin\Model;
  use Think\Model;
  class GoodsModel extends Model {
  	 protected $_validate = array(
		//array('pid','require','父级必填'),  // 都有时间都验证
		//array('title','','帐号名称已经存在！',0,'unique',1), // 
		array('name','require','商品名必填'),  // 都有时间都验证
     array('money', '/^[0-9]*$/', '价格格式不对', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
	 );


  	
  }
