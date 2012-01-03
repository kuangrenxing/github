<?php

class m111122_022755_add_dapei_meal_field extends CDbMigration
{
	public function up()
	{
		$sql = "ALTER TABLE `pepsi`.`dapei_meal` ADD COLUMN `raw_data` TEXT;";
		Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
		$sql = "ALTER TABLE `pepsi`.`dapei_meal` DROP COLUMN `raw_data`;";
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