$(document).ready(function() {
    
    
    //  adding some classes acroding to screen width
    if(window.innerWidth > 1199){
        $(".nav_container").addClass("nav_index_container");
        $(".nav-link").addClass("index_link");
        $(".ham2").addClass("ham2_index");
        $(".navbar_white").css({
            "display": "block"
        });
        
        $(".navbar_color").css({
            "display": "none"
        });
    
        $(".nav-link_active").addClass("nav-link_index_active");
        
    }
        
        
        
      // changing nav style during scrolling
        $(document).scroll(function () {
         
         // adding classes depending of window height   
         var nav = $(".fixed-top");
         if($(this).scrollTop() > nav.height()){
             $(".fixed-top").removeClass("nav_index_container");
             $(".nav-link").removeClass("index_link");
             $(".ham2").removeClass("ham2_index");
             $(".navbar_white").css({
               "display": "none"
             });
        
             $(".navbar_color").css({
                "display": "block"
              });
             
             $(".nav-link_active").removeClass("nav-link_index_active");
             
         }else{
            if(window.innerWidth > 1199){ 
             
             $(".nav_container").addClass("nav_index_container");
             $(".nav-link").addClass("index_link");
             $(".ham2").addClass("ham2_index");
             $(".navbar_white").css({
                "display": "block"
             });
        
            $(".navbar_color").css({
               "display": "none"
            });
                
            $(".nav-link_active").addClass("nav-link_index_active");
                
           }
         }
            
            
              var pos = $(".article_left").offset().top;
              var winTop = $(window).scrollTop();
              
               if (pos < winTop + 800 ) {
                   $(".article_left").addClass("show_left");
                   $(".article_right").addClass("show_right");
               }
            
        });
    
    $('#counter').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$(this).find('.count').each(function () {
			var $this = $(this);
			$({ Counter: 0 }).animate({ Counter: $this.text() }, {
				duration: 2000,
				easing: 'swing',
				step: function () {
					$this.text(Math.ceil(this.Counter));
				}
			});
		});
        
        
        
        
       
        
		$(this).unbind('inview');
	}
});
 
});


