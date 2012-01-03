<?php

class m111025_030834_tpl_950_month_2 extends CDbMigration
{
	public function up()
	{
       $sql = "INSERT INTO  `pepsi`.`template` (
`id`, `name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
VALUES (
'148','950灰底纹当前月','950_2_month','950_2_month.jpg','950-Gray-pattern.jpg','2','950','460','0',NULL,NULL,'','','','1');";
	    Yii::app()->db->createCommand($sql)->execute();
        return true;
	}

	public function down()
	{
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 148;";
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
