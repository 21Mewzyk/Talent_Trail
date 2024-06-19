<?php 
session_start();
require_once '../../../config.php';
require_once '../../../functions.php';
require_once '../../../session.php';

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    function message($status, $message)
    {
        $msg = array(
            "success" => $status,
            "message" => $message
        );
        echo json_encode($msg); // Change arraytojson to json_encode
        die();
    }

    // Get form data
    $firstname = mysqli_real_escape_string($con, $data["firstname"]);
    $lastname = mysqli_real_escape_string($con, $data["lastname"]);
    $cnum = mysqli_real_escape_string($con, $data["cnum"]);
    $bday = mysqli_real_escape_string($con, $data["bday"]);
    $address = mysqli_real_escape_string($con, $data["address"]);
    $email = mysqli_real_escape_string($con, $data["email"]);
    $password2 = mysqli_real_escape_string($con, $data["password"]);
    $type = mysqli_real_escape_string($con, $data["type"]);
    $status_id = mysqli_real_escape_string($con, $data["status_id"]);
    $verification_state = mysqli_real_escape_string($con, $data["verification_state"]);
    $jobarea_id = mysqli_real_escape_string($con, $data["jobarea_id"]);

    $password = md5($password2);
    // Check if the email already exists
    $emailCheckQuery = "SELECT * FROM tbl_accounts WHERE email = '$email'";
    $emailCheckResult = mysqli_query($con, $emailCheckQuery);
    if (mysqli_num_rows($emailCheckResult) > 0) {
        // Email already exists, return error message
        message(false, "Email already exists.");
    } else {
        // Email is unique, proceed with insertion
        // Calculate age
        $birthdate = new DateTime($bday);
        $currentDate = new DateTime();
        $age = $currentDate->diff($birthdate)->y;

        // Insert into tbl_accounts
        $insert_account = mysqli_query($con, "
        INSERT INTO
            `tbl_accounts` (`firstname`, `lastname`, `cnum`, `bday`, `address`, `email`, `password`, `type`, `status_id`, `verification_state`, `age`)
        VALUES
            ('$firstname', '$lastname', '$cnum', '$bday', '$address', '$email', '$password', '$type', '$status_id', '$verification_state', '$age')
        ");

        if ($insert_account) {
            if($jobarea_id != ''){
            $inserted_id = mysqli_insert_id($con);

            $update_jobarea = mysqli_query($con, "
            UPDATE
                `tbl_jobareas`
            SET
                `admin_id` = '$inserted_id'
            WHERE
                `id` = $jobarea_id
            ");

            if ($update_jobarea) {
                message(true, "Successfully Account Has Been Created Successfully.");
            }
        }else{
            
                message(true, "Successfully Account Has Been Created Successfully.");
        }
        } else {
            message(false, "Failed to insert the admin account.");
        }
    }
}
?>
