<script>
    $(document).ready(function() {  
        $('#dateFrom').dateTimePicker();
        $('#dateTo').dateTimePicker();

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
            }

        var mapData = new myClass();
        mapData.loadMap({a:1}); 
        // https://www.jqueryscript.net/other/Highly-Customizable-jQuery-Toast-Message-Plugin-Toastr.html
        $(document).on('click', '.book_now', function(e){
            e.preventDefault()
            var status      = $(this).data('status')
            var dateFrom    = $("#txtDateFrom").val(); 
            var dateTo      = $("#txtDateTo").val()
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

            // alert('available')   
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