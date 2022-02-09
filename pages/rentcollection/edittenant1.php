<?php



if(isset($_POST['submit-edittenant'])){

$title=$_POST["title"];
$firstname=$_POST["firstname"];
$suname=$_POST["suname"];
$middlename=$_POST["middlename"];
$email=$_POST["email"];
$idno=$_POST["idno"];
$mobileno=$_POST["mobileno"];
$altmobileno=$_POST["altmobileno"];
$propertyid=$_POST["propertyid"];
$unitid=$_POST["unitid"];
$occupation=$_POST["occupation"];
$company=$_POST["company"];







	    include('../dbconnect.php');
                require('../adminsession.php');
	
	
if(mysqli_connect_errno()){
	 echo"<script>alert('Failed to connect to database')</script>";

}



$update6 = "UPDATE tenants SET title='$title',firstname='$firstname',suname='$suname',middlename='$middlename',email='$email',mobileno='$mobileno',altno='$altmobileno',occupation='$occupation',company='$company' WHERE propertyid='$propertyid'AND   unitid='$unitid' AND idno='$idno'"; 

if(!mysqli_query($connect,$update6)){
echo "<font color='black'>Failed to update tenant</font> ".mysqli_error($connect);
}

else{
echo "<script>alert('Submission Successfull')</script>";
 header('location:properties.php');


}




	

} 
?>