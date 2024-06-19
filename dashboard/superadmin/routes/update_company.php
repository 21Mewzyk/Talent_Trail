<?php 

session_start();
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


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST;

    $name = $data["tb_name"];
    $cnum = $data["tb_cnum"];
    $position = $data["tb_position"];
    $address = $data["tb_address"];

    if($name == ""){
        message(false,"Please enter the company name.");
    }
    if($cnum == ""){
        message(false,"Please enter the company contact number.");
    }elseif(strlen($cnum) < 11){
        message(false,"Contact number must contain 11 digits.");
    }
    if($position == ""){
        message(false,"Please enter your company position.");
    }
    if($address == ""){
        message(false,"Please enter the company address.");
    }

    $update_company_query = mysqli_query($con,"
        UPDATE
            `tbl_company`
        SET
            `c_name` = '$name',
            `c_address` = '$address',
            `c_cnum` = '$cnum',
            `c_position` = '$position'
        WHERE
            `id` = $c_id
    ");

    if($update_company_query){
        message(true,"Succesfully saved.");
    }else{
        message(false,"Found error in the server.");
    }
}
?>