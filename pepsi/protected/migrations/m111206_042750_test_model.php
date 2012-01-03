<?php

class m111206_042750_test_model extends CDbMigration
{
	public function up()
	{
		$sql="CREATE TABLE IF NOT EXISTS `tpl_testttttt` (
			  `group_id` int(10) NOT NULL AUTO_INCREMENT,
			  `group_name` varchar(32) NOT NULL,
			  `group_slug` varchar(45) NOT NULL,
			  PRIMARY KEY (`group_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
		";
	Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
		$this->dropTable("tpl_testttttt");
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
