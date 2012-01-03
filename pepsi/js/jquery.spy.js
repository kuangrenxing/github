(function ($) {
    
$.fn.simpleSpy = function (limit, interval) {
    limit = limit || 4;
    interval = interval || 4000;
    
    return this.each(function () {
        // 1. setup
            // capture a cache of all the list items
            // chomp the list down to limit li elements
        var $list = $(this),
            items = [], // uninitialised
            currentItem = limit,
            total = 0, // initialise later on
            height = $list.find('> li:first').height();
            
        // capture the cache
        $list.find('> li').each(function () {
            items.push('<li>' + $(this).html() + '</li>');
        });
        
        total = items.length;
        
        $list.wrap('<div class="spyWrapper" />').parent().css({ height : height * limit });
        
        $list.find('> li').filter(':gt(' + (limit - 1) + ')').remove();

        // 2. effect        
        function spy() {
            // insert a new item with opacity and height of zero
            var $insert = $(items[currentItem]).css({
                height : height,
                opacity : 1,
                display : 'none'
            }).prependTo($list);
                        
            // fade the LAST item out
            $list.find('> li:last').animate({opacity:0},1000, function () {
                // increase the height of the NEW first item
              $insert.slideDown(600);
              $(this).remove().delay(4000, "spy")
              .queue("spy", function(next) {
                spy();
                next();
              })
              .dequeue("spy");
            });

            currentItem++;
            if (currentItem >= total) {
                currentItem = 0;
            }
            
        }
        
        spy();
    });
};
    
})(jQuery);




