<?php
session_start();
require_once '../../config.php';
require_once '../../functions.php';
require_once '../../session.php';

header("Content-Type: application/json");

function message($status,$message){
    $msg = array(
        "success" => $status,
        "message" => $message
    );
    echo arraytojson($msg);
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST;
    $id = $data["tb_company_id"];
    $description = $data["tb_description"];

    if($description == ""){
        message(false,"Please enter the description.");
    }

    $report_company = mysqli_query($con,"
    INSERT INTO `tbl_company_reports`(
        `company_id`,
        `reported_by`,
        `message`
    )
    VALUES(
        $id,
        $u_id,
        '$description'
    )
    ");
    if($report_company){
        message(true,"Your report was successfully submited.");
    }else{
        message(false,"Something went wrong with the server.");
    }
}