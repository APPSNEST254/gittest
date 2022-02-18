							 <!-- ============================================================== -->
                        <!-- start table 1  -->
                        <!-- ============================================================== -->
                        <div class="tab-pane fade show active" id="card-pill-1" role="tabpanel" aria-labelledby="card-tab-1">
                                 
                                 <div class="table-responsive">
                                 <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                     <thead>
                                      <tr>
                                             <th>NO</th>
                                             <th>INVOICE NO</th>
                                             <th>UNIT ID</th>
                                             <th> TENANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                             <th>MONTH</th>
                                              
                                             <th>DUE RENT</th>
                                             <th>BALANCE BF</th>
                                             <th>SUBTOTAL</th>
                                         <th>DUE DATE</th>
                                             <th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                         </tr>
                                     </thead> <tbody>
                                     
                                     <?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select3="SELECT * FROM tenantinvoices WHERE propertyid='$propertyid' AND status='DUE'" ;

if(mysqli_query($connect,$select3))
{
$i=1;
$result3=mysqli_query($connect,$select3);



while($row=mysqli_fetch_array($result3)){

$invoiceno = $row['invoiceno'];
$propertyid = $row['propertyid'];
$unitid = $row['unitid'];
$tenantid = $row['tenantid'];
$rent = $row['rent'];
$month = $row['month'];
$balancebf = $row['balancebf'];
$duedate = $row['duedate'];
$dategenerated = $row['dategenerated'];
$penaltyfee = $row['penaltyfee'];

 $select7="SELECT firstname,middlename,suname FROM tenants WHERE idno='$tenantid' ";
$sel7=mysqli_query($connect,$select7);
 $row=mysqli_fetch_array($sel7);		
         $firstname=$row['firstname'];
         $middlename=$row['middlename'];
         $suname=$row['suname'];

     $tenantname=$row['firstname']." ".$row['middlename']." ".$row['suname'];	
     
     $subtotal =$rent+$balancebf+$penaltyfee;
     
     //$vat=10/100*$subtotal;
     $vat=0;
     $total =$subtotal+$vat;

echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$invoiceno."</td>";
echo "<td>".$unitid."</td>";

echo "<td>".$tenantname."</td>";
echo "<td>".$month."</td>";
echo "<td>".$rent."</td>";
echo "<td>".$balancebf."</td>";
echo"<TD>".$subtotal."</TD>";
echo "<td>".$duedate."</td>";
     
         
echo"<td><a href ='tenantdueinvoice.php?act=view& invoiceno=".$invoiceno."' class='btn btn-sm btn-outline-light' >View  </a> 
<a href='#' class='btn btn-sm btn-outline-light'data-toggle='modal' data-target='.bd-example-modal-lg'>  <i class='fas fa-print'> </i>  </a>
</td></tr>"; 
$i++;
}


}
else {
include ('../404-page.html');
              }
?>

                                            
                                     
                                     </tbody>
                                     <tfoot>
                                            <tr>
                                             <th>NO</th>
                                             <th>INVOICE NO</th>
                                             <th>UNIT ID</th>
                                             <th> TENANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                             <th>MONTH</th>
                                              
                                             <th>DUE RENT</th>
                                             <th>BALANCE BF</th>
                                             <th>SUBTOTAL</th>
                                         <th>DUE DATE</th>
                                             <th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                         </tr>
                                     </tfoot>
                                 </table>
                             </div>
                            
                                        </div>