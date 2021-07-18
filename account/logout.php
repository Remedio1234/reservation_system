<?php include_once("../library/config.php"); ?>
<?php require_once('../api/user.api.php'); ?>
<?php
$logout = $db->customerLogout();
if ($logout == true) {
    header("location:../");
}
?>