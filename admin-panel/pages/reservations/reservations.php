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
                        <th>Email</th>
                        <th>Total</th>
                        <th>Reserved Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = $data['conn']->query("SELECT 
                        rr.id, rr.reservation_id, rr.status, rr.customer_id, cc.fullname, cc.contact, cc.email_address,rr.date_applied FROM tbl_reservations rr 
                        INNER JOIN tbl_customers cc ON rr.customer_id = cc.id OR rr.guest_id = cc.guest_id LIMIT 10");
                        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                            ?>
                    <tr>
                        <td><?php echo $row->id; ?></td>
                        <td>
                            <a style="text-decoration: none;"
                                href="javascript://;" 
                                title="<?php echo ($row->customer_id == 0 ? 'Guest' : 'Customer') ?>">
                                <?php echo $row->reservation_id; ?>
                            </a>
                        </td>
                        <td><?php echo $row->fullname; ?></td>
                        <td><?php echo $row->contact; ?></td>
                        <td><?php echo $row->email_address; ?></td>
                        <td>
                            <strong>
                                <?php echo @number_format($data['conn']->query("SELECT SUM(total_amount) AS total FROM tbl_details WHERE reservation_id = '".$row->id."'")->fetch(PDO::FETCH_OBJ)->total,2); ?> 
                            </strong>
                        </td>
                        <td><?php echo date('M d, Y, d H:i:s', strtotime($row->date_applied)); ?></td>
                        <td><?php echo status($row->status); ?></td>
                        <td align="center">
                            <a 
                                href="javascript:void(0);" 
                                id="view_reservation_details"  
                                class="btn btn-sm mt-1 btn-primary" 
                                data-reservationid="<?php echo $row->reservation_id; ?>" 
                                data-status="<?php echo $row->status; ?>" 
                                data-id="<?php echo $row->id; ?>" ><i class="fa fa-info"></i> View Details  </a>
                            <!-- <a href="javascript:void(0);" class="btn btn-warning btn-sm mt-1" data-id="<?php echo $row->id; ?>" id="deleteData1"><i class="fa fa-file"></i> Proof Payment </a>    -->
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
<!-- Modal -->
<div class="modal fade" id="reservationDetailsModal" tabindex="-1" role="dialog" aria-labelledby="label2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="label2">Reservation ID - <span id="show_reservation"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="show-details table table-stripped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Date From</th>
                            <th>Date To</th>
                            <th>Day/s</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody></tbody>          
                </table>
                <div id="all_proof" class="mt-5" style="display:none;">
                    <h4>Attach File/s</h4>
                    <div class="row container" id="proof_files"></div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="col-md-6">
                            <div class="mt-5"> 
                                <form action="">
                                    <input type="hidden" name="reservation_id_hide" id="reservation_id_hide">
                                    <label for="status"><strong>Status</strong></label>
                                    <select name="txt_status" id="txt_status" class="form-control" id="status">
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approved</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                    <br/>
                                    <button class="btn btn-success" id="reservation_status_confirm">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
