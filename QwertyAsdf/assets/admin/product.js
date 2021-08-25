$(document).ready(function(){
    //alert(1);
    $("#addForm").validate({
        rules:{
            pincode:{
                required:true
            },
         
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        },
      
       
    });   
   
    $("form#addForm").submit(function(e) {                
            e.preventDefault(); 
            debugger;
            var formData = new FormData(this);
            $.ajax({
                url: 'actions/product/add',
                type: 'POST',
                data: formData,
                success: function (data) {
                    debugger;
                    result = $.parseJSON(data);
                     if(result.response == 'y')
                     {
                        swal({
                            title: "Wow",
                            text: result.message,
                            type: "success"
                        }).then(function () {
                            location.reload();
                        });
                     }
                     else{
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
        rules:{
            pincode:{
                required:true
            },
         
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        },
      
       
    });   
   
    $("form#editForm").submit(function(e) {                
            e.preventDefault(); 
            debugger;
            var formData = new FormData(this);
            var formData = new FormData(this);
            var description = CKEDITOR.instances['description_edit'].getData();
            formData.append('description_edit',description);
            var description = CKEDITOR.instances['short_description_edit'].getData();
            formData.append('short_description_edit',description);
            //alert("working");
            $.ajax({
                url: 'actions/product/edit',
                type: 'POST',
                data: formData,
                success: function (data) {
                    debugger;
                    result = $.parseJSON(data);
                    if(result.response == 'y')
                    {
                        swal({
                            title: "Wow",
                            text: result.message,
                            type: "success"
                        }).then(function () {
                            location.reload();
                        });
                    }
                    else
                    {
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
   
    $("#addToTable").click(function(){
   
            $("#addContainer").slideDown();
            $("#addphotos").slideUp();
            $("#editContainer").slideUp();
            $(this).hide();
            $("#btnCancel").show();
        });

    $("#edittable").click(function(){
   
            $("#editContainer").slideDown();
            $("#addphotos").slideUp();
            $("#addContainer").slideUp();
            $(this).hide();
            $("#btnCancel").show();
        });

    $("#addtophotos").click(function(){
   
            $("#addphotos").slideDown();
            $("#addContainer").slideUp();
    });
   
    $("#btnCancel").click(function(){
            $("#addContainer").slideUp();
            $("#editContainer").slideUp();
            $(this).hide();
            $("#addToTable").show();
          
        });
   
    $("#datatable-tabletools").on("click",".edit-element",function(){
               
                debugger;
                var ID = $(this).attr('id');
                //alert(ID);
                $.ajax({
                    type: "POST",
                    url: "actions/product/get",
                    data: {'ID':ID},
                    //timeout: 3000,
                     success: function(obj)
                     {
                        debugger;
                        $("#editContainer").slideDown();
                       
                        $(window).scrollTop(0);
                        result = $.parseJSON(obj);
                       
                        $("#product_id").val(result.product_id);
                        $("#cate_id_edit").html(result.category_option);
                        $("#sub_cate_id_edit").html(result.subcategory_option);
                        $("#sub_main_cate_id_edit").html(result.submaincategory_option);
                        $("#name_edit").val(result.name);
                        $("#product_price_edit").val(result.product_price);
                        $("#offer_price_edit").val(result.offer_price);
                        $("#stock_edit").val(result.stock);
                        $("#hsn_code_edit").val(result.hsn_code);
                        $("#gst_id_edit").html(result.gst_option);
                        $("#colour_id_edit").html(result.colour_option);
                        $("#size_id_edit").html(result.size_option);
                        CKEDITOR.instances['short_description_edit'].setData(result.short_description);
                        CKEDITOR.instances['description_edit'].setData(result.long_description);
                    },
                    error: function() {alert('failed');}
                });
                return false;
           
    });
   
    $("#datatable-tabletools").on("click",".status-element",function(){
               
                debugger;
                var ID = $(this).attr('id');
                //alert(ID);
                $.ajax({
                    type: "POST",
                    url: "actions/product/status",
                    data: {'ID':ID},
                    //timeout: 3000,
                     success: function(obj)
                     {
                        debugger;
                        result = $.parseJSON(obj);
                        if(result.response == 'y')
                        {
                            swal({
                                title: "Wow",
                                text: result.message,
                                type: "success"
                            }).then(function () {
                                location.reload();
                            });
                        }
                        else
                        {
                            swal({
                                title: "Oh No!",
                                text: result.message,
                                type: "error"
                            });
                        }
                      
                    },
                    error: function() {alert('failed');}
                });
           
    });
       
    $("#datatable-tabletools").on("click",".remove-element",function(){
     
            if(confirm("Are You Sure ?")){
                var ID = $(this).attr('id');
                ele = $(this);
                $.ajax({
                    type: "POST",
                    url: "actions/product/delete",
                    data: {'ID':ID},
                    //timeout: 3000,
                     success: function(obj)
                     {
                         debugger;
                        result = $.parseJSON(obj);
                        if(result.response == 'y')
                        {
                            swal({
                                title: "Wow",
                                text: result.message,
                                type: "success"
                            }).then(function () {
                                location.reload();
                            });
                        }
                        else
                        {
                            swal({
                                title: "Oh No!",
                                text: result.message,
                                type: "error"
                            }).then(function () {
                                location.reload();
                            });
                        }
                      
                    },
                    error: function() {alert('failed');}
                });
            }
        });
       
    $("#cate_id").change(function(){
       
        var ID=$("#cate_id").val();
        $.ajax({
                    type: "POST",
                    url: "actions/sub_main_category/get_subcat",
                    data: {'ID':ID},
                    //timeout: 3000,
                     success: function(obj)
                     {
                        
                         result = $.parseJSON(obj);
                        if(result.response == 'y')
                        {
                            $("#sub_cat_field").show();
                            //$("#sub_cat_field").css("display","block");
                            $("#sub_cate_id").html(result.subcate_options);
                        }
                        else
                        {  
                            alert(result.message);
                            $("#sub_cat_field").hide();
                           
                        }
                      
                    },
                    error: function() {alert('failed');}
                });
    });   
   
    $("#sub_cate_id").change(function(){
       
        var ID=$("#sub_cate_id").val();
        $.ajax({
                    type: "POST",
                    url: "actions/sub_main_category/get_submain_cat",
                    data: {'ID':ID},
                    //timeout: 3000,
                     success: function(obj)
                     {
                        result = $.parseJSON(obj);
                        if(result.response == 'y')
                        {
                            $("#sub_main_cat_field").show();
                            //$("#sub_cat_field").css("display","block");
                            $("#sub_main_cate_id").html(result.submain_cate_options);
                        }
                        else
                        {  
                            alert('Sub main category not found, Please add repective sub main category');
                            $("#sub_main_cat_field").hide();
                           
                        }
                      
                    },
                    error: function() {alert('failed');}
                });
    });   
   
    $("#datatable-tabletools").on("click",".view-element",function(){
     
                debugger;
                var ID = $(this).attr('id');
                //alert(ID);
                ele = $(this);
                $.ajax({
                    type: "POST",
                    url: "actions/product/get_description",
                    data: {'ID':ID},
                    //timeout: 3000,
                     success: function(obj)
                     {
                        debugger;
                        $("#descpModal").modal('show');
                        result = $.parseJSON(obj);
                        console.log(result);
                        if(result.response == 'y')
                        {
                              //$("#titl").html("<b>Title :</b> "+result.title);
                              $("#desp").html("");
                              $("#short_desp").html("");
                             
                              if(result.short_description!="")
                              {
                                    $("#short_desp").html("<b>Short Description :</b> "+result.short_description+"<br>");
                              }
                              else
                              {
                                  $("#short_desp").hide();
                              }
                             
                              if(result.description!="")
                              {
                                    $("#desp").html("<b>Long Description :</b> "+result.description);
                              }
                              else
                              {
                                  $("#desp").css('display','none');
                              }
                             
                              //alert(result.message);
                              //location.reload();
                        }
                        else
                        {
                             alert(result.message);
                        }
                      
                    },
                    error: function() {alert('failed');}
                });
                return false;
        }); 
       
       
    /*$("#cate_id_edit").change(function(){
       
        var ID=$("#cate_id_edit").val();
        $.ajax({
                    type: "POST",
                    url: "actions/sub_main_category/get_subcat",
                    data: {'ID':ID},
                    //timeout: 3000,
                     success: function(obj)
                     {
                        
                         result = $.parseJSON(obj);
                        if(result.response == 'y')
                        {
                            //$("#sub_cat_field").show();
                            //$("#sub_cat_field").css("display","block");
                            $("#sub_cate_id_edit").html(result.subcate_options);
                        }
                        else
                        {  
                            alert('Subcategory not found, Please add repective subcategory');
                            $("#sub_cat_field").hide();
                           
                        }
                      
                    },
                    error: function() {alert('failed');}
                });
    }); */

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
                url: "actions/product/update_status.php",
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

    $("form#rejectreason").submit(function (e) {
        e.preventDefault();
        debugger;
        var formData = new FormData(this);
        $.ajax({
            url: 'actions/product/update_status.php',
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


   
    $("#sub_cate_id_edit").change(function(){
       
        var ID=$("#sub_cate_id_edit").val();
        $.ajax({
                    type: "POST",
                    url: "actions/sub_main_category/get_submain_cat",
                    data: {'ID':ID},
                    //timeout: 3000,
                     success: function(obj)
                     {
                        result = $.parseJSON(obj);
                        if(result.response == 'y')
                        {
                            $("#sub_main_cat_field1").show();
                            //$("#sub_cat_field").css("display","block");
                            $("#sub_main_cate_id_edit").html(result.submain_cate_options);
                        }
                        else
                        {  
                            alert('Sub main category not found, Please add repective sub main category');
                            $("#sub_main_cate_id_edit").hide();
                           
                        }
                      
                    },
                    error: function() {alert('failed');}
                });
    });         
});
