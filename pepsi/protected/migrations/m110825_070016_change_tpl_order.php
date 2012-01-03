<?php

class m110825_070016_change_tpl_order extends CDbMigration
{
	public function up()
    {
        $sql="
           ALTER TABLE `template` CHANGE `order` `order` INT( 10 ) UNSIGNED NOT NULL;
           ALTER TABLE `template` DROP INDEX `order_UNIQUE`;";
        Yii::app()->db->createCommand($sql)->execute();
       $sql2="
           UPDATE `pepsi`.`template` SET `order` = '14' WHERE `template`.`id` = 10;
           UPDATE `pepsi`.`template` SET `order` = '15' WHERE `template`.`id` = 20;
           UPDATE `pepsi`.`template` SET `order` = '13' WHERE `template`.`id` = 30;
           UPDATE `pepsi`.`template` SET `order` = '9'  WHERE `template`.`id` = 101;
           UPDATE `pepsi`.`template` SET `order` = '10' WHERE `template`.`id` = 102;
           UPDATE `pepsi`.`template` SET `order` = '11' WHERE `template`.`id` = 103;
           UPDATE `pepsi`.`template` SET `order` = '12' WHERE `template`.`id` = 104;
           UPDATE `pepsi`.`template` SET `order` = '99' WHERE `template`.`id` = 110;
           UPDATE `pepsi`.`template` SET `order` = '99' WHERE `template`.`id` = 111;
           UPDATE `pepsi`.`template` SET `order` = '17' WHERE `template`.`id` = 121;
           UPDATE `pepsi`.`template` SET `order` = '18' WHERE `template`.`id` = 120;
           UPDATE `pepsi`.`template` SET `order` = '16' WHERE `template`.`id` = 21;
           UPDATE `pepsi`.`template` SET `order` = '2'  WHERE `template`.`id` = 122;
           UPDATE `pepsi`.`template` SET `order` = '3'  WHERE `template`.`id` = 123;
           UPDATE `pepsi`.`template` SET `order` = '1'  WHERE `template`.`id` = 124;
           UPDATE `pepsi`.`template` SET `order` = '4'  WHERE `template`.`id` = 125;
           UPDATE `pepsi`.`template` SET `order` = '8'  WHERE `template`.`id` = 126;
           UPDATE `pepsi`.`template` SET `order` = '5'  WHERE `template`.`id` = 127;
           UPDATE `pepsi`.`template` SET `order` = '6'  WHERE `template`.`id` = 128;
           UPDATE `pepsi`.`template` SET `order` = '7'  WHERE `template`.`id` = 129;
           ";
        Yii::app()->db->createCommand($sql2)->execute();
    }

    public function down()
    {
        echo "m110825_070016_change_tpl_order does not support migration down.\n";
        return false;
    }

}
