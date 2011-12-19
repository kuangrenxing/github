<?php

Yii::import('zii.widgets.CPortlet');

class TagCloud extends CPortlet
{
	public $title='Tags';
 
    public function getTagWeights()
    {
        return Tag::model()->findTagWeights();
    }
 
    protected function renderContent()
    {
        $this->render('tagCloud');
    }

}