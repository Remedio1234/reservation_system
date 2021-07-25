<div class="container">
    
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-top: 10em!important;margin-bottom: 20em;">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a 
                    class="nav-link active" 
                    id="pills-home-tab" 
                    data-toggle="pill" 
                    href="#pills-home" 
                    role="tab" 
                    aria-controls="pills-home" 
                    aria-selected="true">Login</a>
            </li>
            <li class="nav-item">
                <a 
                    class="nav-link" 
                    id="pills-profile-tab" 
                    data-toggle="pill" 
                    href="#pills-profile" 
                    role="tab"
                    aria-controls="pills-profile" 
                    aria-selected="false">Guest</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="card card-signin mt-5 mb-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Login To Tour Account</h5>
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
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="card card-signin mt-5 mb-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Login As Guest</h5>
                            <form class="form-signin" id="form-guest" method="post">
                                <div class="form-label-group">
                                    <label for="reservation_id">Reservation ID</label>
                                    <input type="text" id="reservation_id" name="reservation_id" class="form-control" placeholder="Reservation ID" required autofocus>
                                </div>
                                <div class="form-label-group">
                                    <label for="email_address">Email Address</label>
                                    <input type="email" id="email_address" name="email_address" class="form-control" placeholder="Email Address" required>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
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
{"mode":"full","isActive":false}