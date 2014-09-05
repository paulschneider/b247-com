Date.prototype.stdTimezoneOffset = function() {
    var jan = new Date(this.getFullYear(), 0, 1);
    var jul = new Date(this.getFullYear(), 6, 1);
    return Math.max(jan.getTimezoneOffset(), jul.getTimezoneOffset());
}

Date.prototype.dst = function() {
    return this.getTimezoneOffset() < this.stdTimezoneOffset();
}

TIMEZONE_OFFSET = ((new Date()).dst()) ? '+01:00' : '00:00';

$(document).ready(function(){

	$(document).on('click', 'a.dp', function(e){
		e.preventDefault();

		// grab the path for this channel. This will be something like /channel/whats-on/theatre
		var path = $(this).prev().attr('data-path');

		$('.datepicker').datepicker('show').on('changeDate', function(e){
			var selectedDate = e.date;

			// what date did the user pick
			var date = $('.datepicker').val();		

			// create a new date object from the selected value
			var date = new Date(date);

			// check to see if we're in DST
			if(date.dst())
			{
				// we're in day light savings time so reduce the time by one hour
				date = (date.getTime()+3600000)/1000;
			}
			else {
				date = (date.getTime())/1000;	
			}

			// if the user' browser doesn't support origin, then manually set it
			if (!window.location.origin) {
				window.location.origin = window.location.protocol+"//"+window.location.host+'/';
			}

			// and finally redirect the user to the chosen date
			window.location.href = window.location.origin+path+date;
		});
	});
});