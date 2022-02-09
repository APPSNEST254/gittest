<?php 
              
				 if($_GET['act']=="view"){
	include('../dbconnect.php');
                require('../adminsession.php');
	$invoiceno =$_GET['invoiceno'];
	
	
	$select9p="SELECT * FROM balances WHERE invoiceno='$invoiceno'" ;
$sel9p=mysqli_query($connect,$select9p);
	$row=mysqli_fetch_array($sel9p);		
			$invoiceno1  = $row['invoiceno'];
			$propertyid = $row['propertyid'];
			$unitid = $row['unitid'];
			$tenantid = $row['tenantid'];
			$paymentdate = $row['paymentdate'];
			$dueamount = $row['dueamount'];
			$paidamount = $row['paidamount'];
			$balancecf = $row['balancecf'];
			$unitid = $row['unitid'];






	$select7p="SELECT firstname,middlename,suname,email,mobileno FROM tenants WHERE idno='$tenantid' ";
$sel7p=mysqli_query($connect,$select7p);
	$row=mysqli_fetch_array($sel7p);		
			$firstname=$row['firstname'];
			$middlename=$row['middlename'];
			$suname=$row['suname'];
			$email2 =$row['email'];
			$mobileno2=$row['mobileno'];
			

		$tenantname=$row['firstname']." ".$row['middlename']." ".$row['suname'];	
		
		
		
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
                                   
                                    <div class="float-right"> <h3 class="mb-0">Invoice# <?php echo  $invoiceno1 ;?></h3>
                                    Payment Date: <?php echo  $paymentdate ?><br>
									Due Balance: <?php echo  $balancecf ?></div>
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
                                                    <th>Paid Anount</th>
                                                    <th>Invoiced Amount</th>
                                                    <th class="right">Balance B/F</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php 
											if ($balancecf>=1){
											?>
                                                <tr>
                                                    
                                                    <td class="left strong">Balance B/F</td>
                                                    <td class="left"><?php echo  $paidamount;?></td>
                                                    <td class="right"><?php echo  $dueamount ?></td>
                                                    
                                                    <td class="right"><?php echo  $balancecf ?></td>
                                                </tr>
											
                                           
												 <tr>
                                                   
                                                    <td class="left strong"> </td>
                                                    <td class="left"> </td>
                                                    <td class="left"> </td>
                                                    <td class="left"> <strong class="text-dark">TotaL Amount Due</strong></td>
                                                    <td class="right">KSH <?php echo  $balancecf ?></td>
                                                </tr>
													
												
											 
                                            </tbody>
                                        </table>
                                    </div>
                                   
									<?php 
											}
										
								
 $result = $connect->query("select * from mpesa Where agencyid='$agencyid'");
 
    while ($row = $result->fetch_assoc()) {

                 
                  $mpesaid = $row['mpesaid'];
                  $agencyid = $row['agencyid'];
                  $mpesamode = $row['mpesamode'];
                  $bisinessname = $row['bisinessname'];
                  $accountno = $row['accountno'];
				  if($mpesamode=='N/A'){
					  
				  }
				  else
				  {
                 ?>
<div class="card-footer bg-white">
                                    <p class="mb-0">Pay by Mpesa: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="color:black;"> <?php echo  $mpesamode;?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
									Business NO: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong style="color:black;"><?php echo  $bisinessname; ?>  </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Account No: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <strong style="color:black;"> <?php echo  $invoiceno1; ?> </strong> </p>
                                </div>
								

		<?php 		

	}
	}
	
	$result1 = $connect->query("select * from agencybank Where agencyid='$agencyid'");
 
    while ($row = $result1->fetch_assoc()) {

                 
                  $bankmodeid = $row['bankmodeid'];
                  $agencyid = $row['agencyid'];
                  $bankname = $row['bankname'];
                  $accountname = $row['accountname'];
                  $accountno = $row['accountno'];
				  if($bankname=='N/A'){
					  
				  }else{
											?>
											
											<div class="card-footer bg-white">
                                    <p class="mb-0">Bank Transfer: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong style="color:black;"> <?php echo  $bankname."    ";?></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
									Account Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong style="color:black;"><?php echo  $accountname; ?>  </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Account No: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong style="color:black;">  <?php echo  $accountno; ?> </strong> </p>
                                </div>
									<?php 		

	}
	}			
		?>									
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