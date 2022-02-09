<?PHP
include('../dbconnect.php');
                require('../adminsession.php');
if($_GET['act']=="add"){
$propertyid= $_GET['propertyid'];
$unitid=$_GET['unitid'];

$select1="SELECT * FROM units WHERE propertyid  = '$propertyid' and unitid='$unitid'";
$selected=mysqli_query($connect,$select1);
$test=mysqli_fetch_array($selected);
$price=$test['price'] ;
$deposit=$test['price'] ;
				$status= $test['status'] ;
				
				
$select9="SELECT propertyname,waterdeposit,electricitydeposit FROM property WHERE propertyid='$propertyid' ";
$sel9=mysqli_query($connect,$select9);
	$row=mysqli_fetch_array($sel9);		
			$propertyname=$row['propertyname'];	
			$electricitydeposit=$row['electricitydeposit'];	
			$waterdeposit=$row['waterdeposit'];
			
$select9v="SELECT agencyfee,agencyfeetype FROM agencyfee WHERE  agencyid='$agencyid' ";
$sel9v=mysqli_query($connect,$select9v);
	$row=mysqli_fetch_array($sel9v);
			$agencyfee1=$row['agencyfee'];
			$agencyfeetype=$row['agencyfeetype'];

if($agencyfeetype=1){
	$agencyfee=$agencyfee1;
	
}
if($agencyfeetype=2){
	$agencyfee=$agencyfee1/100 * $price;
	
}

		$pay=$price+$deposit+$electricitydeposit+$waterdeposit+$agencyfee;	
				
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add tenant</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/libs/css/style.css">
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../../assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="../../assets/vendor/inputmask/css/inputmask.css" />
	  <link rel="stylesheet" type="text/css" media="all" href="../jsDatePick_ltr.min.css" />
	
	<script type="text/javascript" src="../jsDatePick.min.1.3.js"></script>
</head>

<body>
    
       <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Add Tenant Details </h2>
                               <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="addtenant.php" class="breadcrumb-link">Back</a></li>
                                           </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header ">
								<h5>Tenant Details</h5>
								</div>
            
                                <div class="card-body">
								 <form name="addtenant" method="post" action="newtenant.php">
								 <input type="text" class="form-control" name="propertyname" value= "<?php echo $propertyname; ?>" hidden required>
								 <input type="text" class="form-control" name="propertyid1" value= "<?php echo $propertyid; ?>" hidden required>
								 <input type="text" class="form-control" name="unitid1" value= "<?php echo $unitid; ?>" hidden required>
								<!--################  row start #########################-->
								
								  <div class="row">
    

								<div class="col">
								<div class="form-group">
								<label for="propertyname" class="col-form-label">Propert Name</label>
								<input type="text" class="form-control" name="propertyname" value= "<?php echo $propertyname; ?>" disabled required>
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="propertyid1 class="col-form-label">Property No</label>
								<input type="text" class="form-control" name="propertyid1" value= "<?php echo $propertyid; ?>" disabled required>
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="unitid1" class="col-form-label"> Unit No</label>
										<input type="text" class="form-control" name="unitid1" value= "<?php echo $unitid; ?>" disabled required>
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
								while ($row = $result->fetch_assoc()) {
									$title = $row['title'];
									echo "'<option>$title</option>'";
								}
								echo "</select>";
								?>
								</div>
								</div>
								
	
								
								
								<div class="col">
								<div class="form-group">
								<label for="firstname" class="col-form-label">First Name: </label>
								<input type="text" class="form-control" name="firstname" placeholder="First  Name" maxlength="10" pattern="^[a-zA-Z]+" required>
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="suname" class="col-form-label"> Suname: </label>
								<input type="text" class="form-control" name="suname" placeholder="Suname" maxlength="10" pattern="^[a-zA-Z]+" required>
								</div>
								</div>
								

	
								</div>
								<!--################  row end #########################-->
								
								
								<!--################  row start #########################-->
								
								  <div class="row">
    

								<div class="col">
								<div class="form-group">
								<label for="middlename" class="col-form-label">Middle Name: </label>
								<input type="text" class="form-control" name="middlename" placeholder="Middle Name" maxlength="30" pattern="^[a-zA-Z ]+" >
								</div>
								</div>
								
																
								<div class="col">
								<div class="form-group">
								<label for="email" class="col-form-label">Email: </label>
								<input type="email" class="form-control" name="email" placeholder=" Email" >
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="idno" class="col-form-label"> Identity No: </label>
								<input type="text" class="form-control" name="idno" placeholder="ID/Passport No" maxlength="30" pattern="^[0-9A-Za-z ]+" required>
								</div>
								</div>
								

	
								</div>
								<!--################  row end #########################-->
								<!--################  row start #########################-->
								
								  <div class="row">
    

								<div class="col">
								<div class="form-group">
								<label for="mobileno" class="col-form-label">Mobileno: </label>
								<input type="number" min="0100000000" max="0799999999" class="form-control" name="mobileno" value="07"  required >
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="altmobileno" class="col-form-label">Alternative No</label>
								<input type="number" min="0100000000" max="0799999999" class="form-control" name="altmobileno" value="" >
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="occupation" class="col-form-label"> Occupation: </label>
								<input type="text" class="form-control" name="occupation" placeholder="Occupation" maxlength="30" pattern="^[a-zA-Z ]+" required>
								</div>
								</div>
								

	
								</div>
								<!--################  row end #########################-->
								<!--################  row start #########################-->
								
								  <div class="row">
    

								<div class="col">
								<div class="form-group">
								<label for="company" class="col-form-label">Organization/Institution/ Name:  </label>
								<input type="text" class="form-control" name="company" placeholder="Company/Institution" maxlength="30" pattern="^[a-zA-Z ]+" required>
								</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								   <label for="fromdate" class="col-form-label">Check In Date: </label>
                                        <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                            <input  type="text" class="form-control datetimepicker-input" name="fromdate" data-target="#datetimepicker4" required >
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
								<input type="number" class="form-control " name="rent1" value="<?php echo  $price; ?>" hidden required>
								<input type="number" class="form-control " name="deposit" value="<?php echo  $price; ?>" hidden required>
								<input type="number" class="form-control " name="electricitydeposit1" value="<?php echo  $electricitydeposit?>"  hidden required>
								  <input type="number" class="form-control"  name="waterdeposit1"value="<?php echo  $waterdeposit ?>" hidden required >
								  
                                               <input type="number" class="form-control " name="agencyfee" value="<?php echo  $agencyfee ?>" hidden required>
                                              
								 <div class="card-header ">
								<h5>Deposits</h5>
								</div>
								<!--################  row start #########################-->
								
								  <div class="row">
    <div class="col">
	<div class="form-group">
                                                <label for="rent1" class="col-form-label">Rent: <small class="text-muted">(KSh)</small></label>
												<input type="number" class="form-control " name="rent1" value="<?php echo  $price; ?>" disabled required>
                                            </div>
	
	</div>
    <div class="col">
<div class="form-group">

                                         <label for="mon1" class="col-form-label">Month: </label>
										 
										 <div class="input-group date" id="datetimepicker11"  data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="mon1" data-target="#datetimepicker11" required />
                                            <div class="input-group-append" data-target="#datetimepicker11" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
	</div>

	<div class="col">
	 <div class="form-group">
                                                <label for="deposit" class="col-form-label">Deposit: <small class="text-muted">(KSh)</small></label>
												<input type="number" class="form-control " name="deposit" value="<?php echo  $deposit; ?>" disabled required>
                                            </div>
	</div>
  </div>
  
								<!--################  row end #########################-->
								
								<!--################  row start #########################-->
								
								       <div class="row">
    <div class="col">
	 
	<div class="form-group">
                                                 <label for="electricitydeposit1" class="col-form-label">Electricity Deposit</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="number" class="form-control " name="electricitydeposit1" value="<?php echo  $electricitydeposit?>" disabled required>
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>
    <div class="col">
<div class="form-group">
                                                 <label for="waterdeposit1" class="col-form-label">Water Deposit</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="number" class="form-control"  name="waterdeposit1"value="<?php echo  $waterdeposit ?>" disabled required >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>

	<div class="col">
<div class="form-group">
                                                 <label for="agencyfee" class="col-form-label">Agency Fee</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="number" class="form-control " name="agencyfee" value="<?php echo  $agencyfee ?>" disabled required>
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>
  </div>
								<!--################  row end #########################-->
								
											
								<!--################  row start #########################-->
								
								       <div class="row">
    <div class="col">
<div class="form-group">
                                                 <label for="others" class="col-form-label">Others</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="number" class="form-control " name="others" value="0" >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>
    <div class="col">

	</div>

	<div class="col">

	</div>
  </div>
								<!--################  row end #########################-->
								<!--################  row start #########################-->
								
						 <div class="row">
		
		
		<div class="col">
							
								<label for="mode" class="col-form-label">Payment Mode: </label><br>
							
								   <label class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" name="mode" value="CASH"checked class="custom-control-input"><span class="custom-control-label">Cash</span>
											  </label>

                                            
											  
											  <?php
								
 $result = $connect->query("select * from mpesa Where agencyid='$agencyid'");
 
    while ($row = $result->fetch_assoc()) {

                 
                  $mpesaid = $row['mpesaid'];
                  $agencyid = $row['agencyid'];
                  $mpesamode = $row['mpesamode'];
                  $bisinessname = $row['bisinessname'];
                  $accountno = $row['accountno'];
				  if($mpesamode=='N/A'){
					  
				  }
				  else{
                                echo "
								     <label class='custom-control custom-radio custom-control-inline'>
											
			<input type='radio' name='mode' class='custom-control-input' Value='MPESA'><span class='custom-control-label'>Mpesa $mpesamode (Business Name: $bisinessname, Account NO: Invoice#)</span>
 </label>";

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
                                echo "
								     <label class='custom-control custom-radio custom-control-inline'>
											
			<input type='radio' name='mode' class='custom-control-input' Value='BANK'><span class='custom-control-label'>$bankname BANK(Account Name: $accountname, Account NO: $accountno)</span>
 </label>";
				  }
	}
 ?>
                                       
								
								</div>
								</div>
								<!--################  row end #########################-->
								
								
									<!--################  row start #########################-->
								
							      
       <div class="row">
    <div class="col">
	 
	<div class="form-group">
                             <label>Transaction Code:</label>
							 <input class="form-control" type="text" name="trscode" value="" >
                                
 </div>
	</div>
    <div class="col">
	<div class="form-group">
                                                 <label for="paid1" class="col-form-label">PAY</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="text" class="form-control" id="paid" name="paid1" value="<?php echo  $pay ?>" required >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>

	</div>
 

	
  </div>
								<!--################  row end #########################-->
								
	  	<div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-addtenant" value="Add Tenant">
																
 
   
  
 </form>

	
  </div>
								 </div> 
 
			

  
 
 
								
								
                                   
               
  
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
             

    <!-- Optional JavaScript -->
    <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../../assets/libs/js/main-js.js"></script>
    <script src="../../assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
	<script src="../../assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="../../assets/vendor/datatables/js/data-table.js"></script>
	<script src="../../assets/vendor/datepicker/moment.js"></script>
    <script src="../../assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
    <script src="../../assets/vendor/datepicker/datepicker.js"></script>
    <script>
    $(function(e) {
        "use strict";
        $(".date-inputmask").inputmask("dd/mm/yyyy"),
            $(".phone-inputmask").inputmask("(999) 999-9999"),
            $(".international-inputmask").inputmask("+9(999)999-9999"),
            $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
            $(".purchase-inputmask").inputmask("aaaa 9999-****"),
            $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
            $(".ssn-inputmask").inputmask("999-99-9999"),
            $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
            $(".currency-inputmask").inputmask("999999"),
            $(".percentage-inputmask").inputmask("99%"),
            $(".decimal-inputmask").inputmask({
                alias: "decimal",
                radixPoint: "."
            }),

            $(".email-inputmask").inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                greedy: !1,
                onBeforePaste: function(n, a) {
                    return (e = e.toLowerCase()).replace("mailto:", "")
                },
                definitions: {
                    "*": {
                        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            })
    });
    </script>
</body>
 
</html>
<?PHP
}

?>