						
	
			<?php 


$selcountestates="SELECT COUNT(abbriviation) AS estates
FROM estate  WHERE agencyid='$agencyid'";


$selcountestates1=mysqli_query($connect,$selcountestates);
$rowestate=mysqli_fetch_array($selcountestates1);
$estates=$rowestate['estates'];
if($estates>1) {
	$totalestates=$estates;	
	
	}

else $totalestates=0;

$selcountproperties="SELECT COUNT(propertyid) AS properties
FROM property  WHERE agencyid='$agencyid'";

$selcountproperties1=mysqli_query($connect,$selcountproperties);
$rowproperties=mysqli_fetch_array($selcountproperties1);
$properties=$rowproperties['properties'];				 
if($properties>1) {
	$totalproperties=$properties;	
	
	}

else $totalproperties=0;		 
				 

$selcounttenants="SELECT COUNT(idno) AS tenants
FROM tenants 
LEFT JOIN property ON tenants.propertyid = property.propertyid WHERE property.agencyid='$agencyid' and tenants.status='CHECKED-IN'";



$selcounttenants1=mysqli_query($connect,$selcounttenants);
$rowtenants=mysqli_fetch_array($selcounttenants1);
$tenants=$rowtenants['tenants'];	
if($tenants>1) {
	$totaltenants=$tenants;	
	
	}

else $totaltenants=0;				 
 
 $selcounttenants="SELECT COUNT(idno) AS bookings
FROM tenants 
LEFT JOIN property ON tenants.propertyid = property.propertyid WHERE property.agencyid='$agencyid' and tenants.status='BOOKED'";



$selcounttenants1=mysqli_query($connect,$selcounttenants);
$rowtenants=mysqli_fetch_array($selcounttenants1);
$bookings=$rowtenants['bookings'];	
if($bookings>1) {
	$totalbookings=$bookings;	
	
	}

else $totalbookings=0;				 
 
				 ?>
						

<div class="row">


<!-- **** col start***** -->
							<div class="col">
							<div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                        <h5 class="text-muted"><a href="../rentcollection/estate.php">Total Estates</a></h5>
                                        <h2 class="mb-0"><?php echo  $totalestates; ?></h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
										 <i class="fas fa-th fa-fw fa-sm text-secondary"></i>
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
                                        <h5 class="text-muted"><a href="../rentcollection/properties.php">Properties</a></h5>
                                        <h2 class="mb-0"> <?php echo  $totalproperties; ?></h2>
                                    </div>
                                   <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
                                        <i class="fas fa-building fa-fw fa-sm text-success"></i>
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
                                        <h5 class="text-muted"><a href="../rentcollection/properties.php">Total Tenants</a></h5>
                                        <h2 class="mb-0"><?php echo  $totaltenants; ?></h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                        <i class="fas fa-users fa-fw fa-sm text-primary"></i>
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
                                        <h5 class="text-muted"><a href="../rentcollection/properties.php">Bookings</a></h5>
                                        <h2 class="mb-0"><?php echo  $totalbookings; ?></h2>
                                    </div>
                                     <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                        <i class="fa fa-handshake fa-fw fa-sm text-brand"></i>
                                    </div>
                                </div>
                            </div> 
							</div>
<!-- **** col end***** -->								
								
								

  </div>
  
 
  
  