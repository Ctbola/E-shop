<?php
session_start();
if(isset($_SESSION)){
    $_SESSION["u"]=null;
    session_destroy();

    echo ("success");
}
?>