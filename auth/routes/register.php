<?php
require_once '../../config.php';
require_once '../../functions.php';

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST;
    $account_type  = $data["account_type"];
    $fname = $data["fname"];
    $lname = $data["lname"];
    $cnum = $data["cnum"];
    $bday = date("Y-m-d",strtotime($data["bday"]));
    $age = $data["age"];
    $address = $data["address1"].' '.$data["address2"].' '.$data["address3"].' '.$data["address4"];
    $email = $data["email"];
    $password2 = $data["password"];
    $degree_title = $data["degree_title"];
    $school_name = $data["school_name"];
    $school_address = $data["school_address"];
    $school_year_attended = $data["school_year_attended"];
    $achievement = $data["achievement"];
    $jobarea_id = $data["jobarea_id"];

    $password = md5($password2);

    $middle_name = $data["middle_name"];
    $suffix = $data["suffix"];
    $gender = $data["gender"];
    $religion = $data["religion"];
    $civil_status = $data["civil_status"];
    $tin_number = $data["tin_number"];
    $height = $data["height"];

    $disability1 = $data["disability1"];
    $disability2 = $data["disability2"];
    $disability = "";

    if(empty($disability1)){
        if(!empty($disability2)){
            $disability = $disability2;
        }
    }else{
        $disability = $disability1;
    }

    function message($status,$message){
        $msg = array(
            "success" => $status,
            "message" => $message
        );
        echo arraytojson($msg);
        die();
    }

    if($fname == ""){
        message(false,"Please enter your first name.");
    }
    if($lname == ""){
        message(false,"Please enter your last name.");
    }
    if($cnum == ""){
        message(false,"Please enter your contact number.");
    }elseif(strlen($cnum) < 11){
        message(false,"Contact no. must contains 11 digits.");
    }
    if($bday == "" || $bday == "1970-01-01"){
        message(false,"Please enter your birth day.");
    }
    if($age == ""){
        message(false,"Please enter your age.");
    }
    if($address == ""){
        message(false,"Please enter your address.");
    }
    if($email == ""){
        message(false,"Please enter your email.");
    }
    if($password == ""){
        message(false,"Please enter your password.");
    }elseif(strlen($password) < 6){
        message(false,"Password must be 6 characters or more.");
    }
    $allowed = array('jpeg', 'png', 'jpg');
    $filename = $_FILES['valid_photo']['name'][0];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        message(false,"Image must be jpeg, png, jpg.");
    }
    // echo '<pre>';
    // print_r($_POST);
    // print_r($_FILES);
    // echo '</pre>';

    //check if email is already registered
    $check_email = mysqli_query($con,"SELECT * FROM `tbl_accounts` WHERE `email` = '$email'");
    if($check_email) {
        if(hasResult($check_email)){
            message(false,"The email is already in use, Please try another.");
        }
    }else{
        message(false,"There was a problem with your email address.");
    }

    $fileTmpPath = $_FILES['valid_photo']['tmp_name'][0];
    $fileName = $_FILES['valid_photo']['name'][0];
    $fileSize = $_FILES['valid_photo']['size'][0];
    $fileType = $_FILES['valid_photo']['type'][0];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // directory in which the uploaded file will be moved
    $uploadFileDir = '../../assets/images/';
    $dest_path = $uploadFileDir . $newFileName;
    
    if(move_uploaded_file($fileTmpPath, $dest_path)) {
        //register_account
        $register_account = mysqli_query($con,"
        INSERT INTO `tbl_accounts`(
            `firstname`,
            `lastname`,
            `cnum`,
            `bday`,
            `age`,
            `address`,
            `email`,
            `password`,
            `type`,
           `degree_title`,
           `school_name`,
           `school_address`,
           `school_year_attended`,
           `achievement`,
           `prof_id_image`,
           `job_area_id`,
           `middle_name`,
           `suffix`,
           `gender`,
           `religion`,
           `civil_status`,
           `tin_number`,
           `disability`,
           `height`,
           `verification_state`
        )
        VALUES(
                '$fname',
                '$lname',
                '$cnum',
                '$bday',
                $age,
                '$address',
                '$email',
                '$password',
                $account_type,
                '$degree_title',
                '$school_name',
                '$school_address',
                '$school_year_attended',
                '$achievement',
                '$dest_path',
                '$jobarea_id',
                '$middle_name',
                '$suffix',
                '$gender',
                '$religion',
                '$civil_status',
                '$tin_number',
                '$disability',
                '$height',
                '2'
            )
        ");

        if($register_account){
            message(true,"Your account has been registered!");
        }else{
            message(false,"Failed to register your account");
        }
    } else {
        message(false,"Failed to register your account");
    }
    
    
}
?>