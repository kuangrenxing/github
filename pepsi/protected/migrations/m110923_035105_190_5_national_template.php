<?php

class m110923_035105_190_5_national_template extends CDbMigration
{
	public function up()
	{
	    $sql = "INSERT INTO  `pepsi`.`template` (`id`,`name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
VALUES ('143',  '190国庆版',  '190_5_national',  '190_5_national.gif',  '190_5_national.gif',  '5',  '190', '680' ,  '0', NULL , NULL ,  '',  '',  '',  '1');";
	    return Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
		$sql = "DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 143;";
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
