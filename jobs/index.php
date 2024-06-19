<?php
    session_start();
    require_once '../config.php';
    require_once '../functions.php';
    require_once '../session.php';
    
    $job_area_id = "";
    if(isset($_SESSION["islogin"]) && $_SESSION["islogin"] == True){
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
    }
    
    if(form("search")){
        $onsearch = true;
        $search = mysqli_value($con,"search");
        
        if($search == 'Jobs for PWD')
        {
            $result_query = mysqli_query($con,"
            SELECT
               
                tbl_jobs.id,
                tbl_company.c_name,
                tbl_company.c_address,
                tbl_company.c_cnum,
                tbl_company.c_logo,
                tbl_accounts.firstname,
                tbl_accounts.lastname,
                tbl_jobs.j_name,
                tbl_jobs.j_age,
                tbl_jobs.j_min,
                tbl_jobs.j_max,
                tbl_jobs.j_currency_symbol,
                tbl_jobs.j_description,
                tbl_jobs.j_created_at,
                tbl_jobs.j_job_category,
                tbl_jobs.j_pwd_type
            FROM
                tbl_jobs
            INNER JOIN tbl_company ON tbl_company.userid = tbl_jobs.userid
            INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_jobs.userid
        
            WHERE
            tbl_jobs.j_pwd_type IS NOT NULL
            ");
        }else{

            $result_query = mysqli_query($con,"
            SELECT
               
                tbl_jobs.id,
                tbl_company.c_name,
                tbl_company.c_address,
                tbl_company.c_cnum,
                tbl_company.c_logo,
                tbl_accounts.firstname,
                tbl_accounts.lastname,
                tbl_jobs.j_name,
                tbl_jobs.j_age,
                tbl_jobs.j_min,
                tbl_jobs.j_max,
                tbl_jobs.j_currency_symbol,
                tbl_jobs.j_description,
                tbl_jobs.j_created_at,
                tbl_jobs.j_job_category,
                tbl_jobs.j_pwd_type
            FROM
                tbl_jobs
            INNER JOIN tbl_company ON tbl_company.userid = tbl_jobs.userid
            INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_jobs.userid
        
            WHERE
            tbl_company.c_name LIKE '%$search%' OR
            tbl_jobs.j_name LIKE '%$search%' OR
            tbl_company.c_address LIKE '%$search%' OR 
            tbl_jobs.j_job_category LIKE '%$search%'
            ");
        }
    }else{
        $onsearch = false;
    
        if($islogin){
            $result_query = mysqli_query($con,"
            SELECT
                tbl_jobs.id,
                tbl_company.c_name,
                tbl_company.c_address,
                tbl_company.c_cnum,
                tbl_company.c_logo,
                tbl_accounts.firstname,
                tbl_accounts.lastname,
                tbl_jobs.j_name,
                tbl_jobs.j_age,
                tbl_jobs.j_min,
                tbl_jobs.j_max,
                tbl_jobs.j_currency_symbol,
                tbl_jobs.j_description,
                tbl_jobs.j_created_at,
                tbl_jobs.j_job_category,
                tbl_jobs.j_pwd_type
            FROM
                tbl_jobs
            INNER JOIN tbl_company ON tbl_company.userid = tbl_jobs.userid
            INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_jobs.userid
            
            ");
        }else{
            $result_query = mysqli_query($con,"
            SELECT
                tbl_jobs.id,
                tbl_company.c_name,
                tbl_company.c_address,
                tbl_company.c_cnum,
                tbl_company.c_logo,
                tbl_accounts.firstname,
                tbl_accounts.lastname,
                tbl_jobs.j_name,
                tbl_jobs.j_age,
                tbl_jobs.j_min,
                tbl_jobs.j_max,
                tbl_jobs.j_currency_symbol,
                tbl_jobs.j_description,
                tbl_jobs.j_created_at,
                tbl_jobs.j_job_category,
                tbl_jobs.j_pwd_type
            FROM
                tbl_jobs
            INNER JOIN tbl_company ON tbl_company.userid = tbl_jobs.userid
            INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_jobs.userid
            
            ");
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
        <title>Talent Trail - JOBS</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" defer></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="../verify.css">
        <link rel="stylesheet" href="../header.css">
        <link rel="stylesheet" href="../notify_style.css">
                    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
    .button-list {
        display: flex; /* Use flexbox to align buttons in a row */
        justify-content: center; /* Center the buttons horizontally */
        margin-top: 20px; /* Adjust as needed */
    }
            .container_search2 {
           
                background-color: #112D4E;;
                background-size: fill;
                background-repeat: no-repeat;
                padding: 20px;
                text-align: center;
                height:60vh;
                width:99%;
                border-radius:2vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }


            .container_search2 h1,
            .container_search2 h2 {
                color: white;
            }

            .search_form {
                margin-top: 20px;
            }
            .field {
                position: relative;
                display: inline-block;
                vertical-align: top; /* Add this line to align elements to the top */
            }
            .field input[type="text"] {
                padding: 10px;
                width: 90vh; 
                border: none;
                border-radius: 5px;
                font-size: 16px;
            }

            .field i.fa {
                position: absolute;
                left: 10px;
                top: 50%;
                transform: translateY(-50%);
                color: #666;
            }

            button[type="submit"] {
                padding: 10px 20px;
                background-color: #337ab7;
                border: none;
                border-radius: 15px;
                color: white;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            button[type="submit"]:hover {
                background-color: #286090;
            }

            .black-glass-background {
                background-color: rgba(0, 0, 0, 0.5); /* Black with 50% opacity */
                color: white; /* Text color */
                border: none;
                border-radius: 5px;
                padding: 10px;
                width: 100%; /* Make the input field take up full width */
                font-size: 16px;
                outline: none; /* Remove default focus outline */
            }

            .black-glass-background::placeholder {
                color: white; /* Placeholder text color */
            }

            /* Media Query for Mobile Devices */
            @media only screen and (max-width: 768px) {
                .field input[type="text"],
                .black-glass-background {
                    width: 90%; /* Adjust the width for smaller screens */
                    max-width: none; /* Remove max-width for smaller screens */
                }
            }

            .searchbarstyle {
                height:7vh; border-radius:3vh 0 0 3vh !important; font-size:2.5vh !important; text-align:center;
            }
            .buttonstyle{
                height:7vh; border-radius:0 3vh 3vh 0 !important; !important;
            }
            /* Media Query for Mobile Devices */
            @media only screen and (max-width: 768px) {
                
                .searchbarstyle {
                    height:7vh;border-radius: 0 !important; font-size:1.5vh !important; width:40vh !important; text-align:center;
                }
                .buttonstyle{
                    height:7vh; border-radius: 0 !important; font-size:1.5vh !important; width:40vh !important;
                }
                .button-list{
                    display:none;
                }
            }

            .glass-button {
                padding: 10px 20px;
                background-color: white; /* Transparent background */
                border: none;
                border-radius: 5px;
                color: white;
                font-size: 16px;
                cursor: pointer;
                transition: transform 0.3s; /* Added transition */
                color:black;
                margin-top:1vh;
        margin: 0 10px; /* Add margin to separate buttons */
            }

            .glass-button:hover {
                transform: translateY(-5px); /* Move up slightly on hover */
                background-color: #112D4E; /* Transparent background */
                color:white;
            }

    .box {
        display: inline-block;
        padding: 15px 20px;
        background-color: #f0f0f0; /* Light gray background color */
        color: #333; /* Dark text color */
        text-decoration: none; /* Remove underline */
        border-radius: 18px; /* Rounded corners */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        transition: transform 0.2s, box-shadow 0.2s; /* Smooth transition for hover effects */
        width: 100%;
        margin-bottom:2vh;
        border: 1px solid gray;
    }

    .box:hover {
        transform: translateY(-2px); /* Move box up slightly on hover */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
    }
    .location-box {
        display: inline-block;
        padding: 4.5px;
        background-color: orange;
        color: black;
        border-radius: 3vh;
        width: auto; /* Adjust width as needed */
        text-align: center;
        margin: 0; /* Remove default margin */
        vertical-align: top; /* Align elements from the top */
        border: 0.5px solid gray;
        margin-bottom:1vh;
        font-size:1.5vh;

    }
        </style>
    </head>
    <body>
        <div class="main">
            <?php include '../header2.php' ?>
            <div class="body_search">
            <center>
                <div class="container_search2">
                    <h1>FIND YOUR DREAM JOB!</h1>
                    <?php if(isset($_SESSION["islogin"]) && $_SESSION["islogin"] == True){ ?>
                        <h2 style="margin-top:-2vh;">Within <?php echo $job_area_location; ?></h2>
                    <?php } ?>
                    <form action="" class="search_form" method="get">
                        <div class="field">
                            <input type="text" name="search" id="search" value="<?= ($onsearch) ? value("search") : "" ?>"placeholder="Search Job title, Company Name and City"  class="black-glass-background searchbarstyle" required>
                        </div>
                        <button type="submit" class="buttonstyle" style="background-color:white; color:black; border: solid 1px black;">
                            <i class="fa fa-search"></i> Search
                        </button>
                    </form>
                    <div class="button-list">

                        <button disabled class="glass-button">Try <i class='fa fa-arrow-right'></i></button>

                            <form action="" method="get">
                                <input type="hidden" name="search" id="search" value="Jobs for PWD">
                                <button type="submit" class="glass-button"><i class="fa fa-wheelchair"></i> Jobs For PWD</button>
                            </form>
                        <?php

                         $sql3 = "SELECT * FROM tbl_jobareas LIMIT 2 ";
                         $result3 = mysqli_query($con, $sql3);
                         if ($result3) {
                         while ($row3 = mysqli_fetch_assoc($result3)) { ?>
                            <form action="" method="get">
                                <input type="hidden" name="search" id="search" value="<?php echo $row3['Location']; ?>">
                                <button type="submit" class="glass-button"><i class="fa fa-map-marker"></i> <?php echo $row3['Location']; ?></button>
                            </form>
                        <?php } } ?>



                        <?php
                         $sql3 = "SELECT * FROM tbl_jobs WHERE j_job_category IS NOT NULL  GROUP BY j_job_category LIMIT 5";
                         $result3 = mysqli_query($con, $sql3);
                         if ($result3) {
                         while ($row3 = mysqli_fetch_assoc($result3)) { ?>
                            <form action="" method="get">
                                <input type="hidden" name="search" id="search" value="<?php echo $row3['j_job_category']; ?>">
                                <button type="submit" class="glass-button"><i class="fa fa-tasks"></i> <?php echo $row3['j_job_category']; ?> Job</button>
                            </form>
                        <?php } } ?>
                    </div>
                </div>
            </center>
            <br><br>

                <div class="content">
                    <div class="container recommended" style="margin-top:-5vh; margin-bottom:5vh; width:100% !important; max-width:100% !important; ">
                        <div class="container_title">
                            <?php if($onsearch){ ?>
                            Result-<?= mysqli_num_rows($result_query) ?>
                            <?php }else{ ?>
                            <?= ($islogin) ? "Recommended Jobs" : "Featured Jobs" ?>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                <?php if(hasResult($result_query)){?>
                                <?php while($row = mysqli_fetch_assoc($result_query)){?>
                                <div class="col-md-4">
                            <?php 
    if($islogin){ ?>
                                    <a class="box" href="view.php?id=<?= $row["id"]?>" style="background-color:white;">
                            <?php }else{ ?>

                            <a class="box" href="/<?= $__name__ ?>/auth?a=already" style="background-color:white;">
                            <?php } ?>
                                        <div class="box_header">
                                            <div class="box_header_title" style="font-weight:bold; font-size:2.2vh;">
                                                <?= $row["j_name"]?>
                                            </div>
                                            <div class="box_header_sub">
                                                <p style="font-size:1.5vh; color:gray;">
                                                    <i class="fa fa-marker"></i>
                                                    <?= $row["c_address"]?>
                                                </p>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p style="font-weight:bold;">
                                                            Offer:  
                                                            &#8369; <?= number_format($row['j_min'])." - &#8369;  ".number_format($row['j_max']) ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p style="float:right;">
                                                            <i class="fa fa-calendar"></i>
                                                            <?= date("m-d-Y",strtotime($row["j_created_at"]))?>
                                                        </p>
                                                    </div>
                                                </div>

                                                <?php
                                                    $companyname = $row["c_name"];
                                                    $sql3 = "SELECT * FROM tbl_company as a inner join tbl_accounts as b on a.userid = b.id inner join tbl_jobareas as c on b.job_area_id = c.id WHERE a.c_name = '$companyname'";
                                                    $result3 = mysqli_query($con, $sql3);
                                                        if ($result3) {
                                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                                                $job_area_logo = $row3['logo_area'];
                                                                $job_area_title = $row3['title_area'];
                                                                $job_area_location = $row3['Location'];
                                                        }
                                                    }
                                                    ?>
                                                    <p class="location-box" style="background-color: #EBFBFF;">
                                                        <i class="fa fa-map-marker"></i>
                                                        <?php echo $job_area_location; ?>
                                                    </p>
                                                    <p class="location-box" style="background-color: #D1EFFF;">
                                                        <i class="fa fa-tasks"></i>
                                                        <?php echo $row["j_job_category"]; ?> Job
                                                    </p>
                                                    <?php if($row["j_pwd_type"] <> ''){ ?>

                                                    <p class="location-box" style="background-color: #A6E0FF;">
                                                        <i class="fa fa-wheelchair"></i>
                                                        Open for PWD ( <?php echo $row["j_pwd_type"]; ?> )
                                                    </p>
                                                    <?php } ?>
                                                    <hr>
                                                    <?php
                                                    if($row["c_logo"] == ""){
                                                        $row["c_logo"] = "LOGO.png";
                                                    } 
                                                    ?>
                                                    <img src="../assets/images/<?php echo $row["c_logo"]; ?>" style="border-radius:50%; width:5vh; height:5vh; border:1px solid gray;">
                                                    <?= $row["c_name"]?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php } ?>
                                <?php }else{?>
                                <div class="not_found">
                                    <img src="../assets/empty.png" >
                                    <p>No Result</p>
                                </div>
                                <?php }?>
                                </div>
                            </div>
                        </div>
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