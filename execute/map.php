<?php
    /* database connection */
    require_once('../library/config.php');
    extract($_POST);
    
    //TENTS
    // $tents = $dbConn->query("SELECT * FROM tbl_amenities WHERE status = 'av' AND category_id = 2")->fetch(PDO::FETCH_ASSOC);
    //TABLES
    $tables = $dbConn->query("SELECT * FROM tbl_amenities WHERE status = 'av' AND category_id = 6")->fetch(PDO::FETCH_ASSOC);
    //CHAIRS
    $chairs = $dbConn->query("SELECT * FROM tbl_amenities WHERE status = 'av' AND category_id = 1")->fetch(PDO::FETCH_ASSOC);

    if(isset($txtDateFrom) && isset($txtDateTo)) {

        //TENTS COTTAGES
        $tents = $dbConn->query("SELECT aa.*, rr.r_a_id FROM tbl_amenities aa LEFT JOIN (
            SELECT amenities_id, amenities_id as r_a_id FROM tbl_reservations WHERE (('".$txtDateFrom."' BETWEEN date_from AND date_to) OR ('".$txtDateTo."' BETWEEN date_from AND date_to))
            ) as rr on aa.amenities_id = rr.amenities_id WHERE (aa.status = 'av' AND aa.category_id = 2)");

        //RESERVE COTTAGES
        $cottages = $dbConn->query("SELECT aa.*, rr.r_a_id FROM tbl_amenities aa LEFT JOIN (
            SELECT amenities_id, amenities_id as r_a_id FROM tbl_reservations WHERE (('".$txtDateFrom."' BETWEEN date_from AND date_to) OR ('".$txtDateTo."' BETWEEN date_from AND date_to))
            ) as rr on aa.amenities_id = rr.amenities_id WHERE (aa.status = 'av' AND aa.category_id = 3)");
        
         //RESERVE ROOMS
         $rooms = $dbConn->query("SELECT aa.*, rr.r_a_id FROM tbl_amenities aa LEFT JOIN (
            SELECT amenities_id, amenities_id as r_a_id FROM tbl_reservations WHERE (('".$txtDateFrom."' BETWEEN date_from AND date_to) OR ('".$txtDateTo."' BETWEEN date_from AND date_to))
            ) as rr on aa.amenities_id = rr.amenities_id WHERE (aa.status = 'av' AND aa.category_id = 5)");

        //RESERVE TENTS
        // $reserve_tents = $dbConn->query("SELECT SUM(quantity) as quantity FROM tbl_reservations WHERE category_id = 2 AND (('".$txtDateFrom."' BETWEEN date_from AND date_to) OR ('".$txtDateTo."' BETWEEN date_from AND date_to))")->fetch(PDO::FETCH_ASSOC);
        // RESERVE TABLES
        $reserve_tables = $dbConn->query("SELECT SUM(quantity) as quantity FROM tbl_reservations WHERE category_id = 6 AND (('".$txtDateFrom."' BETWEEN date_from AND date_to) OR ('".$txtDateTo."' BETWEEN date_from AND date_to))")->fetch(PDO::FETCH_ASSOC);
        //RESERVE CHAIRS
        $reserve_chairs = $dbConn->query("SELECT SUM(quantity) as quantity FROM tbl_reservations WHERE category_id = 1 AND (('".$txtDateFrom."' BETWEEN date_from AND date_to) OR ('".$txtDateTo."' BETWEEN date_from AND date_to))")->fetch(PDO::FETCH_ASSOC);
      
       
    } else {
        //tents
        $tents = $dbConn->query("SELECT * FROM tbl_amenities WHERE status = 'av' AND category_id = 2");
        //COTTAGES
        $cottages = $dbConn->query("SELECT * FROM tbl_amenities WHERE status = 'av' AND category_id = 3");
        //ROOMS
        $rooms = $dbConn->query("SELECT * FROM tbl_amenities WHERE status = 'av' AND category_id = 5");
    }


    // $total_tents    = 0;
    $total_chairs   = 0;
    $total_tables   = 0;
    if(isset($txtDateFrom) && isset($txtDateTo)) { 
        // $total_tents  = (isset($tents['quantity']) > 0 ? $tents['quantity'] : 0) - (isset($reserve_tents['quantity']) > 0 ? $reserve_tents['quantity'] : 0);
        $total_chairs = (isset($chairs['quantity']) > 0 ? $chairs['quantity'] : 0) - (isset($reserve_chairs['quantity']) > 0 ? $reserve_chairs['quantity'] : 0);
        $total_tables = (isset($tables['quantity']) > 0 ? $tables['quantity'] : 0) - (isset($reserve_tables['quantity']) > 0 ? $reserve_tables['quantity'] : 0);
    } else {   
        // $total_tents = isset($tents['quantity']) > 0 ? $tents['quantity'] : 0;
        $total_chairs = isset($chairs['quantity']) > 0 ? $chairs['quantity'] : 0;
        $total_tables = isset($tables['quantity']) > 0 ? $tables['quantity'] : 0;
    } 
    
?>
<style>
    .cottages:hover {fill: #FFFFFF;cursor: pointer;}
</style>
<div id="map_design">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="960px" height="960px" viewBox="0 0 960 960" enable-background="new 0 0 960 960" xml:space="preserve">

        <rect x="661.5" y="677.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="280" height="267"/>
        <text transform="matrix(1 0 0 1 769.334 811)">
            <tspan x="0" y="0" font-family="'arial'" font-size="20">PARKING</tspan>
            <tspan x="0" y="24" font-family="'arial'" font-size="20">AREA</tspan>
        </text>
        
        <rect x="208.5" y="630.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="89" height="94"/>
        <line fill="none" stroke="#000000" stroke-miterlimit="10" x1="526.5" y1="897" x2="526.5" y2="960"/>
        <line fill="none" stroke="#000000" stroke-miterlimit="10" x1="467.5" y1="897" x2="467.5" y2="960"/>
        <text transform="matrix(1 0 0 1 479.9995 941.5)" font-family="'arial'" font-size="12">GATE</text>
        <line fill="none" stroke="#000000" stroke-miterlimit="10" x1="13.5" y1="897" x2="13.5" y2="960"/>
        <line fill="none" stroke="#000000" stroke-miterlimit="10" x1="71.5" y1="897" x2="71.5" y2="960"/>
        <text transform="matrix(1 0 0 1 27.0972 941.5)" font-family="'arial'" font-size="12">GATE</text>

        <rect x="313.5" y="630.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="101" height="94"/>
        <text transform="matrix(1 0 0 1 334 677.5)">
            <tspan x="0" y="0" font-family="'arial'" font-size="12">SWIMMING </tspan>
            <tspan x="0" y="14.4" font-family="'arial'" font-size="12">POOL</tspan>
        </text>
        <text transform="matrix(1 0 0 1 218.7632 680.5)" font-family="'arial'" font-size="12">RESTO BAR</text>

        <!-- =================== START TABLES ============================= -->
        <rect 
            data-type="tables"
            class="cottages book_now" 
            x="557.5" 
            y="480.5" 
            fill="<?php echo ($total_tables <= 0 ? '#de0000' : '#0dd00d') ?>" 
            stroke="#000000" 
            stroke-miterlimit="10" 
            width="153" 
            height="77"/>
        <text 
            transform="matrix(1 0 0 1 595.7852 503.1602)" 
            font-family="'arial'" 
            font-size="20">TABLES</text>
        <text 
            transform="matrix(1 0 0 1 606 544.2559)" 
            font-family="'arial'" 
            font-size="41.5568">
            <?php echo $total_tables; ?>
        </text>
        <!-- =================== END TABLES =============================== -->

        <!-- =================== START CHAIRS ============================= -->
        <rect 
        data-type="chairs"
            class="cottages book_now" 
            x="777.5" 
            y="480.5" 
            fill="<?php echo ($total_chairs <= 0 ? '#de0000' : '#0dd00d') ?>" 
            stroke="#000000" 
            stroke-miterlimit="10" 
            width="157" 
            height="77"/>
        <text 
            transform="matrix(1 0 0 1 826.8379 505.1602)" 
            font-family="'arial'" 
            font-size="20">CHAIRS</text>
        <text 
            transform="matrix(1 0 0 1 830.2793 545.2559)" 
            font-family="'arial'" 
            font-size="41.5568">
            <?php echo $total_chairs; ?>
        </text>
        <!-- =================== END CHAIRS =============================== -->

        <!-- =================== START ROOMS =================================== -->
        <?php 
            while ($room = $rooms->fetch(PDO::FETCH_OBJ)) { ?>
        <rect 
            data-type="rooms"
            data-status="<?php echo (isset($room->r_a_id) && $room->r_a_id == $room->amenities_id ? '0' : '1')?>"
            class="cottages book_now" 
            x="<?php echo $room->x ?>" 
            y="<?php echo $room->y ?>" 
            fill="<?php echo (isset($room->r_a_id) && $room->r_a_id == $room->amenities_id ? '#de0000' : '#0dd00d')?>"
            stroke="#000000" 
            stroke-miterlimit="10" 
            width="77" 
            height="47"/>
        <text 
            transform="<?php echo $room->transform ?>"
            font-family="'arial'" 
            font-size="13"><?php echo $room->name ?></text>
        <?php } ?>
        <!-- =================== END ROOMS ======================================== -->
        
        <!-- =================== START COTTAGES =================================== -->
        <text transform="matrix(1 0 0 1 624.5 69.9248)" font-family="'arial'" font-size="20">COTTAGES</text>
        <?php 
            while ($cottage = $cottages->fetch(PDO::FETCH_OBJ)) { ?>
        <rect 
            data-type="cottages"
            data-status="<?php echo (isset($cottage->r_a_id) && $cottage->r_a_id == $cottage->amenities_id ? '0' : '1')?>"
            class="cottages book_now" 
            x="<?php echo $cottage->x ?>" 
            y="<?php echo $cottage->y ?>" 
            fill="<?php echo (isset($cottage->r_a_id) && $cottage->r_a_id == $cottage->amenities_id ? '#de0000' : '#0dd00d')?>"
            stroke="#000000" 
            stroke-miterlimit="10" 
            width="40"
            height="40"/>
        <text 
            transform="<?php echo $cottage->transform ?>"
            font-family="'arial'" 
            font-size="18"><?php echo $cottage->name ?></text>
        <?php } ?>
        <text transform="matrix(1 0 0 1 29.5908 374.8813)" font-family="'arial'" font-size="20">COTTAGES</text> 
        <!-- =================== END COTTAGES =================================== -->
        <!-- =================== START TENTS =================================== -->
        <text transform="matrix(1 0 0 1 165.2695 70.9248)" font-family="'arial'" font-size="20">TENTS</text>
        <?php 
        while ($tent = $tents->fetch(PDO::FETCH_OBJ)) { ?>
            <rect 
                data-type="tents"
                data-status="<?php echo (isset($tent->r_a_id) && $tent->r_a_id == $tent->amenities_id ? '0' : '1')?>"
                class="cottages book_now" 
                x="<?php echo $tent->x ?>" 
                y="<?php echo $tent->y ?>" 
                fill="<?php echo (isset($tent->r_a_id) && $tent->r_a_id == $tent->amenities_id ? '#de0000' : '#0dd00d')?>"
                stroke="#000000" 
                stroke-miterlimit="10" 
                width="39" 
                height="38"/>
            <text 
                transform="<?php echo $tent->transform ?>"
                font-family="'arial'" 
                font-size="18"><?php echo $tent->name ?></text>
        <?php } ?>
        <!-- =================== END TENTS =================================== -->
        
        <rect x="208.5" y="753.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="204" height="175"/>
        <text transform="matrix(1 0 0 1 267.8271 834)">
            <tspan x="0" y="0" font-family="'arial'" font-size="20">FUNCTION</tspan>
            <tspan x="0" y="24" font-family="'arial'" font-size="20">HALL</tspan>
        </text>

        <rect x="544.5" y="749.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="91" height="98"/>
        <text transform="matrix(1 0 0 1 559 791)">
            <tspan x="0" y="0" font-family="'arial'" font-size="13">CASHIER</tspan>
            <tspan x="0" y="15.601" font-family="'arial'" font-size="13">COUNTER</tspan>
        </text>
        <rect x="433" y="480" width="21" height="480"/>
    </svg>
</div>