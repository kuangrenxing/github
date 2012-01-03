<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>

<?php if($mealList->itemCount<=2){ ?>

<table width="950" height="510" border="0" cellspacing="0" cellpadding="0" align="center" background="<?php echo $siteUrl;?>da/images/school/950_bj.gif" style="background-repeat:no-repeat;">
  <tbody>
    <tr>
      <td width="67" height="43">&nbsp;</td>
      <td height="43">&nbsp;</td>
      <td width="47" height="43">&nbsp;</td>
      <td height="43">&nbsp;</td>
      <td height="43">&nbsp;</td>
    </tr>
    <tr>
      <td width="67">&nbsp;</td>
      <td width="310" height="330" align="right" valign="top" background="<?php echo $items[0]->orig_img.'_310x310.jpg';?>" style="background-repeat:no-repeat; background-position:center center;">
        <a href="<?php echo $items[0]->detail_url; ?>" target="_blank" style="text-decoration:none;height:1px; padding:298px 0 0 0; display:block;">
          <font style="background-color:#ff0000; color:#fff; text-align:center; width:80px; height:22px; display:block; line-height:22px; margin-bottom:10px;">￥<?php echo XHtml::formatPrice($items[0]->price);?></font>
        </a>
      </td>
      <td width="47">&nbsp;</td>
      <td width="310" height="330" align="right" valign="top" background="<?php echo $items[1]->orig_img.'_310x310.jpg';?>" style="background-repeat:no-repeat; background-position:center center;">
        <a href="<?php echo $items[1]->detail_url; ?>" target="_blank" style="text-decoration:none;height:1px; padding:298px 0 0 0; display:block;">
          <font style="background-color:#ff0000; color:#fff; text-align:center; width:80px; height:22px; display:block; line-height:22px; margin-bottom:10px;">￥<?php echo XHtml::formatPrice($items[1]->price);?></font>
        </a>
      </td>
      <td valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td height="42">&nbsp;</td>
            </tr>
            <tr>
              <td><font style="font-size:22px; color:#d3534c; padding-left:30px;"><strong>￥<?php echo XHtml::formatPrice($mealList->meal_price)?></strong></font></td>
            </tr>
            <tr>
              <td height="32" background="<?php echo $siteUrl;?>da/images/school/red_bg.gif" style="background-repeat:no-repeat; background-position:30px center"><font style="color:#FFF; font-size:20px; text-align:center; display:block; width:128px; margin-left:30px;"><strong>节省<span style="padding:0 2px;">
 <?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price)?></span>元</strong></font></td>
            </tr>
            <tr>
              <td height="18"><font style="text-decoration:line-through; color:#fcc52a;padding-left:30px;" >(原价: ￥<?php echo XHtml::formatPrice($mealList->origi_price)?>)</font></td>
            </tr>
            <tr>
              <td height="60" style="padding-left:30px;"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/school/btn_buy.gif" border="0"></a></td>
            </tr>
            <tr>
              <td height="120">&nbsp;</td>
            </tr>
        </tbody></table>
      </td>
    </tr>
    <tr>
      <td width="67" height="137">&nbsp;</td>
      <td height="137">&nbsp;</td>
      <td width="47" height="137">&nbsp;</td>
      <td height="137">&nbsp;</td>
      <td height="137" align="right" valign="bottom"><a href="http://fuwu.taobao.com/serv/detail.htm?service_id=12230" target="_blank" style="width:70px; height:50px; display:block; text-decoration:none">&nbsp;</a></td>
    </tr>
  </tbody>
</table>
<br />
<?php }else{ ?>

<table width="950" height="510" border="0" cellspacing="0" cellpadding="0" align="center" background="<?php echo $siteUrl;?>da/images/school/950_bj_five.gif" style="background-repeat:no-repeat;">
  <tbody>
    <tr>
      <td width="67" height="43">&nbsp;</td>
      <td height="43">&nbsp;</td>
      <td width="37" height="43">&nbsp;</td>
      <td height="43">&nbsp;</td>
      <td height="43">&nbsp;</td>
    </tr>
    <tr>
      <td width="67">&nbsp;</td>
      <td width="310" height="330" align="right" valign="top" background="<?php echo $items[0]->orig_img.'_310x310.jpg';?>" style="background-repeat:no-repeat; background-position:center center;">
        <a href="<?php echo $items[0]->detail_url; ?>" target="_blank" style="text-decoration:none;height:1px; padding:298px 0 0 0; display:block;">
          <font style="background-color:#ff0000; color:#fff; text-align:center; width:80px; height:22px; display:block; line-height:22px; margin-bottom:10px;">￥<?php echo XHtml::formatPrice($items[0]->price);?></font>
        </a>
      </td> 
      <td width="37">&nbsp;</td>
      <td width="330" height="330"><table width="326" align="center" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td width="160" height="160" valign="top" background="<?php echo $items[1]->orig_img.'_160x160.jpg';?>" style="background-position:center center; background-repeat:no-repeat;background-color:#FFF">
                <a href="<?php echo $items[1]->detail_url; ?>" style="text-decoration:none; padding-top:138px; height:1px; display:block;">
                  <font style="background-color:#ff0000; color:#fff; text-align:center;  height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[1]->price);?></font>
                </a>
              </td>
              <td width="6"></td>
              <td width="160" height="160" valign="top" background="<?php echo isset($items[2])?$items[2]->orig_img.'_160x160.jpg':$siteUrl.'da/images/school/950_nopic.gif';?>" style="background-repeat:no-repeat; background-position:center center;background-color:#FFF">
               <?php if(isset($items[2])){ ?> 
               <a href="<?php echo $items[2]->detail_url; ?>" target="_blank" style="text-decoration:none; padding-top:138px; height:1px; display:block;">
                  <font style="background-color:#ff0000; color:#fff; text-align:center; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[2]->price);?></font>
               <?php } ?>
                </a>
              </td>
            </tr>
            <tr height="6">

            </tr>
            <tr>
              <td width="160" height="160" valign="top" background="<?php echo isset($items[3])?$items[3]->orig_img.'_160x160.jpg':$siteUrl.'da/images/school/950_nopic.gif';?>" style="background-repeat:no-repeat; background-position:center center;background-color:#FFF">
               <?php if(isset($items[3])){ ?> 
               <a href="<?php echo $items[3]->detail_url; ?>" target="_blank" style="text-decoration:none; padding-top:138px; height:1px; display:block;">
                  <font style="background-color:#ff0000; color:#fff; text-align:center; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[3]->price);?></font>
               <?php } ?>
                </a>
              </td>   
              <td width="6"></td>
              <td width="160" height="160" valign="top" background="<?php echo isset($items[4])?$items[4]->orig_img.'_160x160.jpg':$siteUrl.'da/images/school/950_nopic.gif';?>" style="background-repeat:no-repeat; background-position:center center;background-color:#FFF">
               <?php if(isset($items[4])){ ?> 
               <a href="<?php echo $items[4]->detail_url; ?>" target="_blank" style="text-decoration:none; padding-top:138px; height:1px; display:block;">
                  <font style="background-color:#ff0000; color:#fff; text-align:center; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[4]->price);?></font>
               <?php } ?>
                </a>
              </td>    
            </tr>
      </tbody></table></td>
      <td valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
              <td height="42">&nbsp;</td>
            </tr>
            <tr>
              <td><font style="font-size:22px; color:#d3534c; padding-left:30px;"><strong>￥<?php echo XHtml::formatPrice($mealList->meal_price)?></strong></font></td>
            </tr>
            <tr>
              <td height="32" background="<?php echo $siteUrl;?>da/images/school/red_bg.gif" style="background-repeat:no-repeat; background-position:30px center"><font style="color:#FFF; font-size:20px; text-align:center; display:block; width:128px; margin-left:30px;"><strong>节省<span style="padding:0 2px;">
 <?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price)?></span>元</strong></font></td>
            </tr>
            <tr>
              <td height="18"><font style="text-decoration:line-through; color:#fcc52a;padding-left:30px;" >(原价: ￥<?php echo XHtml::formatPrice($mealList->origi_price)?>)</font></td>
            </tr>
            <tr>
              <td height="60" style="padding-left:30px;"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/school/btn_buy.gif" border="0"></a></td>
            </tr>  
            <tr>
              <td height="120">&nbsp;</td>
            </tr>
        </tbody></table>
      </td>
    </tr>
    <tr>
      <td width="67" height="137">&nbsp;</td>
    <td height="137">&nbsp;</td>
    <td width="37" height="137">&nbsp;</td>
    <td height="137">&nbsp;</td>
      <td height="137" align="right" valign="bottom"><a href="http://fuwu.taobao.com/serv/detail.htm?service_id=12230" target="_blank" style="width:70px; height:50px; display:block;text-decoration:none">&nbsp;</a></td>
    </tr>
</tbody></table>
<br />
<?php }?>

