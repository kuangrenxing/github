<?php

class m110902_061550_add_apple_4 extends CDbMigration
{
    public function up()
	{
	    $sql = "INSERT INTO  `pepsi`.`template` (`id`,`name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
VALUES (
'141','苹果风','750_4_apple','750_4_apple.jpg','750_4_apple.gif','4',750,210,'0', NULL , NULL ,  '',  '',  '',  '1');";
	    Yii::app()->db->createCommand($sql)->execute();
        return true;
	}

	public function down()
	{
		$sql="DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 141;";
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