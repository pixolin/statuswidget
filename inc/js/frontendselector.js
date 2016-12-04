/** Toggle Color when Radio button selected */
jQuery( document ).ready( function( $ ) {


	// Read the cookie and add CSS Class if cookie exists
	var myCookie = readCookie('FESColor');
	if (myCookie) {
		$('body').addClass( myCookie );
	}

    // $() will work as an alias for jQuery() inside of this function
    $('input[name=fes-color]').on('click', function() {
        $('body')
        .removeClass(function (index, css) {
    		return (css.match (/(^|\s)fes-color-\S+/g) || []).join(' ');
		})
        .addClass( $(this).val() );
        var cookie = createCookie('FESColor', $(this).val(), 7);
    });
} );
