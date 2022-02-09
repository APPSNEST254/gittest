<!--   ########## Start remove  tenant ##########-->
	
	
	<div class="modal fade" <?php echo "id='edittenant".$idno."'>";?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                   <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                
								
								 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Tenant Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            
                                <div class="card-body">
								 <form name="addtenant" method="post" action="edittenant1.php">
								 
								 <input type="text" class="form-control" name="propertyid" value= "<?php echo $propertyid; ?>" hidden required>
								 <input type="text" class="form-control" name="unitid" value= "<?php echo $unitid; ?>" hidden required>
								 <input type="text" class="form-control" name="idno" value= "<?php echo $idno; ?>" hidden required>
								<!--################  row start #########################-->
								
								  <div class="row">
    

								<div class="col">
								<div class="form-group">
								<label for="propertyname" class="col-form-label">Propert Name</label>
								<input type="text" class="form-control"  value= "<?php echo $propertyname; ?>" disabled required>
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="propertyid1 class="col-form-label">Property No</label>
								<input type="text" class="form-control" value= "<?php echo $propertyid; ?>" disabled required>
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="unitid1" class="col-form-label"> Unit No</label>
										<input type="text" class="form-control"  value= "<?php echo $unitid; ?>" disabled required>
								</div>
								</div>
								

	
								</div>
								<!--################  row end #########################-->
								
								
								
								<!--################  row start #########################-->
								
								  <div class="row">
    

								<div class="col">
								<div class="form-group">
								<?php
								echo"<label>Title:    </label>";
								echo "<select name='title' class='form-control'>";
								$result = $connect->query("select title from title");
								echo "'<option>$title</option>'";
								while ($row = $result->fetch_assoc()) {
									$title1 = $row['title'];
									
									echo "'<option>$title1</option>'";
								}
								echo "</select>";
								?>
								</div>
								</div>
								
	
								
								
								<div class="col">
								<div class="form-group">
								<label for="firstname" class="col-form-label">First Name: </label>
								<input type="text" class="form-control" name="firstname" value= "<?php echo $firstname; ?>"  maxlength="10" pattern="^[a-zA-Z]+" required>
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="suname" class="col-form-label"> Suname: </label>
								<input type="text" class="form-control" name="suname" value= "<?php echo $suname; ?>"   maxlength="10" pattern="^[a-zA-Z]+" required>
								</div>
								</div>
								

	
								</div>
								<!--################  row end #########################-->
								
								
								<!--################  row start #########################-->
								
								  <div class="row">
    

								<div class="col">
								<div class="form-group">
								<label for="middlename" class="col-form-label">Middle Name: </label>
								<input type="text" class="form-control" name="middlename" value= "<?php echo $middlename; ?>"  " maxlength="30" pattern="^[a-zA-Z ]+" >
								</div>
								</div>
								
																
								<div class="col">
								<div class="form-group">
								<label for="email" class="col-form-label">Email: </label>
								<input type="email" class="form-control" name="email" value= "<?php echo $email; ?>"   >
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="idno" class="col-form-label"> Identity No: </label>
								<input type="text" class="form-control" name="idno" value= "<?php echo $idno; ?>"   maxlength="30" pattern="^[0-9A-Za-z ]+" disabled required>
								</div>
								</div>
								

	
								</div>
								<!--################  row end #########################-->
								<!--################  row start #########################-->
								
								  <div class="row">
    

								<div class="col">
								<div class="form-group">
								<label for="agencyfullname" class="col-form-label">Mobileno: </label>
								<input type="number" min="0100000000" max="0799999999" class="form-control" name="mobileno" value= "0<?php echo $mobileno; ?>"    required >
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="altmobileno" class="col-form-label">Alternative No</label>
								<input type="number" min="0100000000" max="0799999999" class="form-control" name="altmobileno" value= "0<?php echo $alt; ?>" >
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="occupation" class="col-form-label"> Occupation: </label>
								<input type="text" class="form-control" name="occupation"value= "<?php echo $occupation; ?>" maxlength="30" pattern="^[a-zA-Z ]+" required>
								</div>
								</div>
								

	
								</div>
								<!--################  row end #########################-->
								<!--################  row start #########################-->
								
								  <div class="row">
    

								<div class="col">
								<div class="form-group">
								<label for="company" class="col-form-label">Organization/Institution/ Name:  </label>
								<input type="text" class="form-control" name="company" value= "<?php echo $company; ?>" maxlength="30" pattern="^[a-zA-Z ]+" required>
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								   <label for="fromdate" class="col-form-label">Check In Date: </label>
                                        <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                            <input  type="text" class="form-control datetimepicker-input" name="fromdate" value= "<?php echo $fromdate; ?>" data-target="#datetimepicker4" disabled required >
                                            <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
								</div>
								
								
								
								<div class="col">
								
								</div>
								

	
								</div>
								<!--################  row end #########################-->
								
				
							
								
					
								
											
							
					
								
							
								
	  	<div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-edittenant" value="Save Tenant">
																
 
   
  
 </form>

	
  </div>
								 </div> 
 
			

  
 
 
								
								
                                   
               
  
                                </div>
                               
                            </div>
                        </div>
						
						</div>
                                                        </div>
                                                    </div>
                                                </div>
	<!--   ########## End remove  tenant ##########-->