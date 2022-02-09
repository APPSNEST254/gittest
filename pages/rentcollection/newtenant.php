<?php



if(isset($_POST['submit-addtenant'])){

$title=$_POST["title"];
$firstname=$_POST["firstname"];
$suname=$_POST["suname"];
$middlename=$_POST["middlename"];
$email=$_POST["email"];
$idno=$_POST["idno"];
$mobileno=$_POST["mobileno"];
$altmobileno=$_POST["altmobileno"];
$propertyid1=$_POST["propertyid1"];
$unitid1=$_POST["unitid1"];
$occupation=$_POST["occupation"];
$company=$_POST["company"];
$fromdate=$_POST["fromdate"];

$status='CHECKED-IN';
$status2='PAID';
$status3='ACTIVE';
$status4='DUE';
$status5='ADVANCE';
$regdate=Date("y-m-d");
$regdate1 = date("F j, Y, g:i a"); 

$agencyfee=$_POST["agencyfee"];
$electricitydeposit1=$_POST["electricitydeposit1"];
$waterdeposit1=$_POST["waterdeposit1"];
$mon1=$_POST["mon1"];
$others=$_POST["others"];
$paid1=$_POST["paid1"];
$mode=$_POST["mode"];
$trscode=$_POST["trscode"];




	    include('../dbconnect.php');
                require('../adminsession.php');
	
	
if(mysqli_connect_errno()){
	 echo"<script>alert('Failed to connect to database')</script>";

}

$select4="SELECT rno FROM rno";
$selected4=mysqli_query($connect,$select4);
$test=mysqli_fetch_array($selected4);

if (!$selected4) 
		{
		die("Error: Data not found..");
		}
				
				$rno1=$test['rno'] ;
				$rno=$rno1+1 ;

$select1="SELECT price FROM units  WHERE propertyid='$propertyid1' and unitid ='$unitid1' AND status='UNOCCUPIED'";
$selected=mysqli_query($connect,$select1);
$test=mysqli_fetch_array($selected);
			
	$price1=$test['price'] ;
	$deposit=$test['price'] ;


if(mysqli_num_rows($selected)<>1){
	
	 echo"<script>alert('CONFLICTING UNIT RECORDS')</script>";
	
}



		
		
Else
{
$totalpay=$price1+$deposit+$agencyfee+$electricitydeposit1+$waterdeposit1+$others;
$balancecf=$totalpay-$paid1;	
$deposittotal=$deposit-$electricitydeposit1+$waterdeposit1;	
$invoiceno= $propertyid1."-".$unitid1."-".$mon1; 
$entryid= $propertyid1.$unitid1.$idno.$regdate; 
	
$insert="INSERT INTO tenants(entryid,title,firstname,suname,middlename,email,idno,regdate,mobileno,altno,propertyid,unitid,occupation,company,fromdate,status) 
VALUES('$entryid','$title','$firstname','$suname','$middlename','$email','$idno','$regdate1','$mobileno','$altmobileno','$propertyid1','$unitid1','$occupation','$company','$fromdate','$status')";

if(!mysqli_query($connect,$insert)){
 echo "<script>alert('Failed to send to tenants')</script>";
}

	$update = "UPDATE units SET status='OCCUPIED' WHERE unitid='$unitid1'AND propertyid='$propertyid1'"; 
if(!mysqli_query($connect,$update)){
 echo "<script>alert('Failed to uodate units')</script>";

}

	if($mode=='BANK'){		
				
$select9b="SELECT * FROM agencybank WHERE agencyid='$agencyid' ";
$sel9b=mysqli_query($connect,$select9b);
	$row=mysqli_fetch_array($sel9b);		
				
			
			$mode2name=$row['bankname'];	
			$mode2='BANK';	
			$accountname2=$row['accountname'];	
			$accountno2=$row['accountno'];
			
			
			
$insert1="INSERT INTO tenantinvoices(invoiceno,propertyid,unitid,tenantid,month,duedate,dategenerated,time,rent,balancecf,paydate,othercharges,mode,modename,acctname,acctno,trscode,admin,status,invoicedamount,rno,paid) 
VALUES('$invoiceno','$propertyid1','$unitid1','$idno','$mon1','$regdate','$regdate','$regdate1','$price1','$balancecf','$regdate','$others','$mode2','$mode2name','$accountname2','$accountno2','$trscode','$agentid','$status2','$totalpay','$rno','$paid1')";
if(!mysqli_query($connect,$insert1))
{
 echo "<script>alert('Failed to send to invoices')</script>";
}
	
		}
		
		
				if($mode=='MPESA'){		
				
$select9p="SELECT * FROM mpesa WHERE agencyid='$agencyid' ";
$sel9p=mysqli_query($connect,$select9p);
	$row=mysqli_fetch_array($sel9p);		
			$mode1name=$row['mpesamode'];	
			$mode1='MPESA';	
			$businessname1=$row['bisinessname'];	
			
			
			$insert1="INSERT INTO tenantinvoices(invoiceno,propertyid,unitid,tenantid,month,duedate,dategenerated,time,rent,balancecf,paydate,othercharges,mode,modename,acctname,acctno,trscode,admin,status,invoicedamount,rno,paid) 
VALUES('$invoiceno','$propertyid1','$unitid1','$idno','$mon1','$regdate','$regdate','$regdate1','$price1','$balancecf','$regdate','$others','$mode1','$mode1name','$businessname1','$invoiceno','$trscode','$agentid','$status2','$totalpay','$rno','$paid1')";
if(!mysqli_query($connect,$insert1))
{
 echo "<script>alert('Failed to send to invoices')</script>";
}
	
		}


if($mode=='CASH'){
$mode3name='N/A';	
			$mode3='CASH';	
			$account3no='N/A';	

			$insert1="INSERT INTO tenantinvoices(invoiceno,propertyid,unitid,tenantid,month,duedate,dategenerated,time,rent,balancecf,paydate,othercharges,mode,admin,status,invoicedamount,rno,paid) 
VALUES('$invoiceno','$propertyid1','$unitid1','$idno','$mon1','$regdate','$regdate','$regdate1','$price1','$balancecf','$regdate','$others','$mode3','$agentid','$status2','$totalpay','$rno','$paid1')";
if(!mysqli_query($connect,$insert1))
{
 echo "<script>alert('Failed to send to invoices')</script>";
}
}


$insert2="INSERT INTO deposit(idno,invoiceno,propertyid,unitid,deposit,paydate,agencyfee,waterdeposit,electricitydeposit,total,status) 
VALUES('$idno','$invoiceno','$propertyid1','$unitid1','$deposit','$regdate','$agencyfee','$waterdeposit1','$electricitydeposit1','$deposittotal','$status3')";
if(!mysqli_query($connect,$insert2))
{
 echo "<script>alert('Failed to send to deposit')</script>";
}
$update6 = "UPDATE rno SET rno='$rno'"; 
if(!mysqli_query($connect,$update6)){
echo "<font color='black'>Failed to update counter</font> ".mysqli_error($connect);
}


if ($balancecf > 0)
{
$insert3="INSERT INTO balances(invoiceno,propertyid,unitid,tenantid,paymentdate,dueamount,paidamount,balancecf,status) 
VALUES('$invoiceno','$propertyid1','$unitid1','$idno','$regdate','$totalpay','$paid1','$balancecf','$status4')";
if(!mysqli_query($connect,$insert3))
{
 echo "<script>alert('Failed to send to balances')</script>";
}
}
if ($balancecf < 0)
{
$insert3="INSERT INTO advancerent(invoiceno,propertyid,unitid,tenantid,paymentdate,advancepayment,status) 
VALUES('$invoiceno','$propertyid1','$unitid1','$idno','$regdate','$balancecf','$status5')";
if(!mysqli_query($connect,$insert3))
{
 echo "<script>alert('Failed to send to advance Rent')</script>";
}
}
 echo "<script>alert('Submission Successful')</script>";
 
 global $idno1; 
 global $unitid2; 
 global $propertyid2; 
 global $invoiceno1; 

$idno1 = $idno; 
$unitid2 =$unitid1;
$propertyid2 =$propertyid1;
$invoiceno1 =$invoiceno;

include('tenant.php');

}	


} 
?>