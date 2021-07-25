<script>
    $(document).ready(function(){
        $(document).on('click', '.view_reservation_details', function(e){
            e.preventDefault();
            $.ajax({
                url: "execute/controller.php",
                type: "post",
                data: {
                    action:'details',
                    reservation_id:$(this).data('id')
                },
                dataType: 'json',
                success: function (status) {
                    if(status.response == 'success'){
                        
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

        $(document).on('click', '.proof_of_payment', function(e){
            e.preventDefault()
            $("#reservation_id").val($(this).data('id'))
            $("#proofOfPaymentModal").modal({
                backdrop: 'static',
                keyboard: false
            })
        })

        $(document).on('click', '.uploaded_proof', function(e){
            e.preventDefault()
            $.ajax({
                type : "POST",
                url : "<?php echo WEB_ROOT . 'execute/proof_file.php'; ?>",
                data:  {reservation_id : $(this).data('id')},
                dataType : 'html',
                success : function(data) {

                    $("#uploadedFileProof").modal({
                        backdrop: 'static',
                        keyboard: false
                    })

                    $("#proof_files").html(data)
                },
                error: function(xhr, ErrorStatus, error) {
                    console.log(status.error);
                }
            });
        })

        //On select file to upload
        $("#images").on('change', function(){
            var image = $('#images').val();
            var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            
            //validate file type
            if(!img_ex.exec(image)){
                alert('Please upload only .jpg/.jpeg/.png/.gif file.');
                $('#images').val('');
                return false;
            }
        });

        $(document).on("submit", "#paymentProof", function(e){
            e.preventDefault();
            if(confirm("Do you want to submit this data?")) {
                $.ajax({
                    type : "POST",
                    url : "<?php echo WEB_ROOT . 'execute/proof.php'; ?>",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType : 'json',
                    beforeSend : function() {
                        $("#paymentProof").find("#btnAction").text("Uploading..");
                    },
                    success : function(data) {
                        if(data.response == 'success'){
                            alert(data.message);
                            window.location.reload(true);
                        } else {
                            $("#paymentProof").find("#btnAction").text("Upload");
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

        
    })
</script>