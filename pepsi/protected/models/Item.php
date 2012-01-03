<?php

class Item extends CActiveRecord
{
   public function getOne($condition=array())
   {
       $top = Yii::app()->top;
       $req = new ItemGetRequest;
       $req->setFields('title,desc');
       foreach($condition as $key=>$value)
       {
           $req->$key($value);
       }
       return $top->execute($req);     
   }

   public static function updateOne($condition=array(),$sessionId)
   {
       $top = Yii::app()->top;
       $req = new ItemUpdateRequest;
       foreach($condition as $key=>$value)
       {
           $req->$key($value);
       }
       return $top->execute($req,$sessionId);    
       
   }

   //$condiction is like array('setQ'=>'test');
   public static function getOwnItems($condition=array())
   {
       if(!isset($condition['approve_status']))
       {
           $condition['approve_status']='onsale';
       }
       switch($condition['approve_status'])
       {
       case 'instock':
           return self::_getInstockItemsFromTop($condition);
       case 'onsale':
           return self::_getOnsaleItemsFromTop($condition);
       } 
   }

   public static function getOwnRawItems($condition=array())
   {
	   $top = Yii::app()->top;
       $req = new ItemsGetRequest;
       
       foreach($condition as $key=>$value)
       {
           $req->$key($value);
       }

       return $top->execute($req);  
   }

   public function getItems($condition=array())
   {
        
       $top = Yii::app()->top;
       $req = new ItemsListGetRequest;
       $req->setFields("approve_status,num_iid,title,nick,type,cid,pic_url,num,props,valid_thru,list_time,price,has_discount,has_invoice,has_warranty,has_showcase,modified,delist_time,postage_id,seller_cids,outer_id");
       foreach($condition as $key=>$value)
       {
           $req->$key($value);
       }

       return $top->execute($req);     
   }


   private static function _getOnsaleItemsFromTop($condition=array())
   {
       unset($condition['approve_status']);
       $top = Yii::app()->top;
       $req = new ItemsOnsaleGetRequest;
       $req->setFields("approve_status,num_iid,title,nick,type,cid,pic_url,num,props,valid_thru,list_time,price,has_discount,has_invoice,has_warranty,has_showcase,modified,delist_time,postage_id,seller_cids,outer_id");

       foreach($condition as $key=>$value)
       {
           $req->$key($value);
       }

       $resp = $top->execute($req,Yii::app()->user->id);  
       return $resp;
   }

   private static function _getInstockItemsFromTop($condition=array())
   {
       $top = Yii::app()->top;
       $req = new ItemsInventoryGetRequest;
       $req->setFields("approve_status,num_iid,title,nick,type,cid,pic_url,num,props,valid_thru,list_time,price,has_discount,has_invoice,has_warranty,has_showcase,modified,delist_time,postage_id,seller_cids,outer_id");

       foreach($condition as $key=>$value)
       {
           $req->$key($value);
       }

       $resp = $top->execute($req,Yii::app()->user->id);  
       return $resp; 
   }
}
