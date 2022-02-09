

 
<?php    
 if(isset($_POST['submit'])){
	  $storedname=$_SESSION['$username']=$_POST['user'];
   $username=$_POST['user'];
  $password=md5($_POST['pass']);
  


  
 include('dbconnect.php');

// Check connection
if (mysqli_connect_errno($connect))
  {
  echo "Failed to connect to MySQL:";
  }

    if($username =='')  
    {  
        //javascript use for input checking  
        echo"<script>alert('Please enter username')</script>";  
exit();//this use if first is not work then other will not show  
    }  
  
    if($password=='')  
    {  
	 
        echo"<script>alert('Please enter the password')</script>";  
exit();  
    } 
  
  //querying the database
  
   
    $user3=mysqli_query($connect,"SELECT username FROM agents WHERE username='$username'");
  $password3=mysqli_query($connect,"SELECT password FROM agents WHERE password='$password' AND username='$username' ");
  
  
  //fetching the values from the database
 
 
 
 $user3_fetched=mysqli_fetch_array($user3);
  $password3_fetched=mysqli_fetch_array($password3); 
  
    
  //check if values from user match with values in database
  

   
  if( $user3_fetched["username"]==$username && $password3_fetched["password"]==$password){
	 	session_start();
$_SESSION['username']= $storedname;
  {
header ('location:../index.php');
  }
  
  }
   
  else 
  {
    echo"<script>alert('incorect credential')</script>";
	
 }
      
 }
?>  

