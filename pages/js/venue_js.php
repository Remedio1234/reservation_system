<script>
    $(document).ready(function() {
    
        var $imageSrc;  
        $('.gallery a').click(function(e) {
            e.preventDefault();
            
            $imageSrc = $(this).data('bigimage');
        });

        $('#galleryModal').on('shown.bs.modal', function (e) {
             e.preventDefault();
            $("#image").attr('src', $imageSrc  ); 
        })
    
        $('#galleryModal').on('hidden.bs.modal', function (e) {
             e.preventDefault();
            $("#image").attr('src',''); 
        }); 

        $("#btn_reserve").on('click', function(e) {
             e.preventDefault();
            $("#reservationWrapper").toggle( "slow" );

        });

        $('#dateFrom').dateTimePicker();
        $('#dateTo').dateTimePicker();

        $(document).on('change', '#caterers', function(e){
            e.preventDefault();
            
            $("#btn_reserve_continue").addClass("disabled");   
            $("#btn_reserve_check").removeClass("disabled");

            var c = $(this).find('option:selected').attr('data-price');

            var dateFrom = $("#txtDateFrom").val();
            var dateTo   = $("#txtDateTo").val();

            var hours    = (new Date(dateTo) - new Date(dateFrom) ) / 1000 / 60 / 60;
            
            var per_hour = $("#per_hour").val() * (isNaN(hours) ? 0 : parseInt(hours));

            var a = parseInt(c) + parseInt(per_hour);
            
            $('#txtsubtotal').text(parseFloat(c).toFixed(2));
            $('#inputsubtotal').val(c)

            $('#txttotal').text(parseFloat(a).toFixed(2));
            $('#inputtotal').val(a);
        });

        $(document).on('click', '.dpt_modal-button', function(e){
            e.preventDefault();

            $("#continue").val(0); 

            $("#btn_reserve_continue").addClass("disabled");   
            $("#btn_reserve_check").removeClass("disabled");

            var dateFrom = $("#txtDateFrom").val();
            var dateTo   = $("#txtDateTo").val();

            var hours    = (new Date(dateTo) - new Date(dateFrom) ) / 1000 / 60 / 60;

            if($("#txtDateFrom").val() != "" && $("#txtDateTo").val() != ""){

                 $("#txthours").text(parseFloat(hours).toFixed(0));
                 $("#inputhours").val(parseFloat(hours).toFixed(0));

                 var total_hours = parseInt(hours) * parseInt($("#txthourprice").text());
                 var sub_total    = $("#inputsubtotal").val();

                 var total = parseInt(total_hours) + parseInt(sub_total);
                $("#txttotal").text(parseFloat(total).toFixed(2));
                $("#inputtotal").val(total);

            }

        });

        $(document).on('submit', '#FormReservation', function(e){
            e.preventDefault();
            if($("#txtDateFrom").val() != "" && $("#txtDateTo").val() != ""){
                
                if($("#txthours").text() <= 0){
                    alert("Invalid hours");
                    return;
                }

                $.post("<?php echo WEB_ROOT . 'execute/controller.php' ?>", $(this).serialize(), function(data) {
                    console.log(data);
                   
                    if(data.response == "error"){
                        $("#LoginModal").modal("show");
                    } else if(data.response == "continue"){
                        $("#continue").val(1); 
                        $("#btn_reserve_check").addClass("disabled");   
                        $("#btn_reserve_continue").removeClass("disabled");
                        $("#error_msg").text("Date available").css("color", "green");
                    } else if(data.response == "success"){
                        $("#error_msg").text("Reservation saved.").css("color", "green");
                        window.location.href = "?v=receipt&id="+data.id;
                    }else {
                        $("#error_msg").text(data.message).css("color","red");
                    }

                 },"json");

            } else {
                alert("Please Select date");
            }
            return false;
        });
        
    
    });

</script>

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
                                    $("#LoginModal").modal("hide");
                                    $("#continue").val(1); 
                                    $("#btn_reserve_check").addClass("disabled");   
                                    $("#btn_reserve_continue").removeClass("disabled");
                                    
                                    var customer = '';
                                        customer += '<li class="nav-item dropdown">';
                                        customer += '<a class="nav-link dropdown-toggle" href="' + "<?php echo WEB_ROOT; ?>" + '" id="account" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>';
                                        customer += '<div class="dropdown-menu" aria-labelledby="account">';
                                        customer += '<a class="dropdown-item" href="javascript:void(0);">Hello,'+"<?php echo ucfirst(@$_SESSION['customer']['username']); ?>"+'!</a>';
                                        customer += '<div class="dropdown-divider"></div>';
                                        customer += '<a class="dropdown-item" href="' + <?php echo WEB_ROOT ?> + '"?v=dashboard">View Dasboard</a>';
                                        customer += '<div class="dropdown-divider"></div>';
                                        customer += '<a class="dropdown-item text-danger" href="' + "<?php echo WEB_ROOT. 'account/logout.php'?>" + '">Logout</a>';
                                        customer += '</div>';
                                        customer += '</li>';

                                    
                                    $("#head-menu").html("").append(customer);
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
                }
            }

   

        $(document).on("submit", "form[id='form-login']", function(e) {
            e.preventDefault();
            var register = $(this).serialize();
            var Account = new ClassAccount();
            Account.login(register);
            return false;

        });
});
  </script>