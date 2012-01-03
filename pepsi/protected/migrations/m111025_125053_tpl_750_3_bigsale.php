<?php

class m111025_125053_tpl_750_3_bigsale extends CDbMigration
{
	public function up()
	{
		      $sql = "INSERT INTO  `pepsi`.`template` (
		`id`, `name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
		VALUES (
		'154','950搭配减价3宝贝','750_3_bigsale','750_3_bigsale.jpg','750_3_bigsale_prew.jpg','3','750','295','0',NULL,NULL,'','','','1');";
			    Yii::app()->db->createCommand($sql)->execute();
		        return true;
	}

	public function down()
	{
     $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 154;";
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