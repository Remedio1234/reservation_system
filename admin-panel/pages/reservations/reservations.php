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
                        <th>Reservation ID</th>
                        <th>Fullname</th>
                        <th>Contact</th>
                        <th>Eamil</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = $data['conn']->query("SELECT 
                        rr.id, rr.reservation_id, cc.fullname, cc.contact, cc.email_address,rr.date_applied FROM tbl_reservations rr 
                        INNER JOIN tbl_customers cc ON rr.customer_id = cc.id OR rr.guest_id = cc.guest_id LIMIT 10");
                        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                            ?>
                    <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->reservation_id; ?></td>
                        <td><?php echo $row->fullname; ?></td>
                        <td><?php echo $row->contact; ?></td>
                        <td><?php echo $row->email_address; ?></td>
                        <td>
                            <strong>
                                <?php echo @number_format($data['conn']->query("SELECT SUM(total_amount) AS total FROM tbl_details WHERE reservation_id = '".$row->id."'")->fetch(PDO::FETCH_OBJ)->total,2); ?> 
                            </strong>
                        </td>
                        <td><?php echo date('M d, Y, d H:i:s', strtotime($row->date_applied)); ?></td>
                        <td align="center">
                            <a href="javascript:void(0);" id="showDetails1" class="btn btn-sm mt-1 btn-primary" data-resid="<?php echo $row->id; ?>" data-id="<?php echo $row->id; ?>" ><i class="fa fa-info"></i> View Reservation  </a>
                            <a href="javascript:void(0);" class="btn btn-warning btn-sm mt-1" data-id="<?php echo $row->id; ?>" id="deleteData1"><i class="fa fa-file"></i> Proof Payment </a>   
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
  
