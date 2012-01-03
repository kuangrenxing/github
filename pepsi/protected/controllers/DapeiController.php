<?php

class DapeiController extends Controller
{
	
	
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

    public $width=null;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','get','publish','rollback','log','mealList','meal', 'ajaxmeals', 'remove'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        /*
	
        */
       $this->layout='//layouts/column1';
       $this->width ='w990';
       $cs=Yii::app()->getClientScript();
       $cs->registerCoreScript('jquery');

       $this->render('view',array(
			'model'=>$this->loadModel($id),
		));

       /*
       if(isset($_GET['template'])&&isset($_GET['meal']))
       {
           $meal= $this->_getMeal((int)$_GET['meal']);
           $viewName=Template::getViewName((int)$_GET['template']);
           $viewWidth=substr($viewName,strPos($viewName,'_')-3,3);
           $this->render(
               'view',
               array(
                   'mealList'=>$meal['mealList']
                   ,'items'=>$meal['items']
                   ,'viewWidth'=>$viewWidth
                   ,'viewName'=>$viewName
                   ,'mealId'=>(int) $_GET['meal']
                   ,'templateId'=>(int) $_GET['template']
               )
           );
           
           //save after view;
           $mealModel = Meal::model()->findByAttributes(array('meal_id'=>(int)$_GET['meal'],'template_id'=>(int)$_GET['template']));
           $mealModel->html=$this->renderPartial(
               $viewName
               ,array(
                   'mealList'=>$meal['mealList']
                   ,'items'=>$meal['items']
                   ,'viewWidth'=>$viewWidth
               )
               ,true
           );  
           $mealModel->save();
       }
       */
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Dapei;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dapei']))
		{
			$model->attributes=$_POST['Dapei'];
		
			if($model->save()) 
            {
                foreach($_POST['Dapei']['meals'] as $order=>$meal_json)
                {
                    $meal = new DapeiMeal();

                    $meal_info = CJSON::decode($meal_json['meal_info']); 
                    $meal->meal_id = $meal_info['meal_id'];
                    $meal->meal_name = $meal_info['meal_name'];
                    $meal->meal_price = $meal_info['meal_price'];
                    $meal->postage_id = $meal_info['postage_id'];
                    //$meal->postage_id = 0;
                    $meal->meal_memo = $meal_info['meal_memo'];
                    $meal->order = $order;
					$meal->raw_data = $meal_json['meal_info'];

                    if($model->addMeal($meal))
                    {
                        $this->redirect(array('view','id'=>$model->id));
                    }
                    /*
                    */
                }
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dapei']))
		{
			$model->attributes=$_POST['Dapei'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$cs=Yii::app()->getClientScript();
		$cs->registerCssFile('/da/css/style_v1.css','all');
		$cs->registerCssFile('/da/css/list.css','all');
		//$cs->registerJ
		
		$criteria = new CDbCriteria();  
		
		$criteria->condition = 'user_id = :user_id';
		$criteria->order = 't.created ASC';
		
		$criteria->params = array(':user_id'=>Yii::app()->user->getState('user_id'));
	
		$count=Dapei::model()->count($criteria);  
		$pages=new CPagination($count);  
	
		// results per page  
		$pages->pageSize=YII_DEBUG?3:20;
		$pages->applyLimit($criteria);  
		$models = Dapei::model()->findAll($criteria);
	    
		
		$this->render('index',array(
			'dapei_model'=>$models,
			'pages'=>$pages
		));
	}


    public function actionList()
    {
        $mealDataProvider=new CActiveDataProvider('Meal', array(
                    'criteria'=>array(
                        'condition'=>'user_id = :user_id',
                        'with'=>array('template'),
                        //@important! take care of this,t is a magic number :( due to yii's bug ;
            'order'=>'t.created ASC',
            'params'=>array(':user_id'=>Yii::app()->user->getState('user_id')),
            ),
                        'pagination'=>array(
                            'pageSize'=>YII_DEBUG?3:20,
                            ),
                        ));
                $meals     = $mealDataProvider->getData();
                $shopMeals = $this->_getMeal();
                $mealList  = array();
                $mealIDS   = array();


                foreach($shopMeals['mealList'] as $k=>$item)
                {
                $mealList[$item->meal_id]['meal']  = $item;
                $mealList[$item->meal_id]['items'] = isset($shopMeals['items'][$k])?$shopMeals['items'][$k]:null;
                $mealIDS[]=$item->meal_id;
                }
                //I don't know what's going on here.
                foreach($meals as $k=>$model)
                {
                    if(!in_array($model->meal_id,$mealIDS))
                    {
                        //unset($meals[$k]);
                        $mealList[$model->meal_id]['meal'] = (object) array(
                                'meal_name'=>'该套餐已经在淘宝失效了,建议删除',
                                'meal_price'=>0,
                                'origi_price'=>0,
                                'invalid'=>true,
                                );
                    }
                }

                $pages->pageSize = YII_DEBUG?3:20; 

                $this->render('list',array(
                            'meals'=>$meals,
                            'shopMeals'=>$mealList,
                            'pages'=>$mealDataProvider->pagination,
                            ));
    }            



    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Dapei('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Dapei']))
            $model->attributes=$_GET['Dapei'];

        $this->render('admin',array(
                    'model'=>$model,
                    ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model=Dapei::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='dapei-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionMealList()
    {   
        $mealList = TMeal::getMealList(Yii::app()->user->id);

        $this->render('mealList',array(
                    'mealList'=> CJSON::encode($mealList), 
                    ));  
    }

    public function actionAjaxMeals($update=0)
    {
		if($update==1) Yii::app()->cache->delete(Yii::app()->user->id);
	
		$mealList = Yii::app()->cache->get(Yii::app()->user->id);
		if ($mealList === false) {
			$mealList = TMeal::getMealList(Yii::app()->user->id);
			Yii::app()->cache->set(Yii::app()->user->id, $mealList, Yii::app()->params['mealCacheExpires']);
		}
			

		$result = array();
		$result['result'] = 0;

		if ($mealList == false) {
			echo CJSON::encode($result);
			exit;
		}

		$result['result'] = 1;
		$result['meallist'] = $mealList;
		echo CJSON::encode($result);
		//echo CJSON::encode($mealList);
		exit;
	}


	public function actionRemove($id)
	{
		
		 $model=$this->loadModel($id);
         if($model && $model->delete())
         {
			  DapeiMeal::model()->deleteAllByAttributes(array('dapei_id'=>$id));
              
			  echo CJSON::encode(array('success'=>true));
              Yii::app()->end();
         }
	   	
		 echo CJSON::encode(array('success'=>false));
		 Yii::app()->end();
	
	}

    public function actionMeal($id)
    {
        echo CJSON::encode(TMeal::getOne(array('setMealId'=>(int)$id),Yii::app()->user->id));
    }
 
}
