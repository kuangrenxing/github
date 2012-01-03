<?php

class TaskController extends Controller
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
				'actions'=>array('create','update','index','view','itemInfo','rollback'),
				'users'=>array('@'),
                'expression'=>"Yii::app()->user->getState('grade')>0",
        ),
        array('deny',  // deny all users
				'users'=>array('*'),
        ),
        );
    }

    public function actionView($id,$status)
    {    
       $taskItemDataProvider=new CActiveDataProvider('TaskItem', array(
           'criteria'=>array(
               'condition'=>'task_id = :task_id and status = :status',
               'order'=>'item_id DESC',
               'params'=>array(':task_id'=>$id,':status'=>$status),
           ),
           'pagination'=>array(
               'pageSize'=>YII_DEBUG?3:20,
           ),
       ));     

       $task = $this->loadModel($id);
       
       $this->render('view',array(
            'task'     => $task,
            'pages'     => $taskItemDataProvider->pagination,
            'itemList'  => $taskItemDataProvider->getData(),
       ));  
    }

    public function actionCreate()
    {
        $fetchPerPage = 200;
        $result = false;
        $errors = array();

        if(isset($_POST['data']))
        {
            $data = CJSON::decode($_POST['data']);
            $task = new Task;
            $task->name = $this->_getMealName((int) $data['mealId']);
            $task->html = Meal::getHtml((int) $data['mealId'],(int) $data['templateId']);
            $task->user_id = Yii::app()->user->getState('user_id');
            $task->type = Task::TYPE_UPDATE;

            $result = $task->save();

            if($result)
            {
                if(!isset($data['itemCart']))
                {
                    $itemList= Item::getList(array(
                        'setFields' => 'num_iid,title',
                        'setSellerCids' => implode(',',$data['categoryCart']),
                        'setPageSize' => $fetchPerPage,
                    ));
                    
                    $data['itemCart']=$itemList->items->item;

                    if($itemList->total_results>$fetchPerPage)
                    {
                        for($i=2;($i-1)*$fetchPerPage<$itemList->total_results;$i++)
                        {
                            $itemListTemp = 
                                Item::getList(array(
                                    'setFields'     => 'num_iid,title',
                                    'setSellerCids' => implode(',',$data['categoryCart']),
                                    'setPageSize'   => $fetchPerPage,
                                    'setPageNo'   => $i,
                                ));
                            if(isset($itemListTemp->items->item))
                            {
                                $data['itemCart']=array_merge($data['itemCart'],$itemListTemp->items->item);
                            }
                        }
                    }                    
                }

                $itemCart = $data['itemCart'];

                foreach ($itemCart as $item) 
                {
                    $taskItem = new TaskItem;
                    $taskItem->task_id = $task->id;
                    $taskItem->item_id = isset($item->num_iid)?$item->num_iid:$item['id'];
                    $taskItem->item_name = isset($item->title)?$item->title:$item['title'];
                    $taskItem->position = isset($data['position'])?$data['position']:$item['position'];
                    $taskItem->save();
                    array_push($errors,$taskItem->errors);
                    unset($taskItem);
                }

                $queue = new Queue;
                $queue->task_id = $task->id;
                $queue->app_id  = Yii::app()->top->appkey;
                $queue->save();
                array_push($errors,$queue->errors);
            }
            array_push($errors,$task->errors);
        }

        echo CJSON::encode(array(
            'success'=>$result,
            'errors'=>array_filter($errors),
        ));
        Yii::app()->end();
    }

    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        if(isset($_POST['Task']))
        {
            $model->attributes=$_POST['Task'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }


    public function loadModel($id)
    {
        $model=Task::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }


    public function actionIndex()
    {    
       $taskDataProvider=new CActiveDataProvider('Task', array(
           'criteria'=>array(
               'condition'=>'user_id = :user_id',
               'order'=>'created DESC',
               'params'=>array(':user_id'=>Yii::app()->user->getState('user_id')),
           ),
           'pagination'=>array(
               'pageSize'=>YII_DEBUG?3:20,
           ),
       ));  

       if(isset($_GET['ajax']))
       {
           //to prevent the page_url append ajax again.
           unset($_GET['ajax']);
           $this->renderPartial('index',array(
               'pages'     => $taskDataProvider->pagination,
               'taskList'  => $taskDataProvider->getData(),
           ));  
       }
       else
       {    
           $this->render('index',array(
               'pages'     => $taskDataProvider->pagination,
               'taskList'  => $taskDataProvider->getData(),
           ));   
       }
    }

    public function actionRollback($id)
    {
        $errors=array();

        $task = $this->loadModel((int) $id);
        $task->type = Task::TYPE_ROLLBACK;
        $task->status = Task::STATUS_WAIT;
        $task->save();
        $task->clearItemStatus();
        array_push($errors,$task->errors);

        $queue = new Queue;
        $queue->task_id = $task->id;
        $queue->app_id  = Yii::app()->top->appkey;
        $queue->save();
        array_push($errors,$queue->errors);

        echo CJSON::encode($errors);
        Yii::app()->end();
    }

    //@todo merge this method to the Base Controller Class or Base Meal model.
    private function _getMealName($mealId)
    {
        $cacheHash = md5(Yii::app()->user->getState('user_id'));
        $cache = Yii::app()->cache->get($cacheHash);
        $mealList=isset($cache['mealList'])?$cache['mealList']:array();
        foreach($mealList as $meal)
        {
            if($meal->meal_id==$mealId)
            {
                return $meal->meal_name;
            }
        }
        return false;
    }
}
