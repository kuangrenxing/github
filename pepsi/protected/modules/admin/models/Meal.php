<?php

/**
 * This is the model class for table "meal".
 *
 * The followings are the available columns in table 'meal':
 * @property string $meal_id
 * @property string $user_id
 * @property string $template_id
 * @property string $html
 * @property string $created
 * @property string $updated
 */
class Meal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Meal the static model class
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
		return 'meal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('meal_id, user_id, template_id, created, updated', 'required'),
			array('meal_id, template_id', 'length', 'max'=>10),
			array('user_id', 'length', 'max'=>128),
			array('created, updated', 'length', 'max'=>11),
			array('html', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('meal_id, user_id, template_id, html, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				//'taskCount'=>array(self::STAT,'Task','meal_name'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'meal_id' => 'Meal',
			'user_id' => '用户ID',
			'template_id' => '模板',
			'html' => 'Html',
			'created' => '创建时间',
			'updated' => '修改时间',
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

		$criteria=new CDbCriteria(array(
				
				//'with'=>'taskCount',
				//'with'=>'taskCount',
				));
		

		$criteria->compare('meal_id',$this->meal_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('template_id',$this->template_id,true);
		$criteria->compare('html',$this->html,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}