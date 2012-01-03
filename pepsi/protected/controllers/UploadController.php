<?php
class UploadController extends Controller
{	
	//public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','list','test','after','afterlist'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				
				'users'=>array('@'),
			),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	

	//�ϴ��ļ�
    public function actionCreate()
    {
        $model=new Upload;   
        if(isset($_POST['Upload']))
        {	//print_r($_POST['Upload']);echo "<br>";
            $model->attributes=$_POST['Upload'];
            
			
			
            $model->image=CUploadedFile::getInstance($model,'image');
            
         
	   /*  echo $model->image->getType();
         echo $model->image->getSize();
         exit; */
         
/* 	if($model->image->getType()!="application/zip")
	{
		echo "文件类型不支持，应该是.zip文件";exit;
	}
	else if($model->image->getSize()>=50000){
		echo "文件容量：".$model->image->getSize()." 文件过大,应该小于5000";exit;
	} 
	else { */	 
	if($model->save())
            {
			//print_r($model->image);
			//echo "<br>";
			
			//
		
		//print_r($re);exit;
                $model->image->saveAs('upload/'.$model->image->getName());
                // redirect to success page
                
               //$root = YiiBase::getPathOfAlias('webroot').Yii::app()->getBaseUrl();
                //$folder = '/upload/albums/'; 
                 
                $group_id=TplGroup::model()->check_group_name(str_replace('.zip', '', $model->image->getName()));
                //echo $group_id;
                //exit;
                
                $root=Yii::app()->basePath.'/../tpls/'.$group_id;
                if(!is_dir($root)){
                
                	if(!mkdir($root, 0, true))
                
                	{
                
                		throw new Exception('创造文件夹失败...');
                
                	}
                
                }

               
                chmod($root, 0755);
                
                $zip = Yii::app()->zip;
                
                $zip->extractZip(Yii::app()->basePath . '/../upload/'.$model->image->getName(), $root);
               
                

                chdir($root.'/'.str_replace('.zip', '', $model->image->getName()));
                
                //echo Yii::app()->basePath.'/../tpls/'.$filedir;exit;
                Tpl::model()->exist_db_group($group_id);
                
                $hand=opendir(getcwd());                
                while($a=readdir($hand))
                {
                	if($a=="." || $a=="..")
                	{
                	}
                	else
                	{
                		$result[]=$a;
                		Tpl::model()->upload_file($a,$group_id,str_replace('.zip', '', $model->image->getName()));
                
                	}
                }
                //Tpl::model()->upload_file($a,$filedir,$filedir1);
               
                // unlink(Yii::app()->basePath."/../upload/".$model->image->getName());

				//$this->redirect('index.php?r=Upload/list&name='.$model->image->getName());
				//$this->redirect(array('list','filename'=>$model->image->getName()));	
                $this->redirect(array('test','filedir'=>$root,'group_id'=>$group_id));
				
            }
	//}
        }
        $this->render('create', array('model'=>$model));
    }
	//�鿴�ϴ��ļ����ļ�
	public function actionList()
	{	
		chdir(Yii::app()->basePath.'/../upload/');
		$hand=opendir(getcwd());
		while($result=readdir($hand)){
			if($result=="." || $result== ".."){}
			else
			$re[]=$result;
		}
		

		$this->render('list',array('re'=>$re,'filename'=>$_GET['filename']));
	}

	
	//��ѹ
	public function actionTest($filedir,$group_id)
	{   
		/* $zip = Yii::app()->zip;	

		$zip->extractZip(Yii::app()->basePath . '/../upload/'.$filename, Yii::app()->basePath . '/../tpls/');  */

		chdir($filedir);
		$hand=opendir(getcwd());
		while($a=readdir($hand)){
			if($a=='.' || $a==".." || $a==".bin"){}
			else
				$result[]=$a;
		}
		
		$this->render('after',array('result'=>$result,'group_id'=>$group_id));
		
	}
	
	public function actionAfter($filename)
	{		
		$this->render('after',array('filename'=>$filename));
	}
	
	public function actionAfterList($filedir,$filedir1)
	{	//da/upload/AfterList/filedir/zip
		chdir(Yii::app()->basePath.'/../tpls/'.$filedir.'/'.$filedir1);
		//echo Yii::app()->basePath.'/../tpls/'.$filedir;exit;
		$hand=opendir(getcwd());
		while($a=readdir($hand))
		{
			if($a=="." || $a=="..")
			{
			}
			else
			{
				$result[]=$a;
				//Tpl::model()->upload_file($a,$filedir,$filedir1);
				
			}
		}
		$this->render('afterlist',array('result'=>$result));
	}
	
	
	public function actionTesttt()
	{
		echo str_replace('.php', '', '12_34.php');
		
	}
}
?>
