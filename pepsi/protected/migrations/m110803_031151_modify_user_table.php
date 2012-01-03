<?php

class m110803_031151_modify_user_table extends CDbMigration
{
	public function safeUp()
	{
		$sql="ALTER TABLE  `user` CHANGE  `buyer_credit`  `buyer_credit_level` VARCHAR( 256 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
		ALTER TABLE  `user` CHANGE  `seller_credit`  `seller_credit_level` VARCHAR( 256 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
		ALTER TABLE  `user` CHANGE  `birhday`  `birthday` INT(11) UNSIGNED  NULL;";
		Yii::app()->db->createCommand($sql)->execute();
	}

	public function safeDown()
	{
		$sql="ALTER TABLE  `user` CHANGE  `buyer_credit_level`  `buyer_credit` VARCHAR( 256 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
		ALTER TABLE  `user` CHANGE  `seller_credit_level`  `seller_credit` VARCHAR( 256 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
		ALTER TABLE  `user` CHANGE  `birthday`  `birhday` INT(11) UNSIGNED  NULL;";
		Yii::app()->db->createCommand($sql)->execute();
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