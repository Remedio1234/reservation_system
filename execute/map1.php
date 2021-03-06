<style>
    .cottages:hover {
        fill: blue;
        cursor: pointer;
    }
</style>
<?php
    /* database connection */
    require_once('../library/config.php');
    //Cottages
    $cottages = $dbConn->query("SELECT * FROM tbl_amenities WHERE status = 'av' AND category_id = 3");
 
?>
<div id="map_design">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="960px" height="960px" viewBox="0 0 960 960" enable-background="new 0 0 960 960" xml:space="preserve">

        <text transform="matrix(1 0 0 1 624.5 69.9248)" font-family="'ArialMT'" font-size="20">COTTAGES</text>
        <rect x="429" y="480" width="21" height="480"/>
        
        <rect x="661.5" y="677.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="280" height="267"/>
        <text transform="matrix(1 0 0 1 769.334 811)"><tspan x="0" y="0" font-family="'ArialMT'" font-size="20">PARKING</tspan><tspan x="0" y="24" font-family="'ArialMT'" font-size="20">  AREA</tspan></text>
        
        <rect class="cottages" x="471.5" y="480.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="153" height="77"/>
        <text transform="matrix(1 0 0 1 509.7852 503.1602)" font-family="'ArialMT'" font-size="20">TABLES</text>
        <text transform="matrix(1 0 0 1 520 544.2559)" font-family="'ArialMT'" font-size="41.5568">50</text>
        
        <rect class="cottages" x="639.5" y="481.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="157" height="77"/>
        <text transform="matrix(1 0 0 1 688.8379 506.1602)" font-family="'ArialMT'" font-size="20">CHAIRS</text>
        <text transform="matrix(1 0 0 1 692.2793 546.2559)" font-family="'ArialMT'" font-size="41.5568">300</text>
        
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

        <rect class="cottages" x="98.5" y="693.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="77" height="47"/>
        <text transform="matrix(1 0 0 1 113.2637 722)" font-family="'ArialMT'" font-size="12">ROOM 4</text>
        <rect class="cottages" x="98.5" y="751.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="77" height="47"/>
        <text transform="matrix(1 0 0 1 114.2637 781)" font-family="'ArialMT'" font-size="12">ROOM 3</text>
        <rect class="cottages" class="cottages" x="98.5" y="810.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="77" height="47"/>
        <text transform="matrix(1 0 0 1 114.2637 837)" font-family="'ArialMT'" font-size="12">ROOM 2</text>
        <rect class="cottages" x="98.5" y="865.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="77" height="47"/>
        <text transform="matrix(1 0 0 1 113.2637 894.4736)" font-family="'ArialMT'" font-size="12">ROOM 1</text>

        <!-- <rect class="cottages" x="417.5" y="101.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 435.5483 130.3657)" font-family="'ArialMT'" font-size="25">1</text> -->
        <!-- <rect class="cottages" x="477.5" y="101.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 495.5488 130.3657)" font-family="'ArialMT'" font-size="25">2</text> -->
        <!-- <rect class="cottages" x="537.5" y="101.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 555.5488 130.3657)" font-family="'ArialMT'" font-size="25">3</text> -->



        <!-- <rect class="cottages" x="597.5" y="101.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 615.5488 130.3657)" font-family="'ArialMT'" font-size="25">4</text> -->

        <?php 
        // print_r($profile);
        while ($cottage = $cottages->fetch(PDO::FETCH_OBJ)) { ?>
            <rect 
                class="cottages" 
                x="<?php echo $cottage->x ?>" 
                y="<?php echo $cottage->y ?>" 
                fill="#FFFFFF" 
                stroke="#000000" 
                stroke-miterlimit="10" 
                width="51" 
                height="40"/>
            <text 
                transform="<?php echo $cottage->transform ?>"
                font-family="'ArialMT'" 
                font-size="25"><?php echo $cottage->name ?></text>
        <?php } ?>
        
        
        <rect class="cottages" x="656.5" y="101.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 674.5488 130.3657)" font-family="'ArialMT'" font-size="25">5</text>
        
        
        <rect class="cottages" x="715.5" y="101.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 733.5488 130.3657)" font-family="'ArialMT'" font-size="25">6</text>
        
        
        <rect class="cottages" x="774.5" y="101.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 792.5488 130.3657)" font-family="'ArialMT'" font-size="25">7</text>
        
        
        <rect class="cottages" x="832.5" y="101.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 850.5488 130.3657)" font-family="'ArialMT'" font-size="25">8</text>
        <rect class="cottages" x="890.5" y="101.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 908.5488 130.3657)" font-family="'ArialMT'" font-size="25">9</text>
        <rect class="cottages" x="890.5" y="160.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 901.5488 189.3657)" font-family="'ArialMT'" font-size="25">10</text>
        <rect class="cottages" x="825.5" y="160.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 836.5488 189.3657)" font-family="'ArialMT'" font-size="25">11</text>
        <rect class="cottages" x="761.5" y="160.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 773.5488 189.3657)" font-family="'ArialMT'" font-size="25">12</text>
        <rect class="cottages" x="695.5" y="160.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 707.5488 189.3657)" font-family="'ArialMT'" font-size="25">13</text>
        <rect class="cottages" x="626.5" y="160.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 636.5 189.3657)" font-family="'ArialMT'" font-size="25">14</text>
        <rect class="cottages" x="557.5" y="160.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 567.5488 189.3657)" font-family="'ArialMT'" font-size="25">15</text>
        <rect class="cottages" x="486.5" y="160.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 497.5488 189.3657)" font-family="'ArialMT'" font-size="25">16</text>
        <rect class="cottages" x="419.5" y="160.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 429.5483 189.3657)" font-family="'ArialMT'" font-size="25">17</text>
        <rect class="cottages" x="419.5" y="219.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 429.5483 248.3657)" font-family="'ArialMT'" font-size="25">18</text>
        <rect class="cottages" x="486.5" y="219.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 497.5488 248.3657)" font-family="'ArialMT'" font-size="25">19</text>
        <rect class="cottages" x="557.5" y="219.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 567.5488 248.3657)" font-family="'ArialMT'" font-size="25">20</text>
        <rect class="cottages" x="626.5" y="219.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 636.5 248.3657)" font-family="'ArialMT'" font-size="25">21</text>
        <rect class="cottages" x="695.5" y="219.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 707.5488 248.3657)" font-family="'ArialMT'" font-size="25">22</text>
        <rect class="cottages" x="761.5" y="219.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 772.5488 248.3657)" font-family="'ArialMT'" font-size="25">23</text>
        <rect class="cottages" x="825.5" y="219.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 835.5488 248.3657)" font-family="'ArialMT'" font-size="25">24</text>
        <rect class="cottages" x="890.5" y="219.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 901.5488 248.3657)" font-family="'ArialMT'" font-size="25">25</text>
        <rect class="cottages" x="600.5" y="279.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 612.5488 308.3657)" font-family="'ArialMT'" font-size="25">26</text>
        <rect class="cottages" x="540.5" y="279.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 552.5488 308.3657)" font-family="'ArialMT'" font-size="25">27</text>
        <rect class="cottages" x="480.5" y="279.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 492.5488 308.3657)" font-family="'ArialMT'" font-size="25">28</text>
        <rect class="cottages" x="420.5" y="279.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 432.5483 308.3657)" font-family="'ArialMT'" font-size="25">29</text>
        <rect class="cottages" x="85.5" y="403.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 96.5483 432.3657)" font-family="'ArialMT'" font-size="25">30</text>
        <rect class="cottages" x="20.5" y="403.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="51" height="40"/>
        <text transform="matrix(1 0 0 1 32.5483 432.3657)" font-family="'ArialMT'" font-size="25">31</text>
        
        <text transform="matrix(1 0 0 1 25.5913 372.8813)" font-family="'ArialMT'" font-size="20">COTTAGES</text>
        <rect class="cottages" x="25.5" y="101.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="232" height="77"/>
        <text transform="matrix(1 0 0 1 104.7847 124.1606)" font-family="'ArialMT'" font-size="20">TENTS</text>
        <text transform="matrix(1 0 0 1 112.0005 163.2559)" font-family="'ArialMT'" font-size="41.5568">29</text>
        
        <rect class="cottages" x="208.5" y="753.5" fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" width="204" height="175"/>
        <text transform="matrix(1 0 0 1 267.8271 834)">
            <tspan x="0" y="0" font-family="'ArialMT'" font-size="20">FUNCTION</tspan>
            <tspan x="0" y="24" font-family="'ArialMT'" font-size="20">HALL</tspan>
        </text>
    </svg>
</div>