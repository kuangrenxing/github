<?php
return array(
    'http://app.xindianbao.(dev|com|test)/da'=>'default/',
    '<action:\w+>'=>'default/<action>',
    '<controller:\w+>/<id:\d+>'=>'<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
	//'/da/admin'=>'/da/admin/default/login',
	
);
?>
