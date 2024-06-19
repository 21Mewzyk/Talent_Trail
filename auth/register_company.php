<div id="modalUser" class="modal fade" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false" >
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="stepwizard" >
               <div class="stepwizard-row setup-panel">
                  <div class="stepwizard-step">
                     <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                     <p>General information</p>
                  </div>
                  <div class="stepwizard-step">
                     <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"><span style="margin-left:-0.4vh;">2</span></a>
                     <p>Company</p>
                  </div>
                  <div class="stepwizard-step">
                     <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"><span style="margin-left:-0.4vh;">3</span></a>
                     <p>Upload Documents</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-body">
            <form action="" class="form register_company" enctype="multipart/form-data">
               <div class="container" style="width:100%;">
                  <input type="hidden" name="account_type" value="<?= $type ?>">
                  <div class="row setup-content" id="step-1">
                     <div class="col-xs-12 ">
                        <div class="col-md-12">
                           <h3> Step 1</h3>
                           <br>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">First Name</label>
                              <input maxlength="100" required="required" class="form-control" placeholder="Enter First Name" type="text" name="fname" value="">
                           </div>
                         </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Last Name</label>
                              <input maxlength="100" required="required" class="form-control" placeholder="Enter Last Name" type="text" name="lname" value="">
                           </div>
                         </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Birthdate</label>
                              <input  required="required" class="form-control"  type="date" name="bday" value="" >
                           </div>
                         </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Age</label>
                              <input required="required" class="form-control" placeholder="Enter Age" type="text" name="age" value="">
                           </div>
                         </div>

                        <div class="col-md-4">
                           <div class="form-group">
                              <label class="control-label">Contact No.</label>
                              <input maxlength="11" required="required" class="form-control" placeholder="Enter Mobile Number" type="text" name="cnum" value="">
                           </div>
                         </div>
                        <div class="col-md-8">
                           <div class="form-group">
                              <label class="control-label">Home Address</label>
                              <input  required="required" class="form-control" placeholder="Enter Address" type="text" name="address" value="">
                           </div>
                         </div>
                        <div class="col-md-12">
                        <div class="form-group">
                           <label class="control-label">Upload One Valid ID. </label> <small>Supported Ext.(jpg,jpeg,png)</small>
                           <input  required="required" class="form-control"  type="file" name="valid_photo" value="" >
                         </div>
                         </div>


                        <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label">Email Address</label>
                           <input  required="required" class="form-control" placeholder="Enter Email" type="text" name="email" value="">
                        </div>
                      </div>
                        <div class="col-md-6">
                        <div class="form-group">
                           <label class="control-label">Password</label>
                           <input  required="required" class="form-control" type="password" name="password" value="">
                        </div>
                      </div>


                        </div>
                     <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" style="margin-top:2vh; width:25%; background-color:#112D4E; color:white;">Next</button>
                     </div>
                  </div>
               <div class="row setup-content" id="step-2">
                  <div class="col-xs-12">
                     <div class="col-md-12">
                        <h3> Step 2</h3>
                        <br>
                        <div class="col-md-12">
                        <div class="form-group">
                           <label class="control-label">Company name</label>
                           <input maxlength="100" required="required" class="form-control" placeholder="Enter Company Name" name="company_name" value="" type="text" >
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group">
                           <label class="control-label">Company address</label>
                           <input maxlength="100" required="required" class="form-control" name="company_address" placeholder="Company address"  value="" type="text" >
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group">
                           <label class="control-label">Company contact no.</label>
                           <input m name="company_cnum" placeholder="Company contact no." maxlength="11" required="required" class="form-control"   value="" type="text" >
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group">
                           <label class="control-label">Company position</label>
                           <input  required="required" class="form-control"  name="company_position" placeholder="Company position"  value="" type="text" >
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group">
                           <label class="control-label">Deparment</label>
                           <input class="form-control" type="text" name="deparment" placeholder="Department" required="required" value="">
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group">
                           <label for="jobarea_id" style="text-align:left;">Select Area:</label>
                           <select id="jobarea_id" class="form-control" name="jobarea_id" required>
                              <option value="" selected>Select Job Area</option>
                              <?php
                                 $sql = "SELECT * FROM tbl_jobareas";
                                 $result = mysqli_query($con, $sql);
                                 if ($result) {
                                     while ($row = mysqli_fetch_assoc($result)) {
                                 ?>
                              <option value="<?php echo $row['id']; ?>"><?php echo $row['Location']; ?></option>
                              <?php
                                 }
                                 }
                                 ?>
                           </select>
                        </div>
                      </div>
                        <button class="btn btn-primary prevBtn btn-lg pull-left" type="button" style="margin-top:2vh; width:25%; background-color:#112D4E; color:white;">Back</button>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" style="margin-top:2vh; width:25%; background-color:#112D4E; color:white;">Next</button>
                     </div>
                  </div>
               </div>
               <div class="row setup-content" id="step-3">
                  <div class="col-xs-12">
                     <div class="col-md-12">
                        <h3> Step 3</h3>
                        <h3>Requirements for Accreditation - All requirements must be submitted.</h3>
                        <br>

                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                           <label class="control-label">Letter of Intent</label>
                           <input  required="required" class="form-control"  type="file" name="letterofcontent" id="letterofcontent" value="" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <h5>Addressed to:</h5>
                          <h5>Ryan Lester Pallasigue</h5>
                          <h5>Offficer-in-charge</h5>
                        </div>
                        </div>
                        <br>

                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                           <label class="control-label">Certificate Of No Pending Case</label>
                           <input  required="required" class="form-control"  type="file" name="companyprofile" id="companyprofile" value="" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <h5>Make sure to upload high resolution profile.</h5>
                        </div>
                      </div>
                        <br>


                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                           <label class="control-label">BIR Certificate of Registration(BIR Form 2303)</label>
                           <input  required="required" class="form-control"  type="file" name="birform" id="birform" value="" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <h5>Make sure to upload your latest BIR Form.</h5>
                        </div>
                      </div>
                        <br>


                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                           <label class="control-label">Business Permit</label>
                           <input  required="required" class="form-control"  type="file" name="businesspermit" id="businesspermit" value="" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <h5>Make sure to upload your latest & Valid Business Permit.</h5>
                        </div>
                      </div>
                        <br>

                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                           <label class="control-label">SEC / DTI Permit</label>
                           <input  required="required" class="form-control"  type="file" name="secdtipermit" id="secdtipermit" value="" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <h5>SEC Registration (Corporation) / DTI Permit (Sole Proprietorship).</h5>
                        </div>
                      </div>
                        <br>


                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                           <label class="control-label">License</label>
                           <input  required="required" class="form-control"  type="file" name="licensepermit" id="licensepermit" value="" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <h5>If Local Agency, DOLE PRPA License.</h5>
                          <h5>If Cooperative, CDA Membership.</h5>
                          <h5>If Overseas Agency, POEA License.</h5>
                        </div>
                      </div>
                        <br>
                        <br>

                        <center><p class="terms">By clicking Agree & Join, you agree to the <span class="company_name">Talent Trail</span> <a onclick="showMOdalAgreement()">User Agreement</a> and <a onclick="showMOdalAgreement()">Privacy Policy</a>.</p></center>
                        <button class="btn btn-primary prevBtn btn-lg pull-left" type="button" style="margin-top:2vh; width:25%; background-color:#112D4E; color:white;">Back</button>
                        <button class="btn btn-primary  btn-lg pull-right" type="submit" style="margin-top:2vh; width:25%; background-color:#112D4E; color:white;">Agree & Join</button>
                     </div>
                  </div>
               </div>
               </div>
            </form>
         </div>
      </div>
    </div>
</div>