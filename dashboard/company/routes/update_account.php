<?php 
session_start();
require_once '../../../config.php';
require_once '../../../functions.php';
require_once '../../../session.php';

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST;

    $email = $data["tb_email"];
    $cnum = $data["tb_cnum"];
    
    function message($status,$message){
        $msg = array(
            "success" => $status,
            "message" => $message
        );
        echo arraytojson($msg);
        die();
    }

    if($email == ""){
        message(false,"Please enter email address.");
    }
    if($cnum == ""){
        message(false,"Please enter contact number.");
    }elseif(strlen($cnum) < 11){
        message(false,"Contact number must contain 11 numbers.");
    }



    if(checkemail($con,$email,"AND id != $u_id")){
        message(false,"The email you've enter is already used by the another user.");
    }else{
        if(checkcnum($con,$cnum,"AND id != $u_id")){
            message(false,"The contact number you've enter is already used by the another user.");
        }else{
            $change_account = mysqli_query($con,"
                UPDATE
                    `tbl_accounts`
                SET
                    `cnum` = '$cnum',
                    `email` = '$email'
                WHERE
                    `id` = $u_id
            ");
            if($change_account){
                message(true,"Successfully updated");
            }else{
                message(false,"Failed to update your account.");
            }
        }
    }
}
?>  