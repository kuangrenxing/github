<?php

class m110923_054002_950_2_national_template extends CDbMigration
{
	public function up()
	{
	    $sql = "INSERT INTO  `pepsi`.`template` (`id`,`name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
VALUES ('145',  '950国庆版',  '950_2_national',  '950_2_national.gif',  '950_2_national.gif',  '2',  '950', '500' ,  '0', NULL , NULL ,  '',  '',  '',  '1');";
	    return Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
		$sql = "DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 145;";
		return Yii::app()->db->createCommand($sql)->execute();
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
