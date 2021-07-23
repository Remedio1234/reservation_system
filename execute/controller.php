<?php
    require_once('../library/config.php');
    extract($_POST);
    $tables = [
        'reservations'    => 'tbl_reservations',
        'customer'         => 'tbl_customers'
    ];
    switch ($action) {
        /* ============= RESERVATIONS MODULE =========== */
        case 'details':
            $details = $dbConn->query("SELECT * FROM tbl_details WHERE reservation_id   = '".$_POST['reservation_id']."'"); 
            $data    = array();
            while ($detail = $details->fetch(PDO::FETCH_OBJ)) {
                $data[] = $detail;
            }
            $response = [
                'response'  => 'success',
                'data'      => $data
            ];
        break;
        case 'reservation':
            $customer_id = 0; 
            $guest_id    = 0;

            if (isset($_SESSION['customer']['isLoggedIn'])) {
                $customer_id = $_SESSION['customer']['customer_id'];
            } else {
                $guest_id    = time();
                $dbConn->query("INSERT INTO tbl_customers(guest_id, fullname, email_address, contact, address)VALUES('" . $guest_id . "','" . $_POST['info']['fullname'] . "','" . $_POST['info']['email_address'] . "','" . $_POST['info']['contact'] . "','" . $_POST['info']['address'] . "')");
            }
            $query          = $dbConn->query("INSERT INTO tbl_reservations(customer_id, guest_id, reservation_id)VALUES('" . $customer_id . "', '" . $guest_id . "', '0')");
            $LAST_ID        = $dbConn->lastInsertId();

            $count          = 0;
            $count_order    = $dbConn->query("SELECT created_at FROM tbl_reservations WHERE DATE(created_at) = DATE('". date('Y-m-d H:i:s')."') ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
            $count          = (int) ($LAST_ID - @$count_order['id']) + 1;
            $uId            = sprintf("%04s", $count);
            $reservation_id = '01' . date('ymd') . $uId;

            if($LAST_ID){
                $dbConn->query("UPDATE tbl_reservations SET reservation_id = '" . $reservation_id . "' WHERE id = " . $LAST_ID . " ");
            }
            
            foreach ($_POST['cart'] as $key => $value) {
               $dbConn->query("INSERT INTO tbl_details(reservation_id, amenities_id, name, category, date_from, date_to, price, quantity, total_days, total_amount)VALUES('" . $LAST_ID . "','" . $value['id'] . "','" . $value['name'] . "','" . $value['category'] . "','" . $value['date_from'] . "','" . $value['date_to'] . "','" . $value['price'] . "','" . ($value['quantity'] == 0 ? 1 : $value['quantity']) . "','" . $value['days'] . "','" . $value['total'] . "')");
            }

            $response = [
                    'response'          => 'success',
                    'reservation_id'    => $LAST_ID,
                    'guest_id'          => $guest_id,
                    'message'           => [$customer_id, $guest_id, $reservation_id]
                ];
        
        break;
        /* ============= END EVENTS MODULE =========== */

        case 'information' :
            $query = $dbConn->query("UPDATE " . $tables['customer'] . " SET address = '" . $address . "',contact = '" . $contact . "',email_address = '" . $email_address . "',fullname = '" . $fullname . "',username = '" . $username . "'  WHERE id = " . $_SESSION['customer']['customer_id'] . " ");

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