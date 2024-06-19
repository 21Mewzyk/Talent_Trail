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
    $address = $data["address"];
    $company_name = $data["company_name"];
    $company_cnum = $data["company_cnum"];
    $company_address = $data["company_address"];
    $company_position = $data["company_position"];
    $email = $data["email"];
    $password = md5($data["password"]);
    $jobarea_id = $data["jobarea_id"];
    $status2 = "2";
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
    if($bday == ""){
        message(false,"Please enter your birth day.");
    }
    if($age == ""){
        message(false,"Please enter your age.");
    }
    if($address == ""){
        message(false,"Please enter your address.");
    }
    if($company_name == ""){
        message(false,"Please enter your company name.");
    }

    if($company_cnum == ""){
        message(false,"Please enter your company contact number.");
    }elseif(strlen($company_cnum) < 11){
        message(false,"Company contact no. must contains 11 digits.");
    }
    if($company_address == ""){
        message(false,"Please enter your company address.");
    }
    if($company_position == ""){
        message(false,"Please enter your company position.");
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
    
    if(move_uploaded_file($fileTmpPath, $dest_path))
    {
        //register account
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
                `prof_id_image`,
                `job_area_id`,
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
                '$dest_path',
                '$jobarea_id',
                '$status2'
            )
        ");

        if($register_account){
            $user_id = $con->insert_id;


                $allowed2 = array('jpeg', 'png', 'jpg', 'txt', 'pdf', 'docx', 'xlsx', 'csv');
                $filename2 = $_FILES['letterofcontent']['name'];
                $ext2 = pathinfo($filename2, PATHINFO_EXTENSION);

                if (!in_array($ext2, $allowed2)) {
                    message(false, "Invalid Document File Type.");
                }

                $fileTmpPath2 = $_FILES['letterofcontent']['tmp_name'];
                $fileName2 = $_FILES['letterofcontent']['name'];
                $fileSize2 = $_FILES['letterofcontent']['size'];
                $fileType2 = $_FILES['letterofcontent']['type'];
                $fileNameCmps2 = explode(".", $fileName2);
                $fileExtension2 = strtolower(end($fileNameCmps2));
                $newFileName2 = md5(time() . $fileName2) . '.' . $fileExtension2;

                $uploadFileDir2 = '../../assets/documents/';
                $dest_path2 = $uploadFileDir2 . $newFileName2;

                if(move_uploaded_file($fileTmpPath2, $dest_path2)) {
                } else {
                    message(false, "Failed to upload document file.");
                }

                $fileTmpPath3 = $_FILES['companyprofile']['tmp_name'];
                $fileName3 = $_FILES['companyprofile']['name'];
                $fileSize3 = $_FILES['companyprofile']['size'];
                $fileType3 = $_FILES['companyprofile']['type'];
                $fileNameCmps3 = explode(".", $fileName3);
                $fileExtension3 = strtolower(end($fileNameCmps3));
                $newFileName3 = md5(time() . $fileName3) . '.' . $fileExtension3;

                $uploadFileDir3 = '../../assets/documents/';
                $dest_path3 = $uploadFileDir3 . $newFileName3;

                if(move_uploaded_file($fileTmpPath3, $dest_path3)) {
                } else {
                    message(false, "Failed to upload document file.");
                }


                $fileTmpPath4 = $_FILES['birform']['tmp_name'];
                $fileName4 = $_FILES['birform']['name'];
                $fileSize4 = $_FILES['birform']['size'];
                $fileType4 = $_FILES['birform']['type'];
                $fileNameCmps4 = explode(".", $fileName4);
                $fileExtension4 = strtolower(end($fileNameCmps4));
                $newFileName4 = md5(time() . $fileName4) . '.' . $fileExtension4;

                $uploadFileDir4 = '../../assets/documents/';
                $dest_path4 = $uploadFileDir4 . $newFileName4;

                if(move_uploaded_file($fileTmpPath4, $dest_path4)) {
                } else {
                    message(false, "Failed to upload document file.");
                }


                $fileTmpPath5 = $_FILES['businesspermit']['tmp_name'];
                $fileName5 = $_FILES['businesspermit']['name'];
                $fileSize5 = $_FILES['businesspermit']['size'];
                $fileType5 = $_FILES['businesspermit']['type'];
                $fileNameCmps5 = explode(".", $fileName5);
                $fileExtension5 = strtolower(end($fileNameCmps5));
                $newFileName5 = md5(time() . $fileName5) . '.' . $fileExtension5;

                $uploadFileDir5 = '../../assets/documents/';
                $dest_path5 = $uploadFileDir5 . $newFileName5;

                if(move_uploaded_file($fileTmpPath5, $dest_path5)) {
                } else {
                    message(false, "Failed to upload document file.");
                }

                $fileTmpPath6 = $_FILES['secdtipermit']['tmp_name'];
                $fileName6 = $_FILES['secdtipermit']['name'];
                $fileSize6 = $_FILES['secdtipermit']['size'];
                $fileType6 = $_FILES['secdtipermit']['type'];
                $fileNameCmps6 = explode(".", $fileName6);
                $fileExtension6 = strtolower(end($fileNameCmps6));
                $newFileName6 = md5(time() . $fileName6) . '.' . $fileExtension6;

                $uploadFileDir6 = '../../assets/documents/';
                $dest_path6 = $uploadFileDir6 . $newFileName6;

                if(move_uploaded_file($fileTmpPath6, $dest_path6)) {
                } else {
                    message(false, "Failed to upload document file.");
                }


                $fileTmpPath7 = $_FILES['licensepermit']['tmp_name'];
                $fileName7 = $_FILES['licensepermit']['name'];
                $fileSize7 = $_FILES['licensepermit']['size'];
                $fileType7 = $_FILES['licensepermit']['type'];
                $fileNameCmps7 = explode(".", $fileName7);
                $fileExtension7 = strtolower(end($fileNameCmps7));
                $newFileName7 = md5(time() . $fileName7) . '.' . $fileExtension7;

                $uploadFileDir7 = '../../assets/documents/';
                $dest_path7 = $uploadFileDir7 . $newFileName7;

                if(move_uploaded_file($fileTmpPath7, $dest_path7)) {
                } else {
                    message(false, "Failed to upload document file.");
                }


            $register_company = mysqli_query($con,"
            INSERT INTO `tbl_company`(
                `userid`,
                `c_name`,
                `c_address`,
                `c_cnum`,
                `c_position`,
                `c_doc1`,
                `c_doc2`,
                `c_doc3`,
                `c_doc4`,
                `c_doc5`,
                `c_doc6`
            )
            VALUES(
                $user_id,
                '$company_name',
                '$company_address',
                '$company_cnum',
                '$company_position',
                '$newFileName2',
                '$newFileName3',
                '$newFileName4',
                '$newFileName5',
                '$newFileName6',
                '$newFileName7'
            )
            ");
            
            message(true,"Your account has been registered!");
        }else{
            message(false,"Failed to register your account");
        }
    }
    else
    {
        message(false,"Failed to register your account");
    }
    
}
?>