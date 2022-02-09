<?php
session_start();

$username= $_SESSION['username'];
if($_SESSION['username']==""){
header('location:./pages/index1.php');
}
else
{

	include('dbconnect.php');

	$select="SELECT * FROM agents WHERE username='$username'";

if(mysqli_query($connect,$select))
{
$result=mysqli_query($connect,$select);
while($row=mysqli_fetch_array($result))
{
	$agentid=$row['agentid'];
	$agencyid=$row['agencyid'];
	
$login_sessionid="00".$agentid;	
$login_sessionuser=$row['firstname']." ".$row['lastname'];	
$login_session ="00".$row['agentid']." ".$row['firstname']." ".$row['lastname'];
$agencyshortname=$row['agencyshortname']. "  Agency";
$agencyfullname=$row['agencyfullname'];


$select9a="SELECT logoname FROM logo where agencyid='$agencyid'";
$sel9a=mysqli_query($connect,$select9a);
	$row=mysqli_fetch_array($sel9a);		
			$logoname=$row['logoname'];
		
}}}?>