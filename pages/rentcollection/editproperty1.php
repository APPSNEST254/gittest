         <!-- start add property -->
            <!-- ============================================================== -->  							   
<div class="modal fade editproperty" id="addproperty"tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Property</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	   
				
				 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Property Details</</h5>
        
      </div>
       <!-- ============================================================== -->
                        <!-- inputmask -->
                        <!-- ============================================================== -->
                     <div class="container">
					 <form role="form" method="post" action="editproperty.php">
					 <input type="text"class="form-control"  name="propertyid1a" value="<?php echo  $propertyid; ?>" hidden >
  <div class="row">
    <div class="col">
	<div class="form-group">
                                                <label for="propertyname" class="col-form-label">House Name: </label>
												<input  type="text" class="form-control" name="propertyname"  value="<?php echo  $propertyname; ?>" pattern="^[a-zA-Z ]+" required>
                                                
                                            </div>
	
	</div>
	<div class="col">
	
	<?php 
              
	
$select9="SELECT propertyid FROM propertycounter ";
$sel9=mysqli_query($connect,$select9);
	$row=mysqli_fetch_array($sel9);		
			$propertyid1=$row['propertyid'];
			$propertyid2=$propertyid1+1;

		
				 ?>
	<div class="form-group">
                                                <label for="propertyid" class="col-form-label">Property NO</label>
												<input type="text"class="form-control"  name="propertyid" value="<?php echo  $propertyid; ?>" disabled >
                                            </div>
	
	</div>
    <div class="col">
								<div class="form-group">
								<label for="county" class="col-form-label">Property Type: </label>
								 <select name="type" class="form-control" required><option selected><?php echo  $propertytype; ?></option><option >RESIDENTIAL</option>
<option>HOSTEL</option> <option>MULT FAMILY</option> <option>SINGLE FAMILY</option>
<option>SHOP</option> </select></div>
								</div>
								
								
								
								
	
  </div>
  
  <div class="row">
    
<div class="col">
								<div class="form-group">
								<label for="estatename" class="col-form-label">Estate: </label>
								<?php
								echo "<select name=estatename class='form-control'>";
								 echo "'<option>$propertyestate</option>'";
 $result = $connect->query("select estatename from estate");
 
    while ($row = $result->fetch_assoc()) {

                 
                  $estatename = $row['estatename'];
				  
                                echo "'<option>$estatename</option>'";

	}
echo "</select>"; ?>
								
								
								</div>
								</div>
																<div class="col">
								<div class="form-group">
								<label for="commission" class="col-form-label">Commission(%): </label>
								<input type="number" class="form-control" name="commission" value="<?php echo  $propertycommision; ?>" max="15" min="5" required></div>
								</div>
								
								
								<div class="col">
							
								<label for="depositto" class="col-form-label">Deposit To: </label><br>
							
								  

                                            <label class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" name="depositto"	value="Landlord" checked class="custom-control-input"><span class="custom-control-label">LANDLORD</span>
											  </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                               								  <input type="radio" name="depositto" value="agency" class="custom-control-input"><span class="custom-control-label">AGENCY</span>
 </label>
								
								</div>
								
								
								
								
								
								
								
								

	
  </div>
  
  	
				
				
					 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Deposits</</h5>
        
      </div>
				  
      <div class="row">
    <div class="col">
	 
	<div class="form-group">
                                                 <label for="electricitydeposit" class="col-form-label">Electricity Deposit</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="number" class="form-control currency-inputmask" name="electricitydeposit" value="<?php echo  $electricitydeposit; ?>" >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>
    <div class="col">
<div class="form-group">
                                                 <label for="waterdeposit" class="col-form-label">Water Deposit</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="number" class="form-control currency-inputmask"  name="waterdeposit" value="<?php echo  $waterdeposit; ?>" >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>

	<div class="col">

	</div>
  </div>
  

				

  
  					 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bills</</h5>
        
      </div>
  <div class="row">
    

								<div class="col">
								<div class="form-group">
								<label for="electricitybill" class="col-form-label">Electricity Bill</label>
								<select name="electricitybill" class="form-control" required><option selected><?php echo  $electricitybill; ?></option><option >OWN METERS</option><option>SHARED BILL</option><option>INCLUDED IN RENT</option></select> 
						</div>
								</div>
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="waterbill" class="col-form-label">Water Bill</label>
								<select name="waterbill" class="form-control" required><option selected><?php echo  $waterbill; ?></option><option >OWN METERS</option><option>SHARED BILL</option><option>INCLUDED IN RENT</option></select> 
						</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="sanitationbill" class="col-form-label"> Sanitation Bill</label>
								<select name="sanitationbill" class="form-control" required><option selected><?php echo  $sanitationbill; ?></option><option >OWN METERS</option></option><option>SHARED BILL</option><option>INCLUDED IN RENT</option></select> 
						</div>
								</div>
								

	
  </div>
  
  
  					 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Landlord Details</</h5>
        
      </div>
  <div class="row">
    

								<div class="col">
								<div class="form-group">
								<label for="firstname" class="col-form-label">First Name: </label>
								<input type="text" class="form-control" name="firstname" value="<?php echo  $landlordfname; ?>" maxlength="10" pattern="^[a-zA-Z]+" required>
						</div>
								</div>
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="suname" class="col-form-label">Suname: </label>
								<input type="text" class="form-control" name="suname" value="<?php echo  $landlordlname; ?>" maxlength="10" pattern="^[a-zA-Z]+" required>
						</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="email" class="col-form-label"> Email: </label>
								<input type="email" class="form-control" name="email" value="<?php echo  $landlordemail; ?>"   required>
						</div>
								</div>
								

	
  </div>
  
  
  	    <div class="row">
    

								
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="phoneno" class="col-form-label">Phone Number: </label>
								<input type="number" class="form-control" name="phoneno"  value="0<?php echo  $landlordphoneno; ?>" max="0799999999"min="0700000000" required>
								</div>
								</div>
								
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="address" class="col-form-label">Address</label>
								<input type="text" class="form-control" name="address" value="<?php echo  $landlordaddress; ?>"  required>
								</div>
								</div>	
								
								<div class="col">
								<div class="form-group">
								<label for="boxno" class="col-form-label"> Box No</label>
								<input type="number" class="form-control" name="boxno" value="<?php echo  $landlordbox; ?>" max="999999999"min="1" required>
								</div>
								</div>
								
								
								

	
  </div>
  <div class="row">
  
																<div class="col">
								<div class="form-group">
								<label for="postalcode" class="col-form-label">Postal Code</label>
								<input type="number" class="form-control" name="postalcode"  value="<?php echo  $landlordpostalcode; ?>" max="99999"min="1000" required>
								</div>
								</div>
								
												<div class="col">
								<div class="form-group">
								<label for="town" class="col-form-label">Town</label>
								<input type="text" class="form-control" name="town" value="<?php echo  $landlordtown; ?>"  maxlength="20" pattern="^[a-zA-Z ]+" required>
								</div>
								</div>
								
								<div class="col">
								</div>
  </div>
  
  		 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bank Details</</h5>
        
      </div>
  
  
   	    <div class="row">
    

								
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="bankname" class="col-form-label">Bank Name: </label>
								<select name="bankname" class="form-control" required><option selected><?php echo  $landlordbankname; ?></option><option>KCB</option><option>Equity</option><option>Cooparative</option></select> 
								</div>
								</div>
								
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="accountname" class="col-form-label">Account Name: </label>
								<input type="text" class="form-control" name="accountname" value="<?php echo  $landlordaccountname; ?>"  required>
								</div>
								</div>	
								
								
																<div class="col">
								<div class="form-group">
								<label for="accountno" class="col-form-label">Account Number: </label>
								<input type="text" class="form-control" name="accountno" value="<?php echo  $landlordaccountno; ?>" required>
								</div>
								</div>	
								
								
								

	
  </div>
  	<div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-editproperty" value="EDIT PROPERTY">
																
 
   
  
 
</form>
	
  </div>
  
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