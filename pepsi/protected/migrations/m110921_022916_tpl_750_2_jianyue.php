<?php

class m110921_022916_tpl_750_2_jianyue extends CDbMigration
{
	public function up()
	{
	    $sql = "INSERT INTO  `pepsi`.`template` (
`id`,`name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
VALUES (
'142','简约版2','750_2_jianyue','750_2_jianyue.gif','750_2_jianyue.gif','2','750','330','0',NULL,NULL,'','','','1');";
	    Yii::app()->db->createCommand($sql)->execute();
        return true;
	}

	public function down()
	{
	    $sql = "DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 142;";
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