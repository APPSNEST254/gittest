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
    <title>Properties</title>
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
                                    <h2 class="pageheader-title">Properties</h2>
                                   
                                   
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
                                                <a class="nav-link active" href="properties.php"role="tab" >Properties</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"  href="addtenant.php">Add Tenant/Booking</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"  href="estate.php" >Estates</a>
                                            </li>
											    <li class="nav-item">
                                                <a class="nav-link " href="removedproperties.php"role="tab" >Removed</a>
                                            </li>
											
											<li>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</li>
											 <li class="nav-item">
                                                <a href="#" class="btn btn-rounded btn-brand" data-toggle="modal" data-target=".addproperty">Add Property</a>
                                            </li>
                                        </ul>

										
								
							
                            </div>
                            </div>
                            <div class="card-body">
                                 <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                  <tr>
                                        <th ROWSPAN= "2" >NO</th> 
                                        <th ROWSPAN= "2">HOUSE NO</th>      
                                        <th ROWSPAN= "2">HOUSE NAME</th>
                                        <th ROWSPAN= "2">TYPE</th>
										<TH COLSPAN="4"><CENTER># OF UNITS</CENTER></TH>
									  
										<th ROWSPAN= "2">ESTATE </th>
										<th ROWSPAN= "2">ACTION</th>
										
                                    </tr>
									<TR> <th >TOTAL</th>
										<th>VACANT</th>
										<th>BOOKED</th>
										<Th>OCCUPIED</th> </TR>
                  </thead>
                                        <tbody>
										
										   <?php 
             
              
                        
               
                             //selecting registered hospitals from table
                 $select="SELECT * FROM property WHERE agencyid='$agencyid' AND status='ACTIVE' ORDER BY regdate ASC";
                 
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
echo "<td>".$row['type']."</td>";




$storedname=$row['propertyid'];

$selcount="SELECT COUNT(unitid) AS occupied FROM units
WHERE propertyid='$storedname' and status='OCCUPIED'"; 

$selcount1=mysqli_query($connect,$selcount);
$row1=mysqli_fetch_array($selcount1);
$occupied=$row1['occupied'];

$selcount3="SELECT COUNT(unitid) AS unoccupied FROM units
WHERE propertyid='$storedname' and status='UNOCCUPIED'"; 

$selcount4=mysqli_query($connect,$selcount3);
$row4=mysqli_fetch_array($selcount4);
$unoccupied=$row4['unoccupied'];

$selcount5="SELECT COUNT(unitid) AS booked FROM units
WHERE propertyid='$storedname' and status='BOOKED'"; 

$selcount6=mysqli_query($connect,$selcount5);
$row6=mysqli_fetch_array($selcount6);
$booked=$row6['booked'];

$totalunits=$occupied+$unoccupied+$booked;

echo "<td>".$totalunits."</td>";
echo "<td>".$unoccupied."</td>";
echo "<td>".$booked."</td>";
echo "<td>".$occupied."</td>";
echo "<td>".$row['estatename']."</td>";


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
                                        <th ROWSPAN= "2" >NO</th>
                                        <th ROWSPAN= "2">HOUSE NO</th>
                                        <th ROWSPAN= "2">HOUSE NAME</th>
                                        <th ROWSPAN= "2">TYPE</th>
										<th >TOTAL</th>
										<th>VACANT</th>
										<th>BOOKED</th>
										<Th>OCCUPIED</th>
									  
										<th ROWSPAN= "2">ESTATE </th>
										<th ROWSPAN= "2">ACTION</th>
										
                                    </tr>
									<TR>  <TH COLSPAN="4"><CENTER># OF UNITS</CENTER></TH></TR>
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
							
				<?php 

                include('addproperty1.php');
?>				
			 
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
