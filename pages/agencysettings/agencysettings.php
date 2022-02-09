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
    <title>Agency Settings</title>
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
                                    <h2 class="pageheader-title">Agency Settings</h2>
                                   
                                   
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
                                                <a class="nav-link active" href="agencysettings.php"role="tab" >Payments</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"  href="agencyprofile.php">Agency</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link "  href="agents.php" >Agency Agents</a>
                                            </li>
										
											
                                        </ul>

										
								
							
                            </div>
							
							
							
							
							
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered second" style="width:100%">
                                                        <thead>
                  <tr>
				  <th colspan="5">Penalty Fee</th>
				
				  
				  
										 </TR>
                  </thead>
                                        <tbody>
										
										   <?php 
             
              
                        
               
                             //selecting registered hospitals from table
                 $select9="SELECT * FROM penaltyfee WHERE agencyid='$agencyid'";
$sel9=mysqli_query($connect,$select9);
	$row=mysqli_fetch_array($sel9);		
			$penaltyfeetype=$row['penaltyfeetype'];
			$penaltyfee=$row['penaltyfee'];
			

echo "<tr>";
echo "<td>Penalty Type: </td>";


if($penaltyfeetype==2){
	echo "<td>
	Percentage of rent
	</td>
	<td>
	Pecentage(%):  
	</td>
	<td>"
	.$penaltyfee."
	</td>";
	echo"<td><a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'data-target='.bd-example-modal-lg'> Edit  </a> 

</td></tr>";
}

if($penaltyfeetype==1){
	echo "<td>
	Fixed Amount
	</td>
	<td>
	Amount(Ksh):  
	</td>
	<td>"
	.$penaltyfee."
	</td>";
	echo"<td><a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'data-target='.bd-example-modal-lg'> Edit  </a> 
</td></tr>";
}


 

?>                                        
                                        </tbody>
                                        
                                    </table>
									 <table class="table table-striped table-bordered second" style="width:100%">
                                                        <thead>
                  <tr>
				  <th colspan="5">Agency Fee</th>
				
				  
				  
										 </TR>
                  </thead>
                                        <tbody>
										
										   <?php 
             
              
                        
               
                             //selecting registered hospitals from table
                 $select9a="SELECT * FROM agencyfee WHERE agencyid='$agencyid'";
$sel9a=mysqli_query($connect,$select9a);
	$row=mysqli_fetch_array($sel9a);		
			$agencyfeetype=$row['agencyfeetype'];
			$agencyfee=$row['agencyfee'];
			

echo "<tr>";
echo "<td>Agency Fee Type: </td>";


if($agencyfeetype==2){
	echo "<td>
	Percentage of rent
	</td>
	<td>
	Pecentage(%):  
	</td>
	<td>"
	.$penaltyfee."%
	</td>";
	echo"<td><a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'data-target='.bd-example-modal-lg'> Edit  </a> 

</td></tr>";
}

if($agencyfeetype==1){
	echo "<td>
	Fixed Amount
	</td>
	<td>
	Amount(Ksh):  
	</td>
	<td>"
	.$agencyfee."
	</td>";
	echo"<td><a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'data-target='.bd-example-modal-lg'> Edit  </a> 
</td></tr>";
}


 

?>                                        
                                        </tbody>
                                        
                                    </table>
									
										 <table class="table table-striped table-bordered second" style="width:100%">
                                                        <thead>
                  <tr>
				  <th colspan="5">Mpesa Accounts</th>
				
				  
				  
										 </TR>
                  </thead>
                                        <tbody>
										
										   <?php 
             
              
                        
                          //selecting registered hospitals from table
                 $select="SELECT * FROM mpesa WHERE agencyid='$agencyid'";
                 
                 if(mysqli_query($connect,$select))
{
$i=1;
$result=mysqli_query($connect,$select);
while($row=mysqli_fetch_array($result)){
	$mpesamode = $row['mpesamode'];
	$bisinessname = $row['bisinessname'];
	$accountno1 = $row['accountno'];



echo "<tr>";
echo "<td>".$i."</td>";

echo "<td>".$mpesamode."</td>";
echo "<td>".$bisinessname."</td>";

echo"<td><a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'data-target='.bd-example-modal-lg'> Edit  </a> 
<a class='btn btn-outline-danger btn-sm'  href ='removeestate.php?act=remove& estatename=".$bisinessname."'> <i class='fas fa-trash-alt'></i> </a>

</td></tr>";

$i++;
}
}
?>                                        
                                        </tbody>
                                        
                                    </table>
									 <table class="table table-striped table-bordered second" style="width:100%">
                                                        <thead>
                  <tr>
				  <th colspan="5">Bank Accounts</th>
				
				  
				  
										 </TR>
                  </thead>
                                        <tbody>
										
										   <?php 
             
              
                        
                          //selecting registered hospitals from table
                 $select="SELECT * FROM agencybank WHERE agencyid='$agencyid'";
                 
                 if(mysqli_query($connect,$select))
{
$i=1;
$result=mysqli_query($connect,$select);
while($row=mysqli_fetch_array($result)){
	$bankname = $row['bankname'];
	$accountname = $row['accountname'];
	$accountno = $row['accountno'];



echo "<tr>";
echo "<td>".$i."</td>";

echo "<td>".$bankname."</td>";
echo "<td>".$accountname."</td>";
echo "<td>".$accountno."</td>";

echo"<td><a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'data-target='.bd-example-modal-lg'> Edit  </a> 
<a class='btn btn-outline-danger btn-sm'  href ='removeestate.php?act=remove& estatename=".$accountno."'> <i class='fas fa-trash-alt'></i> </a>

</td></tr>";

$i++;
}
}
?>                                        
                                        </tbody>
                                        
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
                  
				  
				  
				  
				   <!-- ============================================================== -->
            <!-- start add estate Invoice -->
            <!-- ============================================================== -->  							   
<div class="modal fade addestate" id="addestate"tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
					 <form name="payinvoice" method="post" action="addestate.php">
  <div class="row">
    <div class="col">
	<div class="form-group">
                                                <label for="estatename" class="col-form-label">Estate Name</label>
												<input  type="text" class="form-control" name="estatename" pattern="^[a-zA-Z ]+" required>
                                                
                                            </div>
	
	</div>
    <div class="col">
								<div class="form-group">
								<label for="county" class="col-form-label">County </label>
								<select name="county" type="text" class="form-control" required><option selected>NAKURU</option><option>NAIROBI</option><option>BARINGO</option><option>ELDORET</option><option>KERICHO</option></select>
								</div>
								</div>
								
								
									<div class="col">
								<div class="form-group">
								<label for="town" class="col-form-label">Town</label>
								<input type="text" class="form-control" name="town" Value=" Egerton" maxlength="20" pattern="^[a-zA-Z ]+" required>
								</div>
								</div>
								
	
  </div>
  

  
  
  
  
  	<div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-estate" value="Add Estate">
																
 
   
  
 

	
  </div>
  
</div>
							
							 <!-- ============================================================== -->
                        <!-- end input mask -->
                        <!-- ============================================================== -->
				
    </div>
  </div>
</div>
               
       

	   
            <!-- ============================================================== -->
            <!-- end add estate -->
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

