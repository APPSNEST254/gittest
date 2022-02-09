<div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                         <tr>
                                                <th>NO</th>
                                                <th>INVOICE NO</th>
                                                <th>MONTH</th>
												<th>TOTAL UNITS</th>
                                                <th>OCCUPIED UNITS</th>
												<th>INVOICED</th>
												<th>BALANCE C/F</th>
												<th>ADVANCE C/F</th>
												<th>PAID</th>
											<th>DATE PAID</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </thead> <tbody>
										
										<?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select3="SELECT * FROM landlordinvoices WHERE propertyid='$propertyid' AND status='PAID'" ;

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
$paymentdate = $row['paymentdate'];
$balancebf = $row['balancebf'];
$advancebf = $row['advancebf'];
$invoicedamount = $row['invoicedamount'];
$vacantamount = $row['vacantamount'];
$totalexpected = $row['totalexpected'];
$balancecf = $row['balancecf'];
$advancecf = $row['advancecf'];
$status = $row['status'];
$rno = $row['rno'];
$mode = $row['mode'];
$trscode = $row['trscode'];
$paidamount = $row['paidamount'];
$dueamount =$invoicedamount+$balancebf;
$subtotal =$dueamount-$advancebf;
$vat=0/100*$dueamount;
$invoicetotal=$subtotal+$vat;
echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$invoiceno."</td>";
echo "<td>".$month."</td>";
echo "<td>".$totalunits."</td>";
echo "<td>".$occupiedunits."</td>";
echo "<td>".$invoicedamount."</td>";
echo "<td>".$balancecf."</td>";
echo"<TD>".$advancecf."</TD>";
echo"<TD>".$paidamount."</TD>";
echo "<td>".$paymentdate."</td>";


echo"<td><a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'  data-target='#landlordpaidinvoice".$invoiceno."'> View  </a> 
</td></tr>";

include 'invoicepaid-landlord.php';


$i++;
}
 

}
else {
include ('../404-page.html');
				 }
?>

                                               
                                        
                                        </tbody>
                                        <tfoot >
										   <tr>
                                                <th>NO</th>
                                                <th>INVOICE NO</th>
                                                <th>MONTH</th>
												<th>TOTAL UNITS</th>
                                                <th>OCCUPIED UNITS</th>
												<th>INVOICED</th>
												<th>BALANCE C/F</th>
												<th>ADVANCE C/F</th>
												<th>PAID</th>
											<th>DATE PAID</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
			