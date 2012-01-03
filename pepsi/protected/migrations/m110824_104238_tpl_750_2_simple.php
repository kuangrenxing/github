<?php

class m110824_104238_tpl_750_2_simple extends CDbMigration
{
    public function up()
    {
        $sql="
            INSERT INTO `template` (`id`, `name`, `view_name`, `tag_image`, `preview_image`, `item_count`,`width`,`height`) VALUES
            (126, '750-简约版-2个宝贝', '750_2_simple', '750_2_simple.gif', '750_2_simple.gif', 2,750,330)
            ;";
        Yii::app()->db->createCommand($sql)->execute(); 
        return true;
    }

    public function down()
    {
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 126;" ;
        Yii::app()->db->createCommand($sql)->execute();
        return true;
    }    
}
