<div class="container">

    <div class="my-5">
        
      <!-- Page Features -->
       <h3>Venue Locations</h3>
       <hr>
      <div class="row text-center">

       <?php
        if(isset($_POST['btn_submit_venue'])) :
            $where = "";
            if(isset($_POST['name']) && !empty($_POST['name'])) {
                $where .= " AND (name like '%" . $_POST['name'] . "%') ";
            }
            if (isset($_POST['venue_type']) && !empty($_POST['venue_type'])) {
                $where .= " AND (venue_type like '%" . $_POST['venue_type'] . "%') ";
            }

            if (isset($_POST['location']) && !empty($_POST['location'])) {
                $where .= " AND (location like '%" . $_POST['location'] . "%') ";
            }
            
            $query = $data['conn']->query("SELECT * FROM tbl_amenities WHERE status = 'av' ".$where." ORDER BY amenities_id DESC");
        else :
            $query = $data['conn']->query("SELECT * FROM tbl_amenities WHERE status = 'av' ORDER BY amenities_id DESC");
        endif;    

        if($query->rowCount() > 0) : 
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        ?>
       <?php
        $str = explode(' ',strtolower($row->name));
        $formatted = '?v=venue&url=' .  implode('-', $str); 
       ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" style="height:252px;" src="<?php echo WEB_ROOT . 'admin-panel/uploads/' . $row->photo; ?>" alt="">
            <div class="card-body text-left">
              <h5 class="card-title"><a href="<?php echo WEB_ROOT. $formatted; ?>"><?php echo ucfirst($row->name); ?></a></h5>
              <p class="card-text">
               <hr class="mt-0 mb-0">
                <h6>Location</h6>
                <p><?php echo ucfirst($row->location); ?></p>
                <hr class="mt-0 mb-0">
                <h6>Venue Type</h6>
                <p><?php echo ucfirst($row->venue_type); ?></p>
                <hr class="mt-0 mb-0">
                <h6>Capacity</h6>
                <p><?php echo $row->capacity; ?></p>
                <hr class="mt-0 mb-0">
                <h6>Pricing per Hour</h6>
                <p><?php echo number_format($row->amount_per_hour, 2); ?></p>
              </p>
            </div>
            <div class="card-footer">
              <a href="<?php echo WEB_ROOT . $formatted; ?>" class="btn btn-primary">View Full Details</a>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php else : ?>
            <div class="col-md-12">
                <div class="alert alert-secondary">
                    No records found..!
                </div>
            </div>
        <?php endif; ?>
       

      </div>
      <!-- /.row -->
    </div>

    </div>