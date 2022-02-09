<div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                         <tr>
                                                <th>NO</th>
                                                <th>INVOICE NO</th>
                                                <th>MONTH</th>
												<th>TOTAL UNITS</th>
                                                <th>VACANT UNITS</th>
												<th>OCCUPIED UNITS</th>
												<th>BALANCE BF</th>
												<th>ADVANCE BF</th>
												<th>DUE AMOUNT</th>
											<th>DUE DATE</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </thead> <tbody>
										
										<?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select3="SELECT * FROM landlordinvoices WHERE propertyid='$propertyid' AND status='DUE'" ;

if(mysqli_query($connect,$select3))
{
$i=1;
$result3=mysqli_query($connect,$select3);



while($row=mysqli_fetch_array($result3)){

$invoiceno = $row['invoiceno'];
$propertyid = $row['propertyid'];
$month = $row['month'];
$totalunits = $row['totalunits'];
$vacantunits = $row['vacantunits'];
$occupiedunits = $row['occupiedunits'];
$dategenerated = $row['dategenerated'];
$duedate = $row['duedate'];
$balancebf = $row['balancebf'];
$advancebf = $row['advancebf'];
$invoicedamount = $row['invoicedamount'];
$vacantamount = $row['vacantamount'];
$totalexpected = $row['totalexpected'];
$balancecf = $row['balancecf'];
$advancecf = $row['advancecf'];
$status = $row['status'];
$dueamount =$invoicedamount+$balancebf;
$subtotal =$dueamount-$advancebf;
$vat=0/100*$dueamount;
$invoicetotal=$subtotal+$vat;
echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$invoiceno."</td>";
echo "<td>".$month."</td>";
echo "<td>".$totalunits."</td>";
echo "<td>".$vacantunits."</td>";
echo "<td>".$occupiedunits."</td>";
echo "<td>".$balancebf."</td>";
echo"<TD>".$advancebf."</TD>";
echo"<TD>".$invoicedamount."</TD>";
echo "<td>".$duedate."</td>";


echo"<td><a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'  data-target='#landlorddueinvoice".$invoiceno."'> View  </a> 
<a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'  data-target='#landlordpayinvoice".$invoiceno."'>  <i class='fas fa-print'> </i> </a> 
</td></tr>";

include 'invoicedue-landlord.php';
include 'invoicepay-landlord.php';

$i++;
}
 

}
else {
include ('../404-page.html');
				 }
?>

                                               
                                        
                                        </tbody>
                                        <tfoot  <tr>
                                                <th>NO</th>
                                                <th>INVOICE NO</th>
                                                <th>MONTH</th>
												<th>TOTAL UNITS</th>
                                                <th>VACANT UNITS</th>
												<th>OCCUPIED UNITS</th>
												<th>BALANCE BF</th>
												<th>ADVANCE BF</th>
												<th>DUE AMOUNT</th>
											<th>DUE DATE</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
			