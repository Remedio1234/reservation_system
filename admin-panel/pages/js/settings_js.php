<script>
    $(document).ready(function(){
       

        $(document).on('click', "#editProfile", function(e){
            $.post("<?php echo WEB_ROOT.'admin-panel/execute/loadforms.php'; ?>", {form:'profile'}, function(data){
                $("#formModal").find(".modal-title").text("Company Profile");
                $("#formModal").find(".modal-body").html(data);    
                $("#formModal").modal('show');
                $("#formModal").find("#btnAction").text("Update");
            },'html');
            e.preventDefault();
        });

         $(document).on('click', "#editAccount", function(e){
            $.post("<?php echo WEB_ROOT . 'admin-panel/execute/loadforms.php'; ?>", {form:'account'}, function(data){
                $("#formModal").find(".modal-title").text("User Profile");
                $("#formModal").find(".modal-body").html(data);    
                $("#formModal").modal('show');
                $("#formModal").find("#btnAction").text("Update");
            },'html');
            e.preventDefault();
        });

        $(document).on("submit", "#FormActionUser", function(e){
            e.preventDefault();
            if($("#password").val() != $("#confirm_password").val()) {
                alert('Password mismatch.Please check and try again.!');
                $("#password").focus();
                return false;
            }
            if(confirm("Do you want to submit this data?")) {
                $.ajax({
                    type : "POST",
                    url : "<?php echo WEB_ROOT . 'admin-panel/execute/saveData.php'; ?>",
                    data : $(this).serialize(),
                    dataType : 'json',
                    beforeSend : function() {
                        $("#formModal").find("#btnAction").text("Updating..");
                    },
                    success : function(data) {
                        if(data.response == 'success'){
                            alert(data.message);
                            window.location.reload(true);
                        } else {
                            $("#formModal").find("#btnAction").text("Update");
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

        $(document).on("submit", "#FormActionProfile", function(e){
            e.preventDefault();
            if(confirm("Do you want to update?")) {
                $.ajax({
                    type : "POST",
                    url : "<?php echo WEB_ROOT.'admin-panel/execute/saveData.php'; ?>",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType : 'json',
                    beforeSend : function() {
                        $("#formModal").find("#btnAction").text("Updating..");
                    },
                    success : function(data) {
                        if(data.response == 'success'){
                            alert(data.message);
                            $("#formModal").find("#btnAction").text("Update");
                            if(data.row != ''){
                                $("#profile_id").val(data.row.profile_id);
                            }
                            console.log(data);
                            return false;
                        } 
                    },
                    error: function(xhr, ErrorStatus, error) {
                        console.log(status.error);
                    }
                });
            }
        });
    });
</script>