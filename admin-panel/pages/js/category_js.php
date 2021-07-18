<script>
    $(document).ready(function(){
        $("#dataTable").DataTable( {
                "order": [[ 0, "desc" ]]
            } );

        $(document).on('click', "#showModal", function(e){
            $.post("<?php echo WEB_ROOT.'admin-panel/execute/loadforms.php'; ?>", {form:'category'}, function(data){
                $("#formModal").find(".modal-title").text("Add Category");
                $("#formModal").find(".modal-body").html(data);    
                $("#formModal").modal('show');
                $("#formModal").find("#btnAction").text("Submit");
            },'html');
            e.preventDefault();
        });

        $(document).on('click', "#editModal", function(e){
            $.post("<?php echo WEB_ROOT.'admin-panel/execute/loadforms.php'; ?>", {form:'category', category_id : $(this).attr('data-id')}, function(data){
                $("#formModal").find(".modal-title").text("Update Category");
                $("#formModal").find(".modal-body").html(data);    
                $("#formModal").modal('show');
                $("#formModal").find("#btnAction").text("Update");
            },'html');
            e.preventDefault();
        });

        $(document).on('click', '#deleteData', function(e){
            e.preventDefault();
            if(confirm("Delete this record?")){
                var category_id = $(this).attr('data-id');
                var action    = 'category';
                var params = {
                    category_id : category_id,
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

        $(document).on("submit", "#FormAction", function(e){
            e.preventDefault();
            if(confirm("Do you want to submit this data?")) {
                $.ajax({
                    type : "POST",
                    url : "<?php echo WEB_ROOT.'admin-panel/execute/saveData.php'; ?>",
                    data : $(this).serialize(),
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
    });
</script>