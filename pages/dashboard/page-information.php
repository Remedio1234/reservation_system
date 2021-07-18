<div class="container">

      <div class="row my-5">

       <?php include_once('pages/dashboard/menu.php'); ?>

        <div class="col-lg-9" style="margin-bottom:5em;">

        
          <div class="card card-outline-secondary">
            <div class="card-header">
              Personal Details
            </div>
            <div class="card-body" style="padding-top:0em;">
             <?php include_once('pages/dashboard/profile.php'); ?>
                <hr>
              <div class="row">
               
                <div class="col-md-12 order-md-1">
                
                  <form class="needs-validation" novalidate="" id="formInformation">
                  
                    <input type="hidden" name="action" id="action" value="information">
                    <div class="mb-3">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" value="<?php echo $row['username']; ?>" id="username" name="username" placeholder="Enter Username" required>
                    </div>

                     <div class="mb-3">
                      <label for="fullname">Fullname</label>
                      <input type="text" class="form-control" value="<?php echo $row['fullname']; ?>" id="fullname" name="fullname" placeholder="Enter Fullname" required>
                    </div>

                    <div class="mb-3">
                      <label for="email">Email Address</label>
                      <input type="email" class="form-control" value="<?php echo $row['email_address']; ?>" id="email_address" name="email_address" placeholder="Enter Email" required>
                    </div>

                    <div class="mb-3">
                      <label for="contact">Contact No.</label>
                      <input type="text" class="form-control" value="<?php echo $row['contact']; ?>" id="contact" name="contact" placeholder="Enter Contact" required>
                    </div>

                    <div class="mb-3">
                      <label for="addrress">Address</label>
                      <textarea name="address" id="address" value="<?php echo $row['address']; ?>" rows="3" placeholder="Enter Address" class="form-control"><?php echo $row['address']; ?></textarea>
                    </div>

                    <hr class="mb-4">

                   
                    <button class="btn btn-primary btn-lg float-right" type="submit">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>