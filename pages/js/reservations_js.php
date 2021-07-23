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
                        console.log(status.data)
                        for(var i in status.data) {
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
            $("#proofOfPaymentModal").modal({
                backdrop: 'static',
                keyboard: false
            })
        })

        $(document).on('click', '.uploaded_proof', function(e){
            e.preventDefault()
            $("#uploadedFileProof").modal({
                backdrop: 'static',
                keyboard: false
            })
        })

        
    })
</script>