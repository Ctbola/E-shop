<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])) {

    if(isset($_GET["id"])) {

        $email = $_SESSION["u"]["email"];
        $pid = $_GET["id"];

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `lesson_id` = '".$pid."' AND `users_email` = '".$email."'");
        $cart_num = $cart_rs -> num_rows;

        $product_rs = Database::search("SELECT * FROM `lesson` WHERE `id` = '".$pid."'");
        $product_data = $product_rs -> fetch_assoc();
    
        
            Database::iud("INSERT INTO `cart` (`lesson_id`,`users_email`) VALUES ('".$pid."','".$email."')");
            echo("Product added successfully");

    

    }else {
        echo("Something went wrong");
    }

}else {
    echo ("Please Sign In or Register.");
}

?>