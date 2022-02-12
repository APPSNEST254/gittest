			   <!-- ============================================================== -->
            <!-- start add estate Invoice -->
          <!-- ============================================================== -->  							   
<div class="modal fade" <?php echo "id='editunit".$unitid."'>";?> tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
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
                     <div class="container">
					 <form name="payinvoice" method="post" action="editestate1.php">
	<input  type="text" class="form-control" name="unitid" value="<?php echo $unitid?>" hidden required>				 
	<input  type="text" class="form-control" name="propertyid" value="<?php echo $propertyid?>" hidden required>				 
  <div class="row">
    <div class="col">
		<div class="form-group">
                                                <label for="propertyname" class="col-form-label">Unit ID: </label>
												<input class="form-control" type="text" name="unitid1"  value="<?php echo $unitid;?>" disabled>
                                                
                                            </div>
	
	</div>
	<div class="col">
	<div class="form-group">
                                                 <label for="price1" class="col-form-label">Price</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                                <input class="form-control" type="text" name="price1"  value="<?php echo $price2;?>" required>
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	
	</div>
	</div>
	<div class="row">
    <div class="col">
    <div class="form-group">
								<label for="unittype" class="col-form-label">Unit Type: </label>
								 <select  name="unittype" class="form-control" required><option selected><?php echo $unittype;?></option><option >SINGLE</option><option>BED SITTER</option>
								   <option>DOUBLE ROOM</option><option>ONE BED ROOM</option><option>TWO BED ROOM</option></select>
								</div>
								</div>
								
								
									<div class="col">
                  <div class="form-group">
								<label for="areasq1" class="col-form-label">Size (Feet<sup>2</sup>): </label>
								<input class="form-control" type="number" name="areasq1" value="200" max="1000"min="100" required>
								</div>
								</div>
								
	
  </div>
  
	<div class="row">
    
								
								
									<div class="col">
                  <div class="form-group">
  <label for="features">Unit Features</label>
  <textarea class="form-control rounded-0" id="Features" rows="10"> <?php echo $features;?></textarea>
</div>
								</div>
								
	
  </div>
  
  
  
  
  
  	<div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-editestate" value="Save Unit">
																
 
   
  
 

	
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