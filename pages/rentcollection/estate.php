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
    <title>Estates</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/libs/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
	 <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
                                    <h2 class="pageheader-title">Estates</h2>
                                   
                                   
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
                                                <a class="nav-link " href="properties.php"role="tab" >Properties</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"  href="addtenant.php">Add Tenant/Booking</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active"  href="estate.php" >Estates</a>
                                            </li>
											<li>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</li>
											 <li class="nav-item">
                                                <a href="#" class="btn btn-rounded btn-brand" data-toggle="modal" data-target=".addestate1" >Add Estate</a>
                                            </li>
                                        </ul>

										
								
							
                            </div>
							
							
							
							
							
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                        <thead>
                  <tr>
				  <th>NO</th>
				  <th>ESTATE CODE</th>
				  <th>ESTATE NAME</th>
				  <th>COUNTY</th>
				  <th>TOWN</th>
				  <th>PROPERTIES</th>
				  <th>ACTION</th>
				  
										 </TR>
                  </thead>
                                        <tbody>
										
										   <?php 
             
              
                        
               
                             //selecting registered hospitals from table
                 $select="SELECT * FROM estate WHERE agencyid='$agencyid' ORDER BY abbriviation ASC";
                 
                 if(mysqli_query($connect,$select))
{
$i=1;
$result=mysqli_query($connect,$select);
while($row=mysqli_fetch_array($result)){
	$estatename = $row['estatename'];
	$county = $row['county'];
	$town = $row['town'];
	$abbriviation = $row['abbriviation'];



echo "<tr>";
echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$abbriviation."</td>";
echo "<td>".$estatename."</td>";
echo "<td>".$county."</td>";
echo "<td>".$town."</td>";


$selcount5="SELECT COUNT(propertyid) AS properties FROM property
WHERE estatename='$estatename'"; 

$selcount6=mysqli_query($connect,$selcount5);
$row6=mysqli_fetch_array($selcount6);
$properties=$row6['properties'];

echo "<td>".$properties."</td>";

echo"<td><a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'  data-target='#editestate".$abbriviation."'> Edit  </a> 
<a href='#' class='btn btn-sm btn-outline-danger btn-sm' data-toggle='modal'  data-target='#removeestate".$abbriviation."'> <i class='fas fa-trash-alt'></i>  </a> 

</td></tr>";

include 'editestate.php';
include 'removeestate1.php';

$i++;
}
}
?>                                        
                                        </tbody>
                                        <tfoot>
                                           <tr>
                                      
				  <th>NO</th>
				  <th>ESTATE CODE</th>
				  <th>ESTATE NAME</th>
				  <th>COUNTY</th>
				  <th>TOWN</th>
				  <th>PROPERTIES</th>
				  <th>ACTION</th>
										  </tr>
				  
                                        </tfoot>
                                    </table>
                                </div>
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
                  
				  
				  
				  
	<?php
					
					include 'addestate1.php';
					
					
				?> 
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

