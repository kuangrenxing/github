<?php

class m111115_015807_create_table_depei_dapei_meal extends CDbMigration
{
	public function up()
	{
		$sql = "CREATE  TABLE IF NOT EXISTS `pepsi`.`dapei` (
		  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
		  `user_id` VARCHAR(128) NOT NULL ,
		  `template_id` INT UNSIGNED NOT NULL ,
		  `title` VARCHAR(256) NULL ,
		  `status` TINYINT UNSIGNED NOT NULL ,
		  `publish_status` TINYINT UNSIGNED NOT NULL ,
		  `publish_count` INT UNSIGNED NULL ,
		  `html` TEXT NOT NULL ,
		  `created` INT UNSIGNED NOT NULL ,
		  `updated` INT UNSIGNED NOT NULL ,
		  PRIMARY KEY (`id`) )
		ENGINE = MyISAM
		DEFAULT CHARACTER SET = utf8
		COLLATE = utf8_general_ci;";
		
		Yii::app()->db->createCommand($sql)->execute();
		
		$sql = "CREATE  TABLE IF NOT EXISTS `pepsi`.`dapei_meal` (
		  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
		  `dapei_id` INT UNSIGNED NOT NULL ,
		  `meal_id` INT UNSIGNED NOT NULL ,
		  `title` VARCHAR(256) NULL ,
		  `meal_name` VARCHAR(256) NOT NULL ,
		  `meal_price` VARCHAR(45) NOT NULL ,
		  `postage_id` INT NULL ,
		  `meal_memo` TEXT NULL ,
		  `status` TINYINT UNSIGNED NOT NULL ,
		  `order` TINYINT UNSIGNED NOT NULL ,
		  `template_id` INT UNSIGNED NOT NULL ,
		  `created` INT UNSIGNED NOT NULL ,
		  `updated` INT UNSIGNED NOT NULL ,
		  PRIMARY KEY (`id`) )
		ENGINE = MyISAM
		DEFAULT CHARACTER SET = utf8
		COLLATE = utf8_general_ci;";
		Yii::app()->db->createCommand($sql)->execute();
		
		return true;
	}

	public function down()
	{
		$this->dropTable('dapei');
		return $this->dropTable('dapei_meal');
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
