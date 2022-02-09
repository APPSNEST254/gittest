
<?php
include('../dbconnect.php');
if(isset($_POST['submit-invoice'])){

$month=$_POST["mon"];	
$datedue1=$_POST["datedue1"];		
$propertyid=$_POST["propertyid"];	
$totalunits=$_POST["totalunits"];	
$vacantunits=$_POST["vacantunits"];	
$occupiedunits=$_POST["occupiedunits"];	
$bookedunits=$_POST["bookedunits"];	
$regdate=Date("y-m-d");
$regdate1 = date("F j, Y, g:i a"); 
$status3='DUE';
$status2='PAID';
$invoiceno = $propertyid."-".$month;



$select1="SELECT invoiceno FROM landlordinvoices  WHERE invoiceno='$invoiceno'";
$selected=mysqli_query($connect,$select1);
$test=mysqli_fetch_array($selected);
			
	$invoiceno1=$test['invoiceno'] ;
	
if(mysqli_num_rows($selected)>0){
	
echo "<script>alert('Invoice Alredy Generated')</script>";
header("Location: landlordinvoices.php");
	
}
else

{
	

$selcount9l="SELECT SUM(price) AS newinvoice FROM units
WHERE propertyid='$propertyid' and status='OCCUPIED'"; 

$selcount7l=mysqli_query($connect,$selcount9l);
$row7l=mysqli_fetch_array($selcount7l);
$newinvoice=$row7l['newinvoice'];

if($newinvoice>1) {
	$newinvoice1=$newinvoice;	
	
	}
else 
{
	$newinvoice1=0;
}

$selcount9n="SELECT SUM(price) AS uninvoiced FROM units
WHERE propertyid='$propertyid' and status='UNOCCUPIED'||status='BOOKED'"; 

$selcount7n=mysqli_query($connect,$selcount9n);
$row7n=mysqli_fetch_array($selcount7n);
$uninvoiced=$row7n['uninvoiced'];

if($uninvoiced>1) {
	$uninvoiced1=$uninvoiced;	
	
	}
else 
{
	$uninvoiced1=0;
}
$totalexpectedrent=$uninvoiced1+$newinvoice1;

$selcount6="SELECT SUM(balancecf) AS balances FROM landlordbalances
WHERE propertyid='$propertyid' and status='DUE'"; 

$selcount7=mysqli_query($connect,$selcount6);
$row7=mysqli_fetch_array($selcount7);
$balancebf=$row7['balances'];
if($balancebf>1) {
	$balancebf1=$balancebf;	
	
	}
else 
{
	$balancebf1=0;
}

$selcount9k="SELECT SUM(advanceamount) AS advance FROM landlordadvance
WHERE propertyid='$propertyid' and status='DUE'"; 

$selcount7k=mysqli_query($connect,$selcount9k);
$row7=mysqli_fetch_array($selcount7k);
$advancebf=$row7['advance'];

if($advancebf>1) {
	$advancebf1=$advancebf;	
	
	}
else 
{
	$advancebf1=0;
}

$dueamount=$newinvoice1+$balancebf1;	
	
	
if ($dueamount <= $advancebf1)

{
$balancecf2 =0;
$advancecf2 =$advancebf1-$dueamount;
	
$insert1="INSERT INTO landlordinvoices(invoiceno,propertyid,month,totalunits,vacantunits,occupiedunits,dategenerated,duedate,balancebf,advancebf,invoicedamount,vacantamount,totalexpected,balancecf,advancecf,paidamount,status) 
VALUES('$invoiceno','$propertyid','$month','$totalunits','$vacantunits','$occupiedunits','$regdate','$datedue1','$balancebf1','$advancebf1','$newinvoice','$uninvoiced1','$totalexpectedrent','$balancecf2','$advancecf2',$dueamount','$status2')";

if(!mysqli_query($connect,$insert1)){
echo "<font color='black'>landlordinvoices DB connection error</font> ".mysqli_error($connect);
}

$insert2="INSERT INTO landlordcounter(counterid,propertyid) 
VALUES('$invoiceno','$propertyid')";

if(!mysqli_query($connect,$insert2)){
echo "<font color='black'>landlordcounter DB connection error</font> ".mysqli_error($connect);
}
ELSE
	echo "<script>alert('New Invoice Generated')</script>";

}	

if ($dueamount > $advancebf1)

{
$balancecf2 =0;
$advancecf2 =0;
	
$insert1="INSERT INTO landlordinvoices(invoiceno,propertyid,month,totalunits,vacantunits,occupiedunits,dategenerated,duedate,balancebf,advancebf,invoicedamount,vacantamount,totalexpected,balancecf,advancecf,status) 
VALUES('$invoiceno','$propertyid','$month','$totalunits','$vacantunits','$occupiedunits','$regdate','$datedue1','$balancebf1','$advancebf1','$newinvoice','$uninvoiced1','$totalexpectedrent','$balancecf2','$advancecf2','$status3')";

if(!mysqli_query($connect,$insert1)){
echo "<font color='black'>landlordinvoices DB connection error</font> ".mysqli_error($connect);
}

$insert2="INSERT INTO landlordcounter(counterid,propertyid) 
VALUES('$invoiceno','$propertyid')";

if(!mysqli_query($connect,$insert2)){
echo "<font color='black'>landlordcounter DB connection error</font> ".mysqli_error($connect);
}



ELSE
	echo "<script>alert('New Invoice Generated')</script>";


}

	
}
}




	
		?>