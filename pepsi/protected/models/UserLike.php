<?php

/**
 * This is the model class for table "user_like".
 *
 * The followings are the available columns in table 'user_like':
 * @property string $user_id
 * @property string $template_id
 */
class UserLike extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'user_like';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, template_id', 'required'),
			array('user_id', 'length', 'max'=>128),
			array('template_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, template_id', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'template_id' => 'Template',
		);
	}

	public static function like($templateId)
    {
        $userId = Yii::app()->user->getState('user_id');

        $userLike = self::model()->findByAttributes(array('user_id'=>$userId,'template_id'=>$templateId));
        if($userLike)
        {
            return array('result'=>false,'message'=>'您已经投过票了');
        }
        else
        {
            $userLike = new UserLike();
            $userLike->user_id     = $userId;
            $userLike->template_id = $templateId;
            $template = Template::model()->findByPk($templateId);
            $template->like_count += 1; 
            if($userLike->save()&&$template->save())
            {
                return array('result'=>true,'message'=>'感谢您的投票');
            }
        }
        return array('result'=>false,'message'=>'系统忙,正在为你传递爱心:)');
    }

    public static function getList($userId)
    {
        $dbCommand = Yii::app()->db->createCommand("
            SELECT  template_id from user_like where user_id = :userId ");
        return $dbCommand->queryColumn(array(':userId'=>$userId));
    }

}
