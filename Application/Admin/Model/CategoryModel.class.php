<?php

  namespace Admin\Model;
  use Think\Model;
  class CategoryModel extends Model {
  	 protected $_validate = array(
		array('pid','require','父级必填'),  // 都有时间都验证
		//array('title','','帐号名称已经存在！',0,'unique',1), // 
		array('title','require','分类名必填'),  // 都有时间都验证
	 );


  	
  }
