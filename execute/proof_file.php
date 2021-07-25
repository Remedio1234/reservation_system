<?php
    /* database connection */
    require_once('../library/config.php');
    extract($_POST);
    $query = $dbConn->query("SELECT * FROM tbl_proof_payment WHERE reservation_id = '".$reservation_id."' ");
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {?>
        <div class="col-md-4">
            <div class="thumbnail">
                <a href="<?php echo WEB_ROOT . '/proof/' . $row->file_proof ?>" target="_blank">
                    <img src="<?php echo WEB_ROOT . '/proof/' . $row->file_proof ?>" alt="Lights" style="width:150px;height:150px;padding:10px;">
                </a>
            </div>
        </div>
<?php
    }
?>