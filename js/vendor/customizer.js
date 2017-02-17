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

} )( jQuery );
