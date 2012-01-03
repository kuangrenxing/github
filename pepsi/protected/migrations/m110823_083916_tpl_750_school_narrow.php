<?php

class m110823_083916_tpl_750_school_narrow extends CDbMigration
{
	public function up()
	{
        $sql="
            INSERT INTO `template` (`id`, `name`, `view_name`, `tag_image`, `preview_image`, `item_count`,`width`,`height`) VALUES
            (122, '750-开学季(窄版)', '750_school_narrow', '750_school_narrow.gif', '750_school_narrow.gif', 5,750,240)
        ;";
        Yii::app()->db->createCommand($sql)->execute(); 
		return true;
	}

	public function down()
	{
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 122;" ;
        Yii::app()->db->createCommand($sql)->execute();
		return true;
	} 
}
