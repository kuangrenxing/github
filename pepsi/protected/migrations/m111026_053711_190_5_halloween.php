<?php

class m111026_053711_190_5_halloween extends CDbMigration
{
	public function up()
	{
			   $sql = "INSERT INTO  `pepsi`.`template` (
			`id`, `name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
			VALUES (
			'160','190万圣节5个宝贝','190_5_halloween','190_5_halloween.jpg','190_5_halloween_prew.jpg','5','190','810','0',NULL,NULL,'','','','1');";
				    Yii::app()->db->createCommand($sql)->execute();
			        return true;
	}

	public function down()
	{
    	$sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 160;";
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
