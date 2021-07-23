<?php
    require_once('../../library/config.php');
    extract($_POST);
    $tables = [
        'categories'        => 'tbl_categories',
        'amenities'         => 'tbl_amenities',
        'caterer'           => 'tbl_caterers',
        'profile'           => 'tbl_profile',
        'user'              => 'tbl_users',
        'customers'         => 'tbl_customers',
        'reservations'      => 'tbl_reservations'
    ];
    switch ($form) {
        
        case 'category':
            if(isset($id)) :
                $row = $dbConn->query("SELECT * FROM ".$tables['categories']." WHERE id = '".$id."' ")->fetch(PDO::FETCH_ASSOC);
            endif;
            include('../pages/forms/category_form.php');
        break;

        case 'amenities':
            if(isset($amenities_id)) :
                $row = $dbConn->query("SELECT * FROM ".$tables['amenities']." WHERE amenities_id = '".$amenities_id."' ")->fetch(PDO::FETCH_ASSOC);
            endif;
            $query = $dbConn->query("SELECT * FROM tbl_categories WHERE status = 'av'");
            include('../pages/forms/amenities_form.php');
        break;

        case 'reservations':
            if (isset($id)) :
            $row = $dbConn->query("SELECT 
                    cus.email_address,
                    cus.fullname,
                    cus.address,
                    cus.contact,
                    res.id,
                    res.reservation_id, 
                    res.total_hours,
                    res.sub_total,
                    res.total,
                    res.date_from,
                    res.date_to,
                    res.status,
                    res.date_applied,
                    ev.name,
                    ven.name,
                    cat.caterers_name 
                    FROM tbl_reservations res 
                     INNER JOIN tbl_customers cus ON cus.customer_id = res.customer_id 
                    INNER JOIN tbl_amenities ven ON ven.amenities_id = res.amenities_id 
                    INNER JOIN tbl_categories ev ON ev.id = res.id 
                    LEFT JOIN tbl_caterers cat ON cat.caterers_id = res.caterers_id
                    WHERE id = " . $id . "
                    ")->fetch(PDO::FETCH_OBJ);
                
            endif;
            include('../pages/forms/reservations_form.php');
        break;

        case 'customers':
            if (isset($customer_id)) :
                $row = $dbConn->query("SELECT * FROM " . $tables['customers'] . " WHERE customer_id = '" . $customer_id . "' ")->fetch(PDO::FETCH_ASSOC);
            endif;
            include('../pages/forms/customers_form.php');
        break;

        

        case 'venues_upload':
            if (isset($amenities_id)) :
                $row = $dbConn->query("SELECT * FROM " . $tables['venues'] . " WHERE amenities_id = '" . $amenities_id . "' ")->fetch(PDO::FETCH_ASSOC);
            endif;
            include('../pages/forms/venues_form_upload.php');
        break;

        case 'caterer':
            if (isset($caterers_id)) :
                $row = $dbConn->query("SELECT * FROM " . $tables['caterer'] . " WHERE caterers_id = '" . $caterers_id . "' ")->fetch(PDO::FETCH_ASSOC);
            endif;
            include('../pages/forms/caterers_form.php');
        break;

        case 'profile':
            $row = $dbConn->query("SELECT * FROM ".$tables['profile']." ")->fetch(PDO::FETCH_ASSOC);
            include('../pages/forms/profile_form.php');
        break;

        case 'account':
            $row = $dbConn->query("SELECT * FROM " . $tables['user'] . " WHERE user_id = '". $_SESSION['user']['user_id']."' ")->fetch(PDO::FETCH_ASSOC);
            include('../pages/forms/account_form.php');
        break;
        
        default:
            # code...
            break;
    }
?>