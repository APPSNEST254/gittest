
				 <!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
  <style>
    html,
    body {
        height: 100%;
		
background-image: url("../assets/images/bg1.png");
 background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    			

			 <!-- ============================================================== -->
            <!-- start signup -->
      <div  class="col-2"> </div> 
	  <!-- ============================================================== -->  							   

    <div  class="col-8" style="margin-top: auto; margin-bottom: auto;">
        <div class="card ">
		 <div class="card-header text-center"><a href="index1.php"><img class="logo-img" src="../assets/images/sb1.png" alt="logo" height></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
       <!-- ============================================================== -->
                        <!-- inputmask -->
                        <!-- ============================================================== -->
                     
					 <form name="signup" method="post" action="signup2.php" enctype="multipart/form-data" role="form">
  <div class="row">
    

								<div class="col">
								<div class="form-group">
								<label for="agencyfullname" class="col-form-label">Agency Full Name</label>
								<input type="text" class="form-control" name="agencyfullname" placeholder=" Agency Full Name" maxlength="30" pattern="^[a-zA-Z ]+" required>
								</div>
								</div>
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="agencyshortname" class="col-form-label">Agency Short Name</label>
								<input type="text" class="form-control" name="agencyshortname" placeholder=" Agency Short  Name"maxlength="10" pattern="^[a-zA-Z]+" required>
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="email" class="col-form-label"> Agency Email</label>
								<input type="email" class="form-control" name="email" placeholder=" Agency Email"  required>
								</div>
								</div>
								

	
  </div>
  
  
    <div class="row">
    

								
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="phoneno" class="col-form-label">Agency Phone Number</label>
								<input type="text" class="form-control" name="phoneno"  value="07" max="0799999999"min="0700000000" required>
								</div>
								</div>
								
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="adress" class="col-form-label">Building/ Room No/ Floor</label>
								<input type="text" class="form-control" name="adress" placeholder=" Building/ Room No/ Floor"  required>
								</div>
								</div>	
								
																<div class="col">
								<div class="form-group">
								<label for="adress1" class="col-form-label">Street Name</label>
								<input type="text" class="form-control" name="adress1" placeholder="Estate/ Streat Name"  required>
								</div>
								</div>	
								
								
								

	
  </div>
  
 <div class="row">
    

								
																
								
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="boxno" class="col-form-label"> Box No</label>
								<input type="number" class="form-control" name="boxno" placeholder="12"  max="999999999"min="1" required>
								</div>
								</div>
								
								
																<div class="col">
								<div class="form-group">
								<label for="postalcode" class="col-form-label">Postal Code</label>
								<input type="number" class="form-control" name="postalcode"  value="20100" max="99999"min="1000" required>
								</div>
								</div>
								
								  	
								<div class="col">
								<div class="form-group">
								<label for="county" class="col-form-label">County </label>
								<select name="county" class="form-control" required><option selected>NAKURU</option><option>NAIROBI</option><option>BARINGO</option><option>ELDORET</option><option>KERICHO</option></select>
								</div>
								</div>
								
								
								


	
  </div>
  
  <div class="row">
    

								
																																	
								
							
															<div class="col">
								<div class="form-group">
								<label for="town" class="col-form-label">Town</label>
								<input type="text" class="form-control" name="town" Value="NAKURU" maxlength="20" pattern="^[a-zA-Z ]+" required>
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="currency" class="col-form-label">Currency</label>
								<select name="currency" class="form-control" required><option selected>KES (Kenyan Shilling)</option></select>
								</div>
								</div>
								
								
								<div class="col">
								<div class="form-group">
								<label for="username" class="col-form-label">Username</label>
								<input type="text" class="form-control" name="username" placeholder=" Username" maxlength="20" pattern="^[a-zA-Z]+" required>
								</div>
								</div>
								
								
							
								

	
  </div>
  
<div class="row">


								<div class="col">
								<div class="form-group">
								<label for="firstname" class="col-form-label">First Name</label>
								<input type="text" class="form-control" name="firstname" placeholder=" First Name"maxlength="10" pattern="^[a-zA-Z]+" required>
								</div>
								</div>
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="lastname" class="col-form-label">Last Name</label>
								<input type="text" class="form-control" name="lastname" placeholder=" Last Name"maxlength="20" pattern="^[a-zA-Z]+" required>
								</div>
								</div>
								
								<div class="col">
								<div class="form-group">
								<label for="Password" class="col-form-label">Password</label>
								<input type="password" class="form-control" name="password" placeholder=" *********" required>
								</div>
								</div>
								
								

  </div>
  	 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agency Fee</</h5>
        
      </div>
		
      <div class="row">
	  <div class="col">
							
								<label for="agencyfeetype" class="col-form-label">Agency Fee: </label><br>
							
								  

                                            <label class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" name="agencyfeetype" value="1"  checked class="custom-control-input"><span class="custom-control-label">Fixed Amount</span>
											  </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                               								  <input type="radio" name="agencyfeetype" value="2"class="custom-control-input"><span class="custom-control-label">% Of Rent</span>
 </label>
								
								</div>
    <div class="col">
	 
	<div class="form-group">
                                                 <label for="agencyfee" class="col-form-label">Agency Amount/ %</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh/%</span></div>
                                               <input type="number" class="form-control " name="agencyfee" value="0" >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>
 

	<div class="col">

	</div>
  </div>
  
  
   	 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Penalty Fee</</h5>
        
      </div>
		
      <div class="row">
	  <div class="col">
							
								<label for="penaltyfeetype" class="col-form-label">Penalty Fee: </label><br>
							
								  

                                            <label class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" name="penaltyfeetype" value="1"  checked class="custom-control-input"><span class="custom-control-label">Fixed Amount</span>
											  </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                               								  <input type="radio" name="penaltyfeetype" value="2"class="custom-control-input"><span class="custom-control-label">% Of Rent</span>
 </label>
								
								</div>
    <div class="col">
	 
	<div class="form-group">
                                                 <label for="penaltyfee" class="col-form-label">Penaltyfee Amount/ %</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh/%</span></div>
                                               <input type="number" class="form-control " name="penaltyfee" value="0" >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>
 
<div class="col">

	</div>
	
  </div>
  
  
   <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bank Account</</h5>
        
      </div>
		
      <div class="row">
	  <div class="col">
							
					<div class="form-group">
                            <label>Bank Name:</label>
							<select name="bankname" class="form-control" ><option selected>Select Bank</option>
							<option>KCB</option><option>EQUITY</option>
							<option>CO-OPARATIVE</option><option>FAMILY</option><option>ABSA</option>
							</select>
 </div>						
								</div>
    <div class="col">
	 
	<div class="form-group">
                             <label>A/C  Name:</label>
							 <input class="form-control" type="text" name="accountname"  >
                                
 </div>
	</div>
 
<div class="col">
<div class="form-group">
                             <label>A/C  No:</label>
							 <input class="form-control" type="text" name="accountno" >
                                
 </div>
	</div>
	
  </div>
  
     <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mpesa payments</</h5>
        
      </div>
		
      <div class="row">
	  <div class="col">
							
			
	<div class="form-group">
                            <label>Mpesa Mode:</label>
							<select name="mpesamode" class="form-control" ><option selected>Select Mpesa Mode</option>
							<option>PAYBILL</option><option>BUY GOODS</option>
							
							</select>
 </div>	 
								</div>
    
	<div class="col">
	 
	<div class="form-group">
                             <label>Paybill NO/Till No:</label>
							 <input class="form-control" type="text" name="mpesabusinessno"  >
                                
 </div>
	</div>
 
<div class="col">

	</div>
	
  </div>
 <div class="row">

<div class="col">
								<div class="form-group">
								<label for="logo" class="col-form-label">Company Logo</label>
								<input type="file" name="logo" id="logo"  class="form-control" required>
								</div>
								

  </div>
  

  </div>
  
  
  
  
  
  
  
  
  
  
  
  
   
  	<div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-signup" value="CREATE AGENCY ACCOUNT">
																</form>
                                                            </div>
  
  
  


  </div>
  </div>
  </div>

  

							
							 <!-- ============================================================== -->
                        <!-- end input mask -->
                        <!-- ============================================================== -->
			
   
 <div  class="col-2"> </div> 
               
           
            <!-- ============================================================== -->
            <!-- end Signup -->
            <!-- ============================================================== -->   
			 
</body>

 
</html>


