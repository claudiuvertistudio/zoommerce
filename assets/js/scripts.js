jQuery(document).ready(function($) {

	/*
	* Center vertically the big banner content 
	*/
	function zoocommerce_verticall_align(target, parent, minus) {

		if(parent) {
			bb_parent = $(parent).height();
		} else {
			bb_parent = $(target).parent().height();
		}

		var bb_top = (bb_parent - $(target).height() - minus) / 2;

		$(target).css('top', bb_top);
	}

	/*
	* Add height on big banner
	*/
	function zoocommerce_viewport_height(target) {
		$(target).css('height', $(window).height() - $('header#home').height());
	}

	function zoocommerce_height_match(target) {
		$(target).css('height', 'inherit');

		var allHeights = [],
		    maxHeight = '';
		    
		    $(target).each(function() {
		        var heights = $(this).outerHeight();

		        allHeights.push(heights);
		        maxHeight = Math.max.apply(null, allHeights);
		    });
		    
		    $(target).css("height", maxHeight);
	}

	/*
	* Run functions on resize and load to avoid bugs 
	*/
	$(window).resize(function() {

		/*
		* Responsive fixes
		*/
		if($(window).height() < 710) {
			$('.header-content-wrap').addClass('smallHeightViewport');
		} else {
			$('.header-content-wrap').removeClass('smallHeightViewport');
		}
		
		//Add height on big banner
		zoocommerce_viewport_height('#big-banner');

		//Center vertically the big banner content 
		zoocommerce_verticall_align('.header-content-wrap', '#big-banner', 0);

		//Home products height match
		zoocommerce_height_match('#home_products .product');

		//Home blog posts height match
		zoocommerce_height_match('#home_blog .post');

		/*
		* Home - Add height on products right image
		*/
		$('#home_products .right').css('height', $('#home_products .left').outerHeight());

		

	}).trigger('resize');


	/*
	* Call owl carousel for testimonials
	*/
	$(".testimonials_wrap").owlCarousel({
	    navigation:false,
	    paginationSpeed : 1000,
	    goToFirstSpeed : 2000,
	    singleItem : true,
	    autoHeight : true,
	    transitionStyle:"fade"
	});

	/*
	* Call owl carousel for blog posts
	*/
	var homeBlogOwl = $("#home_blog .items_wrapper");
	homeBlogOwl.owlCarousel({
		items : 2, //10 items above 1000px browser width
		itemsDesktop : [1000,2], //5 items between 1000px and 901px
		itemsDesktopSmall : [960,1], // betweem 900px and 601px
		itemsTablet: [600,1], //2 items between 600 and 0
		itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
	});

	$("#home_blog .next_posts").click(function(){
		homeBlogOwl.trigger('owl.next');
	});

	$("#home_blog .prev_posts").click(function(){
		homeBlogOwl.trigger('owl.prev');
	});

	/*
	* Big banner arrow scroll
	*/
	$('#big-banner .down-arrow').click(function(e) {
		e.preventDefault();

		$('html, body').animate({scrollTop: $(this).offset().top});
	});
});