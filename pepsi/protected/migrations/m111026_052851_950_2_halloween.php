<?php

class m111026_052851_950_2_halloween extends CDbMigration
{
	public function up()
	{
			$sql = "INSERT INTO  `pepsi`.`template` (
			`id`, `name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
			VALUES (
			'157','950万圣节2个宝贝','950_2_halloween','950_2_halloween.jpg','950_2_halloween_prew.jpg','2','950','530','0',NULL,NULL,'','','','1');";
                  Yii::app()->db->createCommand($sql)->execute();
                  return true;
	}

	public function down()
	{
     	$sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 157;";
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
