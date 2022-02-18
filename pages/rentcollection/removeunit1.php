<?php
if(isset($_POST['submit-remove'])){
	include('../dbconnect.php');
                


    $propertyid=$_POST["propertyid"];	
	$unitid=$_POST["unitid"];	


    $delete1 = "DELETE FROM units WHERE propertyid = '$propertyid' AND unitid ='$unitid' ";
    if(!mysqli_query($connect,$delete1)){
    echo "<script>alert('Failed to delete unit )</script>".mysqli_error($connect);
    }
    else{
        echo "<script>alert('Deteted Successfully')</script>";
        include('properties.php');
    }
}