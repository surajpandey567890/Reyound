
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
            url: 'actions/sub_banner/add.php',
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
                  url: 'actions/sub_banner/edit.php',
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
                      url: "actions/sub_banner/get.php",
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
            url: "actions/sub_banner/status.php",
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
                     url: "actions/sub_banner/delete.php",
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
});