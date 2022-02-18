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
                                                <a class="nav-link" id="card-pills-2" data-toggle="tab" href="#card-pill-2" role="tab" aria-controls="card-2" aria-selected="false">Over Due</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="card-pills-3" data-toggle="tab" href="#card-pill-3" role="tab" aria-controls="card-3" aria-selected="false">Paid</a>
                                            </li>
											 <li class="nav-item">
                                                <a class="nav-link" id="card-pills-4" data-toggle="tab" href="#card-pill-4" role="tab" aria-controls="card-3" aria-selected="false">Balances</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent2">
                                        <?php 




include('duetenantinvoices.php');
include('tenantdueinvoice.php');
?>

			
    
				
											 <!-- ============================================================== -->
                        <!-- end table 1 -->
                        <!-- ============================================================== -->
						
						
                        <?php 




include('overduetenantinvoices.php');


include('paidtenantinvoices.php');


include('balancestenantinvoices.php');

?>

						
					
						
						
						
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

