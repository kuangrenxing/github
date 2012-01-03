<?php

class m110824_085619_tpl_950_school extends CDbMigration
{
    public function up()
    {
        $sql="
            INSERT INTO `template` (`id`, `name`, `view_name`, `tag_image`, `preview_image`, `item_count`,`width`,`height`) VALUES
            (125, '950-开学季', '950_school', '950_school.gif', '950_school.gif', 5,950,510)
            ;";
        Yii::app()->db->createCommand($sql)->execute(); 
        return true;
    }

    public function down()
    {
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 125;" ;
        Yii::app()->db->createCommand($sql)->execute();
        return true;
    }     
}
