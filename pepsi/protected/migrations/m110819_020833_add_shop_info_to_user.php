<?php

class m110819_020833_add_shop_info_to_user extends CDbMigration
{
	public function up()
	{
     $sql="ALTER TABLE  `user` ADD  `sid` INT( 11 ) UNSIGNED  NULL ,
			ADD  `cid` INT( 11 ) UNSIGNED NULL,
			ADD  `title` VARCHAR( 256 ) NULL,
			ADD  `pic_path` VARCHAR( 256 )  NULL,
			ADD  `shop_created` INT( 11 ) UNSIGNED NULL,
			ADD  `shop_modified` INT( 11 )  UNSIGNED NULL,
			ADD  `item_score` CHAR( 6 )  NULL,
			ADD  `service_score` CHAR( 6 )  NULL,
			ADD  `delivery_score` CHAR( 6 )  NULL,
			ADD  `remain_count` SMALLINT( 5 ) UNSIGNED NULL,
			ADD  `all_count` SMALLINT( 5)  UNSIGNED NULL,
			ADD  `used_count` SMALLINT( 5 )  UNSIGNED NULL,
			ADD  `login_count` INT( 11 )  UNSIGNED NULL,
			ADD  `service_started` INT( 11 )  UNSIGNED NULL,
			ADD  `service_ended` INT( 11 )  UNSIGNED NULL
		";
		Yii::app()->db->createCommand($sql)->execute(); 
    }

	public function down()
    {
        $sql="ALTER TABLE `user`
  			DROP `sid`,
  			DROP `cid`,
  			DROP `title`,
  			DROP `pic_path`,
  			DROP `shop_created`,
  			DROP `shop_modified`,
  			DROP `item_score`,
  			DROP `service_score`,
  			DROP `delivery_score`,
  			DROP `remain_count`,
  			DROP `all_count`,
  			DROP `used_count`,
  			DROP `login_count`,
  			DROP `service_started`,
  			DROP `service_ended`
  			
  		";
		Yii::app()->db->createCommand($sql)->execute(); 
	}

}
