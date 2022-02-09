		
						 <!-- ============================================================== -->
                        <!-- start table 4  -->
                        <!-- ============================================================== -->
                                            <div class="tab-pane fade" id="card-pill-4" role="tabpanel" aria-labelledby="card-tab-4">
 <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                      
                                        <tbody>
                                       <?php
									   
									   $selectl9="SELECT * FROM landlord WHERE propertyid='$propertyid' ";
$sel9l=mysqli_query($connect,$selectl9);
	$row=mysqli_fetch_array($sel9l);		
			$landlordfname=$row['firstname'];
			$landlordlname=$row['lastname'];
			$landlordemail=$row['email'];
			$landlordphoneno=$row['phoneno'];
			$landlordbox=$row['box'];
			$landlordtown=$row['town'];
			$landlordpostalcode=$row['postalcode'];
			$landlordaddress=$row['address'];
			$landlordbankname=$row['bankname'];
			$landlordaccountname=$row['accountname'];
			$landlordaccountno=$row['accountno'];
			

		
										echo "
<tr><td>First Name: </td> <td style='color:black;' >".$landlordfname."</td><td>Last Name: </td> <td style='color:black;' >".$landlordlname."</td></tr>
<tr><td>Email: </td> <td style='color:black;' >".$landlordemail."</td><td>Phone No: </td> <td style='color:black;' >0".$landlordphoneno."</td></tr>
<tr><td>P.O Box: </td> <td style='color:black;' >".$landlordbox."</td><td>Town: </td> <td style='color:black;' >".$landlordtown."</td></tr>
<tr><td>Postal Code: </td> <td style='color:black;' >".$landlordpostalcode."</td><td>Phone No: </td> <td style='color:black;' >".$landlordaddress."</td></tr>
<tr><td colspan='4'>Bank Details </td> </tr>
<tr><td>Bank Name: </td> <td style='color:black;' >".$landlordbankname."</td><td>Account Name: </td> <td style='color:black;' >".$landlordaccountname."</td></tr>
<tr><td>Account No: </td> <td style='color:black;' >".$landlordaccountno."</td><td> </td> <td style='color:black;' ></td></tr>";

?>	
                                          
									
				
				
											  
										</tbody>
                                        
										
                                      
                                    </table>
                                </div>                                             
                                </div>     
