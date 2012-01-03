if (!Publish) var Publish = {};

Publish.itemCart = [];
Publish.categoryCart = [];
Publish.options  = {};
 
Publish.init = function(){
  var self = this;
  self.loadItems();
  $('.J_goto_page li a').live('click',function(){
    var link=this;
    self.gotoPage.call(self,link,self.options);
    return false;
  });

  $(".J_checkbox_all").live('click',self.checkAll);
  $('body').delegate("input[name='selected_num_iid']","change", function(){
    var item = this;
    self.updateItem.call(self,item);
  });
  $('img.removeItem').live('click',function(){
    var item = $(this).parents('li');
    self.removeItem.call(self,item); 
  });
  $(".J_item_search").live('click',function(){
    self.search.call(self); 
  });
  $(".J_seller_cids").live('change',function(){
    self.search.call(self); 
  });
  $(".J_order_by").live('change',function(){
    self.search.call(self); 
  });
  $(".J_select_position").live('change',function(){
    self.updatePosition.call(self,this); 
  });
  $(".J_submit_item").live('click',function(){
	if ($('.J_dapei_id').val() != undefined)
		self.createJob.call(self,this);
	else
    	self.submitItem.call(self,this); 
  });
  $(".J_delete_html").live('click',function(){
    self.delete_html.call(self,this); 
  });
  $(".J_submit_category").live('click',function(){
	if ($('.J_dapei_id').val() != undefined)
   		self.submitJobCategory.call(self,this);
	else
		self.submitCategory.call(self,this); 	
  });
  $(".J_rollback").live('click',function(){
    self.rollback.call(self,this); 
  });
  $(".J_select_all_position").live('change',function(){
    self.updateAllPosition.call(self,this); 
  });  
};

Publish.updateAllPosition = function(item){
  var self=this
    , position=$(item).val()
    ;
  $('.J_select_position[value='+position+']').attr('checked','checked').trigger('change');
}

Publish.updatePosition = function(item){
  var self=this
    , $item=$(item)
    , id=$item.attr('data-id')
    , position=$item.val()
    ;
  self.itemCart = _.map(self.itemCart,function(item) {
    return  (item.id==id)?{id:id,position:position,title:item.title}:item;
  });
}

Publish.updateCategoryCount = function(){
  var self=this;
  $('#J_category_count').html(self.categoryCart.length);
  self.itemCountByCategory(function(err,data){
    $('#J_item_count').html(data.count);
  });
}

Publish.updateCategory = function(flag,node){
  var self=this;
  if(flag){
    self.addCategory(node,function(){
      self.updateCategoryCount();
    });
  }else{
    self.removeCategory(node,function(){
      self.updateCategoryCount();
    });
  }
}

Publish.addCategory = function (node,cb) {
  var self=this;
  _.forEach(node.childList,function(e){
    self.categoryCart.push(e.data.key);
  });
  self.categoryCart.push(node.data.key);
  self.categoryCart = _.uniq(self.categoryCart);
  cb && cb();
}

Publish.removeCategory = function (node,cb) {
  var self=this;
  _.forEach(node.childList,function(e){
    self.categoryCart = _.filter(self.categoryCart, function(category){ return  (category !== e.data.key); });
  });
  self.categoryCart = _.filter(self.categoryCart, function(category){ return  (category !== node.parent.data.key)&&(category !== node.data.key); });
  cb && cb();
}

Publish.updateItem = function(item){
  var self=this;
  if(item.checked){
    self.addItem(item);
  }else{
    self.removeItem(item);
  }
};

Publish.addItem = function(item){
  var self = this
    , $item = jQuery(item)
    , id = $item.val()
    , title = $item.attr('data-title')
    , position = $("input[name=position"+id+"]:checked").val()
    ;

  var itemHtml = '<li id="cart_item_'+id+'" data-id="'+id+'"><span class="dtcvm40"><img title="'+title+'" src="'+$item.attr('data-pic')+'" class="vam"></span><a href="#none" class="pngfix"><img class="removeItem" src="/da/v2/images/publish_x.png" width="17" height="18"></a></li>';
  jQuery(itemHtml).appendTo('.itemCart ul');
  self.updateSelectedCount('add');
  self.itemCart.push({id:id,position:position,title:title});
};

Publish.removeItem = function(item){
  var self=this;

  if(typeof item.checked !=='undefined'){
    var itemId = jQuery(item).val();
    jQuery('#cart_item_'+itemId).remove();
  }else{
    var itemId = jQuery(item).attr('data-id');
    jQuery(item).remove();
    jQuery('#checkbox_item_'+itemId).attr('checked',false);
  }
  self.updateSelectedCount('remove');
  self.itemCart = _.filter(self.itemCart, function(item){ return  item.id !== itemId ; });
  $(".J_checkbox_all").each(function(index,e){e.checked=false;}); 
};

Publish.updateSelectedCount = function(operate) {
  $('.itemSelectedCount').html(parseInt($('.itemSelectedCount').html())+(operate==='add'?1:-1));
}

Publish.loadItems = function(options,cb){
  var self = this;
  
  jQuery('.itemList tbody').html('<tr><td colspan="6" align="center" ><img src="/da/v2/images/loading.gif" width="30" height="30"></td></tr>');
  jQuery('.itemList tbody').load('/da/item/index',options,function(){
    _.forEach(self.itemCart,function(item){
      $('#checkbox_item_'+item.id).attr('checked',true);
    });
    cb && cb();
  });
};

Publish.gotoPage = function(link,options){
  var self=this
    , page_no = link.href.replace(/[^\d]+/g,'')
    ;
  options.page_no = page_no.length>0?page_no:'1';
  self.loadItems(options,function(){
    //reset the page_no after search
    if(typeof options !=='undefined' &&typeof options.page_no !=='undefined'){
      delete options.page_no;
    }  
  });
  return false;
}

Publish.search = function(){
  var self=this
    ;
  self.options.q = $('.J_q').val();
  self.options.seller_cids = $('.J_seller_cids').val();
  
  self.options.order_by = $('.J_order_by').val();
  self.loadItems(self.options);
}

Publish.checkAll = function(){
  if(this.checked){
    $("input[name='selected_num_iid']").each(function(){
      var trigger = !this.checked;
      this.checked=true;
      if(trigger){
        $(this).trigger('change');
      }
    });
    $(".J_checkbox_all").each(function(){this.checked=true;}); 
  }else{
    $("input[name='selected_num_iid']").each(function(){
      var trigger = this.checked;
      this.checked=false;
      if(trigger){
        $(this).trigger('change');
      }
    });
    $(".J_checkbox_all").each(function(){this.checked=false;}); 
  }
};

Publish.submitItem = function  () {
  var self = this
    , mealId = $('.J_meal_id').val()
    , templateId = $('.J_template_id').val()
    , data = JSON.stringify({itemCart:self.itemCart,mealId:mealId,templateId:templateId})
    ;
  if(self.itemCart.length>0){
    $.post('/da/task/create',{data:data},function(data) {
      window.location.href="/da/task/index";
    },'json');
  }else{
    alert('您未选择宝贝!');
  }
}


Publish.createJob = function  () {
  var self = this
    , dapeiId = $('.J_dapei_id').val()
    , data = JSON.stringify({itemCart:self.itemCart,dapeiId:dapeiId})
    ;

  if(self.itemCart.length>0){
    $.post('/da/job/create',{data:data},function(data) {
		self.processJob(data); 
    },'json');
  }else{
    alert('您未选择宝贝!');
  }
}

Publish.itemCountByCategory = function(cb) {
  var self = this
    , data = JSON.stringify({categoryCart:self.categoryCart})
    ;
  $.post('/da/item/GetItemsByCategory',{data:data},function(data) {
    cb(null,data);
  },'json');
}

Publish.submitJobCategory = function() {
	var self = this
    , dapeiId = $('.J_dapei_id').val()
    , position = $('.J_category_position:checked').val()
	;
  self.itemCountByCategory(function(err,doc){
    if(doc.count==0){
      alert('请先选择宝贝');
      return;
    }
	if(doc.cate_count != undefined && doc.cate_count>32)
	{
		alert('请最多选择不超过32个分类');
		return;
	}
	else 
	{
	  data = JSON.stringify({itemCart:doc.itemCart,dapeiId:dapeiId,position:position});
      $.post('/da/job/create',{data:data},function(data) {
			self.processJob(data);
      },'json');
    }  
  })
}

Publish.submitCategory = function  () {
  var self = this
    , mealId = $('.J_meal_id').val()
    , templateId = $('.J_template_id').val()
    , position = $('.J_category_position').val()
	//, data = JSON.stringify({categoryCart:self.categoryCart,mealId:mealId,position:position,templateId:templateId})
	;
  self.itemCountByCategory(function(err,doc){
    if(doc.count==0){
      alert('请先选择宝贝');
      return;
    }
	if(doc.cate_count != undefined && doc.cate_count>32)
	{
		alert('请最多选择不超过32个分类');
		return;
	}
	else 
	{
	  data = JSON.stringify({itemCart:doc.itemCart,mealId:mealId,templateId:templateId})
      $.post('/da/task/create',{data:data},function(data) {
        window.location.href="/da/task/index";
      },'json');
    }  
  })
}

Publish.rollback = function(task) {
  var self = this
    , $task = $(task)
    , id = $task.attr('data-id')
    ;
  $.get('/da/task/rollback/'+id,function(data){
    window.location.reload();
  },'json');
}

Publish.delete_html = function(job) {
  var self = this
    , $job = $(job)
    , id = $job.attr('data-id')
    ;
	trace(job);
  $.get('/da/job/rollback/'+id,function(data){
    window.location.reload();
  },'json');
}

jQuery(function(){
  Publish.init();
});

Publish.processJob = function(data) {
	fetch('/da/job/process',{},function(data){
			//trace(data);
			window.location.href="/da/dapei/index";
	    });
}
