<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>

<table id="__01" width="375" height="400" border="0" cellpadding="0" cellspacing="0" style="margin:0; float:left" bgcolor="#FFFFFF">
  <tr>
    <td colspan="5" valign="bottom">
      <img src="<?php echo $siteUrl;?>da/images/qixi/qixi_youhui.gif" width="375" height="57" alt=""></td>
  </tr>
  <tr>
    <td height="56" colspan="5" valign="top"  background="<?php echo $siteUrl;?>da/images/qixi/qixi_buy.gif" style="background-repeat:no-repeat">
        <a href="<?php echo $mealList->detail_url;?>" style="display:block;height:50px; text-decoration:none;" target="_blank">
      <span style="font-size:30px; color:#FFF; padding-left:223px; display:block; line-height:1.5;"><?php echo number_format($mealList->meal_price,0,'','');?></span></a></td>
  </tr>
  <tr>
    <td height="60" colspan="5" background="<?php echo $siteUrl;?>da/images/qixi/qixibg_price.gif" style="background-position:top; background-repeat:no-repeat">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align:center;margin-top:10px;">
        <tr>
          <td width="35"></td>
          <td width="90"><span style="text-decoration: line-through;color:#5b5b5b;">￥<?php echo number_format($mealList->origi_price,0,'','');?></span></td>
          <td width="90"><span style="color:#ff6e9b;">￥<?php echo number_format($mealList->meal_price,0,'','');?></span></td>
          <td width="80"><span style="color:#4d7a9b;">￥<?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price);?></span></td>
          <td width="80"></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td background="<?php echo $siteUrl;?>da/images/qixi/qixibg_left.gif"  width="22" style="background-repeat:repeat-y">&nbsp;
    </td>
    <td width="166" height="195">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" background="<?php echo $items[0]->large_url;?>" style="background-position:center center; background-repeat:no-repeat">
        <tr>
          <td width="166" height="197" align="center" valign="top" background="<?php echo $siteUrl;?>da/images/qixi/qixibg_price.png" style=" background-position:top center; background-repeat:no-repeat">
              <a href="<?php echo $items[0]->detail_url;?>" style="display:block; height:175px; text-decoration:none;" title="<?php echo $items[0]->title;?>" target="_blank">
              <span style="color:#FFF; font-size:14px; margin-top:18px; display:block"><?php echo number_format($items[0]->price,0,'','');?></span>
              </a>
          </td>
        </tr>
      </table>

    </td>
    <td>
      <img src="<?php echo $siteUrl;?>da/images/qixi/qixibg_middle.gif" width="7" height="183" alt=""></td>
    <td width="166">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" background="<?php echo $items[1]->large_url;?>" style="background-position:center center; background-repeat:no-repeat">
        <tr>
          <td width="166" height="197"  align="center" valign="top" background="<?php echo $siteUrl;?>da/images/qixi/qixibg_price.png" style=" background-position:top center; background-repeat:no-repeat" >
              <a href="<?php echo $items[1]->detail_url;?>" style="display:block; height:175px; text-decoration:none;" title="<?php echo $items[1]->title;?>" target="_blank">
              <span style="color:#FFF; font-size:14px; margin-top:18px; display:block"><?php echo number_format($items[1]->price,0,'','');?></span>
              </a>
          </td>
        </tr>
      </table>	
    </td>
    <td background="<?php echo $siteUrl;?>da/images/qixi/qixibg_right.gif" style="background-repeat:repeat-y"width="14" >&nbsp;
    </td>
  </tr>
  <tr>
    <td width="375" height="24" colspan="5" align="right" valign="top" background="<?php echo $siteUrl;?>da/images/qixi/qixibg_bottom.gif" style="background-position: 0px -10px; background-repeat:no-repeat">&nbsp;</td>
  </tr>
</table>


<br />
