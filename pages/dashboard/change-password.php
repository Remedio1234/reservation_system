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
                
                  <form class="needs-validation" novalidate="" id="formAccount">
                  
                    <input type="hidden" name="action" id="action" value="account">
                    <div class="mb-3">
                      <label for="username">Password</label>
                      <input type="password" class="form-control"  id="password" name="password" placeholder="Enter Password" required>
                    </div>

                     <div class="mb-3">
                      <label for="fullname">Confirm Password</label>
                      <input type="password" class="form-control"  id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
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