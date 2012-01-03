<?php

class m111107_025421_new_tpl_test_data extends CDbMigration
{
	public function up()
	{
        /*
		$sql = "INSERT INTO `tpl` (`id`, `name`, `group_name`, `group_slug`, `item_count`, `width`, `height`, `grade`, `type`, `user_count`, `like_count`, `created`, `updated`, `order`, `status`) VALUES
		(1, '国庆节', 'test', 'test', 2, '750', '200', 0, 0, 0, 0, 1320048751, 1320049856, 0, 0),
		(2, '11.11节', '1111', '1111', 3, '750', '200', 0, 1, 0, 0, 1320048751, 1320049856, 0, 0),
		(3, '感恩节', 'ganen', 'ganen', 3, '750', '200', 0, 0, 0, 0, 1320048751, 1320049856, 0, 0);
		";
		return Yii::app()->db->createCommand($sql)->execute();
        */
	}

	public function down()
	{
        /*
        $sql=" DELETE FROM `pepsi`.`tpl` WHERE `template`.`id` = 1;";
        Yii::app()->db->createCommand($sql)->execute();
		$sql=" DELETE FROM `pepsi`.`tpl` WHERE `template`.`id` = 2;";
        Yii::app()->db->createCommand($sql)->execute();
		$sql=" DELETE FROM `pepsi`.`tpl` WHERE `template`.`id` = 3;";
        Yii::app()->db->createCommand($sql)->execute();
        */
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
