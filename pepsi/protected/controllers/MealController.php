<?php
class MealController extends Controller
{
   public $mealList=null;
   public $items=null;
   public $width=null;

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
               'actions'=>array('index','create','update','view','delete','ajaxMeal','preview','load','list'),
               'users'=>array('@'),
           ),
           array(
               'deny',
               'users'=>array('*'),
               ),
           );
   }

   public function beforeAction($action)
   {
       if($this->action->id!=='delete')
       {
           $this->_checkCache(); 
       }

       return parent::beforeAction($action);
   }

   public function actionIndex()
   {
	   $this->actionList();
	   return;
       if(Yii::app()->user->getState('betaUser'))
       {
           $this->actionList();
           return;
       }

       $meals=Meal::model()->with('template')->findAllByAttributes(array(
               'user_id'=>Yii::app()->user->getState('user_id')
           ));
       $shopMeals=$this->_getMeal();
       $mealList=array();
       $mealIDS=array();
       
       foreach($shopMeals['mealList'] as $k=>$item)
       {
           $mealList[$item->meal_id]['meal']=$item;
           $mealList[$item->meal_id]['items']=$shopMeals['items'][$k];
           $mealIDS[]=$item->meal_id;
       }

       foreach($meals as $k=>$model)
       {
           if(!in_array($model->meal_id,$mealIDS))
           {
               unset($meals[$k]);
           }
       }

       $cs=Yii::app()->getClientScript();
       $cs->registerCoreScript('jquery');
       //$cs->registerCssFile('/da/css/list.css','all');
       $this->render('index',array('meals'=>$meals,'shopMeals'=>$mealList));
   }

   public function actionCreate()
   {
       $meal=new Meal;
       if(!empty($_POST['meal']))
       {
           if(!$meal=Meal::model()->findByAttributes(array(
               'meal_id'=>$_POST['meal']['meal_id'],
               'template_id'=>$_POST['meal']['template_id'],
               'user_id'=>Yii::app()->user->getState('user_id'),
           )))
           {
               $meal=new Meal;
           }

           $meal->attributes=$_POST['meal'];
           $meal->user_id=Yii::app()->user->getState('user_id');

           $mealList= $this->_getMeal($meal->meal_id);
           $viewName=Template::getViewName($meal->template_id);
           $viewWidth=substr($viewName,strPos($viewName,'_')-3,3);
           $meal->html=$this->renderPartial(
               $viewName
               ,array(
                   'mealList'=>$mealList['mealList']
                   ,'items'=>$mealList['items']
                   ,'viewWidth'=>$viewWidth
               )
               ,true
           );
           if($meal->save())
           {
               $this->redirect(array('view','meal'=>$meal->meal_id,'template'=>$meal->template_id));
           }
       }

       $this->render('create',array(
           'colorbox'=>$this->_loadColorbox()
           ,'templates'=>$this->_getTemplateList()
           ,'meals'=>$this->_getMeal()
       ));
   }

   public function actionDelete()
   {
       if(isset($_GET['template'])&&isset($_GET['meal']))
       {
           $meal = Meal::getMeal((int)$_GET['meal'],(int)$_GET['template']);
           if($meal && $meal->delete())
           {
               echo CJSON::encode(array('success'=>true));
               Yii::app()->end();
           }
       }
       echo CJSON::encode(array('success'=>false));
   }

   public function actionUpdate()
   {
       if(isset($_GET['template'])&&isset($_GET['meal']))
       {
           $meal = Meal::getMeal((int)$_GET['meal'],(int)$_GET['template']);
           if($meal)
           {
               $mealList=$this->_getMeal((int) $_GET['meal']);

               $this->render('create',array(
                   'colorbox'=>$this->_loadColorbox()
                   ,'templates'=>$this->_getTemplateList()
                   ,'meals'=>$this->_getMeal()
                   ,'meal'=>$meal
                   ,'meal_item_count'=>count($mealList['items'])
               ));
           }
       }
   }

   public function actionView()
   {
       $this->layout='//layouts/column1';
       $this->width ='w990';
       $cs=Yii::app()->getClientScript();
       $cs->registerCoreScript('jquery');

       if(isset($_GET['template'])&&isset($_GET['meal']))
       {
           $meal= $this->_getMeal((int)$_GET['meal']);
           $viewName=Template::getViewName((int)$_GET['template']);
           $viewWidth=substr($viewName,strPos($viewName,'_')-3,3);
           $this->render(
               'view',
               array(
                   'mealList'=>$meal['mealList']
                   ,'items'=>$meal['items']
                   ,'viewWidth'=>$viewWidth
                   ,'viewName'=>$viewName
                   ,'mealId'=>(int) $_GET['meal']
                   ,'templateId'=>(int) $_GET['template']
               )
           );
           
           //save after view;
           $mealModel = Meal::model()->findByAttributes(array('meal_id'=>(int)$_GET['meal'],'template_id'=>(int)$_GET['template']));
           $mealModel->html=$this->renderPartial(
               $viewName
               ,array(
                   'mealList'=>$meal['mealList']
                   ,'items'=>$meal['items']
                   ,'viewWidth'=>$viewWidth
               )
               ,true
           );  
           $mealModel->save();
       }  
   }

   public function actionAjaxMeal()
   {
       $data=$this->_getMeal();
       $out=array();
       foreach($data['mealList'] as $k=>$row)
       {
           $out[$k]=array(
               'label'=>$row->meal_name
               ,'value'=>$row->meal_id
               ,'price'=>$row->meal_price
               ,'items'=>$data['items'][$k]
           );
       }

       echo CJSON::encode($out);
   }

   public function actionPreview()
   {
       if(isset($_GET['template'])&&isset($_GET['meal']))
       {
           $this->layout='//layouts/raw';
           $meal= $this->_getMeal((int)$_GET['meal']);
           $templateItemCount = Template::getItemCount((int)$_GET['template']);

           if(count($meal['items']) > $templateItemCount)
           {
               return ;
           }

           if(!Template::getPermission((int) $_GET['template']))
           { 
               return ;
           }

           $viewName=Template::getViewName((int)$_GET['template']);
           $viewWidth=substr($viewName,strPos($viewName,'_')-3,3);
           Yii::app()->getClientScript()->registerCoreScript('jquery');
           $this->render(
               $viewName
               ,array(
                   'mealList'=>$meal['mealList']
                   ,'items'=>$meal['items']
                   ,'viewWidth'=>$viewWidth
               )
           );
       }
   }

   public function actionLoad()
   {
       echo CJSON::encode($this->_checkCache(true));  
   }

   public function actionList()
   {
       $mealDataProvider=new CActiveDataProvider('Meal', array(
           'criteria'=>array(
               'condition'=>'user_id = :user_id',
               'with'=>array('template'),
               //@important! take care of this,t is a magic number :( due to yii's bug ;
               'order'=>'t.created ASC',
               'params'=>array(':user_id'=>Yii::app()->user->getState('user_id')),
           ),
           'pagination'=>array(
               'pageSize'=>YII_DEBUG?3:20,
           ),
       ));
       $meals     = $mealDataProvider->getData();
       $shopMeals = $this->_getMeal();
       $mealList  = array();
       $mealIDS   = array();

       
       foreach($shopMeals['mealList'] as $k=>$item)
       {
           $mealList[$item->meal_id]['meal']  = $item;
           $mealList[$item->meal_id]['items'] = isset($shopMeals['items'][$k])?$shopMeals['items'][$k]:null;
           $mealIDS[]=$item->meal_id;
       }
       //I don't know what's going on here.
       foreach($meals as $k=>$model)
       {
           if(!in_array($model->meal_id,$mealIDS))
           {
               //unset($meals[$k]);
               $mealList[$model->meal_id]['meal'] = (object) array(
			       'meal_name'=>'该套餐已经在淘宝失效了,建议删除',
			       'meal_price'=>0,
			       'origi_price'=>0,
			       'invalid'=>true,
			       );
           }
       }
           
       $pages->pageSize = YII_DEBUG?3:20; 
       
       $this->render('list',array(
           'meals'=>$meals,
           'shopMeals'=>$mealList,
           'pages'=>$mealDataProvider->pagination,
       ));
   }            

   private function _getTemplateList()
   {
       return Template::getList();
   }

   private function _getMeal($id=0)
   {
       $mealList=$this->mealList;
       $items=$this->items;
       if($id>0)
       {
           foreach($mealList as $k=>$row)
           {
               if($row->meal_id==$id)
               {
                   $mealList=$mealList[$k];
                   $items=$items[$k];
               }
           }
       }
       else if(!empty($_POST['term']))
       {
           foreach($mealList as $k=>$row)
           {
               if(mb_strpos($row->meal_name,$_POST['term'])===false)
               {
                   unset($mealList[$k]);
                   unset($items[$k]);
               }
           }
       }

       return array('mealList'=>$mealList,'items'=>$items);
   }

   private function _loadColorbox()
   {
       $cs=Yii::app()->getClientScript();
       $cs->registerCoreScript('jquery');
       $cs->registerScriptFile('/da/js/colorbox/jquery.colorbox-min.js',CClientScript::POS_END);
       $cs->registerScriptFile('/da/js/autoCombobox.js',CClientScript::POS_END);
       $cs->registerCssFile('/da/js/colorbox/colorbox.css','all');

       return $this->renderPartial('_colorbox',array(),true);
   }

   private function _checkCache($update=false)
   {
       $cacheHash = md5(Yii::app()->user->getState('user_id'));
       $cache = Yii::app()->cache->get($cacheHash);

       $this->mealList = isset($cache['mealList'])?$cache['mealList']:array();
       $this->items = isset($cache['items'])?$cache['items']:array();

       if(empty($this->mealList) || empty($this->items))
       {
           $cache = $this->_getTopData();
           $this->mealList= $cache['mealList'];
           $this->items=$cache['items']; 
           Yii::app()->cache->set($cacheHash, $cache, 0);
       }
       elseif($update)
       {            
           $remote = $this->_getTopData();
           if($cache!=$remote)
           {
               Yii::app()->cache->set($cacheHash, $remote, 0);
           }
       }
       
       Yii::app()->user->setState('cacheLastUpdated',time());
       return true;

   }

   private function _getTopData()
   {
       $top=Yii::app()->top;
       $req=new PromotionMealGetRequest;
       $req->setStatus("VALID");
       $resp=$top->execute($req,Yii::app()->user->getId());
       if (!$resp || isset($resp->code))
       {
           $msg='错误';
           $code=500;
           if($resp===false)
           {
               $msg='淘宝接口错误';
           }
           else if($resp==='')
           {
               $msg="没有搭配套餐,至少在店铺中<a href='http://mai.taobao.com/seller_admin-610-2.htm'
                   target='_blank'>建立一个搭配套餐</a>";
           }
           else
           {
               if(isset($resp->msg))
               {
                   $msg=$resp->msg;
               }
               if(isset($resp->sub_msg))
               {
                   $msg=$resp->sub_msg;
               }
               if(isset($resp->code))
               {
                   $code=$resp->code;
               }
               if(isset($resp->sub_code))
               {
                   $code=$resp->sub_code;
               }
               if($resp->code==15)
               {
                   $code=15;
                   $msg="我们检测到您的店铺还没有开通淘宝官方的搭配套餐功能， 大搭出手必须在开通该功能的基础上使用， 点击<a href='http://seller.taobao.com/fuwu/service.htm?service_id=6829'>这里</a>前往淘宝搭配套餐服务";
               }
           }
           Yii::app()->user->setFlash('ErrorMsg', array('code'=>$code,'message'=>$msg));
           $this->redirect(array('default/error'));
       }

       if(!isset($resp->meal_list->meal)){
           $code=500;
           $msg="没有搭配套餐,至少在店铺中<a href='http://seller.taobao.com/fuwu/service.htm?service_id=6829'
               target='_blank'>建立一个搭配套餐</a>";
           Yii::app()->user->setFlash('ErrorMsg', array('code'=>$code,'message'=>$msg));
           $this->redirect(array('default/error'));
       }
       

       $mealList=$resp->meal_list->meal;
       
       //sort the meal by meal_id;
       usort($mealList, function($a, $b){
           return $a->meal_id < $b->meal_id;
       });

       $items=array();
       foreach($mealList as $k=>$row)
       {
           $mealList[$k]->meal_price = number_format(round($row->meal_price/100,2), 2,'.','');
           $itemList=CJSON::decode(str_replace("'",'"',$row->item_list));
           if($itemList)
           {
               $origiTotal=0;
               $itemCount = 0;
               foreach($itemList['item_list'] as $item)
               {
                   $req=new ItemGetRequest;
                   $req->setFields("title,pic_url,price,detail_url");
                   $req->setNumIid($item['item_id']);
                   $res=$top->execute($req);
                   if(isset($res->item))
                   {
                       $origiTotal+=$res->item->price;
                       $data=$res->item;
                       $data->detail_url  = preg_replace("/\\\/",'',$data->detail_url); 
                       $data->pic_url  = preg_replace("/\\\/",'',$data->pic_url); 
                       $data->title  = preg_replace("/\\\/",'',$data->title); 
                       $data->orig_img = $data->pic_url;
                       $data->large_url=$data->pic_url .'_160x160.jpg';
                       $data->middle_url=$data->pic_url .'_120x120.jpg';
                       $data->small_url=$data->pic_url .'_100x100.jpg';
                       $data->pic_url.='_80x80.jpg';
                       if(isset($item['item_show_name'])&&(trim($item['item_show_name'])!==''))
                       {
                         $data->title=$item['item_show_name'];
                       }
                       $items[$k][]=$data;

                       $itemCount += 1;
                   }
                   else if(!$res)
                   {
                       throw new CHttpException(500,"抱歉，淘宝调用失败! 请刷新后重试.");
                   }
               }
               $mealList[$k]->origi_price=number_format($origiTotal, 2,'.',''); 
               $mealList[$k]->itemCount=$itemCount;
               $mealList[$k]->detail_url='http://item.taobao.com/mealDetail.htm?meal_id='.$row->meal_id;
           }
       }
       

       return array('mealList'=>$mealList,'items'=>$items);

   }

}
?>
