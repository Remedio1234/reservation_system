<div class="container">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-top:8em!important;margin-bottom:13em;">
        <div class="card card-signin mt-5 mb-5">
            <div class="card-body">
                <h5 class="card-title text-center">Register</h5>
                <form class="form-signin" id="form-register" method="post">
                    <div class="form-label-group">
                        <label for="username">FullName</label>
                        <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter Fullname" required autofocus>
                    </div>
                    <div class="form-label-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username"  autofocus>
                    </div>

                    <div class="form-label-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
                    </div>

                    <div class="form-label-group">
                        <label for="email_address">Email address</label>
                        <input type="email" id="email_address" name="email_address" class="form-control" placeholder="Email address" required >
                    </div>

                    <div class="form-label-group">
                        <label for="contact">Mobile No</label>
                        <input type="number" id="contact" name="contact" class="form-control" maxlength="11" placeholder="Ex.0932xxxxxx" required >
                    </div>

                    <div class="form-label-group">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" class="form-control" placeholder="Address" required ></textarea>
                    </div>


                <!-- <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" name="terms_and_condition" id="terms_and_condition" required>
                    <label class="custom-control-label" for="terms_and_condition">I accept <a href="javascript:void(0);">Terms and Condition</a> </label>
                </div> -->

                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Error Modal-->
<div class="modal fade" id="registerErrorModal" tabindex="-1" role="dialog" aria-labelledby="registerErrorModalLabel" aria-hidden="true">
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
        <!-- <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
        </div> -->
        </div>
    </div>
    </div>