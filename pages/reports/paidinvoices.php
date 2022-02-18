<div class="table-responsive">
                                 <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                     <thead>
                                      
                                      <tr>
                                        <th >NO</th> 
										<th >RECEIPT #</th> 
                                        <th >DATE PAID</th> 
                                        <th >INVOICE NO</th> 
                                        <th >INVOICED AMOUNT</th> 
                                        <th >BALANCE C/F</th> 
                                        <th >MODE</th> 
                                        <th >MODE NAME</th> 
                                        <th >PAID</th>
                                        <th >ACTION</th>
</tr>
                                         
                                     </thead> 
                                     

                                     <tbody>
										
										   <?php 
             
              
                        
               
                 $select="SELECT tenantinvoices.*,property.propertyid,property.agencyid
				 FROM tenantinvoices 
				 LEFT JOIN property ON tenantinvoices.propertyid = property.propertyid WHERE property.agencyid='$agencyid' ORDER BY tenantinvoices.rno DESC";
                 if(mysqli_query($connect,$select))
{
$i=1;
$result=mysqli_query($connect,$select);


while($row=mysqli_fetch_array($result)){
$invoiceno = $row['invoiceno'];
$rno = $row['rno'];
$time = $row['time'];
$invoicedamount = $row['invoicedamount'];
$balancecf = $row['balancecf'];
$mode = $row['mode'];
$modename = $row['modename'];
$paid = $row['paid'];
echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$rno."</td>";
echo "<td>".$time."</td>";
echo "<td>".$invoiceno."</td>";
echo "<td>".$invoicedamount."</td>";
echo "<td>".$balancecf."</td>";
echo "<td>".$mode."</td>";
echo "<td>".$modename."</td>";
echo "<td>".$paid."</td>";



echo "<td>

<a class='btn btn-success btn-sm'  href ='../invoices/tanantpaidinvoice.php?act=view& invoiceno=".$invoiceno."'>
Details
</a>
</td>";
echo "</tr>"; 
$i++;
}
}
?>
                                           
                                        </tbody>
                                     <tfoot>
                                           
                                            <tr>
                                        <th >NO</th> 
										<th >RECEIPT #</th> 
                                        <th >DATE PAID</th> 
                                        <th >INVOICE NO</th> 
                                        <th >INVOICED AMOUNT</th> 
                                        <th >BALANCE C/F</th> 
                                        <th >MODE</th> 
                                        <th >MODE NAME</th> 
                                        <th >PAID</th>
                                        <th >ACTION</th>

                                         </tr>
                                     </tfoot>
                                 </table>
                             </div>