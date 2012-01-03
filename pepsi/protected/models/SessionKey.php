<?php

class SessionKey extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'session_key';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, app_key', 'required'),
			array('app_key', 'numerical', 'integerOnly'=>true),
			array('id, user_id, nick, top_session_key', 'length', 'max'=>128),
			array('created, updated', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, app_key, nick, top_session_key, created, updated', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'app_key' => 'App Key',
			'nick' => 'Nick',
			'top_session_key' => 'Top Session Key',
			'created' => 'Created',
			'updated' => 'Updated',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('app_key',$this->app_key);
		$criteria->compare('nick',$this->nick,true);
		$criteria->compare('top_session_key',$this->top_session_key,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
    }

    protected function beforeSave()
    {
        if($this->isNewRecord)
        {
            $this->created=time();
        }
        $this->updated=time();
        return parent::beforeSave();
    }

    public static function keepAlive($appKey='')
    {
        $top=Yii::app()->top;
        if($appKey==='')
        {
            $appKey=$top->appkey;
        }
        else
        {
            $top->appkey=$appKey;
        }

        $sessionList= self::model()->findAllByAttributes(array('app_key'=>$appKey));
        
        foreach($sessionList as $sessionKey)
        {
            $req = new UserGetRequest;
            $req->setFields("user_id,birthday,email,alipay_account");
            $req->setNick($sessionKey->nick);
            $resp = $top->execute($req,$sessionKey->top_session_key); 
            if(!$resp)
            {
                $message = array(
                    'message'=>'连接淘宝出错',
                    'sessionKey'=>$sessionKey,
                );
                XLogger::xlog($message,'warning','pepsi.model.sessionkey.keepalive'); 
            }
            elseif(!isset($resp->user->alipay_account))
            {
                $message = array(
                    'message'=>'sessionKey失效',
                    'sessionKey'=>$sessionKey,
                );
                XLogger::xlog($message,'warning','pepsi.model.sessionkey.keepalive'); 
            }
            sleep(0.5);
        }
    }

    public function clearTimeout()
    {
        $dbCommand = Yii::app()->db->createCommand("
            delete from session_key where updated < (UNIX_TIMESTAMP()-12*3600);
        ");
        $result = $dbCommand->query();
        return $result;

    }

}
