<?php

class m110803_093601_tpl_750_3_kacha extends CDbMigration
{
	public function up()
    {
        $sql="
            INSERT INTO `template` (`id`, `name`, `view_name`, `tag_image`, `preview_image`, `item_count`) VALUES
            (120, '750-咔嚓版(右)-3个宝贝', '750_3_kacha_right', '750_3_kacha_right.gif', '750_3_kacha_right.gif', 3),
            (121, '750-咔嚓版(左)-3个宝贝', '750_3_kacha_left', '750_3_kacha_left.gif', '750_3_kacha_left.gif', 3) 
        ;";
        Yii::app()->db->createCommand($sql)->execute(); 
	}

	public function down()
	{
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 120; DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 121;" ;
        Yii::app()->db->createCommand($sql)->execute();
	}

}
