<?php

class m111026_054552_hide_bigsale_templs extends CDbMigration
{
	public function up()
	{
		$sql=" 
            UPDATE  `pepsi`.`template` SET  `status` =  '0' WHERE  `template`.`id` =122;
            UPDATE  `pepsi`.`template` SET  `status` =  '0' WHERE  `template`.`id` =123;
            UPDATE  `pepsi`.`template` SET  `status` =  '0' WHERE  `template`.`id` =124;
			UPDATE  `pepsi`.`template` SET  `status` =  '0' WHERE  `template`.`id` =125;
            UPDATE  `pepsi`.`template` SET  `status` =  '0' WHERE  `template`.`id` =143;
            UPDATE  `pepsi`.`template` SET  `status` =  '0' WHERE  `template`.`id` =144;
            UPDATE  `pepsi`.`template` SET  `status` =  '0' WHERE  `template`.`id` =145;
            UPDATE  `pepsi`.`template` SET  `status` =  '0' WHERE  `template`.`id` =137;
            UPDATE  `pepsi`.`template` SET  `status` =  '0' WHERE  `template`.`id` =138;
            UPDATE  `pepsi`.`template` SET  `status` =  '0' WHERE  `template`.`id` =139;
        ";
        Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
		$sql=" 
            UPDATE  `pepsi`.`template` SET  `status` =  '1' WHERE  `template`.`id` =122;
            UPDATE  `pepsi`.`template` SET  `status` =  '1' WHERE  `template`.`id` =123;
            UPDATE  `pepsi`.`template` SET  `status` =  '1' WHERE  `template`.`id` =124;
			UPDATE  `pepsi`.`template` SET  `status` =  '1' WHERE  `template`.`id` =125;
            UPDATE  `pepsi`.`template` SET  `status` =  '1' WHERE  `template`.`id` =143;
            UPDATE  `pepsi`.`template` SET  `status` =  '1' WHERE  `template`.`id` =144;
            UPDATE  `pepsi`.`template` SET  `status` =  '1' WHERE  `template`.`id` =145;
            UPDATE  `pepsi`.`template` SET  `status` =  '1' WHERE  `template`.`id` =137;
            UPDATE  `pepsi`.`template` SET  `status` =  '1' WHERE  `template`.`id` =138;
            UPDATE  `pepsi`.`template` SET  `status` =  '1' WHERE  `template`.`id` =139;
        ";
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
