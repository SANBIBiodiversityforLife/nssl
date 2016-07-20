jQuery(document).ready(function($){
	// Tried to do this in the template but to no avail. 
	$('#sspFlag').appendTo("h1.page-header");
	if ($('.field--name-field-sensitivity .related-species-placeholder').length > 0) {
		$('.field--name-field-sensitivity .related-species-placeholder').replaceWith($('.field--name-field-similar-species'));
	}
	
	
	
	// Hide the similar species field if required
	if($('#edit-field-exploitation-extent input:checked').val() != 'relatives') {
		$('#edit-field-similar-species-wrapper').hide();
	}
	else {		
		$('a[href="#edit-group-nav-uses"]').parent().hide();
		$('a[href="#edit-group-demographics-nav').parent().hide();
	}
	
	// Show/hide the other fields
	$('#edit-field-exploitation-extent input').change(function() {
		if (this.value == 'relatives') {
			$('#usesformwrapper').hide('fast');
			$('#demographicsformwrapper').hide('fast');
			$('#edit-field-similar-species-wrapper').show('fast');
			
			// Take this out if necessary
			$('a[href="#edit-group-nav-uses"]').parent().hide('fast');
			$('a[href="#edit-group-demographics-nav').parent().hide('fast');
		}
		else {
			$('#usesformwrapper').show('fast');
			$('#demographicsformwrapper').show('fast');
			$('#edit-field-similar-species-wrapper input').val("");
			$('#edit-field-similar-species-wrapper').hide('fast');
			
			// Take this out if necessary
			$('a[href="#edit-group-nav-uses"]').parent().show('fast');
			$('a[href="#edit-group-demographics-nav').parent().show('fast');
		}
	});
});