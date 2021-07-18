<script>
      $(document).ready(function() {

        var ClassAccount = function() {}
            ClassAccount.prototype = {
                login: function(Logindata) {
                    this.Logindata = Logindata,
                        $.ajax({
                            type: "POST",
                             url: "<?php echo WEB_ROOT . 'account/login.php' ?>",
                            dataType: "json",
                            data: this.Logindata,
                            cache: false,
                            success: function(data) {
                                if (data.response == "success") {
                                   window.location.href = "<?php echo WEB_ROOT; ?>/?v=dashboard";
                                } else {
                                    $("#loginModalError").find('.modal-body').html(data.message);
                                    $("#loginModalError").modal('show');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log("Error : " + xhr.status)
                            }
                        });
                    return false;
                },
                register : function(formData) {
                    this.formData = formData,
                        $.ajax({
                            type: "POST",
                            url: "<?php echo WEB_ROOT . 'account/register.php' ?>",
                            dataType: "json",
                            data: this.formData,
                            cache: false,
                            success: function(data) {
                                if (data.response == "success") {
                                    $("form[id='form-register']").trigger("reset");
                                    $("#registerErrorModal").find('.modal-body').html(data.message);
                                    $("#registerErrorModal").modal('show');
                                    setTimeout(() => {
                                        window.location.href = window.location.href
                                    }, 1000);
                                } else if(data.response == 'exist'){
                                    $("#registerErrorModal").find('.modal-body').html(data.message);
                                    $("#registerErrorModal").modal('show');
                                } else {
                                    $("#registerErrorModal").modal('show');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log("Error : " + xhr.status)
                            }
                        });
                    return false;
                }
            }

        $(document).on("submit", "form[id='form-register']", function(e) {
            e.preventDefault();
            var register = $(this).serialize();
            var Account = new ClassAccount();
            Account.register(register);
            return false;

        });

        $(document).on("submit", "form[id='form-login']", function(e) {
            e.preventDefault();
            var register = $(this).serialize();
            var Account = new ClassAccount();
            Account.login(register);
            return false;

        });
});
  </script>