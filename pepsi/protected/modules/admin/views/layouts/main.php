<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/base.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
<link rel="icon" href="/da/images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/da/images/favicon.ico" type="image/x-icon" />
<title><?php echo CHtml::encode($this->pageTitle).'Admin Panel'; ?></title>
<?php echo Yii::app()->bootstrap->registerBootstrap(); ?>
</head>

<body>
<div style="z-index: 5;" class="topbar-wrapper">
    <div data-dropdown="dropdown" class="topbar">
      <div class="topbar-inner">
        <div class="container-fluid">
          <h3><a href="/da/">大搭出手</a></h3>
          <ul class="nav">
          <?php 
         $cururl=Yii::app()->request->url;
          if(Yii::app()->admin->name=='Guest'):?>       
          <?php 
         
          if($cururl=='/da/admin' || $cururl=='/da/admin/default' || $cururl=='/da/admin/default/login'):?>
            <li class="active"><a href="/da/admin/default">登录</a></li>
          <?php else :?>
          	<li ><a href="/da/admin/default">登录</a></li>
          <?php endif;?>       
         <?php endif;?>
            <?php if(Yii::app()->admin->name!=='Guest'):?>
            
          	 <li ><a href="/da/admin/default/logout">退出</a></li>  
            
           
           <?php endif;?>
          </ul>
           <p class="pull-right">Logged in as <a href="#"><?php echo Yii::app()->admin->name?></a></p>         
        </div>
      </div><!-- /topbar-inner -->
    </div><!-- /topbar -->
  </div>
  
 
<div  style="margin-top:50px;" class="<?php //echo isset($this->width)?$this->width:'w950';?>">

<?php echo $content; ?>
   <div id="footer" class="bottom">
     <p>上海仕宇网络科技有限公司.版权所有</p>
      <p>Copyright © 2010-2011 沪ICP备10213948号-1</p>
    </div>

</div>


</body>
</html>
