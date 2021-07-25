<?php
    $query = $data['conn']->query("SELECT * FROM tbl_reservations WHERE reservation_id  = '".$_GET['reservation_id']."'");
    // $profile = $dbConn->query("SELECT * FROM tbl_profile ")->fetch(PDO::FETCH_ASSOC);
    // while ($row = $query->fetch(PDO::FETCH_OBJ)) {
    //     echo $row->id;
    // }
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
        <br/>
        <div class="card mt-5 my-5" id="printArea">
            <div class="card-body">
                <h4 class="text-center"><strong>Reservation</strong></h4>
                <div class="table-responsive-sm">
                <table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Reservation ID</th>
                            <th>Total</th>
                            <th>Reserved Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php
                        // $query = $data['conn']->query("SELECT * FROM tbl_reservations WHERE customer_id  = '". @$_SESSION['customer']['customer_id'] ."'");
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
                                    <?php if($row->status == 'pending') :?>
                                        <a href="javascript:void;" data-id="<?php echo $row->id ?>" class="proof_of_payment" title="Upload Payment Proof">
                                            <span class="fa fa-fw fa-upload"></span>
                                        </a>
                                    <?php endif ?>
                                    <a href="javascript:void;" data-id="<?php echo $row->id ?>" class="uploaded_proof" title="Uploaded File">
                                        <span class="fa fa-fw fa-file"></span>
                                    </a>
                                    
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

<!-- Modal -->
<div class="modal fade" id="reservationDetailsModal" tabindex="-1" role="dialog" aria-labelledby="label2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="label2">Details</h5>
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
                <form class="form-proof-upload" id="paymentProof" method="post"  enctype="multipart/form-data">
                <input type="hidden" id="reservation_id" name="reservation_id">
                    <div class="form-label-group mb-5">
                        <label for="username">Image File</label>
                        <input type="file" multiple autofocus required class="form-control" accept="image/*" name="images[]" id="images">
                    </div>
                    <button  type="submit" id="btnAction" class="btn btn-lg btn-primary btn-block text-uppercase">Upload</button>
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
                <div></div>
                <div class="row container" id="proof_files">
                    
                </div>
            </div>
        </div>
    </div>
</div> 