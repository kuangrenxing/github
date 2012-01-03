<?php $this->beginClip('Template')?>

   <?php include($view_name); ?>  

<?php $this->endClip()?>

<?php

$this->renderClip('Template',array(
            '{preview_image}' => '/tpls/'.$template->group_slug.'/preview.jpg'
            ,'{tag_image}'     => '/tpls/'.$template->group_slug.'/tag.jpg'
            ,'{id}'            => $template->id
            //,'{curr}'          => ($template->id==$templateId)?'curr':''
            ,'{item_count}'    => isset($meal) ? $meal['meal_id'] : 0 
            ,'{width}'         => $template->width
            ,'{height}'        => $template->height
            ,'{img_width}'     => $template->width*0.62
            ,'{img_height}'    => $template->height*0.62
            ,'{meal_url}' => isset($meal) ? 'http://item.taobao.com/mealDetail.htm?meal_id=' . $meal['meal_id'] : null
            ,'{meal_price}' => isset($meal) ? $meal['meal_price'] : null
            ,'{meal_orig_price}' => isset($meal) ? 'http://item.taobao.com/mealDetail.htm?meal_id=' . $meal['meal_id'] : null
            ,'{meal_save_zhe}' => isset($meal) ? 'http://item.taobao.com/mealDetail.htm?meal_id=' . $meal['meal_id'] : null
            ,'{meal_save_100}' => isset($meal) ? 'http://item.taobao.com/mealDetail.htm?meal_id=' . $meal['meal_id'] : null
            ,'{meal_save_money}' => isset($meal) ? 'http://item.taobao.com/mealDetail.htm?meal_id=' . $meal['meal_id'] : null


            ,'{item_1_url}'    => isset($meal) && isset($meal['itemCart']['0']) ? 'http://item.taobao.com/item.htm?id=' . $meal['itemCart']['0']['num_iid'] : null  
            ,'{item_1_title}'    => isset($meal) && isset($meal['itemCart']['0']) ? $meal['itemCart']['0']['title'] : null  
            ,'{item_1_price}'    => isset($meal) && isset($meal['itemCart']['0']) ? $meal['itemCart']['0']['price'] : null  
            ,'{item_1_310_pic}'    => isset($meal) && isset($meal['itemCart']['0']) ? preg_replace("/\\\/",'',$meal['itemCart']['0']['pic_url']) . '_310x310.jpg' : null  
            ,'{item_1_220_pic}'    => isset($meal) && isset($meal['itemCart']['0']) ? preg_replace("/\\\/",'',$meal['itemCart']['0']['pic_url']) . '_220x220.jpg' : null  

            ,'{item_2_url}'    => isset($meal) && isset($meal['itemCart']['1']) ? 'http://item.taobao.com/item.htm?id=' . $meal['itemCart']['1']['num_iid'] : null  
            ,'{item_2_title}'    => isset($meal) && isset($meal['itemCart']['1']) ? $meal['itemCart']['1']['title'] : null  
            ,'{item_2_price}'    => isset($meal) && isset($meal['itemCart']['1']) ? $meal['itemCart']['1']['price'] : null  
            ,'{item_2_310_pic}'    => isset($meal) && isset($meal['itemCart']['1']) ? preg_replace("/\\\/",'',$meal['itemCart']['1']['pic_url']) . '_310x310.jpg' : null  
            ,'{item_2_220_pic}'    => isset($meal) && isset($meal['itemCart']['1']) ? preg_replace("/\\\/",'',$meal['itemCart']['1']['pic_url']) . '_220x220.jpg' : null  

            /*
            ,'{gravity}'       => ($template->width>190)?((($key+1)%5==0)?'e':'s'):'e'
            ,'{user_count}'    => $template->user_count
            ,'{like_count}'    => $template->like_count
            */
        ));
?>



