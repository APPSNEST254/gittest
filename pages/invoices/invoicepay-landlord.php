			   <!-- ============================================================== -->
            <!-- start add estate Invoice -->
          <!-- ============================================================== -->  							   
<div class="modal fade" <?php echo "id='landlordpayinvoice".$invoiceno."'>";?> tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Pay Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <!-- ============================================================== -->
                        <!-- inputmask -->
                        <!-- ============================================================== -->
                     <div class="container">
					 <form name="payinvoice" method="post" action="paylandlord.php">
	<input  type="text" class="form-control" name="invoiceno" value="<?php echo $invoiceno?>" hidden required>				 
	<input  type="text" class="form-control" name="propertyid" value="<?php echo $propertyid?>" hidden required>				 
	<input  type="text" class="form-control" name="invoicetotal" value="<?php echo $invoicetotal?>" hidden required>				 
  <div class="row">
    <div class="col">
	<div class="form-group">
                                                <label for="estatename" class="col-form-label">Total Amount Due</label>
												<input  type="text" class="form-control"  value="<?php echo $invoicetotal ?>" pattern="^[a-zA-Z ]+"disabled required>
                                                
                                            </div>
	
	</div>
	<div class="col">
	<div class="form-group">
                                                 <label for="electricitybill" class="col-form-label">Pay</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="text" class="form-control currency-inputmask" name="paid" value="<?php echo $invoicetotal ?>" >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	
	</div>
	</div>

  

  
  
  
  
  	<div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-paylandlord" value="Pay Invoice">
																
 
   
  
 

	
  </div>
  </form>
</div>
							
							 <!-- ============================================================== -->
                        <!-- end input mask -->
                        <!-- ============================================================== -->
				
    </div>
  </div>
</div>
               
       

	   
            <!-- ============================================================== -->
            <!-- end add estate -->
            <!-- ============================================================== -->  