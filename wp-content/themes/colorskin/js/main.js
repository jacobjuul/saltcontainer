jQuery(function($){

    // Sticky Header
    if($('.site-header').length > 0) {
        $(window).scroll(function() {
            if($(window).scrollTop() > 100 ) {
                $('#masthead').addClass('sticky-header');
            } else {
                $('#masthead').removeClass('sticky-header');
            }
        });
    }
    
    // Search top bar
    $('.search-wrap .search-icon').on('click', function() {
		$('.search-wrap .search-box').toggleClass('active');
	});
    
    // Back To Top
    $(window).scroll(function() {
        if ( $(this).scrollTop() > 300 ) {
            $('.go-top').addClass('show');
        } else {
            $('.go-top').removeClass('show');
        }
    });
    $('.go-top').on('click', function() {
        $("html, body").animate({ scrollTop: 0 }, 1000);
        return false;
    });
    
    // Sticky Footer
    var sh = jQuery('.site-header').outerHeight();
    var sf = jQuery('.site-footer').outerHeight();
    var wh = jQuery(window).outerHeight();
    var ch = wh - (sh + sf);
    jQuery('#content').css('min-height', ch);

});

//Menu dropdown animation
jQuery(function($) {
	$('.sub-menu').hide();
	$('.main-navigation .children').hide();
	$('.menu-item').hover( 
		function() {
			$(this).children('.sub-menu').slideDown();
		}, 
		function() {
			$(this).children('.sub-menu').hide();
		}
	);
	$('.main-navigation li').hover( 
		function() {
			$(this).children('.main-navigation .children').slideDown();
		}, 
		function() {
			$(this).children('.main-navigation .children').hide();
		}
	);	
});

//Menu bar
jQuery(function($) {
    var headerHeight = $('.site-header').outerHeight();
    $('.header-clone').css('height',headerHeight);
    
	$(window).resize(function(){	
		var headerHeight = $('.site-header').outerHeight();
		$('.header-clone').css('height',headerHeight);
	});
});

//Mobile menu
jQuery(function($) {
	$('.main-navigation .menu').slicknav({
		label: '<i class="fa fa-bars"></i>',
		prependTo: '.mobile-nav',
		closedSymbol: '&#43;',
		openedSymbol: '&#45;',
		allowParentLinks: true
	});
});	