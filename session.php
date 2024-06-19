<?php 

if(isset($_SESSION["islogin"])){
    $islogin = $_SESSION["islogin"];
    $data = $_SESSION["data"];

    
    $u_id = $data["id"];
    $load_data = mysqli_query($con,"SELECT * FROM `tbl_accounts` WHERE id = $u_id");
    
    if(hasResult($load_data)){
        $data = mysqli_fetch_assoc($load_data);

        $u_fname = $data["firstname"];
        $u_lname = $data["lastname"];
        $u_cnum = $data["cnum"];
        $u_bday = $data["bday"];
        $u_age = $data["age"];
        $u_address = $data["address"];
        $u_email = $data["email"];
        $u_password = $data["password"];
        $u_type = $data["type"];
        $u_verification_state = $data["verification_state"];
        $u_avatar = $data["avatar"];
        $u_createdat = $data["created_at"];
    
        if($u_type == 3){
            $load_resume = mysqli_query($con,"SELECT * FROM `tbl_resume` WHERE userid = $u_id");
    
            if(hasResult($load_resume)){
                $resume_data = mysqli_fetch_assoc($load_resume);
                $have_resume = true;
                $r_path = $resume_data["path"];
            }else{
                $have_resume = false;
            }
        }
    
        if($u_type == 2){
            $load_company = mysqli_query($con,"SELECT * FROM `tbl_company` WHERE userid = $u_id");
            $company_data = mysqli_fetch_assoc($load_company);
    
            $c_id = $company_data["id"];
            $c_name = $company_data["c_name"];
            $c_address = $company_data["c_address"];
            $c_cnum = $company_data["c_cnum"];
            $c_position = $company_data["c_position"];
            $c_logo = $company_data["c_logo"];
            $c_banner = $company_data["c_banner"];
            $c_department = $company_data["department"];
            $c_createdat = $company_data["created_at"];
        }
    }else{
        navigate("./logout.php");
    }
}else{
    $islogin = false;
}
?>

<?php
// config.php
define('MAILHOST', "smtp.gmail.com");
define('USERNAME', "Talenttrail.applications@gmail.com");
define('PASSWORD', "vzngdwstgixeueuz");
define('REPLY_TO', "Talenttrail.applications@gmail.com");
define('REPLY_TO_NAME', "TalentTrail");


?>