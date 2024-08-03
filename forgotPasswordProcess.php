<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `users` WHERE `email`='".$email."'");
    $n = $rs->num_rows;

    if($n == 1){

        $code = uniqid();

        Database::iud("UPDATE `users` SET `verification_code`='".$code."' WHERE 
        `email`='".$email."'");

        $code = uniqid();
    Database::iud("UPDATE `users` SET `verification_code`='".$code."' WHERE `email`='".$email."'" );
    $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sadeeptha.aihe@gmail.com';
            $mail->Password = 'jalokfamqsmwazdf';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('sadeeptha.aihe@gmail.com', 'Reset Password');
            $mail->addReplyTo('sadeeptha.aihe@gmail.com', 'Reset Password');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'eshop Forgot password verifycation code';
            $bodyContent = '<h1 style="color:green">Your verifycation code is'.$code.'</h1>';
            $mail->Body    = $bodyContent;
            if (!$mail->send()){
                echo'verification code sending fail';
            }else{
                echo 'success';
            }

  }else{
    echo("Invalid Email adderss");
  }
}

?>