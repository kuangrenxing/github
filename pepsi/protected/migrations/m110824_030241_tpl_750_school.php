<?php

class m110824_030241_tpl_750_school extends CDbMigration
{
	public function up()
	{
        $sql="
            INSERT INTO `template` (`id`, `name`, `view_name`, `tag_image`, `preview_image`, `item_count`,`width`,`height`) VALUES
            (123, '750-开学季-高版', '750_school', '750_school.gif', '750_school.gif', 5,750,400)
        ;";
        Yii::app()->db->createCommand($sql)->execute(); 
		return true;
	}

	public function down()
	{
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 123;" ;
        Yii::app()->db->createCommand($sql)->execute();
		return true;
	} 
}
