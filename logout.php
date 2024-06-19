<?php 
session_start();
require_once 'config.php';
require_once 'functions.php';
require_once 'session.php';


if($islogin){
    unset($_SESSION["data"]);
    unset($_SESSION["islogin"]);

    navigate("./");
}else{
    navigate("./");
}
?>