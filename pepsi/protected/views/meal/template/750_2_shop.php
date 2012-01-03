<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>


<table width="748" border="0" cellspacing="0" cellpadding="0" align="center" style="border:1px solid #CDCDCD; margin:0 auto; font-size:12px; line-height: 1.5" bgcolor="#FFFFFF">
      <tr valign="top">
        <td height="30" colspan="7" >&nbsp;</td>
      </tr>
      <tr valign="top">
        <td width="35" nowrap="nowrap" ></td>
        <td width="160" >
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" height="200" >
              <tr>
                <td valign="top" style="line-height:21px"><img src="<?php echo $siteUrl;?>da/images/shop/hot_v2.gif"  align="top" >
                </td>
              </tr>
              <tr>
                <td><strong>套餐价：</strong><span style="color:#fe6521;font-size:14.0px;font-weight:bold; padding-right:5.0px"><?php echo $mealList->meal_price;?></span>元</td>
              </tr>
              <tr>
                <td>原价：<b style="font-weight:normal;color:#999999;text-decoration:line-through;padding:0 5PX 5.0px 0;"><?php echo $mealList->origi_price;?></b>元</td>
              </tr>
              <tr>
                <td><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img border="0" height="38" src="<?php echo $siteUrl;?>da/images/shop/photo750_02.gif" width="150"></a></td>
              </tr>
              <tr>
                <td><img  src="<?php echo $siteUrl;?>da/images/shop/photo750_03.gif" style="padding-right:3.0px;" ><img  src="<?php echo $siteUrl;?>da/images/shop/photo750_04.gif" style="padding-right:3.0px;" ><img  src="<?php echo $siteUrl;?>da/images/shop/photo750_05.gif"></td>
              </tr>
              <tr>
              	<td>&nbsp;</td>
              </tr>
            </table>
        </td>
        <td>
        	<table border="0" cellpadding="0" cellspacing="0" style="margin-top:35px; margin-left:10px">
            <tbody>
            <tr>
              <td width="86" height="86" align="center" valign="middle" background="<?php echo $siteUrl;?>da/images/tag.gif">
                <span style="font-size:14.0px;color:#ffffff">
                  <strong>立省<br /><?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price);?>元</strong></span>
              </td>
            </tr>
            </tbody>
          </table>
        </td>
        <td width="160" align="center">
        	<table width="160" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
              <td width="160" height="160" align="center" valign="middle" style="border:1.0px solid #CCC">
                  <a href="<?php echo $items[0]->detail_url;?>" target= "_blank"><img src="<?php echo $items[0]->large_url;?>" style="vertical-align:middle" border="0" ></a>
              </td>
            </tr>
            </tbody>
          </table>
          <span style="width:160px;height:36px;overflow:hidden;display:block; "><a style="text-decoration:none;color:#5c66cc;" href="<?php echo $items[0]->detail_url;?>" target="_blank"><?php echo $items[0]->title;?></a></span><span>原价：<?php echo $items[0]->price;?>元</span>
        </td>
        <td width="80" align="center" style="padding-top:65px">
        	<img src="<?php echo $siteUrl;?>da/images/icon_plus_b.gif">
        </td>
        <td width="160" align="center" >
        	<table width="160" cellpadding="0" cellspacing="0" >
            <tbody>
            <tr>
              <td width="160" height="160" align="center" valign="middle" style="border:1.0px solid #CCC">
                  <a href="<?php echo $items[1]->detail_url;?>" target= "_blank"><img src="<?php echo $items[1]->large_url;?>" style="vertical-align:middle" border="0" ></a>
              </td>
            </tr>
            </tbody>
          </table>
          <span style="width:160px;height:36px;overflow:hidden;display:block; "><a style="text-decoration:none;color:#5c66cc;" href="<?php echo $items[1]->detail_url;?>" target="_blank"><?php echo $items[1]->title;?></a></span>
          <span>原价：<?php echo $items[1]->price;?>元</span>
        	
        </td>
        <td width="35" nowrap="nowrap"></td>
      </tr>
     
      <tr valign="top">
        <td height="20" colspan="7" >&nbsp;</td>
      </tr>
    </table>

<br />
