<?php

/**
 * This is the model class for table "tpl_group".
 *
 * The followings are the available columns in table 'tpl_group':
 * @property integer $group_id
 * @property string $group_name
 * @property string $group_slug
 */
class TplGroup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TplGroup the static model class
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
		return 'tpl_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_name, group_slug', 'required'),
			array('group_name', 'length', 'max'=>32),
			array('group_slug', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('group_id, group_name, group_slug', 'safe', 'on'=>'search'),
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
				'tpl'=>array(self::HAS_MANY,'Tpl','group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'group_id' => 'Group',
			'group_name' => 'Group Name',
			'group_slug' => 'Group Slug',
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

		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('group_name',$this->group_name,true);
		$criteria->compare('group_slug',$this->group_slug,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function check_group_name($zipname)
	{	
		$result=$this->find('group_name=:group_name',array(':group_name'=>$zipname));
		if ($result!=null){
			$group_id=$result->group_id;
			return $group_id;
		}
		else 
		{	
			$tplgroup=new TplGroup;
			$tplgroup->group_name=$zipname;
			$tplgroup->group_slug=$zipname;
			$tplgroup->save();	
			
			return $tplgroup->group_id;
		}
		
	}
}