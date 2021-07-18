
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
<div class="container">

      <div class="row my-5">

       <?php include_once('pages/dashboard/menu.php'); ?>

        <div class="col-lg-9" style="margin-bottom:5em;">

        
          <div class="card card-outline-secondary">
            <div class="card-header">
              Reservations
            </div>
            <div class="card-body" style="padding-top:0em;">
             <?php include_once('pages/dashboard/profile.php'); ?>
            <hr>
            <h3>Reservations</h3>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>ID</th>
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
                LEFT JOIN tbl_caterers cat ON cat.caterers_id = res.caterers_id ORDER BY id DESC");
            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                ?>
                <tr>
                    <td><?php echo $row->reservation_id; ?></td>
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
            </tbody>
        </table>
            </div>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>