	
						<!--   ########## Start pay invoice Modal##########-->
 <div class="modal fade" <?php echo "id='agreementform".$idno."'>";?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Tenancy Agreement Form</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                        
  <div class="card-body border-top" id='tenancyagreement'>
                               
                                    
			<?php			
	
echo"<style>
.td1{color:black;}
 table{margin:auto;}
</style>";
$leo=date("d-M-Y");

 //reading the values from the database tables
echo"<div  style='width:95%;'>";
echo"<table style='width:600px; border: 1px solid white; class='table table-bordered table-hover table-striped'>";
echo"<tr>";
echo"<table style='width:100%;'>
<tr><td><img src='../uploads/b2.png' width='100%'></td></tr></table>";
echo"</tr><hr>";

echo"<tr>";
echo"<table style='width:100%;'>
<tr><td> <center><h3><u> TENANCY AGREMENT FORM</u><h3></center></td></tr></table>";
echo"</tr>";

echo"<tr>";
echo"<table style='width:100%;' class='table table-bordered table-hover table-striped'>
<tr><td> DATE:</td><td><u>".$leo."</u></td></tr></table>";
echo"</tr>";

echo"<tr>";
echo"<table style='width:100%;' class='table table-bordered table-hover table-striped'>
<tr><td> HOUSE NUMBER:</td><td><u>".$propertyname."</u></td><td> HOUSE NUMBER:</td><td><u>".$propertyid."</u></td><td> UNIT NO:</td><td><u>".$unitid."</u></td></tr></table>";
echo"</tr>";
echo"<tr>";
echo"<table style='width:100%;' class='table table-bordered table-hover table-striped'>
<tr><td> TENANT NAME:</td><td colspan='3'><u>".$name."</u></td></tr>
<tr> </td> <td>STUDENT REG NUMBER:</td><td>____________________</td> <td> ID NUMBER:</td><td><u>".$idno."</u> </td></tr>
<tr><td>PHONE NUMBER:</td><td><u>+254".$mobileno."</u></td><td>ALT PHONE NO:</td><td>____________________</td> </tr>
<tr> <td>OCCUPATION:</td><td><u>".$occupation."</u></td> <td>COMPANY/INSTITUTION:</td><td><u>".$company."</u></td> </tr>
<tr><td>CHECKED IN DATE:</td><td><u>".$fromdate."</u></td><td>VACATION DATE:</td><td><u>".$todate."</u></td></tr>
<tr><td colspan='2'> OTHER OCCUPANT NAME:</td><td colspan='2' >_______________________________</td> </tr>
<tr><td>PHONE NO:</td><td>____________________</td>  <td>ALT PHONE NO:</td><td><u>____________________</td></tr>
</table>";
echo"</tr>";

echo"</table>";
include('rules.html');
echo"</div>";

echo"<a href='#' onclick='printInfo(this)'>Print</a> CLICK HERE TO GO <a href='viewtenants.php' target='iframe_f'>BACK</a>";
echo"</div>";

			?>
  
  
    </div>
                                                            <div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																        <button type="button" class="btn btn-primary" onclick="printDiv('tenancyagreement')">Print Agreement Form</button>
																</form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

    </div>
	<!--   ########## End pay invoice Modal##########-->