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
    $file = $_FILES["file"];

    $dir = "../../resume";

    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileType = $file["type"];
    $fileError = $file["error"];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png','pdf');


    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 5000000){

                $fileNewName = md5($u_id).".".$fileActualExt;
                $fileDestination = $dir."/".$fileNewName;

                $upload_status = move_uploaded_file($fileTmpName,$fileDestination);

                if($upload_status){
                    if($have_resume){
                        $upload_query = mysqli_query($con,"
                        UPDATE
                            `tbl_resume`
                        SET
                            `path` = '$fileNewName'
                        WHERE
                            `userid` = $u_id
                        ");
                    }else{
                        $upload_query = mysqli_query($con,"
                        INSERT INTO `tbl_resume`(`userid`, `path`)
                        VALUES(
                            $u_id,
                            '$fileNewName'
                        )
                        ");
                    }
                    
                    if($upload_query){
                        $update = mysqli_query($con,"
                            UPDATE
                                `tbl_accounts`
                            SET
                                `verification_state` = 2
                            WHERE
                                `id` = $u_id;
                        ");

                        if($update){
                            message(true,"Successfully saved!");
                        }else{
                            message(false,"There was an error uploading your file!");
                        }
                    }else{
                        message(false,"There was an error uploading your file!");
                    }
                }else{
                    message(false,"There was an error uploading your file!");
                }
            }else{
                message(false,"Your file is too big!");
            }
        }else{
            message(false,"There was an error uploading your file!");
        }
    }else{
        message(false,"You cannot upload files of this type!");
    }
}