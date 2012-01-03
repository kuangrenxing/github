<?php

class m111025_125041_tpl_750_2_bigsale extends CDbMigration
{
	public function up()
	{
		      $sql = "INSERT INTO  `pepsi`.`template` (
		`id`, `name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
		VALUES (
		'153','950搭配减价3宝贝','750_2_bigsale','750_2_bigsale.jpg','750_2_bigsale_prew.jpg','2','750','340','0',NULL,NULL,'','','','1');";
			    Yii::app()->db->createCommand($sql)->execute();
		        return true;
	}

	public function down()
	{
     $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 153;";
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