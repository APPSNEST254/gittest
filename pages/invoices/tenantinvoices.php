<?php 
               
				 if($_GET['act']=="details"){
	include('../dbconnect.php');
                require('../adminsession.php');
	$propertyid =$_GET['propertyid'];
	
$select9="SELECT propertyname FROM property WHERE propertyid='$propertyid' ";
$sel9=mysqli_query($connect,$select9);
	$row=mysqli_fetch_array($sel9);		
			$propertyname=$row['propertyname'];
			

		
				 ?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoices</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/libs/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
	   <link rel="stylesheet" href="../../assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
	   <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
	   <link rel="stylesheet" type="text/css" media="all" href="../jsDatePick_ltr.min.css" />
	
	<script type="text/javascript" src="../jsDatePick.min.1.3.js"></script>
	
	
	<script>
	$("#paidinvoice").modal('show')
	</script>
</head>

<body>
    
        <!-- wrapper  -->
        <!-- ============================================================== -->
     <div>
            <div class="container-fluid dashboard-content">
			 <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                    <h2 class="pageheader-title">
									
									<?php 
									echo $propertyname;
									?></h2>
                                   
                                   
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
			  <!-- ============================================================== -->
							<!-- Overview -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                
                                  
                                                                    
              <?php 
			  
$selcount="SELECT COUNT(unitid) AS occupied FROM units
WHERE propertyid='$propertyid' and status='OCCUPIED'"; 

$selcount1=mysqli_query($connect,$selcount);
$row=mysqli_fetch_array($selcount1);
$occupied=$row['occupied'];

$selcount3="SELECT COUNT(unitid) AS unoccupied FROM units
WHERE propertyid='$propertyid' and status='UNOCCUPIED'"; 

$selcount4=mysqli_query($connect,$selcount3);
$row=mysqli_fetch_array($selcount4);
$unoccupied=$row['unoccupied'];

$selcount5="SELECT COUNT(unitid) AS booked FROM units
WHERE propertyid='$propertyid' and status='BOOKED'"; 

$selcount6=mysqli_query($connect,$selcount5);
$row=mysqli_fetch_array($selcount6);
$booked=$row['booked'];

$totalunits=$occupied+$unoccupied+$booked;


						
			  ?>

                        <div class="card">
                            <h5 class="card-header">PROPERTY Overview</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                      
                                        <tbody>
                                       <?php
										echo "
<tr><td> Property Name: </td><td style='color:black;' >".$propertyname."</td>
<td> Property No: </td><td style='color:black;'>".$propertyid."</td></tr>
<tr><td>NO of Units:  </td><td style='color:black;'>".$totalunits."</td><td> Unoccupied Units:  </td><td style='color:black;'>".$unoccupied."</td></tr>
<tr><td>Occupied Units:  </td><td style='color:black;'>".$occupied."</td><td>Booked Units:  </td><td style='color:black;'>".$booked."</td></tr>";

?>	
                                            <tr>
                                                <td>
											 <form  method="post" action="<?php $_SERVER['PHP_SELF'];?>" role="form">
											 <a href="#" class="btn btn-success"data-toggle="modal" data-target="#exampleModal">Generate invoices</a>
											 <input class="btn btn-danger" type="submit" name="submit-applypenalties" value="Apply Penalties">
																</form>
 
 
																
												
													

												<?php
if(isset($_POST['submit-applypenalties'])){
$le1=Date("y-m-d");
$penaltyfee=500;


$select9a="SELECT * FROM penaltyfee WHERE agencyid='$agencyid' ";
$sel9a=mysqli_query($connect,$select9a);
	$row=mysqli_fetch_array($sel9a);		
			$penaltyfee1=$row['penaltyfee'];
			$penaltyfeetype=$row['penaltyfeetype'];
			
			if($penaltyfeetype=1){
			$penaltyfee=$penaltyfee1;
			
			$selcount5="SELECT COUNT(duedate) AS dueinvoices FROM tenantinvoices
WHERE propertyid='$propertyid' AND status='DUE' AND duedate <= '$le1'"; 

$selcount6=mysqli_query($connect,$selcount5);
$row=mysqli_fetch_array($selcount6);
$dueinvoices=$row['dueinvoices'];

if ($dueinvoices>=1){
$update6a = "UPDATE tenantinvoices SET penaltyfee='$penaltyfee',status='OVERDUE' WHERE propertyid='$propertyid' AND status='DUE' AND duedate <= '$le1'"; 
echo "<script>alert('".$dueinvoices." INVOICES HAVE BEEN PENALISED')</script>";

if(!mysqli_query($connect,$update6a)){
echo "<script>alert('FAILED TO EFFECT PENALTIES')</script>".mysqli_error($connect);
}
}
			}
			
			if($penaltyfeetype=2){
			$penaltyfee=$penaltyfee1;
			}

	

else
   echo "<script>alert('NO DUE INVOICES')</script>";

}


?>


													
													
														</td>
                                            
										      </tr>
									
				
				
											    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Generate New Month Invoices</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                         <form name="generateinvoices" method="post" action="<?php $_SERVER['PHP_SELF'];?>" role="form" >
  <div class="card-body border-top">
                                    
                                    
                                    <h5>Select Month</h5>
                                         <div class="form-group">
                                        <div class="input-group date" id="datetimepicker11"  data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="mon" data-target="#datetimepicker11" required />
                                            <div class="input-group-append" data-target="#datetimepicker11" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
									
									
									<h5>Due Date</h5>
                                   <div class="form-group">
                                        <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="datedue1" data-target="#datetimepicker4" required/>
                                            <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div></div>
                                                            <div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-invoice" value="Generate">
																</form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
										</tbody>
                                        
										
                                      
                                    </table>
                                </div>
                            </div>
                        </div>
                 

                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic Overvew  -->
                        <!-- ============================================================== -->
                <!-- ============================================================== -->
                        <!-- card navigaion  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="c-nav">
                                    <h3 class="section-title">Tenant Invoices</h3>
                                                                    </div>
                            </div>
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header pills-regular">
                                        <ul class="nav nav-pills card-header-pills" id="myTab2" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="card-pills-1" data-toggle="tab" href="#card-pill-1" role="tab" aria-controls="card-1" aria-selected="true">Due Invoies</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="card-pills-2" data-toggle="tab" href="#card-pill-2" role="tab" aria-controls="card-2" aria-selected="false">Over due</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="card-pills-3" data-toggle="tab" href="#card-pill-3" role="tab" aria-controls="card-3" aria-selected="false">paid</a>
                                            </li>
											 <li class="nav-item">
                                                <a class="nav-link" id="card-pills-4" data-toggle="tab" href="#card-pill-4" role="tab" aria-controls="card-3" aria-selected="false">Balances</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent2">
										 <!-- ============================================================== -->
                        <!-- start table 1  -->
                        <!-- ============================================================== -->
                                            <div class="tab-pane fade show active" id="card-pill-1" role="tabpanel" aria-labelledby="card-tab-1">
                                 
									<div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                         <tr>
                                                <th>NO</th>
                                                <th>INVOICE NO</th>
                                                <th>UNIT ID</th>
                                                <th> TENANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                <th>MONTH</th>
                                                 
												<th>DUE RENT</th>
												<th>BALANCE BF</th>
												<th>SUBTOTAL</th>
											<th>DUE DATE</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </thead> <tbody>
										
										<?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select3="SELECT * FROM tenantinvoices WHERE propertyid='$propertyid' AND status='DUE'" ;

if(mysqli_query($connect,$select3))
{
$i=1;
$result3=mysqli_query($connect,$select3);



while($row=mysqli_fetch_array($result3)){

$invoiceno = $row['invoiceno'];
$propertyid = $row['propertyid'];
$unitid = $row['unitid'];
$tenantid = $row['tenantid'];
$rent = $row['rent'];
$month = $row['month'];
$balancebf = $row['balancebf'];
$duedate = $row['duedate'];
$dategenerated = $row['dategenerated'];
$penaltyfee = $row['penaltyfee'];

	$select7="SELECT firstname,middlename,suname FROM tenants WHERE idno='$tenantid' ";
$sel7=mysqli_query($connect,$select7);
	$row=mysqli_fetch_array($sel7);		
			$firstname=$row['firstname'];
			$middlename=$row['middlename'];
			$suname=$row['suname'];

		$tenantname=$row['firstname']." ".$row['middlename']." ".$row['suname'];	
		
		$subtotal =$rent+$balancebf+$penaltyfee;
		
		//$vat=10/100*$subtotal;
		$vat=0;
		$total =$subtotal+$vat;

echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$invoiceno."</td>";
echo "<td>".$unitid."</td>";

echo "<td>".$tenantname."</td>";
echo "<td>".$month."</td>";
echo "<td>".$rent."</td>";
echo "<td>".$balancebf."</td>";
echo"<TD>".$subtotal."</TD>";
echo "<td>".$duedate."</td>";
		
			
 echo"<td><a href ='tenantdueinvoice.php?act=view& invoiceno=".$invoiceno."' class='btn btn-sm btn-outline-light' >View  </a> 
<a href='#' class='btn btn-sm btn-outline-light'data-toggle='modal' data-target='.bd-example-modal-lg'>  <i class='fas fa-print'> </i>  </a>
</td></tr>"; 
$i++;
}
 

}
else {
include ('../404-page.html');
				 }
?>

                                               
                                        
                                        </tbody>
                                        <tfoot>
                                               <tr>
                                                <th>NO</th>
                                                <th>INVOICE NO</th>
                                                <th>UNIT ID</th>
                                                <th> TENANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                <th>MONTH</th>
                                                 
												<th>DUE RENT</th>
												<th>BALANCE BF</th>
												<th>SUBTOTAL</th>
											<th>DUE DATE</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                               
										   </div>
										   
			 <!-- ============================================================== -->
            <!-- start View Invoice -->
            <!-- ============================================================== -->  							   
<div class="modal fade invoice" id="invoice"tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="row" >
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12" >
						 
                            <div class="card" id='printinvoice'>
							
                                <div class="card-header p-4">
                                     <a class="pt-2 d-inline-block" href="index.html">Concept</a>
                                   
                                    <div class="float-right"> <h3 class="mb-0">Invoice #<?php echo  $invoiceno ?></h3>
                                    Date generated: <?php echo  $duedate ?> <br> Date Due:  <?php echo  $duedate ?></div>
                                </div>
                                <div class="card-body">
                                  <div class="row mb-4">
									    
    <div class="col">
	 
	<h5 class="mb-3">From:</h5>                                            
                                            <h3 class="text-dark mb-1">Gerald A. Garcia</h3>
                                         
                                            <div>2546 Penn Street</div>
                                            <div>Sikeston, MO 63801</div>
                                            <div>Email: info@gerald.com.pl</div>
                                            <div>Phone: +573-282-9117</div>
	</div>
    <div class="col">
	<h5 class="mb-3">To:</h5>
                                            <h3 class="text-dark mb-1"><?php echo  $tenantname ?></h3>                                            
                                            <div>House name:   <?php echo  $propertyname ?>       Unit No:   <?php echo  $unitid ?></div>
                                            <div>Egerton </div>
                                            <div>Email: info@anthonyk.com</div>
                                            <div>Phone: +614-837-8483</div>

	</div>

	<div class="col">
	<h5 class="mb-3">C/O:</h5>
                                            <h3 class="text-dark mb-1">Miliki Commercial Agency</h3>                                            
                                            <div>P.O Box 1234 egerton</div>
                                            <div>Booster Near Egerton Gate</div>
                                            <div>Email: info@anthonyk.com</div>
                                            <div>Phone: +614-837-8483</div>

	</div>
  </div>
								
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="center">#</th>
                                                    <th>Item</th>
                                                    <th>Description</th>
                                                    <th class="right">Unit Cost</th>
                                                 
                                                    <th class="right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="center">1</td>
                                                    <td class="left strong">Rent</td>
                                                    <td class="left">Rent for <?php echo  $unitid ?></td>
                                                    <td class="right"><?php echo  $rent ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $rent ?></td>
                                                </tr>
                                                   <tr>
                                                    <td class="center">2</td>
                                                    <td class="left strong">balance b/f</td>
                                                    <td class="left">Prom previous invoice</td>
                                                    <td class="right"> </td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $balancebf ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-5">
                                        </div>
                                        <div class="col-lg-4 col-sm-5 ml-auto">
                                            <table class="table table-clear">
                                                <tbody>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Subtotal</strong>
                                                        </td>
                                                        <td class="right">KSH <?php echo  $subtotal ?></td>
                                                    </tr>
                                                  
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">VAT (16%)</strong>
                                                        </td>
                                                        <td class="right">KSH <?php echo  $vat ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Total</strong>
                                                        </td>
                                                        <td class="right">
                                                            <strong class="text-dark">KSH <?php echo  $total ?></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <p class="mb-0">Developer: Appsnest(0790000450)</p>
                                </div>
								 
                            </div>
												 
														
															
                        </div>
                    </div>
					
					<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="printDiv('printinvoice')">Print</button>
      </div>
	  
	  
    </div>
  </div>
</div>
                
           
            <!-- ============================================================== -->
            <!-- end View Invoice -->
            <!-- ============================================================== -->                                                  

					

			 <!-- ============================================================== -->
            <!-- start pay Invoice -->
            <!-- ============================================================== -->  							   
<div class="modal fade payinvoice" id="payinvoice"tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Pay Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <!-- ============================================================== -->
                        <!-- inputmask -->
                        <!-- ============================================================== -->
                     <div class="container">
					 <form name="payinvoice" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
  <div class="row">
    <div class="col">
	<div class="form-group">
                                                <label for="tenantname" class="col-form-label">Name</label>
												<input disabled type="text" class="form-control" name="tenantname" value="<?php echo  $tenantname; ?>" >
                                                
                                            </div>
	
	</div>
    <div class="col">
   <div class="form-group">
                                                <label for="tenantid" class="col-form-label">Tenant ID</label>
												<input disabled type="number"class="form-control"  name="tenantid" value="<?php echo  $tenantid; ?>" >
                                            </div>
	</div>
		<div class="col">
	<div class="form-group">
                                                <label for="invoiceno1" class="col-form-label">Invoice NO</label>
												<input type="text" class="form-control"  name="invoiceno2" value="<?php echo $invoiceno; ?>"required>
                                            </div>
	</div>
	
  </div>
  
  
    <div class="row">
	<div class="col">
	 <div class="form-group">
                                                <label for="propertyname" class="col-form-label">Property Name</label>
												<input disabled type="text" class="form-control" name="propertyname" value="<?php echo  $propertyname; ?>" >
                                                
                                            </div>
	</div>
    <div class="col">
	<div class="form-group">
                                                <label for="propertyid" class="col-form-label">Property NO</label>
												<input disabled type="number"class="form-control"  name="propertyid" value="<?php echo  $propertyid; ?>" >
                                            </div>
	
	</div>
    <div class="col">
 <div class="form-group">
                                                <label for="unitid" class="col-form-label">Unit No</label>
												<input disabled type="text" class="form-control" name="unitid" value="<?php echo  $unitid; ?>" >
                                                
                                            </div>
	</div>

	
  </div>
  
  
  
  
     <div class="row">
    <div class="col">
	<div class="form-group">
                                                <label for="rent" class="col-form-label">Due Rent<small class="text-muted">(KSh)</small></label>
												<input type="text" class="form-control currency-inputmask" name="rent" value="<?php echo  $rent; ?>" required>
                                            </div>
	
	</div>
    <div class="col">
 <div class="form-group">
                                                <label for="month" class="col-form-label">Month<small class="text-muted"> (mm/yyyy)</small></label>
												<input disabled type="text"  class="form-control date-inputmask" name="month" value="<?php echo  $month; ?>" >
                                                
                                            </div>
	</div>

	<div class="col">
	 <div class="form-group">
                                                <label for="balancebf" class="col-form-label">Balance B/F<small class="text-muted">(KSh)</small></label>
												<input type="text" class="form-control currency-inputmask" name="balancebf" value="<?php echo  $balancebf; ?>"required >
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
                                                 <label for="damagesfee" class="col-form-label">Damages Fee</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="text" class="form-control currency-inputmask" name="damagesfee" value="0" >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>
  </div>
  
  
  
  
      <div class="row">
    <div class="col">
	 
	<div class="form-group">
                                                 <label for="penaltyfee" class="col-form-label">Penalty Fee</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input  type="text" class="form-control currency-inputmask"  name="penaltyfee" value="<?php echo  $penaltyfee; ?>"  required>
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>
    <div class="col">

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
                                               <input type="text" class="form-control currency-inputmask" id="paid" name="paid" <?php echo  $total ?>" required >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>

	</div>
	

	<div class="col">

	</div>
  </div>
  
</div>
							
							 <!-- ============================================================== -->
                        <!-- end input mask -->
                        <!-- ============================================================== -->
				<div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-payinvoice" value="Process">
																</form>
                                                            </div>
    </div>
  </div>
</div>
               
           
            <!-- ============================================================== -->
            <!-- end pay Invoice -->
            <!-- ============================================================== -->   
			 <?php
			
			if(isset($_POST['submit-payinvoice'])){


//function to convert integer to words
function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}



//echo convert_number_to_words(1000);

$invoiceno1 =$_POST["invoiceno2"];
$rent1=$_POST["rent"];
$balancebf1=$_POST["balancebf"];
$electricitybill1=$_POST["electricitybill"];
$waterbill1=$_POST["waterbill"];
$penaltyfee1=$_POST["penaltyfee"];
$damagesfee1=$_POST["damagesfee"];
$mode1=$_POST["mode"];
$acctname1=$_POST["mode"];
$acctno1=$_POST["mode"];
$trscode1=$_POST["trscode"];
$paid1=$_POST["paid"];
$totalpay=$rent1+$balancebf1+$electricitybill1+$waterbill1+$penaltyfee1+$damagesfee1;
$balancecf1=$totalpay - $paid1;

$leo=Date("ymdh-i");
$lo=Date("ym");
$le=Date("Y-m-d");




if ($paid1>=1){
$update6b = "UPDATE tenantinvoices SET balancecf='$balancecf1',paydate='$le',electricitybill='$electricitybill1',waterbill='$waterbill1',damagesfee='$damagesfee1',mode='$mode1',acctname='$acctname1',acctno='$acctno1',trscode='$trscode1',status='PAID',paid='$paid1'  WHERE invoiceno='$invoiceno1'";  



?>
  <!-- start paid Invoice -->
            <!-- ============================================================== -->  							   
                                                

<div class="modal fade paidinvoice" id="paidinvoice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Paid Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="row" >
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12" >
						 
                            <div class="card" id='paidinvoice1'>
							
                                <div class="card-header p-4">
                                     <a class="pt-2 d-inline-block" href="index.html">Concept</a>
                                   
                                    <div class="float-right"> <h3 class="mb-0">Invoice #<?php echo  $invoiceno ?></h3>
                                    Date generated: <?php echo  $duedate ?> <br> Date Due:  <?php echo  $duedate ?></div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">From:</h5>                                            
                                            <h3 class="text-dark mb-1">Gerald A. Garcia</h3>
                                         
                                            <div>2546 Penn Street</div>
                                            <div>Sikeston, MO 63801</div>
                                            <div>Email: info@gerald.com.pl</div>
                                            <div>Phone: +573-282-9117</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">To:</h5>
                                            <h3 class="text-dark mb-1"><?php echo  $tenantname ?></h3>                                            
                                            <div>House name: <?php echo  $propertyname ?>  Unit No: <?php echo  $unitid ?></div>
                                            <div>Egerton </div>
                                            <div>Email: info@anthonyk.com</div>
                                            <div>Phone: +614-837-8483</div>
                                        </div>
									
                                    </div>
									<div class="row mb-4">
                                       
										<div class="col-sm-6">
                                            <h5 class="mb-3">C/O:</h5>
                                            <h3 class="text-dark mb-1">Miliki Commercial Agency</h3>                                            
                                            <div>P.O Box 1234 egerton</div>
                                            <div>Booster Near Egerton Gate</div>
                                            <div>Email: info@anthonyk.com</div>
                                            <div>Phone: +614-837-8483</div>
                                        </div>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="center">#</th>
                                                    <th>Item</th>
                                                    <th>Description</th>
                                                    <th class="right">Unit Cost</th>
                                                 
                                                    <th class="right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="center">1</td>
                                                    <td class="left strong">Rent</td>
                                                    <td class="left">Rent for <?php echo  $unitid ?></td>
                                                    <td class="right"><?php echo  $rent ?></td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $rent ?></td>
                                                </tr>
                                                   <tr>
                                                    <td class="center">2</td>
                                                    <td class="left strong">balance b/f</td>
                                                    <td class="left">Prom previous invoice</td>
                                                    <td class="right"> </td>
                                                    <td class="center"> </td>
                                                    <td class="right"><?php echo  $balancebf ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-5">
                                        </div>
                                        <div class="col-lg-4 col-sm-5 ml-auto">
                                            <table class="table table-clear">
                                                <tbody>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Subtotal</strong>
                                                        </td>
                                                        <td class="right">KSH <?php echo  $subtotal ?></td>
                                                    </tr>
                                                  
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">VAT (16%)</strong>
                                                        </td>
                                                        <td class="right">KSH <?php echo  $vat ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Total</strong>
                                                        </td>
                                                        <td class="right">
                                                            <strong class="text-dark">KSH <?php echo  $total ?></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <p class="mb-0">Developer: Appsnest(0790000450)</p>
                                </div>
								 
                            </div>
												 
														
															
                        </div>
                    </div>
					
					<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="printDiv('paidinvoice1')">Print</button>
      </div>
	  
	  
    </div>
  </div>
</div>
                
           
            <!-- ============================================================== -->
            <!-- end paid Invoice -->
            <!-- ============================================================== -->  

<?php

if(!mysqli_query($connect,$update6b)){
echo "<script>alert('FAILED TO EFFECT PAYMENTS')</script>".mysqli_error($connect);
}
}
else
   echo "<script>alert('PAY FIRST')</script>";

}
?>
    
				
											 <!-- ============================================================== -->
                        <!-- end table 1 -->
                        <!-- ============================================================== -->
						
						
						
						 <!-- ============================================================== -->
                        <!-- start table 2  -->
                        <!-- ============================================================== -->
                                            <div class="tab-pane fade" id="card-pill-2" role="tabpanel" aria-labelledby="card-tab-2">
<div class="table-responsive">
                                    <table id="example3" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>INVOICE NO</th>
                                                <th>UNIT ID</th>
                                                <th> TENANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                <th>MONTH</th>
                                                 
												<th>DUE RENT</th>
												<th>BALANCE BF</th>
												<th>SUBTOTAL</th>
											<th>DUE DATE</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            								
										<?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select3o="SELECT * FROM tenantinvoices WHERE propertyid='$propertyid' AND status='OVERDUE'";

if(mysqli_query($connect,$select3o))
{
$i=1;
$result3o=mysqli_query($connect,$select3o);



while($row=mysqli_fetch_array($result3o)){

$invoiceno = $row['invoiceno'];
$propertyid = $row['propertyid'];
$unitid = $row['unitid'];
$tenantid = $row['tenantid'];
$rent = $row['rent'];
$month = $row['month'];
$balancebf = $row['balancebf'];
$duedate = $row['duedate'];
$dategenerated = $row['duedate'];

	$select7o="SELECT firstname,middlename,suname FROM tenants WHERE idno='$tenantid' ";
$sel7o=mysqli_query($connect,$select7o);
	$row=mysqli_fetch_array($sel7o);		
			$firstname=$row['firstname'];
			$middlename=$row['middlename'];
			$suname=$row['suname'];

		$tenantname=$row['firstname']." ".$row['middlename']." ".$row['suname'];	
		
		$subtotal =$rent+$balancebf;
		
		//$vat=10/100*$subtotal;
		$vat=0;
		$total =$subtotal+$vat;

echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$invoiceno."</td>";
echo "<td>".$unitid."</td>";

echo "<td>".$tenantname."</td>";
echo "<td>".$month."</td>";
echo "<td>".$rent."</td>";
echo "<td>".$balancebf."</td>";
echo"<TD>".$subtotal."</TD>";
echo "<td>".$duedate."</td>";
		
			
 echo"<td><a href ='tenantoverdueinvoice.php?act=view& invoiceno=".$invoiceno."' class='btn btn-sm btn-outline-light' >View  </a> 
<a href='#' class='btn btn-sm btn-outline-light'data-toggle='modal' data-target='.bd-example-modal-lg'>  <i class='fas fa-print'> </i>  </a>
</td></tr>";  
$i++;
}
 

}
else {
include ('../404-page.html');
				 }
?>
                                         
                                        <tfoot>
                                           <tr>
                                                <th>NO</th>
                                                <th>INVOICE NO</th>
                                                <th>UNIT ID</th>
                                                <th> TENANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                <th>MONTH</th>
                                                 
												<th>DUE RENT</th>
												<th>BALANCE BF</th>
												<th>SUBTOTAL</th>
											<th>DUE DATE</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>                                              
											  </div>
											
														 <!-- ============================================================== -->
                        <!-- end table 2 -->
                        <!-- ============================================================== -->
						
						
						 <!-- ============================================================== -->
                        <!-- start table 3 -->
                        <!-- ============================================================== -->
                                            <div class="tab-pane fade" id="card-pill-3" role="tabpanel" aria-labelledby="card-tab-3">
<div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>INVOICE NO</th>
                                                <th>UNIT ID</th>
                                                <th> TENANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                <th>MONTH</th>
                                                 
												<th>DUE RENT</th>
												<th>BALANCE BF</th>
												<th>SUBTOTAL</th>
											<th>DUE DATE</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            								
										<?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select3p="SELECT * FROM tenantinvoices WHERE propertyid='$propertyid' AND status='PAID'" ;

if(mysqli_query($connect,$select3p))
{
$i=1;
$result3p=mysqli_query($connect,$select3p);



while($row=mysqli_fetch_array($result3p)){

$invoiceno = $row['invoiceno'];
$propertyid = $row['propertyid'];
$unitid = $row['unitid'];
$tenantid = $row['tenantid'];
$rent = $row['rent'];
$month = $row['month'];
$balancebf = $row['balancebf'];
$duedate = $row['duedate'];
$dategenerated = $row['duedate'];

	$select7p="SELECT firstname,middlename,suname FROM tenants WHERE idno='$tenantid' ";
$sel7p=mysqli_query($connect,$select7p);
	$row=mysqli_fetch_array($sel7p);		
			$firstname=$row['firstname'];
			$middlename=$row['middlename'];
			$suname=$row['suname'];

		$tenantname=$row['firstname']." ".$row['middlename']." ".$row['suname'];	
		
		$subtotal =$rent+$balancebf;
		
		//$vat=10/100*$subtotal;
		$vat=0;
		$total =$subtotal+$vat;

echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$invoiceno."</td>";
echo "<td>".$unitid."</td>";

echo "<td>".$tenantname."</td>";
echo "<td>".$month."</td>";
echo "<td>".$rent."</td>";
echo "<td>".$balancebf."</td>";
echo"<TD>".$subtotal."</TD>";
echo "<td>".$duedate."</td>";
		
			


 echo"<td><a href ='tanantpaidinvoice.php?act=view& invoiceno=".$invoiceno."' class='btn btn-sm btn-outline-light' >View  </a> 
<a href='#' class='btn btn-sm btn-outline-light'data-toggle='modal' data-target='.bd-example-modal-lg'>  <i class='fas fa-print'> </i>  </a>
</td></tr>"; 
$i++;
}
 

}
else {
include ('../404-page.html');
				 }
?>
                                         
                                        <tfoot>
                                           <tr>
                                                <th>NO</th>
                                                <th>INVOICE NO</th>
                                                <th>UNIT ID</th>
                                                <th> TENANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                <th>MONTH</th>
                                                 
												<th>DUE RENT</th>
												<th>BALANCE BF</th>
												<th>SUBTOTAL</th>
											<th>DUE DATE</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>                                              
											  </div>
											
														 <!-- ============================================================== -->
                        <!-- end table 3 -->
                        <!-- ============================================================== -->
						
						 <!-- ============================================================== -->
                        <!-- start table 4  -->
                        <!-- ============================================================== -->
                                            <div class="tab-pane fade" id="card-pill-4" role="tabpanel" aria-labelledby="card-tab-4">
<div class="table-responsive">
                                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>INVOICE NO</th>
                                                <th>UNIT ID</th>
                                                <th> TENANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                <th>INVOICED AMOUNT</th>
                                                 
												<th>PAID</th>
												<th>DUE BALANCE</th>
												
											<th>PAYMENT DATE </th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
										<?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select3="SELECT * FROM balances WHERE propertyid='$propertyid' AND status='DUE'" ;

if(mysqli_query($connect,$select3))
{
$i=1;
$result3=mysqli_query($connect,$select3);



while($row=mysqli_fetch_array($result3)){

$invoiceno = $row['invoiceno'];
$propertyid = $row['propertyid'];
$unitid = $row['unitid'];
$tenantid = $row['tenantid'];
$dueamount = $row['dueamount'];
$paidamount = $row['paidamount'];
$duebalance = $row['balancecf'];
$datepaid = $row['paymentdate'];


	$select7="SELECT firstname,middlename,suname FROM tenants WHERE idno='$tenantid' ";
$sel7=mysqli_query($connect,$select7);
	$row=mysqli_fetch_array($sel7);		
			$firstname=$row['firstname'];
			$middlename=$row['middlename'];
			$suname=$row['suname'];

		$tenantname=$row['firstname']." ".$row['middlename']." ".$row['suname'];	
		
	

echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$invoiceno."</td>";
echo "<td>".$unitid."</td>";

echo "<td>".$tenantname."</td>";
echo "<td>".$dueamount."</td>";
echo "<td>".$paidamount."</td>";
echo "<td>".$duebalance."</td>";
echo "<td>".$datepaid."</td>";
		
			


 echo"<td><a href ='duebalance.php?act=view& invoiceno=".$invoiceno."' class='btn btn-sm btn-outline-light' >View  </a> 
<a href='#' class='btn btn-sm btn-outline-light'data-toggle='modal' data-target='.bd-example-modal-lg'>  <i class='fas fa-print'> </i>  </a>
</td></tr>"; 
  
$i++;
}
 

}
else {
include ('../404-page.html');
				 }
?>

										
                                        </tbody>
                                
                                        <tfoot>
                                      <tr>
                                                <th>NO</th>
                                                <th>INVOICE NO</th>
                                                <th>UNIT ID</th>
                                                <th> TENANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                <th>INVOICED AMOUNT</th>
                                                 
												<th>PAID</th>
												<th>DUE BALANCE</th>
												
											<th>PAYMENT DATE </th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>                                              
											  </div>
											
														 <!-- ============================================================== -->
                        <!-- end table 4 -->
                        <!-- ============================================================== -->
						
						
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end card navigaion  -->
                        <!-- ============================================================== -->
            </div>
          </div>

   
	  <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../../assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="../../assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="../../assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="../../assets/vendor/datatables/js/data-table.js"></script>
	<script src="../../assets/vendor/datepicker/moment.js"></script>
    <script src="../../assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
    <script src="../../assets/vendor/datepicker/datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    
    <script>
    $(function(e) {
        "use strict";
        $(".date-inputmask").inputmask("yyyy-mm-dd"),
            $(".phone-inputmask").inputmask("(999) 999-9999"),
            $(".international-inputmask").inputmask("+9(999)999-9999"),
            $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
            $(".purchase-inputmask").inputmask("aaaa 9999-****"),
            $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
            $(".ssn-inputmask").inputmask("999-99-9999"),
            $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
            $(".currency-inputmask").inputmask("$9999"),
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
		<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
	</script>
	
	 <script type="text/javascript">
            $(function () {
                $('#datetimepicker4').datetimepicker({
                    format: "%Y-%m-%d"
                });
            });</script>
			
</body>
 
</html>
<?php



if(isset($_POST['submit-invoice'])){

$month=$_POST["mon"];	
$datedue1=$_POST["datedue1"];	
$counterid = $propertyid. "-". $month;

$selcount3="SELECT COUNT(counterid) AS invoiced FROM counter
WHERE counterid='$counterid'"; 
$selcount4=mysqli_query($connect,$selcount3);
$row=mysqli_fetch_array($selcount4);
$invoiced=$row['invoiced'];

if($invoiced < 1){

$select="SELECT units.price,units.unitid,tenants.firstname,tenants.middlename,tenants.suname,tenants.idno,tenants.propertyid 
FROM tenants
LEFT JOIN units
ON units.unitid = tenants.unitid and units.propertyid=tenants.propertyid  WHERE tenants.propertyid ='$propertyid'";

if(mysqli_query($connect,$select))
{

$result=mysqli_query($connect,$select);

while($row=mysqli_fetch_array($result)){

$propertyid1=$row['propertyid'];
$unitid=$row['unitid'];
$tenantid=$row['idno'];
$rent=$row['price'];
$status='DUE';
$invoiceno = $propertyid."-".$unitid."-". $month;
	$le=Date("y-m-d");
	
$insert1="INSERT INTO tenantinvoices(invoiceno,propertyid,unitid,tenantid,month,duedate,dategenerated,rent,status) 
VALUES('$invoiceno','$propertyid1','$unitid','$tenantid','$month','$datedue1','$le','$rent','$status')";

if(!mysqli_query($connect,$insert1)){
echo "<font color='black'>Failed to send</font> ".mysqli_error($connect);
}

$selcount6="SELECT SUM(balancecf) AS balances FROM balances
WHERE tenantid='$tenantid' AND propertyid='$propertyid1' AND unitid='$unitid' and status='DUE'"; 

$selcount7=mysqli_query($connect,$selcount6);
$row7=mysqli_fetch_array($selcount7);
$balances=$row7['balances'];

$update6 = "UPDATE tenantinvoices SET balancebf='$balances' WHERE invoiceno='$invoiceno'"; 
if(!mysqli_query($connect,$update6)){
echo "<font color='black'>Failed to update tenantinvoices</font> ".mysqli_error($connect);
}

$update6a = "UPDATE balances SET status='INVOICED' WHERE tenantid='$tenantid' AND propertyid='$propertyid1' AND unitid='$unitid' and status='DUE'"; 
if(!mysqli_query($connect,$update6a)){
echo "<font color='black'>Failed to update balances</font> ".mysqli_error($connect);
}
}

$insert2="INSERT INTO counter(counterid,propertyid,month) 
VALUES('$counterid','$propertyid','$month')";

if(!mysqli_query($connect,$insert2)){
echo "<font color='black'>Failed to send</font> ".mysqli_error($connect);
}
}




}

else{
	
	header('location:invoices.php');
}

// pay invoice



		}		} 
?>

