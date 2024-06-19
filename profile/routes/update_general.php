<?php 
session_start();
require_once '../../config.php';
require_once '../../functions.php';
require_once '../../session.php';

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST;

    function message($status,$message){
        $msg = array(
            "success" => $status,
            "message" => $message
        );
        echo arraytojson($msg);
        die();
    }

    $firstname = $data["tb_firstname"];
    $jobarea_id = $data["jobarea_id"];
    $lastname = $data["tb_lastname"];
    $age = $data["tb_age"];
    $bday = date("Y-m-d",strtotime($data["tb_bday"]));
    $address = $data["tb_address"];


    $middle_name = $data["middle_name"];
    $suffix = $data["suffix"];
    $gender = $data["gender"];
    $religion = $data["religion"];
    $civil_status = $data["civil_status"];
    $tin_number = $data["tin_number"];
    $height = $data["height"];
    $disability = $data["disability"];


    if($firstname == ""){
        message(false,"Please enter your first name.");
    }
    if($lastname == ""){
        message(false,"Please enter your last name.");
    }
    if($bday == ""){
        message(false,"Please enter your birth day.");
    }
    if($age == ""){
        message(false,"Please enter your age.");
    }
    if($address == ""){
        message(false,"Please enter your address.");
    }

    $update_general = mysqli_query($con,"
    UPDATE
        `tbl_accounts`
    SET
        `firstname` = '$firstname',
        `lastname` = '$lastname',
        `bday` = '$bday',
        `age` = '$age',
        `address` = '$address',
        `job_area_id` = '$jobarea_id',
           `middle_name` = '$middle_name',
           `suffix` = '$suffix',
           `gender` = '$gender',
           `religion` = '$religion',
           `civil_status` = '$civil_status',
           `tin_number` = '$tin_number',
           `disability` = '$disability',
           `height` = '$height'
    WHERE
        `id` = $u_id
    ");
    $_SESSION['data']['job_area_id'] = $jobarea_id;
    if($update_general){
        message(true,"Successfully updated.");
    }else{
        message(false,"Failed to update your account.");
    }
}
?>  