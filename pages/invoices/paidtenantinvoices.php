	
						 <!-- ============================================================== -->
                        <!-- start table 3 -->
                        <!-- ============================================================== -->
                        <div class="tab-pane fade" id="card-pill-3" role="tabpanel" aria-labelledby="card-tab-3">
<div class="table-responsive">
<table id="example3" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>INVOICE #</th>
                                                <th>RECEIPT #</th>
                                                <th>UNIT ID</th>
                                                <th> TENANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                <th>MONTH</th>
                                                 
												<th>DUE RENT</th>
												<th>BALANCE BF</th>
												<th>SUBTOTAL</th>
                                          
                                            <th>PAID DATE</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            								
										<?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select3p="SELECT * FROM tenantinvoices WHERE propertyid='$propertyid' AND status='PAID'ORDER BY rno DESC"  ;

if(mysqli_query($connect,$select3p))
{
$i=1;
$result3p=mysqli_query($connect,$select3p);



while($row=mysqli_fetch_array($result3p)){

$invoiceno = $row['invoiceno'];
$rno = $row['rno'];
$propertyid = $row['propertyid'];
$unitid = $row['unitid'];
$tenantid = $row['tenantid'];
$rent = $row['rent'];
$month = $row['month'];
$balancebf = $row['balancebf'];
$paydate = $row['paydate'];
$dategenerated = $row['dategenerated'];

	$select7p="SELECT firstname,middlename,suname FROM tenants WHERE idno='$tenantid' ";
$sel7p=mysqli_query($connect,$select7p);
	$row=mysqli_fetch_array($sel7p);		
			$firstname=$row['firstname'];
			$middlename=$row['middlename'];
			$suname=$row['suname'];

		$tenantname=$row['firstname']." ".$row['middlename']." ".$row['suname'];	
		
		$subtotal =$rent+$balancebf;
		
		//$vat=10/100*$subtotal;
		$vat=0;
		$total =$subtotal+$vat;

echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$invoiceno."</td>";
echo "<td>".$rno."</td>";

echo "<td>".$unitid."</td>";

echo "<td>".$tenantname."</td>";
echo "<td>".$month."</td>";
echo "<td>".$rent."</td>";
echo "<td>".$balancebf."</td>";


echo"<TD>".$subtotal."</TD>";

echo "<td>".$paydate."</td>";

		
			


 echo"<td><a href ='tanantpaidinvoice.php?act=view& invoiceno=".$invoiceno."' class='btn btn-sm btn-outline-light' >View  </a> 
<a href='#' class='btn btn-sm btn-outline-light'data-toggle='modal' data-target='.bd-example-modal-lg'>  <i class='fas fa-print'> </i>  </a>
</td></tr>"; 
$i++;
}
 

}
else {
include ('../404-page.html');
				 }
?>
                                         
                                        <tfoot>
                                           <tr>
                                           <th>NO</th>
                                                <th>INVOICE #</th>
                                                <th>RECEIPT #</th>
                                                <th>UNIT ID</th>
                                                <th> TENANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                <th>MONTH</th>
                                                 
												<th>DUE RENT</th>
												<th>BALANCE BF</th>
												<th>SUBTOTAL</th>
                                                
                                                

											
                                            
                                            <th>PAID DATE</th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>                                              
											  </div>
											
														 <!-- ============================================================== -->
                        <!-- end table 3 -->
                        <!-- ============================================================== -->