<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>
<table width="740" align="center" height="175" border="0" cellspacing="0" cellpadding="0" background="<?php echo $siteUrl;?>da/images/color/bg.gif" style="font-size:12px; background-repeat:no-repeat;">
  <tbody>
  <tr height="23"></tr>
    <tr>
      <td width="18">&nbsp;</td>

      <?php $this->beginClip('item');?>
      <td width="106" height="132" valign="top" bgcolor="#FFFFFF">
        <table width="106" align="center" height="106" border="0" cellspacing="0" cellpadding="0" background="{pic_url}" style="background-position:center center; background-repeat:no-repeat">
          <tbody><tr>
              <td align="right" valign="top" width="106" height="106" background="<?php echo $siteUrl;?>da/images/color/border.gif" style="background-position:center center; background-repeat:no-repeat;">
             {price}
              </td>
            </tr> 
        </tbody></table>
        <span style="width:106px; text-align:center; height:20px; display:block; overflow:hidden; white-space:nowrap; text-overflow: ellipsis; margin:0 auto; padding-top:6px "><a href="#" style="text-decoration:none; color:#555">{title}</a></span>
      </td>
      <?php $this->endClip();?>
      <?php
        for($i=0;$i<5;$i++)
        {
        $this->renderClip('item',array(
        '{pic_url}'     =>isset($items[$i]) ? $items[$i]->small_url:$siteUrl.'da/images/empty_100.jpg',
        '{title}'       =>isset($items[$i]) ? $items[$i]->title:'&nbsp;',
        '{price}'       =>isset($items[$i]) ? '<a href="'.(isset($items[$i]) ? $items[$i]->detail_url:'#none').'" target="_blank" style="text-decoration:none; color:#000; display:block; width:106px; height:1px; padding:82px 0 5px 0; "><span style="background-color:#93ccde; color:#FFF;display:block ; width:45px;  text-align:center; "> ￥'.XHtml::formatPrice($items[$i]->price).' </span></a>':'',
        '{detail_url}'  =>isset($items[$i]) ? $items[$i]->detail_url:'#none',
        ));
        if($i < 4)
        {
            echo '<td width="13">&nbsp;</td>';
        }
        }?>      
      <td width="20">&nbsp;</td>
      <td width="120" align="center" valign="middle">
        <table width="100%" height="130" border="0" cellspacing="0" cellpadding="0" align="center" style="text-align:center;">
          <tbody>
            <tr>
              <td><font style="color:#93ccde; font-size:22px;"><strong>套餐价</strong></font> </td>
            </tr>
            <tr>
              <td><font style="color:#93ccde; font-size:22px;"><strong>￥<?php echo XHtml::formatPrice($mealList->meal_price)?> </strong></font></td> 
            </tr>
            <tr>
              <td align="left" style="padding-left:18px;"><font style="color:#ccc;"><strong>节省：</strong></font><font style="color:#93ccde"><strong>￥<?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price);?></strong></font></td>
            </tr>
            <tr>
              <td align="left"  style="padding-left:18px;"><font style="color:#ccc; text-decoration:line-through"><strong>原价：￥<?php echo XHtml::formatPrice($mealList->origi_price);?></strong></font></td>
            </tr>
            <tr>
              <td height="40" valign="bottom"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/color/btn_blue_v1.gif" border="0"></a></td>
            </tr>
        </tbody></table>
      </td>
    </tr>
  <tr height="20"></tr>
</tbody></table>
<br />
