<?php
    session_start();
    
    require_once '../vendor/autoload.php';
    require_once '../config.php';
    require_once '../functions.php';
    require_once '../session.php';
    
    $msg = "";
    if(!$islogin){
        navigate("../");
    }
    
    
    if(!form("page") && value("page") !== ""){
        navigate("./?page=general_information");
    }
    
    $user_id = $_SESSION['data']['id'];
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

    if(isset($_POST['cancel'])){
        $application_id = $_POST['application_id'];

        $sql_update = "UPDATE TBL_APPLICANTS 
                       SET status = '4'
                       WHERE id = '$application_id'";

        // Execute the update query
        if (mysqli_query($con, $sql_update)) {
            $msg  =  "Application form has been cancelled successfully.";
        } else {
            $msg  = "Error updating record: " . mysqli_error($con);
        }
    }

    if(isset($_POST['archive'])){

        $application_id = $_POST['application_id'];

        $sql_update = "UPDATE tbl_applicants 
                       SET isdisplayed = '0'
                       WHERE id = '$application_id'";

        // Execute the update query
        if (mysqli_query($con, $sql_update)) {
            $msg  =  "Cancelled application form has been archived successfully.";
        } else {
            $msg  = "Error updating record: " . mysqli_error($con);
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
        <style>
            .track{position: relative;background-color: #ddd;height: 7px;display: -webkit-box;display: -ms-flexbox;display: flex;margin-bottom: 60px;margin-top: 50px}.track .step{-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;width: 25%;margin-top: -18px;text-align: center;position: relative}.track .step.active:before{background: #FF5722}.track .step::before{height: 7px;position: absolute;content: "";width: 100%;left: 0;top: 18px}.track .step.active .icon{background: #ee5435;color: #fff}.track .icon{display: inline-block;width: 40px;height: 40px;line-height: 40px;position: relative;border-radius: 100%;background: #ddd}.track .step.active .text{font-weight: 400;color: #000}.track .text{display: block;margin-top: 7px}.itemside{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;width: 100%}.itemside .aside{position: relative;-ms-flex-negative: 0;flex-shrink: 0}.img-sm{width: 80px;height: 80px;padding: 7px}ul.row, ul.row-sm{list-style: none;padding: 0}.itemside .info{padding-left: 15px;padding-right: 7px}.itemside .title{display: block;margin-bottom: 5px;color: #212529}p{margin-top: 0;margin-bottom: 1rem}.btn-warning{color: #ffffff;background-color: #ee5435;border-color: #ee5435;border-radius: 1px}.btn-warning:hover{color: #ffffff;background-color: #ff2b00;border-color: #ff2b00;border-radius: 1px}
            .track .step.actives:before {
                background: red;
            }
            /* Table */
            table {
              width: 100%;
              border-collapse: collapse;
              font-family: Arial, sans-serif;
            }

            /* Table Header */
            th {
              background-color: #f2f2f2;
              color: #333;
              font-weight: bold;
              padding: 10px;
              text-align: left;
              border-bottom: 2px solid #ddd;
            }

            /* Table Rows */
            tr:nth-child(even) {
              background-color: #f9f9f9;
            }

            /* Table Cells */
            td {
              padding: 10px;
              border-bottom: 1px solid #ddd;
            }

            /* Hover Effect */
            tr:hover {
              background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <?php

                                            $counter = 0;
                                            $sql2 = "SELECT * FROM tbl_applicants as a inner join tbl_accounts as b on a.applicantsid = b.id
                                            inner join tbl_company as c on a.companyid = c.id
                                            inner join tbl_jobs as d on a.jobid = d.id
                                            WHERE a.applicantsid = '$user_id'";
                                            $result2 = mysqli_query($con, $sql2);
                                                if ($result2) {
                                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                                        $counter++;
                                                    }
                                                }
        ?>
        <style>
            td{
                vertical-align: top;
            }
        </style>
        <div class="main">
            <?php include '../header2.php' ?>
            <div class="body">
                <div class="showcase">
                    <div class="content box_general_information">
                        <div class="container">
                            <div class="container_title">
                                TRACK AND MONITOR YOUR SUBMITTED APPLICATIONS
                            </div>
                            <div class="container_body">
                                <?php if($counter > 0){ ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Applied Job Title</th>
                                            <th>Description</th>
                                            <th>Salary Range</th>
                                            <th>Company Name</th>
                                            <th>Company Address</th>
                                            <th>Company Contact #</th>
                                            <th>Interview Details</th>
                                            <th style="text-align:center;">Application Journey</th>
                                            <th style="text-align:center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            #$user_id
                                            $counter = 0;
                                            $sql2 = "SELECT *, a.id as application_id FROM tbl_applicants as a inner join tbl_accounts as b on a.applicantsid = b.id
                                            inner join tbl_company as c on a.companyid = c.id
                                            inner join tbl_jobs as d on a.jobid = d.id
                                            WHERE a.applicantsid = '$user_id' AND a.isdisplayed = '1'";
                                            $result2 = mysqli_query($con, $sql2);
                                                if ($result2) {
                                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                                        $counter++;
                                            ?>
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo $row2['j_name']; ?></td>
                                                <td>
                                                    <?php 
                                                    $description = $row2['j_description'];
                                                    $uniqueId = uniqid(); // Generate a unique ID for each row

                                                    if (strlen($description) > 100) { // If description is longer than 10 characters
                                                        // Display truncated description with "View more" option
                                                        echo '<div id="truncatedDescription_' . $uniqueId . '">' . substr($description, 0, 100) . '... </div>';
                                                        echo '<div style="display:none !important;" id="fullDescription_' . $uniqueId . '">' . $description . '</div>';
                                                        echo '<center><span style="background-color:transparent;color:gray; padding:5px; border-radius:2vh; cursor:pointer;" onclick="toggleDescription(\'' . $uniqueId . '\')">View more</span></center>';
                                                    } else {
                                                        // Display full description if it's shorter than or equal to 10 characters
                                                        echo '<div id="truncatedDescription_' . $uniqueId . '">' . $description . '</div>';
                                                    }
                                                    ?>
                                                </td>

                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        var uniqueId = "<?php echo $uniqueId; ?>";
                                                        var fullDescription = document.getElementById('fullDescription_' + uniqueId);
                                                        if (fullDescription) {
                                                            fullDescription.style.display = 'none';
                                                        }
                                                    });

                                                    function toggleDescription(uniqueId) {
                                                        var truncatedDescription = document.getElementById('truncatedDescription_' + uniqueId);
                                                        var fullDescription = document.getElementById('fullDescription_' + uniqueId);
                                                        var viewMoreButton = document.querySelector('button[data-id="' + uniqueId + '"]');

                                                        if (truncatedDescription.style.display === 'none') {
                                                            truncatedDescription.style.display = 'inline'; // Show truncated description
                                                            fullDescription.style.display = 'none'; // Hide full description
                                                            viewMoreButton.innerText = 'View more';
                                                        } else {
                                                            truncatedDescription.style.display = 'none'; // Hide truncated description
                                                            fullDescription.style.display = 'inline'; // Show full description
                                                            viewMoreButton.innerText = 'View less';
                                                        }
                                                    }
                                                </script>


                                                <td><?php echo $row2['j_currency_symbol']; ?><?php echo number_format($row2['j_min'],2); ?> ~ <?php echo $row2['j_currency_symbol']; ?><?php echo number_format($row2['j_max'],2); ?></td>
                                                <td><?php echo $row2['c_name']; ?></td>
                                                <td><?php echo $row2['c_address']; ?></td>
                                                <td><?php echo $row2['c_cnum']; ?></td>

                                                <td>
                                                    <?php if($row2['set_time_schedule'] != null){ ?>
                                                        <p>Date & Time: <br><?php echo $row2['set_time_schedule']; ?></p>
                                                        <p>Remarks: <?php echo $row2['remarks']; ?></p>
                                                        <p>Status: <?php echo $row2['status_schedule']; ?></p>

                                                    <?php }else{ ?>
                                                        Still no scheduled interview.
                                                    <?php } ?>
                                                </td>

                                                <?php
                                                    echo '<td>';

                                                        $status1 = "";
                                                        $status2 = "";
                                                        $status3 = "";
                                                        if($row2['status'] == "1")
                                                        {
                                                          $status1 = "active";
                                                        }
                                                        
                                                        if($row2['status'] == "2")
                                                        {
                                                          $status1 = "active";
                                                          $status2 = "active";
                                                        }
                                                        
                                                        if($row2['set_time_schedule'] != null){ 
                                                          $status1 = "active";
                                                          $status3 = "active";
                                                        }
                                                        if($row2['status'] != "3" && $row2['status'] != "4"){
                                                            echo '<div class="track">
                                                                  <div class="step active">
                                                                    <span class="icon"> 
                                                                        <i class="fa fa-check"></i> 
                                                                    </span> 
                                                                    <span class="text">Submitted</span> 
                                                                  </div>
                                                                  <div class="step '.$status1.'"> 
                                                                    <span class="icon"> 
                                                                        <i class="fa fa-spinner fa-spin"></i>
                                                                    </span> 
                                                                    <span class="text">Under Review</span> 
                                                                  </div>
                                                                  <div class="step '.$status3.'"> 
                                                                    <span class="icon"> 
                                                                        <i class="fa fa-user-circle-o"></i>
                                                                    </span> 
                                                                    <span class="text">Scheduled Interview</span> 
                                                                  </div>
                                                                  <div class="step '.$status2.'">
                                                                    <span class="icon"> 
                                                                        <i class="fa fa-check"></i> 
                                                                    </span> 
                                                                    <span class="text">Hired</span> 
                                                                  </div>
                                                            </div>';
                                                        }else if($row2['status'] == 3){
                                                          ?>
                                                          <center><h4 style=" 
                                                          padding: 5px;
                                                          border: 1px dashed red;
                                                          border-radius: 2px;
                                                          background-color:#FF7F7F;
                                                          color:white;
                                                          ">Application has been declined</h4></center>
                                                          <?php
                                                        }
                                                        else if($row2['status'] == 4){
                                                          ?>
                                                          <center><h4 style=" 
                                                          padding: 5px;
                                                          border: 1px dashed red;
                                                          border-radius: 2px;
                                                          background-color:#FFD580;
                                                          color:black;
                                                          ">Application has been cancelled</h4></center>
                                                          <?php
                                                        }
                                                    echo '</td>';
                                                ?>
                                                <td>
                                                    <?php if($row2['status'] == "1" || $row2['status'] == "0"){ ?>
                                                    <form action="" method="POST">
                                                        <input type="hidden" id="application_id<?php echo $row2['application_id']; ?>" name="application_id" value="<?php echo $row2['application_id']; ?>"/>
                                                        <button type="submit" id="cancel<?php echo $row2['application_id']; ?>" name="cancel" class="button btn_submit" style="background-color:#FF7F7F;" onclick="return confirm('Are you sure you want to cancel your application form? This action cannot be undone.');">Cancel Application</button>

                                                    </form>

                                                    <?php }else if($row2['status'] == '4' && $row2['isdisplayed'] == '1'){ ?>

                                                    <form action="" method="POST">
                                                        <input type="hidden" id="application_id<?php echo $row2['application_id']; ?>" name="application_id" value="<?php echo $row2['application_id']; ?>"/>
                                                        <button type="submit" id="archive<?php echo $row2['application_id']; ?>" name="archive" class="button btn_submit" style="margin-top:-0.2vh; background-color:white; color:black; border: 1px solid black;" onclick="return confirm('Are you sure you want to hide this application form? This action cannot be undone.');">Archive</button>

                                                    </form>

                                                    <?php }else{
                                                        echo 'No Action Needed';
                                                    } ?>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                    </tbody>
                                </table>
                                <?php }else{ ?>

                                                          <center><h4 style=" 
                                                          padding: 5px;
                                                          border: 1px dashed black;
                                                          border-radius: 2px;
                                                          background-color:white;
                                                          color:black;
                                                          ">Currently No Application Has Been Submitted</h4></center>
                                <?php }?>
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