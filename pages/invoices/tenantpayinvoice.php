 <?php
			
			if(isset($_POST['submit-payinvoice'])){
include('../dbconnect.php');
                require('../adminsession.php');
	
//echo convert_number_to_words(1000);

$invoiceno =$_POST["invoiceno2"];
$invoiced =$_POST["invoiced2"];

$electricitybill=$_POST["electricitybill"];
$waterbill=$_POST["waterbill"];
$sanitationbill=$_POST["sanitationbill"];

$damagesfee=$_POST["damagesfee"];
$othercharges=$_POST["others"];
$mode=$_POST["mode"];
$acctname=$_POST["acctname"];
$acctno=$_POST["acctno"];
$trscode=$_POST["trscode"];
$paid=$_POST["paid"];
$status4='DUE';
$status5='ADVANCE';
$status2='PAID';
$subtotal =$invoiced+$waterbill+$electricitybill+$sanitationbill+$damagesfee+$othercharges;
$balancecf=$subtotal - $paid;
$leo=Date("ymdh-i");
$lo=Date("ym");
$regdate=Date("y-m-d");
$regdate1 = date("F j, Y, g:i a"); 


$select4="SELECT rno FROM rno";
$selected4=mysqli_query($connect,$select4);
$test=mysqli_fetch_array($selected4);

if (!$selected4) 
		{
		die("Error: Data not found..");
		}
				
				$rno1=$test['rno'] ;
				$rno=$rno1+1 ;
				

$select9p="SELECT * FROM tenantinvoices WHERE invoiceno='$invoiceno'" ;
$sel9p=mysqli_query($connect,$select9p);
	$row=mysqli_fetch_array($sel9p);		
			$propertyid = $row['propertyid'];
$unitid = $row['unitid'];
$tenantid = $row['tenantid'];

if ($paid>=1){
$update6b = "UPDATE tenantinvoices SET balancecf='$balancecf',paydate='$regdate',time='$regdate1',electricitybill='$electricitybill',waterbill='$waterbill',damagesfee='$damagesfee',othercharges='$othercharges',mode='$mode',acctname='$acctname',acctno='$acctno',trscode='$trscode',status='$status2',admin='$agentid',paid='$paid'  WHERE invoiceno='$invoiceno'";  

if(!mysqli_query($connect,$update6b)){
 echo "<script>alert('Failed to send payments')</script>";

}
}


if ($balancecf > 0)
{
$insert3="INSERT INTO balances(invoiceno,propertyid,unitid,tenantid,paymentdate,dueamount,paidamount,balancecf,status) 
VALUES('$invoiceno','$propertyid','$unitid','$tenantid','$regdate','$subtotal','$paid','$balancecf','$status4')";
if(!mysqli_query($connect,$insert3))
{
 echo "<script>alert('Failed to send to balances')</script>";
}
}

if ($balancecf < 0)
{
$insert3="INSERT INTO advancerent(invoiceno,propertyid,unitid,tenantid,paymentdate,advancepayment,status) 
VALUES('$invoiceno','$propertyid','$unitid','$tenantid','$regdate','$balancecf','$status5')";
if(!mysqli_query($connect,$insert3))
{
 echo "<script>alert('Failed to send to balances')</script>";
}
}

$update6 = "UPDATE rno SET rno='$rno'"; 
if(!mysqli_query($connect,$update6)){
echo "<font color='black'>Failed to update counter</font> ".mysqli_error($connect);
}

 echo "<script>alert('Submission Successful')</script>";
 
 global $invoiceno1; 
$invoiceno1 =$invoiceno;

 include('tenantpaidinvoice2.php');
}