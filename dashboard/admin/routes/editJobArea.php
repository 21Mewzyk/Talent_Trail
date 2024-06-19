<?php 
session_start();
require_once '../../../config.php';
require_once '../../../functions.php';
require_once '../../../session.php';

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

    $area_id = $data["area_id"];
    $editLocation = $data["editLocation"];
    $editDescription = $data["editDescription"];
    $handledby = $data["handledby"];
    $titlearea2 = $data["titlearea"];

    // File upload
    if(isset($_FILES["logo"]["name"]) && $_FILES["logo"]["name"] != '')
    {
        $imagesname = basename($_FILES["logo"]["name"]); // Fixed variable name
        $targetDirectory = "../../../assets/images/"; // Change the directory path as needed
        $targetFile = $targetDirectory . basename($_FILES["logo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["logo"]["tmp_name"]); // Fixed input file name
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
                message(false, "File is not an image.");
            }
        }

        // Check file size
        if ($_FILES["logo"]["size"] > 500000) { // Fixed input file name
            $uploadOk = 0;
            message(false, "File is too large.");
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $uploadOk = 0;
            message(false, "Only JPG, JPEG, PNG & GIF files are allowed.");
        }

        if ($uploadOk == 0) {
            message(false, "Failed to insert the job area due to invalid image/logo.");
        } else {


        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFile)) { // Fixed input file name
            $update_jobarea = mysqli_query($con,"
            UPDATE
                `tbl_jobareas`
            SET
                `Location` = '$editLocation',
                `Description` = '$editDescription',
                `admin_id` = '$handledby',
                `title_area` = '$titlearea2',
                `logo_area` = '$imagesname'
            WHERE
                `id` = $area_id
            ");

            if($update_jobarea){
                message(true,"Successfully updated.");
            }else{
                message(false,"Failed to update the job area.");
            }

        } else {
            message(false, "Sorry, there was an error uploading your file.");
        }
        }
    }else{


            $update_jobarea = mysqli_query($con,"
            UPDATE
                `tbl_jobareas`
            SET
                `Location` = '$editLocation',
                `Description` = '$editDescription',
                `admin_id` = '$handledby',
                `title_area` = '$titlearea2'
            WHERE
                `id` = $area_id
            ");

            if($update_jobarea){
                message(true,"Successfully updated.");
            }else{
                message(false,"Failed to update the job area.");
            }

    }
}
?>  