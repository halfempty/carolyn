(function($) {
$(document).ready(function() {

	$('.fullscreen').click(function() {
	    if (screenfull.enabled) {
	        screenfull.request();
	    }
	});

});
})(jQuery);