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
        echo json_encode($msg);
        die();
    }

    // Get form data
    $firstname = mysqli_real_escape_string($con, $data["firstname"]);
    $lastname = mysqli_real_escape_string($con, $data["lastname"]);
    $cnum = mysqli_real_escape_string($con, $data["cnum"]);
    $bday = mysqli_real_escape_string($con, $data["bday"]);
    $address = mysqli_real_escape_string($con, $data["address"]);
    $jobarea_id = mysqli_real_escape_string($con, $data["jobarea_id"]);
    $admin_id = mysqli_real_escape_string($con, $data["admin_id"]);

    $previous_handled= mysqli_real_escape_string($con, $data["previous_handled"]);

    $lastupdated = date('Y-m-d');
        // Calculate age
        $birthdate = new DateTime($bday);
        $currentDate = new DateTime();
        $age = $currentDate->diff($birthdate)->y;

        // Update tbl_accounts
        $update_account = mysqli_query($con, "
        UPDATE
            `tbl_accounts`
        SET
            `firstname` = '$firstname',
            `lastname` = '$lastname',
            `cnum` = '$cnum',
            `bday` = '$bday',
            `address` = '$address',
            `age` = '$age',
            `last_updated` = '$lastupdated'
        WHERE
            `id` = '$admin_id'
        ");

        if ($update_account) {
            if ($jobarea_id != '') {
                if($previous_handled != '')
                {
                    // Update admin_id in tbl_jobareas
                    $update_jobarea1 = mysqli_query($con, "
                    UPDATE
                        `tbl_jobareas`
                    SET
                        `admin_id` = ''
                    WHERE
                        `id` = $previous_handled
                    ");
                    if ($update_jobarea1) 
                    {
                        $update_jobarea = mysqli_query($con, "
                        UPDATE
                            `tbl_jobareas`
                        SET
                            `admin_id` = '$admin_id'
                        WHERE
                            `id` = $jobarea_id
                        ");
                        if ($update_jobarea) 
                        {
                            message(true, "Successfully updated.");
                        }
                    }
                }else{
                    
                        $update_jobarea = mysqli_query($con, "
                        UPDATE
                            `tbl_jobareas`
                        SET
                            `admin_id` = '$admin_id'
                        WHERE
                            `id` = $jobarea_id
                        ");
                        if ($update_jobarea) 
                        {
                            message(true, "Successfully updated.");
                        }
                }
            } else {
                message(true, "Successfully updated.");
            }
        } else {
            message(false, "Failed to update the admin account.");
        }
    
}
?>
