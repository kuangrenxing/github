<?php

class TaskItem extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'task_item';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('task_id, item_id, position', 'required'),
			array('task_id, item_id', 'numerical', 'integerOnly'=>true),
			array('item_name', 'length', 'max'=>128),
			array('position, status', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('task_id, item_id, item_name, position, status', 'safe', 'on'=>'search'),
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
            'logList' => array(self::HAS_MANY,'Log','task_id,item_id','order'=>'logtime DESC'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'task_id' => 'Task',
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

		$criteria->compare('task_id',$this->task_id);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('item_name',$this->item_name,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
    }

    public static function getListByStatus($taskId,$status)
    {
        return  self::model()->with('logList')->findAllByAttributes(array('task_id'=>$taskId,'status'=>$status));
    }
    
    public static function getList($taskId)
    {
        return  self::model()->findAllByAttributes(array('task_id'=>$taskId));
    }



}
