var requestIndex=0;
/*
function getMeal(term)
{
  $.ajax({
    //url:'/da/meal/ajaxMeal',
    url:'/da/dapei/ajaxMeals',
    data:{'term':term},
    type:'GET',
    dataType:"json",
    searchRequest:++requestIndex,
    success:function(data,status){
		$.each(data.meal_list.meal,function(idx, item) 
		{
			console.log(idx + item);
			
		});
		return;
	
      $('.loading').hide();
      if(this.searchRequest===requestIndex){
        response(data.html);
      }
    },
    beforeSend:function(){
      $('.loading').show();
    }
  });
}
*/

function meal_sort(a, b)
{
    return b.meal_id - a.meal_id;    
}

function getMeal(q, item_cnt)
{
	if (window.mealList == undefined)
		return;
		
	var list = new Array();
	$.each(mealList.meal_list.meal, function(idx, meal){
		if (item_cnt != 0)
		{
			if (meal.itemCart.length == item_cnt)
				list.push(meal);
		}
	});
	
	
	var r_list = new Array();
	$.each(list, function(idx, meal){
		if ( (q != '') && (meal.meal_name.indexOf(q) >= 0) )
        {
			r_list.push(meal);
        }
		else if (q == '')
			r_list.push(meal);
			
		/**/
	});

    r_list.sort(meal_sort);

    trace(r_list);
	return r_list;
}



function renderList( list, mealList ) { 
    list.html('');
    $('<tr class="cbox_tit"><td width="60" align="center">套餐列表</td><td>&nbsp;</td><td>包邮</td><td width="50">宝贝数</td><td width="80" align="center">操作</td></tr>').appendTo(list);
    if (mealList.length) 
    $.each(mealList,function(index,meal){
        //var itemList = $.parseJSON(meal.item_list.replace(/\'/g,'"')).item_list
          //, itemCount = itemList.length
        var itemCount = meal.itemCart.length
        ;
      $( '<tr class="bgline"></tr>' )
      .append('<td align="center"><a href="http://item.taobao.com/mealDetail.htm?meal_id='+meal.meal_id+'"             target="_blank"><img height=40 width=40 src="'+meal.itemCart[0].pic_url+'_40x40.jpg"/></a></td>')
      .append('<td><p><a href="http://item.taobao.com/mealDetail.htm?meal_id='+meal.meal_id+'"  target="_blank">'+meal.meal_name+'</a></p><p class="colf60"><strong>套餐价：'+meal.meal_price/100+'</strong></p></td>')
      .append('<td align="center">'+((meal.postage_id>0)?'否':'是')+'</td>')
      .append('<td align="center">'+itemCount+'</td>')
      .append('<td align="center"><a href="#" class="J_select_meal"><img src="/da/images/cbox_btn13.gif" /></a></td>')    .attr('id',meal.meal_id)
      .attr('data-item-count',itemCount)
      .appendTo( list );
    });   
    else
        $( '<tr class="bgline"></tr>' ).append('<td align="center"><a href="">新增套餐</a></td>').appendTo(list);

  };

function response(item)
{
   ul=$('#J_result');
   ul.empty();
   //renderItems(ul,item);
   ul.append(item);
   //var h = item;
   //$( item ).appendTo(ul);
}

function fetch(url, params, callback)
{var loading = $('<div class="loading_l" style="position:fixed;width:100%;height:100%;"><div class="mask"></div><div class="text"><i>加载中，请稍候…</i></div>');
$.ajax({cache: false,url: url,type: 'GET',data: params,dataType: 'json',async:true,timeout: 200000,
beforeSend:
function(){ 
    if ($('.w1030').val() !== undefined )
    loading.insertBefore($('.w1030')).show();
    else
    loading.insertBefore($('.w950')).show();

},
complete: function(){if(loading) loading.remove();},error: function(){alert('错误!')},
success: function(data){
	callback && callback(data);
	
	}});}

function getonemeal(id) {
	if (window.mealList == undefined)
        return null;
 
    var result = null;
	$.each(mealList.meal_list.meal, function(idx, meal){
        if (meal.meal_id.toString() == id) {
            result = meal;
            return result;
        }
    });

    return result;
}

function renderItems( ul, items ) {
  $('<tr class="cbox_tit"><td width="60" align="center">套餐列表</td><td>包邮</td><td width="50">宝贝数</td><td width="80" align="center">操作</td></tr>').appendTo(ul);
  $.each(items,function(idex,item){
    $( '<tr class="bgline"></tr>' )
    .append( '<td align="center"><a href="http://item.taobao.com/mealDetail.htm?meal_id='+item.value+'" target="_blank"><img height=40 width=40 src="'+item.items[0].pic_url+'"/></a></td>')
    .append('<td><p><a href="http://item.taobao.com/mealDetail.htm?meal_id='+item.value+'"  target="_blank">'+item.label+'</a></p><p class="colf60"><strong>套餐价：'+item.price+'</strong></p></td>')
    .append('<td align="center">'+item.items.length+'</td>')
    .append('<td align="center"><a href="#" class="J_select_meal"><img src="/da/images/cbox_btn13.gif" /></a></td>')
    .attr('id',item.value)
    .attr('data-item-count',item.items.length)
    .appendTo( ul );
  });
};
