<?php

class JobController extends Controller
{
    public function filters()
    {
        return array(
			'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules()
    {
        return array(
        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view','itemInfo','rollback', 'process', 'dropall', 'processing'),
				'users'=>array('@'),
                'expression'=>"Yii::app()->user->getState('grade')>0",
        ),
        array('deny',  // deny all users
				'users'=>array('*'),
        ),
        );
    }


    public function actionView($id,$status,$type)
    {    
       $jobItemDataProvider=new CActiveDataProvider('jobItem', array(
           'criteria'=>array(
               'condition'=>'t.job_id = :task_id and t.status = :status AND job.type = :type',
               'order'=>'item_id DESC',
				'with'=>'job',
				'together'=>true,
               'params'=>array(':task_id'=>$id,':status'=>$status,':type'=>$type),
           ),
           'pagination'=>array(
               'pageSize'=>YII_DEBUG?3:20,
           ),
       ));     

       $task = $this->loadModel($id);
       
       $this->render('view',array(
            'task'     => $task,
            'pages'     => $jobItemDataProvider->pagination,
            'itemList'  => $jobItemDataProvider->getData(),
       ));  
    }

	public function loadModel($id)
    {
        $model=Job::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function actionCreate()
    {
        $result = false;
        $errors = array();

        if(isset($_POST['data']))
        {  
			$data = CJSON::decode($_POST['data']);

			$dapei_id = (int) $data['dapeiId'];
			$dapei = Dapei::model()->findByPk($dapei_id);
		
			if($dapei===null) {
		         array_push($errors, array('无效的套餐，无效的请求'));
				 echo CJSON::encode(array(
				            'success'=>$result,
				            'errors'=>array_filter($errors),
				        ));
				 Yii::app()->end();
			}
	
           	$job = new Job;
			$job->type = (int) Job::TYPE_UPDATE;
			$job->publish_count = count($data['itemCart']);	
			$dapei->newJob($job);
   
       		array_push($errors,$job->errors);

			$itemCart = $data['itemCart'];
            foreach ($itemCart as $item) 
            {	
                $jobItem = new JobItem;
                $jobItem->job_id = $job->id;
                $jobItem->item_id = isset($item->num_iid)?$item->num_iid:(isset($item['num_iid'])?$item['num_iid']:$item['id']);
                $jobItem->item_name = isset($item->title)?$item->title:$item['title'];
                $jobItem->position = isset($data['position'])?$data['position']:$item['position'];
				$jobItem->status = Job::STATUS_WAIT;
                $jobItem->save();
                array_push($errors,$jobItem->errors);
                unset($jobItem);
            }    
			
			$result = count(array_filter($errors)) == 0 ? true: false;
        }

        echo CJSON::encode(array(
            'success'=>$result,
            'errors'=>array_filter($errors),
        ));
        Yii::app()->end();
    }

	public function actionDropAll()
	{
		$result = false;
        $errors = array();

        if(isset($_POST['data']))
        {  
			$data = ($_POST['data']);
			$old_type = $_POST['old_type'];
			$data['position'] = 0;
			
			$job = new Job;
			$job->type = (int) Job::TYPE_ROLLBACK;
			$job->publish_count = count($data['itemCart']);	
			$job->feed_type = Job::FEED_FAKE_DROPALL;
			$job->feed_id = 0;
			$job->user_id = Yii::app()->user->getState('user_id');
			$job->save();
			
			array_push($errors,$job->errors);

			$itemCart = $data['itemCart'];
            foreach ($itemCart as $item) 
            {	
                $jobItem = new JobItem;
                $jobItem->job_id = $job->id;
                $jobItem->item_id = isset($item->num_iid)?$item->num_iid:(isset($item['num_iid'])?$item['num_iid']:$item['id']);
                $jobItem->item_name = isset($item->title)?$item->title:$item['title'];
                $jobItem->position = isset($data['position'])?$data['position']:$item['position'];
				$jobItem->status = Job::STATUS_WAIT;
                $jobItem->save();
                array_push($errors,$jobItem->errors);
                unset($jobItem);
            }
			$result = count(array_filter($errors)) == 0 ? true: false;
		}
		
		echo CJSON::encode(array(
            'success'=>$result,
            'errors'=>array_filter($errors),
			'job_id'=>$result?$job->id:0
        ));
        Yii::app()->end();
	}

	public function actionUpdate($id)
	{
		$job = $this->loadModel($id);
		if (!empty($job) && isset($job->status))
		{
			$job->feeder->genHtml();
			$job->status = Job::STATUS_WAIT;
			$job->successer = 0;
			$job->failer = 0;
			$job->save();
			
			$jobitems = JobItem::model()->findAllByAttributes(array('job_id'=>$job->id));
			foreach ($jobitems as $jobitem) 
			{ 
				$jobitem->status = Job::STATUS_WAIT;
				$jobitem->save();
			}
		
			echo CJSON::encode(array(
            	'success'=>true,
        	));
        	Yii::app()->end();
		}
		
		
		echo CJSON::encode(array(
            'success'=>false,
        ));
        Yii::app()->end();
			
	}
	
	public function actionRollBack($id)
	{
		$job = $this->loadModel($id);
		
		if (!empty($job) && isset($job->status))
		{
			if (($job->status == Job::STATUS_FINISHED) && ($job->type == Job::TYPE_UPDATE))
			{
				$job->type = Job::TYPE_ROLLBACK;
				$job->successer = 0;
				$job->failer = 0;
				
				$jobitems = JobItem::model()->findAllByAttributes(array('job_id'=>$job->id));
				foreach ($jobitems as $jobitem) 
				{ 
					$jobitem->status = Job::STATUS_WAIT;
					$jobitem->save();
				}
			}
			
			$job->status = Job::STATUS_WAIT;
			$job->save();
			
			echo CJSON::encode(array(
	            'success'=>true,
	        ));
	        Yii::app()->end();
		}
			

		
		echo CJSON::encode(array(
            'success'=>false,
        ));
        Yii::app()->end();
	}
	
	public function actionProcessing()
	{
		$this->render('processing');
	}


	public function actionProcess()
	{
		/* 0 =  no job
		 * 1 =  has job
		 * 3 = error 
		 */
		$code = 0;
		$data = array();
		$result = false;
		$rt = "";
		
		$beginTime = time(); 
		
		//$job = Job::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->getState('user_id')), 'status = 0 order BY created ASC AND limit 0, 1');
		
		$job = Job::model()->find(array(
			'condition' => 'user_id = :user_id AND status = ' . Job::STATUS_WAIT,
			'offset' => 0,
			'limit' => 1,
			'order' => 'created ASC',
			'params' => array(':user_id' => Yii::app()->user->getState('user_id')),	
		));
		

		
		if($job)
        {
            $job->setProcessingStatus();
 
            try{
                
               		$jobItemList = JobItem::getList($job->id);
	                $hashTag      = md5('xdb_'. $job->id);
	
	                $rollback = ($job->type == (int)Job::TYPE_ROLLBACK)?true:false;

	                foreach($jobItemList as $jobItem)
	                {
						if ($jobItem->status == Job::STATUS_FINISHED) continue;
		
	            
	                    $item = Item::getOne(array(
	                        'setFields' => 'title,desc',
	                        'setNumIid' => $jobItem->item_id,
	                    ));

	                    if (!$item || isset($item->code))
	                    {
	                        $jobItem->status = Job::STATUS_FAILED;
	                        $this->_logger($task->id,$jobItem->item_id,'调用失败'.(isset($item->sub_msg)?$item->sub_msg:'连接淘宝失败！！！'));
	                        $jobItem->save();   
							$job->updateFailedCounter();
	                        continue;
	                    }
	                    $desc    =  preg_replace("/\\\/",'', $item->item->desc);
	                    $title   = $item->item->title;

						if ($job->feed_type != Job::FEED_FAKE_DROPALL)
						{
							$wrapTagBegin = '<div title="xdb-'.$job->feed_type . '-' . $jobItem->position.'-'.$hashTag.'">';
		                    $wrapTagEnd   = '</div>';
		                    $htmlClip = $wrapTagBegin.CHtml::decode($job->feeder->html).$wrapTagEnd;
						}

	                    if(strpos($desc,$hashTag))
	                    {
	                        $doc = new simple_html_dom();
	                        $doc->load($desc);
	                        $doc->find('div[title="xdb-'.$job->feed_type . '-' . $jobItem->position.'-'.$hashTag.'"]',0)->outertext = ($rollback)?'':$htmlClip ; 
	                        $desc = (string) $doc;
	                    }
	                    else
	                    {
	                        if(!$rollback) 
	                        {
	                            $desc = ($jobItem->position!=0)?$desc.$htmlClip:$htmlClip.$desc;
	                        }
	                        else
	                        {   // rollback here!
								if ($job->feed_type != Job::FEED_FAKE_DROPALL) continue;
								// fake_dropall here.
								$doc = new simple_html_dom();
				                $doc->load($desc);
								$div_arr = $doc->find('div[title]',0);
								foreach($div_arr as $div) {
									if(preg_match('/^xdb(\-[\d+]{1}){1,2}\-[\w+]{32}$/', $div->attr['title']))
										$div->outertext ='';
								}

								$desc = (string) $doc;
	                        }  
	                    }

	                    $result = Item::updateOne(array(
	                        'setNumIid'=>$jobItem->item_id,
	                        'setDesc'=>$desc,
	                    ),Yii::app()->user->id); 
	                    if (!$result || isset($result->code))
	                    {
	                        $jobItem->status = Job::STATUS_FAILED;
	                        $this->_logger($job->id,$jobItem->item_id,'调用失败'.(isset($result->sub_msg)?$result->sub_msg:''));
	                        //var_dump($result);
							$job->updateFailedCounter();
							continue;
	                    }
	                    if (isset($result->item)) 
						{
	                        $jobItem->status = Job::STATUS_FINISHED;
	                        $jobItem->save();
							$job->updateSuccessCounter();
							
	  					}
	                }
	
	
					if (($job->successer == $job->publish_count ))
					{
						if ($job->type == Job::TYPE_ROLLBACK) 
						{
								//
								// TODO: delete the jobitem and related logger here.
								//
								JobItem::model()->deleteAllByAttributes(array('job_id'=>$job->id));
								JobLog::model()->deleteAllByAttributes(array('job_id'=>$job->id));
								if ($job->delete())
								{
									$result = true;
									$code = 0;
								}
						}
						else
						{
							$result = false;
							$code = 0;
							$job->setFinishedStatus();
						}
					}
					else
					{
						$result = false;
						$code = 1;
						
						$rt = $job->genResultTxt();
			            $job->setFailedStatus();
					}
            }
            catch( CException $e)
            {
                $message = array(
                'message'=>'未知错误',
                'CException'=>(array) $e,
                );
                XLogger::xlog($message,'warning','pepsi.controller.job.process'); 
				$code = 3;
				$rt = (array) $e;
            }
        }
       
    
		$data['code'] = $code;
		$data['lasting'] = time()-$beginTime;
		$data['result_txt'] = $rt;
		
		 echo CJSON::encode(array(
	            'success'=>$result,
	            'data'=>($data),
	        ));
	     Yii::app()->end();
	}
	
	private function _logger($taskId,$itemId,$message)
    {
        $log = new JobLog;
        $log->logtime = time();
        $log->item_id = $itemId;
        $log->id = $taskId;
        $log->message = $message;
        $log->save();
    }
}
