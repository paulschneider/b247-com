// https://github.com/carhartl/jquery-cookie

$(document).ready(function(){	

	// if the user clicks the close button on the app promotion
	$('a.phoneClose').on('click', this, function(){
		$notify = $('#getTheApp');

		// animate the promotion to zero opacity
		$notify.animate({
			opacity: 0
		}, 450, function(){
			// remove the promotion
			$notify.remove();

			// set the dismissal cookie
			setDismissalCookie();
		})		
	});		

	// do an immediate check to see if the user has previously dismissed the app
	// promotion
	checkDismissalCookie();
});

var checkDismissalCookie = function()
{
	if(! $.cookie('app-dismiss'))
	{
		$('#getTheApp').css('display', 'block');	

		$('#getTheApp').animate({
			opacity : 1
		}, 450);
	}
}

var setDismissalCookie = function()
{
	// if we don't have the dismissal cookie
	if(! $.cookie('app-dismiss'))
	{
		// then set it
		$.cookie('app-dismiss', true, { expires: 30, path: '/' });
	}
}

var deleteDismissalCookie = function()
{
	$.removeCookie('app-dismiss');
}