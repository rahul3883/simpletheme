( function( $ ) {

	wp.customize( 'show_excerpt', function( value ) {
		value.bind( function( newval ) {
			$( '#show_excerpt' ).html( newval );
		} );
	} );

} )( jQuery );
