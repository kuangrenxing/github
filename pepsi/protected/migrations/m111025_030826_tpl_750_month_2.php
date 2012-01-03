<?php

class m111025_030826_tpl_750_month_2 extends CDbMigration
{
	public function up()
	{
       $sql = "INSERT INTO  `pepsi`.`template` (
`id`, `name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
VALUES (
'147','750灰底纹当前月','750_2_month','750_2_month.jpg','750_2_month_prew.jpg','2','750','365','0',NULL,NULL,'','','','1');";
	    Yii::app()->db->createCommand($sql)->execute();
        return true;
	}

	public function down()
	{
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 147;";
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
