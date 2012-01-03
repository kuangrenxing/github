<?php

class m110824_110924_tpl_750_color extends CDbMigration
{
    public function up()
    {
        $sql="
            INSERT INTO `template` (`id`, `name`, `view_name`, `tag_image`, `preview_image`, `item_count`,`width`,`height`) VALUES
            (127,  '750-三色配-绿', '750_color_green', '750_color_green.gif', '750_color_green.gif', 5,750,175)
            ,(128, '750-三色配-橘', '750_color_orange', '750_color_orange.gif', '750_color_orange.gif', 5,750,175)
            ,(129, '750-三色配-蓝', '750_color_blue', '750_color_blue.gif', '750_color_blue.gif', 5,750,175)
            ;";
        Yii::app()->db->createCommand($sql)->execute(); 
        return true;
    }

    public function down()
    {
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 127;
        DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 128;
        DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 129; 
        " ;
        Yii::app()->db->createCommand($sql)->execute();
        return true;
    }    
}
