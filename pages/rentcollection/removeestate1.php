			   <!-- ============================================================== -->
            <!-- start add estate Invoice -->
          <!-- ============================================================== -->  							   
<div class="modal fade" <?php echo "id='removeestate".$abbriviation."'>";?> tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Estate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <!-- ============================================================== -->
                        <!-- inputmask -->
                        <!-- ============================================================== -->
                   
					 <div class="card-body">
                                    <div class="row">
                                         <div class="col">
	 
	<h5 class="mb-3">Do you want to delete this estate?</h5>                                            
                                            <h4 class="text-dark mb-1"><?php echo  $estatename; ?></h4>  
											<div class="col">
											<div>Estate Code:   <?php echo  $abbriviation  ?> </div>
											 </div>
											 <div class="col">
											<div>County:   <?php echo  $county  ?> </div>
											 </div>
											 <div class="col">
											<div>City/ Town:   <?php echo  $town  ?> </div>
											 </div>
	</div>
   

	
  </div>
		
                                    </div>
 <form name="payinvoice" method="post" action="removeestate.php">
	<input  type="text" class="form-control" name="estatename" value="<?php echo $estatename?>" hidden required>				 
	<input  type="text" class="form-control" name="abbriviation" value="<?php echo $abbriviation?>" hidden required>
	
	
				<div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-removeestate" value="Remove Estate">
																
 
   
  
 

	
  </div>			
			</form>				 <!-- ============================================================== -->
                        <!-- end input mask -->
                        <!-- ============================================================== -->
				
    </div>
  </div>
</div>
               
       

	   
            <!-- ============================================================== -->
            <!-- end add estate -->
            <!-- ============================================================== -->  