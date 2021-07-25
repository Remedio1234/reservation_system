<?php
    require_once('../library/config.php');
    extract($_POST);
    $check_customer = $dbConn->query("SELECT * FROM tbl_customers WHERE guest_id IS NULL AND email_address = '". $email_address."' ");
    if($check_customer->rowCount() > 0) {
            $response = ['response' => 'exist'];
    } else {
            $response = ['response' => 'success'];
    }
    echo json_encode($response);
?>