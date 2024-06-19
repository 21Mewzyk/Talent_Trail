<?php
session_start();
require_once '../config.php';
require_once '../functions.php';
require_once '../session.php';

if($islogin == true){
    navigate("../");
}else{
    if(form("a")){
        $a = value("a");
        $step = (form("step")) ? value("step") : "1";
        $type = (form("type")) ? value("type") : "3";
    }else{
        navigate("../");
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
    <link rel="icon" href="../assets/LOGO.png" >
    <title>Talent Trail</title>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" defer></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css">
    <!-- javascript -->
    <script src="./js/register_company.js" defer></script>
    <script src="./js/register.js" defer></script>
    <script src="./js/login.js" defer></script>
    
     <style type="text/css">
   .stepwizard-step p {
     margin-top: 10px;
   }
   .stepwizard-row {
     display: table-row;
   }
   .stepwizard {
     display: table;
     width: 100%;
     position: relative;
   }
   .stepwizard-step button[disabled] {
     opacity: 1 !important;
     filter: alpha(opacity=100) !important;
   }
   .stepwizard-row:before {
     top: 14px;
     bottom: 0;
     position: absolute;
     content: " ";
     width: 100%;
     height: 1px;
     background-color: #ccc;
     z-order: 0;
   }
   .stepwizard-step {
     display: table-cell;
     text-align: center;
     position: relative;
   }
   .btn-circle {
     width: 30px;
     height: 30px;
     text-align: center;
     padding: 6px 0;
     font-size: 12px;
     line-height: 1.428571429;
     border-radius: 15px;
   }
   .modal-body {
     max-height: calc(100vh - 210px);
     overflow-y: auto;
   }
   .modal-dialog {
     min-width: 70%;
   }
   </style>
</head>
<body>
    <?php if($a=="join"){?>

<style>
    .type.showcase_job a {
        display: inline-block;
        position: relative;
    }

    .type.showcase_job a img {
        border-radius: 2vh;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .type.showcase_job a:hover img {
        transform: scale(1.05); /* Optional: increase the size of the image */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add glow border */
    }


    .type.showcase_company a {
        display: inline-block;
        position: relative;
    }

    .type.showcase_company a img {
        border-radius: 2vh;
        transition: transform 0.3s, box-shadow 0.3s;
    
    }

    .type.showcase_company a:hover img {
        transform: scale(1.05); /* Optional: increase the size of the image */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add glow border */
    }


    .login-container {
        width: 60vh;
        margin: 50px auto;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8);;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s, transform 0.3s;
    }

    .login-container:hover {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        transform: translateY(-5px);
    }

    .form {
        margin-top: 20px;
    }

    .field {
        margin-bottom: 20px;
    }

    .field label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .field input[type="email"],
    .field input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
    }

    .form button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    .form button:hover {
        background-color: #0056b3;
    }

    .already {
        margin-top: 20px;
        text-align: center;
    }

    .already a {
        color: #007bff;
        text-decoration: none;
    }

    .already a:hover {
        text-decoration: underline;
    }

    .body {
        background-color: #f4f4f4; /* Background color */
       
        background-size: cover;
        background-position: center;
    }
</style>

        <div class="main" id="main_step_1">
            <div class="header">
                <a href="../" class="header_logo" style="margin-top:3vh; margin-left:5vh;">
                    <img src="../assets/LOGO.png" alt="logo">
                    <p>Talent Trail</p>
                </a>
            </div>
            <div class="body">
                <div class="login-container" style="width: 1050px; height:auto;">
           <center> <p style="font-weight:bold; font-size:3vh;">Select Which Account To Register</p></center>
            <div class="showcase">
                <div class="type showcase_job">
                    <a href="./?a=join&step=2&type=2">
                        <img src="../assets/companylogo.png" alt="team" style="border-radius:2vh;">
                        <br><br>
                        <p style="font-weight:bold; font-size:2vh;">COMPANY</p>
                    </a>
                </div>
                <h3 class="divider">
                    OR
                </h3>
                <div class="type showcase_company">
                    <a href="./?a=join&step=2&type=3">
                        <img src="../assets/jobseeker.png" alt="company" style="border-radius:2vh;">
                        <br><br>
                        <p  style="font-weight:bold; font-size:2vh;">Jobseeker</p>
                    </a>
                </div>  
            </div>
            <hr>
           <center> <p >Already on Talent Trail? <a href="./?a=already">Sign in</a></p></center>
                </div>
            </div>
        </div>

     
    <?php

        // show modal each register
        if(form("type") &&  value("type") == 2 ){ 
            include './register_company.php';

        }else if(form("type") &&  value("type") == 3 ){ 
             include './register_client.php';
        } else {
            echo "";
        }

        include '../footer.php';
     }else{?>

<style>
    .login-container {
        width: 60vh;
        margin: 50px auto;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8);;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s, transform 0.3s;
    }
    @media only screen and (max-width: 768px) {
        .login-container {
            margin: 0;
        }
    }

    .login-container:hover {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        transform: translateY(-5px);
    }

    .form {
        margin-top: 20px;
    }

    .field {
        margin-bottom: 20px;
    }

    .field label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .field input[type="email"],
    .field input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
    }

    .form button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    .form button:hover {
        background-color: #0056b3;
    }

    .already {
        margin-top: 20px;
        text-align: center;
    }

    .already a {
        color: #007bff;
        text-decoration: none;
    }

    .already a:hover {
        text-decoration: underline;
    }

    .body {
        background-color: #f4f4f4; /* Background color */
       
        background-size: cover;
        background-position: center;
    }
</style>


        <div class="main" id="main_login">
            <div class="header">
                <a href="../" class="header_logo" style="margin-top:3vh; margin-left:5vh;">
                    <img src="../assets/LOGO.png" alt="logo">
                    <p>Talent Trail</p>
                </a>
            </div>
            <div class="body">
                <div class="login-container" style="width:auto; height:auto;">
                    <center><h1>Stay updated on your professional world</h1></center>
                    <form method="post" class="form login_account">
                        <div class="field">
                            <label for="email" style="font-size:1.5vh;">Email Address</label>
                            <input type="email" name="email" placeholder="Email" style="height:5vh; border-radius:1vh;" required>
                        </div>
                        <div class="field">
                            <label for="password" style="font-size:1.5vh;">Password</label>
                            <input type="password" name="password" placeholder="Password" style="height:5vh; border-radius:1vh;" required>
                        </div>
                        <hr>
                        <button type="submit" name="register_company" style="height:5vh; border-radius:1vh;">Sign in</button>
                        <p class="already">New to Talent Trail? <a href="./?a=join">Join Now</a></p>
                    </form>
                </div>
            </div>
            <?php include '../footer.php'?>
        </div>
    <?php } ?>


     <div id="modal_agreement" class="modal fade" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false" >
         <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <p class="terms"><span class="company_name">Talent Trail</span> <b>User Agreement and Privacy Policy.</b>  </p>
             </div>
             <div class="modal-body">
                <p>Welcome to Talent Trail, a job matching platform designed to connect job seekers with disabilities (PWD) and inclusive employers. Before you start using our platform, please carefully read and understand the terms and conditions outlined in this User Agreement. By accessing or using Talent Trail, you agree to be bound by the terms and conditions set forth below.</p>
                <p><b>1. Acceptance of Terms</b></p>
                <p>By using Talent Trail, you acknowledge that you have read, understood, and agree to comply with all the terms and conditions outlined in this User Agreement and our Privacy Policy. </p>
                <p><b>2. Registration and Account Security</b></p>
                <p>2.1 Eligibility: You must be 18 years or older to use Talent Trail. By creating an account, you represent and warrant that you are at least 18 years old.</p>
                <p>2.2 Accurate Information: You agree to provide accurate and up-to-date information during the registration process. It is your responsibility to update your information promptly if any changes occur.</p>
                <p>2.3 Account Security: You are responsible for maintaining the confidentiality of your account credentials, and you agree to notify Talent Trail immediately if you suspect any unauthorized use of your account.</p>
                
                <p><b>3. User Responsibilities</b></p>
                <p>3.2 Employers:</p>
                <p>* You agree to provide accurate and truthful information in your profile.</p>
                <p>* You are responsible for updating your profile to reflect your current skills, qualifications, and job preferences.</p>
                <p>* You acknowledge that Talent Trail is a platform to facilitate connections and does not guarantee employment.</p>
                <p>3.1 Job Seekers:</p>
                <p>* You agree to provide accurate and up-to-date information about your company and job postings.</p>
                <p>* You commit to providing an inclusive and accessible workplace for PWD.</p>
                <p>* You acknowledge that Talent Trail is a platform to connect with potential candidates and does not guarantee the suitability of applicants.</p>

                <p><b>4. Prohibited Conduct</b></p>
                <p>4.1 General Prohibitions: You agree not to engage in any conduct that:</p>
                <p>* Violates any applicable laws or regulations.</p>
                <p>* Infringes on the rights of others.</p>
                <p>* Harasses, discriminates, or promotes hate speech.</p>
                <p>* Contains viruses or malicious code.</p>
                <p>4.2 Fraudulent Activities: You agree not to engage in any fraudulent or deceptive activities on Talent Trail, including misrepresentation of your qualifications or job opportunities.</p>

                <p><b>5. Privacy</b></p>
                <p>5.1 Personal Information: By using Talent Trail, you consent to the collection, use, and disclosure of your personal information as outlined in our Privacy Policy.</p>
                
                <p><b>6. Termination</b></p>
                <p>Talent Trail reserves the right to terminate or suspend your account at any time for violation of this User Agreement or for any other reason deemed appropriate by Talent Trail</p>


                <p><b>8. Contact Information</b></p>
                <p>For questions or concerns about this User Agreement, please contact us at TalentTrail@gmail.com.</p>

             </div>
             <div class="modal-footer">
                
                <input type="checkbox" name="accept_condition" id="accept_condition" class="accept_condition" value="accept"> 
                <label id="accept_condition">Accept All the Agreement and Privacy Policy </label> <br>
                  <input type="checkbox" name="accept_condition" id="decline_condition"  class="accept_condition" value="decline"> 
                <label id="decline_condition">Decline All the Agreement and Privacy Policy </label>
             </div>
           </div>
           <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
   </div>

</body>
</html>


<script type="text/javascript">
// $('#modalUser').show()
    $('#modalUser').modal('show');
$(document).ready(function() {

  var navListItems = $('div.setup-panel div a'),
    allWells = $('.setup-content'),
    allNextBtn = $('.nextBtn'),
    allPrevBtn = $('.prevBtn');

  allWells.hide();

  navListItems.click(function(e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
      $item = $(this);

   if (!$item.hasClass('disabled')) {
      navListItems.removeClass('btn-primary').addClass('btn-default');
      $item.addClass('btn-primary');
      allWells.hide();
      $target.show();
      $target.find('input:eq(0)').focus();
    }
  });

  allPrevBtn.click(function() {
    var curStep = $(this).closest(".setup-content"),
      curStepBtn = curStep.attr("id"),
      prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

    prevStepWizard.trigger('click');
  });

  allNextBtn.click(function() {
    var curStep = $(this).closest(".setup-content"),
      curStepBtn = curStep.attr("id"),
      nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
      curInputs = curStep.find("input[type='text'],input[type='url']"),
      isValid = true;

    $(".form-group").removeClass("has-error");
    for (var i = 0; i < curInputs.length; i++) {
      if (!curInputs[i].validity.valid) {
        isValid = false;
        $(curInputs[i]).closest(".form-group").addClass("has-error");
      }
    }

    if (isValid)
      nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});

function showMOdalAgreement(){
    $('#modal_agreement').modal('show');

}
  // $('[name="accept_condition"]').change(function()
  // {
  //   if ($(this).is(':checked')) {
  //      // Do something...
  //      alert('You can rock now...');
  //   } else {

  //   };
  // });
 $('.accept_condition').click(function() {
        $('.accept_condition').not(this).prop('checked', false);
         $('#modal_agreement').modal('hide');
    });
</script>