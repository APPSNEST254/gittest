<?php 
              
				 if($_GET['act']=="view"){
	include('../dbconnect.php');
                require('../adminsession.php');
	$invoiceno =$_GET['invoiceno'];
	
	
	$select9p="SELECT * FROM tenantinvoices WHERE invoiceno='$invoiceno'" ;
$sel9p=mysqli_query($connect,$select9p);
	$row=mysqli_fetch_array($sel9p);		
			$propertyid = $row['propertyid'];
$unitid = $row['unitid'];
$tenantid = $row['tenantid'];
$rent = $row['rent'];
$month = $row['month'];
$balancebf = $row['balancebf'];
$duedate = $row['duedate'];
$paydate = $row['time'];
$dategenerated = $row['dategenerated'];
$penaltyfee = $row['penaltyfee'];
$waterbill = $row['waterbill'];
$electricitybill = $row['electricitybill'];
$sanitationbill = $row['sanitationbill'];
$damagesfee = $row['damagesfee'];
$othercharges = $row['othercharges'];
$paid = $row['paid'];
$mode = $row['mode'];
$acctname = $row['acctname'];
$acctno = $row['acctno'];
$admin = $row['admin'];
$status = $row['status'];




$select9p1="SELECT * FROM deposit WHERE invoiceno='$invoiceno'" ;
$sel9p1=mysqli_query($connect,$select9p1);
	$row=mysqli_fetch_array($sel9p1);		
			;
$deposit = $row['deposit'];
$agencyfee = $row['agencyfee'];
$waterdeposit = $row['waterdeposit'];
$electricitydeposit = $row['electricitydeposit'];



	$select7p="SELECT firstname,middlename,suname,email,mobileno FROM tenants WHERE idno='$tenantid' ";
$sel7p=mysqli_query($connect,$select7p);
	$row=mysqli_fetch_array($sel7p);		
			$firstname=$row['firstname'];
			$middlename=$row['middlename'];
			$suname=$row['suname'];
			$email2 =$row['email'];
			$mobileno2=$row['mobileno'];
			

		$tenantname=$row['firstname']." ".$row['middlename']." ".$row['suname'];	
		
		$subtotal =$rent+$deposit+$electricitydeposit+$waterdeposit+$agencyfee+$penaltyfee+$waterbill+$electricitybill+$sanitationbill+$damagesfee+$othercharges+$balancebf;
		
		//$vat=10/100*$subtotal;
		$vat=0;
		$total =$subtotal+$vat;
		$balancecf =$paid-$total;
		
	$select9="SELECT propertyname FROM property WHERE propertyid='$propertyid' ";
$sel9=mysqli_query($connect,$select9);
	$row=mysqli_fetch_array($sel9);		
			$propertyname=$row['propertyname'];	
		



	
 




 
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
			
		
				 ?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/libs/css/style.css">
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>invoice</title>
</head>
<body>
<div class="container-fluid dashboard-content ">
 <div class="row">

                        <div class="col-2">
						</div>
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
                                            <h4 class="text-dark mb-1"><?php echo  $agencyfullname1; ?></h4>                                            
                                            <div><div>P.O Box <?php echo  $box1." ".$town1." ".$postalcode1; ?> </div></div>
                                            <div><?php echo  $address1; ?></div>
                                            <div><?php echo  $address11; ?></div>
                                            <div>Email: <?php echo  $email1; ?></div>
                                            <div>Phone: <?php echo  $phoneno1; ?></div>
	</div>
    <div class="col">
	<h5 class="mb-3">To:</h5>
                                            <div>Tenant</div>
											<h4 class="text-dark mb-1"><?php echo  $tenantname ?></h4>                                            
                                            <div>House name:   <?php echo  $propertyname ?>  </div>
                                            <div> Unit No:   <?php echo  $unitid ?></div>
                                            <div>Email: <?php echo  $email2 ;?></div>
                                            <div>Phone: <?php echo  $mobileno2 ;?></div>

	</div>

	
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
											if ($rent>=1){
											?>
                                                <tr>
                                                    
                                                    <td class="left strong">Rent</td>
                                                    <td class="left">Rent for <?php echo  $month;?></td>
                                                    <td class="right"><?php echo  $rent ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $rent ?></td>
                                                </tr>
												<?php 
											}
											if ($deposit>=1){
											?>
											
												
                                         <tr>
                                                   
                                                    <td class="left strong">Deposit</td>
                                                    <td class="left">Deposit for <?php echo  $unitid;?></td>
                                                    <td class="right"><?php echo  $deposit ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $deposit ?></td>
                                                </tr>
												
												
														<?php 
											}
											if ($balancebf>=1){
											?>
											
												
                                         <tr>
                                                   
                                                    <td class="left strong">Balance B/F</td>
                                                    <td class="left">Previouy blalances </td>
                                                    <td class="right"><?php echo  $balancebf ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $balancebf ?></td>
                                                </tr>
												
												<?php 
											}
										if ($electricitydeposit>=1){
											?>
											
														
                                         <tr>
                                                   
                                                    <td class="left strong">Electricity deposit</td>
                                                    <td class="left">Electricity Deposit for <?php echo  $unitid;?></td>
                                                    <td class="right"><?php echo  $electricitydeposit ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $electricitydeposit ?></td>
                                                </tr>
												
												<?php 
											}
										if ($waterdeposit>=1){
											?>
											 <tr>
                                                   
                                                    <td class="left strong">Water deposit</td>
                                                    <td class="left">Water Deposit for <?php echo  $unitid;?></td>
                                                    <td class="right"><?php echo  $waterdeposit ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $waterdeposit ?></td>
                                                </tr>
												
												<?php 
											}
										if ($agencyfee>=1){
											?>
											 <tr>
                                                   
                                                    <td class="left strong">Agency Fee</td>
                                                    <td class="left">Tenancy agreement fee(Paid once)</td>
                                                    <td class="right"><?php echo  $agencyfee ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $agencyfee ?></td>
                                                </tr>
												
												<?php 
											}
										if ($penaltyfee>=1){
											?>
											
											 <tr>
                                                   
                                                    <td class="left strong">Penalty Fee</td>
                                                    <td class="left">late paymement of an invoice</td>
                                                    <td class="right"><?php echo  $penaltyfee ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $penaltyfee ?></td>
                                                </tr>
												
												<?php 
											}
											if ($waterbill>=1){
											?>
											<tr>
                                                   
                                                    <td class="left strong">Water Bill</td>
                                                    <td class="left">Invoiced bill</td>
                                                    <td class="right"><?php echo  $waterbill ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $waterbill ?></td>
                                                </tr>
												
												<?php 
											}
										if ($electricitybill>=1){
											?>
											<tr>
                                                   
                                                    <td class="left strong">Electricity Bill</td>
                                                    <td class="left">Invoiced bill</td>
                                                    <td class="right"><?php echo  $electricitybill ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $electricitybill ?></td>
                                                </tr>
												
												<?php 
											}
										if ($sanitationbill>=1){
											?>
											
												<tr>
                                                   
                                                    <td class="left strong">Sanitation Bill</td>
                                                    <td class="left">Invoiced bill</td>
                                                    <td class="right"><?php echo  $sanitationbill ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $sanitationbill ?></td>
                                                </tr>
												
												<?php 
											}
										if ($damagesfee>=1){
											?>
											
												<tr>
                                                   
                                                    <td class="left strong">Damages fee</td>
                                                    <td class="left">Invoiced Amount</td>
                                                    <td class="right"><?php echo  $damagesfee ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $damagesfee ?></td>
                                                </tr>
												
												<?php 
											}
										if ($othercharges>=1){
											?>
                                               
											   
												<tr>
                                                   
                                                    <td class="left strong">Other Charges</td>
                                                    <td class="left">Invoiced Amount</td>
                                                    <td class="right"><?php echo  $othercharges ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $othercharges ?></td>
                                                </tr>
												
												<?php 
											}
										
											?>
											
                                             <tr>
                                                   
                                                    <td class="left strong"> </td>
                                                    <td class="left"> </td>
                                                    <td class="left"> </td>
                                                    <td class="left"> <strong class="text-dark">Subtotal</strong></td>
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
                                                    <td class="right">KSH <?php echo  $total ?></td>
                                                </tr>
													
												
											 
                                            </tbody>
                                        </table>
                                    </div>
                                   
									<div class="card-footer bg-white">
                                    <p class="mb-0">Payment Mode: <?php echo  $mode ?>, Account Name: <?php echo  $acctname; ?>  Account No: <?php echo  $acctno; ?> , Transaction Code: <?php echo  $admin; ?> </p>
                                </div>
									<div class="card-footer bg-white">
                                    <p class="mb-0">Developer: <color="blue">www.appsnest.net</color> (0790000450)</p>
                                </div>
                                </div>
                            
                            </div>
							  <div class="col-2">
						</div>
                        </div>
                   
			<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" >PAY</button>
        <button type="button" class="btn btn-primary" onclick="printDiv('printinvoice')">Print Invoice</button>
      </div>
<!--   ########## Start pay invoice Modal##########-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Pay Invoice</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                         <form name="generateinvoices" method="post" action="tenantpayinvoice.php" role="form" >
  <div class="card-body border-top">
                                    
                                    
									  <div class="row">
									  <div class="col">
                                        <div class="form-group">
                                                <!-- <label for="invoiceno2" class="col-form-label">Invoice NO</label> -->
												<input type="text" class="form-control"  name="invoiceno2" value="<?php echo $invoiceno; ?>"  required>
                                            </div>
                                            </div>
											
											
										<div class="col">
                                        <div class="form-group">
                                                <!-- <label for="invoiced2" class="col-form-label">Invoiced Amount</label> -->
												<input type="text" class="form-control"  name="invoiced2" value="<?php echo $total; ?>"  required>
                                            </div>
                                            </div>
                                            </div>
											
											 
      <div class="row">
    <div class="col">
	 
	<div class="form-group">
                                                 <label for="electricitybill" class="col-form-label">Electricity Bill</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="text" class="form-control currency-inputmask" name="electricitybill" value="0" >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>
    <div class="col">
<div class="form-group">
                                                 <label for="waterbill" class="col-form-label">Water Bill</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="text" class="form-control currency-inputmask"  name="waterbill"value="0"  >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>
	
	 <div class="col">
<div class="form-group">
                                                 <label for="sanitationbill" class="col-form-label">Sanitation Bill</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="text" class="form-control currency-inputmask"  name="sanitationbill"value="0"  >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>
	</div>
 <div class="row">
	<div class="col">
<div class="form-group">
                                                 <label for="damagesfee" class="col-form-label">Damages Fee</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="text" class="form-control currency-inputmask" name="damagesfee" value="0" >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>
	<div class="col">
<div class="form-group">
                                                 <label for="others" class="col-form-label">Others</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="text" class="form-control currency-inputmask" name="others" value="0" >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>
	<div class="col">
	</div>
	
  </div>
  
											
									
									
									   <div class="row">
    <div class="col">
		<div class="form-group">
                            <label>Payment Mode:</label>
							<select name="mode" class="form-control" requiblack><option selected>CASH</option><option>KCB BANK</option><option>EQUITY BANK</option>
							<option>MPESA /PAYBILL</option></select>
 </div>
	
	</div>
    <div class="col">
<div class="form-group">
                             <label>A/C  Name:</label>
							 <input class="form-control" type="text" name="acctname" value="" >
                                
 </div>
	</div>
	<div class="col">
	<div class="form-group">
                             <label>A/C  No:</label>
							 <input class="form-control" type="text" name="acctno" value="" >
                                
 </div>
	
	</div>
	</div>
	
   <div class="row">
	
	
	 <div class="col">
	 
	<div class="form-group">
                             <label>Transaction Code:</label>
							 <input class="form-control" type="text" name="trscode" value="" >
                                
 </div>
	</div>
	
	  <div class="col">
	<div class="form-group">
                                                 <label for="paid" class="col-form-label">PAID</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="text" class="form-control currency-inputmask" id="paid" name="paid" value="<?php echo  $total ?>" required >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>

	</div>
  </div>
  
  
    </div>
                                                            <div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-payinvoice" value="Pay Invoice">
																</form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

    </div>
	<!--   ########## End pay invoice Modal##########-->
    </div>
        <!-- ============================================================== -->
        <!-- end main wrapper  -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->
        <!-- jquery 3.3.1 -->
        <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstap bundle js -->
        <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- slimscroll js -->
        <script src="../../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- main js -->
        <script src="../../assets/libs/js/main-js.js"></script>
		
		
		<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
	</script>
</body>
 
</html>
<?php

	} 
?>