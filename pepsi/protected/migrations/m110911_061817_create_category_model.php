<?php

class m110911_061817_create_category_model extends CDbMigration
{
	public function up()
    {
        $sql='SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
-- Database: `pepsi`
-- --------------------------------------------------------
-- Table structure for table `category`

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(10) unsigned NOT NULL,
  `parent_cid` int(10) unsigned DEFAULT NULL,
  `user_id` varchar(128) DEFAULT NULL,
  `nick` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL,
  `pic_url` varchar(128) DEFAULT NULL,
  `sort_order` int(10) unsigned DEFAULT NULL,
  `created` int(11) unsigned DEFAULT NULL,
  `modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;';

		Yii::app()->db->createCommand($sql)->execute(); 

	}

	public function safeDown()
	{
		$this->dropTable('category');
	}

}
