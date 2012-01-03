<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>
<div style="border:#CCC 1px solid; width:188px">

  <table width="100%" border="0" style="line-height:22px; text-align:center; font-size:12px;">
    <tr>
      <td>

        <table width="164px" align="center" border="0" style="text-align:left; margin-top:15px; margin-bottom:10px">
          <tr>
            <td width="57px"><img  src="<?php echo $siteUrl;?>da/images/tmall/photo750_01.gif" width="56" height="21" style="vertical-align:top;"></td>
            <td><strong style="font-size:20px;color:#FF7A00;">立减<?php echo $mealList->origi_price-$mealList->meal_price;?>元</strong></td>
          </tr>
          <tr>
            <td colspan="2"><strong>套餐价：</strong>
              <span style="color:#FE6521;font-size:14px;font-weight:bold;"><?php echo $mealList->meal_price;?></span>元</td>
          </tr>
          <tr>
            <td colspan="2">原价：
              <strong style="font-weight:normal;color:#999;text-decoration:line-through;padding:0 5px;"><?php echo $mealList->origi_price;?> </strong>元</td>
          </tr>

        </table>
        <table width="164" border="0" align="center" style="margin-bottom:10px">
          <tr>
            <td><a href="#"><img  src="<?php echo $siteUrl; ?>da/images/tmall/photo750_02.gif" width="150" height="38" border="0"></a></td>
          </tr>
        </table>


        <table width="164px" align="center" border="0" style="margin-bottom:10px">
          <tr>
            <td><img  src="<?php echo $siteUrl;?>da/images/tmall/photo750_03.gif" ></td>
            <td><img  src="<?php echo $siteUrl;?>da/images/tmall/photo750_04.gif" ></td>
            <td><img  src="<?php echo $siteUrl;?>da/images/tmall/photo750_05.gif"></td>
          </tr>
        </table>

      </td>
    </tr>
    <tr>
      <td>
        <?php $this->beginClip('item');?>
        <span style="display:inline-block; vertical-align:top; text-align:center; width:164px;">
          <span style="display: table-cell;vertical-align:middle;*display:block;*font:140.26315789474px/1 Arial;overflow:hidden; border:#CCC 1px solid; width:162px; height:162px;">
            <img src="{pic_url}" style="vertical-align:middle"></span>
          <span style="display:block;padding-top:8px; max-height:44px;overflow:hidden;"><a href="{detail_url}" style="text-decoration:none; color:#5c66cc; text-overflow: ellipsis; word-break: break-all;">{title}</a></span>
          <span style="color:#999; margin-bottom:10px; display:block; margin-bottom:10px">原价：{price}元</span></span>
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
                 echo '<span style="display:block; vertical-align:top; text-align:center; *display:inline;*zoom:1; margin-bottom:10px"><img src="'.$siteUrl.'da/images/icon_plus_s.gif"></span>';
             }
          }
         ?>
 

      </td>
    </tr>
  </table>
</div> 
<br />
