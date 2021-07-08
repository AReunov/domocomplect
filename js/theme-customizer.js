jQuery(function( $ ) {
    wp.customize( 'header_phone_number', function( value ) {
        value.bind( function( newVal ) {
            $( '.header_phone_number' ).html ( newVal );
        });
    });

    wp.customize( 'header_facebook_link', function( value ) {
        value.bind( function( newVal ) {
            $( '#header_facebook_link' ).attr ( 'href', newVal );
        });
    });
    wp.customize( 'header__navigation__phone', function( value ) {
        value.bind( function( newVal ) {
            $( '#header__navigation__phone' ).attr ( 'href', newVal );
        });
    });
});
