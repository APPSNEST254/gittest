			
			<?php 

$selsumdue="SELECT SUM(invoicedamount) AS dueinvoices
FROM tenantinvoices 
LEFT JOIN property ON tenantinvoices.propertyid = property.propertyid WHERE property.agencyid='$agencyid' AND tenantinvoices.status='DUE'";


$selsumdue1=mysqli_query($connect,$selsumdue);
$rowdue=mysqli_fetch_array($selsumdue1);
$dueinvoices=$rowdue['dueinvoices'];
if($dueinvoices>1) {
	$totaldueinvoices=$dueinvoices;	
	
	}

else $totaldueinvoices=0;


$selsumoverdue="SELECT SUM(invoicedamount) AS overdueinvoices
FROM tenantinvoices 
LEFT JOIN property ON tenantinvoices.propertyid = property.propertyid WHERE property.agencyid='$agencyid' AND tenantinvoices.status='OVERDUE'";


$selsumoverdue1=mysqli_query($connect,$selsumoverdue);
$rowoverdue=mysqli_fetch_array($selsumoverdue1);
$overdueinvoices=$rowoverdue['overdueinvoices'];
if($overdueinvoices>1) {
	$totaloverdueinvoices=$overdueinvoices;	
	
	}

else $totaloverdueinvoices=0;



$selsumadvance="SELECT SUM(advancepayment) AS advance
FROM advancerent 
LEFT JOIN property ON advancerent.propertyid = property.propertyid WHERE property.agencyid='$agencyid' AND advancerent.status='ADVANCE'";


$selsumadvance1=mysqli_query($connect,$selsumadvance);
$rowadvance=mysqli_fetch_array($selsumadvance1);
$advance=$rowadvance['advance'];
if($advance>1) {
	$totaladvance=$advance;	
	
	}

else $totaladvance=0;



$selsumbalance="SELECT SUM(balancecf) AS balance
FROM balances 
LEFT JOIN property ON balances.propertyid = property.propertyid WHERE property.agencyid='$agencyid' AND balances.status='DUE'";


$selsumbalance1=mysqli_query($connect,$selsumbalance);
$rowbalance=mysqli_fetch_array($selsumbalance1);
$balance=$rowbalance['balance'];
if($balance>1) {
	$totalbalance=$balance;	
	
	}

else $totalbalance=0;

				 
				 ?>
			
<div class="row">

<!-- **** col start***** -->
						<div class="col">
						<div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted"><a href="../invoices/invoice.php">Due Invoices</a></h5>
										<div class="metric-label d-inline-block float-left text-warning font-weight-bold">
                                           <span class="ml-1">Ksh</span>
                                        </div>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo  $totaldueinvoices; ?></h1>
                                        </div>
                                       
                                    </div>
						</div>
						</div>
<!-- **** col end***** -->								
								

<!-- **** col start***** -->
						<div class="col">
						<div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted"><a href="../invoices/invoice.php">Overdue Invoices</a></h5>
										 <div class="metric-label d-inline-block float-left text-danger font-weight-bold">
                                           <span class="ml-1">Ksh</span>
                                        </div>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><span class="ml-1"></span><?php echo  $totaloverdueinvoices; ?></h1>
                                        </div>
                                       
                                    </div>
						</div>
						</div>
<!-- **** col end***** -->									
															

<!-- **** col start***** -->
						<div class="col">
						<div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted"><a href="../invoices/invoice.php">Advance</a></h5>
										<div class="metric-label d-inline-block float-left text-secondary font-weight-bold">
                                           <span class="ml-1">Ksh</span>
                                        </div>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo  $totaladvance; ?></h1>
                                        </div>
                                       
                                    </div>
						</div>
						</div>
<!-- **** col end***** -->									
								

<!-- **** col start***** -->
						<div class="col">
						<div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted"><a href="../invoices/invoice.php">Balances</a></h5>
										<div class="metric-label d-inline-block float-left text-info font-weight-bold">
                                           <span class="ml-1">Ksh</span>
                                        </div>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo  $totalbalance; ?></h1>
                                        </div>
                                        
                                    </div>
						</div>
						</div>
<!-- **** col end***** -->									

  </div>
  
