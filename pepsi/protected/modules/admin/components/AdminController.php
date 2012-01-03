<?php

class AdminController extends CController
{
	public $breadcrumbs=array();
	public $menu=array();
	//public $layout='//layouts/admin';
	
	public function filterAccessControl($filterChain)
	{
		
		$filter = new CAdminAccessControlFilter();
	
		$filter->setRules($this->accessRules());
	
		$filter->filter($filterChain);
	
	}
}


?>