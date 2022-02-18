
<style> 
input[type=text],input[type=number] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid #555;
  outline: none;
}

input[type=text]:focus, input[type=number]:focus  {
  background-color: lightblue;
}
/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 30%;
  padding: 10px;
 }
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>
    <!--   ########## Start pay invoice Modal##########-->
    <div class="row">
    <h2>Pay Invoice</h2>
</div>
<form name="generateinvoices" method="post" action="tenantpayinvoice.php" role="form" >
												<input type="text" name="invoiceno2"  value="<?php echo $invoiceno; ?>" required hidden >
                                                <input type="text" name="invoiced2"   value="<?php echo $total; ?>"  required hidden>


                                                <div class="row">
  <div class="column" >
  <label>Invoice #</label>
  <input type="text"  value="<?php echo $invoiceno; ?>" disabled >
  </div>
  <div class="column" >
  <label for="invoiced2" >Invoiced Amount:</label> 
												<input type="text"   value="<?php echo $total; ?>"  disabled>
  </div>
 
</div>

    <div class="row">
    <div class="column" >
  <label for="electricitybill" >Electricty Bill</label> 
  <input type="number" name="electricitybill" value="0" >
  </div>
    <div class="column" >
  <label for="waterbill" >Water Bill</label> 
  <input type="number"   name="waterbill"value="0"  >
  </div>
  <div class="column" >
  <label for="sanitationbill" >Sanitation Bill</label> 
  <input type="number"   name="sanitationbill"value="0"  >
  </div>
  
</div>

<div class="row">
<div class="column" >
  <label for="damagesfee" >Damages Fee</label> 
  <input type="number"  name="damagesfee" value="0" >
  </div>
    <div class="column" >
  <label for="others" >Others</label> 
  <input type="number"  name="others" value="0" >
  </div>
  <div class="column" >
  
  </div>
  
</div>


<div class="row">
<div class="col">
							
								<label for="mode" >Payment Mode: </label><br>
							
								   <label class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" name="mode" value="CASH"checked class="custom-control-input"><span class="custom-control-label">Cash</span>
											  </label>

                                            
											  
											  <?php
								
 $result = $connect->query("select * from mpesa Where agencyid='$agencyid'");
 
    while ($row = $result->fetch_assoc()) {

                 
                  $mpesaid = $row['mpesaid'];
                  $agencyid = $row['agencyid'];
                  $mpesamode = $row['mpesamode'];
                  $bisinessname = $row['bisinessname'];
                  $accountno = $row['accountno'];
				  if($mpesamode=='N/A'){
					  
				  }
				  else{
                                echo "
								     <label class='custom-control custom-radio custom-control-inline'>
											
			<input type='radio' name='mode' class='custom-control-input' Value='MPESA'><span class='custom-control-label'>Mpesa $mpesamode (Business Name: $bisinessname, Account NO: Invoice#)</span>
 </label>";

	}
	}
	
	 $result1 = $connect->query("select * from agencybank Where agencyid='$agencyid'");
 
    while ($row = $result1->fetch_assoc()) {

                 
                  $bankmodeid = $row['bankmodeid'];
                  $agencyid = $row['agencyid'];
                  $bankname = $row['bankname'];
                  $accountname = $row['accountname'];
                  $accountno = $row['accountno'];
				  if($bankname=='N/A'){
					  
				  }else{
                                echo "
								     <label class='custom-control custom-radio custom-control-inline'>
											
			<input type='radio' name='mode' class='custom-control-input' Value='BANK'><span class='custom-control-label'>$bankname BANK(Account Name: $accountname, Account NO: $accountno)</span>
 </label>";
				  }
	}
 ?>
                                       
								
								</div>
</div>



<div class="row">
<div class="column" >
  <label for="damagesfee" class="col-form-label">Transaction Code:</label> 
  <input  type="text" name="trscode" value="" >
  </div>
    <div class="column" >
  <label for="others" class="col-form-label">AMOUNT TO PAY:</label> 
  <input type="text" id="paid" name="paid" value="<?php echo  $total ?>" required >
  </div>
  <div class="column" >
  
  </div>
  
</div>


<div class="row">

<div style="align-content: center;">
 

																<input style="background-color:#008cba;font-size: 13px;padding:12px 28px;border-radius:4px;color:white;" type="submit" name="submit-payinvoice" value="Pay Invoice">
    
  </div>
  
  </div>
      

 