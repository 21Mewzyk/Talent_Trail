<?php

session_start();
require_once '../../../vendor/autoload.php';
require_once '../../../config.php';
require_once '../../../functions.php';
require_once '../../../session.php';

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $position_name = mysqli_value($con,"position_name");

    $minimum_salary = mysqli_value($con,"minimum_salary");
    $maximum_salary = mysqli_value($con,"maximum_salary");
    $currency_symbol = mysqli_value($con,"currency_symbol");
    $description = $_POST["description"];
    $pwd_type = $_POST["pwd_type"];
    $job_category = $_POST["job_category"];

    function message($status,$message){
        $msg = array(
            "success" => $status,
            "message" => $message
        );
        echo arraytojson($msg);
        die();
    }

    if($position_name == ""){
        message(false, "Please enter the position name.");
    }
   
    if($minimum_salary == ""){
        message(false, "Please enter the minimum salary.");
    }
    if($maximum_salary == ""){
        message(false, "Please enter the maximum salary.");
    }
    if($currency_symbol == ""){
        message(false, "Please select currency symbol.");
    }
    if($description == ""){
        message(false, "Please enter the job description.");
    }

    $save_query = mysqli_query($con,"
    INSERT INTO `tbl_jobs`(
        `userid`,
        `j_name`,
        `j_min`,
        `j_max`,
        `j_currency_symbol`,
        `j_description`,
        `j_pwd_type`,
        `j_job_category`
    )
    VALUES(
        $u_id,
        '$position_name',
        $minimum_salary,
        $maximum_salary,
        '$currency_symbol',
        '$description',
        '$pwd_type',
        '$job_category'
    )
    ");

    $select_all_applicants = mysqli_query($con,"
        SELECT
            *
        FROM
            `tbl_accounts`
        WHERE
            `type` = 3 AND `department` = '$c_department' and verification_state = 2
    ");

    
    while($row = mysqli_fetch_assoc($select_all_applicants)){

        $cnum = $row["cnum"];
        $firstname = $row["firstname"];
        $sms_message = "AccessiblePath \n Hello $firstname, $c_name has new open job $position_name.";
        createNotify($con, $row["id"], $sms_message, 0);

        $details = [
            'to' => $cnum,
            'text' => $sms_message,
        ];
        moviderSentSMS($con,$row["id"], $details);
        // clicksend_sms($cnum,$sms_message);
    }


    if($save_query){
        message(true,"Successfully posted.");
    }else{
        message(false,"Failed to post the jobs.");
    }
}