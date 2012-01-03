<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    public $layout='//layouts/column2';
    public $menu=array();
    public $breadcrumbs=array();

    protected function beforeAction($action)
    {
        $this->batchSetPageTitle();

		// TODO
		// should chk whether back from taobao or not 
		// if then should set the user grade here.

		if(Yii::app()->user->getState('betaUser'))
		{
			Yii::app()->user->setState('grade',1);
		}
        return parent::beforeAction($action);
    }

    protected function batchSetPageTitle()
    {
        switch ($this->id .'/'. $this->action->id)
        {
        case "default/index":
            $this->pageTitle=Yii::app()->name."-我的大搭";
            break;
        case "default/error":
            $this->pageTitle=Yii::app()->name."-出错啦";
            break;
        case "default/price":
            $this->pageTitle=Yii::app()->name."-立即升级";
            break;
        case "meal/create":
            $this->pageTitle=Yii::app()->name."-创建搭配";
            break;
        case "meal/index":
            $this->pageTitle=Yii::app()->name."-已创建的搭配";
            break;
        case "meal/update":
            $this->pageTitle=Yii::app()->name."-编辑搭配";
            break;
        case "meal/view":
            $this->pageTitle=Yii::app()->name."-查看搭配";
            break;
        case "meal/preview":
            $this->pageTitle=Yii::app()->name."-预览搭配";
            break;
        case "task/index":
            $this->pageTitle=Yii::app()->name."-发布日志";
            break;
        case "task/view":
            $this->pageTitle=Yii::app()->name."-明细查询";
            break;
        case "publish/index":
            $this->pageTitle=Yii::app()->name."-发布到宝贝详情";
            break;
        }
    }
}
