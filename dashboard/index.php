<?php
session_start();
require_once '../config.php';
require_once '../functions.php';
require_once '../session.php';

if($islogin){
    if($u_type == 2){
        navigate("./company");
    }elseif($u_type == 3){
        navigate("./admin");
    }else{
        navigate("../");
    }
}else{
    navigate("../");
}
?>