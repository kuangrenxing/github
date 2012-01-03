<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>

<?php if($mealList->itemCount<=2){ ?>

<table width="750" height="400" border="0" cellspacing="0" align="center" cellpadding="0" background="<?php echo $siteUrl;?>da/images/school/750_bj.gif" style="background-repeat:no-repeat; font-size:12px">
  <tbody>
    <tr height="9">
  	<td width="71" height="52">&nbsp;</td>
    <td height="52">&nbsp;</td>
    <td width="47" height="52">&nbsp;</td>
    <td height="52">&nbsp;</td>
    <td width="30" height="52">&nbsp;</td>
    <td height="52">&nbsp;</td>
  </tr>
    <tr>
      <td width="71">&nbsp;</td>
      <td width="220" height="220" align="right" valign="top" background="<?php echo $items[0]->orig_img.'_b.jpg';?>" style="background-repeat:no-repeat; background-position:center center; background-color:#FFF;">
        <a href="<?php echo $items[0]->detail_url; ?>"target="_blank" style="text-decoration:none; width:220px; height:1px; padding:198px 0 0 0; display:block;">
          <font style="background-color:#ff0000; color:#fff; text-align:center; width:80px; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[0]->price);?></font>
        </a>
      </td>
      <td width="47">&nbsp;</td>
      <td width="220" height="220" align="right" valign="top" background="<?php echo $items[1]->orig_img.'_b.jpg';?>" style="background-repeat:no-repeat; background-position:center center; background-color:#FFF;" >
        <a href="<?php echo $items[1]->detail_url; ?>" target="_blank" style="text-decoration:none; width:220px; height:1px; padding:198px 0 0 0; display:block;">
          <font style="background-color:#ff0000; color:#fff; text-align:center; width:80px; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[1]->price);?></font>
        </a>
      </td>
      <td width="30">&nbsp;</td>
      <td valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
              <td height="37">&nbsp;</td>
            </tr>
            <tr>
              <td height="24"><font style="font-size:22px; color:#d3534c; "><strong>￥<?php echo XHtml::formatPrice($mealList->meal_price)?></strong></font></td>
            </tr>

            <tr>
              <td height="27" valign="top" background="<?php echo $siteUrl;?>da/images/school/red_bg.gif" style="background-repeat:no-repeat; background-position:left center"><font style="color:#FFF; font-size:20px; line-height:25px; text-align:center; display:block; width:128px; "><strong>节省<span style="padding:0 2px;"> <?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price)?></span>元</strong></font></td>
            </tr>
            <tr>
              <td height="18"><font style="text-decoration:line-through; color:#fcc52a;">(原价: ￥<?php echo XHtml::formatPrice($mealList->origi_price)?>)</font></td>
            </tr>
            <tr>
              <td height="60"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/school/btn_buy.gif" border="0"></a></td>
            </tr>
            <tr>
              <td height="40">&nbsp;</td>
            </tr>
        </tbody></table>
      </td>
    </tr>
    <tr>
      <td width="71" height="128">&nbsp;</td>
    <td height="128">&nbsp;</td>
    <td width="47" height="128">&nbsp;</td>
    <td height="128">&nbsp;</td>
    <td width="30" height="128">&nbsp;</td>
      <td height="128" align="right" valign="bottom"><a href="http://fuwu.taobao.com/serv/detail.htm?service_id=12230"style="width:60px; height:45px; display:block; text-decoration:none;">&nbsp;</a></td>
    </tr>
</tbody></table>
<br />

<?php }else{ ?>

<table width="750" height="400" border="0" cellspacing="0" align="center" cellpadding="0" background="<?php echo $siteUrl;?>da/images/school/750_bj.gif" style="background-repeat:no-repeat; font-size:12px">
  <tbody><tr height="9">
      <td width="71" height="52">&nbsp;</td>
      <td height="52">&nbsp;</td>
      <td width="47" height="52">&nbsp;</td>
      <td height="52">&nbsp;</td>
      <td width="30" height="52">&nbsp;</td>
      <td height="52">&nbsp;</td>
    </tr>
    <tr>
      <td width="71">&nbsp;</td>
      <td width="220" height="220" align="right" valign="top" background="<?php echo $items[0]->orig_img.'_b.jpg';?>" style="background-repeat:no-repeat; background-position:center center; background-color:#FFF;">
        <a href="<?php echo $items[0]->detail_url; ?>" target="_blank" style="text-decoration:none; width:220px; height:1px; padding:198px 0 0 0; display:block;">
          <font style="background-color:#ff0000; color:#fff; text-align:center; width:80px; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[0]->price);?></font>
        </a>
      </td>
      <td width="47">&nbsp;</td>
      <td width="220" height="220" align="center" valign="middle">
        <table width="206" border="0" align="center" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td width="100" height="100" valign="top" background="<?php echo $items[1]->orig_img.'_100x100.jpg';?>" style="background-repeat:no-repeat; background-position:center center; background-color:#FFF;">
                <a href="<?php echo $items[1]->detail_url; ?>" target="_blank" style="text-decoration:none; padding-top:78px; height:1px; display:block;">
                  <font style="background-color:#ff0000; color:#fff; text-align:center; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[1]->price);?></font>
                </a>
              </td>
              <td width="10">&nbsp;</td>
              <td width="100" height="100" valign="top" background="<?php echo isset($items[2])?$items[2]->orig_img.'_100x100.jpg':$siteUrl.'da/images/school/750_nopic.gif';?>" style="background-repeat:no-repeat; background-position:center center ; background-color:#FFF;">
               <?php if(isset($items[2])){ ?> 
               <a href="<?php echo $items[2]->detail_url; ?>" target="_blank" style="text-decoration:none; padding-top:78px; height:1px; display:block;">
                  <font style="background-color:#ff0000; color:#fff; text-align:center; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[2]->price);?></font>
               <?php } ?>
                </a>
              </td>  
            </tr>
            <tr height="10">
            </tr>
            <tr>
              <td width="100" height="100" valign="top" background="<?php echo isset($items[3])?$items[3]->orig_img.'_100x100.jpg':$siteUrl.'da/images/school/750_nopic.gif';?>" style="background-repeat:no-repeat; background-position:center center; background-color:#FFF;">
               <?php if(isset($items[3])){ ?> 
               <a href="<?php echo $items[3]->detail_url; ?>" target="_blank" style="text-decoration:none; padding-top:78px; height:1px; display:block;">
                  <font style="background-color:#ff0000; color:#fff; text-align:center; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[3]->price);?></font>
               <?php } ?>
                </a>
              </td>   
              <td width="10">&nbsp;</td>
              <td width="100" height="100" valign="top" background="<?php echo isset($items[4])?$items[4]->orig_img.'_100x100.jpg':$siteUrl.'da/images/school/750_nopic.gif';?>" style="background-repeat:no-repeat; background-position:center center; background-color:#FFF;">
               <?php if(isset($items[4])){ ?> 
               <a href="<?php echo $items[4]->detail_url; ?>" target="_blank" style="text-decoration:none; padding-top:78px; height:1px; display:block;">
                  <font style="background-color:#ff0000; color:#fff; text-align:center; height:22px; display:block; line-height:22px;">￥<?php echo XHtml::formatPrice($items[4]->price);?></font>
               <?php } ?>
                </a>
              </td>  
            </tr>
        </tbody></table>
      </td>
      <td width="30">&nbsp;</td>
      <td valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
              <td height="37">&nbsp;</td>
            </tr>
            <tr>
              <td height="24"><font style="font-size:22px; color:#d3534c; "><strong>￥<?php echo XHtml::formatPrice($mealList->meal_price)?></strong></font></td>
            </tr>

            <tr>
              <td height="27" valign="top" background="<?php echo $siteUrl;?>da/images/school/red_bg.gif" style="background-repeat:no-repeat; background-position:left center"><font style="color:#FFF; font-size:20px; line-height:25px; text-align:center; display:block; width:128px; "><strong>节省<span style="padding:0 2px;"> <?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price)?></span>元</strong></font></td>
            </tr>
            <tr>
              <td height="18"><font style="text-decoration:line-through; color:#fcc52a;">(原价: ￥<?php echo XHtml::formatPrice($mealList->origi_price)?>)</font></td>
            </tr>
            <tr>
              <td height="60"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/school/btn_buy.gif" border="0"></a></td>
            </tr>
            <tr>
              <td height="40">&nbsp;</td>
            </tr>
        </tbody></table>
      </td>
    </tr>
    <tr>
      <td width="71" height="128">&nbsp;</td>
    <td height="128">&nbsp;</td>
    <td width="47" height="128">&nbsp;</td>
    <td height="128">&nbsp;</td>
    <td width="30" height="128">&nbsp;</td>
      <td height="128" align="right" valign="bottom"><a href="http://fuwu.taobao.com/serv/detail.htm?service_id=12230" style="width:60px; height:45px; display:block; text-decoration:none;">&nbsp;</a></td>
    </tr>
</tbody></table>
<br />
<?php }?>

