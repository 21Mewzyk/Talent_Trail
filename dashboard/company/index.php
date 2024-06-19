<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Talent Trail - Dashboard</title>
        <link rel="icon" href="../../assets/LOGO.png" >
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" defer></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styless.css">
        <link rel="stylesheet" href="notify_style.css">
        <!-- javascript -->
        <script src="js/index.js" defer></script>
        <script src="js/post_job.js" defer></script>
        <script src="js/edit_job.js" defer></script>
        <script src="js/manage_applicants.js" defer></script>
        <script src="js/update_account.js" defer></script>
        <script src="js/update_general.js" defer></script>
        <script src="js/update_company.js" defer></script>
        <script src="../ckeditor/ckeditor.js"></script>
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
        <style type="text/css">
            /* The Modal (background) */
            .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }
            /* Modal Content/Box */
            .modal-content {
            background-color: #fefefe;
            margin: 1% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 65%; /* Could be more or less, depending on screen size */
            position: relative;
            border-radius: 10px;
            }
            /* The Close Button */
            .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            }
            .close:hover,
            .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
            }
            .content {
            width: 100%;
            margin: 0px auto;
            }
            .embed-container {
            /*   height: 0;*/
            width: 100%;
            overflow: hidden;
            position: relative;
            }
            .embed-container iframe {
            width: 100%;
            }
        </style>
    </head>
    <body>
        <?php 
            session_start();
            require_once '../../config.php';
            require_once '../../functions.php';
            require_once '../../session.php';
            
            setlocale(LC_MONETARY,"en_US");



                                if(isset($_POST['updatedocuments']))
                                {
                                    ?>

                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <?php
                                        $updatedindicator = 0;
                                        if (!empty($_FILES['letterofcontent']['tmp_name'])) {

                                            $fileTmpPath2 = $_FILES['letterofcontent']['tmp_name'];
                                            $fileName2 = $_FILES['letterofcontent']['name'];
                                            $fileSize2 = $_FILES['letterofcontent']['size'];
                                            $fileType2 = $_FILES['letterofcontent']['type'];
                                            $fileNameCmps2 = explode(".", $fileName2);
                                            $fileExtension2 = strtolower(end($fileNameCmps2));
                                            $newFileName2 = md5(time() . $fileName2) . '.' . $fileExtension2;

                                            $uploadFileDir2 = '../../assets/documents/';
                                            $dest_path2 = $uploadFileDir2 . $newFileName2;

                                            if(move_uploaded_file($fileTmpPath2, $dest_path2)) {

                                                $updateQuery = "UPDATE `tbl_company` SET `c_doc1` = '$newFileName2' WHERE userid = $u_id";
                                                $result = mysqli_query($con, $updateQuery);
                                                if ($result) {$updatedindicator = 1;} else {$updatedindicator = 0;}

                                            }
                                        }
                                        if (!empty($_FILES['companyprofile']['tmp_name'])) {

                                            $fileTmpPath3 = $_FILES['companyprofile']['tmp_name'];
                                            $fileName3 = $_FILES['companyprofile']['name'];
                                            $fileSize3 = $_FILES['companyprofile']['size'];
                                            $fileType3 = $_FILES['companyprofile']['type'];
                                            $fileNameCmps3 = explode(".", $fileName3);
                                            $fileExtension3 = strtolower(end($fileNameCmps3));
                                            $newFileName3 = md5(time() . $fileName3) . '.' . $fileExtension3;

                                            $uploadFileDir3 = '../../assets/documents/';
                                            $dest_path3 = $uploadFileDir3 . $newFileName3;

                                            if(move_uploaded_file($fileTmpPath3, $dest_path3)) {
                                                $updateQuery = "UPDATE `tbl_company` SET `c_doc2` = '$newFileName3' WHERE userid = $u_id";
                                                $result = mysqli_query($con, $updateQuery);
                                                if ($result) {$updatedindicator = 1;} else {$updatedindicator = 0;}
                                            } 
                                        }
                                        if (!empty($_FILES['birform']['tmp_name'])) {
                                            $fileTmpPath4 = $_FILES['birform']['tmp_name'];
                                            $fileName4 = $_FILES['birform']['name'];
                                            $fileSize4 = $_FILES['birform']['size'];
                                            $fileType4 = $_FILES['birform']['type'];
                                            $fileNameCmps4 = explode(".", $fileName4);
                                            $fileExtension4 = strtolower(end($fileNameCmps4));
                                            $newFileName4 = md5(time() . $fileName4) . '.' . $fileExtension4;

                                            $uploadFileDir4 = '../../assets/documents/';
                                            $dest_path4 = $uploadFileDir4 . $newFileName4;

                                            if(move_uploaded_file($fileTmpPath4, $dest_path4)) {
                                                $updateQuery = "UPDATE `tbl_company` SET `c_doc3` = '$newFileName4' WHERE userid = $u_id";
                                                $result = mysqli_query($con, $updateQuery);
                                                if ($result) {$updatedindicator = 1;} else {$updatedindicator = 0;}
                                            } 
                                        }
                                        if (!empty($_FILES['businesspermit']['tmp_name'])) {
                                            $fileTmpPath5 = $_FILES['businesspermit']['tmp_name'];
                                            $fileName5 = $_FILES['businesspermit']['name'];
                                            $fileSize5 = $_FILES['businesspermit']['size'];
                                            $fileType5 = $_FILES['businesspermit']['type'];
                                            $fileNameCmps5 = explode(".", $fileName5);
                                            $fileExtension5 = strtolower(end($fileNameCmps5));
                                            $newFileName5 = md5(time() . $fileName5) . '.' . $fileExtension5;

                                            $uploadFileDir5 = '../../assets/documents/';
                                            $dest_path5 = $uploadFileDir5 . $newFileName5;

                                            if(move_uploaded_file($fileTmpPath5, $dest_path5)) {
                                                $updateQuery = "UPDATE `tbl_company` SET `c_doc4` = '$newFileName5' WHERE userid = $u_id";
                                                $result = mysqli_query($con, $updateQuery);
                                                if ($result) {$updatedindicator = 1;} else {$updatedindicator = 0;}
                                            } 
                                        }
                                        if (!empty($_FILES['secdtipermit']['tmp_name'])) {
                                            $fileTmpPath6 = $_FILES['secdtipermit']['tmp_name'];
                                            $fileName6 = $_FILES['secdtipermit']['name'];
                                            $fileSize6 = $_FILES['secdtipermit']['size'];
                                            $fileType6 = $_FILES['secdtipermit']['type'];
                                            $fileNameCmps6 = explode(".", $fileName6);
                                            $fileExtension6 = strtolower(end($fileNameCmps6));
                                            $newFileName6 = md5(time() . $fileName6) . '.' . $fileExtension6;

                                            $uploadFileDir6 = '../../assets/documents/';
                                            $dest_path6 = $uploadFileDir6 . $newFileName6;

                                            if(move_uploaded_file($fileTmpPath6, $dest_path6)) {
                                                $updateQuery = "UPDATE `tbl_company` SET `c_doc5` = '$newFileName6' WHERE userid = $u_id";
                                                $result = mysqli_query($con, $updateQuery);
                                                if ($result) {$updatedindicator = 1;} else {$updatedindicator = 0;}
                                            } 
                                        }
                                        if (!empty($_FILES['licensepermit']['tmp_name'])) {
                                            $fileTmpPath7 = $_FILES['licensepermit']['tmp_name'];
                                            $fileName7 = $_FILES['licensepermit']['name'];
                                            $fileSize7 = $_FILES['licensepermit']['size'];
                                            $fileType7 = $_FILES['licensepermit']['type'];
                                            $fileNameCmps7 = explode(".", $fileName7);
                                            $fileExtension7 = strtolower(end($fileNameCmps7));
                                            $newFileName7 = md5(time() . $fileName7) . '.' . $fileExtension7;

                                            $uploadFileDir7 = '../../assets/documents/';
                                            $dest_path7 = $uploadFileDir7 . $newFileName7;

                                            if(move_uploaded_file($fileTmpPath7, $dest_path7)) {
                                                $updateQuery = "UPDATE `tbl_company` SET `c_doc6` = '$newFileName7' WHERE userid = $u_id";
                                                $result = mysqli_query($con, $updateQuery);
                                                if ($result) {$updatedindicator = 1;} else {$updatedindicator = 0;}
                                            } 
                                        }

                                    if ($updatedindicator == 1) {
                                        echo '<script>
                                                Swal.fire({
                                                    icon: "success",
                                                    title: "File Updated",
                                                    text: "The file has been updated successfully!",
                                                    confirmButtonText: "OK"
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location.href = "./?page=profile&sub=password";
                                                    }
                                                });
                                              </script>';
                                    } else {
                                        echo '<script>
                                                Swal.fire({
                                                    icon: "error",
                                                    title: "Update Failed",
                                                    text: "Failed to update the file. Please try again.",
                                                    confirmButtonText: "OK"
                                                }).then(() => {
                                                    window.location.href = "./?page=profile&sub=password";
                                                });
                                              </script>';
                                    }
                                }

            
            if($islogin){

                            $userdocuments = mysqli_query($con,"SELECT * FROM `tbl_company` WHERE userid = $u_id");
                            if(hasResult($userdocuments)){
                                $datauserdocuments = mysqli_fetch_assoc($userdocuments);
                            }

                if($u_type == 2){
                    $page = (form("page")) ? value("page") : "dashboard";
            
                    $load_jobs = mysqli_query($con,"SELECT * FROM `tbl_jobs` WHERE userid = $u_id");
                    $count_jobs = mysqli_num_rows($load_jobs);
            
                    if(form("manage")){
                        $update = true;
                        $id = mysqli_value($con,"manage");
                        if(is_numeric($id)){
                            $manage_Job = mysqli_query($con,"SELECT * FROM `tbl_jobs` WHERE id = $id");
                            if(hasResult($manage_Job)){
                                $data = mysqli_fetch_assoc($manage_Job);
                            }else{
                                $update = false;
                            }
                        }else{
                            $update = false;
                        }
                    }else{
                        $update = false;
                    }
            
                  
            
            
            
             if(form("filter") && value("sub") == "applicants"){
                        $filter = strtolower(mysqli_value($con,"filter"));
                        if($filter == "pending"){
            $load_applicants = mysqli_query($con,"SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.email, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS `resume`, tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at, facebook, linkedin, instagram, degree_title, school_name, school_year_attended FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.companyid = $c_id AND tbl_applicants.status = 1 AND tbl_applicants.is_archieve = 0");
                        }elseif($filter == "hired"){
            $load_applicants = mysqli_query($con,"SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.email, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS `resume`, tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at, facebook, linkedin, instagram, degree_title, school_name, school_year_attended FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.companyid = $c_id AND tbl_applicants.status = 2 AND tbl_applicants.is_archieve = 0");
                        }elseif($filter == "declined"){
            $load_applicants = mysqli_query($con,"SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.email, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS `resume`, tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at, facebook, linkedin, instagram, degree_title, school_name, school_year_attended FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.companyid = $c_id AND tbl_applicants.status = 3 AND tbl_applicants.is_archieve = 0"); }elseif($filter == "cancelled"){
            $load_applicants = mysqli_query($con,"SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.email, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS `resume`, tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at, facebook, linkedin, instagram, degree_title, school_name, school_year_attended FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.companyid = $c_id AND tbl_applicants.status = 4 AND tbl_applicants.is_archieve = 0");
                        }else{
                            $load_applicants = mysqli_query($con,"SELECT tbl_applicants.id, tbl_applicants.applicantsid,tbl_accounts.email, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS `resume`, tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at , facebook, linkedin, instagram, degree_title, school_name,school_year_attended FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.companyid = $c_id  and tbl_applicants.is_archieve = 0");
                        }
            
            
                    }else{
                        $filter = "all";
                        $load_applicants = mysqli_query($con,"SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.email,tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_accounts.email, tbl_resume.path AS `resume`, tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at , facebook, linkedin, instagram, degree_title, school_name,school_year_attended FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.companyid = $c_id  and tbl_applicants.is_archieve = 0" );
                    }
            
                    if(value("sub") == "list_archive") {
                        $load_applicants = mysqli_query($con,"SELECT tbl_applicants.id, tbl_applicants.applicantsid,tbl_accounts.email, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS `resume`, tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at , facebook, linkedin, instagram, degree_title, school_name,school_year_attended FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.companyid = $c_id  and tbl_applicants.is_archieve = 1");
                    }
            
                    $count_applicants = mysqli_num_rows($load_applicants);
                }else{
                    navigate("../../");
                }
            }else{
                navigate("../../");
            }
            ?>
        <div class="main">
            <div class="header">
                <div class="box">
                    <div class="mobile_lang">
                        <a href="../../" class="header_logo">
                            <img src="../../assets/LOGO.png" alt="logo">
                            <p style="margin-bottom:0;">Talent Trail</p>
                        </a>
                    </div>
                    <span></span>
                    <div class="navigation desktop_icon_profile">
                        <a href="../../">
                        Home
                        </a>
                        <a href="?page=dashboard">
                        Dashboard
                        </a>
                        <a href="?page=hire">
                        Hire
                        </a>
                        <ul class="notification-drop">
                            <li class="item" style="border:none;">
                                <button type="button" style="border: none; background: none;" onclick="showNotification()">
                                <i class="fa fa-bell-o notification-bell" aria-hidden="true"></i> <span class="btn__badge pulse-button ">
                                <?php echo countNotify($con, $u_id); ?>
                                </span> 
                                </button>
                                <ul>
                                    <?php
                                        $load_data_notificaiton = mysqli_query($con,"SELECT * FROM `tbl_notification` WHERE user_id = $u_id and `status` = 0 order by created_at desc limit 5");
                                        if(hasResult($load_data_notificaiton)){
                                            while($row = mysqli_fetch_assoc($load_data_notificaiton)){
                                                echo "<li id='".$row["id"]."' onclick='updateNotification(this.id)' >".$row["description"]."</li>";
                                            }  
                                        }else{
                                            echo "<li>No data..</li>";
                                        }
                                         ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="navigation desktop_icon_profile">
                    <button class="btn_user">
                    <?= $u_email ?>  <i class="fa fa-user"></i>
                    </button>
                </div>
                <div class="navigation mobile_icon_profile">
                    <button class="btn_user">
                    <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="body" id="body_page_<?= $page ?>">
                <div class="profile_box" style="display:none">
                    <div class="hambuger_menu_desktop">
                        <div class="profile_box_header">
                            <p class="profile_name">
                                <?= $u_fname." ". $u_lname ?>
                            </p>
                            <p class="profile_email">
                                <?= $u_email ?>
                            </p>
                        </div>
                        <div class="profile_box_body">
                            <a href="./?page=profile">Account Information</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="../../logout.php" class="btn_logout">Logout</a>
                        </div>
                    </div>
                    <div class="hambuger_menu_mobile">
                        <div class="profile_box_footer">
                            <a href="../../" class="btn_logout">Home</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="?page=dashboard" class="btn_logout">Dashboard</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="?page=hire" class="btn_logout">Hire</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="?page=hire&sub=list" class="btn_logout">List</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="?page=hire&sub=postajob" class="btn_logout">Job</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="?page=hire&sub=applicants" class="btn_logout">Applicants</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="./?page=profile&sub=general_information" class="btn_logout">Account Information</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="./?page=profile&sub=company_information" class="btn_logout">Company Information</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="./?page=profile&sub=password" class="btn_logout">Password</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="../../logout.php" class="btn_logout">Logout</a>
                        </div>
                    </div>
                </div>
                <?php if($page == "dashboard"){?>
             <style>
                /* Medium devices (desktops, 992px and up) */
                @media (min-width: 992px) {
                    .col-md-6 {
                        flex: 0 0 50%;
                        max-width: 50%;
                    }

                    .col-md-12 {
                        flex: 0 0 100%;
                        max-width: 100%;
                    }

                    .col-md-4 {
                        flex: 0 0 33.33333%;
                        max-width: 33.33333%;
                    }
                    .col-md-2 {
                        flex: 0 0 16.66667%; /* Do not grow, do not shrink, take 16.66667% width */
                        max-width: 16.66667%;
                    }
                    .col-md-9 {
                        flex: 0 0 75%; /* Do not grow, do not shrink, take 75% width */
                        max-width: 75%;
                    }
                    .col-md-3 {
                        flex: 0 0 25%; /* Do not grow, do not shrink, take 25% width */
                        max-width: 25%;
                    }
                }

                /* Extra small devices (phones, less than 576px) */
                @media (max-width: 575.98px) {
                    .col-xs-12 {
                        flex: 0 0 100%;
                        max-width: 100%;
                    }
                }

                /* Rows */
                .row {
                    display: flex;
                    flex-wrap: wrap;
                    margin-right: -15px;
                    margin-left: -15px;
                }

                /* Column gutters */
                [class*="col-"] {
                    padding-right: 15px;
                    padding-left: 15px;
                }

            </style> 
                <h2>Hi, <?= $u_fname." ". $u_lname ?> 👋</h2>
                <div class="dashboard">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="box" style="display:block; margin-bottom:2vh;">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-12">
                                               <center> <i style="font-size:6vh;" class="fa fa-envelope-open-o"></i></center>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <center>
                                                <div class="box_name" style="font-weight:bold; font-size:2vh;">
                                                    Open Jobs
                                                </div>
                                                <div class="box_count" style="font-weight:bold; font-size:2.5vh;">
                                                    <?= $count_jobs ?>
                                                </div>
                                                </center>
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                        <center>
                                        <a href="./?page=hire&sub=jobs" style="background-color:white; color:black;">
                                        VIEW
                                        </a>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="box"  style="display:block; margin-bottom:2vh;">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-12">
                                               <center> <i style="font-size:6vh;" class="fa fa-users"></i></center>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                            <center>
                                                <div class="box_name" style="font-weight:bold; font-size:2vh;">
                                                    Applicants
                                                </div>
                                                <div class="box_count"  style="font-weight:bold; font-size:2.5vh;">
                                                    <?= $count_applicants ?>
                                                </div>

                                            </center>
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                        <center>
                                        <a href="?page=hire&sub=applicants"  style="background-color:white; color:black;">
                                        VIEW
                                        </a>
                                        </center>
                                    </div>
                                </div>                
                            </div>
                        </div>
                    </div>

                <hr>
                <h3>Quick View <small style="font-size:1.5vh;">Pending Applicants</small></h3>
                <div class="container_body">
                    <div class="row">
                        <?php if(hasResult($load_applicants)){?>
                        <?php while($row = mysqli_fetch_assoc($load_applicants)){
                            $resume_data = getMyUrl().'/Talent-Trail/resume/'.$row['resume'];
                            if($row["status"] == "1") {
                            ?>
                            <div class="col-md-4 col-xs-12">
                                <div class="box" style="display:block;">
                                    <div class="text" style="width:100%;">
                                        <center>
                                            <p style="font-weight:bold;" class="j_name">
                                                <span class="label">Job Title : </span>
                                                <?= $row['j_name']; ?>
                                            </p>
                                        </center>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6 col-xs-12">
                                                <b>
                                                    <p class="posted_at" style="font-size:1.4vh; color:#623ADA;">
                                                        <span class="label">Email : </span>
                                                        <?= $row["email"]?> 
                                                    </p>
                                                </b>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <b>
                                                    <p class="name" style="font-size:1.4vh; color:#623ADA;">
                                                        <span class="label">Full name : </span>
                                                        <?= $row['firstname']; ?> <?= $row['lastname']; ?>
                                                    </p>
                                                </b>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-xs-12">
                                                <p class="name" style="font-size:1.4vh;">
                                                    <span class="label">Degree Title : </span>
                                                    <?= $row['degree_title']; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-xs-12">
                                                <p class="name" style="font-size:1.4vh;">
                                                    <span class="label">School: </span>
                                                    <?= $row['school_name']; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-xs-12">
                                                <p class="name" style="font-size:1.4vh;">
                                                    <span class="label">Year attedend: </span>
                                                    <?= $row['school_year_attended']; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-xs-12">
                                                <p class="posted_at" style="font-size:1.4vh;">
                                                    <span class="label">Age : </span>
                                                    <?= $row["age"]?>
                                                </p>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <p class="address" style="font-size:1.4vh;">
                                                    <span class="label">Address : </span>
                                                    <?= $row['address']; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <p class="posted_at" style="font-size:1.4vh;">
                                            <span class="label">Posted at : </span>
                                            <?= date("m/d/Y",strtotime($row["created_at"]))?>
                                        </p>
                                    </div>
                                    <br>
                                    <hr>
                                    <br>
                                    <div class="box_buttons">
                                        <button data-id="<?= $row["id"] ?>" class="button btn_hired" style="    background: #623ADA;
                                            color: white;
                                            padding: 1rem 1.5rem;
                                            font-size: .6rem;
                                            border-radius: 5px;  margin-bottom:1vh;" name='hired'>
                                        <i class="fa fa-check"></i>
                                        HIRE
                                        </button>
                                        <button data-id="<?= $row["id"] ?>" class="button btn_decline" style="    background: #623ADA;
                                            color: white;
                                            padding: 1rem 1.5rem;
                                            font-size: .6rem;
                                            border-radius: 5px;  margin-bottom:1vh;" name='declined'>
                                        <i class="fa fa-times"></i>
                                        DECLINE
                                        </button>
                                        <button  class="button" style="    background: #623ADA;
                                            color: white;
                                            padding: 1rem 1.5rem;
                                            font-size: .6rem;
                                            border-radius: 5px;  margin-bottom:1vh;" data-toggle="tooltip" data-placement="top" title="View" type="button" value="<?=$resume_data; ?>" id="mybtn<?= $row["id"] ?>" onclick="showModal('<?= $resume_data; ?>', this.id)">
                                        <i class="fa fa-file-text-o"></i>   VIEW RESUME
                                        </button>

                                        
                                        <button data-id="<?= $row["id"] ?>" class="button set_schedule" style="    background: #623ADA;
                                            color: white;
                                            padding: 1rem 1.5rem;
                                            font-size: .6rem;
                                            border-radius: 5px; margin-bottom:1vh;">
                                        <i class="fa fa-save"></i>
                                        SET SCHEDULE
                                        </button>
                                        <br>
                                        <a href="../../resume/<?= $row['resume'] ?>" style="    background: #623ADA;
                                            color: white;
                                            padding: 1rem 1.5rem;
                                            font-size: .6rem;
                                            border-radius: 5px; margin-top:1vh;" class="button" download>
                                        <i class="fa fa-file-text-o"></i>
                                        DOWNLOAD RESUME
                                        </a> 
                                    </div>
                                </div>
                            </div>
                                </b>
                                <?php } }  ?>
                                <?php }else{?>
                                <div class="col-md-12 col-xs-12">
                                    <div class="showcase" >
                                        <img src="./assets/empty.png" alt="empty" width="200">
                                        <p>No Applicants's Found</p>
                                    </div>
                                </div>
                                <?php } ?>
                    </div>
                </div>

                <?php }elseif($page == "hire"){?>
                <?php if(form("sub")){?>
                <div class="sidebar">
                    <a href="?page=hire&sub=list" <?= (value("sub") == "list") ? 'class="active"' : "" ?>>
                        <i class="fa fa-list"></i>
                        <p class="name">List</p>
                    </a>
                    <a href="?page=hire&sub=postajob" <?= (value("sub") == "postajob") ? 'class="active"' : "" ?>>
                        <i class="fa fa-plus-circle"></i>
                        <p class="name">Jobs</p>
                    </a>
                    <a href="?page=hire&sub=applicants" <?= (value("sub") == "applicants") ? 'class="active"' : "" ?>>
                        <i class="fa fa-users"></i>
                        <p class="name">Applicants</p>
                    </a>
                    <a href="?page=hire&sub=list_archive" <?= (value("sub") == "list_archive") ? 'class="active"' : "" ?>>
                        <i class="fa fa-users"></i>
                        <p class="name">Archive</p>
                    </a>
                </div>
                <?php 
                    $class_type = value("sub") == "list_archive" ? "applicants" : value("sub");
                    ?>
                <div class="showcase" id="showcase_sub_<?= $class_type ?>">
                    <?php if(value("sub") == "list"){?>
             <style>
                /* Medium devices (desktops, 992px and up) */
                @media (min-width: 992px) {
                    .col-md-6 {
                        flex: 0 0 50%;
                        max-width: 50%;
                    }

                    .col-md-12 {
                        flex: 0 0 100%;
                        max-width: 100%;
                    }

                    .col-md-4 {
                        flex: 0 0 33.33333%;
                        max-width: 33.33333%;
                    }
                }

                /* Extra small devices (phones, less than 576px) */
                @media (max-width: 575.98px) {
                    .col-xs-12 {
                        flex: 0 0 100%;
                        max-width: 100%;
                    }
                }

                /* Rows */
                .row {
                    display: flex;
                    flex-wrap: wrap;
                    margin-right: -15px;
                    margin-left: -15px;
                }

                /* Column gutters */
                [class*="col-"] {
                    padding-right: 15px;
                    padding-left: 15px;
                }

            </style> 

                            <div class="t1">
                                <h3>Jobs</h3>
                                <p>A list of all the jobs you`ve advertised.</p>
                            </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container" style="width:100%; max-width:100%;">
                                <div class="container_title">
                                    Jobs
                                </div>
                                <div class="container_body">
                                <div class="row" style="margin-left:1vh; margin-right:1vh;">
                                    <?php if(hasResult($load_jobs)){?>
                                        <?php while($row = mysqli_fetch_assoc($load_jobs)){?>
                                    <div class="col-md-4">
                                            <a href="?page=hire&sub=postajob&manage=<?= $row["id"]?>" class="box" style="border:1px solid black; border-radius:2vh; margin-bottom:1vh; margin-top:1vh; min-height: 25vh;">
                                                <div class="text">
                                                    <p class="name"><?= $row['j_name']; ?></p>
                                                    <p class="salary_range">&#8369; <?= number_format($row['j_min']).' - &#8369; '.number_format($row['j_max']) ?></p>
                                                    <p class="posted_at"><?= date("m/d/Y",strtotime($row["j_created_at"]))?></p>
                                                </div>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                        <?php } ?>
                                    <?php }else{?>
                                    <div class="col-md-12">
                                        <div class="showcase" >
                                            <img src="./assets/empty.png" alt="empty" width="200">
                                            <p>No Job's Found</p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }elseif(value("sub") == "postajob"){?>
                    
             <style>
                /* Medium devices (desktops, 992px and up) */
                @media (min-width: 992px) {
                    .col-md-6 {
                        flex: 0 0 50%;
                        max-width: 50%;
                    }

                    .col-md-12 {
                        flex: 0 0 100%;
                        max-width: 100%;
                    }

                    .col-md-4 {
                        flex: 0 0 33.33333%;
                        max-width: 33.33333%;
                    }
                    .col-md-2 {
                        flex: 0 0 16.66667%; /* Do not grow, do not shrink, take 16.66667% width */
                        max-width: 16.66667%;
                    }
                    .col-md-9 {
                        flex: 0 0 75%; /* Do not grow, do not shrink, take 75% width */
                        max-width: 75%;
                    }
                    .col-md-3 {
                        flex: 0 0 25%; /* Do not grow, do not shrink, take 25% width */
                        max-width: 25%;
                    }
                }

                /* Extra small devices (phones, less than 576px) */
                @media (max-width: 575.98px) {
                    .col-xs-12 {
                        flex: 0 0 100%;
                        max-width: 100%;
                    }
                }

                /* Rows */
                .row {
                    display: flex;
                    flex-wrap: wrap;
                    margin-right: -15px;
                    margin-left: -15px;
                }

                /* Column gutters */
                [class*="col-"] {
                    padding-right: 15px;
                    padding-left: 15px;
                }

            </style> 
                    <div class="t1">
                        <h3>Jobs</h3>
                        <p>Post job openings to find employee.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container" style="width:100%; max-width:100%;">
                                <div class="container_title">
                                    <?= ($update) ? "Edit Job description" : "Post a Job" ?>
                                </div>
                                <div class="container_body" style="width:100%;">
                                    <form method="post" class="<?= ($update) ? "edit_job" : "post_job" ?>">

                                <div class="row">
                                    <div class="col-md-9">
                                        <?php if($update) {?>
                                                <div class="row">
                                                    <div class="col-md-2">
                                        <label>Company ID</label>
                                        <div class="field">
                                            <input type="text" name="id" value="<?= ($update) ? $data["id"] : "" ?>" readonly>
                                        </div>
                                    </div>

                                                    <div class="col-md-8">

                                        <label>Position Name</label>
                                        <div class="field">
                                            <input type="text" name="position_name" value="<?= ($update) ? $data["j_name"] : "" ?>" id="position_name" placeholder="Position name">
                                        </div>
                                    </div>
                                </div>
                                        <?php }else{?>

                                        <label>Position Name</label>
                                        <div class="field">
                                            <input type="text" name="position_name" value="<?= ($update) ? $data["j_name"] : "" ?>" id="position_name" placeholder="Position name">
                                        </div>
                                        <?php } ?>
                                        <br>
                                        <hr>
                                        <br>
                                        <label>Job Description</label>
                                        <div class="field">
                                            <textarea name="description" class="description" id="content" placeholder="Description"><?= ($update) ? $data["j_description"] : "" ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Minimum Salary</label>
                                                        <div class="field">
                                                            <input type="number" name="minimum_salary" value="<?= ($update) ? $data["j_min"] : "" ?>"  id="minimum_salary" placeholder="0.00">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Maximum Salary</label>
                                                        <div class="field">
                                                            <input type="number" name="maximum_salary" value="<?= ($update) ? $data["j_max"] : "" ?>" id="maximum_salary" placeholder="0.00">
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>
                                                <label>Currency Type:</label>
                                                <div class="field">
                                                    <select name="currency_symbol" id="currency_symbol">
                                                        <option value="₱" <?= ($update && $data["j_currency_symbol"] == "₱") ? "selected" : ""  ?>  selected >PH Peso</option>
                                                    </select>
                                                </div>

                                                <br>
                                                <label>Job Category</label>
                                                <div class="field">
                                                    <select name="job_category" id="job_category">
                                                        <option value="Common" <?= ($update && $data["j_job_category"] == "Common Jobs") ? "selected" : "" ?>>Common Jobs</option>
                                                        <option value="Plumbing" <?= ($update && $data["j_job_category"] == "Plumbing") ? "selected" : "" ?>>Plumbing</option>
                                                        <option value="Electrical" <?= ($update && $data["j_job_category"] == "Electrical") ? "selected" : "" ?>>Electrical</option>
                                                        <option value="Construction" <?= ($update && $data["j_job_category"] == "Construction") ? "selected" : "" ?>>Construction</option>
                                                        <option value="Programming" <?= ($update && $data["j_job_category"] == "Programming") ? "selected" : "" ?>>Programming</option>
                                                        <option value="Programming" <?= ($update && $data["j_job_category"] == "Farming") ? "selected" : "" ?>>Farming</option>
                                                        <option value="Massage" <?= ($update && $data["j_job_category"] == "Massage") ? "selected" : "" ?>>Massage</option>
                                                        <option value="Marketing" <?= ($update && $data["j_job_category"] == "Marketing") ? "selected" : "" ?>>Marketing</option>
                                                    </select>
                                                </div>

                                                <br>
                                                <label>Available for PWD With:</label>
                                                <div class="field">
                                                    <select name="pwd_type" id="pwd_type">
                                                        <option value="" <?= ($update && $data["j_pwd_type"] == "") ? "selected" : "" ?>>None</option>
                                                        <option value="physical" <?= ($update && $data["j_pwd_type"] == "physical") ? "selected" : "" ?>>Physical Disability</option>
                                                        <option value="visual" <?= ($update && $data["j_pwd_type"] == "visual") ? "selected" : "" ?>>Visual Impairment</option>
                                                        <option value="hearing" <?= ($update && $data["j_pwd_type"] == "hearing") ? "selected" : "" ?>>Hearing Impairment</option>
                                                        <option value="cognitive" <?= ($update && $data["j_pwd_type"] == "cognitive") ? "selected" : "" ?>>Cognitive Disability</option>
                                                        <option value="neurological" <?= ($update && $data["j_pwd_type"] == "neurological") ? "selected" : "" ?>>Neurological Disability</option>
                                                        <option value="developmental" <?= ($update && $data["j_pwd_type"] == "developmental") ? "selected" : "" ?>>Developmental Disability</option>
                                                        <option value="mental_health" <?= ($update && $data["j_pwd_type"] == "mental_health") ? "selected" : "" ?>>Mental Health Disability</option>
                                                        <option value="speech" <?= ($update && $data["j_pwd_type"] == "speech") ? "selected" : "" ?>>Speech or Language Disability</option>
                                                        <option value="chronic_illness" <?= ($update && $data["j_pwd_type"] == "chronic_illness") ? "selected" : "" ?>>Chronic Illness</option>
                                                        <option value="autoimmune" <?= ($update && $data["j_pwd_type"] == "autoimmune") ? "selected" : "" ?>>Autoimmune Disorder</option>
                                                        <option value="mobility" <?= ($update && $data["j_pwd_type"] == "mobility") ? "selected" : "" ?>>Mobility Disability</option>
                                                        <option value="invisible" <?= ($update && $data["j_pwd_type"] == "invisible") ? "selected" : "" ?>>Invisible Disability</option>
                                                        <option value="other" <?= ($update && $data["j_pwd_type"] == "other") ? "selected" : "" ?>>Other Disability</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <hr>
                                        <button class="btn_submit" style="font-size:1.5vh; width:100%;">
                                        SAVE
                                        </button>

                                    <?php if($update) {?>
                                    <button data-id="<?= ($update) ? $data["id"] : "" ?>" class="btn_delete_job" style="font-size:1.5vh; width:100%;">
                                    DELETE
                                    </button>
                                    <?php }?>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php }elseif(value("sub") == "applicants"){?>

             <style>
                /* Medium devices (desktops, 992px and up) */
                @media (min-width: 992px) {
                    .col-md-6 {
                        flex: 0 0 50%;
                        max-width: 50%;
                    }

                    .col-md-12 {
                        flex: 0 0 100%;
                        max-width: 100%;
                    }

                    .col-md-4 {
                        flex: 0 0 33.33333%;
                        max-width: 33.33333%;
                    }
                }

                /* Extra small devices (phones, less than 576px) */
                @media (max-width: 575.98px) {
                    .col-xs-12 {
                        flex: 0 0 100%;
                        max-width: 100%;
                    }
                }

                /* Rows */
                .row {
                    display: flex;
                    flex-wrap: wrap;
                    margin-right: -15px;
                    margin-left: -15px;
                }

                /* Column gutters */
                [class*="col-"] {
                    padding-right: 15px;
                    padding-left: 15px;
                }

            </style>  
                    <div class="t1">
                        <h3>Applicants</h3>
                        <p>List of all applicants in different positions.</p>
                    </div>
                    <div class="container">
                        <div class="container_title">
                            <div class="title">
                                Applicants
                            </div>
                            <div class="filter">
                                <a href="./?page=hire&sub=applicants&filter=all" class="<?= ($filter=="all") ? "active" : "" ?>" >ALL</a>
                                <a href="./?page=hire&sub=applicants&filter=pending" class="<?= ($filter=="pending") ? "active" : "" ?>">PENDING</a>
                                <a href="./?page=hire&sub=applicants&filter=hired" class="<?= ($filter=="hired") ? "active" : "" ?>">HIRED</a>
                                <a href="./?page=hire&sub=applicants&filter=declined" class="<?= ($filter=="declined") ? "active" : "" ?>">DECLINED</a>
                                <a href="./?page=hire&sub=applicants&filter=cancelled" class="<?= ($filter=="cancelled") ? "active" : "" ?>">CANCELLED</a>
                            </div>
                        </div>
                        <div class="container_body">
                                        <div class="row">
                            <?php if(hasResult($load_applicants)){?>
                            <?php while($row = mysqli_fetch_assoc($load_applicants)){
                                $resume_data = getMyUrl().'/Talent-Trail/resume/'.$row['resume'];
                                ?>

                                                    <div class="col-md-6">
                                                        <div class="box" style="border:1px solid black; border-radius:2vh; margin:2vh; min-height: 35vh;">
                                <div class="text">
                                    <p class="j_name">
                                        <span class="label">Job Title : </span>
                                        <?= $row['j_name']; ?>
                                    </p>
                                    <b>
                                        <p class="posted_at" style="color:#623ADA;">
                                            <span class="label">Email : </span>
                                            <?= $row["email"]?> 
                                    </b>
                                    </p>
                                    <p class="name">
                                        <span class="label">Full name : </span>
                                        <?= $row['firstname']; ?> <?= $row['lastname']; ?>
                                    </p>
                                    <p class="name">
                                        <span class="label">Degree Title : </span>
                                        <?= $row['degree_title']; ?>
                                    </p>
                                    <p class="name">
                                        <span class="label">School Name: </span>
                                        <?= $row['school_name']; ?>
                                    </p>
                                    <p class="name">
                                        <span class="label">School Year attedend: </span>
                                        <?= $row['school_year_attended']; ?>
                                    </p>
                                    <!--  <p class="posted_at">
                                        <span class="label">Birthday : </span>
                                        <?= date("m/d/Y",strtotime($row["bday"]))?>
                                        </p> -->
                                    <p class="posted_at">
                                        <span class="label">Age : </span>
                                        <?= $row["age"]?>
                                    </p>
                                    <p class="address">
                                        <span class="label">Address : </span>
                                        <?= $row['address']; ?>
                                    </p>
                                    <p class="posted_at">
                                        <span class="label">Posted at : </span>
                                        <?= date("m/d/Y",strtotime($row["created_at"]))?>
                                    </p>
                                </div>
                                <div class="box_buttons">
                                    <?php if($row["status"] == "2") {?>
                                    <button data-id="<?= $row["id"] ?>" class="button disable btn_hired" name='hired' disabled>
                                    <i class="fa fa-check"></i>
                                    HIRE
                                    </button>
                                    <button data-id="<?= $row["id"] ?>" class="button btn_decline" name='declined'>
                                    <i class="fa fa-times"></i>
                                    DECLINE
                                    </button>
                                    <button data-id="<?= $row["id"] ?>" class="button set_schedule" >
                                    <i class="fa fa-save"></i>
                                    SET SCHEDULE
                                    </button>
                                    </button>
                                    <button data-id="<?= $row["id"] ?>"  class="button btn_archive" >
                                    <i class="fa fa-archive"></i>
                                    Archive 
                                    </button>
                                    <button  class="button" data-toggle="tooltip" data-placement="top" title="View" type="button" value="<?=$resume_data; ?>" id="mybtn<?= $row["id"]; ?>" onclick="showModal('<?=$resume_data; ?>', this.id)">
                                    <i class="fa fa-file-text-o"></i>   VIEW RESUME
                                    </button>
                                    <?php }elseif($row["status"] == "3"){?>
                                    <button data-id="<?= $row["id"] ?>" class="button disable btn_hired" name='hired'>
                                    <i class="fa fa-check"></i>
                                    HIRE
                                    </button>
                                    <button data-id="<?= $row["id"] ?>" class="button btn_decline"  name='declined' disabled>
                                    <i class="fa fa-times"></i>
                                    DECLINE
                                    </button>
                                    <!-- <a href="../../resume/<?= $row["resume"] ?>" class="button" download>
                                        <i class="fa fa-file-text-o"></i>
                                        DOWNLOAD RESUME
                                        </a> -->
                                    <button  class="button" data-toggle="tooltip" data-placement="top" title="View" type="button" value="<?=$resume_data?>" id="mybtn<?= $row["id"] ?>" onclick="showModal('<?=$resume_data;?>', this.id)">
                                    <i class="fa fa-file-text-o"></i>   VIEW RESUME
                                    </button>
                                    <?php }elseif($row["status"] == "4"){?>
                                    <button  class="button" data-toggle="tooltip" data-placement="top" title="View" type="button" value="<?=$resume_data?>" id="mybtn<?= $row["id"] ?>" onclick="showModal('<?=$resume_data;?>', this.id)">
                                    <i class="fa fa-file-text-o"></i>   VIEW RESUME
                                    </button>
                                    <?php }else{?>
                                    <button data-id="<?= $row["id"] ?>" class="button btn_hired" name='hired'>
                                    <i class="fa fa-check"></i>
                                    HIRE
                                    </button>
                                    <button data-id="<?= $row["id"] ?>" class="button btn_decline" name='declined'>
                                    <i class="fa fa-times"></i>
                                    DECLINE
                                    </button>
                                    <a href="../../resume/<?= $row['resume'] ?>" class="button" download>
                                    <i class="fa fa-file-text-o"></i>
                                    DOWNLOAD RESUME
                                    </a> 
                                    <button  class="button" data-toggle="tooltip" data-placement="top" title="View" type="button" value="<?=$resume_data; ?>" id="mybtn<?= $row["id"] ?>" onclick="showModal('<?= $resume_data; ?>', this.id)">
                                    <i class="fa fa-file-text-o"></i>   VIEW RESUME
                                    </button>
                                    <button data-id="<?= $row["id"] ?>" class="button set_schedule" >
                                    <i class="fa fa-save"></i>
                                    SET SCHEDULE
                                    </button>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                            <?php } ?>
                            <?php }else{?>
                            <div class="showcase" >
                                <img src="./assets/empty.png" alt="empty" width="200">
                                <p>No Applicants's Found</p>
                            </div>
                            <?php } ?>
                        </div>
                        </div>
                    </div>
                    <?php }elseif(value("sub") == "list_archive"){?>


             <style>
                /* Medium devices (desktops, 992px and up) */
                @media (min-width: 992px) {
                    .col-md-6 {
                        flex: 0 0 50%;
                        max-width: 50%;
                    }

                    .col-md-12 {
                        flex: 0 0 100%;
                        max-width: 100%;
                    }

                    .col-md-4 {
                        flex: 0 0 33.33333%;
                        max-width: 33.33333%;
                    }
                }

                /* Extra small devices (phones, less than 576px) */
                @media (max-width: 575.98px) {
                    .col-xs-12 {
                        flex: 0 0 100%;
                        max-width: 100%;
                    }
                }

                /* Rows */
                .row {
                    display: flex;
                    flex-wrap: wrap;
                    margin-right: -15px;
                    margin-left: -15px;
                }

                /* Column gutters */
                [class*="col-"] {
                    padding-right: 15px;
                    padding-left: 15px;
                }

            </style> 
                    <div class="t1">
                        <h3>Archive</h3>
                    </div>
                    <div class="container">
                        <div class="container_title">
                            <div class="title">
                                List Archive Applicants
                            </div>
                        </div>
                        <div class="container_body">
                                        <div class="row">
                            <?php if(hasResult($load_applicants)){?>
                            <?php while($row = mysqli_fetch_assoc($load_applicants)){
                                $resume_data = getMyUrl().'/Talent-Trail/resume/'.$row['resume'];
                                ?>
                                                    <div class="col-md-4">
                                                        <div class="box" style="border:1px solid black; border-radius:2vh; margin:2vh; min-height: 35vh;">
                                <div class="text">
                                    <p class="j_name">
                                        <span class="label">Job Title : </span>
                                        <?= $row['j_name']; ?>
                                    </p>
                                    <b>
                                        <p class="posted_at" style="color:#623ADA;">
                                            <span class="label">Email : </span>
                                            <?= $row["email"]?> 
                                    </b>
                                    </p>
                                    <p class="name">
                                        <span class="label">Full name : </span>
                                        <?= $row['firstname']; ?> <?= $row['lastname']; ?>
                                    </p>
                                    <p class="name">
                                        <span class="label">Facebook : </span>
                                        <?= $row['facebook']; ?>
                                    </p>
                                    <p class="name">
                                        <span class="label">LinkedIn : </span>
                                        <?= $row['linkedin']; ?>
                                    </p>
                                    <p class="name">
                                        <span class="label">Instagram : </span>
                                        <?= $row['instagram']; ?>
                                    </p>
                                    <p class="name">
                                        <span class="label">Degree Title : </span>
                                        <?= $row['degree_title']; ?>
                                    </p>
                                    <p class="name">
                                        <span class="label">School Name: </span>
                                        <?= $row['school_name']; ?>
                                    </p>
                                    <p class="name">
                                        <span class="label">School Year attedend: </span>
                                        <?= $row['school_year_attended']; ?>
                                    </p>
                                    <!--  <p class="posted_at">
                                        <span class="label">Birthday : </span>
                                        <?= date("m/d/Y",strtotime($row["bday"]))?>
                                        </p> -->
                                    <p class="posted_at">
                                        <span class="label">Age : </span>
                                        <?= $row["age"]?>
                                    </p>
                                    <p class="address">
                                        <span class="label">Address : </span>
                                        <?= $row['address']; ?>
                                    </p>
                                    <p class="posted_at">
                                        <span class="label">Posted at : </span>
                                        <?= date("m/d/Y",strtotime($row["created_at"]))?>
                                    </p>
                                </div>
                                <div class="box_buttons">
                                    <button data-id="<?= $row["id"] ?>"  class="button btn_archive_restore" >
                                    <i class="fa fa-archive"></i>
                                    Restore 
                                    </button>
                                </div>
                            </div>
                        </div>
                            <?php } ?>
                            <?php }else{?>
                            <div class="showcase" >
                                <img src="./assets/empty.png" alt="empty" width="200">
                                <p>No Applicants's Found</p>
                            </div>
                            <?php } ?>
                        </div>
                        </div>
                    </div>
                    <?php }else{ navigate("?page=hire&sub=list"); }?>
                </div>
                <?php }else{ navigate("?page=hire&sub=list"); }?>
                <?php }elseif($page == "profile"){?>
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                <?php if(form("sub")){?>
                <div class="sidebar">
                    <div class="container_body body_image">
                        <div class="image_center_body">
                            <center> <img src="../../assets/images/<?= $u_avatar ?>" class="avatar round-image" style="border:1px solid gray"></center>
                        </div>
                        <input type="file" name="input_upload_field" id="input_upload_field" class="input_upload_field" data-set="avatar" accept="image/*">
                        <input type="file" name="input_upload_field" id="change_avatar" class="input_upload_field" data-set="avatar" data-preview="avatar" accept="image/*"
                            >
                        <label for="change_avatar" class="btn_upload_picture2" style="font-size:2vh; width:5vh; border-radius:50%; position: absolute; margin-top:11vh; margin-left:6%; background-color:gray;">
                        <i style="color:white;" class="fa fa-edit"></i>
                        </label>
                    </div>
                    <br>
                    <br>
                    <a href="?page=profile&sub=general_information" <?= (value("sub") == "general_information") ? 'class="active"' : "" ?>>
                        <p class="name"><i class="fa fa-user"></i> Account Information</p>
                    </a>
                    <a href="?page=profile&sub=company_information" <?= (value("sub") == "company_information") ? 'class="active"' : "" ?>>
                        <p class="name"><i class="fa fa-user-circle"></i> Company Information</p>
                    </a>
                    <a href="?page=profile&sub=password" <?= (value("sub") == "password") ? 'class="active"' : "" ?>>
                        <p class="name"><i class="fa fa-gear"></i> Settings</p>
                    </a>
                </div>
                <div class="content">
                    <div class="showcase" id="showcase_sub_<?= value("sub") ?>">
                        <?php if(value("sub") == "general_information"){?>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="container">
                                    <div class="container_title">
                                        Personal information
                                    </div>
                                    <div class="container_body">
                                        <form method="post" class="frm_<?= $page ?>">
                                            <label for="tb_firstnmae">First name</label>
                                            <div class="field">
                                                <input type="text" name="tb_firstname" id="tb_firstname" placeholder="First name" value="<?= $u_fname ?>">
                                            </div>
                                            <label for="tb_lastname">Last name</label>
                                            <div class="field">
                                                <input type="text" name="tb_lastname" id="tb_lastname" placeholder="Last name" value="<?= $u_lname ?>">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-xs-12">
                                                    <label for="tb_age">Age</label>
                                                    <div class="field">
                                                        <input type="number" name="tb_age" id="tb_age" placeholder="Age" value="<?= $u_age ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <label for="tb_bday">Birthday</label>
                                                    <div class="field">
                                                        <input type="date" name="tb_bday"  id="tb_bday" value="<?= $u_bday ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="tb_address">Address</label>
                                            <div class="field">
                                                <textarea name="tb_address" class="tb_address" id="tb_address" placeholder="Address"><?= $u_address ?></textarea>
                                            </div>
                                            <button class="button btn_submit" style="font-size:1.5vh; width:25%;">
                                            SAVE
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="container">
                                    <div class="container_title">
                                        Manage Password
                                    </div>
                                    <div class="container_body">
                                        <form method="post" class="frm_<?= $page ?>_password">
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
                                            <button class="button btn_submit"  style="font-size:1.5vh; width:25%;">
                                            SAVE
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }elseif(value("sub") == "company_information"){?>
                        <div class="row">
                            <div class="col-md-3 col-xs-12">
                                <div class="container">
                                    <div class="container_title">
                                        Company Logo
                                    </div>
                                    <div class="container_body body_image">
                                        <img src="../../assets/images/<?= $c_logo ?>" class="company_logo_preview profile_picture" style="width:21vh; height:21vh;">
                                        <input 
                                            type="file"
                                            name="input_upload_field"
                                            id="change_company_logo"
                                            class="input_upload_field"
                                            data-set="company_logo"
                                            data-preview="company_logo_preview"
                                            accept="image/*"
                                            >
                                        <br>
                                        <label for="change_company_logo" class="btn_upload_picture" style="font-size:1.5vh;">CHANGE COMPANY LOGO</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-xs-12">
                                <div class="container">
                                    <div class="container_title">
                                        Company Banner
                                    </div>
                                    <div class="container_body body_image">
                                        <img src="../../assets/images/<?= $c_banner ?>" class="company_banner_preview profile_picture">
                                        <input 
                                            type="file"
                                            name="input_upload_field"
                                            id="change_company_banner"
                                            class="input_upload_field"
                                            data-set="company_banner"
                                            data-preview="company_banner_preview"
                                            accept="image/*"
                                            >
                                        <br>
                                        <label for="change_company_banner" class="btn_upload_picture" style="font-size:1.5vh;">CHANGE COMPANY BANNER</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="container" style="max-width:100%; width:100%;">
                                    <div class="container_title">
                                        Company Information
                                    </div>
                                    <div class="container_body">
                                        <form method="post" class="frm_<?= $page ?>_company">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-12">
                                                    <label for="tb_name">Company name</label>
                                                    <div class="field">
                                                        <input type="text" name="tb_name" id="tb_name" placeholder="First name" value="<?= $c_name ?>">
                                                    </div>
                                                    <label for="tb_cnum">Contact number</label>
                                                    <div class="field">
                                                        <input type="number" name="tb_cnum" id="tb_cnum" placeholder="Contact number" value="<?= $c_cnum ?>">
                                                    </div>
                                                    <label for="tb_position">Position <br>(your position)</label>
                                                    <div class="field">
                                                        <input type="text" name="tb_position" id="tb_position" placeholder="Position (Your position)" value="<?= $c_position ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <label for="tb_address">Address</label>
                                                    <div class="field">
                                                        <textarea name="tb_address" class="tb_address" id="tb_address" placeholder="Address" style="height:21vh;"><?= $c_address ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="button btn_submit" style="font-size:1.5vh; width:25%;">
                                            SAVE
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }elseif(value("sub") == "password"){?>
                            <style>
                                .download-btn {
                                display: inline-block;
                                padding: 10px 20px;
                                background-color: #007bff; /* Change the background color as needed */
                                color: white;
                                text-decoration: none;
                                border-radius: 5px;
                            }

                            .download-btn:hover {
                                background-color: #0056b3; /* Change the background color of the button on hover */
                            }

                            .logo {
                                vertical-align: middle;
                                margin-right: 10px; /* Adjust the spacing between the logo and the label */
                            }

                            </style>
                        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                        <div class="container" style="width:100%;">
                            <div class="row">
                                <div class="col-md-5 col-xs-12">
                                    <div class="container_title">
                                        Account settings
                                    </div>
                                    <div class="container_body">
                                        <form method="post" class="frm_<?= $page ?>_account">
                                            <div class="field">
                                                <label for="tb_email">Email Address:</label>
                                                <input type="email" name="tb_email" id="tb_email" placeholder="Email" value="<?= $u_email ?>">
                                            </div>
                                            <div class="field">
                                                <label for="tb_cnum">Contact number: </label>
                                                <input type="number" name="tb_cnum" id="tb_cnum" placeholder="Contact number" value="<?= $u_cnum ?>">
                                            </div>
                                            <button class="button btn_submit" style="font-size:1.5vh; width:25%;">
                                            SAVE
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-7 col-xs-12">

                                    <div class="container_title">
                                        Account Documents
                                    </div>
                                    <div class="container_body">
                                        <form method="POST" action="" enctype="multipart/form-data">

                                        <div class="row">
                                        <div class="col-md-5 col-xs-12">
                                          <div class="form-group">
                                           <label class="control-label">Update Letter of Intent</label>
                                           <input style="display: block;" class="form-control"  type="file" name="letterofcontent" id="letterofcontent" value="" >
                                          </div>
                                        </div>
                                        <div class="col-md-7 col-xs-12">
                                            <a href="../../assets/documents/<?= $datauserdocuments["c_doc1"] ?>" download class="download-btn" style="font-size:1.5vh; background-color:white; color:black; border:1px solid black; border-radius:1vh;">
                                                <img src="../../assets/images/logofile.png" alt="Logo" class="logo" style="width:50px; height:50px;">
                                                Download Submitted
                                            </a>
                                        </div>
                                        </div>
                                        <br>

                                        <div class="row">
                                        <div class="col-md-5 col-xs-12">
                                          <div class="form-group">
                                           <label class="control-label">Update Company Profile</label>
                                           <input style="display: block;" class="form-control"  type="file" name="companyprofile" id="companyprofile" value="" >
                                          </div>
                                        </div>
                                        <div class="col-md-7 col-xs-12">
                                            <a href="../../assets/documents/<?= $datauserdocuments["c_doc2"] ?>" download class="download-btn" style="font-size:1.5vh; background-color:white; color:black; border:1px solid black; border-radius:1vh;">
                                                <img src="../../assets/images/logofile.png" alt="Logo" class="logo" style="width:50px; height:50px;">
                                                Download Submitted
                                            </a>
                                        </div>
                                      </div>
                                        <br>


                                        <div class="row">
                                        <div class="col-md-5">
                                          <div class="form-group">
                                           <label class="control-label">Update BIR Form 2303</label>
                                           <input style="display: block;" class="form-control"  type="file" name="birform" id="birform" value="" >
                                          </div>
                                        </div>
                                        <div class="col-md-7 col-xs-12">
                                            <a href="../../assets/documents/<?= $datauserdocuments["c_doc3"] ?>" download class="download-btn" style="font-size:1.5vh; background-color:white; color:black; border:1px solid black; border-radius:1vh;">
                                                <img src="../../assets/images/logofile.png" alt="Logo" class="logo" style="width:50px; height:50px;">
                                                Download Submitted
                                            </a>
                                        </div>
                                      </div>
                                        <br>


                                        <div class="row">
                                        <div class="col-md-5 col-xs-12">
                                          <div class="form-group">
                                           <label class="control-label">Update Business Permit</label>
                                           <input style="display: block;" class="form-control"  type="file" name="businesspermit" id="businesspermit" value="" >
                                          </div>
                                        </div>
                                        <div class="col-md-7 col-xs-12">
                                            <a href="../../assets/documents/<?= $datauserdocuments["c_doc4"] ?>" download class="download-btn" style="font-size:1.5vh; background-color:white; color:black; border:1px solid black; border-radius:1vh;">
                                                <img src="../../assets/images/logofile.png" alt="Logo" class="logo" style="width:50px; height:50px;">
                                                Download Submitted
                                            </a>
                                        </div>
                                      </div>
                                        <br>

                                        <div class="row">
                                        <div class="col-md-5 col-xs-12">
                                          <div class="form-group">
                                           <label class="control-label">Update SEC / DTI Permit</label>
                                           <input style="display: block;" class="form-control"  type="file" name="secdtipermit" id="secdtipermit" value="" >
                                          </div>
                                        </div>
                                        <div class="col-md-7 col-xs-12">
                                            <a href="../../assets/documents/<?= $datauserdocuments["c_doc5"] ?>" download class="download-btn" style="font-size:1.5vh; background-color:white; color:black; border:1px solid black; border-radius:1vh;">
                                                <img src="../../assets/images/logofile.png" alt="Logo" class="logo" style="width:50px; height:50px;">
                                                Download Submitted
                                            </a>
                                        </div>
                                      </div>
                                        <br>


                                        <div class="row">
                                        <div class="col-md-5 col-xs-12">
                                          <div class="form-group">
                                           <label class="control-label">Update License</label>
                                           <input style="display: block;" class="form-control"  type="file" name="licensepermit" id="licensepermit" value="" >
                                          </div>
                                        </div>
                                        <div class="col-md-7 col-xs-12">
                                            <a href="../../assets/documents/<?= $datauserdocuments["c_doc6"] ?>" download class="download-btn" style="font-size:1.5vh; background-color:white; color:black; border:1px solid black; border-radius:1vh;">
                                                <img src="../../assets/images/logofile.png" alt="Logo" class="logo" style="width:50px; height:50px;">
                                                Download Submitted
                                            </a>
                                        </div>
                                      </div>
                                            <button type="submit" id="updatedocuments" name="updatedocuments" class="button btn_submit" style="font-size:1.5vh; width:25%;">
                                            SAVE
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }else{ navigate("?page=profile&sub=general_information"); }?>
                    </div>
                </div>
                <?php }else{ navigate("?page=profile&sub=general_information"); }?>
                <?php }elseif($page == "settings"){?>    
                4
                <?php }else{ navigate("./"); }?>
            </div>
        </div>
        <!-- modal scroll -->
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <div class="content">
                    <div class="embed-container">
                        <iframe src=""  frameborder="0"  onload="resizeIframe(this)" id="documentsDetails"  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" loading="lazy" style="height: 1300px;">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal scroll -->
        <!-- The Modal -->
        <div id="set_schedule" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close" onclick="closeModalSchedule()">&times;</span>
                <form method="post" id="form_set_schedule">
                    <div class="content" id="content_schedule">
                        <div id="body_sechudel">
                        </div>
                    </div>
                    <button class="button btn_schedule_set"  >
                    <i class="fa fa-archive"></i>
                    SAVE  
                    </button>
                </form>
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
            url : "../../controller/NotificationAction.php",
            method: "post",
            data : {id:id},
            success: (res) => {
                console.log(res);
                if(res == "3" || res == "2"){
                    if(res == "3"){
                        setTimeout(() => {
                            window.location.href="./profile/?page=general_information"
                        }, 300);
                    } else {
                        setTimeout(() => {
                            window.location.href="/Talent-Trail/dashboard/company/?page=hire&sub=applicants"
                        }, 300);
                    }
                } else {
                    location.reload();
                }
            }
        });
    }
    
    // // Get the modal
    // var modal = document.getElementById("myModal");
    
    // // Get the button that opens the modal
    // var btn = document.getElementById("myBtn");
    
    // // Get the <span> element that closes the modal
    // var span = document.getElementsByClassName("close")[0];
    
    // // When the user clicks on the button, open the modal
    // btn.onclick = function() {
    //   modal.style.display = "block";
    //   document.getElementById("documentsDetails").src = btn.value;
    // }
    
     function resizeIframe(obj) {
        obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
      }
    
    
    function showModal(documentDetails, getID){
        // // Get the modal
         document.getElementById("documentsDetails").src = '';
        var modal = document.getElementById("myModal");
        modal.style.display = "block";
        // // Get the button that opens the modal
        var btn = document.getElementById(getID);
    
        // // When the user clicks on the button, open the modal
        document.getElementById("documentsDetails").src = documentDetails;
        document.getElementById("documentsDetails").style.height = "1363px";
    }
    
    function closeModal(){
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }
    
    function closeModalSchedule(){
        var modal = document.getElementById("set_schedule");
        modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {
    //   if (event.target == modal) {
    //     modal.style.display = "none";
    //   }
    // }
    
</script>