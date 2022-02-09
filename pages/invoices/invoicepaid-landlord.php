	<?php 					
							 $select9a="SELECT * FROM landlord where propertyid='$propertyid'";
$sel9a=mysqli_query($connect,$select9a);
	$row=mysqli_fetch_array($sel9a);		
			$firstname3 =$row['firstname'];
			$lastname3 =$row['lastname'];
			$email3 =$row['email'];
			$phoneno3 =$row['phoneno'];
			$box3=$row['box'];
			$town3 =$row['town'];
			$postalcode3 =$row['postalcode'];
			$bankname3 =$row['bankname'];
			$accountname3 =$row['accountname'];
			$accountno3 =$row['accountno'];
			
			
			 $select9a="SELECT * FROM agents where agencyid='$agencyid'";
$sel9a=mysqli_query($connect,$select9a);
	$row=mysqli_fetch_array($sel9a);		
			$agencyshortname1 =$row['agencyshortname'];
			$agencyfullname1 =$row['agencyfullname'];
			$email1 =$row['email'];
			$phoneno1 =$row['phoneno'];
			$address1 =$row['address'];
			$address11 =$row['address1'];
			$box1 =$row['box'];
			$postalcode1 =$row['postalcode'];
						$town1 =$row['town'];
						
						
								
			 ?>	
			 <!-- ============================================================== -->
            <!-- start add estate Invoice -->
          <!-- ============================================================== -->  							   
<div class="modal fade" <?php echo "id='landlordpaidinvoice".$invoiceno."'>";?> tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Landlord Paid Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <!-- ============================================================== -->
                        <!-- inputmask -->
                        <!-- ============================================================== -->
                     <div class="container">
					<div class="card" id='printinvoicepaid'>
                                <div class="card-header p-4">
                                     <a class="pt-2 d-inline-block"><img src="../<?php echo $logoname;?>" style="hight:40Px;width:40Px">  <?php echo $agencyfullname?> </a>
                                   
                                    <div class="float-right"> <h3 class="mb-0">Invoice# <?php echo  $invoiceno ;?></h3>
                                    Date generated: <?php echo  $dategenerated ?> <br> Date Paid:  <?php echo  $paymentdate ?>
									<br> RNo:  <?php echo  $rno ?></div>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                     <div class="col">
	<h5 class="mb-3">From:</h5>
                                            <div>Landlord</div>
											<h4 class="text-dark mb-1"><?php echo  $firstname3." ".$lastname3; ?></h4>                                            
                                            <div>House name:   <?php echo  $propertyname ?>  </div>
                                            <div>P.O Box <?php echo  $box3." ".$town3." ".$postalcode1; ?> </div>
                                            <div>Email: 0<?php echo  $email3 ;?></div>
                                            <div>Phone: 0<?php echo  $phoneno3 ;?></div>

	</div>
      <div class="col">
	 
	<h5 class="mb-3">To:</h5>                                            
                                            <h4 class="text-dark mb-1"><?php echo  $agencyfullname1; ?></h4>                                            
                                            <div>P.O Box <?php echo  $box1." ".$town1." ".$postalcode3; ?> </div>
                                            <div><?php echo  $address1; ?></div>
                                            <div><?php echo  $address11; ?></div>
                                            <div>Email: <?php echo  $email1; ?></div>
                                            <div>Phone: <?php echo  $phoneno1; ?></div>
	</div>
	</div>

	<div class="row">
	   <div class="col">
<h4 class="Left">Item:</h4>  
	</div>
	 <div class="col">
<h4 class="Left">Description:</h4> 

	</div>
	 <div class="col">

<h4 class="right">Unit Cost:</h4> 
	</div>
	 <div class="col">

<h4 class="right">Total Cost:</h4> 
	</div>
	</div>
	
		<div class="row">
		<hr>
		</div>
		<?php 
											if ($invoicedamount>=1){
											?>
		<div class="row">
	   <div class="col">
<p class="Left">Invoiced Amount:</p>  
	</div>
	 <div class="col">
<p class="Left">Total Rent for occupied Units <?php echo  $month;?></p> 

	</div>
	 <div class="col">

<p class="right"><?php echo  $invoicedamount ?></p> 
	</div>
	 <div class="col">

<p class="right"><?php echo  $invoicedamount ?></p> 
	</div>
	</div>
		<?php 
											}
											if ($balancebf>=1){
											?>
											
											
												<div class="row">
	   <div class="col">
<p class="Left">Balance B/F</p>  
	</div>
	 <div class="col">
<p class="Left">Previous balances</p> 

	</div>
	 <div class="col">

<p class="right"><?php echo  $balancebf ?></p> 
	</div>
	 <div class="col">

<p class="right"><?php echo  $balancebf ?></p> 
	</div>
	</div>
		<?php 
											}
											
											?>
		
												<div class="row">
	   <div class="col">
<p class="Left"></p>  
	</div>
	 <div class="col">
<p class="Left"></p> 

	</div>
	 <div class="col">

<p class="right"><strong class="text-dark">TOTAL DUE</strong></p> 
	</div>
	 <div class="col">

<p class="right strong"><?php echo  $dueamount ?></p> 
	</div>
	</div>										
				


	<?php 
											if ($advancebf>=1){
											?>
											
											
		<div class="row">
	   <div class="col">
<p class="Left">Advance B/F</p>  
	</div>
	 <div class="col">
<p class="Left">Previous advance payments</p> 

	</div>
	 <div class="col">

<p class="right"><?php echo  $advancebf ?></p> 
	</div>
	 <div class="col">

<p class="right">(-)<?php echo  $advancebf ?></p> 
	</div>
	</div>									
											
												
                                 
												
												
														<?php 
											}
											
											?>				
										
<div class="row">
	   <div class="col">
<p class="Left"></p>  
	</div>
	 <div class="col">
<p class="Left"></p> 

	</div>
	 <div class="col">

<p class="right"><strong class="text-dark">SUB TOTAL</strong></p> 
	</div>
	 <div class="col">

<p class="right strong"><?php echo  $subtotal ?></p> 
	</div>
	</div>	
	
	
<div class="row">
	   <div class="col">
<p class="Left"></p>  
	</div>
	 <div class="col">
<p class="Left"></p> 

	</div>
	 <div class="col">

<p class="right"><strong class="text-dark">VAT (16%)</strong></p> 
	</div>
	 <div class="col">

<p class="right strong"><?php echo  $vat ?></p> 
	</div>
	</div>	
	
	
	<div class="row">
	   <div class="col">
<p class="Left"></p>  
	</div>
	 <div class="col">
<p class="Left"></p> 

	</div>
	 <div class="col">

<p class="right"><strong class="text-dark">TotaL Amount Due</strong></p> 
	</div>
	 <div class="col">

<p class="right strong"><?php echo  $invoicetotal ?></p> 
	</div>
	</div>	
	
	
	<div class="row">
<div class="card-footer bg-white">
                                    <p class="mb-0">Paid By:     <?php echo "    ".$mode ?>, Account Name:     <?php echo  "    ".$accountname3; ?>  Account No:       <?php echo  "    ".$accountno3; ?> , Transaction Code:     <?php echo $trscode;"            " ?> </p>
                                </div>
                                </div>
								<div class="row">
								<div class="card-footer bg-white">
                                    <p class="mb-0">Developer: <color="blue">www.appsnest.net</color> (0790000450)</p>
                                </div>
	</div>	
	
		
                                    </div>
                                    
                                   
									
								
                                </div>
								<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" >PAY</button>
        <button type="button" class="btn btn-primary" onclick="printDiv('printinvoicepaid')">Print Invoice</button>
      </div>
</div>



	
      
	  
							
							 <!-- ============================================================== -->
                        <!-- end input mask -->
                        <!-- ============================================================== -->
				
    </div>
  </div>
</div>
               
       