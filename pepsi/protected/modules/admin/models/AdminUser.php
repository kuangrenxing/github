<?php

/**
 * This is the model class for table "admin_user".
 *
 * The followings are the available columns in table 'admin_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $sex
 * @property string $email
 */
class AdminUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AdminUser the static model class
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
		return 'admin_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, sex, email', 'required'),
			array('username, password, email', 'length', 'max'=>32),
			array('sex', 'length', 'max'=>2),
			array('email','email'),
			array('username','ck_exists_name','on'=>'create'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username,salt, password, create_time, sex, email', 'safe', 'on'=>'search'),
		);
	}
	public function ck_exists_name($auttribute,$parems)
	{
		if(!$this->hasErrors())
		{
			if(adminuser::model()->find('username=:username',array(':username'=>$this->username)))
				$this->addError('username','用户名已经存在，请重新命名');
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => '用户名',
			'password' => '密码',
			'sex' => '性别',
			'email' => 'Email',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	//保存前
	public function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->create_time=time();
				$this->salt=$this->generateSalt();
				$this->password=$this->hashPassword($this->password,$this->salt);
				
			}
		
		return true;
		}
		return false;
		
	}
	//加salt
	public function generateSalt()
	{
		return uniqid('',true);
	}
	//加密
	public function hashPassword($password,$salt)
	{		
		return md5($salt.$password);		
	}
	//验证
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->password;
	}
	
}