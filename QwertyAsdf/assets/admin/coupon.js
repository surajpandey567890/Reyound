
$(document).ready(function(){
       $("#coup").hide();
        
        $("#addForm").validate({
            rules:{
                coupon:{
                    required:true
                },
                sdate:{
                    required:true
                },
                edate:{
                    required:true
                },
                minorder:{
                    required:true
                },
                percent:{
                    required:true
                },
                no_of_time_use:{
                    required:true
                },
                valueType:{
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
            submitHandler: function() {
                 //alert(1);
                debugger;
            var sdate = new Date($("#sdate").val());
            var edate = new Date($("#edate").val()); 
            var minorder = $("#minorder").val();
            var percent = $("#percent").val(); 
            var valueType =$("#valueType").val();  
            
            
            var from = $("#sdate").val().split("-");
            var s= new Date(from[2], from[1] - 1, from[0]);
            
            var to = $("#edate").val().split("-");
            var t= new Date(to[2], to[1] - 1, to[0]);
            
            //alert(percent+" - "+valueType);
            
            if(s < t)
            {
               if(valueType == 'Bucks')
               {
                    if(Number(percent)<=Number(minorder))
                    {
                       $.ajax({
                            type: "POST",
                            url: "actions/coupon/add",
                            data:  $("#addForm").serialize(),
                            success: function(obj) {
                             //alert(obj);
                             result = $.parseJSON(obj);
                            if(result.response == 'y'){
                                alert(result.message);
                                location.reload();
                            }
                            else{
                                alert(result.message);
                            }
                                },
                        error: function() {alert('failed');}
                        });
                    }
                    else
                   {
                        alert("Minimum order amount must be greater than discount amount");
                        exit(0);
                   }
             
               }
               else if(valueType ==  'Percent')
               {
                    
                   $.ajax({
                        type: "POST",
                        url: "actions/coupon/add",
                        data:  $("#addForm").serialize(),
                        success: function(obj) {
                             //alert(obj);
                             result = $.parseJSON(obj);
                            if(result.response == 'y'){
                                alert(result.message);
                                location.reload();
                            }
                            else{
                                alert(result.message);
                            }
                                },
                        error: function() {alert('failed');}
                        });
               }
               
            }
            else
            {
                alert("Start date should be older then expiry date");
                exit(0);
            }
            
                
                
             
            }
        });
       
        
        // $("#addForm").validate({
        //     rules:{
        //         coupon:{
        //             required:true
        //         },
        //         edate:{
        //             required:true
        //         },
        //         minorder:{
        //             required:true
        //         },
        //         percent:{
        //             required:true
        //         },
        //         no_of_time_use:{
        //             required:true
        //         },
        //         valueType:{
        //             required:true
        //         },
        //     },
        //     errorClass: "help-inline",
        //     errorElement: "span",
        //     highlight:function(element, errorClass, validClass) {
        //         $(element).parents('.control-group').addClass('error');
        //     },
        //     unhighlight: function(element, errorClass, validClass) {
        //         $(element).parents('.control-group').removeClass('error');
        //         $(element).parents('.control-group').addClass('success');
        //     },
        //     submitHandler: function() {
        //         $.ajax({
        //         type: "POST",
        //         url: "actions/coupon/add",
        //         data:  $("#addForm").serialize(),
        //         success: function(obj) {
        //                     result = $.parseJSON(obj);
        //                     if(result.response == 'y'){
        //                         alert(result.message);
        //                         location.reload();
        //                     }
        //                     else{
        //                         alert(result.message);
        //                     }
        //                 },
        //         error: function() {alert('failed');}
        //         });
        //     }
        // });
        
        $("#addToTable").click(function(){
    
            $("#addContainer").slideDown();
            $("#editContainer").slideUp();
            $(this).hide();
            $("#btnCancel").show();
        });
    
        
        $("#btnCancel").click(function(){
            $("#addContainer").slideUp();
            $("#editContainer").slideUp();
            $(this).hide();
            $("#addToTable").show();
            // $("#addContainer").show();
            // $("#addContainer").slideDown();
            // $("#editContainer").slideUp();
            // $(this).hide();
            //$("#addToTable").show();
        });
    
        
        $("#tableContainer").on("click",".edit-element",function(e){
            e.preventDefault();
            var id = $(this).attr('id');
            $("#addContainer").slideUp();
            $("#btnCancel").show();		
            $("#addToTable").hide();
            //alert (id);
          
            $.ajax({
                type: "POST",
                url: "actions/coupon/get",
                data: {'id':id},
                success: function(obj) {
                    //alert(obj);
                    result = $.parseJSON(obj);
                     if(result.response == 'y'){
                         document.body.scrollTop = 0; // For Safari
                        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                        $("#editContainer").slideDown();
                         $("#addContainer").slideUp();
                        $("#editForm input[name='id']").val(result.id);
                        $("#editForm input[name='coupon']").val(result.couponcode);
                        $("#editForm input[name='sdate']").val(result.sdate);
                        $("#editForm input[name='edate']").val(result.edate);
                        $("#editForm input[name='minorder']").val(result.minAmount);
                        $("#editForm input[name='percent']").val(result.value);
                        $("#editForm select[name='valueType']").val(result.valueType);
                        $("#editForm input[name='no_of_time_use']").val(result.no_of_use);
                        $("#editForm #editItems").html(result.items);
                       
   
                     }
                     else{
                        $("#addContainer").slideDown();
                        $("#btnCancel").hide();
                        $("#addToTable").show();
                        alert(result.message);
                     }
                },
                error: function() {alert('failed');}
            });
    
        });
    
        $("#editForm").validate({
           rules:{
                coupon:{
                    required:true
                },
                sdate:{
                    required:true
                },
                edate:{
                    required:true
                },
                minorder:{
                    required:true
                },
                percent:{
                    required:true
                },
                no_of_time_use:{
                    required:true
                },
                valueType:{
                    required:true
                },
            },
            messages: {
                        name: "Please Enter Name"
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
            submitHandler: function() {
                     $.ajax({
                        type: "POST",
                        url: "actions/coupon/edit",
                        data: $("#editForm").serialize(),
                        success: function(obj) {
                            //alert(obj);
                             result = $.parseJSON(obj);
                             if(result.response == 'y'){
                                 alert(result.message);
                                 location.reload();
                             }
                             else{
                                 alert(result.message);
                             }
                        },
                        error: function() {alert('failed');}
                    });
                    return false;
            }
        });
        
        
        $("#tableContainer").on("click",".remove-element",function(){
            if(confirm("Are you sure?")){
                var ID = $(this).attr('id');
                ele = $(this);
                //alert(ID);
                $.ajax({
                    type: "POST",
                    url: "actions/coupon/delete",
                    data: {'ID':ID},
                    //timeout: 3000,
                     success: function(obj) {
                        alert(obj);
                        //console.log(obj);
                        location.reload();
                        //$(ele).parent().parent().parent().hide();
                    },
                    error: function() {alert('failed');}
                });
            }
        });
        
        //get service name
        $("#addForm").on("change","#service_type",function(){
    		var id = $(this).val();
    		//alert(id);
    		$.ajax({
                type: "POST",
                url: "actions/add_item_category/getServiceName",
                data: {'id':id},
                success: function(obj) {
                	result = $.parseJSON(obj);
                	 if(result.response == 'y'){
    				    $("#addForm #service_name").show();
                	 	$("#addForm #service_name").html(result.service_name);
                	 }
                	 else{
    					alert(result.message);
                	 }
                },
                error: function() {alert('failed');}
            });
    
    	});
        //get service name
        
        //get category
        $("#addForm").on("change","#service_name",function(){
    		var id = $(this).val();
    		//alert(id);
    		$.ajax({
                type: "POST",
                url: "actions/services/getCategory",
                data: {'id':id},
                success: function(obj) {
                	result = $.parseJSON(obj);
                	 if(result.response == 'y'){
    				    $("#addForm #category").show();
                	 	$("#addForm #category").html(result.category);
                	 }
                	 else{
    					alert(result.message);
                	 }
                },
                error: function() {alert('failed');}
            });
    
    	});
        //get category
        
        //get items
        $("#addForm").on("change","#category",function(){
    		var id = $(this).val();
    		//alert(id);
    		$.ajax({
                type: "POST",
                url: "actions/services/getItems",
                data: {'id':id},
                success: function(obj) {
                	result = $.parseJSON(obj);
                	 if(result.response == 'y'){
                	 	$("#addForm #items").html(result.items);
                	 	$("#addForm #items").append("<input type='hidden' name='item_length' value='"+result.item_length+"'>");
                	 }
                	 else{
                	    $("#addForm #items").html("No item");
    					alert(result.message);
                	 }
                },
                error: function() {alert('failed');}
            });
    
    	});
    	
    	
    	$("#tableContainer").on("click",".updatestatus-element",function(){
    var id = $(this).attr('id');
    //alert(id);
    $.ajax({
        type: "POST",
        url: "actions/coupon/isactive",
        data: {'id':id},
        success: function(obj) {
            //alert(obj);
            result = $.parseJSON(obj);
             if(result.response == 'y'){
                  alert(result.message);
                  location.reload();
             }
             else{
                 
                 alert(result.message);
             }
        },
        error: function() {alert('failed');}
    });

});
        //get items
        
        /* $("#tableContainer").on("click",".change-status",function(){
            if(confirm("Are You Sure??")){
                var ID = $(this).attr('id');
                ele = $(this);
                $.ajax({
                    type: "POST",
                    url: "actions/service/changeStatus",
                    data: {'ID':ID},
                    //timeout: 3000,
                     success: function(obj) {
                        //console.log(obj);
                        location.reload();
                        //$(ele).parent().parent().parent().hide();
                    },
                    error: function() {alert('failed');}
                });
            }
        }); */
        
            
    });
    