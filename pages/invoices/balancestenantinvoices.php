
						 <!-- ============================================================== -->
                        <!-- start table 4  -->
                        <!-- ============================================================== -->
                        <div class="tab-pane fade" id="card-pill-4" role="tabpanel" aria-labelledby="card-tab-4">
<div class="table-responsive">
                                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>INVOICE NO</th>
                                                <th>UNIT ID</th>
                                                <th> TENANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                <th>INVOICED AMOUNT</th>
                                                 
												<th>PAID</th>
												<th>DUE BALANCE</th>
												
											<th>PAYMENT DATE </th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
										<?php     //script to be used to view details of registered hospitals 


//selecting registered hospitals from table

$select3="SELECT * FROM balances WHERE propertyid='$propertyid' AND status='DUE'" ;

if(mysqli_query($connect,$select3))
{
$i=1;
$result3=mysqli_query($connect,$select3);



while($row=mysqli_fetch_array($result3)){

$invoiceno = $row['invoiceno'];
$propertyid = $row['propertyid'];
$unitid = $row['unitid'];
$tenantid = $row['tenantid'];
$dueamount = $row['dueamount'];
$paidamount = $row['paidamount'];
$duebalance = $row['balancecf'];
$datepaid = $row['paymentdate'];


	$select7="SELECT firstname,middlename,suname FROM tenants WHERE idno='$tenantid' ";
$sel7=mysqli_query($connect,$select7);
	$row=mysqli_fetch_array($sel7);		
			$firstname=$row['firstname'];
			$middlename=$row['middlename'];
			$suname=$row['suname'];

		$tenantname=$row['firstname']." ".$row['middlename']." ".$row['suname'];	
		
	

echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$invoiceno."</td>";
echo "<td>".$unitid."</td>";

echo "<td>".$tenantname."</td>";
echo "<td>".$dueamount."</td>";
echo "<td>".$paidamount."</td>";
echo "<td>".$duebalance."</td>";
echo "<td>".$datepaid."</td>";
		
			


 echo"<td><a href ='duebalance.php?act=view& invoiceno=".$invoiceno."' class='btn btn-sm btn-outline-light' >View  </a> 
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
                                                <th>INVOICED AMOUNT</th>
                                                 
												<th>PAID</th>
												<th>DUE BALANCE</th>
												
											<th>PAYMENT DATE </th>
												<th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>                                              
											  </div>
											
														 <!-- ============================================================== -->
                        <!-- end table 4 -->
                        <!-- ============================================================== -->