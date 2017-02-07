( function( $ ) {

	wp.customize( 'st_hide_tagline', function( value ) {
		value.bind( function( newval ) {
			$element = $( '#site-tagline' );
			if( true === newval ) {
				$element.addClass( 'screen-reader-text' );
			} else {
				$element.removeClass( 'screen-reader-text' );
			}
		} );
	} );

	/*
	wp.customize( 'contact_head', function( value ) {
		value.bind( function( newval ) {
			$( '#st-footer-contact-head' ).html( newval );
		} );
	} );

	wp.customize( 'contact_text', function( value ) {
		value.bind( function( newval ) {
			$( '#st-footer-contact-text' ).html( newval );
		} );
	} );

	wp.customize( 'link_facebook', function( value ) {
		value.bind( function( newval ) {
			$( '#st-footer-facebook' ).attr( 'href', newval );
		} );
	} );

	wp.customize( 'link_twitter', function( value ) {
		value.bind( function( newval ) {
			$( '#st-footer-twitter' ).attr( 'href', newval );
		} );
	} );

	wp.customize( 'link_google_plus', function( value ) {
		value.bind( function( newval ) {
			$( '#st-footer-google-plus' ).attr( 'href', newval );
		} );
	} );

	wp.customize( 'contact_website_name', function( value ) {
		value.bind( function( newval ) {
			$( '#st-footer-website-text' ).html( newval );
		} );
	} );

	wp.customize( 'contact_website_link', function( value ) {
		value.bind( function( newval ) {
			$( '#st-footer-website-text' ).attr( 'href', newval );
		} );
	} );

	wp.customize( 'contact_number', function( value ) {
		value.bind( function( newval ) {
			$( '#st-footer-contact-number' ).html( newval );
			$( '#st-footer-contact-number' ).attr( 'href', 'tel:' + newval );
		} );
	} );

	wp.customize( 'contact_email', function( value ) {
		value.bind( function( newval ) {
			$( '#st-footer-email' ).html( newval );
			$( '#st-footer-email' ).attr( 'href', 'mailto:' + newval );
		} );
	} );
	*/


	wp.customize( 'toogle_st_slider', function( value ) {
		value.bind( function( newval ) {
			$element = $('#st-slider-container');
			toogle_section( newval, $element );
		} );
	} );

	wp.customize( 'toogle_st_portfolio', function( value ) {
		value.bind( function( newval ) {
			$element = $('#st-portfolio-container');
			toogle_section( newval, $element );
		} );
	} );

	wp.customize( 'toogle_st_team', function( value ) {
		value.bind( function( newval ) {
			$element = $('#st-team-container');
			toogle_section( newval, $element );
		} );
	} );

	wp.customize( 'toogle_st_testimonials', function( value ) {
		value.bind( function( newval ) {
			$element = $('#st-testimonials-container');
			toogle_section( newval, $element );
		} );
	} );

	function toogle_section( show, $element ) {
		if( true === show ) {
			$element.show();
		} else {
			$element.hide();
		}
	}

} )( jQuery );
