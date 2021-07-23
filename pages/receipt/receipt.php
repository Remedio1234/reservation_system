    <?php
        if(!isset($_GET['reservation_id']))
            header("location:?v=home");
            $query = $data['conn']->query("SELECT * FROM tbl_reservations WHERE id  = '".@$_GET['reservation_id']."'");
            $row = $query->fetch(PDO::FETCH_OBJ);
        if(!$row) 
            header("location:?v=home");

        if (isset($_SESSION['customer']['isLoggedIn'])) {
            $profile = $data['conn']->query("SELECT * FROM tbl_customers WHERE id = '".$_SESSION['customer']['customer_id']."' ")->fetch(PDO::FETCH_ASSOC);    
        } else {
            $profile = $data['conn']->query("SELECT * FROM tbl_customers WHERE guest_id = '".@$_GET['guest_id']."' ")->fetch(PDO::FETCH_ASSOC);    
        }

         if(!isset($profile))
            header("location:?v=home");


        $details = $data['conn']->query("SELECT * FROM tbl_details WHERE reservation_id   = '".@$_GET['reservation_id']."'");  
        
    ?>
    <div class="container">
        <div class="card mt-5 my-5" id="printArea">
            <div class="card-header">
                Reservation ID:
                <strong><?php echo $row->reservation_id; ?> &nbsp; Date:  <em style="color:darkred;">
                <?php echo date('M d, Y, d H:i:s', strtotime($row->date_applied)); ?></em></strong> 
                <span class="float-right"> <strong>Status:</strong> <span class="text-warning">Pending</span> </span>
            </div>
            <div class="card-body">
                <h4 class="text-center"><strong>Reservation Details</strong></h4>
                <div class="row mb-4">
                    <div class="col-sm-8">
                        <h6 class="mb-3">Hello, <?php echo ucfirst(@$profile['fullname']); ?></h6>
                        <div>
                            <p> Thank you for making your reservation with us. </p>
                            <p>If you have any questions, please call us or use the contact page for further help!</p>
                        </div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
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
                        <tbody>
                        <?php $total = 0;  while ($detail = $details->fetch(PDO::FETCH_OBJ)) { $total += $detail->total_amount;  ?>
                            <tr>
                                <td><?php echo $detail->id ?></td>
                                <td><?php echo $detail->name ?></td>
                                <td><?php echo $detail->category ?></td>
                                <td><?php echo $detail->date_from ?></td>
                                <td><?php echo $detail->total_days ?></td>
                                <td><?php echo $detail->date_to ?></td>
                                <td><?php echo $detail->price ?></td>
                                <td><?php echo $detail->quantity ?></td>
                                <td><strong><?php echo number_format($detail->total_amount,2) ?></strong></td>
                            </tr>
                        <?php } ?> 
                        <tr>
                            <td colspan="7">&nbsp;</td>
                            <td><strong>Total</strong></td>
                            <td><strong><?php echo number_format($total,2); ?></strong></td>
                        </tr>
                        
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
        <div class="col-md-3 mt-2">
        <button class="btn btn-primary" onclick="printDiv('printArea');"><span class="fa fa-fw fa-print"></span> Print</button>
        </div>
    </div>
    <br>

    <script >
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;

        }
    </script>