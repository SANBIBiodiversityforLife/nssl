jQuery(document).ready(function($){
	// Tried to do this in the template but to no avail. 
	$('#sspFlag').appendTo("h1.page-header");
	if ($('.field--name-field-sensitivity .related-species-placeholder').length > 0) {
		$('.field--name-field-sensitivity .related-species-placeholder').replaceWith($('.field--name-field-similar-species'));
	}
	
	// Hide the similar species field if required
	$('#edit-field-similar-species-wrapper').hide();
	if($('#edit-field-exploitation-extent input:checked').val() == 'uncertain') {
		$('#edit-field-similar-species-wrapper').show();
		$('a[href="#edit-group-demographics-nav').parent().hide();	
	}
	else if($('#edit-field-exploitation-extent input:checked').val() == 'none') {
		$('a[href="#edit-group-demographics-nav').parent().hide();	
	}
	
	// Show/hide the other fields
	$('#edit-field-exploitation-extent input').change(function() {
		if(this.value == 'uncertain' || this.value == 'none') {
			$('a[href="#edit-group-demographics-nav').parent().hide('fast');	
			$('#edit-field-targeted-demographics input[type="radio"]:checked').each(function() {
				$(this).prop('checked', false);
			});
			$("#cke_edit-field-pop-vulnerability-refs-0-value iframe").contents().find("body").html('');
			
			if(this.value == 'none') {
				$('#edit-field-similar-species-wrapper').hide('fast');	
				$('#edit-field-similar-species-wrapper input').val("");	
			}
			else {
				$('#edit-field-similar-species-wrapper').show('fast');
			}
		}
		else {
			$('a[href="#edit-group-demographics-nav').parent().show('fast');
			$('#edit-field-similar-species-wrapper').hide('fast');
			$('#edit-field-similar-species-wrapper input').val("");
		}
	});
});