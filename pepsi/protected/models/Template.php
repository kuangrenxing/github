<?php
class Template extends CActiveRecord
{
    public $liked = false;
    public $permission = false;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'template';
    }

    public function rules()
    {
        return array(
            array('name, view_name,  preview_image', 'required'),
            array('name, view_name, preview_image', 'length', 'max'=>45),
            array('id, name, view_name, preview_image', 'safe', 'on'=>'search'),
        );
    }

    public function relations()
    {
        return array(
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'view_name' => 'View Name',
            'preview_image' => 'Preview Image',
        );
    }

    public function search()
    {
        $criteria=new CDbCriteria;
        $criteria->compare('id',$this->id);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('view_name',$this->view_name,true);
        $criteria->compare('preview_image',$this->preview_image,true);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function getViewName($id)
    {
       $dbCommand = Yii::app()->db->createCommand("
            SELECT view_name from template where id = :id ");
        $viewName = $dbCommand->queryScalar(array(':id'=>$id));
        return "/meal/template/".$viewName;
    }
    
    public static function getItemCount($id)
    {
        $dbCommand = Yii::app()->db->createCommand("
            SELECT item_count from template where id = :id ");
        return $dbCommand->queryScalar(array(':id'=>$id));
    }

    public static function getPermission($id)
    {
        $dbCommand = Yii::app()->db->createCommand("
            SELECT grade from template where id = :id ");
        $grade = $dbCommand->queryScalar(array(':id'=>$id));
        return (Yii::app()->user->getState('grade')>=$grade)?true:false;
    }

    public function getList()
    {
        $result = array();
        $liked  = UserLike::getList(Yii::app()->user->getState('user_id'));
        $list   = Template::model()->findALl('`status`=1 order by  `order` , `id` DESC');
        $userGrade = Yii::app()->user->getState('grade');
        foreach ($list as $template) 
        {
            if(in_array($template->id,$liked))
            {
                $template->liked = true;
            }
            
            if($userGrade>=$template->grade)
            {
                $template->permission = true;
            }
            
            array_push($result,$template);
        }

        return $result;
    }

}
