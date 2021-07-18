<?php
    $query = $data['conn']->query("SELECT 
    res.reservation_id, 
    res.total_hours,
    res.sub_total,
    res.total,
    res.date_from,
    res.date_to,
    res.date_applied,
    ev.name,
    ven.name,
    cat.caterers_name 
    FROM tbl_reservations res 
    INNER JOIN tbl_amenities ven ON ven.amenities_id = res.amenities_id 
    INNER JOIN tbl_categories ev ON ev.category_id = res.category_id 
    LEFT JOIN tbl_caterers cat ON cat.caterers_id = res.caterers_id
    WHERE id = ".@$_GET['id']."
     ");
    $row = $query->fetch(PDO::FETCH_OBJ);
    if(!$row) header("location:?v=venues");
?>
<div class="container">
   <div class="card mt-5 my-5" id="printArea">
    
      <div class="card-header">
         Reservation ID:
         <strong><?php echo $row->reservation_id; ?></strong> 
         <span class="float-right"> <strong>Status:</strong> <span class="text-warning">Pending</span> </span>
      </div>
      <div class="card-body">
      <h4 class="text-center"><strong>Reservation Details</strong></h4>
         <div class="row mb-4">
            <div class="col-sm-8">
               <h6 class="mb-3">Hello, <?php echo ucfirst(@$_SESSION['customer']['username']); ?></h6>
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
            <div class="col-lg-4 col-sm-5 ml-auto">
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
                            <strong><?php echo number_format($row->sub_total,2); ?></strong>
                        </td>
                     </tr>
                     <tr>
                        <td class="left">
                           <strong>Total</strong>
                        </td>
                        <td class="right">
                           <strong><?php echo number_format($row->total,2); ?></strong>
                        </td>
                     </tr>
                  </tbody>
               </table>
              
            </div>
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