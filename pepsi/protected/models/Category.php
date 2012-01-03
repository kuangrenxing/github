<?php

class Category extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('cid', 'required'),
        array('cid, parent_cid, sort_order', 'length', 'max'=>10),
        array('user_id, nick, name, pic_url', 'length', 'max'=>128),
        array('type', 'length', 'max'=>64),
        array('created, modified', 'length', 'max'=>11),
        array('cid, parent_cid, user_id, nick, name, pic_url, sort_order, created, modified', 'safe', 'on'=>'search'),
        );
    }

    public function relations()
    {
        return array(
        );
    }

    public function attributeLabels()
    {
        return array(
			'cid' => 'Cid',
			'parent_cid' => 'Parent Cid',
			'user_id' => 'User',
			'nick' => 'Nick',
			'name' => 'Name',
			'pic_url' => 'Pic Url',
			'sort_order' => 'Sort Order',
			'created' => 'Created',
			'modified' => 'Modified',
        );
    }

    public function search()
    {
        $criteria=new CDbCriteria;
        $criteria->compare('cid',$this->cid,true);
        $criteria->compare('parent_cid',$this->parent_cid,true);
        $criteria->compare('user_id',$this->user_id,true);
        $criteria->compare('nick',$this->nick,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('pic_url',$this->pic_url,true);
        $criteria->compare('sort_order',$this->sort_order,true);
        $criteria->compare('created',$this->created,true);
        $criteria->compare('modified',$this->modified,true);

        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
        ));
    }

    protected function beforeSave()
    {
        if($this->isNewRecord)
        {
            $this->created = time();
        }
        $this->modified = time();
        return parent::beforeSave();
    }

    public static function sync($nick)
    {
        $top = Yii::app()->top;
        $req = new SellercatsListGetRequest;
        $req->setNick($nick);
        $req->setFields("cid,parent_cid,name,pic_url,sort_order,created,modified");
        $resp = $top->execute($req);
         
        if($resp&&isset($resp->seller_cats->seller_cat))
        {
            $categoryList = $resp->seller_cats->seller_cat;
            foreach($categoryList as $categoryInfo)
            {
                $category = self::model()->findByPk($categoryInfo->cid);
                $category = $category?$category:(new Category);
                $category->nick    = $nick;
                $category->user_id = User::getUserIdByNick($nick);
                $category->attributes = (Array) $categoryInfo;

                if(!$category->save())
                {
                    $message = array(
                        'nick'   => $nick,
                        'errors' => $category->errors,
                    );
                    XLogger::xlog($message,'warning','pepsi.model.category.sync.save');
                }
            }
        }
        else
        {
            $message = array(
                'nick'   => $nick,
                'errors' => 'sync error because of net or data else.',
            );
            XLogger::xlog($message,'warning','pepsi.model.category.sync');
        }
    }

    public static function getCategoryTree($userId)
    {
        $tree = array();
        $sql = "select * from `category` where `parent_cid` = 0 and `user_id` = :user_id ;";
        $parents = Yii::app()->db->createCommand($sql)->queryAll(true,array(':user_id'=>$userId));
        
        if($parents)
        {
            foreach($parents as $key => $category)
            {
                array_push($tree, array('title' => $category['name'], 'key' => $category['cid']));
                $parentCid = $category['cid'];
                
                $sql2 = "select * from `category` where `parent_cid` = :parent_cid and `user_id` = :user_id;";

                $childs = Yii::app()->db->createCommand($sql2)->queryAll(true,array(':parent_cid'=>$parentCid,':user_id'=>$userId));
                if($childs)
                {
                    $tree[$key] = array('title' => $category['name'], 'key' => $category['cid'], 'isFolder' => 'true', 'children' => array());
                    foreach($childs as $value)
                    {
                        array_push($tree[$key]['children'], array('title' => $value['name'], 'key' => $value['cid']));
                    }
                }
                else
                {
                    continue;
                }
            }
        }
        else
        {
            return false;
        }
       // hacking api. 
        $tree[]=array('key'=>-1,'title'=>'未分类宝贝');
        return $tree;
    }
    
    
    
    public static function getCategoryList($userId)
    {
        $list = array();
        $sql = 'select * from category where `parent_cid` = 0 and `user_id`=:user_id';
        $parents = Yii::app()->db->createCommand($sql)->queryAll(true,array(':user_id'=>$userId));
        foreach($parents as $p)
        {
            $list[$p['cid']]=$p['name'];
            $pid = $p['cid'];
            $sql = "select * from category where `parent_cid` = :parent_cid and `user_id`=:user_id";
            $children = Yii::app()->db->createCommand($sql)->queryAll(true,array(':parent_cid'=>$pid,':user_id'=>$userId));
            if($children){
                foreach($children as $child)
                {
                    $child['name'] = "&nbsp;&nbsp;".$child['name'];
                    $list[$child['cid']]=$child['name'];
                }
            }else{
                continue;
            }
        }
       // hacking api. 
        $list['-1']='未分类宝贝';
        return $list;
    }

    public static function getChildren($parentCid,$userId)
    {
        $children=array();
        $sql = 'select * from category where `parent_cid` = :parent_cid and `user_id`=:user_id';
        $results = Yii::app()->db->createCommand($sql)->queryAll(true,array(':parent_cid'=>$parentCid,':user_id'=>$userId));
        foreach($results as $child)
        {
            array_push($children,$child['cid']);
        } 
        return $children?$children:false;
    }
}
