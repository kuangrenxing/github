<?php

/** * This is the model class for table "user".  */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, nick', 'required'),
			array('consumer_protection, liangpin, sign_food_seller_promise, has_shop, is_lightning_consignment, remain_count, all_count, used_count', 'numerical', 'integerOnly'=>true),
			array('user_id, nick, email, alipay_account, alipay_no', 'length', 'max'=>128),
			array('uid, buyer_credit_level, seller_credit_level, location, avatar, vip_info, vertical_market, title, pic_path', 'length', 'max'=>256),
			array('sex', 'length', 'max'=>2),
			array('created, last_visit, birthday, last_login, sid, cid, shop_created, shop_modified, login_count, service_started, service_ended', 'length', 'max'=>11),
			array('type', 'length', 'max'=>1),
			array('item_score, service_score, delivery_score', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, uid, nick, email, sex, buyer_credit_level, seller_credit_level, location, created, last_visit, birthday, type, consumer_protection, alipay_account, alipay_no, avatar, liangpin, sign_food_seller_promise, has_shop, is_lightning_consignment, vip_info, vertical_market, last_login, sid, cid, title, pic_path, shop_created, shop_modified, item_score, service_score, delivery_score, remain_count, all_count, used_count, login_count, service_started, service_ended', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'mealCount'=>array(self::STAT,'Meal','user_id'),
			'taskCount'=>array(self::STAT,'Task','user_id'), 
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'uid' => 'Uid',
			'nick' => '用户名',
			'email' => 'Email',
			'sex' => '性别',
			'buyer_credit_level' => '买家信用',
			'seller_credit_level' => '卖家信用',
			'location' => '地址',
			'created' => '用户创建日期',
			'last_visit' => '最后访问时间',
			'birthday' => '生日',
			'type' => '店铺类型',
			'consumer_protection' => 'Consumer Protection',
			'alipay_account' => 'Alipay Account',
			'alipay_no' => 'Alipay No',
			'avatar' => 'Avatar',
			'liangpin' => '无名良品',
			'sign_food_seller_promise' => 'Sign Food Seller Promise',
			'has_shop' => 'Has Shop',
			'is_lightning_consignment' => 'Is Lightning Consignment',
			'vip_info' => 'Vip Info',
			'vertical_market' => 'Vertical Market',
			'last_login' => '最近登录时间',
			'sid' => 'Sid',
			'cid' => 'Cid',
			'title' => '店铺标题',
			'pic_path' => '店标地址',
			'shop_created' => '店铺创建时间',
			'shop_modified' => '店铺修改时间',
			'item_score' => '宝贝描述评分',
			'service_score' => '服务态度评分',
			'delivery_score' => '发货速度评分',
			'remain_count' => '剩余橱窗数',
			'all_count' => '总橱窗数',
			'used_count' => '已经使用的橱窗数',
			'login_count' => '登录次数',
			'service_started' => '应用订购时间',
			'service_ended' => '应用到期时间',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('nick',$this->nick,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('buyer_credit_level',$this->buyer_credit_level,true);
		$criteria->compare('seller_credit_level',$this->seller_credit_level,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('last_visit',$this->last_visit,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('consumer_protection',$this->consumer_protection);
		$criteria->compare('alipay_account',$this->alipay_account,true);
		$criteria->compare('alipay_no',$this->alipay_no,true);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('liangpin',$this->liangpin);
		$criteria->compare('sign_food_seller_promise',$this->sign_food_seller_promise);
		$criteria->compare('has_shop',$this->has_shop);
		$criteria->compare('is_lightning_consignment',$this->is_lightning_consignment);
		$criteria->compare('vip_info',$this->vip_info,true);
		$criteria->compare('vertical_market',$this->vertical_market,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('sid',$this->sid,true);
		$criteria->compare('cid',$this->cid,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('pic_path',$this->pic_path,true);
		$criteria->compare('shop_created',$this->shop_created,true);
		$criteria->compare('shop_modified',$this->shop_modified,true);
		$criteria->compare('item_score',$this->item_score,true);
		$criteria->compare('service_score',$this->service_score,true);
		$criteria->compare('delivery_score',$this->delivery_score,true);
		$criteria->compare('remain_count',$this->remain_count);
		$criteria->compare('all_count',$this->all_count);
		$criteria->compare('used_count',$this->used_count);
		$criteria->compare('login_count',$this->login_count,true);
		$criteria->compare('service_started',$this->service_started,true);
		$criteria->compare('service_ended',$this->service_ended,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>20,
			)
		));
	}
	
	public function mysearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->compare('user_id',$this->user_id,true);
		//$criteria->compare('uid',$this->uid,true);
		$criteria->compare('nick',$this->nick,true);
		//$criteria->compare('email',$this->email,true);
		//$criteria->compare('sex',$this->sex,true);
		//$criteria->compare('buyer_credit_level',$this->buyer_credit_level,true);
		$criteria->compare('seller_credit_level',$this->seller_credit_level,true);
		//$criteria->compare('location',$this->location,true);
		//$criteria->compare('created',$this->created,true);
		//$criteria->compare('last_visit',$this->last_visit,true);
		//$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('type',$this->type,true);
		//$criteria->compare('consumer_protection',$this->consumer_protection);
		//$criteria->compare('alipay_account',$this->alipay_account,true);
		//$criteria->compare('alipay_no',$this->alipay_no,true);
		//$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('liangpin',$this->liangpin);
		//$criteria->compare('sign_food_seller_promise',$this->sign_food_seller_promise);
		//$criteria->compare('has_shop',$this->has_shop);
		//$criteria->compare('is_lightning_consignment',$this->is_lightning_consignment);
		//$criteria->compare('vip_info',$this->vip_info,true);
		//$criteria->compare('vertical_market',$this->vertical_market,true);
		//$criteria->compare('last_login',$this->last_login,true);
		//$criteria->compare('sid',$this->sid,true);
		//$criteria->compare('cid',$this->cid,true);
		$criteria->compare('title',$this->title,true);
		//$criteria->compare('pic_path',$this->pic_path,true);
		//$criteria->compare('shop_created',$this->shop_created,true);
		//$criteria->compare('shop_modified',$this->shop_modified,true);
		//$criteria->compare('item_score',$this->item_score,true);
		//$criteria->compare('service_score',$this->service_score,true);
		//$criteria->compare('delivery_score',$this->delivery_score,true);
		//$criteria->compare('remain_count',$this->remain_count);
		//$criteria->compare('all_count',$this->all_count);
		//$criteria->compare('used_count',$this->used_count);
		//$criteria->compare('login_count',$this->login_count,true);
		//$criteria->compare('service_started',$this->service_started,true);
		//$criteria->compare('service_ended',$this->service_ended,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>20,
			)
		));
	}
	
	public static function getTopActiveUsers()
	{
	        $cache = Yii::app()->cache->get('top_active_users');
	        if(!$cache)
	        {
	            $cache=array();
                $sql = "
                   SELECT p1.user_id,p1.created,p2.nick,p2.sid,p2.type,p2.seller_credit_level,p3.name,count(meal_id) AS meal_count
                     FROM `meal`     p1
                LEFT JOIN `user`     p2
                       ON p1.user_id = p2.user_id
                LEFT JOIN `template` p3
                       ON p1.template_id = p3.id
                 GROUP BY p1.user_id
                 ORDER BY meal_count DESC
                    LIMIT 20 ";
	            $cache = Yii::app()->db->createCommand($sql)->queryAll();
	            
                Yii::app()->cache->set('top_active_users', $cache,21600);
	        }
	
	        return $cache;
    }

    public static function setUserInfoFromTop($user,$userInfo,$shopInfo)
    {
        $shopInfo->shop_created  = $shopInfo->created;
        $shopInfo->shop_modified = $shopInfo->modified;
        unset($shopInfo->created);
        unset($shopInfo->modified);

        $userInfo = (object) array_merge((array) $userInfo, (array) $shopInfo);

        foreach($userInfo as $key=>$value)
        {
            if($user->hasAttribute($key))
            {
                $type = gettype($value);
                switch($type)
                {
                case 'string':
                    $user->$key = (strlen($value)==19&&strtotime($value))?strtotime($value):$value;
                    break;
                case 'boolean':
                    $user->$key = $value?1:0;
                    break;
                case 'integer':
                    $user->$key = $value;
                    break;
                }

            }

            switch($key)
            {
            case 'buyer_credit':
                $user->buyer_credit_level = $value->level;
                break;
            case 'seller_credit':
                $user->seller_credit_level = $value->level;
                break;
            case 'location':
                $locaiton='';
                foreach($value as $k=>$v)
                {
                    $locaiton.=$k.':'.$v;
                }
                $user->$key = $locaiton; 
                break;
            case 'shop_score':
                $user->item_score=$value->item_score;
                $user->service_score=$value->service_score;
                break;
            } 
        } 

        return $user;

    }

    public function getShopTypeOptions()
    {
        return array(
            ''=>'全部',
            'B'=>'商城店铺',
            'C'=>'淘宝店铺',
        );
    }

    public static function getUserSellerLevelByNum($levelnum)
    {
        switch($levelnum)
        {
        case '0':
            return '无等级';
            break;
        case '1':
            return '1心';
            break;
        case '2':
            return '2心';
            break;
        case '3':
            return '3心';
            break;
        case '4':
            return '4心';
            break;
        case '5':
            return '5心';
            break;
        case '6':
            return '1钻';
            break;
        case '7':
            return '2钻';
            break;
        case '8':
            return '3钻';
            break;
        case '9':
            return '4钻';
            break;
        case '10':
            return '5钻';
            break;
        case '11':
            return '1冠';
            break;
        case '12':
            return '2冠';
            break;
        case '13':
            return '3冠';
            break;
        case '14':
            return '4冠';
            break;
        case '15':
            return '5冠';
            break;
        case '16':
            return '1金';
            break;
        case '17':
            return '2金';
            break;
        case '18':
            return '3金';
            break;
        case '19':
            return '4金';
            break;
        case '20':
            return '5金';
            break;

        }
    }

    public function getUserIdByNick($nick)
    {
        //todo maybe can set some cache here;
        $dbCommand = Yii::app()->db->createCommand("
            SELECT user_id from user where nick= :nick ");
        $userId = $dbCommand->queryScalar(array(':nick'=>$nick));
        return $userId;

    }
}
