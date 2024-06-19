<?php
session_start();
require_once '../config.php';
require_once '../functions.php';
require_once '../session.php';

$job_area_id = $_SESSION['data']['job_area_id'];
$job_area_logo = "";
$job_area_title = "";
$sql2 = "SELECT * FROM tbl_jobareas WHERE id = '$job_area_id'";
$result2 = mysqli_query($con, $sql2);
    if ($result2) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $job_area_logo = $row2['logo_area'];
            $job_area_title = $row2['title_area'];
    }
}
$report = false;
$apply = false;

if(form("id")){
    if(!$islogin){
        navigate("../auth/?a=already");
    }

    $id = mysqli_value($con,"id");

    $result_query = mysqli_query($con,"
    SELECT
        tbl_jobs.id,
        tbl_company.id as 'c_id',
        tbl_company.c_name,
        tbl_company.c_address,
        tbl_company.c_cnum,
        tbl_company.userid,
        tbl_accounts.firstname,
        tbl_accounts.lastname,
        tbl_jobs.j_name,
        tbl_jobs.j_age,
        tbl_jobs.j_min,
        tbl_jobs.j_max,
        tbl_jobs.j_currency_symbol,
        tbl_jobs.j_description,
        tbl_jobs.j_created_at
    FROM
        tbl_jobs
    INNER JOIN tbl_company ON tbl_company.userid = tbl_jobs.userid
    INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_jobs.userid

    WHERE
    tbl_jobs.id = $id
    ");

    if(hasResult($result_query)){
        $data = mysqli_fetch_assoc($result_query);
    }else{
        navigate("./");
    }

    if(form("apply")){
        //check if the user is fully verified.
        $apply = true;
        if($u_verification_state == 2){
            $fully_verified = true;

            $job_id = $data["id"];
            $company_id = $data["c_id"];
            
            $check_application = mysqli_query($con,"SELECT * FROM `tbl_applicants` WHERE `companyid` = $company_id AND `applicantsid` = $u_id AND `jobid` = $job_id AND `status` <> 4");
            if(hasResult($check_application)){
                $already_submited = true;
            }else{
                $submit_application = mysqli_query($con,"
                INSERT INTO `tbl_applicants`(
                    `companyid`,
                    `applicantsid`,
                    `jobid`
                )
                VALUES(
                    $company_id,
                    $u_id,
                    $job_id
                )
                ");
                $sms_message = ucwords($data["lastname"].', '.$data["firstname"]). ", Applying for  ".ucwords($data["j_name"]);
                createNotify($con, $data["userid"], $sms_message, 0);
                $already_submited = false;
            }
        }else{
            $fully_verified = false;
        }
    }else{
        $apply = false;
    }
}elseif(form("report") && is_numeric(value("report"))){
    $report = true;
    $reported_company_id = value("report");
}else{
    navigate("./");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/logo.png" >
    <title>Talent Trail</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./views.css">
    <link rel="stylesheet" href="../verify.css">
    <link rel="stylesheet" href="../header.css">
    <link rel="stylesheet" href="../notify_style.css">
    <!-- javascript -->
    <script src="./js/report_company.js" defer></script>
</head>
<body>
    <div class="main">
        <?php include '../header2.php' ?>
        <div class="body">
            <?php if($apply) {?>
                <?php if($fully_verified){?>
                    <?php if($already_submited){?>
                        <div class="box box_success">
                            <img src="../assets/success2.png" width="300px">
                            <p>
                                We already submit your application for this position, The company will notify you.
                            </p>
                            <a href="./">BACK</a>
                        </div>
                    <?php }else{?>
                        <div class="box box_success">
                            <img src="../assets/success2.png" width="300px">
                            <p>
                                Your application was successfully submited, The company will notify you.
                            </p>
                            <a href="./">BACK</a>
                        </div>
                    <?php }?>
                <?php }else{?>
                    <div class="box not_verified">
                        <img src="../assets/fail.png" width="300px">
                        <p>
                            Sorry you cannot apply for this job, Your account is not fully verified.
                        </p>
                        <a href="../profile/?page=general_information&sub=verified">GET VERIFED</a>
                    </div>
                <?php }?>
            
            <?php }elseif($report){?>
                <div class="box">
                    <div class="box_header_title" style="margin-bottom: .5rem">
                        REPORT COMPANY
                    </div>
                    <div class="box_body">
                        <form class="form frm_report_company" method="post">
                            <div class="field">
                                <label for="tb_company_id">Company ID</label>
                                <input type="text" name="tb_company_id" id="tb_company_id" class="tb" value="<?= $reported_company_id ?>" readonly>
                            </div>
                            <div class="field">
                                <label for="tb_description">Description</label>
                                <textarea name="tb_description" id="tb_description" class="tb textarea"></textarea>
                            </div>
                            <button type="submit">
                                SUBMIT
                            </button>
                        </form>
                    </div>
                </div>
            <?php }else{?>
            <div class="box job_information">
                    <div class="box_header">
                        <div class="box_header_title">
                            <?= $data["j_name"]?>
                        </div>
                        <div class="box_header_sub">
                            <p>
                                <i class="fa fa-building"></i>
                                <?= $data["c_name"]?>
                            </p>
                            <p>
                                <i class="fa fa-map-marker"></i>    
                                <?= $data["c_address"]?>
                            </p>
                            <p>
                                <i class="fa fa-money"></i>
                                <?= $data["j_currency_symbol"]." ".number_format($data['j_min'])." - ".$data["j_currency_symbol"]." ".number_format($data['j_max']) ?>
                            </p>
                            <p>
                                <i class="fa fa-calendar"></i>
                                <?= date("m-d-Y",strtotime($data["j_created_at"]))?>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="box_body">
                        <?= $data["j_description"]?>
                    </div>
                    <hr>
                    <div class="box_button">
                        <?php
                        $validator = 0;
                        $user_id = $_SESSION['data']['id'];
                        $load_data_notificaiton = mysqli_query($con,"SELECT * FROM `tbl_resume` WHERE userid = '$user_id'");
                        if(hasResult($load_data_notificaiton))
                        {
                            $validator++;
                        }

                        if($validator > 0){
                        ?>
                        <a href="?id=<?= $data["id"] ?>&apply=<?= $data["id"] ?>" class="btn_applynow">
                            <i class="fa fa-file-text-o"></i>
                            APPLY NOW
                        </a>

                        <a href="?report=<?= $data["c_id"] ?>" class="btn_applynow">
                            <i class="fa fa-exclamation-triangle"></i>
                            REPORT
                        </a>
                    <?php }else{ ?>
                        <small style="color:red; font-size:2vh;">Please click the Resume at the header to upload first your resume before applying to any job.</small>
                    <?php } ?>
                    </div>
            </div>
            <?php }?>
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