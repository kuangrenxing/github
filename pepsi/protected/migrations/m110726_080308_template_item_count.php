<?php

class m110726_080308_template_item_count extends CDbMigration
{
	public function safeUp()
    {
        $sql="
           ALTER TABLE  `template` ADD  `item_count` TINYINT NOT NULL DEFAULT  '0'; 
            ";
        Yii::app()->db->createCommand($sql)->execute();
    }

    public function safeDown()
    {
        $sql="ALTER TABLE `template` DROP `item_count`;" ;
        Yii::app()->db->createCommand($sql)->execute();
    }
}
