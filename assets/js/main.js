
$(document).on("submit", "form.js-register", function (event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form); 

	var data = {
		email: $("input[type='email']", _form).val(),
		password: $("input[type='password']", _form).val()
	};

	if (data.email.length < 15) {
		_error.text("Please enter a valid email addres").show();
		return false;
	} else if (data.password.length < 8) {
		_error.text("Please enter a passpharse that is at least 11 chacarcters long.").show();
		return false;
	}

	_error.hide();

	console.log(data);

	alert('form was submitted');

	return false;
})