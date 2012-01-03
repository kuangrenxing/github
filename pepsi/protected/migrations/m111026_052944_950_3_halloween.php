<?php

class m111026_052944_950_3_halloween extends CDbMigration
{
	public function up()
	{
		   $sql = "INSERT INTO  `pepsi`.`template` (
		`id`, `name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
		VALUES (
		'159','950万圣节3个宝贝','950_3_halloween','950_3_halloween.jpg','950_3_halloween_prew.jpg','3','950','445','0',NULL,NULL,'','','','1');";
			    Yii::app()->db->createCommand($sql)->execute();
		        return true;
	}

	public function down()
	{
    	$sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 159;";
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
