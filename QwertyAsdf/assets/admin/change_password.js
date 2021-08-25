

$(document).ready(function () {

	$("#changePassword").validate({
		rules: {
			old_password: {
				required: true
			},
			new_password: {
				required: true
			},
			confirm_password: {
				equalTo: "#new_password"
			}
		},
		messages: {
			old_password: "Please Enter Current Password",
			new_password: "Please Enter New Password"
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
			//alert(1);
			$.ajax({
				type: "POST",
				url: "actions/changePassword.php",
				data: $("#changePassword").serialize(),
				success: function (obj) {
					//alert(obj);
					result = $.parseJSON(obj);
					if (result.response == 'y') {
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
		}
	});

});
