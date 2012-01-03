<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property string $id
 * @property string $title
 * @property string $url
 * @property integer $type
 * @property integer $status
 * @property string $published
 * @property string $created
 * @property string $updated
 */
class Post extends PepsiActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Post the static model class
	 */
	const TYPE_HELP=1;
	const TYPE_NEWS=2;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, url, type, status, published, created, updated', 'required'),
			array('type, status', 'numerical', 'integerOnly'=>true),
			array('title, url', 'length', 'max'=>256),
			array('url','url'),
			array('published', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, url, type, status, published, created, updated', 'safe', 'on'=>'search'),
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
			'id' => 'Post_ID',
			'title' => '标题',
			'url' => '标题对应的URL',
			'type' => 'POST类型',
			'status' => '状态',
			'published' => '发布时间',
			'created' => '创建时间',
			'updated' => '更新时间',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('status',$this->status);
		$criteria->compare('published',$this->published,true);
		//$criteria->compare('created',$this->created,true);
		//$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getTypeOptions()
	{
		return array(
			self::TYPE_HELP=>'新手帮助',
			self::TYPE_NEWS=>'最新公告',
		);
	}
	
	public function getStatusOptions()
	{
		return array(
			'1'=>'显示',
			'0'=>'隐藏',
		);
    }

    static public function getItems()
    {
        return array(
          'news'=>self::model()->findAll('status=1 AND type =:type ORDER BY published DESC',array(':type'=>self::TYPE_NEWS)),
          'help'=>self::model()->findAll('status=1 AND type =:type ORDER BY published DESC',array(':type'=>self::TYPE_HELP)),
        );
    }
}
