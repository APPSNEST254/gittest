<?php

include('../dbconnect.php');
  
if(isset($_POST['submit-editestate'])){

$estatename=$_POST["estatename"];	
$county=$_POST["county"];	
$town=$_POST["town"];	
$abbriviation=$_POST["abbriviation"];	


$update6 = "UPDATE estate SET estatename='$estatename',county='$county',town='$town' WHERE abbriviation='$abbriviation'"; 

if(!mysqli_query($connect,$update6)){
echo "<font color='black'>Failed to update ESTATE</font> ".mysqli_error($connect);
}

else{
echo "<script>alert('Submission Successfull')</script>";
header("Location: estate.php");

}

	} 
?>
