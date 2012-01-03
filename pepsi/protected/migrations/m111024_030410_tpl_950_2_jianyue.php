<?php

class m111024_030410_tpl_950_2_jianyue extends CDbMigration
{
	public function up()
	{
       $sql = "INSERT INTO  `pepsi`.`template` (
`id`, `name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
VALUES (
'146','简约版2','950_2_jianyue','950_2_jianyue.gif','950_2_jianyue.jpg','2','950','420','0',NULL,NULL,'','','','1');";
	    Yii::app()->db->createCommand($sql)->execute();
        return true;
	
	}



	public function down()
	{
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 146;";
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
