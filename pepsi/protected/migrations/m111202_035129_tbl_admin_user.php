<?php

class m111202_035129_tbl_admin_user extends CDbMigration
{
	public function up()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `admin_user` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `username` varchar(32) NOT NULL,
		  `password` varchar(32) NOT NULL,
		  `salt` varchar(32) NOT NULL,
		  `sex` varchar(2) NOT NULL,
		  `email` varchar(32) NOT NULL,
		  `create_time` int(16) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
		
	 	return Yii::app()->db->createCommand($sql)->execute(); 
	}

	public function down()
	{
		return $this->dropTable('admin_user');
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