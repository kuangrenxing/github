<?php

class m110809_022026_new_tpl_systerm extends CDbMigration
{
	public function up()
	{
        $sql="SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

ALTER TABLE `pepsi`.`template` ADD COLUMN `width` VARCHAR(45) NULL DEFAULT NULL  AFTER `item_count` , ADD COLUMN `height` VARCHAR(45) NULL DEFAULT NULL  AFTER `width` , ADD COLUMN `grade` TINYINT(4) UNSIGNED NOT NULL DEFAULT 0  AFTER `height` , ADD COLUMN `user_count` INT(10) UNSIGNED NULL DEFAULT NULL  AFTER `grade` , ADD COLUMN `like_count` INT(10) UNSIGNED NULL DEFAULT NULL  AFTER `user_count` , ADD COLUMN `created` INT(11) UNSIGNED NOT NULL  AFTER `like_count` , ADD COLUMN `updated` INT(11) UNSIGNED NOT NULL  AFTER `created` , ADD COLUMN `order` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT  AFTER `updated` , CHANGE COLUMN `id` `id` INT(10) UNSIGNED NOT NULL  
, ADD UNIQUE INDEX `order_UNIQUE` (`order` ASC) ;

ALTER TABLE `pepsi`.`meal` ADD COLUMN `created` INT(11) UNSIGNED NOT NULL  AFTER `html` , ADD COLUMN `updated` INT(11) UNSIGNED NOT NULL  AFTER `created` ;

CREATE  TABLE IF NOT EXISTS `pepsi`.`user_like` (
  `user_id` VARCHAR(128) NOT NULL ,
  `template_id` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`user_id`, `template_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
" ;
        Yii::app()->db->createCommand($sql)->execute();
    }

	public function down()
    {
        $sql="
            SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
        SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
        SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';          

        DROP  TABLE `pepsi`.`user_like` ;
        ALTER TABLE `pepsi`.`template` DROP COLUMN `width` ,
            DROP COLUMN `height` ,
            DROP COLUMN `grade`  ,
            DROP COLUMN `user_count` ,
            DROP COLUMN `like_count` ,
            DROP COLUMN `created` ,
            DROP COLUMN `updated` ,
            DROP COLUMN `order` ;

        ALTER TABLE `pepsi`.`meal` DROP COLUMN `created` , DROP COLUMN `updated` ;
        SET SQL_MODE=@OLD_SQL_MODE;
        SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
        SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS; 
        " ;
        Yii::app()->db->createCommand($sql)->execute();
    }

}
