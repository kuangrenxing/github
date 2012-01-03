<?php

/**
 * This is the model class for table "job_log".
 *
 * The followings are the available columns in table 'job_log':
 * @property string $id
 * @property string $level
 * @property string $category
 * @property string $logtime
 * @property string $message
 * @property string $item_id
 * @property string $job_id
 */
class JobLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return JobLog the static model class
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
		return 'job_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_id', 'required'),
			array('level, category, item_id', 'length', 'max'=>128),
			array('logtime', 'length', 'max'=>11),
			array('job_id', 'length', 'max'=>10),
			array('message', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, level, category, logtime, message, item_id, job_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'level' => 'Level',
			'category' => 'Category',
			'logtime' => 'Logtime',
			'message' => 'Message',
			'item_id' => 'Item',
			'job_id' => 'Job',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('logtime',$this->logtime,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('item_id',$this->item_id,true);
		$criteria->compare('job_id',$this->job_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}