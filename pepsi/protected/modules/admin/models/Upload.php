<?php
class Upload extends CActiveRecord {
	public $image;
	public $input_name;
	public $grade;
	public $status;
	public $update_um;
	public $group_id;
	
	// ... other attributes
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'upload';
	}
	
	public function attributeLabels() {
		return array ('image' => '请选择', 'input_name' => '请输入名称', 'grade' => '类型', 'status' => '状态' );
	}
	
	public function rules() {
		return array (array ('input_name', 'required', 'on' => 'create' ), array ('input_name', 'chk_name', 'on' => 'create' ), array ('grade,status', 'required', 'on' => 'create' ), array ('input_name', 'chk_update_name', 'on' => 'update' ), 

		array ('image', 'file', 'allowEmpty' => true, 'types' => 'zip', 'maxSize' => 1024 * 1024 * 2, // 50MB
'tooLarge' => 'The file was larger than 2MB. Please upload a smaller file.' ), array ('grade,status', 'safe' ) );
	}
	
	public function chk_name($attribute, $params) {
		
		if (! $this->hasErrors ()) {
			if (TplGroup::model ()->findAll ( 'group_name=:group_name', array (':group_name' => $this->input_name ) )) {
				$this->addError ( 'input_name', '名称已存在，请重新重名' );
			}
		}
	}
	
	public function getUpdate_um($input_name) {
		$this->update_um = $input_name;
	}
	
	public function chk_update_name($attribute, $params) {
		if ($this->input_name != "") {

				$n = TplGroup::model ()->count ( 'group_name=:group_name and group_id!=:group_id', array (':group_name' => $this->input_name, ':group_id' => $this->group_id ) );
				
				if($n>=1)
				$this->addError ( 'input_name', '名称已存在，请重新重名' );
		}
	}
}
?>
