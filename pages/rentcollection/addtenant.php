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
    <title>Add/Book Tenant</title>
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
                                    <h2 class="pageheader-title">Add/Book Tenant</h2>
                                   
                                   
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
                                                <a class="nav-link active" href="addtenant.php" >Add Tenant/Booking</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link "  href="estate.php" >Estates</a>
                                            </li>
											<li>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
										<th>HOUSE NO</th>
                                      
										<th>HOUSE NAME</th>
										<th>UNIT ID</th>
										<th>TYPE</th>
										<th>RENT</th>
										  
                                        <th>ADD/BOOK TENANT</th>                                      
                                     
										
                                    </tr>
                  </thead>
                                       <tbody>
										
										<?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select="SELECT units.*, property.propertyid,property.agencyid,property.propertyname,property.electricitydeposit,property.waterdeposit,property.status
FROM units
LEFT JOIN property
ON units.propertyid = property.propertyid WHERE units.status ='UNOCCUPIED' AND property.agencyid='$agencyid' AND property.status ='ACTIVE' ORDER BY units.unitid ASC";

if(mysqli_query($connect,$select))
{
$i=1;
$result=mysqli_query($connect,$select);


while($row=mysqli_fetch_array($result)){
	
	

$price=$row['price'];
$propertyid = $row['propertyid'];
$propertyname = $row['propertyname'];
$unitid = $row['unitid'];
$electricitydeposit=$row['electricitydeposit'];	
$waterdeposit=$row['waterdeposit'];

echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['propertyid']."</td>";
echo "<td>".$row['propertyname']."</td>";
echo "<td>".$row['unitid']."</td>";
echo "<td>".$row['type']."</td>";

echo "<td>".$row['price']."</td>";
//<a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal' data-target='.add' > ADD  </a> 
			
echo "<td>
<a href ='addtenant1.php?act=add& propertyid=".$propertyid."&unitid=".$unitid."' class='btn btn-sm btn-outline-light' >Add Tenant </a> 

<a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'data-target='.addestate'> BOOK </a> 
</td>";
echo "</tr>";

					
				
					
				
			
$i++;
}
}
else {
include ('addtenant.php');
}
?>                             
                                        </tbody>
                                        <tfoot>
                                          <tr>
										
										<th>NO</th>
										<th>HOUSE NO</th>
                                      
										<th>HOUSE NAME</th>
										<th>UNIT ID</th>
										<th>TYPE</th>
										<th>RENT</th>
										  
                                        <th>ADD/BOOK TENANT</th>                                      
                                     
										
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
                  
			 
                </div>
        
         

    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
   
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
    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
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
	 <script type="text/javascript">
            $(function () {
                $('#datetimepicker4').datetimepicker({
                    format: "%Y-%m-%d"
                });
            });</script>
			
			<script>
			$(document).ready(function){
				$('.add').on('click, function(){
				$('#addtenant').madal('show');
				
				
				)};
				
				
				)};
				
		
 </script>
</body>
 
</html>


