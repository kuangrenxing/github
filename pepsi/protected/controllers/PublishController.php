<?php

class PublishController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions'=>array('index', 'create'),
                'users'=>array('@'),
                'expression'=>"Yii::app()->user->getState('grade')>0",
            ),
            array(
                'deny',
                'users'=>array('*'),
            ),
        );
    } 

    public function actionIndex()
    {
        $categoryList = Category::getCategoryList(Yii::app()->user->getState('user_id'));
        $categoryTree = Category::getCategoryTree(Yii::app()->user->getState('user_id'));
        if(!$categoryTree)
        {
            Category::sync(Yii::app()->user->name);
            $categoryList = Category::getCategoryList(Yii::app()->user->getState('user_id'));
            $categoryTree = Category::getCategoryTree(Yii::app()->user->getState('user_id'));
        }
        $this->render('index', array(
            'list' => $categoryList, 
            'categoryTree' => $categoryTree,
            'mealId' => isset($_GET['meal'])?(int) $_GET['meal']:'',
            'templateId' => isset($_GET['template'])?(int) $_GET['template']:'',
        ));
    }

	// /da/publish/index/meal/3295687/template/143
	public function actionCreate($id)
	{
		$categoryList = Category::getCategoryList(Yii::app()->user->getState('user_id'));
        $categoryTree = Category::getCategoryTree(Yii::app()->user->getState('user_id'));
        if(!$categoryTree)
        {
            Category::sync(Yii::app()->user->name);
            $categoryList = Category::getCategoryList(Yii::app()->user->getState('user_id'));
            $categoryTree = Category::getCategoryTree(Yii::app()->user->getState('user_id'));
        }
        $this->render('index', array(
            'list' => $categoryList, 
            'categoryTree' => $categoryTree,
            'dapei_id' => $id,
        ));
		
	}
    
}
