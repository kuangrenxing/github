<?php

class m111125_031933_create_table_job extends CDbMigration
{
	public function up()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `job` (
		  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `feed_id` int(10) unsigned DEFAULT NULL,
		  `feed_type` tinyint(3)  unsigned DEFAULT 0,
		  `created` int(10) unsigned DEFAULT NULL,
		  `updated` int(10) unsigned DEFAULT NULL,
		  `type` tinyint(3) unsigned DEFAULT NULL,
		  `publish_count` int(10) unsigned DEFAULT NULL,
		  `publish_index` int(10) unsigned DEFAULT 0,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;";
		Yii::app()->db->createCommand($sql)->execute(); 
		
		$sql = "CREATE TABLE IF NOT EXISTS `job_item` (
		  `job_id` int(10) unsigned NOT NULL,
		  `item_id` varchar(128) NOT NULL,
		  `item_name` varchar(128) NOT NULL,
		  `position` tinyint(3) unsigned NOT NULL,
		  `status` tinyint(3) unsigned NOT NULL,
		  PRIMARY KEY (`job_id`,`item_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
		Yii::app()->db->createCommand($sql)->execute(); 
			
		$sql = "CREATE TABLE IF NOT EXISTS `job_log` (
			  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			  `level` varchar(128) DEFAULT NULL,
			  `category` varchar(128) DEFAULT NULL,
			  `logtime` int(11) unsigned DEFAULT NULL,
			  `message` text,
			  `item_id` varchar(128) NOT NULL,
			  `job_id` int(10) unsigned DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
		Yii::app()->db->createCommand($sql)->execute(); 
			
		
		return true;
	}

	public function down()
	{ 
		$sql = "DROP TABLE `job`";
		Yii::app()->db->createCommand($sql)->execute(); 
		$sql = "DROP TABLE `job_item`";
		Yii::app()->db->createCommand($sql)->execute();
		$sql = "DROP TABLE `job_log`";
		Yii::app()->db->createCommand($sql)->execute();
		return true;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}