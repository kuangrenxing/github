<?php

class QueueController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions'=>array('sync'),
                //'ips'=>array('127.0.0.1','114.80.68.211','60.29.233.211','192\.168\.1[0-5]\.[0-9]{3}'),
            ),
            //array(
                //'deny',
                //'users'=>array('*'),
            //),
        );
    } 

    public function actionSync()
    {   
        //get wait task in queue;
        $beginTime = time(); 
        $queue = Queue::getOneByAppId(Yii::app()->top->appkey,Queue::STATUS_WAIT);
        if($queue)
        {
            $queue->setProcessingStatus();
            $queue->save();
            try{
                $task         = Task::model()->findByAttributes(array('id' => $queue->task_id));
                $taskItemList = TaskItem::getList($queue->task_id);
                $hashTag      = md5('xdb_'.$queue->task_id);

                $rollback = ($task->type==='rollback')?true:false;

                $session = SessionKey::model()->findByAttributes(array('user_id'=>$task->user_id));
                $sessionKey   = $session->top_session_key; 

                foreach($taskItemList as $taskItem)
                {
                    $wrapTagBegin = '<div title="xdb-'.$taskItem->position.'-'.$hashTag.'">';
                    $wrapTagEnd   = '</div>'; 
                    $item = Item::getOne(array(
                        'setFields' => 'title,desc',
                        'setNumIid' => $taskItem->item_id,
                    ));

                    if (!$item || isset($item->code))
                    {
                        $taskItem->status = Task::STATUS_FAILED;
                        $this->_logger($task->id,$taskItem->item_id,'调用失败'.(isset($item->msg)?$item->msg:''));
                        $taskItem->save();   
                        continue;
                    }
                    $desc    =  preg_replace("/\\\/",'', $item->item->desc);
                    $title   = $item->item->title;

                    $htmlClip = $wrapTagBegin.CHtml::decode($task->html).$wrapTagEnd;

                    if(strpos($desc,$hashTag))
                    {
                        $doc = new simple_html_dom();
                        $doc->load($desc);
                        $doc->find('div[title=xdb-'.$taskItem->position.'-'.$hashTag.']',0)->outertext = ($rollback)?'':$htmlClip ; 
                        $desc = (string) $doc;
                    }
                    else
                    {
                        if(!$rollback) 
                        {
                            $desc = ($taskItem->position!=0)?$desc.$htmlClip:$htmlClip.$desc;
                        }
                        else
                        {
                            continue;
                        }  
                    }

                    $result = Item::updateOne(array(
                        'setNumIid'=>$taskItem->item_id,
                        'setDesc'=>$desc,
                    ),$sessionKey); 
                    if (!$result || isset($result->code))
                    {
                        $taskItem->status = Task::STATUS_FAILED;
                        $this->_logger($task->id,$taskItem->item_id,'调用失败'.(isset($result->sub_msg)?$result->sub_msg:''));
                            var_dump($result);
                    }
                    if (isset($result->item))
                            $taskItem->status = Task::STATUS_FINISHED;
                    $taskItem->save();  


                }
                $task->setFinishedStatus();
                $task->save();
                $queue->setFinishedStatus();
                $queue->save();
            }
            catch( CException $e)
            {
                $message = array(
                'message'=>'未知错误',
                'CException'=>(array) $e,
                );
                XLogger::xlog($message,'warning','pepsi.controller.queue.sync'); 
            }
        }
        else
        {

        }
	echo time()-$beginTime;
    }


    private function _logger($taskId,$itemId,$message)
    {
        $log = new Log;
        $log->logtime = time();
        $log->item_id = $itemId;
        $log->task_id = $taskId;
        $log->message = $message;
        $log->save();
    }
}
