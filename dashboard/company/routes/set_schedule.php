<?php 

session_start();
require_once '../../../vendor/autoload.php';
require_once '../../../config.php';
require_once '../../../functions.php';
require_once '../../../session.php';


function message($status,$message){
    $msg = array(
        "success" => $status,
        "message" => $message
    );
    echo arraytojson($msg);
    die();
}

if($islogin){
    $id = mysqli_value($con,"id");
    $action = mysqli_value($con,"action");

    $select_job = mysqli_query($con,"
    SELECT
        tbl_applicants.id,
        tbl_applicants.companyid,
        tbl_applicants.applicantsid,
        tbl_applicants.jobid,
        tbl_company.c_name,
        tbl_company.c_cnum,
        tbl_jobs.j_name,
        tbl_accounts.firstname,
        tbl_accounts.lastname,
        tbl_accounts.cnum,
        tbl_applicants.set_time_schedule,
        tbl_applicants.remarks,
        tbl_applicants.status_schedule
        
    FROM
        `tbl_applicants`
    INNER JOIN tbl_company ON tbl_company.id = tbl_applicants.companyid
    INNER JOIN tbl_jobs ON tbl_jobs.id = tbl_applicants.jobid
    INNER JOIN tbl_accounts ON tbl_accounts.id = tbl_applicants.applicantsid
    WHERE tbl_applicants.id = $id
    ");

    $info = mysqli_fetch_assoc($select_job);
    $set_time_schedule = $info["set_time_schedule"];
    $remarks = $info["remarks"];
    $status_schedule = $info["status_schedule"];
    
    ?>
   <div id="body_sechudel">
  
        Set Schedule
        <br><br>
        <input type="hidden" name="id" id="id" placeholder="id" value="<?= $info["id"] ?>">
        <input type="hidden" name="action" id="action" value="set_schedule">
        
        <div class="field">
            <label for="set_time_schedule">Set Time</label>
            <input type="datetime-local" name="set_time_schedule" id="set_time_schedule" value="<?= $set_time_schedule ?>">
        </div>
        <div class="field">
            <label for="remarks">Remarks</label>
            <input type="text" name="remarks" id="remarks" placeholder="Remarks" value="<?= $remarks ?>">
        </div>
        <div class="field">
            <label for="status_schedule">Status</label>
            <input type="text" name="status_schedule" id="status_schedule" placeholder="Status" value="<?= $status_schedule ?>">
        </div>
       
       
   </div>

    <?php
}else{
    message(false,"Auth error");
}
?>