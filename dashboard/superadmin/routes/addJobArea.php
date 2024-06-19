<?php 
session_start();
require_once '../../../config.php';
require_once '../../../functions.php';
require_once '../../../session.php';

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST;

    function message($status, $message){
        $msg = array(
            "success" => $status,
            "message" => $message
        );
        echo json_encode($msg); // Change arraytojson to json_encode
        die();
    }

    // Get form data
    $titlearea2 =  mysqli_real_escape_string($con, $data["titlearea2"]);
    $editLocation = mysqli_real_escape_string($con, $data["addLocation2"]); // Escape user input to prevent SQL injection
    $editDescription = mysqli_real_escape_string($con, $data["addDescription2"]); // Escape user input to prevent SQL injection
    $handledby = $data["handledby2"];

    // File upload
    $imagesname = basename($_FILES["logo2"]["name"]); // Fixed variable name
    $targetDirectory = "../../../assets/images/"; // Change the directory path as needed
    $targetFile = $targetDirectory . basename($_FILES["logo2"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["logo2"]["tmp_name"]); // Fixed input file name
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            message(false, "File is not an image.");
        }
    }

    // Check file size
    if ($_FILES["logo2"]["size"] > 500000) { // Fixed input file name
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
        if (move_uploaded_file($_FILES["logo2"]["tmp_name"], $targetFile)) { // Fixed input file name
            $insert_jobarea = mysqli_query($con,"
            INSERT INTO
                `tbl_jobareas` (`Location`, `Description`, `admin_id`, `title_area`, `logo_area`)
            VALUES
                ('$editLocation', '$editDescription', '$handledby', '$titlearea2', '$imagesname')
            ");

            if($insert_jobarea){
                message(true,"Successfully inserted."); // Changed message to indicate successful insertion
            }else{
                message(false,"Failed to insert the job area.");
            }
        } else {
            message(false, "Sorry, there was an error uploading your file.");
        }
    }
}
?>
