<?php

class m110902_054125_add_red_black_4 extends CDbMigration
{
    public function up()
	{
	    $sql = "INSERT INTO  `pepsi`.`template` (`id`,`name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
VALUES (
'140','红与黑','750_4_red_black','750_4_red_black.gif','750_4_red_black.gif','4',750,180,'0', NULL , NULL ,  '',  '',  '',  '1');";
	    Yii::app()->db->createCommand($sql)->execute();
        return true;
	}

	public function down()
	{
		$sql="DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 140;";
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