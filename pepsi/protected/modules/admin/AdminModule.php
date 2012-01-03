<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
			
		));
		//模块级的布局config
		$this->layout='main';

		$this->configure(array(
			'components'=>array(
	   
				
	            'errorHandler'=>array(
                // use 'site/error' action to display errors
                'errorAction'=>'admin/default/error',
            	),
	            'cache'=>array(
	                'class'=>'system.caching.CFileCache',
	               
	            ),
	          )
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
        {
            if(Yii::app()->params['adminOpen'])
            {
                return true;
            }
            if(Yii::app()->request->userHostAddress!==Yii::app()->params['adminIpAddress'])
            {
                return true;
                return false;
            }
            else
            {
                return true;
            }
			return false;
		}
		else
			return false;
	}
}
