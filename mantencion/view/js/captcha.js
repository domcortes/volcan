grecaptcha.ready(function() {
	grecaptcha.execute('6Lcvs7QbAAAAAJs5Irwyqbd6zRj-B6r7ju_O8yXL', {action: 'submit'}).then(function(token) {
		if (token) {
			document.getElementById('recaptcha').value = token;
			//console.log("token", token);
		}
	});
});
