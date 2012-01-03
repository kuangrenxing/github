<?php

class m111125_083920_add_successer_failer_2_job extends CDbMigration
{
	public function up()
	{
			$sql="ALTER TABLE  `job` ADD  `successer` int(10) unsigned DEFAULT '0',
					ADD `failer` int(10) unsigned DEFAULT '0'
				 ";
			return Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
		$sql="ALTER TABLE `job`
	  			DROP `successer`,
	  			DROP `failer`";
	
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