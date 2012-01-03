<?php

class Meal extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'meal';
    }

    public function rules()
    {
        return array(
            array('meal_id, user_id, template_id', 'required'),
            array('meal_id, template_id', 'length', 'max'=>10),
            array('user_id', 'length', 'max'=>128),
            array('html', 'safe'),
            array('meal_id, user_id, template_id, html', 'safe', 'on'=>'search'),
        );
    }

    public function relations()
    {
        return array(
            'template'=>array(self::BELONGS_TO,'Template','template_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'meal_id' => '搭配套餐',
            'user_id' => '用户',
            'template_id' => '模板',
            'html' => '代码',
        );
    }

    public function search()
    {

        $criteria=new CDbCriteria;

        $criteria->compare('meal_id',$this->meal_id);
        $criteria->compare('user_id',$this->user_id);
        $criteria->compare('template_id',$this->template_id);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function getMeal($meal_id,$template_id)
    {
        return self::model()->findByAttributes(array('meal_id'=>$meal_id,'template_id'=>$template_id));
    }

    public function beforeSave()
    {
        $this->html = CHtml::encode($this->html);
        if($this->isNewRecord)
        {
            $this->created = time();
        }
        
        $this->updated = time();

        return parent::beforeSave();
    }

    public function afterValidate()
    {
        if(!Template::getPermission($this->template_id))
        {
            $this->addError('template','模板权限不够');
            return false;
        }
        return parent::afterValidate();
    }

    public static function getHtml($mealId,$templateId)
    {
        $meal = self::model()->findByAttributes(array('meal_id'=>$mealId,'template_id'=>$templateId));
        return $meal?$meal->html:false;
    }

}
