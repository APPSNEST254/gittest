
			<!--############ Remove Property##########-->
									   
<div class="modal fade removeproperty" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Remove Property</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       
                     <div class="container">
					 <form  method="post" action="removeproperty.php">
					 	 <input type="text"class="form-control"  name="propertyid1a" value="<?php echo  $propertyid; ?>" hidden >
  <div class="row">
    <div class="col">
	<div class="form-group">
                                                <label for="propertyid" class="col-form-label">Property No</label>
												<input type="text"class="form-control"  name="propertyid" value="<?php echo  $propertyid; ?>" disabled >
                                                
                                            </div>
	
	</div>
	</div>
	<div class="row">
    <div class="col">
	<label for="removeproperty" class="col-form-label">Do you want to delete this Property? </label><br>
							
								      <label class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" name="removeproperty"	value="temp" checked class="custom-control-input"><span class="custom-control-label">Keep Data</span>
											  </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                               								  <input type="radio" name="removeproperty" value="perm" class="custom-control-input"><span class="custom-control-label">Delete Everything</span>
 </label>
			
								</div>
								
								
								
	
  </div>
  

  
  
  
  
  	<div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-remove" value="Remove Property">
																
 
   
  
 

	
  </div>
  
</div>
							
							
    
				
    </div>
  </div>
</div>
               
      
			<!--########### end remove property###########-->