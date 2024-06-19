
<?php
session_start();
require_once '../../config.php';
require_once '../../functions.php';
require_once '../../session.php';

setlocale(LC_MONETARY,"en_US");

if($islogin){
    if($u_type == 1){
        $page = (form("page")) ? value("page") : "dashboard";

        $load_jobs = mysqli_query($con,"SELECT * FROM `tbl_jobs`");
        $count_jobs = mysqli_num_rows($load_jobs);

        $load_company = mysqli_query($con,"SELECT * FROM `tbl_company`");
        $count_company = mysqli_num_rows($load_company);

        if(form("manage")){
            $update = true;
            $id = mysqli_value($con,"manage");
            if(is_numeric($id)){
                $manage_Job = mysqli_query($con,"SELECT * FROM `tbl_jobs`");
                if(hasResult($manage_Job)){
                    $data = mysqli_fetch_assoc($manage_Job);
                }else{
                    $update = false;
                }
            }else{
                $update = false;
            }
        }else{
            $update = false;
        }

        if(form("filter") && value("sub") == "applicants"){
            $filter = strtolower(mysqli_value($con,"filter"));
            if($filter == "pending"){
                $load_applicants = mysqli_query($con,"SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS 'resume', tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.status = 1");
            }elseif($filter == "hired"){
                $load_applicants = mysqli_query($con,"SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS 'resume', tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.status = 2 and tbl_applicants.is_archieve = 0");
            }elseif($filter == "declined"){
                $load_applicants = mysqli_query($con,"SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS 'resume', tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.status = 3");
            }else{
                $load_applicants = mysqli_query($con,"SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS 'resume', tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid ");
            }

            if(value("sub") == "is_archieve" ) {
                $load_applicants = mysqli_query($con,"SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS 'resume', tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.is_archieve = 1");
            }

        }else{
            $filter = "all";
            $load_applicants = mysqli_query($con,"SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS 'resume', tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid");

            if(value("sub") == "is_archieve" ) {
                $load_applicants = mysqli_query($con,"SELECT tbl_applicants.id, tbl_applicants.applicantsid, tbl_accounts.firstname, tbl_accounts.lastname, tbl_accounts.cnum, tbl_accounts.bday, tbl_accounts.address, tbl_accounts.age, tbl_resume.path AS 'resume', tbl_applicants.companyid, tbl_applicants.jobid, tbl_jobs.j_name, tbl_applicants.status, tbl_applicants.created_at FROM tbl_applicants INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid INNER JOIN tbl_resume ON tbl_resume.userid = tbl_applicants.applicantsid INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid WHERE tbl_applicants.is_archieve = 1");
            }
        }

        $count_applicants = mysqli_num_rows($load_applicants);

        if(form("view") && value("sub") == "company"){
            $company_id = mysqli_value($con,"view");

            if(is_numeric($company_id)){
                $validate_company = mysqli_query($con,"
                SELECT
                    tbl_accounts.firstname,
                    tbl_accounts.lastname,
                    tbl_company.*
                FROM
                    `tbl_company`
                INNER JOIN tbl_accounts ON
                    tbl_accounts.id = tbl_company.userid
                WHERE
                    tbl_company.id =  $company_id
                ");
                if(hasResult($validate_company)){
                    $company_view = true;
                    $data = mysqli_fetch_assoc($validate_company);

                    $publisher_name = $data["firstname"]." ".$data["lastname"];
                    $company_name = $data["c_name"];
                    $company_address = $data["c_address"];
                    $company_cnum = $data["c_cnum"];
                    $company_position = $data["c_position"];
                    $company_created_at = $data["created_at"];


                    $load_company_reports = mysqli_query($con,"
                        SELECT
                            tbl_accounts.firstname,
                            tbl_accounts.lastname,
                            tbl_company_reports.*
                        FROM
                            `tbl_company_reports`
                        INNER JOIN tbl_accounts ON
                            tbl_accounts.id = tbl_company_reports.reported_by
                        WHERE
                            `company_id` = $company_id
                    ");
                }else{
                    $company_view = false;
                }
            }else{
                $company_view = false;
            }
        }else{
            $company_view = false;
        }

       

        if(form("filter") && value("sub") == "list" && value("page") == "accounts"){
            $filter = strtolower(mysqli_value($con,"filter"));

            if($filter == "all"){
                $load_accounts = mysqli_query($con,"SELECT * FROM `tbl_accounts`");
            }else{
                function filter($filter){
                    if($filter == "admin"){
                        return 1;
                    }
                    if($filter == "company"){
                        return 2;
                    }
                    if($filter == "client"){
                        return 3;
                    }
                }
    
                $account_type = filter($filter);
    
                $load_accounts = mysqli_query($con,"SELECT * FROM `tbl_accounts` WHERE type = $account_type");
            }
        } elseif(value("sub") == "pending" && value("page") == "accounts"){ 
            $load_accounts = mysqli_query($con,"SELECT * FROM `tbl_accounts` WHERE status_id = 0");
        }
        else{
            $load_accounts = mysqli_query($con,"SELECT * FROM `tbl_accounts`");
        }
    }else{
        navigate("../../");
    }
}else{
    navigate("../../");
}
// Set headers for CSV download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="all_applicants.csv"');
header('Pragma: no-cache');
header('Expires: 0');

// Output CSV header
$output = fopen('php://output', 'w');
fputcsv($output, array('Job Title', 'Full Name', 'Birthday', 'Age', 'Address', 'Posted At'));

// Loop through applicants and output data
while ($row = mysqli_fetch_assoc($load_applicants)) {
    fputcsv($output, array(
        $row['j_name'],
        $row['firstname'] . ' ' . $row['lastname'],
        date("m/d/Y", strtotime($row["bday"])),
        $row["age"],
        $row['address'],
        date("m/d/Y h:i A", strtotime($row["created_at"]))
    ));
}

// Close the file handle
fclose($output);
?>
