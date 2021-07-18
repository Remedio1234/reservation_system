<style>
    .cottages:hover {
        fill: blue;
        cursor: pointer;
    }
</style>
<?php
    /* database connection */
    require_once('../library/config.php');
    //TENTS
    $tents = $dbConn->query("SELECT * FROM tbl_amenities WHERE status = 'av' AND category_id = 2")->fetch(PDO::FETCH_ASSOC);
    
    //TABLES
    $tables = $dbConn->query("SELECT * FROM tbl_amenities WHERE status = 'av' AND category_id = 6")->fetch(PDO::FETCH_ASSOC);

    //CHAIRS
    $chairs = $dbConn->query("SELECT * FROM tbl_amenities WHERE status = 'av' AND category_id = 1")->fetch(PDO::FETCH_ASSOC);
    
    //COTTAGES
    $cottages = $dbConn->query("SELECT * FROM tbl_amenities WHERE status = 'av' AND category_id = 3");

    //ROOMS
    $rooms = $dbConn->query("SELECT * FROM tbl_amenities WHERE status = 'av' AND category_id = 5");

 
?>
<div id="map_design">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="960px" height="960px" viewBox="0 0 960 960" enable-background="new 0 0 960 960" xml:space="preserve">

        <text transform="matrix(1 0 0 1 624.5 69.9248)" font-family="'ArialMT'" font-size="20">COTTAGES</text>
        <rect x="429" y="480" width="21" height="480"/>
        
        <rect x="661.5" y="677.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="280" height="267"/>
        <text transform="matrix(1 0 0 1 769.334 811)">
            <tspan x="0" y="0" font-family="'ArialMT'" font-size="20">PARKING</tspan>
            <tspan x="0" y="24" font-family="'ArialMT'" font-size="20">  AREA</tspan>
        </text>

        <!-- TABLES -->
        <rect class="cottages" x="471.5" y="480.5" fill="#0dd00d" stroke="#000000" stroke-miterlimit="10" width="153" height="77"/>
        <text transform="matrix(1 0 0 1 509.7852 503.1602)" font-family="'ArialMT'" font-size="20">TABLES</text>
        <text transform="matrix(1 0 0 1 520 544.2559)" font-family="'ArialMT'" font-size="41.5568">
            <?php echo $tables['quantity']; ?>
        </text>
        
        <!-- CHAIRS -->
        <rect class="cottages" x="639.5" y="481.5" fill="#0dd00d" stroke="#000000" stroke-miterlimit="10" width="157" height="77"/>
        <text transform="matrix(1 0 0 1 688.8379 506.1602)" font-family="'ArialMT'" font-size="20">CHAIRS</text>
        <text transform="matrix(1 0 0 1 692.2793 546.2559)" font-family="'ArialMT'" font-size="41.5568">
            <?php echo $chairs['quantity']; ?>
        </text>
        
        <line fill="none" stroke="#000000" stroke-miterlimit="10" x1="526.5" y1="897" x2="526.5" y2="960"/>
        <line fill="none" stroke="#000000" stroke-miterlimit="10" x1="467.5" y1="897" x2="467.5" y2="960"/>
        <text transform="matrix(1 0 0 1 479.9995 941.5)" font-family="'ArialMT'" font-size="12">GATE</text>
        <line fill="none" stroke="#000000" stroke-miterlimit="10" x1="13.5" y1="897" x2="13.5" y2="960"/>
        <line fill="none" stroke="#000000" stroke-miterlimit="10" x1="71.5" y1="897" x2="71.5" y2="960"/>
        <text transform="matrix(1 0 0 1 27.0972 941.5)" font-family="'ArialMT'" font-size="12">GATE</text>
        <rect x="208.5" y="630.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="89" height="94"/>
        <rect x="313.5" y="630.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="101" height="94"/>
        <text transform="matrix(1 0 0 1 334 677.5)"><tspan x="0" y="0" font-family="'ArialMT'" font-size="12">SWIMMING </tspan><tspan x="0" y="14.4" font-family="'ArialMT'" font-size="12">    POOL</tspan></text>
        <text transform="matrix(1 0 0 1 222.7632 680.5)" font-family="'ArialMT'" font-size="12">RESTO BAR</text>

        <!-- ROOMS -->
        <?php 
        while ($room = $rooms->fetch(PDO::FETCH_OBJ)) { ?>
            <rect 
                class="cottages" 
                x="<?php echo $room->x ?>" 
                y="<?php echo $room->y ?>" 
                fill="#0dd00d" 
                stroke="#000000" 
                stroke-miterlimit="10" 
                width="77" 
                height="47"/>
            <text 
                transform="<?php echo $room->transform ?>"
                font-family="'ArialMT'" 
                font-size="12"><?php echo $room->name ?></text>
        <?php } ?>
        <!-- <rect class="cottages" x="98.5" y="693.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="77" height="47"/>
        <text transform="matrix(1 0 0 1 113.2637 722)" font-family="'ArialMT'" font-size="12">ROOM 4</text>
        <rect class="cottages" x="98.5" y="751.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="77" height="47"/>
        <text transform="matrix(1 0 0 1 114.2637 781)" font-family="'ArialMT'" font-size="12">ROOM 3</text>
        <rect class="cottages" class="cottages" x="98.5" y="810.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="77" height="47"/>
        <text transform="matrix(1 0 0 1 114.2637 837)" font-family="'ArialMT'" font-size="12">ROOM 2</text>
        <rect class="cottages" x="98.5" y="865.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="77" height="47"/>
        <text transform="matrix(1 0 0 1 113.2637 894.4736)" font-family="'ArialMT'" font-size="12">ROOM 1</text> -->
        <!-- =================== START COTTAGES =================================== -->
        <?php 
        while ($cottage = $cottages->fetch(PDO::FETCH_OBJ)) { ?>
            <rect 
                class="cottages" 
                x="<?php echo $cottage->x ?>" 
                y="<?php echo $cottage->y ?>" 
                fill="#0dd00d" 
                stroke="#000000" 
                stroke-miterlimit="10" 
                width="51" 
                height="40"/>
            <text 
                transform="<?php echo $cottage->transform ?>"
                font-family="'ArialMT'" 
                font-size="25"><?php echo $cottage->name ?></text>
        <?php } ?>
        <!-- =================== END COTTAGES =================================== -->
        
        <text transform="matrix(1 0 0 1 25.5913 372.8813)" font-family="'ArialMT'" font-size="20">COTTAGES</text>
        
        <rect class="cottages" x="25.5" y="101.5" fill="#0dd00d" stroke="#000000" stroke-miterlimit="10" width="232" height="77"/>
        <text transform="matrix(1 0 0 1 104.7847 124.1606)" font-family="'ArialMT'" font-size="20">TENTS</text>
        <text transform="matrix(1 0 0 1 112.0005 163.2559)" font-family="'ArialMT'" font-size="41.5568">
            <?php echo isset($tents['quantity']) > 0 ? $tents['quantity'] : 0; ?>
        </text>
        
        <rect class="cottages" x="208.5" y="753.5" fill="#0dd00d" stroke="#000000" stroke-miterlimit="10" width="204" height="175"/>
        <text transform="matrix(1 0 0 1 267.8271 834)">
            <tspan x="0" y="0" font-family="'ArialMT'" font-size="20">FUNCTION</tspan>
            <tspan x="0" y="24" font-family="'ArialMT'" font-size="20">HALL</tspan>
        </text>
    </svg>
</div>