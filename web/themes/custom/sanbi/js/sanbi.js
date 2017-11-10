jQuery(document).ready(function($){
	// We are going to show the sensitivity status if possible. 
	// Note it is printing the sensitivity checkbox in the form, but it's hidden in the css so you won't see it on the browser.
	if($('.node-species-edit-form').length) { 
		if($('#edit-field-is-sensitive-value').is(":checked")) {
			$('h1.page-header').append(' <small>currently <button type="button" class="btn btn-danger btn-sm" disabled id="sspFlag" style="cursor: default"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span> Sensitive</button></small>');
		} else {
			$('h1.page-header').append(' <small>currently <button type="button" class="btn btn-info btn-sm" disabled id="sspFlag" style="cursor: default"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span> Not sensitive</button></small>');
		}
	}
		
	// Hide the N/A option for targeted demographic, it must be optional
	$('label[for=edit-field-targeted-demographics-none]').hide();
	
	// Tried to do this in the template but to no avail. 
	$('#sspFlag').appendTo("h1.page-header");
	
	if($('#edit-field-exploitation-extent input:checked').val() == 'uncertain') {
		$('a[href="#edit-group-demographics-nav').parent().hide();	
	}
	else if($('#edit-field-exploitation-extent input:checked').val() == 'none') {
		$('a[href="#edit-group-demographics-nav').parent().hide();	
	}
	
	// Show/hide the other fields
	$('#edit-field-exploitation-extent input').change(function() {
		// Make sure these are shown by default (only not shown for none value
		$('a[href="#edit-group-pop-size-nav').parent().show('fast');	
		$('a[href="#edit-group-regeneration-potential').parent().show('fast');	
		
		if(this.value == 'uncertain' || this.value == 'none') {
			$('a[href="#edit-group-demographics-nav').parent().hide('fast');	
			$('#edit-field-targeted-demographics input[type="radio"]:checked').each(function() {
				$(this).prop('checked', false);
			});
			$("#cke_edit-field-pop-vulnerability-refs-0-value iframe").contents().find("body").html('');
			
			if(this.value == 'none') {				
				// If a species is not exploited one should not fill in any other criteria. 
				$('a[href="#edit-group-pop-size-nav').parent().hide('fast');	
				$('a[href="#edit-group-regeneration-potential').parent().hide('fast');	
			}
			else {
				$('#edit-field-similar-species-wrapper').show('fast');
			}
		}
		else {
			$('a[href="#edit-group-demographics-nav').parent().show('fast');
		}
	});
});