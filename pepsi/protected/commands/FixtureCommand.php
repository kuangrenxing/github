<?php

class FixtureCommand extends CConsoleCommand
{
    public function __construct($name,$runner)
    {
        parent::__construct($name,$runner);

    }

    public function actionIndex()
    {
        echo $this->help;
    }


    public function actionTemplate_20110706($insert="yes")
    {
        if(strtolower($insert)==="yes"||strtolower($insert)==="y")
        {
            $sql = "INSERT INTO `template` (`id`, `name`, `view_name`, `layout`, `preview_image`) VALUES (1, '超级', 'super', 1, 'super.jpg'), (2, '团购', 'groupon', 2, 'groupon.jpg');";
            $result = Yii::app()->db->createCommand($sql)->query();
            echo "insert 2 template for test\n";
        }

        if(strtolower($insert)==="no"||strtolower($insert)==="n")
        {
            $sql = "DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 1;
            DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 2;";
            $result = Yii::app()->db->createCommand($sql)->query();
            echo "delete 2 template for test\n";
        }


    }

    public function actionUser_20110804()
    {
        $filePath = Yii::getPathOfAlias('webroot').'/data/nicks.txt';
        $nickList = explode("\n",file_get_contents($filePath));
        $nickList=array_chunk($nickList,40);
        
        $errorNicks=array();

        foreach($nickList as $k=>$nicks)
        {
            $users = $this->_getUsersByNicks(implode(",", $nicks));
            foreach($users as $key=>$userInfo)
            {
                $user = User::model()->findByPk($userInfo->user_id);
                $user = $user?$user:(new User);
                $user = User::setUserInfoFromTop($user,$userInfo);
                if(!$user->save())
                {
                    var_dump($user->errors);
                    var_dump($user->attributes);
                    echo $user->nick." fetched failed \r\n";
                    array_push($errorNicks,$user->nick);
                }
            }
            sleep(0.6);
        }

        var_dump($errorNicks);

    }
    
    public function actionShop_20110822()
    {
        $sql = "select nick from user;";
        $nickList = Yii::app()->db->createCommand($sql)->queryColumn();

        $errorNicks=array();
        
        foreach($nickList as $k=>$nick)
        {
            $req = new ShopGetRequest;
            $req->setFields("sid,cid,title,nick,pic_path,created,modified,shop_score,remain_count,all_count,used_count");
            $req->setNick($nick);
            $resshop = Yii::app()->top->execute($req);

            $user = User::model()->findByAttributes(array('nick'=>$nick));
            $user = $user?$user:(new User);
            $userInfo = array();
            if(isset($resshop->shop))
            {
                $shopInfo = $resshop->shop;
                $user = User::setUserInfoFromTop($user,$userInfo,$shopInfo);
                if(!$user->save())
                {
                    var_dump($user->errors);
                    var_dump($user->attributes);
                    echo $user->nick." fetched failed \r\n";
                    array_push($errorNicks,$user->nick);
                }
            }
            unset($user);
            echo($k."\n");
            sleep(0.5);
        }

        var_dump($errorNicks);

    } 


    private static function _getUsersByNicks($nicks)
    {

        $req = new UsersGetRequest;
        $req->setFields("user_id,uid,sex,nick,email,seller_credit,buyer_credit,location,created,last_visit,birthday,type,consumer_protection,alipay_account,alipay_no,avatar, liangpin,sign_food_seller_promise,is_lighting_consignment,vip_info,vertical_market");
        $req->setNicks($nicks);
        $resp = Yii::app()->top->execute($req);
        if (!$resp)
        {
            echo "error; \n";
            return false;
        }
        else
        {
            return $resp->users->user;
        }
    }


}




?>
