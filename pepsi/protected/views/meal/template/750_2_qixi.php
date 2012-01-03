<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>


<table id="__01" width="750" height="211" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td colspan="5" width="750" height="18" background="<?php echo $siteUrl;?>da/images/qixi/qixi750bg_top.gif" style="background-repeat:no-repeat; background-position:bottom"></td>
  </tr>
  <tr>
    <td rowspan="4" width="19" height="184" background="<?php echo $siteUrl;?>da/images/qixi/qixi750bg_left.gif" ></td>
    <td rowspan="4" width="183">
      <table border="0" cellpadding="0" cellspacing="0" background="<?php echo $items[0]->large_url;?>" style="background-position: center center;background-repeat: no-repeat;">
        <tr>
          <td width="183" height="184" background="<?php echo $siteUrl;?>da/images/qixi/qixi750bg_price.png" style="vertical-align:bottom;background-position: 9px 9px;background-repeat: no-repeat; text-align: center;">
              <a href="<?php echo $items[0]->detail_url;?>"  style="text-decoration:none; display:block; color:#fff; padding: 155px 0px 8px 138px;width:45px; text-decoration:none" title="<?php echo $items[0]->title;?>" target="_blank">
            <?php echo number_format($items[0]->price,0,'','');?>
            </a>
          </td>
        </tr>
      </table>           
    </td>
    <td rowspan="4" background="<?php echo $siteUrl;?>da/images/qixi/qixi_plus.gif" width="26" style="background-position: 4px 0px;"></td>
    <td rowspan="4" width="186">
      <table border="0" cellpadding="0" cellspacing="0" background="<?php echo $items[1]->large_url;?>" style="background-position: center center;background-repeat: no-repeat;">
        <tr>
          <td width="183" height="184" background="<?php echo $siteUrl;?>da/images/qixi/qixi750bg_price.png" style="vertical-align:bottom;background-position: 9px 9px;background-repeat: no-repeat; text-align: center;">
              <a href="<?php echo $items[1]->detail_url; ?>"  style="text-decoration:none; display:block; color:#fff; padding: 155px 0px 8px 138px;width:45px; text-decoration:none" title="<?php echo $items[1]->title;?>" target="_blank">
            <?php echo number_format($items[1]->price,0,'','');?>
            </a>
          </td>
        </tr>
      </table>  
    </td>
    <td background="<?php echo $siteUrl;?>da/images/qixi/qixi750_youhui.gif" width="336" height="48" style="background-position: 0px 9px;"></td>
  </tr>
  <tr>
    <td background="<?php echo $siteUrl;?>da/images/qixi/qixi750_buy.gif" width="336" height="58" style="vertical-align:top; background-repeat:no-repeat" >
        <a href="<?php echo $mealList->detail_url;?>"  target="_blank" style="text-decoration:none">
        	<span style="padding:0 170px 0 85px;color:#fff;font-size:30px; line-height:1.5;"><?php echo number_format($mealList->meal_price,0,'','');?></span>
      </a></td>
  </tr>
  <tr>
    <td background="<?php echo $siteUrl;?>da/images/qixi/qixi750bg_price.gif" width="336" height="42">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align:center;margin-top:10px;">
        <tr>
          <td width="45"></td>
          <td width="90"><span style="text-decoration: line-through;color:#5b5b5b;"><?php echo number_format($mealList->origi_price,0,'','');?></span></td>
          <td width="90"><span style="color:#ff6e9b;"><?php echo number_format($mealList->meal_price,0,'','') ;?></span></td>
          <td width="81"><span style="color:#4d7a9b;"><?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price);?></span></td>
          <td width="30"></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td background="<?php echo $siteUrl;?>da/images/qixi/qixi750bg_dada.gif" width="336" valign="bottom" height="36" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" background="<?php echo $siteUrl;?>da/images/qixi/qixi750bg_bottom.gif" width="750" height="18" style="background-repeat:no-repeat"></td>
  </tr>
</table> 
<br />
