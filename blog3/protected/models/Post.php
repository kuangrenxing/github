<?php

/**
 * This is the model class for table "tbl_post".
 *
 * The followings are the available columns in table 'tbl_post':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property integer $status
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $author_id
 */
class Post extends CActiveRecord
{	const STATUS_DRAFT=1;
    const STATUS_PUBLISHED=2;
    const STATUS_ARCHIVED=3;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Post the static model class
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
		return 'tbl_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content,tags', 'required'),
			
			array('title', 'length', 'max'=>256),
			array('tags', 'length', 'max'=>32),
			array('status','in','range'=>array(1,2,3)),
			array('title','check_title_existed','on'=>'create'),
			//array('tags','mat'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, content, tags, status, create_time, update_time, author_id', 'safe', 'on'=>'search'),
		);
	}
	public function check_title_existed($attribute,$params){
		if(!$this->hasErrors()){
			if(Post::model()->find('title=:title',array(
				':title'=>$this->title
			))){
				$this->addError('title','标题已重复');
			}
		}	
	}
	
	

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
        'comments' => array(self::HAS_MANY, 'Comment', 'post_id',
            'condition'=>'comments.status='.Comment::STATUS_APPROVED,
            'order'=>'comments.create_time DESC'),
        'commentCount' => array(self::STAT, 'Comment', 'post_id',
            'condition'=>'status='.Comment::STATUS_APPROVED),
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'content' => 'Content',
			'tags' => 'Tags',
			'status' => 'Status',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'author_id' => 'Author',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('author_id',$this->author_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	//
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}

	//检查标题是否重复
	public function check_existsd($attribute,$params){
		if(!$this->hasErrors){
			$post=User::model()->find('title=:title',array(':title'=>$this->title));
			if(!$post){
				$this->addError('title','标题重复了');
			
			}
		}}
		//添加 url 属性 
		public function getUrl()
    {
     	return Yii::app()->createUrl('post/view',array(
			'id'=>$this->id,
			'title'=>$this->title,
			));
    }
	//保存前 加时间和author_id
	protected function beforeSave(){
		if(parent::beforeSave()){
			if($this->isNewRecord){
				$this->create_time=$this->update_time=time();
				$this->author_id=Yii::app()->user->id;
			}
			else
				$this->update_time=time();
			return true;
		}
		return false;
	
	}
	//保存后更新tag表
	protected function afterSave(){
		parent::afterSave();
		Tag::model()->updateFrequency($this->_oldTags,$this->tags);	
		
	}
	private $_oldTags;
	protected function afterFind(){
		parent::afterFind();
		$this->_oldTags=$this->tags;
	}
	//删除后
	protected function afterDelete(){
		parent::afterDelete();
		Comment::model()->deleteAll('post_id=:post_id',array(
			':post_id'=>$this->id));
		Tag::model()->updateFrequency($this->tags,'');
		
	}
	//添加留言
/*	public function addComment($comment)
	{
		if(Yii::app()->params['commentNeedApproval'])
			$comment->status=Comment::STATUS_PENDING;
		else
			$comment->status=Comment::STATUS_APPROVED;
		$comment->post_id=$this->id;
		return $comment->save();
	}*/
	protected function newComment($post)
	{
		$comment=new Comment;
	 
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}
	 
		if(isset($_POST['Comment']))
		{
			$comment->attributes=$_POST['Comment'];
			if($post->addComment($comment))
			{
				if($comment->status==Comment::STATUS_PENDING)
					Yii::app()->user->setFlash('commentSubmitted','Thank you...');
				$this->refresh();
			}
		}
		return $comment;
	}
		public function addComment($comment)//*******************************
		{
			if(Yii::app()->params['commentNeedApproval'])
			{
				$comment->status=Comment::STATUS_PENDING;
				
			}
			else
			{
				$comment->status=Comment::STATUS_APPROVED;
				
			}
			$comment->post_id=$this->id;
			return $comment->save();
		}
		/**
		 * @return array a list of links that point to the post list filtered by every tag of this post
		 */
		public function getTagLinks()
		{
			$links=array();
			foreach(Tag::string2array($this->tags) as $tag)
				$links[]=CHtml::link(CHtml::encode($tag), array('post/index', 'tag'=>$tag));
			return $links;
		}	
	
	
}