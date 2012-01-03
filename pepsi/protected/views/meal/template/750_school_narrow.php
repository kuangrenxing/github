<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>

<?php if($mealList->itemCount<=2){ ?>

<table width="750" height="240" border="0" cellspacing="0" align="center" cellpadding="0" background="<?php echo $siteUrl;?>da/images/school/750_bj_01.gif" style="background-repeat:no-repeat; font-size:12px">
  <tbody><tr height="9"></tr>
    <tr>
    <td width="220" height="220" align="right" valign="top" background="<?php echo $items[0]->orig_img.'_b.jpg';?>" style="background-repeat:no-repeat; background-position:center center">
        <a href="<?php echo $items[0]->detail_url; ?>" target="_blank" style="text-decoration:none; width:220px; height:1px; padding:198px 0 0 0; display:block;">
          <font style="background-color:#ff0000; color:#fff; text-align:center; width:80px; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[0]->price);?></font>
        </a>
      </td>
      <td width="8">&nbsp;</td>
      <td width="220" height="220" align="right" valign="top" background="<?php echo $items[1]->orig_img.'_b.jpg';?>" style="background-repeat:no-repeat; background-position:center center">
        <a href="<?php echo $items[1]->detail_url; ?>" target="_blank" style="text-decoration:none; width:220px; height:1px; padding:198px 0 0 0; display:block;">
          <font style="background-color:#ff0000; color:#fff; text-align:center; width:80px; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[1]->price);?></font>
        </a>
      </td>
      <td width="35">&nbsp;</td>
      <td>
        <table width="100%" height="220" border="0" cellspacing="0" cellpadding="0">
        <tbody><tr><td height="28">&nbsp;</td></tr>
          <tr>
            <td height="33" style="color:#ED5850; padding-left:80px; font-size:22px;"><strong><?php echo XHtml::formatPrice($mealList->meal_price)?></strong></td>
          </tr>
          <tr>
            <td height="33" style="color:#fff;padding-left:80px;font-size:22px;"><strong><?php echo XHtml::formatPrice($mealList->origi_price);?></strong></td>
          </tr>
          <tr>
            <td height="33" style="color:#fff;padding-left:80px;font-size:22px;"><strong><?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price)?></strong></td>
          </tr>
          <tr>
            <td height="56" valign="bottom"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/school/btn_buy.gif" border="0"></a></td>
          </tr>
          <tr>
            <td height="37" align="right" valign="center">
              <a href="http://fuwu.taobao.com/serv/detail.htm?service_id=12230" target="_blank" style="width:60px; height:15px; display:block; margin-right:40px;text-decoration:none">&nbsp;</a>
            </td>
          </tr>
      </tbody></table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</tbody>
</table>
<br />

<?php }else{ ?>

<table width="750" height="240" border="0" cellspacing="0" align="center" cellpadding="0" background="<?php echo $siteUrl;?>da/images/school/750_five_bj_01.gif" style="background-repeat:no-repeat; font-size:12px">
  <tbody><tr height="9"></tr>
    <tr>
      <td width="220" height="220" align="right" valign="top" background="<?php echo $items[0]->orig_img.'_b.jpg';?>" style="background-repeat:no-repeat; background-position:center center">
        <a href="<?php echo $items[0]->detail_url; ?>" target="_blank" style="text-decoration:none; width:220px; height:1px; padding:198px 0 0 0; display:block;">
          <font style="background-color:#ff0000; color:#fff; text-align:center; width:80px; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[0]->price);?></font>
        </a>
      </td>
      <td width="7">&nbsp;</td>
      <td width="205" height="220" valign="top">
        <table width="206" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td width="100" height="100" valign="top" background="<?php echo $items[1]->orig_img.'_100x100.jpg';?>" style="background-repeat:no-repeat; background-position:center center">
                <a href="<?php echo $items[1]->detail_url; ?>" target="_blank" style="text-decoration:none; padding-top:78px; height:1px; display:block;">
                  <font style="background-color:#ff0000; color:#fff; text-align:center; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[1]->price);?></font>
                </a>
              </td>
              <td width="6">&nbsp;</td>
              <td width="100" height="100" valign="top" background="<?php echo isset($items[2])?$items[2]->orig_img.'_100x100.jpg':$siteUrl.'da/images/school/750_nopic.gif';?>" style="background-repeat:no-repeat; background-position:center center">
               <?php if(isset($items[2])){ ?> 
               <a href="<?php echo $items[2]->detail_url; ?>" target="_blank" style="text-decoration:none; padding-top:78px; height:1px; display:block;">
                  <font style="background-color:#ff0000; color:#fff; text-align:center; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[2]->price);?></font>
               <?php } ?>
                </a>
              </td>
            </tr>
            <tr height="6">
            </tr>
            <tr>
              <td width="100" height="100" valign="top" background="<?php echo isset($items[3])?$items[3]->orig_img.'_100x100.jpg':$siteUrl.'da/images/school/750_nopic.gif';?>" style="background-repeat:no-repeat; background-position:center center">
               <?php if(isset($items[3])){ ?> 
               <a href="<?php echo $items[3]->detail_url; ?>" target="_blank" style="text-decoration:none; padding-top:78px; height:1px; display:block;">
                  <font style="background-color:#ff0000; color:#fff; text-align:center; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[3]->price);?></font>
               <?php } ?>
                </a>
              </td>
              <td width="6">&nbsp;</td>
              <td width="100" height="100" valign="top" background="<?php echo isset($items[4])?$items[4]->orig_img.'_100x100.jpg':$siteUrl.'da/images/school/750_nopic.gif';?>" style="background-repeat:no-repeat; background-position:center center">
               <?php if(isset($items[4])){ ?> 
               <a href="<?php echo $items[4]->detail_url; ?>" target="_blank" style="text-decoration:none; padding-top:78px; height:1px; display:block;">
                  <font style="background-color:#ff0000; color:#fff; text-align:center; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[4]->price);?></font>
               <?php } ?>
                </a>
              </td>
            </tr>
        </tbody></table>       
      </td>
      <td width="38">&nbsp;</td>
      <td>
        <table width="100%" height="220" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr><td height="28">&nbsp;</td></tr>
            <tr>
              <td height="33" style="color:#ED5850; padding-left:80px; font-size:22px;"><strong><?php echo XHtml::formatPrice($mealList->meal_price)?></strong></td>
            </tr>
            <tr>
              <td height="33" style="color:#fff;padding-left:80px;font-size:22px;"><strong><?php echo XHtml::formatPrice($mealList->origi_price);?></strong></td>
            </tr>
            <tr>
              <td height="33" style="color:#fff;padding-left:80px;font-size:22px;"><strong><?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price)?></strong></td>
            </tr>
            <tr>
            <td height="56" valign="bottom"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/school/btn_buy.gif" border="0"></a></td>
            </tr>
            <tr>
              <td height="37" align="right" valign="center">
                <a href="http://fuwu.taobao.com/serv/detail.htm?service_id=12230" target="_blank" style="width:60px; height:15px; display:block; margin-right:40px;text-decoration:none">&nbsp;</a>
              </td>
            </tr>
        </tbody></table>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
</tbody></table>
<br />
<?php }?>

