
$(document).ready(function () {
    $("#datatable-tabletools").on("click", ".view-element", function () {
        debugger;
        var ID = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "actions/product/get_description",
            data: { 'ID': ID },
            success: function (obj) {
                debugger;
                result = $.parseJSON(obj);
                console.log(result);
                if (result.response == 'y') {

                    $("#descpModal").modal('show');
                    $("#titl").html("<b>Title :</b> " + result.title);
                    if (result.short_description != "") {
                        $("#short_desp").html("<b>Short Description: </b> " + result.short_description + "<br>");
                    }
                    else {
                        $("#short_desp").hide();
                    }

                    if (result.description != "") {
                        $("#desp").html("<b>Long Description: </b> " + result.description);
                    }
                    else {
                        $("#desp").css('display', 'none');
                    }
                }
                else {
                    alert(result.message);
                }

            },
            error: function () { alert('failed'); }
        });
        return false;
    });

    $(".withdraw_status").change(function () {
        debugger;
        var status = $(this).val();
        var wid = $(this).data('wid');

        if (status == 2) {
            //display modal and insert reject reason
            $("#wid").val(wid);
            $("#status").val(status);
            $('#exampleModal').modal('show');
        }
        else if (status == 1) {
            //approved
            $.ajax({
                type: "POST",
                url: "actions/claims/update_status.php",
                data: { 'wid': wid, 'status': status },
                //timeout: 3000,
                success: function (obj) {
                    debugger;
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
        else {
            //do nothing
        }
    });

    $("form#addForm").submit(function (e) {
        e.preventDefault();
        debugger;
        var formData = new FormData(this);
        $.ajax({
            url: 'actions/claims/update_status.php',
            type: 'POST',
            data: formData,
            success: function (data) {
                //  alert(data);
                result = $.parseJSON(data);
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
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    });

});

$("#datatable-tabletools").on("click", ".raise-claims", function () {
    var ID = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "actions/claims/getreturndata",
        data: { 'ID': ID },
        success: function (obj) {
            result = $.parseJSON(obj);
            console.log(result);
            if (result.response == 'y') {
                $('#orderNumber').html(result.orderNumber);
                $('#returnDate').html(result.returnDate);
                $('#returnReason').html(result.returnReason);
                $('#odrNumber').val(result.orderNumber);
                $("#RaiseClaim").modal('show');
            }
            else {
                swal("Oh No!", result.message, "error");
            }
        },
        error: function () { swal("Oh No!", "failed", "error"); }
    });
    return false;
});

$("#fileClaim").validate({
    rules: {
        claimShortDescp: "required",
        claimLongDescp: "required"
    },
    messages: {
        claimShortDescp: "Claim Short Description Required",
        claimLongDescp: "Claim Long Description Required"
    },

    submitHandler: function (form, e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById('fileClaim'));
        $.ajax({
            url: 'actions/claims/add.php',
            type: 'POST',
            data: formData,
            success: function (data) {
                alert(data);
                result = $.parseJSON(data);
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
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    }
});