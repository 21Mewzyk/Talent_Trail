<?php 
session_start();
require_once '../../vendor/autoload.php';
require_once '../../config.php';
require_once '../../functions.php';
require_once '../../session.php';

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $data = $_POST;
    $code = $data["tb_code"];


    function message($status,$message){
        $msg = array(
            "success" => $status,
            "message" => $message
        );
        echo arraytojson($msg);
        die();
    }

    if($code == ""){
        message(false,"Please enter the verification code.");
    }elseif(strlen($code) < 6){
        message(false,"Verification code must contain 6 digits");
    }

    $session_id = $_SESSION["request_id"];

    $validate_code = mysqli_query($con,"
        SELECT * FROM `tbl_verificationcode` WHERE `session` = '$session_id'
    ");
    if($validate_code){
        if(hasResult($validate_code)){
            $data = mysqli_fetch_assoc($validate_code);
            $id = $data["id"];
            $status = $data["status"];
            if($status == 0){

                $details = [
                    'request_id' => $session_id,
                    'code' =>$code,
                ];
                $verify = moviderVerifyCode($con,$u_id, $details);
                if($verify) {
                    $update = mysqli_query($con,"
                        UPDATE
                            `tbl_verificationcode`
                        SET
                            `status` = 1
                        WHERE
                            `session` = '$session_id'
                    ");

                    $update = mysqli_query($con,"
                        UPDATE
                            `tbl_accounts`
                        SET
                            `verification_state` = 1
                        WHERE
                            `id` = $u_id;
                    ");
                    unset($_SESSION["request_id"]);
                    if($update){
                        message(true,"You complete the step 1 verification.");
                    }else{
                        message(false,"Error in the server, Please try again later.");
                    }
                } else {
                    message(false,"Error in the server, Please try again later.");
                }
                

                
                

            }else{
                message(false,"The verification you've enter is already used.");
            }
        }else{
            message(false,"Invalid verification code.");
        }
    }else{
        message(false,"Error in the server, Please try again later.");
    }
}