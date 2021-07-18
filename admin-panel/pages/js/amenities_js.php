<script>
    $(document).ready(function(){
        $("#dataTable").DataTable( {
                "order": [[ 0, "desc" ]]
            } );

        $(document).on('click', "#showModal", function(e){
            $.post("<?php echo WEB_ROOT.'admin-panel/execute/loadforms.php'; ?>", {form:'amenities'}, function(data){
                $("#formModal").find(".modal-title").text("Add Amenity");
                $("#formModal").find(".modal-body").html(data);    
                $("#formModal").modal('show');
                $("#formModal").find("#btnAction").text("Submit");
            },'html');
            e.preventDefault();
        });

        $(document).on('click', "#editModal", function(e){
            $.post("<?php echo WEB_ROOT.'admin-panel/execute/loadforms.php'; ?>", {form:'amenities', amenities_id : $(this).attr('data-id')}, function(data){
                $("#formModal").find(".modal-title").text("Update Amenity");
                $("#formModal").find(".modal-body").html(data);    
                $("#formModal").modal('show');
                $("#formModal").find("#btnAction").text("Update");
            },'html');
            e.preventDefault();
        });

        $(document).on('click', "#uploadMultiplePhotos", function(e){
            $.post("<?php echo WEB_ROOT . 'admin-panel/execute/loadforms.php'; ?>", {form:'amenities_upload', amenities_id : "<?php echo @$_GET['id']; ?>" }, function(data){
                $("#formModal").find(".modal-title").text("Upload Photos");
                $("#formModal").find(".modal-body").html(data);    
                $("#formModal").modal('show');
                $("#formModal").find("#btnAction").text("Upload");
            },'html');
            e.preventDefault();
        });

        $(document).on("submit", "#FormAction", function(e){
            e.preventDefault();
            if(confirm("Do you want to submit this data?")) {
                $.ajax({
                    type : "POST",
                    url : "<?php echo WEB_ROOT.'admin-panel/execute/saveData.php'; ?>",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType : 'json',
                    beforeSend : function() {
                        $("#formModal").find("#btnAction").text("Saving..");
                    },
                    success : function(data) {
                        if(data.response == 'success'){
                            alert(data.message);
                            window.location.reload(true);
                        } else {
                            $("#formModal").find("#btnAction").text("Submit");
                            alert(data.message);
                            return false;
                        }
                    },
                    error: function(xhr, ErrorStatus, error) {
                        console.log(status.error);
                    }
                });
            }

        });

        $(document).on("submit", "#FormActionGallery", function(e){
            e.preventDefault();
            if(confirm("Do you want to submit this data?")) {
                $.ajax({
                    type : "POST",
                    url : "<?php echo WEB_ROOT . 'admin-panel/execute/saveData.php'; ?>",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType : 'json',
                    beforeSend : function() {
                        $("#formModal").find("#btnAction").text("Uploading..");
                    },
                    success : function(data) {
                        if(data.response == 'success'){
                            alert(data.message);
                            window.location.reload(true);
                        } else {
                            $("#formModal").find("#btnAction").text("Upload");
                            alert(data.message);
                            return false;
                        }
                    },
                    error: function(xhr, ErrorStatus, error) {
                        console.log(status.error);
                    }
                });
            }

        });

        $(document).on('click', '#delete_gallery', function(e){
            e.preventDefault();
            var btn = $(this);
            $.post("<?php echo WEB_ROOT . 'admin-panel/execute/deleteData.php'; ?>",{action:'gallery', gallery_id:$(this).attr('data-id')}, function(data){
                if(data.response == "success"){
                    btn.parent().parent().fadeOut();
                }
            },'json');
        });

        $(document).on('click', '#deleteData', function(e){
            e.preventDefault();
            if(confirm("Delete this record?")){
                var amenities_id = $(this).attr('data-id');
                var action    = 'amenities';
                var params = {
                    amenities_id : amenities_id,
                    action : action
                }
                $.post("<?php echo WEB_ROOT.'admin-panel/execute/deleteData.php'; ?>", params, function(data) {
                    if(data.response == "success"){
                        alert(data.message);
                        window.location.reload(true);
                    }
                }, "json") ;
            }
        });

    });
</script>