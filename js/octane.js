(function ($) {
    	'use strict';
     /**********************************************
        Responsive Menu js
      **********************************************/  
    
    
    $("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .nav-secondary .genesis-nav-menu").addClass("responsive-menu").before('<div class="responsive-menu-icon"></div>');

    $(".responsive-menu-icon").click(function(){
        $(this).next("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .nav-secondary .genesis-nav-menu").slideToggle();
    });

    $(window).resize(function(){
        if(window.innerWidth > 1000) {
            $("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .nav-secondary .genesis-nav-menu, nav .sub-menu").removeAttr("style");
            $(".responsive-menu > .menu-item").removeClass("menu-open");
        }
    });

    $(".responsive-menu > .menu-item").click(function(event){
        if (event.target !== this) {return;}
            $(this).find(".sub-menu:first").slideToggle(function() {
            $(this).parent().toggleClass("menu-open");
        });
    });
    
    
    if ( document.querySelector( '#fp-vert-menu' ) ) {
		var verticalMenu = document.querySelector( '#fp-vert-menu' ),
			menuItems = verticalMenu.querySelectorAll( '.menu-item'),
			itemsComputedStyle = getComputedStyle( menuItems[0] ),
			left = parseInt( itemsComputedStyle.left ),
			adjustedHightValue = Math.floor( window.innerWidth / menuItems.length );
			
		for(var i = 0; i < menuItems.length; i++) {
			//first we adjust the height of the element
			var link = menuItems[i].querySelector('a');
			link.style.height = adjustedHightValue  + 'px';
			
			//30 if the font size in pixels;
			link.style.padding = Math.floor( (adjustedHightValue - 35) / 2 ) + 'px 0';
			//skip the first element in the array 
			if (i !== 0) {
				//set the left value
				menuItems[i].style.left = ( adjustedHightValue + left ) + 'px';
				//increment the left value
				left += adjustedHightValue;
			}
		}
		
	}
    


    function hideScrollBars() {
        $('body').css('overflow-y', 'hidden'); // hide scrollbars!
    }



    function removeLightbox() {
        $('#overlay, #lightbox')
            .fadeOut('slow', function() {
                $(this).remove();
                $('body').css('overflow-y', 'auto'); // show scrollbars!
            });
    }



    /*
     * function will center any block object in the center of the screen
     */

    jQuery.fn.center = function () {
        this.css("position","absolute");
        this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
                $(window).scrollTop()) + "px");
        this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
                $(window).scrollLeft()) + "px");
        return this;
    };
    /*
     * This function will create the dark background which houses the lightbox
     */
    jQuery.fn.overlay = function() {
        this.css({
                'position'        : 'fixed',
                'top'             : '0',
                'left'            : '0',
                'height'          : '100%',
                'width'           : '100%',
                'background-color': 'black',
                'opacity'         : '0',
                'z-index'         : '100'
            })
            .animate({'opacity': '0.7'}, 'slow')
            .appendTo('body');
        return this;
    };
    /*
     *   By default the lightbox is hidden you should use use a function to show the lightbox after it is loaded
     */
    jQuery.fn.lightbox = function() {
        this.css({
            'height' : 'auto',
            'width' : 'auto',
            'background-color' : 'white',
            'opacity': '1',
            'z-index': '150'
        })
            .hide()
            .appendTo('body');

        return this;
    };
})(jQuery);



