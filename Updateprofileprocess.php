<?php

session_start();
require "connection.php";
if(isset($_SESSION["u"])){

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mobile = $_POST["mobile"];
    $line1 = $_POST["line1"];
    $line2 = $_POST["line2"];
    $province = $_POST["province"];
    $district = $_POST["district"];
    $city = $_POST["city"];
    $pcode = $_POST["pcode"];

    Database::iud("UPDATE `users` SET `fname` ='".$fname."',`lname` ='".$lname."',`mobile` ='".$mobile."' WHERE `email` ='".$_SESSION["u"]["email"]."' ");

    $adderss_rs = Database::search("SELECT * FROM `user_has_address`  WHERE `users_email` ='".$_SESSION["u"]["email"]."'");
    $adderss_num = $adderss_rs->num_rows;

    if($adderss_num == 1){
        Database::iud("UPDATE `user_has_address` SET `line1`='".$line1."',`line2`='".$line2."',`city_id`='".$city."',`postal_code`='".$pcode."'WHERE `users_email` ='".$_SESSION["u"]["email"]."'");
    }else{
        Database::iud("INSERT INTO `user_has_address` (`line1`,`line2`,`users_email`,`city_id`,`postal_code` VALUES ('".$line1."','".$line2."','".$_SESSION["u"]["email"]."','".$city."','".$pcode."')");

    }
    echo("success");

}
?>