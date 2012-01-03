<?php

class m110830_084535_tpl_750_3_colorfull extends CDbMigration
{
	public function up()
    {
        $sql="
            INSERT INTO `template` (`id`, `name`, `view_name`, `tag_image`, `preview_image`, `item_count`,`width`,`height`) VALUES
             (130,  '750-多底色-蓝',   '750_3_colorfull_blue', '750_3_colorfull_blue.gif', '750_3_colorfull_blue.gif', 3,750,280)
             ,(131,  '750-多底色-灰',   '750_3_colorfull_gray', '750_3_colorfull_gray.gif', '750_3_colorfull_gray.gif', 3,750,280)
             ,(132,  '750-多底色-格子', '750_3_colorfull_grid', '750_3_colorfull_grid.gif', '750_3_colorfull_grid.gif', 3,750,280)
             ,(133,  '750-多底色-斜条', '750_3_colorfull_twill', '750_3_colorfull_twill.gif', '750_3_colorfull_twill.gif', 3,750,280)
            ;";
        Yii::app()->db->createCommand($sql)->execute(); 
        return true; 
    }

    public function down()
    {
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 130;
        DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 131;
        DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 132; 
        DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 133; 
        " ;
        Yii::app()->db->createCommand($sql)->execute();
        return true;    	
    }

	
}
