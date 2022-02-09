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
                                    <h2 class="pageheader-title">Invoices</h2>
                                   
                                   
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
                                                <a class="nav-link active" href="invoice.php"role="tab" >Tenant Invoices</a>
                                            </li>
											
                                            <li class="nav-item">
                                                <a class="nav-link"  href="landlordinvoices.php">Landlord Invoices</a>
                                            </li>
                                         
											
                                        </ul>

										
								
							
                            </div>
                            </div>
                            <div class="card-body">
                                 <div class="table-responsive">
                                   <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                        <thead>
                    <tr>
                                        <th ROWSPAN= "2" >NO</th> 
                                        <th ROWSPAN= "2">HOUSE NO</th>      
                                        <th ROWSPAN= "2">HOUSE NAME</th>
                                        
										<TH COLSPAN="5"><CENTER>INVOICES</CENTER></TH>
									  
									
										<th ROWSPAN= "2">ACTION</th>
										
                                    </tr>
									<TR> <th >TOTAL DUE</th>
										<th>DUE </th>
										<th>OVERDUE</th>
										<th>BALANCES</th>
										<Th>PAID</th> </TR>
                  </thead>
                                        <tbody>
										
										   <?php 
             
              
                        
               
                             //selecting registered hospitals from table
                 $select="SELECT * FROM property WHERE agencyid='$agencyid' ORDER BY regdate ASC";
                 
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





$storedname=$row['propertyid'];

$selcount="SELECT SUM(invoicedamount) AS dueinvoiced FROM tenantinvoices
WHERE propertyid='$storedname' and status='DUE'"; 

$selcount1=mysqli_query($connect,$selcount);
$row1=mysqli_fetch_array($selcount1);
$dueinvoiced=$row1['dueinvoiced'];

$selcount3="SELECT SUM(invoicedamount) AS overdueinvoiced FROM tenantinvoices
WHERE propertyid='$storedname' and status='OVERDUE'"; 

$selcount4=mysqli_query($connect,$selcount3);
$row4=mysqli_fetch_array($selcount4);
$overdueinvoiced=$row4['overdueinvoiced'];

$selcount5="SELECT SUM(paid) AS paidinvoice FROM tenantinvoices
WHERE propertyid='$storedname' and status='PAID'"; 

$selcount6=mysqli_query($connect,$selcount5);
$row6=mysqli_fetch_array($selcount6);
$paidinvoice=$row6['paidinvoice'];

$selcount6="SELECT SUM(balancecf) AS balances FROM balances
WHERE propertyid='$storedname' and status='DUE'"; 

$selcount7=mysqli_query($connect,$selcount6);
$row7=mysqli_fetch_array($selcount7);
$balances=$row7['balances'];


$totaldue=$dueinvoiced+$overdueinvoiced+$balances;

echo "<td>".$totaldue."</td>";
echo "<td>".$dueinvoiced."</td>";
echo "<td>".$overdueinvoiced."</td>";
echo "<td>".$balances."</td>";
echo "<td>".$paidinvoice."</td>";



echo "<td>

<a class='btn btn-primary btn-sm'  href ='tenantinvoices.php?act=details& propertyid=".$propertyid."'>
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
										<th >TOTAL DUE</th>
										<th>DUE </th>
										<th>OVERDUE</th>
										<th>BALANCES</th>
										<Th>PAID</th>
									  
										
										<th ROWSPAN= "2">ACTION</th>
										
                                    </tr>
									<TR>  <TH COLSPAN="5"><CENTER>INVOICES</CENTER></TH> </TR>
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
							
							
							
									   <!-- ============================================================== -->
            <!-- start add property -->
            <!-- ============================================================== -->  							   
<div class="modal fade addproperty" id="addproperty"tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Property</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	   
				
				 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Property Details</</h5>
        
      </div>
       <!-- ============================================================== -->
                        <!-- inputmask -->
                        <!-- ============================================================== -->
                     <div class="container">
					 <form role="form" method="post" action="addproperty.php">
					 <input type="text"class="form-control"  name="agencyid" value="<?php echo  $agencyid; ?>" hidden >
  <div class="row">
    <div class="col">
	<div class="form-group">
                                                <label for="propertyname" class="col-form-label">House Name: </label>
												<input  type="text" class="form-control" name="propertyname" pattern="^[a-zA-Z ]+" required>
                                                
                                            </div>
	
	</div>
	<div class="col">
	
	<?php 
              
	
$select9="SELECT propertyid FROM propertycounter ";
$sel9=mysqli_query($connect,$select9);
	$row=mysqli_fetch_array($sel9);		
			$propertyid1=$row['propertyid'];
			$propertyid2=$propertyid1+1;

		
				 ?>
	<div class="form-group">
                                                <label for="propertyid" class="col-form-label">Property NO</label>
												<input type="text"class="form-control"  name="propertyid" value="<?php echo  $propertyid2; ?>" >
                                            </div>
	
	</div>
    <div class="col">
								<div class="form-group">
								<label for="county" class="col-form-label">Property Type: </label>
								 <select name="type" class="form-control" required><option selected>RESIDENTIAL</option>
<option>HOSTEL</option> <option>MULT FAMILY</option> <option>SINGLE FAMILY</option>
<option>SHOP</option> </select></div>
								</div>
								
								
								
								
	
  </div>
  
  <div class="row">
    
<div class="col">
								<div class="form-group">
								<label for="estatename" class="col-form-label">Estate: </label>
								<?php
								echo "<select name=estatename class='form-control'>";
 $result = $connect->query("select estatename from estate");
 
    while ($row = $result->fetch_assoc()) {

                 
                  $estatename = $row['estatename'];
				  
                                echo "'<option>$estatename</option>'";

	}
echo "</select>"; ?>
								
								
								</div>
								</div>
																<div class="col">
								<div class="form-group">
								<label for="commission" class="col-form-label">Commission(%): </label>
								<input type="number" class="form-control" name="commission" value="10" max="15" min="5" required></div>
								</div>
								
								
								<div class="col">
							
								<label for="depositto" class="col-form-label">Deposit To: </label><br>
							
								  

                                            <label class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" name="depositto" checked class="custom-control-input"><span class="custom-control-label">LANDLORD</span>
											  </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                               								  <input type="radio" name="depositto" class="custom-control-input"><span class="custom-control-label">AGENCY</span>
 </label>
								
								</div>
								
								
								
								
								
								
								
								

	
  </div>
  
  	
				
				
					 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Deposits</</h5>
        
      </div>
				  
      <div class="row">
    <div class="col">
	 
	<div class="form-group">
                                                 <label for="electricitydeposit" class="col-form-label">Electricity Deposit</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="number" class="form-control currency-inputmask" name="electricitydeposit" value="0" >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>
    <div class="col">
<div class="form-group">
                                                 <label for="waterdeposit" class="col-form-label">Water Deposit</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="number" class="form-control currency-inputmask"  name="waterdeposit"value="0"  >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>

	<div class="col">

	</div>
  </div>
  

				

  
  					 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bills</</h5>
        
      </div>
  <div class="row">
    

								<div class="col">
								<div class="form-group">
								<label for="electricitybill" class="col-form-label">Firstname</label>
								<select name="electricitybill" class="form-control" required><option selected>OWN METERS</option><option>SHARED BILL</option><option>INCLUDED IN RENT</option></select> 
						</div>
								</div>
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="waterbill" class="col-form-label">Water Bill</label>
								<select name="waterbill" class="form-control" required><option selected>OWN METERS</option><option>SHARED BILL</option><option>INCLUDED IN RENT</option></select> 
						</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="sanitationbill" class="col-form-label"> Sanitation Bill</label>
								<select name="sanitationbill" class="form-control" required><option selected>OWN ARRANGEMENTS</option><option>SHARED BILL</option><option>INCLUDED IN RENT</option></select> 
						</div>
								</div>
								

	
  </div>
  
  
  					 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Landlord Details</</h5>
        
      </div>
  <div class="row">
    

								<div class="col">
								<div class="form-group">
								<label for="firstname" class="col-form-label">First Name: </label>
								<input type="text" class="form-control" name="firstname" placeholder=" First Name"maxlength="10" pattern="^[a-zA-Z]+" required>
						</div>
								</div>
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="suname" class="col-form-label">Suname: </label>
								<input type="text" class="form-control" name="suname" placeholder="Suname"maxlength="10" pattern="^[a-zA-Z]+" required>
						</div>
								</div>
								
								
								
								<div class="col">
								<div class="form-group">
								<label for="email" class="col-form-label"> Email: </label>
								<input type="email" class="form-control" name="email" placeholder=" Agency Email"  required>
						</div>
								</div>
								

	
  </div>
  
  
  	    <div class="row">
    

								
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="phoneno" class="col-form-label">Phone Number: </label>
								<input type="number" class="form-control" name="phoneno"  value="07" max="0799999999"min="0700000000" required>
								</div>
								</div>
								
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="address" class="col-form-label">Address</label>
								<input type="text" class="form-control" name="address" placeholder=" Building/ Room No/ Floor"  required>
								</div>
								</div>	
								
								<div class="col">
								<div class="form-group">
								<label for="boxno" class="col-form-label"> Box No</label>
								<input type="number" class="form-control" name="boxno" placeholder="12"  max="999999999"min="1" required>
								</div>
								</div>
								
								
								

	
  </div>
  <div class="row">
  
																<div class="col">
								<div class="form-group">
								<label for="postalcode" class="col-form-label">Postal Code</label>
								<input type="number" class="form-control" name="postalcode"  value="20100" max="99999"min="1000" required>
								</div>
								</div>
								
												<div class="col">
								<div class="form-group">
								<label for="town" class="col-form-label">Town</label>
								<input type="text" class="form-control" name="town" Value=" Egerton" maxlength="20" pattern="^[a-zA-Z ]+" required>
								</div>
								</div>
								
								<div class="col">
								</div>
  </div>
  
  		 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bank Details</</h5>
        
      </div>
  
  
   	    <div class="row">
    

								
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="bankname" class="col-form-label">Bank Name: </label>
								<select name="bankname" class="form-control" required><option selected>KCB</option><option>Equity</option><option>Cooparative</option></select> 
								</div>
								</div>
								
								
								
								
																<div class="col">
								<div class="form-group">
								<label for="accountname" class="col-form-label">Account Name: </label>
								<input type="text" class="form-control" name="accountname" placeholder="Account Name: "  required>
								</div>
								</div>	
								
								
																<div class="col">
								<div class="form-group">
								<label for="accountno" class="col-form-label">Account Number: </label>
								<input type="text" class="form-control" name="accountno" placeholder="Account Number: "  required>
								</div>
								</div>	
								
								
								

	
  </div>
  	<div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-addproperty" value="ADD PROPERTY">
																
 
   
  
 

	
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
