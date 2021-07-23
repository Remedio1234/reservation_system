    
    <!-- Modal -->
    <div class="modal fade" id="guest_modal" tabindex="-1" role="dialog" aria-labelledby="guest" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="guest">Guest Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-signin" id="form-guest-submit" method="post">
                    <div class="modal-body">
                        
                        <div class="form-label-group">
                            <label for="username">FullName</label>
                            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter Fullname" required autofocus>
                        </div>

                        <div class="form-label-group">
                            <label for="email_address">Email address</label>
                            <input type="email" id="email_address" name="email_address" class="form-control" placeholder="Email address" required >
                        </div>

                        <div class="form-label-group">
                            <label for="contact">Mobile No</label>
                            <input type="number" id="contact" name="contact" class="form-control" placeholder="Ex.0932xxxxxx" required >
                        </div>

                        <div class="form-label-group">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" class="form-control" placeholder="Address" required ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btn_guest_submit">Submit</button>
                    </div>
                  </form>
            </div>
        </div>
    </div> 

    <footer class="footer bg-dark text-white">
        <!-- Footer Links -->
        <div class="container pt-5 pb-2">
            <div class="row">

                <div class="col-md-3 col-lg-4 col-xl-3">
                    <h4>DONEL BEACH RESORT </h4>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <p>
                    The Widest Shoreline in Tukuran
                    </p>
                </div>

              
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                    <h4>Supports</h4>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <p><a href="<?php echo WEB_ROOT ?>?v=home" class="text-white">Home</a></p>
                    <p><a href="<?php echo WEB_ROOT ?>?v=home" class="text-white">About Us</a></p>
                    <p><a href="<?php echo WEB_ROOT ?>?v=services" class="text-white">Services</a></p>
                    <p><a href="<?php echo WEB_ROOT ?>?v=contact-us" class="text-white">Contact</a></p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3">
                    <h4>Contact</h4>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <p><i class="fa fa-home mr-3"></i> Tukuran, Zamboanga del Sur</p>
                    <p><i class="fa fa-envelope mr-3"></i> info@donelbeach.com</p>
                    <p><i class="fa fa-phone mr-3"></i> +63 945 857 3915</p>
                    <p><i class="fa fa-phone mr-3"></i> +63 104 763 043</p>
                </div>

            </div>
        </div>
        <!-- Footer Links-->

        <hr class="bg-white mx-4 mt-2 mb-1">

        <!-- Copyright-->
        <div class="container-fluid">
            <p class="text-center m-0 py-1">
                Copyright &copy; <?php echo @$data['site_title']; ?> <?php echo date('Y'); ?>
            </p>
        </div>
        <!-- Copyright -->

    </footer>

   <!-- Bootstrap core JavaScript -->
   <?php if(isset($data['css'])) : ?>
        <?php foreach ($data['js'] as $key => $js) { ?>
        <script src="assets/<?php echo $js; ?>"></script>
        <?php } ?>
    <?php endif; ?>

    <script>
        $(document).ready(function(){
            // ************************************************
            // Shopping Cart API
            // ************************************************

            var shoppingCart = (function() {
                // =============================
                // Private methods and propeties
                // =============================
                cart = [];
                
                // Constructor
                function Item(id, name, category, date_from, date_to, price, days, quantity, total) {
                    this.id         = id;
                    this.name       = name;
                    this.category   = category;
                    this.date_from  = date_from;
                    this.date_to    = date_to;
                    this.price      = price;
                    this.days       = days;
                    this.quantity   = quantity;
                    this.total      = total;
                }
                
                // Save cart
                function saveCart() {
                    sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
                    loadCart();
                    $('.total-count').html(shoppingCart.totalCount());
                }
                
                    // Load cart
                function loadCart() {
                    cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
                }
                if (sessionStorage.getItem("shoppingCart") != null) {
                    loadCart();
                }
                

                // =============================
                // Public methods and propeties
                // =============================
                var obj = {};
                
                // Add to cart
                obj.addItemToCart = function(id, name, category, date_from, date_to, price, days, quantity, total) {
                    for(var item in cart) {
                        if(cart[item].id == id && cart[item].date_from == date_from && cart[item].date_to == date_to){
                            toastr.error('Amenity Already added','Message', {
                                positionClass:'toast-bottom-right',
                            })
                            return;
                        }
                    }
                    var item = new Item(id, name, category, date_from, date_to, price, days, quantity, total);
                    cart.push(item);
                    saveCart();
                    $("#reservationModal").modal('hide')
                }
                // Remove all items from cart 
                obj.removeItemFromCartAll = function(id) {
                    for(var item in cart) {
                        if(cart[item].id == id) {
                            cart.splice(item, 1);
                            break;
                        }
                    }
                    saveCart();
                }
                // Count cart 
                obj.totalCount = function() {
                    return cart.length
                }

                // Total cart
                obj.totalCart = function() {
                    var totalCart = 0;
                    for(var item in cart) {
                        totalCart += parseFloat(cart[item].total);
                    }
                    return parseFloat(totalCart).toFixed(2);
                }

                // Clear cart
                obj.clearCart = function() {
                    cart = [];
                    saveCart();
                }

                // List cart
                obj.listCart = function() {
                    var cartCopy = [];
                    for(i in cart) {
                        item = cart[i];
                        itemCopy = {};
                        for(p in item) {
                            itemCopy[p] = item[p];
                        }
                        cartCopy.push(itemCopy)
                    }
                    return cartCopy;
                }
                return obj;
            })();

            $('.total-count').html(shoppingCart.totalCount());

            displayCart()

            function displayCart() {
                var cartArray = shoppingCart.listCart();
                var output = "";
                for(var i in cartArray) {
                    output += `
                        <tr>
                            <td>${cartArray[i].id}</td>
                            <td>${cartArray[i].name}</td>
                            <td>${cartArray[i].category}</td>
                            <td>${cartArray[i].date_from}</td>
                            <td>${cartArray[i].date_to}</td>
                            <td>${cartArray[i].days}</td>
                            <td>${parseFloat(cartArray[i].price).toFixed(2)}</td>
                            <td>${(cartArray[i].quantity == 0 ? 1 : cartArray[i].quantity)}</td>
                            <td>${parseFloat(cartArray[i].total).toFixed(2)}</td>
                            <td><button class='delete-item btn btn-danger btn-sm' data-id="${cartArray[i].id}">X</button></td>
                        </tr>
                    `
                }
                output +=  `
                    <tr>
                        <td colspan='7'>&nbsp;</td>
                        <td><strong>Total:</strong></td>
                        <td><strong>${shoppingCart.totalCart()}</strong></td>
                        <td>&nbsp;</td>
                    </tr>
                `
                $('.show-cart').find('tbody').html(output);
            }

            $('.show-cart').on("click", ".delete-item", function(event) {
                var id = $(this).data('id')
                shoppingCart.removeItemFromCartAll(id);
                displayCart();
            })

            $(document).on('submit', '#form-reservation', function(e){
                e.preventDefault()
                var id              = $("#input_amenity_id").val()  
                var category        = $("#input_category").val()
                var name            = $("#input_name").val()
                var date_from       = $("#input_date_from").val()
                var date_to         = $("#input_date_from").val()
                var price           = $("#input_price_per_day").val()
                var days            = $("#input_total_days").val()
                var quantity        = $("#input_quantity").val()
                var total           = $("#input_total_amount").val()

                // var name = $(this).data('name');
                // var price = Number($(this).data('price'));
                shoppingCart.addItemToCart(id, name, category, date_from, date_to, price, days, quantity, total);
            })

            $(document).on('click', '#guest_checkout', function(e){
                if(cart.length){
                    $("#guest_modal").modal({
                        backdrop: 'static',
                        keyboard: false
                    })
                }
            })

            function reservationData(guest){
                if(confirm("Are you sure?")) {
                    var fullname        = $("#fullname").val()
                    var email_address   = $("#email_address").val()
                    var contact         = $("#contact").val()
                    var address         = $("#fullname").val()
                    if(guest){
                        var info = {
                                fullname: fullname,
                                email_address: email_address,
                                contact:contact,
                                address: address
                            }
                    }
                    
                    $.ajax({
                        url: "execute/controller.php",
                        type: "post",
                        data: {
                            action:'reservation',
                            info:info, 
                            cart : cart
                        },
                        dataType: 'json',
                        success: function (data) {
                            if(data.response == 'success'){
                                shoppingCart.clearCart();
                                location.replace("?v=receipt&reservation_id="+data.reservation_id+'&guest_id='+data.guest_id)
                            } else {
                                location.reload();
                            }
                        // You will get response from your PHP page (what you echo or print)
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                }
            }

            $(document).on('submit', '#form-guest-submit', function(e){
                e.preventDefault()
                if(cart.length){
                    reservationData(1)
                }
            })

            $(document).on('click', '#user_checkout', function(e){
                e.preventDefault()
                if(cart.length){
                    reservationData(0)
                }
            })

            
            
        })
    </script>
    <?php if (isset($data['page'])) if (file_exists('pages/js/' . $data['page'] . '_js.php')) include('pages/js/' . $data['page'] . '_js.php'); ?>	

    <script type="text/javascript">
        $(document).ready(function () {
            //If image edit link is clicked
            $(".editLink").on('click', function(e){
                e.preventDefault();
                $("#fileInput:hidden").trigger('click');
            });

            //On select file to upload
            $("#fileInput").on('change', function(){
                var image = $('#fileInput').val();
                var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                
                //validate file type
                if(!img_ex.exec(image)){
                    alert('Please upload only .jpg/.jpeg/.png/.gif file.');
                    $('#fileInput').val('');
                    return false;
                }else{
                    $('.uploadProcess').show();
                    $('#uploadForm').hide();
                    $( "#picUploadForm" ).submit();
                }
            });
        });

        //After completion of image upload process
        function completeUpload(success, fileName) {
            if(success == 1){
                $('#imagePreview').attr("src", "");
                $('#imagePreview').attr("src", 'profile/'+fileName);
                $('#fileInput').attr("value", 'profile/'+fileName);
                $('.uploadProcess').hide();
            }else{
                $('.uploadProcess').hide();
                alert('There was an error during file upload!');
            }
            return true;
        }
        $(document).on('submit', '#formInformation', function(e){
            e.preventDefault();
            if(confirm("Submit Changes?")){
                $.post("<?php echo WEB_ROOT . 'execute/controller.php' ?>", $(this).serialize(), function(data){
                    if(data.response == "success"){
                        alert(data.message);
                        window.location.reload(true);
                    }
                },"json");
            }
        }); 

        $(document).on('submit', '#formAccount', function(e){
            e.preventDefault();
            var $password = $("#password").val();
            var $confirm  = $("#confirm_password").val();
            if($password != $confirm){
                alert("Mismatch password. Please check and try again.!");
                return;
            }
            if(confirm("Submit Changes?")){
                $.post("<?php echo WEB_ROOT . 'execute/controller.php' ?>", $(this).serialize(), function(data){
                    if(data.response == "success"){
                        alert(data.message);
                        window.location.reload(true);
                    }
                },"json");
            }
        }); 
</script>
</body>
</html>