<?php

class m111025_125018_tpl_950_4_bigsale extends CDbMigration
{
	public function up()
	{
		      $sql = "INSERT INTO  `pepsi`.`template` (
		`id`, `name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
		VALUES (
		'152','950搭配减价3宝贝','950_4_bigsale','950_4_bigsale.jpg','950_4_bigsale_prew.jpg','4','950','300','0',NULL,NULL,'','','','1');";
			    Yii::app()->db->createCommand($sql)->execute();
		        return true;
	}

	public function down()
	{
       $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 152;";
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