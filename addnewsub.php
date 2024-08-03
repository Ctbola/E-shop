<?php
session_start();
require "connection.php";
if(isset($_SESSION["u"])){

    $subject =$_GET["sub"];
    $type =$_GET["type"];
    
    Database::search("INSERT INTO `users_has_subject` (`users_email`,`subject_id`,`less_type_id`) VALUES ('".$_SESSION["u"]["email"]."','".$subject."','".$type."')");


    echo "success";

}else{
    echo "Please Log First";
}



?>