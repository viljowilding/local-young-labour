var alertCode = '<div id="invalid-postcode-alert" class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Oh dear!</strong> The postcode you entered is invalid, please check again!</div>';

function checkValid(postcode) {
	var regPostcode = /^([a-zA-Z]){1}([0-9][0-9]|[0-9]|[a-zA-Z][0-9][a-zA-Z]|[a-zA-Z][0-9][0-9]|[a-zA-Z][0-9]){1}([ ])([0-9][a-zA-z][a-zA-z]){1}$/;
	if(regPostcode.test(postcode) == false) {
		if (!$('#invalid-postcode-alert').length) {
			$('#postcode-form').prepend(alertCode);
			return false;
		}
	}
}