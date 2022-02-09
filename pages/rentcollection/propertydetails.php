<?php 
                 include('../dbconnect.php');
                require('../adminsession.php');
				 if($_GET['act']=="details"){
	
	$propertyid =$_GET['propertyid'];
	
$select9="SELECT * FROM property WHERE propertyid='$propertyid' ";
$sel9=mysqli_query($connect,$select9);
	$row=mysqli_fetch_array($sel9);		
			$propertyname=$row['propertyname'];
			$propertytype=$row['type'];
			$propertyestate=$row['estatename'];
			$electricitydeposit=$row['electricitydeposit'];
			$waterdeposit=$row['waterdeposit'];
			$waterbill=$row['waterbill'];
			$electricitybill=$row['electricitybill'];
			$sanitationbill=$row['sanitationbill'];
			$propertycommision=$row['commission'];
			

		
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
    
      
            <div class="container-fluid dashboard-content">
			 <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
								<div class="row">
						  <div class="col">
                                    <h2 class="pageheader-title">
									
									<?php 
									echo $propertyname;
									?></h2>
                                   </div>
                                    <div class="col">
									<center>
                            <a href="#" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target=".editproperty"> Edit  </a>
							<a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target=".removeproperty"> Remove </a>
							</center>
                           </DIV>
                                </div>
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
						 
                            <h5 class="card-header">PROPERTY OVERVIEW</h5>
						
							
							
							 <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                      
                                        <tbody>
                                       <?php
		
										echo "
<tr><td> Property Name: </td><td style='color:black;' >".$propertyname."</td>
<td> Property No: </td><td style='color:black;'>".$propertyid."</td></tr>
<tr><td>Total Units:  </td><td style='color:black;'>".$totalunits."</td><td> Vacant Units:  </td><td style='color:black;'>".$unoccupied."</td></tr>
<tr><td>Occupied Units:  </td><td style='color:black;'>".$occupied."</td><td>Booked Units:  </td><td style='color:black;'>".$booked."</td></tr>";

?>	
                                          
									
				
				
											  
										</tbody>
                                        
										
                                      
                                    </table>
                                </div>
                            </div>
							
                 <?php 




                 include('addunits.php');
				 ?>

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
                                    <h3 class="section-title">Property Details</h3>
                                                                    </div>
                            </div>
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header pills-regular">
                                        <ul class="nav nav-pills card-header-pills" id="myTab2" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="card-pills-1" data-toggle="tab" href="#card-pill-1" role="tab" aria-controls="card-1" aria-selected="true">TENANTS</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="card-pills-2" data-toggle="tab" href="#card-pill-2" role="tab" aria-controls="card-2" aria-selected="false">BOOKINGS</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="card-pills-3" data-toggle="tab" href="#card-pill-3" role="tab" aria-controls="card-3" aria-selected="false">UNITS</a>
                                            </li>
											 <li class="nav-item">
                                                <a class="nav-link" id="card-pills-4" data-toggle="tab" href="#card-pill-4" role="tab" aria-controls="card-3" aria-selected="false">LANDLORD</a>
                                            </li>
											<li class="nav-item">
                                                <a class="nav-link" id="card-pills-4" data-toggle="tab" href="#card-pill-5" role="tab" aria-controls="card-3" aria-selected="false">OLD TENANTS</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent2">
										 <!-- ============================================================== -->
                        
               
           <?php 




                 include('viewtenants.php');
                include('viewbookings.php');
                include('viewunits.php');
                include('viewlandlord.php');
                include('viewoldtenants.php');
				 
				 
				 ?>
						
						
						
					
				






								
											  </div>
											
														 <!-- ============================================================== -->
                        <!-- end table 4 -->
                        <!-- ============================================================== -->
						
						
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
              <?php

include('editproperty1.php');
include('removeproperty1.php');
  ?>
			
			
			
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
		} 
?>

