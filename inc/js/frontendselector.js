/** Toggle Color when Radio button selected */
jQuery( document ).ready( function( $ ) {

    // $() will work as an alias for jQuery() inside of this function
    $('input[name=fes-color]').on('click', function() {
        $('body')
        .removeClass(function (index, css) {
    		return (css.match (/(^|\s)fes-color-\S+/g) || []).join(' ');
		})
        .addClass( $(this).val() );
    });
} );
