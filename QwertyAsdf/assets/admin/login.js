$(document).ready(function () {

	$("#loginform").validate({
		rules: {

			username: {
				required: true,
				//email:true
			},
			pwd: {
				required: true
			}
		},
		messages: {
			pwd: "Please enter password",
			username: { required: "Please enter Username" }

		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight: function (element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		},
		submitHandler: function () {

			$.ajax({
				type: "POST",
				url: "actions/signin.php",
				data: $("#loginform").serialize(),
				timeout: 3000,
				success: function (obj) {
					result = $.parseJSON(obj);
					if (result.response == 'y') {
						window.location = "index.php";
					}
					else {
						swal({
							title: "Oh No!",
							text: result.message,
							type: "error"
						}).then(function () {
							location.reload();
						});
					}
				},
				error: function () { alert('failed'); }
			});

			return false;
		}
	});


	/******************* recover form **********************/

	$("#recoverform").validate({
		rules: {

			username: {
				required: true,
				//username:true
			}
		},
		messages: {

			username: { username: "Enter valid Username", required: "Please enter Username" }

		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight: function (element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		},
		submitHandler: function () {
			$.ajax({
				type: "POST",
				url: "actions/passwordrecovery/passwordrecovery.php",
				data: $("#recoverform").serialize(),
				timeout: 3000,
				success: function (obj) {

					result = $.parseJSON(obj);

					if (result.response == 'y') {
						$("#recoverform input[type='email']").val("");
						swal({
							title: "Wow",
							text: result.message,
							type: "success"
						}).then(function () {
							location.reload();
						});
					}
					else {
						swal({
							title: "Oh No!",
							text: result.message,
							type: "error"
						}).then(function () {
							location.reload();
						});
					}
				},
				error: function () { alert('failed'); }
			});

			return false;
		}
	});


	$("#passwordForm").validate({
		rules: {

			old_password: {
				required: true
			},
			new_password: {
				required: true
			}
		},
		messages: {
			old_password: "Please enter old password",
			new_password: { required: "Please enter new password" }

		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight: function (element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		},
		submitHandler: function () {
			$.ajax({
				type: "POST",
				url: "actions/changePassword.php",
				data: $("#passwordForm").serialize(),
				//timeout: 3000,
				success: function (obj) {
					//console.log(obj);
					result = $.parseJSON(obj);
					if (result.response == 'y') {
						alert(result.message);
						window.location = "dashboard.php";
					}
					else {
						alert(result.message);
					}
				},
				error: function () { alert('failed'); }
			});

			return false;
		}
	});



});
