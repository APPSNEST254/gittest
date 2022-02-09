 <?php 
 
include('../dbconnect.php');
                require('../adminsession.php');
if(isset($_POST['submit'])){
$month=$_POST["mon"];	


$select="SELECT units.price,units.unitid,tenants.firstname,tenants.middlename,tenants.suname,tenants.idno
FROM tenants
LEFT JOIN units
ON units.unitid = tenants.unitid and units.propertyid=tenants.propertyid  WHERE tenants.propertyid ='$propertyid'";

if(mysqli_query($connect,$select))
{

$result=mysqli_query($connect,$select);

while($row=mysqli_fetch_array($result)){

$unitid=$row['unitid'];
$tenantid=$row['idno'];
$rent=$row['price'];
$invoiceno=$row['price'];
$invoiceno= $propertyid . $unitid . $mon; 
	$le=Date("Y-m-d");
	
$insert="INSERT INTO tenantinvoices(invoiceno,propertyid,unitid,tenantid,duedate,month,rent) 
VALUES('$invoiceno','$propertyid','$unitid','$tenantid','$le','$mo','$rent')";

if(!mysqli_query($connect,$insert)){
echo "<font color='black'>Failed to send</font> ".mysqli_error($connect);
}

}}
else{
	
	header('location:invoices.php');
}}
else{
	
	header('location:invoices.php');
}
?>