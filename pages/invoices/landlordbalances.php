<div class="table-responsive">
                                    <table id="example4" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                         <tr>
                                                <th>NO</th>
												<th>INVOICE #</th>
                                                <th>RNO</th>
                                                <th>PAYMENT DATE</th>
                                                <th>INVOICED</th>
                                                <th>PAID</th>
                                                <th>BALANCE</th>
                                                <th>STATUS</th>
                                                <th>NEW INVOICE</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        &nbsp;&nbsp;&nbsp;&nbsp;</th></tr>
											</thead> <tbody>
										
										<?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select3b="SELECT * FROM landlordbalances WHERE propertyid='$propertyid' ORDER BY invoiceno DESC" ;

if(mysqli_query($connect,$select3b))
{
$i=1;
$result3b=mysqli_query($connect,$select3b);

while($row=mysqli_fetch_array($result3b)){


$invoiceno = $row['invoiceno'];
$paymentdate = $row['paymentdate'];
$invoicedamount = $row['invoicedamount'];
$paidamount = $row['paidamount'];
$balancecf = $row['balancecf'];
$rno = $row['rno'];
$status = $row['status'];
$newinvoice = $row['newinvoice'];

echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$invoiceno."</td>";
echo "<td>".$rno."</td>";
echo "<td>".$paymentdate."</td>";
echo "<td>".$invoicedamount."</td>";
echo "<td>".$paidamount."</td>";
echo "<td>".$balancecf."</td>";
echo "<td>".$status."</td>";
echo "<td>".$newinvoice."</td>";



echo"<td><a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'  data-target='#invoicebalancelandlord".$invoiceno."'> View  </a> 
<a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'  data-target='#landlordpayinvoice".$invoiceno."'>  <i class='fas fa-print'> </i> </a> 
</td></tr>";

include 'invoicebalance-landlord.php';
$i++;
}
 

}
else {
include ('../404-page.html');
				 }
?>

                                               
                                        
                                        </tbody>
                                        <tfoot ><tr>
                                                <th>NO</th>
												<th>INVOICE #</th>
                                                <th>RNO</th>
                                                <th>PAYMENT DATE</th>
                                                <th>INVOICED</th>
                                                <th>PAID</th>
                                                <th>BALANCE</th>
                                                <th>STATUS</th>
                                                <th>NEW INVOICE</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
			