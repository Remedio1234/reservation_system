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
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT. 'admin-panel/?v=dashboard'?>">Dashboard</a></li>
    <li class="breadcrumb-item active">Reservations</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
    <div class="card-header">
        <div class="pull-left">
        <h4>List Of Reservations </h4>
        </div>
        <!-- <div class="pull-right">
        <button class="btn btn-primary" id="showModal">+Add New</button>
        </div> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>ID</th>
                <th>Fullname</th>
                <th>Venues</th>
                <th>Events</th>
                <th>Caterers</th>
                <th>DateFrom</th>
                <th>DateTo</th>
                <th>Total</th>
                <th>Status</th>
                <th style="width:15%;text-align:center;">Actions</th>
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
                LEFT JOIN tbl_caterers cat ON cat.caterers_id = res.caterers_id");
                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                    ?>
                <tr>
                    <td><?php echo $row->reservation_id; ?></td>
                    <td><?php echo $row->fullname; ?></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo ($row->caterers_name) ? $row->caterers_name : 'NA'; ?></td>
                    <td><?php echo $row->date_from; ?></td>
                    <td><?php echo $row->date_to; ?></td>
                    <td><strong><?php echo number_format($row->total, 2); ?></strong></td>
                    <td><?php echo status($row->status); ?></td>

                    <td align="center">
                        <a href="javascript:void(0);" id="showDetails" class="btn btn-sm mt-1 btn-primary" data-resid="<?php echo $row->reservation_id; ?>" data-id="<?php echo $row->id; ?>" ><i class="fa fa-info"></i> Reservation  </a>
                        <a href="javascript:void(0);" class="btn btn-danger btn-sm mt-1" data-id="<?php echo $row->id; ?>" id="deleteData"><i class="fa fa-trash"></i> Delete </a>   
                    </td>
                     
                </tr>
                        <?php 
                    } ?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
<!-- /.container-fluid-->
<?php if (isset($data['page'])) if (file_exists('pages/modals/'. $data['page'] .'_modal.php')) include('pages/modals/'. $data['page'] .'_modal.php');?>	
  
