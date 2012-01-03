<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];
$itemCount = $mealList->itemCount;
?>

<?php if($itemCount < 4){
    ?>
<table width="750" height="185" align="center" border="0" cellspacing="0" cellpadding="0" background="<?php echo $siteUrl;?>da/images/red_black/bg.gif" style="background-repeat:no-repeat;  font-size:12px;font-family:Trebuchet MS;">
  <tbody><tr height="18"></tr>
  <tr>
    <td width="22">&nbsp;</td>
    
    <!-- first -->
    <td valign="top" width="122">
    	<table width="122" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="122" height="120" colspan="2" align="center" style="border:#ccc 1px solid"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_120x120.jpg';?>" border="0"></a></td>
          </tr>
          <tr>
            <td width="51"><img src="<?php echo $siteUrl;?>da/images/red_black/ico_rmb.gif"></td>
            <td width="71" height="25" align="right" style="padding-right:5px;">￥<?php echo XHtml::formatPrice($items[0]->price);?></td>
          </tr>
      </tbody></table>
    </td>
    
    
    <td width="22" align="center" valign="top" style="padding-top:55px"><img src="<?php echo $siteUrl;?>da/images/red_black/ico_plus.gif" width="12" height="12"></td>
    
    <!-- second -->
    <td valign="top" width="122">
    	<table border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="122" height="120" colspan="2" align="center" style="border:#ccc 1px solid"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $items[1]->orig_img.'_120x120.jpg';?>" border="0"></a></td>
          </tr>
          <tr>
            <td width="51"><img src="<?php echo $siteUrl;?>da/images/red_black/ico_rmb.gif"></td>
            <td width="71" height="25" align="right" style="padding-right:5px;"><?php echo XHtml::formatPrice($items[1]->price);?></td>
          </tr>
      </tbody></table>
    </td>
    
    
    <td width="22" align="center" valign="top" style="padding-top:55px"><img src="<?php echo $siteUrl;?>da/images/red_black/ico_plus.gif" width="12" height="12"></td>
    
    <?php if(isset($items[2])){?>
    <!-- third -->
    <td valign="top" width="122">
    	<table border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="122" height="120" colspan="2" align="center" style="border:#ccc 1px solid"><a href="<?php echo $items[2]->detail_url;?>" target="_blank"><img src="<?php echo $items[2]->orig_img.'_120x120.jpg';?>" border="0"></a></td>
          </tr>
          <tr>
            <td width="51"><img src="<?php echo $siteUrl;?>da/images/red_black/ico_rmb.gif"></td>
            <td width="71" height="25" align="right" style="padding-right:5px;">￥<?php echo XHtml::formatPrice($items[2]->price);?></td>
          </tr>
      </tbody></table>
    </td>
    <?php }else{?>
    <td valign="top" width="122">
    	<table border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="122" height="120" colspan="2" align="center" style="border:#ccc 1px solid"><img src="<?php echo $siteUrl;?>da/images/red_black/photo_none_120.gif"></td>
          </tr>
          <tr>
            <td width="51"></td>
            <td width="71" height="25" align="right" style="padding-right:5px;"></td>
          </tr>
      </tbody></table>
    </td>
    <?php }?>
    <!-- end -->
    
    <td width="53">&nbsp;</td>
    <td valign="top" width="242">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td height="58" width="105" align="center" colspan="2"><strong style="font-size:26px; color:#F00; text-align:center"><?php echo XHtml::formatPrice($mealList->meal_price);?></strong></td>
            <td colspan="3" width="135"><a href="<?php echo $mealList->detail_url;?>" target="_blank" style="text-decoration:none; height:40px; display:block;">&nbsp;</a></td>
          </tr>
        </tbody></table>
        <table width="198" align="center">
        	<tbody><tr>
            <td height="24">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="66" align="center" style="color:#f00"><?php echo XHtml::formatPrice($mealList->meal_price);?></td><?php //meal price?>
            <td width="66" align="center" style="color:#f7a900"><strong><?php echo XHtml::formatPrice($mealList->origi_price - $mealList->meal_price);?></strong></td><?php //jiesheng?>
            <td width="66" align="center"><?php echo XHtml::formatPrice($mealList->origi_price);?></td><?php //origi_price?>
          </tr>
        </tbody></table>
    </td>
    <td width="33">&nbsp;</td>
  </tr>

</tbody></table>

<?php }else{?>
    
    <table width="750" height="175" align="center" border="0" cellspacing="0" cellpadding="0" background="<?php echo $siteUrl;?>da/images/red_black/bg_four.gif" style="background-repeat:no-repeat; font-size:12px; font-size:12px;font-family:Trebuchet MS;">
  <tbody><tr height="16"></tr>
  <tr>
    <td width="14">&nbsp;</td>
    <td valign="top" width="102">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="102" align="center" height="100" style="border:#ccc 1px solid"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_100x100.jpg';?>" border="0"></a></td>
          </tr>
          <tr>
            <td height="22">
            	<span style="width:98px; height:18px; display:block; overflow:hidden; white-space:nowrap;text-overflow: ellipsis;"><a href="<?php echo $items[0]->detail_url;?>" style="text-decoration:none; color:#000" target="_blank"><?php echo $items[0]->title;?></a></span>
            </td>
          </tr>
          <tr>
            <td align="center"><strong>￥<?php echo XHtml::formatPrice($items[0]->price);?></strong></td>
          </tr>
        </tbody></table>
    </td>
    <td align="center" valign="top" style="padding-top:45px"><img src="<?php echo $siteUrl;?>da/images/red_black/ico_plus.gif"></td>
    <td valign="top" width="102">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="102" align="center" height="100" style="border:#ccc 1px solid"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $items[1]->orig_img.'_100x100.jpg';?>" border="0"></a></td>
          </tr>
          <tr>
            <td height="22">
            	<span style="width:100px;height:18px; display:block; overflow:hidden; white-space:nowrap;text-overflow: ellipsis;"><a href="<?php echo $items[1]->detail_url;?>" style="text-decoration:none; color:#000" target="_blank"><?php echo $items[1]->title;?></a></span>
            </td>
          </tr>
          <tr>
            <td align="center"><strong>￥<?php echo XHtml::formatPrice($items[1]->price);?></strong></td>
          </tr>
        </tbody></table>
    </td>
    <td align="center" valign="top" style="padding-top:45px"><img src="<?php echo $siteUrl;?>da/images/red_black/ico_plus.gif"></td>
    <td valign="top" width="102">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="102" height="100" align="center" style="border:#ccc 1px solid"><a href="<?php echo $items[2]->detail_url;?>" target="_blank"><img src="<?php echo $items[2]->orig_img.'_100x100.jpg';?>" border="0"></a></td>
          </tr>
          <tr>
            <td height="22">
            	<span style="width:100px;height:18px; display:block; overflow:hidden; white-space:nowrap;text-overflow: ellipsis;"><a href="<?php echo $items[2]->detail_url;?>" style="text-decoration:none; color:#000" target="_blank"><?php echo $items[2]->title;?></a></span>
            </td>
          </tr>
          <tr>
            <td align="center"><strong>￥<?php echo XHtml::formatPrice($items[2]->price);?></strong></td>
          </tr>
        </tbody></table>
    </td>
    <td align="center" valign="top" style="padding-top:45px"><img src="<?php echo $siteUrl;?>da/images/red_black/ico_plus.gif"></td>
    <td valign="top" width="102">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="102" height="100" align="center" style="border:#ccc 1px solid"><a href="<?php echo $items[3]->detail_url;?>" target="_blank"><img src="<?php echo $items[3]->orig_img.'_100x100.jpg';?>" border="0"></a></td>
          </tr>
          <tr>
            <td height="22">
            	<span style="width:100px;height:18px; display:block; overflow:hidden; white-space:nowrap;text-overflow: ellipsis;"><a href="<?php echo $items[3]->detail_url;?>" style="text-decoration:none; color:#000" target="_blank"><?php echo $items[3]->title;?></a></span>
            </td>
          </tr>
          <tr>
            <td align="center"><strong>￥<?php echo XHtml::formatPrice($items[3]->price);?></strong></td>
          </tr>
        </tbody></table>
    </td>
    <td width="18">&nbsp;</td>
    <td valign="top" width="240">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td height="58" width="105" align="center" colspan="2"><strong style="font-size:26px; color:#F00; text-align:center"><?php echo XHtml::formatPrice($mealList->meal_price);?></strong></td>
            <td colspan="3" width="135"><a href="<?php echo $mealList->detail_url;?>" target="_blank" style="text-decoration:none; height:40px; display:block;">&nbsp;</a></td>
          </tr>
        </tbody></table>
        <table width="198" align="center">
        	<tbody><tr>
            <td height="24">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="66" align="center" style="color:#f00"><?php echo XHtml::formatPrice($mealList->meal_price);?></td>
            <td width="66" align="center" style="color:#f7a900"><strong><?php echo XHtml::formatPrice($mealList->origi_price - $mealList->meal_price);?></strong></td>
            <td width="66" align="center"><?php echo XHtml::formatPrice($mealList->origi_price);?></td>
          </tr>
        </tbody></table>
    </td>
    <td width="18">&nbsp;</td>
  </tr>
</tbody></table>

    <?php }?>
    
