<?php
 include('../dbconnect.php');
               

if(isset($_POST['submit-editunit'])){



$propertyid1=$_POST["propertyid"];	
$unitid1=$_POST["unitid"];
$areasq1=$_POST["areasq1"];
$price1=$_POST["price1"];
$unittype=$_POST["unittype"];
$features=$_POST["features"];

	




$selcount3a="SELECT COUNT(unitid) AS idexist FROM units WHERE propertyid='$propertyid1' AND unitid='$unitid1'";

$selcount4a=mysqli_query($connect,$selcount3a);
$row=mysqli_fetch_array($selcount4a);
$idexist=$row['idexist'];

if($idexist==1){
	
$update2a = "UPDATE units SET price='$price1',type='$unittype',areasq='$areasq1',features='$features' WHERE propertyid='$propertyid1' AND unitid='$unitid1'"; 



if(!mysqli_query($connect,$update2a)){
 echo "<script>alert('Failed to Update unit')</script>";
}




else{
	echo "<script>alert('Submission Successfull')</script>";
	include('properties.php');
}
}
if($idexist==0){
	echo "<script>alert('Unit Does not Exist')</script>";
}
if($idexist>1){
	echo "<script>alert('Multiple Units With This ID exist')</script>";
}	} 
?>

