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
                            <th>Reservation ID</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php
                        $query = $data['conn']->query("SELECT * FROM tbl_reservations WHERE customer_id  = '". @$_SESSION['customer']['customer_id'] ."'");
                        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                            ?>
                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->reservation_id; ?></td>
                                <td>
								<strong>
									<?php echo @number_format($data['conn']->query("SELECT SUM(total_amount) AS total FROM tbl_details WHERE reservation_id = '".$row->id."' ")->fetch(PDO::FETCH_OBJ)->total,2); ?> 
								</strong>
							</td>
                                <td><?php echo date('M d, Y, d H:i:s', strtotime($row->date_applied)); ?></td>
                                <td><?php echo status($row->status); ?></td>
                                <td>
                                    <a href="javascript:void;" data-id="<?php echo $row->id ?>" class="view_reservation_details" title="View Details">
                                        <span class="fa fa-fw fa-eye"></span>
                                    </a>
                                    <a href="javascript:void;" data-id="<?php echo $row->id ?>" class="uploaded_proof" title="Uploaded File">
                                        <span class="fa fa-fw fa-file"></span>
                                    </a>
                                    <a href="javascript:void;" data-id="<?php echo $row->id ?>" class="proof_of_payment" title="Upload Payment Proof">
                                        <span class="fa fa-fw fa-upload"></span>
                                    </a>
                                </td>
                                
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
<!-- Modal -->
<div class="modal fade" id="reservationDetailsModal" tabindex="-1" role="dialog" aria-labelledby="label2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="label2">Reservation Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="show-details table table-bordered">
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
            </div>
        </div>
    </div>
</div> 

<!-- Modal -->
<div class="modal fade" id="proofOfPaymentModal" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="label1">Upload Proof Of Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-proof-upload" id="form-register" method="post">
                    <div class="form-label-group">
                        <label for="username">Code</label>
                        <input type="text" id="code" name="code" class="form-control" placeholder="Enter Code" required autofocus>
                    </div>
                    <div class="form-label-group mb-5">
                        <label for="username">File</label>
                        <input type="file" id="file" name="file" class="form-control">
                    </div>
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div> 


<!-- Modal -->
<div class="modal fade" id="uploadedFileProof" tabindex="-1" role="dialog" aria-labelledby="label3" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="label3">Uploaded Proof Of Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <h2>Upload File Here</h2>
            </div>
        </div>
    </div>
</div> 