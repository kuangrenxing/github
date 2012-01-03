<?php
$cs=Yii::app()->clientScript;
$cs->registerCSSFile(Yii::app()->request->baseUrl.'/css/style_v2.css');
?>

<div class="money"><img src="/da/v2/images/money.gif" /></div>
<?php if (Yii::app()->user->getState('grade')==0){?>
<div class="fee"><img src="/da/v2/images/current.gif"  /><img src="/da/v2/images/fee.gif"/></div>
<div class="fee"><a href="/da/"><img src="/da/v2/images/back_index.gif" border="0"  /></a><a href="http://fuwu.taobao.com/item/subsc.htm?items=ts-12230-5:1" target="_blank" ><img src="/da/v2/images/upgrade.gif" /></a></div>
<?php }else{ ?>
<div class="fee"><img src="/da/v2/images/current.gif"  /><img src="/da/v2/images/standard.gif" /></div>
<div class="fee"><a href="http://pay.taobao.com/mysub/subarticle/re_order_app_store.htm?articleCode=ts-12230&marketType=6" target="_blank"><img src="/da/v2/images/renew.gif" /></a></div>
<?php } ?>
