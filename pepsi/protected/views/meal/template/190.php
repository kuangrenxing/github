<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>
<div style="border:#CCC 1px solid; width:188px; background:#fff; margin: 0 auto;">
  <table width="100%" border="0" style="line-height:22px; text-align:center; font-size:12px;">
    <tbody>
    <tr>
      <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:15px; margin-bottom:8px">
          <tbody><tr>
            <td width="36%" style="padding-left:12px"><img  src="<?php echo $siteUrl;?>da/images/shop/photo750_01.gif" width="56" height="21" style="vertical-align:top;"></td>
            <td width="64%"><strong style="font-size:20px;color:#FF7A00;">立减<?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price);?>元</strong></td>
          </tr>
        </tbody></table>
        <table width="164px" align="center" border="0" style="text-align:left; margin-bottom:10px; ">
          <tbody><tr>
            <td colspan="2"><strong>套餐价：</strong>
              <span style="color:#FE6521;font-size:14px;font-weight:bold;"><?php echo $mealList->meal_price;?></span> 元</td>
          </tr>
          <tr>
            <td colspan="2">原价：
              <strong style="font-weight:normal;color:#999;text-decoration:line-through;padding:0 5px 0 0;"><?php echo $mealList->origi_price;?> </strong>元</td>
          </tr>

        </tbody></table>
        <table width="164" border="0" align="center" style="margin-bottom:10px">
          <tbody><tr>
            <td><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img  src="<?php echo $siteUrl; ?>da/images/shop/photo750_02.gif" width="150" height="38" border="0"></a></td>
          </tr>
        </tbody></table>


        <table width="164px" align="center" border="0" style="margin-bottom:10px">
          <tbody><tr>
            <td><img  src="<?php echo $siteUrl;?>da/images/shop/photo750_03.gif" ></td>
            <td><img  src="<?php echo $siteUrl;?>da/images/shop/photo750_04.gif" ></td>
            <td><img  src="<?php echo $siteUrl;?>da/images/shop/photo750_05.gif"></td>
          </tr>
          </tbody>
        </table>

      </td>

    </tr>
    <tr>
      <td>
        <?php $this->beginClip('item');?>
        <span style="display:inline-block; vertical-align:top; text-align:center; width:164px;">
          <span style="display: table-cell;vertical-align:middle;*display:block;*font:140.26315789474px/1 Arial;overflow:hidden; border:#CCC 1px solid; width:162px; height:162px;">
          <a href="{detail_url}" target="_blank"><img src="{pic_url}" style="vertical-align:middle"></a></span>
          <span style="color:#f60; padding-top:8px; display:block;"><strong>￥{price}</strong></span></span>
          <span style="display:block;max-height:44px;margin-bottom:10px; overflow:hidden;"><a href="{detail_url}" style="text-decoration:none; color:#5c66cc; text-overflow: ellipsis; word-break: break-all;">{title}</a></span>
        <?php $this->endClip();?>
        
        <?php
        foreach($items as $key=>$item)
        {
        $this->renderClip('item',array(
        '{pic_url}' => $item->large_url,
        '{title}'   => $item->title,
        '{price}'   => $item->price,
        '{detail_url}'   => $item->detail_url,
        ));
        if($key<(count($items)-1))
        {
        echo '<span style="display:block; vertical-align:top; text-align:center;margin-bottom:10px"><img src="'.$siteUrl.'da/images/icon_plus_s.gif"></span>';
        }
        }
        ?>


      </td>
    </tr>
    </tbody>
  </table>
</div> 
<br />
