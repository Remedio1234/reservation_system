<?php
    /* database connection */
    require_once('../library/config.php');
    extract($_POST);
    
    //TENTS
    // $tents = $dbConn->query("SELECT * FROM tbl_amenities WHERE status = 'av' AND category_id = 2")->fetch(PDO::FETCH_ASSOC);
    //TABLES
    $tables = $dbConn->query("SELECT aa.*, cc.name as category_name  FROM tbl_amenities aa JOIN tbl_categories cc ON aa.category_id = cc.id  WHERE  aa.category_id = 6")->fetch(PDO::FETCH_ASSOC);
    //CHAIRS
    $chairs = $dbConn->query("SELECT aa.*, cc.name as category_name  FROM tbl_amenities aa JOIN tbl_categories cc ON aa.category_id = cc.id  WHERE  aa.category_id = 1")->fetch(PDO::FETCH_ASSOC);
    //FUNCTION HALL
    $hall = $dbConn->query("SELECT aa.*, cc.name as category_name  FROM tbl_amenities aa JOIN tbl_categories cc ON aa.category_id = cc.id  WHERE  aa.category_id = 4")->fetch(PDO::FETCH_ASSOC);

    // if(isset($txtDateFrom) && isset($txtDateTo)) {

        //RESERVE TENTS
        $tents = $dbConn->query("SELECT aa.*, rr.r_a_id, cc.name as category_name FROM tbl_amenities aa INNER JOIN tbl_categories cc ON aa.category_id = cc.id LEFT JOIN (
            SELECT amenities_id, amenities_id as r_a_id FROM tbl_details WHERE (('".$txtDateFrom."' BETWEEN date_from AND date_to) OR ('".$txtDateTo."' BETWEEN date_from AND date_to))
            ) as rr on aa.id = rr.amenities_id WHERE aa.category_id = 2");
            

        //RESERVE COTTAGES
        $cottages = $dbConn->query("SELECT aa.*, rr.r_a_id, cc.name as category_name FROM tbl_amenities aa INNER JOIN tbl_categories cc ON aa.category_id = cc.id LEFT JOIN (
            SELECT amenities_id, amenities_id as r_a_id FROM tbl_details WHERE (('".$txtDateFrom."' BETWEEN date_from AND date_to) OR ('".$txtDateTo."' BETWEEN date_from AND date_to))
            ) as rr on aa.id = rr.amenities_id WHERE aa.category_id = 3");
        
         //RESERVE ROOMS
         $rooms = $dbConn->query("SELECT aa.*, rr.r_a_id, cc.name as category_name FROM tbl_amenities aa JOIN tbl_categories cc ON aa.category_id = cc.id LEFT JOIN (
            SELECT amenities_id, amenities_id as r_a_id FROM tbl_details WHERE (('".$txtDateFrom."' BETWEEN date_from AND date_to) OR ('".$txtDateTo."' BETWEEN date_from AND date_to))
            ) as rr on aa.id = rr.amenities_id WHERE aa.category_id = 5");

        //RESERVE TENTS
        // $reserve_tents = $dbConn->query("SELECT SUM(quantity) as quantity FROM tbl_details WHERE category_id = 2 AND (('".$txtDateFrom."' BETWEEN date_from AND date_to) OR ('".$txtDateTo."' BETWEEN date_from AND date_to))")->fetch(PDO::FETCH_ASSOC);
        // RESERVE TABLES
        $reserve_tables = $dbConn->query("SELECT SUM(dd.quantity) as quantity FROM tbl_details dd INNER JOIN tbl_amenities aa ON aa.id = dd.amenities_id  WHERE aa.category_id = 6 AND (('".$txtDateFrom."' BETWEEN dd.date_from AND dd.date_to) OR ('".$txtDateTo."' BETWEEN dd.date_from AND dd.date_to))")->fetch(PDO::FETCH_ASSOC);
        //RESERVE CHAIRS
        $reserve_chairs = $dbConn->query("SELECT SUM(dd.quantity) as quantity FROM tbl_details dd INNER JOIN tbl_amenities aa ON aa.id = dd.amenities_id  WHERE aa.category_id = 1 AND (('".$txtDateFrom."' BETWEEN dd.date_from AND dd.date_to) OR ('".$txtDateTo."' BETWEEN dd.date_from AND dd.date_to))")->fetch(PDO::FETCH_ASSOC);
        
    // } else {
    //     //tents
    //     $tents = $dbConn->query("SELECT aa.*, cc.name as category_name  FROM tbl_amenities aa JOIN tbl_categories cc ON aa.category_id = cc.id  WHERE aa.status = 'av' AND aa.category_id = 2");
    //     //COTTAGES
    //     $cottages = $dbConn->query("SELECT aa.*, cc.name as category_name  FROM tbl_amenities aa JOIN tbl_categories cc ON aa.category_id = cc.id  WHERE aa.status = 'av' AND aa.category_id = 3");
    //     //ROOMS
    //     $rooms = $dbConn->query("SELECT aa.*, cc.name as category_name  FROM tbl_amenities aa JOIN tbl_categories cc ON aa.category_id = cc.id  WHERE aa.status = 'av' AND aa.category_id = 5");
    // }


    // $total_tents    = 0;
    $total_chairs   = 0;
    $total_tables   = 0;
    // if(isset($txtDateFrom) && isset($txtDateTo)) { 
        // $total_tents  = (isset($tents['quantity']) > 0 ? $tents['quantity'] : 0) - (isset($reserve_tents['quantity']) > 0 ? $reserve_tents['quantity'] : 0);
        $total_chairs = (isset($chairs['quantity']) > 0 ? $chairs['quantity'] : 0) - (isset($reserve_chairs['quantity']) > 0 ? $reserve_chairs['quantity'] : 0);
        $total_tables = (isset($tables['quantity']) > 0 ? $tables['quantity'] : 0) - (isset($reserve_tables['quantity']) > 0 ? $reserve_tables['quantity'] : 0);
    // } else {   
    //     // $total_tents = isset($tents['quantity']) > 0 ? $tents['quantity'] : 0;
    //     $total_chairs = isset($chairs['quantity']) > 0 ? $chairs['quantity'] : 0;
    //     $total_tables = isset($tables['quantity']) > 0 ? $tables['quantity'] : 0;
    // } 


    // FUNCTION HALL
    $reserve_function_hall = $dbConn->query("SELECT COUNT(*) as ff_all FROM tbl_details dd INNER JOIN tbl_amenities aa ON aa.id = dd.amenities_id  WHERE aa.category_id = 4 AND (('".$txtDateFrom."' BETWEEN dd.date_from AND dd.date_to) OR ('".$txtDateTo."' BETWEEN dd.date_from AND dd.date_to))")->fetch(PDO::FETCH_ASSOC);
    // $function_hall = $dbConn->query("SELECT * FROM tbl_details dd INNER JOIN tbl_amenities aa ON aa.id = dd.amenities_id  WHERE aa.category_id = 4 AND (('".$txtDateFrom."' BETWEEN dd.date_from AND dd.date_to) OR ('".$txtDateTo."' BETWEEN dd.date_from AND dd.date_to)) LIMIT 1");
    // $checker       = $function_hall->fetch(PDO::FETCH_OBJ);
    // $func_hall     = $function_hall->rowCount();

    function status($id1, $id2, $status){
        if($status == 'na'){
            return '#ec9c0a';
        } else {
            if(isset($id1) && $id1 == $id2){
                return '#de0000';
            } else {
                return '#0dd00d';
            }
        }
    }

    function checker_status($id1, $id2, $status){
        if($status == 'na'){
            return '2';
        } else {
            if(isset($id1) && $id1 == $id2){
                return '0';
            } else {
                return '1';
            }
        }
    }

    function checker_other($a,$b){
        if($b == 'na'){
            return '2';
        } else {
            if($a <= 0){
                return '0';
            } else {
                return '1';
            }
        }
    }

    function other_status($a, $b){
        if($b == 'na'){
            return '#ec9c0a';
        } else {
            if($a <= 0){
                return '#de0000';
            } else {
                return '#0dd00d';
            }
        }
    }

    function checker_other1($a,$b){
        if($b == 'na'){
            return '2';
        } else {
            if($a >= 1){
                return '0';
            } else {
                return '1';
            }
        }
    }

    function other_status1($a, $b){
        if($b == 'na'){
            return '#ec9c0a';
        } else {
            if($a >= 1){
                return '#de0000';
            } else {
                return '#0dd00d';
            }
        }
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
            class="cottages book_now" 
            data-category="<?php echo @$tables['category_name'] ?>"
            data-amenityid="<?php echo @$tables['id'] ?>"
            data-categoryid="<?php echo @$tables['category_id'] ?>"
            data-available="<?php echo $total_tables ?>"
            data-quantity="<?php echo @$tables['quantity'] ?>"
            data-amount="<?php echo @$tables['amount_per_hour'] ?>"
            data-amountnight="<?php echo @$tables['amount_per_night'] ?>"
            data-name="<?php echo @$tables['name'] ?>"
            data-status="<?php echo checker_other($total_tables,@$tables['status']) ?>"
            fill="<?php echo other_status($total_tables, @$tables['status']) ?>" 
            x="557.5" 
            y="480.5" 
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
            class="cottages book_now" 
            data-category="<?php echo @$chairs['category_name'] ?>"
            data-amenityid="<?php echo @$chairs['id'] ?>"
            data-categoryid="<?php echo @$chairs['category_id'] ?>"
            data-available="<?php echo $total_chairs ?>"
            data-quantity="<?php echo @$chairs['quantity'] ?>"
            data-amount="<?php echo @$chairs['amount_per_hour'] ?>"
            data-amountnight="<?php echo @$chairs['amount_per_night'] ?>"
            data-name="<?php echo @$chairs['name'] ?>"
            data-status="<?php echo checker_other($total_chairs,@$chairs['status']) ?>"
            fill="<?php echo other_status($total_chairs, @$chairs['status']) ?>" 
            x="777.5" 
            y="480.5" 
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

        
        
        <!-- =================== START COTTAGES =================================== -->
        <text transform="matrix(1 0 0 1 624.5 69.9248)" font-family="'arial'" font-size="20">COTTAGES</text>
        <?php 
            while ($cottage = $cottages->fetch(PDO::FETCH_OBJ)) { ?>
        <rect 
            data-amenityid="<?php echo $cottage->id ?>"
            data-categoryid="<?php echo $cottage->category_id ?>"
            data-category="<?php echo $cottage->category_name ?>"
            data-quantity="<?php echo $cottage->quantity ?>"
            data-amount="<?php echo $cottage->amount_per_hour ?>"
            data-amountnight="<?php echo $cottage->amount_per_night ?>"
            data-name="<?php echo $cottage->name ?>"
            data-status="<?php echo checker_status($cottage->r_a_id, $cottage->id, $cottage->status);?>"
            fill="<?php echo status($cottage->r_a_id, $cottage->id, $cottage->status);?>"
            class="cottages book_now" 
            x="<?php echo $cottage->x ?>" 
            y="<?php echo $cottage->y ?>" 
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
                data-sample="<?php echo $tent->r_a_id?>"
                data-amenityid="<?php echo $tent->id ?>"
                data-categoryid="<?php echo $tent->category_id ?>"
                data-category="<?php echo $tent->category_name ?>"
                data-quantity="<?php echo $tent->quantity ?>"
                data-amount="<?php echo $tent->amount_per_hour ?>"
                data-amountnight="<?php echo $tent->amount_per_night ?>"
                data-name="<?php echo $tent->name ?>" 
                data-status="<?php echo checker_status($tent->r_a_id, $tent->id, $tent->status);?>"
                fill="<?php echo status($tent->r_a_id, $tent->id, $tent->status);?>"
                class="cottages book_now" 
                x="<?php echo $tent->x ?>" 
                y="<?php echo $tent->y ?>" 
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
        <!-- =================== START ROOMS =================================== -->
        <?php 
            while ($room = $rooms->fetch(PDO::FETCH_OBJ)) { ?>
        <rect 
            data-amenityid="<?php echo $room->id ?>"
            data-categoryid="<?php echo $room->category_id ?>"
            data-category="<?php echo $room->category_name ?>"
            data-quantity="<?php echo $room->quantity ?>"
            data-amount="<?php echo $room->amount_per_hour ?>"
            data-amountnight="<?php echo $room->amount_per_night ?>"
            data-name="<?php echo $room->name ?>" 
            data-status="<?php echo checker_status($room->r_a_id, $room->id, $room->status);?>"
            fill="<?php echo status($room->r_a_id, $room->id, $room->status);?>"
            class="cottages book_now" 
            x="<?php echo $room->x ?>" 
            y="<?php echo $room->y ?>" 
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
        
        <rect 
            class="cottages book_now" 
            data-category="<?php echo @$hall['category_name'] ?>"
            data-amenityid="<?php echo @$hall['id'] ?>"
            data-categoryid="<?php echo @$hall['category_id'] ?>"
            data-available="0"
            data-quantity="<?php echo @$hall['quantity'] ?>"
            data-amount="<?php echo @$hall['amount_per_hour'] ?>"
            data-amountnight="<?php echo @$hall['amount_per_night'] ?>"
            data-name="<?php echo @$hall['name'] ?>"
            data-status="<?php echo checker_other1($reserve_function_hall['ff_all'], @$hall['status']) ?>"
            fill="<?php echo other_status1($reserve_function_hall['ff_all'],@$hall['status']) ?>" 
            x="208.5" 
            y="753.5" 
            stroke="#000000" 
            stroke-miterlimit="10" 
            width="204" 
            height="175"/>
        <text transform="matrix(1 0 0 1 267.8271 834)">
            <tspan x="0" y="0" font-family="'arial'" font-size="20">FUNCTION</tspan>
            <tspan x="0" y="24" font-family="'arial'" font-size="20">HALL</tspan>
        </text>

        <rect x="544.5" y="749.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="91" height="98"/>
        <text transform="matrix(1 0 0 1 559 791)">
            <tspan x="0" y="0" font-family="'arial'" font-size="13">CASHIER</tspan>
            <tspan x="0" y="15.601" font-family="'arial'" font-size="13">COUNTER</tspan>
        </text>
        <rect x="433" y="480" width="10" height="480"/>
    </svg>
</div>