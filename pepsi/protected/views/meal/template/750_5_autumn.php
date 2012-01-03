<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];
$itemCount = $mealList->itemCount;
?>

<table width="750" align="center" height="265" border="0" cellspacing="0" cellpadding="0" background="<?php echo $siteUrl;?>da/images/autumn/750/750_bg_v2.gif" style="background-repeat:no-repeat; font-size:12px; font-family:Trebuchet MS;">
  <tr>
    <td width="249" height="45">&nbsp;</td>
    <td width="160">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td height="170">&nbsp;</td>        
    <td align="center" valign="middle">
    	<table width="160" align="center" height="170" border="0" cellspacing="0" cellpadding="0">
          <tr height="5"></tr>
          <tr>
            <td align="center" valign="middle"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_160x160.jpg'?>" border="0" /></a></td>
          </tr>
          <tr height="5"></tr>
        </table>
    </td>
    <td width="23">&nbsp;</td>
    
   
    <?php 
    if($itemCount == 2){
        
    ?> 
    <td valign="middle" align="center" ><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $items[1]->orig_img.'_160x160.jpg'?>" border="0"/></a></td>                                                

    <?php 
                }else{
    ?>
    <td width="170">
        <table width="168" height="170"  border="0" cellspacing="0" cellpadding="0" style="background-color:#1d1d1d">
            <tr height="1"></tr>
            <!-- 第一行 -->
            <tr>
              <td width="84" height="84" valign="middle" align="center" background="<?php echo $siteUrl.'da/images/autumn/750/border80.gif';?>" style="background-color:#FFF; background-repeat:no-repeat"><a href="<?php echo $items[1]->detail_url;?>" target="_blank" ><img src="<?php echo $items[1]->orig_img.'_80x80.jpg'?>" border="0"/></a></td>                  
              
              
              <!-- another column -->
              
              <td width="84" height="84" valign="middle" align="center" background="<?php echo $siteUrl.'da/images/autumn/750/border80.gif';?>" style="background-color:#FFF; background-repeat:no-repeat"><a href="<?php echo $items[2]->detail_url;?>" target="_blank" ><img src="<?php echo $items[2]->orig_img.'_80x80.jpg'?>" border="0"/></a></td>
              
            </tr>
            
            <!-- end -->

            
            <!-- 第二行 -->
            <tr>
            
            <?php if(isset($items[3])){?>
              <td width="84" height="84" valign="middle" align="center" background="<?php echo $siteUrl.'da/images/autumn/750/border80.gif';?>" style="background-color:#FFF; background-repeat:no-repeat"><a href="<?php echo $items[3]->detail_url;?>" target="_blank" ><img src="<?php echo $items[3]->orig_img.'_80x80.jpg'?>" border="0"/></a></td>
              
              <?php }else{?>
              			 <td width="85" height="84" valign="middle" align="center" background="<?php echo $siteUrl.'da/images/autumn/750/border80.gif';?>" style="background-color:#FFF; background-repeat:no-repeat"><img src="<?php echo $siteUrl.'da/images/autumn/750/empty_80.gif'?>" border="0"/></td>

                   <?php }?>
              

              
              <?php if(isset($items[4])){?>
              <td width="84" height="84" valign="middle" align="center" background="<?php echo $siteUrl.'da/images/autumn/750/border80.gif';?>" style="background-color:#FFF; background-repeat:no-repeat"><a href="<?php echo $items[4]->detail_url;?>" target="_blank" ><img src="<?php echo $items[4]->orig_img.'_80x80.jpg'?>" border="0"/></a></td>
              
              <?php }else{?>
                          <td width="84" height="84" valign="middle" align="center" background="<?php echo $siteUrl.'da/images/autumn/750/border80.gif';?>" style="background-color:#FFF; background-repeat:no-repeat"><img src="<?php echo $siteUrl.'da/images/autumn/750/empty_80.gif'?>" border="0"/></td>
                   <?php }?>
              
            </tr>
            <!-- 第二行结束 -->
            <tr height="1"></tr>
            </table>
            </td>
            <?php }?>
            
    <td width="148">
      <table width="86%" height="150" align="center" border="0" cellspacing="0" cellpadding="0">
      <tr>                                      
        <td height="25" style="padding-left:3px;"><img src="<?php echo $siteUrl;?>da/images/autumn/750/750_dapei.gif" /></td>
      </tr>
      <tr>                                                  
        <td height="22"  style="font-size:16px; color:#1D1D1D "><strong>￥<?php echo XHtml::formatPrice($mealList->meal_price);?></strong></td>
      </tr>
      <tr>                                          
        <td height="25"  style="padding-left:3px;"><img src="<?php echo $siteUrl;?>da/images/autumn/750/750_jiesheng.gif"/></td>
      </tr>
      <tr>                                                      
        <td height="22"  style="font-size:16px; color:#E01D1D"><strong>￥<?php echo XHtml::formatPrice($mealList->origi_price - $mealList->meal_price);?></strong></td>
      </tr>
      <tr>                                                      
        <td height="22" style="font-size:12px; color:#ccc"><strong>(原价￥<?php echo XHtml::formatPrice($mealList->origi_price);?>)</strong></td>
      </tr>
      <tr>                              
        <td height="34"  valign="bottom"><a href="<?php echo $mealList->detail_url;?>" target="_blank" ><img src="<?php echo $siteUrl;?>da/images/autumn/btn_buy_small.gif" border="0"/></a></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr height="56">
  </tr>
</table>

