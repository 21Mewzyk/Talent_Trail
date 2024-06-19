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


    $pw = md5($data["tb_pw"]);
    $newpw = md5($data["tb_newpw"]);
    $cnewpw = md5($data["tb_cnewpw"]);

    if($pw == ""){
        message(false,"Please enter the password.");
    }
    if($newpw == ""){
        message(false,"Please enter the new password.");
    }
    if($cnewpw == ""){
        message(false,"Please confirm the new password.");
    }

    if($pw != $u_password){
        message(false,"The old password is invalid, Please try again.");
    }

    if($newpw == $u_password){
        message(false,"You've using the password that you already used");
    }

    if($newpw != $cnewpw){
        message(false,"The old password is invalid, Please try again.");
    }

    $change_password_query = mysqli_query($con,"
    UPDATE
        `tbl_accounts`
    SET
        `password` = '$newpw'
    WHERE
        `id` = $u_id
    ");

    if($change_password_query){
        message(true,"Successfully saved!");
    }else{
        message(false,"Failed to save the password!");
    }
}
?>