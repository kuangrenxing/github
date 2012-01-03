<div style="height:600px;padding:10px 10px 30px" >
<div class="J_cbloading" style="display:none">
<span>同步中。。。</span>
</div>
<div class="J_context">
  <div class="mb10 " ><img src="/da/images/cbox_photo27.gif" width="108" height="18"></div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mb10">
    <tbody>
      <tr>
        <td width="29%"><input id="term" name="term" type="text" class="cbox_text mr10"></td>
        <td width="12%" align="center"><input type="button" value=" " id="search" class="btn_search mr5"></td>
        <td><input type="button" value=" " id="clear" class="btn_clear"></td>
       
		 <td><a href="javascript:newMeal();" class="J_new_meal"><img src="/da/v2/images/update.gif" width="76" height="22"></a></td>
		 <td><a href="javascript:syncMeal();" class="J_sync_meal"><img src="/da/v2/images/update.gif" width="76" height="22"></a></td>
      </tr>
  </tbody></table>
  <table id="J_result" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    </tbody>
  </table>
</div>

<script type="text/javascript" charset="utf-8">
function syncing(url, params, callback)
{var loading = $('.J_cbloading');
$.ajax(
{cache: false,url: url,type:'GET',data: params,dataType:'json',async:true,timeout:200000,
beforeSend:function(){ loading.show(); $('.J_context').hide();},
complete: function(){if(loading) loading.hide(); $('.J_context').show();},
error: function(){alert('错误!')},
success: function(data){
	callback && callback(data);
	}});}


function newMeal() {
   $('.J_cbloading').html('<div><a href="javascript:syncMeal();" class="J_sync_meal">重新加载</a></div').show();   
   $('.J_context').hide();
   window.open("http://mai.taobao.com/seller_admin-610-2.htm"); 
}

function syncMeal(){
	var itemcnt=$('#J_template_item_cnt').val();
    $('.J_sync_meal img').attr('src','/da/v2/images/updating.gif');

    syncing('/da/dapei/ajaxmeals',{"update":1}, function(data) {
        if(data.result){
			window.mealList=data.meallist;
			trace(window.mealList);

            $('.J_sync_meal img').attr('src','/da/v2/images/update.gif');
            $('#term').val('');

            if (itemcnt >= 2) 
            {
                var tmp_list = getMeal('', itemcnt);
                trace(tmp_list);
                var jlist = $('#J_result');
                renderList(jlist,tmp_list);
            }
        }
    });

    /*
    fetch('/da/dapei/ajaxmeals',{},function(data){
        if(data.result){
			window.mealList=data.meallist;
			trace(window.mealList);

            $('.J_sync_meal img').attr('src','/da/v2/images/update.gif');
            $('#term').val('');

            if (itemcnt >= 2) 
            {
                var tmp_list = getMeal('', itemcnt);
                trace(tmp_list);
                var jlist = $('#J_result');
                renderList(jlist,tmp_list);
            }
        }
    });
    $.get('/da/meal/load',function(data){
        if(data){
            getMeal('');
            $('.J_sync_meal img').attr('src','/da/v2/images/update.gif');
            alert('亲,套餐同步成功了!');
        }
    }).error(function(){
        $('.J_sync_meal img').attr('src','/da/v2/images/update.gif');
        alert('亲,同步失败了,请再试一次吧!'); 
    }); 
    */
}
/*
*/
</script>

</div>
