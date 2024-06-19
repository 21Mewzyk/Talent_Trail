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
    $set = $_POST["set"];

    $dir = "../../assets/images";

    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileType = $file["type"];
    $fileError = $file["error"];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 5000000){

                $fileNewName = $set."_".md5($u_id).".".$fileActualExt;
                $fileDestination = $dir."/".$fileNewName;

                $upload_status = move_uploaded_file($fileTmpName,$fileDestination);

                if($upload_status){
                    if($set == "company_logo"){
                        $update = mysqli_query($con,"
                            UPDATE
                                `tbl_company`
                            SET
                                `c_logo` = '$fileNewName'
                            WHERE
                                `id` = $c_id
                        ");
                    }elseif($set == "avatar"){
                        $update = mysqli_query($con,"
                            UPDATE
                                `tbl_accounts`
                            SET
                                `avatar` = '$fileNewName'
                            WHERE
                                `id` = $u_id
                        ");
                    }

                    
                    if($update){
                        message(true,"Changes successfully saved.");
                    }else{
                        message(false,"Something went wrong with the server.");
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
?>  