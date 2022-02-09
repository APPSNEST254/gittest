 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Generate New Month Invoices</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                         <form name="generateinvoices" method="post" action="genlandlordinvoices.php" role="form" >
  <div class="card-body border-top">
                                    <input hidden type="text"  name="propertyid" value="<?php echo $propertyid; ?>" required />
                                    <input hidden type="number"  name="totalunits" value="<?php echo $totalunits; ?>" required />
                                    <input hidden type="number"  name="vacantunits" value="<?php echo $unoccupied; ?>" required />
                                    <input hidden type="number"  name="occupiedunits" value="<?php echo $occupied; ?>" required />
                                    <input hidden type="number"  name="bookedunits" value="<?php echo $booked; ?>" required />
                                    
                                    <h5>Select Month</h5>
                                         <div class="form-group">
                                        <div class="input-group date" id="datetimepicker11"  data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="mon" data-target="#datetimepicker11" required />
                                            <div class="input-group-append" data-target="#datetimepicker11" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
									
									
									<h5>Due Date</h5>
                                   <div class="form-group">
                                        <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="datedue1" data-target="#datetimepicker4" required/>
                                            <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div></div>
                                                            <div class="modal-footer">
                                                                
																<input type="Close" class="btn btn-secondary" data-dismiss="modal" value="Close">
																<input class="btn btn-primary" type="submit" name="submit-invoice" value="Generate">
																</form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>