<?php

/**
 * This is the model class for table "dapei".
 *
 * The followings are the available columns in table 'dapei':
 * @property string $id
 * @property string $user_id
 * @property string $template_id
 * @property string $title
 * @property integer $status
 * @property integer $publish_status
 * @property string $publish_count
 * @property string $html
 * @property string $created
 * @property string $updated
 */
class Dapei extends CActiveRecord
{
    const TB_IMG_CATNAME = '大搭出手素材';

	const STATUS_VALID = 1;
	const STATUS_INVALID = 0;


	/**
	 * Returns the static model of the specified AR class.
	 * @return Dapei the static model class
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
		return 'dapei';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('user_id, template_id, status, publish_status, html, created, updated', 'required'),
			array('html, title', 'required'),
			array('status, publish_status, publish_count', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>128),
			array('template_id, publish_count, created, updated', 'length', 'max'=>10),
			array('title', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, template_id, title, status, publish_status, publish_count, html, created, updated', 'safe', 'on'=>'search'),
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
            'meals' => array(self::HAS_MANY, 'DapeiMeal', 'dapei_id'),
			'job' => array(self::HAS_ONE, 'Job', 'feed_id', 'condition'=>'`job`.`feed_type`='.Job::FEED_DAPEI),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'template_id' => 'Template',
			'title' => 'Title',
			'status' => 'Status',
			'publish_status' => 'Publish Status',
			'publish_count' => 'Publish Count',
			'html' => 'Html',
			'created' => 'Created',
			'updated' => 'Updated',
		);
	}

    protected function afterValidate()
    {
       // TODO: upload images to shop tupu.
       //
    }
    
    private function _chkGetTbPic($pic_cid, $title, $size)
    {

        $top = Yii::app()->top;

        $req = new PictureGetRequest;
        $req->setPictureCategoryId($pic_cid);
        $req->setTitle($title);

        $pic = $top->execute($req, Yii::app()->user->id); 

        if ( isset($pic->totalResults) && $pic->totalResults == 1)
        {
           return  ( $pic->pictures->picture[0]->title == $title ) 
                && ( $pic->pictures->picture[0]->sizes == $size ) ? $pic->pictures->picture[0] : null;
        }
        return null;
    }

    private function _rpTbPic($pic_id)
    {
        $top = Yii::app()->top;
        
        $req = new PictureReplaceRequest;
        $req->setPictureId($pic_id);

        $top->execute($req,Yii::app()->user->id);     
    }

    private function _chkSpaceAvaibled($pic_size)
    {
        $top = Yii::app()->top;
        $req = new PictureUserinfoGetRequest;
        
        $info = $top->execute($req,Yii::app()->user->id);     
        if (isset($info->user_info->available_space)
            && ($info->user_info->available_space > $pic_size / 1024 / 1024))
            return true;
        return false;
    }



    public function UploadToTB($tpl_id, $html, $update_same_pic = false)
    {
        $top = Yii::app()->top;
        // check the cate 
        $req = new PictureCategoryGetRequest;
        $req->setPictureCategoryName(self::TB_IMG_CATNAME);
        $cat_da = $top->execute($req,Yii::app()->user->id);     

        if(!isset($cat_da->picture_categories->picture_category))
        {
           $req = new PictureCategoryAddRequest;
           $req->setPictureCategoryName(self::TB_IMG_CATNAME);
           $req->setParentId(0);
           $cat_da = $top->execute($req,Yii::app()->user->id);     
           $pic_cid = $cat_da->picture_category->picture_category_id;
        }
        else
        {
           $pic_cid = $cat_da->picture_categories->picture_category['0']->picture_category_id;    
        }


        $req = new PictureCategoryGetRequest;
        $req->setPictureCategoryName('tpl_'.$tpl_id);
        $cat_da = $top->execute($req,Yii::app()->user->id);     

        if(!isset($cat_da->picture_categories->picture_category))
        {
            $req = new PictureCategoryAddRequest;
            $req->setPictureCategoryName('tpl_'. $tpl_id);
            $req->setParentId($pic_cid);
            $cat_cur = $top->execute($req,Yii::app()->user->id);     
            $pic_cid = $cat_cur->picture_category->picture_category_id;
        }
        else
        {
            $pic_cid = $cat_da->picture_categories->picture_category['0']->picture_category_id; 
        }


        //
        // TODO: scan html's image and then update to taobao
        //
        // $pattern = "/(src|background)=[\"\']?([^\"']?.*(png|jpg|gif))[\"\']?/i";
        $pattern = '/(src|background)="([^"]*)"/';
        preg_match_all($pattern, $html, $matchs);
        $matched = array_unique($matchs[2]); 
        if (count($matched))
        {
            foreach ($matched as $img_url) 
            {
                if(!stripos($img_url , 'taobaocdn'))
                {
                    $img_url_r = Yii::app()->basePath . '/../'. substr($img_url, 4);   
                    if (file_exists($img_url_r))
                    {                 
                        $img_info = pathinfo($img_url_r);
                       
                        $pic = $this->_chkGetTbPic($pic_cid, $img_info['filename'], filesize($img_url_r));
                        if (  $pic == null || $pic->picture_id == null || $update_same_pic )  
                        {
                            if ($pic != null && $pic->picture_id != null && $update_same_pic )
                                $this->_rpTbPic($pic->picture_id);
                            else if ($pic == null) 
                            {
                                if ($this->_chkSpaceAvaibled(filesize($img_url_r)) == false)
                                    return false;

                                $req = new PictureUploadRequest;
                                $req->setPictureCategoryId($pic_cid);
                                //附件上传的机制参见PHP CURL文档，在文件路径前加@符号即可
                                $req->setImg('@'.$img_url_r);
                                $req->setImageInputTitle($img_info['basename']);
                                $req->setTitle($img_info['basename']);
                                $top_resp = $top->execute($req, Yii::app()->user->id);
                                $pic = $top_resp->picture;
                            }

                            if(isset($pic->picture_path))
                                $html = str_replace($img_url, $pic->picture_path, $html); 
                        }
                        /*
                        */
                    }
                }
            }
        }
        return $html;
    }


    protected function beforeSave()
    {
        if($this->isNewRecord)
        {
            $this->created=time();
			$this->status = $this->publish_status = $this->publish_count = 0;
        }
        $this->updated=time();
        $this->user_id = Yii::app()->user->getState('user_id');
      
        $result = $this->UploadToTB($this->template_id, $this->html);
        if (!$result) 
          $this->addError('title', '图片上传出错，请坚持您的图片空间的使用情况！');      
        $this->html = $result; 
        

        return parent::beforeSave();           
    }


	public function genHtml()
	{
		
	}

    public function addMeal($meal)
	{
		$meal->dapei_id=$this->id;
        $meal->title=$this->title;
        $meal->template_id=$this->template_id;
        
		return $meal->save();
	}
	
	public function newJob($job)
	{
		$job->feed_id=$this->id;
        $job->feed_type= (int)Job::FEED_DAPEI;
		$job->user_id = $this->user_id;
        //$meal->template_id=$this->template_id;
        
		return $job->save();
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('template_id',$this->template_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('publish_status',$this->publish_status);
		$criteria->compare('publish_count',$this->publish_count,true);
		$criteria->compare('html',$this->html,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
