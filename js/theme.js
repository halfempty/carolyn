(function($) {
$(document).ready(function() {

	if (!$('html').hasClass("legacy")) {

		if ( $('.coverimage').length == 0 ) {

		} else {
			// is "cover" template
			var imgsrc = $('.coverimage').find('img').attr('src');
			console.log('imgsrc: ' + imgsrc);

			$('html').css({
				'background': 'url(' + imgsrc + ') no-repeat center center fixed',
				'-webkit-background-size': 'cover',
				'-moz-background-size': 'cover',
				'-o-background-size': 'cover',
				'background-size': 'cover'
			});

			$('body').addClass('iscover');

			$('.coverimage').hide();

		}
		
	} else {

	}


	$('.fullscreen').click(function() {
	    if (screenfull.enabled) {
	        screenfull.request();
	    }
	});


	

});
})(jQuery);
