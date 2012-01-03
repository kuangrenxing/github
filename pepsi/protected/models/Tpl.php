<?php

class Tpl extends CActiveRecord
{
    const STATUS_ONLINE  = 0;
    const STATUS_OFFLINE = 1;

    const TYPE_NORMAL  = 0;
    const TYPE_SPECIAL = 1;

    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'tpl';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, group_name, group_slug, item_count, width, height, grade,type, created, updated', 'required'),
			array('item_count, grade, type, multi, status', 'numerical', 'integerOnly'=>true),
			array('name, group_name, group_slug, width, height', 'length', 'max'=>45),
			array('user_count, like_count, created, updated, order', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, group_name, group_slug, item_count, width, height, grade, type, multi, user_count, like_count, created, updated, order, status', 'safe', 'on'=>'search'),
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
				//'tplgroup'=>array(self::BELONGS_TO,'TplGroup','group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
		 	'name' => '模板名称',
			'group_name' => '分组名称(暂时与模板名称相同)',
			'group_slug' => '分组唯一标志slug,比如"best"',
			'item_count' => '支持宝贝数量',
			'width' => 'Width',
			'height' => 'Height',
			'grade' => '等级:0为普通模板,1为标准版模板',
			'type' => '类型:0为普通模板,1为当前季',
			'multi' => 'Multi',
			'user_count' => '使用用户数',
			'like_count' => '喜欢用户数',
			'created' => '创建时间',
			'updated' => '更新时间',
			'order' => '排序',
			'status' => '状态', 
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('group_id',$this->group_id,true);
		$criteria->compare('group_name',$this->group_name,true);
		$criteria->compare('group_slug',$this->group_slug,true);
		$criteria->compare('item_count',$this->item_count);
		$criteria->compare('width',$this->width,true);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('grade',$this->grade);
		$criteria->compare('type',$this->type);
		//$criteria->compare('multi',$this->multi);
		$criteria->compare('user_count',$this->user_count,true);
		$criteria->compare('like_count',$this->like_count,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('order',$this->order,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
    } 
    protected function beforeValidate()
    {
        if($this->isNewRecord)
        {
            $this->created=time();
            $this->updated=$this->created;
        }
        else
        {
            $this->updated=time();
        }

        return parent::beforeValidate();
    }

    public static function getGroupList()
    {
        $dbCommand = Yii::app()->db->createCommand("
            SELECT `group_name`,`group_slug`,`order` from tpl order by `order` ASC");
        return $dbCommand->queryAll();
    }
    
    public static function updateOrderByGroupSlug($groupSlug,$order)
    {
        $dbCommand = Yii::app()->db->createCommand("
            update tpl set `order` = :order where group_slug =:group_slug");
        return $dbCommand->query(array(':order'=>$order,':group_slug'=>$groupSlug));
    }  

	public static function getViewName($id)
    {
       $dbCommand = Yii::app()->db->createCommand("
            SELECT * from tpl where id = :id ");
        $tpl = $dbCommand->queryRow(true, array(':id'=>$id));

        $viewFile = "tpls/".$tpl['group_slug']."/".$tpl['width']."_".$tpl['item_count'].".php";
        if ($tpl == null || !file_exists(Yii::app()->basePath . "/../" . $viewFile))
			return null;
		else
			return $viewFile; 
    }
    
    public function upload_file($filename,$group_id,$zipname,$grade,$status)
    {	
    	   	
    	//echo $filename.'||'.$group_id.'||'.$zipname.'||'.$grade.'||'.$status;exit;
    	$filename=str_replace('.php', '', $filename);
    	$arr=explode('_', $filename);
    	//$tpl=new Tpl; 
    	//print_r($arr);echo "<br>";  
     	/* foreach ($arr as $ar)
    	{
    		echo $ar; echo "<br>";  
    	} */  //echo "<br>"; 
    	//echo $arr[0]."||".$arr[1]; 
    	//echo $group_id.'||'.$zipname;echo "<br>";
    	

    	
    	$tpl=new Tpl;

    	$tpl->group_id=$group_id;
    	$tpl->name=$tpl->group_name=$tpl->group_slug=$zipname;
    	
    	$tpl->item_count=$arr[1];
    	
    	$tpl->width=$tpl->height=$arr[0];
    	
    	$tpl->type=$tpl->multi=$tpl->user_count=$tpl->like_count=$tpl->order=0;
    	
    	$tpl->grade=$grade;
    	$tpl->status=$status;
    	
    	
    	if($this->isNewRecord)
    	{
    		$this->created=time();
    		$this->updated=$this->created;
    	}
    	else
    	{
    		$this->updated=time();
    	}
    	
    	
    	$tpl->save();   	
    }
    
    public function update_nofile($filename,$group_id,$zipname,$grade,$status)
    {	
    	//echo $filename.'||'.$group_id.'||'.$zipname.'||'.$grade.'||'.$status.'<br>';
    	//print_r($this);
    	$filename=str_replace('.php', '', $filename);
    	$arr=explode('_', $filename);
    	
    	$tpls=$this->findAll('group_id=:group_id and item_count=:item_count',array(':group_id'=>$group_id,':item_count'=>$arr[1]));
    	//print_r($tpls);
    	foreach($tpls as $t)    	

    	$tpl=$this->findByPk($t[id]);
    		
    	$tpl->group_id=$group_id;
    	$tpl->name=$tpl->group_name=$tpl->group_slug=$zipname;
    	
     	$tpl->item_count=$arr[1];
    	
    	$tpl->width=$tpl->height=$arr[0];
    	
    	$tpl->type=$tpl->multi=$tpl->user_count=$tpl->like_count=$tpl->order=0; 
    	
    	$tpl->grade=$grade;
    	$tpl->status=$status;
    	
    	
      	if($tpl->isNewRecord)
    	{
    		$tpl->created=time();
    		$tpl->updated=$this->created;
    	}
    	else
    	{
    		$tpl->updated=time();
    	} 
    	
    	$tpl->save();
    }
    
    
    
    public function exist_db_group($group_id)
    {
    	if(Tpl::model()->findAll('group_id=:group_id',array(':group_id'=>$group_id))!="")
    	{
    		Tpl::model()->deleteAll('group_id=:group_id',array(':group_id'=>$group_id));
    	}    		
    }
}
