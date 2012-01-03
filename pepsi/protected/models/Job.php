<?php

/**
 * This is the model class for table "job".
 *
 * The followings are the available columns in table 'job':
 * @property string $id
 * @property string $feed_id
 * @property integer $feed_type
 * @property string $created
 * @property string $updated
 * @property integer $type
 * @property string $publish_count
 * @property string $publish_index
 */
class Job extends CActiveRecord
{
	const TYPE_ROLLBACK = 1;  
    const TYPE_UPDATE   = 0;

	const FEED_FAKE_DROPALL = 0;
	const FEED_DAPEI = 1;
	const FEED_POST = 2;
	const FEED_TUAN = 3;
	
	
	const STATUS_WAIT = '0';  
    const STATUS_PROCESSING = '1';  
    const STATUS_FINISHED = '2';  
    const STATUS_FAILED = '3';
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Job the static model class
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
		return 'job';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('feed_id, feed_type, type, publish_count, publish_index', 'required'),
			array('feed_type, type', 'numerical', 'integerOnly'=>true),
			array('feed_id, created, updated, publish_count, publish_index, successer, failer', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, feed_id, feed_type, created, updated, type, publish_count, publish_index', 'safe', 'on'=>'search'),
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
			'itemList' => array(self::HAS_MANY,'JobItem','job_id'),
			'feeder' => array(self::BELONGS_TO, 'Dapei', 'feed_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'feed_id' => 'Feed',
			'feed_type' => 'Feed Type',
			'created' => 'Created',
			'updated' => 'Updated',
			'type' => 'Type',
			'publish_count' => 'Publish Count',
			'publish_index' => 'Publish Index',
		);
	}
	
	protected function beforeSave()
    {
        if($this->isNewRecord)
        {
            $this->created=time();
			//$this->publish_index = 0;
        }
        $this->updated=time();
		return parent::beforeSave();          
	}
	
	public function setProcessingStatus()
	{
		 $this->status = self::STATUS_PROCESSING;
		 $this->save();
		
	}
	
	public function updateFailedCounter()
	{
		$this->failer ++;
		$this->save();
	}
	
	public function updateSuccessCounter()
	{
		$this->successer ++;
		$this->save();
	}
	
	public function genResultTxt()
	{
		return "" . $this->publish_count . "" . $this->successer . "" . $this->failer;
	}
	
	public function setFinishedStatus()
	{
		 $this->status = self::STATUS_FINISHED;
		 $this->save();
	}
	
	public function setFailedStatus()
	{
		 $this->status = self::STATUS_FAILED;
		 $this->save();
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
		$criteria->compare('feed_id',$this->feed_id,true);
		$criteria->compare('feed_type',$this->feed_type);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('publish_count',$this->publish_count,true);
		$criteria->compare('publish_index',$this->publish_index,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}