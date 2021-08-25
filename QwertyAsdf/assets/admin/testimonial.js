$(document).ready(function () {

    $("#addForm").validate({
        rules: {
            image: {
                required: true
            },

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
    });

    $("form#addForm").submit(function (e) {
        e.preventDefault();
        debugger;
        var formData = new FormData(this);
        $.ajax({
            url: 'actions/testimonial/add',
            type: 'POST',
            data: formData,
            success: function (data) {
                debugger;
                result = $.parseJSON(data);
                if (result.response == 'y') {
                    swal({
                        title: "Wow",
                        text: result.message,
                        type: "success"
                    }).then(function (isConfirm) {
                        location.reload();
                    });
                }
                else {

                    swal({
                        title: "Oh No!",
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

    $("#editForm").validate({
        rules: {
            pincode: {
                required: true
            },

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


    });

    $("form#editForm").submit(function (e) {
        e.preventDefault();
        debugger;
        var formData = new FormData(this);
        //alert("working");
        $.ajax({
            url: 'actions/testimonial/edit',
            type: 'POST',
            data: formData,
            success: function (data) {
                debugger;
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
                        title: "Oh No",
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

    $("#addToTable").click(function () {

        $("#addContainer").slideDown();
        $("#addphotos").slideUp();
        $("#editContainer").slideUp();
        $(this).hide();
        $("#btnCancel").show();
    });

    $("#edittable").click(function () {

        $("#editContainer").slideDown();
        $("#addphotos").slideUp();
        $("#addContainer").slideUp();
        $(this).hide();
        $("#btnCancel").show();
    });

    $("#addtophotos").click(function () {

        $("#addphotos").slideDown();
        $("#addContainer").slideUp();
    });

    $("#btnCancel").click(function () {
        $("#addContainer").slideUp();
        $("#editContainer").slideUp();
        $(this).hide();
        $("#addToTable").show();

    });

    $("#datatable-tabletools").on("click", ".edit-element", function () {

        debugger;
        var ID = $(this).attr('ID');
        //alert(ID);
        $.ajax({
            type: "POST",
            url: "actions/testimonial/get",
            data: { 'ID': ID },
            //timeout: 3000,
            success: function (obj) {
                debugger;
                $("#editContainer").slideDown();
                $("#btnCancel").show();

                result = $.parseJSON(obj);
                if (result.response == 'y') {
                    $(document).scrollTop(0);
                    document.getElementById('editForm').reset();
                    $("#description_edit").val(result.description);
                    $("#ID").val(result.ID);
                    $("#author_edit").val(result.author);
                }
                else {
                    alert(result.message);
                }
            },
            error: function () { alert('failed'); }
        });
        return false;

    });




    $("#datatable-tabletools").on("click", ".remove-element", function () {

        if(confirm("Are you sure?"))
        {
            var ID = $(this).attr('id');
            ele = $(this);
            $.ajax({
                type: "POST",
                url: "actions/testimonial/delete",
                data: { 'ID': ID },
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
                        });
                    }

                },
                error: function () { alert('failed'); }
            });

        }
    });
});
