<!--   ########## Start remove  Unit ##########-->
	
	
<div class="modal fade" <?php echo "id='removeunit".$unitid."'>";?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Unit</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                         <form name="removeunit" method="post" action="removeunit1.php?>" role="form" >
  <div class="card-body border-top">
         <input type="text"class="form-control"  name="propertyid" value="<?php echo  $propertyid; ?>" hidden >                           
                                
         <input type="text"class="form-control"  name="unitid" value="<?php echo  $unitid; ?>" hidden >                           
                                    
                                    <h5>Do you want to delete Unit # <?php echo  $unitid; ?> on Property # <?php echo  $propertyid; ?>?</h5>
                                     

                        	
                                
                                    </div></div>
                                                            <div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-remove" value="Delete Unit">
																</form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
	<!--   ########## End remove  Unit ##########-->