<?php

class m111125_074247_add_status_user_id_2_job extends CDbMigration
{
	public function up()
	{
		$sql="ALTER TABLE  `job` ADD  `status` TINYINT( 3 ) UNSIGNED  NULL DEFAULT 0,
				ADD `user_id` varchar(128) NOT NULL 
			 ";
		return Yii::app()->db->createCommand($sql)->execute(); 
	}

	public function down()
	{
		$sql="ALTER TABLE `job`
	  			DROP `status`,
	  			DROP `user_id`";
	
		return Yii::app()->db->createCommand($sql)->execute(); 
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