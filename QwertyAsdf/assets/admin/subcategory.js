
$(document).ready(function () {
    //alert(1);

    //title validation
    $("#link").change(function () {

        debugger;
        //Regex for Valid Characters i.e. Alphabets, Numbers and Space.
        var regex = /^[A-Za-z0-9 ]+$/

        //Validate TextBox value against the Regex.
        var isValid = regex.test(document.getElementById("link").value);
        if (!isValid) {
            alert("Title must not include any special symbol (@,#,$,%,^,&,*,:,/,+,-,_)");
            $("#link").val("");
            $("#link").focus();
        }
        else {
            //do nothing
            /* alert("Does not contain Special Characters.");
             $("#eng_title").val("");
             $("#eng_title").focus();*/
        }
        return isValid;
    });

    $("#addForm").validate({
        rules: {
            cate_id: {
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
        //debugger;
        var formData = new FormData(this);
        //alert("working");
        $.ajax({
            url: 'actions/sub_category/add',
            type: 'POST',
            data: formData,
            success: function (data) {
                //debugger;
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
            url: 'actions/sub_category/edit',
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
        var ID = $(this).attr('id');
        //alert(ID);
        $.ajax({
            type: "POST",
            url: "actions/sub_category/get",
            data: { 'ID': ID },
            //timeout: 3000,
            success: function (obj) {
                debugger;
                result = $.parseJSON(obj);
                if (result.response == 'y') {
                    $("#editContainer").slideDown();

                    $("#sub_cat_id").val(result.id);
                    $("#name_edit").val(result.name);
                    $("#cate_id_edit").html(result.cate_html);
                }
                else {
                    alert(result.message);
                }
            },
            error: function () { alert('failed'); }
        });
        return false;

    });

    $("#datatable-tabletools").on("click", ".update-element", function () {

        debugger;
        var ID = $(this).attr('id');
        //alert(ID);
        $.ajax({
            type: "POST",
            url: "actions/sub_category/status",
            data: { 'ID': ID },
            //timeout: 3000,
                success: function (obj) {
                debugger;
                result = $.parseJSON(obj);
                if (result.response == 'y') {
                    swal({
                        title: "Wow!",
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
    });

    $("#datatable-tabletools").on("click", ".remove-element", function () {

        if (confirm("Are You Sure ?")) {
            var ID = $(this).attr('id');
            ele = $(this);
            $.ajax({
                type: "POST",
                url: "actions/sub_category/delete",
                data: { 'ID': ID },
                //timeout: 3000,
                success: function (obj) {
                    debugger;
                    result = $.parseJSON(obj);
                    if (result.response == 'y') {
                        swal({
                            title: "Wow!",
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
});