

<?php
if(isset($_POST['submit-signup'])){
      include('dbconnect.php');	
				 
$agencyfullname=$_POST["agencyfullname"];
$agencyshortname=$_POST["agencyshortname"];
$email=$_POST["email"];
$phoneno=$_POST["phoneno"];
$address=$_POST["adress"];
$address1=$_POST["adress1"];
$county=$_POST["county"];
$boxno=$_POST["boxno"];
$postalcode=$_POST["postalcode"];
$town=$_POST["town"];
$currency='79';
$username=$_POST["username"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$agencyfeetype=$_POST["agencyfeetype"];
$agencyfee=$_POST["agencyfee"];
$penaltyfeetype=$_POST["penaltyfeetype"];
$penaltyfee=$_POST["penaltyfee"];
$bankname=$_POST["bankname"];
$accountname=$_POST["accountname"];
$accountno=$_POST["accountno"];
$mpesamode=$_POST["mpesamode"];
$mpesabusinessno=$_POST["mpesabusinessno"];
$status='ACTIVE';
$level=1;
$regdate=date("y-m-d");
$password=MD5($_POST['password']);


$select9a="SELECT count FROM agencycounter";
$sel9a=mysqli_query($connect,$select9a);
	$row=mysqli_fetch_array($sel9a);		
			$agencyid1=$row['count'];
			$agencyid=$agencyid1+1;

$insert ="INSERT INTO agents(agencyid,agencyshortname,agencyfullname,email,phoneno,address,address1,county,box,postalcode,town,username,firstname,lastname,level,currency,password,regdate)
VALUES('$agencyid','$agencyshortname','$agencyfullname','$email','$phoneno','$address','$address1','$county','$boxno','$postalcode','$town','$username','$firstname','$lastname','$level','$currency','$password','$regdate')";

if(!mysqli_query($connect,$insert)){
 echo "<script>alert('DB connection error')</script>";

}

$insert2 ="INSERT INTO agencyfee(agencyid,agencyfeetype,agencyfee)
VALUES('$agencyid','$agencyfeetype','$agencyfee')";

if(!mysqli_query($connect,$insert2)){
 echo "<script>alert('DB connection error')</script>";

}

$insert3 ="INSERT INTO penaltyfee(agencyid,penaltyfeetype,penaltyfee)
VALUES('$agencyid','$penaltyfeetype','$penaltyfee')";

if(!mysqli_query($connect,$insert3)){
 echo "<script>alert('DB connection error')</script>";

}

if($mpesabusinessno==''){
	$insert4 ="INSERT INTO mpesa(agencyid,mpesamode,bisinessname)
VALUES('$agencyid','N/A','N/A')";

}
else{
$insert4 ="INSERT INTO mpesa(agencyid,mpesamode,bisinessname)
VALUES('$agencyid','$mpesamode','$mpesabusinessno')";
}
if(!mysqli_query($connect,$insert4)){
 echo "<script>alert('DB connection error')</script>";

}
if($accountname==''){
$insert4a ="INSERT INTO agencybank(agencyid,bankname,accountname,accountno)
VALUES('$agencyid','N/A','N/A','N/A')";	
}
else{
$insert4a ="INSERT INTO agencybank(agencyid,bankname,accountname,accountno)
VALUES('$agencyid','$bankname','$accountname','$accountno')";
}
if(!mysqli_query($connect,$insert4a)){
 echo "<script>alert('DB connection error')</script>";


}
$update = "UPDATE agencycounter SET count='$agencyid' WHERE count='$agencyid1'"; 
if(!mysqli_query($connect,$update)){
echo "<font color='red'>Failed to update counter</font> ".mysqli_error($connect);
}
else{

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["logo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["logo"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }


// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["logo"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
    //echo "The file ". htmlspecialchars( basename( $_FILES["logo"]["name"])). " has been uploaded.";
	echo "<script>alert('The file ". htmlspecialchars( basename( $_FILES["logo"]["name"])). " has been uploaded.')</script>";
	
$insert2 ="INSERT INTO logo(agencyid,logoname)
VALUES('$agencyid','$target_file')";
if(!mysqli_query($connect,$insert2)){
 echo "<script>alert('filed to send to DB')</script>";

}
	
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
echo "<script>alert('Submission Successfull')</script>";
header('location:login.php');


}


}




?>