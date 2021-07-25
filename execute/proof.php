<?php
    /* database connection */
    require_once('../library/config.php');
    extract($_POST);
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    $path = '../proof/'; // upload directory
    $images_arr = array();
    foreach ($_FILES['images']['name'] as $key => $val) {
        $image_name = $_FILES['images']['name'][$key];
        $tmp_name = $_FILES['images']['tmp_name'][$key];
        $size = $_FILES['images']['size'][$key];
        $type = $_FILES['images']['type'][$key];
        $error = $_FILES['images']['error'][$key];
    
        // File upload path
        $fileName = time() . basename($_FILES['images']['name'][$key]);
        $targetFilePath = $path . $fileName;
    
        // Check whether file type is valid
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array($fileType, $valid_extensions)) {    
        // Store images on the server
            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFilePath)) {
                $images_arr[] = $targetFilePath;
                $query = $dbConn->query("INSERT INTO tbl_proof_payment (reservation_id,file_proof)VALUES('" . $reservation_id . "','" . $fileName . "')");
            }
        }
    }
    $response = [
        'response' => 'success',
        'message' => 'Photos successfully uploaded.'
    ];
    echo json_encode($response);
?>