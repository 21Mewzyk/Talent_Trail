<?php 
session_start();
require_once '../vendor/autoload.php';
require_once '../config.php';
require_once '../functions.php';
require_once '../session.php';

// header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    extract($_POST);
    function message($status,$message){
        $msg = array(
            "success" => $status,
            "message" => $message
        );
        echo arraytojson($msg);
        die();
    }
    $update = mysqli_query($con,"
        UPDATE
            `tbl_notification`
        SET
            `status` = 1
        WHERE
            `id` = $id;
    ");
    if($update){

        $data = mysqli_query($con,"
            SELECT
                *
            FROM
                `tbl_notification`
            WHERE
                `id` = ".$id."
        ");

        $info = mysqli_fetch_assoc($data);
        

        $data2 = mysqli_query($con,"
            SELECT
                *
            FROM
                `tbl_accounts`
            WHERE
                `id` = ".$info["user_id"]."
        ");

        $raw = mysqli_fetch_assoc($data2);

        echo $raw["type"];
    }else{
        echo "FAILED";
    }
}