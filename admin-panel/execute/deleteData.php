<?php
require_once('../../library/config.php');
extract($_POST);
$tables = [
    'categories'    => 'tbl_categories',
    'venues'        => 'tbl_amenities',
    'gallery'       => 'tbl_gallery',
    'profile'       => 'tbl_profile',
    'caterers'      => 'tbl_caterers',
    'customers'     => 'tbl_customers',
    'reservations'  => 'tbl_reservations'
];
    switch ($action) {
        case 'gallery':
            if (isset($gallery_id)) :
                $photo = $dbConn->query("SELECT * FROM " . $tables['gallery'] . " WHERE gallery_id = '" . $gallery_id . "' ")->fetch(PDO::FETCH_OBJ)->photos;
            endif;
            if($photo){
                $dbConn->query("DELETE FROM " . $tables['gallery'] . " WHERE gallery_id = '" . $gallery_id . "' ");
                @unlink('../uploads/gallery/' . $photo);
                $response = [
                    'response' => 'success',
                    'message' => 'Venue Successfully updated.'
                ];
            }
           
        break;

        case 'category':
            $dbConn->query("DELETE FROM " . $tables['categories'] . " WHERE id = '" . $id . "' ");
            $response = [
                'response' => 'success',
                'message' => 'Record Successfully deleted.'
            ];
        break;

        case 'venues':
            $dbConn->query("DELETE FROM " . $tables['venues'] . " WHERE amenities_id = '" . $amenities_id . "' ");
            $response = [
                'response' => 'success',
                'message' => 'Record Successfully deleted.'
            ];
        break;

        case 'caterers':
            $dbConn->query("DELETE FROM " . $tables['caterers'] . " WHERE caterers_id = '" . $caterers_id . "' ");
            $response = [
                'response' => 'success',
                'message' => 'Record Successfully deleted.'
            ];
        break;

        case 'customers':
            $dbConn->query("DELETE FROM " . $tables['customers'] . " WHERE customer_id = '" . $customer_id . "' ");
            $response = [
                'response' => 'success',
                'message' => 'Record Successfully deleted.'
            ];
        break;

        case 'reservations':
            $dbConn->query("DELETE FROM " . $tables['reservations'] . " WHERE id = '" . $id . "' ");
            $response = [
                'response' => 'success',
                'message' => 'Record Successfully deleted.'
            ];
        break;
        
        default:
            # code...
            break;
    }

    if($response){
        echo json_encode($response);
    }
?>