if (!Template) var Template = {};

Template.init = function(){
  var self = this;
    //选择
    $('body')
    .delegate('.J_template_list a','click',function(){
      self.select(this,function(){
        self.preview();
      });
    })
    .delegate('.J_preview_link','click',function(){
      return self.validate('showAlert');
    }) 
    .delegate('.J_submit_button','click',function(){
      self.submit();
    })
    .delegate('.J_tpl_list a','click',function(){
      self.tpl_select(this,function(e){
        //self.preview();
        //self.get_tpl(e);
      });  
    });
    $('.J_like').bind('click',function(event){
      trace('like clicked');
      self.like(this);
      event.stopPropagation();
    });

    $('.J_template_list').each(function(index,e){
      Template.frozen(e);
    });
}

Template.tpl_select = function(e,callback){
    var id = $(e).children().attr("data-id");
    var item_cnt = $(e).children().attr("data-item-count");
    $(e).parent().siblings().removeClass("curr");
    $(e).parent().addClass("curr").append('<i></i>');
    $('#J_template_id').val(id);
    $('#J_template_item_cnt').val(item_cnt);
    trace('tpl id :' + $('#J_template_id').val());
    trace('tpl items :' + $('#J_template_item_cnt').val());
    callback && callback(e);
}

Template.select = function(e,callback){
  var itemCount = $('#J_meal_item_count').val()
    , templateItemCount = $(e).children().attr("data-item-count")
    , permission = $(e).children().attr("data-permission")
    ;
  if(itemCount>0){
    if(itemCount>templateItemCount){
      alert('亲!这个模板的宝贝数量不符合');
      return false;
    }
    if(permission=='deny'){
      if(confirm('亲!这是VIP专用模板,要升级账户么?')){
        window.location.href='/da/upgrade';
      }
      return false;
    }
    var id = $(e).children().attr("data-id");
    $(e).parent().siblings().removeClass("curr");
    $(e).parent().addClass("curr").append('<i></i>');
    $('#J_template_id').val(id);
    callback && callback(e);
  }else{
    alert('亲,请先选择套餐.');
  }
}

Template.get_tpl = function(e){
    var self = this;
    var id = $(e).children().attr("data-id");
    $.post('/da/tpl/getmeal',{id:id},function(data){
        if(data != null && data.result){
            $(".J_preview").html(data.html);
        }
    },"json");
}


Template.preview = function(){
  var self = this;
  if(self.validate()){
    var templateId= $('#J_template_id').val()
      , mealId= $('#J_meal_id').val()
      , previewUrl = '/da/meal/preview/template/'+templateId+'/meal/'+mealId
      ;
    $('.J_preview_link').attr('href',previewUrl);
  }
}

Template.validate = function(showAlert){
  if(!($('#J_template_id').val() > 0 )) {
    if(showAlert){
      alert('亲,请选择模版');
    }
  }else if(!($('#J_meal_id').val() > 0 )){
    if(showAlert){
      alert('亲,请选择套餐');
    }
  }else {
    return true;
  }
  return false;
}


Template.clip = function(){
    $(".J_copy_html").zclip({
      path:'/da/js/ZeroClipboard.swf',
      copy:window.J_html?window.J_html:$('.J_html').html(),
      afterCopy:function(){
        alert('亲,模版代码已经复制到剪切板了:)');
      }
    });
}

Template.submit = function(){
  var self = this;
  //if(self.validate('showAlert')){
    $('form').submit();
  //}
}

Template.frozen = function(e){
  var itemCount = $('#J_meal_item_count').val()
   ,  templateItemCount = $(e).find('img').attr("data-item-count")
   ;
   //nasty here :(
  if(itemCount>0){
    if(itemCount>templateItemCount){
      if($(e).hasClass('curr')){
        $(e).removeClass('curr');
        $('#J_template_id').val('');
      } 
      $(e).addClass('not-available');
      $(e).children('a').addClass('not-available');
    }else if($(e).hasClass('not-available')){
      $(e).removeClass('not-available');
      $(e).children('a').removeClass('not-available');
    }
  }
}

Template.like = function(e){
  var templateId = $(e).attr('data-id');
  $.get('/da/like',{template:templateId},function(data){
    if(data!= null && data.result){
      $(e).removeClass('like').addClass('liked').html('我喜欢');
    }
  },"json");
}
