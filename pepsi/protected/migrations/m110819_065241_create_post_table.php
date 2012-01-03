<?php

class m110819_065241_create_post_table extends CDbMigration
{
	public function up()
    { 
        $sql="CREATE TABLE  IF NOT EXISTS `pepsi`.`post` (
			`id` INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`title`  VARCHAR( 256 ) NOT NULL ,
			`url`    VARCHAR( 256 ) NOT NULL ,
			`type`   TINYINT( 4 ) UNSIGNED NOT NULL ,
			`status` TINYINT( 4 ) UNSIGNED NOT NULL ,
			`published` INT( 11 ) UNSIGNED NOT NULL ,
			`created` INT( 11 ) UNSIGNED NOT NULL ,
			`updated` INT( 11 ) UNSIGNED NOT NULL
			) ENGINE = MYISAM ;";
		Yii::app()->db->createCommand($sql)->execute(); 
	}

	public function safeDown()
	{
		$this->dropTable('post');
	}

}
