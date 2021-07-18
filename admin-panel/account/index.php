<?php
    require_once('../../library/config.php');
    require_once('../../api/user.api.php');
?>
<?php $db->userAlreadyLogin(@$_SESSION['user']['isLoggedIn']); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Login  - <?php echo $site_title; ?></title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo WEB_ROOT . 'admin-panel/assets/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo WEB_ROOT . 'admin-panel/assets/vendor/font-awesome/css/font-awesome.min.css'?>" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo WEB_ROOT . 'admin-panel/assets/css/sb-admin.css'?>" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container">
    <div id="login-error"></div>    
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"> <strong>Admin Login</strong>   </div>
      <div class="card-body">
        <form id="form-login" method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required autofocus placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password"class="form-control" id="password" name="password" required placeholder="Enter password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
            <button type="submit" class="btn btn-success btn-block btn-lg">Login</button>
        </form>
      </div>
    </div>
  </div>

   <!-- Logout Modal-->
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
              Invalid credentials.Please try again.!
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo WEB_ROOT . 'admin-panel/assets/vendor/jquery/jquery.min.js'?>"></script>
  <script src="<?php echo WEB_ROOT . 'admin-panel/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo WEB_ROOT . 'admin-panel/assets/vendor/jquery-easing/jquery.easing.min.js'?>"></script>
  <script>
      $(document).ready(function() {

var ClassLogin = function() {}
    ClassLogin.prototype = {
        account: function(Logindata) {
            this.Logindata = Logindata,
                $.ajax({
                    type: "POST",
                    url: "<?php echo WEB_ROOT . 'admin-panel/account/check_account.php'?>",
                    dataType: "json",
                    data: this.Logindata,
                    cache: false,
                    success: function(data) {
                        if (data.response == "success") {
                            $("body").fadeOut("fast");
                            window.location.href = "<?php echo WEB_ROOT; ?>admin-panel/?v=dashboard";
                        } else {
                            $("#loginModalError").modal('show');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Error : " + xhr.status)
                    }
                });
            return false;
        }
    }

    $(document).on("submit", "form[id='form-login']", function(e) {
        e.preventDefault();
        var Logindata = $(this).serialize();
        var Login = new ClassLogin();
        Login.account(Logindata);
        return false;

    });
});
  </script>
</body>

</html>
