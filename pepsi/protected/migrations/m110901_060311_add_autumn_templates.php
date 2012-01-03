<?php

class m110901_060311_add_autumn_templates extends CDbMigration
{
    public function up()
    {
        $sql = "INSERT INTO  `pepsi`.`template` (
`id`,`name`,`view_name`,`tag_image`,`preview_image`,`item_count`,`width`,`height`,`grade`,`user_count`,`like_count`,`created`,`updated`,`order`,`status`)
VALUES (
'137','190中秋特别版','190_5_autumn','190_5_autumn.gif','190_5_autumn.gif','5',190,810,'0',NULL,NULL,'','','','1'),(
'138','750中秋特别版','750_5_autumn','750_5_autumn.gif','750_5_autumn.gif','5',750,265,'0',NULL,NULL,'','','','1'),(
'139','950中秋特别版','950_5_autumn','950_5_autumn.gif','950_5_autumn.gif','5',950,335,'0',NULL,NULL,'','','','1')
;";
        Yii::app()->db->createCommand($sql)->execute();
        return true;
    }

    public function down()
    {
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 137;
        DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 138;
        DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 139;
        " ;
        Yii::app()->db->createCommand($sql)->execute();
        return true; 
    }

    /*
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
