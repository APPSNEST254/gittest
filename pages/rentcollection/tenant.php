<?php 

                include('../dbconnect.php');
                require('../adminsession.php');
 global $idno1; 
 global $propertyid2; 
 global $unitid2; 
 global $invoiceno1; 

 
$idno=$idno1;
$propertyid=$propertyid2;
$unitid=$unitid2;
$invoiceno=$invoiceno1;

				
$select9="SELECT propertyname,waterbill,electricitybill,sanitationbill FROM property WHERE propertyid='$propertyid' ";
$sel9=mysqli_query($connect,$select9);
	$row=mysqli_fetch_array($sel9);		
			$propertyname=$row['propertyname'];
			$waterbill=$row['waterbill'];
			$electricitybill=$row['electricitybill'];
			$sanitationbill=$row['sanitationbill'];

$metered='METERED';
$shared='SHARED';
$na='N/A';



$select="SELECT * FROM tenants WHERE idno  = '$idno'";
if(mysqli_query($connect,$select))
$result=mysqli_query($connect,$select);



while($test=mysqli_fetch_array($result)){
$idno=$test['idno'];
$firstname=$test['firstname'];
$middlename=$test['middlename'];
$suname=$test['suname'];
$title=$test['title'];
	
$name= $title." ".$firstname." ".$middlename." ".$suname;         
$email=$test['email'];
$mobileno=$test['mobileno'];	
$altno=$test['altno'];	
$occupation=$test['occupation'];
$company=$test['company'];				
			$fromdate=$test['fromdate'];
$todate=$test['todate'];



}
/*      ####################  advancce and deposits #################*/
$selcount5="SELECT SUM(advancepayment) AS advance FROM advancerent WHERE propertyid='$propertyid' AND unitid='$unitid' AND tenantid='$idno' AND status='ADVANCE'";


$selcount6=mysqli_query($connect,$selcount5);
$row6=mysqli_fetch_array($selcount6);
$advance1=$row6['advance'];
if($advance1>1) {
	$advance2=$advance1;	
	
	}
else {
	
	$advance2=0;

}
$select9b="SELECT total FROM deposit WHERE propertyid='$propertyid' AND unitid='$unitid' AND idno='$idno' AND status='ACTIVE' ";
$sel9b=mysqli_query($connect,$select9b);
	$row2=mysqli_fetch_array($sel9b);		
			$deposit1=$row2['total'];
			
			
if($deposit1>1) {
	$deposit2=$deposit1;	
	
	}
else 
{
	$deposit2=0;
}
$advancedep=$advance2+$deposit2;

/*      ####################  End advancce and deposits #################*/


/*      ####################  Balances #################*/
$selcount5m="SELECT SUM(balancecf) AS balancebf FROM balances WHERE propertyid='$propertyid' AND unitid='$unitid' AND tenantid='$idno' AND status='DUE' ";


$selcount6m=mysqli_query($connect,$selcount5m);
$row6m=mysqli_fetch_array($selcount6m);
$balancecf2=$row6m['balancebf'];

if($balancecf2>1) {
	$balancecf3=$balancecf2;	
	
	}
else 
{
	$balancecf3=0;
}
/*      #################### End Balances #################*/


/*      ####################  Sum invoices /bills #################*/
$selcount5n="SELECT SUM(invoicedamount) AS dueamount FROM tenantinvoices WHERE propertyid='$propertyid' AND unitid='$unitid' AND tenantid='$idno' AND status='DUE' ";


$selcount6n=mysqli_query($connect,$selcount5n);
$row6n=mysqli_fetch_array($selcount6n);
$dueamount1=$row6n['dueamount'];

if($dueamount1>1) {
	$dueamount2=$dueamount1;	
	
	}
else 
{
	$dueamount2=0;
}
/*      water bill  */
if($waterbill==$shared){
$selcount5o="SELECT SUM(tenantamount) AS waterdueamount FROM sharedwaterbill WHERE propertyid='$propertyid' AND unitid='$unitid' AND tenantid='$idno' AND status='DUE' ";


$selcount6o=mysqli_query($connect,$selcount5o);
$row6o=mysqli_fetch_array($selcount6o);
$waterdueamount1=$row6o['waterdueamount'];

if($waterdueamount1>1) {
	$waterdueamount2=$waterdueamount1;	
	
	}
else 
{
	$waterdueamount2=0;
}
}


if($waterbill==$metered){
$selcount5p="SELECT SUM(tenantamount) AS waterdueamount FROM sharedwaterbill WHERE propertyid='$propertyid' AND unitid='$unitid' AND tenantid='$idno' AND status='DUE' ";


$selcount6p=mysqli_query($connect,$selcount5p);
$row6p=mysqli_fetch_array($selcount6p);
$waterdueamount1=$row6p['waterdueamount'];

if($waterdueamount1>1) {
	$waterdueamount2=$waterdueamount1;	
	
	}
else 
{
	$waterdueamount2=0;
}
}

if($waterbill==$na){
$waterdueamount2=0;	
}
/*     end  water bill  */

$dueinvoices=$dueamount2+$waterdueamount2;

/*      #################### End Balances #################*/



/*      #################### Total Paid#################*/

$selcount5q="SELECT SUM(paid) AS totalpaid1 FROM tenantinvoices WHERE propertyid='$propertyid' AND unitid='$unitid' AND tenantid='$idno' AND status='PAID' ";


$selcount6q=mysqli_query($connect,$selcount5q);
$row6q=mysqli_fetch_array($selcount6q);
$totalpaid1=$row6q['totalpaid1'];

if($totalpaid1>1) {
	$totalpaid2=$totalpaid1;	
	
	}
else 
{
	$totalpaid2=0;
}
/*      #################### Total Paid#################*/




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
	
	   <link rel="stylesheet" type="text/css" media="all" href="../jsDatePick_ltr.min.css" />
	
    <title>Tenant</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->

            <div class="influence-profile">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
							<div class="row">
						  <div class="col">
                                     <h3 class="mb-2">Tenant Profile </h3>
									
									
                                   </div>
                                    <div class="col">
									<center>
                            <a href="#" class="btn btn-sm btn-outline-warning" data-toggle="modal" <?php echo "data-target='#agreementform".$idno."'";?>> Agreement Form  </a>
                            <a href="#" class="btn btn-sm btn-outline-success" data-toggle="modal" <?php echo "data-target='#edittenant".$idno."'";?> > Edit  </a>
							<a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal" <?php echo "data-target='#removetenant".$idno."'";?> > Checkout </a>
							</center>
							
							
                           </DIV>
                                </div>
                                    <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="properties.php" class="breadcrumb-link">Properties</a></li>
                                    
                                        </ol>
                                    </nav>
                                </div>
                           
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- content -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- profile -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card profile -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar text-center d-block">
                                        <img src="../../assets/images/avatar-1.jpg" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                    </div>
                                    <div class="text-center">
                                        <h2 class="font-24 mb-0"><?php echo $name; ?></h2>
                                         <h5 class="mb-0">Property Name: </h5>
                                                    <p><?php echo $propertyname; ?></p>
										<h5 class="mb-0">Property ID: </h5>
                                                    <p><?php echo $propertyid; ?></p>
															
										<h5 class="mb-0">Unit ID: </h5>
                                                    <p><?php echo $unitid; ?></p>
										
                                       
                                      
                                    </div>
                                </div>
								
                                <div class="card-body border-top">
                                    <h3 class="font-16">Contact Information</h3>
                                    <div class="">
                                        <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i><?php echo $email; ?></li>
                                        <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i>0<?php echo $mobileno; ?></li>
                                        <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i>0<?php echo $altno; ?> (alt)</li>
                                    </ul>
                                    </div>
                                </div>
								 <div class="card-body border-top">
                                    <h3 class="font-16">Other Information</h3>
                                   
                                         <h6 class="mb-0">Occupation: </h6>
                                                    <p><?php echo $occupation; ?></p>
											
											<h6 class="mb-0">Company/ Institution: </h6>
                                                    <p><?php echo $company; ?></p>
													
										<h6 class="mb-0">Checkin date: </h6>
                                                    <p><?php echo $fromdate; ?></p>
										<h6 class="mb-0">Vacation date: </h6>
                                                    <p><?php echo $todate; ?></p>
                            
                                
								</div>
                                
                            </div>
                            <!-- ============================================================== -->
                            <!-- end card profile -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end profile -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- campaign data -->
                        <!-- ============================================================== -->
                        <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- campaign tab one -->
                            <!-- ============================================================== -->
                            <div class="influence-profile-content pills-regular">
                                <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">Summary</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#pills-packages" role="tab" aria-controls="pills-packages" aria-selected="false">Due Amounts</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">Paid Amounts</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-msg" role="tab" aria-controls="pills-msg" aria-selected="false">Send Messages</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="section-block">
                                                    <h3 class="section-title">Summaries</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1"><?php Echo $totalpaid2; ?></h1>
                                                        <p>Total Payments</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1"><?php Echo $dueinvoices; ?></h1>
                                                        <p>Due Invoices & Bills</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1"><?php Echo $balancecf3; ?></h1>
                                                        <p>Balances</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1"><?php Echo $advancedep; ?></h1>
                                                        <p>Deposit & Advance</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section-block">
                                            <h3 class="section-title">Tenant Properties History</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                             			 <!-- ============================================================== -->
                        <!-- start table 1  -->
                        <!-- ============================================================== -->
                                            <div class="tab-pane fade show active" id="card-pill-1" role="tabpanel" aria-labelledby="card-tab-1">
                                 
									<div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                         <tr>
                                        <th>NO</th>
                                         <th>PROPERTY ID</th>
										 <th>UNIT NO</th>
										<th>CHECKED IN </th>
										<th>CHECK OUT </th>
										<th>BALANCE B/F </th>
										
									
                                    </tr>
                                        </thead> <?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select="SELECT tenants.*, units.unitid,units.price,units.propertyid,property.propertyname,property.propertyid,property.agencyid
FROM tenants
LEFT JOIN units
ON tenants.unitid = units.unitid and tenants.propertyid = units.propertyid LEFT JOIN property ON tenants.propertyid= property.propertyid WHERE tenants.propertyid = '$propertyid' AND  tenants.idno='$idno' AND  property.agencyid = '$agencyid'ORDER BY units.unitid ASC";

if(mysqli_query($connect,$select))
{
$i=1;
$result=mysqli_query($connect,$select);



while($row=mysqli_fetch_array($result)){
$idno = $row['idno'];
$unitid = $row['unitid'];
echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['propertyid']."</td>";
echo "<td>".$row['unitid']."</td>";
echo "<td>".$row['fromdate']."</td>";
echo "<td>".$row['todate']."</td>";


$selcount5m="SELECT SUM(balancecf) AS balancebf
FROM balances 
LEFT JOIN property ON balances.propertyid = property.propertyid  WHERE balances.tenantid='$idno' and balances.propertyid='$propertyid' and balances.unitid='$unitid' AND  balances.status='DUE'and property.agencyid='$agencyid'";


$selcount6m=mysqli_query($connect,$selcount5m);
$row6m=mysqli_fetch_array($selcount6m);
$balancebf=$row6m['balancebf'];

echo"<TD>".$balancebf."</TD>";

echo "</tr>"; 
$i++;
}

}
else {
include ('adminhm.php');
				 }
?>
                                        
                                        </tbody>
                                        <tfoot>
                                               <tr>
                                      <th>NO</th>
                                         <th>PROPERTY ID</th>
										 <th>UNIT NO</th>
										<th>CHECKED IN </th>
										<th>CHECK OUT </th>
										<th>BALANCE B/F </th>
							
                                    </tr>
                                        </tfoot>
                                    </table>
                                </div>
                               
										   </div>
		                                            



               
           
						
						 <!-- ============================================================== -->
                        <!-- start table 2  -->
                        <!-- ============================================================== -->
                                            </div>
                                           
                                        </div>
                                     
                                       
                                    </div>
                                    <div class="tab-pane fade" id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
                                        <div class="row">
                                           
                                            <div class="card">
                                            <div class="card-body">
											
								  <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                         <tr>
										 <th COLSPAN=8>DUE INVOICES</th>
                                         </tr>
                                         <tr>
                                                
                                                <th>INVOICE #</th>
                                                
                                               <th>MONTH</th>
                                                 
												<th>DUE RENT</th>
												<th>BALANCE BF</th>
												<th>SUBTOTAL</th>
											<th>DUE DATE</th>
											<th>STATUS</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </thead> <tbody>
										
										<?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select3="SELECT * FROM tenantinvoices WHERE propertyid='$propertyid' AND unitid='$unitid' AND tenantid='$idno' AND status='DUE'||status='OVERDUE' ORDER BY invoiceno DESC" ;

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
$status = $row['status'];

		$subtotal =$rent+$balancebf+$penaltyfee;
		
		//$vat=10/100*$subtotal;
		$vat=0;
		$total =$subtotal+$vat;

echo "<tr>";

echo "<td>".$invoiceno."</td>";

echo "<td>".$month."</td>";
echo "<td>".$rent."</td>";
echo "<td>".$balancebf."</td>";
echo"<TD>".$subtotal."</TD>";
echo "<td>".$duedate."</td>";
echo "<td>".$status."</td>";
		
			


echo"<td><a href ='../invoices/tenantdueinvoice.php?act=view& invoiceno=".$invoiceno."' class='btn btn-sm btn-outline-light' >View  </a> 
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
                                                
                                                <th>INVOICE #</th>
                                                
                                               <th>MONTH</th>
                                                 
												<th>DUE RENT</th>
												<th>BALANCE BF</th>
												<th>SUBTOTAL</th>
											<th>DUE DATE</th>
											<th>STATUS</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
											 
                                        </tfoot>
                                    </table>
									
									
									
									
				
								  <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                         <tr>
										 <th COLSPAN=8>ADVANCE PAYMENTS</th>
                                         </tr>
                                         <tr>
                                                
                                                <th>INVOICE #</th>
                                                
                                               <th>PAYMENT DATE</th>
                                                 
												<th>ADVANCE AMOUNT</th>
											</tr>
                                        </thead> <tbody>
										
										<?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select3a="SELECT * FROM advancerent WHERE propertyid='$propertyid' AND unitid='$unitid' AND tenantid='$idno' AND status='ADVANCE'ORDER BY invoiceno DESC" ;

if(mysqli_query($connect,$select3a))
{
$i=1;
$result3a=mysqli_query($connect,$select3a);



while($row=mysqli_fetch_array($result3a)){

$invoiceno = $row['invoiceno'];
$paymentdate = $row['paymentdate'];
$advancepayment = $row['advancepayment'];



echo "<tr>";

echo "<td>".$invoiceno."</td>";


echo "<td>".$paymentdate."</td>";
echo "<td>".$advancepayment."</td>";

		
			


echo"</tr>"; 
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
                                                
                                                
                                                <th>INVOICE #</th>
                                                
                                               <th>PAYMENT DATE</th>
                                                 
												<th>ADVANCE AMOUNT</th>
												</tr>
												
											 
                                        </tfoot>
                                    </table>
																	
									
									
									
											</div>
											</div>
                                    
                                         
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                               <div class="card">
                                            <div class="card-body">
											
								  <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                         <tr>
                                                <th>NO</th>
                                                <th>INVOICE NO</th>
                                                
                                               <th>MONTH</th>
                                                 
												<th>INVOICE AMOUNT</th>
												<th>BALANCE C/F</th>
												<th>PAID AMOUNT</th>
											<th>DATE PAID</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </thead> <tbody>
										
										<?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select3="SELECT * FROM tenantinvoices  WHERE propertyid='$propertyid' AND unitid= '$unitid' AND tenantid='$idno' AND status='PAID'" ;

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

		$subtotal =$rent+$balancebf+$penaltyfee;
		
		//$vat=10/100*$subtotal;
		$vat=0;
		$total =$subtotal+$vat;

echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$invoiceno."</td>";

echo "<td>".$month."</td>";
echo "<td>".$rent."</td>";
echo "<td>".$balancebf."</td>";
echo"<TD>".$subtotal."</TD>";
echo "<td>".$duedate."</td>";
		
			

echo"<td><a href ='../invoices/tanantpaidinvoice.php?act=view& invoiceno=".$invoiceno."' class='btn btn-sm btn-outline-light' >View  </a> 
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
                                                <th>MONTH</th>
                                                 
												<th>DUE RENT</th>
												<th>BALANCE BF</th>
												<th>SUBTOTAL</th>
											<th>DUE DATE</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                    </table>
											</div>
											</div>
                                  
                                    </div>
                                        <div class="tab-pane fade" id="pills-msg" role="tabpanel" aria-labelledby="pills-msg-tab">
                                        <div class="card">
                                            <h5 class="card-header">Send Messages</h5>
                                            <div class="card-body">
                                                <form>
                                                   
                                                       <div class="form-group">
                                                                <label for="name">Your Name</label>
                                                                <input type="text" class="form-control form-control-lg" id="name" placeholder="">
                                                            </div>
                                                           
                                                            <div class="form-group">
                                                                <label for="email">Your Email</label>
                                                                <input type="email" class="form-control form-control-lg" id="email" placeholder="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="subject">Subject</label>
                                                                <input type="text" class="form-control form-control-lg" id="subject" placeholder="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="messages">Messgaes</label>
                                                                <textarea class="form-control" id="messages" rows="3"></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary float-right">Send Message</button>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end campaign tab one -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end campaign data -->
                        <!-- ============================================================== -->
						
					
	
	<?php 



                 include('agreementform.php');
                 include('removetenant1.php');
                 include('edittenant.php');
	
	
	?>

	
	
                    </div>
                </div>
            </div>
           
      
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1  -->
    <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="../../assets/libs/js/main-js.js"></script>
	<script src="../../assets/vendor/datepicker/moment.js"></script>
    <script src="../../assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
    <script src="../../assets/vendor/datepicker/datepicker.js"></script>
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
