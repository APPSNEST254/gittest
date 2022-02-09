<?php

include('../dbconnect.php');
  
if(isset($_POST['submit-paylandlord'])){

$invoiceno=$_POST["invoiceno"];	
$propertyid=$_POST["propertyid"];	
$invoicetotal=$_POST["invoicetotal"];	
$paid=$_POST["paid"];	
$status='PAID';	
$status2='INVOICED';
$status4='ADVANCE';
$status5='DUE';
$regdate=Date("y-m-d");
$regdate1 = date("F j, Y, g:i a"); 

$select4="SELECT rno FROM landlordrno";
$selected4=mysqli_query($connect,$select4);
$test=mysqli_fetch_array($selected4);

if (!$selected4) 
		{
		die("Error: Data not found..");
		}
				
				$rno1=$test['rno'] ;
				$rno=$rno1+1 	;

if($paid>=$invoicetotal)
{
	$balancecf=0;
	$advancecf=$paid-$invoicetotal;
	
$update6 = "UPDATE landlordinvoices SET balancecf='$balancecf',advancecf='$advancecf',paymentdate='$regdate',time='$regdate1',paidamount='$paid',rno='$rno',status='$status' WHERE invoiceno='$invoiceno'"; 

if(!mysqli_query($connect,$update6)){
echo "<font color='black'>Failed to update landlord invoices</font> ".mysqli_error($connect);
}

$update6a = "UPDATE landlordrno SET rno='$rno'"; 
if(!mysqli_query($connect,$update6a)){
echo "<font color='black'>Failed to update counter</font> ".mysqli_error($connect);
}	
if($advancecf>1){
	
$insert1u="INSERT INTO landlordadvance(rno,invoiceno,propertyid,advanceamount,paymentdate,status) 
VALUES('$rno','$invoiceno','$propertyid','$advancecf','$regdate','$status4')";

if(!mysqli_query($connect,$insert1u)){
echo "<font color='black'>landlord advance DB connection error</font> ".mysqli_error($connect);
}

}


}



if($paid<$invoicetotal)
{
	$balancecf=$invoicetotal-$paid;
	$advancecf=0;
	
$update6b = "UPDATE landlordinvoices SET balancecf='$balancecf',advancecf='$advancecf',paymentdate='$regdate',time='$regdate1',paidamount='$paid',rno='$rno',status='$status' WHERE invoiceno='$invoiceno'"; 

if(!mysqli_query($connect,$update6b)){
echo "<font color='black'>Failed to update landlord invoices</font> ".mysqli_error($connect);
}

$update6c = "UPDATE landlordrno SET rno='$rno'"; 
if(!mysqli_query($connect,$update6c)){
echo "<font color='black'>Failed to update counter</font> ".mysqli_error($connect);
}	

if($balancecf>1){
	
$insert1u="INSERT INTO landlordbalances(invoiceno,propertyid,paymentdate,invoicedamount,paidamount,balancecf,status) 
VALUES('$invoiceno','$propertyid','$regdate','$invoicetotal','$paid','$balancecf','$status5')";

if(!mysqli_query($connect,$insert1u)){
echo "<font color='black'>landlord balances DB connection error</font> ".mysqli_error($connect);
}

}
}

else{
echo "<script>alert('Submission Successfull')</script>";
header("Location: landlordinvoices.php");

}

	} 
?>
