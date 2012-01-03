<?php

class m110923_053315_750_2_national_template extends CDbMigration
{
	public function up()
	{
	    $sql = "INSERT INTO  `pepsi`.`template` (`id`,`name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
VALUES ('144',  '750国庆版',  '750_2_national',  '750_2_national.gif',  '750_2_national.gif',  '2',  '750', '325' ,  '0', NULL , NULL ,  '',  '',  '',  '1');";
	    return Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
		$sql = "DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 144;";
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
