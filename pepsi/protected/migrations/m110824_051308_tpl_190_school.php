<?php

class m110824_051308_tpl_190_school extends CDbMigration
{
    public function up()
    {
        $sql="
            INSERT INTO `template` (`id`, `name`, `view_name`, `tag_image`, `preview_image`, `item_count`,`width`,`height`) VALUES
            (124, '190-开学季', '190_school', '190_school.gif', '190_school.gif', 5,190,595)
            ;";
        Yii::app()->db->createCommand($sql)->execute(); 
        return true;
    }

    public function down()
    {
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 124;" ;
        Yii::app()->db->createCommand($sql)->execute();
        return true;
    }    
}
