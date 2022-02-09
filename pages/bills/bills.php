<?php 
                 include('../dbconnect.php');
                require('../adminsession.php');
				 ?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bills</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/libs/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
  
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
  

        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
      
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                    <h2 class="pageheader-title">Tenant Bills</h2>
                                   
                                   
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->
                            <!-- overview  -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                               <div class="card-header pills-regular">
								 
                                        <ul class="nav nav-pills card-header-pills"  role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="bills.php"role="tab" >Water</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"  href="addtenant.php">Electricity</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"  href="estate.php" >Sanitation</a>
                                            
											
                                        </ul>

										
								
							
                            </div>
                            </div>
                            <div class="card-body">
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
                                        <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">Shared Bill</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#pills-packages" role="tab" aria-controls="pills-packages" aria-selected="false">Own Meters</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">Included In Rent</a>
                                    </li>
                                   
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                       
                                        <div class="section-block">
                                            <h3 class="section-title">Shared Water bills Properties</h3>
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
										 <th>PROPERTY NAME</th>
										<th>OUTSTANDING </th>
										<th>ACTION </th>
										
									
                                    </tr>
                                        </thead>
										 <?php 
										 
										 $shared='SHARED BILL'; 
										
										$select="SELECT * FROM property WHERE agencyid='$agencyid' AND status='ACTIVE' AND waterbill='$shared' ORDER BY regdate ASC";
                 
                 if(mysqli_query($connect,$select))
{
$i=1;
$result=mysqli_query($connect,$select);


while($row=mysqli_fetch_array($result)){
$propertyid = $row['propertyid'];
echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['propertyid']."</td>";
echo "<td>".$row['propertyname']."</td>";
echo "<td>".$row['propertyname']."</td>";


echo "<td>

<a class='btn btn-success btn-sm'  href ='propertydetails.php?act=details& propertyid=".$propertyid."'>
Details
</a>
</td>";
echo "</tr>"; 
$i++;
}
}
?>
                                        
                                        </tbody>
                                        <tfoot>
                                               <tr>
                                      <th>NO</th>
                                         <th>PROPERTY ID</th>
										 <th>PROPERTY NAME</th>
										<th>OUTSTANDING </th>
										<th>ACTION </th>
							
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
											
								  <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                         <tr>
                                        <th>NO</th>
                                         <th>PROPERTY ID</th>
										 <th>PROPERTY NAME</th>
										<th>OUTSTANDING </th>
										<th>ACTION </th>
										
									
                                    </tr>
                                        </thead>
										 <?php 
										 
										  
										 $metered='OWN METERS'; 

										$select="SELECT * FROM property WHERE agencyid='$agencyid' AND status='ACTIVE' AND waterbill='$metered' ORDER BY regdate ASC";
                 
                 if(mysqli_query($connect,$select))
{
$i=1;
$result=mysqli_query($connect,$select);


while($row=mysqli_fetch_array($result)){
$propertyid = $row['propertyid'];
echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['propertyid']."</td>";
echo "<td>".$row['propertyname']."</td>";
echo "<td>".$row['propertyname']."</td>";


echo "<td>

<a class='btn btn-success btn-sm'  href ='propertydetails.php?act=details& propertyid=".$propertyid."'>
Details
</a>
</td>";
echo "</tr>"; 
$i++;
}
}
?>
                                        
                                        </tbody>
                                        <tfoot>
                                               <tr>
                                      <th>NO</th>
                                         <th>PROPERTY ID</th>
										 <th>PROPERTY NAME</th>
										<th>OUTSTANDING </th>
										<th>ACTION </th>
							
                                    </tr>
                                        </tfoot>
                                    </table>
                                </div>
											</div>
											</div>
                                    
                                         
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                               <div class="card">
                                            <div class="card-body">
											
								 <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                         <tr>
                                        <th>NO</th>
                                         <th>PROPERTY ID</th>
										 <th>PROPERTY NAME</th>
										<th>OUTSTANDING </th>
										<th>ACTION </th>
										
									
                                    </tr>
                                        </thead>
										 <?php 
										 
										
										 $included='INCLUDED IN RENT'; 
										$select="SELECT * FROM property WHERE agencyid='$agencyid' AND status='ACTIVE' AND waterbill='$included' ORDER BY regdate ASC";
                 
                 if(mysqli_query($connect,$select))
{
$i=1;
$result=mysqli_query($connect,$select);


while($row=mysqli_fetch_array($result)){
$propertyid = $row['propertyid'];
echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['propertyid']."</td>";
echo "<td>".$row['propertyname']."</td>";
echo "<td>".$row['propertyname']."</td>";


echo "<td>

<a class='btn btn-success btn-sm'  href ='propertydetails.php?act=details& propertyid=".$propertyid."'>
Details
</a>
</td>";
echo "</tr>"; 
$i++;
}
}
?>
                                        
                                        </tbody>
                                        <tfoot>
                                               <tr>
                                      <th>NO</th>
                                         <th>PROPERTY ID</th>
										 <th>PROPERTY NAME</th>
										<th>OUTSTANDING </th>
										<th>ACTION </th>
							
                                    </tr>
                                        </tfoot>
                                    </table>
                                </div>
											</div>
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
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end overview  -->
                            <!-- ============================================================== -->
							
							
							
				  
                        </div>
                        <!-- ============================================================== -->
                  
                   
                        <!-- ============================================================== -->
                    </div>
                    <!-- ============================================================== -->
                  
                </div>
        
         

    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
   
	  <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../../assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="../../assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="../../assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="../../assets/vendor/datatables/js/data-table.js"></script>
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
        $(".date-inputmask").inputmask("dd/mm/yyyy"),
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
</body>
 
</html>
