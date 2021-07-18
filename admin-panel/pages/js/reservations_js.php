<script>
    $(document).ready(function(){

        $("#dataTable").DataTable( {
                "order": [[ 0, "desc" ]]
        } );

        $(document).on('click', "#showDetails", function(e){
            
            var resId = $(this).attr('data-resid');
            var id    = $(this).attr('data-id');

            $.post("<?php echo WEB_ROOT.'admin-panel/execute/loadforms.php'; ?>", {form:'reservations', id : id }, function(data){
                $("#formModal").find(".modal-title").text("Reservation ID - " + resId);
                $("#formModal").find(".modal-body").html(data);    
                $("#formModal").modal('show');
            },'html');
            e.preventDefault();
        });

        $(document).on('click', '#deleteData', function(e){
            e.preventDefault();
            if(confirm("Delete this record?")){
                var id = $(this).attr('data-id');
                var action    = 'reservations';
                var params = {
                    id : id,
                    action : action
                }
                $.post("<?php echo WEB_ROOT . 'admin-panel/execute/deleteData.php'; ?>", params, function(data) {
                    if(data.response == "success"){
                        alert(data.message);
                        window.location.reload(true);
                    }
                }, "json") ;
            }
        });

        $(document).on('click', '#close_modal', function(){
            window.location.reload(true);
        });

        function status(status) {
            switch (status) {
                case 'pending':
                    return '<span class="text-warning">Pending</span>';
                    break;
                case 'approved':
                    return '<span class="text-success">Approved</span>';
                default:
                    return '<span class="text-danger">Cancelled</span>';
                    break;
            }
        }

        $(document).on('click', '#btn_change_status', function(e){
            e.preventDefault();

            var params = { 
                id: $("#id").val(),
                status: $("#status").val(),
                action : 'reservations'
            }

            $.post("<?php echo WEB_ROOT . 'admin-panel/execute/saveData.php'; ?>", params , function(data){
                if(data.response == "success"){
                    $("#message").text(data.message);
                    $("#txtstatus").html(status($("#status").val()));
                }
            },"json");
        });

       
    });
</script>