<?php
abstract class PepsiActiveRecord extends CActiveRecord {
 
    /**
     * Prepares created, create_user_id, updated and
     * update_user_ id attributes before performing validation.
     */
    protected function beforeValidate() {
 
        if ($this->isNewRecord) {
            // set the create date, last updated date
            // and the user doing the creating
            $this->created = $this->updated = time();
            
            //strtotime(new CDbExpression('NOW()'));
 
            //$this->create_user_id = $this->update_user_id = Yii::app()->user->id;
        } else {
            //not a new record, so just set the last updated time
            //and last updated user id
            $this->updated = time();
            //strtotime(new CDbExpression('NOW()'));
            //$this->update_user_id = Yii::app()->user->id;
 
        }
        $this->published=strtotime($this->published);
        return parent::beforeValidate();
	}
}