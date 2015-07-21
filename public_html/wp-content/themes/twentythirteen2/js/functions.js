/**
 * Functionality specific to Twenty Thirteen.
 *
 * Provides helper functions to enhance the theme experience.
 */

( function( $ ) {
	var body    = $( 'body' ),
	    _window = $( window ),
		nav, button, menu;

	nav = $( '#site-navigation' );
	button = nav.find( '.menu-toggle' );
	menu = nav.find( '.nav-menu' );
	/*----------------------------------------------*/
	$(document).ready(function(){
		/*$(".person-block").mouseenter(function(){
			var person = document.getElementById(this.id);
			$(this).effect("bounce", { distance: 10, times: 1 }, 150);
		});*/
		//$('#whole-page-span').hide();
		console.log('loaded');

		document.getElementById("whole-page-span").style.visibility = "hidden";

		$(".person-link").click(function(){

		});
	});

	$(document).on( 'scroll', function(){
      var h = document.getElementById('masthead').clientHeight;
      if ($(window).scrollTop() > h) {
        $('.scroll-top-wrapper').addClass('show');
      } else {
        $('.scroll-top-wrapper').removeClass('show');
      }
    });

	$(document).on('keydown', function(e) {
		if (e.keyCode === 27) { // escape = 27
			close_popup();
		}
	});

    $('.scroll-top-wrapper').on('click', scrollToTop);

	$(document).mouseup(function(e) {
		var container = $(".person-popup");
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			close_popup();
		}
	});

	$("a[href^=#]").click(function(e) {
	  var dest = $(this).attr('href');
	  if (!dest.includes("person")) {
		  var navbarh = document.getElementById ('navbar').clientHeight;
		  e.preventDefault();
		  $('html,body').stop().animate({ scrollTop: $(dest).offset().top - 2*navbarh}, 'slow');
	  }
	});
	$(document).mousemove(function(e) {
		if (document.getElementById("istar-sidebar")) {
			mouseX = e.pageX;
			var winwidth = $(window).width();
			var sbWidth = $(".istar-sidebar:first").width();
			var sbShift = (winwidth - sbWidth).toString();
			if (mouseX > winwidth * 0.95) {
				document.getElementById("istar-sidebar").style.left = sbShift + "px";
			} else if (mouseX < winwidth * 0.90) {
				document.getElementById("istar-sidebar").style.left = "100%";
			}
		}
	});

	$(window).on('resize', function(e) {
		if (document.getElementById("istar-sidebar")) {
			document.getElementById("istar-sidebar").style.left = "100%";
		}
	});

	/**
	 * Adds a top margin to the footer if the sidebar widget area is higher
	 * than the rest of the page, to help the footer always visually clear
	 * the sidebar.
	 */
	$( function() {
		if ( body.is( '.sidebar' ) ) {
			var sidebar   = $( '#secondary .widget-area' ),
			    secondary = ( 0 === sidebar.length ) ? -40 : sidebar.height(),
			    margin    = $( '#tertiary .widget-area' ).height() - $( '#content' ).height() - secondary;

			if ( margin > 0 && _window.innerWidth() > 999 ) {
				$( '#colophon' ).css( 'margin-top', margin + 'px' );
			}
		}
	} );

	/**
	 * Enables menu toggle for small screens.
	 */
	( function() {
		if ( ! nav || ! button ) {
			return;
		}

		// Hide button if menu is missing or empty.
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		button.on( 'click.twentythirteen', function() {
			nav.toggleClass( 'toggled-on' );
			if ( nav.hasClass( 'toggled-on' ) ) {
				$( this ).attr( 'aria-expanded', 'true' );
				menu.attr( 'aria-expanded', 'true' );
			} else {
				$( this ).attr( 'aria-expanded', 'false' );
				menu.attr( 'aria-expanded', 'false' );
			}
		} );

		// Fix sub-menus for touch devices.
		if ( 'ontouchstart' in window ) {
			menu.find( '.menu-item-has-children > a, .page_item_has_children > a' ).on( 'touchstart.twentythirteen', function( e ) {
				var el = $( this ).parent( 'li' );

				if ( ! el.hasClass( 'focus' ) ) {
					e.preventDefault();
					el.toggleClass( 'focus' );
					el.siblings( '.focus' ).removeClass( 'focus' );
				}
			} );
		}

		// Better focus for hidden submenu items for accessibility.
		menu.find( 'a' ).on( 'focus.twentythirteen blur.twentythirteen', function() {
			$( this ).parents( '.menu-item, .page_item' ).toggleClass( 'focus' );
		} );
	} )();

	/**
	 * @summary Add or remove ARIA attributes.
	 * Uses jQuery's width() function to determine the size of the window and add
	 * the default ARIA attributes for the menu toggle if it's visible.
	 * @since Twenty Thirteen 1.5
	 */
	function onResizeARIA() {
		if ( 643 > _window.width() ) {
			button.attr( 'aria-expanded', 'false' );
			menu.attr( 'aria-expanded', 'false' );
			button.attr( 'aria-controls', 'primary-menu' );
		} else {
			button.removeAttr( 'aria-expanded' );
			menu.removeAttr( 'aria-expanded' );
			button.removeAttr( 'aria-controls' );
		}
	}
	function scrollToTop() {
	  verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	  element = $('body');
	  offset = element.offset();
	  offsetTop = offset.top;
	  
	  $('html, body').stop().animate({scrollTop: 0}, 300);
	}
	_window
		.on( 'load.twentythirteen', onResizeARIA )
		.on( 'resize.twentythirteen', function() {
			onResizeARIA();
	} );

	/**
	 * Makes "skip to content" link work correctly in IE9 and Chrome for better
	 * accessibility.
	 *
	 * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
	 */
	_window.on( 'hashchange.twentythirteen', function() {
		var element = document.getElementById( location.hash.substring( 1 ) );

		if ( element ) {
			if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
				element.tabIndex = -1;
			}

			element.focus();
		}
	} );

	/**
	 * Arranges footer widgets vertically.
	 */
	if ( $.isFunction( $.fn.masonry ) ) {
		var columnWidth = body.is( '.sidebar' ) ? 228 : 245;

		$( '#secondary .widget-area' ).masonry( {
			itemSelector: '.widget',
			columnWidth: columnWidth,
			gutterWidth: 20,
			isRTL: body.is( '.rtl' )
		} );
	}
} )( jQuery );

function toggle_popup(post_id) {
	var person = document.getElementById("person-link-" + post_id);
	var popup = document.getElementById("person-popup-" + post_id);
	var isVisible = popup.style.display;
	if (isVisible == "none") {
		$(".person-popup").hide();
		blur_everything();
		$("#person-popup-" + post_id).fadeIn(300);
	} else {
		close_popup();
	}
} (jQuery);

/* Called when clicked outside of DIV or when 'Close' button is clicked. */
function close_popup() {
	$(".person-popup").fadeOut(300);
	remove_blur();
}

function blur_everything() {
	// currently only being called in people class, might have to parameterize if other pages require
	$("#people-header").addClass("blur");
	$(".person-block").addClass("blur");
	$(".person-title").addClass("blur");
	$(".title").addClass("blur");
}

function remove_blur() {
	$(".blur").removeClass("blur");
}