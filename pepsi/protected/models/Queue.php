<?php

class Queue extends CActiveRecord
{
    const STATUS_WAIT = '0';  
    const STATUS_PROCESSING = '1';  
    const STATUS_FINISHED = '2';  
    const STATUS_FAILED = '3';  

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'queue';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('app_id, status', 'numerical', 'integerOnly'=>true),
			array('task_id, created, updated', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, task_id, app_id, created, updated, status', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'task_id' => 'Task',
			'app_id' => 'App',
			'created' => 'Created',
			'updated' => 'Updated',
			'status' => 'Status',
		);
	}

	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('task_id',$this->task_id,true);
		$criteria->compare('app_id',$this->app_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
    }
    
    protected function beforeSave()
    {
        if($this->isNewRecord)
        {
            $this->created = time();
            $this->status  = 0;
        }
        $this->updated=time(); 
        return parent::beforeSave();
    }

    public static function getOneByAppId($appId,$status)
    {
        return self::model()->findByAttributes(array('app_id'=>$appId,'status'=>$status));
    }

    public function setFinishedStatus()
    {
        $this->status = self::STATUS_FINISHED;
    }

    public function setProcessingStatus()
    {
        $this->status = self::STATUS_PROCESSING;
    }

}
