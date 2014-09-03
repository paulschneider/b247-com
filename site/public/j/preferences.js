$(document).ready(function(){

	/**
	 * action on turning a district or comms preference on or off. Note that this is an opt IN process. 
	 * By turning a preference on we are aiming to indicate they are interested in this content.
	 */
	$('#district-list a, #broadcast-list a').on('click', this, function(e){
		e.preventDefault();

		// which list item was clicked
		$item = $(this);

		// as there are multiple lists, work out which one $item is in
		$list = $item.parents().closest('.optionList');

		// the lists have (or might have) limits to how many can be selected
		var max = $list.attr('data-max');

		// if the item isn't active, make it active
		if( ! $item.parent().hasClass('optionOn'))
		{
			// as we're making it active, ensure we aren't going to exceed the limit
			if( $('.optionOn', $list).length < max )
			{
				$item.parent().find('input[type=checkbox]').prop("checked", true);
				$item.parent().find('input[type=checkbox]').attr("checked", "checked");
				$item.parent().addClass('optionOn');	
			}				
		}
		// otherwise we're making it inactive
		else 
		{
			$item.parent().find('input[type=checkbox]').prop("checked", false);
			$item.parent().find('input[type=checkbox]').removeAttr("checked");
			$item.parent().removeClass('optionOn');
		}	
	});

	/**
	 * action on turning a top level channel on or off. Note that this is an opt OUT process. 
	 * By turning a channel off we are aiming to check all of the underlying checkboxes so they are
	 * submitted to the server and recorded as content the user doesn't want to see.
	 */
	$('.optionToggle.channel a').on('click', this, function(e){
		e.preventDefault();

		// which on/off button was clicked
		$control = $(this);

		// which input field to alter
		$input = $control.parent().find('input[type=checkbox]');

		// grab the value of the input field, which is the channel ID
		var channelId = $input.val();
		
		// if the user clicked the 'On' button, turn the channel on
		if(! $control.parent().hasClass('optionToggleOn') )
		{			
			$input.prop("checked", true);
			$input.attr("checked", "checked");		

			// turn all sub-channels off			
			$('.channel-' + channelId + ' li ul li').each(function(index, value){
				$row = $(this);

				// go through each subChannel and set them to off
				$row.removeClass('optionOn');
				$row.find('input[type=checkbox]').prop("checked", true);
				$row.find('input[type=checkbox]').attr("checked", "checked");
			});
		}
		// otherwise they clicked the off button, turn the channel off including its children 
		// and grand children
		else
		{			
			// set this channels main input field to off so its not submitted 
			$input.prop("checked", false);
			$input.removeAttr("checked", "checked");
			
			// turn all sub-channels off			
			$('.channel-' + channelId + ' li ul li').each(function(index, value){
				$row = $(this);

				// go through each subChannel and set them to off				
				$row.addClass('optionOn');
				$row.find('input[type=checkbox]').prop("checked", false);
				$row.find('input[type=checkbox]').removeAttr("checked");
			});
		}
	});
	
	/**
	 * action on turning a sub-channel on or off. Note that this is an opt OUT process. 
	 * By turning a channel off we are aiming to check all of the underlying checkboxes so they are
	 * submitted to the server and recorded as content the user doesn't want to see.
	 */
	$('.optionSubchannels li a').on('click', this, function(e){
		e.preventDefault();

		// which channel name was clicked
		$control = $(this);

		// which input field to alter
		$input = $control.parent().find('input[type=checkbox]');

		// grab the value of the input field, which is the channel ID
		var channelId = $input.val();

		// if the sub-channel is off then check the boxes and remove the indicator
		if( $control.parent().hasClass('optionOn'))
		{
			$input.prop("checked", true);
			$input.attr("checked", "checked");

			$control.parent().removeClass('optionOn');

			// turn all sub-channel categories off			
			$('#sub-channel-' + channelId + ' li ul li').each(function(index, value){
				$row = $(this);

				// go through each subChannel and set them to OFF
				$row.removeClass('optionOn');
				$row.find('input[type=checkbox]').prop("checked", true);
				$row.find('input[type=checkbox]').attr("checked", "checked");
			});
		}
		// otherwise un-check the boxes and add the indicator
		else
		{
			$input.prop("checked", false);
			$input.removeAttr("checked");

			$control.parent().addClass('optionOn');

			// turn all sub-channel categories ON			
			$('#sub-channel-' + channelId + ' li ul li').each(function(index, value){
				$row = $(this);

				// go through each subChannel and set them to off
				$row.addClass('optionOn');
				$row.find('input[type=checkbox]').prop("checked", false);
				$row.find('input[type=checkbox]').removeAttr("checked");
			});
		}
	});
	
	/**
	 * actions on deactivating a single category. Note that this is an opt OUT process. 
	 * By turning a category off we are aiming to check that categories checkbox 
	 * so it is submitted to the server and recorded as content the user doesn't want to see.
	 */
	$('.category-option a').on('click', this, function(e){
		e.preventDefault();

		// which category was clicked
		$control = $(this);

		// which input field to alter
		$input = $control.parent().find('input[type=checkbox]');

		// the user is choosing to hide this content
		if(! $control.hasClass('optionOn') )
		{
			$input.prop("checked", true);
			$input.attr("checked", "checked");
			$control.parent().removeClass('optionOn');
		}
		// they want to see the content
		else
		{
			$input.prop("checked", false);
			$input.removeAttr("checked");
			$control.parent().addClass('optionOn');
		}
	});
})