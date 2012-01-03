<?php

/**
 * This is the model class for table "job_item".
 *
 * The followings are the available columns in table 'job_item':
 * @property string $job_id
 * @property string $item_id
 * @property string $item_name
 * @property integer $position
 * @property integer $status
 */
class JobItem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return JobItem the static model class
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
		return 'job_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('job_id, item_id, item_name, position, status', 'required'),
			array('position, status', 'numerical', 'integerOnly'=>true),
			array('job_id', 'length', 'max'=>10),
			array('item_id, item_name', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('job_id, item_id, item_name, position, status', 'safe', 'on'=>'search'),
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
            'logList' => array(self::HAS_MANY,'JobLog','job_id,item_id','order'=>'logtime DESC'),
			'job' => array(self::BELONGS_TO,'Job','job_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'job_id' => 'Job',
			'item_id' => 'Item',
			'item_name' => 'Item Name',
			'position' => 'Position',
			'status' => 'Status',
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

		$criteria->compare('job_id',$this->job_id,true);
		$criteria->compare('item_id',$this->item_id,true);
		$criteria->compare('item_name',$this->item_name,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getList($jobId)
    {
        return  self::model()->findAllByAttributes(array('job_id'=>$jobId));
    }
}