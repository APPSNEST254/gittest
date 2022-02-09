
<?php
include('../dbconnect.php');
                require('../adminsession.php');

if(isset($_POST['submit-addproperty'])){

$propertyname=$_POST["propertyname"];	
$propertyid=$_POST["propertyid"];	
$agencyid=$_POST["agencyid"];	
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
$regdate=date("y-m-d");	
$status='ACTIVE';	




$selcount3a="SELECT COUNT(propertyid) AS idexist FROM property WHERE propertyid='$propertyid'";

$selcount4a=mysqli_query($connect,$selcount3a);
$row=mysqli_fetch_array($selcount4a);
$idexist=$row['idexist'];

if($idexist < 1){
	
	
$insert2="INSERT INTO property(propertyid,propertyname,type,estatename,commission,depositto,electricitydeposit,waterdeposit,electricitybill,waterbill,sanitationbill,regdate,agencyid,status) 
VALUES('$propertyid','$propertyname','$type','$estatename','$commission','$depositto','$electricitydeposit','$waterdeposit','$electricitybill','$waterbill','$sanitationbill','$regdate','$agencyid','$status')";

$insert3="INSERT INTO landlord(propertyid,firstname,lastname,email,phoneno,address,box,town,postalcode,bankname,accountname,accountno,regdate) 
VALUES('$propertyid','$firstname','$suname','$email','$phoneno','$address','$boxno','$town','$postalcode','$bankname','$accountname','$accountno','$regdate')";

$update2a = "UPDATE propertycounter SET propertyid='$propertyid'"; 

if(!mysqli_query($connect,$insert2)){
 echo "<script>alert('Failed to Add property')</script>";
}
if(!mysqli_query($connect,$insert3)){
 echo "<script>alert('Failed to Add landlord')</script>";
}
if(!mysqli_query($connect,$update2a)){
 echo "<script>alert('Failed to Update Counter')</script>";
}


else{
	echo "<script>alert('Submission Successfull')</script>";
	header('location:properties.php');
}
}
else{
echo "<script>alert('PropertId Alrteady Exist')</script>";

}	} 
?>

