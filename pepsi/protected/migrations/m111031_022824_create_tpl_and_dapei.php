<?php

class m111031_022824_create_tpl_and_dapei extends CDbMigration
{
	public function up()
    {
        $sql = "
-- phpMyAdmin SQL Dump
-- version 3.5.0-dev
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2011 at 03:17 PM
-- Server version: 5.1.58
-- PHP Version: 5.3.6

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

--
-- Database: `pepsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `dapei`
--

CREATE TABLE IF NOT EXISTS `dapei` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(128) NOT NULL,
  `template_id` int(10) unsigned NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `publish_status` tinyint(3) unsigned NOT NULL,
  `publish_count` int(10) unsigned DEFAULT NULL,
  `html` text NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `updated` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dapei_meal`
--

CREATE TABLE IF NOT EXISTS `dapei_meal` (
  `taocan_id` int(10) unsigned NOT NULL,
  `meal_id` int(10) unsigned NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `meal_name` varchar(256) NOT NULL,
  `meal_price` varchar(45) NOT NULL,
  `postage_id` int(11) DEFAULT NULL,
  `meal_memo` text,
  `status` tinyint(3) unsigned NOT NULL,
  `template_id` int(10) unsigned NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `updated` int(10) unsigned NOT NULL,
  PRIMARY KEY (`taocan_id`,`meal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tpl`
--

CREATE TABLE IF NOT EXISTS `tpl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `group_name` varchar(45) NOT NULL,
  `group_slug` varchar(45) NOT NULL,
  `item_count` tinyint(4) NOT NULL DEFAULT '0',
  `width` varchar(45) NOT NULL,
  `height` varchar(45) NOT NULL,
  `grade` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned NOT NULL,
  `multi` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `user_count` int(10) unsigned DEFAULT '0',
  `like_count` int(10) unsigned DEFAULT '0',
  `created` int(10) unsigned NOT NULL,
  `updated` int(10) unsigned NOT NULL,
  `order` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
        ";

        return Yii::app()->db->createCommand($sql)->execute();

    }

    public function down()
    {
        $this->dropTable('tpl');
        $this->dropTable('dapei');
        $this->dropTable('dapei_meal');
    }

}
