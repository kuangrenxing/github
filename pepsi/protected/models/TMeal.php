<?php

class TMeal extends CActiveRecord
{
   public function getOne($condition=array(),$sessionId)
   {
       $top = Yii::app()->top;
       $req = new PromotionMealGetRequest;
       $req->setStatus("VALID");
       foreach($condition as $key=>$value)
       {
           $req->$key($value);
       }  
       $resp = $top->execute($req,$sessionId);
       return $resp; 
   }

   //$condiction is like array('setQ'=>'test');
   public static function getList($condition=array(),$sessionId)
   {
       $top = Yii::app()->top;
       $req = new PromotionMealGetRequest;
       $req->setStatus("VALID");
       foreach($condition as $key=>$value)
       {
           $req->$key($value);
       }  
       $resp = $top->execute($req,$sessionId);
       return $resp;
   }


   
   public static function getMealList($sessionId)
   {
       $mealList = self::getList(array(),$sessionId);

       if(!isset($mealList->meal_list->meal))
       {
           return false;
       }

       $numIids = array();

        foreach($mealList->meal_list->meal as $meal)
        {
            $itemList= CJSON::decode(str_replace("'",'"',$meal->item_list));
            foreach( $itemList['item_list'] as $item)
            {
                array_push($numIids,$item['item_id']);
            }
        }

        //Taobao API limited to 20, bad news ;(
        $numIids = array_chunk($numIids,20);
        $itemList = array();
        
        foreach ($numIids as $ids) 
        {
            $items=Item::getItems(array('setNumIids'=>implode(",",$ids)));
            
            if(!isset($items->items->item))
            {
                return false;
            }
            
            $itemList=array_merge($items->items->item,$itemList);
        }

        $itemList = self::_sortItems($itemList);
        
        foreach ($mealList->meal_list->meal as $index => $meal) 
        {
            $list= CJSON::decode(str_replace("'",'"',$meal->item_list));
            
            $itemCart = array();
            
            foreach( $list['item_list'] as $item)
            {
                if(isset($itemList[$item['item_id']]))
                {
                    array_push($itemCart,$itemList[$item['item_id']]);  
                }
            }

            $mealList->meal_list->meal[$index]->itemCart=$itemCart;
        }

        return $mealList;
   }
   
   private function _sortItems($items)
   {
       $result=array();

       foreach($items as $item)
       {
           $result[$item->num_iid]=$item;
       }

       return $result;
   }

}
