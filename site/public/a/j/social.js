$(document).ready(function(){

	$('.icoFacebook').on('click', this, function(e){
		e.preventDefault();
		
		$('.fb-like .pluginButton').remove();

		$('.fb-like .pluginButton').trigger('click');
	});
});