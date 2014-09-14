DROP DATABASE IF EXISTS xiaoyao;
CREATE DATABASE xiaoyao;
USE xiaoyao;

/*美食分类表*/
CREATE TABLE `xy_category` (
  `id` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL ,
  `title` varchar(50) NOT NULL  comment '分类名',
  `status` int(11) NOT NULL DEFAULT 0 comment '0普通状态 1禁用',
  `created` int(11) NOT NULL DEFAULT 0 comment '创建时间',
  `modified` int(11) NOT NULL DEFAULT 0 comment '修改时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


/*商品表*/
CREATE TABLE `xy_goods` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL  comment '商品名',
  `status` int(11) NOT NULL DEFAULT 0 comment '0上架 1下架',
  `created` int(11) NOT NULL DEFAULT 0 comment '创建时间',
  `modified` int(11) NOT NULL DEFAULT 0 comment '修改时间',
  `money` DECIMAL(8,2) NOT NULL DEFAULT 0 comment '全国统一价格',
  `shu` int(11) NOT NULL DEFAULT 0 comment '点击量',
  `place` varchar(255) NOT NULL DEFAULT '' comment '产地', 
  `stock` int(11) NOT NULL DEFAULT 0 comment '库存',
  `smoney` DECIMAL(8,2) NOT NULL DEFAULT 0 comment '市场价',
  `splace` varchar(255) NOT NULL DEFAULT '' comment '商品所在地',
  `bianhao` varchar(255) NOT NULL  comment '商品编号',
  `weight` float(11) NOT NULL DEFAULT 0 comment '重量',
  `pise` varchar(255) NOT NULL DEFAULT '' comment '皮色',
  `ticai` varchar(255) NOT NULL DEFAULT '' comment '题材',
  `color` varchar(255) NOT NULL DEFAULT '' comment '颜色',
  `bigger` float(11) NOT NULL DEFAULT 0 comment '尺寸',

  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


/*商品和分类的关联表*/
CREATE TABLE `xy_goocate` (
  `id` int(11) NOT NULL auto_increment,
  `category_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*商品图片表*/

CREATE TABLE `xy_images` (
  `id` int(11) NOT NULL auto_increment,
  `filename` varchar(255) NOT NULL,
  `goods_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


/*注册会员表*/

CREATE TABLE `xy_vip` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL comment '用户密码',
  `repassword` varchar(32) NOT NULL comment '重复密码',
  `created` int(11) NOT NULL DEFAULT 0 comment '创建时间',
  `avatar` varchar(255) NOT NULL DEFAULT '' comment '用户头像',
  `modified` int(11) NOT NULL DEFAULT 0 comment '修改时间',
  `status` int(11) NOT NULL DEFAULT 0 comment '0普通状态 1禁用',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*收货信息表*/
CREATE TABLE `xy_dizi` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `omit` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `sanjak` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL comment '收货人信息',
  `created` int(11) NOT NULL DEFAULT 0 comment '创建时间',
  `dizhi` varchar(255) NOT NULL DEFAULT '' comment '详细地址',
  `phone` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `landmark` varchar(255) NOT NULL DEFAULT '' comment '标志建筑',
  `email` varchar(255) NOT NULL,
  `bianma` varchar(255) NOT NULL,
  `ztime` varchar(255) NOT NULL,
  `modified` int(11) NOT NULL DEFAULT 0 comment '修改时间',
  `status` int(11) NOT NULL DEFAULT 0 comment '0普通状态 1禁用',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*订单表*/
CREATE TABLE `xy_didan` (
  `id` int(11) NOT NULL auto_increment,
  `danhao` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `pay` int(11) NOT NULL DEFAULT 1 comment '1货到付款 2支付宝 3网银',
  `modified` int(11) NOT NULL DEFAULT 0 comment '修改时间',
  `status` int(11) NOT NULL DEFAULT 0 comment '0正常 1发货 2 款已到',
  `fuyan` varchar(255) NOT NULL comment '订单敷衍',
  `created` int(11) NOT NULL DEFAULT 0 comment '创建时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*清单表*/
CREATE TABLE `xy_qd` (
  `id` int(11) NOT NULL auto_increment,
  `didan_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL comment '商品名',
  `smoney` DECIMAL(8,2) NOT NULL DEFAULT 0 comment '市场价',
  `money` DECIMAL(8,2) NOT NULL DEFAULT 0 comment '全国统一价格',
  `num` int(11) NOT NULL,
  `modified` int(11) NOT NULL DEFAULT 0 comment '修改时间',
  `status` int(11) NOT NULL DEFAULT 0 comment '0正常 1发货 2 款已到',
  `created` int(11) NOT NULL DEFAULT 0 comment '创建时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



/*新闻表*/
CREATE TABLE `xy_new` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL comment '新闻标题',
  `filename` varchar(255) NOT NULL comment '新闻图片',
  `content` varchar(1000) NOT NULL comment '新闻标题',
  `modified` int(11) NOT NULL DEFAULT 0 comment '修改时间',
  `status` int(11) NOT NULL DEFAULT 0 comment '0正常 1发货 2 款已到',
  `created` int(11) NOT NULL DEFAULT 0 comment '创建时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

//管理员列表

CREATE TABLE `xy_admin` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL comment '用户密码',
  `repassword` varchar(32) NOT NULL comment '重复密码',
  `created` int(11) NOT NULL DEFAULT 0 comment '创建时间',
  `avatar` varchar(255) NOT NULL DEFAULT '' comment '用户头像',
  `modified` int(11) NOT NULL DEFAULT 0 comment '修改时间',
  `status` int(11) NOT NULL DEFAULT 0 comment '0普通状态 1禁用',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*密码为jiangxi*/
INSERT INTO `xy_admin` VALUES ('1', 'admin', '18952462532', 'b8a3ef39f610af82fe27fbb6d2362677', '', '0', '', '1400119735', '0');


/*商品评论表*/

CREATE TABLE `xy_comment` (
  `id` int(11) NOT NULL auto_increment,
  `goods_id` int(11) NOT NULL comment '文章id',
  `user_id` int(11) NOT NULL comment '用户id',
  `content` text NOT NULL comment '评论内容',
  `status` int(11) NOT NULL default '0' comment '0普通状态 1禁用',
  `created` int(11) NOT NULL DEFAULT 0 comment '创建时间',
  `modified` int(11) NOT NULL DEFAULT 0 comment '修改时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


/*网站设置表*/
CREATE TABLE `xy_free` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL comment '评论内容',
  `status` int(11) NOT NULL default '0' comment '0正常投放 1网站维护',
  `created` int(11) NOT NULL DEFAULT 0 comment '创建时间',
  `modified` int(11) NOT NULL DEFAULT 0 comment '修改时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `xy_free` VALUES ('1', '玉石中的战斗机', '0', '0', '0');















