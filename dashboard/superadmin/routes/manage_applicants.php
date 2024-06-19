<?php 

session_start();
require_once '../../../vendor/autoload.php';
require_once '../../../config.php';
require_once '../../../functions.php';
require_once '../../../session.php';

header("Content-Type: application/json");

function message($status,$message){
    $msg = array(
        "success" => $status,
        "message" => $message
    );
    echo arraytojson($msg);
    die();
}
if($islogin){
    $id = mysqli_value($con,"id");
    $action = mysqli_value($con,"action");

    if(is_numeric($action)) {
        $update_status = mysqli_query($con,"UPDATE `tbl_applicants` SET `status` = $action WHERE `tbl_applicants`.`id` = $id");
        if($update_status){
            message(true,"Successfully updated.");
        }else{
            message(false,"Failed to update the status, Please try again.");
        }
    } else {
        if($action == "archive") {
            $is_archive = mysqli_value($con,"is_archive");
            $update_status = mysqli_query($con,"UPDATE `tbl_applicants` SET `is_archieve` = $is_archive WHERE `tbl_applicants`.`id` = $id");
            if($update_status){
                message(true,"Successfully updated.");
            }else{
                message(false,"Failed to update the status, Please try again.");
            }
        } elseif ($action == "set_schedule") {
            
            $remarks = mysqli_value($con,"remarks");
            $set_time_schedule = mysqli_value($con,"set_time_schedule");
            $status_schedule = mysqli_value($con,"status_schedule");

            $update_status = mysqli_query($con,"UPDATE `tbl_applicants` SET `set_time_schedule` = '$set_time_schedule', `remarks` = '$remarks',  `status_schedule` = '$status_schedule' 
            WHERE `tbl_applicants`.`id` = $id");

            
            if($update_status){

                $select_job = mysqli_query($con,"
                SELECT
                    tbl_applicants.id,
                    tbl_applicants.companyid,
                    tbl_applicants.applicantsid,
                    tbl_applicants.jobid,
                    tbl_company.c_name,
                    tbl_company.c_cnum,
                    tbl_jobs.j_name,
                    tbl_accounts.firstname,
                    tbl_accounts.lastname,
                    tbl_accounts.cnum,
                    tbl_applicants.set_time_schedule
                FROM
                    `tbl_applicants`
                INNER JOIN tbl_company ON tbl_company.id = tbl_applicants.companyid
                INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid
                INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid
                WHERE tbl_applicants.id = $id
                ");
                 // clicksend_sms($cnum,$sms_message);
                $info = mysqli_fetch_assoc($select_job);
                $sms_message = "Hello ".ucfirst($info["lastname"]).", Sending this calendar invite as a placeholder for our interview at ".$info["set_time_schedule"].". Please refer to link provided and check your email, please be there. Looking forward to discussing this opportunity with you. Thank you!";
                $details = [
                    'to' => $info["cnum"],
                    'text' => $sms_message,
                ];
                moviderSentSMS($con,$info["applicantsid"], $details);
                message(true,"Successfully updated.");
            }else{
                message(false,"Failed to update the status, Please try again.");
            }

        }
    }
}else{
    message(false,"Auth error");
}
?>