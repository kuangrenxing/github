<?php

class m111206_053032_tpl_alter_col extends CDbMigration
{
	public function up()
	{
		$sql="ALTER TABLE `tpl` ADD `group_id` INT( 10 ) NOT NULL AFTER `id` ";		
		Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
		$sql="alter table `tpl` drop column `group_id`";	
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
