<?php

class m110804_120202_tpl_950_narrow extends CDbMigration
{
	public function up()
	{
        $sql="
            INSERT INTO `template` (`id`, `name`, `view_name`, `tag_image`, `preview_image`, `item_count`) VALUES
            (21, '950-通用(窄版)', '950_narrow', '950_narrow.gif', '950_narrow.gif', 5)
        ;";
        Yii::app()->db->createCommand($sql)->execute(); 
		return true;
	}

	public function down()
	{
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 21;" ;
        Yii::app()->db->createCommand($sql)->execute();
		return true;
	}

}
