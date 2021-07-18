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
            
            $check_exist = $dbConn->query("select * from ".$tables['reservations']." where status != 'declined' AND (('".$txtDateFrom."' BETWEEN date_from AND date_to) OR ('".$txtDateTo."' BETWEEN date_from AND date_to))");
            if($check_exist->rowCount() > 0) :
                $response = [
                    'response' => 'exist',
                    'message'  => 'Date not available.!'
                ];
            else :
                if(!@$_SESSION['customer']['isLoggedIn']) {
                    $response = [
                        'response' => 'error'
                    ];
                } else {
                    if($continue == 1) {
                        $query = $dbConn->query("INSERT INTO ".$tables['reservations']. " (customer_id, date_from,date_to,amenities_id,category_id,caterers_id,total_hours,sub_total,total)VALUES('".@$_SESSION['customer']['customer_id']."','". $txtDateFrom ."','".$txtDateTo."','".$amenities_id."','".$events."','".$caterers."','".$inputhours."','".$inputsubtotal."','".$inputtotal."')");
                        
                        $id = $dbConn->lastInsertId();
                        
                        $reservation_id = '01'.date('ymd').$id;

                        $dbConn->query("UPDATE ".$tables['reservations']." SET reservation_id = '".$reservation_id."' WHERE id = ".$id." ");

                        if($query) :
                            $response = [
                                'response' => 'success',
                                'message'  => 'Reservation successfully saved.',
                                'id'       => $id
                            ];
                        endif; 
                    } else {
                        $response = [
                            'response' => 'continue',
                        ];
                    }
                    
                }   

            endif;
        
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