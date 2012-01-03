<?php

class m111025_114834_tpl_750_collect_2 extends CDbMigration
{
	public function up()
	{
       $sql = "INSERT INTO  `pepsi`.`template` (
`id`, `name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
VALUES (
'149','750搭配减价2个宝贝','750_2_collect','750_2_collet.jpg','750_2_collect_prew.jpg','2','750','290','0',NULL,NULL,'','','','1');";
	    Yii::app()->db->createCommand($sql)->execute();
        return true;
	}

	public function down()
	{
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 149;";
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
