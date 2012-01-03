<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/setting.php'),
    array(
        'basePath'=>dirname(__FILE__) .DIRECTORY_SEPARATOR . '..',
        'name'=>'Yii console',
        'import'=>array(
            'application.components.*',
            'application.models.*',
            'application.helpers.*',
            'application.vendors.*',
            'application.vendors.top.request.*',
        ),
        'params'=>array(
            'salt'=>'pepsi',
        ),
    )
);
