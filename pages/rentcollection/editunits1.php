<?php
 include('../dbconnect.php');
                require('../adminsession.php');

if(isset($_POST['submit-editunit'])){



$propertyid=$_POST["propertyid"];	
$unitid1=$_POST["unitid"];
$areasq1=$_POST["areasq"];
$price1=$_POST["price1"];
$unittype=$_POST["unittype"];


	
$type=$_POST["type"];	
$estatename=$_POST["estatename"];	
$commission=$_POST["commission"];	
$depositto=$_POST["depositto"];	
$electricitydeposit=$_POST["electricitydeposit"];	
$waterdeposit=$_POST["waterdeposit"];	
$electricitybill=$_POST["electricitybill"];	
$waterbill=$_POST["waterbill"];	
$sanitationbill=$_POST["sanitationbill"];	
$firstname=$_POST["firstname"];
$suname=$_POST["suname"];
$email=$_POST["email"];
$phoneno=$_POST["phoneno"];
$address=$_POST["address"];
$boxno=$_POST["boxno"];
$town=$_POST["town"];
$postalcode=$_POST["postalcode"];
$bankname=$_POST["bankname"];
$accountname=$_POST["accountname"];
$accountno=$_POST["accountno"];



$selcount3a="SELECT COUNT(propertyid) AS idexist FROM property WHERE propertyid='$propertyid'";

$selcount4a=mysqli_query($connect,$selcount3a);
$row=mysqli_fetch_array($selcount4a);
$idexist=$row['idexist'];

if($idexist==1){
	
$update2a = "UPDATE property SET propertyname='$propertyname',type='$type',estatename='$estatename',commission='$commission',depositto='$depositto',
electricitydeposit='$electricitydeposit',waterdeposit='$waterdeposit',electricitybill='$electricitybill',waterbill='$waterbill',sanitationbill='$sanitationbill' WHERE propertyid='$propertyid'"; 

$update3a = "UPDATE landlord SET firstname='$firstname',lastname='$suname',email='$email',phoneno='$phoneno',address='$address',
box='$boxno',town='$town',postalcode='$postalcode',bankname='$bankname',accountname='$accountname',accountno='$accountno' WHERE propertyid='$propertyid'"; 



if(!mysqli_query($connect,$update2a)){
 echo "<script>alert('Failed to Updateproperty')</script>";
}
if(!mysqli_query($connect,$update3a)){
 echo "<script>alert('Failed to Update landlord landlord')</script>";
}


else{
	echo "<script>alert('Submission Successfull')</script>";
	include('properties.php');
}
}
if($idexist==0){
	echo "<script>alert('Property Does not Exist')</script>";
}
if($idexist>1){
	echo "<script>alert('Multiple Properties With This ID exist')</script>";
}	} 
?>

