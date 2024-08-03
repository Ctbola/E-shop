<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
   
    $pid = $_GET["id"];
    
    $umail = $_SESSION["u"]["email"];

    $array;
    $order_id = uniqid();

    $product_rs = Database::search ("SELECT * FROM `lesson` WHERE `id` = '".$pid."'");
    $product_data = $product_rs -> fetch_assoc();

    $city_rs = Database::search("SELECT * FROM `user_has_address` WHERE `users_email` = '".$umail."'");
    $city_data = $city_rs -> fetch_assoc();

        $item = $product_data["lesson_name"];
        $amount = (int)$product_data["price"];

        $fname = $_SESSION["u"]["fname"];
        $lname = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["mobile"];
        
        $currency ="LKR";
        $merchant_secret ="Mzk0OTQ1NzQ2OTIzMTEzMjA3NDIzNTY5MjIwMTU1MjQxMTcxMDIzNA==";

        $hash = strtoupper(
            md5(
                $merchant_id ="1221509".
                $order_id . 
                number_format($amount, 2, '.', '') . 
                $currency .  
                strtoupper(md5($merchant_secret)) 
            ) 
        );


        
        $array["id"] = $order_id;
        $array["lesson_name"] = $item;
        $array["price"] = $amount;
        $array["hash"] = $hash;
        // $array["lesson_description"] = $lname;
        
        

        echo json_encode($array);
        
   
}else {
    echo ("1");
    
}

?>