<script>
    $(document).ready(function(){

        $("#dataTable").DataTable( {
                "order": [[ 0, "desc" ]]
        } );

        $(document).on('click', '#view_reservation_details', function(e){
            e.preventDefault();
            var reservation_id          = $(this).data('reservationid')
            var txt_status              = $(this).data('status')
            var reservation_id_hide     = $(this).data('id')
            $.ajax({
                url: "<?php echo WEB_ROOT?>" + "execute/controller.php",
                type: "post",
                data: {
                    action:'admin-details',
                    reservation_id:$(this).data('id')
                },
                dataType: 'json',
                success: function (status) {
                    if(status.response == 'success'){
                        $("#show_reservation").text(reservation_id)
                        var total = 0
                        var output = "";
                        var cartArray = []
                        cartArray = status.data
                        for(var i in cartArray) {
                            total += parseFloat(cartArray[i].total_amount)
                            output += `
                                <tr>
                                    <td>${cartArray[i].id}</td>
                                    <td>${cartArray[i].name}</td>
                                    <td>${cartArray[i].category}</td>
                                    <td>${cartArray[i].date_from}</td>
                                    <td>${cartArray[i].date_to}</td>
                                    <td>${cartArray[i].total_days}</td>
                                    <td>${parseFloat(cartArray[i].price).toFixed(2)}</td>
                                    <td>${(cartArray[i].quantity == 0 ? 1 : cartArray[i].quantity)}</td>
                                    <td>${parseFloat(cartArray[i].total_amount).toFixed(2)}</td>
                                </tr>
                            `
                        }
                        output +=  `
                            <tr>
                                <td colspan='7'>&nbsp;</td>
                                <td><strong>Total:</strong></td>
                                <td><strong>${parseFloat(total).toFixed(2)}</strong></td>
                            </tr>
                        `
                        
                        $('.show-details').find('tbody').html(output);

                        var proof = []
                        var disp  = ''
                        var path  = "<?php echo WEB_ROOT ?>"
                        proof = status.proof
                        for(var i in proof) {
                            disp += `
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <a href="${ path + '/proof/' + proof[i].file_proof }" target="_blank">
                                        <img src="${ path + '/proof/' + proof[i].file_proof }" alt="Lights" style="width:150px;height:150px;">
                                    </a>
                                </div>
                            </div>
                            `
                        }
                        $("#all_proof").show()
                        if(proof.length == 0)
                            $("#all_proof").hide()
                        $("#reservation_id_hide").val(reservation_id_hide)
                        $("#txt_status").val(txt_status)
                        $('#proof_files').html(disp);
                        $("#reservationDetailsModal").modal({
                            backdrop: 'static',
                            keyboard: false
                        })
                    }
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        })

        // $(document).on('click', "#showDetails", function(e){
            
        //     var resId = $(this).attr('data-resid');
        //     var id    = $(this).attr('data-id');

        //     $.post("<?php echo WEB_ROOT.'admin-panel/execute/loadforms.php'; ?>", {form:'reservations', id : id }, function(data){
        //         $("#formModal").find(".modal-title").text("Reservation ID - " + resId);
        //         $("#formModal").find(".modal-body").html(data);    
        //         $("#formModal").modal('show');
        //     },'html');
        //     e.preventDefault();
        // });

        // $(document).on('click', '#deleteData', function(e){
        //     e.preventDefault();
        //     if(confirm("Delete this record?")){
        //         var id = $(this).attr('data-id');
        //         var action    = 'reservations';
        //         var params = {
        //             id : id,
        //             action : action
        //         }
        //         $.post("<?php echo WEB_ROOT . 'admin-panel/execute/deleteData.php'; ?>", params, function(data) {
        //             if(data.response == "success"){
        //                 alert(data.message);
        //                 window.location.reload(true);
        //             }
        //         }, "json") ;
        //     }
        // });

        // $(document).on('click', '#close_modal', function(){
        //     window.location.reload(true);
        // });

        // function status(status) {
        //     switch (status) {
        //         case 'pending':
        //             return '<span class="text-warning">Pending</span>';
        //             break;
        //         case 'approved':
        //             return '<span class="text-success">Approved</span>';
        //         default:
        //             return '<span class="text-danger">Cancelled</span>';
        //             break;
        //     }
        // }

        $(document).on('click', '#reservation_status_confirm', function(e){
            e.preventDefault();

            if(confirm("Are you sure you want to submit this data?")){
                var params = { 
                    id      : $("#reservation_id_hide").val(),
                    status  : $("#txt_status").val(),
                    action  : 'reservations'
                }

                $.post("<?php echo WEB_ROOT . 'admin-panel/execute/saveData.php'; ?>", params , function(data){
                    if(data.response == "success"){
                        alert(data.message)
                        window.location.reload(true)
                    }
                },"json");
            }
        });



       
    });
</script>