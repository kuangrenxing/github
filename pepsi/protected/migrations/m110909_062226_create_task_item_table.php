<?php

class m110909_062226_create_task_item_table extends CDbMigration
{
	public function up()
	{
	    $sql = "CREATE TABLE  `pepsi`.`task_item` (
            `task_id` INT UNSIGNED NOT NULL ,
            `item_id` VARCHAR(128) NOT NULL ,
            `item_name` VARCHAR( 128 ) NOT NULL ,
            `position` tinyint UNSIGNED NOT NULL,
            `status` tinyint  UNSIGNED NOT NULL,
            PRIMARY KEY (  `task_id` ,  `item_id` )
        ) ENGINE = MYISAM ;";
        Yii::app()->db->createCommand($sql)->execute();
    }

	public function down()
	{
		$this->dropTable('task_item');
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
