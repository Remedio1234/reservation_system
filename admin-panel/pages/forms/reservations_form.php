        <?php 
        function status ($status) {
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
      <h5 class="text-left mb-1"><strong>Customer Details</strong></h5>
         <div class="row mb-3">
            <div class="col-sm-8">
            
               <h6 class="mb-3">Name: <?php echo $row->fullname; ?></h6>
               <h6 class="mb-3">Email: <?php echo $row->email_address; ?></h6>
               <h6 class="mb-3">Contact: <?php echo ($row->contact) ? $row->contact : 'NA'; ?></h6>
               <h6 class="mb-3">Address: <?php echo ($row->address) ? $row->address : 'NA'; ?></h6>
            </div>
            <div class="col-sm-3">
            <h6 class="mt-5">Status: <span id="txtstatus"><?php echo status($row->status); ?></span></h6>
            </div>
           
         </div>
         <h5 class="text-left mb-1"><strong>Reservation Details</strong></h5>
         <div class="table-responsive-sm">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Venue Name</th>
                     <th>Event Name</th>
                     <th>Caterer</th>
                     <th>Date Start</th>
                     <th>Date End</th>
                     <th>Date Applied</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td class="center"><?php echo $row->name; ?></td>
                     <td class="left strong"><?php echo $row->name; ?></td>
                     <td class="left"><?php echo ($row->caterers_name) ? $row->caterers_name : 'NA'; ?></td>
                     <td class="right"><?php echo $row->date_from; ?></td>
                     <td class="center"><?php echo $row->date_to; ?></td>
                     <td class="right"><?php echo $row->date_applied; ?></td>
                  </tr>
                 
               </tbody>
            </table>
         </div>
         <div class="row">
            <div class="col-lg-4 col-sm-5">
            </div>
            <div class="col-lg-6 col-sm-6 ml-auto">
                <table class="table table-clear">
                  <tbody>
                    <tr>
                        <td class="left">
                           <strong>Total Hours</strong>
                        </td>
                        <td class="right">
                            <strong><?php echo $row->total_hours; ?></strong>
                        </td>
                     </tr>
                     <tr>
                        <td class="left">
                           <strong>Subtotal</strong>
                        </td>
                        <td class="right">
                            <strong><?php echo number_format($row->sub_total, 2); ?></strong>
                        </td>
                     </tr>
                     <tr>
                        <td class="left">
                           <strong>Total</strong>
                        </td>
                        <td class="right">
                           <strong><?php echo number_format($row->total, 2); ?></strong>
                        </td>
                     </tr>
                     <tr>
                        <td class="left">
                            <input type="hidden" name="id" id="id" value="<?php echo $row->id; ?>">
                           <select class="form-control" name="status" id="status">
                                <?php
                                    $options = ['pending','approved','cancelled']
                                ?>
                                <?php for ($i=0; $i < count($options) ; $i++) {  ?>
                                   <option <?php echo ($row->status == $options[$i] ? 'selected' :''); ?> value="<?php echo $options[$i]; ?>">
                                    <?php 
                                    
                                        if($options[$i] != 'pending'){
                                            if($options[$i] == 'cancelled'){
                                                echo ucfirst(substr($options[$i], 0, -3));
                                            } else {
                                                echo ucfirst(substr($options[$i], 0, -1));
                                            }
                                        } else {
                                            echo ucfirst($options[$i]);
                                        }
                                    ?>
                                   </option>
                                <?php } ?>
                           </select>
                        </td>
                        <td class="right">
                           <button class="btn btn-success" id="btn_change_status">Change</button>
                        </td>
                     </tr>
                  </tbody>
              
            </div>
         </div>