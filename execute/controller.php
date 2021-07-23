<?php
    require_once('../library/config.php');
    extract($_POST);
    $tables = [
        'reservations'    => 'tbl_reservations',
        'customer'         => 'tbl_customers'
    ];
    switch ($action) {
        /* ============= RESERVATIONS MODULE =========== */
        case 'reservation':
            
            $response = [
                    'response' => 'success',
                    'message' => 'Information successfully changed.'
                ];
        
        break;
        /* ============= END EVENTS MODULE =========== */

        case 'information' :
            $query = $dbConn->query("UPDATE " . $tables['customer'] . " SET address = '" . $address . "',contact = '" . $contact . "',email_address = '" . $email_address . "',fullname = '" . $fullname . "',username = '" . $username . "'  WHERE customer_id = " . $_SESSION['customer']['customer_id'] . " ");

            if ($query) :
                $_SESSION['customer']['username'] =$username;
                $response = [
                    'response' => 'success',
                    'message' => 'Information successfully changed.'
                ];
            endif; 
        break;

        case 'account':
            $query = $dbConn->query("UPDATE " . $tables['customer'] . " SET password = '" . md5($password) . "'  WHERE customer_id = " . $_SESSION['customer']['customer_id'] . " ");

            if ($query) :
            $response = [
                'response' => 'success',
                'message' => 'Password successfully changed.'
            ];
            endif;
        break;
       
        default:
            # code...
            break;
    }
    echo json_encode($response);
?>