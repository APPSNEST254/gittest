 <?php
include('../dbconnect.php');
                require('../adminsession.php');
if(isset($_POST['submit-remove'])){


	
	$removeproperty=$_POST["removeproperty"];	
$propertyid=$_POST["propertyid1a"];	
$rev1='temp';
$rev2='perm';
$status1='REMOVED';


	if($removeproperty==$rev2){
		$delete = "DELETE FROM property WHERE propertyid = '$propertyid'";
if(!mysqli_query($connect,$delete)){
echo "<script>alert('Failed to delete property')</script>".mysqli_error($connect);
}
else{
	echo "<script>alert('Deteted Successfully')</script>";
	include('properties.php');
}


	}

	if($removeproperty==$rev1){

$update6 = "UPDATE property SET status='$status1' WHERE propertyid='$propertyid'"; 

if(!mysqli_query($connect,$update6)){
echo "<script>alert('Failed to update property')</script>".mysqli_error($connect);
}
else{
	echo "<script>alert('Update Successfully')</script>";
	include('properties.php');
}


	}	
}
?>