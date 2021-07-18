
<div class="container">

      <div class="row my-5">

       <?php include_once('pages/dashboard/menu.php'); ?>

        <div class="col-lg-9" style="margin-bottom:5em;">

        
          <div class="card card-outline-secondary">
            <div class="card-header">
              Dashboard [Reservations]
            </div>
            <div class="card-body" style="padding-top:0em;">
             <?php include_once('pages/dashboard/profile.php'); ?>
            <hr>
            
              <div class="card-deck mb-3 text-center">
                <div class="card mb-4 box-shadow">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Pending</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title">
                      <?php echo $data['conn']->query("SELECT COUNT(*) AS pending FROM tbl_reservations WHERE status = 'pending' AND customer_id = '". @$_SESSION['customer']['customer_id'] ."' ")->fetch(PDO::FETCH_OBJ)->pending; ?> 
                    </h1>
                   
                  </div>
                </div>
                <div class="card mb-4 box-shadow">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Approved</h4>
                  </div>
                  <div class="card-body">
                   <h1 class="card-title pricing-card-title">
                      <?php echo $data['conn']->query("SELECT COUNT(*) AS approved FROM tbl_reservations WHERE status = 'approved' AND customer_id = '" . @$_SESSION['customer']['customer_id'] . "' ")->fetch(PDO::FETCH_OBJ)->approved; ?> 
                    </h1>
                    
                  </div>
                </div>
                <div class="card mb-4 box-shadow">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Cancelled</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title">
                      <?php echo $data['conn']->query("SELECT COUNT(*) AS cancelled FROM tbl_reservations WHERE status = 'cancelled' AND customer_id = '" . @$_SESSION['customer']['customer_id'] . "' ")->fetch(PDO::FETCH_OBJ)->cancelled; ?> 
                    </h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>