<?php include 'partial/header.php'; ?>
<div class="page-content">
	<div class="page-info">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Vender's Data</li>
			</ol>
		</nav>
	</div>
	<div class="main-wrapper">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h2 class="card-title">Users</h2>
						<div class="card-body">
							  <table class="table <?=TABLE_CLASS?>" id="datatable-tabletools">
                                	<thead>
                                   		<tr>
											<th>Sr. No.</th>
											<th>Name</th>
											<th>Mobile</th>
											<!-- <th>Referral Code</th> -->
											<th>Address Details</th>
											<th>Pincode</th>
											<th>Created ON</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody id="tableContainer">
									    <?php
									        
									        $get_data=$obj->select("*","users","1 ORDER BY ID DESC");
									        if(is_array($get_data))
									        {
									            foreach($get_data as $key=>$val)
									            {
									                // $plan_id=$val[13];
									                // $membership_plan=$obj->select("name","membership","ID='$plan_id'")[0][0];
									                
									                
									                
									   ?>
            									    <tr>
									                        <td><?=($key+1);?></td>
									                        <td><?=html_entity_decode($val[1]);?></td>
									                        <td><?=html_entity_decode($val[2]);?></td>
									                         <td><?=html_entity_decode($val[5]);?></td>
									                       <!-- <td><img src="<?=$val[6]?>" width="60" height="60"></td> -->
									                       
									                        <td><?=html_entity_decode($val[6]);?></td>
									                        <td><?=html_entity_decode($val[7]);?></td>
									                        <!-- <td> 
                									        <a name="image"  class="btn btn-success btn-lg addImages text-white" onclick="getModal(<?=$val[0]?>)" >
                									             View 
                									        </a>
                									        </td>
                									         <td><?=$membership_plan;?></td>
                									        <td><?=$val[12];?></td>
									                        <td><?=$val[10];?></td> -->
									                          <td>
        									    	<?php
        									    	
        										    	if($val[8]==1)
        										    	{
        										   	?>
            											<button type="button" id="<?=base64_encode($val[0]);?>" data-id="<?=base64_encode($val[0]);?>" class="btn btn-success status-element">Active</button>
            											<?php
            											    }
            											    else
            											    {
            											?>
            											<button type="button" id="<?=base64_encode($val[0]);?>" data-id="<?=base64_encode($val[0]);?>" class="btn btn-danger status-element">Inactive</button>
            											<?php
            											    }
            											?>
            											
        									    	
        									    		</td>
            										</tr>
									   <?php
									            }
									        }
									    ?>
			                           
									</tbody>
								</table>
						</div>
					</div>
				</div>
					<!-- end: page -->
			</div>
		</div>
	</div>

        <!-- <section>
        	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">&times;</span>
			        		</button>
			      		</div>
			      		
			      		<div class="modal-body">
			        		...
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      		</div>
			    	</div>
			  	</div>
			</div>
        </section> -->
        
        
          <!-- Modal -->
        <!-- <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
        
            
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title text-center">Accounts Details</h4>
              </div>
              <div class="modal-body">
                 <div id='output'></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        
          </div>
        </div>
    </section>  -->
			
        
        
		<?php include 'partial/footer.php';?>
         <script src="assets/admin/users.js"></script> 
        
        
  <?php
	        $obj->execute("UPDATE users SET is_seen='1' WHERE 1");
	        
	    ?>
	    <script>
	    
	    function getModal(id)
	    {
	        debugger;
	        $.ajax({
                type: "POST",
                url: "actions/users/showProducts.php",
                data:{'id':id},
                success: function(obj)
                {
                    var result = $.parseJSON(obj);
                    if(result.response == 'y'){
                        $("#myModal").modal('show');
                        $("#myModal #output").html(result.output);
                    }
                    else{
                   alert(result.message);
                    }
                },
                error: function() {alert('failed');
                }
                });
            return false;
	    }
	    
	        $("#users_count").hide();
	    </script>
	  
	</body>
</html>
