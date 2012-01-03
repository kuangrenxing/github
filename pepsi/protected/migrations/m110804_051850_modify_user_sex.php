<?php

class m110804_051850_modify_user_sex extends CDbMigration
{
	public function up()
	{
		$sql="
		ALTER TABLE  `user` CHANGE  `sex`  `sex` CHAR( 2 ) NULL;";
        Yii::app()->db->createCommand($sql)->execute();
        return true;
    }

	public function down()
	{
		$sql="
            ALTER TABLE  `user` CHANGE  `sex`  `sex` tinyint(1) unsigned DEFAULT NULL;";
		Yii::app()->db->createCommand($sql)->execute();
        return true;
	}

	
}
