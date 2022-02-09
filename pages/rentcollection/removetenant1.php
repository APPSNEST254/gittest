<!--   ########## Start remove  tenant ##########-->
	
	
	<div class="modal fade" <?php echo "id='removetenant".$idno."'>";?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Tenant Checkout</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                         <form name="removetenant" method="post" action="removetenant.php?>" role="form" >
  <div class="card-body border-top">
         <input type="text"class="form-control"  name="propertyid" value="<?php echo  $propertyid; ?>" hidden >                           
         <input type="text"class="form-control"  name="tenantid" value="<?php echo  $tenantid; ?>" hidden >                           
         <input type="text"class="form-control"  name="unitid" value="<?php echo  $unitid; ?>" hidden >                           
                                    
                                    <h5>Remove Tenant</h5>
                                     

                                            <label class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" name="removetype" value="temp" checked class="custom-control-input"><span class="custom-control-label">KEEP TENANT HISTORY</span>
											  </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                               								  <input type="radio" value="perm" name="removetype" class="custom-control-input"><span class="custom-control-label">REMOVE EVERYTHING</span>
 </label>
					
									
									
									<h5>Checkout Date</h5>
                                   <div class="form-group">
                                        <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="todate" data-target="#datetimepicker4" required/>
                                            <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div></div>
                                                            <div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-remove" value="Remove Tenant">
																</form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
	<!--   ########## End remove  tenant ##########-->