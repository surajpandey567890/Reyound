
$("form#signup").submit(function (e) {
    e.preventDefault();
    //debugger;
    var formData = new FormData(this);
    //alert("working");
    $.ajax({
        url: 'actions/signup/personal',
        type: 'POST',
        data: formData,
        success: function (data) {
            //debugger;
            result = $.parseJSON(data);
            if (result.response == 'y') {
                postForm('company', result, 'post');

            } else {
                swal("Oh ho!", result.message, "error");
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
});



$('#otpgenerate').click(function () {
    $.ajax({
        url: 'actions/otp/generate',
        type: 'POST',
        data: {
            mobile: $('#mobile').val(),
        },
        success: function (data) {
            result = $.parseJSON(data);
            if (result.response == 'y') {
                $("#otpmodel").modal('show');
            } else {
                //alert(result.message);
                swal("Oh no!", result.message, "error");
            }
        }
    })
});
$('#resendotp').click(function () {
    $.ajax({
        url: 'actions/otp/generate',
        type: 'POST',
        data: {
            mobile: $('#mobile').val(),
        },
        success: function (data) {
            result = $.parseJSON(data);
            if (result.response == 'y') {
                swal("Successful", 'OTP Resend Success', "success");
            } else {
                swal("Oh No!", result.message, "error");
            }
        }
    })
});
$("form#otpverification").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: 'actions/otp/verifyotp',
        type: 'POST',
        data: formData,
        success: function (data) {
            //debugger;
            result = $.parseJSON(data);
            if (result.response == 'y') {
                swal("Successful", result.message, "success");
                $("#mobile").prop("readonly", true);
                $("#otpgenerate").prop("onclick", null).off("click");
                $("#otpmodel").modal('hide');
            } else {
                //alert(result.message);
                swal("Oh ho!", result.message, "error");
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
});

function postForm(path, params, method) {
    method = method || 'post';

    var form = document.createElement('form');
    form.setAttribute('method', method);
    form.setAttribute('action', path);

    for (var key in params) {
        if (params.hasOwnProperty(key)) {
            var hiddenField = document.createElement('input');
            hiddenField.setAttribute('type', 'hidden');
            hiddenField.setAttribute('name', key);
            hiddenField.setAttribute('value', params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}