
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
        var description = CKEDITOR.instances['description'].getData();
        var formData = new FormData(this);
        formData.append('description', description);
        $.ajax({
            url: 'actions/pikanchi_mahitis/add',
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
        var description = CKEDITOR.instances['description_edit'].getData();
        var formData = new FormData(this);
        formData.append('description_edit', description);
        //alert("working");
        $.ajax({
            url: 'actions/pikanchi_mahitis/edit',
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

        // debugger;
        var ID = $(this).attr('id');
        //alert(ID);
        $.ajax({
            type: "POST",
            url: "actions/pikanchi_mahitis/get",
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
                    $("#cp_id").val(result.id);
                    $("#title_edit").val(result.title);
                    $("#tag_id").html(result.tag_option);
                    //$("#description_edit").html(result.description);
                    CKEDITOR.instances['description_edit'].setData(result.description);
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
        return false;

    });

    $("#datatable-tabletools").on("click", ".status-element", function () {

        debugger;
        var ID = $(this).attr('id');
        //alert(ID);
        $.ajax({
            type: "POST",
            url: "actions/pikanchi_mahitis/status",
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

    });
    /*$("#datatable-tabletools").on("click",".view-role-category",function(){
                
                debugger;
                var ID = $(this).attr('id');
                alert(ID);
                return false;
                
                $.ajax({
                    type: "POST",
                    url: "actions/products/get_role",
                    data: {'ID':ID},
                     success: function(obj) 
                     {
                        debugger;
                        result = $.parseJSON(obj);
                        if(result.response == 'y')
                        {
                              alert(result.message);
                              location.reload();
                        }
                        else
                        {
                             
                             alert(result.message);
                        }
                       
                    },
                    error: function() {alert('failed');}
                });
            
    });*/

    $("#datatable-tabletools").on("click", ".remove-element", function () {

        if (confirm("Are You Sure ?")) {
            var ID = $(this).attr('id');
            ele = $(this);
            $.ajax({
                type: "POST",
                url: "actions/pikanchi_mahitis/delete",
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



    $(".remove-single-image").click(function () {

        debugger;
        if (confirm("Are You Sure ?")) {
            var ID = $(this).attr('id');
            ele = $(this);
            $.ajax({
                type: "POST",
                url: "actions/product/delete_image",
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