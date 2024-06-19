<div id="modalUser" class="modal fade" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="stepwizard">
               <div class="stepwizard-row setup-panel">
                  <div class="stepwizard-step">
                     <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                     <p>General information</p>
                  </div>
                  <div class="stepwizard-step">
                     <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"><span style="margin-left:-0.4vh;">2</span></a>
                     <p>Educational Background</p>
                  </div>
                  <!-- Removed Step 3 -->
                  <div class="stepwizard-step">
                     <a href="#step-3" type="button" class="btn btn-default btn-circle"  disabled="disabled"><span style="margin-left:-0.4vh;">3</span></a>
                     <p>Account</p> <!-- Renamed Step 4 to become Step 3 -->
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-body">
            <div class="container" style="width:100%;">
               <form action="" class="form register_account" enctype="multipart/form-data">
                  <?php
                     $select_departments = mysqli_query($con,"SELECT `department` FROM `tbl_company` GROUP BY `department`");    
                     ?>
                  <input type="hidden" name="account_type" value="<?= $type ?>">
                  <div class="row setup-content" id="step-1">
                     <div class="col-xs-12 ">
                        <div class="col-md-12">
                           <h3> Step 1</h3>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label class="control-label">First Name</label>
                              <input maxlength="100" required="required" class="form-control" placeholder="Enter First Name" type="text" name="fname" value="">
                           </div>
                         </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <label class="control-label">Middle Name</label>
                              <input maxlength="3" required="required" class="form-control" placeholder="M.I" type="text" name="middle_name" value="">
                              <small> (Ex: A.,B.,C., Etc.)</small>
                           </div>
                         </div>

                        <div class="col-md-4">
                           <div class="form-group">
                              <label class="control-label">Last Name</label>
                              <input maxlength="100" required="required" class="form-control" placeholder="Enter Last Name" type="text" name="lname" value="">
                           </div>
                         </div>

                        <div class="col-md-2">
                           <div class="form-group">
                              <label class="control-label">Suffix</label>
                              <input maxlength="3" class="form-control" placeholder="Suffix" type="text" name="suffix" value="">
                              <small> (Ex: Sr.,Jr.,III, Etc.)</small>
                           </div>
                         </div>

                        <div class="col-md-4">
                           <div class="form-group">
                              <label class="control-label">Birhdate</label>
                              <input  required="required" class="form-control"  type="date" name="bday" value="" >
                           </div>
                         </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label class="control-label">Age</label>
                              <input required="required" class="form-control" placeholder="Enter Age" type="text" name="age" value="">
                           </div>
                         </div>

                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="gender" style="text-align:left;">Sex:</label>
                              <select id="gender" class="form-control" name="gender" required>
                                 <option value="" selected>Select Gender</option>
                                 <option value="Male">Male</option>
                                 <option value="Female">Female</option>
                              </select>
                           </div>
                         </div>


                        <div class="col-md-4">
                           <div class="form-group">
                              <label class="control-label">Contact No</label>
                              <input maxlength="11" required="required" class="form-control" placeholder="Enter Mobile Number" type="text" name="cnum" value="">
                           </div>
                         </div>

                        <div class="col-md-4">
                           <div class="form-group">
                              <label class="control-label">Religion</label>
                              <input maxlength="255" required="required" class="form-control" placeholder="Enter Religion" type="text" name="religion" value="">
                           </div>
                         </div>

                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="gender" style="text-align:left;">Civil Status:</label>
                              <select id="gender" class="form-control" name="civil_status" required>
                                 <option value="" selected>Select Status</option>
                                 <option value="Single">Single</option>
                                 <option value="Married">Married</option>
                                 <option value="Widowed">Widowed</option>
                              </select>
                           </div>
                         </div>
                         <!--
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="control-label">Home Address</label>
                              <input  required="required" class="form-control" placeholder="Enter Address" type="text" name="address" value="">
                           </div>
                         </div>-->


                        <div class="col-md-4">
                           <div class="form-group">
                              <label class="control-label">House No. / Street Village</label>
                              <input maxlength="255" required="required" class="form-control" placeholder="Ex. #489 Gearlan" type="text" name="address1" value="">
                           </div>
                         </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <label class="control-label">Barangay</label>
                              <input maxlength="255" required="required" class="form-control" placeholder="Brgy" type="text" name="address2" value="">
                           </div>
                         </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label class="control-label">Municipality / City</label>
                              <input maxlength="255" required="required" class="form-control" placeholder="Municipality / City" type="text" name="address3" value="">
                           </div>
                         </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label class="control-label">Province</label>
                              <input maxlength="255" required="required" class="form-control" placeholder="Ex. NCR" type="text" name="address4" value="">
                           </div>
                         </div>


                        <div class="col-md-10">
                           <div class="form-group">
                              <label class="control-label">Tin Number</label>
                              <input maxlength="255" required="required" class="form-control" placeholder="Enter Tin Number" type="text" name="tin_number" value="">
                           </div>
                         </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <label class="control-label">Height</label>
                              <input maxlength="50" required="required" class="form-control" placeholder="Height (cm)" type="text" name="height" value="">
                           </div>
                         </div>

                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="gender" style="text-align:left;">Disability:</label>
                              <select id="gender" class="form-control" name="disability1">
                                 <option value="" selected>Select Disability</option>
                                 <option value="Visual">Visual</option>
                                 <option value="Speech">Speech</option>
                                 <option value="Mental">Mental</option>
                                 <option value="Hearing">Hearing</option>
                                 <option value="Physical">Physical</option>
                              </select>
                           </div>
                         </div>
                        <div class="col-md-8">
                           <div class="form-group">
                              <label class="control-label">(Other Disability) Please specify: </label>
                              <input maxlength="255" class="form-control" placeholder="Specify Disability" type="text" name="disability2" value="">
                           </div>
                         </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="control-label">Upload One Valid ID </label><small> Supported Ext.(jpg,jpeg,png)</small>
                              <input  required="required" class="form-control"  type="file" name="valid_photo" value="" >
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
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="control-label">Degree Title</label>
                              <input maxlength="100" required="required" class="form-control" placeholder="Enter Degree Title" name="degree_title" value="" type="text" >
                           </div>
                         </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="control-label">Name of School</label>
                              <input maxlength="100" required="required" class="form-control" name="school_name" placeholder="Name of School"  value="" type="text" >
                           </div>
                         </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="control-label">Address</label>
                              <input m name="school_address" placeholder="Address" maxlength="11" required="required" class="form-control"   value="" type="text" >
                           </div>
                         </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="control-label">Years attended</label>
                              <input  required="required" class="form-control"  name="school_year_attended" placeholder="Years attended"  value="" type="text" >
                           </div>
                         </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="control-label">Achievement Relevant</label>
                              <input  required="required" class="form-control"  name="achievement" placeholder="Achievement Relevant"  value="" type="text" >
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
                  
                     </div>
                  </div>
                  <div class="row setup-content" id="step-3">
                     <div class="col-xs-12">
                        <div class="col-md-12">
                           <h3> Step 4</h3>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="control-label">Email</label>
                              <input  required="required" class="form-control" placeholder="Enter Email" type="text" name="email" value="">
                           </div>
                         </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="control-label">Password</label>
                              <input  required="required" class="form-control" type="password" name="password" value="">
                           </div>
                         </div>
                         <br>
                        <br>
                         <center>
                           <p class="terms">By clicking Agree & Join, you agree to the <span class="company_name">Talent Trail</span> <a onclick="showMOdalAgreement()">User Agreement</a> and <a onclick="showMOdalAgreement()">Privacy Policy</a>.</p>
                           </center>
                           <button class="btn btn-primary prevBtn btn-lg pull-left" type="button" style="margin-top:2vh; margin-bottom:2vh; width:25%; background-color:#112D4E; color:white;">Back</button>
                           <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit"  name="register_company" style="margin-top:2vh; margin-bottom:2vh; width:25%; background-color:#112D4E; color:white;">Agree & Join</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         </div>
      </div>
   </div>
</div>