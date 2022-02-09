<?php
if(isset($_POST['submit-remove'])){
	include('../dbconnect.php');
                require('../adminsession.php');


	$propertyid=$_POST["propertyid"];	
	$unitid=$_POST["unitid"];	
	$tenantid=$_POST["tenantid"];	
	$removetype=$_POST["removetype"];	
	$todate=$_POST["todate"];	
	
$removetemp='temp';
	$removeperm='perm';
	$status='CHECKED-OUT';
	$status1='UNOCCUPIED';
	
	
	
		if($removetype==$removeperm){
		$delete1 = "DELETE FROM tenants WHERE propertyid = '$propertyid' AND unitid ='$unitid' AND idno ='$tenantid'";
if(!mysqli_query($connect,$delete1)){
echo "<script>alert('Failed to delete tenant details')</script>".mysqli_error($connect);
}

	$delete1a = "DELETE FROM tenantinvoices WHERE propertyid = '$propertyid' AND unitid ='$unitid' AND tenantid ='$tenantid'";
if(!mysqli_query($connect,$delete1a)){
echo "<script>alert('Failed to delete tenant invoices')</script>".mysqli_error($connect);
}

$delete1b = "DELETE FROM deposit WHERE propertyid = '$propertyid' AND unitid ='$unitid' AND idno ='$tenantid'";
if(!mysqli_query($connect,$delete1b)){
echo "<script>alert('Failed to delete tenant deposit')</script>".mysqli_error($connect);
}

$delete1c = "DELETE FROM balances WHERE propertyid = '$propertyid' AND unitid ='$unitid' AND tenantid ='$tenantid'";
if(!mysqli_query($connect,$delete1c)){
echo "<script>alert('Failed to delete tenant balances')</script>".mysqli_error($connect);
}



$delete1d = "DELETE FROM advancerent WHERE propertyid = '$propertyid' AND unitid ='$unitid' AND tenantid ='$tenantid'";
if(!mysqli_query($connect,$delete1d)){
echo "<script>alert('Failed to delete tenant advance rent')</script>".mysqli_error($connect);
}


$update6g = "UPDATE units SET status='$status1' WHERE propertyid = '$propertyid' AND unitid ='$unitid'"; 

if(!mysqli_query($connect,$update6g)){
echo "<script>alert('Failed to update Unit')</script>".mysqli_error($connect);
}

else{
	echo "<script>alert('Deteted Successfully')</script>";
	include('properties.php');
}


	}
	
	
		if($removetype==$removetemp){

$update6a = "UPDATE tenants SET status='$status',todate='$todate'  WHERE propertyid = '$propertyid' AND unitid ='$unitid' AND idno ='$tenantid'"; 

if(!mysqli_query($connect,$update6a)){
echo "<script>alert('Failed to update tenant')</script>".mysqli_error($connect);
}


$update6b = "UPDATE units SET status='$status1' WHERE propertyid = '$propertyid' AND unitid ='$unitid'"; 

if(!mysqli_query($connect,$update6b)){
echo "<script>alert('Failed to update Unit')</script>".mysqli_error($connect);
}


else{
	echo "<script>alert('Update Successfully')</script>";
	include('properties.php');
}


	}	


}


?>