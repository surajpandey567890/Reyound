$(document).ready(function () {

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
                url: "actions/admin/update_status.php",
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
            url: 'actions/admin/update_status.php',
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
                        title: "Wow",
                        text: result.message,
                        type: "error"
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
