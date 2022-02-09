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
<div class="modal fade" <?php echo "id='landlorddueinvoice".$invoiceno."'>";?> tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Landlord Due Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <!-- ============================================================== -->
                        <!-- inputmask -->
                        <!-- ============================================================== -->
                     <div class="container">
					 <div class="row">
					 <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card" id='printinvoice'>
                                <div class="card-header p-4">
                                     <a class="pt-2 d-inline-block"><img src="../<?php echo $logoname;?>" style="hight:40Px;width:40Px">  <?php echo $agencyfullname?> </a>
                                   
                                    <div class="float-right"> <h3 class="mb-0">Invoice# <?php echo  $invoiceno ;?></h3>
                                    Date generated: <?php echo  $dategenerated ?> <br> Date Due:  <?php echo  $duedate ?></div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
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
  
  <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                         <thead>
                                                <tr>
                                                   
                                                    <th>Item</th>
                                                    <th>Description</th>
                                                    <th class="right">Unit Cost</th>
                                                 
                                                    <th class="center"></th>
                                                    <th class="right">Item-Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php 
											if ($invoicedamount>=1){
											?>
                                                <tr>
                                                    
                                                    <td class="left strong">Invoiced Amount</td>
                                                    <td class="left">Total Rent for occupied Units <?php echo  $month;?></td>
                                                    <td class="right"><?php echo  $invoicedamount ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $invoicedamount ?></td>
                                                </tr>
											
												
                                       
												<?php 
											}
											if ($balancebf>=1){
											?>
											
												
                                         <tr>
                                                   
                                                    <td class="left strong">Balance B/F</td>
                                                    <td class="left">Previous balances</td>
                                                    <td class="right"><?php echo  $balancebf ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $balancebf ?></td>
                                                </tr>
												
												
											<?php 
											}
											
											?>
											 <tr>
                                                   
                                                    <td class="left strong"> </td>
                                                    <td class="left"> </td>
                                                    <td class="left"> </td>
                                                    <td class="left"> <strong class="text-dark">TOTAL DUE</strong></td>
                                                    <td class="right">KSH <?php echo  $dueamount ?></td>
                                                </tr>
												<?php 
											if ($advancebf>=1){
											?>
											
												
                                         <tr>
                                                   
                                                    <td class="left strong">Advance B/F</td>
                                                    <td class="left">Previous advance payments</td>
                                                    <td class="right"><?php echo  $advancebf ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right">(-)<?php echo  $advancebf ?></td>
                                                </tr>
												
												
														<?php 
											}
											
											?>
											
                                             <tr>
                                                   
                                                    <td class="left strong"> </td>
                                                    <td class="left"> </td>
                                                    <td class="left"> </td>
                                                    <td class="left"> <strong class="text-dark">SUB TOTAL</strong></td>
                                                    <td class="right">KSH <?php echo  $subtotal ?></td>
                                                </tr>
												 <tr>
                                                   
                                                    <td class="left strong"> </td>
                                                    <td class="left"> </td>
                                                    <td class="left"> </td>
                                                    <td class="left"> <strong class="text-dark">VAT (16%)</strong></td>
                                                    <td class="right">KSH <?php echo  $vat ?></td>
                                                </tr>
												 <tr>
                                                   
                                                    <td class="left strong"> </td>
                                                    <td class="left"> </td>
                                                    <td class="left"> </td>
                                                    <td class="left"> <strong class="text-dark">TotaL Amount Due</strong></td>
                                                    <td class="right">KSH <?php echo  $invoicetotal ?></td>
                                                </tr>
													
												
											 
                                            </tbody>
                                        </table>
                                    </div>
		
                                    </div>
                                    
                                   
									<div class="card-footer bg-white">
                                    <p class="mb-0">Payment Mode: <?php echo  $mode ?>, Account Name: <?php echo  $acctname; ?>  Account No: <?php echo  $acctno; ?> , Transaction Code: <?php echo  $admin; ?> </p>
                                </div>
									<div class="card-footer bg-white">
                                    <p class="mb-0">Developer: <color="blue">www.appsnest.net</color> (0790000450)</p>
                                </div>
                                </div>
                            
                            </div>
					 
					 
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