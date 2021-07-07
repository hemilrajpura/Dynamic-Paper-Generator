<?php

    require 'configuration.php';
    unset($_session['access_token']);
    session_destroy();
    header('location:http://localhost/pgen/student/slogin.php');
    exit();
    

?>