<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>
<?php 
$itemCount = $mealList->itemCount;
$index = $itemCount - 1;
?>							
<table width="190" border="0" cellspacing="0" cellpadding="0" background="<?php echo $siteUrl;?>da/images/autumn/190/190_line_bg.gif" style="background-repeat:repeat-y; font-size:12px;font-family:Trebuchet MS;">
  <tr>			
    <td><img src="<?php echo $siteUrl;?>da/images/autumn/190/190_bg__top.gif"  /></td>
  </tr>
  <tr>
    <td>
        <table width="150" align="center" cellspacing="0">
        <tr>			
            <td width="48" ><img src="<?php echo $siteUrl;?>da/images/autumn/190/190_jiesheng.gif" /></td>						
            <td width="112" height="20"><strong style="font-size:16px; color:#E01D1D;">￥<?php echo XHtml::formatPrice(($mealList->origi_price) - ($mealList->meal_price));?></strong></td>
          </tr>
          <tr>									
            <td width="68"><img src="<?php echo $siteUrl;?>da/images/autumn/190/190_dapei.gif" /></td>
            											
            <td width="92" height="20" ><strong style="font-size:16px">￥<?php echo XHtml::formatPrice($mealList->meal_price);?></strong></td>
          </tr>
          
          <tr>											
            <td height="18" colspan="2"><strong style="color:#ccc">(原价 ￥<?php echo XHtml::formatPrice($mealList->origi_price);?>)</strong></td>
          </tr>
          <tr>									
            <td colspan="2" height="53"><a href='<?php echo $mealList->detail_url;?>' target="_blank"><img src="<?php echo $siteUrl;?>da/images/autumn/btn_buy_small.gif" border="0"/></a></td>
          </tr>
        </table>
    </td>
  </tr>
  <tr>
    <td>
  
  
  <table width="166" align="center" cellspacing="0">
          <tr>
            <td width="166" height="166" background="<?php echo $siteUrl;?>da/images/autumn/190/190_border_v2.gif" style="background-repeat:no-repeat; background-position:left top;" >
            															
                <table width="160" height="166" align="center" cellspacing="0" cellpadding="0" border="0">
                <tr height="3"></tr>
                  <tr>
                    <td width="160" height="160" align="center" valign="middle">
                    <a href="<?php echo $items[$index]->detail_url;?>" target="_blank"><img src="<?php echo $items[$index]->orig_img.'_160x160.jpg'?>"  border="0"/></a>	
                    </td>
                  </tr>
                  <tr height="3"></tr>
                </table>
            </td>
          </tr>
          <?php
          for($index = $itemCount - 2; $index >= 0; $index--)
          {
          	?>
          <tr>
            <td align="center" ><img src="<?php echo $siteUrl; ?>da/images/autumn/190/190_ico_plus.gif" /></td>
          </tr>
          <tr>										
            <td width="166" height="166" background="<?php echo $siteUrl;?>da/images/autumn/190/190_border_v2.gif" style="background-repeat:no-repeat; background-position:left top;">
            														
                <table width="160" height="166"  align="center" cellspacing="0" cellpadding="0" border="0">
                <tr height="3"></tr>
                  <tr>
                    <td width="160" height="160" align="center" valign="middle">
                    	<a href="<?php echo $items[$index]->detail_url;?>" target="_blank"><img src="<?php echo $items[$index]->orig_img.'_160x160.jpg'?>" border="0" /> 
              </a>
                    </td>
                  </tr>
                  <tr height="3"></tr>
                </table>
            </td>
          </tr>	
          	<?php 
          }
          ?>
          <!-- item stops -->
          
        </table>
    </td>
  </tr>
  <tr>		
    <td><img src="<?php echo $siteUrl;?>da/images/autumn/190/190_bg_bottom.gif" /></td>
  </tr>
</table>
