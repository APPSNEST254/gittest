			   <!-- ============================================================== -->
            <!-- start add estate Invoice -->
            <!-- ============================================================== -->  							   
<div class="modal fade addestate1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Estate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <!-- ============================================================== -->
                        <!-- inputmask -->
                        <!-- ============================================================== -->
                     <div class="container">
					 <form name="payinvoice" method="post" action="addestate.php">
					 <input  type="text" class="form-control" name="agencyid1" value="<?php echo $agencyid?>" hidden required>
  <div class="row">
    <div class="col">
	<div class="form-group">
                                                <label for="estatename" class="col-form-label">Estate Name</label>
												<input  type="text" class="form-control" name="estatename" pattern="^[a-zA-Z ]+" required>
                                                
                                            </div>
	
	</div>
	<div class="col">
	<div class="form-group">
                                                <label for="abbriviation" class="col-form-label">Abbriviation/ Estate Code</label>
												<input  type="text" class="form-control" name="abbriviation" pattern="^[0-9A-Za-z]+" required>
                                                
                                            </div>
	
	</div>
	</div>
	
	 <div class="row">
    <div class="col">
								<div class="form-group">
								<label for="county" class="col-form-label">County </label>
								<select name="county" type="text" class="form-control" required><option selected>NAKURU</option><option>NAIROBI</option><option>BARINGO</option><option>ELDORET</option><option>KERICHO</option></select>
								</div>
								</div>
								
								
									<div class="col">
								<div class="form-group">
								<label for="town" class="col-form-label">Town</label>
								<input type="text" class="form-control" name="town" Value=" EGERTON" maxlength="20" pattern="^[a-zA-Z ]+" required>
								</div>
								</div>
								
	
  </div>
  

  
  
  
  	<div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-estate" value="Add Estate">
																
 
   
  
 

	
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