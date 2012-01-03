<?php

class ContactForm extends CFormModel
{
	public $name;
	public $email;
	public $subject;
	public $body;

	public function rules()
	{
		return array(
			array('subject, body', 'required'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'subject'=>'主题',
			'body'=>'内容',
		);
	}
}
