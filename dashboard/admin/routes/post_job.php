<?php

session_start();
require_once '../../../config.php';
require_once '../../../functions.php';
require_once '../../../session.php';

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $position_name = mysqli_value($con,"position_name");
    $position_age = mysqli_value($con,"position_age");
    $minimum_salary = mysqli_value($con,"minimum_salary");
    $maximum_salary = mysqli_value($con,"maximum_salary");
    $currency_symbol = mysqli_value($con,"currency_symbol");
    $description = mysqli_value($con,"description");

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
    if($position_age == ""){
        message(false, "Please enter the qualification age.");
    }elseif($position_age < 18){
        message(false, "The qualification age must be 18 years old and above.");
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
        `j_age`,
        `j_min`,
        `j_max`,
        `j_currency_symbol`,
        `j_description`
    )
    VALUES(
        $u_id,
        '$position_name',
        $position_age,
        $minimum_salary,
        $maximum_salary,
        '$currency_symbol',
        '$description'
    )
    ");

    if($save_query){
        message(true,"Successfully posted.");
    }else{
        message(false,"Failed to post the jobs.");
    }
}