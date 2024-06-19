<?php
   session_start();
   
   require_once '../vendor/autoload.php';
   require_once '../config.php';
   require_once '../functions.php';
   require_once '../session.php';
   
   
   if(!$islogin){
       navigate("../");
   }
   
   
   if(!form("page") && value("page") !== ""){
       navigate("./?page=general_information");
   }else{
       $page = value("page");
       if($page=="general_information"){
           if(form("step") && value("step") == "1"){
   
               if(isset($_SESSION["random_id"])){
                   $session = $_SESSION["random_id"];
               }else{
                   $session = randomid();
                   $_SESSION["random_id"] = $session;
               }
   
               $session = '';
               if(isset($_SESSION["request_id"])){
                   $session = $_SESSION["request_id"];
               }
               // echo '<script>alert('.$session.')</script>';
               $check_session=  mysqli_query($con,"SELECT *, now() - created_at AS expired_at FROM `tbl_verificationcode` WHERE `session` = '$session' HAVING expired_at < 300 ");
               if(hasResult($check_session)){
                   $already_sent = true;
               }else{
   
                   // $generated_code = rand(100000,999999);
               
                   // $sms_message = "AccessiblePath \nVerification code: $generated_code";
                
                   // clicksend_sms($u_cnum,$sms_message);
                   $checkBalance = moviderGetBalance($con,$u_id);
                   if($checkBalance){
                       $details = [
                           "to" => $u_cnum,
                       ];
                       $moviderSendVerify = moviderSendVerify($con,$u_id,$details);
   
                   }
                   // $sms_log = mysqli_query($con,"
                   //     INSERT INTO `tbl_sms_logs`(
                   //         `receiverid`,
                   //         `message`
                   //     )
                   //     VALUES(
                   //         $u_id,
                   //         '$sms_message'
                   //     )
                   // ");
   
                   // $create_new_session = mysqli_query($con,"
                   //     INSERT INTO `tbl_verificationcode`(
                   //         `session`,
                   //         `code`
                   //     )
                   //     VALUES(
                   //         '$session',
                   //         '$generated_code'
                   //     )
                   // ");
   
                   $already_sent = false;
               }
           }else{
               $already_sent = false;
           }
       }
   }
   
   
   $job_area_id = $_SESSION['data']['job_area_id'];
   $job_area_logo = "";
   $job_area_title = "";
   $job_area_location = "";
   $sql2 = "SELECT * FROM tbl_jobareas WHERE id = '$job_area_id'";
   $result2 = mysqli_query($con, $sql2);
       if ($result2) {
           while ($row2 = mysqli_fetch_assoc($result2)) {
               $job_area_logo = $row2['logo_area'];
               $job_area_title = $row2['title_area'];
               $job_area_location = $row2['Location'];
       }
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy">
        <meta http-equiv="X-Content-Type-Options" content="nosniff">
        <meta http-equiv="X-Frame-Options" content="DENY">
        <meta http-equiv="X-XSS-Protection" content="1; mode=block">
        <meta http-equiv="Strict-Transport-Security" content="max-age=31536000; includeSubDomains; preload">
        <meta http-equiv="Referrer-Policy" content="no-referrer-when-downgrade">
        <meta http-equiv="Feature-Policy" content="geolocation 'self'; camera 'none'">
      <link rel="icon" href="../assets/logo.png" >
      <title>Talent Trail - PROFILE</title>
      <!-- js -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" defer></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
      <script src="./js/index.js" defer></script>
      <script src="./js/update_general.js" defer></script>
      <script src="./js/update_account.js" defer></script>
      <script src="./js/update_password.js" defer></script>
      <script src="./js/send_verification_code.js" defer></script>
      <script src="./js/resume_account.js" defer></script>
      <!-- css -->
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="./styles.css">
      <link rel="stylesheet" href="../verify.css">
      <link rel="stylesheet" href="../header.css">
      <link rel="stylesheet" href="../notify_style.css">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
      <style>
         .btn_upload_picture2 {
         width: 100%;
         font-size: 3rem;
         color: #673DE6 !important;
         cursor: pointer;
         height: 50px;
         border: 1px dashed #673DE6;
         border-radius: .5rem;
         text-align: center;
         display: flex;
         padding: 1rem;
         justify-content: center;
         align-items: center;
         gap: 1rem;
         }input[type="text"],
         input[type="password"],
         input[type="email"],
         input[type="file"],
         input[type="number"],
         textarea {
         border-radius: 5px; /* Adjust the value as needed */
         }
      </style>
   </head>
   <body>
      <div class="main">
         <?php include '../header2.php' ?>
         <div class="body">
            <div class="sidebar">
               <div class="container_body">
                  <div class="image_center_body">
                     <center> <img src="../assets/images/<?= $u_avatar ?>" class="company_logo_preview profile_picture" style="border:1px solid gray"></center>
                  </div>
                  <input type="file" name="input_upload_field" id="input_upload_field" class="input_upload_field" data-set="avatar" accept="image/*">
                  <label for="input_upload_field" class="btn_upload_picture2" style="font-size:2vh; width:5vh; border-radius:50%; position: absolute; margin-top:-4vh; margin-left:9%; background-color:gray;">
                  <i style="color:white;" class="fa fa-edit"></i>
                  </label>
               </div>
               <br>
               <br>
               <a href="?page=general_information" <?= (value("page") == "general_information") ? 'class="active"' : "" ?>>
                  <i style="margin-top:-1.8vh" class="fa fa-user"></i>
                  <p class="name">Account Information</p>
               </a>
               <a href="?page=resume" <?= (value("page") == "resume") ? 'class="active"' : "" ?>>
                  <i style="margin-top:-1.8vh" class="fa fa-file-text-o"></i>
                  <p class="name">My Resume</p>
               </a>
               <a href="?page=password" <?= (value("page") == "password") ? 'class="active"' : "" ?>>
                  <i style="margin-top:-1.8vh" class="fa fa-gear"></i>
                  <p class="name">Settings</p>
               </a>
            </div>
            <div class="showcase">
               <div class="content box_<?= $page ?>">
                  <?php if($page == "general_information"){?>
                  <?php if(form("sub") && value("sub") !== "" && value("sub") == "verified"){?>
                  <?php if(form("step") && value("step") == "1" && $u_verification_state == 0){?>
                  <div class="container">
                     <div class="container_title">
                        Step 1, Verify your email/mobile number.
                     </div>
                     <div class="container_body">
                        <?php if($already_sent){?>
                        <p>We already sent a verification code to your email (<?= $u_email ?>) and mobile number (<?= $u_cnum ?>).</p>
                        <?php }else{ ?>
                        <p>We sent a verification code to your email (<?= $u_email ?>) and mobile number (<?= $u_cnum ?>).</p>
                        <?php }?>
                        <br>
                        <form method="post" class="frm_<?= $page ?>_verify" autocomplete="off">
                           <div class="field">
                              <label for="tb_code">Verfication code </label>
                              <input type="number" name="tb_code" id="tb_code" placeholder="Combination of 6 Digits">
                           </div>
                           <button class="button btn_submit">
                           CONTINUE
                           </button>
                        </form>
                     </div>
                  </div>
                  <?php }elseif(form("step") && value("step") == "2"){?>
                  <?php }else{?>
                  <?php if($u_verification_state == 0){?>
                  <div class="container">
                     <div class="container_title">
                        Step 1, Verify your email/mobile number.
                     </div>
                     <div class="container_body">
                        <a href="?page=general_information&sub=verified&step=1">Send to my email (<?= $u_email ?>) and mobile number (<?= $u_cnum ?>) the verification code.</a>
                     </div>
                  </div>
                  <?php }elseif($u_verification_state == 1){?>
                  <div class="container">
                     <div class="container_title">
                        Step 2, Upload your resume.
                     </div>
                     <div class="container_body">
                        <a href="?page=resume">Upload your resume, We use your resume to confirm your account. CONTINUE</a>
                     </div>
                  </div>
                  <?php }elseif($u_verification_state == 2){?>
                  <div class="container">
                     <div class="container_title">
                        Step 3, Finish
                     </div>
                     <div class="container_body">
                        <p>You are now fully verified</p>
                     </div>
                  </div>
                  <?php }else{ navigate("?page=general_information"); }?>
                  <?php }?>
                  <?php }else{?>
                  <div class="row">
                     <div class="col-md-6 col-xs-12">
                        <div class="container">
                           <div class="container_title">
                              Personal information
                           </div>
                           <div class="container_body">
                              <form method="post" class="frm_<?= $page ?>">
                                 <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                       <label for="tb_firstnmae">First name</label>
                                       <div class="field">
                                          <input type="text" name="tb_firstname" id="tb_firstname" placeholder="First name" value="<?= $u_fname ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-2 col-xs-12">
                                       <label for="tb_firstnmae">M.I.</label>
                                       <div class="field">
                                          <input type="text" name="middle_name" id="middle_name" placeholder="First name" value="<?= $data["middle_name"] ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                       <label for="tb_lastname">Last name</label>
                                       <div class="field">
                                          <input type="text" name="tb_lastname" id="tb_lastname" placeholder="Last name" value="<?= $u_lname ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-2 col-xs-12">
                                       <label for="tb_firstnmae">Suffix</label>
                                       <div class="field">
                                          <input type="text" name="suffix" id="suffix" placeholder="Suffix" value="<?= $data["suffix"] ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                       <label for="tb_age">Age</label>
                                       <div class="field">
                                          <input type="number" name="tb_age" id="tb_age" placeholder="Age" value="<?= $u_age ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                       <label for="tb_bday">Birthday</label>
                                       <div class="field">
                                          <input type="date" name="tb_bday"  id="tb_bday" value="<?= $u_bday ?>">
                                       </div>
                                    </div>

                                    <div class="col-md-4 col-xs-12">
                                          <label for="gender" style="text-align:left;">Sex:</label>
                                       <div class="field">
                                          <select id="gender" name="gender">
                                             <option value="Male" <?php if($data["gender"] == "Male"){ echo "selected"; } ?>>Male</option>
                                             <option value="Female" <?php if($data["gender"] == "Female"){ echo "selected"; } ?>>Female</option>
                                          </select>
                                       </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-5">
                                          <label class="control-label">Religion</label>
                                       <div class="field">
                                          <input maxlength="255" required="required"  placeholder="Enter Religion" type="text" name="religion" value="<?= $data["religion"] ?>">
                                       </div>
                                     </div>

                                    <div class="col-md-4">
                                          <label for="gender" style="text-align:left;">Civil Status:</label>
                                       <div class="field">
                                          <select id="gender" name="civil_status" required>
                                             <option value="Single" <?php if($data["civil_status"] == "Single"){ echo "selected"; } ?>>Single</option>
                                             <option value="Married" <?php if($data["civil_status"] == "Married"){ echo "selected"; } ?>>Married</option>
                                             <option value="Widowed" <?php if($data["civil_status"] == "Widowed"){ echo "selected"; } ?>>Widowed</option>
                                          </select>
                                       </div>
                                     </div>

                                    <div class="col-md-3">
                                        <label class="control-label">Height</label>
                                       <div class="field">
                                          <input maxlength="50" required="required" placeholder="Height (cm)" type="text" name="height" value="<?= $data["height"] ?>">
                                       </div>
                                    </div>
                                 </div>

                                 <div class="row">
                                    <div class="col-md-6">
                                          <label class="control-label">Tin Number</label>
                                          <div class="field">
                                            <input maxlength="255" required="required" placeholder="Enter Tin Number" type="text" name="tin_number" value="<?= $data["tin_number"] ?>">
                                          </div>
                                     </div>

                                    <div class="col-md-6">
                                       <label for="gender" style="text-align:left;">Disability:</label>
                                       <div class="field">
                                          <select id="gender"  name="disability">
                                             <option value="<?= $data["disability"] ?>" selected><?= $data["disability"] ?></option>
                                             <option value="Visual" <?php if($data["disability"] == "Visual"){ echo "selected"; } ?>>Visual</option>
                                             <option value="Speech" <?php if($data["disability"] == "Speech"){ echo "selected"; } ?>>Speech</option>
                                             <option value="Mental" <?php if($data["disability"] == "Mental"){ echo "selected"; } ?>>Mental</option>
                                             <option value="Hearing" <?php if($data["disability"] == "Hearing"){ echo "selected"; } ?>>Hearing</option>
                                             <option value="Physical" <?php if($data["disability"] == "Physical"){ echo "selected"; } ?>>Physical</option>
                                          </select>
                                       </div>
                                     </div>
                                 </div>

                                 <label for="tb_address">Address</label>
                                 <div class="field">
                                    <textarea name="tb_address" class="tb_address" id="tb_address" placeholder="Address"><?= $u_address ?></textarea>
                                 </div>
                                 <label for="jobarea_id" style="text-align:left;">Selected Area:</label>
                                 <div class="field">
                                    <select id="jobarea_id" class="form-control" name="jobarea_id" required>
                                       <option value="<?php echo $job_area_id; ?>" selected><?php echo $job_area_location; ?></option>
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
                                 <button class="button btn_submit" style="font-size:1.5vh; width:25%;">
                                 SAVE CHANGES
                                 </button>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6  col-xs-12">
                        <div class="container">
                           <div class="container_title">
                              Manage Password
                           </div>
                           <div class="container_body">
                              <form method="post" class="frm_password_account">
                                 <label for="tb_pw">Old password</label>
                                 <div class="field">
                                    <input type="password" name="tb_pw" id="tb_pw" placeholder="Old password">
                                 </div>
                                 <hr>
                                 <label for="tb_newpw">New password</label>
                                 <div class="field">
                                    <input type="password" name="tb_newpw" id="tb_newpw" placeholder="New password">
                                 </div>
                                 <label for="tb_cnewpw">Confirm new password</label>
                                 <div class="field">
                                    <input type="password" name="tb_cnewpw" id="tb_cnewpw" placeholder="Confirm new password">
                                 </div>
                                 <button class="button btn_submit" style="font-size:1.5vh; width:25%;">
                                 SAVE
                                 </button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php }?>           
                  <?php }elseif($page == "password"){?>
                  <div class="container" style="width:50%;">
                     <div class="container_title">
                        Account settings
                     </div>
                     <div class="container_body">
                        <?php if($u_verification_state == 0 || $u_verification_state < 2) {?>
                        <div class="msg">
                           <p>
                              Your account is not fully verified.
                           </p>
                           <a href="?page=general_information&sub=verified">
                           GET VERIFIED NOW
                           </a>
                        </div>
                        <?php } ?>
                        <form method="post" class="frm_general_information_account">
                           <label for="tb_email">Email</label>
                           <div class="field">
                              <input type="email" name="tb_email" id="tb_email" placeholder="Email" value="<?= $u_email ?>">
                           </div>
                           <label for="tb_cnum">Contact number</label>
                           <div class="field">
                              <input type="number" name="tb_cnum" id="tb_cnum" placeholder="Contact number" value="<?= $u_cnum ?>">
                           </div>
                           <button class="button btn_submit" style="font-size:1.5vh; width:25%;">
                           SAVE
                           </button>
                        </form>
                     </div>
                  </div>
                  <?php }elseif($page == "resume"){?>
                  <div class="container" style="width:50%;">
                     <div class="container_title">
                        Resume
                     </div>
                     <div class="container_body">
                        <?php if($have_resume) {?>
                        <form method="post" class="frm_<?= $page ?>_account">
                           <div class="field">
                              <input type="file" id="fileToUpload" class="fileToUpload">
                              <label for="fileToUpload" class="btn_upload_picture">
                              <i class="fa fa-file-pdf-o"></i>
                              UPLOAD RESUME
                              </label>
                           </div>
                           <div class="button_container">
                              <button class="button btn_submit" style="font-size:1.5vh; width:25%;">
                              SAVE CHANGES
                              </button>
                              <a href="../resume/<?= $r_path ?>" class="button btn_submit" style="font-size:1.5vh;" download>
                              DOWNLOAD RESUME
                              </a>
                           </div>
                        </form>
                        <?php }else{ ?>
                        <?php if($u_verification_state == 0 || $u_verification_state < 2) {?>
                        <div class="msg">
                           <p>
                              Uploading your resume will be used to verify/confirm your account.
                           </p>
                        </div>
                        <?php } ?>
                        <form method="post" class="frm_<?= $page ?>_account">
                           <div class="field">
                              <input type="file" id="fileToUpload" class="fileToUpload">
                              <label for="fileToUpload" class="btn_upload_picture">
                              <i class="fa fa-file-pdf-o"></i>
                              UPLOAD RESUME
                              </label>
                           </div>
                           <button class="button btn_submit" style="font-size:1.5vh; width:25%;">
                           SAVE
                           </button>
                        </form>
                        <?php } ?>
                     </div>
                  </div>
                  <?php }else{ navigate("./?page=general_information"); }?>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
<script type="text/javascript">
   function showNotification(){
       $('.notification-drop .item').find('ul').toggle();
   }
   
   function updateNotification(id){
       $.ajax({
           url : "../controller/NotificationAction.php",
           method: "post",
           data : {id:id},
           success: (res) => {
               console.log(res);
               if(res == "SUCCESS"){
                    setTimeout(() => {
                       window.location.href="../profile/?page=general_information"
                   }, 300);
               } else {
                   location.reload();
               }
           }
       });
   }
</script>