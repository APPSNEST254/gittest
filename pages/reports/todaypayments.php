			
			<?php 
            
				 
$leo=Date("Y-m-d");

$selcount5="SELECT SUM(paid) AS cash
FROM tenantinvoices 
LEFT JOIN property ON tenantinvoices.propertyid = property.propertyid WHERE property.agencyid='$agencyid' and tenantinvoices.mode='CASH'AND tenantinvoices.paydate='$leo' AND tenantinvoices.status='PAID'";


$selcount6=mysqli_query($connect,$selcount5);
$row6=mysqli_fetch_array($selcount6);
$cash1=$row6['cash'];
if($cash1>1) {
	$cash=$cash1;	
	
	}

else $cash=0;

$selcount5m="SELECT SUM(paid) AS mpesa
FROM tenantinvoices 
LEFT JOIN property ON tenantinvoices.propertyid = property.propertyid WHERE property.agencyid='$agencyid' and tenantinvoices.mode='MPESA' AND tenantinvoices.paydate='$leo' AND  tenantinvoices.status='PAID'";


$selcount6m=mysqli_query($connect,$selcount5m);
$row6m=mysqli_fetch_array($selcount6m);
$mpesa1=$row6m['mpesa'];				 
if($mpesa1>1) {
	$mpesa=$mpesa1;	
	
	}

else $mpesa=0;		 
				 
$selcount5b="SELECT SUM(paid) AS bank
FROM tenantinvoices 
LEFT JOIN property ON tenantinvoices.propertyid = property.propertyid WHERE property.agencyid='$agencyid' and tenantinvoices.mode='bank' AND tenantinvoices.paydate='$leo' AND tenantinvoices.status='PAID'";


$selcount6b=mysqli_query($connect,$selcount5b);
$row6b=mysqli_fetch_array($selcount6b);
$bank1=$row6b['bank'];	
if($bank1>1) {
	$bank=$bank1;	
	
	}

else $bank=0;				 
$totalpaid=$bank+$mpesa+$cash;		 
				 
				 ?>
			
<div class="row">

<!-- **** col start***** -->
						<div class="col">
						<div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted"><a href="../reports/reports.php">Today Totals</a></h5>
										<div class="metric-label d-inline-block float-left text-success font-weight-bold">
                                           <span class="ml-1">Ksh</span>
                                        </div>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo  $totalpaid; ?></h1>
                                        </div>
                                       
                                    </div>
						</div>
						</div>
<!-- **** col end***** -->								
								

<!-- **** col start***** -->
						<div class="col">
						<div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted"><a href="../reports/reports.php">Cash Totals</a></h5>
										 <div class="metric-label d-inline-block float-left text-primary font-weight-bold">
                                           <span class="ml-1">Ksh</span>
                                        </div>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><span class="ml-1"></span><?php echo  $cash; ?></h1>
                                        </div>
                                       
                                    </div>
						</div>
						</div>
<!-- **** col end***** -->									
															

<!-- **** col start***** -->
						<div class="col">
						<div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted"><a href="../reports/reports.php">Mpesa Totals</a></h5>
										<div class="metric-label d-inline-block float-left text-warning font-weight-bold">
                                           <span class="ml-1">Ksh</span>
                                        </div>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo  $mpesa; ?></h1>
                                        </div>
                                       
                                    </div>
						</div>
						</div>
<!-- **** col end***** -->									
								

<!-- **** col start***** -->
						<div class="col">
						<div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted"><a href="../reports/reports.php">Bank Transfers</a></h5>
										<div class="metric-label d-inline-block float-left text-info font-weight-bold">
                                           <span class="ml-1">Ksh</span>
                                        </div>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo  $bank; ?></h1>
                                        </div>
                                        
                                    </div>
						</div>
						</div>
<!-- **** col end***** -->									

  </div>
  
