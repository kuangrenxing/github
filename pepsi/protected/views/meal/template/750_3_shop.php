<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>

<table width="750" height="210" align="center" border="0" cellspacing="0" cellpadding="0" style="font-size:12px" bgcolor="#FFFFFF">
  <tbody><tr>
    <td style="border:#ccc 1px solid">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td width="5">&nbsp;</td>
        <td width="160" align="right" valign="top">
            <table width="150" border="0" cellspacing="0" cellpadding="0">
              <tbody><tr height="8"></tr>
              <tr align="left">
                <td height="22"><strong>套餐价：</strong><strong style="font-size:16px; color:#fe6521">￥<?php echo XHtml::formatPrice($mealList->meal_price)?></strong></td>
              </tr>
              <tr align="left">
                <td height="22"><font color="#666666">原价：<font style="text-decoration:line-through; padding:0 3px;">￥<?php echo XHtml::formatPrice($mealList->origi_price)?></font></font></td>
              </tr>
              <tr height="8"></tr>
              <tr>
                <td><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/basic/icon750_ok.gif" border="0"></a></td>
              </tr>
              <tr height="10"></tr>
              <tr>
                <td><img src="<?php echo $siteUrl;?>da/images/basic/750.gif"></td>
              </tr>
            </tbody></table>
        </td>
        <td>&nbsp;
            
        </td>
        <td valign="top" width="86" background="<?php echo $siteUrl;?>da/images/basic/tag.gif" style="background-position:left 20px; background-repeat:no-repeat;">
        <span style="text-align:center; color:#FFF; display:block; padding-top:38px; font-size:18px; font-weight:bold;">节省<br>￥<?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price)?></span>
        </td>
        <td>&nbsp;
            
        </td>
        <td valign="top" width="124">
            <table border="0" cellspacing="0" cellpadding="0">
              <tbody><tr>
              <td width="124" height="122" align="center" style="border:#ccc 1px solid"><img src="<?php echo $items[0]->orig_img.'_120x120.jpg';?>"></td>
              </tr>
              <tr>
              <td height="28" align="center" style="color:#666">原价：<?php echo XHtml::formatPrice($items[0]->price);?>元</td>
              </tr>
              <tr>
              <td align="center"><a href="<?php echo $items[0]->detail_url;?>" style="color:#5c66cc; text-decoration:none" target="_blank"><?php echo $items[0]->title;?></a></td>
              </tr>
            </tbody></table>
        </td>
        <td align="center" valign="top" style="padding-top:55px;"><img src="<?php echo $siteUrl;?>da/images/basic/ico_plus.gif"></td>
        <td valign="top" width="124">
            <table border="0" cellspacing="0" cellpadding="0">
              <tbody><tr>
              <td width="124" height="122" align="center" valign="center" style="border:#ccc 1px solid"><img src="<?php echo $items[1]->orig_img.'_120x120.jpg';?>"></td>
              </tr>
              <tr>
              <td height="28" align="center" style="color:#666">原价：<?php echo XHtml::formatPrice($items[1]->price);?>元</td>
              </tr>
              <tr>
              <td align="center"><a href="<?php echo $items[1]->detail_url;?>" style="color:#5c66cc; text-decoration:none" target="_blank"><?php echo $items[1]->title;?></a></td>
              </tr>
            </tbody></table>
        </td>
        <td valign="top" align="center" style="padding-top:55px;"><img src="<?php echo $siteUrl;?>da/images/basic/ico_plus.gif"></td>
        <td valign="top" width="124">
            <table border="0" cellspacing="0" cellpadding="0">
              <tbody><tr>
              <td width="124" height="122" align="center" valign="center" style="border:#ccc 1px solid"><img src="<?php echo isset($items[2])?$items[2]->orig_img.'_120x120.jpg':$siteUrl.'da/images/empty_120.jpg';?>"></td>
              </tr>
              <tr>
              <td height="28" align="center" style="color:#666"><?php echo isset($items[2])?'原价：'.XHtml::formatPrice($items[2]->price).'元':'&nbsp;';?></td>
              </tr>
              <tr>
              <td align="center"><a href="<?php echo isset($items[2])?$items[2]->detail_url:'#none';?>" style="color:#5c66cc; text-decoration:none" target="_blank"><?php echo isset($items[2])?$items[2]->title:'&nbsp;';?></a></td>
              </tr>
            </tbody></table>
        </td>
        <td>&nbsp;</td>
        </tr>     
    </tbody></table>
    </td>
  </tr>
</tbody></table>
<br />
