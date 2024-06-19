<?php

date_default_timezone_set('Asia/Manila');


function fetch_assoc($sql){
    return mysqli_fetch_assoc($sql);
}

function getTimeAndDate(){
    return date("Y-m-d H:i:s");
}
function getDateOfTheDay(){
    return date("Y-m-d");
}
function randomid(){
    $randomid = uniqid('',true);
    return md5($randomid);
}
function checkemail($con, $email, $exeception = ""){
    $check_query = mysqli_query($con,"SELECT * FROM `tbl_accounts` WHERE `email` = '$email' $exeception");
    if($check_query){
        if(mysqli_num_rows($check_query) > 0){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function checkcnum($con, $cnum, $exeception = ""){
    $check_query = mysqli_query($con,"SELECT * FROM `tbl_accounts` WHERE `cnum` = '$cnum' $exeception");
    if($check_query){
        if(mysqli_num_rows($check_query) > 0){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function clicksend_sms($cnum,$msg){
    $url = "https://api-mapper.clicksend.com/http/v2/send.php";
    $username = "AccessiblePath";
    $key = "CED78221-5B58-273D-C856-EBD16C3422B0";


    /* 
    Alternate account
    username = Connect@yahoo.com
    key = D0CDA481-F30A-7BC4-0B75-BECEF7135150

    registered 10/16/2022
    */
    $data_array = array(
        "method" => "http",
        "username" => $username,
        "key" => $key,
        "to" => $cnum,
        "message" => $msg
    );
    $data = http_build_query($data_array);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER	,true);

    $resp = curl_exec($ch);

    
    if (strpos($resp, 'Success') !== false) {
        return true;
    }else{
        return false;
    }
}
function form($e){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return isset($_POST[$e]);
        }else{
            return isset($_GET[$e]);
        }
}
function form_array($array){
    $length = count($array);
    $empty = 0;
    for($i = 0; $i < $length; $i++){
        if(form($array[$i])){
            
        }else{
            $empty++;
        }
    }
    if($empty > 0){
        return false;
    }else{
        return true;
    }
}
function hasResult($result){
    if(mysqli_num_rows($result) > 0){
        return true;
    }else{
        return false;
    }
}
function form_empty_array($array){
    $length = count($array);
    $empty = 0;
    for($i = 0; $i < $length; $i++){
        if(value($array[$i]) == ""){
            $empty++;
        }
    }
    if($empty > 0){
        return false;
    }else{
        return true;
    }
}
function show_empty_fields($array){
    $length = count($array);
    $emtpy_fields = "";
    for($i = 0; $i < $length; $i++){
        if(form($array[$i])){
        }else{
            $emtpy_fields .= "[$array[$i]]";           
        }
    }
    return $emtpy_fields;
}
function value($e){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST[$e])){
                return $_POST[$e];
        }   
    }else{
        if(isset($_GET[$e])){
                return $_GET[$e];
        }
    }
}
function mysqli_value($con,$e){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST[$e])){
            return mysqli_escape_string($con,$_POST[$e]);
        }   
    }else{
        if(isset($_GET[$e])){
            return mysqli_escape_string($con,$_GET[$e]);
        }
    }
}
function TimeAndDateToArray($time){
    $bt = debug_backtrace();
    $caller = array_shift($bt);
    $line = $caller['line'];
    
    if($time !== ""){
        if(($timestamp = strtotime($time)) !== false ){
            $output = getdate($timestamp);
            return  array('valid'=>1,'dat'=>$output);
        }else{
            /* $this->showErrors("value","<span class='method'>TimeAndDateToArray()</span> expecting valid time and date format.",$line); */
            return false;
        }
    }else{
        /* $this->showErrors("value","<span class='method'>TimeAndDateToArray()</span>parameter are empty.",$line); */
        return false;
    }

}


function navigate($e){
    if (filter_var($e, FILTER_VALIDATE_URL)) { 
        echo "<script>window.open('$e','_self')</script>";
    }else{
        echo "<script>window.location.href = '$e'</script>";
    }
}

    function arraytojson($array){

    if(is_array($array)){
        return json_encode($array,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }else{
        /* $this->showErrors("arraytojson","<span class='method'> arraytojson()</span> expecting an array.",$line); */
        return false;
    }
}

function getFileExtension($e){
    $fileExt = explode('.', $e);
    $fileActualExt = strtolower(end($fileExt));
    return $fileActualExt;
}

function moviderGetBalance($con,$userid){
    try {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://api.movider.co/v1/balance', [
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'api_key' => '2H7GtWOeyWYMff0XzK7en5zEdy6',
                'api_secret' => 'l8KFeCstZZokPZFEW0n8ci8L21k9PQ',
            ]
        ]);
      
        $data = json_decode($response->getBody());
        savelog($con,$userid,$response->getBody());
        if(isset($data->amount)){
            return $data->amount > 0.100 ? true : false;
         }
        return false;
    } catch(\Exception $e) {
        $data = $e->getMessage();
        savelog($con,$userid,$data);
        return false;
    }
    
}

/*
$con = connection database
$userid = userid
$data = array() details
*/ 
function moviderSendVerify($con,$userid, $details){

   try{
        $client = new \GuzzleHttp\Client();
        $form_params =[
            'api_key' => '2H7GtWOeyWYMff0XzK7en5zEdy6',
            'api_secret' => 'l8KFeCstZZokPZFEW0n8ci8L21k9PQ',
            'from' => 'capstone',
            'code_length' => "6",
            'language' => 'en-us',
            'pin_expire' => "300",
            'to' => '+63'.$details["to"]
        ];
        savelog($con,$userid,json_encode($form_params));
        $response = $client->request('POST', 'https://api.movider.co/v1/verify', [
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => $form_params
        ]);
        // $this->savelog($response->getBody());
        savelog($con,$userid,$response->getBody());
        $data = json_decode($response->getBody());
        if(isset($data->request_id)){
            saveToken($con,$data->request_id);
            $_SESSION["request_id"] = $data->request_id;
            return true;
        }
        return false;
    } catch(\Exception $e) {
        $data = $e->getMessage();
        savelog($con,$userid,$data);
        return false;
    }
    
}

/*
$con = connection database
$userid = userid
$data = array() details
*/ 
function moviderVerifyCode($con,$userid, $details){

    try{
        $client = new \GuzzleHttp\Client();
        $form_params =[
            'api_key' => '2H7GtWOeyWYMff0XzK7en5zEdy6',
            'api_secret' => 'l8KFeCstZZokPZFEW0n8ci8L21k9PQ',
            'request_id' =>  $details["request_id"],
            'code' => $details["code"],
        ];
        savelog($con,$userid,json_encode($form_params));
        $response = $client->request('POST', 'https://api.movider.co/v1/verify/acknowledge', [
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => $form_params
        ]);
        savelog($con,$userid,$response->getBody());
        $data = json_decode($response->getBody());
        if(isset($data->request_id)){
            return true;
        }
        return false;

     } catch(\Exception $e) {
        $data = $e->getMessage();
        savelog($con,$userid,$data);
        return false;
    }
    
    
}


function savelog($con,$id,$message){
     mysqli_query($con,"INSERT INTO `tbl_sms_logs`(`receiverid`,`message`) VALUES($id,'".$message."') ");
}


function saveToken($con, $session) {
    mysqli_query($con,"INSERT INTO `tbl_verificationcode`(`session`) VALUES('".$session."') ");
}

function createNotify($con, $user_id, $description, $status){
    mysqli_query($con,"INSERT INTO `tbl_notification`(`user_id`,`description`, `status`) 
        VALUES(".$user_id.",'".$description."',".$status.") ");
}


/*
$con = connection database
$userid = userid
$data = array() details
*/ 
function moviderSentSMS($con,$userid, $details){

    try{
        $client = new \GuzzleHttp\Client();
        $form_params =[
            'api_key' => '2H7GtWOeyWYMff0XzK7en5zEdy6',
            'api_secret' => 'l8KFeCstZZokPZFEW0n8ci8L21k9PQ',
            'from' => 'capstone',
            'text' => $details["text"],
            'to' => '+63'.$details["to"]
        ];
        savelog($con,$userid,json_encode($form_params));
        $response = $client->request('POST', 'https://api.movider.co/v1/sms', [
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => $form_params
        ]);
        savelog($con,$userid,$response->getBody());
        $data = json_decode($response->getBody());
        if(isset($data->remaining_balance)){
            return true;
        }
        return false;

     } catch(\Exception $e) {
        $data = $e->getMessage();
        savelog($con,$userid,$data);
        return false;
    }
    
    
}

function countNotify( $con,$userid) {
    $load_data = mysqli_query($con,"SELECT count(id) as total_notify FROM `tbl_notification` WHERE user_id = $userid and `status` = 0 order by created_at desc");
    if(hasResult($load_data)){
        $data = mysqli_fetch_assoc($load_data);
        $count = $data["total_notify"];
        return $count;        
    }else{
        return 0;
    }
}

function getMyUrl()
{
  $protocol = (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) ? 'https://' : 'http://';
  $server = $_SERVER['SERVER_NAME'];
  $port = $_SERVER['SERVER_PORT'] ? ':'.$_SERVER['SERVER_PORT'] : '';
//   return $protocol.$server.$port;
  return $protocol.$server;
    // return getenv('URL_HOST');
}