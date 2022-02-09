 <h5 class="card-header">ADD UNITS</h5>
							<div class="card-body">
					 <form role="form" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
					 
  <div class="row">
 <input class="form-control" type="hidden" name="propertyid1" value="<?php echo $propertyid;?>">
    <div class="col">
	<?php 
	$selcount="SELECT COUNT(unitid) AS totunits FROM units
WHERE propertyid='$propertyid'"; 

$selcount1=mysqli_query($connect,$selcount);
$row1=mysqli_fetch_array($selcount1);
$totunits=$row1['totunits'];
$j=$totunits +1 ;
	?>


	<div class="form-group">
                                                <label for="propertyname" class="col-form-label">Unit ID: </label>
												<input class="form-control" type="text" name="unitid1"  value="<?php echo $j;?>" required>
                                                
                                            </div>
	
	</div>
	
	 <div class="col">
	 
	<div class="form-group">
                                                 <label for="price1" class="col-form-label">Price</label>
												 <div class="input-group mb-3">
												 <div class="input-group-prepend"><span class="input-group-text">Ksh</span></div>
                                               <input type="number" class="form-control currency-inputmask" name="price1"  required >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            </div>
	</div>
	
    <div class="col">
								<div class="form-group">
								<label for="unittype" class="col-form-label">Unit Type: </label>
								 <select  name="unittype" class="form-control" required><option selected>SINGLE</option><option>BED SITTER</option>
								   <option>DOUBLE ROOM</option><option>ONE BED ROOM</option><option>TWO BED ROOM</option></select>
								</div>
								
								
								
								
	
  </div>
  
 			
			<div class="col">
								<div class="form-group">
								<label for="areasq1" class="col-form-label">Size (Feet<sup>2</sup>): </label>
								<input class="form-control" type="number" name="areasq1" value="200" max="1000"min="100" required>
								</div>
								</div>
											
		
		<div class="col">
								<div class="form-group">
								<label class="col-form-label"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								<input class="btn btn-success" type="submit" name="submit-addunits" value="Add Units">	
								</div>
		
		
		
		

  
  
  
  	
																
 
   
  
 

	
  </div>
  </form>
  
  
  
<?php





if(isset($_POST['submit-addunits'])){
	

if($_POST['propertyid1']==""|| $_POST['unitid1']==""){
	 echo"<script>alert('Invalid Unit')</script>";
}
else{

if(mysqli_connect_errno()){
	 echo"<script>alert('Failed to connect to database')</script>";

}


$propertyid1=$_POST["propertyid1"];
$unitid1=$_POST["unitid1"];
$unitcode1=$propertyid1.$unitid1;
$status='UNOCCUPIED';
$areasq1=$_POST["areasq1"];
$price1=$_POST["price1"];
$unittype=$_POST["unittype"];




$select1="SELECT unitid,propertyid,price,status FROM units WHERE propertyid='$propertyid1' and unitid ='$unitid1' ";
$selected=mysqli_query($connect,$select1);

if(mysqli_num_rows($selected)<>0){
	
	 echo"<script>alert('unit already exist')</script>";
	
	
}
else{
$insert="INSERT INTO units(unitcode,propertyid,unitid,type,status,areasq,price) 
VALUES('$unitcode1','$propertyid1','$unitid1','$unittype','$status','$areasq1','$price1')";

if(!mysqli_query($connect,$insert)){
 echo "<script>alert('Failed to send')</script>";
}
else{
 echo"<script>alert('successful')</script>";	
}
}

}}


?>
  
</div>
						
	        
           
            <!-- ============================================================== -->
            <!-- end add estate -->
            <!-- ============================================================== --> 
                        </div>