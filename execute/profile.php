<?php
if (!empty($_FILES['picture']['name'])) {

    /* database connection */
    require_once('../library/config.php');

    //File upload configuration
    $result = 0;
    $uploadDir = "../profile/";
    $profile = time() . '_' . basename($_FILES['picture']['name']);
    $targetPath = $uploadDir . $profile;
    
            //Upload file to server
    if (@move_uploaded_file($_FILES['picture']['tmp_name'], $targetPath)) {
                //Get current user ID from session
        $userId = @$_SESSION['customer']['customer_id'];
        
        $old_file_photo = $dbConn->query("SELECT profile FROM tbl_customers WHERE customer_id = '" . $userId . "' ")->fetch(PDO::FETCH_OBJ)->profile;
        @unlink('../profile/' . $old_file_photo); // delete file
        
                //Update picture name in the database
        $update = $dbConn->query("UPDATE tbl_customers SET profile = '" . $profile . "' WHERE customer_id = $userId");
        
            //Update status
        if ($update) {
            $result = 1;
        }
    }
    
            //Load JavaScript function to show the upload status
    echo '<script type="text/javascript">window.top.window.completeUpload(' . $result . ',\'' . $profile . '\');</script>  ';
}
?>