<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>


<table width="950" background="<?php echo $siteUrl?>da/images/jianyue2/jy_bg.jpg" align="center" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; font-family:Trebuchet MS; margin-bottom:10px; background-repeat:no-repeat">
  <tr height="14">
  </tr>
  <tr>
    <td width="15">&nbsp;</td>
    <td colspan="2" width="310" height="310" align="center"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_310x310.jpg';?>" border="0" /></a></td>
    <td  width="33">&nbsp;</td>
    <td colspan="2" width="310" height="310" align="center"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $items[1]->orig_img.'_310x310.jpg';?>" border="0"/></a></td>
    <td  width="34">&nbsp;</td>
    <td width="233" rowspan="3" valign="bottom">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:14px; color:#666;">
          <tr>
            <td height="38" style="padding-left:15px;">搭配：￥<font style="color:#ff2fa1; font-size:26px; padding-right:2px;"><strong><?php echo $mealList->meal_price;?></strong></font>元</td>
          </tr>
          <tr>
            <td height="38" style="padding-left:15px;">立省：￥<?php $price = $mealList->origi_price - $mealList->meal_price;  
              $price = $price < 0 ? 0 : $price; 
              echo XHtml::formatPrice($price,true);?>元</td>
          </tr>
          <tr>
            <td height="38" style="padding-left:15px; text-decoration:line-through">原价：￥<?php echo $mealList->origi_price;?>元</td>
          </tr>
          <tr>
            <td><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/jianyue2/950btn_buy.jpg"  border="0"/></a></td>
          </tr>
          <tr>
            <td height="50" align="right" style="padding-right:5px;"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/jianyue2/950_xiangqing.jpg" border="0"/></a></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
    </td>
    <td width="15">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" height="40" align="center"  width="310"><a href="<?php echo $items[0]->detail_url;?>" target="_blank" style="text-decoration:none; color:#333;"><?php echo $items[0]->title;?></a></td>
    <td>&nbsp;</td>
    <td colspan="2" height="40" align="center"  width="310"><a href="<?php echo $items[1]->detail_url;?>" target="_blank" style="text-decoration:none; color:#333"><?php echo $items[1]->title;?></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="200" height="42" ><strong style="padding-left:5px; color:#ff3da7; font-size:20px;">￥<?php echo $items[0]->price;?></strong></td>
    <td width="110"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/jianyue2/950btn_buyone.jpg" border="0"/></a></td>
    <td>&nbsp;</td>
    <td width="200" height="42" ><strong style="padding-left:5px; color:#ff3da7; font-size:20px;">￥<?php echo $items[1]->price;?></strong></td>
    <td width="110"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/jianyue2/950btn_buyone.jpg" border="0"/></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


