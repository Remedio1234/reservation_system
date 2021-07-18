<?php 
function status($status)
{
    switch ($status) {
        case 'pending':
            return '<span class="text-warning">Pending</span>';
            break;
        case 'approved':
            return '<span class="text-success">Approved</span>';
        default:
            return '<span class="text-danger">Cancelled</span>';
            break;
    }
}
?>
<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body">
                <div class="float-left">
                    <h3 class="card-title m-b-0 mt-1">Reservations Report</h3>
                </div>
                <div class="float-right">
                    <a href="<?php echo WEB_ROOT . 'admin-panel/?v=reports'; ?>" class="btn btn-secondary">Back to report</a>
                </div>
            </div>
            <hr class="m-t-0">
            <div class="card-body" style="padding-top:0px;">
                <!-- row -->
                <form method="post" name="formCustomer" id="formCustomer">
                <div class="row">
                    
                        <div class="form-group col-md-2">
                            <select class="form-control" name="status" id="status">
                                <?php
                                $options = ['' => 'All Status', 'pending' => 'Pending', 'approved' => 'Approved', 'cancelled' => 'Cancelled'];
                                ?>
                            <?php foreach ($options as $key => $status) { ?>
                                <option <?php echo (@$_POST['status'] == $key ? 'selected' : ''); ?> value="<?php echo $key; ?>"><?php echo $status; ?></option>
                            <?php 
                        } ?>                                                       
                            </select>
                        </div>
                    
                    
                        <div class="form-group col-md-1">
                            <button name="btn_search" class="btn btn-secondary waves-effect waves-light" type="submit"><span class="btn-label"><i class="fa fa-search"></i></span> Search</button>
                        </div>
                    
                    <div class="form-group col-md-9">
                        <button type="button" class="btn btn-secondary dropdown-toggle float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export Data
                        </button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="javascript://" onclick="exportToReservations('csv');">CSV File</a>
                            <a class="dropdown-item" href="javascript://" onclick="exportToReservations('xls');">Excel File</a>
                            <!-- <a class="dropdown-item" href="javascript://" onclick="exportToReservations('xlsx');">XLSX</a> -->
                            <a class="dropdown-item" href="javascript://" onclick="exportToReservations('txt');">Plain Text</a>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                    </form>

                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Reservations List</h4>
                                <div class="scroll-table" style="padding-top:0px;overflow-y: auto;height: 800px;">
                                    <table class="table table-bordered" id="reservations" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Reservation ID</th>
                                            <th>Fullname</th>
                                            <th>Venues</th>
                                            <th>Events</th>
                                            <th>Caterers</th>
                                            <th>DateFrom</th>
                                            <th>DateTo</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_POST['btn_search']) && !empty($_POST['status'])) :
                                                $query = $data['conn']->query("SELECT 
                                                    cus.fullname,
                                                    res.id,
                                                    res.reservation_id, 
                                                    res.total_hours,
                                                    res.sub_total,
                                                    res.total,
                                                    res.date_from,
                                                    res.date_to,
                                                    res.date_applied,
                                                    res.status,
                                                    ev.name,
                                                    ven.name,
                                                    cat.caterers_name 
                                                    FROM tbl_reservations res 
                                                    INNER JOIN tbl_customers cus ON cus.customer_id = res.customer_id
                                                    INNER JOIN tbl_amenities ven ON ven.amenities_id = res.amenities_id 
                                                    INNER JOIN tbl_categories ev ON ev.category_id = res.category_id 
                                                    LEFT JOIN tbl_caterers cat ON cat.caterers_id = res.caterers_id WHERE res.status = '" . $_POST['status'] . "' ORDER BY res.reservation_id ASC");
                                                                                        else :
                                                                                            $query = $data['conn']->query("SELECT 
                                                    cus.fullname,
                                                    res.id,
                                                    res.reservation_id, 
                                                    res.total_hours,
                                                    res.sub_total,
                                                    res.total,
                                                    res.date_from,
                                                    res.date_to,
                                                    res.date_applied,
                                                    res.status,
                                                    ev.name,
                                                    ven.name,
                                                    cat.caterers_name 
                                                    FROM tbl_reservations res 
                                                    INNER JOIN tbl_customers cus ON cus.customer_id = res.customer_id
                                                    INNER JOIN tbl_amenities ven ON ven.amenities_id = res.amenities_id 
                                                    INNER JOIN tbl_categories ev ON ev.category_id = res.category_id 
                                                    LEFT JOIN tbl_caterers cat ON cat.caterers_id = res.caterers_id ORDER BY res.reservation_id ASC");
                                            endif;
                                            if ($query->rowCount() > 0) :
                                                $i = 0;
                                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row->reservation_id; ?></td>
                                                    <td><?php echo $row->fullname; ?></td>
                                                    <td><?php echo $row->name; ?></td>
                                                    <td><?php echo $row->name; ?></td>
                                                    <td><?php echo ($row->caterers_name) ? $row->caterers_name : 'NA'; ?></td>
                                                    <td><?php echo $row->date_from; ?></td>
                                                    <td><?php echo $row->date_to; ?></td>
                                                    <td><strong><?php echo number_format($row->total, 2); ?></strong></td>
                                                    <td><?php echo status($row->status); ?></td>
                                                </tr>
                                                    <?php 
                                                } ?>
                                                <?php else : ?>
                                                <tr>
                                                    <td colspan="10">No records found.!</td>
                                                </tr>
                                            <?php endif; ?>
                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>                                                          
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>