<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new AdminUserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate()){
				$httpRequest=new CHttpRequest();
			    $ip=$httpRequest->getUserHostAddress();
				$loginNum=Yii::app()->cache->get($ip);
				if($loginNum>5){
					$this->addError('password', '您已经尝试登录错误超过5次,请半小时后再进行登录');
					$loginNum=$loginNum+1;
					Yii::app()->cache->set($ip,$loginNum,1800);
					//return false;
				}else{
					$loginNum=$loginNum+1;
					Yii::app()->cache->set($ip,$loginNum,1800);
					//$this->addError('password','Incorrect username or password');
					$this->addError('password','用户名或密码错误.你已经错误'.$loginNum.'次');
				}
			}
				
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new AdminUserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
			
		}
		if($this->_identity->errorCode===AdminUserIdentity::ERROR_NONE)
		{
			
			$httpRequest=new CHttpRequest();
			$ip=$httpRequest->getUserHostAddress();
			$loginNum=Yii::app()->cache->get($ip);
			if($loginNum<=50){
				$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
				Yii::app()->admin->login($this->_identity,$duration);
				return true;
			}else {
				$this->addError('password','你尝试登录的错误次数已经超过5次，请半小时后再尝试登录');
				return false;
			}
		}
		else
			return false;
	}
}
