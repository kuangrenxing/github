<?php
class UploadController extends AdminController
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
			/* array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','update','create','list','test','after','afterlist','testtt'),
				'users'=>array('*'),
			), */
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','update','create','list','test','after','afterlist','testtt'),
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
        $model=new Upload("create");   
        if(isset($_POST['Upload']))
        {	//print_r($_POST['Upload']);echo "<br>";
            $model->attributes=$_POST['Upload'];
            //echo $model->input_name;exit;
			
			
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
                //$model->image->saveAs('upload/'.$model->image->getName());
                $model->image->saveAs('upload/'.$model->input_name.'.zip');//exit;
                // redirect to success page
                
               //$root = YiiBase::getPathOfAlias('webroot').Yii::app()->getBaseUrl();
                //$folder = '/upload/albums/'; 
                 
                $group_id=TplGroup::model()->check_group_name(str_replace('.zip', '', $model->input_name.'.zip'),$model->grade,$model->status);
                //echo $group_id;
                //exit;
                
                $root=Yii::app()->basePath.'/../tpls/';
                if(!is_dir($root)){
                
                	if(!mkdir($root, 0, true))
                
                	{
                
                		throw new Exception('创造文件夹失败...');
                
                	}
                
                }

               
                chmod($root, 0755);
                
                $zip = Yii::app()->zip;
                
                $zip->extractZip(Yii::app()->basePath . '/../upload/'.$model->input_name.'.zip', $root);
               
                

                //chdir($root.'/'.str_replace('.zip', '', $model->input_name.'.zip'));
                chdir($root.'/'. str_replace('.zip', '', $model->image->getName()));
                
                //清空Tpl表对应Group_id的数据
                Tpl::model()->exist_db_group($group_id);
                
/*                 $hand=opendir(getcwd());                
                while($a=readdir($hand))
                {
                	if($a=="." || $a=="..")
                	{
                	}
                	else
                	{
                		$result[]=$a;
                		Tpl::model()->upload_file($a,$group_id,str_replace('.zip', '', $model->image->getName()));
                		
                		/* if(copy($root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a,$root.'/'.$a))
                		{  
                			unlink($root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a);          			
                		}
                		else 
                			echo "copy error!"; */
                		//echo $root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a;exit;
                //	}
               // } */
                /* chdir($root.'/'.str_replace('.zip', '', $model->image->getName()));
                $hand=opendir(getcwd());
                while($a=readdir($hand))
                {
                	if($a=="." || $a=="..")
                	{
                	}
                	else
                	{
                		$result[]=$a;
                		
                	
                		if(copy($root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a,$root.'/'.$a))
                		{
                			unlink($root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a);
                		}
                		else
                			echo "copy error!";
                		//echo $root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a;exit;
                	}
                } */
                //echo $root.str_replace('.zip', '', $model->image->getName());echo "<br>";
                //echo $root.$group_id;//exit;
                if (file_exists($root.'/'.str_replace('.zip', '', $model->image->getName())) && is_dir($root.'/'.str_replace('.zip', '', $model->image->getName())))
                {	if (file_exists($root.$group_id) && is_dir($root.$group_id))
                	{
                		//rmdir($root.$group_id);
                		chmod($root.$group_id, 0777);
                		if(file_exists($root.$group_id)){
                		
                			TplGroup::model()->delFileByDir($root.$group_id);
                		
                			while(count(scandir($root.$group_id))!=2)
                		
                				TplGroup::model()->delDirByDir($root.$group_id);
                		
                			TplGroup::model()->delDirByDir($root.$group_id);
                		
                		}
                		
                		
                	}
                	//if (!dir($root.$group_id)) //没有读权限
                	rename($root.str_replace('.zip', '', $model->image->getName()),$root.$group_id);
                }
                
                
                
                chdir($root.$group_id);
                 $hand=opendir(getcwd());
                 while($a=readdir($hand))
                 {
                if($a=="." || $a=="..")
                {
                }
                else
                {
                if(strpos($a, '.php')>0)
                $result[]=$a;
                //Tpl::model()->upload_file($a,$group_id,str_replace('.zip', '', $model->image->getName()));
                Tpl::model()->upload_file($a,$group_id,str_replace('.zip', '', $model->input_name.'.zip'),$model->grade,$model->status);
                
                /* if(copy($root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a,$root.'/'.$a))
                {
                unlink($root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a);
                }
                else
                	echo "copy error!"; */
                //echo $root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a;exit;
                }
                }                
                Yii::app()->user->setFlash('succword','恭喜你，上传成功！');
                /* if (file_exists($root.'/'.str_replace('.zip', '', $model->image->getName()))){
                //if(is_dir(){
                 if(rmdir($root.'/'.str_replace('.zip', '', $model->image->getName())))
                {}
                else
                	echo "删除error".$root.'/'.str_replace('.zip', '', $model->image->getName()); 
                } */
                //Tpl::model()->upload_file($a,$filedir,$filedir1);
               
                // unlink(Yii::app()->basePath."/../upload/".$model->image->getName());

				//$this->redirect('index.php?r=Upload/list&name='.$model->image->getName());
				//$this->redirect(array('list','filename'=>$model->image->getName()));	
                //$this->redirect(array('test','filedir'=>$root,'group_id'=>$group_id));
				
                //echo "OK";
            }
	//}
        }
        $this->render('create', array('model'=>$model));
    }
    
    
    
    
    
    
    
    
    //修改文件
    public function actionUpdate($input_name,$group_id,$grade,$status)
    {
    	$model=new Upload("update");
    	if(isset($_POST['Upload']))
    	{	//print_r($_POST['Upload']);exit;
    		//echo $group_id;exit;
    		/* if($_POST['Upload']['input_name']!="")
    		{
    			$model->chk_update_name($_POST['Upload']['input_name']);
    		}
			else 
			{
				echo "NO";exit;
			} */
    		
    		
    		$model->attributes=$_POST['Upload'];
    		$model->group_id = $group_id;
    		//echo $model->input_name;exit;
    		if($_POST['Upload']['input_name']!="")
    		{
    		 	$model->input_name=$_POST['Upload']['input_name'];    		
    			if(file_exists(Yii::app()->basePath.'/../upload/'.$input_name.'.zip'))
    		 		unlink(Yii::app()->basePath.'/../upload/'.$input_name.'.zip');
    		}
    		else
    		  	$model->input_name=$input_name;
    		
    		//print_r($_POST['Upload']);exit;
    		if($_POST['Upload']['grade']!="")
    			$model->grade=$_POST['Upload']['grade'];
    		else 
    			$model->grade=$grade;
    		
    		if($_POST['Upload']['status']!="")
    			$model->status=$_POST['Upload']['status'];
    		else 	
    			$model->status=$status;
    		
//     		Upload::model()->update_um
   			//echo $model->input_name;exit;
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
    			//$model->image->saveAs('upload/'.$model->image->getName());
    			if($model->image !== null)  
    			{  			
    			$model->image->saveAs('upload/'.$model->input_name.'.zip');//exit;
    			// redirect to success page
    
    			//$root = YiiBase::getPathOfAlias('webroot').Yii::app()->getBaseUrl();
    			//$folder = '/upload/albums/';
    			
    			//$group_id=TplGroup::model()->check_group_name(str_replace('.zip', '', $model->input_name.'.zip'));
    			
    			TplGroup::model()->update_group_name($group_id,$model->input_name,$model->grade,$model->status);
    			//echo $group_id;
    			//exit;
    
    			$root=Yii::app()->basePath.'/../tpls/';
    			if(!is_dir($root)){
    
    			if(!mkdir($root, 0, true))
    
    			{
    
    				throw new Exception('创造文件夹失败...');
    
    			}
    
    			}
    
    
    			chmod($root, 0755);
    
    			$zip = Yii::app()->zip;
    
    			$zip->extractZip(Yii::app()->basePath . '/../upload/'.$model->input_name.'.zip', $root);
    
    
    
    			//chdir($root.'/'.str_replace('.zip', '', $model->input_name.'.zip'));
    			chdir($root.'/'. str_replace('.zip', '', $model->image->getName()));
    
    			//清空Tpl表对应Group_id的数据
    			Tpl::model()->exist_db_group($group_id);
    
    			/*                 $hand=opendir(getcwd());
    			while($a=readdir($hand))
    			{
    			if($a=="." || $a=="..")
    			{
    			}
    			else
    			{
    			$result[]=$a;
    			Tpl::model()->upload_file($a,$group_id,str_replace('.zip', '', $model->image->getName()));
    
    			/* if(copy($root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a,$root.'/'.$a))
    			{
    			unlink($root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a);
    			}
    			else
    				echo "copy error!"; */
    			//echo $root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a;exit;
    			//	}
    			// } */
    			/* chdir($root.'/'.str_replace('.zip', '', $model->image->getName()));
    			$hand=opendir(getcwd());
    			while($a=readdir($hand))
    			{
    			if($a=="." || $a=="..")
    			{
    			}
    			else
    			{
    			$result[]=$a;
    
    
    			if(copy($root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a,$root.'/'.$a))
    			{
    			unlink($root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a);
    			}
    			else
    				echo "copy error!";
    			//echo $root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a;exit;
    			}
    			} */
    			//echo $root.str_replace('.zip', '', $model->image->getName());echo "<br>";
    				//echo $root.$group_id;//exit;
    				if (file_exists($root.'/'.str_replace('.zip', '', $model->image->getName())) && is_dir($root.'/'.str_replace('.zip', '', $model->image->getName())))
    			{
    				if (file_exists($root.$group_id) && is_dir($root.$group_id))
    				{
    					//rmdir($root.$group_id);
    					chmod($root.$group_id, 0777);
    					if(file_exists($root.$group_id)){
    
    					TplGroup::model()->delFileByDir($root.$group_id);
    
    					while(count(scandir($root.$group_id))!=2)
    
    					TplGroup::model()->delDirByDir($root.$group_id);
    
    					TplGroup::model()->delDirByDir($root.$group_id);
    
    					}
    
    
    					}
    						//if (!dir($root.$group_id)) //没有读权限
    						rename($root.str_replace('.zip', '', $model->image->getName()),$root.$group_id);
    					}
    
    
    
    					chdir($root.$group_id);
    					$hand=opendir(getcwd());
    					while($a=readdir($hand))
    						{
    							if($a=="." || $a=="..")
	    							{ }
	    						else
		    						{
		    						if(strpos($a, '.php')>0)
		    							$result[]=$a;
		    						//Tpl::model()->upload_file($a,$group_id,str_replace('.zip', '', $model->image->getName()));
		    						
		    						Tpl::model()->upload_file($a,$group_id,$model->input_name,$model->grade,$model->status);
		    						
		    						/* if(copy($root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a,$root.'/'.$a))
		    						{
		    						unlink($root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a);
		    						}
		    						else
		    							echo "copy error!"; */
		    						//echo $root.'/'.str_replace('.zip', '', $model->image->getName()).'/'.$a;exit;
    								}
    						}
    			}
    			else {
    				
    				TplGroup::model()->update_group_name($group_id,$model->input_name,$model->grade,$model->status);
    				
    				$root=Yii::app()->basePath.'/../tpls/';
    				chdir($root.$group_id);
    				$hand=opendir(getcwd());
    				while($a=readdir($hand))
    				{
    					if($a=='.' || $a=='..'){}
    					else 
    					{
    						if(strpos($a, '.php')>0)
    							//$result[]=$a;
    						//echo $a.'||'.$group_id.'||'.$model->input_name.'||'.$model->grade.'||'.$model->status.'<br>';
    						
    						 Tpl::model()->update_nofile($a,$group_id,$model->input_name,$model->grade,$model->status);
    					
    					}
    				}
    				
    				
    			}
    				Yii::app()->user->setFlash('succword','恭喜你，修改上传成功！');
    						/* if (file_exists($root.'/'.str_replace('.zip', '', $model->image->getName()))){
    						//if(is_dir(){
    								if(rmdir($root.'/'.str_replace('.zip', '', $model->image->getName())))
    								{}
    								else
    							echo "删除error".$root.'/'.str_replace('.zip', '', $model->image->getName());
    			} */
    //Tpl::model()->upload_file($a,$filedir,$filedir1);
    
    // unlink(Yii::app()->basePath."/../upload/".$model->image->getName());
    
    //$this->redirect('index.php?r=Upload/list&name='.$model->image->getName());
    //$this->redirect(array('list','filename'=>$model->image->getName()));
    //$this->redirect(array('test','filedir'=>$root,'group_id'=>$group_id));
    
    //echo "OK";
    }
    //}
    }
    $this->render('update', array('model'=>$model));
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
		//echo strpos("fds.jpg",'fjpg');
		/* echo file_exists("/var/www/taoWidget/pepsi/tpls/11");
		if(is_dir("/var/www/taoWidget/pepsi/tpls/11"))
		{
			echo ("$file is a directory");
		}
		else
		{
			echo ("$file is not a directory");
		}
		rename("/var/www/taoWidget/pepsi/protected/../tpls/National_holiday","/var/www/taoWidget/pepsi/protected/../tpls/11"); */
		//echo realpath("/var/www/taoWidget/pepsi/protected/../tpls/12");
/* 		$dir="/var/www/taoWidget/pepsi/protected/../tpls/4";
		$dir = realpath($dir);
		    if($dir=='' || $dir=='/' || (strlen($dir)==3 && substr($dir,1)==':\\'))
			    {
			         return false;
			     }
			     else
				     {
				         if(false != ($dh=opendir($dir)))
					         {
					             while(false != ($file=readdir($dh)))
						             { chmod("/var/www/taoWidget/pepsi/tpls/4/", 0777);
						             //echo $dir.DIRECTORY_SEPARATOR.$file;exit;
						             	
						                 if($file=='.' || $file=='..') {
							continue;
						}
						                 echo $path=$dir .DIRECTORY_SEPARATOR . $file;
						                  if (is_dir($path))
							              {
							              	chmod($path, 0755);
							                      if(!rmdir($path))
							                      {
							                      	
							                      	while(false != ($file1=readdir($path)))
							                      	{chmod($path.DIRECTORY_SEPARATOR .$file1, 0755);
							                      		unlink($file1);
							                      	}
							                      	rmdir($path);
							                      	//return false;
							                      }
											}
						                      else
							                      {
							                         unlink($path);
							                          echo $path."文件以删除<br>";
							                      }
							                  }
							                  closedir($dh);
							                  rmdir($dir);
							                  echo "删除文件夹成功";
							                  return true;
							             }
							
							         else
								         {
								            return false;
							         }
								
								
								         }	*/	
		
		//chown -R apache.apache /path to DocumentRoot/
		chmod("/var/www/taoWidget/pepsi/tpls/1", 0777);
		if(file_exists("/var/www/taoWidget/pepsi/tpls/1")){
		
			TplGroup::model()->delFileByDir("/var/www/taoWidget/pepsi/tpls/1");
		
			while(count(scandir("/var/www/taoWidget/pepsi/tpls/1"))!=2)
		
				TplGroup::model()->delDirByDir("/var/www/taoWidget/pepsi/tpls/1");
		
			TplGroup::model()->delDirByDir("/var/www/taoWidget/pepsi/tpls/1");
		
		}		
		
		
	} 	

}
?>
