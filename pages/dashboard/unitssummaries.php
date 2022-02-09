						
	
			<?php 

		 

$selcountvacant="SELECT COUNT(unitid) AS vacant
FROM units 
LEFT JOIN property ON units.propertyid = property.propertyid WHERE property.agencyid='$agencyid' and units.status='UNOCCUPIED'";



$selcountvacant1=mysqli_query($connect,$selcountvacant);
$rowvacant=mysqli_fetch_array($selcountvacant1);
$vacant=$rowvacant['vacant'];	
if($tenants>1) {
	$totalvacant=$vacant;	
	
	}

else $totalvacant=0;	
			 
 $selcountbooked="SELECT COUNT(unitid) AS booked
FROM units 
LEFT JOIN property ON units.propertyid = property.propertyid WHERE property.agencyid='$agencyid' and units.status='BOOKED'";



$selcountbooked1=mysqli_query($connect,$selcountbooked);
$rowbooked=mysqli_fetch_array($selcountbooked1);
$booked=$rowbooked['booked'];	
if($tenants>1) {
	$totalbooked=$booked;	
	
	}

else $totalbooked=0;		


 $selcountoccupied="SELECT COUNT(unitid) AS occupied
FROM units 
LEFT JOIN property ON units.propertyid = property.propertyid WHERE property.agencyid='$agencyid' and units.status='OCCUPIED'";



$selcountoccupied1=mysqli_query($connect,$selcountoccupied);
$rowoccupied=mysqli_fetch_array($selcountoccupied1);
$occupied=$rowoccupied['occupied'];	
if($tenants>1) {
	$totaloccupied=$occupied;	
	
	}

else $totaloccupied=0;	
$totalunits=$totalbooked+$totaloccupied+$totalvacant;		 
 
				 ?>
						

<div class="row">


<!-- **** col start***** -->
							<div class="col">
							<div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                        <h5 class="text-muted"><a href="../rentcollection/properties.php">Total Units</a></h5>
                                        <h2 class="mb-0"><?php echo  $totalunits; ?></h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                        <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                                    </div>
                                </div>
                            </div> 
							</div>
<!-- **** col end***** -->	

<!-- **** col start***** -->
							<div class="col">
							<div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                        <h5 class="text-muted"><a href="../rentcollection/properties.php">Vacant Units</a></h5>
                                        <h2 class="mb-0"> <?php echo  $totalvacant; ?></h2>
                                    </div>
                                   <div class="float-right icon-circle-medium  icon-box-lg  bg-danger-light mt-1">
                                        <i class="fas fa-user-times fa-fw fa-sm text-danger"></i>
                                    </div>
                                </div>
                            </div> 
							</div>
<!-- **** col end***** -->								
								

<!-- **** col start***** -->
							<div class="col">
							<div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                        <h5 class="text-muted"><a href="../rentcollection/properties.php">Occupied Units</a></h5>
                                        <h2 class="mb-0"><?php echo  $totaloccupied; ?></h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
                                        <i class="fas fa-bed fa-fw fa-sm text-success"></i>
                                    </div>
                                </div>
                            </div> 
							</div>
<!-- **** col end***** -->									
															

<!-- **** col start***** -->
							<div class="col">
							<div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                        <h5 class="text-muted"><a href="../rentcollection/properties.php">Booked Units</a></h5>
                                        <h2 class="mb-0"><?php echo  $totalbooked; ?></h2>
                                    </div>
                                     <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                        <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
                                    </div>
                                </div>
                            </div> 
							</div>
<!-- **** col end***** -->								
								
								

  </div>
  
 
  
  