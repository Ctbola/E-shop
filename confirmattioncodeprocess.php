<?php

session_start();

require "connection.php";

$code = $_GET["c"];


if(empty($code)) {
    echo ("Please enter your Confirmation Code");

}else {
    
    $rs = Database::search("SELECT * FROM `admins` WHERE `code` = '".$code."'");
    // $rsd=Database::search("SELECT * FROM `admins` ");
    $n = $rs -> num_rows;
    
    if ($n == 1) {

        echo ("success");
        $d = $rs -> fetch_assoc();
        // $ds = $rsd -> fetch_assoc();
        $_SESSION["a"] = $d;

        

    }else {
        echo ("Invalid Username or Password");
    }

}

?>