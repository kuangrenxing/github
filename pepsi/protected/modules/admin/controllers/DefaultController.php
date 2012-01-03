<?php

class DefaultController extends AdminController

{
	public $layout='column2';
	public $defaultAction='login';
	/*
	public function actionIndex()
	{
		$this->render('index');
	}
	*/
	
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
	public function actionLogin()
	{
		
		$httpRequest=new CHttpRequest();
		$ip=$httpRequest->getUserHostAddress();
		
		$loginNum=Yii::app()->cache->get($ip);
		if($loginNum===false){
			Yii::app()->cache->set($ip,0,1800);
		}

		if(!Yii::app()->admin->isGuest){
			$this->redirect('/da/admin/post/admin');
		}
		
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			//print_r($model->attributes);
			
			if($model->validate() && $model->login() ){
				$this->redirect('/da/admin/post/admin');
		}}
		// display the login form
		$this->render('login',array('model'=>$model));
		//print_r($model->attributes);
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->admin->logout();
		
		$this->redirect(Yii::app()->admin->loginUrl);
	}
	
	

}