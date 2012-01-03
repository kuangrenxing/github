<?php

class Task extends CActiveRecord
{
    const STATUS_WAIT = '0';  
    const STATUS_PROCESSING = '1';  
    const STATUS_FINISHED = '2';  
    const STATUS_FAILED = '3';  
    const TYPE_ROLLBACK = 'rollback';  
    const TYPE_UPDATE   = 'update';  

    private $_itemCount;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'task';
    }

    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('app_id, status', 'numerical', 'integerOnly'=>true),
        array('user_id', 'length', 'max'=>128),
        array('created, updated', 'length', 'max'=>11),
        array('type, name', 'length', 'max'=>45),
        array('html, items', 'safe'),
        // The following rule is used by search().
        // Please remove those attributes that should not be searched.
        array('id, user_id, app_id, html, status, created, updated, items, type, name', 'safe', 'on'=>'search'),
        );
    }

    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'itemList' => array(self::HAS_MANY,'TaskItem','task_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
			'id' => 'ID',
			'user_id' => 'User',
			'app_id' => 'App',
			'html' => 'Html',
			'status' => 'Status',
			'created' => 'Created',
			'updated' => 'Updated',
			'items' => 'Items',
			'type' => 'Type',
			'name' => 'Name',
        );
    }

    protected function beforeSave()
    {
        if($this->isNewRecord)
        {
            $this->created = time();
            $this->status  = self::STATUS_WAIT;
        }
        $this->updated=time(); 
        return parent::beforeSave();
    }

    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id,true);
        $criteria->compare('user_id',$this->user_id,true);
        $criteria->compare('app_id',$this->app_id);
        $criteria->compare('html',$this->html,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('created',$this->created,true);
        $criteria->compare('updated',$this->updated,true);
        $criteria->compare('items',$this->items,true);
        $criteria->compare('type',$this->type,true);
        $criteria->compare('name',$this->name,true);

        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
        ));
    }

    public function setFinishedStatus()
    {
        $this->status = self::STATUS_FINISHED;
    }

    public static function getList($userId)
    {
        return self::model()->findAllByAttributes(array('user_id'=>(int) $userId));
    }

    public function getItemCount($status=false)
    {   
        if(!is_array($this->_itemCount))
        {
            $dbCommand = Yii::app()->db->createCommand("
                SELECT status,count(*) as count from task_item where task_id= :task_id group by status");
            $counts =$dbCommand->queryAll(true,array(':task_id'=>$this->id));
            $result=array();
            $result['total']=0;
            foreach($counts as $count)
            {
                $result[$count['status']] = $count['count'];
                $result['total'] += $count['count'];
            }
            $this->setItemCount($result);
        }
        if(!$status)
        {
            return $this->_itemCount['total'];
        }
        return isset($this->_itemCount[$status])?$this->_itemCount[$status]:0;
    }

    public function setItemCount($count)
    {
        $this->_itemCount=$count;
    }

    public function clearItemStatus()
    {
        foreach($this->itemList as $taskItem)
        {
            $taskItem->status = self::STATUS_WAIT;
            $taskItem->save();
        }
    }

}
