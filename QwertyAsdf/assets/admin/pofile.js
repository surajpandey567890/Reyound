// Personal Information

$('#EditPersonal').click(function () {
    $("#PersonalEdit").modal('show');
});
$("form#ModifyPersonal").submit(function (e) {
    e.preventDefault();
    //debugger;
    var formData = new FormData(this);
    $.ajax({
        url: 'actions/profile/personal',
        type: 'POST',
        data: formData,
        success: function (data) {
            //debugger;
            result = $.parseJSON(data);
            if (result.response == 'y') {
                $("#PersonalEdit").modal('hide');;
                swal({
                    title: "Wow!",
                    text: result.message,
                    type: "success"
                }).then(function () {
                    location.reload();
                });
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

// Company Information

$('#EditCompany').click(function () {
    $("#CompanyEdit").modal('show');
});
$("form#ModifyCompany").submit(function (e) {
    e.preventDefault();
    //debugger;
    var formData = new FormData(this);
    $.ajax({
        url: 'actions/profile/company',
        type: 'POST',
        data: formData,
        success: function (data) {
            //debugger;
            result = $.parseJSON(data);
            if (result.response == 'y') {
                $("#PersonalEdit").modal('hide');;
                swal({
                    title: "Wow!",
                    text: result.message,
                    type: "success"
                }).then(function () {
                    location.reload();
                });
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


// Banking Information

$('#EditBanking').click(function () {
    $("#BankingEdit").modal('show');
});
$("form#ModifyBanking").submit(function (e) {
    e.preventDefault();
    //debugger;
    var formData = new FormData(this);
    $.ajax({
        url: 'actions/profile/banking',
        type: 'POST',
        data: formData,
        success: function (data) {
            //debugger;
            result = $.parseJSON(data);
            if (result.response == 'y') {
                $("#PersonalEdit").modal('hide');;
                swal({
                    title: "Wow!",
                    text: result.message,
                    type: "success"
                }).then(function () {
                    location.reload();
                });
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