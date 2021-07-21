<?php
    session_start();
    
    $response = ['login' => false];
    if (isset($_SESSION['customer']['isLoggedIn']))
        $response = ['login' => true];

    echo  json_encode($response);
?>