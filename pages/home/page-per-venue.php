<?php
    $str = explode('-', strtolower($_GET['url']));
    $name = implode(' ', $str);
    $query = $data['conn']->query("SELECT * FROM tbl_amenities WHERE status = 'av' && name like '%". $name ."%' ORDER BY amenities_id DESC");
    $row = $query->fetch(PDO::FETCH_OBJ);
    if(!$row) header("location:?v=home");
?>
<div class="container my-5 mb-5">
      <!-- Page Features -->
       <div class="row">
            <div class="col-md-12">
                <div class="float-left">
                <h3><?php echo $row ->name; ?></h3>
                </div>
                <div class="float-right">
                   <a href="<?php echo WEB_ROOT. '?v=home'; ?>"> <span class="fa fa-fw fa-caret-left"></span>Back</a>
                </div>
            </div>
       </div>
       <!-- Nav tabs -->
        <hr>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" href="#profile" role="tab" data-toggle="tab">Overview</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active show" id="profile">
                <h5 class="mt-4">Details</h5>
                <p class="mb-0"><?php echo $row->details; ?></p>
                <h5 class="mt-0">Location</h5>
                <p class="mb-0"><?php echo $row->location; ?></p>
                <h5 class="mt-0">Capacity</h5>
                <p class="mb-0"><?php echo $row->capacity; ?></p>
                <h5 class="mt-0">Price per Hour</h5>
                <p class="mb-0"><?php echo number_format($row->amount_per_hour,2); ?></p>
            </div>
        </div>
        <!-- end tabs -->
        <div class="row ">
            <div class="col-md-8 mt-3">
                <div class="float-left">
                    <a class="btn btn-primary btn-lg mb-4" id="btn_reserve" href="javascript:void();" role="button">Reserve Now</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 jumbotron jumbotron-fluid" style="padding:1em;display:none;" id="reservationWrapper">
                <form id="FormReservation" name="FormReservation" method="post" >
                <input type="hidden" name="action" id="action" value="reservation">
                <input type="hidden" name="amenities_id" id="amenities_id" value="<?php echo $row->amenities_id; ?>">
                <input type="hidden" name="continue" id="continue" value="0">
                <input type="hidden" value="<?php echo $row->amount_per_hour; ?>" name="per_hour" id="per_hour">
                <div class="form-group">
                    <label for="message-text" class="control-label"><strong>Type of Events</strong></label>
                    <select class="form-control" name="events" id="events" required>
                        <option value="">Select Events..</option>
                        <?php
                        $query = $data['conn']->query("SELECT * FROM tbl_categories WHERE status = 'av' ORDER BY category_id DESC");
                        while ($event = $query->fetch(PDO::FETCH_OBJ)) {
                            ?>
                        <option value="<?php echo $event->category_id; ?>"><?php echo $event->name; ?></option>
                        <?php 
                    } ?>
                    </select>
                </div>
                 <div class="form-group">
                    <label for="message-text" class="control-label"><strong>Caterers</strong></label>
                    <select class="form-control" name="caterers" id="caterers" required>
                        <option value="">Select Caterer..</option>
                        <option data-price="0" value="0">None</option>
                        <?php
                        $query = $data['conn']->query("SELECT * FROM tbl_caterers WHERE status = 'av' ORDER BY caterers_id DESC");
                        while ($cat = $query->fetch(PDO::FETCH_OBJ)) {
                            ?>
                        <option data-price="<?php echo $cat->total_price; ?>" value="<?php echo $cat->caterers_id; ?>"><?php echo $cat->caterers_name; ?></option>
                        <?php 
                    } ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date-from-name" class="control-label"><strong>Date From</strong></label>
                            <div id="dateFrom"> </div>
                            <input type="hidden" id="txtDateFrom" name="txtDateFrom" value="" />
                        </div>      
                    </div>      
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date-to-name" class="control-label"><strong>Date To</strong></label>
                            <div id="dateTo"> </div>
                            <input type="hidden" id="txtDateTo" name="txtDateTo" value="" />
                        </div>       
                    </div>                
                </div>
                <div class="row">   
                    <div class="col-md-8">
                       
                    </div>
                    <div class="col-md-4">
                        <table class="table table-stripped" style="font-size: 20px;font-weight: bold;">
                            <tr>
                                <td align="right">Price per hour:</td>
                                <td>
                                    <span id="txthourprice"><?php echo number_format($row->amount_per_hour,2); ?></span>
                                </td>
                            </tr>

                            <tr>
                                <td align="right">Total. Hours:</td>
                                <td>
                                    <span id="txthours">0</span>
                                    <input type="hidden" id="inputhours" name="inputhours">
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="right">Sub Total:</td>
                                <td>
                                    <span id="txtsubtotal">0</span>
                                    <input type="hidden" id="inputsubtotal" name="inputsubtotal">
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="right">Total:</td>
                                <td>
                                    <span id="txttotal">0</span>
                                    <input type="hidden" id="inputtotal" name="inputtotal">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group float-left">
                            <p id="error_msg"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group float-right">
                            <button type="submit" class="btn btn-primary btn-lg  mt-2" id="btn_reserve_check" role="button">Check Availability</button>
                            <button type="submit" class="btn btn-primary btn-lg  mt-2 disabled" id="btn_reserve_continue" role="button">Continue</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
           
        </div>
  
        <h3>Gallery</h3>
        
        <div class="row text-center">

        <?php
            $gallery = $data['conn']->query("SELECT * FROM tbl_gallery where amenities_id = '" . $row->amenities_id . "' ORDER BY gallery_id DESC");
            if ($gallery->rowCount() > 0) : 
            while ($photos = $gallery->fetch(PDO::FETCH_OBJ)) {
            ?>

            <div class="col-lg-4 col-md-4 mb-3">
            <div class="card gallery">
                <a href="javascript:void(0);" data-target="#galleryModal" data-toggle="modal" data-bigimage="<?php echo WEB_ROOT . 'admin-panel/uploads/gallery/' . $photos->photos; ?>">
                    <img class="card-img-top"   style="height:300px;" src="<?php echo WEB_ROOT . 'admin-panel/uploads/gallery/' . $photos->photos; ?>">
                </a>
            </div>
            </div>
            <?php 
        } ?>
        <?php else : ?>
            <div class="col-md-12">
                <div class="alert alert-secondary">
                    No gallery's found..!
                </div>
            </div>
        <?php endif; ?>
       

      </div>
      <!-- /.row -->

    </div>
    

    
<!-- Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="ImageModal" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content modal-lg">
      <div class="modal-body">
        <img src="<?php echo WEB_ROOT. 'assets/images/tenor.gif'?>" id="image" class="img-fluid ml-2">
      </div>
    </div>
  </div>
</div> 

<!-- Modal -->
<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LoginModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-signin" id="form-login" method="post">
              <div class="form-label-group">
              <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                
              </div>

              <div class="form-label-group">
              <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
               
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="keep_signin">
                <label class="custom-control-label" for="keep_signin">Keep me signed in</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
            </form>
      </div>
    </div>
  </div>
</div>



    <!-- Error Modal-->
    <div class="modal fade" id="loginModalError" tabindex="-1" role="dialog" aria-labelledby="loginModalErrorLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Message</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
        
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>