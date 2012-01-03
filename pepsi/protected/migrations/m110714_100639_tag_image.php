<?php

class m110714_100639_tag_image extends CDbMigration
{
	public function safeUp()
	{
        $sql=" ALTER TABLE  `template` CHANGE  `layout`  `tag_image` VARCHAR( 45 ) NOT NULL";
        Yii::app()->db->createCommand($sql)->execute();
	}

	public function safeDown()
    {
        echo "this does not support migration down.\n";
        return false;
	}
}
