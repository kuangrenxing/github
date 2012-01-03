<?php
class Upload extends CActiveRecord
{
    public $image;
    // ... other attributes
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'upload';
	}


	public function attributeLabels()
	{
		return array(
			'image'=>'请选择你要上传的文件',
		);
	}

 
    public function rules()
    {
        return array(
			
          	array('image', 'file',
          			'allowEmpty'=>false,
        				'types'=>'zip',
        				'maxSize'=>1024 * 1024 * 2, // 50MB
        				'tooLarge'=>'The file was larger than 50MB. Please upload a smaller file.',
        		),
//         	array('image','safe'),
        );
    }
}
?>
