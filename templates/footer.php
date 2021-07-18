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