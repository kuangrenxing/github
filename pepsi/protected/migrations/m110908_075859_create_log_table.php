<?php

class m110908_075859_create_log_table extends CDbMigration
{
	public function up()
	{
	    $sql = "CREATE TABLE IF NOT EXISTS `log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(128) DEFAULT NULL,
  `category` varchar(128) DEFAULT NULL,
  `logtime` int(11) unsigned DEFAULT NULL,
  `message` text,
  `item_id` VARCHAR(128) NOT NULL ,
  `task_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
	    Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
           return $this->dropTable('log');
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
