<script>
    $(document).ready(function() {  
        $('#dateFrom').dateTimePicker();
        $('#dateTo').dateTimePicker();
        var dateFrom = $("#dateFrom").text();
        var dateTo = $("#dateFrom").text();
        var a = dateFrom.replace(/(<([^>]+)>)/gi, "");
        var b = dateFrom.replace(/(<([^>]+)>)/gi, "");
        $("#txtDateFrom").val(a)
       $("#txtDateTo").val(b)

        var myClass = function() {}
            myClass.prototype = {
                loadMap: function(formData) {
                    this.formData = formData,
                        $.ajax({
                            type: "POST",
                             url: "<?php echo WEB_ROOT . 'execute/map.php' ?>",
                            dataType: "html",
                            data: this.formData,
                            cache: false,
                            success: function(data) {
                                $("#load_map").html(data)
                            },
                            error: function(xhr, status, error) {
                                console.log("Error : " + xhr.status)
                            }
                        });
                    return false;
                },
                checkAuth: function(obj){
                    $.ajax({
                            type: "POST",
                             url: "<?php echo WEB_ROOT . 'execute/checker.php' ?>",
                            dataType: "json",
                            cache: false,
                            success: function(data) {
                                console.log(obj)
                                $("#input_amenity_id").val(obj.amenity_id)
                                $("#input_category_id").val(obj.category_id)
                                $("#input_quantity").val(obj.quantity)
                                $("#input_name").val(obj.name)
                                $("#input_type").val(obj.type)
                                $("#input_date_from").val(obj.date_from)
                                $("#input_date_to").val(obj.date_to)
                                $("#input_total_hour").val(obj.per_hour)
                                $("#input_amount_hour").val(obj.amount)
                                
                                var total = parseFloat(obj.per_hour * obj.amount)
                                $("#input_total_amount").val(parseFloat(total).toFixed(2))
                                // if(data.login){
                                //     console.log('true')
                                // } else {
                                //     console.log('false')
                                // }
                                $("#reservationModal").modal({
                                    backdrop: 'static',
                                    keyboard: false
                                })
                            },
                            error: function(xhr, status, error) {
                                console.log("Error : " + xhr.status)
                            }
                        });
                        return false
                }
            }

        var mapData = new myClass();
            mapData.loadMap({}); 
        // https://www.jqueryscript.net/other/Highly-Customizable-jQuery-Toast-Message-Plugin-Toastr.html
        $(document).on('click', '.book_now', function(e){
            e.preventDefault()

            var status      = $(this).data('status')
            var dateFrom    = $("#txtDateFrom").val(); 
            var dateTo      = $("#txtDateTo").val()
            var type        = $(this).data('type')
            var name        = $(this).data('name')
            var amount      = $(this).data('amount')
            var quantity    = $(this).data('quantity')
            var amenity_id  = $(this).data('amenityid')
            var category_id  = $(this).data('categoryid')
            
            mapData.checkAuth({
                type        : type,
                name        : name,
                date_from   : dateFrom,
                date_to     : dateTo,
                amount      : amount,
                quantity    : quantity,
                amenity_id  : amenity_id,
                category_id : category_id,
                per_hour    : 1
            })
            

            return
          
            if(status == 0){
                toastr.error('Not Available','Message', {
                    positionClass:'toast-bottom-right',
                })
                return;
            }

            if(dateFrom == "" && dateTo == ""){
                toastr.error('Please select a date','Message',{
                    positionClass:'toast-bottom-right',
                })
                return;
            }   

            // $("#reservationModal").modal('show')
            toastr.success('available', 'Success', {
                positionClass:'toast-bottom-right',
            })
 
        })
        
        
        $(document).on('submit', '#frmBeachSearch', function(e){
            e.preventDefault()
            var dateFrom = $("#txtDateFrom").val(); 
            var dateTo   = $("#txtDateTo").val()
            $("#txt_result").hide()
            if(dateFrom != "" && dateTo != ""){
                var date1 = new Date(dateFrom);
                var date2 = new Date(dateTo);
                if(date1.getTime() === date2.getTime()){
                    toastr.error('Invalid date.Please try again!','Message',{
                        positionClass:'toast-bottom-right',
                    })
                    return;
                }

                else if(date1.getTime() > date2.getTime()){
                    toastr.error('Invalid date.Please try again!','Message',{
                        positionClass:'toast-bottom-right',
                    })
                    return;
                } else {
                    $("#txt_result").show()
                    $("#txt_date_from").text(dateFrom)
                    $("#txt_date_to").text(dateTo)
                    var total_hours = 1;
                    var hours    = (date2 - date1) / 1000 / 60 / 60;
                    if(parseFloat(hours) > 1 ){
                        total_hours = hours
                    }
                    mapData.loadMap({
                        txtDateFrom: dateFrom,
                        txtDateTo  : dateTo
                    }); 
                    $("#txt_total_hour").text(total_hours)
                }
            } else {
                toastr.warning('Please select a date.','Message',{
                        positionClass:'toast-bottom-right',
                    })
                return
            }
        })
    });
</script>