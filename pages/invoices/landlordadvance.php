<div class="table-responsive">
                                    <table id="example3" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                         <tr>
                                                 <th>NO</th>
                                                <th>RNO</th>
                                                <th>INVOICE #</th>
                                                <th>PAYMENT DATE</th>
                                                <th>ADVANCE</th>
                                                <th>STATUS</th>
                                                <th>NEW INVOICE</th> </tr>
                                        </thead> <tbody>
										
										<?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select3b="SELECT * FROM landlordadvance WHERE propertyid='$propertyid' ORDER BY rno DESC" ;

if(mysqli_query($connect,$select3b))
{
$i=1;
$result3b=mysqli_query($connect,$select3b);



while($row=mysqli_fetch_array($result3b)){

$rno = $row['rno'];
$invoiceno = $row['invoiceno'];
$paymentdate = $row['paymentdate'];
$advanceamount = $row['advanceamount'];
$status = $row['status'];
$newinvoice = $row['newinvoice'];

echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$rno."</td>";
echo "<td>".$invoiceno."</td>";
echo "<td>".$paymentdate."</td>";
echo "<td>".$advanceamount."</td>";
echo "<td>".$status."</td>";
echo "<td>".$newinvoice."</td>";

echo"<td><a href='#' class='btn btn-sm btn-outline-light' data-toggle='modal'  data-target='#invoiceadvancelandlord".$invoiceno."'> View  </a> 
</td></tr>";


include 'invoiceadvance-landlord.php';
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
                                                <th>RNO</th>
                                                <th>INVOICE #</th>
                                                <th>PAYMENT DATE</th>
                                                <th>ADVANCE</th>
                                                <th>STATUS</th>
                                                <th>NEW INVOICE</th> </tr>
                                        </tfoot>
                                    </table>
                                </div>
			