<?php

require "connection.php";

if(isset($_GET["id"])) {

    $cid = $_GET["id"];

    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `id` = '".$cid."'");
    $cart_data = $cart_rs -> fetch_assoc();

    $user = $cart_data["users_email"];
    $product = $cart_data["lesson_id"];

    
    Database::iud("DELETE FROM `cart` WHERE `id` = '".$cid."'");

    echo("success");

}else {
    echo ("Something went wrong");
}

?>