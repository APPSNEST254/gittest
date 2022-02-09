<?php
include('../dbconnect.php');
  
if(isset($_POST['submit-removeestate'])){
	
	
	$estatename=$_POST["estatename"];	
$abbriviation=$_POST["abbriviation"];	
	
		$delete = "DELETE FROM estate WHERE estatename = '$estatename' AND abbriviation = '$abbriviation'";
if(!mysqli_query($connect,$delete)){
echo "<font color='red'>Failed to delete Estate</font> ".mysqli_error($connect);
}
else{
	echo "<script>alert('Deteted Successfully')</script>";
	include('estate.php');
}
	}
	
	?>