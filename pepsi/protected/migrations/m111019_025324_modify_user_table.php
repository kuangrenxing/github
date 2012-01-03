<?php

class m111019_025324_modify_user_table extends CDbMigration
{
	public function up()
	{
        $sql=" ALTER TABLE `user` CHANGE `buyer_credit_level` `buyer_credit_level` INT UNSIGNED NULL DEFAULT NULL ,
                                 CHANGE `seller_credit_level` `seller_credit_level` INT UNSIGNED NULL DEFAULT NULL ";
		Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
		echo "m111019_025324_modify_user_table does not support migration down.\n";
		return false;
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
