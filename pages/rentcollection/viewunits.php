	
						 <!-- ============================================================== -->
                        <!-- start table 3 -->
                        <!-- ============================================================== -->
                                            <div class="tab-pane fade" id="card-pill-3" role="tabpanel" aria-labelledby="card-tab-3">
<div class="table-responsive"> 

 
<table id="example3" class="table table-striped table-bordered" style="width:100%">

 
                                                         <!-- ============================================================== -->
                               				<?php
				if($unoccupied>=1){
					
					
?>
                                         					 <thead>  			<TR> <th COLSPAN="9"><CENTER>VACANT UNITS</CENTER></th></TR>
                                    <tr>
                                        <th>NO</th>
                                        <th>UNIT NO</th>
										<th>TYPE</th>
                                        <th>STATUS</th>
                                        <th>SIZE (feet)<SUP>2</SUP></th>
                                        <th>FEATURES </th>
										<th>PRICE </th>
										 <th colspan="2">ACTION </th>
									
                                    </tr>
                                        </thead>
                                         <tbody>
                                            <?php

$select="SELECT * FROM units WHERE propertyid ='$propertyid' and status='UNOCCUPIED'";
if(mysqli_query($connect,$select))
{
$i=1;
$result=mysqli_query($connect,$select);





while($row=mysqli_fetch_array($result)){
$propertyid = $row['propertyid'];
$unitid = $row['unitid'];
echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['unitid']."</td>";
echo "<td>".$row['type']."</td>";
echo "<td>".$row['status']."</td>";
echo "<td>".$row['areasq']."</td>";
echo "<td>".$row['features']."</td>";
echo "<td>".$row['price']."</td>";
echo "<td>
<a href ='addtenant1.php?act=add& propertyid=".$propertyid."&unitid=".$unitid."' class='btn btn-sm btn-outline-success' >Add Tenant</a>
<a href ='booktenant1.php?act=add& propertyid=".$propertyid."&unitid=".$unitid."' class='btn btn-sm btn-outline-warning' >Book</a>

</td>";
echo"<td>
<a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'  data-target='#editunit".$unitid."'> Edit  </a> 
<a href='#' class='btn btn-sm btn-outline-danger btn-sm' data-toggle='modal'  data-target='#removeestate".$unitid."'> <i class='fas fa-trash-alt'></i>  </a> 

</td></tr>";
include 'editunit.php';
include 'removeunit.php';
$i++;
}}
		echo "</tbody>"; 	
		echo "</table>"; 	
		}

				if($booked>=1){

    
       ?>   
	   
<table id="example4" class="table table-striped table-bordered" style="width:100%">
<thead>
 								<TR> <th COLSPAN="9"><CENTER>BOOKED UNITS</CENTER></th></TR>
                                    <tr>
                                        <th>NO</th>
                                        <th>UNIT NO</th>
										<th>TYPE</th>
                                        <th>STATUS</th>
                                        <th>SIZE (feet)<SUP>2</SUP></th>
                                        <th>FEATURES </th>
										<th>PRICE </th>
										<th colspan="2">ACTION </th>
                                    </tr>
                                        </thead>
                                            <?php

$select="SELECT * FROM units WHERE propertyid ='$propertyid' and status='BOOKED'";
if(mysqli_query($connect,$select))
{
$i=1;
$result=mysqli_query($connect,$select);





while($row=mysqli_fetch_array($result)){
$propertyid = $row['propertyid'];
$unitid = $row['unitid'];
echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['unitid']."</td>";
echo "<td>".$row['type']."</td>";
echo "<td>".$row['status']."</td>";
echo "<td>".$row['areasq']."</td>";
echo "<td>".$row['features']."</td>";
echo "<td>".$row['price']."</td>";
echo "<td>
<a href ='addtenant1.php?act=add& propertyid=".$propertyid."&unitid=".$unitid."' class='btn btn-sm btn-outline-success' >Confirm Tenant</a>
<a href ='booktenant1.php?act=add& propertyid=".$propertyid."&unitid=".$unitid."' class='btn btn-sm btn-outline-warning' >Cancel Book</a>

</td>";
echo"<td>
<a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'  data-target='#editunit".$unitid."'> Edit  </a> 

</td></tr>";
include 'editunit.php';

$i++;
}}
echo "</tbody>"; 
echo "</table>"; 
				}
				
				if($occupied>=1){
   ?> 
<table id="example4" class="table table-striped table-bordered" style="width:100%">   
<thead>
				<TR> <th COLSPAN="9"><CENTER>OCCUPIED UNITS</CENTER></th></TR>
                                    <tr>
                                        <th>NO</th>
                                        <th>UNIT NO</th>
										<th>TYPE</th>
                                        <th>STATUS</th>
                                        <th>SIZE (feet)<SUP>2</SUP></th>
                                        <th>FEATURES </th>
										<th>PRICE </th>
										<th colspan="2">ACTION </th>
                                    </tr>
                                        </thead>
                                      
                                            <?php

$select="SELECT * FROM units WHERE propertyid ='$propertyid' and status='OCCUPIED'";
if(mysqli_query($connect,$select))
{
$i=1;
$result=mysqli_query($connect,$select);





while($row=mysqli_fetch_array($result)){
$propertyid = $row['propertyid'];
$unitid = $row['unitid'];
echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['unitid']."</td>";
echo "<td>".$row['type']."</td>";
echo "<td>".$row['status']."</td>";
echo "<td>".$row['areasq']."</td>";
echo "<td>".$row['features']."</td>";
echo "<td>".$row['price']."</td>";
echo "<td>

</td>";
echo"<td>
<a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'  data-target='#editunit".$unitid."'> Edit  </a> 

</td></tr>";
include 'editunit.php';
$i++;
}}
		
echo "</tbody>"; 
		}
   ?>      


										
                                   
                                    </table>
                                </div>                                              
											  </div>
											
														 <!-- ============================================================== -->
                        <!-- end table 3 -->
                        <!-- ============================================================== -->