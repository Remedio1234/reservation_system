<?php include_once("../library/config.php"); ?>
<?php require_once('../api/user.api.php'); ?>
<?php
if (isset($_POST)) {
    $db->register($_POST);
} else {
    return json_encode(['response' => 'failed']);
}

?>