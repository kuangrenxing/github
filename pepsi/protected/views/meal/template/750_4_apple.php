<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];
$itemCount = $mealList->itemCount;
?>

<?php if($itemCount < 4){
?>
<table width="750" height="210" border="0" cellspacing="0" cellpadding="0" background="<?php echo $siteUrl;?>da/images/apple/bg_v2.gif" style="background-repeat:no-repeat; font-size:12px; font-family:Trebuchet MS;" align="center">
  <tbody><tr height="17">
  </tr>
  <tr>
    <td width="18">&nbsp;</td>
    
    <!-- first -->
    <td width="124" valign="top">
    <table width="124" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="124" height="124" align="center" background="<?php echo $siteUrl;?>da/images/apple/kuang_bg.gif" style="background-repeat:no-repeat;"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_120x120.jpg';?>" border="0"></a></td>
          </tr>
          <tr>
            <td height="25" align="center" style="color:#9c9c9c">￥<?php echo XHtml::formatPrice($items[0]->price);?></td>
          </tr>
          <tr>
            <td align="center"><span style="width:120px; height:18px; display:block; overflow:hidden; white-space:nowrap;text-overflow: ellipsis; margin:0 auto;"><a href="<?php echo $items[0]->detail_url;?>" style="text-decoration:none; color:#000;" target="_blank"><?php echo $items[0]->title;?></a></span></td>
          </tr>
        </tbody></table>
    </td>
    
    
    <td align="center" width="28" valign="top" style="padding-top:60px"><img src="<?php echo $siteUrl;?>da/images/apple/ico_plus.gif"></td>
    
    <!-- second -->
    <td width="124" valign="top">
    	<table width="124" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="124" height="124" align="center" background="<?php echo $siteUrl;?>da/images/apple/kuang_bg.gif" style="background-repeat:no-repeat;"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $items[1]->orig_img.'_120x120.jpg';?>" border="0"></a></td>
          </tr>
          <tr>
            <td height="25" align="center" style="color:#9c9c9c">￥<?php echo XHtml::formatPrice($items[1]->price);?></td>
          </tr>
          <tr>
            <td align="center"><span style="width:120px; height:18px; display:block; overflow:hidden; white-space:nowrap;text-overflow: ellipsis; margin:0 auto;"><a href="<?php echo $items[1]->detail_url;?>" style="text-decoration:none; color:#000;" target="_blank"><?php echo $items[1]->title;?></a></span></td>
          </tr>
        </tbody></table>
    </td>
    <td align="center" width="28" valign="top" style="padding-top:60px"><img src="<?php echo $siteUrl;?>da/images/apple/ico_plus.gif"></td>
    
    <!-- third -->
    <?php if(isset($items[2])){?>
    
    <td width="124" valign="top">
    <table width="124" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="124" height="124" align="center" background="<?php echo $siteUrl;?>da/images/apple/kuang_bg.gif" style="background-repeat:no-repeat;"><a href="<?php echo $items[2]->detail_url;?>" target="_blank"><img src="<?php echo $items[2]->orig_img.'_120x120.jpg'?>" border="0"></a></td>
          </tr>
          <tr>
            <td height="25" align="center" style="color:#9c9c9c">￥<?php echo XHtml::formatPrice($items[2]->price);?></td>
          </tr>
          <tr>
            <td align="center"><span style="width:120px; height:18px; display:block; overflow:hidden; white-space:nowrap;text-overflow: ellipsis; margin:0 auto;"><a href="<?php echo $items[2]->detail_url;?>" style="text-decoration:none; color:#000;" target="_blank"><?php echo $items[2]->title;?></a></span></td>
          </tr>
        </tbody></table>
    </td>
    
    <?php }else{?>
    <td width="124" valign="top">
    <table width="124" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="124" height="124" align="center" background="<?php echo $siteUrl;?>da/images/apple/kuang_bg.gif" style="background-repeat:no-repeat;"><img src="<?php echo $siteUrl;?>da/images/apple/none.gif"></td>
          </tr>
          <tr>
            <td height="25" align="center" style="color:#9c9c9c"></td>
          </tr>
          <tr>
            <td align="center"><span style="width:120px; height:18px; display:block; overflow:hidden; white-space:nowrap;text-overflow: ellipsis; margin:0 auto;"><a href="" style="text-decoration:none; color:#000;" target="_blank"></a></span></td>
          </tr>
        </tbody></table>
    </td>
    <?php }?>
    
    <td width="15">&nbsp;</td>
    <td valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td height="85" colspan="3">&nbsp;</td>
        </tr>
      <tr>
        <td width="70" height="28" align="center" style="color:#1d92c2">￥<?php echo XHtml::formatPrice($mealList->meal_price);?></td>
        <td width="70" height="28" align="center"><strong style="color:#dd8112;  font-size:14px;">￥<?php echo XHtml::formatPrice($mealList->origi_price - $mealList->meal_price);?></strong></td>
        <td width="70" height="28" align="center" style="color:#9c9c9c">￥<?php echo XHtml::formatPrice($mealList->origi_price);?></td>
      </tr>
      <tr>
        <td height="50" colspan="3"  style="padding-left:17px;"><a href="<?php echo $mealList->detail_url;?>" target="_blank" ><img src="<?php echo $siteUrl;?>da/images/apple/buy.gif" border="0"/></a></td>
        </tr>
    </tbody></table></td>
    <td width="85">&nbsp;</td>
  </tr>
</tbody></table>



<?php }else{
    //@todo商品数量为4?>
    <table width="750" height="210" align="center" border="0" cellspacing="0" cellpadding="0" background="<?php echo $siteUrl;?>da/images/apple/bg_four_v2.gif" ;="" style="background-repeat:no-repeat; font-size:12px;font-family:Trebuchet MS;" >
  <tbody><tr height="14">
  </tr>
  <tr>
    <td width="9">&nbsp;</td>
    <td width="124" valign="top">
    	<table width="124" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="124" height="124" align="center" background="<?php echo $siteUrl;?>da/images/apple/kuang_bg.gif" style="background-repeat:no-repeat;"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_120x120.jpg';?>" border="0"></a></td>
          </tr>
          <tr>
            <td height="25" align="center" style="color:#9c9c9c">￥<?php echo XHtml::formatPrice($items[0]->price);?></td>
          </tr>
          <tr>
            <td align="center"><span style="width:120px; height:18px; display:block; overflow:hidden; white-space:nowrap;text-overflow: ellipsis; margin:0 auto;"><a href="<?php echo $items[0]->detail_url;?>" style="text-decoration:none; color:#000;" target="_blank"><?php echo $items[0]->title;?></a></span></td>
          </tr>
        </tbody></table>
    </td>
    <td width="10" valign="top" style="padding-top:60px"><img src="<?php echo $siteUrl;?>da/images/apple/ico_plus_four.gif"></td>
    <td width="124" valign="top">
    	<table width="124" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="124" height="124" align="center" background="<?php echo $siteUrl;?>da/images/apple/kuang_bg.gif" style="background-repeat:no-repeat;"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $items[1]->orig_img.'_120x120.jpg';?>" border="0"></a></td>
          </tr>
          <tr>
            <td height="25" align="center" style="color:#9c9c9c">￥<?php echo XHtml::formatPrice($items[1]->price);?></td>
          </tr>
          <tr>
            <td align="center"><span style="width:120px; height:18px; display:block; overflow:hidden; white-space:nowrap;text-overflow: ellipsis; margin:0 auto;"><a href="<?php echo $items[1]->detail_url;?>" style="text-decoration:none; color:#000;" target="_blank"><?php echo $items[1]->title;?></a></span></td>
          </tr>
      </tbody></table>
    </td>
    <td width="10" valign="top" style="padding-top:60px"><img src="<?php echo $siteUrl;?>da/images/apple/ico_plus_four.gif"></td>
    <td width="124" valign="top">
    	<table width="124" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="124" height="124" align="center" background="<?php echo $siteUrl;?>da/images/apple/kuang_bg.gif" style="background-repeat:no-repeat;"><a href="<?php echo $items[2]->detail_url;?>" target="_blank"><img src="<?php echo $items[2]->orig_img.'_120x120.jpg';?>" border="0"></a></td>
          </tr>
          <tr>
            <td height="25" align="center" style="color:#9c9c9c">￥<?php echo XHtml::formatPrice($items[2]->price);?></td>
          </tr>
          <tr>
            <td align="center"><span style="width:120px; height:18px; display:block; overflow:hidden; white-space:nowrap;text-overflow: ellipsis; margin:0 auto;"><a href="<?php echo $items[2]->detail_url;?>" style="text-decoration:none; color:#000;" target="_blank"><?php echo $items[2]->title;?></a></span></td>
          </tr>
        </tbody></table>
    </td>
    <td width="10" valign="top" style="padding-top:60px"><img src="<?php echo $siteUrl;?>da/images/apple/ico_plus_four.gif"></td>
    <td width="124" valign="top">
    	<table width="124" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="124" height="124" align="center" background="<?php echo $siteUrl;?>da/images/apple/kuang_bg.gif" style="background-repeat:no-repeat;"><a href="<?php echo $items[3]->detail_url;?>" target="_blank"><img src="<?php echo $items[3]->orig_img.'_120x120.jpg';?>" border="0"></a></td>
          </tr>
          <tr>
            <td height="25" align="center" style="color:#9c9c9c">￥<?php echo XHtml::formatPrice($items[3]->price);?></td>
          </tr>
          <tr>
            <td align="center"><span style="width:120px; height:18px; display:block; overflow:hidden; white-space:nowrap;text-overflow: ellipsis; margin:0 auto;"><a href="<?php echo $items[3]->detail_url;?>" style="text-decoration:none; color:#000;" target="_blank"><?php echo $items[3]->title;?></a></span></td>
          </tr>
        </tbody></table>
    </td>
    <td width="3">&nbsp;</td>
    <td width="210" valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td height="85" colspan="3">&nbsp;</td>
            </tr>
          <tr>
            <td width="70" height="28" align="center" style="color:#1d92c2">￥<?php echo XHtml::formatPrice($mealList->meal_price);?></td>
            <td width="70" height="28" align="center"><strong style="color:#dd8112;  font-size:14px;">￥<?php echo XHtml::formatPrice($mealList->origi_price - $mealList->meal_price);?></strong></td>
            <td width="70" height="28" align="center" style="color:#9c9c9c">￥<?php echo XHtml::formatPrice($mealList->origi_price);?></td>
          </tr>
          <tr>
            <td height="50" colspan="3"  style="padding-left:20px;"><a href="<?php echo $mealList->detail_url;?>" target="_blank" ><img src="<?php echo $siteUrl;?>da/images/apple/buy.gif" border="0"/></a></td>
            </tr>
        </tbody></table>
    </td>
    <td width="2">&nbsp;</td>
  </tr>
</tbody></table>

    <?php }?>