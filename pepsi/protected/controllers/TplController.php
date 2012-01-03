<?php

class TplController extends Controller
{
	public $width=null;
	
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
                'actions'=>array('index', 'getmeal'),
                'users'=>array('@'),
            ),
            array(
                'deny',
                'users'=>array('*'),
            ),
        );
    }  

    public function actionGetMeal()
    {
        $id = $_POST['id'];
        $meal = isset($_POST['meal'])?CJSON::decode($_POST['meal']):null; 

        $view_name=Tpl::getViewName($id);

        if($view_name == null)
            return ;

        $tplDataProvider=new CActiveDataProvider('Tpl', array(
            'criteria'=>array(
                'condition'=>'status = :status AND id=:id',
                'order'=>'`order`',
                'params'=>array(':status'=>Tpl::STATUS_ONLINE, ':id'=>$id),
            ),
        ));

        $template = $tplDataProvider->getData();
        $out = array();
        $out['result'] = 1;
        $out['html'] = $this->renderPartial('render_base',array(
            'template'=>$template[0],
            'view_name'=>$view_name,
            'meal'=>$meal,
            'freeship'=>isset($meal['postage_id']) && $meal['postage_id'] > 0 ? true : false
        ), true);

       $out['html'] = preg_replace('/images/i', Yii::app()->request->baseUrl . '/tpls/'. $template[0]->group_name.'/images', $out['html']); 

       echo CJSON::encode($out);
    }

    public function actionIndex()
    {
		$cs=Yii::app()->getClientScript();
		$cs->registerCssFile('/da/css/style_v4.css','all');

		$this->layout='//layouts/column1';
        $this->width ='w1030';
	
        $tplDataProvider=new CActiveDataProvider('Tpl', array(
            'criteria'=>array(
                'condition'=>'status = :status AND type=:type',
                'order'=>'`order`',
                'params'=>array(':status'=>Tpl::STATUS_ONLINE, ':type'=>Tpl::TYPE_NORMAL),
            ),
            'pagination'=>array(
                'pageSize'=>YII_DEBUG?3:20,
            ),
        ));

        $PromDataProvider=new CActiveDataProvider('Tpl', array(
            'criteria'=>array(
                'condition'=>'status = :status AND type= :type',
                'order'=>'`order`',
                'params'=>array(':status'=>Tpl::STATUS_ONLINE, ':type'=>Tpl::TYPE_SPECIAL),
            ),
            'pagination'=>array(
                'pageSize'=>YII_DEBUG?3:20,
            ),
        ));


        $this->render('index',array(
           'colorbox'=>$this->_loadColorbox(),
            'templates'=>$tplDataProvider->getData(),
            'promtpls'=>$PromDataProvider->getData(),
        ));
    }

    private function _loadColorbox()
    {
        $cs=Yii::app()->getClientScript();
        $cs->registerCoreScript('jquery');
        $cs->registerScriptFile('/da/js/colorbox/jquery.colorbox-min.js',CClientScript::POS_END);
        $cs->registerScriptFile('/da/js/autoCombobox.js',CClientScript::POS_END);
        $cs->registerCssFile('/da/js/colorbox/colorbox.css','all');

        return $this->renderPartial('/meal/_colorbox',array(),true);
    }
}
