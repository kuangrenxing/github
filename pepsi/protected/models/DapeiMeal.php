<?php

/**
 * This is the model class for table "dapei_meal".
 *
 * The followings are the available columns in table 'dapei_meal':
 * @property string $id
 * @property string $dapei_id
 * @property string $meal_id
 * @property string $title
 * @property string $meal_name
 * @property string $meal_price
 * @property integer $postage_id
 * @property string $meal_memo
 * @property integer $status
 * @property integer $order
 * @property string $template_id
 * @property string $created
 * @property string $updated
 */
class DapeiMeal extends CActiveRecord
{
	public $orig_price;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return DapeiMeal the static model class
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
		return 'dapei_meal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('meal_id, meal_name, meal_price,  order ', 'required'),
			array('postage_id, status, order', 'numerical', 'integerOnly'=>true),
			array('dapei_id, meal_id, template_id, created, updated', 'length', 'max'=>10),
			array('title, meal_name', 'length', 'max'=>256),
			array('meal_price', 'length', 'max'=>45),
			array('meal_memo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, dapei_id, meal_id, title, meal_name, meal_price, postage_id, meal_memo, status, order, template_id, created, updated', 'safe', 'on'=>'search'),
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
            'dapei'=>array(self::BELONGS_TO, 'Dapei', 'dapei_id', 'joinType'=>'INNER JOIN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'dapei_id' => 'Dapei',
			'meal_id' => 'Meal',
			'title' => 'Title',
			'meal_name' => 'Meal Name',
			'meal_price' => 'Meal Price',
			'postage_id' => 'Postage',
			'meal_memo' => 'Meal Memo',
			'status' => 'Status',
			'order' => 'Order',
			'template_id' => 'Template',
			'created' => 'Created',
			'updated' => 'Updated',
		);
	}
	
	
	public function getOrigiPrice()
	{
		if ($this->raw_data == null) return 0;
		
		$meal_info = CJSON::decode($this->raw_data);
	
		$op = 0;
		foreach ($meal_info['itemCart'] as $item)
		{
			$op += $item['price'];
			
		}
		
		return number_format($op, 2,'.',''); 
	}
	
	public function getMealPic()
	{
		if ($this->raw_data == null) return 0;
		
		$meal_info = CJSON::decode($this->raw_data);
		
		if (isset($meal_info['itemCart'][0]['pic_url']) && $meal_info['itemCart'][0]['pic_url'] != null)
			return $meal_info['itemCart'][0]['pic_url'] . '_80x80.jpg';
		else
			return Yii::app()->params['empty_meal_pic'];
		
	}
	
	public function isFreeShip()
	{
		return $this->postage_id == 0;
	}
	

    protected function beforeSave()
    {
        if($this->isNewRecord)
        {
            $this->created=time();
        }
        $this->updated=time();
        $this->status = 0; 
		$this->meal_price=number_format(round($this->meal_price/100,2), 2,'.','');


        return parent::beforeSave();           
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
		$criteria->compare('dapei_id',$this->dapei_id,true);
		$criteria->compare('meal_id',$this->meal_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('meal_name',$this->meal_name,true);
		$criteria->compare('meal_price',$this->meal_price,true);
		$criteria->compare('postage_id',$this->postage_id);
		$criteria->compare('meal_memo',$this->meal_memo,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('order',$this->order);
		$criteria->compare('template_id',$this->template_id,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
