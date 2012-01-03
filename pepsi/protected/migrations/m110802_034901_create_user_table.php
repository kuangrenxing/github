<?php

class m110802_034901_create_user_table extends CDbMigration
{
	//public function safeUp()
	public function Up()
	{
        $sql="
SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
SET time_zone = '+00:00';


CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(128) NOT NULL,
  `uid` varchar(256) DEFAULT NULL,
  `nick` varchar(128) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `sex` tinyint(1) unsigned DEFAULT NULL,
  `buyer_credit` varchar(256) DEFAULT NULL COMMENT 'only needs level',
  `seller_credit` varchar(256) DEFAULT NULL COMMENT 'only needs level',
  `location` varchar(256) DEFAULT NULL,
  `created` int(11) unsigned DEFAULT NULL,
  `last_visit` int(11) unsigned DEFAULT NULL,
  `birhday` int(11) unsigned DEFAULT NULL,
  `type` char(1) DEFAULT NULL COMMENT '用户类型。可选值:B(B商家),C(C商家)',
  `consumer_protection` tinyint(1) unsigned DEFAULT NULL COMMENT '是否参加消保',
  `alipay_account` varchar(128) DEFAULT NULL COMMENT '支付宝账户',
  `alipay_no` varchar(128) DEFAULT NULL COMMENT '支付宝ID',
  `avatar` varchar(256) DEFAULT NULL COMMENT '卖家头像地址',
  `liangpin` tinyint(1) unsigned DEFAULT NULL COMMENT '是否是无名良品用户，true or false',
  `sign_food_seller_promise` tinyint(1) unsigned DEFAULT NULL COMMENT '卖家是否签署食品卖家承诺协议',
  `has_shop` tinyint(1) unsigned DEFAULT NULL COMMENT '用户作为卖家是否开过店',
  `is_lightning_consignment` tinyint(1) unsigned DEFAULT NULL COMMENT 'true 是否24小时闪电发货(实物类)',
  `vip_info` varchar(256) DEFAULT NULL COMMENT 'v1\n用户的全站vip信息，可取值如下：c(普通会员),asso_vip(荣誉会员), exp_vip1,exp_vip2,exp_vip3,exp_vip4(四个等级的体验vip会员),     vip1,vip2,vip3,vip4(四个等级的正式vip会员)，共10种取值，其中asso_vip是由vip会员衰退而成，与主站上的准vip对应；体验vip会员首先是普通会员或准vip会员。',
  `vertical_market` varchar(256) DEFAULT NULL COMMENT '3C,shoes\n用户参与垂直市场类型。',
  `last_login` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='users table';
		";
		Yii::app()->db->createCommand($sql)->execute();
	}

	public function safeDown()
	{
		//$sql="DROP TABLE `user`";
		//Yii::app()->db->createCommand($sql)->execute();
		$this->dropTable('user');
	}


}
