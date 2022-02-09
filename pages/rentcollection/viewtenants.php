<!-- start table 1  -->
                        <!-- ============================================================== -->
                                            <div class="tab-pane fade show active" id="card-pill-1" role="tabpanel" aria-labelledby="card-tab-1">
                                 
									<div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                         <tr>
                                        <th>NO</th>
                                        <th>UNIT NO</th>
										<th>NAME</th>
                                        <th>ID NO</th>
                                        <th>MOBILE NO</th>
                                        <th>CHECKED IN </th>
										<th>CHECK OUT </th>
										<th>BALANCE B/F </th>
										<th>ACTION </th>
									
                                    </tr>
                                        </thead> <tbody> <?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select="SELECT tenants.*, units.unitid,units.price,units.propertyid,property.propertyname,property.propertyid,property.agencyid
FROM tenants
LEFT JOIN units
ON tenants.unitid = units.unitid and tenants.propertyid = units.propertyid LEFT JOIN property ON tenants.propertyid= property.propertyid WHERE tenants.propertyid = '$propertyid' and property.agencyid='$agencyid' AND tenants.status='CHECKED-IN' ORDER BY units.unitid ASC";

if(mysqli_query($connect,$select))
{
$i=1;
$result=mysqli_query($connect,$select);



while($row=mysqli_fetch_array($result)){
$idno = $row['idno'];
$unitid = $row['unitid'];
echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['unitid']."</td>";
echo "<td>".$row['firstname']." ".$row['middlename']." ".$row['suname']."</td>";
echo "<td>".$row['idno']."</td>";
echo "<td>0".$row['mobileno']."</td>";
echo "<td>".$row['fromdate']."</td>";
echo "<td>".$row['todate']."</td>";



$selcount5m="SELECT SUM(balancecf) AS balancebf
FROM balances 
LEFT JOIN property ON balances.propertyid = property.propertyid  WHERE balances.tenantid='$idno' and balances.propertyid='$propertyid' and balances.unitid='$unitid' AND  balances.status='DUE'and property.agencyid='$agencyid'";


$selcount6m=mysqli_query($connect,$selcount5m);
$row6m=mysqli_fetch_array($selcount6m);
$balancebf=$row6m['balancebf'];

echo"<TD>".$balancebf."</TD>";

echo "<td><a href ='tenant1.php?act=details& idno=".$idno."& propertyid=".$propertyid."& unitid=".$unitid."' class='btn btn-outline-success'>Tenant Details<br>";

echo "</tr>"; 
$i++;
}

}
else {

				 }
?>
                                        
                                        </tbody>
                                        <tfoot>
                                               <tr>
                                        <th>NO</th>
                                        <th>UNIT NO</th>
										<th>NAME</th>
                                        <th>ID NO</th>
                                        <th>MOBILE NO</th>
                                        <th>CHECKED IN </th>
										<th>CHECK OUT </th>
										<th>BALANCE B/F </th>
										<th>ACTION </th>
                                    </tr>
                                        </tfoot>
                                    </table>
                                </div>
                               
										   </div>
		                                            


