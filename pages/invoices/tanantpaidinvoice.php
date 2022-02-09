<?php 


//function to convert integer to words
function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}



//echo convert_number_to_words(1000);

 

//end of function




               
				 if($_GET['act']=="view"){
	include('../dbconnect.php');
                require('../adminsession.php');
	$invoiceno =$_GET['invoiceno'];
	
	
	$select9p="SELECT * FROM tenantinvoices WHERE invoiceno='$invoiceno'" ;
$sel9p=mysqli_query($connect,$select9p);
	$row=mysqli_fetch_array($sel9p);		
			$propertyid = $row['propertyid'];
$unitid = $row['unitid'];
$tenantid = $row['tenantid'];
$rent = $row['rent'];
$month = $row['month'];
$balancebf = $row['balancebf'];
$duedate = $row['duedate'];
$paydate = $row['time'];
$dategenerated = $row['dategenerated'];
$penaltyfee = $row['penaltyfee'];
$waterbill = $row['waterbill'];
$electricitybill = $row['electricitybill'];
$sanitationbill = $row['sanitationbill'];
$damagesfee = $row['damagesfee'];
$othercharges = $row['othercharges'];
$paid = $row['paid'];
$mode = $row['mode'];
$acctname = $row['acctname'];
$acctno = $row['acctno'];
$trscode = $row['trscode'];
$admin = $row['admin'];
$rno = $row['rno'];
$status = $row['status'];




$select9p1="SELECT * FROM deposit WHERE invoiceno='$invoiceno'" ;
$sel9p1=mysqli_query($connect,$select9p1);
	$row=mysqli_fetch_array($sel9p1);		
			;
$deposit = $row['deposit'];
$agencyfee = $row['agencyfee'];
$waterdeposit = $row['waterdeposit'];
$electricitydeposit = $row['electricitydeposit'];



	$select7p="SELECT firstname,middlename,suname,email,mobileno FROM tenants WHERE idno='$tenantid' ";
$sel7p=mysqli_query($connect,$select7p);
	$row=mysqli_fetch_array($sel7p);		
			$firstname=$row['firstname'];
			$middlename=$row['middlename'];
			$suname=$row['suname'];
			$email2 =$row['email'];
			$mobileno2=$row['mobileno'];
			

		$tenantname=$row['firstname']." ".$row['middlename']." ".$row['suname'];	
		
		$subtotal =$rent+$deposit+$electricitydeposit+$waterdeposit+$agencyfee+$penaltyfee+$waterbill+$electricitybill+$sanitationbill+$damagesfee+$othercharges+$balancebf;
		
		//$vat=10/100*$subtotal;
		$vat=0;
		$total =$subtotal+$vat;
		$balancecf =$paid-$total;
		
	$select9="SELECT propertyname FROM property WHERE propertyid='$propertyid' ";
$sel9=mysqli_query($connect,$select9);
	$row=mysqli_fetch_array($sel9);		
			$propertyname=$row['propertyname'];	
		



	
 




 
 $select9a="SELECT * FROM agents where agencyid='$agencyid'";
$sel9a=mysqli_query($connect,$select9a);
	$row=mysqli_fetch_array($sel9a);		
			$agencyshortname1 =$row['agencyshortname'];
			$agencyfullname1 =$row['agencyfullname'];
			$email1 =$row['email'];
			$phoneno1 =$row['phoneno'];
			$address1 =$row['address'];
			$address11 =$row['address1'];
			$box1 =$row['box'];
			$postalcode1 =$row['postalcode'];
						$town1 =$row['town'];
						
						
						 $select9a="SELECT * FROM landlord where propertyid='$propertyid'";
$sel9a=mysqli_query($connect,$select9a);
	$row=mysqli_fetch_array($sel9a);		
			$firstname3 =$row['firstname'];
			$lastname3 =$row['lastname'];
			$email3 =$row['email'];
			$phoneno3 =$row['phoneno'];
			$box3=$row['box'];
			$town3 =$row['town'];
			$postalcode3 =$row['postalcode'];
			
		
				 ?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <title>paid invoice</title>
</head>
<body>

<style>
th, td {
    text-align: left;
}
body{
	color:black;
	font-family:Courier New;
	font-size: px;
}
</style>


<div id='printinvoice' style="margin:50px;width:968px;height:682px;background-color:white;">

<div  style="margin:10px;width:958px;height:129px;">
<!--###start header####-->
 <div class="row">
 <div  style="float:left;width:615px;height:129px;">
 <img style="width:608px;height:100px;margin:auto;" src='../uploads/b2.png'>
</div >
 <div  style="float:right;width:343px;height:129px;text-align:Right;">
 
<strong >Invoice No:</strong> <?php echo  $invoiceno; ?><br>
<strong >Date Generated:</strong> <?php echo  $dategenerated; ?><br>
<strong >Date Paid:</strong> <?php echo  $paydate; ?><br>
<strong >RNO:</strong> <?php echo  $rno; ?><br>
<strong >Invoiced Amount:</strong> <?php echo  $total; ?>
</div >
</div >
<!--###end header####-->
<div class="row">
<hr>
</div >
<!--###start address####-->

 <div class="row" style="background-color:#EFEFF6;">
 <div  style="float:left;width:479px;text-align:left;">
From:
<strong ><?php echo  $agencyfullname1; ?><br></strong >
P.O Box <?php echo  $box1." ".$town1." ".$postalcode1; ?><br>
<?php echo  $address1; ?><br>
<?php echo  $address11; ?><br>
Email: <?php echo  $email1; ?><br>
Phone: <?php echo  $phoneno1; ?><br>
</div >
<div  style="float:right;width:479px;text-align:left;">
 To:
<strong ><?php echo  $tenantname; ?><br></strong >
House name:   <?php echo  $propertyname ?> <br>
House No:   <?php echo  $propertyid ?>  Unit No:   <?php echo  $unitid ?><br>
Email: <?php echo  $email2 ;?><br>
Phone: <?php echo  $mobileno2 ;?><br>

</div >

</div >

<!--###end address####-->

<!--###start payments####-->

 <div class="row">
 <div  >
<table style="width:100%;">

<thead>
<tr>
<td colspan="8"><hr></td>

</tr>
<tr>
<th colspan="2">Item</th><th colspan="4">Description</th><th style="text-align:right;">Total(Ksh)</th><th></th>
</tr></thead>
<tbody>
   
  <?php 
if ($deposit>=1){
?>
<tr>
<td colspan="2"> Deposit</td>
<td colspan="4"> Deposit for House No:   <?php echo  $propertyid ?>  Unit No:   <?php echo  $unitid ?> </td>
<td style="text-align:right;"><?php echo  $deposit;?> </td>
<td ></td>
</tr>
<?php 
}
if ($rent>=1){
?>
<tr>
<td colspan="2">Rent</td>
<td colspan="4">rent for  House No:   <?php echo  $propertyid ?>  Unit No:   <?php echo  $unitid ?></td>
<td style="text-align:right;"><?php echo  $rent;?> </td>
<td ></td>
</tr>

<?php 
}
if ($balancebf>=1){
?>
<tr>
<td colspan="2">Balance B/F</td>
<td colspan="4">Previouy blalances </td>
<td style="text-align:right;"><?php echo  $balancebf;?> </td>
<td ></td>
</tr>
<?php 
}
if ($agencyfee>=1){
?>
<tr>
<td colspan="2">Agency Fee</td>
<td colspan="4">Tenancy agreement fee(Paid once) </td>
<td style="text-align:right;"><?php echo  $agencyfee;?> </td>
<td ></td>
</tr>
</tbody>
 <?php 
}
if ($electricitydeposit>=1){
?>
<tr>
<td colspan="2">Electricity deposit</td>
<td colspan="4">For House No:   <?php echo  $propertyid ?>  Unit No:   <?php echo  $unitid ?> </td>
<td style="text-align:right;"><?php echo  $electricitydeposit;?> </td>
<td ></td>
</tr>
 <?php 
}
if ($waterdeposit>=1){
?>
<tr>
<td colspan="2">Water deposit</td>
<td colspan="4">For House No:   <?php echo  $propertyid ?>  Unit No:   <?php echo  $unitid ?> </td>
<td style="text-align:right;"><?php echo  $waterdeposit;?> </td>
<td ></td>
</tr>
<?php 
}
if ($waterbill>=1){
?>
<tr>
<td colspan="2">Water Bill</td>
<td colspan="4">Invoiced bill</td>
<td style="text-align:right;"><?php echo  $waterbill;?> </td>
<td ></td>
</tr>
<?php 
}
if ($electricitybill>=1){
?>
<tr>
<td colspan="2">Electricity Bill</td>
<td colspan="4">Invoiced bill</td>
<td style="text-align:right;"><?php echo  $electricitybill;?> </td>
<td ></td>
</tr>
<?php 
}
if ($sanitationbill>=1){
?>
<tr>
<td colspan="2">Sanitation Bill</td>
<td colspan="4">Invoiced bill</td>
<td style="text-align:right;"><?php echo  $sanitationbill;?> </td>
<td ></td>
</tr>
<?php 
}
if ($sanitationbill>=1){
?>
<tr>
<td colspan="2">Sanitation Bill</td>
<td colspan="4">Invoiced bill</td>
<td style="text-align:right;"><?php echo  $sanitationbill;?> </td>
<td ></td>
</tr>
<?php 
}
if ($penaltyfee>=1){
?>
<tr>
<td colspan="2">Penalty fee</td>
<td colspan="4">late paymement of an invoice </td>
<td style="text-align:right;"><?php echo  $penaltyfee;?> </td>
<td ></td>
</tr>
<?php 
}
if ($damagesfee>=1){
?>
<tr>
<td colspan="2">Damages fee</td>
<td colspan="4">Invoiced amount </td>
<td style="text-align:right;"><?php echo  $damagesfee;?> </td>
<td ></td>
</tr>
<?php 
}
if ($othercharges>=1){
?>
<tr>
<td colspan="2">Others </td>
<td colspan="4">Invoiced amount</td>
<td style="text-align:right;"><?php echo  $othercharges;?> </td>
<td ></td>
</tr>
<?php 
}

?>
<tr>
<td colspan="8"><hr></td>

</tr>
<tr>
<td colspan="2"></td>
<td>
<strong >Subtotal:</strong> <br>
<strong >VAT(16%):</strong><br> 
<strong >Total:</strong> </td>
<td style="text-align:right;">
 KSH <?php echo  $subtotal ?><br>
KSH <?php echo  $vat ?><br>
 KSH <?php echo  $total ?>
 </td>
 
<td>
 </td>

<td>
<br>
<strong >Amount Paid:</strong> <br>
<strong >Balance C/F:</strong><br> 
</td>
<td style="text-align:right;">
<br>
KSH <?php echo  $paid ?><br>
KSH <?php echo  $balancecf ?>
 </td>

</tr>
<tr>
<td colspan="8">
Amount Paid in Words: <?php echo  "<b><u>".ucfirst(convert_number_to_words($paid))." ONLY</u></b>"; ?>
</td>

</tr>
<tr>
<td colspan="8"><hr></td>

</tr>
<tr>
<td >Payment Mode:</td><td style="text-align:right;"> <?php echo  $mode ?></td>
<td >Account Name:</td><td style="text-align:right;"> <?php echo  $acctname; ?></td>
<td > Account No:</td><td style="text-align:right;"> <?php echo  $acctno; ?> </td>
<td >Transaction Code: </td><td style="text-align:right;"><?php echo  $trscode; ?></td>
</tr>
<tr>
<td colspan="8"><hr></td>

</tr>
</tbody>
 <tr>
<td colspan="4">
<br>
Developer:<br>
<strong > <color="blue">www.appsnest.net</color> (0790000450)<br></strong ></td>
<td colspan="4">You were Served By:<br>
<strong ><?php echo  $login_session ; ?></strong >
---------------------------------------<br>
<i>Receipt is invalid without stamp</i>
</td>

</tr>
 </table>
 </div >

</div >
 <!--###end payments####-->
 

</div >
</div >

<div  style="margin:50px;width:968px;">

 <div class="row">

	<div style="Float:right;">
        <button style="background-color:#f44336;font-size: 13px;padding:12px 28px;border-radius:4px;color:white;opacity:0.6;cursor:not-allowed;" type="button"  data-dismiss="modal"disabled >PAY INVOICE</button>
        <button style="background-color:#008cba;font-size: 13px;padding:12px 28px;border-radius:4px;color:white;" type="button"  onclick="printDiv('printinvoice')">PRINT INVOICE</button>
      </div>
      
	  </div>
      </div>
	  
	  
    
	  

		<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
	</script>
</body>
 
</html>
<?php

	} 
?>