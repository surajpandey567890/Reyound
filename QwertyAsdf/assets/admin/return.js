
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
            url: 'actions/return/add.php',
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

    /*  $("form#editForm").submit(function(e) {                 
              e.preventDefault();  
             debugger;
              var formData = new FormData(this);
              //alert("working");
              $.ajax({
                  url: 'actions/banner/edit.php',
                  type: 'POST',
                  data: formData,
                  success: function (data) {
                      // alert(data);
                      result = $.parseJSON(data);
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
                  cache: false,
                  contentType: false,
                  processData: false
              });
              return false;
          }); */

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

    /* $("#datatable-tabletools").on("click",".edit-element",function(){
                  
                  //  debugger;
                  var ID = $(this).attr('id');
                  //alert(ID);
                  $.ajax({
                      type: "POST",
                      url: "actions/banner/get.php",
                      data: {'ID':ID},
                      //timeout: 3000,
                       success: function(obj) 
                       {
                          // debugger;
                          $("#editContainer").slideDown();
                          $("#btnCancel").show();
                          
                          result = $.parseJSON(obj);
                          if(result.response == 'y')
                          {
                              $(document).scrollTop(0);  
                              document.getElementById('editForm').reset();
                              $("#ID").val(result.ID);
                              $("#type_id_edit").val(result.type_id_edit);
                          //    $("#id").val(result.id);
                              $("#word_edit").val(result.word_edit);
                              $("#en_meaning_edit").val(result.en_meaning_edit);
                              $("#ma_meaning_edit").val(result.ma_meaning_edit);
                          }
                          else
                          {
                              alert(result.message);
                          }
                      },
                      error: function() {alert('failed');}
                  });
                  return false;
              
      });*/

    $("#datatable-tabletools").on("click", ".status-element", function () {

        debugger;
        var ID = $(this).attr('id');
        //alert(ID);
        $.ajax({
            type: "POST",
            url: "actions/return/status.php",
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
    /*$("#datatable-tabletools").on("click",".view-role-pincode",function(){
                
                debugger;
                var ID = $(this).attr('id');
                alert(ID);
                return false;
                
                $.ajax({
                    type: "POST",
                    url: "actions/products/get_role.php",
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

    /* $("#datatable-tabletools").on("click",".remove-element",function(){
       
             if(confirm("Are you sure ?")){
                 var ID = $(this).attr('id');
                 ele = $(this);
                 $.ajax({
                     type: "POST",
                     url: "actions/banner/delete.php",
                     data: {'ID':ID},
                     //timeout: 3000,
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
             }
         });*/
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
                url: "actions/return/update_status.php",
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
            url: 'actions/return/update_status.php',
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
                    });
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
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
        message: {
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

});