<?php

class ItemController extends Controller
{

    public function actionIndex()
    {
        // ini_set('xdebug.var_display_max_depth', 5 );
        
        $queryCondiction=$this->_getQueryCondition();
        $itemList = Item::getOwnItems($queryCondiction);
        
        if($itemList->total_results<1)
        {
            echo '没有宝贝符合条件.请跟换搜索条件再试试!';
            Yii::app()->end();
        }
        
        $pages = new CPagination($itemList->total_results);
        $pages->pageSize = YII_DEBUG?3:20;
        $pageIndex = isset($_POST['page_no'])?(int) $_POST['page_no']-1:'0';
        
        
        $this->renderPartial('index',array(
            'itemList'=>$itemList,
            'pages'=>$pages,
            'pageIndex'=>$pageIndex
        ));
    }

    public function actionSyncCategory()
    {
        Category::sync(Yii::app()->user->name);
    }


	public function actionGetAllItems($post_free = false)
	{
		$fetchPerPage = 200;
		
		$itemList= Item::getOwnRawItems(array(
			'setFields' => "num_iid,title",
			'setNicks' => Yii::app()->user->getName(),
			'setPostFree' => $post_free == true ? "true" : "false",
			'setPageSize' => $fetchPerPage,
		));	
		
		$data['itemCart'] = array();
		if (isset($itemList->items->item))
		 	$data['itemCart']=$itemList->items->item;
		
		if(isset($itemList->total_results) && $itemList->total_results>$fetchPerPage)
	    {
	        for($i=2;($i-1)*$fetchPerPage<$itemList->total_results;$i++)
	        {
				$itemListTemp= Item::getOwnRawItems(array(
					'setFields' => "num_iid,title",
					'setNicks' => Yii::app()->user->getName(),
					'setPostFree' => $post_free == true ? "true" : "false",
					'setPageSize' => $fetchPerPage,
					'setPageNo'   => $i,
				));
				if(isset($itemListTemp->items->item))
                {
                    $data['itemCart']=array_merge($data['itemCart'],$itemListTemp->items->item);
                }
			}
		}
			
	 	if(isset($itemList->total_results))
        {
           echo CJSON::encode(array('success'=>true,'count'=>$itemList->total_results,'itemCart' => $data['itemCart']));
        }
        else
        {
           echo CJSON::encode(array('success'=>false));
        }
	
		Yii::app()->end();
	}

    public function actionGetItemsByCategory()
    {
		$fetchPerPage = 200;
        if(isset($_POST['data']))
        {
            $data = CJSON::decode($_POST['data']);
            if(count($data['categoryCart'])==0)
            {
                echo CJSON::encode(array('success'=>true,'count'=>0));
                Yii::app()->end();
            }
			if(count($data['categoryCart'])>32)
			{
				 echo CJSON::encode(array('success'=>true,'cate_count'=>count($data['categoryCart'])));
	             Yii::app()->end();
			}
            $itemList= Item::getOwnItems(array(
                'setFields' => 'num_iid,title',
                'setSellerCids' => implode(',',$data['categoryCart']),
                'setPageSize' => $fetchPerPage,
            ));
			
			$data['itemCart'] = array();
			if (isset($itemList->items->item))
			 	$data['itemCart']=$itemList->items->item;

            if(isset($itemList->total_results) && $itemList->total_results>$fetchPerPage)
            {
                for($i=2;($i-1)*$fetchPerPage<$itemList->total_results;$i++)
                {
                    $itemListTemp = 
                        Item::getOwnItems(array(
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

            if(isset($itemList->total_results))
            {
              echo CJSON::encode(array('success'=>true,'count'=>$itemList->total_results,'itemCart' => $data['itemCart']));
            }
            else
            {
              echo CJSON::encode(array('success'=>false));
            }
        }
        Yii::app()->end();
    }

    private function _getQueryCondition()
    {
        $condition=array();
        forEach($_POST as $key=>$value)
        {
            if(($key!=='approve_status')&&(strlen($value)>0))
            {   
                $newKey   = 'set';
                $keyArray = explode("_",$key);
                foreach($keyArray as $k)
                {
                    $newKey .= ucfirst($k);
                }
                $condition[$newKey]=$value;
            }
        }
        //$condition['setPageSize']=YII_DEBUG?3:20;
        //search children cids
        if(isset($condition['setSellerCids']))
        {
            $childrenCids=Category::getChildren($condition['setSellerCids'],Yii::app()->user->getState('user_id'));
            if($childrenCids)
            {
                $condition['setSellerCids'] = implode(',',$childrenCids);
            }
        }
        return $condition;
    }

    public function actionFetch()
    {
        $queryCondiction=$this->_getQueryCondition();
        $itemList = Item::getList($queryCondiction);
        
        if(count($itemList)<1)
        {
            echo 'false';
            Yii::app()->end();
        }
        echo CJSON::encode($itemList);
           
    }

}
