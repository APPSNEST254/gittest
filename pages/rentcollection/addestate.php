<?php

include('../dbconnect.php');
  
if(isset($_POST['submit-estate'])){

$estatename=$_POST["estatename"];	
$county=$_POST["county"];	
$town=$_POST["town"];	
$abbriviation=$_POST["abbriviation"];	
$agencyid1=$_POST["agencyid1"];	


$select1="SELECT abbriviation FROM estate  WHERE abbriviation='$abbriviation' and agencyid ='$agencyid1'";
$selected=mysqli_query($connect,$select1);
$test=mysqli_fetch_array($selected);
			
	$abbriviation1=$test['abbriviation'] ;
	
if(mysqli_num_rows($selected)<>0){
	
echo "<script>alert('Estate Exist')</script>";
header("Location: estate.php");
	
}

else{
		
$insert1="INSERT INTO estate(abbriviation,estatename,county,town,agencyid) 
VALUES('$abbriviation','$estatename','$county','$town','$agencyid1')";


if(!mysqli_query($connect,$insert1)){
 echo "<script>alert('DB connection error')</script>";
}

echo "<script>alert('Submission Successfull')</script>";
header("Location: estate.php");
}


	} 
?>
