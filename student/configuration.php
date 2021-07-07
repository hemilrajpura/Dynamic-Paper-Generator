<?php
    session_start();
    require_once "vendor/autoload.php";
    $google_client = new  Google_Client();
    $google_client->setClientId("205903857650-0afi4g4fi114tt9cnepeehf06q7i12jp.apps.googleusercontent.com");
    $google_client->setClientSecret("6pF3qEl0DeN_rGGZ82GNtUDK");
    $google_client->setRedirectUri("http://localhost/pgen/student/index.php");
    $google_client->addScope("email");
    $google_client->addScope("profile");
    
    
?>