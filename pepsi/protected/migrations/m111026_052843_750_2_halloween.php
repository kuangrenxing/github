<?php

class m111026_052843_750_2_halloween extends CDbMigration
{
	public function up()
	{
		      $sql = "INSERT INTO  `pepsi`.`template` (
		`id`, `name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
		VALUES (
		'156','750万圣节2个宝贝','750_2_halloween','750_2_halloween.jpg','750_2_halloween_prew.jpg','2','750','410','0',NULL,NULL,'','','','1');";
		Yii::app()->db->createCommand($sql)->execute();
		return true;
	}

	public function down()
	{
     	$sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 156;";
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
