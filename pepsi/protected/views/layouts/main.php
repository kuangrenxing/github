<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/base.css" />
<?php
$cs=Yii::app()->clientScript;
$cs->registerCSSFile(Yii::app()->request->baseUrl.'/css/style.css');
?>
<script type="text/javascript" src="/da/js/jquery-1.6.2.min.js" charset="utf-8"></script>
<!--[if IE 6]>
<script type="text/javascript" src="/da/css/iepngfix/iepngfix_tilebg.js" charset="utf-8"></script><![endif]--> 
<link rel="icon" href="/da/images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/da/images/favicon.ico" type="image/x-icon" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="<?php echo isset($this->width)?$this->width:'w950';?>">
  <div class="ph10">
    <div id="header">
      <div class="logo"><a href="/da" class="pngfix" ><img src="/da/images/logo.gif" width="179" height="84"></a></div>
      <div class="headright1"><a href="http://weibo.com/dadachushou"><img src="/da/images/icon04.gif"></a>•<a href="http://bangpai.taobao.com/group/14435987.htm">官方帮派</a>•<a href="javascript:addToFav()">加入收藏</a>•<a href="http://bangpai.taobao.com/group/thread/14435987-261667406.htm">帮助教程</a></div>
     <div class="headright">
     <img src="/da/images/photo10.gif"><span><?php echo Yii::app()->user->getName();?></span><a href="/da/price" target="_blank"><img src="/da/v2/images/user_grade_<?php echo Yii::app()->user->getState('grade');?>.gif" /></a><?php if(Yii::app()->user->getState('grade')<1){ ?><a href="/da/price" target="_blank" title="升级"><img src="/da/v2/images/ico_up.gif" /></a><?php } ?><span><a href="/da/logout">退出</a></span></div>
    </div>
   <?php echo $content; ?>
   <div id="footer" class="bottom">
     <p>上海仕宇网络科技有限公司 版权所有</p>
      <p>Copyright © 2010-2011 沪ICP备10213948号-1</p>
    </div>

  </div>
</div>

<a class="web-guide" href="/da/contact">建议反馈</a>

<script>!window.jQuery && document.write('<script src="http://code.jquery.com/jquery-1.4.2.min.js"><\/script>');</script>
<script>!window.jQuery && document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"><\/script>');</script>
<?php $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/comm.min.js',CClientScript::POS_END); ?>

<script type="text/javascript">
jQuery(document).ready(function(){
  //setTimeout("getLoad(100000)",30000);  
});
<?php if(!YII_DEBUG): ?>
var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20462101-3']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
<?php endif; ?>
</script>
</body>
</html>
