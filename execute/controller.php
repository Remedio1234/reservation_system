<?php
    $response = array();
    require_once('../library/config.php');
    extract($_POST);
    $tables = [
        'reservations'    => 'tbl_reservations',
        'customer'         => 'tbl_customers'
    ];
    switch ($action) {
        /* ============= RESERVATIONS MODULE =========== */
        case 'admin-details':
            $details = $dbConn->query("SELECT * FROM tbl_details WHERE reservation_id   = '".$_POST['reservation_id']."'"); 
            $data    = array();
            while ($detail = $details->fetch(PDO::FETCH_OBJ)) {
                $data[] = $detail;
            }

            $proof      = $dbConn->query("SELECT * FROM tbl_proof_payment WHERE reservation_id   = '".$_POST['reservation_id']."'"); 
            $file       = array();
            while ($row = $proof->fetch(PDO::FETCH_OBJ)) {
                $file[] = $row;
            }
            $response = [
                'response'  => 'success',
                'data'      => $data,
                'proof'     => $file
            ];
        break;
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
        case 'update_notifications':
            $dbConn->query("UPDATE tbl_notifications SET status = 'read' WHERE customer_id   = '".$_SESSION['customer']['customer_id']."' ");
            $response = [
                'response'      => 'success'
            ];
        break;    
        case 'notifications':
            function getNotif($dbConn, $type){
                if($type == 'all'){
                    $details = $dbConn->query("SELECT * FROM tbl_notifications WHERE customer_id   = '".$_SESSION['customer']['customer_id']."' ORDER BY id DESC"); 
                } else {
                    $details = $dbConn->query("SELECT * FROM tbl_notifications WHERE status = 'unread' and customer_id   = '".$_SESSION['customer']['customer_id']."' ORDER BY id DESC"); 
                }
                $data    = array();
                while ($detail = $details->fetch(PDO::FETCH_OBJ)) {
                    $data[] = $detail;
                }
                return $data;
            }
            $response = [
                'response'      => 'success',
                'count'         => count(getNotif($dbConn, 'unread')),
                'notif'         => getNotif($dbConn, 'all')
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
                require_once("../mail/mailer.php");
                if (isset($_SESSION['customer']['isLoggedIn'])) {
                    $user = $dbConn->query("SELECT * FROM tbl_customers where id = '".$_SESSION['customer']['customer_id']."' ")->fetch(PDO::FETCH_ASSOC);
                    $customer_name  = $user['fullname'];
                    $customer_email = $user['email_address']; 
                } else {
                    $customer_name  = $_POST['info']['fullname'];
                    $customer_email = $_POST['info']['email_address']; 
                }
                if($customer_id){
                    $message = "Your reservation {$reservation_id} has been received and is now being processed.  <br>
                                     You can check details of your order in your Account Dashboard anytime.";
                    $dbConn->query("INSERT INTO tbl_notifications(customer_id, message)VALUES('" . $customer_id . "','" . $message . "')");
                }
                $dbConn->query("UPDATE tbl_reservations SET reservation_id = '" . $reservation_id . "' WHERE id = " . $LAST_ID . " ");
            }
            
            foreach ($_POST['cart'] as $key => $value) {
               $dbConn->query("INSERT INTO tbl_details(reservation_id, amenities_id, name, type, category, date_from, date_to, price, quantity, total_days, total_amount)VALUES('" . $LAST_ID . "','" . $value['id'] . "','" . $value['name'] . "','" . $value['type'] . "','" . $value['category'] . "','" . $value['date_from'] . "','" . $value['date_to'] . "','" . $value['price'] . "','" . ($value['quantity'] == 0 ? 1 : $value['quantity']) . "','" . $value['days'] . "','" . $value['total'] . "')");
            }

            $response = [
                    'result'            => sendMail($customer_name, $customer_email, "Thank you for your order reservation - {$reservation_id}", "Your reservation {$reservation_id} has been received and is now being processed. <br/> You can check details of your order in your Account Dashboard anytime."),
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