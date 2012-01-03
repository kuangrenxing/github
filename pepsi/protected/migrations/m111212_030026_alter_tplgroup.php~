<?php

class m111212_030026_alter_tplgroup extends CDbMigration
{
	public function up()
	{
		$sql="ALTER TABLE `tpl_group` ADD `grade` INT( 2 ) NOT NULL ,
 ADD `stutas` INT( 2 ) NOT NULL";
		Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
		$sql="ALTER TABLE `tpl_group`
  DROP `grade`,
  DROP `stutas`;";
		Yii::app()->db->createCommand($sql)->execute();
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
