<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];
$itemCount = $mealList->itemCount;
?>


																			
<table width="950" align="center" height="340" border="0" cellspacing="0" cellpadding="0" background="<?php echo $siteUrl;?>da/images/autumn/950/950_bg_v2.gif" style="background-repeat:no-repeat;font-family:Trebuchet MS;">
  <tr>
    <td height="52">&nbsp;</td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
	<tr>
    <td width="300">&nbsp;</td>
    <td width="228" height="228" align="center" valign="middle" background="<?php echo $siteUrl.'da/images/autumn/950/border220.gif';?>" style="background-repeat:no-repeat; background-position:top left">
    <table width="220" align="center" height="228" border="0" cellspacing="0" cellpadding="0">
      <tr height="4"></tr>
      <tr>
        <td width="220" height="220" align="center" valign="middle"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_b.jpg';?>" border="0"/></a></td>
      </tr>
      <tr height="4"></tr>
    </table>

    
    </td>
	<td width="21">&nbsp;</td>
    
    <?php if($itemCount == 2){?>
    <td width="228" height="228" align="center" valign="middle" background="<?php echo $siteUrl.'da/images/autumn/950/border220.gif';?>" style="background-repeat:no-repeat; background-position:top left">
    <a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $items[1]->orig_img.'_b.jpg';?>" border="0"/></a></td>

    <?php }else{
        ?>
    <td width="228" height="228" align="center" >
    	<table width="224" height="226"  border="0" align="center"  cellspacing="0" cellpadding="0" style=" background-color:#1d1d1d">
        <tr height="5"></tr>
      <tr>
      	<td width="4">&nbsp;</td>
          <td width="108" height="108" align="center" valign="middle" background="<?php echo $siteUrl.'da/images/autumn/950/border100.gif';?>" style="background-repeat:no-repeat; background-color:#fff"><a href="<?php echo $items[1]->detail_url;?>" target="_blank" ><img src="<?php echo $items[1]->orig_img.'_100x100.jpg';?>"  border="0"/></a></td>
          <td width="108" height="108" align="center" valign="middle" background="<?php echo $siteUrl.'da/images/autumn/950/border100.gif';?>" style="background-repeat:no-repeat; background-color:#fff"><a href="<?php echo $items[2]->detail_url;?>" target="_blank" ><img src="<?php echo $items[2]->orig_img.'_100x100.jpg';?>"  border="0"/></a></td>
          <td width="4">&nbsp;</td>
      </tr>										
        <tr>													
          <?php if(isset($items[3])){?>
          <td width="4">&nbsp;</td>
          <td width="108" height="108" align="center" valign="middle" background="<?php echo $siteUrl.'da/images/autumn/950/border100.gif';?>" style="background-repeat:no-repeat; background-color:#fff"><a href="<?php echo $items[3]->detail_url;?>" target="_blank" ><img src="<?php echo $items[3]->orig_img.'_100x100.jpg';?>"  border="0"/></a></td>
          
          <?php }else{?>
          			  <td width="108" height="108" align="center" valign="middle" background="<?php echo $siteUrl.'da/images/autumn/950/border100.gif';?>" style="background-repeat:no-repeat; background-color:#fff"><img src="<?php echo $siteUrl.'da/images/autumn/950/empty_100.gif';?>" /></td>
                      
               <?php }?>
          
          <?php if(isset($items[4])){?>
          <td width="108" height="108" align="center" valign="middle" background="<?php echo $siteUrl.'da/images/autumn/950/border100.gif';?>" style="background-repeat:no-repeat; background-color:#fff"><a href="<?php echo $items[4]->detail_url;?>" target="_blank" ><img src="<?php echo $items[4]->orig_img.'_100x100.jpg';?>"  border="0"/></a></td>
          
          <?php }else{?>
                       <td width="108" height="108" align="center" valign="middle" background="<?php echo $siteUrl.'da/images/autumn/950/border100.gif';?>" style="background-repeat:no-repeat;">
                       <img src="<?php echo $siteUrl.'da/images/autumn/950/empty_100.gif';?>" /></td>
             <td width="4">&nbsp;</td>
               <?php }?>
        </tr>
        <tr height="5"></tr>
      </table>
        </td>
        <?php }?>
    
    <td valign="bottom" >
    	<table width="90%" align="center" height="200" cellspacing="0">
          <tr>										
            <td height="30" style="padding-left:3px;"><img src="<?php echo $siteUrl;?>da/images/autumn/950/950_dapei.gif"  /></td>
          </tr>
          <tr>															
            <td height="30" style="font-size:20px; color:#1D1D1D "><strong>￥<?php echo XHtml::formatPrice($mealList->meal_price);?></strong></td>
          </tr>
          <tr>												
            <td height="28" style="padding-left:3px;"><img src="<?php echo $siteUrl;?>da/images/autumn/950/950_jiesheng.gif" /></td>
          </tr>
          <tr>														
            <td height="25" style="font-size:20px; color:#E01D1D"><strong>￥<?php echo XHtml::formatPrice($mealList->origi_price - $mealList->meal_price);?></strong></td>
          </tr>
          <tr>											
            <td height="25" style="font-size:12px; color:#ccc"><strong>(原价￥<?php echo XHtml::formatPrice($mealList->origi_price);?>)</strong></td>
          </tr>
          <tr>						
            <td height="52" valign="bottom"><a href="<?php echo $mealList->detail_url;?>"target="_blank" ><img src="<?php echo $siteUrl;?>da/images/autumn/btn_buy_big.gif" border="0"/></a></td>
          </tr>
        </table>
    </td>
  </tr>
  <tr height="66">
  </tr>
</table>
