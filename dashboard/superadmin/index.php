<?php
session_start();
require_once '../../config.php';
require_once '../../functions.php';
require_once '../../session.php';


$query = "SELECT type, COUNT(*) AS count FROM tbl_accounts GROUP BY type";
$result = mysqli_query($con, $query);

// Store data in an associative array
$userCounts = array();
while ($row = mysqli_fetch_assoc($result)) {
    $userCounts[$row['type']] = $row['count'];
}

setlocale(LC_MONETARY, "en_US");

if ($islogin) {
    if ($u_type == 0) {
        $page = (form("page")) ? value("page") : "dashboard";

        $load_jobs = mysqli_query($con, "SELECT * FROM `tbl_jobs`");
        $count_jobs = mysqli_num_rows($load_jobs);

        $load_company = mysqli_query($con, "SELECT * FROM `tbl_company`");
        $count_company = mysqli_num_rows($load_company);

        if (form("manage")) {
            $update = true;
            $id = mysqli_value($con, "manage");
            if (is_numeric($id)) {
                $manage_Job = mysqli_query($con, "SELECT * FROM `tbl_jobs` WHERE id = '$id'");
                if (hasResult($manage_Job)) {
                    $data = mysqli_fetch_assoc($manage_Job);
                } else {
                    $update = false;
                }
            } else {
                $update = false;
            }
        } else {
            $update = false;
        }

        if (form("filter") && value("sub") == "applicants") {
            $filter = strtolower(mysqli_value($con, "filter"));
            if ($filter == "pending") {
                $load_applicants = mysqli_query($con, "SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS 'resume', tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.status = 1");
            } elseif ($filter == "hired") {
                $load_applicants = mysqli_query($con, "SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS 'resume', tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.status = 2 and tbl_applicants.is_archieve = 0");
            } elseif ($filter == "declined") {
                $load_applicants = mysqli_query($con, "SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS 'resume', tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.status = 3");
            } elseif ($filter == "cancelled") {
                $load_applicants = mysqli_query($con, "SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS 'resume', tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.status = 4");
            } else {
                $load_applicants = mysqli_query($con, "SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS 'resume', tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid ");
            }

            if (value("sub") == "is_archieve") {
                $load_applicants = mysqli_query($con, "SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS 'resume', tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.is_archieve = 1");
            }

        } else {
            $filter = "all";
            $load_applicants = mysqli_query($con, "SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS 'resume', tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid");

            if (value("sub") == "is_archieve") {
                $load_applicants = mysqli_query($con, "SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS 'resume', tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.is_archieve = 1");
            }
        }

        $count_applicants = mysqli_num_rows($load_applicants);

        if (form("view") && value("sub") == "company") {
            $company_id = mysqli_value($con, "view");

            if (is_numeric($company_id)) {
                $validate_company = mysqli_query($con, "
                SELECT
                    tbl_accounts.firstname,
                    tbl_accounts.lastname,
                    tbl_company.*
                FROM
                    `tbl_company`
                INNER JOIN tbl_accounts ON
                    tbl_accounts.id = tbl_company.userid
                WHERE
                    tbl_company.id =  $company_id
                ");
                if (hasResult($validate_company)) {
                    $company_view = true;
                    $data = mysqli_fetch_assoc($validate_company);

                    $publisher_name = $data["firstname"] . " " . $data["lastname"];
                    $company_name = $data["c_name"];
                    $company_address = $data["c_address"];
                    $company_cnum = $data["c_cnum"];
                    $company_position = $data["c_position"];
                    $company_created_at = $data["created_at"];


                    $load_company_reports = mysqli_query($con, "
                        SELECT
                            tbl_accounts.firstname,
                            tbl_accounts.lastname,
                            tbl_company_reports.*
                        FROM
                            `tbl_company_reports`
                        INNER JOIN tbl_accounts ON
                            tbl_accounts.id = tbl_company_reports.reported_by
                        WHERE
                            `company_id` = $company_id
                    ");
                } else {
                    $company_view = false;
                }
            } else {
                $company_view = false;
            }
        } else {
            $company_view = false;
        }



        if (form("filter") && value("sub") == "list" && value("page") == "accounts") {
            $filter = strtolower(mysqli_value($con, "filter"));

            if ($filter == "all") {
                $load_accounts = mysqli_query($con, "SELECT * FROM `tbl_accounts`  ORDER BY type ASC");
            } else {
                function filter($filter)
                {
                    if ($filter == "superadmin") {
                        return 0;
                    }
                    if ($filter == "admin") {
                        return 1;
                    }
                    if ($filter == "company") {
                        return 2;
                    }
                    if ($filter == "client") {
                        return 3;
                    }
                }

                $account_type = filter($filter);

                $load_accounts = mysqli_query($con, "SELECT * FROM `tbl_accounts` WHERE type = $account_type  ORDER BY type ASC");
            }
        } elseif (value("sub") == "pending" && value("page") == "accounts") {
            $load_accounts = mysqli_query($con, "SELECT * FROM `tbl_accounts` WHERE status_id = 0  ORDER BY type ASC");
        } else {
            $load_accounts = mysqli_query($con, "SELECT * FROM `tbl_accounts` ORDER BY type ASC");
        }
    } else {
        navigate("../../");
    }
} else {
    navigate("../../");
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Talent Trail - Dashboard</title>
    <link rel="icon" href="../../assets/LOGO.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">


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
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="file"],
        input[type="number"],
        textarea {
            border-radius: 5px;
            /* Adjust the value as needed */
        }
    </style>
    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 2%;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
        }

        .image_id {
            margin: 0px auto;
            width: auto;
            text-align: center;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Style for the FontAwesome icon */
        .modal-icon {
            font-size: 48px;
            /* Adjust the size as needed */
            color: #333;
            /* Adjust the color as needed */
            margin-bottom: 20px;
            /* Add space below the icon */
        }

        /* Style for the text below the icon */
        .modal-text {
            font-size: 18px;
            /* Adjust the size as needed */
            color: #555;
            /* Adjust the color as needed */
        }
    </style>

    <!-- javascript -->
    <script src="js/index.js" defer></script>
    <script src="js/post_job.js" defer></script>
    <script src="js/edit_job.js" defer></script>
    <script src="js/manage_applicants.js" defer></script>
    <script src="js/update_account.js" defer></script>
    <script src="js/update_general.js" defer></script>
    <script src="js/update_company.js" defer></script>
    <script src="js/delete_company.js" defer></script>
    <script src="../ckeditor/ckeditor.js"></script>




</head>

<body>
    <div class="main">
        <div class="header">
            <div class="box">
                <a href="../../" class="header_logo">
                    <img src="../../assets/LOGO.png" alt="logo">
                    <p style="margin-bottom:0;">Talent Trail</p>
                </a>
                <span></span>
                <div class="navigation desktop_icon_profile">
                    <a href="?page=dashboard">
                        Dashboard
                    </a>
                    <a href="?page=hire">
                        Company
                    </a>
                    <a href="?page=accounts">
                        Accounts
                    </a>
                    <a href="?page=areas&sub=list">
                        Job Areas
                    </a>
                </div>
            </div>


            <div class="navigation desktop_icon_profile">
                <button class="btn_user">

                    <?= $u_email ?> <i class="fa fa-user"></i>
                </button>
            </div>
            <div class="navigation mobile_icon_profile">
                <button class="btn_user">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </div>
        <?php if ($page == "areas") {
            ?>

            <div class="body" id="body_page_accounts">
                <?php
        } else {
            ?>

                <div class="body" id="body_page_<?= $page ?>">
                    <?php
        }
        ?>
                <div class="profile_box" style="display:none">
                    <div class="hambuger_menu_desktop">
                        <div class="profile_box_header">
                            <p class="profile_name">
                                <?= $u_fname . " " . $u_lname ?>
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
                            <a href="?page=dashboard" class="btn_logout">Dashboard</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="?page=hire" class="btn_logout">Company</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="?page=hire&sub=jobs" class="btn_logout">Job's</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="?page=hire&sub=applicants" class="btn_logout">Applicants</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="?page=accounts&sub=pending" class="btn_logout">Pending Accounts</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="?page=accounts" class="btn_logout">Accounts</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="?page=profile" class="btn_logout">Account Information</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="./?page=profile&sub=password" class="btn_logout">Password</a>
                        </div>
                        <div class="profile_box_footer">
                            <a href="../../logout.php" class="btn_logout">Logout</a>
                        </div>
                    </div>

                </div>
                <?php if ($page == "dashboard") { ?>
                    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

                    <h2>Hi,
                        <?= $u_fname . " " . $u_lname ?> 👋
                    </h2>
                    <div class="dashboard">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="box" style="display:block; margin-bottom:2vh;">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-12">
                                                    <center> <i style="font-size:6vh;" class="fa fa-envelope-open-o"></i>
                                                    </center>
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
                                            <hr>
                                            <center>
                                                <a href="./?page=hire&sub=jobs"
                                                    style="background-color:white; color:black;">
                                                    VIEW
                                                </a>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="box" style="display:block; margin-bottom:2vh;">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-12">
                                                    <center> <i style="font-size:6vh;" class="fa fa-users"></i></center>
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <center>
                                                        <div class="box_name" style="font-weight:bold; font-size:2vh;">
                                                            Applicants
                                                        </div>
                                                        <div class="box_count" style="font-weight:bold; font-size:2.5vh;">
                                                            <?= $count_applicants ?>
                                                        </div>
                                                </div>
                                            </div>
                                            </center>
                                            <hr>
                                            <center>
                                                <a href="?page=hire&sub=applicants"
                                                    style="background-color:white; color:black;">
                                                    VIEW
                                                </a>
                                            </center>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12">
                                        <div class="box" style="display:block;">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-12">
                                                    <center> <i style="font-size:6vh;" class="fa fa-building"></i></center>
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <center>
                                                        <div class="box_name" style="font-weight:bold; font-size:2vh;">
                                                            Companies
                                                        </div>
                                                        <div class="box_count" style="font-weight:bold; font-size:2.5vh;">
                                                            <?= $count_company ?>
                                                        </div>
                                                </div>
                                            </div>
                                            </center>
                                            <hr>
                                            <center>
                                                <a href="?page=hire&sub=company"
                                                    style="background-color:white; color:black;">
                                                    VIEW
                                                </a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="box">
                                    <canvas id="userPieChart" width="600" height="600"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        var ctx = document.getElementById('userPieChart').getContext('2d');
                        var userCounts = <?php echo json_encode($userCounts); ?>;

                        var data = {
                            labels: ['Super Admin', 'Admin', 'Company', 'Client'],
                            datasets: [{
                                data: [userCounts['0'] || 0, userCounts['1'] || 0, userCounts['2'] || 0, userCounts['3'] || 0],
                                backgroundColor: ['#D9D9D9', '#36A2EB', '#FFCE56', '#FF6384'],
                                hoverBackgroundColor: ['#D9D9D9', '#36A2EB', '#FFCE56', '#FF6384']
                            }]
                        };

                        var options = {
                            responsive: true,
                            maintainAspectRatio: false,
                            tooltips: {
                                callbacks: {
                                    label: function (tooltipItem, data) {
                                        var dataset = data.datasets[tooltipItem.datasetIndex];
                                        var total = dataset.data.reduce((prev, curr) => prev + curr, 0);
                                        var currentValue = dataset.data[tooltipItem.index];
                                        var percentage = Math.round((currentValue / total) * 100);
                                        return percentage + "%";
                                    }
                                }
                            }
                        };

                        var myPieChart = new Chart(ctx, {
                            type: 'pie',
                            data: data,
                            options: options
                        });
                    </script>

                <?php } elseif ($page == "hire") { ?>
                    <?php if (form("sub")) { ?>
                        <div class="sidebar">
                            <a href="?page=hire&sub=company" <?= (value("sub") == "company") ? 'class="active"' : "" ?>>
                                <i style="margin-top:-1.5vh;" class="fa fa-list"></i>
                                <p class="name">Companies</p>
                            </a>
                            <a href="?page=hire&sub=jobs" <?= (value("sub") == "jobs") ? 'class="active"' : "" ?>>
                                <i style="margin-top:-1.5vh;" class="fa fa-list"></i>
                                <p class="name">Job's</p>
                            </a>
                            <a href="?page=hire&sub=applicants" <?= (value("sub") == "applicants") ? 'class="active"' : "" ?>>
                                <i style="margin-top:-1.5vh;" class="fa fa-users"></i>
                                <p class="name">Applicants</p>
                            </a>
                            <a href="?page=hire&sub=applicants_archieve" <?= (value("sub") == "applicants_archieve") ? 'class="active"' : "" ?>>
                                <i style="margin-top:-1.5vh;" class="fa fa-users"></i>
                                <p class="name">Applicants Archive</p>
                            </a>
                        </div>
                        <?php
                        $class_type = value("sub") == "applicants_archieve" ? "applicants" : value("sub");
                        ?>
                        <div class="showcase" id="showcase_sub_<?= $class_type; ?>">
                            <?php if (value("sub") == "jobs") { ?>

                                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

                                <div class="t1">
                                    <h3>Jobs</h3>
                                    <p>A list of all the jobs.</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="container" style="width:100%; max-width:100%;">
                                            <div class="container_title">
                                                Jobs
                                            </div>
                                            <div class="container_body">
                                                <div class="row">
                                                    <?php if (hasResult($load_jobs)) { ?>
                                                        <?php while ($row = mysqli_fetch_assoc($load_jobs)) { ?>
                                                            <div class="col-md-4">
                                                                <a href="?page=hire&sub=postajob&manage=<?= $row["id"] ?>" class="box"
                                                                    style="border:1px solid black; border-radius:2vh; margin-bottom:1vh; margin-top:1vh; min-height: 25vh;">
                                                                    <div class="text">
                                                                        <p class="name">
                                                                            <?= $row['j_name']; ?>
                                                                        </p>
                                                                        <p class="salary_range">&#8369;
                                                                            <?= number_format($row['j_min']) . ' - &#8369; ' . number_format($row['j_max']) ?>
                                                                        </p>
                                                                        <p class="posted_at">
                                                                            <?= date("m/d/Y", strtotime($row["j_created_at"])) ?>
                                                                        </p>
                                                                    </div>
                                                                    <i class="fa fa-angle-right"></i>
                                                                </a>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <div class="col-md-12">
                                                            <div class="showcase">
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


                            <?php } elseif (value("sub") == "postajob") { ?>
                                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                                <div class="t1">
                                    <h3>Jobs</h3>
                                    <p>Post job openings to find employee.</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="container" style="margin-top:-2vh; width:100%; max-width:100%;">
                                            <div class="container_title">
                                                <?= ($update) ? "Edit Job description" : "Post a Job" ?>
                                            </div>
                                            <div class="container_body" style="width:100%;">
                                                <form method="post" class="<?= ($update) ? "edit_job" : "post_job" ?>">

                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <?php if ($update) { ?>
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <label>Job ID</label>
                                                                        <div class="field">
                                                                            <input type="text" name="id"
                                                                                value="<?= ($update) ? $data["id"] : "" ?>" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-10">

                                                                        <label>Position Name</label>
                                                                        <div class="field">
                                                                            <input type="text" name="position_name"
                                                                                value="<?= ($update) ? $data["j_name"] : "" ?>"
                                                                                id="position_name" placeholder="Position name">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } else { ?>

                                                                <label>Position Name</label>
                                                                <div class="field">
                                                                    <input type="text" name="position_name"
                                                                        value="<?= ($update) ? $data["j_name"] : "" ?>"
                                                                        id="position_name" placeholder="Position name">
                                                                </div>
                                                            <?php } ?>

                                                            <hr>
                                                            <label>Job Description</label>
                                                            <div class="field">
                                                                <textarea name="description" class="description" id="content"
                                                                    placeholder="Description"><?= ($update) ? $data["j_description"] : "" ?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Minimum Salary</label>
                                                                    <div class="field">
                                                                        <input type="number" name="minimum_salary"
                                                                            value="<?= ($update) ? $data["j_min"] : "" ?>"
                                                                            id="minimum_salary" placeholder="0.00">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Maximum Salary</label>
                                                                    <div class="field">
                                                                        <input type="number" name="maximum_salary"
                                                                            value="<?= ($update) ? $data["j_max"] : "" ?>"
                                                                            id="maximum_salary" placeholder="0.00">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br>
                                                            <label>Currency Type:</label>
                                                            <div class="field">
                                                                <select name="currency_symbol" id="currency_symbol">
                                                                    <option value="₱" <?= ($update && $data["j_currency_symbol"] == "₱") ? "selected" : "" ?>
                                                                        selected>PH Peso</option>
                                                                </select>
                                                            </div>

                                                            <br>
                                                            <label>Job Category</label>
                                                            <div class="field">
                                                                <select name="job_category" id="job_category">
                                                                    <option value="Common" <?= ($update && $data["j_job_category"] == "Common Jobs") ? "selected" : "" ?>>Common Jobs</option>
                                                                    <option value="Plumbing" <?= ($update && $data["j_job_category"] == "Plumbing") ? "selected" : "" ?>>
                                                                        Plumbing</option>
                                                                    <option value="Electrical" <?= ($update && $data["j_job_category"] == "Electrical") ? "selected" : "" ?>>
                                                                        Electrical</option>
                                                                    <option value="Construction" <?= ($update && $data["j_job_category"] == "Construction") ? "selected" : "" ?>>Construction</option>
                                                                    <option value="Programming" <?= ($update && $data["j_job_category"] == "Programming") ? "selected" : "" ?>>Programming</option>
                                                                    <option value="Programming" <?= ($update && $data["j_job_category"] == "Farming") ? "selected" : "" ?>>
                                                                        Farming</option>
                                                                    <option value="Massage" <?= ($update && $data["j_job_category"] == "Massage") ? "selected" : "" ?>>
                                                                        Massage</option>
                                                                    <option value="Marketing" <?= ($update && $data["j_job_category"] == "Marketing") ? "selected" : "" ?>>
                                                                        Marketing</option>
                                                                </select>
                                                            </div>

                                                            <br>
                                                            <label>Available for PWD With:</label>
                                                            <div class="field">
                                                                <select name="pwd_type" id="pwd_type">
                                                                    <option value="" <?= ($update && $data["j_pwd_type"] == "") ? "selected" : "" ?>>None</option>
                                                                    <option value="physical" <?= ($update && $data["j_pwd_type"] == "physical") ? "selected" : "" ?>>
                                                                        Physical Disability</option>
                                                                    <option value="visual" <?= ($update && $data["j_pwd_type"] == "visual") ? "selected" : "" ?>>Visual
                                                                        Impairment</option>
                                                                    <option value="hearing" <?= ($update && $data["j_pwd_type"] == "hearing") ? "selected" : "" ?>>Hearing
                                                                        Impairment</option>
                                                                    <option value="cognitive" <?= ($update && $data["j_pwd_type"] == "cognitive") ? "selected" : "" ?>>
                                                                        Cognitive Disability</option>
                                                                    <option value="neurological" <?= ($update && $data["j_pwd_type"] == "neurological") ? "selected" : "" ?>>
                                                                        Neurological Disability</option>
                                                                    <option value="developmental" <?= ($update && $data["j_pwd_type"] == "developmental") ? "selected" : "" ?>>
                                                                        Developmental Disability</option>
                                                                    <option value="mental_health" <?= ($update && $data["j_pwd_type"] == "mental_health") ? "selected" : "" ?>>
                                                                        Mental Health Disability</option>
                                                                    <option value="speech" <?= ($update && $data["j_pwd_type"] == "speech") ? "selected" : "" ?>>Speech
                                                                        or Language Disability</option>
                                                                    <option value="chronic_illness" <?= ($update && $data["j_pwd_type"] == "chronic_illness") ? "selected" : "" ?>>Chronic Illness</option>
                                                                    <option value="autoimmune" <?= ($update && $data["j_pwd_type"] == "autoimmune") ? "selected" : "" ?>>
                                                                        Autoimmune Disorder</option>
                                                                    <option value="mobility" <?= ($update && $data["j_pwd_type"] == "mobility") ? "selected" : "" ?>>
                                                                        Mobility Disability</option>
                                                                    <option value="invisible" <?= ($update && $data["j_pwd_type"] == "invisible") ? "selected" : "" ?>>
                                                                        Invisible Disability</option>
                                                                    <option value="other" <?= ($update && $data["j_pwd_type"] == "other") ? "selected" : "" ?>>Other
                                                                        Disability</option>
                                                                </select>
                                                            </div>

                                                            <hr>
                                                            <button class="btn_submit" style="font-size:1.5vh; width:100%;">
                                                                SAVE
                                                            </button>

                                                            <?php if ($update) { ?>
                                                                <button data-id="<?= ($update) ? $data["id"] : "" ?>"
                                                                    class="btn_delete_job" style="font-size:1.5vh; width:100%;">
                                                                    DELETE
                                                                </button>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } elseif (value("sub") == "company") { ?>
                                <?php if ($company_view) { ?>
                                    <div class="t1">
                                        <h3>Manage Selected Company</h3>
                                    </div>
                                    <center>
                                        <div class="container" style="width:70%;">
                                            <div class="container_title">
                                                <div class="title">
                                                    Company
                                                </div>
                                                <div class="filter">
                                                    <a
                                                        href="./?page=hire&sub=company&view=<?= $company_id ?>&action=overview">OVERVIEW</a>
                                                    <a href="./?page=hire&sub=company&view=<?= $company_id ?>&action=reports">REPORTS</a>
                                                    <a href="./?page=hire&sub=company&view=<?= $company_id ?>&action=delete">DELETE
                                                        COMPANY</a>
                                                </div>
                                            </div>
                                            <div class="container_body">
                                                <?php if (form("action")) {
                                                    $action = value("action");
                                                    ?>
                                                    <?php if ($action == "overview") { ?>
                                                        <form method="post" style="margin: 1rem" autocomplete="off">
                                                            <div class="field">
                                                                <label for="name" style="text-align:right; margin-right:1vh;">Name</label>
                                                                <input type="text" id="name" name="tb_name" placeholder="Name"
                                                                    value="<?= $company_name ?>" readonly>
                                                            </div>
                                                            <div class="field">
                                                                <label for="name" style="text-align:right; margin-right:1vh;">Address</label>
                                                                <input type="text" id="name" name="tb_address" placeholder="Address"
                                                                    value="<?= $company_address ?>" readonly>
                                                            </div>
                                                            <div class="field">
                                                                <label for="name" style="text-align:right; margin-right:1vh;">Contact
                                                                    number</label>
                                                                <input type="text" id="name" name="tb_cnum" placeholder="Contact number"
                                                                    value="<?= $company_cnum ?>" readonly>
                                                            </div>
                                                            <div class="field">
                                                                <label for="name" style="text-align:right; margin-right:1vh;">Publisher's
                                                                    name</label>
                                                                <input type="text" id="name" name="tb_publisher_name"
                                                                    placeholder="Publisher's name" value="<?= $publisher_name ?>" readonly>
                                                            </div>
                                                            <div class="field">
                                                                <label for="name" style="text-align:right; margin-right:1vh;">Publisher's
                                                                    position</label>
                                                                <input type="text" id="name" name="tb_publisher_postion"
                                                                    placeholder="Publisher's position" value="<?= $company_position ?>"
                                                                    readonly>
                                                            </div>
                                                            <div class="field">
                                                                <label for="name" style="text-align:right; margin-right:1vh;">Created at</label>
                                                                <input type="text" id="name" name="tb_created_at" placeholder="Created at"
                                                                    value="<?= date("M d, Y h:i A", strtotime($company_created_at)) ?>"
                                                                    readonly>
                                                            </div>
                                                        </form>



                                                    <?php } elseif ($action == "reports") { ?>
                                                        <?php if (hasResult($load_company_reports)) { ?>
                                                            <?php while ($row = mysqli_fetch_assoc($load_company_reports)) { ?>
                                                                <div class="box">
                                                                    <div class="text">
                                                                        <p
                                                                            style="font-size: 2rem; line-height: 2rem; text-transform: uppercase; margin-bottom: .3rem">
                                                                            <?= $row["firstname"] . " " . $row["lastname"] ?>
                                                                        </p>
                                                                        <p style="font-size: .8rem; margin-bottom: 1rem">
                                                                            <?= date("M d, Y h:i A", strtotime($row["created_at"])) ?>
                                                                        </p>
                                                                        <p style="font-size: 1rem">
                                                                            <?= $row['message']; ?>
                                                                        </p>
                                                                    </div>
                                                                    <!-- <i class="fa fa-angle-right"></i> -->
                                                                </div>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <div class="showcase">
                                                                <img src="./assets/empty.png" alt="empty" width="200">
                                                                <p>No reports</p>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } elseif ($action == "delete") { ?>
                                                        <div class="showcase">
                                                            <p>
                                                                Delete
                                                                <?= $company_name ?> Company
                                                            </p>
                                                            <p>
                                                                Warning : This action cannot be undone.
                                                            </p>
                                                            <button class="btn_delete btn_delete_company" data-id="<?= $company_id ?>">
                                                                DELETE</button>
                                                        </div>
                                                    <?php } else {
                                                        navigate("./?page=hire&sub=company&view=$company_id&action=overview");
                                                    } ?>
                                                <?php } else {
                                                    navigate("./?page=hire&sub=company&view=$company_id&action=overview");
                                                } ?>
                                            </div>
                                        </div>
                                    </center>
                                <?php } else { ?>
                                    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                                    <div class="t1">
                                        <h3>Company</h3>
                                        <p>List of all companies.</p>
                                    </div>
                                    <div class="container" style="width:100% !important; max-width: 100% !important;">
                                        <div class="container_title">
                                            Companies
                                        </div>
                                        <div class="container_body" style="width:100% !important; max-width: 100% !important;">
                                            <div class="row">
                                                <?php if (hasResult($load_company)) { ?>
                                                    <?php while ($row = mysqli_fetch_assoc($load_company)) { ?>
                                                        <div class="col-md-4 col-xs-12">

                                                            <a href="?page=hire&sub=company&view=<?= $row["id"] ?>" class="box"
                                                                style="border:1px solid black; border-radius:2vh; margin:2vh; min-height: 25vh;">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <img src="../../assets/images/<?php echo $row["c_logo"]; ?>"
                                                                            style="border-radius:50%; width:10vh; height:10vh; border:1px solid gray;">
                                                                    </div>

                                                                    <div class="col-md-10">
                                                                        <div class="text" style="margin-left: 100px;">
                                                                            <p class="name">
                                                                                <?= $row['c_name']; ?>
                                                                            </p>
                                                                            <p class="salary_range">
                                                                                <?= $row['c_address']; ?>
                                                                            </p>
                                                                        </div>
                                                                        <br>
                                                                        <div style="text-align: center;">
                                                                            <span
                                                                                style="background-color: #623ADA; color: white; padding: 12px; border-radius: 1vh; margin-left: 150px;">View</span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <div class="col-md-12">
                                                        <div class="showcase">
                                                            <img src="./assets/empty.png" alt="empty" width="200">
                                                            <p>Company not found</p>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } elseif (value("sub") == "applicants") { ?>
                                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                                <div class="t1">
                                    <h3>Applicants</h3>
                                    <p>List of all applicants in different positions.</p>
                                </div>
                                <div class="container" style="width:100%; max-width:100%;">
                                    <div class="container_title">
                                        <div class="title">
                                            Applicants
                                        </div>
                                        <div class="filter">
                                            <a href="./?page=hire&sub=applicants&filter=all"
                                                class="<?= ($filter == "all") ? "active" : "" ?>">ALL</a>
                                            <a href="./?page=hire&sub=applicants&filter=pending"
                                                class="<?= ($filter == "pending") ? "active" : "" ?>">PENDING</a>
                                            <a href="./?page=hire&sub=applicants&filter=hired"
                                                class="<?= ($filter == "hired") ? "active" : "" ?>">HIRED</a>
                                            <a href="./?page=hire&sub=applicants&filter=declined"
                                                class="<?= ($filter == "declined") ? "active" : "" ?>">DECLINED</a>
                                            <a href="./?page=hire&sub=applicants&filter=cancelled"
                                                class="<?= ($filter == "cancelled") ? "active" : "" ?>">CANCELLED</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="container_body" style="width:100%; max-width:100%;">
                                                <div class="row">
                                                    <?php if (hasResult($load_applicants)) { ?>
                                                        <?php while ($row = mysqli_fetch_assoc($load_applicants)) { ?>

                                                            <div class="col-md-4">
                                                                <div class="box"
                                                                    style="border:1px solid black; border-radius:2vh; margin-bottom:1vh; margin-top:1vh; min-height: 25vh;">
                                                                    <div class="text">
                                                                        <p class="j_name">
                                                                            <span class="label">Job Title : </span>
                                                                            <?= $row['j_name']; ?>
                                                                        </p>
                                                                        <p class="name">
                                                                            <span class="label">Full name : </span>
                                                                            <?= $row['firstname']; ?>
                                                                            <?= $row['lastname']; ?>
                                                                        </p>
                                                                        <p class="posted_at">
                                                                            <span class="label">Birthday : </span>
                                                                            <?= date("m/d/Y", strtotime($row["bday"])) ?>
                                                                        </p>
                                                                        <p class="posted_at">
                                                                            <span class="label">Age : </span>
                                                                            <?= $row["age"] ?>
                                                                        </p>
                                                                        <p class="address">
                                                                            <span class="label">Address : </span>
                                                                            <?= $row['address']; ?>
                                                                        </p>
                                                                        <p class="posted_at">
                                                                            <span class="label">Posted at : </span>
                                                                            <?= date("m/d/Y h:i A", strtotime($row["created_at"])) ?>

                                                                        </p>
                                                                    </div>
                                                                    <?php
                                                                    if (value('filter') == "hired") {
                                                                        ?>
                                                                        <div class="box_buttons">
                                                                            <button data-id="<?= $row["id"] ?>" class="button btn_archive">
                                                                                <i class="fa fa-archive"></i>
                                                                                Archive
                                                                            </button>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <div class="col-md-12">
                                                            <div class="showcase">
                                                                <img src="./assets/empty.png" alt="empty" width="200">
                                                                <p>No Applicants's Found</p>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="col-md-12">
                                                        <hr>
                                                        <!-- New code for the download button -->
                                                        <div class="download_button">
                                                            <a href="./download.php" class="button btn_download_all">
                                                                <i class="fa fa-download"></i>
                                                                Download All Applicants
                                                            </a>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } elseif (value("sub") == "applicants_archieve") { ?>
                                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                                <div class="t1">
                                    <h3>Archive</h3>
                                    <p>Applicants Archive</p>
                                </div>
                                <div class="container" style="width:100%; max-width:100%;">
                                    <div class="container_title">
                                        Archive
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="container_body" style="width:100%; max-width:100%;">
                                                <div class="row">
                                                    <?php if (hasResult($load_applicants)) { ?>
                                                        <?php while ($row = mysqli_fetch_assoc($load_applicants)) { ?>
                                                            <div class="col-md-4">
                                                                <div class="box"
                                                                    style="border:1px solid black; border-radius:2vh; margin-bottom:1vh; margin-top:1vh; min-height: 25vh;">
                                                                    <div class="text">
                                                                        <p class="j_name">
                                                                            <span class="label">Job Title : </span>
                                                                            <?= $row['j_name']; ?>
                                                                        </p>
                                                                        <p class="name">
                                                                            <span class="label">Full name : </span>
                                                                            <?= $row['firstname']; ?>
                                                                            <?= $row['lastname']; ?>
                                                                        </p>
                                                                        <p class="posted_at">
                                                                            <span class="label">Birthday : </span>
                                                                            <?= date("m/d/Y", strtotime($row["bday"])) ?>
                                                                        </p>
                                                                        <p class="posted_at">
                                                                            <span class="label">Age : </span>
                                                                            <?= $row["age"] ?>
                                                                        </p>
                                                                        <p class="address">
                                                                            <span class="label">Address : </span>
                                                                            <?= $row['address']; ?>
                                                                        </p>
                                                                        <p class="posted_at">
                                                                            <span class="label">Posted at : </span>
                                                                            <?= date("m/d/Y h:i A", strtotime($row["created_at"])) ?>

                                                                        </p>

                                                                    </div>
                                                                    <?php
                                                                    if (value('sub') == "applicants_archieve") {
                                                                        ?>
                                                                        <div class="box_buttons">
                                                                            <button data-id="<?= $row["id"] ?>"
                                                                                class="button btn_archive_restore">
                                                                                <i class="fa fa-archive"></i>
                                                                                Restore
                                                                            </button>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>

                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <div class="col-md-12">
                                                            <div class="showcase">
                                                                <img src="./assets/empty.png" alt="empty" width="200">
                                                                <p>No Applicants's Found</p>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } else {
                                navigate("?page=hire&sub=company");
                            } ?>
                        </div>
                    <?php } else {
                        navigate("?page=hire&sub=company");
                    } ?>
                <?php } elseif ($page == "profile") { ?>
                    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                    <?php if (form("sub")) { ?>
                        <div class="sidebar">

                            <div class="container_body">
                                <div class="image_center_body">
                                    <center> <img src="../../assets/images/<?= $u_avatar ?>"
                                            class="company_logo_preview profile_picture" style="border:1px solid gray"></center>
                                </div>
                                <input type="file" name="input_upload_field" id="input_upload_field" class="input_upload_field"
                                    data-set="avatar" accept="image/*">
                                <label for="input_upload_field" class="btn_upload_picture2"
                                    style="font-size:2vh; width:5vh; border-radius:50%; position: absolute; margin-top:-4vh; margin-left:9%; background-color:gray;">
                                    <i style="color:white;" class="fa fa-edit"></i>
                                </label>
                            </div>
                            <br>
                            <br>

                            <a href="?page=profile&sub=general_information" <?= (value("sub") == "general_information") ? 'class="active"' : "" ?>>
                                <p class="name"><i class="fa fa-user"></i> General Information</p>
                            </a>
                            <a href="?page=profile&sub=password" <?= (value("sub") == "password") ? 'class="active"' : "" ?>>
                                <p class="name"><i class="fa fa-gear"></i> Settings</p>
                            </a>
                        </div>
                        <div class="content">
                            <div class="showcase" id="showcase_sub_<?= value("sub") ?>">
                                <?php if (value("sub") == "general_information") { ?>

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
                                                            <input type="text" name="tb_firstname" id="tb_firstname"
                                                                placeholder="First name" value="<?= $u_fname ?>">
                                                        </div>
                                                        <label for="tb_lastname">Last name</label>
                                                        <div class="field">
                                                            <input type="text" name="tb_lastname" id="tb_lastname"
                                                                placeholder="Last name" value="<?= $u_lname ?>">
                                                        </div>
                                                        <label for="tb_age">Age</label>
                                                        <div class="field">
                                                            <input type="number" name="tb_age" id="tb_age" placeholder="Age"
                                                                value="<?= $u_age ?>">
                                                        </div>
                                                        <label for="tb_bday">Birthday</label>
                                                        <div class="field">
                                                            <input type="date" name="tb_bday" id="tb_bday" value="<?= $u_bday ?>">
                                                        </div>
                                                        <label for="tb_address">Address</label>
                                                        <div class="field">
                                                            <textarea name="tb_address" class="tb_address" id="tb_address"
                                                                placeholder="Address"><?= $u_address ?></textarea>
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
                                                    Password
                                                </div>
                                                <div class="container_body">
                                                    <form method="post" class="frm_<?= $page ?>_password">
                                                        <label for="tb_pw">Old password</label>
                                                        <div class="field">
                                                            <input type="password" name="tb_pw" id="tb_pw"
                                                                placeholder="Old password">
                                                        </div>
                                                        <label for="tb_newpw">New password</label>
                                                        <div class="field">
                                                            <input type="password" name="tb_newpw" id="tb_newpw"
                                                                placeholder="New password">
                                                        </div>
                                                        <label for="tb_cnewpw">Confirm new password</label>
                                                        <div class="field">
                                                            <input type="password" name="tb_cnewpw" id="tb_cnewpw"
                                                                placeholder="Confirm new password">
                                                        </div>
                                                        <button class="button btn_submit" style="font-size:1.5vh; width:25%;">
                                                            SAVE
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } elseif (value("sub") == "password") { ?>

                                        <div class="container" style="width:50%;">
                                            <div class="container_title">
                                                Account settings
                                            </div>
                                            <div class="container_body">
                                                <form method="post" class="frm_<?= $page ?>_account">
                                                    <div class="field">
                                                        <label for="tb_email">Email Address: </label>
                                                        <input type="email" name="tb_email" id="tb_email" placeholder="Email"
                                                            value="<?= $u_email ?>">
                                                    </div>
                                                    <div class="field">
                                                        <label for="tb_cnum">Contact number: </label>
                                                        <input type="number" name="tb_cnum" id="tb_cnum"
                                                            placeholder="Contact number" value="<?= $u_cnum ?>">
                                                    </div>
                                                    <button class="button btn_submit">
                                                        SAVE
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php } else {
                                    navigate("?page=profile&sub=general_information");
                                } ?>
                                </div>
                            </div>
                        <?php } else {
                        navigate("?page=profile&sub=general_information");
                    } ?>
                    <?php } elseif ($page == "accounts") { ?>
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
                        <?php if (form("sub")) { ?>
                            <div class="sidebar">
                                <a href="?page=accounts&sub=list" <?= (value("sub") == "list") ? 'class="active"' : "" ?>>
                                    <i class="fa fa-list"></i>
                                    <p class="name">List</p>
                                </a>
                                <br>
                                <a href="?page=accounts&sub=pending" <?= (value("sub") == "pending") ? 'class="active"' : "" ?>>
                                    <i class="fa fa-list"></i>
                                    <p class="name">Pending Accounts</p>
                                </a>
                                <br>
                                <a href="?page=accounts&sub=createadmin" <?= (value("sub") == "createadmin") ? 'class="active"' : "" ?>>
                                    <i class="fa fa-list"></i>
                                    <p class="name">Create Admin</p>
                                </a>
                            </div>
                            <div class="content">
                                <div class="showcase" id="showcase_sub_<?= value("sub") ?>">
                                    <?php if (value("sub") == "list") { ?>
                                        <div class="container">
                                            <div class="container_title">
                                                <div class="title">
                                                    Accounts
                                                </div>
                                                <div class="filter">
                                                    <a href="./?page=accounts&sub=list&filter=all"
                                                        class="<?= ($filter == "all") ? "active" : "" ?>">ALL</a>
                                                    <a href="./?page=accounts&sub=list&filter=admin"
                                                        class="<?= ($filter == "admin") ? "active" : "" ?>">ADMIN</a>
                                                    <a href="./?page=accounts&sub=list&filter=company"
                                                        class="<?= ($filter == "company") ? "active" : "" ?>">COMPANY</a>
                                                    <a href="./?page=accounts&sub=list&filter=client"
                                                        class="<?= ($filter == "client") ? "active" : "" ?>">CLIENT</a>
                                                </div>
                                            </div>
                                            <div class="container_body">
                                                <div class="row">
                                                    <?php if (hasResult($load_accounts)) { ?>
                                                        <?php while ($row = mysqli_fetch_assoc($load_accounts)) { ?>
                                                            <div class="col-md-4">
                                                                <div class="box"
                                                                    style="border:1px solid black; border-radius:2vh; margin:2vh; min-height: 35vh;">
                                                                    <div class="text">
                                                                        <p class="s_name" style="font-weight:bold;">
                                                                            <span class="label" style="font-weight:normal;">Full name :
                                                                            </span>
                                                                            <?= $row['firstname']; ?>
                                                                            <?= $row['middle_name']; ?>
                                                                            <?= $row['lastname']; ?>
                                                                            <?= $row['suffix']; ?>
                                                                        </p>
                                                                        <p class="posted_at">
                                                                            <span class="label">Level : </span>
                                                                            <?php if ($row["type"] == 0) { ?>
                                                                                Super Admin
                                                                            <?php } elseif ($row["type"] == 1) { ?>
                                                                                Admin
                                                                            <?php } elseif ($row["type"] == 2) { ?>
                                                                                Company
                                                                            <?php } elseif ($row["type"] == 3) { ?>
                                                                                Client
                                                                            <?php } else {
                                                                                echo "Unknown";
                                                                            } ?>
                                                                        </p>
                                                                        <?php if ($row["type"] == 1) { ?>
                                                                            <?php
                                                                            $adminid = $row["id"];
                                                                            $locationhandled = "";
                                                                            $previous_handled = "";
                                                                            $sql2 = "SELECT * FROM tbl_jobareas WHERE admin_id = '$adminid'";
                                                                            $result2 = mysqli_query($con, $sql2);
                                                                            if ($result2) {
                                                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                                                                    $locationhandled = $row2['Location'];
                                                                                    $previous_handled = $row2['id'];
                                                                                }
                                                                            }
                                                                            ?>

                                                                            <p class="posted_at">
                                                                                <span class="label">Handled Job Area : </span>
                                                                                <?= $locationhandled ?>
                                                                            </p>
                                                                            <br>
                                                                        <?php } ?>

                                                                        <br>
                                                                        <p class="posted_at">
                                                                            <span class="label">Age : </span>
                                                                            <?= $row["age"] ?>
                                                                        </p>

                                                                        <?php if ($row["type"] == 3) { ?>
                                                                            <p class="posted_at">
                                                                                <span class="label">Height (cm) : </span>
                                                                                <?= $row["height"] ?>
                                                                            </p>
                                                                            <p class="posted_at">
                                                                                <span class="label">Gender : </span>
                                                                                <?= $row["gender"] ?>
                                                                            </p>
                                                                            <p class="posted_at">
                                                                                <span class="label">Religion : </span>
                                                                                <?= $row["religion"] ?>
                                                                            </p>
                                                                            <p class="posted_at">
                                                                                <span class="label">Civil Status : </span>
                                                                                <?= $row["civil_status"] ?>
                                                                            </p>
                                                                            <p class="posted_at">
                                                                                <span class="label">Tin Number : </span>
                                                                                <?= $row["tin_number"] ?>
                                                                            </p>
                                                                            <p class="posted_at">
                                                                                <span class="label">Disability : </span>
                                                                                <?= $row["disability"] ?>
                                                                            </p>
                                                                            <br>
                                                                        <?php } ?>
                                                                        <p class="address">
                                                                            <span class="label">Address : </span>
                                                                            <?= $row['address']; ?>
                                                                        </p>
                                                                        <p class="posted_at">
                                                                            <span class="label">Created at : </span>
                                                                            <?= date("m/d/Y h:i A", strtotime($row["created_at"])) ?>

                                                                        </p>
                                                                        <p class="posted_at">
                                                                            <span class="label">Last Login : </span>
                                                                            <?= date("m/d/Y h:i A", strtotime($row["updated_at"])) ?>
                                                                        </p>
                                                                        <p class="posted_at">
                                                                            <span class="label">Status: </span>
                                                                            <?php
                                                                            if ($row["status_id"] == 0) {
                                                                                echo "<span style='color:blue'>PENDING</span>";
                                                                            } elseif ($row["status_id"] == 1) {
                                                                                echo "<span style='color:green'>ACTIVE</span>";
                                                                            } else {
                                                                                echo "<span style='color:red'>NOT ACTIVE</span>";
                                                                            }
                                                                            ?>
                                                                        </p>

                                                                        <br><br>

                                                                        <?php if ($row["type"] == 2) { ?>
                                                                            <?php
                                                                            $usercompany_id = $row["id"];
                                                                            $userdocuments = mysqli_query($con, "SELECT * FROM `tbl_company` WHERE userid = '$usercompany_id'");
                                                                            if (hasResult($userdocuments)) {
                                                                                $datauserdocuments = mysqli_fetch_assoc($userdocuments);
                                                                            }
                                                                            ?>

                                                                            <div class="row">
                                                                                <?php if (isset($datauserdocuments["c_doc1"])) { ?>
                                                                                    <div class="col-md-4 col-xs-12"
                                                                                        style="width:100% !important; margin-bottom:2vh;">
                                                                                        <a href="../../assets/documents/<?php echo $datauserdocuments["c_doc1"]; ?>"
                                                                                            download
                                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 5px; padding-right: 5px;border-radius: 10px; font-size:1vh; width:100% !important; margin-bottom:1vh;">
                                                                                            Letter of Intent
                                                                                        </a>
                                                                                    </div>
                                                                                <?php } ?>
                                                                                <?php if (isset($datauserdocuments["c_doc2"])) { ?>
                                                                                    <div class="col-md-4 col-xs-12"
                                                                                        style="width:100% !important; margin-bottom:2vh;">
                                                                                        <a href="../../assets/documents/<?php echo $datauserdocuments["c_doc2"]; ?>"
                                                                                            download
                                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 5px; padding-right: 5px;border-radius: 10px; font-size:1vh; width:100% !important; margin-bottom:1vh; ">
                                                                                            Company Profile
                                                                                        </a>
                                                                                    </div>
                                                                                <?php } ?>
                                                                                <?php if (isset($datauserdocuments["c_doc3"])) { ?>
                                                                                    <div class="col-md-4 col-xs-12"
                                                                                        style="width:100% !important; margin-bottom:2vh;">
                                                                                        <a href="../../assets/documents/<?php echo $datauserdocuments["c_doc3"]; ?>"
                                                                                            download
                                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 5px; padding-right: 5px;border-radius: 10px; font-size:1vh; width:100% !important; margin-bottom:1vh;">
                                                                                            BIR Form 2303
                                                                                        </a>
                                                                                    </div>
                                                                                <?php } ?>
                                                                                <?php if (isset($datauserdocuments["c_doc4"])) { ?>
                                                                                    <div class="col-md-4 col-xs-12"
                                                                                        style="width:100% !important; margin-bottom:2vh;">
                                                                                        <a href="../../assets/documents/<?php echo $datauserdocuments["c_doc4"]; ?>"
                                                                                            download
                                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 5px; padding-right: 5px;border-radius: 10px; font-size:1vh; width:100% !important; margin-bottom:1vh;">
                                                                                            Business Permit
                                                                                        </a>
                                                                                    </div>
                                                                                <?php } ?>
                                                                                <?php if (isset($datauserdocuments["c_doc5"])) { ?>
                                                                                    <div class="col-md-4 col-xs-12"
                                                                                        style="width:100% !important; margin-bottom:2vh;">
                                                                                        <a href="../../assets/documents/<?php echo $datauserdocuments["c_doc5"]; ?>"
                                                                                            download
                                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 5px; padding-right: 5px;border-radius: 10px; font-size:1vh;width:100% !important; margin-bottom:1vh;">
                                                                                            SEC / DTI Permit
                                                                                        </a>
                                                                                    </div>
                                                                                <?php } ?>
                                                                                <?php if (isset($datauserdocuments["c_doc6"])) { ?>
                                                                                    <div class="col-md-4 col-xs-12"
                                                                                        style="width:100% !important; margin-bottom:2vh;">
                                                                                        <a href="../../assets/documents/<?php echo $datauserdocuments["c_doc6"]; ?>"
                                                                                            download
                                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 5px; padding-right: 5px;border-radius: 10px; font-size:1vh; width:100% !important; margin-bottom:1vh;">
                                                                                            License Permit
                                                                                        </a>
                                                                                    </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        <?php } ?>
                                                                        <br>
                                                                        <button type="button" id="<?php echo $row["id"] ?>"
                                                                            onclick="deleteAccount(this.id)"
                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 30px; padding-right: 30px;border-radius: 10px;">DELETE</button>


                                                                        <?php if ($row["type"] == 1) { ?>


                                                                            <button type="button" class="edit-button"
                                                                                onclick="openConfirmModal1('<?= $row["id"] ?>')"
                                                                                style="color: white; padding:10px; background-color: #36344d; padding-left: 30px; padding-right: 30px;border-radius: 10px;">EDIT</button>

                                                                            <div class="modal fade" id="openConfirmModal<?= $row["id"] ?>"
                                                                                tabindex="-1" role="dialog"
                                                                                aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                    <div class="modal-content"
                                                                                        style="margin-top:15vh; width:25%; height:25%; border-radius:1vh;">
                                                                                        <center>
                                                                                            <div class="modal-body">
                                                                                                <div class="swal2-icon swal2-question swal2-icon-show"
                                                                                                    style="display: flex;">
                                                                                                    <div class="swal2-icon-content">?</div>
                                                                                                </div>
                                                                                                <br>
                                                                                                <h2 class="swal2-title">Are you sure you want to
                                                                                                    modify this account?</h2>
                                                                                            </div>
                                                                                            <br>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button"
                                                                                                    class="swal2-confirm swal2-styled"
                                                                                                    id="confirmEdit"
                                                                                                    style="padding: .625em 1.1em; display: inline-block;border: 0;border-radius: .25em;background: initial;background-color: #7066e0;color: #fff;font-size: 1em;"
                                                                                                    onclick="openEditDiv1('<?= $row["id"] ?>')">Yes</button>
                                                                                                <button type="button"
                                                                                                    class="swal2-cancel swal2-styled"
                                                                                                    data-dismiss="modal"
                                                                                                    style="padding: .625em 1.1em; display: inline-block;border: 0;border-radius: .25em;background: initial;background-color: #6e7881;color: #fff;font-size: 1em;"
                                                                                                    onclick="closeConfirmModal1('<?= $row["id"] ?>')">Cancel</button>
                                                                                            </div>
                                                                                        </center>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="edit-div" id="editDiv<?= $row["id"] ?>"
                                                                                style="display: none; width:100%;  border: 1px solid #000; padding:10px; border-radius:1vh; margin-top:2vh;">
                                                                                <!-- Form for editing -->
                                                                                <form id="editFormAdmin<?= $row["id"] ?>" method="post"
                                                                                    onsubmit="editadminaccount(event, <?= $row["id"] ?>)">
                                                                                    <input type="hidden" name="admin_id"
                                                                                        value="<?= $row["id"] ?>" />
                                                                                    <input type="hidden" name="previous_handled"
                                                                                        value="<?php echo $previous_handled; ?>" />

                                                                                    <div class="field">
                                                                                        <label for="firstname">First Name:</label>
                                                                                        <input type="text" class="form-control" id="firstname"
                                                                                            name="firstname"
                                                                                            value="<?php echo $row["firstname"]; ?>" required>
                                                                                    </div>
                                                                                    <div class="field">
                                                                                        <label for="lastname">Last Name:</label>
                                                                                        <input type="text" class="form-control" id="lastname"
                                                                                            name="lastname"
                                                                                            value="<?php echo $row["lastname"]; ?>" required>
                                                                                    </div>
                                                                                    <div class="field">
                                                                                        <label for="cnum">Contact Number:</label>
                                                                                        <input type="number" class="form-control" id="cnum"
                                                                                            name="cnum" maxlength="11"
                                                                                            value="<?php echo $row["cnum"]; ?>" required>
                                                                                    </div>
                                                                                    <div class="field">
                                                                                        <label for="bday">Birth Date:</label>
                                                                                        <input type="date" class="form-control" id="bday"
                                                                                            name="bday" value="<?php echo $row["bday"]; ?>"
                                                                                            required>
                                                                                    </div>
                                                                                    <div class="field">
                                                                                        <label for="address">Address:</label>
                                                                                        <input type="text" class="form-control" id="address"
                                                                                            name="address"
                                                                                            value="<?php echo $row["address"]; ?>" required>
                                                                                    </div>

                                                                                    <div class="field">
                                                                                        <label for="jobarea_id" style="text-align:left;">Assign
                                                                                            Job Area:</label>
                                                                                        <select id="jobarea_id" name="jobarea_id">
                                                                                            <option value="" selected>Select New Job Area
                                                                                            </option>
                                                                                            <?php
                                                                                            $sql = "SELECT * FROM tbl_jobareas WHERE admin_id = '' OR admin_id IS NULL";
                                                                                            $result = mysqli_query($con, $sql);
                                                                                            if ($result) {
                                                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $row['id']; ?>">
                                                                                                        <?php echo $row['Location']; ?>
                                                                                                    </option>
                                                                                                    <?php
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <button type="submit" class="edit-button"
                                                                                        style="color: white; padding:10px; background-color: #36344d; padding-left: 30px; padding-right: 30px;border-radius: 10px; width:50%; margin-left:16%;">Save
                                                                                        Changes</button>
                                                                                </form>

                                                                                <script>
                                                                                    function editadminaccount(event, rowId) {
                                                                                        event.preventDefault(); // Prevent default form submission

                                                                                        // Get form data
                                                                                        var formData = new FormData($('#editFormAdmin' + rowId)[0]);

                                                                                        // Execute AJAX request
                                                                                        $.ajax({
                                                                                            url: "./routes/editAdminAccount.php",
                                                                                            method: "post",
                                                                                            data: formData,
                                                                                            processData: false,
                                                                                            contentType: false,
                                                                                            success: function (res) {
                                                                                                console.log(res);
                                                                                                if (res.success) {
                                                                                                    Swal.fire(
                                                                                                        'Success',
                                                                                                        `${res.message}`,
                                                                                                        'success'
                                                                                                    );
                                                                                                    setTimeout(() => {
                                                                                                        window.location.href = "?page=accounts&sub=list&filter=admin"
                                                                                                    }, 500);
                                                                                                } else {
                                                                                                    Swal.fire(
                                                                                                        'Failed',
                                                                                                        `${res.message}`,
                                                                                                        'error'
                                                                                                    );
                                                                                                }
                                                                                            }
                                                                                        });
                                                                                    }
                                                                                </script>
                                                                            </div>
                                                                        <?php } ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <div class="col-md-12">
                                                            <div class="showcase">
                                                                <img src="./assets/empty.png" alt="empty" width="200">
                                                                <p>No Job's Found</p>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } elseif (value("sub") == "company_information") { ?>
                                        <div class="container">
                                            <div class="container_title">
                                                Company Information
                                            </div>
                                            <div class="container_body">
                                                <form method="post" class="frm_<?= $page ?>_company">
                                                    <div class="field">
                                                        <label for="tb_name">Company name</label>
                                                        <input type="text" name="tb_name" id="tb_name" placeholder="First name"
                                                            value="<?= $c_name ?>">
                                                    </div>
                                                    <div class="field">
                                                        <label for="tb_cnum">Contact number</label>
                                                        <input type="number" name="tb_cnum" id="tb_cnum"
                                                            placeholder="Contact number" value="<?= $c_cnum ?>">
                                                    </div>
                                                    <div class="field">
                                                        <label for="tb_position">Position <br>(your position)</label>
                                                        <input type="text" name="tb_position" id="tb_position"
                                                            placeholder="Position (Your position)" value="<?= $c_position ?>">
                                                    </div>
                                                    <div class="field">
                                                        <label for="tb_address">Address</label>
                                                        <textarea name="tb_address" class="tb_address" id="tb_address"
                                                            placeholder="Address"><?= $c_address ?></textarea>
                                                    </div>
                                                    <button class="button btn_submit">
                                                        SAVE
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php } elseif (value("sub") == "manage") { ?>
                                        <div class="container">
                                            <div class="container_title">
                                                Password
                                            </div>
                                            <div class="container_body">
                                                <form method="post" class="frm_<?= $page ?>_password">
                                                    <div class="field">
                                                        <label for="tb_pw">Old password</label>
                                                        <input type="password" name="tb_pw" id="tb_pw" placeholder="Old password">
                                                    </div>
                                                    <div class="field">
                                                        <label for="tb_newpw">New password</label>
                                                        <input type="password" name="tb_newpw" id="tb_newpw"
                                                            placeholder="New password">
                                                    </div>
                                                    <div class="field">
                                                        <label for="tb_cnewpw">Confirm new password</label>
                                                        <input type="password" name="tb_cnewpw" id="tb_cnewpw"
                                                            placeholder="Confirm new password">
                                                    </div>
                                                    <button class="button btn_submit">
                                                        SAVE
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php } elseif (value("sub") == "pending") { ?>
                                        <div class="container">
                                            <div class="container_title">
                                                <div class="title">
                                                    Accounts
                                                </div>
                                            </div>
                                            <div class="container_body">
                                                <div class="row">
                                                    <?php if (hasResult($load_accounts)) { ?>
                                                        <?php while ($row = mysqli_fetch_assoc($load_accounts)) { ?>

                                                            <div class="col-md-4">
                                                                <div class="box"
                                                                    style="border:1px solid black; border-radius:2vh; margin:2vh; min-height: 35vh;">
                                                                    <div class="text">
                                                                        <p class="s_name">
                                                                            <span class="label">Full name : </span>
                                                                            <b>
                                                                                <?= $row['firstname']; ?>
                                                                                <?= $row['middle_name']; ?>
                                                                                <?= $row['lastname']; ?>
                                                                                <?= $row['suffix']; ?>
                                                                            </b>
                                                                        </p>
                                                                        <p class="posted_at">
                                                                            <span class="label">Level : </span>
                                                                            <?php if ($row["type"] == 0) { ?>
                                                                                Super Admin
                                                                            <?php } elseif ($row["type"] == 1) { ?>
                                                                                Admin
                                                                            <?php } elseif ($row["type"] == 2) { ?>
                                                                                Company
                                                                            <?php } elseif ($row["type"] == 3) { ?>
                                                                                Client
                                                                            <?php } else {
                                                                                echo "Unknown";
                                                                            } ?>
                                                                        </p>

                                                                        <br>
                                                                        <p class="posted_at">
                                                                            <span class="label">Age : </span>
                                                                            <?= $row["age"] ?>
                                                                        </p>

                                                                        <?php if ($row["type"] == 3) { ?>
                                                                            <p class="posted_at">
                                                                                <span class="label">Height (cm) : </span>
                                                                                <?= $row["height"] ?>
                                                                            </p>
                                                                            <p class="posted_at">
                                                                                <span class="label">Gender : </span>
                                                                                <?= $row["gender"] ?>
                                                                            </p>
                                                                            <p class="posted_at">
                                                                                <span class="label">Religion : </span>
                                                                                <?= $row["religion"] ?>
                                                                            </p>
                                                                            <p class="posted_at">
                                                                                <span class="label">Civil Status : </span>
                                                                                <?= $row["civil_status"] ?>
                                                                            </p>
                                                                            <p class="posted_at">
                                                                                <span class="label">Tin Number : </span>
                                                                                <?= $row["tin_number"] ?>
                                                                            </p>
                                                                            <p class="posted_at">
                                                                                <span class="label">Disability : </span>
                                                                                <?= $row["disability"] ?>
                                                                            </p>
                                                                            <br>
                                                                        <?php } ?>
                                                                        <p class="address">
                                                                            <span class="label">Address : </span>
                                                                            <?= $row['address']; ?>
                                                                        </p>
                                                                        <p class="posted_at">
                                                                            <span class="label">Created at : </span>
                                                                            <?= date("m/d/Y h:i A", strtotime($row["created_at"])) ?>
                                                                        </p>
                                                                        <p class="posted_at">
                                                                            <span class="label">Last Login : </span>
                                                                            <?= date("m/d/Y h:i A", strtotime($row["updated_at"])) ?>
                                                                        </p>
                                                                        <br>
                                                                        <button type="button" id="<?php echo $row["prof_id_image"] ?>"
                                                                            onclick="showProfId(this.id, this.name)" name="3"
                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 30px; padding-right: 30px;border-radius: 10px;">VIEW</button>
                                                                        <button type="button" id="<?php echo $row["id"] ?>"
                                                                            onclick="updateAccountStatus(this.id, this.name)" name="3"
                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 30px; padding-right: 30px;border-radius: 10px;">DECLINE</button>
                                                                        <button type="button" id="<?php echo $row["id"] ?>"
                                                                            onclick="updateAccountStatus(this.id,this.name)" name="1"
                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 30px; padding-right: 30px;border-radius: 10px;">ACCEPT</button>
                                                                        <br><br>

                                                                        <?php if ($row["type"] == 2) { ?>
                                                                            <?php
                                                                            $usercompany_id = $row["id"];
                                                                            $userdocuments = mysqli_query($con, "SELECT * FROM `tbl_company` WHERE userid = '$usercompany_id'");
                                                                            if (hasResult($userdocuments)) {
                                                                                $datauserdocuments = mysqli_fetch_assoc($userdocuments);
                                                                            }
                                                                            ?>

                                                                            <div class="row">
                                                                                <?php if (isset($datauserdocuments["c_doc1"])) { ?>
                                                                                    <div class="col-md-4 col-xs-12"
                                                                                        style="width:100% !important; margin-bottom:2vh;">
                                                                                        <a href="../../assets/documents/<?php echo $datauserdocuments["c_doc1"]; ?>"
                                                                                            download
                                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 5px; padding-right: 5px;border-radius: 10px; font-size:1vh; width:100% !important; margin-bottom:1vh;">
                                                                                            Letter of Intent
                                                                                        </a>
                                                                                    </div>
                                                                                <?php } ?>
                                                                                <?php if (isset($datauserdocuments["c_doc2"])) { ?>
                                                                                    <div class="col-md-4 col-xs-12"
                                                                                        style="width:100% !important; margin-bottom:2vh;">
                                                                                        <a href="../../assets/documents/<?php echo $datauserdocuments["c_doc2"]; ?>"
                                                                                            download
                                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 5px; padding-right: 5px;border-radius: 10px; font-size:1vh; width:100% !important; margin-bottom:1vh; ">
                                                                                            Company Profile
                                                                                        </a>
                                                                                    </div>
                                                                                <?php } ?>
                                                                                <?php if (isset($datauserdocuments["c_doc3"])) { ?>
                                                                                    <div class="col-md-4 col-xs-12"
                                                                                        style="width:100% !important; margin-bottom:2vh;">
                                                                                        <a href="../../assets/documents/<?php echo $datauserdocuments["c_doc3"]; ?>"
                                                                                            download
                                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 5px; padding-right: 5px;border-radius: 10px; font-size:1vh; width:100% !important; margin-bottom:1vh;">
                                                                                            BIR Form 2303
                                                                                        </a>
                                                                                    </div>
                                                                                <?php } ?>
                                                                                <?php if (isset($datauserdocuments["c_doc4"])) { ?>
                                                                                    <div class="col-md-6 col-xs-12"
                                                                                        style="width:100% !important; margin-bottom:2vh;">
                                                                                        <a href="../../assets/documents/<?php echo $datauserdocuments["c_doc4"]; ?>"
                                                                                            download
                                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 5px; padding-right: 5px;border-radius: 10px; font-size:1vh; width:100% !important; margin-bottom:1vh;">
                                                                                            Business Permit
                                                                                        </a>
                                                                                    </div>
                                                                                <?php } ?>
                                                                                <?php if (isset($datauserdocuments["c_doc5"])) { ?>
                                                                                    <div class="col-md-4 col-xs-12"
                                                                                        style="width:100% !important; margin-bottom:2vh;">
                                                                                        <a href="../../assets/documents/<?php echo $datauserdocuments["c_doc5"]; ?>"
                                                                                            download
                                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 5px; padding-right: 5px;border-radius: 10px; font-size:1vh;width:100% !important; margin-bottom:1vh;">
                                                                                            SEC / DTI Permit
                                                                                        </a>
                                                                                    </div>
                                                                                <?php } ?>
                                                                                <?php if (isset($datauserdocuments["c_doc6"])) { ?>
                                                                                    <div class="col-md-4 col-xs-12"
                                                                                        style="width:100% !important; margin-bottom:2vh;">
                                                                                        <a href="../../assets/documents/<?php echo $datauserdocuments["c_doc6"]; ?>"
                                                                                            download
                                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 5px; padding-right: 5px;border-radius: 10px; font-size:1vh; width:100% !important; margin-bottom:1vh;">
                                                                                            License Permit
                                                                                        </a>
                                                                                    </div>
                                                                                <?php } ?>
                                                                            </div>

                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <div class="col-md-12">
                                                            <div class="showcase">
                                                                <img src="./assets/empty.png" alt="empty" width="200">
                                                                <p>No Pending Account</p>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } elseif (value("sub") == "createadmin") { ?>

                                        <center>
                                            <div class="showcase" id="showcase_sub_list" style="width:50%;">
                                                <div class="container">
                                                    <div class="container_title">
                                                        <div class="title">
                                                            Create Administrator
                                                        </div>
                                                    </div>
                                                    <div class="container_body">
                                                        <form id="addForm3" method="post" onsubmit="addAdminAccount(event)"
                                                            style="width:100%; padding:2vh;">
                                                            <div class="field">
                                                                <label for="firstname">First Name:</label>
                                                                <input type="text" class="form-control" id="firstname"
                                                                    name="firstname" value="" required>
                                                            </div>
                                                            <div class="field">
                                                                <label for="lastname">Last Name:</label>
                                                                <input type="text" class="form-control" id="lastname"
                                                                    name="lastname" value="" required>
                                                            </div>
                                                            <div class="field">
                                                                <label for="cnum">Contact Number:</label>
                                                                <input type="number" class="form-control" id="cnum" name="cnum"
                                                                    value="" maxlength="11" required>
                                                            </div>
                                                            <div class="field">
                                                                <label for="bday">Birth Date:</label>
                                                                <input type="date" class="form-control" id="bday" name="bday"
                                                                    value="" required>
                                                            </div>
                                                            <div class="field">
                                                                <label for="address">Address:</label>
                                                                <input type="text" class="form-control" id="address" name="address"
                                                                    value="" required>
                                                            </div>

                                                            <input type="hidden" class="form-control" id="type" name="type"
                                                                value="1" required>
                                                            <input type="hidden" class="form-control" id="status_id"
                                                                name="status_id" value="1" required>
                                                            <input type="hidden" class="form-control" id="verification_state"
                                                                name="verification_state" value="2" required>

                                                            <br>
                                                            <hr>
                                                            <br>
                                                            <div class="field">
                                                                <label for="email">email:</label>
                                                                <input type="email" class="form-control" id="email" name="email"
                                                                    value="" required>
                                                            </div>
                                                            <div class="field">
                                                                <label for="password">Password:</label>
                                                                <input type="password" class="form-control" id="password"
                                                                    name="password" value="" required oninput="validatePassword()">
                                                            </div>
                                                            <div class="field">
                                                                <label for="password">Confirm-Password:</label>
                                                                <input type="password" class="form-control" id="confirmpassword"
                                                                    name="confirmpassword" value="" required
                                                                    oninput="confirmPassword()">
                                                            </div>
                                                            <center>
                                                                <div class="field" style="width:100%;">
                                                                    <div id="passwordError"
                                                                        style="color: red; text-align:center;width:100%;"></div>
                                                                </div>
                                                            </center>
                                                            <script>
                                                                function validatePassword() {
                                                                    var password = document.getElementById("password").value;
                                                                    var passwordError = document.getElementById("passwordError");

                                                                    // Regular expressions to check for uppercase, lowercase, and symbol
                                                                    var uppercaseRegex = /[A-Z]/;
                                                                    var lowercaseRegex = /[a-z]/;
                                                                    var symbolRegex = /[!@#$%^&*(),.?":{}|<>]/;

                                                                    // Check if password meets all criteria
                                                                    if (password.length < 8) {
                                                                        passwordError.textContent = "Password must be at least 8 characters long";
                                                                    } else if (!uppercaseRegex.test(password)) {
                                                                        passwordError.textContent = "Password must contain at least one uppercase letter";
                                                                    } else if (!lowercaseRegex.test(password)) {
                                                                        passwordError.textContent = "Password must contain at least one lowercase letter";
                                                                    } else if (!symbolRegex.test(password)) {
                                                                        passwordError.textContent = "Password must contain at least one symbol";
                                                                    } else {
                                                                        passwordError.textContent = "";
                                                                    }
                                                                }
                                                            </script>

                                                            <script>
                                                                function confirmPassword() {
                                                                    var password = document.getElementById("password").value;
                                                                    var confirmPassword = document.getElementById("confirmpassword").value;

                                                                    if (password == confirmPassword) {
                                                                        document.getElementById("passwordError").innerHTML = "";
                                                                        document.getElementById("submitBtn").disabled = false;
                                                                    } else {
                                                                        document.getElementById("passwordError").innerHTML = "Passwords do not match";
                                                                        document.getElementById("submitBtn").disabled = true;
                                                                    }
                                                                }
                                                            </script>

                                                            <div class="field" style="display:none;">
                                                                <label for="jobarea_id" style="text-align:left;">Assign Job
                                                                    Area:</label>
                                                                <select id="jobarea_id" name="jobarea_id">
                                                                    <option value="" selected>Select Job Area</option>
                                                                    <?php
                                                                    $sql = "SELECT * FROM tbl_jobareas WHERE admin_id = '' OR admin_id IS NULL";
                                                                    $result = mysqli_query($con, $sql);
                                                                    if ($result) {
                                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                                            ?>
                                                                            <option value="<?php echo $row['id']; ?>">
                                                                                <?php echo $row['Location']; ?>
                                                                            </option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <br>
                                                            <center>
                                                                <button disabled type="submit" id="submitBtn" class="edit-button"
                                                                    style="color: white; padding:10px; background-color: #36344d; border-radius: 10px; width:50%; ">Create
                                                                    Admin Account</button>
                                                            </center>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </center>
                                        <script>
                                            function addAdminAccount(event) {
                                                event.preventDefault(); // Prevent default form submission
                                                var formData = new FormData($('#addForm3')[0]);
                                                $.ajax({
                                                    url: "./routes/addAdminAccount.php",
                                                    method: "post",
                                                    data: formData,
                                                    processData: false,
                                                    contentType: false,
                                                    success: function (res) {
                                                        console.log(res);
                                                        if (res.success) {
                                                            Swal.fire(
                                                                'Success',
                                                                `${res.message}`,
                                                                'success'
                                                            );
                                                            setTimeout(() => {
                                                                window.location.href = "?page=accounts&sub=createadmin"
                                                            }, 500);
                                                        } else {
                                                            Swal.fire(
                                                                'Failed',
                                                                `${res.message}`,
                                                                'error'
                                                            );
                                                        }
                                                    }
                                                });
                                            }
                                        </script>

                                        <?php ?>
                                    <?php } else {
                                        navigate("?page=accounts&sub=list");
                                    } ?>
                                </div>
                            </div>
                        <?php } else {
                            navigate("?page=accounts&sub=list");
                        } ?>
                    <?php } elseif ($page == "areas") { ?>

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

                                .col-md-12 {
                                    flex: 0 0 100%;
                                    /* Do not grow, do not shrink, take 100% width */
                                    max-width: 100%;
                                }

                                .col-md-2 {
                                    flex: 0 0 16.66667%;
                                    /* Do not grow, do not shrink, take 16.66667% width */
                                    max-width: 16.66667%;
                                }

                                .col-md-8 {
                                    flex: 0 0 66.66667%;
                                    /* Do not grow, do not shrink, take 66.66667% width */
                                    max-width: 66.66667%;
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
                        <div class="sidebar">
                            <a href="?page=areas&sub=list" <?= (value("sub") == "list") ? 'class="active"' : "" ?>>
                                <i class="fa fa-list"></i>
                                <p class="name">Job Areas</p>
                            </a>
                            <a href="?page=areas&sub=create" <?= (value("sub") == "create") ? 'class="active"' : "" ?>>
                                <i class="fa fa-list"></i>
                                <p class="name">Create Job Areas</p>
                            </a>
                        </div>
                        <div class="content">

                            <?php if (value("sub") == "list") { ?>
                                <div class="showcase" id="showcase_sub_list">
                                    <div class="container">
                                        <div class="container_title">
                                            <div class="title">
                                                Job Areas ( Locations )
                                            </div>
                                        </div>
                                        <div class="container_body">
                                            <div class="row">
                                                <?php
                                                $sql = "SELECT * FROM tbl_jobareas";
                                                $result = mysqli_query($con, $sql);
                                                if ($result) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                        <div class="col-md-4">
                                                            <div class="box"
                                                                style="border:1px solid black; border-radius:2vh; margin:2vh; min-height: 35vh;">
                                                                <div class="text">

                                                                    <div class="row">
                                                                        <div class="col-md-4 col-xs-12">
                                                                            <center>
                                                                                <?php if ($row['logo_area'] == '') {
                                                                                    $row['logo_area'] = 'company_logo_default.png';
                                                                                } ?>
                                                                                <?php if ($row['logo_area'] != '') { ?>
                                                                                    <img style="width:13vh; height:13vh; border-radius:50%;"
                                                                                        src="../../assets/images/<?php echo $row['logo_area']; ?>"
                                                                                        alt="logo" />
                                                                                <?php } ?>
                                                                                <p class="posted_at" style="font-size:2vh;">
                                                                                    <b>
                                                                                        <?= $row["Location"] ?>
                                                                                    </b>
                                                                                </p>
                                                                            </center>
                                                                        </div>
                                                                        <div class="col-md-8 col-xs-12">
                                                                            <p class="posted_at">
                                                                                <span class="label">Handled By : </span>
                                                                                <?php if ($row['admin_id'] != '') {
                                                                                    $admin_id = $row['admin_id'];
                                                                                    $admin_name = "";
                                                                                    $sql2 = "SELECT * FROM tbl_accounts WHERE id = '$admin_id'";
                                                                                    $result2 = mysqli_query($con, $sql2);
                                                                                    if ($result2) {
                                                                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                                                                            $admin_name = $row2['firstname'] . ' ' . $row2['lastname'];
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                    <?php echo $admin_name; ?>
                                                                                <?php } else { ?>
                                                                                    None
                                                                                <?php } ?>
                                                                            </p>

                                                                            <p class="address">
                                                                                <span class="label">Description : </span>
                                                                                <?= $row['Description']; ?>
                                                                            </p>
                                                                            <p class="posted_at">
                                                                                <span class="label">Created at : </span>
                                                                                <?= date("m/d/Y h:i A", strtotime($row["Date"])) ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <br>
                                                                    <center>
                                                                        <button type="button" id="<?php echo $row["id"] ?>"
                                                                            onclick="deleteArea(this.id)"
                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 30px; padding-right: 30px;border-radius: 10px;">DELETE</button>



                                                                        <button type="button" class="edit-button"
                                                                            onclick="openConfirmModal2('<?= $row["id"] ?>')"
                                                                            style="color: white; padding:10px; background-color: #36344d; padding-left: 30px; padding-right: 30px;border-radius: 10px;">EDIT</button>
                                                                    </center>

                                                                    <div class="modal fade" id="openConfirmModal2<?= $row["id"] ?>"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                            <div class="modal-content"
                                                                                style="margin-top:15vh; width:25%; height:25%; border-radius:1vh;">
                                                                                <center>
                                                                                    <div class="modal-body">
                                                                                        <div class="swal2-icon swal2-question swal2-icon-show"
                                                                                            style="display: flex;">
                                                                                            <div class="swal2-icon-content">?</div>
                                                                                        </div>
                                                                                        <br>
                                                                                        <h2 class="swal2-title">Are you sure you want to
                                                                                            modify this job area?</h2>
                                                                                    </div>
                                                                                    <br>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="swal2-confirm swal2-styled"
                                                                                            id="confirmEdit"
                                                                                            style="padding: .625em 1.1em; display: inline-block;border: 0;border-radius: .25em;background: initial;background-color: #7066e0;color: #fff;font-size: 1em;"
                                                                                            onclick="openEditDiv2('<?= $row["id"] ?>')">Yes</button>
                                                                                        <button type="button"
                                                                                            class="swal2-cancel swal2-styled"
                                                                                            data-dismiss="modal"
                                                                                            style="padding: .625em 1.1em; display: inline-block;border: 0;border-radius: .25em;background: initial;background-color: #6e7881;color: #fff;font-size: 1em;"
                                                                                            onclick="closeConfirmModal2('<?= $row["id"] ?>')">Cancel</button>
                                                                                    </div>
                                                                                </center>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="edit-div" id="editDiv2<?= $row["id"] ?>"
                                                                        style="margin-left:auto; display: none; width:100%; border: 1px solid #000; padding:10px; border-radius:1vh;">
                                                                        <!-- Form for editing -->
                                                                        <form id="editForm<?= $row["id"] ?>" method="post"
                                                                            onsubmit="editLocations(event, <?= $row["id"] ?>)"
                                                                            enctype="multipart/form-data">
                                                                            <input type="hidden" name="area_id"
                                                                                value="<?= $row["id"] ?>">

                                                                            <div class="field">
                                                                                <label for="logo">Upload New Logo:</label>
                                                                                <input type="file" class="form-control" id="logo"
                                                                                    name="logo" style="display:block;">
                                                                            </div>
                                                                            <div class="field">
                                                                                <label for="titlearea">Area Title:</label>
                                                                                <input type="text" class="form-control" id="titlearea"
                                                                                    name="titlearea" value="<?= $row["title_area"] ?>"
                                                                                    required>
                                                                            </div>

                                                                            <div class="field">
                                                                                <label for="titlearea">Location:</label>
                                                                                <select class="form-control" id="editLocation"
                                                                                    name="editLocation" required>
                                                                                    <option value="<?= $row["Location"] ?>">
                                                                                        <?= $row["Location"] ?>
                                                                                    </option>
                                                                                    <option value="Abra">Abra</option>
                                                                                    <option value="Apayao">Apayao</option>
                                                                                    <option value="Baguio">Baguio</option>
                                                                                    <option value="Benguet">Benguet</option>
                                                                                    <option value="Bicol Region">Bicol Region</option>
                                                                                    <option value="Cagayan Valley">Cagayan Valley</option>
                                                                                    <option value="Calabarzon">Calabarzon</option>
                                                                                    <option value="Central Luzon">Central Luzon</option>
                                                                                    <option value="Cordillera Administrative Region">Cordillera Administrative Region</option>
                                                                                    <option value="Ilocos Region">Ilocos Region</option>
                                                                                    <option value="Ifugao">Ifugao</option>
                                                                                    <option value="Kalinga">Kalinga</option>
                                                                                    <option value="La Trinidad">La Trinidad</option>
                                                                                    <option value="MIMAROPA">MIMAROPA</option>
                                                                                    <option value="Mountain Province">Mountain Province</option>
                                                                                    <option value="NCR">NCR</option>
                                                                                    <option value="SOCCSKSARGEN">SOCCSKSARGEN</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="field">
                                                                                <label for="editDescription"
                                                                                    style="text-align:left;">Description:</label>
                                                                                <textarea class="form-control" id="editDescription"
                                                                                    name="editDescription"><?= $row["Description"] ?></textarea>
                                                                            </div>
                                                                            <div class="field">
                                                                                <label for="handledby" style="text-align:left;">Handled
                                                                                    By:</label>
                                                                                <select id="handledby" name="handledby">
                                                                                    <?php if ($row['admin_id'] != '') { ?>
                                                                                        <option value="<?php echo $admin_id; ?>" selected>
                                                                                            <?php echo $admin_name; ?>
                                                                                        </option>
                                                                                    <?php } else { ?>
                                                                                        <option value="" selected>Select Handler</option>
                                                                                    <?php } ?>
                                                                                    <?php
                                                                                    $sql3 = "SELECT * FROM tbl_accounts 
                                                                             WHERE id NOT IN (
                                                                                 SELECT admin_id FROM tbl_jobareas WHERE admin_id IS NOT NULL
                                                                             ) 
                                                                             AND type = '1'";
                                                                                    $result3 = mysqli_query($con, $sql3);
                                                                                    if ($result3) {
                                                                                        while ($row3 = mysqli_fetch_assoc($result3)) {
                                                                                            ?>
                                                                                            <option value="<?php echo $row3['id']; ?>">
                                                                                                <?php echo $row3['firstname'] . ' ' . $row3['lastname']; ?>
                                                                                            </option>
                                                                                        <?php }
                                                                                    } ?>
                                                                                    <?php if ($row['admin_id'] != '') { ?>
                                                                                        <option value="">Set as Available</option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <center>
                                                                                <button type="submit" class="edit-button"
                                                                                    style="color: white; padding:10px; background-color: #36344d; padding-left: 30px; padding-right: 30px;border-radius: 10px; width:50%;">Save
                                                                                    Changes</button>
                                                                            </center>
                                                                        </form>

                                                                        <script>
                                                                            function editLocations(event, rowId) {
                                                                                event.preventDefault(); // Prevent default form submission

                                                                                // Get form data
                                                                                var formData = new FormData($('#editForm' + rowId)[0]);

                                                                                // Execute AJAX request
                                                                                $.ajax({
                                                                                    url: "./routes/editJobArea.php",
                                                                                    method: "post",
                                                                                    data: formData,
                                                                                    processData: false,
                                                                                    contentType: false,
                                                                                    success: function (res) {
                                                                                        console.log(res);
                                                                                        if (res.success) {
                                                                                            Swal.fire(
                                                                                                'Success',
                                                                                                `${res.message}`,
                                                                                                'success'
                                                                                            );
                                                                                            setTimeout(() => {
                                                                                                window.location.href = "?page=areas&sub=list"
                                                                                            }, 500);
                                                                                        } else {
                                                                                            Swal.fire(
                                                                                                'Failed',
                                                                                                `${res.message}`,
                                                                                                'error'
                                                                                            );
                                                                                        }
                                                                                    }
                                                                                });
                                                                            }
                                                                        </script>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <div class="col-md-12">
                                                        <div class="showcase">
                                                            <img src="./assets/empty.png" alt="empty" width="200">
                                                            <p>No Registered Job Areas Found.</p>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (value("sub") == "create") { ?>
                                <center>
                                    <div class="showcase" id="showcase_sub_list" style="width:50%;">
                                        <div class="container">
                                            <div class="container_title">
                                                <div class="title">
                                                    Create Job Areas
                                                </div>
                                            </div>
                                            <div class="container_body">
                                                <form id="addForm2" method="post" onsubmit="addJobArea(event)"
                                                    style="width:100%; padding:2vh;" enctype="multipart/form-data">

                                                    <div class="field">
                                                        <label for="logo2">Upload Logo:</label>
                                                        <input type="file" class="form-control" id="logo2" name="logo2"
                                                            style="display:block;" required>
                                                    </div>
                                                    <div class="field">
                                                        <label for="titlearea2">Area Title:</label>
                                                        <input type="text" class="form-control" id="titlearea2"
                                                            name="titlearea2" value="" required>
                                                    </div>

                                                    <div class="field">
                                                        <label for="titlearea">Location:</label>
                                                        <select class="form-control" id="addLocation2" name="addLocation2"
                                                            required>
                                                                                    <option value="Abra">Abra</option>
                                                                                    <option value="Apayao">Apayao</option>
                                                                                    <option value="Baguio">Baguio</option>
                                                                                    <option value="Benguet">Benguet</option>
                                                                                    <option value="Bicol Region">Bicol Region</option>
                                                                                    <option value="Cagayan Valley">Cagayan Valley</option>
                                                                                    <option value="Calabarzon">Calabarzon</option>
                                                                                    <option value="Central Luzon">Central Luzon</option>
                                                                                    <option value="Cordillera Administrative Region">Cordillera Administrative Region</option>
                                                                                    <option value="Ilocos Region">Ilocos Region</option>
                                                                                    <option value="Ifugao">Ifugao</option>
                                                                                    <option value="Kalinga">Kalinga</option>
                                                                                    <option value="La Trinidad">La Trinidad</option>
                                                                                    <option value="MIMAROPA">MIMAROPA</option>
                                                                                    <option value="Mountain Province">Mountain Province</option>
                                                                                    <option value="NCR">NCR</option>
                                                                                    <option value="SOCCSKSARGEN">SOCCSKSARGEN</option>
                                                        </select>
                                                    </div>
                                                    <div class="field">
                                                        <label for="addDescription2"
                                                            style="text-align:left;">Description:</label>
                                                        <textarea class="form-control" id="addDescription2"
                                                            name="addDescription2" value="" required></textarea>
                                                    </div>
                                                    <div class="field">
                                                        <label for="handledby2" style="text-align:left;">Handled By:</label>
                                                        <select id="handledby2" name="handledby2" required>
                                                            <option value="" selected>Select Handler</option>
                                                            <?php
                                                            $sql = "SELECT * FROM tbl_accounts WHERE id NOT IN (SELECT admin_id FROM tbl_jobareas WHERE admin_id IS NOT NULL) AND type = '1'";
                                                            $result = mysqli_query($con, $sql);
                                                            if ($result) {
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    ?>
                                                                    <option value="<?php echo $row['id']; ?>">
                                                                        <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="edit-button"
                                                        style="color: white; padding:10px; background-color: #36344d; padding-left: 30px; padding-right: 30px;border-radius: 10px; width:50%; margin-left:17%;">Add
                                                        Job Area</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                                <script>
                                    function addJobArea(event) {
                                        event.preventDefault(); // Prevent default form submission
                                        var formData = new FormData($('#addForm2')[0]);
                                        $.ajax({
                                            url: "./routes/addJobArea.php",
                                            method: "post",
                                            data: formData,
                                            processData: false,
                                            contentType: false,
                                            success: function (res) {
                                                console.log(res);
                                                if (res.success) {
                                                    Swal.fire(
                                                        'Success',
                                                        `${res.message}`,
                                                        'success'
                                                    );
                                                    setTimeout(() => {
                                                        window.location.href = "?page=areas&sub=create"
                                                    }, 500);
                                                } else {
                                                    Swal.fire(
                                                        'Failed',
                                                        `${res.message}`,
                                                        'error'
                                                    );
                                                }
                                            }
                                        });
                                    }
                                </script>

                            <?php } ?>
                        </div>
                    <?php } else {
                    navigate("./");
                } ?>
                </div>
            </div>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeProfid()">&times;</span>
                    <div class="image_id" id="image_id">
                        <img src="" width="450" id="itemDetail">
                    </div>
                </div>
            </div>
</body>

</html>

<script>
    function closeConfirmModal1(id) {
        var editDiv = document.getElementById('openConfirmModal' + id);
        if (editDiv.style.display === 'none') {
            editDiv.style.display = 'block';
        } else {
            editDiv.style.display = 'none';
        }
    }
</script>
<script>
    function openConfirmModal1(id) {
        var openConfirmModal = document.getElementById('openConfirmModal' + id);
        var editDiv = document.getElementById('editDiv' + id);
        editDiv.style.display = 'none';
        if (openConfirmModal.style.display === 'none') {
            openConfirmModal.style.display = 'block';
        } else {
            openConfirmModal.style.display = 'none';
        }
    }
</script>

<script>
    function openEditDiv1(id) {
        var editDiv = document.getElementById('editDiv' + id);
        var openConfirmModal = document.getElementById('openConfirmModal' + id);
        if (editDiv.style.display === 'none') {
            editDiv.style.display = 'block';
            openConfirmModal.style.display = 'none';
        } else {
            editDiv.style.display = 'none';
            openConfirmModal.style.display = 'block';
        }
    }
</script>


<script>
    function closeConfirmModal2(id) {
        var editDiv = document.getElementById('openConfirmModal2' + id);
        if (editDiv.style.display === 'none') {
            editDiv.style.display = 'block';
        } else {
            editDiv.style.display = 'none';
        }
    }
</script>
<script>
    function openConfirmModal2(id) {
        var openConfirmModal = document.getElementById('openConfirmModal2' + id);
        var editDiv = document.getElementById('editDiv2' + id);
        editDiv.style.display = 'none';
        if (openConfirmModal.style.display === 'none') {
            openConfirmModal.style.display = 'block';
        } else {
            openConfirmModal.style.display = 'none';
        }
    }
</script>

<script>
    function openEditDiv2(id) {
        var editDiv = document.getElementById('editDiv2' + id);
        var openConfirmModal = document.getElementById('openConfirmModal2' + id);
        if (editDiv.style.display === 'none') {
            editDiv.style.display = 'block';
            openConfirmModal.style.display = 'none';
        } else {
            editDiv.style.display = 'none';
            openConfirmModal.style.display = 'block';
        }
    }
</script>



<script type="text/javascript">
    function updateAccountStatus(id, status) {
        // alert(id);
        $.ajax({
            url: "./routes/confirmationStatus.php",
            method: "post",
            data: {
                id: id, status: status
            },
            success: (res) => {
                console.log(res)
                if (res.success) {
                    Swal.fire(
                        'Success',
                        `${res.message}`,
                        'success'
                    )
                    setTimeout(() => {
                        window.location.href = "?page=accounts&sub=pending"
                    }, 500);
                } else {
                    Swal.fire(
                        'Failed',
                        `${res.message}`,
                        'error'
                    )
                }
            }
        });

    }

    function deleteAccount(id) {
        $.ajax({
            url: "./routes/delete_account.php",
            method: "post",
            data: {
                id: id, status: status
            },
            success: (res) => {
                console.log(res)
                if (res.success) {
                    Swal.fire(
                        'Success',
                        `${res.message}`,
                        'success'
                    )
                    setTimeout(() => {
                        window.location.href = "?page=accounts&sub=list"
                    }, 500);
                } else {
                    Swal.fire(
                        'Failed',
                        `${res.message}`,
                        'error'
                    )
                }
            }
        });

    }

    function deleteArea(id) {
        $.ajax({
            url: "./routes/delete_area.php",
            method: "post",
            data: {
                id: id, status: status
            },
            success: (res) => {
                console.log(res)
                if (res.success) {
                    Swal.fire(
                        'Success',
                        `${res.message}`,
                        'success'
                    )
                    setTimeout(() => {
                        window.location.href = "?page=areas&sub=list"
                    }, 500);
                } else {
                    Swal.fire(
                        'Failed',
                        `${res.message}`,
                        'error'
                    )
                }
            }
        });

    }


    function showProfId(id, name) {
        $('#myModal').show();
        $("img#itemDetail").attr('src', id);

    }

    function closeProfid() {
        $('#myModal').hide();
    }
</script>