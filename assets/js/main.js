$(document).on("submit", "form.js-register", function (event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form); 

	var dataObj = {
		email: $("input[type='email']", _form).val(),
		password: $("input[type='password']", _form).val()
	};


	if (dataObj.email.length < 6) {
		_error.text("Please enter a valid email addres").show();
		return false;
	} else if (dataObj.password.length < 8) {
		_error.text("Please enter a passpharse that is at least 11 chacarcters long.").show();
		return false;
	}

	_error.hide();

	$.ajax({

		type: 'POST',
		url: '/php_login_system/ajax/register.php',
		data: dataObj,
		dataType: 'json',
		async: true
	})

	.done(function ajaxDone (data) {
		console.log(data);
		if (data.redirect !== undefined) {
			window.location = data.redirect; 
		} else if ( data.error !== undefined) {
			_error.text(data.error).show();
		}

		alert(data.name);
	})

	.fail(function ajaxFailed(e) {
		console.log(e);
	})
	.always(function ajaxAlwaysDoThis (data) {
		console.log('Always');
	})

	return false;
})

//
.on("submit", "form.js-login", function (event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form); 

	var dataObj = {
		email: $("input[type='email']", _form).val(),
		password: $("input[type='password']", _form).val()
	};


	if (dataObj.email.length < 6) {
		_error.text("Please enter a valid email addres").show();
		return false;
	} else if (dataObj.password.length < 8) {
		_error.text("Please enter a passpharse that is at least 11 chacarcters long.").show();
		return false;
	}

	_error.hide();

	$.ajax({

		type: 'POST',
		url: (_form.hasClass('js-login') ? '/php_login_system/ajax/login.php' : '/php_login_system/ajax/register.php' ,
		data: dataObj,
		dataType: 'json',
		async: true
	})

	.done(function ajaxDone (data) {
		console.log(data);
		if (data.redirect !== undefined) {
			window.location = data.redirect; 
		} else if ( data.error !== undefined) {
			_error.text(data.error).show();
		}

		alert(data.name);
	})

	.fail(function ajaxFailed(e) {
		console.log(e);
	})
	.always(function ajaxAlwaysDoThis (data) {
		console.log('Always');
	})

	return false;
})