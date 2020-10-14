/*
Template Name: SaaSpot
Author: VictorTheme
Version: 1.0
Email: support@victortheme.com
*/

(function($){
'use strict';

/*----- ELEMENTOR LOAD FUNTION CALL ---*/

$( window ).on( 'elementor/frontend/init', function() {
	//Obra Owl Carousel Slider Script
	var owl_carousel = function(){
		$('.owl-carousel').each( function() {
	    var $carousel = $(this);
	    var $items = ($carousel.data('items') !== undefined) ? $carousel.data('items') : 1;
	    var $items_tablet = ($carousel.data('items-tablet') !== undefined) ? $carousel.data('items-tablet') : 1;
	    var $items_mobile_landscape = ($carousel.data('items-mobile-landscape') !== undefined) ? $carousel.data('items-mobile-landscape') : 1;
	    var $items_mobile_portrait = ($carousel.data('items-mobile-portrait') !== undefined) ? $carousel.data('items-mobile-portrait') : 1;
	    $carousel.owlCarousel ({
	      loop : ($carousel.data('loop') !== undefined) ? $carousel.data('loop') : true,
	      items : $carousel.data('items'),
	      margin : ($carousel.data('margin') !== undefined) ? $carousel.data('margin') : 0,
	      dots : ($carousel.data('dots') !== undefined) ? $carousel.data('dots') : true,
	      nav : ($carousel.data('nav') !== undefined) ? $carousel.data('nav') : false,
	      navText : ["<div class='slider-no-current'><span class='current-no'></span><span class='total-no'></span></div><span class='current-monials'></span>", "<div class='slider-no-next'></div><span class='next-monials'></span>"],
	      autoplay : ($carousel.data('autoplay') !== undefined) ? $carousel.data('autoplay') : false,
	      autoplayTimeout : ($carousel.data('autoplay-timeout') !== undefined) ? $carousel.data('autoplay-timeout') : 5000,
	      animateIn : ($carousel.data('animatein') !== undefined) ? $carousel.data('animatein') : false,
	      animateOut : ($carousel.data('animateout') !== undefined) ? $carousel.data('animateout') : false,
	      mouseDrag : ($carousel.data('mouse-drag') !== undefined) ? $carousel.data('mouse-drag') : true,
	      autoWidth : ($carousel.data('auto-width') !== undefined) ? $carousel.data('auto-width') : false,
	      autoHeight : ($carousel.data('auto-height') !== undefined) ? $carousel.data('auto-height') : false,
	      center : ($carousel.data('center') !== undefined) ? $carousel.data('center') : false,
	      responsiveClass: true,
	      dotsEachNumber: true,
	      smartSpeed: 600,
	      autoplayHoverPause: true,
	      responsive : {
	        0 : {
	          items : $items_mobile_portrait,
	        },
	        480 : {
	          items : $items_mobile_landscape,
	        },
	        768 : {
	          items : $items_tablet,
	        },
	        992 : {
	          items : $items,
	        }
	      }
	    });
	    var totLength = $('.owl-dot', $carousel).length;
	    $('.total-no', $carousel).html(totLength);
	    $('.current-no', $carousel).html(totLength);
	    $carousel.owlCarousel();
	    $('.current-no', $carousel).html(1);
	    $carousel.on('changed.owl.carousel', function(event) {
	      var total_items = event.page.count;
	      var currentNum = event.page.index + 1;
	      $('.total-no', $carousel ).html(total_items);
	      $('.current-no', $carousel).html(currentNum);
	    });
	  });
		
	}; // end

	//SaaSpot Preloader Script
  $('.saspot-preloader').fadeOut(500);
	
	var item_hover_class = function( selector ){
		$(selector).on({
		  mouseenter : function() {
			$(this).addClass('saspot-hover');
		  },
		  mouseleave : function() {
			$(this).removeClass('saspot-hover');
		  }
		});
	};

	var EqualHeight = function(){
		$('.saspot-item').matchHeight ({
	    property: 'height'
	  });
	  $('.saspot-inner-item').matchHeight ({
	    property: 'height'
	  });
	};
	
	//SaaSpot client
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_client.default', function($scope, $){
		owl_carousel();
		item_hover_class('.client-item');
	} );
	
	//SaaSpot Apps
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_apps.default', function($scope, $){
		
		var $grid = $('.saspot-masonry').isotope ({
      itemSelector: '.masonry-item',
      layoutMode: 'packery',
      percentPosition: true,
      isFitWidth: true,
    });
    var filterFns = {
      ium: function() {
        var name = $(this).find('.name').text();
        return name.match(/ium$/);
      }
    };
    $('.masonry-filters').on('click', 'li a', function() {
      var filterValue = $(this).attr('data-filter');
      filterValue = filterFns[ filterValue ] || filterValue;
      $grid.isotope({
        filter: filterValue
      });
      $('.saspot-masonry').find('.first').removeClass('first');
      $($grid.data('isotope').filteredItems[0].element).addClass('first');
      $grid.isotope('layout');
    });
    $('.masonry-filters').each(function(i, buttonGroup) {
      var $buttonGroup = $(buttonGroup);
      $buttonGroup.on('click', 'li a', function() {
        $buttonGroup.find('.active').removeClass('active');
        $(this).addClass('active');
      });
    });
		
	} );

	//SaaSpot Webinars
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_webinars.default', function($scope, $){
		
		var $grid = $('.saspot-masonry').isotope ({
      itemSelector: '.masonry-item',
      layoutMode: 'packery',
      percentPosition: true,
      isFitWidth: true,
    });
    var filterFns = {
      ium: function() {
        var name = $(this).find('.name').text();
        return name.match(/ium$/);
      }
    };
    $('.masonry-filters').on('click', 'li a', function() {
      var filterValue = $(this).attr('data-filter');
      filterValue = filterFns[ filterValue ] || filterValue;
      $grid.isotope({
        filter: filterValue
      });
      $('.saspot-masonry').find('.first').removeClass('first');
      $($grid.data('isotope').filteredItems[0].element).addClass('first');
      $grid.isotope('layout');
    });
    $('.masonry-filters').each(function(i, buttonGroup) {
      var $buttonGroup = $(buttonGroup);
      $buttonGroup.on('click', 'li a', function() {
        $buttonGroup.find('.active').removeClass('active');
        $(this).addClass('active');
      });
    });
		item_hover_class('.video-wrap-inner');
		
	} );
	
	// SaaSpot Looking
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_looking.default', function($scope, $){
		//Obra Hover Script
		item_hover_class('.looking-item');
	} );
	// SaaSpot Job
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_job.default', function($scope, $){
		//Obra Hover Script
		item_hover_class('.job-item');
	} );

	// SaaSpot Promoting
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_promoting.default', function($scope, $){
		//Obra Hover Script
		item_hover_class('.promote-item');
	} );

	// SaaSpot Environment
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_environment.default', function($scope, $){
		//Obra Hover Script
		item_hover_class('.environment-item');
	} );

	// SaaSpot Resource
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_resource.default', function($scope, $){
		//Obra Hover Script
		item_hover_class('.resource-item');
	} );

	// SaaSpot Classes
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_classes.default', function($scope, $){
		//Obra Hover Script
		item_hover_class('.class-item');
	} );

	//SaaSpot Pricing
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_pricing.default', function($scope, $){
		$('.saspot-item').matchHeight ({
	    property: 'height'
	  });
	} );

	//SaaSpot Analytics
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_analytics.default', function($scope, $){
		$('.saspot-item').matchHeight ({
	    property: 'height'
	  });
	} );
	
	//SaaSpot Analytics
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_identifying.default', function($scope, $){
		$('.saspot-item').matchHeight ({
	    property: 'height'
	  });
	} );

	//SaaSpot Sitemap
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_sitemap.default', function($scope, $){
  	$('.sitemap-item .bullet-list li, .sitemap-item .bullet-list ul').removeAttr("class");
	} );
	
	//SaaSpot Testimonial Carousel
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_testimonial_carousel.default', function($scope, $){
		owl_carousel();
		$('.saspot-item').matchHeight ({
	    property: 'height'
	  });
	} );
	//SaaSpot Features
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_features.default', function($scope, $){
		owl_carousel();
	} );
	//SaaSpot Marketing
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_marketing.default', function($scope, $){
		owl_carousel();
	} );
	//SaaSpot Team
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_team.default', function($scope, $){
		owl_carousel();
	} );
	//SaaSpot Slider
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_slider.default', function($scope, $){
		//SaaSpot Swiper Slider Script
    $('.swiper-slides').each(function (index) {
      //SaaSpot Swiper Slider Script
      var animEndEv = 'webkitAnimationEnd animationend';
      var swipermw = $('.swiper-container.swiper-mousewheel').length ? true : false;
      var swiperkb = $('.swiper-container.swiper-keyboard').length ? true : false;
      var swipercentered = $('.swiper-container.swiper-center').length ? true : false;
      var swiperautoplay = $('.swiper-container').data('autoplay');
      var swiperinterval = $('.swiper-container').data('interval');
      var swiperloop = $('.swiper-container').data('loop');
      var swipermousedrag = $('.swiper-container').data('mousedrag');
      var swipereffect = $('.swiper-container').data('effect');
      var swiperclikable = $('.swiper-container').data('clickpage');
      var swiperspeed = $('.swiper-container').data('speed');
      var swiperinteraction = $('.swiper-container').data('interaction');

      //SaaSpot Swiper Slides Script
      var autoplay = swiperinterval;
      var swiper = new Swiper($(this), {
        autoplayDisableOnInteraction: swiperinteraction,
        effect: swipereffect,
        speed: swiperspeed,
        loop: swiperloop,
        paginationClickable: swiperclikable,
        watchSlidesProgress: true,
        autoplay: swiperautoplay,
        simulateTouch: swipermousedrag,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        mousewheelControl: swipermw,
        keyboardControl: swiperkb,
      });
      swiper.on('slideChange', function (s) {
        var currentSlide = $(swiper.slides[swiper.activeIndex]);
          var elems = currentSlide.find('.animated')
          elems.each(function() {
            var $this = $(this);
            var animationType = $this.data('animation');
            $this.addClass(animationType, 100).on(animEndEv, function() {
              $this.removeClass(animationType);
            });
          });
      });      
    });
	} );
	//SaaSpot Additional Features
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_additional_features.default', function($scope, $){
		$('[data-toggle="tooltip"]').tooltip();
	  var Tooltip = $.fn.tooltip.Constructor;
	  $.extend( Tooltip.Default, {
	    customClass: '',
	  });
	  var _show = Tooltip.prototype.show;
	  Tooltip.prototype.show = function () {
	    _show.apply(this,Array.prototype.slice.apply(arguments));
	    if ( this.config.customClass ) {
	      var tip = this.getTipElement();
	      $(tip).addClass(this.config.customClass);
	    }
	  };
	  $('.plan-feature-item > label input').on('click', function () {
	    $('.plan-feature-item input[type="checkbox"]').not(this).prop('checked', this.checked);
	  });
	} );
	//SaaSpot List
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_list.default', function($scope, $){
		$('[data-toggle="tooltip"]').tooltip();
	  var Tooltip = $.fn.tooltip.Constructor;
	  $.extend( Tooltip.Default, {
	    customClass: '',
	  });
	  var _show = Tooltip.prototype.show;
	  Tooltip.prototype.show = function () {
	    _show.apply(this,Array.prototype.slice.apply(arguments));
	    if ( this.config.customClass ) {
	      var tip = this.getTipElement();
	      $(tip).addClass(this.config.customClass);
	    }
	  };
	} );

	//SaaSpot Marketing
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-saaspot_tab_title.default', function($scope, $){
		//SaaSpot Onclick Get Text Script
	  $('.pricing-plan').each( function() {
      var $plan = $(this);
      $plan.find('.nav-link').on('click', function() {
        $plan.find('.pricing-plan-title span').text($(this).text());
      });
      if($plan.find('.nav-link').hasClass('active')) {
        $plan.find('.pricing-plan-title span').text($plan.find('.nav-link.active').text());
      };
    });
	} );

	
	
} );


})(jQuery);  